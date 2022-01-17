<?php
  session_start();

  require_once 'function.php';
  require_once 'view\head.php';

  $url = $_SERVER['PHP_SELF'];
  $urlUpdate = 'controller/updateUser.php';

  $orderDir = getParms('orderDir', 'ASC');
  $orderby = getParms('orderby', 'UserID');
  $orderByColumns = getConfig('orderByColumns', ['UserID', 'UserName', 'UserCodiceFiscale', 'UserEmail', 'UserEta']);
  $recordsPerPage = getParms('recordsPerPage', getConfig('numberRecord'));
  $recordPerPageOptions = getConfig('recordPerPageOptions', [5,10,20,30,50]);
  $search = getParms('search','');
  $page = getParms('page', 1);

  require_once 'view\navbar.php';
?>

  <body>

    <!-- Begin page content -->
    <main role="main" class="container">
       <h1 class="text-center">USER MANAGEMENT SYSTEM </h1>
       <hr>

       <?php
          //Messaggio di conferma o errore della cancellazione dell'utente
          if(!empty($_SESSION['message'])){
            $alertType = $_SESSION['success']?'success':'alert';
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
