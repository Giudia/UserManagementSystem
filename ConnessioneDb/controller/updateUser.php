<?php

  session_start();
//si rompe in questo file
  require_once '../function.php';
  require_once '../model/user.php';

  $action = getParms('action', null);
  var_dump($action);

  $parms = $_GET;
  unset($parms['action']);
  unset($parms['id']);
  $queryString = http_build_query($parms);

  switch ($action) {
    case 'delete':
      // Cancellazione utente

      $UserID = getParms('id', 0);
      $res = deleteUser($UserID);

      $message = $res ? 'Utente cancellato' : 'Errore nella cancellazione';

      $_SESSION['message'] = $message;
      $_SESSION['success'] = $res;

      header('location:../index.php?'.$queryString);
      break;
    case 'save':
      break;

    case 'store':
      $data = $_POST;
      var_dump($data);
      //$UserID = getParms('UserID',0);
      $res = storeUser($data, $data['UserID']);

      $message = $res ? 'Utente aggiornato' : 'Errore aggiornamento';

      $_SESSION['message'] = $message;
      $_SESSION['success'] = $res;

      header('location:../index.php?'.$queryString);

      break;

    default:

  }

?>
