<?php
    require_once __DIR__."/../config.php";
    class Subhasta{
        /*Atributs*/
        private $id_subhasta;
        private $id_producte;
        private $num_licitacions;
        private $temps;
        
        //METODES
        public function add(){
            $db = new connexio();
            $db->query("INSERT INTO Subhasta(id_producte,num_licitacions,temps) "
                    . "VALUES ('$this->id_producte', '$this->num_licitacions', '$this->temps')");
            $db->close();
        }
        public function mod(){
            $db = new connexio();
            $db->query("UPDATE Subhasta SET id_producte='$this->id_producte', num_licitacions='$this->num_licitacions', temps='$this->temps' WHERE id_subhasta= '$this->id_subhasta'");
            $db->close();
        }
        public function delete($var){
            $db = new connexio();
            $sql = "delete from Subhasta where id_subhasta = $var";
            $db->query($sql);
        }
        public function view_all(){
            $db = new connexio();
            $sql = "SELECT * FROM Subhasta;";
            $query = $db->query($sql);
            $rtn = array();
            while($obj = $query->fetch_assoc()){
                $Subhasta = new Subhasta($obj["id_subhasta"],$obj["id_producte"],$obj["num_licitacions"],$obj["temps"]);
                //var_dump($Subhasta);
                array_push($rtn, $Subhasta);
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
            $this->id_subhasta=0;
            $this->id_producte = "";
            $this->num_licitacions = "";
            $this->temps = "";
        }
        function __construct10($a2, $a3, $a4){
            $this->id_subhasta=0;
            $this->id_producte = $a2;
            $this->num_licitacions = $a3;
            $this->temps = $a4;
        }
        function __construct11($a1, $a2, $a3, $a4){
            $this->id_subhasta=$a1;
            $this->id_producte = $a2;
            $this->num_licitacions = $a3;
            $this->temps = $a4;
        }
           
        //METODES SET
        public function setId_Subhasta($id_subhasta) {
            $this->id_subhasta = $id_subhasta;
        }
        public function setId_Producte($id_producte) {
            $this->id_producte = $id_producte;
        }
        public function setNum_Licitacions($num_licitacions) {
            $this->num_licitacions = $num_licitacions;
        }
        public function setTemps($temps) {
            $this->temps = $temps;
        }
        
        //METODES GET 
        public function getId_Subhasta(){
            return $this->id_subhasta;
        }
        public function getId_Producte(){
            return $this->id_producte;
        }
        public function getNum_Licitacions(){
            return $this->num_licitacions;
        }
        public function getTemps(){
            return $this->temps;
        }
    }
?>
