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
    $patient_id = $_POST['patient_id'];
    $medecin_id = $_POST['medecin_id'];
    $date_prescription = $_POST['date_prescription'];
    $medicament = $_POST['medicament'];
    $posologie = $_POST['posologie'];
    $instructions = $_POST['instructions'];

    // Préparer la requête SQL pour insérer une nouvelle prescription
    $sql = "INSERT INTO prescriptions (patient_id, medecin_id, date_prescription, medicament, posologie, instructions) VALUES (?, ?, ?, ?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        // Lier les paramètres à la requête préparée
        $stmt->bind_param("iissss", $patient_id, $medecin_id, $date_prescription, $medicament, $posologie, $instructions);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Afficher un message de succès en JavaScript et rediriger
            echo "<script>alert('Prescription ajoutée avec succès'); window.location.href='gestion_prescriptions.php';</script>";
             // Rediriger vers la page
             header('Location: services.php');
             exit;
        } else {
            echo "Erreur : Impossible d'ajouter la prescription.";
        }

        // Fermer la requête
        $stmt->close();
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
