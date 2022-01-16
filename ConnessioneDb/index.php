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

              $orderByParms = $orderByNavigator = $parms;
              //Rimuovo la chiave 'order by' perchè viene assegnata nel titolo di ogni colonna
              unset($orderByParms['orderby']);
              //Rimuovo la chiave 'Orderdir' perchè al click sulla colonna ddevo poter cambiare ordinamento
              unset($orderByParms['orderDir']);
              //Unifico tutti i parm in una variabile e la inserisco nella userList
              $orderByQueryString = http_build_query($orderByParms, '&amp;');

              //Rimuovo le pagine perchè già gestite
              unset($orderByNavigator['page']);
              $navOrderByQueryString = http_build_query($orderByNavigator, '&amp;');

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
