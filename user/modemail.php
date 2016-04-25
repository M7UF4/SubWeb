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
        <form method="POST" name="myForm" action="../System/Protocols/Usuari_Email.php" onsubmit="return validateForm()">
            <div class="user-info"><strong>E-mail actual:&emsp;</strong> <?php echo "<span>".$value['email']."</span>";?> </div>
            <div class="user-info">
                <div class="input-1">
                    <input class="input" id="pass" placeholder="Confirma la teva contrasenya *" value="" type="password" name="oldpass" maxlength="16" ><br>
                </div>
            </div>
            <div class="user-info">
                <div class="input-2">    
                    <input class="input" id="email" placeholder="E-mail nou *" type="text" name="email" maxlength="40">
                    <input class="input" id="email2" placeholder="Repeteix el e-mail nou *" type="text" name="email2" maxlength="40">
                </div>
                <div class="input-1">
                    <div id="alertemail"></div>
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
        echo 'val_mail = "'.$value['email'].'";';
    ?>
    flag_valpass = false;
    flag_mail = false;
    flag = false;
    console.log( "ready! "+val_user );
    $("#email").blur(function () {
        testmail(false);
    });
    $("#email2").blur(function () {
        testmail(true);
    });
    $("#pass").blur(function () {
        //valpass();
    });
});
function valpass(){
    var user = val_user;
    var pass = document.getElementById('pass').value;
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
                var fail = "<div class='alert' role='alert'>Error al cambiar la direcció de e-mail</div>";
                $('#alertfail').empty().append(fail);
            }else if(response === "succes"){
                flag_valpass = true;
                $('#alertfail').empty();
            }
        }
    });
}
function testmail(opc){
    var mail = $("#email").val();
    var mail2 = $("#email2").val();
    if((!opc && mail != val_mail && mail != null && !/^\s+$/.test(mail) && /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(mail)) || (opc && mail2 != val_mail && mail2 != null && !/^\s+$/.test(mail2) && /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(mail2))){
        $('#alertemail').empty();
        if(mail != mail2){
            if(opc || flag){
                flag = true;
                var fail = "<div class='alert' role='alert'>Els e-mails no coincideixen.</div>";
                $('#alertemail').empty().append(fail);
                flag_mail = false;
            }else{
                flag_mail = false;
            }
        }else{
            $('#alertemail').empty();
            flag_mail = true;
        }
    }else{
        var fail = "<div class='alert' role='alert'>El format del e-mail no és vàlid ó és igual que l'anterior.</div>";
        $('#alertemail').empty().append(fail);
        flag_mail = false;
    }
}
function finaltest(){
    if(flag_mail != false && flag_valpass != false){
        return true;
    }else{
        return false;
    }
}
function validateForm() {
    testmail(true);
    valpass();
    if(!finaltest()){
        return false;
    }
}
</script>
