<!-- Header content box -->
<?php 
$title='Productes';
$migas='#Index|index.php#Producte';
include "Public/layouts/menu.php";
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
                            <li class="cellbut cell"> <b> Pujar</b> </li>
                            <li class="celltitle cell"><b>PVP</b></li>
                                <li class="cellpvp cell">'.$preu.'</li>
                            <li class="celltitle cell"><b>Descripció</b></li>
                                <li class="celldes cell">'.$descripcio.'</li>
                            <li class="celltitle cell"><b>Caracteristiques</b></li>
                                <li class="cellcar cell">'.$caracter.'</li>
                            <li class="celltitle cell"><b>Temps restant</b></li>
                                <li class="celltim cell">¡¡Subhasta Finalitzada!!</li>
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
                            <li class="cellbut cell"> <b> Pujar</b> </li>
                            <li class="celltitle cell"><b>PVP</b></li>
                                <li class="cellpvp cell">'.$preu.'</li>
                            <li class="celltitle cell"><b>Descripció</b></li>
                                <li class="celldes cell">'.$descripcio.'</li>
                            <li class="celltitle cell"><b>Caracteristiques</b></li>
                                <li class="cellcar cell">'.$caracter.'</li>
                            <li class="celltitle cell"><b>Temps restant</b></li>
                                <li class="celltim cell">'.$diferencia_dias.' Dies + '.$diferencia_horas.':'.$diferencia_minutos.':'.$segundos.'</li>
                        </ul>
                    </div>
                    
                    <div class="panpuja" style="display:none;">
                        <form method="post" action="System/Protocols/addpuja.php">
                            <div class="input-1">
                                <input id="cat" class="input" type="text" name="preu" />
                            </div>
                            <div class="input-1">
                                <input id="cat" class="input" type="hidden" name="idsub" value="'.$id_sub.'"/>
                            </div>
                            <div class="input-1">
                                <input id="cat" class="input" type="hidden" name="idusr" value="'.$id_user.'" />
                            </div>
                            <div class="input-1">
                                <input id="cat" class="input" type="hidden" name="temps" value="'.$temps.'" />
                            </div>
                            <div class="input-1">
                                <input id="cat" class="input" type="hidden" name="licitacions" value="'.$licitacions.'"" />
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

            
<!-- Footer content box -->
<?php include "Public/layouts/footer.php";?> 

