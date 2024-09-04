<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ERROR | E_PARSE);

$servername = "127.0.0.1";
$username = "root";
$password = "rootroot"; 
$dbname = "db_istrategy";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Error en la conexión con la base de datos. Por favor, inténtalo de nuevo más tarde.']);
    exit;
}
?>
