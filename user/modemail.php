<!-- Header content box -->
<?php 
$title='Modifica l\'email';
$migas='#Inici|../index.php#Configuració|index.php#E-mail';
include "../Public/layouts/menu.php";?>

<!-- Content body -->
<!-- Body box -->
<div class="user-box">
    <!--Content Box -->
    <div class="user-content">
        <div class="user-title"><a href="../user/"><span class="sb-return"><i class="fa fa-angle-left sb-return-icon"></i></span></a><h3>Cambia la direcció de e-mail</h3></div>
        <form method="POST" name="myForm" action="../System/Protocols/Usuari_Email.php">
            <div class="user-info"><strong>E-mail actual:&emsp;</strong> <?php echo "<span>".$value['email']."</span>";?> </div>
            <div class="user-info">
                <div class="input-1">
                    <input class="input" id="pass" placeholder="Confirma la teva contrasenya *" value="" type="password" name="oldpass" maxlength="16" ><br>
                    <input class="input" id="email" type="hidden" name="oldemail" maxlength="40" value="<?php echo $value['email'];?>">
                </div>
            </div>
            <div class="user-info">
                <div class="input-2">    
                    <input class="input" id="email" placeholder="E-mail nou *" type="text" name="email" maxlength="40" >
                    <input class="input" id="email2" placeholder="Repeteix el e-mail nou *" type="text" name="email2" maxlength="40" >
                </div>
                <div class="input-1">
                    <div id="alertemail"></div>
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

