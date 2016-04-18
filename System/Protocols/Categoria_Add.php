<?php
    include "../Errors.php";
    require_once('../Classes/Categoria.php');
    
    $cat = $_POST['cat'];
        
    $Categoria = new Categoria();
    $newCategoria = new Categoria($cat);
    $newCategoria->add();
    header('Location: ../../admin/category.php');
?>