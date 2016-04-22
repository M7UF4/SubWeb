<!-- Header content box -->
<?php 
$title='Configuració';
$migas='#Inici|../index.php#Configuració#Licitacions|../user/licitacions.php';
include "../Public/layouts/menu.php";
?>

<!-- Content body -->
<!-- Body box -->
<div class="user-box">
    <br>
    <!--user menu Box -->
    <div class="user-menu">
        <ul>
            <li><a href="../user">Info</a></li>
            <li class='um-active'><a href="licitacions.php">Licitacions</a></li>
            <li><a href="factures.php">Factures</a></li>
            <li><a href="tenda.php">Tenda</a></li>
            <?php
            echo '<li class="um-coin"><a href="tenda.php">'.$value['saldo'].'&nbsp;<i class="fa fa-star-o"></i></a></li>';
            ?>
        </ul>
    </div>
    <div class="user-content">
        <div class="user-title"><h3>Apostes realitzats</h3></div>
        <div class="user-info">
        <?php
            $idUsr=$value['id_usuari'];
            include_once "../System/Classes/Licitacio.php";
            include_once "../System/Classes/Subhasta.php";
            include_once "../System/Classes/Producte.php";
            $rtn = new Licitacio();
            $rtn = $rtn->view_lici($idUsr);
            //var_dump($rtn);
            echo '
                        <table class="row" style="width:50%; margin: auto;">
                        <tr>
                            <td width=194px><h4>Subhasta</h4></td>
                            <td width=210px><h4>Producte</h4></td>
                            <td width=85px><h4>Valor</h4></td>
                            <td></td>
                        </tr>
                        </table>
                ';
            
            foreach ($rtn as $row) {
            $valor = $row->getId_Subhasta();
            $idSub=$row->getId_Usuari();
            $Subhasta=new Subhasta();
            $return=$Subhasta->view_sub($idSub);
            //var_dump($rtn);
            foreach ($return as $row) {
                    $idPro=$row->getId_Producte();
                    //var_dump($idPro);
                    $Producte=new Producte();
                    $return2=$Producte->view_pro($idPro);
                    //var_dump($rtn);
                    foreach ($return2 as $row) {
                            $nom=$row->getNom();
                            //var_dump($nom);
                        }
                }
            //echo $idSub .'<br>'. $valor;
            echo '
                        <table class="row2" style="width:50%; margin: auto;">
                        <tr>
                            <td width=194px>'.$idSub.'</td>
                            <td width=210px>'.ucfirst($nom).'</td>
                            <td width=85px>'.$valor.'</td>
                            <td><a href=../proDetail.php?idSub='.$idSub.'><i class="fa fa-arrow-right" aria-hidden="true"></i></a></td>
                        </tr></table>
                ';
            }
        ?>
        </div>
    </div>
</div>
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?> 

