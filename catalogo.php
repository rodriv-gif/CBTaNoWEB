<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Catálogo - Biblioteca Escolar</title>

        <!-- Fuente Poppins (guía de estilos) -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="./css/bootstrap.min.css" />

        <style>
            :root {
                --green-main: #0f5132;
                --green-medium: #2e7d58;
                --green-dark: #0a3d26;
                --green-success: #1f6b47;
                --green-soft: #e6f4ec;
                --blue-accent: #1e3a8a;
                --red-alert: #b42318;
                --gray-light: #f5f7f6;
                --text-main: #212121;
                --text-muted: #4b5563;
                --border-card: #e5e7eb;
                --border-field: #d0d5dd;
            }

            body {
                font-family: "Poppins", "Segoe UI", Arial, sans-serif;
                font-size: 14px;
                line-height: 1.5;
                color: var(--text-main);
                background-color: var(--gray-light);
            }

            h1,
            h2 {
                font-weight: 600;
            }

            .container {
                max-width: 1220px;
            }

            .icon {
                width: 20px;
                height: 20px;
                fill: none;
                stroke: currentColor;
                stroke-width: 1.75;
                stroke-linecap: round;
                stroke-linejoin: round;
                flex-shrink: 0;
            }

            /* ---------- Botones ---------- */
            .btn {
                font-size: 14px;
            }
            .btn-primary-brand {
                font-size: 15px;
                font-weight: 500;
                border-radius: 8px;
                min-height: 46px;
                padding: 8px 22px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                background-color: var(--green-main);
                color: #ffffff;
                border: 1.5px solid var(--green-main);
            }
            .btn-primary-brand:hover {
                background-color: var(--green-medium);
                border-color: var(--green-medium);
                color: #ffffff;
            }
            .btn-primary-brand:active {
                background-color: var(--green-dark) !important;
                color: #ffffff;
            }
            .btn-primary-brand:focus-visible,
            .nav-link:focus-visible {
                outline: 3px solid var(--blue-accent);
                outline-offset: 2px;
            }

            /* ---------- Encabezado ---------- */
            .site-header {
                background-color: var(--green-main);
                min-height: 74px;
            }
            .site-header .navbar {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
            }
            .site-header .brand-logo {
                height: 50px;
                width: auto;
            }
            .site-header .brand-name {
                font-weight: 600;
                font-size: 16px;
                line-height: 1.2;
                color: #ffffff;
            }
            .site-header .brand-sub {
                font-size: 10px;
                line-height: 1.2;
                color: #ffffff;
            }
            .site-header .nav-link {
                color: #ffffff;
                font-size: 13px;
                font-weight: 500;
                padding: 8px 14px;
            }
            .site-header .nav-link.active,
            .site-header .nav-link:hover,
            .site-header .nav-link:focus {
                color: #ffffff;
                font-weight: 600;
                background: transparent;
            }
            .site-header .btn-brand-outline {
                font-weight: 500;
                border-radius: 8px;
                padding: 4px 12px;
                min-height: 34px;
                font-size: 13px;
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: transparent;
                color: #ffffff;
                border: 1.5px solid #ffffff;
            }
            .site-header .btn-brand-outline:hover {
                background-color: rgba(255, 255, 255, 0.12);
                color: #ffffff;
            }
            .bell-badge {
                min-width: 18px;
                height: 18px;
                font-size: 11px;
                font-weight: 600;
                background-color: var(--red-alert) !important;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            @media (min-width: 992px) {
                .site-header .nav-link {
                    height: 74px;
                    display: flex;
                    align-items: center;
                    border-bottom: 3px solid transparent;
                    border-radius: 0;
                }
                .site-header .nav-link.active {
                    border-bottom-color: #ffffff;
                }
            }
            @media (max-width: 991.98px) {
                .site-header .navbar-collapse {
                    padding-bottom: 12px;
                }
            }

            /* ---------- Contenido ---------- */
            .page-title {
                font-size: 32px;
                color: var(--green-main);
                margin: 0 0 4px 0;
            }
            .page-subtitle {
                color: var(--text-muted);
                margin: 0 0 24px 0;
            }

            .search-card {
                background-color: #ffffff;
                border: 1px solid var(--border-card);
                border-radius: 12px;
                padding: 24px;
                box-shadow: 0 1px 3px rgba(16, 24, 40, 0.06);
            }
            .search-box {
                position: relative;
            }
            .search-box .icon {
                position: absolute;
                left: 16px;
                top: 50%;
                transform: translateY(-50%);
                color: var(--text-muted);
            }
            .search-box .form-control {
                height: 48px;
                border: 1px solid var(--border-field);
                border-radius: 8px 0 0 8px;
                padding-left: 48px;
                font-size: 15px;
            }
            .search-box .form-control:focus {
                border: 2px solid var(--blue-accent);
                box-shadow: none;
                padding-left: 47px;
            }
            .search-card .btn-primary-brand {
                border-radius: 0 8px 8px 0;
                min-height: 48px;
            }

            .filter-label {
                font-size: 14px;
                font-weight: 500;
            }
            .filter-pill {
                display: inline-flex;
                align-items: center;
                padding: 6px 18px;
                border: 1px solid var(--border-field);
                border-radius: 999px;
                background-color: #ffffff;
                color: var(--text-muted);
                font-size: 14px;
                text-decoration: none;
            }
            .filter-pill:hover {
                background-color: var(--gray-light);
                color: var(--text-main);
            }
            .filter-pill.active {
                background-color: var(--green-soft);
                border-color: var(--green-main);
                color: var(--green-main);
                font-weight: 500;
            }
            .filter-select {
                width: auto;
                min-width: 210px;
                border: 1px solid var(--border-field);
                border-radius: 999px;
                font-size: 14px;
                color: var(--text-main);
                padding: 6px 34px 6px 16px;
            }
            .filter-select:focus {
                border-color: var(--blue-accent);
                box-shadow: none;
            }

            .list-title {
                font-size: 22px;
                margin: 0;
            }
            .list-count {
                color: var(--text-muted);
                font-size: 14px;
                margin: 0;
            }

            /* Tarjetas de libros */
            .book-card {
                background-color: #ffffff;
                border: 1px solid var(--border-card);
                border-radius: 12px;
                padding: 12px;
                transition: border-color 0.15s, box-shadow 0.15s, transform 0.15s;
            }
            .book-card:hover {
                border-color: var(--green-main);
                box-shadow: 0 6px 18px rgba(16, 24, 40, 0.12);
                transform: translateY(-2px);
            }
            .book-card:focus-within {
                outline: 3px solid var(--blue-accent);
                outline-offset: 2px;
            }
            .book-card .stretched-link:focus-visible {
                outline: none;
            }
            .book-card-cover {
                aspect-ratio: 3 / 4;
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                padding: 12px;
                color: #ffffff;
                font-weight: 500;
                font-size: 14px;
                margin-bottom: 12px;
            }
            .cover-0 { background-color: var(--green-main); }
            .cover-1 { background-color: var(--green-medium); }
            .cover-2 { background-color: var(--green-success); }

            .book-card-title {
                font-size: 15px;
                font-weight: 500;
                margin: 0;
                line-height: 1.3;
            }
            .book-card-title a {
                color: var(--text-main);
                text-decoration: none;
            }
            .book-card-author {
                color: var(--text-muted);
                font-size: 13px;
                margin: 2px 0 10px 0;
            }

            .status-tag {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 3px 10px;
                border-radius: 999px;
                font-size: 12px;
                font-weight: 500;
            }
            .status-tag .icon {
                width: 14px;
                height: 14px;
            }
            .status-available {
                color: var(--green-success);
                background-color: var(--green-soft);
            }
            .status-unavailable {
                color: #475467;
                background-color: #f2f4f7;
            }

            /* Paginación */
            .pagination-nav .page-link {
                color: var(--text-main);
                border: 1px solid var(--border-card);
                border-radius: 8px;
                margin: 0 3px;
                min-width: 40px;
                text-align: center;
                font-size: 14px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 6px;
            }
            .pagination-nav .page-link:hover {
                background-color: var(--gray-light);
            }
            .pagination-nav .page-item.active .page-link {
                background-color: var(--green-main);
                border-color: var(--green-main);
                color: #ffffff;
            }
            .pagination-nav .page-item.disabled .page-link {
                color: #98a2b3;
                background-color: #ffffff;
            }
            .pagination-nav .icon {
                width: 16px;
                height: 16px;
            }

            .tag {
                display: inline-flex;
                align-items: center;
                padding: 2px 12px;
                border-radius: 999px;
                font-size: 12px;
                font-weight: 500;
                white-space: nowrap;
            }
            .tag-ok {
                color: var(--green-success);
                background-color: var(--green-soft);
            }
        </style>
        <link rel="stylesheet" href="./css/footer.css" />
    </head>

    <body class="d-flex flex-column min-vh-100">
        <!-- Iconos SVG usados en esta página -->
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
            <symbol id="i-circle-check" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <path d="m9 12 2 2 4-4" />
            </symbol>
            <symbol id="i-circle-x" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <path d="m15 9-6 6" />
                <path d="m9 9 6 6" />
            </symbol>
            <symbol id="i-bell" viewBox="0 0 24 24">
                <path d="M10.268 21a2 2 0 0 0 3.464 0" />
                <path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326" />
            </symbol>
            <symbol id="i-user" viewBox="0 0 24 24">
                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </symbol>
            <symbol id="i-log-out" viewBox="0 0 24 24">
                <path d="m16 17 5-5-5-5" />
                <path d="M21 12H9" />
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
            </symbol>
            <symbol id="i-search" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.3-4.3" />
            </symbol>
            <symbol id="i-arrow-left" viewBox="0 0 24 24">
                <path d="m12 19-7-7 7-7" />
                <path d="M19 12H5" />
            </symbol>
            <symbol id="i-arrow-right" viewBox="0 0 24 24">
                <path d="M5 12h14" />
                <path d="m12 5 7 7-7 7" />
            </symbol>
        </svg>

        <header class="site-header d-flex align-items-center">
            <nav class="navbar navbar-expand-lg w-100">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center gap-2 m-0" href="mi_cuenta.php">
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
                        <ul class="navbar-nav mx-lg-auto mb-3 mb-lg-0 gap-lg-2">
                            <li class="nav-item"><a class="nav-link" href="mi_cuenta.php">Mi cuenta</a></li>
                            <li class="nav-item"><a class="nav-link active" href="catalogo.php" aria-current="page">Catálogo</a></li>
                            <li class="nav-item"><a class="nav-link" href="ayuda.php">Ayuda</a></li>
                        </ul>

                        <div class="d-flex align-items-center gap-3 text-white">
                            <a href="mi_cuenta.php" class="position-relative text-white" aria-label="2 avisos nuevos">
                                <svg class="icon" style="width: 24px; height: 24px"><use href="#i-bell" /></svg>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger bell-badge">2</span>
                            </a>
                            <span class="d-flex align-items-center gap-2">
                                <svg class="icon"><use href="#i-user" /></svg> [Nombre del lector]
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

        <main class="flex-grow-1">
            <div class="container py-4">
                <h1 class="page-title">Catálogo</h1>
                <p class="page-subtitle">Busca un libro y revisa si hay ejemplares disponibles.</p>

                <!-- Buscador y filtros -->
                <form method="get" action="catalogo.php" class="search-card mb-4">
                    <div class="d-flex">
                        <div class="search-box flex-grow-1">
                            <svg class="icon"><use href="#i-search" /></svg>
                            <input
                                type="search"
                                name="q"
                                class="form-control"
                                value=""
                                placeholder="Busca por título, autor o especialidad"
                                aria-label="Buscar libro"
                            />
                        </div>
                        <button type="submit" class="btn btn-primary-brand">Buscar</button>
                    </div>

                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mt-3">
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <span class="filter-label me-1">Disponibilidad</span>
                            <a href="catalogo.php?q=" class="filter-pill active">Todos</a>
                            <a href="catalogo.php?q=&disp=1" class="filter-pill">Solo disponibles</a>
                        </div>

                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <label for="categoria" class="filter-label mb-0">Categoría</label>
                            <select name="categoria" id="categoria" class="form-select filter-select" aria-label="Filtrar por categoría">
                                <option value="">Todas las categorías</option>
                                <option value="Agropecuaria">Agropecuaria</option>
                                <option value="Informática">Informática</option>
                                <option value="Administración">Administración</option>
                                <option value="Ciencias Básicas">Ciencias Básicas</option>
                                <option value="Literatura">Literatura</option>
                            </select>
                        </div>
                    </div>
                </form>

                <!-- Encabezado de la lista -->
                <div class="d-flex justify-content-between align-items-end flex-wrap gap-2 mb-3">
                    <h2 class="list-title">Libros del catálogo</h2>
                    <p class="list-count">Mostrando [N] libros, ordenados por título</p>
                </div>

                <!-- Tarjetas de ejemplo -->
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
                    <div class="col">
                        <article class="book-card position-relative h-100">
                            <div class="book-card-cover cover-0" aria-hidden="true">[Título del libro]</div>
                            <h3 class="book-card-title">
                                <a href="detalle_libro.php?id=1" class="stretched-link">[Título del libro]</a>
                            </h3>
                            <p class="book-card-author">[Autor]</p>
                            <span class="status-tag status-available">
                                <svg class="icon"><use href="#i-circle-check" /></svg> Disponible
                            </span>
                        </article>
                    </div>

                    <div class="col">
                        <article class="book-card position-relative h-100">
                            <div class="book-card-cover cover-1" aria-hidden="true">[Título del libro]</div>
                            <h3 class="book-card-title">
                                <a href="detalle_libro.php?id=2" class="stretched-link">[Título del libro]</a>
                            </h3>
                            <p class="book-card-author">[Autor]</p>
                            <span class="status-tag status-available">
                                <svg class="icon"><use href="#i-circle-check" /></svg> Disponible
                            </span>
                        </article>
                    </div>

                    <div class="col">
                        <article class="book-card position-relative h-100">
                            <div class="book-card-cover cover-2" aria-hidden="true">[Título del libro]</div>
                            <h3 class="book-card-title">
                                <a href="detalle_libro.php?id=3" class="stretched-link">[Título del libro]</a>
                            </h3>
                            <p class="book-card-author">[Autor]</p>
                            <span class="status-tag status-available">
                                <svg class="icon"><use href="#i-circle-check" /></svg> Disponible
                            </span>
                        </article>
                    </div>

                    <div class="col">
                        <article class="book-card position-relative h-100">
                            <div class="book-card-cover cover-0" aria-hidden="true">[Título del libro]</div>
                            <h3 class="book-card-title">
                                <a href="detalle_libro.php?id=4" class="stretched-link">[Título del libro]</a>
                            </h3>
                            <p class="book-card-author">[Autor]</p>
                            <span class="status-tag status-available">
                                <svg class="icon"><use href="#i-circle-check" /></svg> Disponible
                            </span>
                        </article>
                    </div>

                    <div class="col">
                        <article class="book-card position-relative h-100">
                            <div class="book-card-cover cover-1" aria-hidden="true">[Título del libro]</div>
                            <h3 class="book-card-title">
                                <a href="detalle_libro.php?id=5" class="stretched-link">[Título del libro]</a>
                            </h3>
                            <p class="book-card-author">[Autor]</p>
                            <span class="status-tag status-available">
                                <svg class="icon"><use href="#i-circle-check" /></svg> Disponible
                            </span>
                        </article>
                    </div>

                    <div class="col">
                        <article class="book-card position-relative h-100">
                            <div class="book-card-cover cover-2" aria-hidden="true">[Título del libro]</div>
                            <h3 class="book-card-title">
                                <a href="detalle_libro.php?id=6" class="stretched-link">[Título del libro]</a>
                            </h3>
                            <p class="book-card-author">[Autor]</p>
                            <span class="status-tag status-available">
                                <svg class="icon"><use href="#i-circle-check" /></svg> Disponible
                            </span>
                        </article>
                    </div>

                    <div class="col">
                        <article class="book-card position-relative h-100">
                            <div class="book-card-cover cover-0" aria-hidden="true">[Título del libro]</div>
                            <h3 class="book-card-title">
                                <a href="detalle_libro.php?id=7" class="stretched-link">[Título del libro]</a>
                            </h3>
                            <p class="book-card-author">[Autor]</p>
                            <span class="status-tag status-available">
                                <svg class="icon"><use href="#i-circle-check" /></svg> Disponible
                            </span>
                        </article>
                    </div>

                    <div class="col">
                        <article class="book-card position-relative h-100">
                            <div class="book-card-cover cover-1" aria-hidden="true">[Título del libro]</div>
                            <h3 class="book-card-title">
                                <a href="detalle_libro.php?id=8" class="stretched-link">[Título del libro]</a>
                            </h3>
                            <p class="book-card-author">[Autor]</p>
                            <span class="status-tag status-available">
                                <svg class="icon"><use href="#i-circle-check" /></svg> Disponible
                            </span>
                        </article>
                    </div>

                    <div class="col">
                        <article class="book-card position-relative h-100">
                            <div class="book-card-cover cover-2" aria-hidden="true">[Título del libro]</div>
                            <h3 class="book-card-title">
                                <a href="detalle_libro.php?id=9" class="stretched-link">[Título del libro]</a>
                            </h3>
                            <p class="book-card-author">[Autor]</p>
                            <span class="status-tag status-unavailable">
                                <svg class="icon"><use href="#i-circle-x" /></svg> No disponible
                            </span>
                        </article>
                    </div>

                    <div class="col">
                        <article class="book-card position-relative h-100">
                            <div class="book-card-cover cover-0" aria-hidden="true">[Título del libro]</div>
                            <h3 class="book-card-title">
                                <a href="detalle_libro.php?id=10" class="stretched-link">[Título del libro]</a>
                            </h3>
                            <p class="book-card-author">[Autor]</p>
                            <span class="status-tag status-available">
                                <svg class="icon"><use href="#i-circle-check" /></svg> Disponible
                            </span>
                        </article>
                    </div>
                </div>

                <!-- Paginación -->
                <nav class="pagination-nav d-flex justify-content-center mt-5 mb-3" aria-label="Páginas del catálogo">
                    <ul class="pagination mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="catalogo.php?p=0">
                                <svg class="icon"><use href="#i-arrow-left" /></svg> Anterior
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="catalogo.php?p=1">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="catalogo.php?p=2">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="catalogo.php?p=3">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="catalogo.php?p=2">
                                Siguiente <svg class="icon"><use href="#i-arrow-right" /></svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </main>

        <?php include "includes/footer.php"; ?>

        <script src="./js/bootstrap.bundle.min.js"></script>
    </body>
</html>