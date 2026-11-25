<?php
// Inicia la sesión una sola vez y dice si quien navega es un lector
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function es_lector()
{
    return ($_SESSION["tipo"] ?? "") === "lector";
}

// Para las páginas privadas del lector: si no hay sesión de lector, manda al login
function exigir_lector()
{
    if (!es_lector()) {
        header("Location: login.php");
        exit;
    }
}

// Para las páginas del administrador: si no hay sesión de bibliotecario, manda al login
function exigir_bibliotecario()
{
    if (!isset($_SESSION["id_bibliotecario"])) {
        header("Location: login.php");
        exit;
    }
}
