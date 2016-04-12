<!-- Header content box -->
<?php 
$title='Llista de subhastes';
$migas='#Index|index.php#Llista de subhastes';
include "../Public/layouts/menu.php";
include "../System/Classes/Subhasta.php";
//include "System/db.php";
?>

<!-- Content body -->
<!-- Body box -->
    <?php
        $Subhasta=new Subhasta();
        $Subhasta->view_all();
    ?>     
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?> 

