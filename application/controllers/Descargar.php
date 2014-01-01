<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Descargar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        
        $this->load->model('export_model');
        
    }
    
    public function index($id)
    {
  //load our new PHPExcel library
$this->load->library('excel');
//activate worksheet number 1
$this->excel->setActiveSheetIndex(0);
//name the worksheet
$this->excel->getActiveSheet()->setTitle('Planificacion');
//Planificacion
$this->excel->getActiveSheet()->setCellValue('A1', 'Código');
$this->excel->getActiveSheet()->setCellValue('B1', 'Profesor');
$this->excel->getActiveSheet()->setCellValue('C1', 'Asignatura');
$this->excel->getActiveSheet()->setCellValue('D1', 'Semestre');
$this->excel->getActiveSheet()->setCellValue('E1', 'Carrera');
$this->excel->getActiveSheet()->setCellValue('F1', 'Fecha');
$this->excel->getActiveSheet()->setCellValue('G1', 'Objetivo');
$this->excel->getActiveSheet()->setCellValue('H1', 'Estrategia');


$query = $this->export_model->getPlanificacion($id);



$col = 2;

foreach ($query->result() as $row) {

    $this->excel->getActiveSheet()->setCellValue('A'.$col,$row->cod_clasificacion);
    $this->excel->getActiveSheet()->setCellValue('B'.$col,$row->rut);
    $this->excel->getActiveSheet()->setCellValue('C'.$col,$row->asignatura);
    $this->excel->getActiveSheet()->setCellValue('D'.$col,$row->semestre);
    $this->excel->getActiveSheet()->setCellValue('E'.$col,$row->carrera);
    $this->excel->getActiveSheet()->setCellValue('F'.$col,$row->fecha);
    $this->excel->getActiveSheet()->setCellValue('G'.$col,$row->objetivo);
    $this->excel->getActiveSheet()->setCellValue('H'.$col,$row->estrategia);

        $col++;

}

//Contenidos
$this->excel->getActiveSheet()->setCellValue('A4', 'Unidad');
$this->excel->getActiveSheet()->setCellValue('B4', 'Inicio');
$this->excel->getActiveSheet()->setCellValue('C4', 'Termino');
$this->excel->getActiveSheet()->setCellValue('D4', 'Objetivos');
$this->excel->getActiveSheet()->setCellValue('E4', 'Contenidos');
$this->excel->getActiveSheet()->setCellValue('F4', 'Evaluaciones');



$contenido = $this->export_model->getContenidos($id);



$col2 = 5;

foreach ($contenido->result() as $row) {

    $this->excel->getActiveSheet()->setCellValue('A'.$col2,$row->unidad);
    $this->excel->getActiveSheet()->setCellValue('B'.$col2,$row->fecha_iniciosemana);
    $this->excel->getActiveSheet()->setCellValue('C'.$col2,$row->fecha_terminosemana);
    $this->excel->getActiveSheet()->setCellValue('D'.$col2,$row->objetivos_esp);
    $this->excel->getActiveSheet()->setCellValue('E'.$col2,$row->contenido_tematico);
    $this->excel->getActiveSheet()->setCellValue('F'.$col2,$row->evaluaciones);
    

        $col2++;

}




 
$filename='Planificacion.xls'; //save our workbook as this file name
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
             
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
//force user to download the Excel file without writing it to server's HD
$objWriter->save('php://output');
        
        
    }
    
}   