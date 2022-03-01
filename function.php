<?php

require_once 'connection.php';

function verify_login($email = null, $password = null, $token = null) {

  require_once 'model/user.php';
      
  $result = [
    'message' => 'Login effettuato',
    'success' => true,
  ];

  if( $token !== $_SESSION['csrf']){
    $result = [
      'message' => 'ERRORE: Il token non corrisponde',
      'success' => false,
    ];

    return $result;
  }

  $email = filter_var($email, FILTER_VALIDATE_EMAIL );

  if (!$email){
    $result = [
      'message' => 'ERRORE: Email non valida',
      'success' => false,
    ];

    return $result;
  }

  if(strlen($password)<6){
    $result = [
      'message' => 'ERRORE: Password troppo corta',
      'success' => false,
    ];

    return $result;
  }

  $resEmail = getUser_byEmail($email);

  if(!$resEmail){
    $result = [
      'message' => 'ERRORE: Utente non trovato',
      'success' => false,
    ];

    return $result;
  }

  if(!password_verify($password, $resEmail['UserPassword'] )){
    $result = [
      'message' => 'ERRORE: Password errata',
      'success' => false,
    ];

    return $result;
  }

  //Mi carico già anche l'array con i dati dell'utente
  $result['user'] = $resEmail;

  return $result;

}

function getConfig($parm, $default = null){
  require 'config.php';
  return array_key_exists($parm, $config)? $config[$parm] : $default;
}

function getParms($parm, $default = null){
    return !empty($_REQUEST[$parm])? $_REQUEST[$parm] : $default ;
}

function getRandName(){
  $names = ['Anna', 'Alice', 'Rebecca', 'andrea', 'oscar'];
  $lastnames = ['Rossi', 'verdi', 'smith', 'wilde'];

  Return  $names[mt_rand(0, count($names)-1)].' '.$lastnames[mt_rand(0, count($lastnames)-1)];

}

function getRandEmail($name){

  $domains = ['google.com', 'gmail.com', 'outlook.com', 'yahoo.com'];
  return strtolower(str_replace(' ', '.', $name)).mt_rand(10,99).'@'.$domains[mt_rand(0, count($domains)-1)];
}

function getRandAge(){
    return mt_rand(0,120);
}

function getRandFiscalCode(){

  $i = 16;
  $res = '';

  while ($i > 0){
  //  generiamo da tabella ascii ( chr() legge il valore dalla tabella ascii)
    $res .= chr(mt_rand(65,90));

    $i --;
  };

  return $res;

  }

function insertUser($userQta, mysqli $mysqli){

  while ($userQta > 0){
    $userName = getRandName();
    $userMail = getRandEmail($userName);
    $UserEta = getRandAge();
    $UserCodiceFiscale = getRandFiscalCode();

    $sql = "INSERT INTO utenti (UserName, UserEmail, UserCodiceFiscale, UserEta) VALUES ('$userName', '$userMail', '$UserCodiceFiscale', $UserEta)";

    $result = $mysqli-> query($sql);

    if (!$result){
      echo $mysqli->error;
    }else{
      $userQta --;
    }
  }
  }

function getUsers( array $parms = []){

  $conn = $GLOBALS['mysqli'];

  $orderby = (array_key_exists('orderby', $parms))? $parms['orderby'] : 'UserID';
  $orderDir = (array_key_exists('orderDir', $parms))? $parms['orderDir'] : 'ASC';

  $limit = ((int)array_key_exists('recordsPerPage', $parms))? $parms['recordsPerPage'] : 10;
  $page = ((int)array_key_exists('page', $parms))? $parms['page'] : 0;
  $start = $limit * ($page - 1);

  if ($start<0){
    $start = 0;
  };

  $search = (array_key_exists('search', $parms))? $parms['search'] : '';

  //Impedisco all'utente di modificare la query
  $search = $conn->escape_string($search);

  // Impedisco all'utente di passare paramentri casuali
  if(!in_array($orderby, getConfig('orderByColumns'))){
    $orderby = 'UserID';
  };
  if($orderDir !== 'ASC' && $orderDir !== 'DESC'){
    $orderDir = 'ASC';
  }

  //query di caricamento utenti
  $sql = 'SELECT * FROM utenti';
  if ($search) {
    $sql.= " WHERE UserName LIKE '%$search%'";
    $sql.= " OR UserCodiceFiscale LIKE '%$search%'";
    $sql.= " OR UserEmail LIKE '%$search%'";
  }
  $sql.= " ORDER BY $orderby $orderDir LIMIT $start,$limit";
  //echo $sql;
  $result = $conn->query($sql);

  //INizializzo la variabile  per evitare errori di php
  $users = [];

  if ($result){
    while($row = $result->fetch_assoc()){
      $users[] = $row;
    }
  };

  return $users;
  }


