<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <style>
        *, ::before, ::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: montserrat, sans-serif;
        }
        .contGlobal {
            display: flex;
            min-height: 100vh;
        }
        /* Gauche */
        .panneauGauche {
            flex: 1 1 33.333%;
            padding: 25px;
        }
        .panneauGauche h1 {
            color: #8b97d7;
            font-size: 48px;
            font-weight: 400;
            margin-bottom: 50px;
        }
        .panneauGauche h1 strong {
            color: #5260ad;
            font-weight: 900;
        }
        .formBloc h3 {
            color: #666;
            font-size: 28px;
            font-weight: 500;
            margin-bottom: 45px;
        }
        .formBloc .formGroupe {
            position: relative;
            display: flex;
            margin-bottom: 45px;
        }
        .formBloc .formGroupe label {
            position: absolute;
            top: 50%;
            left: 0px;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 20px;
            transition: 0.4s ease-out;
        }
        .formBloc .formGroupe input {
            display: block;
            width: 100%;
            padding: 10px 0px;
            border: none;
            outline: none;
            background: none;
            border-bottom: 3px solid #aaa;
            color: #666;
            font-size: 20px;
            transition: 0.4s ease-out;
        }
        .formGroupe:nth-child(4) {
            margin-bottom: 25px;
            justify-content: flex-end;
        }
        .formBloc .formGroupe .buttonSub {
            display: block;
            width: auto;
            padding: 15px 60px;
            border: 3px solid #8b97d7;
            border-radius: 999px;
            background-image: linear-gradient(to right, transparent 50%, #5260ad 50%, #8b97d7);
            background-size: 200%;
            color: #8b97d7;
            font-size: 24px;
            font-weight: 500;
            cursor: pointer;
        }
        .formBloc .formGroupe .buttonSub:hover {
            color: #fff;
            background-position: 100%;
            border: 3px solid #fff;
        }
        .formBloc .mdpPerdu a {
            color: #8b97d7;
            font-size: 16px;
            font-weight: 400;
            text-decoration: none;
            padding-bottom: 5px;
            border-bottom: 2px solid transparent;
        }
        .formBloc .mdpPerdu a:hover {
            border-bottom-color: #8b97d7;
        }
        /* Droite */
        .panneauDroit {
            flex: 1 1 66.666%;
            background-image: linear-gradient(to bottom right, rgb(149,166,243), rgb(112,113,146));
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .panneauDroit h2 {
            color: #fff;
            font-size: 25px;
            font-weight: 20;
            text-align: center;
        }
        /* Animation */
        .formBloc .formGroupe:focus-within label,
        .formBloc .formGroupe.animation label {
            top: 0px;
            transform: translateY(-100%);
            color: #8b97d7;
        }
        .formBloc .formGroupe:focus-within input,
        .formBloc .formGroupe.animation input {
            border-bottom-color: #8b97d7;
        }
        @media screen and (max-width: 1200px) {
            .contGlobal {
                flex-direction: column;
                min-height: 100vh;
                width: 100vw!important;
                align-items: center;
            }
            .panneauDroit {
                display: none;
            }
            .panneauGauche {
                width: 70vw!important;
                padding: 25px;
            }
        }
        @media screen and (max-width: 700px) {
            .panneauGauche {
                width: 80vw!important;
            }
            .formBloc .formGroupe .buttonSub {
                margin: 0 auto;
            }
            .mdpPerdu {
                text-align: center;
            }
        }
        @media screen and (max-width: 400px) {
            .panneauGauche {
                width: 100vw!important;
            }
        }
    </style>
</head>
<body>
    <div class="contGlobal">
        <div class="panneauGauche">
            <h1><strong>MediConnect</strong> Plateforme de Gestion Médicale</h1>
            <form class="formBloc" method="post" action="authentifier.php">
                <h3>Identifiez-vous</h3>
                <div class="formGroupe">
                    <label for="utilisateur">Utilisateur</label>
                    <input type="text" required maxlength="16" id="utilisateur" name="utilisateur">
                </div>
                <div class="formGroupe">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" required maxlength="16" id="mdp" name="motpasse">
                </div>
                <div class="formGroupe">
                    <input type="submit" value="LOGIN" class="buttonSub">
                </div>
                <div class="mdpPerdu">
                    <a href="#">Mot de passe oublié ?</a>
                </div>
            </form>
            <div class="inscription">
                <p>Vous n'avez pas de compte ?</p>
                <a href="inscription.php" class="buttonInscription">S'inscrire</a>
            </div>
        </div>
        <div class="panneauDroit">
            <div class="illustration">
                <img src="images/medicine-doctor-using-digital-tablet-and-smartphone-diagnose-virtual-electronic-medical-record-on-interface-digital-healthcare-and-network-on-virtual-screen-medical-technology-photo.jpg" alt="illustration" class="img-fluid">
            </div>
            <h2>Santé connectée, dossier médical sécurisé : Votre bien-être entre vos mains!</h2>
        </div>
    </div>
    <script>
        const input_fields = document.querySelectorAll('input');
        for (let i = 0; i < input_fields.length; i++) {
            let field = input_fields[i];
            field.addEventListener('input', function(e){
                if(e.target.value != ""){
                    e.target.parentNode.classList.add('animation');
                } else if (e.target.value == "") {
                    e.target.parentNode.classList.remove('animation');
                }
            })
        }
    </script>
</body>
</html>
