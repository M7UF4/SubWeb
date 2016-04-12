<!-- Header content box -->
<?php 
$title='Producte';
$migas='#Inici|../index.php#AdminPanel|index.php#Producte';
include "../Public/layouts/menu.php";
require_once('../System/Classes/Categoria.php');
$db = new connexio();
$sql = "SELECT * FROM Categoria";
$query = $db->query($sql);
?>

<!-- Content body -->
<!-- Body box -->
<div class="user-box">
    <!--Content Box -->
    <div class="user-content">
        <div class="user-title"><a href="../admin/"><span class="sb-return"><i class="fa fa-angle-left sb-return-icon"></i></span></a><h3>Product</h3></div>
        <div class="caixa caixa1">
            <form method="POST" name="myForm" action="../System/Protocols/inserir_producte.php" enctype="multipart/form-data">
                <div class="user-info">
                    <div class="input-1">
                        <input class="input" id="cat" placeholder="Nom" value="" type="text" name="nom" maxlength="30"  autofocus required>
                    </div>
                    <div class="input-1">
                        <input class="input" id="cat" list="categoryname" autocomplete="off" placeholder="Categoria" value="" type="text" name="cat" maxlength="30"  autofocus required>
                        <datalist id="categoryname">
                            <?php while($row = $query->fetch_assoc()) { ?>
                                <option value="<?php echo $row['id_categoria']; ?>">
                                <?php echo $row['tipus']; ?></option>
                            <?php } ?>
                        </datalist>
                    </div>
                    <div class="input-1">
                        <input class="input" id="cat" placeholder="Image" value="" type="file" name="image" maxlength="30"  autofocus required>
                    </div>
                    <div class="input-1">
                        <input class="input" id="cat" placeholder="Descripcio" value="" type="text" name="descripcio" maxlength="30"  autofocus required>
                    </div>
                    <div class="input-1">
                        <input class="input" id="cat" placeholder="Caracteristics" value="" type="text" name="caracter" maxlength="30"  autofocus required>
                    </div>
                    <div class="input-1">
                        <input class="input" id="cat" placeholder="Preu" value="" type="text" name="preu" maxlength="30"  autofocus required>
                    </div>
                </div>
                <div style="border:none;" class="user-info" >
                    <div class="input-1">
                        <input id="logbutton" type="submit" value="Añadir">
                    </div>
                </div>
            </form>
        </div>
        <div class="caixa caixa2">
            <ul class="row">
                <li class="cell cellid celltop">Id</li>
                <li class="cell cellcat celltop">Nom</li>
                <li class="cell cellid celltop">Imatge</li>
                <li class="cell cellcat celltop">Descripcio</li>
                <li class="cell cellcat celltop">Caracteristics</li>
                <li class="cell cellid celltop">Preu mercat</li>
                <a class="cell celldel celltop" href="#"><li><strong>&nbsp;</strong></li></a>
            </ul>
            <?php
                require_once('../System/Classes/Producte.php');
                $Producte = new Producte();
                $Producte = $Producte->view_all();
                $i = 0;
                foreach ($Producte as $row) {
                    $id = $row->getId_Producte();
                    $nom = $row->getNom();
                    $imatge = $row->getLink_img();
                    $descripcio = $row->getDescripcio();
                    $caracter = $row->getCaracteristiques();
                    $preu = $row->getPreu_Mercat();
                    
                        echo '
                        <ul class="row1">
                            <li class="cell cellid">'.$id.'&nbsp;</li>
                            <li class="cell cellcat">'.$nom.'&nbsp;</li>
                            <li class="cell cellid"><img src=../System/Protocols/product/'.$imatge.' style="width:30px;height:30px;">&nbsp;</li>
                            <li class="cell cellcat">'.$descripcio.'&nbsp;</li>
                            <li class="cell cellcat">'.$caracter.'&nbsp;</li>
                            <li class="cell cellcat">'.$preu.'&nbsp;</li>
                            <a class="cell celldel" href="delPro.php?delPro='.$id.'"><li><i class="fa fa-minus" aria-hidden="true"></i></li></a>
                        </ul>
                        ';
                    $i++;
                }
            ?>
        </div>
        
    </div> 
</div>
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?>