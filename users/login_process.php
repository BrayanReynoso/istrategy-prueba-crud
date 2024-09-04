<?php
session_start();
header('Content-Type: application/json');

$servername = "127.0.0.1";
$username = "root";
$password = "rootroot";
$dbname = "db_istrategy";
$port = 3306; 

$response = ['status' => 'error', 'message' => 'Ocurrió un error inesperado'];

try {
    $conn = new mysqli($servername, $username, $password, $dbname, $port);
    if ($conn->connect_error) {
        throw new Exception("Conexión fallida: " . $conn->connect_error);
    }
} catch (Exception $e) {
    $response['message'] = 'Error en la conexión a la base de datos: ' . $e->getMessage();
    echo json_encode($response);
    exit;
}

// Validar y filtrar los datos de entrada
$email = isset($_POST['correo']) ? filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL) : '';
$password = isset($_POST['contraseña']) ? htmlspecialchars($_POST['contraseña']) : '';

if (empty($email) || empty($password)) {
    $response['message'] = 'Por favor, completa todos los campos.';
    echo json_encode($response);
    exit;
}

try {
    // Preparar y ejecutar la consulta
    $query = "SELECT * FROM users WHERE email = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                header('Location: /prueba-istrategy/public/pages/profile.php');
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $response['status'] = 'success';
                $response['message'] = 'Inicio de sesión exitoso';
            } else {
                $response['message'] = 'Credenciales incorrectas';
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Credenciales incorrectas'
            ];
            echo json_encode($response);
            exit;
        }

        $stmt->close();
    } else {
        $response['message'] = 'Error en la consulta a la base de datos';
    }

} catch (Exception $e) {
    $response['message'] = 'Error en el servidor: ' . $e->getMessage();
}
$conn->close();
echo json_encode($response);
?>
