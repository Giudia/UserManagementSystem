<?php
//connessione al db

require 'config.php';


$mysqli = new mysqli(
  $config['mysql_host'],
  $config['mysql_user'],
  $config['mysql_password'],
  $config['mysql_database']);

unset($config);

?>
