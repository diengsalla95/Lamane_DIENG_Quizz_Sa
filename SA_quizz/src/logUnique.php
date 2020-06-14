<?php $veriflog = $connect->prepare("SELECT Login FROM utilisateur where Login='$login'");
		$veriflog->execute();
		$row = $veriflog->rowcount();
		if ($row==1) {
		echo "<script>alert('Ce login existe !')</script>";
		}

?>

