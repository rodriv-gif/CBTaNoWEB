<?php
session_start();
$pagina_activa = "mi_cuenta.php";
$titulo = "Mis reservas";
$subtitulo = "Recoge tu libro en la biblioteca antes de la fecha límite.";
$icono = "i-bookmark";

// Libro, ejemplar, fecha límite para recogerla, tiempo restante, último día
$reservas = [
    ["[Título del libro]", "[clave]", "03/11/2026", "Quedan 2 días", false],
    ["[Título del libro]", "[clave]", "02/11/2026", "Queda 1 día", true],
];

include "includes/inicio_cuenta.php";
?>
<div class="panel overflow-hidden">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
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
                <?php foreach ($reservas as [$libro, $ejemplar, $fecha, $tiempo, $ultimo_dia]): ?>
                    <tr>
                        <td>
                            <?= $libro ?>
                            <small class="d-block text-secondary">Ejemplar <?= $ejemplar ?></small>
                        </td>
                        <td>
                            <span class="tag tag-info"><svg class="icon"><use href="#i-bookmark" /></svg> Activa</span>
                        </td>
                        <td><?= $fecha ?></td>
                        <td class="<?= $ultimo_dia ? "text-amber fw-semibold" : "" ?>"><?= $tiempo ?></td>
                        <td>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="comprobante.php" class="btn btn-sm btn-outline-green">
                                    <svg class="icon"><use href="#i-download" /></svg> Descargar comprobante
                                </a>
                                <button type="button" class="btn btn-sm btn-outline-red">Cancelar reserva</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "includes/fin_cuenta.php"; ?>
