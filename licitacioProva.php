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
        
        <?php
        $id_pro=2;
        /*Connexio a la base de dades per carregar les subastes als divs*/
        require_once(__DIR__.'/System/Classes/Subhasta.php'); //Necessitem Subhasta
        $Subhasta = new Subhasta();
        $Subhasta=$Subhasta->view_time($id_pro); //cambiar per id_subhasta
        
        $fecha = $Subhasta->getTemps();
        
        $segundos=strtotime($fecha) - strtotime('now');
        $diferencia_dias=intval($segundos/60/60/24);
        $segundos = $segundos - ($diferencia_dias*60*60*24);
        $diferencia_horas=intval($segundos/60/60);
        $segundos = $segundos - ($diferencia_horas*60*60);
        $diferencia_minutos=intval($segundos/60);
        $segundos = $segundos - ($diferencia_minutos*60);
        
        echo "La cantidad de tiempo entre la fecha ".$fecha." y hoy ".strtotime('now')."es de <b>".$diferencia_dias."</b> dies, horas ".$diferencia_horas.", minutos ".$diferencia_minutos.", segundos ".$segundos."";
        
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