<!-- Header content box -->
<?php 
$title='Index';
$migas='#Index|index.php #Subhasta | subhasta.php' ;
include "Public/layouts/menu.php";?>
<LINK REL=StyleSheet HREF="Public/css/subhasta.css" TYPE="text/css" MEDIA=screen>
      
<!-- Body content box -->
<div class="body-box">

    <div class="content-box">
        <h1>Sala de Subhastes</h1>
        <?php
        /*Connexio a la base de dades per carregar les subastes als divs*/
        require_once(__DIR__.'/System/Classes/Subhasta.php'); //Necessitem Subhasta
        require_once(__DIR__.'/System/Classes/Producte.php'); //Necessitem Producte
        $Subhasta = new Subhasta();
        $Subhasta = $Subhasta->view_all_order_asc(); //modificar el metode per order by asc o desc per temps
        
        $i = 0;
        foreach ($Subhasta as $row) {
            //var_dump($row);
            $id_Subasta = $row->getId_Subhasta();
            $id_Producte = $row->getId_Producte();
            $licitacions = $row->getNum_Licitacions();
            $temps_restant = $row->getTemps();
            /*Anem a dividir les subhastes en 2 columnes depenent de par o impar en i*/
            if ( $i%2==0){
                $Producte = new Producte();
                $return = $Producte->view_pro($id_Producte);
                foreach ($return as $row) {
                    $titol = $row->getNom();
                    $descripcio = $row->getDescripcio();
                    $img = $row->getLink_img();
                }
                    echo
                    '<a href=proDetail.php?idSub='.$id_Subasta.'><div class="columna-esquerra">
                    <div class="titol">'.$titol.'</div>
                    <div class="imatge">
                        <img src="Public/img/productes/'.$img.'" height="100%">
                    </div>
                    <div class="descricpio">
                        <p>'.$descripcio.'</p>
                            '.$temps_restant.'
                    </div>
                    </div></a>';
            }else{
                $Producte2 = new Producte();
                $return2 = $Producte2->view_pro($id_Producte);
                foreach ($return2 as $row) {
                    $titol = $row->getNom();
                    $descripcio = $row->getDescripcio();
                    $img = $row->getLink_img(); 
                }
                    echo
                    '<a href=proDetail.php?idSub='.$id_Subasta.'><div class="columna-dreta">
                    <div class="titol">'.$titol.'</div>
                    <div class="imatge">
                        <img src="Public/img/productes/'.$img.'" height="100%">
                    </div>
                    <div class="descricpio">
                        <p>'.$descripcio.'</p>
                            '.$temps_restant.'
                    </div>
                    </div></a>';
            }
            $i++;
        }
        ?>
        
        
    </div>
</div>
        
<!-- Footer content box -->
<?php include "Public/layouts/footer.php"; 
