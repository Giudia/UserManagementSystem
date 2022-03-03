<?php
    session_start();
    include_once 'function.php';

    $header = strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) ?? '';
    //Controllo se ho la variabile di post valorizzata e se la chiamata arriva da ajax
    if(!empty($_POST) && $header === 'XMLHTTPREQUEST'){

        $token = $_POST['_csrf'] ?? '';
        $email =  $_POST['UserEmail'] ?? '';
        $password =  $_POST['UserPassword'] ?? '';

        $result = verify_login($email, $password, $token);

        if($result['success']){
            //riavvio la sessione
            session_regenerate_id();

            $_SESSION['loggedin'] = true;
            unset($result['user']['UserPassword']);
            unset($_SESSION['csrf']);

            $_SESSION['userData'] = $result['user'];

        }
        echo json_encode($result);
    }
?>

