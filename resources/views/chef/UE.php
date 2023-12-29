<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dashboard</title>


    

    <!-- Bootstrap core CSS -->
<link href="./CSS/bootstrap.min.css" rel="stylesheet">
<link rel="icon" type="image/png" sizes="16x16" href="./IMG/UY1.png">
<link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/all.min.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      #edit_btn{
        border : none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="./CSS/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#" style="text-align: center;">ICT4D</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" id="search" type="text" placeholder="Search" aria-label="Search" onkeyup="filtrer()">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="./index.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./dashb.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./poubelle.php">
              <span data-feather="file"></span>
              Corbeille
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./custum.php">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="layers"></span>
              U.E
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./prof.php">
              <span data-feather="grid"></span>
              Professeur
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="./ICTL1.php">
              <span data-feather="file-text"></span>
              ICT4D L1
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./ICTL2.php">
              <span data-feather="file-text"></span>
              ICT4D L2
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./ICTL3.php">
              <span data-feather="file-text"></span>
              ICT4D L3
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container col-xl-10 col-xxl-8 px-4 py-5">
            <div class="row align-items-center g-lg-5 py-5">
              <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Gestion des Unités d'enseignement</h1>
                <p class="col-lg-10 fs-4">Cette section est reserve uniquement au chef et à la gestion des unités d'enseignement (UE) notament la suppression et l'ajout.<span style="color:red;"> le nom de l'UE doit respecter la convention premier chiffre égal niveau.</span></p>
              </div>
              <div class="col-md-10 mx-auto col-lg-5">
                <form class="p-4 p-md-5 border rounded-3 bg-light" id="addForm" method="post">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingMat" name="ues" required>
                    <label for="floatingInput">Unités d'enseignement</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingNiv" name="niv" max="3" min="1" required>
                    <label for="floatingInput">Niveau</label>
                  </div>
                  <div class="form-floating mb-3">
                    <select class="form-select" id="state" name="profe" required>
                      <option value="">Professeur</option>
                      <?php
                        $server="localhost";
                        $pass="";
                        $login="root";
                        try{
                          $connexion=new PDO("mysql:host=$server;dbname=ict201",$login,$pass);
                          $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                          $request=$connexion -> prepare("SELECT `Nom_prof` FROM `prof`");
                          $request -> execute();
                          $resultat1=$request -> fetchall();
                          for ($i=0; $i <count($resultat1) ; $i++) { 
                            echo"<option>".$resultat1[$i][0]."</option>";
                          }
                        }
                        catch(PDOException $e) {
                          echo 'Failed to connect to MySql';	
                        }
                      ?>
                    </select>
                  </div>
                  <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Ajouter</button>
                </form>
              </div>
            </div>
          </div>
      <h2>Liste des Unités d'enseignement</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Unités d'enseignement</th>
              <th scope="col">Niveau</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody id="list">
          <?php
              $server="localhost";
              $pass="";
              $login="root";
              try{
                $connexion=new PDO("mysql:host=$server;dbname=ict201",$login,$pass);
                $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if(isset($_POST['edit_btn'])){
                    $id=$_POST['edit_id'];
                    $request=$connexion -> prepare("SELECT ID_ue FROM `ue`");
                    $request -> execute();
                    $resultat=$request -> fetchall();
                    for ($i=0; $i < count($resultat); $i++) { 
                      if($id==$resultat[$i][0]){
                        $request=$connexion -> prepare("DELETE FROM ue where ID_ue='$id'");
                        $request -> execute();
                        break;
                      }
                    }
                }
              }
              catch(PDOException $e){
                  echo "error";
              }
            ?>
          <?php
              $server="localhost";
              $pass="";
              $login="root";
              $bool=1;
              try{
                $connexion=new PDO("mysql:host=$server;dbname=ict201",$login,$pass);
                $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $request=$connexion -> prepare("SELECT * FROM `ue` ORDER BY `niveau_ue` ASC");
                $request -> execute();
                $resultat=$request -> fetchall();
                if(isset($_POST['submit'])){
                  $a=$_POST['ues'];
                  $b=$_POST['niv'];
                  $c=$_POST['profe'];
                  $request=$connexion -> prepare("SELECT ID_prof FROM `prof` where nom_prof='$c'");
                  $request -> execute();
                  $resultat2=$request -> fetchall();
                  $c=$resultat2[0][0];
                  for ($i=0; $i < count($resultat); $i++) {
                    if(strcasecmp($a,$resultat[$i][1])==0 || $c==$resultat[$i][4]){
                      $bool=0;
                      echo "<p style='color:red;'>Cette unité d'enseignement existe deja.</p>";
                      break;
                    }
                  }
                  if($bool==1){
                    $insertion ="INSERT INTO ue(code_ue,niveau_ue,ID_chef,ID_prof)VALUES('$a','$b','123456','$c')";
                    $connexion -> exec($insertion);
                  }
                }
                $request=$connexion -> prepare("SELECT * FROM `ue` ORDER BY `niveau_ue` ASC");
                $request -> execute();
                $resultat=$request -> fetchall();
                for ($i=0; $i < count($resultat); $i++) { 
                  $a1=$resultat[$i][0];
                  $a2=$resultat[$i][1];
                  $a3=$resultat[$i][2];
                  echo "<tr>
                    <td>".($i+1)."</td>
                    <td class='No'>$a2</td>
                    <td>$a3</td>
                    <td>
                      <form action='' method='post'>
                        <input type='hidden' name='edit_id' value='$a1'>
                        <button id='edit_btn' type='submit' name='edit_btn' style='color : red;'><i class='fas fa-square-xmark'></i></button>
                      </form>
                    </td>
                  </tr>";
                }
              }
              catch(PDOException $e){
                echo "error";
              }
            ?>
          </tbody>
        </table>
      </div>
      <footer class="text-muted py-5" style="height: 0px;">
        <div class="container">
          <p class="float-end mb-1">
            <a href="#">Back to top</a>
          </p>
          <p class="mb-1">&copy; 2022 2023 ICT4D</p>
        </div>
      </footer>
    </main>
  </div>
</div>

<script>
    //recherche
    function filtrer() {
	var filtre, liste, ligne, cellule, texte ;
	filtre=document.getElementById('search').value.toUpperCase();
	liste=document.getElementById('list');
	ligne=document.getElementsByTagName('td');

	for (let i = 0; i < ligne.length; i++) {
    if(ligne[i].classList.contains("No")){
		cellule=ligne[i];
		if (cellule) {
			texte=cellule.innerText;
			if(texte.toUpperCase().indexOf(filtre)>-1){
				ligne[i].parentElement.style.display="";
			}
			else{
				ligne[i].parentElement.style.display="none";
			}
		}
	}}
}
  </script>
    <script src="./JS/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="./JS/dashboard.js"></script>
  </body>
</html>
