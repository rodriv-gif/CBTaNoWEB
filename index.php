<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Biblioteca Escolar - CBTa No. 5 · Huejutla, Hgo.</title>

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
                --gray-light: #f5f7f6;
                --text-main: #212121;
                --text-muted: #4b5563;
                --border-card: #e5e7eb;
                --border-field: #d0d5dd;
            }

            html {
                scroll-behavior: smooth;
            }

            body {
                font-family: "Poppins", "Segoe UI", Arial, sans-serif;
                font-size: 16px;
                line-height: 1.5;
                color: var(--text-main);
                background-color: #ffffff;
            }

            h1,
            h2 {
                font-weight: 600;
            }
            h3,
            h4,
            h5 {
                font-weight: 500;
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
            .btn-brand,
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

            .btn-brand {
                background-color: var(--green-main);
                color: #ffffff;
                border: 1.5px solid var(--green-main);
            }
            .btn-brand:hover {
                background-color: var(--green-medium);
                border-color: var(--green-medium);
                color: #ffffff;
            }
            .btn-brand:active {
                background-color: var(--green-dark) !important;
                color: #ffffff;
            }
            .btn-brand:focus-visible {
                outline: 3px solid var(--blue-accent);
                outline-offset: 2px;
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

            /* ---------- Banner (hero) ---------- */
            .hero {
                position: relative;
                color: #ffffff;
                /* IMAGEN DE FONDO: sustituir img/biblioteca-hero.jpg por una foto real de la biblioteca */
                background:
                    linear-gradient(90deg, rgba(10, 61, 38, 0.94) 0%, rgba(10, 61, 38, 0.84) 55%, rgba(10, 61, 38, 0.7) 100%),
                    url("./img/biblioteca-hero.jpg") center / cover no-repeat;
                background-color: var(--green-dark);
                padding: 64px 0 120px 0;
                overflow: hidden;
            }

            .hero-eyebrow {
                font-size: 14px;
                font-weight: 500;
                letter-spacing: 0.02em;
                text-transform: uppercase;
                color: #e6f4ec;
            }

            .hero-title {
                font-size: clamp(2.2rem, 5vw, 3.2rem);
                line-height: 1.15;
                font-weight: 600;
                margin: 12px 0 24px 0;
            }

            .hero-text {
                font-size: 18px;
                max-width: 520px;
            }

            .hero-books {
                position: absolute;
                left: 0;
                bottom: 0;
                width: 100%;
                height: 82px;
            }

            /* ---------- Tarjeta "Hoy en la biblioteca" ---------- */
            .today-card {
                background-color: #ffffff;
                color: var(--text-main);
                border-radius: 12px;
                padding: 24px;
                box-shadow: 0 12px 32px rgba(0, 0, 0, 0.22);
            }

            .today-card h2 {
                font-size: 20px;
                margin-bottom: 12px;
            }

            .status-tag {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 2px 12px;
                border-radius: 999px;
                font-size: 13px;
                font-weight: 500;
            }
            .status-tag .icon {
                width: 16px;
                height: 16px;
            }
            .status-open {
                color: var(--green-success);
                background-color: var(--green-soft);
            }
            .status-closed {
                color: #475467;
                background-color: #f2f4f7;
            }

            .today-row {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-top: 14px;
                font-size: 14px;
            }
            .today-row .icon {
                color: var(--green-main);
            }

            .today-note {
                margin: 18px 0 0 0;
                padding-top: 14px;
                border-top: 1px solid var(--border-card);
                font-size: 13px;
                color: var(--text-muted);
            }

            /* ---------- Secciones ---------- */
            .section-block {
                padding: 64px 0;
            }
            .section-gray {
                background-color: var(--gray-light);
            }

            .section-title {
                font-size: 28px;
                color: var(--green-main);
                margin-bottom: 4px;
            }
            .section-subtitle {
                color: var(--text-muted);
                font-size: 15px;
                margin-bottom: 32px;
            }

            /* tarjetas */
            .info-card {
                background-color: #ffffff;
                border: 1px solid var(--border-card);
                border-radius: 12px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
                padding: 24px;
                height: 100%;
            }
            .service-card:hover {
                box-shadow: 0 8px 20px rgba(15, 81, 50, 0.18);
                border-color: #bfd9cb;
            }
            .info-card h3 {
                font-size: 18px;
                margin: 16px 0 8px 0;
            }
            .info-card p {
                font-size: 14px;
                color: var(--text-muted);
                margin: 0;
            }

            .icon-circle {
                width: 52px;
                height: 52px;
                border-radius: 50%;
                background-color: var(--green-soft);
                color: var(--green-main);
                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* pasos */
            .step-number {
                width: 44px;
                height: 44px;
                border-radius: 50%;
                background-color: var(--green-main);
                color: #ffffff;
                font-weight: 600;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 12px;
            }
            .step-item h3 {
                font-size: 18px;
                margin-bottom: 8px;
            }
            .step-item p {
                font-size: 14px;
                color: var(--text-muted);
            }

            /* preguntas frecuentes */
            .faq-help {
                background-color: #ffffff;
                border: 1px solid var(--border-card);
                border-radius: 12px;
                padding: 16px 18px;
                margin-top: 20px;
            }
            .faq-help h3 {
                font-size: 15px;
                font-weight: 600;
                margin-bottom: 6px;
            }
            .faq-help p {
                font-size: 14px;
                color: var(--text-muted);
                margin-bottom: 10px;
            }
            .faq-help a {
                font-size: 14px;
                font-weight: 600;
                color: var(--green-main);
                text-decoration: none;
            }
            .faq-help a:hover {
                text-decoration: underline;
            }

            .faq-list {
                --bs-accordion-btn-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%230F5132' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpath d='m6 9 6 6 6-6'/%3e%3c/svg%3e");
                --bs-accordion-btn-active-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%230F5132' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpath d='m6 9 6 6 6-6'/%3e%3c/svg%3e");
            }
            .faq-list .accordion-item {
                border: 1px solid var(--border-card);
                border-radius: 12px;
                overflow: hidden;
                margin-bottom: 10px;
            }
            .faq-list .accordion-item:has(.accordion-collapse.show) {
                border-color: var(--green-medium);
            }
            .faq-list .accordion-button {
                font-family: inherit;
                font-size: 15px;
                font-weight: 500;
                color: var(--text-main);
                background-color: #ffffff;
                padding: 16px 20px;
                box-shadow: none;
            }
            .faq-list .accordion-button:not(.collapsed) {
                color: var(--text-main);
                background-color: #ffffff;
            }
            .faq-list .accordion-button:focus-visible {
                outline: 3px solid var(--blue-accent);
                outline-offset: -3px;
            }
            .faq-list .accordion-body {
                padding: 0 20px 18px 20px;
                font-size: 14px;
                color: var(--text-muted);
            }

            /* llamado a la accion */
            .cta-band {
                background-color: var(--green-main);
                color: #ffffff;
                padding: 40px 0;
            }
            .cta-band h2 {
                font-size: 28px;
                margin-bottom: 4px;
            }
            .cta-band p {
                margin: 0;
                font-size: 16px;
            }

            /* pie de pagina */
            .site-footer {
                background-color: var(--green-dark);
                color: #ffffff;
                padding: 40px 0 0 0;
            }
            .footer-logo {
                height: 62px;
                width: auto;
            }
            .site-footer h3 {
                font-size: 16px;
                margin-bottom: 14px;
            }
            .site-footer .footer-brand {
                font-size: 18px;
                font-weight: 600;
            }
            .site-footer p,
            .site-footer li,
            .site-footer a {
                font-size: 14px;
                color: #ffffff;
            }
            .site-footer a {
                text-decoration: none;
            }
            .site-footer a:hover {
                text-decoration: underline;
            }
            .contact-list {
                list-style: none;
                margin: 0;
                padding: 0;
            }
            .contact-list li {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 12px;
            }
            .footer-links {
                list-style: none;
                margin: 0;
                padding: 0;
            }
            .footer-links li {
                margin-bottom: 10px;
            }
            .footer-bottom {
                margin-top: 24px;
                padding: 16px 0;
                border-top: 1px solid rgba(255, 255, 255, 0.15);
                text-align: center;
                font-size: 13px;
            }

            @media (max-width: 991.98px) {
                .hero {
                    padding: 40px 0 110px 0;
                }
                .site-header .navbar-collapse {
                    padding-bottom: 12px;
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

    <body>
        <!-- Iconos (set Lucide, trazo lineal) -->
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
            <symbol id="i-book-open" viewBox="0 0 24 24">
                <path d="M12 7v14" />
                <path
                    d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"
                />
            </symbol>
            <symbol id="i-bookmark" viewBox="0 0 24 24"><path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z" /></symbol>
            <symbol id="i-library" viewBox="0 0 24 24">
                <path d="m16 6 4 14" />
                <path d="M12 6v14" />
                <path d="M8 8v12" />
                <path d="M4 4v16" />
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
            <symbol id="i-calendar" viewBox="0 0 24 24">
                <path d="M8 2v4" />
                <path d="M16 2v4" />
                <rect width="18" height="18" x="3" y="4" rx="2" />
                <path d="M3 10h18" />
            </symbol>
            <symbol id="i-clock" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <polyline points="12 6 12 12 16 14" />
            </symbol>
            <symbol id="i-map-pin" viewBox="0 0 24 24">
                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                <circle cx="12" cy="10" r="3" />
            </symbol>
            <symbol id="i-target" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <circle cx="12" cy="12" r="6" />
                <circle cx="12" cy="12" r="2" />
            </symbol>
            <symbol id="i-eye" viewBox="0 0 24 24">
                <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                <circle cx="12" cy="12" r="3" />
            </symbol>
            <symbol id="i-mail" viewBox="0 0 24 24">
                <rect width="20" height="16" x="2" y="4" rx="2" />
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
            </symbol>
            <symbol id="i-phone" viewBox="0 0 24 24">
                <path
                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                />
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
                            <li class="nav-item"><a class="nav-link px-lg-3" href="#inicio">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3" href="nosotros.php">Nosotros</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3" href="#preguntas">Preguntas</a></li>
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

        <main>
            <!-- Banner principal -->
            <section class="hero" id="inicio">
                <div class="container">
                    <div class="row align-items-center g-4">
                        <div class="col-lg-7">
                            <p class="hero-eyebrow mb-0">Biblioteca del CBTa No. 5</p>
                            <h1 class="hero-title">Más que libros, conectamos ideas</h1>
                            <p class="hero-text mb-0">
                                Conoce los servicios de la biblioteca del CBTa No. 5: consulta el acervo desde la web, reserva tu libro en
                                la app móvil y recógelo sin hacer fila.
                            </p>
                        </div>

                        <!-- Tarjeta: Hoy en la biblioteca -->
                        <div class="col-lg-5 col-xl-4 offset-xl-1">
                            <div class="today-card">
                                <h2>Hoy en la biblioteca</h2>

                                <span class="status-tag status-closed">
                                    <svg class="icon"><use href="#i-circle-x" /></svg> Cerrada
                                </span>

                                <div class="today-row">
                                    <svg class="icon"><use href="#i-clock" /></svg>
                                    <span>Lunes a viernes, 8:00 a 15:00</span>
                                </div>

                                <div class="today-row">
                                    <svg class="icon"><use href="#i-map-pin" /></svg>
                                    <span>CBTa No. 5, Huejutla de Reyes, Hgo.</span>
                                </div>

                                <div class="today-row">
                                    <svg class="icon"><use href="#i-calendar" /></svg>
                                    <span>Periodos vacacionales: Consulta los avisos</span>
                                </div>

                                <p class="today-note">Hasta 3 libros por préstamo. Retraso: $10 por día.</p>
                            </div>
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

            <!-- Servicios -->
            <section class="section-block" id="servicios">
                <div class="container">
                    <h2 class="section-title">Servicios de la biblioteca</h2>
                    <p class="section-subtitle">Todo lo que puedes hacer sin hacer fila.</p>

                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="info-card service-card">
                                <div class="icon-circle">
                                    <svg class="icon"><use href="#i-book-open" /></svg>
                                </div>
                                <h3>Consulta del catálogo</h3>
                                <p>Busca por título, autor o especialidad y revisa si hay ejemplares disponibles.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-card service-card">
                                <div class="icon-circle">
                                    <svg class="icon"><use href="#i-bookmark" /></svg>
                                </div>
                                <h3>Reserva exprés</h3>
                                <p>Aparta tu libro desde la app móvil y recibe un folio con tu comprobante.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-card service-card">
                                <div class="icon-circle">
                                    <svg class="icon"><use href="#i-library" /></svg>
                                </div>
                                <h3>Préstamo y devolución</h3>
                                <p>Recoge tu libro, confirma de recibido desde la app y devuélvelo antes de la fecha límite.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Como reservar -->
            <section class="section-block section-gray" id="como-reservar">
                <div class="container">
                    <h2 class="section-title">Cómo reservar tu libro</h2>
                    <p class="section-subtitle">Las reservas se hacen desde la app móvil, con la cuenta que creas en esta página web.</p>

                    <div class="row g-4">
                        <div class="col-sm-6 col-lg-3 step-item">
                            <div class="step-number">1</div>
                            <h3>Crea tu cuenta</h3>
                            <p>Regístrate en esta página web con tu matrícula o clave. Sin cuenta no puedes reservar desde la app móvil.</p>
                        </div>
                        <div class="col-sm-6 col-lg-3 step-item">
                            <div class="step-number">2</div>
                            <h3>Busca y reserva</h3>
                            <p>Entra a la app móvil con tu cuenta, elige tu libro y confirma la reserva. Recibirás un folio.</p>
                        </div>
                        <div class="col-sm-6 col-lg-3 step-item">
                            <div class="step-number">3</div>
                            <h3>Recógelo</h3>
                            <p>Presenta tu folio en la biblioteca para recoger tu libro.</p>
                        </div>
                        <div class="col-sm-6 col-lg-3 step-item">
                            <div class="step-number">4</div>
                            <h3>Confirma de recibido</h3>
                            <p>Cuando la biblioteca habilite la entrega, confírmala desde la app.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Preguntas frecuentes -->
            <section class="section-block" id="preguntas">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <h2 class="section-title">Preguntas frecuentes</h2>
                            <p class="section-subtitle mb-0">Resuelve tus dudas sobre reservas, préstamos y devoluciones.</p>

                            <div class="faq-help">
                                <h3>¿No encuentras tu respuesta?</h3>
                                <p>Pregunta directamente en la biblioteca o escríbenos y con gusto te ayudamos.</p>
                                <a href="#contacto">Ver contacto →</a>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="accordion faq-list" id="faqList">
                                <div class="accordion-item">
                                    <h3 class="accordion-header">
                                        <button
                                            class="accordion-button"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#faq0"
                                            aria-expanded="true"
                                            aria-controls="faq0"
                                        >
                                            ¿Reservar un libro es lo mismo que pedirlo en préstamo?
                                        </button>
                                    </h3>
                                    <div id="faq0" class="accordion-collapse collapse show" data-bs-parent="#faqList">
                                        <div class="accordion-body">
                                            No. La reserva aparta el libro y te da un folio con tu comprobante. El préstamo se registra
                                            cuando pasas a recogerlo a la biblioteca.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="accordion-header">
                                        <button
                                            class="accordion-button collapsed"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#faq1"
                                            aria-expanded="false"
                                            aria-controls="faq1"
                                        >
                                            ¿Dónde puedo reservar un libro?
                                        </button>
                                    </h3>
                                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqList">
                                        <div class="accordion-body">
                                            Las reservas se hacen desde la app móvil para Android. En la página web puedes consultar el
                                            catálogo e iniciar sesión para revisar tu cuenta.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="accordion-header">
                                        <button
                                            class="accordion-button collapsed"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#faq2"
                                            aria-expanded="false"
                                            aria-controls="faq2"
                                        >
                                            ¿Cuántos libros puedo tener al mismo tiempo?
                                        </button>
                                    </h3>
                                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqList">
                                        <div class="accordion-body">Hasta 3 libros por alumno al mismo tiempo.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="accordion-header">
                                        <button
                                            class="accordion-button collapsed"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#faq3"
                                            aria-expanded="false"
                                            aria-controls="faq3"
                                        >
                                            ¿Qué pasa si no recojo mi libro a tiempo?
                                        </button>
                                    </h3>
                                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqList">
                                        <div class="accordion-body">
                                            La reserva expira y el libro vuelve a quedar disponible para otros lectores.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-4">
                                <span class="text-secondary">¿Quieres saber más?</span>
                                <a href="preguntas.php" class="btn btn-brand">Ver todas las preguntas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Llamado a la accion -->
            <section class="cta-band">
                <div class="container">
                    <div class="row align-items-center g-3">
                        <div class="col-lg-8">
                            <h2>¿Primera vez en la biblioteca digital?</h2>
                            <p>Regístrate con tu matrícula o clave, consulta el catálogo y reserva tus libros desde la app móvil.</p>
                        </div>

                        <div class="col-lg-4 d-flex gap-2 justify-content-lg-end">
                            <a href="login.php" class="btn btn-brand-outline">Iniciar sesión</a>
                            <a href="registro.php" class="btn btn-brand-light">Registrarse</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Pie de pagina -->
        <footer class="site-footer" id="contacto">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="d-flex align-items-center gap-3">
                            <img src="./img/logo-cbta5-blanco.png" alt="Logotipo del CBTa No. 5" class="footer-logo" />
                            <div>
                                <p class="footer-brand mb-0">Biblioteca Escolar</p>
                                <p class="mb-1">CBTa No. 5 · Huejutla, Hgo.</p>
                                <p class="mb-0">Más que libros, conectamos ideas</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-7 col-lg-4">
                        <h3>Contacto</h3>
                        <ul class="contact-list">
                            <li>
                                <svg class="icon"><use href="#i-map-pin" /></svg>
                                <span>CBTa No. 5, Huejutla de Reyes, Hgo.</span>
                            </li>
                            <li>
                                <svg class="icon"><use href="#i-mail" /></svg>
                                <span>[correo de la biblioteca]</span>
                            </li>
                            <li>
                                <svg class="icon"><use href="#i-phone" /></svg>
                                <span>[teléfono de la biblioteca]</span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-5 col-lg-3">
                        <h3>Información</h3>
                        <ul class="footer-links">
                            <li><a href="nosotros.php">Nosotros</a></li>
                            <li><a href="preguntas.php">Preguntas frecuentes</a></li>
                            <li><a href="politicas.php">Políticas y condiciones del servicio bibliotecario</a></li>
                        </ul>
                    </div>
                </div>

                <div class="footer-bottom">© 2026 CBTa No. 5 · Biblioteca Escolar</div>
            </div>
        </footer>

        <script src="./js/bootstrap.bundle.min.js"></script>
    </body>
</html>
