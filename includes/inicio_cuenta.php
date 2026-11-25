<?php
// Inicio común de las páginas de Mi cuenta. La página define antes: $titulo, $subtitulo, $icono y $pagina_activa.
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?= $titulo ?> - Biblioteca Escolar CBTa No. 5</title>

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="./css/bootstrap.min.css" />
        <link rel="stylesheet" href="./css/estilos.css" />
        <link rel="stylesheet" href="./css/lector.css" />
        <link rel="stylesheet" href="./css/cuenta.css" />
        <link rel="stylesheet" href="./css/footer.css" />
    </head>

    <body class="d-flex flex-column min-vh-100">
        <?php include "includes/iconos.php"; ?>
        <?php include "includes/header_lector.php"; ?>

        <main class="flex-grow-1 py-5">
            <div class="container">
                <a href="mi_cuenta.php" class="link-arrow mb-3">
                    <svg class="icon"><use href="#i-arrow-left" /></svg> Volver a Mi cuenta
                </a>

                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="icon-circle icon-circle-lg">
                        <svg class="icon"><use href="#<?= $icono ?>" /></svg>
                    </div>
                    <div>
                        <h1 class="page-title h2 fw-semibold mb-0"><?= $titulo ?></h1>
                        <p class="text-secondary mb-0"><?= $subtitulo ?></p>
                    </div>
                </div>
