<?php
session_start();
$name=$_SESSION['name'];
                            $testname=$_SESSION['testname'];
                           $subjectname=$_SESSION['subjectname'];
                            $start_time=$_SESSION['start_time'];
                            $duration=$_SESSION['duration'];
                       $total_mark=$_SESSION['total_mark'];
                       $obtained_mark=$_SESSION['obtained_mark'];
                        $percentage=$_SESSION['percentage'];

require('fpdf/fpdf.php');


class PDF extends FPDF
{
// Page header
function Header()
{
	// Logo
	$this->Image('certificateisr.jpg',0,0,210);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Move to the right
	$this->Cell(80);
	// Title
	
	// Line break
	$this->Ln(20);
}

// Page footer
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'This is the official certificate issued by Examsvenue',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Cell(70,50,'');
	$pdf->Cell(100,50,'The Online Examination System',0,1);
$pdf->Cell(85,20,'');
	$pdf->Cell(100,20,'Certificate',0,1);
$pdf->Cell(82,10,'');
	$pdf->Cell(100,10,'Test Summary',0,1);
$pdf->Cell(40,10,'');
	$pdf->Cell(100,10,'Student Name                             :'.$name,0,1);
$pdf->Cell(40,10,'');
	$pdf->Cell(100,10,'Test Name                                  :'.$testname,0,1);
$pdf->Cell(40,10,'');
	$pdf->Cell(100,10,'Subject                                       :'.$subjectname,0,1);
$pdf->Cell(40,10,'');
	$pdf->Cell(100,10,'Date and Time                           :'.$start_time,0,1);
$pdf->Cell(40,10,'');
	$pdf->Cell(100,10,'Test Duration                             :'.$duration,0,1);
$pdf->Cell(40,10,'');
	$pdf->Cell(100,10,'Max Mark                                  :'.$total_mark,0,1);
$pdf->Cell(40,10,'');
	$pdf->Cell(100,5,'Obtained Mark                          :'.$obtained_mark,0,1);
$pdf->Cell(40,10,'');
	$pdf->Cell(100,10,'Duration                                    :'.$percentage,0,1);
$pdf->Output();
?>