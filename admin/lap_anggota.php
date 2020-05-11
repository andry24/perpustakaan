<?php
include_once "config.php";
$sql = mysql_query("SELECT * from tb_anggota ORDER BY nis asc");
$data = array();
while($row = mysql_fetch_assoc($sql)){
	array_push($data, $row);
}

$judul = "DATA ANGGOTA";
$header = array(array("label" => "NIS","length" => 30,"align" => "L" ),
			   array("label" => "Nama","length" => 50,"align" => "L" ),
			   array("label" => "Tempat Lahir","length" => 30,"align" => "L" ),
			   array("label" => "Tanggal Lahir","length" => 30,"align" => "L" ),
			   array("label" => "Tanggal Masuk","length" => 30,"align" => "L" ));

require_once "../assets/fpdf/fpdf.php";
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,20, $judul, '0', 1, 'C');

$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(139, 69, 19);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(222, 184, 135);
foreach($header as $kolom){
	$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();

$pdf->SetFillColor(245, 222, 179);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
	$i=0;
	foreach ($baris as $cell) {
		$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
			$i++;
	}
	$fill = !$fill;
	$pdf->Ln();
}
$pdf->Output();
?>