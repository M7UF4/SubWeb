<!-- Header content box -->
<?php 
$title='Registre';
$migas='#Inici|index.php#Registre';
include "Public/layouts/menu.php";?>

<!-- Content body -->
<!-- Body box -->
<div class="body-box">
    <!-- Login content box -->
    <div class="login-title">
        Uneix-te avui a Animaster Online
    </div>
    <div class="login-body">
        <div class="login-box">
            <?php include "Public/layouts/registre.php";?>
        </div>
    </div>
</div>

<!-- Footer content box -->
<div class="footer-box">
    ¿Ja estàs registrat a <span>AniMaster Online</span>? <a class="link" href="login.php">Accedeix ara »</a><br>
    ¿Necessites ajuda? <a class="link" href="mailto:adminmaster@Animaster.com">Contacta amb el Suport de AniMasterOnline</a><br>
</div>

<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 
