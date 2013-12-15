<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eliminar_planificacion extends CI_Controller {
    
    
    public function __construct() {
        parent::__construct();
        $this->load->model('eliminar_model');
    }
    
    public function index(){
        $this->load->library('table');
        $this->load->view('Header');
        $data['query']=  $this->eliminar_model->consulta();
        $this->load->view('crud_planificacion/eliminar_planificacion',$data);
        $this->load->view('Footer');
        
        
        
    } 
    
//    public function recibirdatos()
//    {
//        $data =array(
//                'rut_profesor'=> $this->input->post('rut_profesor'),
//                  
//        );    
//        $this->eliminar_model->consulta($data);  
//    }
    
}