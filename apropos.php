<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
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
            display: flex; /* Alignement des éléments sur la ligne */
            justify-content: space-between; /* Espacement uniforme des éléments */
            align-items: center;
        }
        .nav-links {
            display: flex;
            justify-content: center;
            flex-grow: 1; /* Prendre tout l'espace disponible pour centrer */
        }
        .nav-links a {
            color: #fff;
            text-decoration: none;
            padding: 0 15px;
        }
        .nav-links a:hover {
            text-decoration: underline;
        }
        main {
            flex: 1; /* Prend autant d'espace vertical que possible */
            padding: 50px;
            color: #333;
            text-align: center;
        }
        .about {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .about h2 {
            color: #5260ad;
            margin-bottom: 20px;
        }
        .about p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .about img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        footer {
            background-color: #5260ad;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        .logout {
            padding: 0 15px;
            background-color: #5260ad;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .logout a {
            color: #fff;
            text-decoration: none;
            padding: 0 15px;
        }
        .logout a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header>
    <h1>Plateforme de Gestion Médicale</h1>
</header>

<nav>
    <div class="nav-links">
        <a href="accueil.php">Accueil</a>
        <a href="services.php">Services</a>
        <a href="contact.php">Contact</a>
        <a href="apropos.php">À propos</a>
    </div>
    <div class="logout">
        <a href="deconnexion.php">Se déconnecter</a>
    </div>
</nav>

<main>
    <!-- Contenu principal de la page -->
    <div class="about">
        <h2>À propos de MediConnect</h2>
        <p>
            Bienvenue sur MediConnect, votre solution de gestion médicale de confiance. Nous nous engageons à fournir des services de santé de qualité supérieure en simplifiant la gestion des patients, la planification des rendez-vous, le suivi des prescriptions, traitements etc...
        </p>
        <p>
            Notre plateforme est conçue pour les professionnels de santé afin de les aider à mieux gérer leur pratique quotidienne tout en offrant des soins exceptionnels à leurs patients. Chez MediConnect, nous croyons que la technologie peut révolutionner la manière dont les soins de santé sont administrés, en les rendant plus efficaces et accessibles.
        </p>
         <!-- <img src="images/about_us.jpg" alt="À propos de nous">-->
        
    </div>
</main>

<footer>
    <p>&copy; 2024 <strong>MediConnect</strong>. Tous droits réservés.</p>
</footer>

</body>
</html>
