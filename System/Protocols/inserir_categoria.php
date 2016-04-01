<?php
    include "../Errors.php";
    require_once('../Classes/Categoria.php');
    
    $cat = $_POST['cat'];
    
    
    $Categoria = new Categoria();
    
        //Afegir categoria a la BD.
        $newUsuari = new Categoria($cat);
        $newUsuari->add();
        echo 'Categoria afegit Correctament!!';
?>