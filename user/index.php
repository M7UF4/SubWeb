<!-- Header content box -->
<?php 
$title='Configuració';
$migas='#Inici|../index.php#Configuració|index.php';
include "../Public/layouts/menu.php";?>

<!-- Content body -->
<!-- Body box -->
<div class="user-box">
    <!--Content Box -->
    <div class="user-content">
        <div class="user-title"><h3>INFORMACIÓ</h3></div>
        <div class="user-info"><b>User:</b> <?php echo $value['user'];?> </div>
        <?php 
            if($value['nom']!=""){
                echo '<div class="user-info"><b>Identitat:</b>';
                echo $value['nom']." ".$value['cognom'];
                echo '</div>';
            }else{
                echo '<a href="modident.php">';
                    echo '<div class="user-info"><b>Identitat:</b>';
                        echo ' Encara no has introduit la teva identitat &nbsp;';
                        echo '<i class="fa fa-pencil"></i>';
                    echo '</div>';
                echo '</a>';
            }
        ?>
        <a href="modpass.php">
            <div class="user-info"><b>Contrasenya:</b> 
                <?php 
                    $passlen = strlen($value['password'])/2;
                    $passhid= "";
                    for($i = 0; $i<=$passlen; $i++){
                        $passhid = $passhid."*";
                    }
                    echo $passhid;
                ?>
                <i class="fa fa-pencil"></i>
            </div>
        </a>
        <a href="modemail.php">
            <div class="user-info"><b>E-mail:</b> 
                <?php 
                    echo $value['email'];
                ?> 
                <i class="fa fa-pencil"></i>
            </div>
        </a>
        <?php 
            if($value['phone']!=""){
                echo '<div class="user-info"><b>Telefon:</b> ';
                echo $value['phone'];
                echo '</div>';
            }else{
                 echo '<a href="modtelefon.php">';
                    echo '<div class="user-info"><b>Telefon:</b>';
                        echo ' Encara no has introduit el teu telefon &nbsp;';
                        echo '<i class="fa fa-pencil"></i>';
                    echo '</div>';
                echo '</a>';
                
            }
        ?>
        <a href="modcontact.php">
            <div class="user-info"><b>Direcció principal</b> <i class="fa fa-pencil"></i><br>
                <?php 
                    if($value['adreca']!=""){
                        echo $value['adreca']."<br>";
                        echo $value['pais']." ".$value['poble']."<br>";
                        echo $value['provincia']." ".$value['postal'];
                    }else{
                        echo '<br>';
                        echo '<br>';
                        echo '<br>';
                    }
                ?>
            </div>
        </a>    
    </div> 
</div>
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?> 

