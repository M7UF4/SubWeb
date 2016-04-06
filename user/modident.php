<!-- Header content box -->
<?php 
$title='Modifica l\'identitat';
$migas='#Inici|../index.php#Configuració|index.php#Identitat';
include "../Public/layouts/menu.php";

if( $value['nom'] != "" && $value['cognom'] != ""){
    //header('Location: index.php');
}
?>
<!-- Content body -->
<!-- Body box -->
<div class="user-box">
    <!--Content Box -->
    <div class="user-content">
        <div class="user-title"><a href="../user/"><span class="sb-return"><i class="fa fa-angle-left sb-return-icon"></i></span></a><h3>Modifica la teva identitat</h3></div>
        <form method="POST" name="myForm" action="../System/Protocols/Usuari_Identity.php">
            <div class="user-info">
                <div class="input-2">
                    <input class="input" id="nom" placeholder="Nom" type="text" name="nom" maxlength="32" >
                    <input class="input" id="cognom" placeholder="Cognom" type="text" name="cognom" maxlength="32" >
                </div>
                <div class="input-2">
                    <div id="alertnom"></div>
                    <div id="alertcognom"></div>
                </div>
            </div>
            <div style="border:none;" class="user-info" >
                <div class="input-1">
                    <input id="logbutton" type="submit" value="Envia">
                </div>
            </div>
        </form>
    </div> 
</div>
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?> 
<script>
$( document ).ready(function() {
    flag_nom = false;
    flag_cognom = false;
    console.log( "ready!" );
    $("#nom").blur(function () {
        testnom();
    });
    $("#cognom").blur(function () {
        testcognom();
    });
});
function testnom(){
    var nom = $("#nom").val();
    if(nom.length >= 2 && nom != null && !/^\s+$/.test(nom) && isNaN(nom) && !parseInt(nom)){
        $('#alertnom').empty();
        flag_nom = true;
    }else{
        var fail = "<div class='alert' role='alert'>Introdueix un nom!.</div>";
        $('#alertnom').empty().append(fail);
        flag_nom = false;
    }
}
function testcognom(){
    var cognom = $("#cognom").val();
    if(cognom.length >= 2 && cognom != null && !/^\s+$/.test(cognom) && isNaN(cognom) && !parseInt(cognom)){
        $('#alertcognom').empty();
        flag_nom = true;
    }else{
        var fail = "<div class='alert' role='alert'>Introdueix un cognom!.</div>";
        $('#alertcognom').empty().append(fail);
        flag_nom = false;
    }
}
function finaltest(){
    if(flag_nom != false && flag_cognom != false){
        return true;
    }else{
        return false;
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

