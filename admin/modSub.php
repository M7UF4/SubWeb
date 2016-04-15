<!-- Header content box -->
<?php 
$title='Subhasta';
$migas='#Inici|../index.php#AdminPanel|index.php#Subhasta';
include "../Public/layouts/menu.php";?>

<!-- Content body -->
<!-- Body box -->
<div class="user-box">
    <!--Content Box -->
    <div class="user-content">
        <div class="user-title"><a href="../admin/"><span class="sb-return"><i class="fa fa-angle-left sb-return-icon"></i></span></a><h3>Subhasta</h3></div>
        <div class="caixa caixa1">
            <form method="POST" name="myForm" action="../System/Protocols/Subhasta_Mod.php">
                <div class="user-info">
                    <div class="input-1">
                        <?php
                        require_once('../System/Classes/Subhasta.php');
                        $var = $_GET['modSub'];
                        $Subhasta = new Subhasta();
                        $Subhasta = $Subhasta->view_sub($var);
                        foreach ($Subhasta as $row) {
                            $id = $row->getId_Subhasta();
                            $prod = $row->getId_Producte();
                            $temps= $row->getTemps();
                            //echo''.$id.' '.$prod.' '.$temps.'';
                         }
                        
                        echo '<input class="input" id="cat" placeholder="idsub" value="'.$id.'" type="hidden" name="idsub" required>';
                        ?>
                    </div>
                    <div class="input-1">
                        <?php
                            
                            require_once('../System/Classes/Producte.php');
                            $Producte = new Producte();
                            $rtn = $Producte->view_all();
                            //var_dump($rtn);
                            echo '<select class="input" id="cat" value="" type="text" name="producte" autofocus required>';
                            foreach ($rtn as $row) {
                                //var_dump($row);
                                if($row->getId_Producte() == $prod){
                                    echo '<option selected="selected" value="'.$row->getId_Producte().'">'.$row->getNom().'</option>';
                                }else{
                                    echo '<option value="'.$row->getId_Producte().'">'.$row->getNom().'</option>';
                                }
                                
                            }
                            echo '</select>';
                        ?>
                    </div>
                    <div class="input-1">
                        <input class="input" id="cat" value="<?php echo $temps; ?>" type="datetime" name="time" step="1" required>
                    </div>
                </div>
                <div style="border:none;" class="user-info" >
                    <div class="input-1">
                        <input id="logbutton" type="submit" value="Modifica">
                    </div>
                </div>
            </form>
        </div>
        <div class="caixa caixa2">
            <ul class="row">
                <li class="cell cellcat celltop">Id subhasta</li>
                <li class="cell cellcat celltop">Producte</li>
                <li class="cell cellcat celltop">Licitacions</li>
                <li class="cell cellcat celltop">Temps</li>
                <a class="cell celldel celltop" href="#"><li><strong>&nbsp;</strong></li></a>
            </ul>
            <?php
                require_once('../System/Classes/Subhasta.php');
                $Subhasta = new Subhasta();
                $Subhasta = $Subhasta->view_all();
                $i = 0;
                foreach ($Subhasta as $row) {
                    $id_subasta = $row->getId_Subhasta();
                    $id_producte = $row->getId_Producte();
                    $licitacions = $row->getNum_Licitacions();
                    $temps = $row->getTemps();
                    if ( $i%2 == 0){
                           echo '
                            <ul class="row1">
                                <li class="cell cellcat">'.$id_subasta.'&nbsp;</li>
                                <li class="cell cellcat">'.$id_producte.'&nbsp;</li>
                                <li class="cell cellcat">'.$licitacions.'&nbsp;</li>
                                <li class="cell cellcat">'.$temps.'&nbsp;</li>
                                <a class="cell celldel" href="modSub.php?modSub='.$id_subasta.'"><li><i class="fa fa-pencil" aria-hidden="true"></i></li></a><br>
                                <a class="cell celldel" href="delSub.php?delSub='.$id_subasta.'"><li><i class="fa fa-minus" aria-hidden="true"></i></li></a>
                            </ul>
                            '; 
                        }else{
                            echo '
                            <ul class="row2">
                                <li class="cell cellcat">'.$id_subasta.'&nbsp;</li>
                                <li class="cell cellcat">'.$id_producte.'&nbsp;</li>
                                <li class="cell cellcat">'.$licitacions.'&nbsp;</li>
                                <li class="cell cellcat">'.$temps.'&nbsp;</li>
                                <a class="cell celldel" href="modSub.php?modSub='.$id_subasta.'"><li><i class="fa fa-pencil" aria-hidden="true"></i></li></a><br>
                                <a class="cell celldel" href="delSub.php?delSub='.$id_subasta.'"><li><i class="fa fa-minus" aria-hidden="true"></i></li></a>
                            </ul>
                            '; 
                        }
                    $i++;
                }
            ?>
        </div>
        
    </div> 
</div>
<!-- Footer content box -->
<?php include "../Public/layouts/footer.php";?>