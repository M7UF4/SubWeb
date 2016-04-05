<?php
    require_once('../Classes/Usuari.php');
    session_start();
    if(isset($_SESSION['usuari'])){
        $newNom = $_POST['nom'];
        $newCognom = $_POST['cognom'];

        echo $value['user'].' --> '.$newNom.' '.$newCognom;
    }else{
        header('Location: ../../index.php');
    }
?>

