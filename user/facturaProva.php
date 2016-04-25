<?php 
$title='Productes';
$migas='#Index|index.php#Producte';
include "../Public/layouts/menu.php";
?>

<?php
include "../System/config.php";
$idUsr=$value['id_usuari'];

$db=new connexio();
$sql = "SELECT * FROM Factura where id_usuari='$idUsr'";
$result = mysqli_query($db, $sql);
    while($row = mysqli_fetch_array($result)){
            $idUsr= $row['id_usuari'];
            $idPro= $row['id_producte'];
            $idSub= $row['id_subhasta'];
            $valor= $row['valor'];
            $comprat = $row['comprat'];
            
            $sql2 = "SELECT * FROM Producte where id_producte='$idPro'";
            $result2 = mysqli_query($db, $sql2);
            while($row2 = mysqli_fetch_array($result2)){
                $proNom=$row2['nom'];
                
                echo $idSub." ".$proNom." ".$valor." ";
                if($comprat != 1){
                    echo '<button id="start">Pagar ahora</button>';
                    echo '<div id="panpujaform" style="display:none;">
                            <form action="ajax.php" method="post">
                                <input type="hidden" name="valor" value="'.$valor.'">
                                <input id="logbutton1" type="submit" name="submit" value="Puntos">
                            </form>
                                <input id="logbutton2" type="submit" name="submit" value="Paypal">
                          </div>';
                }else{
                    echo '<a href=recibo.php><i class="fa fa-file-pdf-o" aria-hidden="true"><i></a>';
                }
    //echo $idPro.$idSub.$idUsr.$valor.$comprat;
    }
    }
    
?>

<?php include "../Public/layouts/footer.php"; ?>
<script>
    $(document).ready(function() {
    $("#start").click(function() {
        $("#panpujaform").show();
    });
    $("#logbutton1").click(function() {
        $("#panpujaform").hide();
    });
    $("#logbutton2").click(function() {
        $("#panpujaform").hide();
    });
});
</script>  