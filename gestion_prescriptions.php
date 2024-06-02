<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Prescriptions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            color: #333;
        }
        h1, h2 {
            text-align: center;
        }
        main {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        th:first-child, td:first-child {
            padding-left: 20px;
        }
        form {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="date"],
        input[type="email"],
        select {
            width: calc(100% - 12px);
            padding: 6px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Gestion des Prescriptions</h1>
    <main>
        <!-- Liste des Prescriptions -->
        <section>
            <h2>Liste des Prescriptions</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nom Patient</th>
                        <th>Nom Médecin</th>
                        <th>Date Prescription</th>
                        <th>Médicament</th>
                        <th>Posologie</th>
                        <th>Instructions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Inclure le fichier de configuration de la base de données
                    require_once('config.php');

                    // Requête pour récupérer les prescriptions avec les noms des patients et des médecins
                    $sql_prescriptions = "SELECT p.id, pa.nom AS nom_patient, pa.prenom AS prenom_patient, 
                                          m.nom AS nom_medecin, m.prenom AS prenom_medecin, 
                                          p.date_prescription, p.medicament, p.posologie, p.instructions 
                                          FROM prescriptions p 
                                          JOIN patients pa ON p.patient_id = pa.id 
                                          JOIN medecins m ON p.medecin_id = m.id";
                    $result_prescriptions = $conn->query($sql_prescriptions);

                    // Vérifier si des prescriptions sont trouvées
                    if ($result_prescriptions->num_rows > 0) {
                        // Afficher les prescriptions dans le tableau
                        while($row = $result_prescriptions->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["nom_patient"] . " " . $row["prenom_patient"] . "</td>";
                            echo "<td>" . $row["nom_medecin"] . " " . $row["prenom_medecin"] . "</td>";
                            echo "<td>" . $row["date_prescription"] . "</td>";
                            echo "<td>" . $row["medicament"] . "</td>";
                            echo "<td>" . $row["posologie"] . "</td>";
                            echo "<td>" . $row["instructions"] . "</td>";
                            echo "<td><button>Edit</button> <button>Delete</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Aucune prescription trouvée.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Formulaire d'Ajout de Prescription -->
        <section>
            <h2>Ajouter une Nouvelle Prescription</h2>
            <form action="ajouter_prescription.php" method="post">
                <label for="patient_id">Patient :</label>
                <select id="patient_id" name="patient_id" required>
                    <?php
                    // Récupérer les patients depuis la base de données
                    $sql_patients = "SELECT id, nom, prenom FROM patients";
                    $result_patients = $conn->query($sql_patients);

                    // Vérifier si des patients sont trouvés
                    if ($result_patients->num_rows > 0) {
                        // Afficher les patients dans le menu déroulant
                        while($row = $result_patients->fetch_assoc()) {
                            echo "<option value='" . $row["id"] . "'>" . $row["nom"] . " " . $row["prenom"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Aucun patient trouvé</option>";
                    }
                    ?>
                </select>
                <label for="medecin_id">Médecin :</label>
                <select id="medecin_id" name="medecin_id" required>
                    <?php
                    // Récupérer les médecins depuis la base de données
                    $sql_medecins = "SELECT id, nom, prenom FROM medecins";
                    $result_medecins = $conn->query($sql_medecins);

                    // Vérifier si des médecins sont trouvés
                    if ($result_medecins->num_rows > 0) {
                        // Afficher les médecins dans le menu déroulant
                        while($row = $result_medecins->fetch_assoc()) {
                            echo "<option value='" . $row["id"] . "'>" . $row["nom"] . " " . $row["prenom"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Aucun médecin trouvé</option>";
                    }
                    ?>
                </select>
                <label for="date_prescription">Date Prescription :</label>
                <input type="date" id="date_prescription" name="date_prescription" required>
                <label for="medicament">Médicament :</label>
                <input type="text" id="medicament" name="medicament" required>
                <label for="posologie">Posologie :</label>
                <input type="text" id="posologie" name="posologie" required>
                <label for="instructions">Instructions :</label>
                <input type="text" id="instructions" name="instructions" required>
                <button type="submit">Ajouter Prescription</button>
            </form>
        </section>
    </main>
    <?php
    // Fermer la connexion à la base de données
    $conn->close();
    ?>
</body>
</html>
