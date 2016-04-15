<!-- Header content box -->
<?php 
$title='Productes';
$migas='#Index|index.php#Producte';
include "../Public/layouts/menu.php";
?>

<!-- Content body -->
<!-- Body box -->
<div class="body-box">
    <div class="caixa3">
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
                        <ul class="row1">
                            <li class="cell cellimg"><img src=../System/Protocols/product/'.$imatge.' style="width:300px;height:300px;">&nbsp;</li>
                            <li class="cell cellid">'.$preu.'&nbsp;</li>
                            <li class="cell cellcat">'.$descripcio.'&nbsp;</li>
                            <li class="cell cellcat">'.$caracter.'&nbsp;</li>
                            <li class="cell cellcat">'.$preu.'&nbsp;</li>
                            </ul>
                        ';
                    $i++;
                }
            ?>
        </div>
</div>
            
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?> 

