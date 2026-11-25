<?php
session_start();
date_default_timezone_set("America/Mexico_City");

require "config/conexion.php"; // aquí viene la conexión $pdo

// Compara con hash (cuentas nuevas) o con texto plano (cuentas viejas)
function contrasenia_correcta($escrita, $guardada)
{
    return password_verify($escrita, $guardada) || $escrita === $guardada;
}

$error = "";
$clave = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $clave = trim($_POST["matricula"]);
    $password = $_POST["password"];
    $ahora = date("Y-m-d H:i:s");

    // 1. Bloqueo: 5 intentos fallidos en los últimos 10 minutos
    $desde = date("Y-m-d H:i:s", time() - 600);
    $consulta = $pdo->prepare("SELECT COUNT(*) FROM tblintentos_acceso WHERE clave_acceso = ? AND exitoso = 0 AND fecha_intento >= ?");
    $consulta->execute([$clave, $desde]);

    if ($consulta->fetchColumn() >= 5) {
        $error = "Demasiados intentos fallidos. Intenta de nuevo en 10 minutos.";
    } else {
        $destino = "";

        // 2. ¿Es bibliotecario? (se busca por usuario)
        $consulta = $pdo->prepare("SELECT id_bibliotecario, id_perfil, usuario, contrasenia FROM tblbibliotecario WHERE usuario = ?");
        $consulta->execute([$clave]);
        $bibliotecario = $consulta->fetch();

        if ($bibliotecario && contrasenia_correcta($password, $bibliotecario["contrasenia"])) {
            $_SESSION["tipo"] = "bibliotecario";
            $_SESSION["id_bibliotecario"] = $bibliotecario["id_bibliotecario"];
            $_SESSION["id_perfil"] = $bibliotecario["id_perfil"];
            $_SESSION["nombre"] = $bibliotecario["usuario"];
            $destino = "gestion_reservas.php";
        } else {
            // 3. ¿Es alumno o docente? (se busca por matrícula o número de control)
            $consulta = $pdo->prepare(
                "SELECT c.id_cuenta, c.matricula, c.numero_control, c.contrasenia, c.activa,
                        COALESCE(a.nombre, t.nombre) AS nombre,
                        COALESCE(a.estado, t.estado) AS estado
                 FROM tblcuentas_lector c
                 LEFT JOIN tblalumnos a ON a.matricula = c.matricula
                 LEFT JOIN tbltrabajadores t ON t.numero_control = c.numero_control
                 WHERE c.matricula = ? OR c.numero_control = ?"
            );
            $consulta->execute([$clave, $clave]);
            $lector = $consulta->fetch();

            if ($lector && contrasenia_correcta($password, $lector["contrasenia"])) {
                if ($lector["activa"] != 1) {
                    $error = "Tu cuenta aún no está activada. Revisa tu correo y abre el enlace de activación.";
                } elseif ($lector["estado"] !== "Activo") {
                    $error = "Tu cuenta está inactiva. Acércate a la biblioteca.";
                } else {
                    $_SESSION["tipo"] = "lector";
                    $_SESSION["id_cuenta"] = $lector["id_cuenta"];
                    $_SESSION["matricula"] = $lector["matricula"];
                    $_SESSION["numero_control"] = $lector["numero_control"];
                    $_SESSION["nombre"] = $lector["nombre"];
                    $destino = "mi_cuenta.php";
                }
            } else {
                $error = "Matrícula, clave o contraseña incorrectos.";
            }
        }

        // 4. Se guarda el intento y, si fue correcto, se entra
        $exitoso = $destino !== "" ? 1 : 0;
        $consulta = $pdo->prepare("INSERT INTO tblintentos_acceso (clave_acceso, exitoso, fecha_intento) VALUES (?, ?, ?)");
        $consulta->execute([$clave, $exitoso, $ahora]);

        if ($destino !== "") {
            header("Location: " . $destino);
            exit();
        }
    }
}
?>
<?php
$titulo = "Iniciar sesión - Biblioteca Escolar";
$texto_info = "Entra con tu matrícula o clave para consultar el catálogo, reservar tu libro y revisar tu cuenta.";
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
                            <a href="login.php" class="active text-center text-decoration-none fw-medium">Iniciar sesión</a>
                            <a href="registro.php" class="text-center text-decoration-none fw-medium">Crear cuenta</a>
                        </div>

                        <h2 class="login-title">Inicia sesión</h2>
                        <p class="login-subtitle">Entra con tu matrícula o clave.</p>

                        <!-- Mensaje de error -->
                        <?php if ($error !== ""): ?>
                            <div class="error-box d-flex align-items-center mb-3" role="alert">
                                <svg class="icon"><use href="#i-triangle-alert" /></svg>
                                <?= $error ?>
                            </div>
                        <?php endif; ?>

                        <form action="login.php" method="post">
                            <!-- Matricula o clave -->
                            <div class="mb-3">
                                <label for="matricula" class="field-label d-block">Matrícula o clave</label>
                                <div class="field-group">
                                    <svg class="icon field-icon"><use href="#i-user" /></svg>
                                    <input type="text" id="matricula" name="matricula" class="form-control" placeholder="Escribe tu matrícula o clave" value="<?= htmlspecialchars($clave) ?>" autocomplete="username" required />
                                </div>
                            </div>

                            <!-- Contraseña -->
                            <div class="mb-4">
                                <label for="password" class="field-label d-block">Contraseña</label>
                                <div class="field-group">
                                    <svg class="icon field-icon"><use href="#i-lock" /></svg>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Escribe tu contraseña" autocomplete="current-password" required />
                                    <button type="button" class="toggle-password d-flex align-items-center justify-content-center bg-transparent border-0" data-target="password" aria-label="Mostrar contraseña">
                                        <svg class="icon"><use href="#i-eye" /></svg>
                                    </button>
                                </div>
                                <a href="recuperar_password.php" class="forgot-link">¿Olvidaste tu contraseña?</a>
                            </div>

                            <!-- Boton de ingreso -->
                            <button type="submit" class="btn btn-login w-100">Iniciar sesión</button>
                        </form>

                        <p class="login-footer-text text-center mt-3 mb-0">
                            ¿Primera vez en la biblioteca digital?
                            <a href="registro.php">Crear cuenta</a>
                        </p>

                        <p class="login-note text-center mt-3 mb-0">Tras 5 intentos fallidos, el acceso se bloquea 10 minutos.</p>
                    </div>
                </section>
            </div>
        </main>

        <?php include "includes/footer.php"; ?>
        <script src="./js/ver_password.js"></script>
    </body>
</html>
