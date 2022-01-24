<?php

  session_start();

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
      $data = $_POST;

      $res = saveUser($data);

      $message = $res ? 'Utente inserito' : 'Errore inserimento';

      $_SESSION['message'] = $message;
      $_SESSION['success'] = $res;

      header('location:../index.php?'.$queryString);

      break;

    case 'store':
      $data = $_POST;

      $res = storeUser($data, $data['UserID']);

      $message = $res['success'] ? 'Utente aggiornato' : 'Errore aggiornamento: '.$res['error'];

      $_SESSION['message'] = $message;
      $_SESSION['success'] = $res;

      header('location:../index.php?'.$queryString);

      break;

    default:

  }

?>
