<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Gestión de Usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../css/home.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"
        style="background: url('../../assets/main-8.png') no-repeat center center fixed; background-size: cover; position: relative;">
        <a class="navbar-brand btn btn-danger ml-3" href="./register.php">Agregar</a>
        <div style="position: absolute; left: 50%; transform: translateX(-50%);">
            <img src="../../assets/LOGO-AVION-ROJO-iSTRATEGY.png" alt="Logo" style="height: 50px;">
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="navbar-text">Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                </li>
                <li>
                    <a href="./login.php" class="btn btn-danger ml-3">Iniciar Sesión</a>

                </li>
            </ul>
        </div>
    </nav>

    <div class="wrapper">
        <div class="sidebar"
            style="background: url('../../assets/main-8.png')">
            <a href="#">Trabajo</a>
            <a href="#">Diseño</a>
            <a href="#">Familia</a>
            <a href="#">Amigos</a>
            <a href="#">Oficina</a>
            <a href="#">+ Crear nueva etiqueta</a>
            <a href="../../public/pages/profile.php" class="profile-link">Acceder a perfil</a>

        </div>
        <div class="content position-relative">
            <div id="alertContainer"></div>
            <div id="loader" class="loading-background" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.8); z-index: 1000; display: none; display: flex; justify-content: center; align-items: center;">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <table id="usersTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Genero</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>

    <script>
        $(userTable).ready(function() {
            $('#usersTable').DataTable();
        });
    </script>
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar este usuario?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>