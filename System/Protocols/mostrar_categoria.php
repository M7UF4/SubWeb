<?php
    require_once('../Classes/Categoria.php');
    $Categoria = new Categoria();
    
        //Mostrar categoria a la BD.
        $rtn = $Categoria->view_all();
        //var_dump($rtn);
        echo json_encode($rtn);
?>