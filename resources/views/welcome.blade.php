<!DOCTYPE html>
<html lang="fr">



    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{ asset('css/accueil.css') }}">
        <script src="js/redirection.js"></script>
        <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.min.css">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset/Images/UY1.png') }}">
        <title>Accueil</title>
    </head>

    <body>
        <nav>
            <img src="{{ asset('asset/Images/UY1.png') }}" alt="Image Gauche">
            <img src="{{ asset('asset/Images/ICT4D.jpg') }}" alt="Image Droite">
        </nav>


        <div class="welcome-card">
            <div id="message">
                Bienvenue dans votre plateforme de suivi des <b><span id="dynamic-word">Enseignements</span></b>
            </div>
            <img src="{{ asset('asset/Images/welcome.svg') }}" alt="welcome">
        </div>

        <div class="type">
            <button id="mode" onclick="scrollToCardContainer()">
                Get Started
            </button>
            <p>Choisissez un type de connexion parmi les trois options ci-dessous :</p>
        </div>


        <div id="card-container" class="card-container">
            <div class="card">
                <div class="card-content">
                    <h3>Chef de département</h3>
                    <p>Description de la card. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="{{ route('signinchef') }}" class="login-button">
                        <i class="fas fa-sign-in-alt"></i> Connexion
                    </a>
                </div>
                <img src="{{ asset('asset/Images/chef.png') }}" alt="Image de la card">
            </div>

            <div class="card">
                <div class="card-content">
                    <h3>Professeur</h3>
                    <p>Description de la card. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="{{ route('signinprof') }}" class="login-button">
                        <i class="fas fa-sign-in-alt"></i> Connexion
                    </a>
                </div>
                <img src="{{ asset('asset/Images/prof.png') }}" alt="Image de la card">
            </div>

            <div class="card">
                <div class="card-content">
                    <h3>Délégué</h3>
                    <p>Description de la card. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="{{ route('signin') }}" class="login-button">
                        <i class="fas fa-sign-in-alt"></i> Connexion
                    </a>
                </div>
                <img src="{{ asset('asset/Images/del.png') }}" alt="Image de la card">
            </div>

        </div>

        <button class="back-to-top" onclick="scrollToTop()"></button>

        <footer>
            <p>ICT4D &copy; 2024 - Tous droits réservés.</p>
        </footer>
    </body>

</html>
