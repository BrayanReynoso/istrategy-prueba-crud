<?php
session_start();

// Verificar si el usuario ya está autenticado
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Usuario ya está autenticado, redirigir a perfil
    header('Location: profile.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gestión de Usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/main.js" defer></script>
</head>

<body>
    <main class="d-flex justify-content-center vh-100" style="background: url('../../assets/back.jpg') no-repeat center center fixed; background-size: cover;">
        <div class="custom-container">
            <div class="d-flex flex-column align-items-center">
                <div class="text-center ">
                    <img src='../..//assets/LOGO-AVION-ROJO-iSTRATEGY.png' alt="Logo" class="logo">
                </div>
                <h1>Iniciar Sesión</h1>
                <h4 class="mb-4 text-secondary">Ingresa tus datos a continuación</h4>
            </div>
            <div class="container-form">
                <form id="loginForm" action="../../users/login_process.php" method="post">
                    <div class="form-group">
                        <label for="correo">Correo electrónico:</label>
                        <input type="email" placeholder="Ingrese el correo electronico" id="correo" name="correo" class="form-control" required>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <label for="contraseña">Contraseña:</label>
                        <a href="#">Olvidé mi contraseña</a>
                    </div>
                    <input type="password" id="contraseña" placeholder="Ingrese su contraseña" name="contraseña" class="form-control mb-3" required>
                    
                    <button type="submit" class="btn btn-danger btn-block">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="..//js/main.js"></script>

</body>

</html>