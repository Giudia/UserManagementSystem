<?php
    require_once '../function.php';

    switch(getParms('action', null)){
        case 'save':
            $data = $_POST;
            save_venditore($data);
        
            header('location:../view/elenco_venditori.php?');
        
        case 'delete':

            $VenditoreID = getParms('VenditoreID', NULL);
            delete_venditore($VenditoreID);

            header('location:../view/elenco_venditori.php?');
    }

   


?>