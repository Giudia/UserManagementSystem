<?php

  function deleteUser(int $id){
    //cancellazione utente
    /**
     * @var $conn mysqli
     */

    $conn = $GLOBALS['mysqli'];

    $sql ="DELETE FROM utenti WHERE UserID = $id";

    $res = $conn->query($sql);

    return $res && $conn->affected_rows;//controllo se ci sono righe 'interessate'
  };

  function getUser(int $id){

    /**
     * @var $conn mysqli
     */
     $result = [];

    $conn = $GLOBALS['mysqli'];

    $sql ="SELECT * FROM utenti WHERE UserID = $id";

    $res = $conn->query($sql);

    if($res && $res->num_rows){
      $result = $res->fetch_assoc();
    }
    return $result;
  };

  
  function getUser_byEmail( string $UserEmail){

    /**
     * @var $conn mysqli
     */
     $result = [];

    $conn = $GLOBALS['mysqli'];

    $UserEmail = filter_var($UserEmail, FILTER_VALIDATE_EMAIL);

    if (!$UserEmail){
      return;
    }

    $UserEmail = mysqli_escape_string($conn, $UserEmail);

    $sql ="SELECT * FROM utenti WHERE UserEmail = '$UserEmail'";

    $res = $conn->query($sql);

    if($res && $res->num_rows){
      $result = $res->fetch_assoc();
    }

    return $result;
  };


  function storeUser(array $data, int $id){
    //aggiornamento utente
    /**
     * @var $conn mysqli
     */
    $result = [
      'success' => 1,
      'affectedRows' => 0,
      'error' => ''
    ];

    $conn = $GLOBALS['mysqli'];

    $userName = $conn->escape_string($data['UserName']);
    $UserEmail = $conn->escape_string($data['UserEmail']);
    $userCodiceFiscale = $conn->escape_string($data['userCodiceFiscale']);
    $UserEta = $conn->escape_string($data['UserEta']);
    $UserAvatar = $conn->escape_string($data['UserAvatar']);

    $sql ='UPDATE utenti SET ';
    $sql .= "UserName='$userName', UserEmail='$UserEmail', UserCodiceFiscale='$userCodiceFiscale',";
    $sql .= "UserEta=$UserEta ";

    if ($data['UserAvatar']){
      $sql .= ", UserAvatar = '$UserAvatar' ";
    }

    if ($data['UserPassword']){ //modifico i dati solo se l'utente li ha cambiati
      $data['UserPassword'] = $data['UserPassword'] ?? 'password';
      $UserPassword = password_hash($data['UserPassword'], PASSWORD_DEFAULT);
      $sql .= ", UserPassword = '$UserPassword'";
    }

    if ($data['UserRoleType']){ //modifico i dati solo se l'utente li ha cambiati
     $UserRoleType = (in_array($data['UserRoleType'], getConfig('UserRoleType', [])) ? $data['UserRoleType'] : 'user');
     $sql .= ", UserRoleType = '$UserRoleType'";  
    }

    $sql .= " WHERE UserID = $id";
    
    $res = $conn->query($sql);
    
    if($res){
      $result['affected_rows'] = $conn->affected_rows;
      $result['success'] = 1;
    }else {
        $result['success'] = 0;
        $result['error'] = $conn->error;
    }
    return $result;
  };

  function saveUser(array $data){
    //aggiornamento utente
    /**
     * @var $conn mysqli
     */
    $result['success'] = 0;
    $result['error'] = 'Nessun utente';
    $result['message'] = '';
    
    $conn = $GLOBALS['mysqli'];

    $userName = $conn->escape_string($data['UserName']);
    $UserEmail = $conn->escape_string($data['UserEmail']);
    $userCodiceFiscale = $conn->escape_string($data['userCodiceFiscale']);
    $UserEta = (int)$data['UserEta'];
    $data['UserPassword'] = $data['UserPassword'] ?? 'password'; //se l'utente non inserisce una password prende quella di default
    $UserPassword = password_hash($data['UserPassword'], PASSWORD_DEFAULT);
    $UserRoleType = in_array($data['UserRoleType'], getConfig('UserRoleType', []) ? $data['UserRoleType'] : 'user');

    $sql ="INSERT INTO utenti (UserName, UserEmail, UserCodiceFiscale, UserEta, UserPassword, UserRoleType)";
    $sql .= " VALUE('$userName','$UserEmail','$userCodiceFiscale',$UserEta, $UserPassword, $UserRoleType)";

    $res = $conn->query($sql);

    if($res){
      $result['UserID'] = $conn->insert_id;
      $result['success'] = true;
    }else {
      $result['success'] = false;
      $result['message'] = $conn->error;
    }
    return $result;
  };

  
function UpdateUserAvatar(int $UserId, string $UserAvatar = null ) {

  if (! $UserAvatar){
    $result['success'] = 0;
    $result['error'] = 'Nessun avatar';
    return;
  };
  
  $conn = $GLOBALS['mysqli'];
  $UserAvatar = $conn->escape_string($UserAvatar);

  $sql ='UPDATE utenti SET ';
  $sql .= "UserAvatar = '$UserAvatar' ";
  $sql .= "WHERE UserID = $UserId";

  $res = $conn->query($sql);

  return $res && $conn->affected_rows;

};

?>
