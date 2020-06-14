<?php
				$db=new PDO ('mysql:host=localhost;dbname=bd_quizz','root','');
				$liste=array();
				$recup_list=$db->query("SELECT prenom,nom FROM utilisateur WHERE privilege='joueur' ORDER BY nom");
				while ($all = $recup_list->fetch()) {
					$liste[]=$all;
				}

				?>
				<table>
					<td>prenom</td>
					<td>Nom</td>
				<?php
				foreach ($liste as $key => $value) {
					?>
					<tr>
					<td> <?php echo $value['prenom']; ?></td>
					<td> <?php echo $value['nom']; ?></td>
					</tr>
					<?php
					echo "<br>";
				}
				?>
				</table>