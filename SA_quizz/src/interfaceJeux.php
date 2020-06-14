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
	<title>Interface joueur</title>
	<meta charset="utf-8">
	
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link rel="stylesheet" type="text/css" href="../css/joueur.css">
	
</head>
<body>
<div class="principal mt-1">

	<div class="header">
		<div class="cadrephoto">
			<div class="img"><img src="../images/<?php echo $_SESSION['image']?>" style="width: 61.81px;height: 63.47px;border-radius: 50%"></div>
			<div class="nom"><?php echo $_SESSION['prenom']." ".$_SESSION['nom']?></div>
			<div class="textHead">BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ<br>JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE</div>
		</div>
	</div>
	<div class="cadrejou">
		<div class="gauche">
			<div class="top">top Score</div>
			<div class="resultTop">
				<table>
					<tr>
					<td style="background-color: #2F80ED;text-align: center;">prenom</td>
					<td style="background-color: #2F80ED;text-align: center;">Nom</td>
					<td style="background-color: #2F80ED;text-align: center;">Score</td>
				</tr>
				<?php
				$liste=array();
				$rep =$connect->prepare("SELECT * FROM utilisateur,score WHERE privilege='joueur' AND utilisateur.login=score.login ORDER BY score DESC");
				$rep->execute();
				while ($all = $rep->fetch()) {
					$liste[]=$all;
				}
				for ($i=0; $i <count($liste) ; $i++) { 
					?>
					<tr>
						<td> <?php echo $liste[$i]['prenom']; ?></td>
						<td> <?php echo $liste[$i]['Nom']; ?></td>
						<td> <?php echo $liste[$i]['score']; ?></td>
					<?php
				}
				?>
				</tr>
			</table>
			</div>
			<div class="cadreMs">Meilleur Score</div>
			<div class="MS"><?php echo $_SESSION['score']." pts"; ?></div>
			<button class="dcnx"><a href="logout.php" onclick="return(confirm('voulez vous deconnecter?'));"> Deconnexion</a></button>
		</div>
		<div class="droite">
			<!-- <button type="text" class="precedent" name="precedent">Precedent</button>
			<button type="text" class="suivant" name="suivant">Suivant</button> -->
		</div>
	</div>
	
	<div class="footer"></div>
	<div class="FT">© Copyright SA 2020</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/valid_add_admin.js"></script>
</body>
</html>
