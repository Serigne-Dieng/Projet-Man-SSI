<?php
// Inclure le code pour vérifier l'authentification de l'utilisateur
// Exemple : require_once('authentification.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendez-vous</title>
    <style>
        /* Styles CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Définit la hauteur minimale de la page */
        }
        header {
            background-color: #5260ad;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        nav {
            background-color: #8b97d7;
            padding: 10px 0;
            text-align: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 0 15px;
        }
        nav a:hover {
            text-decoration: underline;
        }
        main {
            flex: 1; /* Prend autant d'espace vertical que possible */
            padding: 50px;
            color: #fff;
            text-align: center;
        }
        .feature {
            display: inline-block;
            margin: 20px;
        }
        .feature img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
        }
        footer {
            background-color: #5260ad;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <h1>Gestion Rendez-vous</h1>
</header>

<nav>
    <a href="accueil.php">Accueil</a>
    <a href="services.php">Services</a>
    <a href="contact.php">Contact</a>
    <a href="apropos.php">À propos</a>
</nav>

<main>
    
</main>

<footer>
    <p>&copy; 2024 <strong>MediConnect</strong>. Tous droits réservés.</p>
</footer>

</body>
</html>
