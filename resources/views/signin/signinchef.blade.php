<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset/Images/UY1.png') }}">
        <title>Sign in chef</title>
        <!-- font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- css stylesheet -->
        <link rel="stylesheet" href="../css/chefsignin.css">
    </head>
    <body>
        
            <!-- <img src="../Images/del.png" class="avatar"> -->
            <div class="container">
        <span class="big-circle"></span>
        <img src="../Images/UY1.png" class="square">
        <div class="form">
            <div class="contact-info">
                <h3 class="title">Bienvenu(e) Mr/Mme</h3><br>
                <div class="information">
                    <img src="{{ asset('asset/Images/chef.png') }}" class="icon">
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


                <form action="contact.html">
                    <h3 class="title">Sign In</h3><br>
                    <div class="input-container">
                        <input type="text" name="name" class="input">
                        <label for="">Username</label>
                        <span>Username</span>
                    </div>
                    <div class="input-container">
                        <input type="Password" name="email" class="input">
                        <label for="">Password</label>
                        <span>Password</span>
                    </div><br><br>
                    <a href="#"><input type="submit" value="Connexion" class="btn"></a><br><br><br><br><br><br>
                    <div class="compte">
                        <a href="#">Mot de passe oublié ?</a><br><br>
                        <a href="#">Pas de compte ?</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <script src="../js/chef.js"></script>

    </body>
</html>