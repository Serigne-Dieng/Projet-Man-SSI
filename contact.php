<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
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
        .contact {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
        .contact h2 {
            color: #5260ad;
            margin-bottom: 20px;
        }
        .contact p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .contact form {
            display: flex;
            flex-direction: column;
        }
        .contact label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .contact input,
        .contact textarea {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            width: 100%;
        }
        .contact button {
            background-color: #5260ad;
            color: #fff;
            border: none;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .contact button:hover {
            background-color: #414a9c;
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
    <div class="contact">
        <h2>Contactez-nous</h2>
        <p>
            Nous serions ravis de vous entendre. Si vous avez des questions, des suggestions ou des préoccupations, n'hésitez pas à nous contacter via le formulaire ci-dessous ou en utilisant les informations de contact fournies.
        </p>
        <form action="envoyer_message.php" method="post">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
            
            <button type="submit">Envoyer</button>
        </form>
    </div>
</main>

<footer>
    <p>&copy; 2024 <strong>MediConnect</strong>. Tous droits réservés.</p>
</footer>

</body>
</html>
