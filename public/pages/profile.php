<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="../../css/profile.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <header>
        <div class="profile-background">
            <div class="container-fluid">
                <div class="col-md-12 d-flex flex-row align-items-center profile-content">
                    <div class="col-md-3 profile-photo">
                        <img src="../../assets/foto.jpg" alt="Foto de perfil" class="img-fluid">
                    </div>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light profile-navbar">
                        <div class="d-flex flex-column align-items-start">
                            <span class="navbar-text m-0 p-0"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                            <a class="navbar-brand m-0 p-0"><?php echo htmlspecialchars($_SESSION['email']); ?></a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">Galería</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">Novedades</a>
                                </li>
                                <li>
                                    <a href="../../users/logout.php" class="btn btn-danger ml-3">Cerrar sesión</a>

                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="p-content">
        <header class="profile-header container-fluid">
            <div class="welcome-container">
                <img src="../../assets/avion.png" alt="avion" class="welcome-icon">
                <div class="welcome-message">
                    <p class="welcome-title">Bienvenido a tu perfil</p>
                    <p class="welcome-subtitle">Para tener un mayor alcance de tu perfil no olvides actualizarlo continuamente.</p>
                </div>
                <img src="../../assets/LOGO-AVION-ROJO-iSTRATEGY.png" alt="logo-istrategy" class="welcome-icon">
            </div>
        </header>
        <main class="profile-body container-fluid">
            <section class="about-me">
                <h3>Sobre mi...</h3>
                <p>Soy <?php echo htmlspecialchars($_SESSION['username']); ?>, un diseñador web con 6 años de experiencia en la creación de identidad para empresas. Me destaco por mi liderazgo y organización, y estoy comprometido con mi empresa para ayudar a nuestros clientes a conseguir su identidad visual. Actualmente, busco mantenerme al día en cuanto a tendencias digitales para que pueda contribuir con mi experiencia y habilidades dentro de iStrategy.</p>
            </section>
            <div class="profile-content container-fluid">
                <div class="row">
                    <div class="col-md-3 profile-sidebar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active">Vista General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Trabajo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Educación</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Contacto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Habilidades</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-9 profile-details">
                        <div class="profile-section">
                            <h3>Vista General</h3>
                            <p>Diseñador UX/UI en BlueYonder, Becario de Diseño UX/UI en BlueYonder</p>
                            <a class="btn btn-link">Editar información</a>
                        </div>

                        <div class="profile-section">
                            <h3>Educación</h3>
                            <p>Ingeniería en Informática en UNAM, Cursado desde 2018 hasta 2024</p>
                            <a class="btn btn-link">Editar información</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>