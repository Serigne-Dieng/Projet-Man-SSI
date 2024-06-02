<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
        }
        header {
            background-color: #5260ad;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            width: 100%;
        }
        footer {
            background-color: #5260ad;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            width: 100%;
            margin-top: auto; 
        }
        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex: 1; /* Remplissage de l'espace disponible */
            padding: 20px;
        }
        h2 {
            margin-bottom: 20px;
            color: #5260ad;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            display: flex;
            flex-direction: column;
            align-items: center; /* Centrer horizontalement les éléments du formulaire */
        }
        form div {
            width: 100%;
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        input[type="password"] {
            width: calc(100% - 16px); /* Ajuster la largeur pour tenir compte du padding */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button[type="submit"] {
            background-color: #5260ad;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #3c4f87;
        }
        .message {
            margin-top: 20px;
            color: #5260ad;
        }
        .login-link {
            margin-top: 10px;
            color: #5260ad;
            text-decoration: none;
        }
    </style>
</head>
<body>

<header>
    <h1>Plateforme de Gestion Médicale</h1>
</header>

<main>
    <h2>Inscription</h2>
    <form action="inscription.php" method="post">
        <div>
            <label for="utilisateur">Nom d'utilisateur :</label>
            <input type="text" id="utilisateur" name="utilisateur" required>
        </div>
        <div>
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required>
        </div>
        <div>
            <button type="submit">S'inscrire</button>
        </div>
    </form>

    <?php
        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = ""; 
        $dbname = "gestion_dossiers_medicaux";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérification de la connexion
        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué : " . $conn->connect_error);
        }

        // Traitement du formulaire d'inscription
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $utilisateur = $_POST['utilisateur'];
            $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT); // Hashage du mot de passe

            // Requête pour insérer les informations dans la base de données
            $sql = "INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe) VALUES ('$utilisateur', '$mot_de_passe')";

            if ($conn->query($sql) === TRUE) {
                echo "<p class='message'>Inscription réussie !</p>";
            } else {
                echo "<p class='message'>Erreur : " . $sql . "<br>" . $conn->error . "</p>";
            }
        }

        // Fermer la connexion à la base de données
        $conn->close();
    ?>
    <a href="login.php" class="login-link">Déjà inscrit ? Connectez-vous ici</a>
</main>

<footer>
    <p>&copy; 2024 <strong>MediConnect</strong>. Tous droits réservés.</p>
</footer>

</body>
</html>
