<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
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
            color: #666;
            text-align: center;
            background-image: url('images/docteurs-connectes.jpg'); /* Chemin de l'image de fond */
            background-size: cover; /* Redimensionne l'image pour couvrir toute la zone */
            background-position: center; /* Centre l'image de fond */
            position: relative; /* Positionnement relatif pour les éléments enfants positionnés absolument */
        }
        .feature-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 300px; /* Hauteur de la boîte contenant les images */
            overflow: hidden; /* Masque le contenu qui dépasse */
            margin-top: 50px;
            position: relative; /* Permet de positionner le texte absolu */
        }
        .feature {
            margin: 0 10px;
            transition: transform 1s ease; /* Ajoute une transition pour une animation fluide */
        }
        .feature img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
        }
        .description {
            position: absolute;
            bottom: 20px; /* Ajuste la position verticale */
            left: 50%; /* Centre horizontalement */
            transform: translateX(-50%); /* Centre horizontalement */
            color: #0050fb;
            font-size: 24px;
            opacity: 0.7; /* Opacité du texte */
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
    <h1>Bienvenue sur la Plateforme !</h1>
    <div class="feature-container">
        <div class="feature"><img src="images/medecin-absorbe-par-taches-bureau-gestion-dossiers-patients-responsabilites-matiere-soins-sante_896558-19943.jpg" alt="Image 1"></div>
        <div class="feature"><img src="images/health-data.png" alt="Image 2"></div>
        <div class="feature"><img src="images/sasun-bughdaryan-RlIppR1I3E8-unsplash.jpg" alt="Image 3"></div>
        <!-- Ajoutez autant d'images que nécessaire -->
    </div>
    <div class="description"><strong>Une « plateforme » de données de santé : les attentes des citoyens</strong></div>
</main>

<footer>
    <p>&copy; 2024 <strong>MediConnect</strong>. Tous droits réservés.</p>
</footer>

<script>
    // Sélectionne toutes les images
    const images = document.querySelectorAll('.feature img');
    const description = document.querySelector('.description');

    let index = 0; // Démarre à la première image

    // Tableau de descriptions correspondant à chaque image
    const descriptions = [
        "Une meilleure prise en charge des patients",
        "Une planification parfaite assure..",
        "Meilleur suivi des prescriptions et des traitements."
    ];

    // Fonction pour changer l'image toutes les 3 secondes
    function changeImage() {
        // Applique une transformation pour déplacer les images
        images.forEach(image => {
            image.parentElement.style.transform = `translateX(-${index * 220}px)`; // 220px = largeur de l'image + marge
        });
        description.textContent = descriptions[index]; // Met à jour le texte de description
        index++; // Passe à l'image suivante
        if (index >= images.length) {
            index = 0; // Revient à la première image une fois arrivé à la dernière
        }
    }

    // Appelle la fonction de changement d'image toutes les 3 secondes
    setInterval(changeImage, 3000); // Change l'image toutes les 3 secondes (3000 millisecondes)
</script>

</body>
</html>
