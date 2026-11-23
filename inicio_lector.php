<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Inicio - Biblioteca Escolar CBTa No. 5</title>

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
                --gray-light: #f5f7f6;
                --text-main: #212121;
                --text-muted: #4b5563;
                --border-card: #e5e7eb;
            }

            body {
                font-family: "Poppins", "Segoe UI", Arial, sans-serif;
                font-size: 14px;
                line-height: 1.5;
                color: var(--text-main);
                background-color: var(--gray-light);
            }

            .container {
                max-width: 1220px;
            }
            .display-5 {
                font-size: 1.8rem;
            }
            .h3 {
                font-size: 1.25rem;
            }
            .h4 {
                font-size: 1.1rem;
            }
            .btn {
                font-size: 14px;
            }

            .icon {
                width: 18px;
                height: 18px;
                fill: none;
                stroke: currentColor;
                stroke-width: 1.75;
                stroke-linecap: round;
                stroke-linejoin: round;
                flex-shrink: 0;
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
                color: #fff;
            }
            .site-header .brand-sub {
                font-size: 10px;
                line-height: 1.2;
                color: #fff;
            }
            .site-header .nav-link {
                color: #fff;
                font-size: 13px;
                font-weight: 500;
                padding: 8px 14px;
            }
            .site-header .nav-link.active,
            .site-header .nav-link:hover,
            .site-header .nav-link:focus {
                color: #fff;
                font-weight: 600;
            }
            .site-header .btn-brand-outline {
                font-weight: 500;
                border-radius: 8px;
                padding: 4px 12px;
                min-height: 34px;
                font-size: 13px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                text-decoration: none;
                background-color: transparent;
                color: #fff;
                border: 1.5px solid #fff;
            }
            .site-header .btn-brand-outline:hover {
                background-color: rgba(255, 255, 255, 0.12);
                color: #fff;
            }
            .bell-badge {
                font-size: 11px;
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
                    border-bottom-color: #fff;
                }
            }
            .btn:focus-visible,
            a:focus-visible {
                outline: 3px solid var(--blue-accent);
                outline-offset: 2px;
            }

            /* ---------- Contenido ---------- */
            .hero {
                background-color: var(--green-dark);
                padding-bottom: 30px;
            }
            .hero .container {
                padding-top: 2rem !important;
                padding-bottom: 2.5rem !important;
            }
            .hero-books {
                position: absolute;
                left: 0;
                bottom: 0;
                width: 100%;
                height: 58px;
            }

            .panel {
                background-color: #fff;
                border: 1px solid var(--border-card);
                border-radius: 12px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            }
            .summary-strip {
                margin-top: -26px;
                position: relative;
                z-index: 2;
                font-size: 14px;
            }
            .icon-circle {
                width: 36px;
                height: 36px;
                border-radius: 50%;
                background-color: var(--green-soft);
                color: var(--green-main);
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }
            .tag {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 2px 12px;
                border-radius: 999px;
                font-size: 12px;
                font-weight: 500;
                white-space: nowrap;
            }
            .tag .icon {
                width: 16px;
                height: 16px;
            }
            .tag-ok {
                color: var(--green-success);
                background-color: var(--green-soft);
            }
            .tag-off {
                color: #475467;
                background-color: #f2f4f7;
            }
            .link-arrow {
                color: var(--blue-accent);
                font-weight: 500;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 6px;
            }
            .link-arrow:hover {
                text-decoration: underline;
            }
            .link-arrow .icon {
                width: 16px;
                height: 16px;
            }
            .cover {
                aspect-ratio: 3 / 4;
                border-radius: 8px;
                padding: 12px;
                font-weight: 500;
            }

            /* ---------- Pie de página ---------- */
            .site-footer-strip {
                background-color: var(--green-dark);
                color: #fff;
                text-align: center;
                font-size: 14px;
                padding: 16px 0;
            }
        </style>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <!-- Iconos SVG usados en esta página -->
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
            <symbol id="i-book-open" viewBox="0 0 24 24">
                <path d="M12 7v14" />
                <path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z" />
            </symbol>
            <symbol id="i-user" viewBox="0 0 24 24">
                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </symbol>
            <symbol id="i-clock" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <polyline points="12 6 12 12 16 14" />
            </symbol>
            <symbol id="i-bookmark" viewBox="0 0 24 24">
                <path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z" />
            </symbol>
            <symbol id="i-triangle-alert" viewBox="0 0 24 24">
                <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3" />
                <path d="M12 9v4" />
                <path d="M12 17h.01" />
            </symbol>
            <symbol id="i-bell" viewBox="0 0 24 24">
                <path d="M10.268 21a2 2 0 0 0 3.464 0" />
                <path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326" />
            </symbol>
            <symbol id="i-arrow-right" viewBox="0 0 24 24">
                <path d="M5 12h14" />
                <path d="m12 5 7 7-7 7" />
            </symbol>
            <symbol id="i-circle-check" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <path d="m9 12 2 2 4-4" />
            </symbol>
            <symbol id="i-circle-x" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <path d="m15 9-6 6" />
                <path d="m9 9 6 6" />
            </symbol>
            <symbol id="i-map-pin" viewBox="0 0 24 24">
                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                <circle cx="12" cy="10" r="3" />
            </symbol>
            <symbol id="i-log-out" viewBox="0 0 24 24">
                <path d="m16 17 5-5-5-5" />
                <path d="M21 12H9" />
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
            </symbol>
        </svg>

        <header class="site-header d-flex align-items-center">
            <nav class="navbar navbar-expand-lg w-100">
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
                            <li class="nav-item"><a class="nav-link active" href="inicio_lector.php" aria-current="page">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="catalogo.php">Catálogo</a></li>
                            <li class="nav-item"><a class="nav-link" href="mi_cuenta.php">Mi cuenta</a></li>
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
                            <a href="index.php" class="btn btn-brand-outline">
                                <svg class="icon"><use href="#i-log-out" /></svg> Cerrar sesión
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <main class="flex-grow-1">
            <!-- Saludo -->
            <section class="hero position-relative text-white">
                <div class="container pt-5 pb-5">
                    <p class="small fw-medium text-uppercase mb-1" style="letter-spacing: 0.06em">Biblioteca del CBTa No. 5</p>
                    <h1 class="display-5 fw-semibold mb-3">Hola, [Nombre del lector]</h1>
                    <span class="tag tag-ok px-3 py-1">Alumno</span>
                    <span class="tag px-3 py-1" style="background: #f2f4f7; color: var(--text-muted)">[Carrera]</span>
                </div>
                <svg class="hero-books" viewBox="0 0 1440 58" preserveAspectRatio="none" aria-hidden="true">
                    <rect x="0" y="29" width="22" height="29" fill="#1F6B47" />
                    <rect x="24" y="16" width="29" height="42" fill="#2E7D58" />
                    <rect x="55" y="29" width="36" height="29" fill="#C5D8CE" />
                    <rect x="93" y="16" width="25" height="42" fill="#B0A06E" />
                    <rect x="120" y="29" width="32" height="29" fill="#2E7D58" />
                    <rect x="154" y="16" width="39" height="42" fill="#8A4B14" />
                    <rect x="195" y="29" width="28" height="29" fill="#1F6B47" />
                    <rect x="225" y="16" width="35" height="42" fill="#A8C4B4" />
                    <rect x="262" y="29" width="24" height="29" fill="#1F6B47" />
                    <rect x="288" y="16" width="31" height="42" fill="#2E7D58" />
                    <rect x="321" y="29" width="38" height="29" fill="#C5D8CE" />
                    <rect x="361" y="16" width="27" height="42" fill="#B0A06E" />
                    <rect x="390" y="29" width="34" height="29" fill="#2E7D58" />
                    <rect x="426" y="16" width="23" height="42" fill="#8A4B14" />
                    <rect x="451" y="29" width="30" height="29" fill="#1F6B47" />
                    <rect x="483" y="16" width="37" height="42" fill="#A8C4B4" />
                    <rect x="522" y="29" width="26" height="29" fill="#1F6B47" />
                    <rect x="550" y="16" width="33" height="42" fill="#2E7D58" />
                    <rect x="585" y="29" width="22" height="29" fill="#C5D8CE" />
                    <rect x="609" y="16" width="29" height="42" fill="#B0A06E" />
                    <rect x="640" y="29" width="36" height="29" fill="#2E7D58" />
                    <rect x="678" y="16" width="25" height="42" fill="#8A4B14" />
                    <rect x="705" y="29" width="32" height="29" fill="#1F6B47" />
                    <rect x="739" y="16" width="39" height="42" fill="#A8C4B4" />
                    <rect x="780" y="29" width="28" height="29" fill="#1F6B47" />
                    <rect x="810" y="16" width="35" height="42" fill="#2E7D58" />
                    <rect x="847" y="29" width="24" height="29" fill="#C5D8CE" />
                    <rect x="873" y="16" width="31" height="42" fill="#B0A06E" />
                    <rect x="906" y="29" width="38" height="29" fill="#2E7D58" />
                    <rect x="946" y="16" width="27" height="42" fill="#8A4B14" />
                    <rect x="975" y="29" width="34" height="29" fill="#1F6B47" />
                    <rect x="1011" y="16" width="23" height="42" fill="#A8C4B4" />
                    <rect x="1036" y="29" width="30" height="29" fill="#1F6B47" />
                    <rect x="1068" y="16" width="37" height="42" fill="#2E7D58" />
                    <rect x="1107" y="29" width="26" height="29" fill="#C5D8CE" />
                    <rect x="1135" y="16" width="33" height="42" fill="#B0A06E" />
                    <rect x="1170" y="29" width="22" height="29" fill="#2E7D58" />
                    <rect x="1194" y="16" width="29" height="42" fill="#8A4B14" />
                    <rect x="1225" y="29" width="36" height="29" fill="#1F6B47" />
                    <rect x="1263" y="16" width="25" height="42" fill="#A8C4B4" />
                    <rect x="1290" y="29" width="32" height="29" fill="#1F6B47" />
                    <rect x="1324" y="16" width="39" height="42" fill="#2E7D58" />
                    <rect x="1365" y="29" width="28" height="29" fill="#C5D8CE" />
                    <rect x="1395" y="16" width="35" height="42" fill="#B0A06E" />
                    <rect x="1432" y="29" width="24" height="29" fill="#2E7D58" />
                </svg>
            </section>

            <div class="container">
                <!-- Franja de resumen -->
                <div class="panel summary-strip d-flex flex-wrap align-items-center gap-3 gap-lg-4 px-4 py-3">
                    <span class="d-flex align-items-center gap-2">
                        <svg class="icon"><use href="#i-clock" /></svg> 1 préstamo activo
                    </span>
                    <span class="d-flex align-items-center gap-2">
                        <svg class="icon"><use href="#i-bookmark" /></svg> 1 reserva activa
                    </span>
                    <span class="d-flex align-items-center gap-2">
                        <svg class="icon"><use href="#i-triangle-alert" /></svg> Adeudo: $0
                    </span>
                    <span class="d-flex align-items-center gap-2">
                        <svg class="icon"><use href="#i-bell" /></svg> 2 avisos nuevos
                    </span>
                    <a href="mi_cuenta.php" class="link-arrow ms-auto">
                        Ir a Mi cuenta <svg class="icon"><use href="#i-arrow-right" /></svg>
                    </a>
                </div>

                <!-- Accesos -->
                <div class="row g-4 mt-1">
                    <div class="col-md-6 col-lg-4">
                        <div class="panel p-4 h-100 d-flex flex-column">
                            <div class="icon-circle">
                                <svg class="icon"><use href="#i-book-open" /></svg>
                            </div>
                            <h2 class="h4 mt-3 mb-2">Catálogo</h2>
                            <p class="text-secondary mb-4">
                                Busca por título, autor o especialidad y revisa si hay ejemplares disponibles.
                            </p>
                            <a href="catalogo.php" class="link-arrow mt-auto">
                                Explorar el catálogo <svg class="icon"><use href="#i-arrow-right" /></svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="panel p-4 h-100 d-flex flex-column">
                            <div class="icon-circle">
                                <svg class="icon"><use href="#i-user" /></svg>
                            </div>
                            <h2 class="h4 mt-3 mb-2">Mi cuenta</h2>
                            <p class="text-secondary mb-4">
                                Consulta tus préstamos, reservas, adeudos y avisos, y cancela una reserva si lo necesitas.
                            </p>
                            <a href="mi_cuenta.php" class="link-arrow mt-auto">
                                Ir a Mi cuenta <svg class="icon"><use href="#i-arrow-right" /></svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel p-4 h-100">
                            <h2 class="h5 mb-3">Hoy en la biblioteca</h2>
                            <span class="tag tag-ok">
                                <svg class="icon"><use href="#i-circle-check" /></svg> Abierta ahora
                            </span>
                            <p class="d-flex align-items-center gap-2 mt-3 mb-2 small">
                                <svg class="icon"><use href="#i-clock" /></svg> Lunes a viernes, 8:00 a 15:00
                            </p>
                            <p class="d-flex align-items-center gap-2 mb-3 small">
                                <svg class="icon"><use href="#i-map-pin" /></svg> CBTa No. 5, Huejutla, Hgo.
                            </p>
                            <p class="small text-secondary border-top pt-3 mb-0">Hasta 3 libros por préstamo. Retraso: $10 por día.</p>
                        </div>
                    </div>
                </div>

                <!-- Novedades del acervo -->
                <div class="d-flex align-items-center justify-content-between mt-5 mb-3">
                    <h2 class="h3 mb-0">Novedades del acervo</h2>
                    <a href="catalogo.php" class="link-arrow">
                        Ver todo el catálogo <svg class="icon"><use href="#i-arrow-right" /></svg>
                    </a>
                </div>
                <div class="row g-3 mb-5">
                    <div class="col-6 col-md-4 col-lg">
                        <a href="detalle_libro.php" class="panel d-block p-2 h-100 text-decoration-none text-reset">
                            <div
                                class="cover d-flex align-items-center justify-content-center text-white text-center"
                                style="background-color: var(--green-main)"
                            >
                                [Título del libro]
                            </div>
                            <div class="p-2">
                                <h3 class="h6 mb-1 mt-1">[Título del libro]</h3>
                                <p class="small text-secondary mb-2">[Autor]</p>
                                <span class="tag tag-ok">
                                    <svg class="icon"><use href="#i-circle-check" /></svg> Disponible
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg">
                        <a href="detalle_libro.php" class="panel d-block p-2 h-100 text-decoration-none text-reset">
                            <div
                                class="cover d-flex align-items-center justify-content-center text-white text-center"
                                style="background-color: var(--green-medium)"
                            >
                                [Título del libro]
                            </div>
                            <div class="p-2">
                                <h3 class="h6 mb-1 mt-1">[Título del libro]</h3>
                                <p class="small text-secondary mb-2">[Autor]</p>
                                <span class="tag tag-ok">
                                    <svg class="icon"><use href="#i-circle-check" /></svg> Disponible
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg">
                        <a href="detalle_libro.php" class="panel d-block p-2 h-100 text-decoration-none text-reset">
                            <div
                                class="cover d-flex align-items-center justify-content-center text-white text-center"
                                style="background-color: var(--green-main)"
                            >
                                [Título del libro]
                            </div>
                            <div class="p-2">
                                <h3 class="h6 mb-1 mt-1">[Título del libro]</h3>
                                <p class="small text-secondary mb-2">[Autor]</p>
                                <span class="tag tag-ok">
                                    <svg class="icon"><use href="#i-circle-check" /></svg> Disponible
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg">
                        <a href="detalle_libro.php" class="panel d-block p-2 h-100 text-decoration-none text-reset">
                            <div
                                class="cover d-flex align-items-center justify-content-center text-white text-center"
                                style="background-color: var(--green-medium)"
                            >
                                [Título del libro]
                            </div>
                            <div class="p-2">
                                <h3 class="h6 mb-1 mt-1">[Título del libro]</h3>
                                <p class="small text-secondary mb-2">[Autor]</p>
                                <span class="tag tag-off">
                                    <svg class="icon"><use href="#i-circle-x" /></svg> No disponible
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg">
                        <a href="detalle_libro.php" class="panel d-block p-2 h-100 text-decoration-none text-reset">
                            <div
                                class="cover d-flex align-items-center justify-content-center text-white text-center"
                                style="background-color: var(--green-main)"
                            >
                                [Título del libro]
                            </div>
                            <div class="p-2">
                                <h3 class="h6 mb-1 mt-1">[Título del libro]</h3>
                                <p class="small text-secondary mb-2">[Autor]</p>
                                <span class="tag tag-ok">
                                    <svg class="icon"><use href="#i-circle-check" /></svg> Disponible
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </main>

        <footer class="site-footer-strip">© 2026 CBTa No. 5 · Biblioteca Escolar</footer>

        <script src="./js/bootstrap.bundle.min.js"></script>
    </body>
</html>