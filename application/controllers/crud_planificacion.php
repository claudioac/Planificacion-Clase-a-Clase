<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_planificacion extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('planificacion_model');
        $this->load->model('contenido_model');
    }
    
    public function index(){
        
        
        $this->load->view('Header');
       $data['facultades']= $this->planificacion_model->facultades();
        $this->load->view('crud_planificacion/crear_planificacion',$data);
        $this->load->view('Footer');
    }
    
    public function llena_departamentos()
    {
       
            $id_facultad=  $this->input->post('facultad');
           
            $departamento =  $this->planificacion_model->departamentos($id_facultad);
            echo'<option value="0" selected>Seleccione Departamento</option>';
            foreach ($departamento->result() as $fila)
            {
            
            
            echo'<option value="'.$fila->pk.'">'.$fila->departamento.'</option>';

          
        }
    }
       public function llena_escuelas()
    {
       
            $id_departamento =  $this->input->post('departamento');
            
             $escuela =  $this->planificacion_model->escuelas($id_departamento);
             echo'<option value="0" selected>Seleccione Escuela</option>';
            foreach ($escuela->result() as $fila)
            {
            
             
            echo'<option value="'.$fila->pk.'">'.$fila->escuela.'</option>';

          
        }
    }
           public function llena_carreras()
    {
       
            $id_escuela =  $this->input->post('escuela');
      
           
            $carrera =  $this->planificacion_model->carreras($id_escuela);
            echo'<option value="0" selected>Seleccione Carrera</option>';
            foreach ($carrera->result() as $fila)
            {
      
            echo'<option value="'.$fila->codigo.'">'.$fila->nombre.'</option>';

          
            }
    }
           public function llena_asignaturas()
    {
       
            $codigo =  $this->input->post('carrera');
            $ramo =  $this->planificacion_model->asignaturas($codigo);
            echo'<option value="0" selected>Seleccione Asignatura</option>';
            foreach ($ramo->result() as $fila)
            {
            echo'<option value="'.$fila->codigo.'">'.$fila->nombre.'</option>';
          
            }
    }
        public function  recibirdatos()
        {
            
          if($this->input->post())
            {
            $this->form_validation->set_rules('facultad', 'facultad', 'required');
            $this->form_validation->set_rules('departamento', 'departamento', 'required');
            $this->form_validation->set_rules('escuela', 'Escuela', 'required');
            $this->form_validation->set_rules('carrera', 'Carrera', 'required');
            $this->form_validation->set_rules('ramo', 'Asignatura', 'required');
            $this->form_validation->set_rules('rut_profesor', 'Rut Profesor', 'required');
            $this->form_validation->set_rules('fecha', 'Fecha', 'required');
            $this->form_validation->set_rules('semestre', 'Semestre', 'required|numeric');
            $this->form_validation->set_rules('objetivo', 'Objetivo', 'required');
            $this->form_validation->set_rules('estrategia', 'Estrategia', 'required');
            
            if($this->form_validation->run())
                {    
                    $data =array(
                'facultad'=> $this->input->post('facultad'),
                'departamento'=>  $this->input->post('departamento'),
                'escuela'=>  $this->input->post('escuela'),
                'carrera'=> $this->input->post('carrera'),
                'asignatura'=>  $this->input->post('ramo'),
                'profesor'=> $this->input->post('rut_profesor'),
                'fecha'=>  $this->input->post('fecha'),
                'semestre'=>  $this->input->post('semestre'),
                'objetivo'=> $this->input->post('objetivo'),
                'estrategia'=>  $this->input->post('estrategia')
            
                    );
                   $query =$this->planificacion_model->crearPlanificacion($data);
                   $foraneacontenido = $this->planificacion_model->getPlanificacion($data);
                    
                    if ($query == TRUE) {
                        redirect(base_url('index.php/contenido_planificacion/index/'.$foraneacontenido->cod_clasificacion));
                        
                        
                    } else {
                        show_404();
                    }
                } 
        $this->load->view('Header');
        $data['facultades']= $this->planificacion_model->facultades();
        $this->load->view('crud_planificacion/crear_planificacion',$data);
        $this->load->view('Footer');
                
           }
        }
    
       

        
                
}