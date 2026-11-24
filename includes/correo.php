<?php
use PHPMailer\PHPMailer\PHPMailer;

require __DIR__ . "/../PHPMailer/Exception.php";
require __DIR__ . "/../PHPMailer/PHPMailer.php";
require __DIR__ . "/../PHPMailer/SMTP.php";

// Manda el correo de activación con el enlace. Devuelve true si salió bien y false si falló.
function enviar_activacion($destino, $nombre, $token)
{
    $config = require __DIR__ . "/../config/correo.php";

    $protocolo = !empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off" ? "https" : "http";
    $carpeta = rtrim(dirname($_SERVER["SCRIPT_NAME"]), "/\\");
    $enlace = $protocolo . "://" . $_SERVER["HTTP_HOST"] . $carpeta . "/activar_cuenta.php?token=" . $token;

    try {
        $correo = new PHPMailer(true);
        $correo->isSMTP();
        $correo->Host = $config["host"];
        $correo->SMTPAuth = true;
        $correo->Username = $config["usuario"];
        $correo->Password = $config["contrasenia"];
        $correo->Port = $config["puerto"];
        $correo->SMTPSecure = $config["puerto"] == 465 ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
        $correo->CharSet = "UTF-8";

        $correo->setFrom($config["usuario"], "Biblioteca CBTa No. 5");
        $correo->addAddress($destino, $nombre);
        $correo->isHTML(true);
        $correo->Subject = "Activa tu cuenta - Biblioteca CBTa No. 5";
        $correo->Body = "<p>Hola, " . htmlspecialchars($nombre) . ".</p>"
            . "<p>Para activar tu cuenta de la biblioteca entra a este enlace. Vence en 24 horas:</p>"
            . "<p><a href=\"" . $enlace . "\">Activar mi cuenta</a></p>"
            . "<p>Si no creaste esta cuenta, ignora este correo.</p>";
        $correo->AltBody = "Hola, " . $nombre . ". Activa tu cuenta entrando a este enlace (vence en 24 horas): " . $enlace;

        $correo->send();
        return true;
    } catch (\Exception $e) {
        return false;
    }
}
