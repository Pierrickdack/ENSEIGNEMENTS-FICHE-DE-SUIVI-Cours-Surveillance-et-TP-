<?php
  session_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="icon" type="image/png" sizes="16x16" href="./IMG/UY1.png">
    <title>Document</title>
    <style>
      #capture{ 
        border:1px solid grey;
        width:200px;
        height:150px;
        margin-top: 2%;
        overflow: hidden;
      }
    </style>
</head>
<body>
    <div class="principal">
        <div class="formu">
            <p><img src="./IMG/UY1.png" alt="note" width="5%"></p>
            <h1>Fiche de presence (vue)</h1>
            <form action="./dashb.php">
                <?php
                    $server="localhost";
                    $pass="";
                    $login="root";
                    try{
                        $connexion=new PDO("mysql:host=$server;dbname=ict201",$login,$pass);
                        $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $id=$_SESSION['id'];
                        $request=$connexion -> prepare("SELECT * FROM `fiche` WHERE ID_fiche='$id'");
                        $request -> execute();
                        $resultat=$request -> fetchall();
                        $id=$resultat[0][11];
                        $request=$connexion -> prepare("SELECT * FROM `delegue` WHERE Matricule='$id'");
                        $request -> execute();
                        $resultat2=$request -> fetchall();
                        $id=$resultat[0][14];
                        $request=$connexion -> prepare("SELECT ID_prof,code_ue FROM `ue` WHERE ID_ue='$id'");
                        $request -> execute();
                        $resultat3=$request -> fetchall();
                        $id=$resultat3[0][0];
                        $a='non';
                        if($resultat[0][10]=='1'){
                            $a='oui';
                        }
                        $request=$connexion -> prepare("SELECT Nom_prof FROM `prof` WHERE ID_prof='$id'");
                        $request -> execute();
                        $resultat4=$request -> fetchall();
                        echo "
                        <div class='section1'>
                            <fieldset>
                                <legend>Informations sur le delegué</legend>
                                <div>
                                    <label for=''>ID / Matricule : </label>
                                    ".$resultat[0][12]."
                                </div>
                                <div>
                                    <label for=''>Nom du delegué : </label>
                                    ".$resultat2[0][1]."
                                </div>
                                <div>
                                    <label for=''>Niveau : </label>
                                    ".$resultat2[0][2]."
                                </div>
                            </fieldset>
                        </div>
                        <div class='section2'>
                            <fieldset>
                                <legend>Informations personnelles</legend>
                                <div>
                                    <label for=''>Nom du professeur: </label>
                                    ".$resultat4[0][0]."
                                </div>
                                <div>
                                    <label for=''>Unité d'enseignement : </label>
                                    ".$resultat3[0][1]."
                                </div>
                                <div>
                                    <label for=''>Date : </label>
                                    ".$resultat[0][5]."
                                </div>
                                <div>
                                    <label for=''>Semestre : </label>
                                    ".$resultat[0][6]."
                                </div>
                                <div>
                                    <label for=''>Horaire : </label>
                                    ".$resultat[0][4]."
                                </div>
                            </fieldset>
                        </div>
                        <div class='section3'>
                            <fieldset>
                                <legend>Autres</legend>
                                <div>
                                    <label for=''>Seance de : </label>
                                    ".$resultat[0][8]."
                                </div>
                                <div>
                                    <label for=''>Heure de debut : </label>
                                    ".$resultat[0][2]."
                                </div>
                                <div>
                                    <label for=''>Heure de fin : </label>
                                    ".$resultat[0][3]."
                                </div>
                                <div>
                                    <label for=''>Titre de la seance : </label>
                                    ".$resultat[0][1]."
                                </div>
                                <div>
                                    <label for=''>Salle : </label>
                                    ".$resultat[0][7]."
                                </div>
                            </fieldset>
                        </div>
                        <div class='section4'>
                            <fieldset>
                                <legend>Certification</legend>
                                <div>
                                    <label for=''>Delegue : </label>
                                    ".$a."
                                </div>
                                <div>
                                    <label for=''>Professeur : </label>
                                    <div id='capture'><img src='".$resultat[0][10]."' alt='signature'></div>
                                </div>
                            </fieldset>
                        </div>";
                        
                    }
                    catch(PDOException $e){
                        echo "Connexion failed";
                    }
                ?>
                <div class="val">
                    <button type="submit">Valider</button>
                </div>   
            </form>
        </div>
        <footer>&copy; 2022–2023 ICT4D.</footer>
    </div>
</body>
</html>