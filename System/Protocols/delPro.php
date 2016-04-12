<?php

    include "../errors.php";
    require_once('../Classes/Producte.php');
    
     $var = $_GET['delete_pro'];
     $Producte=new Producte();
     $Producte->delete($var);
     echo "<script>window.open('../../view_producte.php','_self')</script>";
	 
 ?>