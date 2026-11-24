<?php
// Encabezado del lector. La página debe llamar session_start() antes de imprimir HTML
// y definir $pagina_activa (ej. "mi_cuenta.php").
$pagina_activa = $pagina_activa ?? "";
$menu = [
    "mi_cuenta.php" => "Mi cuenta",
    "catalogo.php" => "Catálogo",
    "ayuda.php" => "Ayuda",
];
$nombre_lector = htmlspecialchars($_SESSION["nombre"] ?? "[Nombre del lector]");
?>
<header class="site-header d-flex align-items-center">
    <nav class="navbar navbar-expand-lg w-100 py-0">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 m-0" href="mi_cuenta.php">
                <img src="./img/logo-cbta5-blanco.png" alt="Logotipo del CBTa No. 5" class="brand-logo" />
                <span>
                    <span class="brand-name d-block">Biblioteca Escolar</span>
                    <span class="brand-sub d-block">CBTa No. 5 · Huejutla, Hgo.</span>
                </span>
            </a>

            <button class="navbar-toggler border-light" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Abrir menú">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainMenu">
                <ul class="navbar-nav mx-lg-auto mb-3 mb-lg-0 gap-lg-2">
                    <?php foreach ($menu as $archivo => $texto): ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $archivo === $pagina_activa ? "active" : "" ?>" href="<?= $archivo ?>"><?= $texto ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="d-flex align-items-center gap-3 text-white">
                    <a href="mi_cuenta.php" class="position-relative text-white" aria-label="2 avisos nuevos">
                        <svg class="icon" style="width: 24px; height: 24px"><use href="#i-bell" /></svg>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger bell-badge">2</span>
                    </a>
                    <span class="d-flex align-items-center gap-2">
                        <svg class="icon"><use href="#i-user" /></svg> <?= $nombre_lector ?>
                    </span>
                    <span class="tag tag-ok">Alumno</span>
                    <a href="index.php" class="btn btn-brand-outline">
                        <svg class="icon"><use href="#i-log-out" /></svg> Cerrar sesión
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
