<?php
	include('cnx.php');
	$rep =$connect->prepare("DELETE FROM utilisateur WHERE Login = '".$_GET['Login']."'");
	$rep->execute();
	header('location:lister_admin.php');
?>