<?php

class PDF extends MY_FPDF
{
  // Colored table
  function FancyTable($header, $usuario) {
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
      foreach($usuario as $row) {
          $this->Cell($w[0],6,$cont++,'LR', 0,'L',$fill);
          $this->Cell($w[1],6, $row['user'],'LR',0,'L',$fill);
          $this->Cell($w[2],6, $row['setor'],'LR',0,'L',$fill);
          $this->Ln();
          $fill = !$fill;
      }
      // Closing line
      $this->Cell(array_sum($w),0,'','T');
      }
      }

      $pdf = new PDF();
      // Column headings
      $header = array('#', 'Login', 'Setor');
  
  $pdf->SetFont('Arial','',14);
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->FancyTable($header,$usuario);
  $pdf->Output();
?>
