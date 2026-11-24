<?php // Panel izquierdo de las pantallas de cuenta. La página define $texto_info antes del include. ?>
<section class="col-lg-7 login-info">
    <div class="login-info-content">
        <p class="eyebrow">Biblioteca del CBTa No. 5</p>
        <h1 class="info-title">Más que libros, conectamos ideas</h1>

        <p class="info-text"><?= $texto_info ?></p>

        <ul class="check-list list-unstyled mb-0">
            <li class="d-flex align-items-center">
                <svg class="icon"><use href="#i-circle-check" /></svg>
                Hasta 3 libros por préstamo.
            </li>
            <li class="d-flex align-items-center">
                <svg class="icon"><use href="#i-circle-check" /></svg>
                La reserva se identifica con un folio y no es un préstamo.
            </li>
            <li class="d-flex align-items-center">
                <svg class="icon"><use href="#i-circle-check" /></svg>
                Retraso en la devolución: adeudo de $10 por día.
            </li>
        </ul>
    </div>

    <!-- Libros decorativos -->
    <svg class="login-books" viewBox="0 0 1000 130" preserveAspectRatio="none" aria-hidden="true">
        <?php
        // x, alto, color de cada libro
        $libros = [
            [10, 92, "#2E7D58"], [48, 92, "#2E7D58"], [86, 120, "#B0A06E"], [124, 76, "#C5D8CE"],
            [162, 130, "#1F6B47"], [200, 118, "#B0A06E"], [238, 100, "#8A4B14"], [276, 78, "#C5D8CE"],
            [314, 118, "#B0A06E"], [352, 130, "#1F6B47"], [390, 96, "#2E7D58"], [428, 78, "#2E7D58"],
            [466, 92, "#B0A06E"], [504, 92, "#C5D8CE"], [542, 120, "#1F6B47"], [580, 76, "#B0A06E"],
            [618, 130, "#8A4B14"], [656, 118, "#C5D8CE"], [694, 100, "#B0A06E"], [732, 78, "#1F6B47"],
            [770, 118, "#2E7D58"], [808, 130, "#2E7D58"], [846, 96, "#B0A06E"], [884, 78, "#C5D8CE"],
            [922, 92, "#1F6B47"], [960, 92, "#B0A06E"], [998, 120, "#8A4B14"],
        ];
        foreach ($libros as [$x, $alto, $color]): ?>
            <rect x="<?= $x ?>" y="<?= 130 - $alto ?>" width="30" height="<?= $alto ?>" fill="<?= $color ?>" />
        <?php endforeach; ?>
    </svg>
</section>
