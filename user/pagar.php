<?php 
$title='Productes';
$migas='#Index|index.php#Producte';
include "../Public/layouts/menu.php";
?>
<?php
include_once "../System/config.php";
$saldo=$value['saldo'];
$idusr=$value['id_usuari'];
$valor=$_POST['valor'];
$idsub=$_POST['idsub'];
if($saldo<$valor){
    //echo "no saldo";
    echo "<script>alert('No tens suficient saldo.\nCompra més punts o paga des de paypal.')</script>";
    echo "<script>window.open('tenda.php','_self')</script>";
}
else{
$completada = 1;
$resta = $saldo-$valor;
$db = new connexio();
$db->query("UPDATE Factura SET comprat='$completada' where id_subhasta='$idsub'");
$db->query("UPDATE Usuari SET saldo='$resta' where id_usuari='$idusr'");
$db->close();
echo "<script>alert('Gràcies per la teva compra.')</script>";
echo "<script>window.open('factures.php','_self')</script>";
    }
?>