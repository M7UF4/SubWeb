<?php
    include "../errors.php";
    require_once('../Classes/Producte.php');
    $var = $_GET['modPro'];
    
    $nom = $_POST['nom'];
    $cat = $_POST['cat'];
    $file = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $preu = $_POST['preu'];
    $desc = $_POST['descripcio'];
    $caracter = $_POST['caracter'];
    
    move_uploaded_file($file_tmp,"../../Public/img/productes/$file");

    $Producte = new Producte($nom, $desc, $caracter, $file, $cat, $preu);
    $Producte->mod($var);
    header('Location: ../../admin/product.php');
?>