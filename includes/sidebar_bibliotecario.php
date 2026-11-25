<?php
// Obtiene desde la base de datos el nombre completo y perfil del bibliotecario en sesión
$pagina_activa  = $pagina_activa ?? "";

// El submenú de "Datos de la biblioteca" solo se abre en sus 5 páginas
$en_datos = strpos($pagina_activa, "datos_biblioteca") === 0;
$submenu = [
    "datos_biblioteca.php" => "Información general",
    "datos_biblioteca_horario.php" => "Horario y contacto",
    "datos_biblioteca_inicio.php" => "Contenido del inicio",
    "datos_biblioteca_preguntas.php" => "Preguntas frecuentes",
    "datos_biblioteca_politicas.php" => "Políticas del servicio",
];

$nombreBiblio   = $_SESSION['nombre'] ?? 'Bibliotecario';
$perfilBiblio   = 'Bibliotecario';
$idBiblioSesion = (int)($_SESSION['id_bibliotecario'] ?? 0);

if ($idBiblioSesion > 0 && isset($conexion)) {
    $sqlBiblio = "SELECT CONCAT_WS(' ', t.nombre, t.apellido_paterno) AS nombre_completo, p.Perfil
                  FROM tblbibliotecario b
                  INNER JOIN tbltrabajadores t ON t.numero_control = b.numero_control
                  INNER JOIN tblperfil p ON p.id_perfil = b.id_perfil
                  WHERE b.id_bibliotecario = ?";
    $stmtBib = mysqli_prepare($conexion, $sqlBiblio);
    if ($stmtBib) {
        mysqli_stmt_bind_param($stmtBib, "i", $idBiblioSesion);
        mysqli_stmt_execute($stmtBib);
        $resBib  = mysqli_stmt_get_result($stmtBib);
        $filaBib = mysqli_fetch_assoc($resBib);
        if ($filaBib) {
            $nombreBiblio = $filaBib['nombre_completo'];
            $perfilBiblio = $filaBib['Perfil'];
        }
        mysqli_stmt_close($stmtBib);
    }
}
?>
<aside class="sidebar">
    <a href="panel_control.php" class="sidebar-brand">
        <img src="./img/logo-cbta5-blanco.png" alt="Logotipo del CBTa No. 5" />
        <span>
            <span class="brand-name d-block">Biblioteca Escolar</span>
            <span class="brand-sub d-block">CBTa No. 5 · Huejutla, Hgo.</span>
        </span>
    </a>

    <div class="sidebar-main">
        <ul class="sidebar-menu">
            <li>
                <a href="gestion_reservas.php" class="<?= $pagina_activa === 'gestion_reservas.php' ? 'active' : '' ?>">
                    <svg class="icon"><use href="#i-clipboard-list" /></svg> Gestión de reservas
                </a>
            </li>
            <li>
                <a href="inventario_libros.php" class="<?= $pagina_activa === 'inventario_libros.php' ? 'active' : '' ?>">
                    <svg class="icon"><use href="#i-book-open" /></svg> Inventario de libros
                </a>
            </li>
            <li>
                <a href="libro_agregar.php" class="<?= $pagina_activa === 'libro_agregar.php' ? 'active' : '' ?>">
                    <svg class="icon"><use href="#i-plus" /></svg> Alta de libro
                </a>
            </li>
            <li>
                <a href="panel_control.php" class="<?= $pagina_activa === 'panel_control.php' ? 'active' : '' ?>">
                    <svg class="icon"><use href="#i-layout-dashboard" /></svg> Panel de control
                </a>
            </li>
            <li>
                <a href="datos_biblioteca.php" class="<?= $en_datos ? 'parent-active' : '' ?>">
                    <svg class="icon"><use href="#i-building" /></svg> Datos de la biblioteca
                    <svg class="icon chevron"><use href="<?= $en_datos ? '#i-chevron-down' : '#i-chevron-right' ?>" /></svg>
                </a>
                <?php if ($en_datos): ?>
                    <ul class="submenu">
                        <?php foreach ($submenu as $archivo => $texto): ?>
                            <li><a href="<?= $archivo ?>" class="<?= $archivo === $pagina_activa ? 'active' : '' ?>"><?= $texto ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        </ul>
    </div>

    <div class="user-card">
        <div class="user-avatar">
            <svg class="icon"><use href="#i-user" /></svg>
        </div>
        <div>
            <span class="user-name"><?= htmlspecialchars($nombreBiblio) ?></span>
            <span class="user-role"><?= htmlspecialchars($perfilBiblio) ?></span>
        </div>
    </div>

    <ul class="sidebar-menu sidebar-bottom">
        <li>
            <a href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                <svg class="icon"><use href="#i-lock" /></svg> Cambiar contraseña
            </a>
        </li>
        <li>
            <a href="logout.php">
                <svg class="icon"><use href="#i-log-out" /></svg> Cerrar sesión
            </a>
        </li>
    </ul>
</aside>

<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4">
            <form action="cambiar_password.php" method="POST" class="modal-body p-4">
                <div class="d-flex align-items-start gap-3 mb-4">
                    <div class="modal-circle">
                        <svg class="icon"><use href="#i-lock" /></svg>
                    </div>
                    <div class="flex-grow-1">
                        <h2 id="changePasswordTitle" class="h5 fw-semibold section-green-title mb-1">Cambiar contraseña</h2>
                        <p class="mb-0 small text-secondary">Escribe tu contraseña actual y elige una nueva.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="mb-3">
                    <label for="pwActual" class="form-label fw-medium">Contraseña actual</label>
                    <div class="password-field">
                        <svg class="icon field-icon"><use href="#i-lock" /></svg>
                        <input type="password" name="pw_actual" id="pwActual" class="form-control" placeholder="Escribe tu contraseña actual" autocomplete="current-password" required />
                        <button type="button" class="toggle-password" data-target="pwActual" aria-label="Mostrar contraseña">
                            <svg class="icon"><use href="#i-eye" /></svg>
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="pwNueva" class="form-label fw-medium">Contraseña nueva</label>
                    <div class="password-field">
                        <svg class="icon field-icon"><use href="#i-lock" /></svg>
                        <input type="password" name="pw_nueva" id="pwNueva" class="form-control" placeholder="Escribe tu contraseña nueva" minlength="8" autocomplete="new-password" required />
                        <button type="button" class="toggle-password" data-target="pwNueva" aria-label="Mostrar contraseña">
                            <svg class="icon"><use href="#i-eye" /></svg>
                        </button>
                    </div>
                    <div class="form-text">Mínimo 8 caracteres.</div>
                </div>

                <div class="mb-4">
                    <label for="pwConfirmar" class="form-label fw-medium">Confirmar contraseña nueva</label>
                    <div class="password-field">
                        <svg class="icon field-icon"><use href="#i-lock" /></svg>
                        <input type="password" name="pw_confirmar" id="pwConfirmar" class="form-control" placeholder="Repite tu contraseña nueva" minlength="8" autocomplete="new-password" required />
                        <button type="button" class="toggle-password" data-target="pwConfirmar" aria-label="Mostrar contraseña">
                            <svg class="icon"><use href="#i-eye" /></svg>
                        </button>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-brand px-4">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>