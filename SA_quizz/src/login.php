<?php
 session_start();
 require('cnx.php');
 	if (!empty($_POST['login']) and !empty($_POST['pwd'])) {
 		$login=$_POST['login'];
 		$pass=$_POST['pwd'];
 	// 	$connection=mysqli_connect('localhost','root','','bd_quizz');
		// $data=mysqli_query($connection, "SELECT * FROM `utilisateur` WHERE `Login`='$login' AND `pass`='$pass' ");
		// $row=mysqli_num_rows($data);
		$req1 = $connect->prepare("SELECT * FROM `utilisateur` WHERE `Login`='$login' AND `pass`='$pass' AND `statut`=1 ");
		$req1->execute(array($login, $pass));
		$row = $req1->rowCount();
 		if ($row==1) {
 			// $row=mysqli_fetch_array($data);
 			$row = $req1->fetch();
			$_SESSION['prenom'] = $row['prenom'];
			$_SESSION['nom']    = $row['Nom'];
			$_SESSION['Login']       = $row['Login'];
			$_SESSION['pass']       = $row['pass'];
			$_SESSION['image']    = $row['image'];
			$_SESSION['privilege']      = $row['privilege'];
			if ($row['privilege']=="joueur") {
				$req = $connect->prepare("SELECT score FROM score WHERE score.Login='$login'");
				$req->execute();
				$row1=$req->fetch();
				$_SESSION['score']=$row1['score'];
			}
 		}else{
 			echo "erreur";
 		}

	}
echo json_encode($row);
?>