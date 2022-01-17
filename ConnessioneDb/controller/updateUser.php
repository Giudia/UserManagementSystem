<?php

  session_start();

  require_once '../model/user.php';
  require_once '../function.php';
  $action = getParms('action', null);

  switch ($action) {
    case 'delete':
      // Cancellazione utente

      $UserID = getParms('id', 0);
      $res = deleteUser($UserID);

      $message = $res ? 'Utente cancellato' : 'Errore nella cancellazione';

      $_SESSION['message'] = $message;
      $_SESSION['success'] = $res;

      $parms = $_GET;
      unset($parms['action']);
      unset($parms['id']);
      $queryString = http_build_query($parms);

      header('location:../index.php?'.$queryString);
      break;

    default:

  }






?>
