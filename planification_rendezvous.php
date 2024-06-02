<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Rendez-vous</title>
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
        input[type="time"],
        textarea,
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
    <h1>Gestion des Rendez-vous</h1>
    <main>
        <!-- Liste des Rendez-vous -->
        <section>
            <h2>Liste des Rendez-vous</h2>
            <table>
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Médecin</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Durée</th>
                        <th>État</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Inclure le fichier de configuration de la base de données
                    require_once('config.php');

                    // Vérifier si la connexion à la base de données est établie
                    if ($conn === false) {
                        die("Erreur : Impossible de se connecter à la base de données.");
                    }

                    // Récupérer les données des rendez-vous depuis la base de données
                    $sql = "SELECT r.id, r.date_rendez_vous, r.heure_debut, r.duree, r.etat, 
                                    p.nom AS patient_nom, p.prenom AS patient_prenom, 
                                    m.nom AS medecin_nom, m.prenom AS medecin_prenom 
                            FROM rendez_vous r 
                            JOIN patients p ON r.patient_id = p.id 
                            JOIN medecins m ON r.medecin_id = m.id";
                    $result = $conn->query($sql);

                    // Vérifier si des rendez-vous sont trouvés
                    if ($result->num_rows > 0) {
                        // Afficher les rendez-vous dans le tableau
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["patient_nom"] . " " . $row["patient_prenom"] . "</td>";
                            echo "<td>" . $row["medecin_nom"] . " " . $row["medecin_prenom"] . "</td>";
                            echo "<td>" . $row["date_rendez_vous"] . "</td>";
                            echo "<td>" . $row["heure_debut"] . "</td>";
                            echo "<td>" . $row["duree"] . " minutes</td>";
                            echo "<td>" . $row["etat"] . "</td>";
                            echo "<td><button>Edit</button><button>Delete</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Aucun rendez-vous trouvé.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Formulaire d'Ajout de Rendez-vous -->
        <section>
            <h2>Ajouter un Nouveau Rendez-vous</h2>
            <form action="ajouter_rendezvous.php" method="post">
                <label for="patient_id">Patient :</label>
                <select id="patient_id" name="patient_id" required>
                    <?php
                    // Récupérer les patients pour les options du formulaire
                    $sql_patients = "SELECT id, nom, prenom FROM patients";
                    $result_patients = $conn->query($sql_patients);

                    if ($result_patients->num_rows > 0) {
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
                    // Récupérer les médecins pour les options du formulaire
                    $sql_medecins = "SELECT id, nom, prenom FROM medecins";
                    $result_medecins = $conn->query($sql_medecins);

                    if ($result_medecins->num_rows > 0) {
                        while($row = $result_medecins->fetch_assoc()) {
                            echo "<option value='" . $row["id"] . "'>" . $row["nom"] . " " . $row["prenom"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Aucun médecin trouvé</option>";
                    }
                    ?>
                </select>
                <label for="date_rendez_vous">Date :</label>
                <input type="date" id="date_rendez_vous" name="date_rendez_vous" required>
                <label for="heure_debut">Heure :</label>
                <input type="time" id="heure_debut" name="heure_debut" required>
                <label for="duree">Durée (minutes) :</label>
                <input type="text" id="duree" name="duree" required>
                <label for="etat">État :</label>
                <select id="etat" name="etat" required>
                    <option value="Planifié">Planifié</option>
                    <option value="Confirmé">Confirmé</option>
                    <option value="Annulé">Annulé</option>
                </select>
                <button type="submit">Ajouter Rendez-vous</button>
            </form>
        </section>
    </main>
    <?php
    // Fermer la connexion à la base de données
    $conn->close();
    ?>
</body>
</html>
