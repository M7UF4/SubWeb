<?php
    require_once __DIR__."/../config.php";
    require_once(__DIR__.'/../Classes/Subhasta.php'); //Necessitem Subhasta
    require_once(__DIR__.'/../Classes/Producte.php'); //Necessitem Producte
    require_once(__DIR__.'/../Classes/Licitacio.php'); //Necessitem Producte
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
    var_dump($Subhasta);
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
    