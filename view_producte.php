<!-- Header content box -->
<?php 
$title='Productes';
$migas='#Index|index.php#Llista de productes';
include "Public/layouts/menu.php";
include "System/Classes/Producte.php";
//include "System/db.php";
?>

<!-- Content body -->
<!-- Body box -->
<style>
    #pro{
        background-color:white;
        width:1000px;
        margin:auto;
    }
</style>
<div id="pro">
    <?php
        $Producte=new Producte();
        $Producte->view_all();
        //Producte::view_all();
    ?>
       </div>
            
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

