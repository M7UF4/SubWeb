<?php

    include "../System/errors.php";
    require_once('../System/Classes/Categoria.php');
    
     $var = $_GET['delCat'];
     $Categoria=new Categoria();
     $Categoria->delete($var);
     header('Location: category.php');
 ?>