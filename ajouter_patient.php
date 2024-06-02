<?php
// Inclure le fichier de configuration de la base de données
require_once('config.php');

// Vérification de la méthode de requête
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Préparer la requête d'insertion
    $stmt = $conn->prepare("INSERT INTO patients (nom, prenom, date_naissance, genre, adresse, ville, code_postal, pays, email, telephone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Vérifier si la préparation de la requête a réussi
    if ($stmt) {
        // Lier les paramètres et exécuter la requête
        $stmt->bind_param("ssssssssss", $nom, $prenom, $date_naissance, $genre, $adresse, $ville, $code_postal, $pays, $email, $telephone);

        // Assigner les valeurs des champs du formulaire aux variables
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $date_naissance = $_POST['date_naissance'];
        $genre = $_POST['genre'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $code_postal = $_POST['code_postal'];
        $pays = $_POST['pays'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];

        // Exécuter la requête
        if ($stmt->execute()) {
            echo "Patient ajouté avec succès.";
            // Rediriger vers la page
            header('Location: services.php');
    exit;
        } else {
            echo "Erreur lors de l'ajout du patient : " . $conn->error;
        }

        // Fermer la requête
        $stmt->close();
    } else {
        echo "Erreur lors de la préparation de la requête : " . $conn->error;
    }
} else {
    echo "Erreur : Méthode de requête invalide.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
