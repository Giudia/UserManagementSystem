<?php
// dati per connessione al db
// di solito di chiama il file config.php

$config = [
    'mysql_host' => 'localhost',
    'mysql_user' => 'root',
    'mysql_password' => '',
    'mysql_database' => 'testphp1',
    'numberRecord' => 10,
    'recordPerPageOptions' => [
      5,10,20,30,50,100
    ],
    'orderByColumns' => [
      'UserID', 'UserName', 'UserCodiceFiscale', 'UserEmail', 'UserEta'
    ],
    'numLinkNavigator'=> 5,
  ];
?>
