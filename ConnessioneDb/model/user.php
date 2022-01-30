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
    //cancellazione utente
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

  function storeUser(array $data, int $id){
    //aggiornamento utente
    /**
     * @var $conn mysqli
     */
     $result = 0;

    $conn = $GLOBALS['mysqli'];

    $userName = $conn->escape_string($data['UserName']);
    $UserEmail = $conn->escape_string($data['UserEmail']);
    $userCodiceFiscale = $conn->escape_string($data['userCodiceFiscale']);
    $UserEta = $conn->escape_string($data['UserEta']);
    $UserAvatar = ($conn->escape_string($data['UserAvatar'])) ? $conn->escape_string($data['UserAvatar']): 'NULL' ;

    $sql ='UPDATE utenti SET ';
    $sql .= "UserName='$userName', UserEmail='$UserEmail', UserCodiceFiscale='$userCodiceFiscale',";
    $sql .= "UserEta=$UserEta, UserAvatar = '$UserAvatar' ";
    $sql .= " WHERE UserID = $id";

    $res = $conn->query($sql);
    $result = [
      'success' => 1,
      'affected_rows' => 0,
      'error' =>'',
    ];

    if($res){
      $result['affected_rows'] = $conn->affected_rows;
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

    $sql ="INSERT INTO utenti (UserName, UserEmail, UserCodiceFiscale, UserEta)";
    $sql .= " VALUE('$userName','$UserEmail','$userCodiceFiscale',$UserEta)";

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
