<?php
$host = 'localhost';
$db   = 'exercici1';
$user = 'root';
$pass = 'vagrant'; // posa la teva contrasenya si tens
$dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    exit("Error connexió: " . $e->getMessage());
}

// Funcions CRUD

function llegirUsuaris() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM usuaris");
    return $stmt->fetchAll();
}

function afegirUsuari($nom, $email, $edat) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO usuaris (nom, email, edat) VALUES (:nom, :email, :edat)");
    $stmt->execute([
        'nom' => $nom,
        'email' => $email,
        'edat' => (int)$edat
    ]);
}

function editarUsuari($id, $nousDades) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE usuaris SET nom=:nom, email=:email, edat=:edat WHERE id=:id");
    $stmt->execute([
        'nom' => $nousDades['nom'],
        'email' => $nousDades['email'],
        'edat' => (int)$nousDades['edat'],
        'id' => $id
    ]);
}

function eliminarUsuari($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM usuaris WHERE id=:id");
    $stmt->execute(['id' => $id]);
}
?>