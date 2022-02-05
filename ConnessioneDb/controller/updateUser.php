<?php

  session_start();

  require_once '../function.php';
  require_once '../model/user.php';

  $action = getParms('action', null);

  $parms = $_GET;
  unset($parms['action']);
  unset($parms['id']);
  $queryString = http_build_query($parms);

  switch ($action) {
    case 'delete':
      // Cancellazione utente

      $UserID = getParms('id', 0);
      $UserData = getUser($UserID);
      $res = deleteUser($UserID);

      //dopo aver cancellato l'utente cancello l'immagine
      if ($res){
        RemoveOldAvatar($UserID, $UserData);
      }

      $message = $res ? 'Utente cancellato' : 'Errore nella cancellazione';

      $_SESSION['message'] = $message;
      $_SESSION['success'] = $res;

      header('location:../index.php?'.$queryString);
      break;

    case 'save':

      $data = $_POST;
      $res = saveUser($data);

      if ($res['UserID'] > 0){

        $message = 'Utente inserito';

        $resAvatar = copyAvatar($res['UserID']);

        if ($resAvatar['success']){
          UpdateUserAvatar($res['UserID'], $resAvatar['file_name']);
        }

      } else {

        $message ='Errore inserimento';

      };

      $_SESSION['message'] = $message;
      $_SESSION['success'] = $res;

      header('location:../index.php?'.$queryString);

      break;

    case 'store':

      $data = $_POST;
      $UserID = $data['UserID'];
      $resAvatar = copyAvatar($UserID);

      //Se il salvataggio è andato a buon fine aggiungo il file al salvataggio dello user
      if ($resAvatar['success']){
        //Se esiste già un avatar lo vado a rimuovere prima di salvare il nuovo
        RemoveOldAvatar($UserID);
        $data['UserAvatar'] = $resAvatar['file_name'];
      }else{
        $data['UserAvatar'] = null;
      };

      $res = storeUser($data, $UserID);

      $message = $res['success'] ? 'Utente aggiornato' : 'Errore aggiornamento: '.$res['error'];
      //$message .= $resAvatar['success'] ? ' Avatar aggiunto' : ' Errore avatar: '.$resAvatar['message'];

      $_SESSION['message'] = $message;
      $_SESSION['success'] = $res;

      header('location:../index.php?'.$queryString);

      break;

    default:

  }

?>
