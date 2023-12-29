<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.88.1">
	<title>Signin</title>
	<!-- Bootstrap core CSS -->
	<link href="./CSS/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="./IMG/UY1.png">
	<style>
	.bd-placeholder-img {
		font-size: 1.125rem;
		text-anchor: middle;
		-webkit-user-select: none;
		-moz-user-select: none;
		user-select: none;
	}

	@media (min-width: 768px) {
		.bd-placeholder-img-lg {
		font-size: 3.5rem;
		}
	}
	</style>
	<!-- Custom styles for this template -->
	<link href="./CSS/signin.css" rel="stylesheet">
</head>
<body class="text-center">
	<main class="form-signin">
		<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
			<p style="text-align: center;"><img class="mb-4" src="./IMG/UY1.png" alt="" width="100" height="100" style="border: 1px solid white;"></p>
			<h1 class="h3 mb-3 fw-normal">Please sign in Chief</h1>
			<div class="form-floating">
				<input type="text" class="form-control" id="floatingInput" placeholder="Identifiant" name="id">
				<label for="floatingInput">Identifiant</label>
			</div>
			<div class="form-floating">
				<input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pas">
				<label for="floatingPassword">Password</label>
			</div>
			<div class="checkbox mb-3">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div>
			<button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
			<?php
				$server="localhost";
				$pass="";
				$login="root";
				try{
					$connexion=new PDO("mysql:host=$server;dbname=ict201",$login,$pass);
					$connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$request=$connexion -> prepare("SELECT * FROM `chef`");
					$request -> execute();
					$resultat=$request -> fetchall();
					if(isset($_POST['submit'])){
						$id=$_POST['id'];
						$pas=$_POST['pas'];
						if ($id==$resultat[0][0] && $pas==$resultat[0][1]) {
							header('Location:dashb.php');
						}
						else{
							echo "<br><br><p style='color:red;'>Veuillez verifier vos entres.</p>";
						}
					}
				}
				catch(PDOException $e){
					echo "Connexion failed";
				}
			?>
			<p class="mt-5 mb-3 text-muted">&copy; 2022–2023</p>
		</form>
	</main>
</body>
</html>