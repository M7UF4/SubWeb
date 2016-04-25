<?php
    session_start();
    if(isset($_SESSION['usuari'])){
        $value=$_SESSION['usuari'];
        //var_dump($value);
    }
    require_once('../Classes/Licitacio.php');
    require_once('../Classes/Subhasta.php');
    require_once('../Classes/Usuari.php');
    
    $idsub = $_POST['idsub'];
    $preu = $_POST['preu'];
    $iduser = $value['id_usuari'];
    $user = $value['user'];
    //var_dump($value);
    $lici = $_POST["licitacions"];
    $temps = $_POST["temps"];
        $lici=$lici+1;
    $saldo = $value['saldo'];
    if ($saldo - 50 < 0){
        header('Location: ../../user/tenda.php');
    }else{
        $usuari = new Usuari();
        $saldo = $saldo - 50;
        $result = $usuari->modsaldo($iduser, $user, $saldo);
        if($result){
            $result = $usuari->return_user($iduser);
            if($result != "error"){
                $_SESSION['usuari'] = $result;
                $result = $licitacions = new Licitacio($iduser, $idsub, $preu);
                $licitacions->add();
                $Subhasta = new Subhasta($lici,$temps);
                $Subhasta->mod2($idsub);
                header('Location: ../../user/licitacions.php');
            }
        }
    }
     
    
        
        
        
    
    
?>