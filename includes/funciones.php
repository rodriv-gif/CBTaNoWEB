<?php
// Quita mayúsculas, acentos y espacios de más (para guardar y comparar la respuesta de seguridad)
function normalizar_respuesta($texto)
{
    $texto = mb_strtolower(trim($texto), "UTF-8");
    return strtr($texto, ["á" => "a", "é" => "e", "í" => "i", "ó" => "o", "ú" => "u", "ü" => "u", "ñ" => "n"]);
}

// juan.perez@gmail.com -> ju****@gmail.com
function ocultar_correo($correo)
{
    $partes = explode("@", $correo);
    if (count($partes) !== 2) {
        return $correo;
    }
    return substr($partes[0], 0, 2) . "****@" . $partes[1];
}

// Cuántas veces falló la respuesta de seguridad en los últimos 15 minutos
function intentos_recuperacion($pdo, $clave)
{
    $desde = date("Y-m-d H:i:s", time() - 900);
    $consulta = $pdo->prepare("SELECT COUNT(*) FROM tblintentos_acceso WHERE clave_acceso = ? AND exitoso = 0 AND fecha_intento >= ?");
    $consulta->execute(["rec_" . $clave, $desde]);
    return (int) $consulta->fetchColumn();
}
