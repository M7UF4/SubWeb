<!-- Header content box -->
<?php 
$title='Category';
$migas='#Inici|../index.php#AdminPanel|index.php#Category';
include "../Public/layouts/menu.php";?>

<!-- Content body -->
<!-- Body box -->
<div class="user-box">
    <!--Content Box -->
    <div class="user-content">
        <div class="user-title"><a href="../admin/"><span class="sb-return"><i class="fa fa-angle-left sb-return-icon"></i></span></a><h3>Category</h3></div>
        <div class="caixa caixa1">
            <form method="POST" name="myForm" action="../System/Protocols/inserir_categoria.php">
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
                <li class="cell">Id_Categoria</li>
                <li class="cell">Nom</li>
                <li class="cell">&nbsp;</li>
                <li class="cell">&nbsp;</li>
            </ul>
            <?php
                require_once('../System/Classes/Categoria.php');
                $category = new Categoria();
                $result = $category->view_all();
                $i = 0;
                foreach ($result as $row) {
                    var_dump($row);
                    echo '<br><br>';
                    if ( $i%2 == 0){
                    }else{
                        
                    }
                    $i++;
                }
            ?>
        </div>
        
    </div> 
</div>
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?>