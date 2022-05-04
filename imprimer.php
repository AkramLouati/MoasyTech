<?php
include "../core/commandeC.php";
require ('db.php');


ob_start();
?>
<page backtop="5mm">

        <div >
           
              
                    
                        <a class="navbar-brand"> <img src="images/glammm1.png" alt="logo" > </a>
                 
              
            
        </div>
        <br><br><br><br><br><br><br><br><br><br>

	 <h1 style="color:rgb(253, 63, 146)"> Toutes les commandes </h1>
	 <br><br><br>
		<table style="width:400%;border: 2px dashed " >
		<tr>

														  <th style="color:rgb(131, 41, 1481)" scope="col">idcommande</th>
													      <th style="color:rgb(131, 41, 1481)" scope="col">date</th>
													      <th  style="color:rgb(131, 41, 1481)" scope="col">montantCommande</th>
													      <th style="color:rgb(131, 41, 1481)" scope="col">etatcom</th>
													      <th style="color:rgb(131, 41, 1481)" scope="col">lieu</th>
													      <th style="color:rgb(131, 41, 1481)" scope="col">prix</th>
													  
													      
													    
													      <th style="color:rgb(131, 41, 1481)" scope="col">action</th>
													</tr>
													
		<?php
	$commandess=new commandeC();
$listcommandes=$commandess->recuperercommandes();
		foreach($listcommandes as $row) {
			?>
		  <tr>
												      <td> <?php echo $row["idCommande"] ; ?></td> 
												      <td> <?php echo $row["dateCommande"] ; ?></td> 
												       <td> <?php echo $row["montantCommande"] ; ?></td> 
												      <td> <?php echo $row["etatCommande"] ; ?></td> 
                                                     <td> <?php echo $row["lieuLivraison"] ; ?></td> 
													  <td> <?php echo $row["prixLivraison"] ; ?></td> 


 												      
												   
												              
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