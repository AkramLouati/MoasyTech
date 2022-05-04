<?PHP
include "../core/livreurC.php";
include "../entities/livreur.php";
if ( isset($_POST['login']) and isset($_POST['cin']) and isset($_POST['nom'])  and isset($_POST['prenom']) and isset($_POST['dispo']) and
 isset($_POST['secteur']) and isset($_POST['tel']) and isset($_POST['date_naiss']) and isset($_POST['mail']) and isset($_POST['adresse']) and isset($_POST['mdp']) and isset($_POST['num_permis']) and isset($_POST['idL'])){

  
$pr=new livreur($_POST['login'],$_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['dispo'],$_POST['secteur'],$_POST['tel'],$_POST['date_naiss'],$_POST['mail'],$_POST['adresse'],$_POST['mdp'],$_POST['num_permis'],$_POST['idL']);

var_dump($pr);
$prC=new livreurC();
$prC->ajouterlivreur($pr);
?>

<!DOCTYPE html>
<html>
<script type="text/javascript">
//alert("livreur ajouté");
//location="Ajouterlivreur.php";
</script>
</script>
<body>
</body>
</html>
 <?php
}
else{
	echo "vérifier les champs:";

 ?>
 <br><br>
<form action=" " method="post">


    <div>
        <label for="login">Login:</label>
        <input type="text" id="login" name="login">
    </div>
	<br><br>

    <div>
        <label for="cin">CIN :</label>
        <input type="text" id="cin" name="cin">
    </div>
	<br><br>

	<div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom">
    </div>
	<br><br>

	<div>
        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="prenom">
    </div>
	<br><br>

	<div>
        <label for="dispo">Disponibilité :</label>
        <input type="text" id="dispo" name="dispo">
    </div>
	<br><br>

	<div>
        <label for="secteur">Secteur :</label>
        <input type="text" id="secteur" name="secteur">
    </div>
	<br><br>

	<div>
        <label for="tel">Tel :</label>
        <input type="text" id="tel" name="tel">
    </div>
	<br><br>

	<div>
        <label for="date_naiss">Date de naissance :</label>
        <input type="date" id="prenom" name="prenom">
    </div>
	<br><br>

	<div>
        <label for="prenom">Mail :</label>
        <input type="text" id="prenom" name="prenom">
    </div>
	<br><br>

	<div>
        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse">
    </div>
	<br><br>

	<div>
        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp">
    </div>
	<br><br>

	<div>
        <label for="num_permis">Numero permis :</label>
        <input type="text" id="num_permis" name="num_permis">
    </div>
	<br><br>
	
    <div>
        <label for="idL">Id livreur :</label>
        <input type="number" id="idL" name="idL">
    </div>
	<br><br>

	<tr>
                   
				   <td>
					   <input type="submit" value="Ajouter"> 
				   </td>
				   <td>
					   <input type="reset" value="Annuler" >
				   </td>
			   </tr>

</form>




 <?php
}
?>
</body>
</html>