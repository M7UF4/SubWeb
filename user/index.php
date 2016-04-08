<!-- Header content box -->
<?php 
$title='Configuració';
$migas='#Inici|../index.php#Configuració|index.php';
include "../Public/layouts/menu.php";?>

<!-- Content body -->
<!-- Body box -->
<div class="user-box">
    <!--user menu Box -->
    <div class="user-menu">
        
    </div>
    <!--Content Box -->
    <div class="user-content">
        <div class="user-title"><h3>INFORMACIÓ</h3></div>
        <div class="user-info"><strong>Usuari:&emsp;</strong> <?php echo "<span>".$value['user']."</span>";?> </div>
        <?php 
            if($value['nom']!=""){
                echo '<div class="user-info"><strong>Identitat:&emsp;</strong>';
                echo "<span>".$value['nom']." ".$value['cognom']."</span>";
                echo '</div>';
            }else{
                echo '<a href="modident.php">';
                    echo '<div class="user-info"><strong>Identitat:&emsp;</strong>';
                        echo '<span> N/a &nbsp;</span>';
                        echo '<i class="fa fa-plus-square-o"></i>';
                    echo '</div>';
                echo '</a>';
            }
        ?>
        <a href="modpass.php">
            <div class="user-info"><strong>Contrasenya:&emsp;</strong> 
                <?php 
                    $passlen = strlen($value['password'])/3;
                    $passhid= "";
                    for($i = 0; $i<=$passlen; $i++){
                        $passhid = $passhid."*";
                    }
                    echo "<span>".$passhid."</span>";
                ?>
                <i class="fa fa-pencil"></i>
            </div>
        </a>
        <a href="modemail.php">
            <div class="user-info"><strong>E-mail:&emsp;</strong> 
                <?php 
                    echo "<span>".$value['email']."</span>";
                ?> 
                <i class="fa fa-pencil"></i>
            </div>
        </a>
        <?php 
            if($value['phone']!=""){
                echo '<div class="user-info"><strong>Telefon:&emsp;</strong> ';
                echo "<span>".$value['phone']."</span>";
                echo '</div>';
            }else{
                 echo '<a href="modtelefon.php">';
                    echo '<div class="user-info"><strong>Telefon:&emsp;</strong>';
                        echo '<span> N/a &nbsp;</span>';
                        echo '<i class="fa fa-plus-square-o"></i>';
                    echo '</div>';
                echo '</a>';
                
            }
        ?>
        <a href="modcontact.php">
            <div class="user-info"><strong>Direcció principal</strong> <i class="fa fa-pencil"></i><br>
                <?php 
                    if($value['adreca']!=""){
                        echo "<span>".mb_strtoupper($value['adreca'],'utf-8')."<br></span>";
                        echo "<span>".mb_strtoupper($value['pais'],'utf-8')." ".mb_strtoupper($value['poble'],'utf-8')."<br></span>";
                        echo "<span>".mb_strtoupper($value['provincia'],'utf-8')." ".mb_strtoupper($value['postal'],'utf-8')."</span>";
                    }else{
                        echo '<br>';
                        echo '<br>';
                        echo '<br>';
                    }
                ?>
            </div>
        </a>
        <a style="border:none;" href="deluser.php">
            <div class="user-info"><strong>Eliminar Usuari</strong> <i class="fa fa-times"></i><br>
            </div>
        </a> 
    </div> 
</div>
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?> 

