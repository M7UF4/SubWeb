<!-- Header content box -->
<?php 
$title='Login';
$migas='#Inici|index.php#Login';
include "Public/layouts/menu.php";?>

<!-- Content body -->
<script>
    function loginsend(){
            var user = document.getElementById('user').value;
            var pass = document.getElementById('pass').value;
            var parametros = {
                "user" : user,
                "pass" : pass
            };
            $.ajax({
                data:  parametros,
                type: "POST",
                url: "System/Protocols/loginUsuari.php",
                success: function (response) {
                    if(response === "fail"){
                        var fail = "<div class='alert' role='alert'>Les dades d'identificació no son correctes</div>";
                        $('#alertfail').empty().append(fail);
                    }else if(response === "succes"){
                        window.location.href = 'user/panel.php';
                    }
                }
            });
        }
</script>
<!-- Body box -->
<div class="body-box">
    <!-- Login content box -->
    <div class="content-title">
        SubWeb Login
    </div>
    <div class="content-body">
        <form>
            <div class="form-content"> 
                <div class="input-1">
                    <input class="input" id="user" placeholder="Usuari" value="" type="text" name="user" maxlength="16"  autofocus required>
                </div>
                <div class="input-1">
                    <input class="input" id="pass" placeholder="Contrasenya" value="" type="password" name="pass" maxlength="16" required>
                </div>
                <div class="input-1">
                    <input id="logbutton" type="button" value="Login" name="login" onclick="loginsend()">
                </div>
                <div class="input-1" id="alertfail">
                </div>
            </div>       
        </form>
    </div> 
</div>
<!-- Footer content box -->
<div class="footer-box">
    ¿No estàs registrat a <span>SubWeb Online</span>? <a class="link" href="signup.php">Registrat ara »</a><br>
    ¿Necessites ajuda? <a class="link" href="mailto:info@SubWeb.com">Contacta amb el Suport de Subweb Online</a><br>
</div>

<!-- Footer content box -->
<?php //include "Public/layouts/footer.php";?>        

