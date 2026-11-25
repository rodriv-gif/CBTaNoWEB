<?php
require "includes/sesion.php";
exigir_lector();
$pagina_activa = "mi_cuenta.php";
$titulo = "Mis préstamos";
$subtitulo = "Libros que tienes en préstamo.";
$icono = "i-clock";

// Libro, ejemplar, fecha de préstamo, fecha límite, días restantes, nota, vencido
$prestamos = [
    ["[Título del libro]", "[clave]", "28/10/2026", "04/11/2026", "Faltan 3 días", "", false],
    ["[Título del libro]", "[clave]", "23/10/2026", "30/10/2026", "2 días de retraso", 'Multa acumulada: $20', true],
];

include "includes/inicio_cuenta.php";
?>
<div class="panel overflow-hidden">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>Libro</th>
                    <th>Fecha de préstamo</th>
                    <th>Fecha límite</th>
                    <th>Días restantes</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prestamos as [$libro, $ejemplar, $desde, $hasta, $dias, $nota, $vencido]): ?>
                    <tr class="<?= $vencido ? "row-late" : "" ?>">
                        <td>
                            <?= $libro ?>
                            <small class="d-block text-secondary">Ejemplar <?= $ejemplar ?></small>
                        </td>
                        <td><?= $desde ?></td>
                        <td><?= $hasta ?></td>
                        <td class="<?= $vencido ? "text-danger" : "" ?>">
                            <?= $dias ?>
                            <?php if ($nota): ?>
                                <small class="d-block"><?= $nota ?></small>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($vencido): ?>
                                <span class="tag tag-danger"><svg class="icon"><use href="#i-triangle-alert" /></svg> Vencido</span>
                            <?php else: ?>
                                <span class="tag tag-ok"><svg class="icon"><use href="#i-circle-check" /></svg> Activo</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "includes/fin_cuenta.php"; ?>
