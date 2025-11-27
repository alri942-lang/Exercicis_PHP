<?php
require_once __DIR__."/../config/database.php";

class Videojoc {

    private $conn;
    private $table = "videojocs";

    public function __construct(){
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll(){
        $stmt = $this->conn->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id){
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nom,$plataforma,$any,$preu){
        $stmt = $this->conn->prepare(
            "INSERT INTO $this->table (nom,plataforma,any,preu) VALUES (?,?,?,?)"
        );
        return $stmt->execute([$nom,$plataforma,$any,$preu]);
    }

    public function update($id,$nom,$plataforma,$any,$preu){
        $stmt = $this->conn->prepare(
            "UPDATE $this->table SET nom=?, plataforma=?, any=?, preu=? WHERE id=?"
        );
        return $stmt->execute([$nom,$plataforma,$any,$preu,$id]);
    }

    public function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id=?");
        return $stmt->execute([$id]);
    }
}