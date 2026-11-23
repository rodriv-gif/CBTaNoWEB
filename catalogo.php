<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Catálogo - Biblioteca Escolar</title>

        <!-- Fuente Poppins (guia de estilos) -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="./css/bootstrap.min.css" />

        <style>
            /* Colores de la guia de estilos */
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
                font-size: 15px;
                line-height: 1.5;
                color: var(--text-main);
                background-color: var(--gray-light);
            }

            h1,
            h2 {
                font-weight: 600;
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

            /* ancho maximo del contenido para que no se estire en pantallas grandes */
            .container {
                max-width: 1140px;
            }

            /* ---------- Botones ---------- */
            .btn-primary-brand,
            .btn-secondary-brand,
            .btn-header {
                font-size: 15px;
                font-weight: 500;
                border-radius: 8px;
                min-height: 46px;
                padding: 8px 22px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
            }

            .btn-primary-brand {
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

            .btn-secondary-brand {
                background-color: #ffffff;
                color: var(--green-main);
                border: 1.5px solid var(--green-main);
            }
            .btn-secondary-brand:hover {
                background-color: var(--green-soft);
                color: var(--green-main);
                border-color: var(--green-main);
            }

            .btn-header {
                min-height: 40px;
                padding: 6px 16px;
                font-size: 14px;
                background-color: transparent;
                color: #ffffff;
                border: 1.5px solid #ffffff;
            }
            .btn-header:hover {
                background-color: rgba(255, 255, 255, 0.12);
                color: #ffffff;
            }

            .btn-primary-brand:focus-visible,
            .btn-secondary-brand:focus-visible,
            .btn-header:focus-visible,
            .nav-link:focus-visible {
                outline: 3px solid var(--blue-accent);
                outline-offset: 2px;
            }

            /* ---------- Encabezado ---------- */
            .site-header {
                background-color: var(--green-main);
                min-height: 60px;
            }
            .brand-logo {
                height: 40px;
                width: auto;
            }
            .brand-name {
                font-weight: 600;
                font-size: 18px;
                line-height: 1.2;
                color: #ffffff;
            }
            .brand-sub {
                font-size: 12px;
                line-height: 1.2;
                color: #ffffff;
            }

            .site-header .nav-link {
                color: #ffffff;
                font-size: 14px;
                font-weight: 500;
                padding: 8px 12px;
                border-radius: 8px;
            }
            .site-header .nav-link:hover {
                background-color: rgba(255, 255, 255, 0.12);
            }
            .site-header .navbar-nav .nav-link,
            .site-header .navbar-nav .nav-link.active {
                color: #ffffff;
            }
            .site-header .navbar-nav .nav-link.active {
                border-bottom: 3px solid #ffffff;
                border-radius: 8px 8px 0 0;
            }

            .user-box {
                display: flex;
                align-items: center;
                gap: 16px;
                color: #ffffff;
                font-size: 14px;
            }
            .user-box .user-name {
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .bell-link {
                position: relative;
                color: #ffffff;
                display: flex;
            }
            .bell-badge {
                position: absolute;
                top: -8px;
                right: -8px;
                min-width: 18px;
                height: 18px;
                border-radius: 999px;
                background-color: var(--red-alert);
                color: #ffffff;
                font-size: 11px;
                font-weight: 600;
                display: flex;
                align-items: center;
                justify-content: center;
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
            .search-box .btn-primary-brand {
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

            .list-title {
                font-size: 22px;
                margin: 0;
            }
            .list-count {
                color: var(--text-muted);
                font-size: 14px;
                margin: 0;
            }

            /* tarjeta completa clicable: el enlace del titulo cubre toda la tarjeta (stretched-link) */
            .book-card {
                background-color: #ffffff;
                border: 1px solid var(--border-card);
                border-radius: 12px;
                padding: 12px;
                transition:
                    border-color 0.15s,
                    box-shadow 0.15s,
                    transform 0.15s;
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
            .cover-0 {
                background-color: var(--green-main);
            }
            .cover-1 {
                background-color: var(--green-medium);
            }
            .cover-2 {
                background-color: var(--green-success);
            }
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

            /* ---------- Pie de pagina ---------- */
            .site-footer {
                background-color: var(--green-dark);
                color: #ffffff;
                text-align: center;
                font-size: 14px;
                padding: 16px 0;
            }
        </style>

        <style>
            /* encabezado del lector (igual que Inicio, Mi cuenta y Ayuda) */
            .site-header {
                background-color: var(--green-main);
                min-height: 82px;
            }
            .site-header .brand-logo {
                height: 50px;
                width: auto;
            }
            .site-header .nav-link {
                color: #fff;
                font-size: 15px;
                font-weight: 500;
                padding: 8px 14px;
            }
            .site-header .nav-link.active,
            .site-header .nav-link:hover,
            .site-header .nav-link:focus {
                color: #fff;
                font-weight: 600;
                background: transparent;
            }
            .site-header .btn-brand-outline {
                font-weight: 500;
                border-radius: 8px;
                padding: 8px 18px;
                min-height: 42px;
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: transparent;
                color: #fff;
                border: 1.5px solid #fff;
            }
            .site-header .btn-brand-outline:hover {
                background-color: rgba(255, 255, 255, 0.12);
                color: #fff;
            }
            @media (min-width: 992px) {
                .site-header .navbar {
                    padding: 0;
                }
                .site-header .nav-link {
                    height: 82px;
                    display: flex;
                    align-items: center;
                    border-bottom: 3px solid transparent;
                    border-radius: 0;
                }
                .site-header .nav-link.active {
                    border-bottom-color: #fff;
                }
            }
        </style>
        <style>
            body {
                font-size: 14px;
            }
            .container {
                max-width: 1080px;
            }
            .site-header {
                min-height: 70px;
            }
            .site-header .brand-logo {
                height: 42px;
            }
            .site-header .brand-name {
                font-size: 16px;
            }
            .site-header .brand-sub {
                font-size: 11px;
            }
            .site-header .nav-link {
                font-size: 14px;
            }
            .site-header .btn-brand-outline {
                min-height: 38px;
                padding: 6px 14px;
                font-size: 14px;
            }
            @media (min-width: 992px) {
                .site-header .nav-link {
                    height: 70px;
                }
            }
            .display-5 {
                font-size: 2rem;
            }
            .display-6 {
                font-size: 1.75rem;
            }
            .fs-2 {
                font-size: 1.6rem !important;
            }
            .fs-4 {
                font-size: 1.1rem !important;
            }
            .fs-5 {
                font-size: 0.95rem !important;
            }
            .panel-head {
                padding: 16px 20px;
            }
            .panel-head h2 {
                font-size: 20px;
            }
            .panel-head p {
                font-size: 13px;
            }
            .icon-circle {
                width: 40px;
                height: 40px;
            }
            .table-lib thead th,
            .table-lib td {
                padding: 10px 14px;
                font-size: 14px;
            }
            .table-lib .sub {
                font-size: 12px;
            }
            .tag {
                font-size: 12px;
            }
            .summary-strip {
                font-size: 14px;
                margin-top: -26px;
            }
            .hero .container {
                padding-top: 2rem !important;
                padding-bottom: 2.5rem !important;
            }
            .h4 {
                font-size: 1.1rem;
            }
            main > .container.py-5,
            main.py-5 {
                padding-top: 2rem !important;
                padding-bottom: 2rem !important;
            }
            .btn {
                font-size: 14px;
            }
            .h3 {
                font-size: 1.4rem;
            }
        </style>
        <style data-ajuste="2">
            .container {
                max-width: 1220px;
            }
            .site-header {
                min-height: 74px;
            }
            .site-header .navbar {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
            }
            .site-header .brand-logo {
                height: 50px;
            }
            .site-header .brand-name {
                font-size: 16px;
            }
            .site-header .brand-sub {
                font-size: 10px;
            }
            .site-header .nav-link {
                font-size: 13px;
            }
            .site-header .btn-brand-outline {
                min-height: 34px;
                padding: 4px 12px;
                font-size: 13px;
            }
            @media (min-width: 992px) {
                .site-header .nav-link {
                    height: 74px;
                }
            }
            .display-5 {
                font-size: 1.8rem;
            }
            .h3 {
                font-size: 1.25rem;
            }
            .panel-head {
                padding: 14px 18px;
            }
            .panel-head h2 {
                font-size: 18px;
            }
            .icon-circle {
                width: 36px;
                height: 36px;
            }
            .table-lib thead th,
            .table-lib td {
                padding: 8px 12px;
                font-size: 13px;
            }
            main > .container.py-5,
            main.py-5 {
                padding-top: 1.75rem !important;
                padding-bottom: 1.75rem !important;
            }
        </style>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <!-- Iconos (set Lucide, trazo lineal) -->
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
            <symbol id="i-lock" viewBox="0 0 24 24">
                <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
            </symbol>
            <symbol id="i-info" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <path d="M12 16v-4" />
                <path d="M12 8h.01" />
            </symbol>
            <symbol id="i-clock" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <polyline points="12 6 12 12 16 14" />
            </symbol>
            <symbol id="i-bookmark" viewBox="0 0 24 24"><path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z" /></symbol>
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
                <path
                    d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"
                />
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
            <symbol id="i-chevron-right" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6" /></symbol>
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
            <symbol id="i-library" viewBox="0 0 24 24">
                <path d="m16 6 4 14" />
                <path d="M12 6v14" />
                <path d="M8 8v12" />
                <path d="M4 4v16" />
            </symbol>
            <symbol id="i-triangle-alert" viewBox="0 0 24 24">
                <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3" />
                <path d="M12 9v4" />
                <path d="M12 17h.01" />
            </symbol>
            <symbol id="i-smartphone" viewBox="0 0 24 24">
                <rect width="14" height="20" x="5" y="2" rx="2" ry="2" />
                <path d="M12 18h.01" />
            </symbol>
        </svg>

        <header class="site-header d-flex align-items-center">
            <nav class="navbar navbar-expand-lg py-2 w-100">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center gap-2 m-0" href="inicio_lector.php">
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
                            <li class="nav-item"><a class="nav-link" href="inicio_lector.php">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link active" href="catalogo.php" aria-current="page">Catálogo</a></li>
                            <li class="nav-item"><a class="nav-link" href="mi_cuenta.php">Mi cuenta</a></li>
                            <li class="nav-item"><a class="nav-link" href="ayuda.php">Ayuda</a></li>
                        </ul>

                        <div class="d-flex align-items-center gap-3 text-white">
                            <a href="mi_cuenta.php" class="position-relative text-white" aria-label="2 avisos nuevos">
                                <svg class="icon" style="width: 24px; height: 24px"><use href="#i-bell" /></svg>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger bell-badge"
                                    >2</span
                                >
                            </a>
                            <span class="d-flex align-items-center gap-2"
                                ><svg class="icon"><use href="#i-user" /></svg> [Nombre del lector]</span
                            >
                            <a href="index.php" class="btn btn-brand-outline"
                                ><svg class="icon"><use href="#i-log-out" /></svg> Cerrar sesión</a
                            >
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <main class="flex-grow-1">
            <div class="container py-4">
                <h1 class="page-title">Catálogo</h1>
                <p class="page-subtitle">Busca un libro y revisa si hay ejemplares disponibles.</p>

                <!-- Buscador y filtro -->
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

                    <div class="d-flex align-items-center flex-wrap gap-2 mt-3">
                        <span class="filter-label me-1">Disponibilidad</span>
                        <a href="catalogo.php?q=" class="filter-pill active">Todos</a>
                        <a href="catalogo.php?q=&disp=1" class="filter-pill">Solo disponibles</a>
                    </div>
                </form>

                <!-- Encabezado de la lista -->
                <div class="d-flex justify-content-between align-items-end flex-wrap gap-2 mb-3">
                    <h2 class="list-title">Libros del catálogo</h2>
                    <p class="list-count">Mostrando [N] libros, ordenados por título</p>
                </div>

                <!-- Tarjetas: al presionar una tarjeta se abre el detalle del libro -->
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
                    <div class="col">
                        <article class="book-card position-relative h-100">
                            <div class="book-card-cover cover-0" aria-hidden="true">[Título del libro]</div>

                            <h3 class="book-card-title">
                                <a href="detalle_libro.php?id=1" class="stretched-link"> [Título del libro] </a>
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
                                <a href="detalle_libro.php?id=2" class="stretched-link"> [Título del libro] </a>
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
                                <a href="detalle_libro.php?id=3" class="stretched-link"> [Título del libro] </a>
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
                                <a href="detalle_libro.php?id=4" class="stretched-link"> [Título del libro] </a>
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
                                <a href="detalle_libro.php?id=5" class="stretched-link"> [Título del libro] </a>
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
                                <a href="detalle_libro.php?id=6" class="stretched-link"> [Título del libro] </a>
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
                                <a href="detalle_libro.php?id=7" class="stretched-link"> [Título del libro] </a>
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
                                <a href="detalle_libro.php?id=8" class="stretched-link"> [Título del libro] </a>
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
                                <a href="detalle_libro.php?id=9" class="stretched-link"> [Título del libro] </a>
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
                                <a href="detalle_libro.php?id=10" class="stretched-link"> [Título del libro] </a>
                            </h3>
                            <p class="book-card-author">[Autor]</p>

                            <span class="status-tag status-available">
                                <svg class="icon"><use href="#i-circle-check" /></svg> Disponible
                            </span>
                        </article>
                    </div>
                </div>

                <!-- Paginacion -->
                <nav class="pagination-nav d-flex justify-content-center mt-5 mb-3" aria-label="Paginas del catalogo">
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

        <!-- Pie de pagina -->
        <footer class="site-footer">© 2026 CBTa No. 5 · Biblioteca Escolar</footer>

        <script src="./js/bootstrap.bundle.min.js"></script>
    </body>
</html>
