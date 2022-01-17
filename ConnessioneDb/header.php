<?php
  session_start();

  require_once 'function.php';
  require_once 'model/user.php';
  require_once 'view/head.php';

  $url = $_SERVER['PHP_SELF'];
  $urlUpdate = 'formUpdateUser.php';
  $urlDelete = 'controller/updateUser.php'; //in realtà questo file cancella

  $orderDir = getParms('orderDir', 'ASC');
  $orderby = getParms('orderby', 'UserID');
  $orderByColumns = getConfig('orderByColumns', ['UserID', 'UserName', 'UserCodiceFiscale', 'UserEmail', 'UserEta']);
  $recordsPerPage = getParms('recordsPerPage', getConfig('numberRecord'));
  $recordPerPageOptions = getConfig('recordPerPageOptions', [5,10,20,30,50]);
  $search = getParms('search','');
  $page = getParms('page', 1);

  require_once 'view\navbar.php';
 ?>
