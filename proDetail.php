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
<div class="body-box">
    <?php
    echo "<center>";
        $id_pro = $_GET['proId'];
        $Producte=new Producte();
        $Producte->view_pro($id_pro);
        //Producte::view_all();
    ?>
</div>
            
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

