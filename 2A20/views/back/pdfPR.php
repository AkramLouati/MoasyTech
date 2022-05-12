
<?php
//include connection file
ob_start();
include_once('connectionPdf.php');
include_once('PDF/fpdf.php');

class PDF extends FPDF
{
	// Page header
	function Header()
	{
		// Logo
		$this->Image('IMG/glammm.png', 20, -1, 70);
		$this->SetFont('Arial', 'B', 18);
		// Move to the right
		$this->Cell(110);
		// Title
		$this->Cell(80, 8, 'Liste Des produits', 1, 0, 'C');
		// Line break
		$this->Ln(35);
	}

	// Page footer
	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial', 'I', 8);
		// Page number
		$this->Cell(0, 8, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
	}
}

$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('id' => 'id','libelle' => 'libelle', 'nb_calories' => 'nb_calories', 'prix' => 'prix', 'description' => 'description', 'categorie' => 'categorie','fournisseur' => 'fournisseur', 'img' => 'img');

$result = mysqli_query($connString, "SELECT * FROM produit") or die("database error:" . mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM produit");

$pdf = new PDF();
//header
$pdf->AddPage('H','',0);
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial', 'B', 8);
foreach ($header as $heading) {
	$pdf->Cell(20, 15, $display_heading[$heading['Field']], 1);
}
foreach ($result as $row) {
	$pdf->Ln();
	foreach ($row as $column)
		$pdf->Cell(20, 15, $column, 1);
}
$file = 'Reclamation' . date('Y-m-d') . '.pdf';
$pdf->Output($file, 'I');
ob_end_flush(); 
?>
