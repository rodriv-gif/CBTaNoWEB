<?php
session_start();

// Verifica que exista una sesión activa antes de mostrar el detalle del libro
if (!isset($_SESSION['id_cuenta']) && !isset($_SESSION['id_bibliotecario'])) {
    header('Location: login.php?error=acceso_denegado');
    exit;
}

require_once __DIR__ . '/config/conexion.php';
$pagina_activa = "catalogo.php";

// Recibe y valida el ID del libro enviado por GET igual que en curso_detalle.php
$idLibro = $_GET['id'] ?? null;
$libro   = null;

if ($idLibro && is_numeric($idLibro)) {
    $idLibroInt = (int)$idLibro;
    $sql = "SELECT l.id_libro, l.titulo_libro, l.paginas, l.ISBN,
            c.nombre AS categoria, ed.nombre_editorial, idm.nombre_idioma,
            pc.portada, pc.sinopsis,
            GROUP_CONCAT(DISTINCT CONCAT_WS(' ', a.nombre, a.apellido_paterno, a.apellido_materno) SEPARATOR ', ') AS autor,
            (
                SELECT COUNT(*) FROM tblejemplares e
                WHERE e.id_libro = l.id_libro AND e.estado = 'Activo'
                  AND e.id_ejemplar NOT IN (SELECT p.id_ejemplar FROM tblprestamos p WHERE p.id_estado_prestamo IN (1, 3))
                  AND e.id_ejemplar NOT IN (SELECT r.id_ejemplar FROM tblreservas r WHERE r.id_estado_reserva = 1)
            ) AS disponibles
            FROM tbllibros l
            INNER JOIN tblpublicacion_catalogo pc ON pc.id_libro = l.id_libro
            INNER JOIN tblcategorias c ON c.id_categoria = l.id_categoria
            INNER JOIN tbleditoriales ed ON ed.id_editorial = l.id_editorial
            INNER JOIN tblidiomas idm ON idm.id_idioma = l.id_idioma
            LEFT JOIN tbllibro_autor la ON la.id_libro = l.id_libro
            LEFT JOIN tblautores a ON a.id_autor = la.id_autor
            WHERE l.id_libro = ? AND l.estado = 'Activo' AND pc.publicado = 1
            GROUP BY l.id_libro, l.titulo_libro, l.paginas, l.ISBN, c.nombre, ed.nombre_editorial, idm.nombre_idioma, pc.portada, pc.sinopsis";

    $stmt = mysqli_prepare($conexion, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $idLibroInt);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $libro     = mysqli_fetch_assoc($resultado);
        mysqli_stmt_close($stmt);
    }
}

// Regresa al catálogo si el ID no existe o es inválido
if (!$libro) {
    header('Location: catalogo.php');
    exit;
}

