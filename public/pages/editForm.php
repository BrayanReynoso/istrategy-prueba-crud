
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                <form id="editForm" method="POST" action="../../users/editar_usuario.php">
                    <input type="hidden" id="editUserId" name="userId">
                    <div id="alertContainer" class="alert" style="display:none;"></div>
                    <div class="form-group">
                        <label for="editUsername">User Name</label>
                        <div class="input-container">
                            <img src="../../assets/ICONO 1.png" size="10px" alt="User Icon" class="input-icon">
                            <input type="text" class="form-control" id="editUsername" name="username" placeholder="Introduce tu nombre de usuario" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email Address</label>
                        <div class="input-container">
                            <img src="../../assets/ICONO 2.png" alt="Email Icon" class="input-icon">
                            <input type="email" class="form-control" id="editEmail" name="email" placeholder="Introduce tu email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editPassword">Password</label>
                        <div class="input-container">
                            <img src="../../assets/ICONO 3.png" alt="Password Icon" class="input-icon">
                            <input type="password" class="form-control" id="editPassword" name="password" placeholder="(deja en blanco para no cambiar)" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editConfirmPassword">Confirm Password</label>
                        <div class="input-container">
                            <img src="../../assets/ICONO 4.png" alt="Password Icon" class="input-icon">
                            <input type="password" class="form-control" id="editConfirmPassword" name="confirmPassword" placeholder="(deja en blanco para no cambiar)" >
                        </div>
                    </div>
                    <div class="form-group" id="editGender">
                        <label>Género</label><br>
                        <input type="radio" id="editMale" name="gender" value="male">
                        <label for="editMale">Masculino</label><br>
                        <input type="radio" id="editFemale" name="gender" value="female">
                        <label for="editFemale">Femenino</label><br>
                        <input type="radio" id="editOther" name="gender" value="other">
                        <label for="editOther">Otro</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
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