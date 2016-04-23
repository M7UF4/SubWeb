<!-- Header content box -->
<?php 
$title='Index';
$migas='#Index|index.php';
include "Public/layouts/menu.php";?>
<style>
    body{
        background-color: rgba(0,0,0,0);
    }
    html{
        background-color: #31231E;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        
    }
.content-title{
    position: fixed;
    top: 24.2;
    bottom:0;
    left:0;
    right: 0;
    background-color: rgba(22,22,22,0.8);
    overflow: auto;
}
.content-slider{
    background-color:rgba(98,93,106,0.8);
    padding: 0;
}
.content-slider > #slider {
    width: 25%;
    margin: auto;
}
.content-slider > #slider > img{
    display: none;
    width: 100%;
}
</style>
<!-- Body content box -->
<div class="body-box">

    <div class="content-box">
        <div class="content-title">
            <div class="content-slider">
                <div id="slider"></div>
            </div>
            <div class="inner_cover">
                <h1 class="cover-heading">SubWeb la teva web de Subhastes Online.</h1>
                <p class="lead">SubWeb és una pàgina per adquirir productes al millor preu. És senzill ... Cerca un producte que t'agradi i realitza la teva licitació, qui sap .. pot ser ets el pròxim guanyador d'una PS4 per tan sols 2€.</p>
                <p class="lead">Guanya el qui hagi apostat menys sense repetició. No hi ha apostes mínimes. Cada aposta consumeix 50 crèdits online. Adquireix tants com necessitis en el teu panell d'Usuari / Secció Tenda.</p>
                <br>
                <p class="lead">
                  <a href="subhasta.php" class="btn">Comença aquí</a>
                </p>
                <div class="inner">
                    <p class="lead">Subweb Online by <a id='linkg1' href="#">@Grup1</a>.</p>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    var i = 0;
    var url = "https://api.flickr.com/services/feeds/photos_public.gne?id=90380536@N06&format=json&per_page=20&jsoncallback=?";
    $.getJSON(url, function(data){
        var html = "";
        $.each(data.items, function(i, item){
            html += "<img src=" + item.media.m.replace('_m', '_b') + ">";
        });
        $("#slider").html(html);
        cambiarSlider();
        var control = setInterval(cambiarSlider, 8000);
    });
    function cambiarSlider(){
            i++;
            
            if(i == $("#slider img").size()){
                    i = 0;
            }
            //
            //$("#slider img").hide();
            var src = $("#slider img").eq(i).attr('src');
            $('html').css('backgroundImage','url('+src+')');
            $('html').css('transition','background-image 0.8s ease-in-out');
            //$("#slider img").eq(i).fadeIn(2000);
    }
});
</script>      
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 




