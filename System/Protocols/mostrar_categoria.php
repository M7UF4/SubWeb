<?php
    include "../Errors.php";
    require_once('../Classes/Categoria.php');
    $Categoria = new Categoria();
    
        //Mostrar categoria a la BD.
        $rtn = $Categoria->view_all();
        echo json_encode($rtn);
?>