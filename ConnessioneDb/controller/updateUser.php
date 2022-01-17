<?php

  require_once '../model/user.php';

  $action = getParms('action', null);

  switch ($action) {
    case 'delete':
      // Cancellazione utente

      $UserID = getParms('id', 0);
      $res = deleteUser($UserID);

      break;

    default:

  }






?>
