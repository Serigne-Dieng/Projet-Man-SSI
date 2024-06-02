<?php
// Inclure le fichier de configuration de la base de données
require_once('config.php');

// Vérifier si la connexion à la base de données est établie
if ($conn === false) {
    die("Erreur : Impossible de se connecter à la base de données.");
}

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $specialite = $_POST['specialite'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $code_postal = $_POST['code_postal'];
    $pays = $_POST['pays'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    // Préparer la requête SQL pour insérer un nouveau médecin
    $sql = "INSERT INTO medecins (nom, prenom, specialite, adresse, ville, code_postal, pays, email, telephone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        // Lier les paramètres à la requête préparée
        $stmt->bind_param("sssssssss", $nom, $prenom, $specialite, $adresse, $ville, $code_postal, $pays, $email, $telephone);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Afficher un message de succès en JavaScript et rediriger
            echo "<script>alert('Médecin ajouté avec succès !'); window.location.href = 'gestion_medecins.php';</script>";
            // Rediriger vers la page
            header('Location: services.php');
    exit;
        } else {
            echo "Erreur : " . $stmt->error;
        }

        // Fermer la requête
        $stmt->close();
    } else {
        echo "Erreur : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>
