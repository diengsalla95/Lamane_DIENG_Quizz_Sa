<?php
session_start();
if (!isset($_SESSION['Login'])) {
	header('location:../index.php');
}
include("cnx.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Info</title>
	<meta charset="utf-8">
	
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<style type="text/css">
		.positionMenu4{
			background-color: grey;
		}
	</style>
</head>
<body>
<div class="principal mt-1">
	<div class="header">
		<?php include('header.php') ?>
	</div>
	<?php include('menu.php') ?>
	<div class="cadre">
		<div class="profil">
			 <div class="prenom"><?php echo $_SESSION['prenom']?></div>
			 <div class="prenom"><?php echo $_SESSION['nom']?></div>
		</div>
		<div class="jeux">
			<div class="question">
				<div style="background: linear-gradient( #2F80ED,white, #2F80ED);width: 150px;height: 75px;top:50px;position: absolute;border-left: 4px solid black">
					<?php
					$rep =$connect->prepare("SELECT count(Login) as nb FROM utilisateur WHERE `privilege`='admin' GROUP BY (Login)");
					$rep->execute();
					$nb = $rep->rowCount();
					echo"<center><H3>Admin<br>".$nb."</H3></center>";
					?>
				</div>
				<div style="background: linear-gradient( #2F80ED,white, #2F80ED);width: 150px;height: 75px;top:50px;position: absolute;border-left: 4px solid black;left: 310px">
					<?php
					$rep =$connect->prepare("SELECT count(Login) as nb FROM utilisateur WHERE `privilege`='joueur' GROUP BY (Login)");
					$rep->execute();
					$nb = $rep->rowCount();
					echo"<center><H3>Joueur<br>".$nb."</H3></center>";
					?>
				</div>
				
			</div>
		</div>
	</div>
	<div class="footer"></div>
	<div class="FT">© Copyright SA 2020</div>
</div>
</body>
</html>
