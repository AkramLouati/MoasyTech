<html>

<head>
	<title>Reclamation | PDF</title>
</head>

</html>
<?php
//include connection file
ob_start();
include_once('PDF/fpdf.php');
class dbObj
{
    /* Database connection start */
    var $dbhost = "localhost";
    var $username = "root";
    var $password = "";
    var $dbname = "crud";
    var $conn;
    function getConnstring()
    {
        $con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

        /* check connection */
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        } else {
            $this->conn = $con;
        }
        return $this->conn;
    }
}
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
		$this->Cell(80, 8, 'Liste Des Reclamations', 1, 0, 'C');
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
$display_heading = array('Id' => 'CIN', 'Nom' => 'Nom', 'Prenom' => 'Prenom', 'TexteR' => 'Texte Reclamation', 'Email' => 'Email', 'DateR' => 'Date Reclamation', 'Validee' => 'Validee');

$result = mysqli_query($connString, "SELECT * FROM reclamation") or die("database error:" . mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM reclamation");

$pdf = new PDF();
//header
$pdf->AddPage('H','',0);
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial', 'B', 8);
foreach ($header as $heading) {
	$pdf->Cell(40, 15, $display_heading[$heading['Field']], 1);
}
foreach ($result as $row) {
	$pdf->Ln();
	foreach ($row as $column)
		$pdf->Cell(40, 15, $column, 1);
}
$file = 'Reclamation' . date('Y-m-d') . '.pdf';
$pdf->Output($file, 'I');
ob_end_flush(); 
?>
