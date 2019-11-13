<?php

// require('fpdf.php');
require(APPPATH . 'libraries/fpdf181/' . 'fpdf.php');

class PDF extends FPDF
{
    // Page header
  function Header() {
      // Logo
      $this->Image(APPPATH.'../assets/img/logo-upf.png',10,6,30);
      // Arial bold 15
      $this->SetFont('Arial','B',15);
      // Move to the right
      $this->Cell(40);
      // Title
      $this->Cell(100, 10, utf8_decode('Relatório - Chamados por status'), 0, 0, 'C');
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

  // Colored table
  function FancyTable($header, $status) {
      // Colors, line width and bold font
      $this->SetFillColor(138,177,219);
      // $this->SetFillColor(255,0,0);
      $this->SetTextColor(255);
      $this->SetDrawColor(153,153,153);
      $this->SetLineWidth(.3);
      $this->SetFont('','B');

      // Header
      $w = array(10, 40, 35, 40, 60);
      for($i=0;$i<count($header);$i++)
          $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
      $this->Ln();
      // Color and font restoration
      $this->SetFillColor(224,235,255);
      $this->SetTextColor(0);
      $this->SetFont('');
      // Data
      $fill = false;
      $cont=1;
      foreach($status as $row) {
          $this->Cell($w[0],6,$cont++,'LR', 0,'L',$fill);
          $this->Cell($w[1],6, $row['titulo'],'LR',0,'L',$fill);
          $this->Cell($w[2],6, $row['requerente'],'LR',0,'L',$fill);
          $this->Cell($w[3],6, $row['STATUS'],'LR',0,'R',$fill);
          $this->Ln();
          $fill = !$fill;
      }
      // Closing line
      $this->Cell(array_sum($w),0,'','T');
  }
}

  $pdf = new PDF();
  // Column headings
  $header = array('#', 'Titulo', 'Requerente', 'Status');
  // Data loading
  // $status = $pdf->LoadData('countries.txt');
  $pdf->SetFont('Arial','',14);
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->FancyTable($header,$status);
  $pdf->Output();
?>
