<?php
// Paso 4 de 4: se valida y se guarda la nueva contraseña.
session_start();
require "config/conexion.php";

// Solo entra quien respondió bien la pregunta y envió el formulario
if (!isset($_SESSION["recuperar_ok"]) || $_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: recuperar_password.php");
    exit();
}

// Validaciones: mínimo 8 caracteres y que las dos contraseñas coincidan. Si fallan, se regresa al paso anterior con el mensaje
$password = $_POST["password"];

if (strlen($password) < 8) {
    $_SESSION["recuperar_error"] = "La contraseña debe tener mínimo 8 caracteres.";
    header("Location: recuperar_nueva.php");
    exit();
}

if ($password !== $_POST["confirmar"]) {
    $_SESSION["recuperar_error"] = "Las contraseñas no coinciden.";
    header("Location: recuperar_nueva.php");
    exit();
}

// Todo bien: se guarda la nueva contraseña encriptada
$consulta = $pdo->prepare("UPDATE tblcuentas_lector SET contrasenia = ? WHERE id_cuenta = ?");
$consulta->execute([password_hash($password, PASSWORD_DEFAULT), $_SESSION["recuperar_ok"]]);

// Se termina el proceso de recuperación
unset($_SESSION["recuperar_cuenta"], $_SESSION["recuperar_clave"], $_SESSION["recuperar_ok"]);
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Recuperar contraseña - Biblioteca Escolar</title>

        <!-- Fuente Poppins (guia de estilos) -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="./css/bootstrap.min.css" />

        <link rel="stylesheet" href="./css/recuperar.css" />
        <link rel="stylesheet" href="./css/footer.css" />
    </head>

    <body class="d-flex flex-column min-vh-100">
        <!-- Iconos (set Lucide, trazo lineal) -->
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
            <symbol id="i-circle-check" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <path d="m9 12 2 2 4-4" />
            </symbol>
            <symbol id="i-user" viewBox="0 0 24 24">
                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </symbol>
            <symbol id="i-lock" viewBox="0 0 24 24">
                <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
            </symbol>
            <symbol id="i-eye" viewBox="0 0 24 24">
                <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                <circle cx="12" cy="12" r="3" />
            </symbol>
            <symbol id="i-eye-off" viewBox="0 0 24 24">
                <path d="M10.733 5.076a10.744 10.744 0 0 1 11.205 6.575 1 1 0 0 1 0 .696 10.747 10.747 0 0 1-1.444 2.49" />
                <path d="M14.084 14.158a3 3 0 0 1-4.242-4.242" />
                <path d="M17.479 17.499a10.75 10.75 0 0 1-15.417-5.151 1 1 0 0 1 0-.696 10.75 10.75 0 0 1 4.446-5.143" />
                <path d="m2 2 20 20" />
            </symbol>
            <symbol id="i-triangle-alert" viewBox="0 0 24 24">
                <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3" />
                <path d="M12 9v4" />
                <path d="M12 17h.01" />
            </symbol>
            <symbol id="i-arrow-left" viewBox="0 0 24 24">
                <path d="m12 19-7-7 7-7" />
                <path d="M19 12H5" />
            </symbol>
            <symbol id="i-info" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <path d="M12 16v-4" />
                <path d="M12 8h.01" />
            </symbol>
            <symbol id="i-key-round" viewBox="0 0 24 24">
                <path
                    d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"
                />
                <circle cx="16.5" cy="7.5" r=".5" fill="currentColor" />
            </symbol>
            <symbol id="i-shield-question" viewBox="0 0 24 24">
                <path
                    d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"
                />
                <path d="M9.1 9a3 3 0 0 1 5.82 1c0 2-3 3-3 3" />
                <path d="M12 17h.01" />
            </symbol>
            <symbol id="i-clock" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <polyline points="12 6 12 12 16 14" />
            </symbol>
        </svg>

        <!-- Encabezado -->
        <header class="site-header d-flex align-items-center">
            <nav class="navbar navbar-expand-lg py-2 w-100">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center gap-2 m-0" href="index.php">
                        <img src="./img/logo-cbta5-blanco.png" alt="Logotipo del CBTa No. 5" class="brand-logo" />
                        <span>
                            <span class="brand-name d-block">Biblioteca Escolar</span>
                            <span class="brand-sub d-block">CBTa No. 5 · Huejutla, Hgo.</span>
                        </span>
                    </a>

                    <button
                        class="navbar-toggler border-light"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#mainMenu"
                        aria-controls="mainMenu"
                        aria-expanded="false"
                        aria-label="Abrir menú"
                    >
                        <span class="navbar-toggler-icon" style="filter: invert(1)"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="mainMenu">
                        <ul class="navbar-nav mx-lg-auto mb-3 mb-lg-0 gap-lg-3">
                            <li class="nav-item"><a class="nav-link px-lg-3" href="index.php">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3" href="nosotros.php">Nosotros</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3" href="preguntas.php">Preguntas</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3" href="politicas.php">Políticas</a></li>
                        </ul>

                        <div class="d-flex gap-2">
                            <a href="registro.php" class="btn btn-brand-outline">Registrarse</a>
                            <a href="login.php" class="btn btn-brand-light">Iniciar sesión</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <main class="flex-grow-1 d-flex flex-column">
            <div class="row g-0 flex-grow-1 mx-0">
                <!-- Panel izquierdo: mensaje de la biblioteca -->
                <section class="col-lg-7 login-info">
                    <div class="login-info-content">
                        <p class="eyebrow">Biblioteca del CBTa No. 5</p>
                        <h1 class="info-title">Más que libros, conectamos ideas</h1>

                        <p class="info-text">
                            Recupera el acceso a tu cuenta para consultar el catálogo y administrar tu cuenta de la biblioteca.
                        </p>

                        <ul class="check-list">
                            <li>
                                <svg class="icon"><use href="#i-circle-check" /></svg>
                                Hasta 3 libros por préstamo.
                            </li>
                            <li>
                                <svg class="icon"><use href="#i-circle-check" /></svg>
                                La reserva se identifica con un folio y no es un préstamo.
                            </li>
                            <li>
                                <svg class="icon"><use href="#i-circle-check" /></svg>
                                Retraso en la devolución: adeudo de $10 por día.
                            </li>
                        </ul>
                    </div>

                    <!-- Libros decorativos -->
                    <svg class="login-books" viewBox="0 0 1000 130" preserveAspectRatio="none" aria-hidden="true">
                        <rect x="10" y="38" width="30" height="92" fill="#2E7D58" />
                        <rect x="48" y="38" width="30" height="92" fill="#2E7D58" />
                        <rect x="86" y="10" width="30" height="120" fill="#B0A06E" />
                        <rect x="124" y="54" width="30" height="76" fill="#C5D8CE" />
                        <rect x="162" y="0" width="30" height="130" fill="#1F6B47" />
                        <rect x="200" y="12" width="30" height="118" fill="#B0A06E" />
                        <rect x="238" y="30" width="30" height="100" fill="#8A4B14" />
                        <rect x="276" y="52" width="30" height="78" fill="#C5D8CE" />
                        <rect x="314" y="12" width="30" height="118" fill="#B0A06E" />
                        <rect x="352" y="0" width="30" height="130" fill="#1F6B47" />
                        <rect x="390" y="34" width="30" height="96" fill="#2E7D58" />
                        <rect x="428" y="52" width="30" height="78" fill="#2E7D58" />
                        <rect x="466" y="38" width="30" height="92" fill="#B0A06E" />
                        <rect x="504" y="38" width="30" height="92" fill="#C5D8CE" />
                        <rect x="542" y="10" width="30" height="120" fill="#1F6B47" />
                        <rect x="580" y="54" width="30" height="76" fill="#B0A06E" />
                        <rect x="618" y="0" width="30" height="130" fill="#8A4B14" />
                        <rect x="656" y="12" width="30" height="118" fill="#C5D8CE" />
                        <rect x="694" y="30" width="30" height="100" fill="#B0A06E" />
                        <rect x="732" y="52" width="30" height="78" fill="#1F6B47" />
                        <rect x="770" y="12" width="30" height="118" fill="#2E7D58" />
                        <rect x="808" y="0" width="30" height="130" fill="#2E7D58" />
                        <rect x="846" y="34" width="30" height="96" fill="#B0A06E" />
                        <rect x="884" y="52" width="30" height="78" fill="#C5D8CE" />
                        <rect x="922" y="38" width="30" height="92" fill="#1F6B47" />
                        <rect x="960" y="38" width="30" height="92" fill="#B0A06E" />
                        <rect x="998" y="10" width="30" height="120" fill="#8A4B14" />
                    </svg>
                </section>

                <!-- Panel derecho: formulario -->
                <section class="col-lg-5 login-panel">
                    <div class="login-card">
                        <div class="state-icon state-ok">
                            <svg class="icon"><use href="#i-circle-check" /></svg>
                        </div>

                        <h2 class="login-title">Contraseña actualizada</h2>
                        <p class="login-subtitle">Tu contraseña se cambió correctamente. Ya puedes iniciar sesión con la nueva.</p>

                        <a href="login.php" class="btn btn-login d-flex align-items-center justify-content-center">Iniciar sesión</a>
                    </div>
                </section>
            </div>
        </main>

        <!-- Pie de pagina -->
        <?php include "includes/footer.php"; ?>

        <script src="./js/bootstrap.bundle.min.js"></script>
        <script>
            // mostrar u ocultar la contraseña (cada boton lleva el id de su campo)
            document.querySelectorAll(".toggle-password").forEach(function (boton) {
                boton.addEventListener("click", function () {
                    var campo = document.getElementById(boton.dataset.target);
                    var icono = boton.querySelector("use");
                    var visible = campo.type === "text";
                    campo.type = visible ? "password" : "text";
                    icono.setAttribute("href", visible ? "#i-eye" : "#i-eye-off");
                    boton.setAttribute("aria-label", visible ? "Mostrar contraseña" : "Ocultar contraseña");
                });
            });
        </script>
    </body>
</html>