function countUsers(array $parms = []){
  //per il calcolo dinamico delle pagine

  $conn = $GLOBALS['mysqli'];

  $orderby = (array_key_exists('orderby', $parms))? $parms['orderby'] : 'UserID';
  $orderDir = (array_key_exists('orderDir', $parms))? $parms['orderDir'] : 'ASC';
  $limit = ((int)array_key_exists('recordsPerPage', $parms))? $parms['recordsPerPage'] : 10;
  $search = (array_key_exists('search', $parms))? $parms['search'] : '';

  //Impedisco all'utente di modificare la query
  $search = $conn->escape_string($search);

  // Impedisco all'utente di passare paramentri casuali
  if(!in_array($orderby, getConfig('orderByColumns'))){
    $orderby = 'UserID';
  };
  if($orderDir !== 'ASC' && $orderDir !== 'DESC'){
    $orderDir = 'ASC';
  }

  //query du caricamento utenti
  $sql = 'SELECT COUNT(*) as total FROM utenti';
  if ($search) {
    $sql.= " WHERE UserName LIKE '%$search%'";
    $sql.= " OR UserCodiceFiscale LIKE '%$search%'";
    $sql.= " OR UserEmail LIKE '%$search%'";
  }
  //echo $sql;

  $result = $conn->query($sql);

  //Inizializzo la variabile  per evitare errori di php
  $total = 0;

  if ($result){
    $row = $result->fetch_assoc();
    $total = $row['total'];

  }else{
    die($conn->error);
  };

  return $total;
  }

function copyAvatar(int $ID){
    //salvo avatar utente
    
    //Inizializzo l'array di ritorno
    $result = [
      'success' => false,
      'message' => '',
      'file_name' => '',
    ];

    //Verifico che sia stato caricato almeno 1 file
    if (empty($_FILES['UserAvatar']['name'])){
      //Se non è stato caricato ritorno senza continuare
      $result['message'] = 'Nessun file caricato';
      return $result;
    };

   // var_dump($result['message']); die;

    //Verifico se il file è stato caricato dal browser

    if(!is_uploaded_file($_FILES['UserAvatar']['tmp_name'])){
      $result['success'] = 1;
      $result['message'] = '';
      return $result;
    };

    //Verifico il mimetype
    $finfo = finfo_open(FILEINFO_MIME);
    $info = finfo_file($finfo,$_FILES['UserAvatar']['tmp_name']);

    if(stristr($info, 'image') === false){
      $result['message'] = "Il file non è un'immagine";
      return $result;
    }

    //Verifico la grandezza del file
  if ($_FILES['UserAvatar']['size'] > getConfig('max_ini_file', 0)){
    $result['message'] = "Il file supera la granzezza massima consentita";
    return $result;
  }

  // Se supero tutti i controlli copio il file
  $filename = $ID.'_'.str_replace('.', '', microtime(true)).'.jpg';
  if(is_uploaded_file($_FILES['UserAvatar']['tmp_name'])){
    
    $avatar_dir = getConfig('avatar_dir','');

    if(! move_uploaded_file($_FILES['UserAvatar']['tmp_name'],$avatar_dir.$filename)){
      //Se non va a buon fine la copia restituisco l'errore
      $result['message'] = 'Errore durante il caricamento del file';
      return $result;
    }

  } else{

    $result['message'] = 'Nessun file caricato';
    return $result;

  }

  //creazione thumbnail
  //Creo una seconda immagine uguale alla prima
  $NewImg = imagecreatefromjpeg( $avatar_dir.$filename);
  if (!$NewImg){
    $result['message'] = 'Errore copia img';
  }

  //Ridimensiono l'immagine definendo la larghezza 
  $thumbnail = imagescale($NewImg, getConfig('thumbnail_width', 100));


  if ($thumbnail){
    //se la risorsa è stata creata la salvo
    imagejpeg($thumbnail, getConfig('avatar_dir').'thumb_'.$filename);
  }else{
    //se non è stata creata
    $result['message'] = 'Errore creazione thumbnail';  
  }

  //Creo una terza immagine per l'anteprima
  $preview = imagescale($NewImg, getConfig('preview_width', 400));

  if ($preview){
    //se la risorsa è stata creata la salvo
    imagejpeg($preview, getConfig('avatar_dir').'prev_'.$filename);
  }else{
    //se non è stata creata
    $result['message'] = 'Errore creazione preview';  
  }

  //Se non ci sono stati errori, aggiungo il nome del file all'array
  $result['file_name'] = $filename;
  $result['success'] = true;
  return $result;

  }

function RemoveOldAvatar(int $UserId, array $UserData = null) {

    $UserData = ($UserData) ? : getUser($UserId);
    $file = $UserData['UserAvatar'];
    $folder = getConfig('avatar_dir');

    if (!$UserData || !$file){
      //Se non trova dati ritorno
      return;
    }

    if (file_exists($folder.$file)){
      //elimino fisicamente il file
      unlink($folder.$file);
    }

    if (file_exists($folder.'thumb_'.$file)){
      unlink($folder.'thumb_'.$file);
    }
  
  }

function isUserLoggedIn(){
    
    return $_SESSION['loggedin'] ?? false;
  }

function GetUser_LoggedIn_Fullname(){
    return $_SESSION['userData']['UserName'] ?? '';
  }
  

function GetUser_LoggedIn_Role(){
    return $_SESSION['userData']['UserRoleType'] ?? '';
  }