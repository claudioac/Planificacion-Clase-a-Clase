<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Contenido_planificacion extends CI_Controller {
    
    public $planificacion;
            
    public function __construct() {
        parent::__construct();
          session_start();
        if(!isset($_SESSION['profesor']))
        {
            redirect(base_url('index.php/logeo/login'),301);
        }
        $this->load->helper('form');
        $this->load->model('contenido_model');
       
    }

    public function index($id) {

         if (! $id) {
            show_404();
        }
        $this->load->view('Header');
        $this->load->view('Contenido/contenido_planificacion',  compact("id"));
        $this->load->view('Footer');
        
        
        
    }

    public function crear($id=null) {
        
        
        if ($this->input->post()) {
            $this->form_validation->set_rules('unidad', 'Unidad', 'required');
            $this->form_validation->set_rules('semana_anual', 'Semana Anual', 'required|less_than[52]');
            $this->form_validation->set_rules('semana_semestral', 'Semana Semestral', 'required|less_than[18]');
            $this->form_validation->set_rules('objetivos', 'Objetivos', 'required');
            $this->form_validation->set_rules('fechainicio', 'Fecha Inicio', 'required');
            $this->form_validation->set_rules('fechatermino', 'Fecha Termino', 'required');
            $this->form_validation->set_rules('ContenidoTematico', 'Contenido Tematico', 'required');
            $this->form_validation->set_rules('evaluaciones', 'Evaluaciones', 'required');
            
            

            if ($this->form_validation->run()) {
                //phpinfo(); exit();
                $data = array(
                    'num_semana_anual' => $this->input->post('semana_anual'),
                    'num_sem_semestral' => $this->input->post('semana_semestral'),
                    'fecha_iniciosemana' => $this->input->post('fechainicio'),
                    'fecha_terminosemana' => $this->input->post('fechatermino'),
                    'unidad' => $this->input->post('unidad'),
                    'objetivos_esp' => $this->input->post('objetivos'),
                    'contenido_tematico' => $this->input->post('ContenidoTematico'),
                    'evaluaciones' => $this->input->post('evaluaciones'),
                    'cod_clasificacion' => $this->input->post('planificacion'),
                );

                $query = $this->contenido_model->crear($data);
                $foraneacontenido = $this->contenido_model->getContenido($data);
                if ($query === TRUE) {
                    redirect(base_url('index.php/contenido_planificacion/mostrarContenido/'.$foraneacontenido->cod_clasificacion));
                } else {
                    show_404();
                }
            }

              
        $this->load->view('Header');
        $this->load->view('Contenido/contenido_planificacion',  compact("id"));
        $this->load->view('Footer');
        }
    }
    
    public function mostrarContenido($id)
    {
        if (! $id) {
            show_404();
        }
        $query = $this->contenido_model->getContenidos($id);
        $this->load->view('Header');
        $this->load->view('Contenido/contenido2_planificacion',  compact("query","id"));
        $this->load->view('Footer');
    }
    
    public function eliminar($id2,$id)
    {
         if (!$id) {
                        show_404 ();
                }
             else{ 
        $borrar = $this->contenido_model->delete_contenido($id2);
       $query = $this->contenido_model->getContenidos($id);
        $this->load->view('Header');
        $this->load->view('Contenido/contenido2_planificacion',  compact("query","id"));
        
        $this->load->view('Footer');
        
          
             }
    }
    
    public function editar($id,$id2)
    {
        if($this->input->post())
        {
            $this->form_validation->set_rules('unidad', 'Unidad', 'required');
            $this->form_validation->set_rules('semana_anual', 'Semana Anual', 'required|less_than[52]');
            $this->form_validation->set_rules('semana_semestral', 'Semana Semestral', 'required|less_than[18]');
            $this->form_validation->set_rules('objetivos', 'Objetivos', 'required');
            $this->form_validation->set_rules('fechainicio', 'Fecha Inicio', 'required');
            $this->form_validation->set_rules('fechatermino', 'Fecha Termino', 'required');
            $this->form_validation->set_rules('ContenidoTematico', 'Contenido Tematico', 'required');
            $this->form_validation->set_rules('evaluaciones', 'Evaluaciones', 'required');
            if($this->form_validation->run())
            {
              $data = array(
                    'num_semana_anual' => $this->input->post('semana_anual'),
                    'num_sem_semestral' => $this->input->post('semana_semestral'),
                    'fecha_iniciosemana' => $this->input->post('fechainicio'),
                    'fecha_terminosemana' => $this->input->post('fechatermino'),
                    'unidad' => $this->input->post('unidad'),
                    'objetivos_esp' => $this->input->post('objetivos'),
                    'contenido_tematico' => $this->input->post('ContenidoTematico'),
                    'evaluaciones' => $this->input->post('evaluaciones'),
                    'cod_clasificacion' => $this->input->post('planificacion'),
                );

                $query = $this->contenido_model->Actualizar($data,$id);
                
                if ($query === TRUE) {
                    redirect(base_url('index.php/contenido_planificacion/mostrarContenido/'.$id2));
                } else {
                    show_404();
                }
                
            }
   
        }
        $query = $this->contenido_model->Geteditarcontenido($id);    
        $this->load->view('Header');
        $this->load->view('Contenido/editar_contenido',compact("query","id"));
        $this->load->view('Footer');
    }
        
}


