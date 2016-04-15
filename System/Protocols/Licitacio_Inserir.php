<?php 
    require_once('../Classes/Subhasta.php');
    
    //Ejemplo aprenderaprogramar.com
    $id_producte = $_POST['producte'];
    $time = $_POST['time'];
    $licitacions = 0;
    
    //Afegir Licitacio a la BD.
    $Subhasta = new Subhasta($id_producte, $licitacions, $time);
    $Subhasta->add();
    header('Location: ../../admin/subhasta.php');
    
