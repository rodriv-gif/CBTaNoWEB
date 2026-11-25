<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Preguntas frecuentes - Datos de la biblioteca</title>

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

            .admin-layout {
                display: flex;
                min-height: 100vh;
            }

            /* ---------- Menu lateral ---------- */
            .sidebar {
                width: 220px;
                flex-shrink: 0;
                background-color: var(--green-main);
                color: #ffffff;
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
                color: #ffffff;
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
                color: #ffffff;
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
                border-left-color: #ffffff;
            }
            .sidebar-menu a:focus-visible {
                outline: 3px solid #ffffff;
                outline-offset: -3px;
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

            /* ---------- Contenido ---------- */
            .admin-main {
                flex-grow: 1;
                min-width: 0;
                padding: 36px 40px;
            }
            .admin-content {
                max-width: 1080px;
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

            .form-layout {
                display: grid;
                grid-template-columns: 1fr 390px;
                gap: 20px;
                align-items: start;
            }
            .form-column {
                display: flex;
                flex-direction: column;
                gap: 20px;
            }

            /* tarjetas */
            .form-card {
                background-color: #ffffff;
                border: 1px solid var(--border-card);
                border-radius: 12px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
                padding: 22px 24px;
            }

            .card-header-row {
                display: flex;
                align-items: center;
                gap: 12px;
                margin-bottom: 12px;
            }
            .card-header-row.has-subtitle {
                align-items: flex-start;
            }
            .card-icon {
                width: 30px;
                height: 30px;
                border-radius: 50%;
                background-color: var(--green-soft);
                color: var(--green-main);
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }
            .card-icon .icon {
                width: 16px;
                height: 16px;
            }
            .card-title {
                font-size: 16px;
                font-weight: 600;
                margin: 0;
                line-height: 1.3;
            }
            .card-subtitle {
                font-size: 13px;
                color: var(--text-muted);
                margin: 0;
            }

            /* campos */
            .field-label {
                font-size: 13px;
                font-weight: 500;
                margin-bottom: 5px;
                display: block;
            }
            .field-label .optional {
                font-weight: 400;
                color: var(--text-muted);
            }

            .form-control {
                height: 41px;
                border: 1px solid var(--border-field);
                border-radius: 8px;
                font-size: 14px;
                padding: 0 13px;
                color: var(--text-main);
            }
            textarea.form-control {
                height: auto;
                min-height: 80px;
                padding: 9px 13px;
                resize: vertical;
            }
            .form-control::placeholder {
                color: #6b7280;
            }
            .form-control:focus {
                border: 2px solid var(--blue-accent);
                box-shadow: none;
                padding-left: 11px;
            }
            textarea.form-control:focus {
                padding: 7px 11px;
            }

            .field-block {
                margin-bottom: 12px;
            }
            .field-block:last-child {
                margin-bottom: 0;
            }

            .group-label {
                font-size: 12px;
                font-weight: 700;
                letter-spacing: 0.04em;
                text-transform: uppercase;
                color: var(--green-main);
                margin: 0 0 8px 0;
            }

            /* interruptor de fin de semana */
            .toggle-row {
                display: flex;
                align-items: center;
                justify-content: space-between;
                height: 41px;
                padding: 0 13px;
                border: 1px solid var(--border-field);
                border-radius: 8px;
                font-size: 14px;
            }
            .switch {
                position: relative;
                width: 38px;
                height: 21px;
                flex-shrink: 0;
            }
            .switch input {
                opacity: 0;
                width: 100%;
                height: 100%;
                position: absolute;
                inset: 0;
                margin: 0;
                cursor: pointer;
                z-index: 1;
            }
            .switch-track {
                position: absolute;
                inset: 0;
                border-radius: 999px;
                background-color: #d0d5dd;
                transition: background-color 0.15s;
            }
            .switch-track::after {
                content: "";
                position: absolute;
                top: 3px;
                left: 3px;
                width: 15px;
                height: 15px;
                border-radius: 50%;
                background-color: #ffffff;
                transition: transform 0.15s;
            }
            .switch input:checked + .switch-track {
                background-color: var(--green-main);
            }
            .switch input:checked + .switch-track::after {
                transform: translateX(17px);
            }
            .switch input:focus-visible + .switch-track {
                outline: 3px solid var(--blue-accent);
                outline-offset: 2px;
            }

            .help-text {
                display: flex;
                align-items: flex-start;
                gap: 8px;
                color: var(--text-muted);
                font-size: 12px;
                margin: 10px 0 0 0;
                line-height: 1.45;
            }
            .help-text .icon {
                width: 13px;
                height: 13px;
                margin-top: 2px;
            }

            /* ultima actualizacion */
            .update-box {
                background-color: var(--green-soft);
                border: 1px solid #bfd9cb;
                border-radius: 12px;
                padding: 16px 20px;
            }
            .update-box .label {
                font-size: 12px;
                color: var(--text-muted);
                margin: 0;
            }
            .update-box .value {
                font-size: 14px;
                font-weight: 500;
                margin: 4px 0;
            }
            .update-box .note {
                font-size: 12px;
                color: var(--text-muted);
                margin: 0;
            }

            /* mensajes */
            .message-box {
                display: flex;
                align-items: flex-start;
                gap: 10px;
                border-radius: 8px;
                padding: 8px 12px;
                font-size: 13px;
                margin-bottom: 16px;
            }
            .message-error {
                background-color: var(--red-soft);
                color: var(--red-alert);
            }
            .message-success {
                background-color: var(--green-soft);
                color: var(--green-success);
            }
            .message-box ul {
                margin: 0;
                padding-left: 18px;
            }

            /* botones */
            .actions-row {
                display: flex;
                justify-content: flex-end;
                gap: 10px;
                margin-top: 20px;
            }
            .btn-primary-brand,
            .btn-secondary-brand {
                font-size: 14px;
                font-weight: 500;
                border-radius: 8px;
                min-height: 42px;
                padding: 6px 20px;
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
            .btn-primary-brand:focus-visible,
            .btn-secondary-brand:focus-visible {
                outline: 3px solid var(--blue-accent);
                outline-offset: 2px;
            }

            /* imagenes (logo e imagen principal) */
            .upload-row {
                display: flex;
                gap: 16px;
            }
            .upload-logo {
                width: 150px;
                flex-shrink: 0;
            }
            .upload-main {
                flex-grow: 1;
                min-width: 0;
            }
            .upload-preview {
                height: 120px;
                border: 1.5px dashed #d0d5dd;
                border-radius: 8px;
                background-color: var(--gray-light);
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
            }
            .upload-preview.on-white {
                background-color: #ffffff;
            }
            .upload-preview img {
                max-height: 90px;
                width: auto;
            }
            .upload-preview.cover img {
                max-height: none;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .btn-upload {
                display: inline-flex;
                align-items: center;
                gap: 7px;
                min-height: 34px;
                margin-top: 10px;
                padding: 0 12px;
                border: 1.5px solid var(--green-main);
                border-radius: 8px;
                background-color: #ffffff;
                color: var(--green-main);
                font-size: 13px;
                font-weight: 600;
                cursor: pointer;
            }
            .btn-upload:hover {
                background-color: var(--green-soft);
            }
            .btn-upload .icon {
                width: 15px;
                height: 15px;
            }
            .upload-input {
                position: absolute;
                width: 1px;
                height: 1px;
                opacity: 0;
            }
            .upload-input:focus-visible + .btn-upload {
                outline: 3px solid var(--blue-accent);
                outline-offset: 2px;
            }
            .file-name {
                display: block;
                font-size: 12px;
                color: var(--text-muted);
                margin-top: 6px;
            }

            /* listas que se pueden agregar y quitar */
            .repeat-row {
                border-top: 1px solid #e5e7eb;
                margin-top: 14px;
                padding-top: 12px;
            }
            .repeat-row:first-child {
                margin-top: 4px;
            }
            .row-head {
                display: flex;
                justify-content: space-between;
                align-items: center;
                min-height: 26px;
                margin-bottom: 8px;
            }
            .row-label {
                font-size: 12px;
                font-weight: 700;
                letter-spacing: 0.04em;
                text-transform: uppercase;
                color: var(--green-main);
            }
            .btn-delete {
                width: 30px;
                height: 30px;
                border: none;
                border-radius: 8px;
                background-color: #fff5f4;
                color: var(--red-alert);
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }
            .btn-delete:hover {
                background-color: var(--red-soft);
            }
            .btn-delete:focus-visible {
                outline: 3px solid var(--blue-accent);
            }
            .btn-add {
                display: inline-flex;
                align-items: center;
                gap: 7px;
                min-height: 36px;
                margin-top: 14px;
                padding: 0 14px;
                border: 1.5px dashed var(--green-medium);
                border-radius: 8px;
                background-color: #f5f7f6;
                color: var(--green-main);
                font-size: 13px;
                font-weight: 600;
            }
            .btn-add:hover {
                background-color: var(--green-soft);
            }
            .btn-add:focus-visible {
                outline: 3px solid var(--blue-accent);
                outline-offset: 2px;
            }
            .btn-add .icon {
                width: 15px;
                height: 15px;
            }
            .field-note {
                font-size: 12px;
                color: var(--text-muted);
                margin: 6px 0 0 0;
            }

            /* ---------- Submodulos del menu lateral ---------- */
            .sidebar-menu a.parent-active {
                border-left-color: #ffffff;
                font-weight: 600;
            }
            .sidebar-menu a .chevron {
                margin-left: auto;
                width: 16px;
                height: 16px;
            }
            .submenu {
                list-style: none;
                margin: 0;
                padding: 2px 0 8px 0;
                background-color: rgba(0, 0, 0, 0.14);
            }
            .submenu a {
                padding: 7px 18px 7px 46px;
                font-size: 12.5px;
            }
            .submenu a.active {
                background-color: var(--green-medium);
                border-left-color: #ffffff;
                font-weight: 500;
            }

            /* ---------- Encabezado de la pagina ---------- */
            .breadcrumb-line {
                font-size: 13px;
                color: var(--text-muted);
                display: flex;
                align-items: center;
                gap: 6px;
                margin-bottom: 8px;
                flex-wrap: wrap;
            }
            .breadcrumb-line a {
                color: var(--blue-accent);
                text-decoration: none;
            }
            .breadcrumb-line a:hover {
                text-decoration: underline;
            }
            .breadcrumb-line .icon {
                width: 13px;
                height: 13px;
            }

            /* tarjeta de ayuda (columna derecha) */
            .help-list {
                list-style: none;
                margin: 0;
                padding: 0;
            }
            .help-list li {
                display: flex;
                gap: 10px;
                font-size: 13px;
                color: var(--text-main);
                margin-bottom: 12px;
                line-height: 1.45;
            }
            .help-list li:last-child {
                margin-bottom: 0;
            }
            .help-list .icon {
                color: var(--green-main);
                margin-top: 2px;
                width: 16px;
                height: 16px;
            }

            /* imagenes apiladas dentro de la columna derecha */
            .upload-row.stacked {
                flex-direction: column;
                gap: 20px;
            }
            .upload-row.stacked .upload-logo {
                width: 100%;
            }
            .upload-row.stacked .upload-preview {
                height: 130px;
            }

            /* la columna verde del menu llega hasta abajo aunque la pagina sea larga */
            .admin-layout {
                background: linear-gradient(to right, var(--green-main) 220px, transparent 220px);
            }
            @media (max-width: 991.98px) {
                .admin-layout {
                    background: none;
                }
            }
            .form-layout.equal {
                grid-template-columns: 1fr 1fr;
            }
            @media (max-width: 991.98px) {
                .form-layout.equal {
                    grid-template-columns: 1fr;
                }
            }

            /* pantallas medianas y chicas: el menu pasa arriba */
            @media (max-width: 991.98px) {
                .admin-layout {
                    flex-direction: column;
                }
                .sidebar {
                    width: 100%;
                    height: auto;
                    position: static;
                }
                .admin-main {
                    padding: 28px 20px;
                }
                .form-layout {
                    grid-template-columns: 1fr;
                }
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
            <symbol id="i-target" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <circle cx="12" cy="12" r="6" />
                <circle cx="12" cy="12" r="2" />
            </symbol>
            <symbol id="i-map-pin" viewBox="0 0 24 24">
                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                <circle cx="12" cy="10" r="3" />
            </symbol>
            <symbol id="i-clock" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <polyline points="12 6 12 12 16 14" />
            </symbol>
            <symbol id="i-calendar" viewBox="0 0 24 24">
                <path d="M8 2v4" />
                <path d="M16 2v4" />
                <rect width="18" height="18" x="3" y="4" rx="2" />
                <path d="M3 10h18" />
                <path d="m9 16 2 2 4-4" />
            </symbol>
            <symbol id="i-info" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <path d="M12 16v-4" />
                <path d="M12 8h.01" />
            </symbol>
            <symbol id="i-circle-check" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <path d="m9 12 2 2 4-4" />
            </symbol>
            <symbol id="i-image" viewBox="0 0 24 24">
                <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                <circle cx="9" cy="9" r="2" />
                <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
            </symbol>
            <symbol id="i-upload" viewBox="0 0 24 24">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                <path d="m17 8-5-5-5 5" />
                <path d="M12 3v12" />
            </symbol>
            <symbol id="i-trash" viewBox="0 0 24 24">
                <path d="M3 6h18" />
                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                <path d="M10 11v6" />
                <path d="M14 11v6" />
            </symbol>
            <symbol id="i-plus" viewBox="0 0 24 24">
                <path d="M5 12h14" />
                <path d="M12 5v14" />
            </symbol>
            <symbol id="i-bell" viewBox="0 0 24 24">
                <path d="M3 20a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1Z" />
                <path d="M20 16a8 8 0 1 0-16 0" />
                <path d="M12 4v4" />
                <path d="M10 4h4" />
            </symbol>
            <symbol id="i-list-ordered" viewBox="0 0 24 24">
                <path d="M10 12h11" />
                <path d="M10 18h11" />
                <path d="M10 6h11" />
                <path d="M4 10h2" />
                <path d="M4 6h1v4" />
                <path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1" />
            </symbol>
            <symbol id="i-list-checks" viewBox="0 0 24 24">
                <path d="m3 17 2 2 4-4" />
                <path d="m3 7 2 2 4-4" />
                <path d="M13 6h8" />
                <path d="M13 12h8" />
                <path d="M13 18h8" />
            </symbol>
            <symbol id="i-circle-help" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                <path d="M12 17h.01" />
            </symbol>
            <symbol id="i-shield-check" viewBox="0 0 24 24">
                <path
                    d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"
                />
                <path d="m9 12 2 2 4-4" />
            </symbol>
            <symbol id="i-triangle-alert" viewBox="0 0 24 24">
                <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3" />
                <path d="M12 9v4" />
                <path d="M12 17h.01" />
            </symbol>
            <symbol id="i-chevron-down" viewBox="0 0 24 24"><path d="m6 9 6 6 6-6" /></symbol>
            <symbol id="i-chevron-right" viewBox="0 0 24 24"><path d="m9 18 6-6-6-6" /></symbol>
            <symbol id="i-school" viewBox="0 0 24 24">
                <path d="M14 22v-4a2 2 0 1 0-4 0v4" />
                <path d="m18 10 3.447 1.724a1 1 0 0 1 .553.894V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7.382a1 1 0 0 1 .553-.894L6 10" />
                <path d="M18 5v17" />
                <path d="m4 6 7.106-3.553a2 2 0 0 1 1.788 0L20 6" />
                <path d="M6 5v17" />
                <circle cx="12" cy="9" r="2" />
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
                            <a href="inventario_libros.php">
                                <svg class="icon"><use href="#i-clipboard-list" /></svg> Inventario de libros
                            </a>
                        </li>
                        <li>
                            <a href="publicacion_catalogo.php">
                                <svg class="icon"><use href="#i-book-open" /></svg> Publicación en catálogo
                            </a>
                        </li>
                        <li>
                            <a href="panel_control.php">
                                <svg class="icon"><use href="#i-layout-dashboard" /></svg> Panel de control
                            </a>
                        </li>
                        <li>
                            <a href="datos_biblioteca.php" class="parent-active">
                                <svg class="icon"><use href="#i-building" /></svg> Datos de la biblioteca
                                <svg class="icon chevron"><use href="#i-chevron-down" /></svg>
                            </a>
                            <ul class="submenu">
                                <li><a href="datos_biblioteca.php">Información general</a></li>
                                <li><a href="datos_biblioteca_horario.php">Horario y contacto</a></li>
                                <li><a href="datos_biblioteca_inicio.php">Contenido del inicio</a></li>
                                <li>
                                    <a href="datos_biblioteca_preguntas.php" class="active" aria-current="page">Preguntas frecuentes</a>
                                </li>
                                <li><a href="datos_biblioteca_politicas.php">Políticas del servicio</a></li>
                            </ul>
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
                        <a href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                            <svg class="icon"><use href="#i-lock" /></svg> Cambiar contraseña
                        </a>
                    </li>
                    <li>
                        <a href="index.php">
                            <svg class="icon"><use href="#i-log-out" /></svg> Cerrar sesión
                        </a>
                    </li>
                </ul>
            </aside>

            <!-- Contenido -->
            <main class="admin-main">
                <div class="admin-content">
                    <nav class="breadcrumb-line" aria-label="Ruta de navegación">
                        <a href="datos_biblioteca.php">Datos de la biblioteca</a>
                        <svg class="icon"><use href="#i-chevron-right" /></svg>
                        <span>Preguntas frecuentes</span>
                    </nav>
                    <h1 class="page-title">Preguntas frecuentes</h1>
                    <p class="page-subtitle">Agrega, edita o elimina las preguntas que se muestran al público.</p>

                    <!-- Mensajes -->

                    <form action="" method="POST">
                        <div class="form-layout">
                            <!-- Columna izquierda -->
                            <div class="form-column">
                                <section class="form-card">
                                    <div class="card-header-row has-subtitle">
                                        <div class="card-icon">
                                            <svg class="icon"><use href="#i-circle-help" /></svg>
                                        </div>
                                        <div>
                                            <h2 class="card-title">Preguntas y respuestas</h2>
                                            <p class="card-subtitle">Escribe cada pregunta con su respuesta.</p>
                                        </div>
                                    </div>

                                    <div id="lista-pregunta" data-list data-label="Pregunta">
                                        <div class="repeat-row">
                                            <div class="row-head">
                                                <span class="row-label">Pregunta 1</span>
                                                <button type="button" class="btn-delete" aria-label="Eliminar">
                                                    <svg class="icon"><use href="#i-trash" /></svg>
                                                </button>
                                            </div>
                                            <input
                                                type="text"
                                                name="pregunta_titulo[]"
                                                class="form-control mb-2"
                                                placeholder="[Pregunta frecuente]"
                                                value="[Pregunta frecuente]"
                                            />
                                            <textarea name="pregunta_contenido[]" class="form-control" rows="3" placeholder="[Respuesta]">
[Respuesta]</textarea
                                            >
                                        </div>
                                        <div class="repeat-row">
                                            <div class="row-head">
                                                <span class="row-label">Pregunta 2</span>
                                                <button type="button" class="btn-delete" aria-label="Eliminar">
                                                    <svg class="icon"><use href="#i-trash" /></svg>
                                                </button>
                                            </div>
                                            <input
                                                type="text"
                                                name="pregunta_titulo[]"
                                                class="form-control mb-2"
                                                placeholder="[Pregunta frecuente]"
                                                value="[Pregunta frecuente]"
                                            />
                                            <textarea name="pregunta_contenido[]" class="form-control" rows="3" placeholder="[Respuesta]">
[Respuesta]</textarea
                                            >
                                        </div>
                                        <div class="repeat-row">
                                            <div class="row-head">
                                                <span class="row-label">Pregunta 3</span>
                                                <button type="button" class="btn-delete" aria-label="Eliminar">
                                                    <svg class="icon"><use href="#i-trash" /></svg>
                                                </button>
                                            </div>
                                            <input
                                                type="text"
                                                name="pregunta_titulo[]"
                                                class="form-control mb-2"
                                                placeholder="[Pregunta frecuente]"
                                                value="[Pregunta frecuente]"
                                            />
                                            <textarea name="pregunta_contenido[]" class="form-control" rows="3" placeholder="[Respuesta]">
[Respuesta]</textarea
                                            >
                                        </div>
                                        <div class="repeat-row">
                                            <div class="row-head">
                                                <span class="row-label">Pregunta 4</span>
                                                <button type="button" class="btn-delete" aria-label="Eliminar">
                                                    <svg class="icon"><use href="#i-trash" /></svg>
                                                </button>
                                            </div>
                                            <input
                                                type="text"
                                                name="pregunta_titulo[]"
                                                class="form-control mb-2"
                                                placeholder="[Pregunta frecuente]"
                                                value="[Pregunta frecuente]"
                                            />
                                            <textarea name="pregunta_contenido[]" class="form-control" rows="3" placeholder="[Respuesta]">
[Respuesta]</textarea
                                            >
                                        </div>
                                    </div>
                                    <template id="tpl-lista-pregunta">
                                        <div class="repeat-row">
                                            <div class="row-head">
                                                <span class="row-label">Pregunta 0</span>
                                                <button type="button" class="btn-delete" aria-label="Eliminar">
                                                    <svg class="icon"><use href="#i-trash" /></svg>
                                                </button>
                                            </div>
                                            <input
                                                type="text"
                                                name="pregunta_titulo[]"
                                                class="form-control mb-2"
                                                placeholder="[Pregunta frecuente]"
                                                value=""
                                            />
                                            <textarea
                                                name="pregunta_contenido[]"
                                                class="form-control"
                                                rows="3"
                                                placeholder="[Respuesta]"
                                            ></textarea>
                                        </div>
                                    </template>

                                    <button type="button" class="btn-add" data-add="lista-pregunta">
                                        <svg class="icon"><use href="#i-plus" /></svg> Agregar pregunta
                                    </button>
                                </section>
                            </div>

                            <!-- Columna derecha -->
                            <div class="form-column">
                                <section class="form-card">
                                    <div class="card-header-row">
                                        <div class="card-icon">
                                            <svg class="icon"><use href="#i-info" /></svg>
                                        </div>
                                        <h2 class="card-title">Cómo se muestra</h2>
                                    </div>
                                    <ul class="help-list">
                                        <li>
                                            <svg class="icon"><use href="#i-info" /></svg
                                            ><span
                                                >En el inicio público se muestran solo las <strong>primeras 4</strong> preguntas de la
                                                lista.</span
                                            >
                                        </li>
                                        <li>
                                            <svg class="icon"><use href="#i-info" /></svg
                                            ><span>Todas las preguntas aparecen en la página «Preguntas frecuentes», con su buscador.</span>
                                        </li>
                                        <li>
                                            <svg class="icon"><use href="#i-info" /></svg
                                            ><span>Se muestran en el mismo orden en que las escribes aquí.</span>
                                        </li>
                                    </ul>
                                </section>

                                <!-- Ultima actualizacion -->
                                <div class="update-box">
                                    <p class="label">Última actualización</p>
                                    <p class="value">12/11/2026, 10:15 · [Nombre completo]</p>
                                    <p class="note">La fecha, la hora y el usuario lo registra el sistema al guardar.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="actions-row">
                            <a href="panel_control.php" class="btn btn-secondary-brand">Cancelar</a>
                            <button type="submit" class="btn btn-primary-brand">
                                <svg class="icon"><use href="#i-circle-check" /></svg> Guardar cambios
                            </button>
                        </div>
                    </form>
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
        <script>
            // numera de nuevo los renglones de una lista (Pregunta 1, Pregunta 2...)
            function numerarLista(lista) {
                lista.querySelectorAll(".row-label").forEach(function (etiqueta, i) {
                    etiqueta.textContent = lista.dataset.label + " " + (i + 1);
                });
            }

            // botones "Agregar": copian el renglon vacio de la plantilla
            document.querySelectorAll("[data-add]").forEach(function (boton) {
                boton.addEventListener("click", function () {
                    var lista = document.getElementById(boton.dataset.add);
                    var plantilla = document.getElementById("tpl-" + boton.dataset.add);
                    lista.appendChild(plantilla.content.cloneNode(true));
                    numerarLista(lista);
                });
            });

            // botones de borrar renglon
            document.addEventListener("click", function (evento) {
                var boton = evento.target.closest(".btn-delete");
                if (!boton) return;
                var lista = boton.closest("[data-list]");
                boton.closest(".repeat-row").remove();
                numerarLista(lista);
            });
        </script>
    </body>
</html>
