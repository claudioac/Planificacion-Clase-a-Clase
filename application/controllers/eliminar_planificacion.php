<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eliminar_planificacion extends CI_Controller {
    
    
    public function __construct() {
        parent::__construct();
        $this->load->model('eliminar_model');
    }
    
    public function index(){
        $this->load->library('table');
        $this->load->view('Header');
        
        $this->load->view('eliminar_planificacion/eliminar_planificacion');
        $this->load->view('Footer');
        
        
        
    } 
    
    public function recibirdatos()
    {
        
                $data = $this->input->post('rut_profesor');
                  
            
      $query = $this->eliminar_model->consulta($data);
                //si el largo del array query es 0 muestre el error 404
                if(sizeof($query)==0)
                {
                        show_404();
                }
                $this->load->view('Header');
                $this->load->view('eliminar_planificacion/eliminar2_planificacion',compact("query"));
                $this->load->view('Footer');
    }
    
    public function eliminar($id,$id2)
    {
             if (!$id) {
                        show_404 ();
                }
             else{
                
                $this->eliminar_model->eliminar_planificacion($id);
                $query = $this->eliminar_model->consulta($id2);
                $this->load->view('Header');
                $this->load->view('eliminar_planificacion/eliminar2_planificacion',compact("query"));
                $this->load->view('Footer');
                
             }
        
        
//         $codigo= $this->input->post('eliminar_planificacion');
//         $query = $this->eliminar_model->eliminar_planificacion($codigo);
         
         
    }
    
}