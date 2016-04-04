
<form method="POST" name="myForm" action="System/Protocols/registrarUsuari.php" onsubmit="return validateForm()">
    <div class="form-content"> 
        <div class="input-1">
            <input class="input" id="user" placeholder="Usuari *" type="hidden" name="user" maxlength="32" disabled>
        </div>
        <div class="input-2">
            <input class="input" id="pass" placeholder="Contrasenya *" value="" type="password" name="pass" maxlength="16" >
            <input class="input" id="pass2" placeholder="Repeteix Contrasenya *" value="" type="password" name="pass2" maxlength="16" >
        </div>
        <div class="input-1">
            <div id="alertpass"></div>
        </div>
        <div class="input-1">
            <input id="logbutton" type="submit" value="Envia">
        </div>
    </div>
</form>

