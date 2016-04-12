<!-- Header content box -->
<?php 
$title='Category';
$migas='#Inici|../index.php#AdminPanel|index.php#Category';
include "../Public/layouts/menu.php";

?>

<!-- Content body -->
<!-- Body box -->
<div class="user-box">
    <!--Content Box -->
    <div class="user-content">
        <div class="user-title"><a href="../admin/"><span class="sb-return"><i class="fa fa-angle-left sb-return-icon"></i></span></a><h3>Category</h3></div>
        <div class="caixa caixa1">
            <form method="POST" name="myForm" action="../System/Protocols/Categoria_Add.php">
                <div class="user-info">
                    <div class="input-1">
                        <input class="input" id="cat" placeholder="DVD" value="" type="text" name="cat" maxlength="30"  autofocus required>
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
                <li class="cell cellcat celltop">Tipus</li>
                <li class="cell cellid celltop">Id</li>
                <a class="cell celldel celltop" href="#"><li><strong>&nbsp;</strong></li></a>
            </ul>
            <?php
                require_once('../System/Classes/Categoria.php');
                $category = new Categoria();
                $category = $category->view_all();
                $i = 0;
                foreach ($category as $row) {
                    $id = $row->getId_Categoria();
                    $tipus = $row->getTipus();
                    if ( $i%2 == 0){
                        echo '
                        <ul class="row1">
                            <li class="cell cellcat">'.$tipus.'&nbsp;</li>
                            <li class="cell cellid">'.$id.'&nbsp;</li>
                            <a class="cell celldel" href="delCat.php?delCat='.$id.'"><li><i class="fa fa-minus" aria-hidden="true"></i></li></a>
                        </ul>
                        ';
                    }else{
                        echo '
                        <ul class="row2">
                            <li class="cell cellcat">'.$tipus.'&nbsp;</li>
                            <li class="cell cellid">'.$id.'&nbsp;</li>
                            <a class="cell celldel" href="delCat.php?delCat='.$id.'"><li><i class="fa fa-minus" aria-hidden="true"></i></li></a>
                        </ul>
                        ';
                    }
                    $i++;
                }
            ?>
        </div>
        
    </div> 
</div>
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?>