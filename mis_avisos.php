<?php
session_start();
$pagina_activa = "mi_cuenta.php";
$titulo = "Mis avisos";
$subtitulo = "Del más reciente al más antiguo.";
$icono = "i-bell";

// Icono, título, texto, fecha, nuevo
$avisos = [
    ["i-clock", "Préstamo por vencer", "Tu préstamo de [Título del libro] vence pronto.", "01/11/2026", true],
    ["i-bookmark", "Reserva registrada", "Tu reserva de [Título del libro] quedó registrada.", "31/10/2026", true],
    ["i-circle-x", "Reserva cancelada", "Cancelaste tu reserva de [Título del libro].", "28/10/2026", false],
];

include "includes/inicio_cuenta.php";
?>
<div class="panel overflow-hidden">
    <?php foreach ($avisos as [$icono_aviso, $titulo_aviso, $texto, $fecha, $nuevo]): ?>
        <div class="notice d-flex align-items-start gap-3 px-4 py-3 <?= $nuevo ? "notice-new" : "" ?>">
            <div class="icon-circle notice-icon">
                <svg class="icon"><use href="#<?= $icono_aviso ?>" /></svg>
            </div>
            <div class="flex-grow-1">
                <h2 class="h6 fw-semibold mb-1 d-flex align-items-center gap-2">
                    <?= $titulo_aviso ?>
                    <?php if ($nuevo): ?>
                        <span class="tag tag-new">Nuevo</span>
                    <?php endif; ?>
                </h2>
                <p class="text-secondary mb-0"><?= $texto ?></p>
            </div>
            <span class="d-flex align-items-center gap-2 small text-secondary">
                <?= $fecha ?> <svg class="icon"><use href="#i-chevron-right" /></svg>
            </span>
        </div>
    <?php endforeach; ?>
</div>
<?php include "includes/fin_cuenta.php"; ?>
