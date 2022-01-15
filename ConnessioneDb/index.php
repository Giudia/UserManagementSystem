<?php
  require_once 'function.php';
  require_once 'view\head.php';

  $url = $_SERVER['PHP_SELF'];
  $orderDir = getParms('orderDir', 'DESC');
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
       <h1>USER MANAGEMENT SYSTEM </h1>
       <hr>
       <?php

          $action = getParms('action', null);

          switch ($action) {
            case 'insert':
              // Inserimento nuovo utente...
              break;

            default:
              // elenco utenti...

              $parms = [
                'orderby' => $orderby,
                'orderDir' => $orderDir,
                'recordsPerPage' => $recordsPerPage,
                'search' => $search,
                'page' => $page
              ];

              $totalUsers = countUsers($parms);
              $numPages = ceil($totalUsers/$recordsPerPage); //arrotondato per eccesso
              $users = getUsers($parms);

              require_once 'view/userList.php';
            //  break;
          }
        ?>
    </main>

<?php
  require_once 'view\footer.php';
 ?>
