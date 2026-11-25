<?php
session_start();

// Verifica que el usuario tenga sesión iniciada antes de entrar al catálogo
if (!isset($_SESSION['id_cuenta']) && !isset($_SESSION['id_bibliotecario'])) {
    header('Location: login.php?error=acceso_denegado');
    exit;
}

require_once __DIR__ . '/config/conexion.php';
$pagina_activa = "catalogo.php";

// Trae todas las categorías ordenadas para llenar el select de filtro
$sqlCategorias = "SELECT id_categoria, nombre FROM tblcategorias ORDER BY nombre ASC";
$resCategorias = mysqli_query($conexion, $sqlCategorias);

// Recibe y limpia los filtros enviados por la URL mediante GET
$busqueda        = trim($_GET['q'] ?? '');
$idCategoria     = (isset($_GET['categoria']) && is_numeric($_GET['categoria'])) ? (int)$_GET['categoria'] : 0;
$soloDisponibles = (isset($_GET['disp']) && $_GET['disp'] === '1') ? 1 : 0;
$paginaActual    = (isset($_GET['p']) && is_numeric($_GET['p']) && (int)$_GET['p'] > 0) ? (int)$_GET['p'] : 1;
$porPagina       = 10;
$like            = '%' . $busqueda . '%';

// Cuenta el total de libros publicados que cumplen los filtros para armar la paginación
$sqlConteo = "SELECT l.id_libro,
              (
                  SELECT COUNT(*) FROM tblejemplares e
                  WHERE e.id_libro = l.id_libro AND e.estado = 'Activo'
                    AND e.id_ejemplar NOT IN (SELECT p.id_ejemplar FROM tblprestamos p WHERE p.id_estado_prestamo IN (1, 3))
                    AND e.id_ejemplar NOT IN (SELECT r.id_ejemplar FROM tblreservas r WHERE r.id_estado_reserva = 1)
              ) AS disponibles
              FROM tbllibros l
              INNER JOIN tblpublicacion_catalogo pc ON pc.id_libro = l.id_libro
              INNER JOIN tblcategorias c ON c.id_categoria = l.id_categoria
              LEFT JOIN tbllibro_autor la ON la.id_libro = l.id_libro
              LEFT JOIN tblautores a ON a.id_autor = la.id_autor
              WHERE l.estado = 'Activo' AND pc.publicado = 1
                AND (? = '' OR l.titulo_libro LIKE ? OR c.nombre LIKE ? OR CONCAT_WS(' ', a.nombre, a.apellido_paterno, a.apellido_materno) LIKE ?)
                AND (? = 0 OR l.id_categoria = ?)
              GROUP BY l.id_libro";

if ($soloDisponibles === 1) {
    $sqlConteo .= " HAVING disponibles > 0";
}

$totalLibros = 0;
$stmtConteo  = mysqli_prepare($conexion, $sqlConteo);
if ($stmtConteo) {
    mysqli_stmt_bind_param($stmtConteo, "ssssii", $busqueda, $like, $like, $like, $idCategoria, $idCategoria);
    mysqli_stmt_execute($stmtConteo);
    $resConteo   = mysqli_stmt_get_result($stmtConteo);
    $totalLibros = mysqli_num_rows($resConteo);
    mysqli_stmt_close($stmtConteo);
}

$totalPaginas = $totalLibros > 0 ? (int)ceil($totalLibros / $porPagina) : 1;
if ($paginaActual > $totalPaginas) {
    $paginaActual = $totalPaginas;
}
$offset = ($paginaActual - 1) * $porPagina;

