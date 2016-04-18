<?php
    include "../Errors.php";
    require_once('../Classes/Licitacio.php');
    require_once('../Classes/Subhasta.php');
    
    $idsub = $_POST['idsub'];
    $preu = $_POST['preu'];
    $idusr = $_POST['idusr'];
    $lici = $_POST["licitacions"];
        $lici=$lici+1;
        
    $licitacions = new Licitacio($idusr, $idsub, $preu);
    $licitacions->add();
    echo "ok";
    $Subhasta = new Subhasta($lici);
    //var_dump($Subhasta);
    $Subhasta->mod2($idsub);
    //header('Location: ../../admin/category.php');
?>