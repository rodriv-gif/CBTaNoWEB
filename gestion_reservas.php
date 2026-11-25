<?php
session_start();
date_default_timezone_set("America/Mexico_City");

// Candado de seguridad: verifica que el bibliotecario haya iniciado sesión
if (!isset($_SESSION['id_bibliotecario'])) {
    header('Location: login.php?error=acceso_denegado');
    exit;
}

require_once __DIR__ . '/config/conexion.php';
$pagina_activa = "gestion_reservas.php";
$ahora         = date('Y-m-d H:i:s');
$error         = '';

// Consulta días de préstamo configurados en la base de datos o aplica los valores por defecto
$diasAlumno     = 7;
$diasTrabajador = 15;
$resConfig = mysqli_query($conexion, "SELECT clave, valor FROM tblconfiguracion");
if ($resConfig) {
    while ($conf = mysqli_fetch_assoc($resConfig)) {
        if ($conf['clave'] === 'dias_prestamo_alumno' && is_numeric($conf['valor'])) {
            $diasAlumno = (int)$conf['valor'];
        }
        if ($conf['clave'] === 'dias_prestamo_trabajador' && is_numeric($conf['valor'])) {
            $diasTrabajador = (int)$conf['valor'];
        }
    }
}

// Procesa la confirmación del préstamo cuando se envía el formulario del modal por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idReserva      = (int)($_POST['id_reserva'] ?? 0);
    $idTipoPrestamo = (int)($_POST['id_tipo_prestamo'] ?? 0);
    $idBiblio       = (int)$_SESSION['id_bibliotecario'];

    if ($idReserva <= 0 || $idTipoPrestamo <= 0) {
        $error = 'Selecciona una reserva y un tipo de préstamo válidos.';
    } else {
        $sqlRes  = "SELECT id_reserva, matricula, numero_control, id_ejemplar
                    FROM tblreservas
                    WHERE id_reserva = ? AND id_estado_reserva = 1 AND fecha_limite >= ?";
        $stmtRes = mysqli_prepare($conexion, $sqlRes);
        mysqli_stmt_bind_param($stmtRes, "is", $idReserva, $ahora);
        mysqli_stmt_execute($stmtRes);
        $resDato     = mysqli_stmt_get_result($stmtRes);
        $filaReserva = mysqli_fetch_assoc($resDato);
        mysqli_stmt_close($stmtRes);

        if (!$filaReserva) {
            $error = 'La reserva seleccionada ya no está activa o ya venció.';
        } else {
            $fechaPrestamo = date('Y-m-d');
            if ($idTipoPrestamo === 1) {
                $fechaDevolucion = $fechaPrestamo;
            } else {
                $diasAsignados   = !empty($filaReserva['numero_control']) ? $diasTrabajador : $diasAlumno;
                $fechaDevolucion = date('Y-m-d', strtotime('+' . $diasAsignados . ' days'));
            }

            $matriculaVal  = $filaReserva['matricula'] !== null ? (int)$filaReserva['matricula'] : null;
            $numControlVal = $filaReserva['numero_control'] !== null ? (int)$filaReserva['numero_control'] : null;
            $idEjemplarVal = (int)$filaReserva['id_ejemplar'];
            $estadoPrest   = 1;

            $sqlIns  = "INSERT INTO tblprestamos (id_bibliotecario, id_ejemplar, matricula, numero_control, id_tipo_prestamo, id_estado_prestamo, fecha_prestamo, fecha_devolucion)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmtIns = mysqli_prepare($conexion, $sqlIns);

            if ($stmtIns) {
                mysqli_stmt_bind_param($stmtIns, "iiiiiiss", $idBiblio, $idEjemplarVal, $matriculaVal, $numControlVal, $idTipoPrestamo, $estadoPrest, $fechaPrestamo, $fechaDevolucion);
                if (mysqli_stmt_execute($stmtIns)) {
                    $nuevoIdPrestamo = mysqli_insert_id($conexion);
                    mysqli_stmt_close($stmtIns);

                    $sqlUpd  = "UPDATE tblreservas SET id_estado_reserva = 2, id_prestamo = ? WHERE id_reserva = ?";
                    $stmtUpd = mysqli_prepare($conexion, $sqlUpd);
                    mysqli_stmt_bind_param($stmtUpd, "ii", $nuevoIdPrestamo, $idReserva);
                    mysqli_stmt_execute($stmtUpd);
                    mysqli_stmt_close($stmtUpd);

                    header('Location: gestion_reservas.php?estado=activas&confirmado=1');
                    exit;
                } else {
                    $error = 'Error al registrar el préstamo en la base de datos.';
                }
            }
        }
    }
}

