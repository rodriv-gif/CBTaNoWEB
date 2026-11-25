<?php
session_start();

// Candado de seguridad: solo permite cancelar reservas si hay sesión de bibliotecario activa
if (!isset($_SESSION['id_bibliotecario'])) {
    header('Location: login.php?error=acceso_denegado');
    exit;
}

require_once __DIR__ . '/config/conexion.php';

$idReserva = $_GET['id'] ?? null;
$estado    = $_GET['estado'] ?? 'activas';
$estadosPermitidos = ['activas', 'confirmadas', 'vencidas', 'canceladas'];
if (!in_array($estado, $estadosPermitidos)) {
    $estado = 'activas';
}

// Cambia el estado de la reserva a Cancelada (3) para liberar el ejemplar en el catálogo
if ($idReserva && is_numeric($idReserva)) {
    $idReservaInt = (int)$idReserva;
    $sql  = "UPDATE tblreservas SET id_estado_reserva = 3 WHERE id_reserva = ? AND id_estado_reserva = 1";
    $stmt = mysqli_prepare($conexion, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $idReservaInt);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

header('Location: gestion_reservas.php?estado=' . urlencode($estado) . '&cancelado=1');
exit;
?>