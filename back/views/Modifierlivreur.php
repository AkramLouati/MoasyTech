<?PHP
include "../core/livraisonC.php";
include "../entities/livraison.php";
$dbcon= config::getConnexion();

$id = $_GET['id'] ;
$etatLivraison = $_POST['etatLivraison'] ;
$id = $_POST['id'] ;

if($_POST['etatLivraison']=="livré")
{

include "../Nexmo/src/NexmoMessage.php" ;


	

/**
	 * To send a text message.
	 *
	 */

	// Step 1: Declare new NexmoMessage.
	$nexmo_sms = new NexmoMessage('bef5e5df','iUW0bGDpXRGW1eBS');

	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	$info = $nexmo_sms->sendText( '21652747985', 'GlamStore', 'le produit a ete livré ' );

	// Step 3: Display an overview of the message
	

	// Done!  
}


try {
	$stmt = $dbcon->prepare("UPDATE livraison SET id=:id,etatLivraison=:etatLivraison,id=:id where id=:id") ;

	$stmt->bindParam(":id", $id) ;
	$stmt->bindParam(":etatLivraison", $etatLivraison) ;
	$stmt->bindParam(":id", $id) ;
	
	$stmt->execute() ;
	
?>
<!DOCTYPE html>
<html>
<script type="text/javascript">
alert("livraison modifié");
location="gestiondeslivraisons.php";
</script>
</script>
<body>
</body>
</html>
 
 <?php
}
catch (PDOException $e) {
  print "Error !" .$e->getMessage() . "<br/>" ;
  die() ;
  ?>

<!DOCTYPE html>
<html>
<script type="text/javascript">
alert(" veuiller verifier les champs saisie !");
location="gestiondeslivraisons.php";
</script>
</script>
<body>
</body>
</html>
<?php
}
?>
