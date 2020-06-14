<?php

$jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");

$mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");

$datefr = $jour[date("w")]." ".date("d")." ".$mois[date("n")]." ".date("Y");

?> 
<div class="image"><img src="../images/<?php echo $_SESSION['image']?>" style="width: 85px;height: 85px;border-radius: 50%"></div>
<strong><p style="left: 250px;color: white;position: absolute;background-color: #2F80ED;"><?php  echo $datefr ?></p></strong>
	<MARQUEE LOOP="17" class="headerText"> CREER ET PARAMETRER VOS QUIZZ</label></MARQUEE>

	<button class="decnx"><a href="logout.php" onclick="return(confirm('voulez vous deconnecter?'));"> Deconnexion</a></button>