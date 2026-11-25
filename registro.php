<?php
session_start();
date_default_timezone_set("America/Mexico_City");
require "config/conexion.php"; // aquí viene la conexión $pdo
require "includes/funciones.php";
require "includes/correo.php";

$preguntas = $pdo->query("SELECT id_pregunta, pregunta FROM tblpreguntas_seguridad ORDER BY id_pregunta")->fetchAll();
$error = "";
$clave = "";
$id_pregunta = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $clave = trim($_POST["matricula"]);
    $password = $_POST["password"];
    $id_pregunta = $_POST["id_pregunta"];
    $respuesta = normalizar_respuesta($_POST["respuesta"]);

    // La matrícula o clave debe ser de un alumno o trabajador
    $consulta = $pdo->prepare(
        "SELECT matricula, NULL AS numero_control, nombre, email, estado FROM tblalumnos WHERE matricula = ?
         UNION
         SELECT NULL, numero_control, nombre, email, estado FROM tbltrabajadores WHERE numero_control = ?"
    );
    $consulta->execute([$clave, $clave]);
    $persona = $consulta->fetch();

    // ¿Ya tiene una cuenta?
    $consulta = $pdo->prepare("SELECT id_cuenta, activa FROM tblcuentas_lector WHERE matricula = ? OR numero_control = ?");
    $consulta->execute([$clave, $clave]);
    $cuenta = $consulta->fetch();

    if (strlen($password) < 8) {
        $error = "La contraseña debe tener mínimo 8 caracteres.";
    } elseif ($password !== $_POST["confirmar"]) {
        $error = "Las contraseñas no coinciden.";
    } elseif ($respuesta === "") {
        $error = "Escribe la respuesta de seguridad.";
    } elseif (!ctype_digit($clave) || !$persona || $persona["estado"] !== "Activo") {
        $error = "No encontramos esa matrícula o clave, o no está activa.";
    } elseif (!in_array($id_pregunta, array_column($preguntas, "id_pregunta"))) {
        $error = "Elige una pregunta de seguridad.";
    } elseif ($cuenta && $cuenta["activa"] == 1) {
        $error = "Ya tienes una cuenta. Inicia sesión.";
    } else {
        $borrar = $pdo->prepare("DELETE FROM tblcuentas_lector WHERE id_cuenta = ?");

        // Si había una cuenta sin activar, se reemplaza por esta
        if ($cuenta) {
            $borrar->execute([$cuenta["id_cuenta"]]);
        }

        // Se crea la cuenta (sin activar) con su código de activación de 24 horas
        $token = bin2hex(random_bytes(32));
        $consulta = $pdo->prepare(
            "INSERT INTO tblcuentas_lector (matricula, numero_control, contrasenia, id_pregunta, respuesta_seguridad, activa, token_activacion, vence_activacion, fecha_creacion)
             VALUES (?, ?, ?, ?, ?, 0, ?, ?, ?)"
        );
        $consulta->execute([
            $persona["matricula"],
            $persona["numero_control"],
            password_hash($password, PASSWORD_DEFAULT),
            $id_pregunta,
            password_hash($respuesta, PASSWORD_DEFAULT),
            $token,
            date("Y-m-d H:i:s", time() + 86400),
            date("Y-m-d H:i:s"),
        ]);
        $id_cuenta = $pdo->lastInsertId();

        if (enviar_activacion($persona["email"], $persona["nombre"], $token)) {
            $_SESSION["correo_enviado"] = ocultar_correo($persona["email"]);
            header("Location: registro_enviado.php");
            exit();
        }

        // Si el correo no salió, se borra la cuenta para que pueda intentar de nuevo
        $borrar->execute([$id_cuenta]);
        $error = "No pudimos enviar el correo de activación. Intenta de nuevo más tarde.";
    }
}

