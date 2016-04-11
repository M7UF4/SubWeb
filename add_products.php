<!-- Header content box -->
<?php 
$title='Agregar producte';
$migas='#Index|index.php#Agregar producte';
include "Public/layouts/menu.php";?>


<!-- Content body -->     
<!-- Body box -->
<div class="body-box">
    <!-- Login content box -->
    <div class="login-title">
        SubWeb - Agregar producte
    </div>
    <div class="login-body">
        <div class="login-box">
            <?php 
            include "Public/layouts/new_product.php";
            ?>
        </div>
    </div> 
</div>

<!-- Footer content box -->
<div class="footer-box">
    Ets nou a <span>SubWeb</span>? <a class="link" href="signup.php">Registra't ara »</a><br>
    Necessites ajuda? <a class="link" href="mailto:adminmaster@SubWeb.com">Contacta amb el Suport de AniMasterOnline</a><br>
</div>
        
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?>        


