<?php
require_once("library/tcpdf/tcpdf.php");

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator('ALFI');
$pdf->setAuthor('data mahasiswa');
$pdf->setTitle('mahasiswa');
$pdf->setSubject('mahasiswa');
$pdf->setKeywords('mahasiswa');

$pdf->SetFont('dejavusans', '', 14, '', true);

$pdf->AddPage();

// Tahap 2: Ambil konten HTML dari file yang ingin di konversi ke PDF
$html = file_get_contents("http://localhost/pert9-13CRRUD/tampilan_pdf.php");

// Tahap 4: Tulis konten HTML yang dimodifikasi ke dokumen PDF
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// Close and output PDF document
$pdf->Output('data_mahasiswa.pdf', 'I');
?>
