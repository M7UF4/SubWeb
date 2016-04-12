<?php
require_once "config.php";
$db = new connexio();
$sql = "SELECT * FROM Categoria order by tipus asc";
$query = $db->query($sql);
?>
<script>
function ajaxpro(){
    var user = $("#user").val();
    var parametros = {
        "userName" : user
    };
    $.ajax({
        data: parametros,
        type: "POST",
        url: "System/Protocols/Usuari_Testpro.php",
        success: function (response) {
            console.log(response);
            if(response == "yes" && user != ""){
                    $('#alertuser').empty();
                    flag_user = true;
            }else{
                if(user != ""){
                    var fail = "<div class='alert' role='alert'>¡"+user+" ja existeix!.</div>";
                }else{
                    var fail = "<div class='alert' role='alert'>Introdueix un nom d'usuari.</div>";
                }
                
                $('#alertuser').empty().append(fail);
                flag_user = false;
            }
        }
    });
}
function validateForm() {
    ajaxpro();
}
</script>
<form method="POST" name="myForm" action="System/Protocols/inserir_producte.php" enctype="multipart/form-data">
    <div class="form-content"> 
        <div class="input-1">
            <input class="input" placeholder="Nom *" type="text" name="nom" >
            <input class="input" list="categoryname" autocomplete="off" placeholder="Categoria *" id="cat" type="text" name="cat" value="">
            <datalist id="categoryname">
                <?php while($obj = $query->fetch_assoc()) { ?>
                    <option value="<?php echo $obj['id_categoria']; ?>">
                    <?php echo $obj['tipus']; ?></option>
                <?php } ?>
            </datalist>
        </div>
        <div class="input-1">
            <div id="alertuser"></div>
        </div>
        <div class="input-2">
            <input class="input" id="pass" value="" type="file" name="image" >
            <input class="input" id="pass2" placeholder="preu *" value="" type="text" name="preu">
            
        </div>
        <div class="input-1">
            <div id="alertpass"></div>
        </div>
        <div class="input-2">    
            <input class="input" id="email" placeholder="Descripció *" value="" type="text" name="desc">
            <input class="input" id="email2" placeholder="Caraceristiques *" value="" type="text" name="caracter">
        </div>
        <div class="input-1">
            <div id="alertemail"></div>
        </div>
        <div class="input-1">
            <input id="logbutton" type="submit" name="submit" value="Agregar producte">
        </div>
        <p>
            Al registrar-te, acceptes les <a class="link" href="#">Condicions del Servei</a> i la <a class="link" href="#">Política de Privacitat</a>, 
            incluïnt el <a class="link" href="#">Ús de Cookies</a>.
            <!-- Altres podran trobar-te per correu electònic o per número de telèfon quan sigui proporcionat.-->
        </p>
    </div>
</form>

