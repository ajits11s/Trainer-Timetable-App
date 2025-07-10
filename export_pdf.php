<?php
require 'vendor/autoload.php'; // If using Composer
use Dompdf\Dompdf;

$conn = new mysqli("localhost", "root", "", "trainer");
$result = $conn->query("SELECT full_name, phone_number, Language, certifications, availability FROM member WHERE role = 'trainer'");

$html = "<h2 style='text-align:center;'>Trainer Details</h2>";
$html .= "<table border='1' width='100%' cellpadding='5' cellspacing='0'>
<tr>
  <th>Full Name</th>
  <th>Phone</th>
  <th>Language</th>
  <th>Certifications</th>
  <th>Availability</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    $html .= "<tr>
      <td>{$row['full_name']}</td>
      <td>{$row['phone_number']}</td>
      <td>{$row['Language']}</td>
      <td>{$row['certifications']}</td>
      <td>{$row['availability']}</td>
    </tr>";
}
$html .= "</table>";

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Trainer_Details.pdf");
exit();
