<?php
include("./../config/db_conexion.php");

try {
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        $userId = isset($_GET['id']) ? trim($_GET['id']) : '';

        if (empty($userId)) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 'error',
                'message' => 'ID de usuario no proporcionado.'
            ]);
            exit;
        }

        $query = "DELETE FROM users WHERE id = :userId";

        try {
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':userId', $userId);

            if ($stmt->execute()) {
                header('Content-Type: application/json');
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Usuario eliminado exitosamente.'
                ]);
            } else {
                header('Content-Type: application/json');
                echo json_encode([
                    'status' => 'error',
                    'message' => 'No se pudo eliminar el usuario. Inténtalo de nuevo.'
                ]);
            }
        } catch (PDOException $e) {
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 'error',
                'message' => 'Error en la base de datos: ' . $e->getMessage()
            ]);
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'error',
            'message' => 'Método no permitido.'
        ]);
    }
} catch(PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['error' => $e->getMessage()]);
}
?>