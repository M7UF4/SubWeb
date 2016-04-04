<!-- Header content box -->
<?php 
$title='Registre';
$migas='#Inici|index.php#Registre#Otra|otra.php';
include "Public/layouts/menu.php";?>

<!-- Content body -->
<!-- Body box -->
<div class="body-box">
    <!-- Login content box -->
    <div class="content-title">
        Uneix-te avui a SubWeb Online
    </div>
    <div class="content-body">
            <?php include "Public/layouts/registre.php";?>
    </div>
</div>

<!-- Footer content box -->
<div class="footer-box">
    ¿Ja estàs registrat a <span>SubWeb Online</span>? <a class="link" href="login.php">Accedeix ara »</a><br>
    ¿Necessites ajuda? <a class="link" href="mailto:info@SubWeb.com">Contacta amb el Suport de Subweb Online</a><br>
</div>

<!-- Footer content box -->
<?php //include "Public/layouts/footer.php";?> 
