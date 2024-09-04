<?php
session_start();
session_unset(); // Destruye todas las variables de sesión
session_destroy(); // Destruye la sesión
header('Location: ../public/pages/login.php'); // Redirige al formulario de inicio de sesión
exit();
?>