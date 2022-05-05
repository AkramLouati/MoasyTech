<?php
include '../Controller/PromotionC.php';
$PromotionC = new PromotionC();
$listePromotions = $PromotionC->afficherPromotion();
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liste Des Promotions</title>
</head>

<body>
	<center>
		<h1>Liste Des Promotions</h1>
	</center>
	<table border="1" align="center">
		<tr>
			<th>Id</th>
			<th>Nom</th>
			<th>Date Debut</th>
			<th>Date Fin</th>
			<th>Ancien Prix</th>
			<th>Remise</th>
			<th>Nouveau Prix</th>
			<th>Modifier</th>
			<th>Supprimer</th>
		</tr>
		<?php
		foreach ($listePromotions as $Promotion) {
		?>
			<tr>
				<td><?php echo $Promotion['Id']; ?></td>
				<td><?php echo $Promotion['Nom']; ?></td>
				<td><?php echo $Promotion['DateD']; ?></td>
				<td><?php echo $Promotion['DateF']; ?></td>
				<td><?php echo $Promotion['PrixA']; ?></td>
				<td><?php echo $Promotion['Remise']; ?></td>
				<td><?php echo $Promotion['PrixN']; ?></td>
				<td>
					<form method="POST" action="modifierPromotion.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $Promotion['Id']; ?> name="Id">
					</form>
				</td>
				<td>
					<a href="supprimerPromotion.php?Id=<?php echo $Promotion['Id']; ?>">Supprimer</a>
				</td>
			</tr>
		<?php
		}
		?>
	</table>
	<hr>
	<center><button><a href="ajouterPromotion.php">Ajouter une Promotion</a></button></center>
</body>

</html>