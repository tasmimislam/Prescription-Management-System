<?php

require_once 'prescriptionPDF.php';

require_once 'dompdf/autoload.inc.php';


// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $dompdf->loadHtml(htmlData());

// (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
    $dompdf->render();

// Output the generated PDF to Browser
    $dompdf->stream("Prescription");

 

?>

