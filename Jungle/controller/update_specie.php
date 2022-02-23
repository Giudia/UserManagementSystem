<?php
    require_once '../function.php';

    switch(getParms('action', null)){
        case 'save':
            $data = $_POST;
            save_specie($data);
        
            header('location:../view/elenco_specie.php?');
        
        case 'delete':

            $SpecieID = getParms('SpecieID');
            delete_specie($SpecieID);

            header('location:../view/elenco_specie.php?');
    }

   


?>
