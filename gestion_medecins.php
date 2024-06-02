<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Médecins</title>
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
            min-height: 100vh;
            overflow: auto;
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
        input[type="email"],
        select {
            width: calc(100% - 12px);
            padding: 6px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button[type="submit"], .edit-btn, .delete-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button[type="submit"]:hover, .edit-btn:hover, .delete-btn:hover {
            background-color: #45a049;
        }
        .edit-btn {
            background-color: #ffa500; /* Orange */
        }
        .delete-btn {
            background-color: #f44336; /* Red */
        }
    </style>
</head>
<body>
    <h1>Gestion des Médecins</h1>
    <main>
        <!-- Liste des Médecins -->
        <section>
            <h2>Liste des Médecins</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Spécialité</th>
                        <th>Adresse</th>
                        <th>Ville</th>
                        <th>Code Postal</th>
                        <th>Pays</th>
                        <th>Email</th>
                        <th>Téléphone</th>
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

                    // Récupérer les données des médecins depuis la base de données
                    $sql = "SELECT * FROM medecins";
                    $result = $conn->query($sql);

                    // Vérifier si des médecins sont trouvés
                    if ($result->num_rows > 0) {
                        // Afficher les médecins dans le tableau
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["nom"] . "</td>";
                            echo "<td>" . $row["prenom"] . "</td>";
                            echo "<td>" . $row["specialite"] . "</td>";
                            echo "<td>" . $row["adresse"] . "</td>";
                            echo "<td>" . $row["ville"] . "</td>";
                            echo "<td>" . $row["code_postal"] . "</td>";
                            echo "<td>" . $row["pays"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["telephone"] . "</td>";
                            echo "<td><button class='edit-btn'>Edit</button><button class='delete-btn'>Delete</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>Aucun médecin trouvé.</td></tr>";
                    }

                    // Fermer la connexion à la base de données
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Formulaire d'Ajout de Médecin -->
        <section>
            <h2>Ajouter un Nouveau Médecin</h2>
            <form action="ajouter_medecin.php" method="post">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
                <label for="specialite">Spécialité :</label>
                <input type="text" id="specialite" name="specialite" required>
                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse" required>
                <label for="ville">Ville :</label>
                <input type="text" id="ville" name="ville" required>
                <label for="code_postal">Code Postal :</label>
                <input type="text" id="code_postal" name="code_postal" required>
                <label for="pays">Pays :</label>
                <input type="text" id="pays" name="pays" required>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
                <label for="telephone">Téléphone :</label>
                <input type="text" id="telephone" name="telephone" required>
                <button type="submit">Ajouter Médecin</button>
            </form>
        </section>
    </main>
</body>
</html>
