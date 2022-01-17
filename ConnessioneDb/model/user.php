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


?>
