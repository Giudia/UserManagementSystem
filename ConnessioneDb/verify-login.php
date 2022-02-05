<?php

session_start();
require_once 'function.php';

    if(!empty($_POST)){
        //Occorre verificare che la richiesta di login provenga dal nosto sito e non da un altro.
        //Con un token salvato in sessione che deve coincidere
        //  echo $_SESSION['csrf'];

        $token = $_POST['_csrf'] ?? '';
        $email =  $_POST['UserEmail'] ?? '';
        $password =  $_POST['UserPassword'] ?? '';

        $result = [];
        $result = verify_login($email, $password, $token);


    }else{
        //se non ho passato dati indirizzo l'utente verso la login
        header('location: login.php');
    }

    
?>