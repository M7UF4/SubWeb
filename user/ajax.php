<?php 
$title='Productes';
$migas='#Index|index.php#Producte';
include "../Public/layouts/menu.php";
?>
<?php
include "../System/config.php";
$saldo=$value['saldo'];
$valor=$_POST['valor'];
if($saldo<$valor){
    //echo "no saldo";
    echo "<script>alert('No suficiente saldo.<br>Compras mas puntos o pagas desde paypal.')</script>";
    echo "<script>window.open('facturaProva.php','_self')</script>";
}
else{
$completada = 1;
$idsub = 4;
$db = new connexio();
$db->query("UPDATE Factura SET comprat='$completada' where id_subhasta='$idsub'");
$db->close();
echo "<script>alert('Gracies per la teva compra.')</script>";
echo "<script>window.open('facturaProva.php','_self')</script>";
    }
?>