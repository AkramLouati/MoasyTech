<html>

<head>
	<title>Promotion | PDF</title>
</head>

</html>

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
		$this->Cell(70, 10, 'Liste Des Promotions', 1, 0, 'C');
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
		$this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
	}
}

$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('Id' => 'ID', 'IMG' => 'IMG', 'Nom' => 'Nom Produit', 'DateD' => 'Date Debut', 'DateF' => 'Date Fin', 'PrixA' => 'Prix Ancien', 'Remise' => 'Remise', 'PrixN' => 'Nouveau Prix');

$result = mysqli_query($connString, "SELECT * FROM promotion") or die("database error:" . mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM promotion");

$pdf = new PDF();
//header
$pdf->AddPage('','A3',0);
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial', 'B', 10);
foreach ($header as $heading) {
	$pdf->Cell(34.5, 15, $display_heading[$heading['Field']], 1);
}
foreach ($result as $row) {
	$pdf->Ln();
	foreach ($row as $column)
		$pdf->Cell(34.5, 15, $column, 1);
}
$file = 'Promotion' . date('Y-m-d') . '.pdf';
$pdf->Output($file, 'I');
ob_end_flush(); 
?>