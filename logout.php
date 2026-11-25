<?php
// Cerrar sesión: borra todos los datos de la sesión y manda al inicio.
session_start();

// Se vacían los datos guardados (tipo de usuario, nombre, cuenta, etc.)
$_SESSION = [];

// Se borra también la cookie de la sesión en el navegador
if (ini_get("session.use_cookies")) {
    $cookie = session_get_cookie_params();
    setcookie(session_name(), "", time() - 3600, $cookie["path"], $cookie["domain"], $cookie["secure"], $cookie["httponly"]);
}

// Se destruye la sesión en el servidor
session_destroy();

header("Location: index.php");
exit();