$autorLibro    = trim($libro['autor'] ?? '') !== '' ? $libro['autor'] : 'Sin autor';
$disponibles   = (int)$libro['disponibles'];
$nombrePortada = str_replace('libro_', 'libro', $libro['portada'] ?? '');
$rutaFisica    = ($nombrePortada !== '') ? $dirPortadas . $nombrePortada : '';
$tienePortada  = ($rutaFisica !== '' && file_exists($rutaFisica));
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?= htmlspecialchars($libro['titulo_libro']) ?> - Biblioteca Escolar</title>

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="./css/bootstrap.min.css" />
        <link rel="stylesheet" href="./css/estilos.css" />
        <link rel="stylesheet" href="./css/lector.css" />
        <link rel="stylesheet" href="./css/detalle_libro.css" />
        <link rel="stylesheet" href="./css/footer.css" />   
    </head>

    <body class="d-flex flex-column min-vh-100">
        <?php include "includes/iconos.php"; ?>
        <?php include "includes/iconos_catalogo.php"; ?>
        <?php include "includes/header_lector.php"; ?>

        <main class="flex-grow-1">
            <section class="book-hero">
                <div class="container">
                    <a href="catalogo.php" class="back-link">
                        <svg class="icon"><use href="#i-arrow-left" /></svg> Volver al catálogo
                    </a>

                    <div class="row align-items-center g-4 mt-2">
                        <div class="col-md-4 col-lg-3">
                            <?php if ($tienePortada): ?>
                                <img src="<?= htmlspecialchars($urlPortadas . $nombrePortada) ?>" alt="<?= htmlspecialchars($libro['titulo_libro']) ?>" class="book-cover-photo" />
                            <?php else: ?>
                                <div class="book-cover">
                                    <span class="cover-top">Biblioteca del CBTa No. 5</span>
                                    <span class="cover-title"><?= htmlspecialchars($libro['titulo_libro']) ?></span>
                                    <span class="cover-line"></span>
                                    <span class="cover-author"><?= htmlspecialchars($autorLibro) ?></span>
                                    <img src="./img/logo-cbta5-blanco.png" alt="" />
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-8 col-lg-9">
                            <span class="book-category"><?= htmlspecialchars($libro['categoria']) ?></span>
                            <h1><?= htmlspecialchars($libro['titulo_libro']) ?></h1>
                            <p class="author"><?= htmlspecialchars($autorLibro) ?></p>

                            <div class="d-flex align-items-center flex-wrap gap-3 mb-4">
                                <?php if ($disponibles > 0): ?>
                                    <span class="status-tag status-available">
                                        <svg class="icon"><use href="#i-circle-check" /></svg> Disponible
                                    </span>
                                <?php else: ?>
                                    <span class="status-tag status-unavailable">
                                        <svg class="icon"><use href="#i-circle-x" /></svg> No disponible
                                    </span>
                                <?php endif; ?>
                                <span><strong><?= $disponibles ?></strong> ejemplares disponibles</span>
                            </div>

                            <a href="catalogo.php" class="btn btn-header">
                                <svg class="icon"><use href="#i-arrow-left" /></svg> Volver al catálogo
                            </a>
                            <p class="mt-3 mb-0">Las reservas se hacen desde la app móvil con tu cuenta.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-5">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-8">
                            <h2 class="section-heading">Sinopsis</h2>
                            <p class="mb-4"><?= nl2br(htmlspecialchars($libro['sinopsis'] ?? 'Sin sinopsis disponible.')) ?></p>

                            <div class="info-card">
                                <h2>Datos bibliográficos</h2>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <span class="text-secondary d-block small">Editorial</span>
                                        <strong><?= htmlspecialchars($libro['nombre_editorial']) ?></strong>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="text-secondary d-block small">Idioma</span>
                                        <strong><?= htmlspecialchars($libro['nombre_idioma']) ?></strong>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="text-secondary d-block small">Páginas</span>
                                        <strong><?= $libro['paginas'] ? (int)$libro['paginas'] : 'No especificado' ?></strong>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="text-secondary d-block small">ISBN</span>
                                        <strong><?= htmlspecialchars($libro['ISBN']) ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="info-card">
                                <h2>Antes de reservar</h2>
                                <ul class="info-list">
                                    <li>
                                        <svg class="icon"><use href="#i-smartphone" /></svg>
                                        <span>La reserva se hace desde la app móvil, con la cuenta que creaste en esta página web.</span>
                                    </li>
                                    <li>
                                        <svg class="icon"><use href="#i-clock" /></svg>
                                        <span>Tienes un plazo para recoger el libro en la biblioteca. Si no lo recoges a tiempo, la reserva expira.</span>
                                    </li>
                                    <li>
                                        <svg class="icon"><use href="#i-library" /></svg>
                                        <span>Puedes tener hasta 3 libros al mismo tiempo.</span>
                                    </li>
                                    <li>
                                        <svg class="icon"><use href="#i-triangle-alert" /></svg>
                                        <span>Retraso en la devolución: adeudo de \$10 por día.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <?php include "includes/footer.php"; ?>
        <script src="./js/bootstrap.bundle.min.js"></script>
    </body>
</html>