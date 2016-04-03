<?php
    require_once('../Classes/Usuari.php');
    //Requiered inputs
    $newSaldo = 50;
    $newUser = $_POST['user'];
    $newPass = md5($_POST['pass']);
    $newEmail = $_POST['email'];
    $newNom = $_POST['nom'];
    $newCognom = $_POST['cognom'];
    
    //optional inputs
    if($_POST['dni']== ""){ $newDni = null; }else{ $newDni = $_POST['dni'];}
    if($_POST['phone']== ""){ $newPhone = null; }else{ $newPhone = $_POST['phone'];}
    
    if($_POST['adreça']== ""){ $newAdreça = null; }else{ $newAdreça = $_POST['adreça'];}
    
    if($_POST['pais']== ""){ $newPais = null; }else{ $newPais = $_POST['pais'];}
    if($_POST['poble']== ""){ $newPoble = null; }else{ $newPoble = $_POST['poble'];}
    
    if($_POST['provincia']== ""){ $newProvincia = null; }else{ $newProvincia = $_POST['provincia'];}
    if($_POST['postal']== ""){ $newPostal = null; }else{ $newPostal = $_POST['postal'];}
    
    //Tipus d'usuari >> User = 2<<
    $newId_Tipus = 2;
    
    //Afegir Usuari a la BD.
    $newUsuari = new Usuari($newSaldo, $newUser, $newEmail, $newPass, $newNom, $newCognom, $newDni, $newPhone, $newAdreça, $newPais, $newPoble, $newProvincia, $newPostal, $newId_Tipus);
    $test = $newUsuari->add();
    
    //Comprobació de si s'ha afegit l'usuari i loggin
    if($test != false){
        $usuari = $newUsuari->verificar_login($newUser,$newPass);
        if( $usuari != null){ 
            session_start();
            $_SESSION['usuari'] = $usuari;
            header('Location: ../../index.php');
        }
    }else{
        echo '<br><form><input type="button" value="Torna atras" name="Torna atras" onclick="history.back()" /></form>';
    }
?>