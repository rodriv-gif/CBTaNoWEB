<?php
require "includes/sesion.php";
exigir_lector();
$pagina_activa = "mi_cuenta.php";
$titulo = "Mis adeudos";
$subtitulo = "Multas y reposiciones pendientes.";
$icono = "i-triangle-alert";

// Tipo, libro, monto o ejemplar, es multa
$adeudos = [
    ["Multa por retraso", "[Título del libro]", '$20', true],
    ["Reposición pendiente", "[Título del libro]", "Ejemplar [clave]", false],
];
$total_multas = '$20';

include "includes/inicio_cuenta.php";
?>
<div class="panel overflow-hidden">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Libro</th>
                    <th class="text-end">Monto o ejemplar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($adeudos as [$tipo, $libro, $monto, $es_multa]): ?>
                    <tr>
                        <td><?= $tipo ?></td>
                        <td><?= $libro ?></td>
                        <td class="text-end <?= $es_multa ? "fw-semibold" : "" ?>"><?= $monto ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="debt-total d-flex justify-content-between align-items-center px-4 py-3">
        <span class="fs-5">Total de multas pendientes</span>
        <strong class="fs-3 text-danger"><?= $total_multas ?></strong>
    </div>

    <p class="d-flex align-items-center gap-2 border-top px-4 py-3 mb-0 text-secondary">
        <svg class="icon"><use href="#i-info" /></svg> Los adeudos se liquidan de forma presencial en la biblioteca.
    </p>
</div>
<?php include "includes/fin_cuenta.php"; ?>
