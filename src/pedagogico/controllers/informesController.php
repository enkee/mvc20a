<?php

class informesController extends Controller
{
    private $_pdf;
    //inicializa las variables de la aplicación, consigue la libreria FPDF
    //crea un objeto FPDF.
    public function __construct() {
        parent::__construct();
        $this->_pdf = new FPDF;
    }
    //no necesita tener una vista, porque se presentara solo el PDF.
    public function index(){}
    
    //crea un pdf mostrando los parametros $nombre y $apellido
    public function nomina()
    {
        $nombre = 'Enrique';
        $apellido = 'Palomino';
        $this->_pdf->AddPage();
        $this->_pdf->SetFont('Arial','B',16);
        $this->_pdf->Cell(40,10, utf8_decode('PDF2 '. $nombre . ' ' . $apellido));
        $this->_pdf->Output();
    }
    //Llama al PDF pdf2.
    public function acta()
    {
        require_once ROOT . 'public' . DS . 'files' . DS . 'pdf2.php';
    }
}

?>
