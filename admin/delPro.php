<?php

    include "../System/errors.php";
    require_once('../System/Classes/Producte.php');
    
     $var = $_GET['delPro'];
     $Producte=new Producte();
     $Producte->delete($var);
     header('Location: product.php');
 ?>