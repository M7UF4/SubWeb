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
        $Subhasta = $Subhasta->view_all();
        $i = 0;
        foreach ($Subhasta as $row) {
            $Enemigo = new Enemigo();
            $Enemigo = $Enemigo->get_all($row->id_enemigo);
            
            /*Anem a dividir les subhastes en 2 columnes depenent de par o impar en i*/
            if ( $i%2 == 0){
                $Partida_Enemigo = new Partida_Enemigo();
                $Partida_Enemigo = $Partida_Enemigo->view_partida($id_Partida);
                $i = 0;
                foreach ($Partida_Enemigo as $row) {
                    $Enemigo = new Enemigo();
                    $Enemigo = $Enemigo->get_all($row->id_enemigo);
                }
                echo
                '<a href="…"><div class="columna-esquerra">
                    <div class="titol">Titol</div>
                    <div class="imatge">
                        <img src="" height="100%">
                    </div>
                    <p>Descripció del objecte, blah blah</p>
                </div></a>';
            }else{
                $Enemigo = new Enemigo();
                $Enemigo = $Enemigo->get_all($row->id_enemigo);
                if ( $i%2 == 0){
                    $Partida_Enemigo = new Partida_Enemigo();
                    $Partida_Enemigo = $Partida_Enemigo->view_partida($id_Partida);
                    $i = 0;
                    foreach ($Partida_Enemigo as $row) {
                        $Enemigo = new Enemigo();
                        $Enemigo = $Enemigo->get_all($row->id_enemigo);
                    }
                    echo
                    '<a href="…"><div class="columna-dreta">
                        <div class="titol">Titol</div>
                        <div class="imatge">
                            <img src="" height="100%">
                        </div>
                        <p>Descripció del objecte, blah blah</p>
                    </div></a>';
                }
            }
            $i++;
        }
        ?>
        
        
    </div>
</div>
        
<!-- Footer content box -->
<?php include "Public/layouts/footer.php"; 
