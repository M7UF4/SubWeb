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
            <form METHOD="POST" ACTION="System/Protocols/inserir_categoria.php">
                <table align="center" BORDER=0>
                    <TR>
                        <TD>
                            <input class="input" id="cat" placeholder="DVD" value="" type="text" name="cat" maxlength="30"  autofocus required>
                        </TD>
                    </TR>
                    <TR>
                        <TD>
                            <input class="input" id="catbutton" type="submit" value="Añadir" name="categoria">
                        </TD>
                    </TR>
                </table>

            </form>
        </div>
    </div> 
</div>

<!-- Footer content box -->
<div class="footer-box">
    Ets nou a <span>SubWeb</span>? <a class="link" href="signup.php">Registra't ara »</a><br>
    Necessites ajuda? <a class="link" href="mailto:adminmaster@SubWeb.com">Contacta amb el Suport de AniMasterOnline</a><br>
</div>
        
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?>        


