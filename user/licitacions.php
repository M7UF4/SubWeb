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
    <div class="apostes">
        <b>Apostes</b><br>
        <?php
            $idUsr=$value['id_usuari'];
            include "../System/Classes/Licitacio.php";
            $rtn = new Licitacio();
            $rtn = $rtn->view_lici($idUsr);
            //var_dump($rtn);
            foreach ($rtn as $row) {
            $idSub = $row->getId_Subhasta();
            $valor = $row->getValor();
            echo $idSub .'<br>'. $valor;
            }
        ?>
    </div>
    <div class="apostes_guanyat">
        <b>Apostes guanyat</b><br>
    </div>
    <div class="apostes_perdut">
        <b>Apostes perdut</b><br>
    </div>
</div>
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?> 

