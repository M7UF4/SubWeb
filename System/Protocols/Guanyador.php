<?php
    require_once __DIR__."/../config.php";
    require_once(__DIR__.'/System/Classes/Subhasta.php'); //Necessitem Subhasta
    require_once(__DIR__.'/System/Classes/Producte.php'); //Necessitem Producte
    require_once(__DIR__.'/System/Classes/Licitacio.php'); //Necessitem Producte
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * !!!!!!!!Des del servidor s'executa el fitxer a les 00:00 am!!!!!!!!
 */
    //Carregar totes les subhastes //Comprovar si hi ha subhastes acabades
    $Subhasta = new Subhasta();
    $Subhasta = $Subhasta->subhastes_acabades(); //Totes les subhastes carregades que estiguin finalitzades
    //i no completades, es a dir amb el valor completades = 0;

    //Mentre hi hagi subhasta per veure
    foreach ($Subhasta as $row) {
        //Cambiar la columna de Subhasta "Completada" per un 1
        //Substituir els completada = 0 per completada = 1;
        $completada = 1;
        //UPDATE de cada subhasta
        $db = new connexio();
        $db->query("UPDATE Subhasta SET completada='$completada';");
        $db->close();
        
        //Carregar a la BD Factures els resultats dels guanyadors
        //Associem els atributs a variables per insertar posteriorment
        $id_Subasta = $row->getId_Subhasta();
        $id_Producte = $row->getId_Producte();
        
        //Associem els atributs que ens falten de les altres taules(id_usuari, $valor, $comprat)
        $licitacio = new Licitacio();
        $id_Usuari = $licitacio->getId_Usuari();
        $valor = $licitacio->getValor();
        $comprat = 0;
        
        //Insertem a la BBDD Factures
        $db = new connexio();
        $db->query("INSERT INTO Factura(id_producte, id_usuari, id_subasta, valor, comprat) "
                . "VALUES ('$id_Usuari','$id_Producte','$id_Subasta', '$valor', '$comprat')");
        $db->close();
        
    }
    
    
    
    
    
    
    
//USER : Al entrar a Factures, comprovar si el id_usuari USER es trova dintre de la taula FACTURES i mostrar
    //tots els resultats com a PUJES GUANYADES i donar la opció de comprar
    
    
    
//Inserts de les Subhastes que ia haiguen acabat a la taula Factures.
public function add(){
    $db = new connexio();
    $db2 = $db->query("INSERT INTO Usuari(`saldo`, `user`, `email`, `password`, `nom`, `cognom`, `dni`, `phone`, `adreca`, `pais`, `poble`, `provincia`, `postal`, `id_tipus`) "
            . "VALUES ('$this->saldo', '$this->user', '$this->email', '$this->password', '$this->nom', '$this->cognom', '$this->dni', '$this->phone', '$this->adreça', '$this->pais', '$this->poble', '$this->provincia', '$this->postal', '$this->id_tipus')");
    $db->close();
    return $db2;
}

//GUANYADOR
$id_subhasta = 1;
require_once(__DIR__.'/System/Classes/Licitacio.php'); 
$licitacio = new Licitacio();
$licitacio->verificar_guanyador($id_subhasta);
$lici = "".$licitacio->getId_Licitacio().", ".$licitacio->getId_Subasta().", ".$licitacio->getId_Usuari().", ".$licitacio->getValor();

if($licitacio->getId_Licitacio() != ""){
    echo 'Felicitats! Els guanyador ha sigut '.$licitacio->getId_Usuari().' en la subhasta del producte '.$licitacio->getId_Subasta().' amb la licitació de '.$licitacio->getValor().'<br><br>';
}

//TEMPS
$id_pro=2;
/*Connexio a la base de dades per carregar les subastes als divs*/
require_once(__DIR__.'/System/Classes/Subhasta.php'); //Necessitem Subhasta
$Subhasta = new Subhasta();
$Subhasta=$Subhasta->view_time($id_pro); //cambiar per id_subhasta

$fecha = $Subhasta->getTemps();

$segundos=strtotime($fecha) - strtotime('now');
$diferencia_dias=intval($segundos/60/60/24);
$segundos = $segundos - ($diferencia_dias*60*60*24);
$diferencia_horas=intval($segundos/60/60);
$segundos = $segundos - ($diferencia_horas*60*60);
$diferencia_minutos=intval($segundos/60);
$segundos = $segundos - ($diferencia_minutos*60);

if ($segundos < 0){
    echo 'La subhasta ha finalitzat';
}else{
    echo "La cantidad de tiempo entre la fecha ".$fecha." y hoy ".strtotime('now')."es de <b>".$diferencia_dias."</b> dies, horas ".$diferencia_horas.", minutos ".$diferencia_minutos.", segundos ".$segundos."";
}
