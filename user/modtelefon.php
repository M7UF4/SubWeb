<!-- Header content box -->
<?php 
$title='Modifica l\'email';
$migas='#Inici|../index.php#Configuració|index.php#E-mail';
include "../Public/layouts/menu.php";?>

<!-- Content body -->
<!-- Body box -->
<div class="body-box">
    <!-- Login content box -->
    <div class="content-title">
        Modifica el teu usuari!!
    </div>
    <div class="content-body">
            <form method="POST" name="myForm" action="System/Protocols/phoneUsuari.php">
                <div class="form-content"> 
                    <div class="input-1">
                        <input class="input" id="user" placeholder="Usuari *" type="hidden" name="user" maxlength="32" value="<?php echo $value['user']; ?>">
                    </div>
                    <div class="input-1">    
                        <input class="input" id="phone" placeholder="Telefon *" value="" type="text" name="phone" maxlength="16" >
                        
                    </div>
                    <div class="input-1">
                        <div id="alertphone"></div>
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

