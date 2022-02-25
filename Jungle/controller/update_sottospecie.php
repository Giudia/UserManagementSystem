<?php
    require_once '../function.php';

    switch(getParms('action', null)){
        case 'save':
            $data = $_POST;
            save_sottospecie($data);
        
            header('location:../view/elenco_sottospecie.php?');
        
        case 'delete':

            $SpecieID = getParms('SpecieID');
            delete_sottospecie($SottospecieID);

            header('location:../view/elenco_sottospecie.php?');
    }

   


?>
