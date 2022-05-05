<?php
include "../core/livraisonC.php";



ob_start();
?>
<page backtop="20mm">
	 <h1> Toutes les livraisons </h1>
		<table style="width:100%;border: 2px dashed " >
		<tr>

														  <th scope="col">id livraison</th>
													      <th scope="col">etat livraison</th>
													      <th scope="col">lieu livraison</th>
													      <th scope="col">prix livraison</th>
													      <th scope="col">mode Paiement</th>
													      <th scope="col">id livreur</th>
													  
													      
													    
													      <th scope="col">action</th>
													</tr>
													
		<?php
$livraison=new livraisonC();
$liste=$livraison->recupererlivraison($id);
		foreach($liste as $row) {
			?>
		  <tr>
												      <td> <?php echo $row["id"] ; ?></td> 
												      <td> <?php echo $row["etatLivraison"] ; ?></td> 
												       <td> <?php echo $row["lieuLivraison"] ; ?></td> 
												      <td> <?php echo $row["prixLivraison"] ; ?></td> 
                                                     <td> <?php echo $row["modePaiement"] ; ?></td> 
													  <td> <?php echo $row["idL"] ; ?></td> 


 												      
												   
												              
												    </tr>
			<?php  
		}

?>
	</table>


</page>

<?php
$content= ob_get_clean();
require('html2pdf/html2pdf.class.php');
try{
$pdf=new html2pdf('p','A4','fr','true','UTF-8');
$pdf->pdf->SetDisplayMode('fullpage');

$pdf->writeHTML($content);
//$pdf->pdf->IncludeJS('print(true)');
$pdf->Output('test.pdf');
}
catch(HTML2PDF_exception $e)
{
	die($e);
}

?>