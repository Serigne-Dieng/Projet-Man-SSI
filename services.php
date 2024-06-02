<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
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
    <h2>Cliquez sur la rubrique choisie !</h2>
    <div class="feature">
        <a href="gestion_patients.php">
            <img src="images/images (2).jpeg" alt="Image 1">
            <p class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Gérer Les Patients</p>
        </a>
    </div>
    <div class="feature">
        <a href="planification_rendezvous.php">
            <img src="images/téléchargement.jpeg" alt="Image 2">
            <p>Planification Rendez-vous</p>
        </a>
    </div>
    <div class="feature">
        <a href="gestion_prescriptions.php">
            <img src="images/images (1).jpeg" alt="Image 3">
            <p>Prescriptions</p>
        </a>
    </div>
    <div class="feature">
        <a href="">
            <img src="images/téléchargement (1).jpeg" alt="Image 3">
            <p>Traitements</p>
        </a>
    </div>
    <div class="feature">
        <a href="gestion_medecins.php">
            <img src="images/images (6).jpeg" alt="Image 3">
            <p>Gerer Les médecins</p>
        </a>
    </div>
</main>

<footer>
    <p>&copy; 2024 <strong>MediConnect</strong>. Tous droits réservés.</p>
</footer>

</body>
</html>
