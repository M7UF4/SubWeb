<?php
    $id_subhasta = 1;
    require_once(__DIR__.'/System/Classes/Licitacio.php'); 
    $licitacio = new Licitacio();
    $licitacio->verificar_guanyador($id_subhasta);
    $lici = "".$licitacio->getId_Licitacio().", ".$licitacio->getId_Subasta().", ".$licitacio->getId_Usuari().", ".$licitacio->getValor();

    echo 'Felicitats! Has sigut el guanyador en la subhasta del producte '.$licitacio->getId_Producte().' amb la licitació de '.$licitacio->getValor().'<br><br>';
        