// Consulta los libros de la página actual ordenados alfabéticamente por título
$sqlLibros = "SELECT l.id_libro, l.titulo_libro, pc.portada,
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
              LEFT JOIN tbllibro_autor la ON la.id_libro = l.id_libro
              LEFT JOIN tblautores a ON a.id_autor = la.id_autor
              WHERE l.estado = 'Activo' AND pc.publicado = 1
                AND (? = '' OR l.titulo_libro LIKE ? OR c.nombre LIKE ? OR CONCAT_WS(' ', a.nombre, a.apellido_paterno, a.apellido_materno) LIKE ?)
                AND (? = 0 OR l.id_categoria = ?)
              GROUP BY l.id_libro, l.titulo_libro, pc.portada";

if ($soloDisponibles === 1) {
    $sqlLibros .= " HAVING disponibles > 0";
}
$sqlLibros .= " ORDER BY l.titulo_libro ASC LIMIT ? OFFSET ?";

$resLibros  = false;
$stmtLibros = mysqli_prepare($conexion, $sqlLibros);
if ($stmtLibros) {
    mysqli_stmt_bind_param($stmtLibros, "ssssiiii", $busqueda, $like, $like, $like, $idCategoria, $idCategoria, $porPagina, $offset);
    mysqli_stmt_execute($stmtLibros);
    $resLibros = mysqli_stmt_get_result($stmtLibros);
}
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Catálogo - Biblioteca Escolar CBTa No. 5</title>

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="./css/bootstrap.min.css" />
        <link rel="stylesheet" href="./css/estilos.css" />
        <link rel="stylesheet" href="./css/lector.css" />
        <link rel="stylesheet" href="./css/catalogo.css" />
        <link rel="stylesheet" href="./css/footer.css" />
    </head>

    <body class="d-flex flex-column min-vh-100">
        <?php include "includes/iconos.php"; ?>
        <?php include "includes/iconos_catalogo.php"; ?>
        <?php include "includes/header_lector.php"; ?>

        <main class="flex-grow-1">
            <div class="container py-4">
                <h1 class="page-title">Catálogo</h1>
                <p class="page-subtitle">Busca un libro y revisa si hay ejemplares disponibles.</p>

                <form method="GET" action="catalogo.php" class="search-card mb-4">
                    <input type="hidden" name="disp" value="<?= $soloDisponibles ?>" />

                    <div class="d-flex">
                        <div class="search-box flex-grow-1">
                            <svg class="icon"><use href="#i-search" /></svg>
                            <input
                                type="search"
                                name="q"
                                class="form-control"
                                value="<?= htmlspecialchars($busqueda) ?>"
                                placeholder="Busca por título, autor o especialidad"
                                aria-label="Buscar libro"
                            />
                        </div>
                        <button type="submit" class="btn btn-primary-brand">Buscar</button>
                    </div>

                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mt-3">
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <span class="filter-label me-1">Disponibilidad</span>
                            <a href="catalogo.php?q=<?= urlencode($busqueda) ?>&categoria=<?= $idCategoria ?>&disp=0" class="filter-pill <?= $soloDisponibles === 0 ? 'active' : '' ?>">Todos</a>
                            <a href="catalogo.php?q=<?= urlencode($busqueda) ?>&categoria=<?= $idCategoria ?>&disp=1" class="filter-pill <?= $soloDisponibles === 1 ? 'active' : '' ?>">Solo disponibles</a>
                        </div>

                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <label for="categoria" class="filter-label mb-0">Categoría</label>
                            <select name="categoria" id="categoria" class="form-select filter-select" onchange="this.form.submit()">
                                <option value="0">Todas las categorías</option>
                                <?php if ($resCategorias && mysqli_num_rows($resCategorias) > 0): ?>
                                    <?php while ($cat = mysqli_fetch_assoc($resCategorias)): ?>
                                        <option value="<?= $cat['id_categoria'] ?>" <?= $idCategoria === (int)$cat['id_categoria'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($cat['nombre']) ?>
                                        </option>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                </form>

                <div class="d-flex justify-content-between align-items-end flex-wrap gap-2 mb-3">
                    <h2 class="list-title">Libros del catálogo</h2>
                    <p class="list-count">Mostrando <?= $totalLibros ?> libros, ordenados por título</p>
                </div>

                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
                    <?php if ($resLibros && mysqli_num_rows($resLibros) > 0): ?>
                        <?php $contadorColor = 0; ?>
                        <?php while ($libro = mysqli_fetch_assoc($resLibros)): ?>
                            <?php
                                $nombrePortada = str_replace('libro_', 'libro', $libro['portada'] ?? '');
                                $rutaFisica    = ($nombrePortada !== '') ? $dirPortadas . $nombrePortada : '';
                                $tienePortada  = ($rutaFisica !== '' && file_exists($rutaFisica));
                                $clasePortada  = 'cover-' . ($contadorColor % 3);
                                $contadorColor++;
                            ?>
                <div class="col">
                    <article class="book-card position-relative h-100">
                        <?php if ($tienePortada): ?>
                          <img src="<?= htmlspecialchars($urlPortadas . $nombrePortada) ?>" alt="<?= htmlspecialchars($libro['titulo_libro']) ?>" class="book-card-cover-img" />
                         <?php else: ?>
                         <div class="book-card-cover <?= $clasePortada ?>">
                          <?= htmlspecialchars($libro['titulo_libro']) ?>
                        </div>
                         <?php endif; ?>

                                    <h3 class="book-card-title">
                                        <a href="detalle_libro.php?id=<?= $libro['id_libro'] ?>" class="stretched-link">
                                            <?= htmlspecialchars($libro['titulo_libro']) ?>
                                        </a>
                                    </h3>
                                    <p class="book-card-author"><?= htmlspecialchars(trim($libro['autor'] ?? '') !== '' ? $libro['autor'] : 'Sin autor') ?></p>

                                    <?php if ((int)$libro['disponibles'] > 0): ?>
                                        <span class="status-tag status-available">
                                            <svg class="icon"><use href="#i-circle-check" /></svg> Disponible
                                        </span>
                                    <?php else: ?>
                                        <span class="status-tag status-unavailable">
                                            <svg class="icon"><use href="#i-circle-x" /></svg> No disponible
                                        </span>
                                    <?php endif; ?>
                                </article>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="col-12 w-100">
                            <div class="alert alert-secondary text-center mb-0">No se encontraron libros registrados con esos filtros.</div>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($totalPaginas > 1): ?>
                    <nav class="pagination-nav d-flex justify-content-center mt-5 mb-3" aria-label="Páginas del catálogo">
                        <ul class="pagination mb-0">
                            <li class="page-item <?= $paginaActual <= 1 ? 'disabled' : '' ?>">
                                <a class="page-link" href="catalogo.php?q=<?= urlencode($busqueda) ?>&categoria=<?= $idCategoria ?>&disp=<?= $soloDisponibles ?>&p=<?= $paginaActual - 1 ?>">
                                    <svg class="icon"><use href="#i-arrow-left" /></svg> Anterior
                                </a>
                            </li>

                            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                                <li class="page-item <?= $i === $paginaActual ? 'active' : '' ?>">
                                    <a class="page-link" href="catalogo.php?q=<?= urlencode($busqueda) ?>&categoria=<?= $idCategoria ?>&disp=<?= $soloDisponibles ?>&p=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>

                            <li class="page-item <?= $paginaActual >= $totalPaginas ? 'disabled' : '' ?>">
                                <a class="page-link" href="catalogo.php?q=<?= urlencode($busqueda) ?>&categoria=<?= $idCategoria ?>&disp=<?= $soloDisponibles ?>&p=<?= $paginaActual + 1 ?>">
                                    Siguiente <svg class="icon"><use href="#i-arrow-right" /></svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                <?php endif; ?>
            </div>
        </main>

        <?php
        if ($stmtLibros) {
            mysqli_stmt_close($stmtLibros);
        }
        include "includes/footer.php";
        ?>
        <script src="./js/bootstrap.bundle.min.js"></script>
    </body>
</html>