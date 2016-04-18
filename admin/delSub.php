<?php

    include "../System/errors.php";
    require_once('../System/Classes/Subhasta.php');
    
    $var = $_GET['delSub'];
    $Subhasta =new Subhasta();
    $Subhasta->delete($var);
    header('Location: subhasta.php');
 ?>