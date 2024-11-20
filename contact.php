<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer et sécuriser les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Adresse email de destination
    $to = "pierre.techno68@gmail.com"; // Remplacez par votre adresse email

    // Sujet de l'email
    $subject = "Nouveau message de $name";

    // Contenu de l'email
    $body = "Vous avez reçu un nouveau message via le formulaire de contact.\n\n";
    $body .= "Nom : $name\n";
    $body .= "Email : $email\n\n";
    $body .= "Message :\n$message\n";

    // En-têtes de l'email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envoyer l'email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message envoyé avec succès. Merci, $name, de nous avoir contactés.";
    } else {
        echo "Erreur : le message n'a pas pu être envoyé. Veuillez réessayer.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>
