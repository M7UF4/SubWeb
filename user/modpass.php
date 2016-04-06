<!-- Header content box -->
<?php 
$title='Modifica la contrasenya';
$migas='#Inici|../index.php#Configuració|index.php#Contrasenya';
include "../Public/layouts/menu.php";?>

<!-- Content body -->
<!-- Body box -->
<div class="user-box">
    <!--Content Box -->
    <div class="user-content">
        <div class="user-title"><a href="../user/"><span class="sb-return"><i class="fa fa-angle-left sb-return-icon"></i></span></a><h3>Cambia la contrasenya</h3></div>
        <form method="POST" name="myForm" action="../System/Protocols/Usuari_Pass.php">
            <div class="user-info">
                <div class="input-1">
                    <input class="input" id="pass" placeholder="Contrasenya actual *" value="" type="password" name="oldpass" maxlength="16" >
                </div>
            </div>
            <div class="user-info">
                <div class="input-2">
                    <input class="input" id="pass" placeholder="Contrasenya nova *" value="" type="password" name="pass" maxlength="16" >
                    <input class="input" id="pass2" placeholder="Repeteix la contrasenya nova *" value="" type="password" name="pass2" maxlength="16" >
                </div>
                <div class="input-1">
                    <div id="alertpass"></div>
                </div>
            </div>
            <div style="border:none;" class="user-info" >
                <div class="input-1">
                    <input id="logbutton" type="submit" value="Envia">
                </div>
            </div>
        </form>
    </div> 
</div>
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?> 

