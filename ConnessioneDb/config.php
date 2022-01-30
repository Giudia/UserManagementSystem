<?php
// dati per connessione al db
// di solito di chiama il file config.php

//Leggo dal file ini il valore (di solito molto alto)
//Viene espresso in M o G, quindi va convertito in B
$max_ini_file = ini_get('upload_max_filesize');
$mega = 1024;
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
    'mysql_database' => 'testphp1',
    'numberRecord' => 10,
    'recordPerPageOptions' => [
      5,10,20,30,50,100
    ],
    'orderByColumns' => [
      'UserID', 'UserName', 'UserCodiceFiscale', 'UserEmail', 'UserEta'
    ],
    'numLinkNavigator'=> 5,
    //Leggo la dimensione massima impostata dal file INI
    'max_ini_file' => $max_ini_file,
    'avatar_dir' => $_SERVER['DOCUMENT_ROOT'].'/avatar/',
    'web_avatar_dir' => '/avatar/',
    'thumbnail_width' => 200,
    'preview_width' => 600,
  ];

?>
