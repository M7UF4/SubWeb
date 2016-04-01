<form id="registre" method="post" action="System/Protocols/registrarUsuari.php"> 
        <div>
            <input class="input" id="user" placeholder="Usuari *" type="text" name="user" maxlength="25" required autofocus>
        
            <input class="input" id="pass" placeholder="Contrasenya *" value="" type="password" name="password" maxlength="16" required>
            
            <input class="input" id="pass2" placeholder="Repeteix Contrasenya *" value="" type="password" name="repeatpassword" maxlength="16" required>
        </div>
        <div>
            <input class="input" id="nom" placeholder="Nom *" type="text" name="nom" maxlength="25" required autofocus>
            
            <input class="input" id="cognom" placeholder="Cognom *" type="text" name="cognom" maxlength="25" required autofocus>
        
            <input class="input" id="email" placeholder="Correu Electrònic *" value="" type="text" name="email" maxlength="30" required>
           
            <input class="input" id="phone" placeholder="Telèfon" value="" type="number" name="telefon" maxlength="9">
            
            <input class="input" id="dni" placeholder="DNI" value="" type="text" name="dni" maxlength="9">
        </div>
    <div>
        <input class="input" id="pais" placeholder="Pais" value="" type="text" name="pais" maxlength="9">
       
        <input class="input" id="poble" placeholder="Poble" value="" type="text" name="poble" maxlength="9">
       
        <input class="input" id="adreça" placeholder="Adreça" value="" type="text" name="adreça" maxlength="9">
       
        <input class="input" id="postal" placeholder="Codi postal" value="" type="number" name="postal" maxlength="9">
    </div>
            <input class="input" id="logbutton" type="submit" value="Registra't">
            
            <p>Al registrar-te, acceptes les <a class="link" href="#">Condicions del Servei</a> i la <a class="link" href="#">Política de Privacitat</a>, 
            incluïnt el <a class="link" href="#">Ús de Cookies</a>.<!-- Altres podran trobar-te per correu electònic 
            o per número de telèfon quan sigui proporcionat.--></p>
            
</form>
<LINK REL=StyleSheet HREF="Public/css/loginStyle.css" TYPE="text/css" MEDIA=screen>

