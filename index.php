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
        background-color: #DDF45B;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        
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
        </div>
        <div class="content-slider">
		
        </div>
        <div class="content-zone">
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    var i = 0;
    var url = "https://api.flickr.com/services/feeds/photos_public.gne?id=90380536@N06&format=json&jsoncallback=?";
    $.getJSON(url, function(data){
        var html = "";
        $.each(data.items, function(i, item){
            html += "<img src=" + item.media.m + ">";
        });
        $("#slider").html(html);
        cambiarSlider();
        var control = setInterval(cambiarSlider, 6000);
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
            //$("#slider img").eq(i).fadeIn(2000);
    }
});
</script>      
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 




