<?php

// require('fpdf.php');
require(APPPATH . 'libraries/fpdf181/' . 'fpdf.php');

class MY_FPDF extends FPDF
{
    // Page header
  function Header() {
      // Logo
      $this->Image(APPPATH.'../assets/img/logo-upf.png',10,6,30);
      // Arial bold 15
      $this->SetFont('Arial','B',15);
      // Move to the right
      $this->Cell(60);
      // Title
      $this->Cell(100, 10, utf8_decode('Relatório'), 0, 0, 'C');
      // Line break
      $this->Ln(20);
  }

  // Page footer
  function Footer() {
      // Position at 1.5 cm from bottom
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Arial','I',8);
      // Page number
      $this->Cell(0,10,'Pag. '.$this->PageNo().'/{nb}'.' - ' .date('d/m/Y'),0,0,'C');
  }

}
?>
