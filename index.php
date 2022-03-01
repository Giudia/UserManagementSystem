<?php
  session_start();
  require_once 'header.php';
  
//controllo se l'utente è loggato
  if(!isUserLoggedIn()){
    header('Location: login.php');
  exit;
}
?>

  <body>
  
    <!-- Begin page content -->
    <main role="main" class="my-5 container-fluid">
       <h1 class="text-center py-5">USER MANAGEMENT SYSTEM </h1>

       <?php
          //Messaggio di conferma o errore della cancellazione dell'utente
          if(!empty($_SESSION['message'])){
            $alertType = $_SESSION['success']?'success':'danger';
            $message = $_SESSION['message'];
            require 'view/message.php';

            unset($_SESSION['message'],$_SESSION['success']);
          }

          require_once 'controller/displayUsers.php'

        ?>
    </main>

<?php
  require_once 'view\footer.php';
 ?>
