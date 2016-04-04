<form method="POST" name="myForm" action="System/Protocols/registrarUsuari.php" onsubmit="return validateForm()">
    <div class="form-content"> 
        <div class="input-1">
            <input class="input" id="user" placeholder="Usuari *" type="text" name="user" maxlength="32" value="<?php echo $value['user']; ?>" >
        </div>
        <div class="input-1">
            <div id="alertuser"></div>
        </div>
        <div class="input-2">    
            <input class="input" id="email" placeholder="E-mail *" value="<?php echo $value['email']; ?>" type="text" name="email" maxlength="40" >
            <input class="input" id="email2" placeholder="Repeteix E-mail *" value="<?php echo $value['email']; ?>" type="text" name="email2" maxlength="40" >
            
        </div>
        <div class="input-1">
            <div id="alertemail"></div>
        </div>
        <div class="input-1">
            <input id="logbutton" type="submit" value="Envia">
        </div>
    </div>
</form>

