<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mostrar_planificacion extends CI_Controller {
    
    
    public function __construct() {
        parent::__construct();
           session_start();
        if(!isset($_SESSION['profesor']))
        {
            redirect(base_url('index.php/logeo/login'),301);
        }
        $this->load->model('mostrar_model');
       
    }
    
    public function index(){
        $this->load->view('Header');
        $this->load->view('mostrar_planificacion/mostrar_planificacion');
        $this->load->view('Footer');
    } 
    
    public function recibirdatos()
    {
        
        if($this->input->post())
         {
           
            $this->form_validation->set_rules('rut_profesor', 'Rut', 'required');
            if($this->form_validation->run())
             {
            $data = $this->input->post('rut_profesor');
            $query = $this->mostrar_model->consulta($data);
                //si el largo del array query es 0 muestre el error 404
                if(sizeof($query)==0)
                {
                        show_404();
                        
                }
                $this->load->view('Header');
                $this->load->view('mostrar_planificacion/mostrar2_planificacion',compact("query"));
                $this->load->view('Footer');
                
             }
            
             
         }  
         
    }
    
   
            
    
    
}