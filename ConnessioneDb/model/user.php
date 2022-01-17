<?php
  require_once '../connection.php'

  function deleteUser(int $id){
    //cancellazione utente

    $conn = $GLOBALS['mysqli']

    $sql ="DELETE FROM utenti WHERE UserID = $id"

    $res = $conn->$query($sql)

    return $res && $conn->affected_rows;
  };



?>
