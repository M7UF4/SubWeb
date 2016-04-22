<?php
    require_once __DIR__."/../config.php";
    class Licitacio{
        /*Atributs*/
        private $id_usuari;
        private $id_subhasta;
        private $valor;
        private $id_licitacio;
        
        //METODES
        public function add(){
            $db = new connexio();
            $db->query("INSERT INTO Licitacio(id_usuari,id_subhasta,valor) "
                    . "VALUES ('$this->id_usuari', '$this->id_subhasta', '$this->valor')");
            $db->close();
        }
        public function mod(){
            $db = new connexio();
            $db->query("UPDATE Licitacio SET id_usuari='$this->id_usuari', id_subhasta='$this->id_subhasta', valor='$this->valor' WHERE id_usuari= '$this->id_usuari'");
            $db->close();
        }
        public function delete($var){
            $db = new connexio();
            $sql = "delete from Licitacio where id_licitacio = $var";
            $db->query($sql);
        }
        
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Licitacio;";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Licitacio = new Licitacio($obj["id_usuari"],$obj["id_subhasta"],$obj["valor"],$obj["id_licitacio"],$obj["password"],$obj["nom"],$obj["cognom"],$obj["dni"],$obj["telefon"],$obj["adreça"],$obj["id_tipus"]);
                //var_dump($Licitacio);
                array_push($rtn, $Licitacio);
            }
            $db->close();
            return $rtn;
        }
        
        public function view_lici($idUsr){
            $db = new connexio();
            $sql = "SELECT * FROM Licitacio where id_usuari='$idUsr'";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Licitacio = new Licitacio($obj["id_usuari"],$obj["id_subhasta"],$obj["valor"],$obj["id_licitacio"]);
                //var_dump($Licitacio);
                array_push($rtn, $Licitacio);
            }
            $db->close();
            return $rtn;
        }
        function verificar_guanyador($id_subhasta){ 
            $db = new connexio();
            $sql = "SELECT * , COUNT( valor ) FROM Licitacio WHERE id_subhasta =$id_subhasta GROUP BY valor ORDER BY count(valor) asc, valor asc";
            $query = $db->query($sql);
            $datos = "";
            if ($query != null) {
                $row = $query->fetch_assoc();
                $datos = $row;
                return $datos;
            } else {
                return null;
            }
            $db->close();
        }
        function averiguar_usuari($id_subhasta){ 
            $db = new connexio();
            $sql = "SELECT * FROM Licitacio WHERE id_subhasta =$id_subhasta";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Licitacio = new Licitacio($obj["id_usuari"],$obj["valor"]);
                //var_dump($Licitacio);
                array_push($rtn, $Licitacio);
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
            $this->id_licitacio = 0;
            $this->id_usuari="";
            $this->id_subasta = "";
            $this->valor = "";
        }
        function __construct2($a2, $a4){
            $this->id_licitacio = 0;
            $this->id_usuari= $a2;
            $this->id_subasta = "";
            $this->valor = $a4;
        }
        function __construct3($a2, $a3, $a4){
            $this->id_licitacio = 0;
            $this->id_usuari= $a2;
            $this->id_subasta = $a3;
            $this->valor = $a4;
        }
        function __construct4($a1, $a2, $a3, $a4){
            $this->id_licitacio = $a1;
            $this->id_usuari=$a2;
            $this->id_subasta = $a3;
            $this->valor = $a4;
        }
           
        //METODES SET
        public function setId_Licitacio($id_licitacio) {
            $this->id_licitacio = $id_licitacio;
        }
        public function setId_Subhasta($id_subhasta) {
            $this->id_subhasta = $id_subhasta;
        }
        public function setValor($valor) {
            $this->valor = $valor;
        }
        public function setId_Usuari($id_usuari) {
            $this->id_usuari = $id_usuari;
        }
        
        public function getId_Licitacio(){
            return $this->id_licitacio;
        }
        public function getId_Subhasta(){
            return $this->id_subhasta;
        }
        public function getValor(){
            return $this->valor;
        }
        public function getId_Usuari(){
            return $this->id_usuari;
        }
    }
?>