// Calcula el texto sencillo del tiempo restante o del tiempo transcurrido desde que venció
function obtenerTextoTiempo($fechaLimite, $fechaActual)
{
    $segundos = strtotime($fechaLimite) - strtotime($fechaActual);
    $absoluto = abs($segundos);
    $dias     = (int)floor($absoluto / 86400);
    $horas    = (int)floor(($absoluto % 86400) / 3600);
    $minutos  = max(1, (int)floor(($absoluto % 3600) / 60));

    if ($segundos >= 0) {
        if ($dias >= 1) {
            return $dias === 1 ? 'Queda 1 día' : 'Quedan ' . $dias . ' días';
        }
        if ($horas >= 1) {
            return $horas === 1 ? 'Queda 1 h' : 'Quedan ' . $horas . ' h';
        }
        return 'Quedan ' . $minutos . ' min';
    }

    if ($dias >= 1) {
        return $dias === 1 ? 'Venció hace 1 día' : 'Venció hace ' . $dias . ' días';
    }
    if ($horas >= 1) {
        return $horas === 1 ? 'Venció hace 1 h' : 'Venció hace ' . $horas . ' h';
    }
    return 'Venció hace ' . $minutos . ' min';
}

// Recibe y valida la pestaña seleccionada, la búsqueda y el número de página
$estadoActual = $_GET['estado'] ?? 'activas';
$estadosPermitidos = ['activas', 'confirmadas', 'vencidas', 'canceladas'];
if (!in_array($estadoActual, $estadosPermitidos)) {
    $estadoActual = 'activas';
}

$busqueda     = trim($_GET['q'] ?? '');
$like         = '%' . $busqueda . '%';
$paginaActual = (isset($_GET['p']) && is_numeric($_GET['p']) && (int)$_GET['p'] > 0) ? (int)$_GET['p'] : 1;
$porPagina    = 6;

// Obtiene el total de reservas en cada estado para mostrar el contador en las pestañas
$conteos = [
    'activas'     => 0,
    'confirmadas' => 0,
    'vencidas'    => 0,
    'canceladas'  => 0,
];
$sqlConteos = "SELECT
    SUM(CASE WHEN id_estado_reserva = 1 AND fecha_limite >= ? THEN 1 ELSE 0 END) AS activas,
    SUM(CASE WHEN id_estado_reserva = 2 THEN 1 ELSE 0 END) AS confirmadas,
    SUM(CASE WHEN id_estado_reserva = 1 AND fecha_limite < ? THEN 1 ELSE 0 END) AS vencidas,
    SUM(CASE WHEN id_estado_reserva = 3 THEN 1 ELSE 0 END) AS canceladas
    FROM tblreservas";
$stmtConteos = mysqli_prepare($conexion, $sqlConteos);
if ($stmtConteos) {
    mysqli_stmt_bind_param($stmtConteos, "ss", $ahora, $ahora);
    mysqli_stmt_execute($stmtConteos);
    $resConteos = mysqli_stmt_get_result($stmtConteos);
    if ($filaC = mysqli_fetch_assoc($resConteos)) {
        $conteos['activas']     = (int)($filaC['activas'] ?? 0);
        $conteos['confirmadas'] = (int)($filaC['confirmadas'] ?? 0);
        $conteos['vencidas']    = (int)($filaC['vencidas'] ?? 0);
        $conteos['canceladas']  = (int)($filaC['canceladas'] ?? 0);
    }
    mysqli_stmt_close($stmtConteos);
}

