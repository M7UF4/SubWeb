<!-- Header content box -->
<?php 
$title='Productes';
$migas='#Index|index.php#Producte';
include "../Public/layouts/menu.php";
?>

<!-- Content body -->
<!-- Body box -->
<div class="body-box">
    <br>
    
            <?php
                require_once('../System/Classes/Producte.php');
                    $id_pro = $_GET['idPro'];
                    $Producte=new Producte();
                    $rtn=$Producte->view_pro($id_pro);
                    //var_dump($rtn);
                $i = 0;
                foreach ($rtn as $row) {
                    $id = $row->getId_Producte();
                    $nom = $row->getNom();
                    $imatge = $row->getLink_img();
                    $descripcio = $row->getDescripcio();
                    $caracter = $row->getCaracteristiques();
                    $preu = $row->getPreu_Mercat();
                        echo '
                            <div class="detNom"><h1>'.$nom.'</h1></div>
                        <div class="caixa3">
                        <ul class="row1">
                            <li class="cell cellimg"><img src=../System/Protocols/product/'.$imatge.' style="width:300px;height:300px;">&nbsp;</li>
                            <br><li class="cell cellpreu"><b>PVP</b>: '.$preu.' $&nbsp;</li><br><br>
                            <li class="cell celldesc"><b>Descripció</b>: '.$descripcio.'&nbsp;</li><br><br>
                            <li class="cell celldesc"><b>Caracteristiques</b>: '.$caracter.'&nbsp;</li>
                                <li class="cell celldesc">'.$id.'&nbsp;</li>
                            </ul>
                        ';
                    $i++;
                }
            ?>
        </div>
<?php
        /*Connexio a la base de dades per carregar les subastes als divs*/
        require_once(__DIR__.'/../System/Classes/Subhasta.php'); //Necessitem Subhasta
        $Subhasta = new Subhasta();
        $Subhasta=$Subhasta->view_time($id_pro);
        //var_dump($Subhasta);
        $fecha = $Subhasta->getTemps();
        //var_dump($fecha);
        
        //$fecha="2016-02-14 00:00:00";
        $segundos=strtotime($fecha) - strtotime('now');
        $diferencia_dias=intval($segundos/60/60/24);
        echo "La cantidad de días entre el ".$fecha." y hoy es <b>".$diferencia_dias."</b>";
        
        ?>
<div class="oculta"></div>
<div class="puja">
    formulario
</div>
            
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?> 

