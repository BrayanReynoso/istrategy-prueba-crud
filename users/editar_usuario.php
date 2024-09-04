<?php
include './../config/db_conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = isset($_POST['userId']) ? trim($_POST['userId']) : '';  // Asegúrate de que userId esté definido
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $confirmPassword = isset($_POST['confirmPassword']) ? trim($_POST['confirmPassword']) : '';
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';

    // Verificar si los campos obligatorios se han llenado
    if (empty($userId) || empty($username) || empty($email) || empty($gender)) {
        $response = [
            'status' => 'error',
            'message' => 'Por favor, completa todos los campos obligatorios.'
        ];
        echo json_encode($response);
        exit;
    }

    // Validar el género
    $validGenders = ['male', 'female', 'other'];
    if (!in_array($gender, $validGenders)) {
        $response = [
            'status' => 'error',
            'message' => 'El género seleccionado no es válido.'
        ];
        echo json_encode($response);
        exit;
    }

    // Validar la contraseña solo si se proporciona
    if (!empty($password) || !empty($confirmPassword)) {
        if ($password !== $confirmPassword) {
            $response = [
                'status' => 'error',
                'message' => 'Las contraseñas no coinciden.'
            ];
            echo json_encode($response);
            exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    }

    // Construir la consulta SQL dinámicamente
    $query = "UPDATE users SET username = :username, email = :email, gender = :gender";
    
    // Solo agregar la actualización de contraseña si se proporciona
    if (!empty($password)) {
        $query .= ", password = :password";
    }

    $query .= " WHERE id = :userId";

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':gender', $gender);

        // Solo enlazar la contraseña si se proporciona
        if (!empty($password)) {
            $stmt->bindParam(':password', $hashedPassword);
        }

        if ($stmt->execute()) {
            $response = [
                'status' => 'success',
                'message' => 'Usuario actualizado con éxito.'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'No se pudo actualizar el usuario. Inténtalo de nuevo.'
            ];
        }
    } catch (PDOException $e) {
        $response = [
            'status' => 'error',
            'message' => 'Error en la base de datos. Por favor, inténtalo de nuevo más tarde.'
        ];
    }

    // Enviar la respuesta en formato JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>
