<?php 
    require_once('../Classes/Subhasta.php');
    
    //Ejemplo aprenderaprogramar.com
    $id = $_POST['idsub'];
    $id_producte = $_POST['producte'];
    $time = $_POST['time'];
    $licitacions = 0;
    
    //Afegir Licitacio a la BD.
    $Subhasta = new Subhasta($id,$id_producte, $licitacions, $time);
    $Subhasta->mod();
    header('Location: ../../admin/subhasta.php');
    
