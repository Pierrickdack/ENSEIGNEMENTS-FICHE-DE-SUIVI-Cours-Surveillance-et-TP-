<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset/Images/UY1.png') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign in delegue</title>
        <!-- font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- css stylesheet -->
        <link rel="stylesheet" href="../css/delsignin.css">
    </head>
    <body>

        <div class="container">
            <span class="big-circle"></span>
            <img src="{{ asset('asset/Images/UY1.png') }}" class="square">
            <div class="form">
                <div class="contact-info">
                    <h3 class="title">Bienvenu(e) Délégué</h3><br>
                    <div class="information">
                        <img src="{{ asset('asset/Images/del.png') }}" class="icon">
                    </div>
                    <p class="text">&nbsp;&nbsp;&nbsp;&nbsp;Veuillez remplir vos informations de connexion dans le formulaire à gauche </p>
                    <div class="info">
                        <div>
                            <button class="btnback" onclick="goBack()">
                                <i class="fas fa-arrow-left"></i> Retour
                            </button>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <span class="circle one"></span>
                    <span class="circle two"></span>



                    <form action="{{ route('delegue.login') }}" method="POST">
                        @csrf

                        <h3 class="title">Sign In</h3><br>

                        <div class="input-container">
                            <input type="text" name="name" class="input" required>
                            <label for="name">Username</label>
                            <span>Username</span>
                        </div>

                        <div class="input-container">
                            <input type="password" name="password" class="input" required>
                            <label for="password">Password</label>
                            <span>Password</span>
                        </div><br><br>

                        <input type="submit" value="Connexion" class="btn">

                        <br><br><br><br><br><br>

                        <div class="compte">
                            <a href="#">Mot de passe oublié ?</a><br><br>
                            <a href="#">Pas de compte ?</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    <script src="../js/del.js"></script>

    </body>
</html>
