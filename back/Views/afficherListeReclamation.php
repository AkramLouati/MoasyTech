<?php
include '../Controller/ReclamationC.php';
$ReclamationC = new ReclamationC();
$listeReclamations = $ReclamationC->afficherReclamation();
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liste Des Reclamations</title>
</head>

<body>

	<center>
		<h1>Liste Des Reclamations</h1>
	</center>
	<table border="1" align="center">
		<tr>
			<th>Id</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Texte Reclamation</th>
			<th>Email</th>
			<th>Date Reclamation</th>
			<th>Modifier</th>
			<th>Supprimer</th>
		</tr>
		<?php
		foreach ($listeReclamations as $Reclamation) {
		?>
			<tr>
				<td><?php echo $Reclamation['Id']; ?></td>
				<td><?php echo $Reclamation['Nom']; ?></td>
				<td><?php echo $Reclamation['Prenom']; ?></td>
				<td><?php echo $Reclamation['TexteR']; ?></td>
				<td><?php echo $Reclamation['Email']; ?></td>
				<td><?php echo $Reclamation['DateR']; ?></td>
				<td>
					<form method="POST" action="modifierReclamation.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $Reclamation['Id']; ?> name="Id">
					</form>
				</td>
				<td>
					<a href="supprimerReclamation.php?Id=<?php echo $Reclamation['Id']; ?>">Supprimer</a>
				</td>
			</tr>
		<?php
		}
		?>
	</table>
	<hr>
	<center><button><a href="ajouterReclamation.php">Ajouter une Reclamation</a></button></center>
</body>

</html>