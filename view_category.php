<html>
    <head>
        <title>llitsa de categoria</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="favicon.ico">
        <LINK REL=StyleSheet HREF="Public/css/menu.css" TYPE="text/css" MEDIA=screen>
        <LINK REL=StyleSheet HREF="Public/css/style.css" TYPE="text/css" MEDIA=screen>
        <script src="Public/jquery/jquery-1.12.0.min.js"></script>
        <script src="Public/jquery/jquery-ui.min.js"></script>
    </head>
    <body>
        <!-- Header content box -->
        <?php include "Public/layouts/menu.php";?>
        
        <!-- Body box -->
        <div class="body-box">
            <script>
                $(document).ready(function(){
                    $.ajax({
                        url:   'System/Protocols/mostrar_categoria.php',
                        type:  'post',
                        beforeSend: function () {
                        },
                        success:  function (response) {
                            jsonCategoria = jQuery.parseJSON(response);
                            console.log(jsonCategoria);
                            if(Object.keys(jsonCategoria).length != 0){
                                var $value;
                                for ($value = 0; $value < Object.keys(jsonCategoria).length; $value++){
                                    var txt = $('#selcategoria').html();
                                    //jsonCategoria.sort(); 
                                    $('#selcategoria').html(txt + 'id= '+jsonCategoria[$value].id_categoria+' tipus= '+jsonCategoria[$value].tipus+' <br>');
                                    console.log($value, jsonCategoria[$value].id_categoria, jsonCategoria[$value].tipus);
                                }
                            }else if(Object.keys(jsonCategoria).length == 0){
                                var txt = $('#selcategoria').html();
                                $('#selcategoria').html(txt + 'No hi ha categories creades!!');
                            }
                        }
                    });
                });
            </script>
            <div id="selcategoria">

            </div>
        </div>
    </body>
</html> 

