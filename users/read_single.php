<?php
include './../config/db_conexion.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

try {
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        header('Content-Type: application/json');
        echo json_encode($user);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Usuario no encontrado.']);
    }

} catch(PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Error en la base de datos. Por favor, inténtalo de nuevo más tarde.']);
}
?>
