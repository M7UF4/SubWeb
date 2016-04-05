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
            <form method="POST" name="myForm" action="System/Protocols/Usuari_Email.php">
                <div class="form-content">
                    <div class="input-2">    
                        <input class="input" id="email" placeholder="E-mail nou *" type="text" name="email" maxlength="40" >
                        <input class="input" id="email2" placeholder="Repeteix el e-mail nou *" type="text" name="email2" maxlength="40" >
                    </div>
                    <div class="input-1">
                        <div id="alertemail"></div>
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

