<?php
	include('cnx.php');
	$rep =$connect->prepare("DELETE FROM score WHERE Login = '".$_GET['Login']."'");
	$rep->execute();
	$rep =$connect->prepare("DELETE FROM utilisateur WHERE Login = '".$_GET['Login']."'");
	$rep->execute();
	header('location:lister_joueur.php');
?>