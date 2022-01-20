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

    $userName = escape_string($data['userName']);
    $UserEmail = escape_string($data['UserEmail']);
    $userCodiceFiscale = escape_string($data['userCodiceFiscale']);
    $userAge = escape_string($data['userAge']);

    $sql ='UPDATE utenti SET ';
    $sql .= "userName= '$userName', userEmail= '$UserEmail', userCodiceFiscale='$userCodiceFiscale',";
    $sql .= "userAge=$age";
    $sql .= "WHERE UserID = $id";

    $res = $conn->query($sql);

    if($res){
      $result = $conn->affected_rows;
    }else {
        $result = -1;
    }
    return $result;
  };
?>
