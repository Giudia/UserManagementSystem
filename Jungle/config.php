<?php
// dati per connessione al db
// di solito di chiama il file config.php

//Leggo dal file ini il valore (di solito molto alto)
//Viene espresso in M o G, quindi va convertito in B
$max_ini_file = ini_get('upload_max_filesize');
$mega = 1024*1024;
$giga = $mega*1024;

//Cerco se nel testo è presente G o M
if (stristr($max_ini_file,'G')){
  $max_ini_file = intval($max_ini_file) * $giga;
}
if (stristr($max_ini_file,'M')){
  $max_ini_file = intval($max_ini_file) * $mega;
}

$config = [
    'mysql_host' => 'localhost',
    'mysql_user' => 'root',
    'mysql_password' => '',
    'mysql_database' => 'jungle',
    'max_ini_file' => $max_ini_file
  ];

?>
