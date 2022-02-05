<?php

session_start();

require_once 'function.php';

//controllo se l'utente è loggato
    if(isUserLoggedIn()){
        header('Location: index.php');
        exit;
    }

    if(!empty($_POST)){
        //Occorre verificare che la richiesta di login provenga dal nosto sito e non da un altro.
        //Con un token salvato in sessione che deve coincidere
        //  echo $_SESSION['csrf'];

        $token = $_POST['_csrf'] ?? '';
        $email =  $_POST['UserEmail'] ?? '';
        $password =  $_POST['UserPassword'] ?? '';

        $result = [];
        $result = verify_login($email, $password, $token);

        if($result['success']){
            //riavvio la sessione
            session_regenerate_id();

            $_SESSION['loggedin'] = true;
            unset($result['user']['UserPassword']);
            unset($_SESSION['csrf']);

            $_SESSION['userData'] = $result['user'];

            header('Location: index.php');
            exit;
        }else{
            $_SESSION['message'] = $result['message'];
            header('location: login.php');
        }

    }else{
        //se non ho passato dati indirizzo l'utente verso la login
        header('location: login.php');
    }

    
?>