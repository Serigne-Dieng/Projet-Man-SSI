<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = ""; // Laissez vide pour une connexion sans mot de passe
$dbname = "gestion_dossiers_medicaux";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Traitement du formulaire de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $utilisateur = $_POST['utilisateur'];
    $mot_de_passe = $_POST['motpasse'];

    // Requête pour vérifier les informations d'identification dans la base de données
    $sql = "SELECT id, mot_de_passe FROM utilisateurs WHERE nom_utilisateur = '$utilisateur'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Récupérer le mot de passe haché de la base de données
        $row = $result->fetch_assoc();
        $hashed_password = $row['mot_de_passe'];

        // Vérifier si le mot de passe fourni correspond au mot de passe haché
        if (password_verify($mot_de_passe, $hashed_password)) {
            // Démarrer la session et enregistrer l'identifiant de l'utilisateur
            session_start();
            $_SESSION['user_id'] = $row['id'];
            // Rediriger vers la page d'accueil
            header('Location: accueil.php');
            exit;
        } else {
            // Redirection vers la page de connexion avec un message d'erreur
            header('Location: login.php?erreur=1');
            exit;
        }
    } else {
        // Redirection vers la page de connexion avec un message d'erreur
        header('Location: login.php?erreur=1');
        exit;
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
