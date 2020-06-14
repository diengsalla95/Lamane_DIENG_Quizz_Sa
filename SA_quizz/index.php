<?php
session_start();
// include("src/cnx.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page d'hautentification</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Hello, world!</title>
</head>
<body>
	<div class="container">
<div class="principal"><img class="im" src="images/lds.jpg">
	<div class="form"></div>
	<form method="post" id="Myform">
			<div class="cnx">Se connecter</div>
			<input type="text" class="input top1" name="login" id="login" placeholder="Login">
			<span id="error" class="error"></span>
			<img class="icone1" src="images/ic-login.png">
			<input type="Password" class="input top2" name="pwd" id="pwd" placeholder="Password">
			<span id="error2" class="error2"></span>
			<img class="icone2" src="images/ic-password.png">
			<input type="submit" class="input top3" name="valider" value="Connexion" id="submit">
			<button class="inscription"><a href="src/inscription.php">Inscription</a></button>
			<span id="incorrect" class="error4"></span>
			<div class="quizzImage"><img src="images/logo-QuizzSA.png" style="width: 115px;height:215px"></div>
	</form>
	<div class="footer"></div>
	<div class="FT">© Copyright SA 2020</div>
</div>
</div>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/validation.js"></script>
</body>
</html>
