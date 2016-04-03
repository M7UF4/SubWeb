<script>
$( document ).ready(function() {
    //$("#logbutton").attr('disabled','disabled');
    flag_user = false;
    flag_pass = false;
    flag_email  = false;
    flag = false;
    flag2 = false;
    console.log( "ready!" );
    $("#user").blur(function () {
        ajaxuser();
    });
    $("#pass").blur(function () {
        testpass();
    });
    $("#pass2").blur(function () {
        testpass(true);
    });
    $("#email").blur(function () {
        testemail();
    });
    $("#email2").blur(function () {
        testemail(true);
    });
});

function finaltest(){
    if(flag_user != false && flag_pass != false && flag_email != false){
        return true;
    }else{
        return false;
    }
}
function ajaxuser(){
    var user = $("#user").val();
    var parametros = {
        "userName" : user
    };
    $.ajax({
        data: parametros,
        type: "POST",
        url: "System/Protocols/userTest.php",
        success: function (response) {
            console.log(response);
            if(response == "yes" && user != ""){
                    $('#alertuser').empty();
                    flag_user = true;
            }else{
                if(user != ""){
                    var fail = "<div class='alert' role='alert'>¡"+user+" ja existeix!.</div>";
                }else{
                    var fail = "<div class='alert' role='alert'>Introdueix un nom d'usuari.</div>";
                }
                
                $('#alertuser').empty().append(fail);
                flag_user = false;
            }
        }
    });
}
function testpass(opc){
    var pass = $("#pass").val();
    var pass2 = $("#pass2").val();
    if(pass === pass2 && pass !== ""){
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
}
function testemail(opc){
    var email = $("#email").val();
    var email2 = $("#email2").val();
    if(email === email2 && email !== ""){
        $('#alertemail').empty();
        flag_email = true;
    }else{
        if(opc || flag2){
            flag2 = true;
            var fail = "<div class='alert' role='alert'>El e-mail no coincideix.</div>";
            $('#alertemail').empty().append(fail);
        }
        flag_email = false;
    }
    
}
function validateForm() {
    ajaxuser();
    testpass(true);
    testemail(true);
    if(!finaltest()){
        return false;
    }
}
</script>
<form method="POST" name="myForm" action="System/Protocols/registrarUsuari.php" onsubmit="return validateForm()">
    <div class="form-content"> 
        <div class="input-1">
            <input class="input" id="user" placeholder="Usuari *" type="text" name="user" maxlength="32" >
        </div>
        <div class="input-1">
            <div id="alertuser"></div>
        </div>
        <div class="input-2">
            <input class="input" id="pass" placeholder="Contrasenya *" value="" type="password" name="pass" maxlength="16" >
            <input class="input" id="pass2" placeholder="Repeteix Contrasenya *" value="" type="password" name="pass2" maxlength="16" >
            
        </div>
        <div class="input-1">
            <div id="alertpass"></div>
        </div>
        <div class="input-2">    
            <input class="input" id="email" placeholder="E-mail *" value="" type="text" name="email" maxlength="40" >
            <input class="input" id="email2" placeholder="Repeteix E-mail *" value="" type="text" name="email2" maxlength="40" >
            
        </div>
        <div class="input-1">
            <div id="alertemail"></div>
        </div>
        <div class="input-2">
            <input class="input" id="nom" placeholder="Nom" type="text" name="nom" maxlength="32" >
            <input class="input" id="cognom" placeholder="Cognom" type="text" name="cognom" maxlength="32" >
            
        </div>
        <div class="input-2">
            <div id="alertnom"></div>
            <div id="alertcognom"></div>
        </div>
        <div class="input-2"> 
            <input class="input" id="dni" placeholder="Dni" value="" type="text" name="dni" maxlength="9">
            <input class="input" id="phone" placeholder="Telèfon" value="" type="text" name="phone" maxlength="9">
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
            <input id="logbutton" type="submit" value="Registra't">
        </div>
        <p>
            Al registrar-te, acceptes les <a class="link" href="#">Condicions del Servei</a> i la <a class="link" href="#">Política de Privacitat</a>, 
            incluïnt el <a class="link" href="#">Ús de Cookies</a>.
            <!-- Altres podran trobar-te per correu electònic o per número de telèfon quan sigui proporcionat.-->
        </p>
    </div>
</form>

