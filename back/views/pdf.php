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
        $this->Image('img/glammm.png', 10, -1, 40);
        $this->SetFont('Arial', 'B', 18);
        // Move to the right
        $this->Cell(110);
        // Title
        $this->Cell(80, 8, 'Liste Des livraisons', 1, 0, 'C');
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
$display_heading = array('id' => 'id', 'etatLivraison' => 'etatLivraison', 'lieuLivraison' => 'lieuLivraison', 'prixLivraison' => 'prixLivraison', 'modePaiement' => 'modePaiement', 'idL' => 'idL');

$result = mysqli_query($connString, "SELECT * FROM livraison") or die("database error:" . mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM livraison");

$pdf = new PDF();
//header
$pdf->AddPage('L','',0);
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial', 'B', 8);
foreach ($header as $heading) {
    $pdf->Cell(25, 15, $display_heading[$heading['Field']], 1);
}
foreach ($result as $row) {
    $pdf->Ln();
    foreach ($row as $column)
        $pdf->Cell(25, 15, $column, 1);
}
$file = 'livraison' . date('Y-m-d') . '.pdf';
$pdf->Output($file, 'I');
ob_end_flush(); 
?>


