<!-- Header content box -->
<?php 
$title='Productes';
$migas='#Index|index.php#Subhasta|subhasta.php#Producte';
include "Public/layouts/menu.php";
require_once "System/config.php";
?>
<!-- Content body -->
<!-- Body box -->
<div class="body-box">
    <?php
            if(!isset($_SESSION['usuari'])){
                header('Location: login.php');
                //var_dump($value);
            }
        require_once('System/Classes/Producte.php');
        $id_sub = $_GET['idSub'];
            require_once(__DIR__.'/System/Classes/Subhasta.php');
            $Subhasta = new Subhasta();
            $Subhasta=$Subhasta->view_time($id_sub);

            $fecha = $Subhasta->getTemps();
            $licitacions = $Subhasta->getNum_Licitacions();
            $temps=$Subhasta->getTemps();
            $id_Producte=$Subhasta->getId_Producte();
                
            $Producte=new Producte();
            $rtn=$Producte->view_pro($id_Producte);

            $segundos=strtotime($fecha) - strtotime('now');
            $diferencia_dias=intval($segundos/60/60/24);
            $segundos = $segundos - ($diferencia_dias*60*60*24);
            $diferencia_horas=intval($segundos/60/60);
            $segundos = $segundos - ($diferencia_horas*60*60);
            $diferencia_minutos=intval($segundos/60);
            $segundos = $segundos - ($diferencia_minutos*60);

            $id_user = $value['id_usuari'];
            $db = new connexio();
            $sql = "SELECT * FROM Factura WHERE id_subhasta = '$id_sub'";
            $query = $db->query($sql);
            $row = $query->fetch_assoc();
            $id_usuari = $row['id_usuari'];
            $valorf = $row['valor'];
            
            $sql2 = "SELECT user FROM Usuari WHERE id_usuari = '$id_usuari'";
            $query2 = $db->query($sql2);
            $row2 = $query2->fetch_assoc();
            $user = $row2['user'];
            //var_dump($row2);
            $db->close();

        foreach ($rtn as $row) {
            $id = $row->getId_Producte();
            $nom = $row->getNom();
            $imatge = $row->getLink_img();
            $descripcio = $row->getDescripcio();
            $caracter = $row->getCaracteristiques();
            $preu = $row->getPreu_Mercat();
            if($segundos<=0){
                echo '
                    <div class="caixaTitle">'.$nom.'</div>
                    <div class="caixa">
                        <ul class="row1">
                            <li class="cellimg cell"><img src=Public/img/productes/'.$imatge.'></li>
                            <li class="celllic cell">Licitacions totals: '.$licitacions.'</li>
                            <li class="celltitle cell"><b>PVP</b></li>
                                <li class="cellpvp cell">'.$preu.' €</li>
                            <li class="celltitle cell"><b>Descripció</b></li>
                                <li class="celldes cell">'.$descripcio.'</li>
                            <li class="celltitle cell"><b>Caracteristiques</b></li>
                                <li class="cellcar cell">'.$caracter.'</li>
                            <li class="celltitle cell"><b>Temps restant</b></li>
                                <li class="celltim cell">¡¡Subhasta Finalitzada!!</li>
                            <li class="celltitle cell"><b>Guanyador</b></li>
                                <li class="celltim cell">'.ucfirst($user).' '.$valorf.'</li>
                        </ul>
                    </div>
                ';
            
            }else{
                echo '
                    <div class="caixaTitle">'.$nom.'</div>
                    <div class="caixa">
                        <ul class="row1">
                            <li class="cellimg cell"><img src=Public/img/productes/'.$imatge.'></li>
                            <li class="celllic cell">Licitacions totals: '.$licitacions.'</li>
                            <li id="start" class="cellbut cell"> LICITAR </li>
                            <li class="celltitle cell"><b>PVP</b></li>
                                <li class="cellpvp cell">'.$preu.' €</li>
                            <li class="celltitle cell"><b>Descripció</b></li>
                                <li class="celldes cell">'.$descripcio.'</li>
                            <li class="celltitle cell"><b>Característiques</b></li>
                                <li class="cellcar cell">'.$caracter.'</li>
                            <li class="celltitle cell"><b>Temps restant</b></li>
                                <li class="celltim cell">'.$diferencia_dias.' Dies + '.$diferencia_horas.':'.$diferencia_minutos.':'.$segundos.' hores</li>
                        </ul>
                    </div>
                    
                    <div class="panpuja" id="panpujaform" style="display:none;">
                        <form class="panpuja2" method="post" action="System/Protocols/addpuja.php">
                            <div class="input-1">
                                <input id="cat" class="input" type="text" name="preu" required onkeypress="return aceptNum(event)" onpaste="return false;"/>
                            </div>
                            <div class="input-1">
                                <input id="cat" class="input" type="hidden" name="idsub" value="'.$id_sub.'"/>
                            </div>
                            <div class="input-1">
                                <input class="input" type="hidden" name="idusr" value="'.$id_user.'" />
                            </div>
                            <div class="input-1">
                                <input class="input" type="hidden" name="temps" value="'.$temps.'" />
                            </div>
                            <div class="input-1">
                                <input class="input" type="hidden" name="licitacions" value="'.$licitacions.'"" />
                            </div>
                            <div style="border:none;" class="user-info" >
                                <div class="input-1">
                                    <input id="logbutton" type="submit" name="submit" value="Pujar">
                                </div>
                            </div>
                        </form>
                    </div>
                ';
            }
        }
    ?>
</div>
<script>
var nav4 = window.Event ? true : false;
function aceptNum(evt){
    var key = nav4 ? evt.which : evt.keyCode;
    return (key <= 13 || (key>= 48 && key <= 57));
}
$(document).ready(function() {
    $("#start").click(function() {
        $("#panpujaform").show();
    });
    $("#logbutton").click(function() {
        $("#panpujaform").hide();
    });
});
</script>       
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

