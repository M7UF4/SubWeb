<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Licitacions</title>
    </head>
    <body>
        <form name="formulario" method="post" action="System/Protocols/Licitacio_apostar.php">
            <p> INSERIR UNA LICITACIÓ </p>
            id licitació: <input type="number" name="id_licitacio" value=""><br/> <br/>
            id producte: <input type="number" name="id_producte" value=""><br/> <br/>
            id user: <input type="number" name="id_user" value=""><br/> <br/>
            aposta en credits: <input placeholder="Triskens" type="text" name="aposta" value="" onkeypress="return aceptNum(event)" onpaste="return false;"><br/> <br/>
            <input value="Pujar" type="submit" />
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
<script>
    var nav4 = window.Event ? true : false;
    function aceptNum(evt){
        var key = nav4 ? evt.which : evt.keyCode;
        return (key <= 13 || (key>= 48 && key <= 57));
    }
</script>