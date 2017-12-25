<?php
/**
 * Created by PhpStorm.
 * User: Hitesh
 * Date: 25-Dec-17
 * Time: 8:09 PM
 */
require ('fpdf.php');

class PDF_reciept extends FPDF {
    function _construct ($orientation = 'P', $unit = 'pt', $format = 'Letter', $margin = 40) {
        $this->FPDF($orientation, $unit, $format);
        $this->SetTopMargin($margin);
        $this->SetLeftMargin($margin);
        $this->SetRightMargin($margin);
        $this->SetAutoPageBreak(true, $margin);
    }

    function Header() {
        $this->SetFont('Arial', 'B', 20);
        $this->SetFillColor(6, 9, 84);
        $this->SetTextColor(225);
        $this->Cell(0, 30, "Ahuja Online Store", 0, 1, 'C', true);
    }

    function Footer() {
        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(0);
        $this->SetXY(0,-60);
        $this->Cell(0, 20, "Thank you for shopping at Ahuja", 'T', 0, 'C');
    }

    function PriceTable($products, $prices) {
        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(0);
        $this->SetFillColor(36, 140, 129);
        $this->SetLineWidth(0.2);
        $this->Cell(70, 15, "Item Description", 'LTR', 0, 'C', true);
        $this->Cell(50, 15, "Price", 'LTR', 1, 'C', true);

        $this->SetFont('Arial', '');
        $this->SetFillColor(238);
        $this->SetLineWidth(0.2);
        $fill = false;

        for ($i = 0; $i < count($products); $i++) {
            $this->Cell(70, 10, $products[$i], 1, 0, 'L', $fill);
            $this->Cell(50, 10, '$' . $prices[$i], 1, 1, 'R', $fill);
            $fill = !$fill;
        }
        $this->SetX(50);
        $this->Cell(30, 10, "Total", 1);
        $this->Cell(50, 10, '$' . array_sum($prices), 1, 1, 'R');
    }
}

$pdf = new PDF_reciept();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY(50);
$pdf->Cell(40, 13, "customer");
$pdf->SetFont('Arial', '');
$pdf->Cell(30, 13, $_POST['name']);

$pdf->SetX(100);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(25, 13, 'Date');
$pdf->SetFont('Arial', '');
$pdf->Cell(10, 13, date('F j, Y'), 0, 1);

$pdf->SetX(50);
$pdf->SetFont('Arial', 'I');
$pdf->Cell(200, 6, $_POST['address'], 0, 2);
$pdf->Cell(200, 6, $_POST['city'] . ', ' . $_POST['province'], 0, 2);
$pdf->Cell(200, 6, $_POST['postal_code'] . ' ' . $_POST['country']);
$pdf->Ln(20);

$pdf->PriceTable($_POST['product'], $_POST['price']);

$pdf->SetFont('Arial', 'U', 12);
$pdf->SetTextColor(1, 162, 232);
$pdf->Ln(30);
$pdf->Write(13, "ahuja.hits812@yahoo.com", "mailto:example@example.com");


$pdf->Output('reciept.pdf', 'F');?>