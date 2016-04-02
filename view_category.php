<!-- Header content box -->
<?php include "Public/layouts/menu.php";?>

<!-- Content body -->
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
            
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

