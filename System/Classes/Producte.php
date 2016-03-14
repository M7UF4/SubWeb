<?php
    require_once __DIR__."/../config.php";
    class Producte{
        /*Atributs*/
        private $id_producte;
        private $nom;
        private $user;
        private $caracteristiques;
        private $link_img;
        private $id_categoria;
        private $preu_mercat;
        
        //METODES
        public function add(){
            $db = new connexio();
            $db->query("INSERT INTO Producte(nom,user,caracteristiques,link_img,id_categoria,preu_mercat,dni,telefon,adreça,id_tipus) "
                    . "VALUES ('$this->nom', '$this->user', '$this->caracteristiques', '$this->link_img', '$this->id_categoria', '$this->preu_mercat', '$this->dni', '$this->telefon', '$this->adreça', '$this->id_tipus')");
            $db->close();
        }
        public function mod(){
            $db = new connexio();
            $db->query("UPDATE Producte SET nom='$this->nom', user='$this->user', caracteristiques='$this->caracteristiques', link_img='$this->link_img', id_categoria='$this->id_categoria', preu_mercat='$this->preu_mercat', dni='$this->dni', telefon='$this->telefon', adreça='$this->adreça', id_tipus='$this->id_tipus' WHERE id_producte= '$this->id_producte'");
            $db->close();
        }
        public function delete($var){
            $db = new connexio();
            $sql = "delete from Producte where id_producte = $var";
            $db->query($sql);
        }
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Producte;";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Producte = new Producte($obj["id_producte"],$obj["nom"],$obj["user"],$obj["caracteristiques"],$obj["link_img"],$obj["id_categoria"],$obj["preu_mercat"],$obj["dni"],$obj["telefon"],$obj["adreça"],$obj["id_tipus"]);
                //var_dump($Producte);
                array_push($rtn, $Producte);
            }
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
            $this->user = "";
            $this->caracteristiques = "";
            $this->link_img = "";
            $this->id_categoria = "";
            $this->preu_mercat = "";
            $this->dni = "";
            $this->telefon = "";
            $this->adreça = "";
            $this->id_tipus = "";
        }
        function __construct10($a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11){
            $this->id_producte=0;
            $this->nom = $a2;
            $this->user = $a3;
            $this->caracteristiques = $a4;
            $this->link_img = $a5;
            $this->id_categoria = $a6;
            $this->preu_mercat = $a7;
            $this->dni = $a8;
            $this->telefon = $a9;
            $this->adreça = $a10;
            $this->id_tipus = $a11;
        }
        function __construct11($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11){
            $this->id_producte=$a1;
            $this->nom = $a2;
            $this->user = $a3;
            $this->caracteristiques = $a4;
            $this->link_img = $a5;
            $this->id_categoria = $a6;
            $this->preu_mercat = $a7;
            $this->dni = $a8;
            $this->telefon = $a9;
            $this->adreça = $a10;
            $this->id_tipus = $a11;
        }
           
        //METODES SET
        public function setId_Producte($id_producte) {
            $this->id_producte = $id_producte;
        }
        public function setSaldo($nom) {
            $this->nom = $nom;
        }
        public function setUser($user) {
            $this->user = $user;
        }
        public function setEmail($caracteristiques) {
            $this->caracteristiques = $caracteristiques;
        }
        public function setPassword($link_img) {
            $this->link_img = $link_img;
        }
        public function setNom($id_categoria) {
            $this->id_categoria = $id_categoria;
        }
        public function setCogid_categoria($preu_mercat) {
            $this->preu_mercat = $preu_mercat;
        }
        public function setDni($dni) {
            $this->dni = $dni;
        }
        public function setTelefon($telefon) {
            $this->telefon = $telefon;
        }
        public function setAdreça($adreça) {
            $this->adreça = $adreça;
        }
        public function setId_Tipus($id_tipus) {
            $this->id_tipus = $id_tipus;
        }
        
        //METODES GET 
        public function getId_Producte(){
            return $this->id_producte;
        }
        public function getSaldo(){
            return $this->nom;
        }
        public function getUser(){
            return $this->user;
        }
        public function getEmail(){
            return $this->caracteristiques;
        }
        public function getPassword(){
            return $this->link_img;
        }
        public function getNom(){
            return $this->id_categoria;
        }
        public function getCogid_categoria(){
            return $this->preu_mercat;
        }
        public function getDni(){
            return $this->dni;
        }
        public function getTelefon(){
            return $this->telefon;
        }
        public function getAdreça(){
            return $this->adreça;
        }
        public function getId_Tipus(){
            return $this->id_tipus;
        }
    }
?>

