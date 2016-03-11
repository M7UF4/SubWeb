<?php
    require_once __DIR__."/../config.php";
    class Usuari{
        /*Atributs*/
        private $id_usuari;
        private $saldo;
        private $user;
        private $email;
        private $password;
        private $nom;
        private $cognom;
        
        //METODES
        public function add(){
            $db = new connexio();
            $db->query("INSERT INTO Usuari(saldo,user,email,password,nom,cognom,dni,telefon,adreça,id_tipus) "
                    . "VALUES ('$this->saldo', '$this->user', '$this->email', '$this->password', '$this->nom', '$this->cognom', '$this->dni', '$this->telefon', '$this->adreça', '$this->id_tipus')");
            $db->close();
        }
        public function mod(){
            $db = new connexio();
            $db->query("UPDATE Usuari SET saldo='$this->saldo', user='$this->user', email='$this->email', password='$this->password', nom='$this->nom', cognom='$this->cognom', dni='$this->dni', telefon='$this->telefon', adreça='$this->adreça', id_tipus='$this->id_tipus' WHERE id_usuari= '$this->id_usuari'");
            $db->close();
        }
        public function delete($var){
            $db = new connexio();
            $sql = "delete from Usuari where id_usuari = $var";
            $db->query($sql);
        }
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Usuari;";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Usuari = new Usuari($obj["id_usuari"],$obj["saldo"],$obj["user"],$obj["email"],$obj["password"],$obj["nom"],$obj["cognom"],$obj["dni"],$obj["telefon"],$obj["adreça"],$obj["id_tipus"]);
                //var_dump($Usuari);
                array_push($rtn, $Usuari);
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
            $this->id_usuari=0;
            $this->saldo = "";
            $this->user = "";
            $this->email = "";
            $this->password = "";
            $this->nom = "";
            $this->cognom = "";
            $this->dni = "";
            $this->telefon = "";
            $this->adreça = "";
            $this->id_tipus = "";
        }
        function __construct10($a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11){
            $this->id_usuari=0;
            $this->saldo = $a2;
            $this->user = $a3;
            $this->email = $a4;
            $this->password = $a5;
            $this->nom = $a6;
            $this->cognom = $a7;
            $this->dni = $a8;
            $this->telefon = $a9;
            $this->adreça = $a10;
            $this->id_tipus = $a11;
        }
        function __construct11($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11){
            $this->id_usuari=$a1;
            $this->saldo = $a2;
            $this->user = $a3;
            $this->email = $a4;
            $this->password = $a5;
            $this->nom = $a6;
            $this->cognom = $a7;
            $this->dni = $a8;
            $this->telefon = $a9;
            $this->adreça = $a10;
            $this->id_tipus = $a11;
        }
           
        //METODES SET
        public function setId_Usuari($id_usuari) {
            $this->id_usuari = $id_usuari;
        }
        public function setSaldo($saldo) {
            $this->saldo = $saldo;
        }
        public function setUser($user) {
            $this->user = $user;
        }
        public function setEmail($email) {
            $this->email = $email;
        }
        public function setPassword($password) {
            $this->password = $password;
        }
        public function setNom($nom) {
            $this->nom = $nom;
        }
        public function setCognom($cognom) {
            $this->cognom = $cognom;
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
        public function getId_Usuari(){
            return $this->id_usuari;
        }
        public function getSaldo(){
            return $this->saldo;
        }
        public function getUser(){
            return $this->user;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getNom(){
            return $this->nom;
        }
        public function getCognom(){
            return $this->cognom;
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

