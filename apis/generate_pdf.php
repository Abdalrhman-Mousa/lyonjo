<?php

require "../db_connect.php";
require_once('../fpdf185/fpdf.php');


$id = $_GET['id'];

// Retrieve the user's details from the database
$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

$pdf = new FPDF();

$pdf->SetMargins(15, 15);

$pdf->SetFont('Arial', '', 14);

$pdf->AddPage();

$x = 15;
$y = 30;

$pdf->Text($x, $y, 'Name: ' . $user['name']);
$y += 6;

$pdf->Text($x, $y, 'Email: ' . $user['email']);
$y += 6;

$pdf->Text($x, $y, 'Type: ' . $user['type']);
$y += 6;

if ($user['type'] == 'seller') {
  $pdf->Text($x, $y, 'Shop Name: ' . $user['shop_name']);
  $y += 6;
  $pdf->Text($x, $y, 'Shop Phone: ' . $user['shop_phone']);
  $y += 6;
  $pdf->Text($x, $y, 'Shop Location: ' . $user['shop_location']);
  $y += 6;
}

$pdf->Output('user_details.pdf', 'I');


?>