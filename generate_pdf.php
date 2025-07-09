<?php
require('fpdf/fpdf.php');
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
  echo "Access Denied.";
  exit;
}

$user_email = $_SESSION['user_email'];

$stmt = $conn->prepare("SELECT * FROM bookings WHERE email = ? ORDER BY id DESC LIMIT 1");
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
  echo "No booking found.";
  exit;
}

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$pdf->Cell(0,10,'MyTicketHub - Ticket Confirmation',0,1,'C');
$pdf->Ln(10);

$pdf->SetFont('Arial','',12);
$pdf->Cell(50,10,'Name:',0,0);
$pdf->Cell(100,10,$row['name'],0,1);

$pdf->Cell(50,10,'Email:',0,0);
$pdf->Cell(100,10,$row['email'],0,1);

$pdf->Cell(50,10,'Event:',0,0);
$pdf->Cell(100,10,$row['event'],0,1);

$pdf->Cell(50,10,'Date:',0,0);
$pdf->Cell(100,10,$row['date'],0,1);

$pdf->Cell(50,10,'Quantity:',0,0);
$pdf->Cell(100,10,$row['quantity'],0,1);

$pdf->Ln(10);
$pdf->Cell(0,10,'Thank you for booking with MyTicketHub!',0,1,'C');

$pdf->Output();
?>
