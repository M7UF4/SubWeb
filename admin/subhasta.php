<!-- Header content box -->
<?php 
$title='Subhasta';
$migas='#Inici|../index.php#AdminPanel|index.php#Subhasta';
include "../Public/layouts/menu.php";
?>

<!-- Content body -->
<!-- Body box -->
<div class="user-box">
    <!--Content Box -->
    <div class="user-content">
        <div class="user-title"><a href="../admin/"><span class="sb-return"><i class="fa fa-angle-left sb-return-icon"></i></span></a><h3>Subhasta</h3></div>
        <div class="caixa caixa1">
            <form method="POST" name="myForm" action="../System/Protocols/Subhasta_Inserir.php">
                <div class="user-info">
                    <div class="input-1">
                        <?php
                            require_once('../System/Classes/Producte.php');
                            $Producte = new Producte();
                            $rtn = $Producte->view_all();
                            //var_dump($rtn);
                            echo '<select class="input" id="cat" value="" type="text" name="producte" autofocus required>';
                            foreach ($rtn as $row) {
                                //var_dump($row);
                                echo '<option value="'.$row->getId_Producte().'">'.$row->getNom().'</option>';
                            }
                            echo '</select>';
                        ?>
                    </div>
                    <div class="input-1">
                        <input class="input" id="cat" placeholder="time" value="" type="datetime-local" name="time"  step="1" required>
                    </div>
                </div>
                <div style="border:none;" class="user-info" >
                    <div class="input-1">
                        <input id="logbutton" type="submit" value="Añadir">
                    </div>
                </div>
            </form>
        </div>
        <div class="caixa caixa2">
            <ul class="row">
                <li class="cell cellsubid celltop">Id subhasta</li>
                <li class="cell cellproid celltop">Producte</li>
                <li class="cell celllicit celltop">Licitacions</li>
                <li class="cell celldata celltop">Data Límit</li>
                <a class="cell celldel celltop" href="#"><li><strong>&nbsp;</strong></li></a>
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
                                <li class="cell cellsubid">'.$id_subasta.'&nbsp;</li>
                                <li class="cell cellproid"><a href=proDetail.php?idPro='.$id_producte.'>'.$id_producte.'</a>&nbsp;</li>
                                <li class="cell celllicit">'.$licitacions.'&nbsp;</li>
                                <li class="cell celldata">'.$temps.'&nbsp;</li>
                                <a class="cell celldel" href="modSub.php?modSub='.$id_subasta.'"><li><i class="fa fa-pencil" aria-hidden="true"></i></li></a><br>
                                <a class="cell celldel" href="delSub.php?delSub='.$id_subasta.'"><li><i class="fa fa-minus" aria-hidden="true"></i></li></a>
                            </ul>
                            '; 
                        }else{
                            echo '
                            <ul class="row2">
                                <li class="cell cellsubid">'.$id_subasta.'&nbsp;</li>
                                <li class="cell cellproid"><a href=proDetail.php?idPro='.$id_producte.'>'.$id_producte.'</a>&nbsp;</li>
                                <li class="cell celllicit">'.$licitacions.'&nbsp;</li>
                                <li class="cell celldata">'.$temps.'&nbsp;</li>
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