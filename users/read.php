<?php
include './../config/db_conexion.php';

try {
    $sql = "SELECT * FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($users);

} catch(PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Error en la base de datos. Por favor, inténtalo de nuevo más tarde.']);
}
?>
