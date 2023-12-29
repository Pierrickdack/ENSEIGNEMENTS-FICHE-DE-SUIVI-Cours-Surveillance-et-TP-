
            <?php
              $server="localhost";
              $pass="";
              $login="root";
              try{
                $connexion=new PDO("mysql:host=$server;dbname=ict201",$login,$pass);
                $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if(isset($_POST['delete_btn'])){
                    $id=$_POST['delete_id'];
                    session_start();
                    $_SESSION['id']=$id;
                    header('Location:/chef_php/view.php');
                }
              }
              catch(PDOException $e){
                  echo "error";
              }
            ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dashboard Template · Bootstrap v5.1</title>


    

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
      button{
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
            <a class="nav-link" href="./UE.php">
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
            <a class="nav-link active" href="#">
              <span data-feather="file-text"></span>
              ICT4D L3
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

      <h2>Fiches de presence L3</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm" id="list">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Professeur</th>
              <th scope="col">U.E</th>
              <th scope="col">Date</th>
              <th scope="col">Semestre</th>
              <th scope="col">Horaire</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            
          <?php
              $server="localhost";
              $pass="";
              $login="root";
              try{
                $connexion=new PDO("mysql:host=$server;dbname=ict201",$login,$pass);
                $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if(isset($_POST['edit_btn'])){
                    $id=$_POST['edit_id'];
                    $request=$connexion -> prepare("SELECT ID_fiche FROM `fiche`");
                    $request -> execute();
                    $resultat=$request -> fetchall();
                    for ($i=0; $i < count($resultat); $i++) { 
                      if($id==$resultat[$i][0]){
                        $request=$connexion -> prepare("DELETE FROM fiche where ID_fiche='$id'");
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
            try{
              $connexion=new PDO("mysql:host=$server;dbname=ict201",$login,$pass);
              $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $request=$connexion -> prepare("SELECT ID_ue FROM `ue` WHERE niveau_ue='3'");
              $request -> execute();
              $resultat1=$request -> fetchall();
              $request=$connexion -> prepare("SELECT ID_fiche,ID_prof,ID_ue,dat,semestre,Heure_total FROM `fiche`");
              $request -> execute();
              $resultat2=$request -> fetchall();
              for ($i=0; $i < count($resultat2); $i++) { 
                for ($k=0; $k < count($resultat1) ; $k++) { 
                  if($resultat1[$k][0]==$resultat2[$i][2]){
                    $a1=$resultat2[$i][0];
                    $a2=$resultat2[$i][1];
                    $a3=$resultat2[$i][2];
                    $a4=$resultat2[$i][3];
                    $a5=$resultat2[$i][4];
                    $a6=$resultat2[$i][5];
                    $request=$connexion -> prepare("SELECT code_ue FROM `ue` WHERE ID_ue='$a3'");
                    $request -> execute();
                    $resultat3=$request -> fetchall();
                    $a3=$resultat3[0][0];
                    $request=$connexion -> prepare("SELECT Nom_prof FROM `prof` where ID_prof='$a2'");
                    $request -> execute();
                    $resultat3=$request -> fetchall();
                    $a2=$resultat3[0][0];
                    echo"
                    <tr>
                    <td>
                      <form action='".htmlspecialchars($_SERVER['PHP_SELF'])."' method='post'>
                        <input type='hidden' name='delete_id' value='$a1'>
                        <button type='submit' name='delete_btn' style='color : #2470dc;'><i class='fas fa-square-plus'></i></button>
                      </form>
                    </td>
                      <td>$a2</td>
                      <td class='No'>$a3</td>
                      <td>$a4</td>
                      <td>$a5</td>
                      <td>$a6</td>
                      <td>
                        <form action='' method='post'>
                          <input type='hidden' name='edit_id' value='$a1'>
                          <button  type='submit' name='edit_btn' style='color : red;'><i class='fas fa-square-xmark'></i></button>
                        </form>
                      </td>
                    </tr>"; 
                    break;
                  }
                } 
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
          <p class="mb-1">&copy; 2022–2023 ICT4D</p>
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
      <script>
                /* globals Chart:false, feather:false */

(function () {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  var ctx = document.getElementById('myChart')
  // eslint-disable-next-line no-unused-vars
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      
      labels: [
        <?php
              $server="localhost";
              $pass="";
              $login="root";
            try{
              $connexion=new PDO("mysql:host=$server;dbname=ict201",$login,$pass);
              $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $request=$connexion -> prepare("SELECT `code_ue`,`ID_ue` FROM `ue` WHERE niveau_ue='3' ORDER BY `ID_ue` ASC");
              $request -> execute();
              $resultat=$request -> fetchall();
              $a=$resultat[0][0];
              echo "'$a'";
              for ($i=1; $i < count($resultat); $i++) { 
                $a=$resultat[$i][0];
                echo ",'$a'"; 
              }
            }
            catch(PDOException $e){
              echo "error";
            }
      ?>
      ],
      datasets: [{
        data: [
          <?php
              $server="localhost";
              $pass="";
              $login="root";
            try{
              $connexion=new PDO("mysql:host=$server;dbname=ict201",$login,$pass);
              $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $request=$connexion -> prepare("SELECT ID_ue FROM `ue` WHERE niveau_ue='3' ORDER BY `ID_ue` ASC");
              $request -> execute();
              $resultat1=$request -> fetchall();
              for ($i=0; $i < count($resultat1); $i++) { 
                $a=$resultat1[$i][0];
                $request=$connexion -> prepare("SELECT Heure_total FROM `fiche` WHERE ID_ue='$a'");
                $request -> execute();
                $resultat2=$request -> fetchall();
                $n=0;
                for ($j=0; $j < count($resultat2) ; $j++) { 
                  $Heu=$resultat2[$j][0];
                  $He=str_split($Heu);
                  $H=(int)($He[0].$He[1])*3600 + (int)($He[3].$He[4])*60;
                  $H=(float)($H/3600);
                  $n=$n+$H;
                }
                echo "'$n',";
              }
            }
            catch(PDOException $e){
              echo "error";
            }
      ?>
        ],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        //pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })
})()
      </script>
  </body>
</html>