// Define la condición SQL, encabezados y orden según la pestaña elegida por el usuario
$usaFecha = false;
if ($estadoActual === 'activas') {
    $condicionEstado = "r.id_estado_reserva = 1 AND r.fecha_limite >= ?";
    $ordenSql        = "r.fecha_limite ASC";
    $tituloTabla     = "Reservas activas";
    $subtituloTabla  = "Ordenadas por fecha límite más próxima";
    $encabezadoCol4  = "Tiempo restante";
    $usaFecha        = true;
} elseif ($estadoActual === 'vencidas') {
    $condicionEstado = "r.id_estado_reserva = 1 AND r.fecha_limite < ?";
    $ordenSql        = "r.fecha_limite DESC";
    $tituloTabla     = "Reservas vencidas";
    $subtituloTabla  = "No se recogieron a tiempo; puedes liberar el ejemplar";
    $encabezadoCol4  = "Tiempo vencido";
    $usaFecha        = true;
} elseif ($estadoActual === 'confirmadas') {
    $condicionEstado = "r.id_estado_reserva = 2";
    $ordenSql        = "r.id_reserva DESC";
    $tituloTabla     = "Reservas confirmadas";
    $subtituloTabla  = "Reservas entregadas y registradas como préstamo";
    $encabezadoCol4  = "Préstamo";
} else {
    $condicionEstado = "r.id_estado_reserva = 3";
    $ordenSql        = "r.id_reserva DESC";
    $tituloTabla     = "Reservas canceladas";
    $subtituloTabla  = "Historial de reservas canceladas o liberadas";
    $encabezadoCol4  = "Estado";
}

$joinsYBusqueda = "FROM tblreservas r
                   INNER JOIN tblejemplares e ON e.id_ejemplar = r.id_ejemplar
                   INNER JOIN tbllibros l ON l.id_libro = e.id_libro
                   LEFT JOIN tblalumnos a ON a.matricula = r.matricula
                   LEFT JOIN tbltrabajadores t ON t.numero_control = r.numero_control
                   WHERE $condicionEstado
                     AND (? = '' OR r.folio LIKE ?
                          OR CAST(r.matricula AS CHAR) LIKE ?
                          OR CAST(r.numero_control AS CHAR) LIKE ?
                          OR CONCAT_WS(' ', a.nombre, a.apellido_paterno, a.apellido_materno) LIKE ?
                          OR CONCAT_WS(' ', t.nombre, t.apellido_paterno, t.apellido_materno) LIKE ?
                          OR l.titulo_libro LIKE ?
                          OR CAST(e.id_ejemplar AS CHAR) LIKE ?)";

// Cuenta el total de registros del filtro actual para calcular las páginas
$totalRegistros = 0;
$stmtTotal      = mysqli_prepare($conexion, "SELECT COUNT(*) AS total " . $joinsYBusqueda);
if ($stmtTotal) {
    if ($usaFecha) {
        mysqli_stmt_bind_param($stmtTotal, "sssssssss", $ahora, $busqueda, $like, $like, $like, $like, $like, $like, $like);
    } else {
        mysqli_stmt_bind_param($stmtTotal, "ssssssss", $busqueda, $like, $like, $like, $like, $like, $like, $like);
    }
    mysqli_stmt_execute($stmtTotal);
    $resTotal = mysqli_stmt_get_result($stmtTotal);
    if ($filaTotal = mysqli_fetch_assoc($resTotal)) {
        $totalRegistros = (int)$filaTotal['total'];
    }
    mysqli_stmt_close($stmtTotal);
}

$totalPaginas = $totalRegistros > 0 ? (int)ceil($totalRegistros / $porPagina) : 1;
if ($paginaActual > $totalPaginas) {
    $paginaActual = $totalPaginas;
}
$offset = ($paginaActual - 1) * $porPagina;

// Consulta únicamente las reservas correspondientes a la página actual
$sqlListado = "SELECT r.id_reserva, r.folio, r.matricula, r.numero_control, r.id_ejemplar,
               r.fecha_reserva, r.fecha_limite, r.id_prestamo,
               e.inventario, l.titulo_libro,
               COALESCE(
                   CONCAT_WS(' ', a.nombre, a.apellido_paterno, a.apellido_materno),
                   CONCAT_WS(' ', t.nombre, t.apellido_paterno, t.apellido_materno)
               ) AS nombre_lector
               " . $joinsYBusqueda . "
               ORDER BY $ordenSql
               LIMIT ? OFFSET ?";

$resultado = false;
$stmtList  = mysqli_prepare($conexion, $sqlListado);
if ($stmtList) {
    if ($usaFecha) {
        mysqli_stmt_bind_param($stmtList, "sssssssssii", $ahora, $busqueda, $like, $like, $like, $like, $like, $like, $like, $porPagina, $offset);
    } else {
        mysqli_stmt_bind_param($stmtList, "ssssssssii", $busqueda, $like, $like, $like, $like, $like, $like, $like, $porPagina, $offset);
    }
    mysqli_stmt_execute($stmtList);
    $resultado = mysqli_stmt_get_result($stmtList);
}

