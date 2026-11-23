<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Detalle del libro - Biblioteca Escolar</title>

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
            .book-hero {
                position: relative;
                background-color: var(--green-dark);
                color: #ffffff;
                padding: 20px 0 110px 0;
                overflow: hidden;
            }
            .back-link {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                color: #ffffff;
                font-size: 14px;
                font-weight: 500;
                text-decoration: none;
            }
            .back-link:hover {
                text-decoration: underline;
                color: #ffffff;
            }
            .back-link .icon {
                width: 18px;
                height: 18px;
            }

            .book-cover {
                position: relative;
                width: 200px;
                height: 300px;
                border-radius: 4px 8px 8px 4px;
                background-color: var(--green-main);
                box-shadow: 8px 8px 24px rgba(0, 0, 0, 0.35);
                padding: 24px 20px 20px 36px;
                display: flex;
                flex-direction: column;
                flex-shrink: 0;
            }
            .book-cover::before {
                content: "";
                position: absolute;
                left: 0;
                top: 0;
                bottom: 0;
                width: 16px;
                background-color: var(--green-dark);
                border-radius: 4px 0 0 4px;
                opacity: 0.55;
            }
            .book-cover .cover-top {
                font-size: 10px;
                font-weight: 600;
                letter-spacing: 0.12em;
                text-transform: uppercase;
            }
            .book-cover .cover-title {
                font-size: 20px;
                font-weight: 600;
                line-height: 1.25;
                margin-top: auto;
            }
            .book-cover .cover-line {
                width: 40px;
                height: 3px;
                background-color: #b0a06e;
                margin: 12px 0 auto 0;
            }
            .book-cover .cover-author {
                font-size: 12px;
                margin-top: auto;
            }
            .book-cover img {
                position: absolute;
                right: 14px;
                bottom: 14px;
                height: 36px;
                width: auto;
            }

            .book-category {
                display: inline-block;
                padding: 4px 14px;
                border-radius: 999px;
                background-color: var(--green-soft);
                color: var(--green-main);
                font-size: 13px;
                font-weight: 500;
            }
            .book-hero h1 {
                font-size: 36px;
                font-weight: 700;
                line-height: 1.2;
                margin: 14px 0 4px 0;
            }
            .book-hero .author {
                font-size: 18px;
                margin: 0 0 20px 0;
            }

            .status-tag {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 4px 14px;
                border-radius: 999px;
                font-size: 13px;
                font-weight: 500;
            }
            .status-tag .icon {
                width: 16px;
                height: 16px;
            }
            .status-available {
                color: var(--green-success);
                background-color: var(--green-soft);
            }
            .status-unavailable {
                color: #475467;
                background-color: #f2f4f7;
            }

            .hero-books {
                position: absolute;
                left: 0;
                bottom: 0;
                width: 100%;
                height: 82px;
            }

            .section-heading {
                font-size: 22px;
                border-left: 4px solid var(--green-main);
                padding-left: 12px;
                margin: 0 0 16px 0;
            }
            .info-card {
                background-color: #ffffff;
                border: 1px solid var(--border-card);
                border-radius: 12px;
                padding: 24px;
                box-shadow: 0 1px 3px rgba(16, 24, 40, 0.06);
            }
            .info-card h2 {
                font-size: 18px;
                margin: 0 0 16px 0;
            }
            .info-list {
                list-style: none;
                margin: 0;
                padding: 0;
            }
            .info-list li {
                display: flex;
                align-items: flex-start;
                gap: 12px;
                margin-bottom: 14px;
                font-size: 14px;
            }
            .info-list li:last-child {
                margin-bottom: 0;
            }
            .info-list .icon {
                color: var(--green-main);
                margin-top: 2px;
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
            <!-- Banner del libro -->
            <section class="book-hero">
                <div class="container">
                    <a href="catalogo.php" class="back-link">
                        <svg class="icon"><use href="#i-arrow-left" /></svg> Volver al catálogo
                    </a>

                    <div class="row align-items-center g-4 mt-2">
                        <div class="col-md-4 col-lg-3">
                            <div class="book-cover">
                                <span class="cover-top">Biblioteca del CBTa No. 5</span>
                                <span class="cover-title">[Título del libro]</span>
                                <span class="cover-line"></span>
                                <span class="cover-author">[Autor]</span>
                                <img src="./img/logo-cbta5-blanco.png" alt="" />
                            </div>
                        </div>

                        <div class="col-md-8 col-lg-9">
                            <span class="book-category">[Área o especialidad]</span>
                            <h1>[Título del libro]</h1>
                            <p class="author">[Autor]</p>

                            <div class="d-flex align-items-center flex-wrap gap-3 mb-4">
                                <span class="status-tag status-available">
                                    <svg class="icon"><use href="#i-circle-check" /></svg> Disponible
                                </span>
                                <span><strong class="fs-5">[N]</strong> ejemplares disponibles</span>
                            </div>

                            <a href="catalogo.php" class="btn btn-header">
                                <svg class="icon"><use href="#i-arrow-left" /></svg> Volver al catálogo
                            </a>
                            <p class="mt-3 mb-0">Las reservas se hacen desde la app móvil con tu cuenta.</p>
                        </div>
                    </div>
                </div>

                <!-- Libros decorativos del banner -->
                <svg class="hero-books" viewBox="0 0 1440 82" preserveAspectRatio="none" aria-hidden="true">
                    <rect x="0" y="42" width="22" height="40" fill="#1F6B47" />
                    <rect x="24" y="29" width="29" height="53" fill="#2E7D58" />
                    <rect x="55" y="16" width="36" height="66" fill="#C5D8CE" />
                    <rect x="93" y="41" width="25" height="41" fill="#B0A06E" />
                    <rect x="120" y="28" width="32" height="54" fill="#2E7D58" />
                    <rect x="154" y="15" width="39" height="67" fill="#8A4B14" />
                    <rect x="195" y="40" width="28" height="42" fill="#1F6B47" />
                    <rect x="225" y="27" width="35" height="55" fill="#A8C4B4" />
                    <rect x="262" y="14" width="24" height="68" fill="#1F6B47" />
                    <rect x="288" y="39" width="31" height="43" fill="#2E7D58" />
                    <rect x="321" y="26" width="38" height="56" fill="#C5D8CE" />
                    <rect x="361" y="13" width="27" height="69" fill="#B0A06E" />
                    <rect x="390" y="38" width="34" height="44" fill="#2E7D58" />
                    <rect x="426" y="25" width="23" height="57" fill="#8A4B14" />
                    <rect x="451" y="12" width="30" height="70" fill="#1F6B47" />
                    <rect x="483" y="37" width="37" height="45" fill="#A8C4B4" />
                    <rect x="522" y="24" width="26" height="58" fill="#1F6B47" />
                    <rect x="550" y="11" width="33" height="71" fill="#2E7D58" />
                    <rect x="585" y="36" width="22" height="46" fill="#C5D8CE" />
                    <rect x="609" y="23" width="29" height="59" fill="#B0A06E" />
                    <rect x="640" y="10" width="36" height="72" fill="#2E7D58" />
                    <rect x="678" y="35" width="25" height="47" fill="#8A4B14" />
                    <rect x="705" y="22" width="32" height="60" fill="#1F6B47" />
                    <rect x="739" y="9" width="39" height="73" fill="#A8C4B4" />
                    <rect x="780" y="34" width="28" height="48" fill="#1F6B47" />
                    <rect x="810" y="21" width="35" height="61" fill="#2E7D58" />
                    <rect x="847" y="8" width="24" height="74" fill="#C5D8CE" />
                    <rect x="873" y="33" width="31" height="49" fill="#B0A06E" />
                    <rect x="906" y="20" width="38" height="62" fill="#2E7D58" />
                    <rect x="946" y="7" width="27" height="75" fill="#8A4B14" />
                    <rect x="975" y="32" width="34" height="50" fill="#1F6B47" />
                    <rect x="1011" y="19" width="23" height="63" fill="#A8C4B4" />
                    <rect x="1036" y="6" width="30" height="76" fill="#1F6B47" />
                    <rect x="1068" y="31" width="37" height="51" fill="#2E7D58" />
                    <rect x="1107" y="18" width="26" height="64" fill="#C5D8CE" />
                    <rect x="1135" y="5" width="33" height="77" fill="#B0A06E" />
                    <rect x="1170" y="30" width="22" height="52" fill="#2E7D58" />
                    <rect x="1194" y="17" width="29" height="65" fill="#8A4B14" />
                    <rect x="1225" y="42" width="36" height="40" fill="#1F6B47" />
                    <rect x="1263" y="29" width="25" height="53" fill="#A8C4B4" />
                    <rect x="1290" y="16" width="32" height="66" fill="#1F6B47" />
                    <rect x="1324" y="41" width="39" height="41" fill="#2E7D58" />
                    <rect x="1365" y="28" width="28" height="54" fill="#C5D8CE" />
                    <rect x="1395" y="15" width="35" height="67" fill="#B0A06E" />
                    <rect x="1432" y="40" width="24" height="42" fill="#2E7D58" />
                </svg>
            </section>

            <!-- Sinopsis y datos para reservar -->
            <section class="py-5">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-8">
                            <h2 class="section-heading">Sinopsis</h2>
                            <p>[Sinopsis del libro]</p>
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
                                        <span
                                            >Tienes un plazo para recoger el libro en la biblioteca. Si no lo recoges a tiempo, la reserva
                                            expira.</span
                                        >
                                    </li>
                                    <li>
                                        <svg class="icon"><use href="#i-library" /></svg>
                                        <span>Puedes tener hasta 3 libros al mismo tiempo.</span>
                                    </li>
                                    <li>
                                        <svg class="icon"><use href="#i-triangle-alert" /></svg>
                                        <span>Retraso en la devolución: adeudo de $10 por día.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Pie de pagina -->
        <footer class="site-footer">© 2026 CBTa No. 5 · Biblioteca Escolar</footer>

        <script src="./js/bootstrap.bundle.min.js"></script>
    </body>
</html>
