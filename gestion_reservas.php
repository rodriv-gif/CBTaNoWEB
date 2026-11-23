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
                font-size: 14px;
                line-height: 1.5;
                color: var(--text-main);
                background-color: var(--gray-light);
            }
            .admin-layout {
                display: flex;
                min-height: 100vh;
                background: linear-gradient(to right, var(--green-main) 220px, transparent 220px);
            }
            .sidebar {
                width: 220px;
                flex-shrink: 0;
                background-color: var(--green-main);
                color: #fff;
                display: flex;
                flex-direction: column;
                position: sticky;
                top: 0;
                height: 100vh;
            }
            .sidebar-brand {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 14px 16px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.15);
                text-decoration: none;
                color: #fff;
            }
            .sidebar-brand img {
                height: 34px;
                width: auto;
            }
            .sidebar-brand .brand-name {
                font-weight: 600;
                font-size: 13px;
                line-height: 1.2;
                display: block;
            }
            .sidebar-brand .brand-sub {
                font-size: 10px;
                line-height: 1.2;
                display: block;
            }
            .sidebar-menu {
                list-style: none;
                margin: 0;
                padding: 0;
            }
            .sidebar-menu a {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 9px 18px;
                color: #fff;
                font-size: 13px;
                line-height: 1.25;
                text-decoration: none;
                border-left: 4px solid transparent;
            }
            .sidebar-menu a:hover {
                background-color: rgba(255, 255, 255, 0.1);
            }
            .sidebar-menu a.active {
                background-color: var(--green-medium);
                border-left-color: #fff;
            }
            .sidebar-menu a .chevron {
                margin-left: auto;
                width: 16px;
                height: 16px;
            }
            .sidebar-main {
                flex-grow: 1;
            }
            .user-card {
                display: flex;
                align-items: center;
                gap: 10px;
                margin: 0 12px 14px 12px;
                padding: 10px 12px;
                background-color: rgba(255, 255, 255, 0.08);
                border: 1px solid rgba(255, 255, 255, 0.18);
                border-radius: 10px;
            }
            .user-avatar {
                width: 32px;
                height: 32px;
                border-radius: 50%;
                background-color: var(--green-soft);
                color: var(--green-main);
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }
            .user-name {
                font-size: 12px;
                line-height: 1.2;
                font-weight: 500;
                display: block;
            }
            .user-role {
                font-size: 11px;
                line-height: 1.2;
                display: block;
                margin-top: 2px;
            }
            .sidebar-bottom {
                border-top: 1px solid rgba(255, 255, 255, 0.15);
                padding-top: 4px;
                margin-bottom: 8px;
            }
            .admin-main {
                flex-grow: 1;
                min-width: 0;
                padding: 36px 40px;
            }
            .admin-content {
                max-width: 1100px;
                margin: 0 auto;
            }
            .page-title {
                font-size: 28px;
                font-weight: 600;
                color: var(--green-main);
                margin: 0 0 6px 0;
            }
            .page-subtitle {
                color: var(--text-muted);
                font-size: 14px;
                margin: 0 0 22px 0;
            }
            @media (max-width: 991.98px) {
                .admin-layout {
                    flex-direction: column;
                    background: none;
                }
                .sidebar {
                    width: 100%;
                    height: auto;
                    position: static;
                }
                .admin-main {
                    padding: 28px 20px;
                }
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
                padding: 12px 20px;
                border-bottom: 0;
                white-space: nowrap;
            }
            .table-lib td {
                padding: 12px 20px;
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

            .pill {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 6px 18px;
                border: 1px solid var(--border-field);
                border-radius: 999px;
                background: #fff;
                color: var(--text-main);
                text-decoration: none;
                font-weight: 500;
            }
            .pill.active {
                background: var(--green-main);
                border-color: var(--green-main);
                color: #fff;
            }
            .detail-title {
                font-size: 12px;
                font-weight: 600;
                letter-spacing: 0.06em;
                text-transform: uppercase;
                color: var(--green-main);
                margin-bottom: 6px;
            }
            .detail dt {
                font-weight: 400;
                color: var(--text-muted);
            }
            .detail dd {
                margin-bottom: 4px;
            }
        </style>
        <style data-ajuste="2">
            .admin-layout {
                background: linear-gradient(to right, var(--green-main) 200px, transparent 200px);
            }
            .sidebar {
                width: 200px;
            }
            .sidebar-brand img {
                height: 38px;
            }
            .sidebar-menu a {
                padding: 8px 16px;
                font-size: 12.5px;
            }
            .admin-main {
                padding: 28px 32px;
            }
            .admin-content {
                max-width: 1360px;
            }
            .table-lib thead th,
            .table-lib td {
                padding: 10px 12px;
                font-size: 13px;
            }
            .page-title {
                font-size: 24px;
            }
            .page-subtitle {
                font-size: 13px;
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
            .btn-brand,
            .btn-outline-brand,
            .btn-brand-outline,
            .btn-danger-outline {
                min-height: 36px;
                padding: 6px 14px;
                font-size: 13px;
            }
        </style>
    </head>

    <body>
        <!-- Iconos (set Lucide, trazo lineal) -->
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
            <symbol id="i-clipboard-list" viewBox="0 0 24 24">
                <rect width="8" height="4" x="8" y="2" rx="1" ry="1" />
                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
                <path d="M12 11h4" />
                <path d="M12 16h4" />
                <path d="M8 11h.01" />
                <path d="M8 16h.01" />
            </symbol>
            <symbol id="i-book-open" viewBox="0 0 24 24">
                <path d="M12 7v14" />
                <path
                    d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"
                />
            </symbol>
            <symbol id="i-layout-dashboard" viewBox="0 0 24 24">
                <rect width="7" height="9" x="3" y="3" rx="1" />
                <rect width="7" height="5" x="14" y="3" rx="1" />
                <rect width="7" height="9" x="14" y="12" rx="1" />
                <rect width="7" height="5" x="3" y="16" rx="1" />
            </symbol>
            <symbol id="i-building" viewBox="0 0 24 24">
                <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z" />
                <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2" />
                <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2" />
                <path d="M10 6h4" />
                <path d="M10 10h4" />
                <path d="M10 14h4" />
                <path d="M10 18h4" />
            </symbol>
            <symbol id="i-lock" viewBox="0 0 24 24">
                <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
            </symbol>
            <symbol id="i-log-out" viewBox="0 0 24 24">
                <path d="m16 17 5-5-5-5" />
                <path d="M21 12H9" />
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
            </symbol>
            <symbol id="i-user" viewBox="0 0 24 24">
                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </symbol>
            <symbol id="i-chevron-right" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6" /></symbol>
            <symbol id="i-clock" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <polyline points="12 6 12 12 16 14" />
            </symbol>
            <symbol id="i-triangle-alert" viewBox="0 0 24 24">
                <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3" />
                <path d="M12 9v4" />
                <path d="M12 17h.01" />
            </symbol>
            <symbol id="i-bookmark" viewBox="0 0 24 24"><path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z" /></symbol>
            <symbol id="i-search" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.3-4.3" />
            </symbol>
            <symbol id="i-refresh" viewBox="0 0 24 24">
                <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8" />
                <path d="M21 3v5h-5" />
                <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16" />
                <path d="M8 16H3v5" />
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
            <symbol id="i-upload" viewBox="0 0 24 24">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                <path d="m17 8-5-5-5 5" />
                <path d="M12 3v12" />
            </symbol>
            <symbol id="i-file-text" viewBox="0 0 24 24">
                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                <path d="M10 9H8" />
                <path d="M16 13H8" />
                <path d="M16 17H8" />
            </symbol>
            <symbol id="i-id-card" viewBox="0 0 24 24">
                <path d="M16 10h2" />
                <path d="M16 14h2" />
                <path d="M6.17 15a3 3 0 0 1 5.66 0" />
                <circle cx="9" cy="11" r="2" />
                <rect x="2" y="5" width="20" height="14" rx="2" />
            </symbol>
        </svg>

        <div class="admin-layout">
            <!-- Menu lateral del bibliotecario -->
            <aside class="sidebar">
                <a href="panel_control.php" class="sidebar-brand">
                    <img src="./img/logo-cbta5-blanco.png" alt="Logotipo del CBTa No. 5" />
                    <span>
                        <span class="brand-name">Biblioteca Escolar</span>
                        <span class="brand-sub">CBTa No. 5 · Huejutla, Hgo.</span>
                    </span>
                </a>

                <div class="sidebar-main">
                    <ul class="sidebar-menu">
                        <li>
                            <a href="gestion_reservas.php" class="active" aria-current="page"
                                ><svg class="icon"><use href="#i-clipboard-list" /></svg> Gestión de reservas</a
                            >
                        </li>
                        <li>
                            <a href="publicacion_catalogo.php"
                                ><svg class="icon"><use href="#i-book-open" /></svg> Publicación en catálogo</a
                            >
                        </li>
                        <li>
                            <a href="panel_control.php"
                                ><svg class="icon"><use href="#i-layout-dashboard" /></svg> Panel de control</a
                            >
                        </li>
                        <li>
                            <a href="datos_biblioteca.php"
                                ><svg class="icon"><use href="#i-building" /></svg> Datos de la biblioteca
                                <svg class="icon chevron"><use href="#i-chevron-right" /></svg
                            ></a>
                        </li>
                    </ul>
                </div>

                <div class="user-card">
                    <div class="user-avatar">
                        <svg class="icon"><use href="#i-user" /></svg>
                    </div>
                    <div>
                        <span class="user-name">[Nombre completo]</span>
                        <span class="user-role">Bibliotecario</span>
                    </div>
                </div>

                <ul class="sidebar-menu sidebar-bottom">
                    <li>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal"
                            ><svg class="icon"><use href="#i-lock" /></svg> Cambiar contraseña</a
                        >
                    </li>
                    <li>
                        <a href="index.php"
                            ><svg class="icon"><use href="#i-log-out" /></svg> Cerrar sesión</a
                        >
                    </li>
                </ul>
            </aside>

            <main class="admin-main">
                <div class="admin-content">
                    <h1 class="page-title">Gestión de reservas</h1>
                    <p class="page-subtitle">Atiende a los lectores que llegan por su libro y confirma el préstamo.</p>

                    <form action="" method="get" class="panel d-flex align-items-center gap-2 p-2 mb-3">
                        <svg class="icon ms-2 text-secondary" style="width: 22px; height: 22px"><use href="#i-search" /></svg>
                        <input
                            type="search"
                            class="form-control border-0 shadow-none"
                            placeholder="Busca por matrícula o clave, nombre, título del libro o clave del ejemplar"
                            aria-label="Buscar reserva"
                        />
                        <button type="submit" class="btn btn-brand">Buscar</button>
                    </form>

                    <ul class="nav gap-2 mb-3">
                        <li>
                            <a href="#" class="pill active"
                                >Activas <span class="badge rounded-pill" style="background: rgba(255, 255, 255, 0.25)">6</span></a
                            >
                        </li>
                        <li><a href="#" class="pill">Confirmadas</a></li>
                        <li><a href="#" class="pill">Vencidas</a></li>
                        <li><a href="#" class="pill">Canceladas</a></li>
                    </ul>

                    <div class="row g-4">
                        <div class="col-xl-8">
                            <section class="panel overflow-hidden">
                                <div class="d-flex justify-content-between align-items-center px-4 py-3">
                                    <h2 class="h5 fw-semibold mb-0">Reservas activas</h2>
                                    <span class="small text-secondary">Ordenadas por fecha límite</span>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-lib">
                                        <thead>
                                            <tr>
                                                <th>Lector</th>
                                                <th>Libro</th>
                                                <th>Reservada</th>
                                                <th>Fecha límite</th>
                                                <th>Tiempo restante</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="row-selected">
                                                <td>[Nombre del lector]<span class="sub">[Matrícula o clave] · Alumno</span></td>
                                                <td>[Título del libro]<span class="sub">Ejemplar [clave]</span></td>
                                                <td>31/10/2026<span class="sub">10:15</span></td>
                                                <td>02/11/2026</td>
                                                <td class="text-amber fw-semibold">Quedan 5 h</td>
                                            </tr>
                                            <tr>
                                                <td>[Nombre del lector]<span class="sub">[Matrícula o clave] · Trabajador</span></td>
                                                <td>[Título del libro]<span class="sub">Ejemplar [clave]</span></td>
                                                <td>31/10/2026<span class="sub">10:15</span></td>
                                                <td>02/11/2026</td>
                                                <td class="text-amber fw-semibold">Queda 1 día</td>
                                            </tr>
                                            <tr>
                                                <td>[Nombre del lector]<span class="sub">[Matrícula o clave] · Alumno</span></td>
                                                <td>[Título del libro]<span class="sub">Ejemplar [clave]</span></td>
                                                <td>31/10/2026<span class="sub">10:15</span></td>
                                                <td>03/11/2026</td>
                                                <td class="">Quedan 2 días</td>
                                            </tr>
                                            <tr>
                                                <td>[Nombre del lector]<span class="sub">[Matrícula o clave] · Alumno</span></td>
                                                <td>[Título del libro]<span class="sub">Ejemplar [clave]</span></td>
                                                <td>31/10/2026<span class="sub">10:15</span></td>
                                                <td>04/11/2026</td>
                                                <td class="">Quedan 3 días</td>
                                            </tr>
                                            <tr>
                                                <td>[Nombre del lector]<span class="sub">[Matrícula o clave] · Trabajador</span></td>
                                                <td>[Título del libro]<span class="sub">Ejemplar [clave]</span></td>
                                                <td>31/10/2026<span class="sub">10:15</span></td>
                                                <td>05/11/2026</td>
                                                <td class="">Quedan 4 días</td>
                                            </tr>
                                            <tr>
                                                <td>[Nombre del lector]<span class="sub">[Matrícula o clave] · Alumno</span></td>
                                                <td>[Título del libro]<span class="sub">Ejemplar [clave]</span></td>
                                                <td>31/10/2026<span class="sub">10:15</span></td>
                                                <td>06/11/2026</td>
                                                <td class="">Quedan 5 días</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>

                        <div class="col-xl-4">
                            <section class="panel overflow-hidden">
                                <div
                                    class="d-flex justify-content-between align-items-center px-4 py-3"
                                    style="background: var(--gray-light)"
                                >
                                    <h2 class="h5 fw-semibold mb-0">Detalle de la reserva</h2>
                                    <span class="tag tag-blue"
                                        ><svg class="icon"><use href="#i-bookmark" /></svg> Activa</span
                                    >
                                </div>
                                <div class="p-4">
                                    <p class="detail-title">Lector</p>
                                    <dl class="row detail mb-3">
                                        <dt class="col-5">Nombre</dt>
                                        <dd class="col-7">[Nombre del lector]</dd>
                                        <dt class="col-5">Matrícula o clave</dt>
                                        <dd class="col-7">[Matrícula o clave]</dd>
                                        <dt class="col-5">Tipo de usuario</dt>
                                        <dd class="col-7">Alumno</dd>
                                        <dt class="col-5">Carrera</dt>
                                        <dd class="col-7">[Carrera]</dd>
                                    </dl>
                                    <p class="detail-title">Libro</p>
                                    <dl class="row detail mb-3">
                                        <dt class="col-5">Título</dt>
                                        <dd class="col-7">[Título del libro]</dd>
                                        <dt class="col-5">Autor</dt>
                                        <dd class="col-7">[Autor]</dd>
                                        <dt class="col-5">Clave del ejemplar</dt>
                                        <dd class="col-7">[Clave del ejemplar]</dd>
                                    </dl>
                                    <p class="detail-title">Reserva</p>
                                    <dl class="row detail mb-3">
                                        <dt class="col-5">Fecha y hora</dt>
                                        <dd class="col-7">31/10/2026, 10:15</dd>
                                        <dt class="col-5">Fecha límite para recogerla</dt>
                                        <dd class="col-7">02/11/2026 · <span class="text-amber fw-medium">quedan 5 h</span></dd>
                                    </dl>

                                    <div class="rounded-3 p-3 mb-3" style="background: var(--green-soft); border: 1px solid #bfd9cb">
                                        <p class="fw-semibold mb-2">Antes de confirmar</p>
                                        <p class="d-flex gap-2 mb-2">
                                            <svg class="icon mt-1"><use href="#i-file-text" /></svg> Verifica los datos contra el
                                            comprobante del lector.
                                        </p>
                                        <p class="d-flex gap-2 mb-2">
                                            <svg class="icon mt-1"><use href="#i-id-card" /></svg> Revisa la credencial (alumno) o el recibo
                                            (trabajador).
                                        </p>
                                        <p class="small text-secondary mb-0">Esta revisión es presencial y no se registra en el sistema.</p>
                                    </div>

                                    <button type="button" class="btn btn-brand w-100 py-2">
                                        <svg class="icon"><use href="#i-circle-check" /></svg> Confirmar préstamo
                                    </button>
                                    <p class="small text-secondary text-center mt-2 mb-0">
                                        La fecha límite de devolución se calcula al confirmar, según el tipo de usuario.
                                    </p>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </main>
        </div>

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
