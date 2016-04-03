<script>
$( document ).ready(function() {
    //$("#logbutton").attr('disabled','disabled');
    flag_user = false;
    flag_pass = false;
    flag_nom = false;
    flag_cognom = false;
    flag_email  = false;
    flag = false;
    flag2 = false;
    console.log( "ready!" );
});
function finaltest(){
    if(flag_user != false && flag_pass != false && flag_nom != false && flag_cognom != false && flag_email != false){
        $("#logbutton").removeAttr('disabled');
        console.log( "Send-Enabled" );
    }else{
        $("#logbutton").attr('disabled','disabled');
        console.log( "Send-Disabled" );
    }
}
function testuser(){
    var user = $("#user").val();
    if(user !== ""){
        $('#alertuser').empty();
        flag_user = true;
        console.log( "flag_user - "+flag_user );
    }else{
        var fail = "<div class='alert' role='alert'>Introdueix un nom d'usuari.</div>";
        $('#alertuser').empty().append(fail);
        flag_user = false;
    }
    finaltest();
}
function testpass(opc){
    var pass = $("#pass").val();
    var pass2 = $("#pass2").val();
    if(opc === 1){
        if(pass === pass2 && pass !== ""){
            $('#alertpass').empty();
            flag_pass = true;
            console.log( "flag_pass - "+flag_pass );
        }else{
            if(flag === true){
                var fail = "<div class='alert' role='alert'>Les contrasenyes no coincideixen.</div>";
                $('#alertpass').empty().append(fail);
            }
            flag_pass = false;
        }
    }else if(opc === 2){
        flag = true;
        if(pass === pass2 && pass !== ""){
            $('#alertpass').empty();
            flag_pass = true;
            console.log( "flag_pass - "+flag_pass );
        }else{
            var fail = "<div class='alert' role='alert'>Les contrasenyes no coincideixen.</div>";
            $('#alertpass').empty().append(fail);
            flag_pass = false;
        }
    }
    finaltest();
}
function testnom(){
    var nom = $("#nom").val();
    if(nom !== ""){
        $('#alertnom').empty();
        flag_nom = true;
        console.log( "flag_nom - "+flag_nom );
    }else{
        var fail = "<div class='alert' role='alert'>Introdueix el teu nom.</div>";
        $('#alertnom').empty().append(fail);
        flag_nom = false;
    }
    finaltest();
}
function testcognom(){
    var cognom = $("#cognom").val();
    if(cognom !== ""){
        $('#alertcognom').empty();
        flag_cognom = true;
        console.log( "flag_cognom - "+flag_cognom );
    }else{
        var fail = "<div class='alert' role='alert'>Introdueix el teu cognom.</div>";
        $('#alertcognom').empty().append(fail);
        flag_cognom = false;
    }
    finaltest();
}
function testemail(opc){
    var email = $("#email").val();
    var email2 = $("#email2").val();
    if(opc === 1){
        if(email === email2 && email !== ""){
            $('#alertemail').empty();
            flag_email = true;
            console.log( "flag_email - "+flag_email );
        }else{
            if(flag2 === true){
                var fail = "<div class='alert' role='alert'>El e-mail no coincideix.</div>";
                $('#alertemail').empty().append(fail);
            }
            flag_email = false;
        }
    }else if(opc === 2){
        flag = true;
        if(email === email2 && email !== ""){
            $('#alertemail').empty();
            flag_email = true;
            console.log( "flag_email - "+flag_email );
        }else{
            var fail = "<div class='alert' role='alert'>El e-mail no coincideix.</div>";
            $('#alertemail').empty().append(fail);
            flag_email = false;
        }
    }
    finaltest();
}

</script>
<form id="registre" method="post" action="System/Protocols/registrarUsuari.php">
    <div class="form-content"> 
        <div class="input-1">
            <input class="input" id="user" placeholder="Usuari *" type="text" name="user" maxlength="32" required onblur="testuser()">
        </div>
        <div class="input-1">
            <div id="alertuser"></div>
        </div>
        <div class="input-2">
            <input class="input" id="pass" placeholder="Contrasenya *" value="" type="password" name="pass" maxlength="16" required onblur="testpass(1)">
            <input class="input" id="pass2" placeholder="Repeteix Contrasenya *" value="" type="password" name="pass2" maxlength="16" required onblur="testpass(2)">
            
        </div>
        <div class="input-1">
            <div id="alertpass"></div>
        </div>
        <div class="input-2">    
            <input class="input" id="email" placeholder="E-mail *" value="" type="text" name="email" maxlength="40" required onblur="testemail(1)">
            <input class="input" id="email2" placeholder="Repeteix E-mail *" value="" type="text" name="email2" maxlength="40" required onblur="testemail(2)">
            
        </div>
        <div class="input-1">
            <div id="alertemail"></div>
        </div>
        <div class="input-2">
            <input class="input" id="nom" placeholder="Nom *" type="text" name="nom" maxlength="32" required onblur="testnom()">
            <input class="input" id="cognom" placeholder="Cognom *" type="text" name="cognom" maxlength="32" required onblur="testcognom()">
            
        </div>
        <div class="input-2">
            <div id="alertnom"></div>
            <div id="alertcognom"></div>
        </div>
        <div class="input-2"> 
            <input class="input" id="dni" placeholder="Dni" value="" type="text" name="dni" maxlength="9">
            <input class="input" id="phone" placeholder="Telèfon" value="" type="text" name="phone" maxlength="9">
        </div>
        <div class="input-5">
            <input class="input" id="numero" placeholder="Número" value="" type="text" name="numero" maxlength="10">
            <input class="input" id="edifici" placeholder="Edifici" value="" type="text" name="edifici" maxlength="25">
            <input class="input" id="escala" placeholder="Escala" value="" type="text" name="escala" maxlength="25">
            <input class="input" id="pis" placeholder="Pis" value="" type="text" name="pis" maxlength="2">
            <input class="input" id="porta" placeholder="Porta" value="" type="text" name="porta" maxlength="2">
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
            <input id="logbutton" type="submit" value="Registra't" >
        </div>
        <p>
            Al registrar-te, acceptes les <a class="link" href="#">Condicions del Servei</a> i la <a class="link" href="#">Política de Privacitat</a>, 
            incluïnt el <a class="link" href="#">Ús de Cookies</a>.
            <!-- Altres podran trobar-te per correu electònic o per número de telèfon quan sigui proporcionat.-->
        </p>
    </div>
</form>

