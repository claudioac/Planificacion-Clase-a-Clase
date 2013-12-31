<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumno_planificacion extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
       
        }
    
    public function index ()
    {
        $this->load->view("alumno_planificacion/alumno_planificacion");
    }
    
    
    public function buscar()
    {
        if($this->input->post())
        {
            $this->form_validation->set_rules('codigo_carrera','Codigo de Carrera', 'required|integer|exact_lenght[5]');
            $this->form_validation->set_rules('codigo_asignatura','Codigo de Asignatura','required');
            $this->form_validation->set_rules('semestre', 'Semestre','required');
            $this->form_validation->set_rules('nombre_profesor','Nombre Profesor', 'required|alpha');
            $this->form_validation->set_rules('apellidos_profesor','Apellidos Profesor', 'required|trim');
            
            
            $this->form_validation->set_message('exact_lenght', 'El %s debe contener exactamente 5 numeros.');
            
            if($this->form_validation->run())
            {
                
                $data =array(
                        
                    'carrera' => $this->input->post('codigo_carrera',TRUE),
                    'asignatura' => $this->input->post('codigo_asignatura',TRUE),
                    'semestre' => $this->input->post('semestre',TRUE),
                    'nombre' => $this->input->post('nombre_profesor',TRUE),
                    'apellidos' => $this->input->post('apellidos_profesor',TRUE),
                    );
                
                $query = $this->alumno_model->getPlanificacion($data);
                    if($query)
                    {
                        $this->load->view('alumno_planificacion/get_planificacion', compact("query"));
                        
                    }
                    else
                    {
                        
                        $this->session->set_flashdata('ControllerMessage','Los datos Ingresados son incorrectos. Inténtelo nuevamente por favaor.');
                        redirect('index.php/alumno_planificacion');
                        
                    }
                
            }
            else{
                $this->load->view('alumno_planificacion/alumno_planificacion');
            }
                
        }
        
        
    }
    
    
    public function objetivosyestrategias($id=NULL){
        
         if (! $id) {
            show_404();
        }
        
        $query = $this->alumno_model->getContenidosyEstrategias($id);
        
          if($query)
                    {
                        $this->load->view('alumno_planificacion/get_ObjetivosyEstrategias', compact("query"));
                        
                    }
                    else
                    {
                        
                        $this->session->set_flashdata('ControllerMessage','Los datos Ingresados son incorrectos. Inténtelo nuevamente por favaor.');
                        redirect('index.php/alumno_planificacion');
                        
                    }
        
    }
    
   public function contenidos($id)
   {
         if (! $id) {
            show_404();
        }
        
         $query = $this->alumno_model->getContenidos($id);
        
          if($query)
                    {
                        $this->load->view('alumno_planificacion/get_Contenidos', compact("query"));
                        
                    }
                    else
                    {
                        
                        $this->session->set_flashdata('ControllerMessage','Los datos Ingresados son incorrectos. Inténtelo nuevamente por favaor.');
                        redirect('index.php/alumno_planificacion');
                        
                    }
        
   }
   
   public function mostrar_contenido($id,$id2)
   {
       
       $query = $this->alumno_model->Getmostrarcontenidos($id);
       $this->load->view('alumno_planificacion/mostrar_contenido', compact("query"));
       
   }
    
}
