
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../../css/register.css">

</head>

<body>
    <div class="sidebar" style="background: url('../../assets/main-8.png') no-repeat center center fixed; background-size: cover;">
        <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
    </div>
    <div class="container">
        <div class="card">
            <div class="form-section">
                <form id="userForm" method="POST" action="../../users/agregar_usuario.php">
                    <div class="form-group">
                    <div id="alertContainer"></div>

                        <label for="username">User Name</label>
                        <div class="input-container">
                            <img src="../../assets/ICONO 1.png" size="10px" alt="User Icon" class="input-icon">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Introduce tu nombre de usuario" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-container">
                            <img src="../../assets/ICONO 2.png" alt="Email Icon" class="input-icon">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Introduce tu email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-container">
                            <img src="../../assets/ICONO 3.png" alt="Password Icon" class="input-icon">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Introduce tu contraseña" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <div class="input-container">
                            <img src="../../assets/ICONO 4.png" alt="Password Icon" class="input-icon">
                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirma tu contraseña" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Género</label><br>
                        <div>
                            <input type="radio" id="male" name="gender" value="male">
                            <label for="male">Masculino</label><br>
                            <input type="radio" id="female" name="gender" value="female">
                            <label for="female">Femenino</label><br>
                            <input type="radio" id="other" name="gender" value="other">
                            <label for="other">Otro</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <button type="button" class="btn btn-secondary" onclick="window.history.back()">Cancelar</button>
                </form>
            </div>
            <div class="image-section">
                <img src="../../assets/main-2-foto.png" alt="Imagen de registro">
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
</body>

</html>