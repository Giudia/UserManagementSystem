<?php
  require_once 'header.php'
?>

  <body>

    <!-- Begin page content -->
    <main role="main" class="container">
       <h1 class="text-center">USER MANAGEMENT SYSTEM </h1>
       <hr>

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
