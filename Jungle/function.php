<?php

require_once 'connection.php';

function getParms($parm, $default = null){
  return !empty($_REQUEST[$parm])? $_REQUEST[$parm] : $default ;
  }
function GetGeneri(array $parms = []){

    //Connessione al db
    $conn = $GLOBALS['mysqli'];

    //creo la query
    $sql = 'SELECT * FROM genere WHERE GenereAttivo = 1  ORDER BY GenereNome';

    $result = $conn->query($sql);

    //Inizializzo la variabile  per evitare errori di php
    $generi = [];

    if ($result){
        while($row = $result->fetch_assoc()){
          $generi[] = $row;
        }
      };
    
      return $generi;
    }

function save_genere(array $data = []){

    $result['success'] = 0;
    $result['error'] = 'Nessun genere';
    $result['message'] = '';

    $conn = $GLOBALS['mysqli'];

    $GenereNome = $conn->escape_string($data['GenereNome']);

    $sql ="INSERT INTO genere (GenereNome) VALUE('$GenereNome')";

    $res = $conn->query($sql);

    if($res){
        $result['GenereID'] = $conn->insert_id;
        $result['success'] = true;
        $result['message'] = 'Nuovo genere inserito';
      }else {
        $result['success'] = false;
        $result['message'] = $conn->error;
      }
      
      return $result;
    }
function delete_genere(int $GenereID){

    $conn = $GLOBALS['mysqli'];

    $sql ="DELETE FROM Genere WHERE GenereID = $GenereID";

    $res = $conn->query($sql);

    return $res && $conn->affected_rows;//controllo se ci sono righe 'interessate'
  
  }



function GetVenditori(array $parms = []){

    //Connessione al db
    $conn = $GLOBALS['mysqli'];

    //creo la query
    $sql = 'SELECT * FROM venditori WHERE VenditoreAttivo = 1  ORDER BY VenditoreRagioneSociale';

    $result = $conn->query($sql);

    //Inizializzo la variabile  per evitare errori di php
    $venditori = [];

    if ($result){
        while($row = $result->fetch_assoc()){
          $venditori[] = $row;
        }
      };
    
      return $venditori;
    }

    
function save_venditore(array $data = []){

  $result['success'] = 0;
  $result['error'] = 'Nessun venditore';
  $result['message'] = '';

  $conn = $GLOBALS['mysqli'];

  $VenditoreRagioneSociale = $conn->escape_string($data['VenditoreRagioneSociale']); //campo obbligatorio, inserire obbligo nel form
  $VenditoreCitta = $data['VenditoreCitta']? $conn->escape_string($data['VenditoreCitta']):'';
  $VenditoreProvincia = $data['VenditoreProvincia']? $conn->escape_string($data['VenditoreProvincia']): '';
  $VenditoreIndirizzo = $data['VenditoreIndirizzo']? $conn->escape_string($data['VenditoreIndirizzo']): '';
  $VenditorePrefisso = $data['VenditorePrefisso']? $conn->escape_string($data['VenditorePrefisso']):'';
  $VenditoreNumero = $data['VenditoreNumero']? $conn->escape_string($data['VenditoreNumero']):'';
  $VenditoreSito = $data['VenditoreSito']? $conn->escape_string($data['VenditoreSito']):'';

  $sql = "INSERT INTO venditori ";
  $sql.= "(VenditoreRagioneSociale,VenditoreCitta,VenditoreProvincia,VenditoreIndirizzo,VenditorePrefisso,VenditoreNumero,VenditoreSito) ";
  $sql.= "VALUE ('$VenditoreRagioneSociale','$VenditoreCitta','$VenditoreProvincia','$VenditoreIndirizzo','$VenditorePrefisso','$VenditoreNumero','$VenditoreSito')";

  $res = $conn->query($sql);

  if($res){
      $result['VenditoreID'] = $conn->insert_id;
      $result['success'] = true;
      $result['message'] = 'Nuovo venditore inserito';
    }else {
      $result['success'] = false;
      $result['message'] = $conn->error;
    }
    
    return $result;
  }

function delete_venditore(int $VenditoreID){

    $conn = $GLOBALS['mysqli'];

    $sql ="DELETE FROM Venditori WHERE VenditoreID = $VenditoreID";

    $res = $conn->query($sql);

    return $res && $conn->affected_rows;//controllo se ci sono righe 'interessate'
  
  }
function GetSpecie(array $parms = []){

    //Connessione al db
    $conn = $GLOBALS['mysqli'];
  
    //creo la query
    $sql = 'SELECT * FROM specie inner join genere on genere.GenereID = specie.GenereID WHERE SpecieAttivo = 1 ORDER BY GenereNome';
  
    $result = $conn->query($sql);
  
    //Inizializzo la variabile  per evitare errori di php
    $specie = [];
  
    if ($result){
        while($row = $result->fetch_assoc()){
          $specie[] = $row;
        }
      };
      return $specie;
    }
