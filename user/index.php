<!-- Header content box -->
<?php 
$title='Configuració';
$migas='#Inici|../index.php#Configuració|index.php';
include "../Public/layouts/menu.php";?>

<!-- Content body -->
<div>
    <div><b>User:</b> <?php echo $value['user'];?> </div>
    <div><b>Identitat:</b> 
        <?php 
            if($value['nom']!=""){
                echo $value['nom']." ".$value['cognom'];
            }else{
                echo 'Encara no has introduit la teva identitat &nbsp;';
                echo '<a href="modident.php"><i class="fa fa-pencil"></i></a>';
            }
        ?>
    </div>
    <div><b>Contrasenya:</b> ********** <a href="modpass.php"><i class="fa fa-pencil"></i></a></div>
    <div><b>E-mail:</b> <?php echo $value['email'];?> <a href="modemail.php"><i class="fa fa-pencil"></i></a></div>
    <div><b>Telefon:</b> 
        <?php 
            if($value['phone']!=""){
                echo $value['phone'];
            }else{
                echo 'Encara no has introduit el teu telefon &nbsp;';
                echo '<a href="modtelefon.php"><i class="fa fa-pencil"></i></a>';
            }
        ?>
    </div>
    <div><b>Direcció principal</b> 
        <?php 
            if($value['adreca']!=""){
                echo $value['adreca'];
                echo $value['pais']." ".$value['poble'];
                echo $value['provincia']." ".$value['postal'];
                echo '&nbsp; <a href="modcontact.php"><i class="fa fa-pencil"></i></a>';
            }else{
                echo '&nbsp; <a href="modcontact.php"><i class="fa fa-pencil"></i></a>';
            }
        ?>
    </div>
    <div class="input-1">
        <input class="input" id="user" placeholder="Usuari *" type="hidden" name="user" maxlength="32" value="<?php echo $value['user']; ?>">
    </div>
</div>
    
<br>



<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?> 

