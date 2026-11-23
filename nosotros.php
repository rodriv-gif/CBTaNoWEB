<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Nosotros - Biblioteca Escolar</title>

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

            /* pie de pagina */

            @media (max-width: 991.98px) {
                .hero {
                    padding: 40px 0 110px 0;
                }
                .site-header .navbar-collapse {
                    padding-bottom: 12px;
                }
            }

            /* paginas internas */
            .page-header {
                background-color: var(--gray-light);
                border-bottom: 1px solid var(--border-card);
                padding: 36px 0 32px 0;
            }
            .breadcrumb-line {
                font-size: 14px;
                color: var(--text-muted);
                margin-bottom: 8px;
            }
            .breadcrumb-line a {
                color: var(--green-main);
                text-decoration: none;
                font-weight: 500;
            }
            .breadcrumb-line a:hover {
                text-decoration: underline;
            }
            .page-title {
                font-size: 32px;
                color: var(--green-main);
                margin: 0 0 6px 0;
            }
            .page-subtitle {
                color: var(--text-muted);
                margin: 0;
            }
            .site-header .nav-link.active {
                color: #ffffff;
                background-color: rgba(255, 255, 255, 0.12);
            }

            .lema-box {
                background-color: var(--green-soft);
                border-left: 4px solid var(--green-main);
                border-radius: 12px;
                padding: 24px 28px;
            }
            .lema-box .label {
                font-size: 12px;
                font-weight: 700;
                letter-spacing: 0.04em;
                text-transform: uppercase;
                color: var(--green-main);
                margin-bottom: 6px;
            }
            .lema-box p {
                font-size: 20px;
                font-weight: 500;
                color: var(--green-main);
                margin: 0;
            }

            .search-field {
                position: relative;
                margin-bottom: 16px;
            }
            .search-field .icon {
                position: absolute;
                left: 14px;
                top: 50%;
                transform: translateY(-50%);
                color: var(--text-muted);
            }
            .search-field .form-control {
                height: 46px;
                border: 1px solid var(--border-field);
                border-radius: 8px;
                padding-left: 44px;
                font-size: 14px;
            }
            .search-field .form-control:focus {
                border: 2px solid var(--blue-accent);
                box-shadow: none;
                padding-left: 43px;
            }
            .site-footer {
                background-color: var(--green-dark);
                color: #ffffff;
                text-align: center;
                font-size: 14px;
                padding: 16px 0;
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
            <symbol id="i-search" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.3-4.3" />
            </symbol>
            <symbol id="i-school" viewBox="0 0 24 24">
                <path d="M14 22v-4a2 2 0 1 0-4 0v4" />
                <path d="m18 10 4 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-8l4-2" />
                <path d="M18 5v17" />
                <path d="m4 6 8-4 8 4" />
                <path d="M6 5v17" />
                <circle cx="12" cy="9" r="2" />
            </symbol>
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
                            <li class="nav-item"><a class="nav-link px-lg-3" href="index.php">Inicio</a></li>
                            <li class="nav-item">
                                <a class="nav-link px-lg-3 active" aria-current="page" href="nosotros.php">Nosotros</a>
                            </li>
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

        <main>
            <!-- Encabezado de la pagina -->
            <section class="page-header">
                <div class="container">
                    <p class="breadcrumb-line mb-0"><a href="index.php">Inicio</a> › Nosotros</p>
                    <h1 class="page-title">Nosotros</h1>
                    <p class="page-subtitle">Conoce al CBTa No. 5 y a su biblioteca escolar.</p>
                </div>
            </section>

            <!-- El CBTa -->
            <section class="section-block">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-7">
                            <div class="d-flex align-items-center gap-4">
                                <img src="./img/logo-cbta5.png" alt="Escudo del CBTa No. 5" height="120" />
                                <div>
                                    <h2 class="section-title">Sobre el CBTa No. 5</h2>
                                    <p class="text-secondary mb-0">
                                        Centro de Bachillerato Tecnológico Agropecuario No. 5, en Huejutla, Hidalgo.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="lema-box">
                                <p class="label">Nuestro lema</p>
                                <p>Respeto, Autoestima y Excelencia Académica.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- La biblioteca -->
            <section class="section-block section-gray">
                <div class="container">
                    <h2 class="section-title">La biblioteca escolar</h2>
                    <p class="text-secondary mb-4">
                        La biblioteca escolar del CBTa No. 5 pone a disposición de la comunidad su acervo para consulta y préstamo. En esta
                        página web puedes consultar el catálogo y administrar tu cuenta; las reservas se hacen desde la app móvil.
                    </p>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="icon-circle">
                                    <svg class="icon"><use href="#i-target" /></svg>
                                </div>
                                <h3>Misión</h3>
                                <p>
                                    Ofrecer a la comunidad del CBTa No. 5 acervo y espacios que apoyen su formación académica y el gusto por
                                    la lectura.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="icon-circle">
                                    <svg class="icon"><use href="#i-eye" /></svg>
                                </div>
                                <h3>Visión</h3>
                                <p>
                                    Ser una biblioteca moderna y accesible, que acerque el conocimiento mediante servicios digitales y un
                                    acervo actualizado.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Ubicacion y contacto -->
            <section class="section-block">
                <div class="container">
                    <h2 class="section-title">Dónde encontrarnos</h2>
                    <p class="section-subtitle">Visítanos o escríbenos.</p>

                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="info-card">
                                <div class="icon-circle">
                                    <svg class="icon"><use href="#i-map-pin" /></svg>
                                </div>
                                <h3>Ubicación</h3>
                                <p>CBTa No. 5, Huejutla de Reyes, Hgo.</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-card">
                                <div class="icon-circle">
                                    <svg class="icon"><use href="#i-clock" /></svg>
                                </div>
                                <h3>Horario</h3>
                                <p>Lunes a viernes, 8:00 a 15:00.<br />Sábado y domingo: cerrado.</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-card">
                                <div class="icon-circle">
                                    <svg class="icon"><use href="#i-mail" /></svg>
                                </div>
                                <h3>Contacto</h3>
                                <p>[correo de la biblioteca]<br />[teléfono de la biblioteca]</p>
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
