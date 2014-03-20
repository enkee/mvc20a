<?php
$nombre = 'Miriam';
$apellido = 'Briceño Aguilar';
$this->_pdf->AddPage();
$this->_pdf->SetFont('Arial','B',16);
$this->_pdf->Cell(40,10, utf8_decode('PDF1 '. $nombre . ' ' . $apellido));
$this->_pdf->Output();

?>