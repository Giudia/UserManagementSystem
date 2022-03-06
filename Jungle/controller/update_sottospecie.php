<?php
    require_once '../function.php';

    switch(getParms('action', null)){
        case 'save':
            $data = $_POST;
            save_sottospecie($data);
        
            header('location:../view/elenco_sottospecie.php?');
        
        case 'delete':

            $SottospecieID = getParms('SottospecieID');
            delete_sottospecie($SottospecieID);

            header('location:../view/elenco_sottospecie.php?');
    }

   


?>
