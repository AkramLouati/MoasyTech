<?PHP 
include "../Core/produitC.php";
include "../Core/commandeC.php";
include "../Entities/commande.php";
include_once "../core/clientC.php";
session_start();
$_SESSION['id']=2;
if(isset($_SESSION['id']))
{
$produitC=new produitC();
$commandeC=new commandeC();
if (isset($_POST["idCommande"]))
{

	$commande=$commandeC->recuperercommande($_POST["idCommande"]);
	$info=$commande->fetch();
	$commande=new commande($info["idCommande"],$info["dateCommande"],$info["montantCommande"],$info["etatCommande"],$info["lieuLivraison"],$info["prixLivraison"],$info["idClient"]);


	$valider="Validée";
	$commande->set_etatCommande($valider);
	$dateactuelle = date("Y-m-d");
	$commande->set_dateCommande($dateactuelle);
	
	$somme=0;
	$clientC=new clientC();
    $client1=$clientC->recupererclient($_SESSION['id']);
    $client=$client1->fetch();
    $mail=$client["Email"];
   

    $clientC->mailcommande($mail,$somme,$dateactuelle);


	$commandeC->ajouterhistorique($commande);
	$commandeC->supprimercommande($_POST["idCommande"]);
	header('Location: gestion des commandes.php');
	
}
if ($valider="Validée")

include "../Nexmo/src/NexmoMessage.php" ;


	

/**
	 * To send a text message.
	 *
	 */

	// Step 1: Declare new NexmoMessage.
	$nexmo_sms = new NexmoMessage('api_key','api_secret');

	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	$info = $nexmo_sms->sendText( '+21692165719', 'gstore', 'Votre commande a été Validée ' );

	// Step 3: Display an overview of the message
	
echo $nexmo_sms->displayOverview($info);

	// Done!  */
}



?>

