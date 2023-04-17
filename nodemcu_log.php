<?php
    class Nodemcu_log{

        // Connection
        private $conn;

        // Table
        private $db_table = "iot_tbl";

        // Columns
        public $id;
        public $pH;
        public $temp;
        public $gas;
        public $psi;
        public $pa;
        public $created_at;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // CREATE
        public function createLogData(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        pH = :pH,
                        temp = :temp,
                        gas = :gas,
                        psi = :psi,
                        pa = :pa";

            $stmt = $this->conn->prepare($sqlQuery);

            // sanitize
            $this->pH=htmlspecialchars(strip_tags($this->pH));
            $this->temp=htmlspecialchars(strip_tags($this->temp));
            $this->gas=htmlspecialchars(strip_tags($this->gas));
            $this->psi=htmlspecialchars(strip_tags($this->psi));
            $this->pa=htmlspecialchars(strip_tags($this->pa));

            // bind data
            $stmt->bindParam(":pH", $this->pH);
            $stmt->bindParam(":temp", $this->temp);
            $stmt->bindParam(":gas", $this->gas);
            $stmt->bindParam(":psi", $this->psi);
            $stmt->bindParam(":pa", $this->pa);

            if($stmt->execute()){
               return true;
            }
            return  false ;
        }
    }
?>
