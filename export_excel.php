<?php
require 'vendor/autoload.php'; // If using Composer
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$conn = new mysqli("localhost", "root", "", "trainer");
$query = $conn->query("SELECT full_name, phone_number, Language, certifications, availability FROM member WHERE role = 'trainer'");

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle("Trainer Data");

// Headers
$sheet->setCellValue('A1', 'Full Name');
$sheet->setCellValue('B1', 'Phone');
$sheet->setCellValue('C1', 'Language');
$sheet->setCellValue('D1', 'Certifications');
$sheet->setCellValue('E1', 'Availability');

$row = 2;
while ($data = $query->fetch_assoc()) {
    $sheet->setCellValue("A$row", $data['full_name']);
    $sheet->setCellValue("B$row", $data['phone_number']);
    $sheet->setCellValue("C$row", $data['Language']);
    $sheet->setCellValue("D$row", $data['certifications']);
    $sheet->setCellValue("E$row", $data['availability']);
    $row++;
}

$writer = new Xlsx($spreadsheet);
$filename = 'Trainer_Data.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=\"$filename\"");
$writer->save("php://output");
exit();
