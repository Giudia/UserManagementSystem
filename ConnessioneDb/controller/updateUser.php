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
      $resAvatar = copyAvatar($data['UserID']);

      //Se il salvataggio è andato a buon fine aggiungo il file al salvataggio dello user
      if ($resAvatar['success']){
        $data['UserAvatar'] = $resAvatar['file_name'];
      }else{
        $data['UserAvatar'] = null;
      };

      $res = storeUser($data, $data['UserID']);

      $message = $res['success'] ? 'Utente aggiornato' : 'Errore aggiornamento: '.$res['error'];
      $message .= $resAvatar['success'] ? ' Avatar aggiunto' : ' Errore avatar: '.$resAvatar['message'];

      $_SESSION['message'] = $message;
      $_SESSION['success'] = $res;

      header('location:../index.php?'.$queryString);

      break;

    default:

  }

?>
