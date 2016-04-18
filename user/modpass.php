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
        <form method="POST" name="myForm" action="../System/Protocols/Usuari_Pass.php" onsubmit="return validateForm()">
            <div class="user-info">
                <div class="input-1">
                    <input class="input" id="valpass" placeholder="Contrasenya actual *" value="" type="password" name="oldpass" maxlength="16" required>
                </div>
            </div>
            <div class="user-info">
                <div class="input-2">
                    <input class="input" id="pass" placeholder="Contrasenya nova *" value="" type="password" name="pass" maxlength="16" required >
                    <input class="input" id="pass2" placeholder="Repeteix la contrasenya nova *" value="" type="password" name="pass2"  maxlength="16" required>
                </div>
                <div class="input-1">
                    <div id="alertpass"></div>
                </div>
                
            </div>
            <div class="user-info input-1">
                <div id="infomsg">
                    <i style='color:red;' class="fa fa-exclamation-triangle" aria-hidden="true"></i> Ha de tenir un minim de sis caracters amb almenys un número, una lletra majuscula i una minuscula.
                </div>
            </div>
            <div style="border:none;" class="user-info" >
                <div class="input-1">
                    <input id="logbutton" type="submit" value="Envia">
                </div>
                <div class="input-1">
                    <div id="alertfail"></div>
                </div>
            </div>
        </form>
    </div> 
</div>
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?> 
<script>
$( document ).ready(function() {
    <?php 
        echo 'val_user = "'.$value['user'].'";';
    ?>
    flag_valpass = false;
    flag_pass = false;
    flag = false;
    console.log( "ready! "+val_user );
    $("#pass").blur(function () {
        testpass(false);
    });
    $("#pass2").blur(function () {
        testpass(true);
    });
});
function valpass(){
    var user = val_user;
    var pass = document.getElementById('valpass').value;
    var parametros = {
        "user" : user,
        "pass" : pass
    };
    $.ajax({
        data:  parametros,
        type: "POST",
        url: "../System/Protocols/Usuari_Validate.php",
        success: function (response) {
            if(response === "fail"){
                flag_valpass = false;
                var fail = "<div class='alert' role='alert'>Error al cambiar la contrasenya</div>";
                $('#alertfail').empty().append(fail);
            }else if(response === "succes"){
                flag_valpass = true;
                $('#alertfail').empty();
            }
        }
    });
}
function testpass(opc){
    var valpass = document.getElementById('valpass').value;
    var pass = $("#pass").val();
    var pass2 = $("#pass2").val();
    if((pass != valpass && pass.length >= 6 && pass != null && !/^\s+$/.test(pass) && /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/.test(pass)) || (pass2 != valpass && pass2.length >= 6 && pass2 != null && !/^\s+$/.test(pass2) && /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/.test(pass2))){
        $('#alertpass').empty();
        if(pass == pass2){
            $('#alertpass').empty();
            flag_pass = true;
        }else{
            if(opc || flag){
                flag = true;
                var fail = "<div class='alert' role='alert'>Les contrasenyes no coincideixen.</div>";
                $('#alertpass').empty().append(fail);
            }
            flag_pass = false;
        }
    }else{
        var fail = "<div class='alert' role='alert'>El format de la contrasenya no és vàlid o es igual que l'anterior.</div>";
        $('#alertpass').empty().append(fail);
        flag_pass = false;
    }
}
function finaltest(){
    if(flag_pass != false && flag_valpass != false){
        return true;
    }else{
        return false;
    }
}
function validateForm() {
    testpass(true);
    valpass();
    if(!finaltest()){
        return false;
    }
}
</script>
