<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $to = "tonemail@example.com";
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8";

    $fullMessage = "Nom: $name\n\nEmail: $email\n\nMessage:\n$message";

    if (mail($to, $subject, $fullMessage, $headers)) {
        echo json_encode(["status" => "success", "message" => "Message envoyé !"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'envoi."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Requête invalide."]);
}
?>
