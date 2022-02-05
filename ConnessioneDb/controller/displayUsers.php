i0<?php
  //Settaggio parametri in GET
  $parms = [
    'orderby' => $orderby,
    'orderDir' => $orderDir,
    'recordsPerPage' => $recordsPerPage,
    'search' => $search,
    'page' => $page
  ];


  //settaggio parametri per navbar e paginazione
  //
  $orderByParms = $orderByNavigator = $parms;
  //Rimuovo la chiave 'order by' perchè viene assegnata nel titolo di ogni colonna
  unset($orderByParms['orderby']);
  //Rimuovo la chiave 'Orderdir' perchè al click sulla colonna ddevo poter cambiare ordinamento
  unset($orderByParms['orderDir']);
  //Unifico tutti i parm in una variabile e la inserisco nella userList
  $orderByQueryString = http_build_query($orderByParms,'', '&amp;');

  //Rimuovo le pagine perchè già gestite
  unset($orderByNavigator['page']);
  $navOrderByQueryString = http_build_query($orderByNavigator, '&amp;');

  //Conteggi per paginazione
  $totalUsers = countUsers($parms);
  $numPages = ceil($totalUsers/$recordsPerPage); //arrotondato per eccesso
  $users = getUsers($parms);

  require_once 'view/userList.php';

 ?>
