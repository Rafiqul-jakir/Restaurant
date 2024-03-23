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
    }

    $obj = new App;

?>