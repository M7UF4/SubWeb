<!-- Header content box -->
<?php 
$title='Modifica la direcció';
$migas='#Inici|../index.php#Configuració|index.php#Direcció Principal';
include "../Public/layouts/menu.php";?>

<!-- Content body -->
<!-- Body box -->
<div class="body-box">
    <!-- Login content box -->
    <div class="content-title">
        Modifica el teu usuari!!
    </div>
    <div class="content-body">
        <form method="POST" name="myForm" action="System/Protocols/direccioUsuari.php">
            <div class="form-content"> 
                <div class="input-1">
                    <input class="input" id="user" placeholder="Usuari *" type="hidden" name="user" maxlength="32" disabled>
                </div>
                <div class="input-1">
                    <input class="input" id="adreça" placeholder="Adreça" type="text" name="adreça" maxlength="32">
                </div>
                <div class="input-2">
                    <input class="input" id="pais" placeholder="Pais" value="" type="text" name="pais" maxlength="32">
                    <input class="input" id="poble" placeholder="Poble" value="" type="text" name="poble" maxlength="32">
                </div>
                <div class="input-2">     
                    <input class="input" id="provincia" placeholder="Província" value="" type="text" name="provincia" maxlength="32">
                    <input class="input" id="postal" placeholder="Codi postal" value="" type="text" name="postal" maxlength="5">
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

