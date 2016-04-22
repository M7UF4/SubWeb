<?php
    session_start();
    if(isset($_SESSION['usuari'])){
        $value=$_SESSION['usuari'];
        //var_dump($value);
    }
    require_once('../Classes/Licitacio.php');
    require_once('../Classes/Subhasta.php');
    
    $idsub = $_POST['idsub'];
    $preu = $_POST['preu'];
    $iduser = $value['id_usuari'];
    $lici = $_POST["licitacions"];
    $temps = $_POST["temps"];
        $lici=$lici+1;
    var_dump($iduser.' '.$idsub.' '.$preu.' ');   
    $result = $licitacions = new Licitacio($iduser, $idsub, $preu);
    echo '<br>';
    var_dump($result);
    echo '<br><br>';
    $licitacions->add();
    
    $Subhasta = new Subhasta($lici,$temps);
    //var_dump($Subhasta);
    $Subhasta->mod2($idsub);
    //header('Location: ../../user/licitacions.php');
?>