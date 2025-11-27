<?php
class Database {
    private $host = "localhost";
    private $db_name = "mvc_videojocs";
    private $username = "root";
    private $password = "root";
    public $conn;

    public function connect(){
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo "Error conexión DB: " . $e->getMessage();
        }
        return $this->conn;
    }
}