function save_specie(array $data = []){

  $result['success'] = 0;
  $result['error'] = 'Nessun venditore';
  $result['message'] = '';

  $conn = $GLOBALS['mysqli'];

  $SpecieNome = $data['SpecieNome']? $conn->escape_string($data['SpecieNome']):'';
  $GenereID = $data['GenereID']? $conn->escape_string($data['GenereID']):'';

  $sql = "INSERT INTO specie ";
  $sql.= "(GenereID,SpecieNome) ";
  $sql.= "VALUE ($GenereID,'$SpecieNome')";

  $res = $conn->query($sql);

  if($res){
      $result['SpecieID'] = $conn->insert_id;
      $result['success'] = true;
      $result['message'] = 'Nuova specie inserita';
    }else {
      $result['success'] = false;
      $result['message'] = $conn->error;
    }
    
    return $result;
  }

function delete_specie(int $SpecieID){

  $conn = $GLOBALS['mysqli'];

  $sql ="DELETE FROM specie WHERE SpecieID = $SpecieID";

  $res = $conn->query($sql);

  return $res && $conn->affected_rows;//controllo se ci sono righe 'interessate'

  }


































function GetSottospecie(array $parms = []){
  
    //Connessione al db
    $conn = $GLOBALS['mysqli'];
  
    //creo la query
    $sql = 'SELECT * FROM sottospecie inner join specie on specie.SpecieID = sottospecie.SpecieID inner join genere on genere.GenereID = specie.GenereID WHERE SpecieAttivo = 1 ORDER BY GenereNome';
  
    $result = $conn->query($sql);
  
    //Inizializzo la variabile  per evitare errori di php
    $sottospecie = [];
  
    if ($result){
        while($row = $result->fetch_assoc()){
          $sottospecie[] = $row;
        }
      };
      return $sottospecie;
  }
function save_sottospecie(array $data=[]){

  $result['success'] = 0;
  $result['error'] = 'Nessun venditore';
  $result['message'] = '';

  $conn = $GLOBALS['mysqli'];

  $SottospecieNome = $data['SottospecieNome']? $conn->escape_string($data['SottospecieNome']):'';
  $SpecieID = $data['SpecieID']? $conn->escape_string($data['SpecieID']):'';

  $sql = "INSERT INTO Sottospecie ";
  $sql.= "(SpecieID,SottospecieNome) ";
  $sql.= "VALUE ($SpecieID,'$SottospecieNome')";

  $res = $conn->query($sql);

  if($res){
      $result['SottospecieID'] = $conn->insert_id;
      $result['success'] = true;
      $result['message'] = 'Nuova specie inserita';
    }else {
      $result['success'] = false;
      $result['message'] = $conn->error;
    }
    
    return $result;
  }

function delete_sottospecie($SottospecieID){
  $conn = $GLOBALS['mysqli'];

  $sql ="DELETE FROM sottospecie WHERE SottospecieID = $SottospecieID";

  $res = $conn->query($sql);

  return $res && $conn->affected_rows;//controllo se ci sono righe 'interessate'

  }
function GetPiante(array $parms = []){
  
  //Connessione al db
  $conn = $GLOBALS['mysqli'];

  //creo la query
  $sql = 'SELECT * FROM piante inner join specie on specie.SpecieID = piante.SpecieID inner join genere on genere.GenereID = piante.GenereID WHERE PiantaAttivo = 1';

  $result = $conn->query($sql);

  //Inizializzo la variabile  per evitare errori di php
  $piante = [];

  if ($result){
      while($row = $result->fetch_assoc()){
        $piante[] = $row;
      }
    };
    return $piante;
}
function save_pianta(array $data=[]){

  $result['success'] = 0;
  $result['error'] = 'Nessuna pianta';
  $result['message'] = '';

  $conn = $GLOBALS['mysqli'];

  $Pianta = $data['SottospecieNome']? $conn->escape_string($data['SottospecieNome']):'';
  $SpecieID = $data['SpecieID']? $conn->escape_string($data['SpecieID']):'';

  $sql = "INSERT INTO Sottospecie ";
  $sql.= "(SpecieID,SottospecieNome) ";
  $sql.= "VALUE ($SpecieID,'$SottospecieNome')";

  $res = $conn->query($sql);

  if($res){
      $result['SottospecieID'] = $conn->insert_id;
      $result['success'] = true;
      $result['message'] = 'Nuova specie inserita';
    }else {
      $result['success'] = false;
      $result['message'] = $conn->error;
    }
    
    return $result;
  }
  ?>