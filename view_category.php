<!-- Header content box -->
<?php 
$title='Categories';
$migas='#Index|index.php#Llista de categories';
include "Public/layouts/menu.php";?>

<!-- Content body -->
<!-- Body box -->
<div class="body-box">
    
    <center>   
<table width="300">
<center><h2><font color="white">Llista de categories</h2></font></center>


<tr align="left">
<th>S.N.</th>
<th>Categoria</th>
<th>Opcions</th>
</tr>

<?php
require_once ("System/db.php");

$get_c = "select * from  Categoria order by tipus asc";

$run_c = mysqli_query($con, $get_c);
$i=0;
while ($row_c = mysqli_fetch_array($run_c)){
	
	$id_categoria = $row_c['id_categoria'];
	$tipus = $row_c['tipus'];	
	$i++;
?>

<tr align="left">
<td><?php  echo $i; ?></td>
<td><?php  echo $tipus; ?></td>
<td><a href="delete_category.php?delete_categoria=<?php echo $id_categoria;?>">Suprimir</a></td>
</tr>
<?php  } ?>
<br>
</table>
    </center>
</div>
            
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

