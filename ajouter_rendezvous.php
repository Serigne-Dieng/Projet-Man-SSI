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
    $date_rendez_vous = $_POST['date_rendez_vous'];
    $heure_debut = $_POST['heure_debut'];
    $duree = $_POST['duree'];
    $etat = $_POST['etat'];

    // Préparer la requête SQL pour insérer un nouveau rendez-vous
    $sql = "INSERT INTO rendez_vous (patient_id, medecin_id, date_rendez_vous, heure_debut, duree, etat) VALUES (?, ?, ?, ?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        // Lier les paramètres à la requête préparée
        $stmt->bind_param("iissis", $patient_id, $medecin_id, $date_rendez_vous, $heure_debut, $duree, $etat);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Afficher un message de succès en JavaScript et rediriger
            echo "<script>alert('Rendez-vous ajouté avec succès !'); window.location.href = 'gestion_rendezvous.php';</script>";
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
