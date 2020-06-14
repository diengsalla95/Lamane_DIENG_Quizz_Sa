<?php
	include('cnx.php');
	$rep =$connect->prepare("UPDATE `utilisateur` SET `statut` = '0'  WHERE Login = '".$_GET['Login']."'");
	$rep->execute();
	header('location:lister_joueur.php');
?>