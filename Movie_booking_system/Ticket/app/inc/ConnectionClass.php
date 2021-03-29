<?php 

        class DbOperation{
            private $connect;

            function __construct(){
                $this->connect = new mysqli('localhost', 'root', '', 'movie');
                return $this->connect;
                }

            private function __exe($sql){
                return mysqli_query($this->connect, $sql); 
            }

            public function select($space1=""){
                $sql = 'select'.$space1;
                return $this->__exe($sql);
            }

            public function delete($space2){
                $sql = "DELETE FROM {$space2}";
                return $this->__exe($sql);
            }

            public function insert($table_name, $space1){
                $sql = "insert into {$table_name}{$space1}";
                return $this->__exe($sql);
            }

            public function update($table_name, $space1){
                $sql = "update {$table_name} set {$space1}";
                return $this->__exe($sql);
            }

            public function single_fetch($query, $find){
                if(mysqli_fetch_array($query) == TRUE){
                    return  mysqli_fetch_array($query)[$find];
                } 
            }

            function kill_db(){
                return mysqli_close($this->connect);
            }
            
        }

            
            


        

       
        