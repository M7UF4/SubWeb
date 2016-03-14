<?php
    require_once __DIR__."/../config.php";
    class Licitacio{
        /*Atributs*/
        private $id_usuari;
        private $id_subasta;
        private $valor;
        private $id_licitacio;
        
        //METODES
        public function add(){
            $db = new connexio();
            $db->query("INSERT INTO Licitacio(id_usuari,id_subasta,valor) "
                    . "VALUES ('$this->id_usuari', $this->id_subasta', '$this->valor')");
            $db->close();
        }
        public function mod(){
            $db = new connexio();
            $db->query("UPDATE Licitacio SET id_usuari='$this->id_usuari', id_subasta='$this->id_subasta', valor='$this->valor' WHERE id_usuari= '$this->id_usuari'");
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
                $Licitacio = new Licitacio($obj["id_usuari"],$obj["id_subasta"],$obj["valor"],$obj["id_licitacio"],$obj["password"],$obj["nom"],$obj["cognom"],$obj["dni"],$obj["telefon"],$obj["adreça"],$obj["id_tipus"]);
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
                call_valor_func_array(array($this, $f), $args);
            }
        }
        function __construct0(){
            $this->id_licitacio = 0;
            $this->id_usuari="";
            $this->id_subasta = "";
            $this->valor = "";
        }
        function __construct10($a2, $a3, $a4){
            $this->id_licitacio = 0;
            $this->id_usuari= $a2;
            $this->id_subasta = $a3;
            $this->valor = $a4;
        }
        function __construct11($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11){
            $this->id_licitacio = $a1;
            $this->id_usuari=$a2;
            $this->id_subasta = $a3;
            $this->valor = $a4;
        }
           
        //METODES SET
        public function setId_Licitacio($id_licitacio) {
            $this->id_licitacio = $id_licitacio;
        }
        public function setId_Subasta($id_subasta) {
            $this->id_subasta = $id_subasta;
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
        public function getId_Subasta(){
            return $this->id_subasta;
        }
        public function getValor(){
            return $this->valor;
        }
        public function getId_Usuari(){
            return $this->id_usuari;
        }
    }
?>