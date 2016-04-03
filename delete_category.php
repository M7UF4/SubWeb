<!-- Header content box -->
<?php 
$title='Categories';
$migas='#Index|index.php#categories';
include "Public/layouts/menu.php";?>

<!-- Content body -->
<!-- Body box -->
<div class="body-box">
    <?php

include("System/db.php");

if(isset($_GET['delete_categoria'])){
	
	$delete_id = $_GET['delete_categoria'];
	
	$delete_c = "delete from Categoria where id_categoria = '$delete_id'";
	
	$run_delete = mysqli_query($con, $delete_c);
	
	if($run_delete){
		
		echo "<script>alert('Categoria esta eliminado...')</script>";
		echo "<script>window.open('view_category.php','_self')</script>";
		}
	}
?>
</div>
            
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

