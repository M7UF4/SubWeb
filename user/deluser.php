<!-- Header content box -->
<?php 
$title='Eliminar usuari';
$migas='#Inici|../index.php#Configuració|index.php#Eliminar usuari';
include "../Public/layouts/menu.php";?>

<!-- Content body -->
<!-- Body box -->
<div class="user-box">
    <!--Content Box -->
    <div class="user-content">
        <div class="user-title"><a href="../user/"><span class="sb-return"><i class="fa fa-angle-left sb-return-icon"></i></span></a><h3>Eliminar usuari</h3></div>
        <form>
            <div class="user-info">
                Estàs a punt d'esborrar permanentment el teu compte. Estàs segur / a ?
            </div>
            <div class="user-info">
                <div class="input-1">
                    <input class="input" id="valpass" placeholder="Contrasenya *" value="" type="password" name="oldpass" maxlength="16" required>
                </div>
            </div>
            <div style="border:none;" class="user-info" >
                <div class="input-1">
                    <input id="logbutton" type="button" value="Elimina">
                </div>
                <div class="user-info">
                    <label><input style="float: left;" class="input-box" id="confirm" type="checkbox" name="confirm" required>Sí, vull eliminar de forma permanent aquest compte de SubWeb i les dades que conté.</label>
                </div>
            </div>
            <div style="border:none;" class="user-info" >
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
        echo 'val_userid = "'.$value['id_usuari'].'";';
    ?>
    flag_box = false;
    console.log( "ready! ");
    $("#confirm").click(function () {
        confirmbox();
    });
    $("#logbutton").click(function () {
        validateForm();
    });
});
function valpass(){
    var user = val_user;
    var pass = document.getElementById('valpass').value;
    var parametros = {
        "user_id" : val_userid,
        "user" : user,
        "pass" : pass
    };
    $.ajax({
        data:  parametros,
        type: "POST",
        url: "../System/Protocols/Usuari_Delete.php",
        success: function (response) {
            console.log(response);
            if(response === "error1"){
                var fail = "<div class='alert' role='alert'>Contrasenya incorrecta</div>";
                $('#alertfail').empty().append(fail);
            }else if(response === "error2"){
                var fail = "<div class='alert' role='alert'>Error al eliminar l'usuari</div>";
                $('#alertfail').empty().append(fail);
            }else if(response === "succes"){
                $('#alertfail').empty();
                window.location.href = '../logout.php';
            }
        }
    });
}
function confirmbox(){
    if($("#confirm").prop('checked')){
        flag_box = true;
    }else{
        flag_box = false;
    }
}
function validateForm() {
    confirmbox();
    if(flag_box != false){
        valpass();
    }
}
</script>
