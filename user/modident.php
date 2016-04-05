<!-- Header content box -->
<?php 
$title='Modifica l\'identitat';
$migas='#Inici|../index.php#Configuració|index.php#Identitat';
include "../Public/layouts/menu.php";?>

<!-- Content body -->
<!-- Body box -->
<div class="body-box">
    <!-- Login content box -->
    <div class="content-title">
        Modifica la teva identitat
    </div>
    <div class="content-body">
        <form method="POST" name="myForm" action="System/Protocols/Usuari_Identity.php">
            <div class="form-content"> 
                <div class="input-1">
                    <input class="input" id="user" placeholder="Usuari *" type="hidden" name="user" maxlength="32" value="<?php echo $value['user']; ?>">
                </div>
                <div class="input-2">
                    <input class="input" id="nom" placeholder="Nom" type="text" name="nom" maxlength="32" >
                    <input class="input" id="cognom" placeholder="Cognom" type="text" name="cognom" maxlength="32" >
                </div>
                <div class="input-1">
                    <input id="logbutton" type="submit" value="Envia">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?> 


