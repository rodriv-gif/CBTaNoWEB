<?php
// Menú del encabezado: archivo => texto. La página que lo llama define $pagina_activa (ej. "nosotros.php").
$pagina_activa = $pagina_activa ?? "";
$menu = [
    "index.php" => "Inicio",
    "nosotros.php" => "Nosotros",
    "preguntas.php" => "Preguntas",
    "politicas.php" => "Políticas",
];
?>
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

            <button class="navbar-toggler border-light" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Abrir menú">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainMenu">
                <ul class="navbar-nav mx-lg-auto mb-3 mb-lg-0 gap-lg-3">
                    <?php foreach ($menu as $archivo => $texto): ?>
                        <li class="nav-item">
                            <a class="nav-link px-lg-3 <?= $archivo === $pagina_activa ? "active" : "" ?>" href="<?= $archivo ?>"><?= $texto ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="d-flex gap-2">
                    <a href="registro.php" class="btn btn-brand-outline">Registrarse</a>
                    <a href="login.php" class="btn btn-brand-light">Iniciar sesión</a>
                </div>
            </div>
        </div>
    </nav>
</header>
