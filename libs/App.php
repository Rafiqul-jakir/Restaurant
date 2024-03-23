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

        //function for input validation
        public function validate($arr){
            if(in_array("",$arr)){
                return "empty";
            }
        }


        //insert Operation
        public function insert($query, $arr, $path){
            if($this->validate($arr) == "empty"){
                echo "<script>alert('one or more input fields are empty !!') </script>";
            }else{
                $insert_record = $this->link->prepare($query);
                $insert_record->execute($arr);
                
                header("location: ".$path."");
            }
        }

        //Update Operation
        public function update($query, $arr, $path){
            if($this->validate($arr) == "empty"){
                echo "<script>alert('one or more input fields are empty !!') </script>";
            }else{
                $update_record = $this->link->prepare($query);
                $update_record->execute($arr);
                
                header("location: ".$path."");
            }
        }

        //delete Operation
        public function delete($query, $path){

            $delete_record = $this->link->query($query);
            $delete_record->execute();

            header("location: ".$path."");
            
        }

        
        //register Operation
        public function register($query, $arr, $path){
            if($this->validate($arr) == "empty"){
                echo "<script>alert('one or more input fields are empty !!') </script>";
            }else{
                $register_user = $this->link->prepare($query);
                $register_user->execute($arr);
                
                header("location: ".$path."");
            }
        }

        //login operation
        public function login($query, $data, $path){
            
            //validate email;

            $login_user = $this->link->query($query);
            $login_user->execute();
            $fetch = $login_user->fetch(PDO::FETCH_OBJ);
            if($login_user->rowCount() > 0){
                if(password_verify($data['password'],$fetch['password'])){
                    //start session


                    header("location:".$path."");

                }
            }
        }



    //end of App Class    
    }

    $obj = new App;

?>