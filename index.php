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
        <link rel="stylesheet" href="./css/inicio.css" />
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

            <!-- Catalogo (vista previa) -->
            <section class="section-block" id="catalogo">
                <div class="container">
                    <h2 class="section-title">Catálogo de libros</h2>
                    <p class="section-subtitle">Algunos de los libros que puedes encontrar en la biblioteca.</p>

                    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-3">
                        <?php for ($i = 0; $i < 12; $i++): ?>
                            <div class="col">
                                <a href="login.php" class="book-card d-block text-decoration-none">
                                    <div class="book-cover d-flex align-items-center justify-content-center text-center">[Título del libro]</div>
                                    <h3 class="book-title">[Título del libro]</h3>
                                    <p class="book-category">[Categoría]</p>
                                </a>
                            </div>
                        <?php endfor; ?>
                    </div>

                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-4 pt-4 border-top">
                        <span class="text-secondary">Para ver todos los libros y sus detalles, inicia sesión con tu cuenta.</span>
                        <a href="login.php" class="btn btn-brand">Ver más →</a>
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
