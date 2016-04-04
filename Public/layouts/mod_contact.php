<form method="POST" name="myForm" action="System/Protocols/registrarUsuari.php" onsubmit="return validateForm()">
    <div class="form-content"> 
        <div class="input-1">
            <input class="input" id="user" placeholder="Usuari *" type="hidden" name="user" maxlength="32" disabled>
        </div>
        <div class="input-2">
            <input class="input" id="nom" placeholder="Nom" type="text" name="nom" maxlength="32" >
            <input class="input" id="cognom" placeholder="Cognom" type="text" name="cognom" maxlength="32" >
            
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
            <input id="logbutton" type="submit" value="Envia">
        </div>
    </div>
</form>

