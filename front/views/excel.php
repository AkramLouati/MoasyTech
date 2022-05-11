<?php
$con=mysqli_connect('localhost','root','','crud');
$sql="select * from promotion";
$res=mysqli_query($con,$sql);
$html='<table><tr><td>Id</td><td>IMG</td><td>Nom</td><td>DateD</td><td>DateF</td><td>PrixA</td><td>Remise</td><td>PrixN</td></tr>';
while($row=mysqli_fetch_assoc($res)){
	$html.='<tr><td>'.$row['Id'].'</td><td>'.$row['IMG'].'</td><td>'.$row['Nom'].'</td><td>'.$row['DateD'].'</td><td>'.$row['DateF'].'</td><td>'.$row['PrixA'].'</td><td>'.$row['Remise'].'</td><td>'.$row['PrixN'].'</td></tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=promotion.xls');
echo $html;
?>