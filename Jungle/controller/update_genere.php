<?php
    require_once '../function.php';

    switch(getParms('action', null)){
        case 'save':
            $data = $_POST;
            save_genere($data);
        
            header('location:../view/elenco_genere.php?');
        
        case 'delete':

            $GenereID = getParms('GenereID');
            delete_genere($GenereID);

            header('location:../view/elenco_genere.php?');
    }

   


?>
