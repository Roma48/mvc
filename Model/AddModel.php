<?php


if (!class_exists("ModelAdd")){

    class ModelAdd {

        public $db_name;
        public $db_user;
        public $db_pass;
        public $db_host;

        public function __construct(){
            $this->db_name = DB_NAME;
            $this->db_user = DB_USER;
            $this->db_pass = DB_PASS;
            $this->db_host = DB_HOST;
        }

        public function db_init(){
            return new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_pass);
        }

        public function db_insert($table, $values){
            $db = $this->db_init();
            $stmt = $db->prepare("INSERT INTO $table (title, text) VALUES (?,?)");
            $stmt->bindParam(1, $values['title']);
            $stmt->bindParam(2, $values['text']);
            $stmt->execute();
            return $stmt;
        }

    }

}

$modelAdd = new ModelAdd();