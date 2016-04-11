<?php
$title='Productes';
$migas='#Index|index.php#Eliminar producte';
include "Public/layouts/menu.php";
include "System/Classes/Producte.php";
?><center>
<h2>Estas segura para elimiar el producte?</h2>
<form action="" method="post">

<input type = "submit" name="yes" value="Si">
<input type = "submit" name="no" value="No">

</form>
</center>
<?php
 if(isset($_POST['yes'])){
     $var = $_GET['delete_pro'];
     echo "<script>window.open('System/Protocols/delPro.php?delete_pro=$var','_self')</script>";
	 }
	 
	 if(isset($_POST['no'])){
	 echo "<script>window.open('view_producte.php','_self')</script>";
	 }
 ?>