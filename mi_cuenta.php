<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Mi cuenta - Biblioteca Escolar CBTa No. 5</title>

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
                --red-soft: #fee4e2;
                --gray-light: #f5f7f6;
                --text-main: #212121;
                --text-muted: #4b5563;
                --border-card: #e5e7eb;
                --border-field: #d0d5dd;
            }
            body {
                font-family: "Poppins", "Segoe UI", Arial, sans-serif;
                font-size: 16px;
                line-height: 1.5;
                color: var(--text-main);
                background-color: var(--gray-light);
            }
            .site-header {
                background-color: var(--green-main);
                min-height: 82px;
            }
            .brand-logo {
                height: 50px;
                width: auto;
            }
            .brand-name {
                font-weight: 600;
                font-size: 18px;
                line-height: 1.2;
                color: #fff;
            }
            .brand-sub {
                font-size: 12px;
                line-height: 1.2;
                color: #fff;
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
            .bell-badge {
                font-size: 11px;
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
            .btn-brand,
            .btn-brand-outline,
            .btn-outline-brand,
            .btn-danger-outline {
                font-weight: 500;
                border-radius: 8px;
                padding: 8px 18px;
                min-height: 42px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                text-decoration: none;
            }
            .btn-brand {
                background-color: var(--green-main);
                color: #fff;
                border: 1.5px solid var(--green-main);
            }
            .btn-brand:hover {
                background-color: var(--green-medium);
                border-color: var(--green-medium);
                color: #fff;
            }
            .btn-outline-brand {
                background-color: #fff;
                color: var(--green-main);
                border: 1.5px solid var(--green-main);
            }
            .btn-outline-brand:hover {
                background-color: var(--green-soft);
                color: var(--green-main);
            }
            .btn-danger-outline {
                background-color: #fff;
                color: var(--red-alert);
                border: 1.5px solid var(--red-alert);
            }
            .btn-danger-outline:hover {
                background-color: var(--red-soft);
                color: var(--red-alert);
            }
            .btn-brand-outline {
                background-color: transparent;
                color: #fff;
                border: 1.5px solid #fff;
            }
            .btn-brand-outline:hover {
                background-color: rgba(255, 255, 255, 0.12);
                color: #fff;
            }
            .btn:focus-visible,
            a:focus-visible {
                outline: 3px solid var(--blue-accent);
                outline-offset: 2px;
            }
            .panel {
                background-color: #fff;
                border: 1px solid var(--border-card);
                border-radius: 12px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            }
            .panel-head {
                display: flex;
                align-items: center;
                gap: 14px;
                padding: 20px 24px;
            }
            .panel-head h2 {
                font-size: 24px;
                font-weight: 600;
                margin: 0;
            }
            .panel-head p {
                margin: 0;
                color: var(--text-muted);
                font-size: 15px;
            }
            .icon-circle {
                width: 48px;
                height: 48px;
                border-radius: 50%;
                background-color: var(--green-soft);
                color: var(--green-main);
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }
            .icon-circle.red {
                background-color: var(--red-soft);
                color: var(--red-alert);
            }
            .icon-circle.blue {
                background-color: #e0e7ff;
                color: var(--blue-accent);
            }
            .icon-circle.gray {
                background-color: #f2f4f7;
                color: var(--text-muted);
            }
            .tag {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 2px 12px;
                border-radius: 999px;
                font-size: 13px;
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
            .tag-blue {
                color: var(--blue-accent);
                background-color: #e0e7ff;
            }
            .tag-red {
                color: var(--red-alert);
                background-color: var(--red-soft);
            }
            .tag-new {
                color: #fff;
                background-color: var(--green-main);
                padding: 1px 10px;
                font-size: 12px;
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
            .table-lib {
                margin: 0;
                --bs-table-bg: transparent;
            }
            .table-lib thead th {
                background-color: var(--gray-light);
                font-weight: 600;
                font-size: 13px;
                padding: 12px 14px;
                border-bottom: 0;
                white-space: nowrap;
            }
            .table-lib td {
                padding: 12px 14px;
                vertical-align: middle;
                border-color: var(--border-card);
            }
            .table-lib .sub {
                color: var(--text-muted);
                font-size: 13px;
                display: block;
            }
            .table-lib tr.row-selected {
                --bs-table-bg: var(--green-soft);
            }
            .table-lib tr.row-selected > td:first-child,
            .table-lib tr.row-red > td:first-child {
                border-left: 4px solid var(--green-main);
            }
            .table-lib tr.row-red {
                --bs-table-bg: var(--red-soft);
            }
            .table-lib tr.row-red > td:first-child {
                border-left-color: var(--red-alert);
            }
            .text-red {
                color: var(--red-alert);
            }
            .text-amber {
                color: #92400e;
            }
            .text-green {
                color: var(--green-main);
            }
            .site-footer-strip {
                background-color: var(--green-dark);
                color: #fff;
                text-align: center;
                font-size: 14px;
                padding: 16px 0;
            }
            .container {
                max-width: 1140px;
            }
            .table-lib td {
                white-space: nowrap;
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
            <symbol id="i-book-open" viewBox="0 0 24 24">
                <path d="M12 7v14" />
                <path
                    d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"
                />
            </symbol>
            <symbol id="i-user" viewBox="0 0 24 24">
                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </symbol>
            <symbol id="i-clock" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <polyline points="12 6 12 12 16 14" />
            </symbol>
            <symbol id="i-bookmark" viewBox="0 0 24 24"><path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z" /></symbol>
            <symbol id="i-triangle-alert" viewBox="0 0 24 24">
                <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3" />
                <path d="M12 9v4" />
                <path d="M12 17h.01" />
            </symbol>
            <symbol id="i-bell" viewBox="0 0 24 24">
                <path d="M10.268 21a2 2 0 0 0 3.464 0" />
                <path
                    d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"
                />
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
            <symbol id="i-lock" viewBox="0 0 24 24">
                <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
            </symbol>
            <symbol id="i-download" viewBox="0 0 24 24">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                <path d="m7 10 5 5 5-5" />
                <path d="M12 15V3" />
            </symbol>
            <symbol id="i-chevron-right" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6" /></symbol>
            <symbol id="i-info" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <path d="M12 16v-4" />
                <path d="M12 8h.01" />
            </symbol>
            <symbol id="i-coins" viewBox="0 0 24 24">
                <circle cx="8" cy="8" r="6" />
                <path d="M18.09 10.37A6 6 0 1 1 10.34 18" />
                <path d="M7 6h1v4" />
                <path d="m16.71 13.88.7.71-2.82 2.82" />
            </symbol>
            <symbol id="i-file-text" viewBox="0 0 24 24">
                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                <path d="M10 9H8" />
                <path d="M16 13H8" />
                <path d="M16 17H8" />
            </symbol>
            <symbol id="i-printer" viewBox="0 0 24 24">
                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6" />
                <rect x="6" y="14" width="12" height="8" rx="1" />
            </symbol>
            <symbol id="i-calendar" viewBox="0 0 24 24">
                <path d="M8 2v4" />
                <path d="M16 2v4" />
                <rect width="18" height="18" x="3" y="4" rx="2" />
                <path d="M3 10h18" />
                <path d="m9 16 2 2 4-4" />
            </symbol>
            <symbol id="i-circle-help" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                <path d="M12 17h.01" />
            </symbol>
            <symbol id="i-life-buoy" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <path d="m4.93 4.93 4.24 4.24" />
                <path d="m14.83 9.17 4.24-4.24" />
                <path d="m14.83 14.83 4.24 4.24" />
                <path d="m9.17 14.83-4.24 4.24" />
                <circle cx="12" cy="12" r="4" />
            </symbol>
            <symbol id="i-mail" viewBox="0 0 24 24">
                <rect width="20" height="16" x="2" y="4" rx="2" />
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
            </symbol>
            <symbol id="i-search" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.3-4.3" />
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
                            <li class="nav-item"><a class="nav-link" href="catalogo.php">Catálogo</a></li>
                            <li class="nav-item"><a class="nav-link active" href="mi_cuenta.php" aria-current="page">Mi cuenta</a></li>
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

        <main class="flex-grow-1 py-5">
            <div class="container">
                <div class="d-flex flex-wrap align-items-end justify-content-between gap-3 mb-4">
                    <div>
                        <h1 class="display-6 fw-semibold mb-1" style="color: var(--green-main)">Mi cuenta</h1>
                        <p class="text-secondary mb-0 fs-5">Revisa tus préstamos, reservas, adeudos y avisos en un solo lugar.</p>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <button type="button" class="btn-outline-brand btn" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                            <svg class="icon"><use href="#i-lock" /></svg> Cambiar contraseña
                        </button>
                        <span class="tag tag-ok">Alumno</span>
                        <span class="tag" style="background: #f2f4f7; color: var(--text-muted)">[Carrera]</span>
                    </div>
                </div>

                <!-- Resumen -->
                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="panel p-3 h-100">
                            <div class="d-flex align-items-center gap-2">
                                <div class="icon-circle">
                                    <svg class="icon"><use href="#i-clock" /></svg>
                                </div>
                                <h2 class="h6 mb-0 fw-semibold">Préstamos activos</h2>
                            </div>
                            <p class="display-6 fw-bold mt-3 mb-0 text-green">2</p>
                            <p class="text-secondary mb-2">1 vencido</p>
                            <a href="#prestamos" class="link-arrow"
                                >Ver mis préstamos <svg class="icon"><use href="#i-chevron-right" /></svg
                            ></a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="panel p-3 h-100">
                            <div class="d-flex align-items-center gap-2">
                                <div class="icon-circle">
                                    <svg class="icon"><use href="#i-bookmark" /></svg>
                                </div>
                                <h2 class="h6 mb-0 fw-semibold">Reservas activas</h2>
                            </div>
                            <p class="display-6 fw-bold mt-3 mb-0 text-green">2</p>
                            <p class="text-secondary mb-2">Recógelas a tiempo</p>
                            <a href="#reservas" class="link-arrow"
                                >Ver mis reservas <svg class="icon"><use href="#i-chevron-right" /></svg
                            ></a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="panel p-3 h-100">
                            <div class="d-flex align-items-center gap-2">
                                <div class="icon-circle red">
                                    <svg class="icon"><use href="#i-triangle-alert" /></svg>
                                </div>
                                <h2 class="h6 mb-0 fw-semibold">Adeudos</h2>
                            </div>
                            <p class="display-6 fw-bold mt-3 mb-0 text-red">$20</p>
                            <p class="text-secondary mb-2">Multas pendientes</p>
                            <a href="#adeudos" class="link-arrow"
                                >Ver mis adeudos <svg class="icon"><use href="#i-chevron-right" /></svg
                            ></a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="panel p-3 h-100">
                            <div class="d-flex align-items-center gap-2">
                                <div class="icon-circle">
                                    <svg class="icon"><use href="#i-bell" /></svg>
                                </div>
                                <h2 class="h6 mb-0 fw-semibold">Avisos nuevos</h2>
                            </div>
                            <p class="display-6 fw-bold mt-3 mb-0 text-green">2</p>
                            <p class="text-secondary mb-2">Sin leer</p>
                            <a href="#avisos" class="link-arrow"
                                >Ver mis avisos <svg class="icon"><use href="#i-chevron-right" /></svg
                            ></a>
                        </div>
                    </div>
                </div>

                <!-- Mis préstamos -->
                <section class="panel mb-4 overflow-hidden" id="prestamos">
                    <div class="panel-head">
                        <div class="icon-circle">
                            <svg class="icon"><use href="#i-clock" /></svg>
                        </div>
                        <div>
                            <h2>Mis préstamos</h2>
                            <p>Libros que tienes en préstamo.</p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-lib">
                            <thead>
                                <tr>
                                    <th>Libro</th>
                                    <th>Fecha de préstamo</th>
                                    <th>Fecha límite</th>
                                    <th>Días restantes</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>[Título del libro]<span class="sub">Ejemplar [clave]</span></td>
                                    <td>28/10/2026</td>
                                    <td>04/11/2026</td>
                                    <td>Faltan 3 días</td>
                                    <td>
                                        <span class="tag tag-ok"
                                            ><svg class="icon"><use href="#i-circle-check" /></svg> Activo</span
                                        >
                                    </td>
                                </tr>
                                <tr class="row-red">
                                    <td>[Título del libro]<span class="sub">Ejemplar [clave]</span></td>
                                    <td>23/10/2026</td>
                                    <td>30/10/2026</td>
                                    <td class="text-red fw-medium">
                                        2 días de retraso<span class="sub text-red">Multa acumulada: $20</span>
                                    </td>
                                    <td>
                                        <span class="tag tag-red"
                                            ><svg class="icon"><use href="#i-triangle-alert" /></svg> Vencido</span
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Mis reservas -->
                <section class="panel mb-4 overflow-hidden" id="reservas">
                    <div class="panel-head">
                        <div class="icon-circle">
                            <svg class="icon"><use href="#i-bookmark" /></svg>
                        </div>
                        <div>
                            <h2>Mis reservas</h2>
                            <p>Recoge tu libro en la biblioteca antes de la fecha límite.</p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-lib">
                            <thead>
                                <tr>
                                    <th>Libro</th>
                                    <th>Estado</th>
                                    <th>Fecha límite para recogerla</th>
                                    <th>Tiempo restante</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>[Título del libro]<span class="sub">Ejemplar [clave]</span></td>
                                    <td>
                                        <span class="tag tag-blue"
                                            ><svg class="icon"><use href="#i-bookmark" /></svg> Activa</span
                                        >
                                    </td>
                                    <td>03/11/2026</td>
                                    <td>Quedan 2 días</td>
                                    <td class="text-end text-nowrap">
                                        <a href="comprobante.php" class="btn btn-outline-brand btn-sm"
                                            ><svg class="icon"><use href="#i-download" /></svg> Descargar comprobante</a
                                        >
                                        <a href="#" class="btn btn-danger-outline btn-sm">Cancelar reserva</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>[Título del libro]<span class="sub">Ejemplar [clave]</span></td>
                                    <td>
                                        <span class="tag tag-blue"
                                            ><svg class="icon"><use href="#i-bookmark" /></svg> Activa</span
                                        >
                                    </td>
                                    <td>02/11/2026</td>
                                    <td class="text-amber fw-semibold">Queda 1 día</td>
                                    <td class="text-end text-nowrap">
                                        <a href="comprobante.php" class="btn btn-outline-brand btn-sm"
                                            ><svg class="icon"><use href="#i-download" /></svg> Descargar comprobante</a
                                        >
                                        <a href="#" class="btn btn-danger-outline btn-sm">Cancelar reserva</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <div class="row g-4">
                    <!-- Mis adeudos -->
                    <div class="col-lg-6" id="adeudos">
                        <section class="panel h-100 overflow-hidden">
                            <div class="panel-head">
                                <div class="icon-circle">
                                    <svg class="icon"><use href="#i-coins" /></svg>
                                </div>
                                <div>
                                    <h2>Mis adeudos</h2>
                                    <p>Multas y reposiciones pendientes.</p>
                                </div>
                            </div>
                            <table class="table table-lib">
                                <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Libro</th>
                                        <th class="text-end">Monto o ejemplar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Multa por retraso</td>
                                        <td>[Título del libro]</td>
                                        <td class="text-end fw-semibold">$20</td>
                                    </tr>
                                    <tr>
                                        <td>Reposición pendiente</td>
                                        <td>[Título del libro]</td>
                                        <td class="text-end">Ejemplar [clave]</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div
                                class="d-flex justify-content-between align-items-center px-4 py-3 fs-5"
                                style="background: var(--red-soft)"
                            >
                                <span>Total de multas pendientes</span><strong class="text-red fs-4">$20</strong>
                            </div>
                            <p class="d-flex align-items-center gap-2 small text-secondary px-4 py-3 mb-0">
                                <svg class="icon"><use href="#i-info" /></svg> Los adeudos se liquidan de forma presencial en la biblioteca.
                            </p>
                        </section>
                    </div>

                    <!-- Mis avisos -->
                    <div class="col-lg-6" id="avisos">
                        <section class="panel h-100 overflow-hidden">
                            <div class="panel-head">
                                <div class="icon-circle">
                                    <svg class="icon"><use href="#i-bell" /></svg>
                                </div>
                                <div>
                                    <h2>Mis avisos</h2>
                                    <p>Del más reciente al más antiguo.</p>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex gap-3 px-4 py-3"
                                    style="background: var(--green-soft); border-left: 4px solid var(--green-main)"
                                >
                                    <div class="icon-circle gray">
                                        <svg class="icon"><use href="#i-clock" /></svg>
                                    </div>
                                    <div class="flex-grow-1">
                                        <strong class="fs-5">Préstamo por vencer</strong> <span class="tag tag-new ms-1">Nuevo</span
                                        ><br /><span class="text-secondary">Tu préstamo de [Título del libro] vence pronto.</span>
                                    </div>
                                    <span class="text-secondary small">01/11/2026</span>
                                </li>
                                <li
                                    class="list-group-item d-flex gap-3 px-4 py-3"
                                    style="background: var(--green-soft); border-left: 4px solid var(--green-main)"
                                >
                                    <div class="icon-circle gray">
                                        <svg class="icon"><use href="#i-bookmark" /></svg>
                                    </div>
                                    <div class="flex-grow-1">
                                        <strong class="fs-5">Reserva registrada</strong> <span class="tag tag-new ms-1">Nuevo</span
                                        ><br /><span class="text-secondary">Tu reserva de [Título del libro] quedó registrada.</span>
                                    </div>
                                    <span class="text-secondary small">31/10/2026</span>
                                </li>
                                <li class="list-group-item d-flex gap-3 px-4 py-3">
                                    <div class="icon-circle gray">
                                        <svg class="icon"><use href="#i-circle-x" /></svg>
                                    </div>
                                    <div class="flex-grow-1">
                                        <strong class="fs-5">Reserva cancelada</strong><br /><span class="text-secondary"
                                            >Cancelaste tu reserva de [Título del libro].</span
                                        >
                                    </div>
                                    <span class="text-secondary small">28/10/2026</span>
                                </li>
                            </ul>
                        </section>
                    </div>
                </div>
            </div>
        </main>

        <footer class="site-footer-strip">© 2026 CBTa No. 5 · Biblioteca Escolar</footer>

        <!-- Ventana: Cambiar contraseña (se abre desde "Cambiar contraseña") -->
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
            <symbol id="pw-lock" viewBox="0 0 24 24">
                <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
            </symbol>
            <symbol id="pw-eye" viewBox="0 0 24 24">
                <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                <circle cx="12" cy="12" r="3" />
            </symbol>
            <symbol id="pw-eye-off" viewBox="0 0 24 24">
                <path d="M10.733 5.076a10.744 10.744 0 0 1 11.205 6.575 1 1 0 0 1 0 .696 10.747 10.747 0 0 1-1.444 2.49" />
                <path d="M14.084 14.158a3 3 0 0 1-4.242-4.242" />
                <path d="M17.479 17.499a10.75 10.75 0 0 1-15.417-5.151 1 1 0 0 1 0-.696 10.75 10.75 0 0 1 4.446-5.143" />
                <path d="m2 2 20 20" />
            </symbol>
        </svg>
        <style>
            .pw-icon {
                width: 20px;
                height: 20px;
                fill: none;
                stroke: currentColor;
                stroke-width: 1.75;
                stroke-linecap: round;
                stroke-linejoin: round;
            }
            .pw-circle {
                width: 52px;
                height: 52px;
                border-radius: 50%;
                background-color: #e6f4ec;
                color: #0f5132;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }
            .pw-group {
                position: relative;
            }
            .pw-group .pw-left {
                position: absolute;
                left: 14px;
                top: 50%;
                transform: translateY(-50%);
                color: #4b5563;
            }
            .pw-group .form-control {
                height: 48px;
                padding-left: 44px;
                padding-right: 46px;
                border-color: #d0d5dd;
                border-radius: 8px;
            }
            .pw-group .form-control:focus {
                border-color: #2e7d58;
                box-shadow: 0 0 0 3px rgba(46, 125, 88, 0.2);
            }
            .pw-group .pw-toggle {
                position: absolute;
                right: 6px;
                top: 50%;
                transform: translateY(-50%);
                border: 0;
                background: transparent;
                color: #4b5563;
                padding: 8px;
            }
        </style>
        <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 480px">
                <div class="modal-content border-0 rounded-4">
                    <form action="" method="post" class="modal-body p-4">
                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="pw-circle">
                                <svg class="pw-icon"><use href="#pw-lock" /></svg>
                            </div>
                            <div class="flex-grow-1">
                                <h2 id="changePasswordTitle" class="h4 fw-semibold mb-1" style="color: #0f5132">Cambiar contraseña</h2>
                                <p class="mb-0 small" style="color: #4b5563">Escribe tu contraseña actual y elige una nueva.</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>

                        <div class="mb-3">
                            <label for="pwActual" class="form-label fw-medium">Contraseña actual</label>
                            <div class="pw-group">
                                <svg class="pw-icon pw-left"><use href="#pw-lock" /></svg>
                                <input
                                    type="password"
                                    id="pwActual"
                                    class="form-control"
                                    placeholder="Escribe tu contraseña actual"
                                    autocomplete="current-password"
                                    required
                                />
                                <button type="button" class="pw-toggle" data-target="pwActual" aria-label="Mostrar contraseña">
                                    <svg class="pw-icon"><use href="#pw-eye" /></svg>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="pwNueva" class="form-label fw-medium">Contraseña nueva</label>
                            <div class="pw-group">
                                <svg class="pw-icon pw-left"><use href="#pw-lock" /></svg>
                                <input
                                    type="password"
                                    id="pwNueva"
                                    class="form-control"
                                    placeholder="Escribe tu contraseña nueva"
                                    minlength="8"
                                    autocomplete="new-password"
                                    required
                                />
                                <button type="button" class="pw-toggle" data-target="pwNueva" aria-label="Mostrar contraseña">
                                    <svg class="pw-icon"><use href="#pw-eye" /></svg>
                                </button>
                            </div>
                            <div class="form-text">Mínimo 8 caracteres.</div>
                        </div>

                        <div class="mb-4">
                            <label for="pwConfirmar" class="form-label fw-medium">Confirmar contraseña nueva</label>
                            <div class="pw-group">
                                <svg class="pw-icon pw-left"><use href="#pw-lock" /></svg>
                                <input
                                    type="password"
                                    id="pwConfirmar"
                                    class="form-control"
                                    placeholder="Repite tu contraseña nueva"
                                    minlength="8"
                                    autocomplete="new-password"
                                    required
                                />
                                <button type="button" class="pw-toggle" data-target="pwConfirmar" aria-label="Mostrar contraseña">
                                    <svg class="pw-icon"><use href="#pw-eye" /></svg>
                                </button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn px-4 text-white fw-medium" style="background-color: #0f5132">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            // mostrar u ocultar la contraseña
            document.querySelectorAll(".pw-toggle").forEach(function (b) {
                b.addEventListener("click", function () {
                    var campo = document.getElementById(b.dataset.target);
                    var visible = campo.type === "text";
                    campo.type = visible ? "password" : "text";
                    b.querySelector("use").setAttribute("href", visible ? "#pw-eye" : "#pw-eye-off");
                });
            });
        </script>

        <script src="./js/bootstrap.bundle.min.js"></script>
    </body>
</html>
