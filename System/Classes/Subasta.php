<?php
    require_once __DIR__."/../config.php";
    class Subasta{
        /*Atributs*/
        private $id_subasta;
        private $id_producto;
        private $num_licitacions;
        private $temps;
        
        //METODES
        public function add(){
            $db = new connexio();
            $db->query("INSERT INTO Subasta(id_producto,num_licitacions,temps) "
                    . "VALUES ('$this->id_producto', '$this->num_licitacions', '$this->temps')");
            $db->close();
        }
        public function mod(){
            $db = new connexio();
            $db->query("UPDATE Subasta SET id_producto='$this->id_producto', num_licitacions='$this->num_licitacions', temps='$this->temps' WHERE id_subasta= '$this->id_subasta'");
            $db->close();
        }
        public function delete($var){
            $db = new connexio();
            $sql = "delete from Subasta where id_subasta = $var";
            $db->query($sql);
        }
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Subasta;";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Subasta = new Subasta($obj["id_subasta"],$obj["id_producto"],$obj["num_licitacions"],$obj["temps"]);
                //var_dump($Subasta);
                array_push($rtn, $Subasta);
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
            $this->id_subasta=0;
            $this->id_producto = "";
            $this->num_licitacions = "";
            $this->temps = "";
        }
        function __construct10($a2, $a3, $a4){
            $this->id_subasta=0;
            $this->id_producto = $a2;
            $this->num_licitacions = $a3;
            $this->temps = $a4;
        }
        function __construct11($a1, $a2, $a3, $a4){
            $this->id_subasta=$a1;
            $this->id_producto = $a2;
            $this->num_licitacions = $a3;
            $this->temps = $a4;
        }
           
        //METODES SET
        public function setId_Subasta($id_subasta) {
            $this->id_subasta = $id_subasta;
        }
        public function setId_Producto($id_producto) {
            $this->id_producto = $id_producto;
        }
        public function setNum_Licitacions($num_licitacions) {
            $this->num_licitacions = $num_licitacions;
        }
        public function setTemps($temps) {
            $this->temps = $temps;
        }
        
        //METODES GET 
        public function getId_Subasta(){
            return $this->id_subasta;
        }
        public function getId_Producto(){
            return $this->id_producto;
        }
        public function getNum_Licitacions(){
            return $this->num_licitacions;
        }
        public function getTemps(){
            return $this->temps;
        }
    }
?>

