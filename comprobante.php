<?php
require "includes/sesion.php";
exigir_lector();
$pagina_activa = "mi_cuenta.php";
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Comprobante de reserva - Biblioteca Escolar CBTa No. 5</title>

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
            .container {
                max-width: 1140px;
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
        <link rel="stylesheet" href="./css/footer.css" />
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

        <?php include "includes/header_lector.php"; ?>

        <main class="flex-grow-1 py-5">
            <div class="container" style="max-width: 720px">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3 d-print-none">
                    <a href="mi_cuenta.php" class="link-arrow"
                        ><svg class="icon" style="transform: rotate(180deg)"><use href="#i-arrow-right" /></svg> Volver a Mi cuenta</a
                    >
                    <button type="button" class="btn btn-brand" onclick="window.print()">
                        <svg class="icon"><use href="#i-printer" /></svg> Imprimir o guardar en PDF
                    </button>
                </div>

                <article class="panel p-4 p-md-5">
                    <div class="d-flex align-items-center gap-3 pb-3 mb-4 border-bottom">
                        <img src="./img/logo-cbta5.png" alt="Logotipo del CBTa No. 5" style="height: 64px; width: auto" />
                        <div>
                            <p class="fw-semibold mb-0 fs-5">Biblioteca Escolar</p>
                            <p class="small text-secondary mb-0">CBTa No. 5 · Huejutla, Hgo.</p>
                        </div>
                    </div>

                    <h1 class="h3 fw-semibold mb-1" style="color: var(--green-main)">Comprobante de reserva</h1>
                    <p class="text-secondary">Presenta este comprobante en la biblioteca para recoger tu libro.</p>

                    <div class="rounded-3 text-center py-3 my-4" style="background: var(--green-soft)">
                        <span class="small text-secondary d-block">Folio de la reserva</span>
                        <strong class="fs-2" style="color: var(--green-main)">[Folio]</strong>
                    </div>

                    <dl class="row mb-4">
                        <dt class="col-sm-4 text-secondary fw-normal">Lector</dt>
                        <dd class="col-sm-8">[Nombre del lector]</dd>
                        <dt class="col-sm-4 text-secondary fw-normal">Matrícula o clave</dt>
                        <dd class="col-sm-8">[Matrícula o clave]</dd>
                        <dt class="col-sm-4 text-secondary fw-normal">Libro</dt>
                        <dd class="col-sm-8">[Título del libro]</dd>
                        <dt class="col-sm-4 text-secondary fw-normal">Autor</dt>
                        <dd class="col-sm-8">[Autor]</dd>
                        <dt class="col-sm-4 text-secondary fw-normal">Clave del ejemplar</dt>
                        <dd class="col-sm-8">[Clave del ejemplar]</dd>
                        <dt class="col-sm-4 text-secondary fw-normal">Fecha y hora de reserva</dt>
                        <dd class="col-sm-8">31/10/2026, 10:15</dd>
                        <dt class="col-sm-4 text-secondary fw-normal">Fecha límite para recogerla</dt>
                        <dd class="col-sm-8 fw-semibold">02/11/2026</dd>
                    </dl>

                    <p class="d-flex gap-2 small text-secondary border-top pt-3 mb-0">
                        <svg class="icon mt-1"><use href="#i-info" /></svg> La reserva no es un préstamo. El préstamo se registra cuando
                        recoges el libro en la biblioteca. Si no lo recoges a tiempo, la reserva vence.
                    </p>
                </article>
            </div>
        </main>

        <?php include "includes/footer.php"; ?>

        <script src="./js/bootstrap.bundle.min.js"></script>
    </body>
</html>
