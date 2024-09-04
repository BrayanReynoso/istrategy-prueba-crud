<?php
include './../config/db_conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $confirmPassword = isset($_POST['confirmPassword']) ? trim($_POST['confirmPassword']) : '';
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';

    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword) || empty($gender)) {
        $response = [
            'status' => 'error',
            'message' => 'Por favor, completa todos los campos.'
        ];
        echo json_encode($response);
        exit;
    }

    if ($password !== $confirmPassword) {
        $response = [
            'status' => 'error',
            'message' => 'Las contraseñas no coinciden.'
        ];
        echo json_encode($response);
        exit;
    }

    $validGenders = ['male', 'female', 'other'];
    if (!in_array($gender, $validGenders)) {
        $response = [
            'status' => 'error',
            'message' => 'El género seleccionado no es válido.'
        ];
        echo json_encode($response);
        exit;
    }

    $query = "SELECT COUNT(*) FROM users WHERE username = :username OR email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $userExists = $stmt->fetchColumn();

    if ($userExists) {
        $response = [
            'status' => 'error',
            'message' => 'El nombre de usuario o el correo electrónico ya están en uso.'
        ];
        echo json_encode($response);
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users (username, email, password, gender) VALUES (:username, :email, :password, :gender)";

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':gender', $gender);

        if ($stmt->execute()) {
            $response = [
                'status' => 'success',
                'message' => 'Usuario registrado con éxito.'
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        } else {
            $response = [
                'status' => 'error',
                'message' => 'No se pudo registrar el usuario. Inténtalo de nuevo.'
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    } catch (PDOException $e) {
        $response = [
            'status' => 'error',
            'message' => 'Error en la base de datos. Por favor, inténtalo de nuevo más tarde.'
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}
?>
