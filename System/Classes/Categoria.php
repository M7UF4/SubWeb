<?php
    require_once __DIR__."/../config.php";
    class Categoria{
        /*Atributs*/
        public $id_categoria;
        public $tipus;
        
        //METODES
        public function add(){
            $db = new connexio();
            $db->query("INSERT INTO Categoria(tipus) "
                    . "VALUES ('$this->tipus')");
            $db->close();
        }
        public function mod(){
            $db = new connexio();
            $db->query("UPDATE Categoria SET tipus='$this->tipus' WHERE id_categoria= '$this->id_categoria'");
            $db->close();
        }
        public function delete($var){
            $db = new connexio();
            $sql = "delete from Categoria where id_categoria = $var";
            $db->query($sql);
        }
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Categoria;";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Categoria = new Categoria($obj["id_categoria"],$obj["tipus"]);
                //var_dump($Categoria);
                array_push($rtn, $Categoria);
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
            $this->id_categoria=0;
            $this->tipus = "";
        }
        function __construct1($a2){
            $this->id_categoria=0;
            $this->tipus = $a2;
        }
        function __construct2($a1, $a2){
            $this->id_categoria=$a1;
            $this->tipus = $a2;
        }
           
        //METODES SET
        public function setId_Categoria($id_categoria) {
            $this->id_categoria = $id_categoria;
        }
        public function setTipus($tipus) {
            $this->tipus = $tipus;
        }
    }
?>

