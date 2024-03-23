<?php
    require "../config/config.php";

    class App{
        public $host = HOST;
        public $dbname = DBNAME;
        public $user = USER;
        public $pass = PASS;

        public $link;


        public function __construct()
        {
            $this->connect();

        }
        public function connect(){
            $this->link = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname."",$this->user, $this->pass);
            if($this->link){
                echo "DB connection is Working";
            }
        }

        //select all
        public function selectAll($query){
            $rows = $this->link->query($query);
            $rows->execute();

            $allRows = $rows->fetchAll(PDO::FETCH_OBJ);
            if($allRows){
                return $allRows;
            }else{
                return false;
            }
        }
        
        //select one row
        public function selectOne($query){
            $row = $this->link->query($query);
            $row->execute();

            $singleRow = $row->fetch(PDO::FETCH_OBJ);
            if($singleRow){
                return $singleRow;
            }else{
                return false;
            }
        }
    }

    $obj = new App;

?>