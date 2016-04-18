<!-- Header content box -->
<?php 
$title='Configuració';
$migas='#Inici|../index.php#Configuració#Informació|../user';
include "../Public/layouts/menu.php";?>

<!-- Content body -->
<!-- Body box -->
<div class="user-box">
    <!--user menu Box -->
    <div class="user-menu">
        <ul>
            <li><a href="../user">Info</a></li>
            <li><a href="licitacions.php">Licitacions</a></li>
            <li><a href="factures.php">Factures</a></li>
            <li class='um-active'><a href="tenda.php">Tenda</a></li>
            <?php
            echo '<li class="um-coin"><a href="tenda.php">'.$value['saldo'].'&nbsp;<i class="fa fa-star-o"></i></a></li>';
            ?>
        </ul>
    </div>
    <!--Content Box -->
    <div class="user-content">
        <div class="user-title"><h3>TENDA</h3></div>
        <div class="user-info">
            <strong>Usuari:&emsp;&nbsp;</strong> <?php echo "<span>".$value['user']."</span>";?> <br>
            <strong>Credits:&emsp;</strong> <?php echo "<span>".$value['saldo']."</span>";?> <i class="fa fa-star-o"></i>
        </div>
        <a id="250" href="#">
            <div class="user-info" ><strong>+&emsp;</strong><span>250</span> <i class="fa fa-star-o"></i></div>
        </a>
        <a id="500" href="#">
            <div class="user-info" ><strong>+&emsp;</strong><span>500</span> <i class="fa fa-star-o"></i></div>
        </a>
        <a id="750" href="#">
            <div class="user-info" ><strong>+&emsp;</strong><span>750</span> <i class="fa fa-star-o"></i></div>
        </a>
        <a id="1000" href="#">
            <div class="user-info" ><strong>+&emsp;</strong><span>1.000</span> <i class="fa fa-star-o"></i></div>
        </a>
        <a id="2500" href="#">
            <div class="user-info" ><strong>+&emsp;</strong><span>2.500</span> <i class="fa fa-star-o"></i></div>
        </a>
        <a id="5000" href="#">
            <div class="user-info" ><strong>+&emsp;</strong><span>5.000</span> <i class="fa fa-star-o"></i></div>
        </a>
        <a id="10000" style="border:none;" href="#">
            <div class="user-info"><strong>+&emsp;</strong><span>10.000</span> <i class="fa fa-star-o"></i></div>
        </a> 
    </div>
    <div class="user-content" id="buycredits">
        <div class="user-title" id="buytitle">
            <strong>&nbsp;&nbsp;+&emsp;</strong>
            <span id="credits"></span> 
            <i class="fa fa-star-o"></i>
        </div>
        <form method="POST" name="myForm" action="../System/Protocols/Usuari_Tenda.php">
            <div class="user-info">
                &nbsp;Aceptes que la teva compra estigui disponible inmediatament i renuncies al teu dret legal de retirada.
            </div>
            <div style="border:none;" class="user-info" >
                <div class="input-1">
                    <input id="valcredits" value="" type="hidden" name="valcredits">
                    <input id="userid" value="" type="hidden" name="userid">
                    <input id="user" value="" type="hidden" name="user">
                    <input id="logbutton" type="submit" value="Comprar">
                </div>
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
        echo 'id_user = "'.$value['id_usuari'].'";';
        echo 'user = "'.$value['user'].'";';
    ?>
    console.log( "ready! "+id_user );
    selectedEffect = "blind";
    $("#250").click(function () {
        $("#buycredits").hide();
        $("#buycredits").show(selectedEffect, 500);
        $("#credits").html("250");
        $("#valcredits").val("250");
        $("#userid").val(id_user);
        $("#user").val(user);
        
    });
    $("#500").click(function () {
        $("#buycredits").hide();
        $("#buycredits").show(selectedEffect, 500);
        $("#credits").html("500");
        $("#valcredits").val("500");
        $("#userid").val(id_user);
        $("#user").val(user);
    });
    $("#750").click(function () {
        $("#buycredits").hide();
        $("#buycredits").show(selectedEffect, 500);
        $("#credits").html("750");
        $("#valcredits").val("750");
        $("#userid").val(id_user);
        $("#user").val(user);
    });
    $("#1000").click(function () {
        $("#buycredits").hide();
        $("#buycredits").show(selectedEffect, 500);
        $("#credits").html("1.000");
        $("#valcredits").val("1000");
        $("#userid").val(id_user);
        $("#user").val(user);
    });
    $("#2500").click(function () {
        $("#buycredits").hide();
        $("#buycredits").show(selectedEffect, 500);
        $("#credits").html("2.500");
        $("#valcredits").val("2500");
        $("#userid").val(id_user);
        $("#user").val(user);
    });
    $("#5000").click(function () {
        $("#buycredits").hide();
        $("#buycredits").show(selectedEffect, 500);
        $("#credits").html("5.000");
        $("#valcredits").val("5000");
        $("#userid").val(id_user);
        $("#user").val(user);
    });
    $("#10000").click(function () {
        $("#buycredits").hide();
        $("#buycredits").show(selectedEffect, 500);
        $("#credits").html("10.000");
        $("#valcredits").val("10000");
        $("#userid").val(id_user);
        $("#user").val(user);
    });
});
</script>

