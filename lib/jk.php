<?php
require('tcpdf/tcpdf.php');

// Create PDF object
$pdf = new TCPDF();

// Set document properties
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('HTML Table to PDF Example');

// Add a page
$pdf->AddPage();

// HTML table content
$html = '<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age<</th>
    </tr>
    <tr>
        <td>1</td>
        <td>John Doe</td>
        <td>25</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Jane Doe</td>
        <td>30</td>
    </tr>
</table>';

// Output the HTML content to PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Save or output the PDF file
$pdf->Output('example.pdf', 'D');
?>