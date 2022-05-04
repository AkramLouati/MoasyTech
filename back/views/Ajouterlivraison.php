<?PHP
include "../core/livraisonC.php";
include "../entities/livraison.php";
if ( isset($_POST['id']) and isset($_POST['etatLivraison']) and isset($_POST['lieuLivraison'])
  and isset($_POST['prixLivraison']) and isset($_POST['modePaiement']) and isset($_POST['idL'])){

  
$pr=new livraison($_POST['id'],$_POST['etatLivraison'],$_POST['lieuLivraison'],$_POST['prixLivraison'],$_POST['modePaiement'],$_POST['idL']);

var_dump($pr);
$prC=new livraisonC();
$prC->ajouterlivraison($pr);
?>

<!DOCTYPE html>
<html>
<script type="text/javascript">
//alert("livraison ajoutée");
//location="Ajoutlivraison.php";
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
        <label for="id">Id :</label>
        <input type="number" id="id" name="id">
    </div>
	<br><br>

    <div>
        <label for="etatLivraison">Etat livraison:</label>
        <input type="text" id="etatLivraison" name="etatLivraison">
    </div>
	<br><br>

    <div>
        <label for="lieuLivraison">Lieu Livraison :</label>
        <input type="text" id="lieuLivraison" name="lieuLivraison">
    </div>
	<br><br>

	<div>
        <label for="prixLivraison">Prix Livraison :</label>
        <input type="number" id="prixLivraison" name="prixLivraison">
    </div>
	<br><br>

	<div>
        <label for="modePaiement">Mode Paiement :</label>
        <input type="text" id="modePaiement" name="modePaiement">
    </div>
	<br><br>
	
    <div>
        <label for="idL">Id livreur :</label>
        <input type="text" id="idL" name="idL">
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