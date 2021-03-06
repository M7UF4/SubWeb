<?php
    require_once __DIR__."/../config.php";
    class Producte{
        /*Atributs*/
        private $id_producte;
        private $nom;
        private $descripcio;
        private $caracteristiques;
        private $link_img;
        private $id_categoria;
        private $preu_mercat;
        
        //METODES
        public function add(){
            $db = new connexio();
            $db->query("INSERT INTO Producte(nom,descripcio,caracteristiques,link_img,id_categoria,preu_mercat) "
                    . "VALUES ('$this->nom','$this->descripcio','$this->caracteristiques','$this->link_img','$this->id_categoria','$this->preu_mercat')");
            $db->close();
        }
        public function mod($idPro){
            $db = new connexio();
            $db->query("UPDATE Producte SET nom='$this->nom', descripcio='$this->descripcio', caracteristiques='$this->caracteristiques', link_img='$this->link_img', id_categoria='$this->id_categoria', preu_mercat='$this->preu_mercat' WHERE id_producte= '$idPro'");
            $db->close();
        }
        public function delete($var){
            $db = new connexio();
            $sql = "delete from Producte where id_producte = $var";
            $db->query($sql);
        }
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Producte";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Producte = new Producte($obj["id_producte"],$obj["nom"],$obj["descripcio"],$obj["caracteristiques"],$obj["link_img"],$obj["id_categoria"],$obj["preu_mercat"]);
                //var_dump($Producte);
                array_push($rtn, $Producte);
            }
            $db->close();
            return $rtn;
        }        
        
        public function view_pro($id_pro){
            $db = new connexio();
            $sql = "SELECT * FROM Producte where id_producte='$id_pro'";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Producte = new Producte($obj["id_producte"],$obj["nom"],$obj["descripcio"],$obj["caracteristiques"],$obj["link_img"],$obj["id_categoria"],$obj["preu_mercat"]);
                array_push($rtn, $Producte);
            }
            //var_dump($rtn);
            $db->close();
            return $rtn;
        }  
        
       //CONSTRUCTORS
        function __construct(){
            $args = func_get_args();
            $num = func_num_args();
            $f='__construct'. $num;
            if (method_exists($this, $f)) {
                call_user_func_array(array($this, $f), $args);
            }
        }
        function __construct0(){
            $this->id_producte=0;
            $this->nom = "";
            $this->descripcio = "";
            $this->caracteristiques = "";
            $this->link_img = "";
            $this->id_categoria = "";
            $this->preu_mercat = "";
        }
        function __construct6($a2, $a3, $a4, $a5, $a6, $a7){
            $this->id_producte=0;
            $this->nom = $a2;
            $this->descripcio = $a3;
            $this->caracteristiques = $a4;
            $this->link_img = $a5;
            $this->id_categoria = $a6;
            $this->preu_mercat = $a7;
        }
        function __construct7($a1, $a2, $a3, $a4, $a5, $a6, $a7){
            $this->id_producte=$a1;
            $this->nom = $a2;
            $this->descripcio = $a3;
            $this->caracteristiques = $a4;
            $this->link_img = $a5;
            $this->id_categoria = $a6;
            $this->preu_mercat = $a7;
        }
           
        //METODES SET
        public function setId_Producte($id_producte) {
            $this->id_producte = $id_producte;
        }
        public function setNom($nom) {
            $this->nom = $nom;
        }
        public function setDescripcio($descripcio) {
            $this->descripcio = $descripcio;
        }
        public function setCaracteristiques($caracteristiques) {
            $this->caracteristiques = $caracteristiques;
        }
        public function setLink_img($link_img) {
            $this->link_img = $link_img;
        }
        public function setId_Categoria($id_categoria) {
            $this->id_categoria = $id_categoria;
        }
        public function setPreu_Mercat($preu_mercat) {
            $this->preu_mercat = $preu_mercat;
        }
        
        //METODES GET 
        public function getId_Producte(){
            return $this->id_producte;
        }
        public function getNom(){
            return $this->nom;
        }
        public function getDescripcio(){
            return $this->descripcio;
        }
        public function getCaracteristiques(){
            return $this->caracteristiques;
        }
        public function getLink_img(){
            return $this->link_img;
        }
        public function getId_Categoria(){
            return $this->id_categoria;
        }
        public function getPreu_Mercat(){
            return $this->preu_mercat;
        }
    }
?>

