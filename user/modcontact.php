<!-- Header content box -->
<?php 
$title='Modifica la direcció';
$migas='#Inici|../index.php#Configuració|index.php#Direcció Principal';
include "../Public/layouts/menu.php";?>

<!-- Content body -->
<!-- Body box -->
<div class="user-box">
    <!--Content Box -->
    <div class="user-content">
        <div class="user-title"><a href="../user/"><span class="sb-return"><i class="fa fa-angle-left sb-return-icon"></i></span></a><h3>Cambia la direcció</h3></div>
        <form method="POST" name="myForm" action="../System/Protocols/Usuari_Contact.php">
            <div class="user-info">
                <div class="input-1">
                    <input class="input" id="adreça" placeholder="Adreça" type="text" name="adreca" maxlength="32">
                </div>
            </div>
            <div class="user-info">
                <div class="input-2">
                    <input class="input" id="pais" placeholder="Pais" value="" type="text" name="pais" maxlength="32">
                    <input class="input" id="poble" placeholder="Poble" value="" type="text" name="poble" maxlength="32">
                </div>
            </div>
            <div class="user-info">
                <div class="input-2">     
                    <input class="input" id="provincia" placeholder="Província" value="" type="text" name="provincia" maxlength="32">
                    <input class="input" id="postal" placeholder="Codi postal" value="" type="text" name="postal" maxlength="5">
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

