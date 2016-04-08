<?php
    require_once('../Classes/Usuari.php');
    $user_id = $_POST['user_id'];
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    $usuari = new Usuari();
    $usuari = $usuari->verificar_login($user,$pass);
    if(!isset($_SESSION['usuari'])){ 
        if( $usuari != null){ 
            $result = $usuari->delete($user_id);
            if($result){
                echo 'succes';
            }else{
                echo 'fail';
            }
        }else{
            echo 'fail';
        } 
    }
?>

