<!-- Header content box -->
<?php include "Public/layouts/menu.php";?>

<!-- Content body -->    
<!-- Body box -->
<div class="body-box">
    <!-- Login content box -->
    <div class="login-title">
        SubWeb Login
    </div>
    <div class="login-body">
        <div class="login-box">
            <form METHOD="POST" ACTION="System/Protocols/loginUsuari.php">
                <table align="center" BORDER=0>
                    <TR>
                        <TD>
                            <input class="input" id="user" placeholder="Usuari" value="" type="text" name="user" maxlength="16"  autofocus required>
                        </TD>
                    </TR>
                    <TR>
                        <TD>
                            <input class="input" id="pass" placeholder="Contrasenya" value="" type="password" name="pass" maxlength="16" required>
                        </TD>
                    </TR>
                    <TR>
                        <TD>
                            <input class="input" id="logbutton" type="submit" value="Login" name="login">
                        </TD>
                    </TR>
                </table>
            </form>
        </div>
    </div> 
</div>
        
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?>        

