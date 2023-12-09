<?php
require_once 'config.php';
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = $_POST["email"];
$password = $_POST["password"];
$email_err='';

$sql_check_user = "SELECT id FROM user WHERE email = '$email'";
$result_check_user = $link->query($sql_check_user);

if ($result_check_user->num_rows > 0) {
    $email_err = 'Email déjà existant.';
    echo $email_err;
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // $email = htmlspecialchars($email);
        // $password = html$result_add_usespecialchars($password);

        $sql_add_user = "INSERT INTO user (email, password) VALUES ('$email', '$password')";
        $result_add_user = $link->query($sql_add_user);

        if ($result_add_user === FALSE) {
            echo "Problème d'insertion : " . $link->error;
        } else {
            echo "Ajouté avec succès.";
        }
    }
}


if (empty($email_err)) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'alahcen2000@gmail.com';
    $mail->Password = 'uyll kafu cmzt omyl';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('alahcen2000@gmail.com', 'salma');
    $mail->addAddress($email, 'Nom de l\'utilisateur');
    $mail->Subject = 'Bienvenue sur votre site';
    $mail->Body = 'Merci de vous être enregistré sur notre site.';

    try {
        $mail->send();
        echo 'Utilisateur ajouté avec succès. E-mail envoyé.';
    } catch (Exception $e) {
        echo 'erreur';
    }
}

