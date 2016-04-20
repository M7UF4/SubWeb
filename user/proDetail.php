<!-- Header content box -->
<?php 
$title='Productes';
$migas='#Index|index.php#Producte';
include "../Public/layouts/menu.php";
?>

<!-- Content body -->
<!-- Body box -->
<div class="body-box">
    <br>
    
            <?php
                require_once('../System/Classes/Producte.php');
                    $id_pro = $_GET['idPro'];
                    $Producte=new Producte();
                    $rtn=$Producte->view_pro($id_pro);
                
                    //var_dump($rtn);
                    
                    /*Connexio a la base de dades per carregar les subastes als divs*/
                    require_once(__DIR__.'/../System/Classes/Subhasta.php'); //Necessitem Subhasta
                    $Subhasta = new Subhasta();
                    $Subhasta=$Subhasta->view_time($id_pro);
                    //var_dump($Subhasta);
                    $fecha = $Subhasta->getTemps();
                    $licitacions = $Subhasta->getNum_Licitacions();
                    $id_Subhasta = $Subhasta->getId_Subhasta();
                    $temps=$Subhasta->getTemps();
                    //var_dump($temps);
                    //$fecha="2016-04-19 00:00:00";
                    $segundos=strtotime($fecha) - strtotime('now');
                    $diferencia_dias=intval($segundos/60/60/24);
                    $segundos = $segundos - ($diferencia_dias*60*60*24);
                    $diferencia_horas=intval($segundos/60/60);
                    $segundos = $segundos - ($diferencia_horas*60*60);
                    $diferencia_minutos=intval($segundos/60);
                    $segundos = $segundos - ($diferencia_minutos*60);
                    $id_user = $value['id_usuari'];
                    //var_dump($id_user);
                    //echo "La cantidad de días entre el ".$fecha." y hoy es <b>".$diferencia_dias."</b>";
                    //echo $licitacions;
                    
                $i = 0;
                foreach ($rtn as $row) {
                    $id = $row->getId_Producte();
                    $nom = $row->getNom();
                    $imatge = $row->getLink_img();
                    $descripcio = $row->getDescripcio();
                    $caracter = $row->getCaracteristiques();
                    $preu = $row->getPreu_Mercat();
                    if($segundos<=0){
                        echo '
                            <div class="detNom"><h1>'.$nom.'</h1></div>
                            <div class="caixa3">
                            <ul class="row1">
                                <li class="cell cellimg"><img src=../Public/img/productes/'.$imatge.' style="width:300px;height:300px;">&nbsp;
                                <br>licitacions totat: '.$licitacions.'</li>
                                <br><li class="cellpreu"><b>PVP</b>: '.$preu.' $&nbsp;</li><li class="cell cellpreu"><b>Tiempo quedan: </b>Acabat&nbsp;</li><br><br>
                                <br><li class="cell celldesc"><b>Descripció</b>: '.$descripcio.'&nbsp;</li><br><br>
                                <br><li class="cell celldesc"><b>Caracteristiques</b>: '.$caracter.'&nbsp;</li><br><br>
                            </ul>
                            </div>
                        ';
                    $i++;
                    }else{
                        echo '
                            <div class="detNom"><h1>'.$nom.'</h1></div>
                            <div class="caixa3">
                            <ul class="row1">
                                <li class="cell cellimg"><img src=../Public/img/productes/'.$imatge.' style="width:300px;height:300px;">&nbsp;
                                <br>licitacions totat: '.$licitacions.'</li>
                                <br><li class="cellpreu"><b>PVP</b>: '.$preu.' $&nbsp;</li><br><br>
                                <li class="cell celldesc"><b>Descripció</b>: '.$descripcio.'&nbsp;</li><br><br>
                                <li class="cell celldesc"><b>Caracteristiques</b>: '.$caracter.'&nbsp;</li><br><br>
                                <li class="cell cellpreu"><b>Tiempo quedan: Dia/es - </b>'.$diferencia_dias.' + '.$diferencia_horas.':'.$diferencia_minutos.':'.$segundos.'&nbsp;</li><br><br>
                                <li class="cell celldesc">
                                    <form method="post" action="../System/Protocols/addpuja.php">
                                        <div class="input-1">
                                            <input id="cat" class="input" type="text" name="preu" />
                                        </div>
                                        <div class="input-1">
                                            <input id="cat" class="input" type="hidden" name="idsub" value="'.$id_Subhasta.'"/>
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
                                </li><br><br>
                            </ul>
                            </div>
                        ';
                    $i++;
                    
                }
                }
            ?>
        </div>

            
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?> 

