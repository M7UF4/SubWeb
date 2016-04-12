<!-- Header content box -->
<?php 
$title='AdminPanel';
$migas='#Inici|../index.php#Admin Panel|index.php';
include "../Public/layouts/menu.php";?>

<!-- Content body -->
<!-- Body box  -->
<div class="user-box">
    <!--user menu Box -->
    <div class="user-menu">
        <ul>
            <li class='um-active'><a href="../user">Info</a></li>
            <li><a href="category.php">Categories</a></li>
            <li><a href="product.php">Productes</a></li>
            <li><a href="subhasta.php">Subhastes</a></li>
        </ul>
    </div>
    <!--Content Box 1 -->
    <div class="user-content">
        <div class="user-title"><h3>INFORMACIÓ</h3></div>
            <div class="user-info">
                <strong>Usuari:&emsp;</strong> 
                <?php echo "<span>".$value['user']."</span>";?> 
            </div>
            <div class="user-info"><strong>Contrasenya:&emsp;</strong> 
                <?php 
                    $passlen = strlen($value['password'])/3;
                    $passhid= "";
                    for($i = 0; $i<=$passlen; $i++){
                        $passhid = $passhid."*";
                    }
                    echo "<span>".$passhid."</span>";
                ?>
            </div>
            <div class="user-info"><strong>E-mail:&emsp;</strong> 
                <?php 
                    echo "<span>".$value['email']."</span>";
                ?> 
            </div>
    </div>
    
    <!--Content Box 2 -->
    <div class="user-content">
        <div class="user-title"><h3>Eines</h3></div>
        <a href="/phpmyadmin">
            <div class="user-info">
                <strong>PhpMyAdmin</strong> 
                <i class="fa fa-chevron-right"></i>
            </div>
        </a>
        <a href="#">
            <div class="user-info"><strong>#</strong> 
                <i class="fa fa-chevron-right"></i>
            </div>
        </a>
        <a href="#">
            <div class="user-info"><strong>#</strong> 
                <i class="fa fa-chevron-right"></i>
            </div>
        </a>
        <a href="#">
            <div class="user-info"><strong>#</strong> 
                <i class="fa fa-chevron-right"></i>
            </div>
        </a>
    </div> 
</div>
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?> 