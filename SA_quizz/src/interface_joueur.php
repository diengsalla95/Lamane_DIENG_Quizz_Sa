<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>interfqce joueur</title>
</head>
<body>
<p>Bienvenue</p>
<?php
echo $_SESSION['prenom'];echo "<br>";
echo $_SESSION['nom'];echo "<br>";
echo $_SESSION['Login'];echo "<br>";
echo $_SESSION['pass'];echo "<br>";
echo $_SESSION['image'];echo "<br>";
echo $_SESSION['privilege'];;echo "<br>";
echo $_SESSION['score'];
// var_dump($_SESSION['user']);
// echo  $_SESSION['user']['prenom'];
?>

</body>
</html>