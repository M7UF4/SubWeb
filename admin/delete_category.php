<?php
include("../System/db.php");
if(isset($_GET['delete_categoria'])){
	$delete_id = $_GET['delete_categoria'];
	$delete_c = "delete from Categoria where id_categoria = '$delete_id'";
	$run_delete = mysqli_query($con, $delete_c);
	if($run_delete){
            header('Location: category.php');
            }
	}
?>

