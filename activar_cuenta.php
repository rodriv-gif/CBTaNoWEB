<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Activar cuenta - Biblioteca Escolar CBTa No. 5</title>

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
                font-size: 16px;
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

            /* ---------- Botones ---------- */
            .btn-brand-outline,
            .btn-brand-light {
                font-weight: 500;
                border-radius: 8px;
                padding: 8px 20px;
                min-height: 44px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }
            .btn-brand-light {
                background-color: #ffffff;
                color: var(--green-main);
                border: 1.5px solid #ffffff;
            }
            .btn-brand-light:hover {
                background-color: var(--green-soft);
                color: var(--green-main);
            }
            .btn-brand-outline {
                background-color: transparent;
                color: #ffffff;
                border: 1.5px solid #ffffff;
            }
            .btn-brand-outline:hover {
                background-color: rgba(255, 255, 255, 0.12);
                color: #ffffff;
            }

            .btn-brand-light:focus-visible,
            .btn-brand-outline:focus-visible,
            .nav-link:focus-visible {
                outline: 3px solid var(--blue-accent);
                outline-offset: 2px;
            }

            /* boton primario del formulario */
            .btn-login {
                background-color: var(--green-main);
                color: #ffffff;
                border: none;
                border-radius: 8px;
                min-height: 44px;
                font-size: 15px;
                font-weight: 500;
                width: 100%;
            }
            .btn-login:hover {
                background-color: var(--green-medium);
                color: #ffffff;
            }
            .btn-login:active {
                background-color: var(--green-dark) !important;
                color: #ffffff;
            }
            .btn-login:focus-visible {
                outline: 3px solid var(--blue-accent);
                outline-offset: 2px;
            }

            /* ---------- Encabezado ---------- */
            .site-header {
                background-color: var(--green-main);
                min-height: 92px;
            }
            .brand-logo {
                height: 58px;
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

            @media (max-width: 991.98px) {
                .site-header .navbar-collapse {
                    padding-bottom: 12px;
                }
            }

            /* ---------- Panel izquierdo ---------- */
            .login-info {
                position: relative;
                background-color: var(--green-dark);
                color: #ffffff;
                padding: 110px 0 110px 0;
                overflow: hidden;
            }
            .login-info-content {
                max-width: 560px;
                padding: 0 28px 0 max(28px, calc((100vw - 1320px) / 2 + 12px));
            }

            .eyebrow {
                font-size: 12px;
                font-weight: 500;
                letter-spacing: 0.04em;
                text-transform: uppercase;
                margin: 0;
            }
            .info-title {
                font-size: clamp(1.8rem, 3.2vw, 2.4rem);
                line-height: 1.2;
                margin: 12px 0 18px 0;
            }
            .info-text {
                font-size: 16px;
                margin-bottom: 24px;
            }

            .check-list {
                list-style: none;
                margin: 0;
                padding: 0;
            }
            .check-list li {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 10px;
                font-size: 14px;
            }

            .login-books {
                position: absolute;
                left: 0;
                bottom: 0;
                width: 100%;
                height: 100px;
            }

            /* ---------- Panel derecho (formulario) ---------- */
            .login-panel {
                background-color: var(--gray-light);
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 32px 24px;
            }

            .login-card {
                width: 100%;
                max-width: 420px;
                background-color: #ffffff;
                border: 1px solid var(--border-card);
                border-radius: 12px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
                padding: 24px 32px;
            }

            /* pestañas */
            .login-tabs {
                display: flex;
                border-bottom: 1px solid var(--border-card);
                margin-bottom: 24px;
            }
            .login-tabs a {
                flex: 1;
                text-align: center;
                padding: 10px 0;
                font-size: 14px;
                font-weight: 500;
                text-decoration: none;
                color: var(--text-muted);
                border-bottom: 3px solid transparent;
                margin-bottom: -1px;
            }
            .login-tabs a.active {
                color: var(--green-main);
                border-bottom-color: var(--green-main);
            }
            .login-tabs a:not(.active):hover {
                background-color: var(--gray-light);
            }

            .login-title {
                font-size: 24px;
                color: var(--green-main);
                margin-bottom: 2px;
            }
            .login-subtitle {
                color: var(--text-muted);
                font-size: 14px;
                margin-bottom: 20px;
            }

            /* campos */
            .field-label {
                font-size: 13px;
                font-weight: 500;
                margin-bottom: 6px;
            }

            .field-group {
                position: relative;
            }
            .field-group .field-icon {
                position: absolute;
                left: 12px;
                top: 50%;
                transform: translateY(-50%);
                color: var(--text-muted);
                pointer-events: none;
            }
            .field-group .form-control {
                height: 44px;
                border: 1px solid var(--border-field);
                border-radius: 8px;
                padding-left: 42px;
                font-size: 14px;
            }
            .field-group .form-control::placeholder {
                color: #6b7280;
            }
            .field-group .form-control:focus {
                border: 2px solid var(--blue-accent);
                box-shadow: none;
                padding-left: 41px;
            }

            .toggle-password {
                position: absolute;
                right: 6px;
                top: 50%;
                transform: translateY(-50%);
                background: none;
                border: none;
                color: var(--text-muted);
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 8px;
            }
            .toggle-password:hover {
                background-color: var(--gray-light);
            }
            .toggle-password:focus-visible {
                outline: 3px solid var(--blue-accent);
            }

            /* mensaje de error */
            .error-box {
                display: flex;
                align-items: center;
                gap: 10px;
                background-color: var(--red-soft);
                color: var(--red-alert);
                border-radius: 8px;
                padding: 8px 12px;
                font-size: 13px;
                margin-bottom: 16px;
            }

            .forgot-link {
                display: block;
                text-align: right;
                font-size: 13px;
                font-weight: 500;
                color: var(--blue-accent);
                text-decoration: none;
                margin-top: 8px;
            }
            .forgot-link:hover {
                text-decoration: underline;
            }
            .forgot-link:focus-visible {
                outline: 3px solid var(--blue-accent);
                outline-offset: 2px;
            }

            .login-footer-text {
                text-align: center;
                font-size: 13px;
                color: var(--text-muted);
                margin: 16px 0 0 0;
            }
            .login-footer-text a {
                color: var(--blue-accent);
                font-weight: 500;
                text-decoration: none;
            }
            .login-footer-text a:hover {
                text-decoration: underline;
            }

            .login-note {
                margin: 16px 0 0 0;
                padding-top: 14px;
                border-top: 1px solid var(--border-card);
                text-align: center;
                font-size: 12px;
                color: var(--text-muted);
            }

            /* pie de pagina */
            .site-footer {
                background-color: var(--green-dark);
                color: #ffffff;
                text-align: center;
                font-size: 14px;
                padding: 16px 0;
            }

            /* ---------- Pantallas de cuenta (registro y recuperar contraseña) ---------- */
            .back-link {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                font-size: 13px;
                font-weight: 500;
                color: var(--blue-accent);
                text-decoration: none;
                margin-bottom: 16px;
            }
            .back-link:hover {
                text-decoration: underline;
            }
            .back-link .icon {
                width: 16px;
                height: 16px;
            }

            .state-icon {
                width: 52px;
                height: 52px;
                border-radius: 50%;
                background-color: var(--green-soft);
                color: var(--green-main);
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 14px;
            }
            .state-icon .icon {
                width: 24px;
                height: 24px;
            }
            .state-icon.state-ok {
                color: var(--green-success);
            }
            .state-icon.state-error {
                background-color: var(--red-soft);
                color: var(--red-alert);
            }

            .login-subtitle strong {
                color: var(--text-main);
                font-weight: 600;
            }

            .tip-box {
                display: flex;
                gap: 10px;
                background-color: var(--green-soft);
                color: var(--green-main);
                border-radius: 8px;
                padding: 12px 14px;
                font-size: 13px;
                margin-bottom: 16px;
            }
            .tip-box .icon {
                width: 18px;
                height: 18px;
                margin-top: 1px;
            }

            /* pregunta de seguridad del lector */
            .question-box {
                background-color: var(--gray-light);
                border: 1px solid var(--border-card);
                border-radius: 8px;
                padding: 12px 14px;
                margin-bottom: 16px;
            }
            .question-box .label {
                font-size: 12px;
                font-weight: 700;
                letter-spacing: 0.04em;
                text-transform: uppercase;
                color: var(--green-main);
                margin: 0 0 4px 0;
            }
            .question-box .text {
                font-size: 15px;
                font-weight: 500;
                margin: 0;
            }

            .field-group select.form-control {
                height: 44px;
                border: 1px solid var(--border-field);
                border-radius: 8px;
                padding-left: 42px;
                font-size: 14px;
            }
            .field-group select.form-control:focus {
                border: 2px solid var(--blue-accent);
                box-shadow: none;
                padding-left: 41px;
            }

            .link-center {
                display: block;
                text-align: center;
                font-size: 14px;
                font-weight: 500;
                color: var(--blue-accent);
                text-decoration: none;
                margin-top: 16px;
            }
            .link-center:hover {
                text-decoration: underline;
            }
            .field-hint {
                font-size: 12px;
                color: var(--text-muted);
                margin: 6px 0 0 0;
            }

            @media (max-width: 575.98px) {
                .login-card {
                    padding: 24px 20px;
                }
                .login-info {
                    padding: 32px 0 100px 0;
                }
            }
        </style>
        <style data-ajuste="2">
            .container {
                max-width: 1260px;
            }
            .site-header {
                min-height: 76px;
            }
            .site-header .brand-logo,
            .brand-logo {
                height: 52px;
            }
            .brand-name {
                font-size: 16px;
            }
            .brand-sub {
                font-size: 11px;
            }
            .site-header .nav-link {
                font-size: 13px;
                padding: 6px 10px;
            }
            .site-header .btn {
                min-height: 36px;
                padding: 5px 14px;
                font-size: 13px;
            }
            .btn-brand,
            .btn-brand-light,
            .btn-brand-outline {
                min-height: 38px;
                font-size: 14px;
            }
            .hero {
                padding: 40px 0 90px 0;
            }
            .hero-title {
                font-size: clamp(1.8rem, 3.6vw, 2.4rem);
            }
            .hero-text {
                font-size: 15px;
            }
            .hero-books {
                height: 64px;
            }
            .today-card {
                padding: 20px;
            }
            .section-block {
                padding: 44px 0;
            }
            .section-title {
                font-size: 24px;
            }
            .section-subtitle {
                font-size: 14px;
            }
            .info-card {
                padding: 20px;
            }
            .icon-circle {
                width: 44px;
                height: 44px;
            }
            .step-number {
                width: 38px;
                height: 38px;
            }
            .cta-band {
                padding: 32px 0;
            }
            .site-footer {
                padding: 32px 0 0 0;
            }
            .footer-logo {
                height: 50px;
            }
            .login-info {
                padding: 64px 0;
            }
            .login-info-content {
                padding-left: max(28px, calc((100vw - 1260px) / 2 + 12px));
            }
            .info-title {
                font-size: clamp(1.6rem, 2.8vw, 2.1rem);
            }
            .info-text {
                font-size: 15px;
            }
        </style>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <!-- Iconos (set Lucide, trazo lineal) -->
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
            <symbol id="i-circle-check" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <path d="m9 12 2 2 4-4" />
            </symbol>
            <symbol id="i-user" viewBox="0 0 24 24">
                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </symbol>
            <symbol id="i-lock" viewBox="0 0 24 24">
                <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
            </symbol>
            <symbol id="i-eye" viewBox="0 0 24 24">
                <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                <circle cx="12" cy="12" r="3" />
            </symbol>
            <symbol id="i-eye-off" viewBox="0 0 24 24">
                <path d="M10.733 5.076a10.744 10.744 0 0 1 11.205 6.575 1 1 0 0 1 0 .696 10.747 10.747 0 0 1-1.444 2.49" />
                <path d="M14.084 14.158a3 3 0 0 1-4.242-4.242" />
                <path d="M17.479 17.499a10.75 10.75 0 0 1-15.417-5.151 1 1 0 0 1 0-.696 10.75 10.75 0 0 1 4.446-5.143" />
                <path d="m2 2 20 20" />
            </symbol>
            <symbol id="i-triangle-alert" viewBox="0 0 24 24">
                <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3" />
                <path d="M12 9v4" />
                <path d="M12 17h.01" />
            </symbol>
            <symbol id="i-arrow-left" viewBox="0 0 24 24">
                <path d="m12 19-7-7 7-7" />
                <path d="M19 12H5" />
            </symbol>
            <symbol id="i-info" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <path d="M12 16v-4" />
                <path d="M12 8h.01" />
            </symbol>
            <symbol id="i-key-round" viewBox="0 0 24 24">
                <path
                    d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"
                />
                <circle cx="16.5" cy="7.5" r=".5" fill="currentColor" />
            </symbol>
            <symbol id="i-shield-question" viewBox="0 0 24 24">
                <path
                    d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"
                />
                <path d="M9.1 9a3 3 0 0 1 5.82 1c0 2-3 3-3 3" />
                <path d="M12 17h.01" />
            </symbol>
            <symbol id="i-clock" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <polyline points="12 6 12 12 16 14" />
            </symbol>
        </svg>

        <!-- Encabezado -->
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
                        <ul class="navbar-nav mx-lg-auto mb-3 mb-lg-0 gap-lg-3">
                            <li class="nav-item"><a class="nav-link px-lg-3" href="index.php">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3" href="nosotros.php">Nosotros</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3" href="preguntas.php">Preguntas</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3" href="politicas.php">Políticas</a></li>
                        </ul>

                        <div class="d-flex gap-2">
                            <a href="registro.php" class="btn btn-brand-outline">Registrarse</a>
                            <a href="login.php" class="btn btn-brand-light">Iniciar sesión</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <main class="flex-grow-1 d-flex flex-column">
            <div class="row g-0 flex-grow-1 mx-0">
                <!-- Panel izquierdo: mensaje de la biblioteca -->
                <section class="col-lg-7 login-info">
                    <div class="login-info-content">
                        <p class="eyebrow">Biblioteca del CBTa No. 5</p>
                        <h1 class="info-title">Más que libros, conectamos ideas</h1>

                        <p class="info-text">
                            Activa tu cuenta para consultar el catálogo y administrar tus préstamos, reservas y avisos de la biblioteca.
                        </p>

                        <ul class="check-list">
                            <li>
                                <svg class="icon"><use href="#i-circle-check" /></svg>
                                Hasta 3 libros por préstamo.
                            </li>
                            <li>
                                <svg class="icon"><use href="#i-circle-check" /></svg>
                                La reserva se identifica con un folio y no es un préstamo.
                            </li>
                            <li>
                                <svg class="icon"><use href="#i-circle-check" /></svg>
                                Retraso en la devolución: adeudo de $10 por día.
                            </li>
                        </ul>
                    </div>

                    <!-- Libros decorativos -->
                    <svg class="login-books" viewBox="0 0 1000 130" preserveAspectRatio="none" aria-hidden="true">
                        <rect x="10" y="38" width="30" height="92" fill="#2E7D58" />
                        <rect x="48" y="38" width="30" height="92" fill="#2E7D58" />
                        <rect x="86" y="10" width="30" height="120" fill="#B0A06E" />
                        <rect x="124" y="54" width="30" height="76" fill="#C5D8CE" />
                        <rect x="162" y="0" width="30" height="130" fill="#1F6B47" />
                        <rect x="200" y="12" width="30" height="118" fill="#B0A06E" />
                        <rect x="238" y="30" width="30" height="100" fill="#8A4B14" />
                        <rect x="276" y="52" width="30" height="78" fill="#C5D8CE" />
                        <rect x="314" y="12" width="30" height="118" fill="#B0A06E" />
                        <rect x="352" y="0" width="30" height="130" fill="#1F6B47" />
                        <rect x="390" y="34" width="30" height="96" fill="#2E7D58" />
                        <rect x="428" y="52" width="30" height="78" fill="#2E7D58" />
                        <rect x="466" y="38" width="30" height="92" fill="#B0A06E" />
                        <rect x="504" y="38" width="30" height="92" fill="#C5D8CE" />
                        <rect x="542" y="10" width="30" height="120" fill="#1F6B47" />
                        <rect x="580" y="54" width="30" height="76" fill="#B0A06E" />
                        <rect x="618" y="0" width="30" height="130" fill="#8A4B14" />
                        <rect x="656" y="12" width="30" height="118" fill="#C5D8CE" />
                        <rect x="694" y="30" width="30" height="100" fill="#B0A06E" />
                        <rect x="732" y="52" width="30" height="78" fill="#1F6B47" />
                        <rect x="770" y="12" width="30" height="118" fill="#2E7D58" />
                        <rect x="808" y="0" width="30" height="130" fill="#2E7D58" />
                        <rect x="846" y="34" width="30" height="96" fill="#B0A06E" />
                        <rect x="884" y="52" width="30" height="78" fill="#C5D8CE" />
                        <rect x="922" y="38" width="30" height="92" fill="#1F6B47" />
                        <rect x="960" y="38" width="30" height="92" fill="#B0A06E" />
                        <rect x="998" y="10" width="30" height="120" fill="#8A4B14" />
                    </svg>
                </section>

                <!-- Panel derecho: formulario -->
                <section class="col-lg-5 login-panel">
                    <div class="login-card">
                        <div class="state-icon state-ok">
                            <svg class="icon"><use href="#i-circle-check" /></svg>
                        </div>

                        <h2 class="login-title">Cuenta activada</h2>
                        <p class="login-subtitle">
                            Tu cuenta quedó activa. Ya puedes iniciar sesión con tu matrícula o clave y tu contraseña.
                        </p>

                        <a href="login.php" class="btn btn-login d-flex align-items-center justify-content-center">Iniciar sesión</a>
                    </div>
                </section>
            </div>
        </main>

        <!-- Pie de pagina -->
        <footer class="site-footer">© 2026 CBTa No. 5 · Biblioteca Escolar</footer>

        <script src="./js/bootstrap.bundle.min.js"></script>
        <script>
            // mostrar u ocultar la contraseña (cada boton lleva el id de su campo)
            document.querySelectorAll(".toggle-password").forEach(function (boton) {
                boton.addEventListener("click", function () {
                    var campo = document.getElementById(boton.dataset.target);
                    var icono = boton.querySelector("use");
                    var visible = campo.type === "text";
                    campo.type = visible ? "password" : "text";
                    icono.setAttribute("href", visible ? "#i-eye" : "#i-eye-off");
                    boton.setAttribute("aria-label", visible ? "Mostrar contraseña" : "Ocultar contraseña");
                });
            });
        </script>
    </body>
</html>