$titulo = "Crear cuenta - Biblioteca Escolar";
$texto_info = "Crea tu cuenta con tu matrícula o clave para consultar el catálogo y administrar tu cuenta de la biblioteca.";
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?= $titulo ?></title>

        <!-- Fuente Poppins (guia de estilos) -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="./css/bootstrap.min.css" />
        <link rel="stylesheet" href="./css/estilos.css" />
        <link rel="stylesheet" href="./css/login.css" />
        <link rel="stylesheet" href="./css/footer.css" />
    </head>

    <body class="d-flex flex-column min-vh-100">
        <?php include "includes/iconos.php"; ?>
        <?php include "includes/header.php"; ?>

        <main class="flex-grow-1 d-flex flex-column">
            <div class="row g-0 flex-grow-1 mx-0">
                <?php include "includes/panel_info.php"; ?>

                <!-- Panel derecho: formulario -->
                <section class="col-lg-5 login-panel d-flex align-items-center justify-content-center">
                    <div class="login-card">
                        <!-- Pestañas -->
                        <div class="login-tabs d-flex mb-4">
                            <a href="login.php" class="text-center text-decoration-none fw-medium">Iniciar sesión</a>
                            <a href="registro.php" class="active text-center text-decoration-none fw-medium">Crear cuenta</a>
                        </div>

                        <h2 class="login-title">Crea tu cuenta</h2>
                        <p class="login-subtitle">Usa tu matrícula o clave. Te enviaremos un correo para activarla.</p>

                        <!-- Mensaje de error -->
                        <?php if ($error !== ""): ?>
                            <div class="error-box d-flex align-items-center mb-3" role="alert">
                                <svg class="icon"><use href="#i-triangle-alert" /></svg>
                                <?= $error ?>
                            </div>
                        <?php endif; ?>

                        <form action="registro.php" method="post">
                            <!-- Matrícula o clave -->
                            <div class="mb-3">
                                <label for="matricula" class="field-label d-block">Matrícula o clave</label>
                                <div class="field-group">
                                    <svg class="icon field-icon"><use href="#i-user" /></svg>
                                    <input type="text" id="matricula" name="matricula" class="form-control" placeholder="Escribe tu matrícula o clave" value="<?= htmlspecialchars($clave) ?>" autocomplete="username" required />
                                </div>
                            </div>

                            <!-- Contraseña -->
                            <div class="mb-3">
                                <label for="password" class="field-label d-block">Contraseña</label>
                                <div class="field-group">
                                    <svg class="icon field-icon"><use href="#i-lock" /></svg>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Escribe tu contraseña" minlength="8" autocomplete="new-password" required />
                                    <button type="button" class="toggle-password d-flex align-items-center justify-content-center bg-transparent border-0" data-target="password" aria-label="Mostrar contraseña">
                                        <svg class="icon"><use href="#i-eye" /></svg>
                                    </button>
                                </div>
                                <p class="field-hint">Mínimo 8 caracteres.</p>
                            </div>

                            <!-- Confirmar contraseña -->
                            <div class="mb-3">
                                <label for="confirmar" class="field-label d-block">Confirmar contraseña</label>
                                <div class="field-group">
                                    <svg class="icon field-icon"><use href="#i-lock" /></svg>
                                    <input type="password" id="confirmar" name="confirmar" class="form-control" placeholder="Repite tu contraseña" minlength="8" autocomplete="new-password" required />
                                    <button type="button" class="toggle-password d-flex align-items-center justify-content-center bg-transparent border-0" data-target="confirmar" aria-label="Mostrar contraseña">
                                        <svg class="icon"><use href="#i-eye" /></svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Pregunta de seguridad (sirve para recuperar la contraseña) -->
                            <div class="mb-3">
                                <label for="id_pregunta" class="field-label d-block">Pregunta de seguridad</label>
                                <div class="field-group">
                                    <svg class="icon field-icon"><use href="#i-shield-question" /></svg>
                                    <select id="id_pregunta" name="id_pregunta" class="form-select form-control" required>
                                        <option value="">Elige una pregunta</option>
                                        <?php foreach ($preguntas as $fila): ?>
                                            <option value="<?= $fila["id_pregunta"] ?>" <?= $id_pregunta == $fila["id_pregunta"] ? "selected" : "" ?>><?= $fila["pregunta"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Respuesta -->
                            <div class="mb-4">
                                <label for="respuesta" class="field-label d-block">Tu respuesta</label>
                                <div class="field-group">
                                    <svg class="icon field-icon"><use href="#i-key-round" /></svg>
                                    <input type="text" id="respuesta" name="respuesta" class="form-control" placeholder="Escribe una respuesta que solo tú sepas" autocomplete="off" required />
                                </div>
                                <p class="field-hint">La necesitarás para recuperar tu contraseña. No la compartas.</p>
                            </div>

                            <button type="submit" class="btn btn-login w-100">Crear cuenta</button>
                        </form>

                        <p class="login-footer-text text-center mt-3 mb-0">
                            ¿Ya tienes cuenta?
                            <a href="login.php">Iniciar sesión</a>
                        </p>
                    </div>
                </section>
            </div>
        </main>

        <?php include "includes/footer.php"; ?>
        <script src="./js/ver_password.js"></script>
    </body>
</html>
