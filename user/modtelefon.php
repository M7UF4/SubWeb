<!-- Header content box -->
<?php 
$title='Modifica l\'email';
$migas='#Inici|../index.php#Configuració|index.php#E-mail';
include "../Public/layouts/menu.php";
if( $value['phone'] != ""){
    header('Location: index.php');
}
?>

<!-- Content body -->
<!-- Body box -->
<div class="user-box">
    <!--Content Box -->
    <div class="user-content">
        <div class="user-title"><a href="../user/"><span class="sb-return"><i class="fa fa-angle-left sb-return-icon"></i></span></a><h3>Modifica el teu telefon</h3></div>
        <form method="POST" name="myForm" action="../System/Protocols/Usuari_Phone.php">
            <div class="user-info">
                <div class="input-1">    
                    <input class="input" id="phone" placeholder="Telefon *" value="" type="text" name="phone" maxlength="16" >
                </div>
                <div class="input-1">
                    <div id="alertphone"></div>
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

