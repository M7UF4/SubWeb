<?php 
$title='Factures';
$migas='#Index|index.php#Factures';
include "../Public/layouts/menu.php";
?>
<div class="user-box">
    <br>
    <!--user menu Box -->
    <div class="user-menu">
        <ul>
            <li><a href="../user">Info</a></li>
            <li><a href="licitacions.php">Licitacions</a></li>
            <li class='um-active'><a href="factures.php">Factures</a></li>
            <li><a href="tenda.php">Tenda</a></li>
            <?php
            echo '<li class="um-coin"><a href="tenda.php">'.$value['saldo'].'&nbsp;<i class="fa fa-star-o"></i></a></li>';
            ?>
        </ul>
    </div>
    <div class="user-content">
        <div class="user-title"><h3>Llista d'apostes guanyades</h3></div>
        <div class="user-info">
            <table class="row" style="width:40%; margin: auto;">
                        <tr>
                            <td width=290px><h4>Producte</h4></td>
                            <td width=85px><h4>Valor</h4></td>
                            <td></td>
                        </tr>
                        </table>
<?php
include_once "../System/config.php";
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
                
                echo '<table class="row2" style="width:40%; margin: auto;">
                        <tr>
                            <td width=310px><h4>'.ucfirst($proNom).'</h4></td>
                            <td width=85px><h4>'.$valor.'</h4></td>';
                if($comprat != 1){
                    echo '<td><form action="pagar.php" method="post">
                                <input type="hidden" name="valor" value="'.$valor.'">
                                <input type="hidden" name="idsub" value="'.$idSub.'">
                                <input type="submit" class="start" name="submit" value="Pagar ahora">
                            </form><td>';
                    
                }else{
                    echo '<td><form action="recibo.php" method="post">
                                <input type="hidden" name="nom" value="'.ucfirst($proNom).'">
                                <input type="hidden" name="valor" value="'.$valor.'">
                                <input type="hidden" name="usernom" value="'.$value['user'].'">
                                <input type="hidden" name="email" value="'.$value['email'].'">
                                <input type="submit" class="start" name="submit" value="Imprimir rebut">
                            </form><td>';
                }
                echo '</tr>
                        </table>';
    }
    }
?>

<?php include "../Public/layouts/footer.php"; ?> 
        </div>
        </div></div>