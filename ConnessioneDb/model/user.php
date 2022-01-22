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

    $sql ='UPDATE utenti SET ';
    $sql .= "UserName='$userName', UserEmail='$UserEmail', UserCodiceFiscale='$userCodiceFiscale',";
    $sql .= "UserEta=$UserEta";
    $sql .= " WHERE UserID = $id";

    $res = $conn->query($sql);

    if($res){
      $result = $conn->affected_rows;
    }else {
        $result = -1;
    }
    return $result;
  };
?>
