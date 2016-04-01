<?php
    include "../Errors.php";
    require_once('../Classes/Categoria.php');
    $Categoria = new Categoria();
    
        //ELiminar categoria a la BD.
        $Categoria->delete($id);
?>