// Consulta los tipos de préstamo disponibles en la BD para el modal de confirmación
$resTiposPrestamo = mysqli_query($conexion, "SELECT id_tipo_prestamo, tipo FROM tbltipo_prestamo ORDER BY id_tipo_prestamo DESC");
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Gestión de reservas - Biblioteca Escolar CBTa No. 5</title>

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="./css/bootstrap.min.css" />
        <link rel="stylesheet" href="./css/estilos.css" />
        <link rel="stylesheet" href="./css/bibliotecario.css" />
        <link rel="stylesheet" href="./css/gestion_reservas.css" />
    </head>

    <body>
        <?php include "includes/iconos.php"; ?>
        <?php include "includes/iconos_catalogo.php"; ?>

        <div class="admin-layout">
            <?php include "includes/sidebar_bibliotecario.php"; ?>

            <main class="admin-main">
                <div class="admin-content">
                    <div class="mb-4">
                        <h1 class="page-title">Gestión de reservas</h1>
                        <p class="page-subtitle mb-0">Consulta las reservas por estado, confirma el préstamo en mostrador o libera ejemplares vencidos.</p>
                    </div>

                    <?php if ($error !== ''): ?>
                        <div class="alert alert-danger py-2"><?= htmlspecialchars($error) ?></div>
                    <?php elseif (isset($_GET['confirmado'])): ?>
                        <div class="alert alert-success py-2">El préstamo se registró correctamente y la reserva pasó a Confirmadas.</div>
                    <?php elseif (isset($_GET['cancelado'])): ?>
                        <div class="alert alert-secondary py-2">La reserva fue cancelada y el ejemplar quedó libre nuevamente.</div>
                    <?php endif; ?>

                    <div class="panel p-3 mb-4">
                        <form method="GET" action="gestion_reservas.php" class="search-bar-clean d-flex flex-wrap gap-2 mb-3">
                            <input type="hidden" name="estado" value="<?= htmlspecialchars($estadoActual) ?>" />
                            <div class="input-group flex-grow-1">
                                <span class="input-group-text bg-white border-end-0">
                                    <svg class="icon text-secondary"><use href="#i-search" /></svg>
                                </span>
                                <input
                                    type="search"
                                    name="q"
                                    class="form-control border-start-0"
                                    value="<?= htmlspecialchars($busqueda) ?>"
                                    placeholder="Buscar por folio, matrícula o clave, nombre del lector o libro"
                                    aria-label="Buscar reserva"
                                />
                            </div>
                            <button type="submit" class="btn btn-brand">Buscar</button>
                            <?php if ($busqueda !== ''): ?>
                                <a href="gestion_reservas.php?estado=<?= urlencode($estadoActual) ?>" class="btn btn-outline-brand">Limpiar</a>
                            <?php endif; ?>
                        </form>

                        <div class="filter-tabs">
                            <a href="gestion_reservas.php?estado=activas&q=<?= urlencode($busqueda) ?>" class="filter-tab <?= $estadoActual === 'activas' ? 'active' : '' ?>">
                                Activas <span class="filter-count">(<?= $conteos['activas'] ?>)</span>
                            </a>
                            <a href="gestion_reservas.php?estado=confirmadas&q=<?= urlencode($busqueda) ?>" class="filter-tab <?= $estadoActual === 'confirmadas' ? 'active' : '' ?>">
                                Confirmadas <span class="filter-count">(<?= $conteos['confirmadas'] ?>)</span>
                            </a>
                            <a href="gestion_reservas.php?estado=vencidas&q=<?= urlencode($busqueda) ?>" class="filter-tab <?= $estadoActual === 'vencidas' ? 'active' : '' ?>">
                                Vencidas <span class="filter-count">(<?= $conteos['vencidas'] ?>)</span>
                            </a>
                            <a href="gestion_reservas.php?estado=canceladas&q=<?= urlencode($busqueda) ?>" class="filter-tab <?= $estadoActual === 'canceladas' ? 'active' : '' ?>">
                                Canceladas <span class="filter-count">(<?= $conteos['canceladas'] ?>)</span>
                            </a>
                        </div>
                    </div>

                    <section class="panel overflow-hidden">
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 px-4 py-3 border-bottom">
                            <div>
                                <h2 class="h6 fw-semibold section-green-title mb-0"><?= htmlspecialchars($tituloTabla) ?></h2>
                                <span class="small text-secondary"><?= htmlspecialchars($subtituloTabla) ?></span>
                            </div>
                            <span class="small text-secondary">Mostrando <?= $resultado ? mysqli_num_rows($resultado) : 0 ?> de <?= $totalRegistros ?></span>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-lib align-middle">
                                <thead>
                                    <tr>
                                        <th>Folio y Lector</th>
                                        <th>Libro</th>
                                        <th>Fechas</th>
                                        <th><?= htmlspecialchars($encabezadoCol4) ?></th>
                                        <th class="text-end">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($resultado && mysqli_num_rows($resultado) > 0): ?>
                                        <?php while ($reserva = mysqli_fetch_assoc($resultado)): ?>
                                            <?php
                                            $esTrabajador  = !empty($reserva['numero_control']);
                                            $claveLector   = $esTrabajador ? $reserva['numero_control'] : $reserva['matricula'];
                                            $rolLector     = $esTrabajador ? 'Trabajador' : 'Alumno';
                                            $diasPrestamo  = $esTrabajador ? $diasTrabajador : $diasAlumno;
                                            $lectorNombre  = trim($reserva['nombre_lector'] ?? '') !== '' ? $reserva['nombre_lector'] : 'Sin nombre';
                                            $fechaResTexto = date('d/m/Y H:i', strtotime($reserva['fecha_reserva']));
                                            $fechaLimTexto = date('d/m/Y H:i', strtotime($reserva['fecha_limite']));
                                            $textoEjemplar = 'Ejemplar #' . $reserva['id_ejemplar'] . ($reserva['inventario'] ? ' (Inv. ' . $reserva['inventario'] . ')' : '');
                                            ?>
                                            <tr>
                                                <td>
                                                    <span class="folio-text"><?= htmlspecialchars($reserva['folio']) ?></span>
                                                    <span><?= htmlspecialchars($lectorNombre) ?></span>
                                                    <span class="sub"><?= htmlspecialchars((string)$claveLector) ?> · <?= $rolLector ?></span>
                                                </td>
                                                <td>
                                                    <span class="fw-medium"><?= htmlspecialchars($reserva['titulo_libro']) ?></span>
                                                    <span class="sub"><?= htmlspecialchars($textoEjemplar) ?></span>
                                                </td>
                                                <td>
                                                    <span>Límite: <?= $fechaLimTexto ?></span>
                                                    <span class="sub">Reservada: <?= $fechaResTexto ?></span>
                                                </td>
                                                <td>
                                                    <?php if ($estadoActual === 'activas' || $estadoActual === 'vencidas'): ?>
                                                        <span class="estado-texto"><?= htmlspecialchars(obtenerTextoTiempo($reserva['fecha_limite'], $ahora)) ?></span>
                                                    <?php elseif ($estadoActual === 'confirmadas'): ?>
                                                        <span class="estado-texto">Entregada<?= $reserva['id_prestamo'] ? ' · Préstamo #' . (int)$reserva['id_prestamo'] : '' ?></span>
                                                    <?php else: ?>
                                                        <span class="estado-secundario">Cancelada</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-end">
                                                    <?php if ($estadoActual === 'activas'): ?>
                                                        <button
                                                            type="button"
                                                            class="btn btn-brand btn-sm me-1"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#confirmarPrestamoModal"
                                                            data-id="<?= (int)$reserva['id_reserva'] ?>"
                                                            data-folio="<?= htmlspecialchars($reserva['folio'], ENT_QUOTES) ?>"
                                                            data-lector="<?= htmlspecialchars($lectorNombre . ' (' . $rolLector . ')', ENT_QUOTES) ?>"
                                                            data-libro="<?= htmlspecialchars($reserva['titulo_libro'] . ' · ' . $textoEjemplar, ENT_QUOTES) ?>"
                                                            data-dias="<?= $diasPrestamo ?>"
                                                        >
                                                            Confirmar
                                                        </button>
                                                        <a
                                                            href="reserva_cancelar.php?id=<?= (int)$reserva['id_reserva'] ?>&estado=activas"
                                                            class="btn btn-danger-soft btn-sm"
                                                            onclick="return confirm('¿Seguro que deseas cancelar la reserva <?= htmlspecialchars($reserva['folio'], ENT_QUOTES) ?>?');"
                                                        >
                                                            Cancelar
                                                        </a>
                                                    <?php elseif ($estadoActual === 'vencidas'): ?>
                                                        <a
                                                            href="reserva_cancelar.php?id=<?= (int)$reserva['id_reserva'] ?>&estado=vencidas"
                                                            class="btn btn-danger-soft btn-sm"
                                                            onclick="return confirm('¿Deseas liberar el ejemplar de la reserva vencida <?= htmlspecialchars($reserva['folio'], ENT_QUOTES) ?>?');"
                                                        >
                                                            Liberar ejemplar
                                                        </a>
                                                    <?php else: ?>
                                                        <span class="estado-secundario">—</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center py-4 text-muted">No hay reservas registradas en este apartado.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <?php if ($totalPaginas > 1): ?>
                        <nav class="pagination-reservas d-flex justify-content-center mt-4" aria-label="Paginación de reservas">
                            <ul class="pagination mb-0">
                                <li class="page-item <?= $paginaActual <= 1 ? 'disabled' : '' ?>">
                                    <a class="page-link" href="gestion_reservas.php?estado=<?= urlencode($estadoActual) ?>&q=<?= urlencode($busqueda) ?>&p=<?= $paginaActual - 1 ?>">
                                        <svg class="icon"><use href="#i-arrow-left" /></svg> Anterior
                                    </a>
                                </li>

                                <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                                    <li class="page-item <?= $i === $paginaActual ? 'active' : '' ?>">
                                        <a class="page-link" href="gestion_reservas.php?estado=<?= urlencode($estadoActual) ?>&q=<?= urlencode($busqueda) ?>&p=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>

                                <li class="page-item <?= $paginaActual >= $totalPaginas ? 'disabled' : '' ?>">
                                    <a class="page-link" href="gestion_reservas.php?estado=<?= urlencode($estadoActual) ?>&q=<?= urlencode($busqueda) ?>&p=<?= $paginaActual + 1 ?>">
                                        Siguiente <svg class="icon"><use href="#i-arrow-right" /></svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    <?php endif; ?>
                </div>
            </main>
        </div>

        <div class="modal fade" id="confirmarPrestamoModal" tabindex="-1" aria-labelledby="confirmarPrestamoTitulo" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 rounded-4">
                    <form method="POST" action="gestion_reservas.php?estado=activas">
                        <div class="modal-header border-bottom px-4 py-3">
                            <div>
                                <h2 id="confirmarPrestamoTitulo" class="h5 fw-semibold section-green-title mb-0">Confirmar préstamo</h2>
                                <p class="small text-secondary mb-0">Verifica credencial o recibo y comprobante antes de entregar.</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>

                        <div class="modal-body px-4 py-3">
                            <input type="hidden" name="id_reserva" id="modal_id_reserva" value="" />

                            <div class="mb-3">
                                <div class="modal-summary-row">
                                    <span class="text-secondary">Folio</span>
                                    <strong id="modal_folio"></strong>
                                </div>
                                <div class="modal-summary-row">
                                    <span class="text-secondary">Lector</span>
                                    <span id="modal_lector" class="text-end"></span>
                                </div>
                                <div class="modal-summary-row">
                                    <span class="text-secondary">Libro</span>
                                    <span id="modal_libro" class="text-end"></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="id_tipo_prestamo" class="form-label fw-medium">Tipo de préstamo</label>
                                <select name="id_tipo_prestamo" id="id_tipo_prestamo" class="form-select">
                                    <?php if ($resTiposPrestamo && mysqli_num_rows($resTiposPrestamo) > 0): ?>
                                        <?php while ($tipo = mysqli_fetch_assoc($resTiposPrestamo)): ?>
                                            <option value="<?= (int)$tipo['id_tipo_prestamo'] ?>">
                                                <?= htmlspecialchars($tipo['tipo']) ?>
                                            </option>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <p class="small text-secondary mb-0">
                                Fecha límite de devolución asignada: <strong id="modal_fecha_devolucion" class="text-dark"></strong>
                            </p>
                        </div>

                        <div class="modal-footer border-top px-4 py-3">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-brand">Confirmar entrega</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

         <?php
        if ($stmtList) {
            mysqli_stmt_close($stmtList);
        }
        include "includes/footer.php";
        ?>
        <script src="./js/ver_password.js"></script>
        <script src="./js/gestion_reservas.js"></script>
    </body>
</html>