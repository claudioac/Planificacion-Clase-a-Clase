<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paises extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pais_model');
    }

    public function index() {
        
        $this->load->view('Header');
        $query = $this->pais_model->getPais();
        $this->load->view('paises/index_pais', compact("query"));
        $this->load->view('Footer');
    }

    public function crear() {
        
        if($this->input->post())
        {
            $this->form_validation->set_rules('codigopais', 'Codigo País', 'required|is_natural|is_unique[paises.cod_num]');
            $this->form_validation->set_rules('nombre', 'País', 'required|alpha|is_unique[paises.nombre]');
            $this->form_validation->set_rules('alfatres', 'Alfa 3', 'required|exact_length[3]|alpha|is_unique[paises.alfa_tres]');
            $this->form_validation->set_rules('alfados', 'Alfa 2', 'required|exact_length[2]|alpha|is_unique[paises.alfa_dos]');
            
            if($this->form_validation->run())
            {
             $data = array(
            'codigo' => $this->input->post('codigopais',TRUE),
            'pais' => $this->input->post('nombre',TRUE),
            'alfa_tres' => $this->input->post('alfatres',TRUE),
            'alfa_dos' => $this->input->post('alfados',TRUE),
             );
             $query = $this->pais_model->crear($data);
                    if ($query == TRUE) {
                        redirect(base_url("index.php/paises/"));
                    } else {
                        show_404();
                    }
            }
             $this->load->view('Header');
             $query = $this->pais_model->getPais();
             $this->load->view('paises/index_pais', compact("query"));
             $this->load->view('Footer');
        }
    
        
        
}
        
//public function codigopais($str)
//{
//
//    // You can access $_POST variable
//    $this->load->model('pais_model');
//    $result =   $this->pais_model->codigoAvailability($_POST['codigopais']);
//    if ($result)
//    {
//        $this->form_validation->set_message('codigopais', 'The %s already exists');
//        return FALSE;
//    }
//    else
//    
//        return TRUE;
//    
//}
//public function alfatres($str)
//{
//
//    // You can access $_POST variable
//    $this->load->model('pais_model');
//    $result =   $this->pais_model->alfatresAvailability($_POST['alfatres']);
//    if ($result)
//    {
//        $this->form_validation->set_message('alfatres', 'The %s already exists');
//        return FALSE;
//    }
//    else
//    
//        return TRUE;
//    
//}
//public function alfados($str)
//{
//
//    // You can access $_POST variable
//    $this->load->model('pais_model');
//    $result =   $this->pais_model->alfadosAvailability($_POST['alfados']);
//    if ($result)
//    {
//        $this->form_validation->set_message('alfados', 'The %s already exists');
//        return FALSE;
//    }
//    else
//    
//        return TRUE;
//    
//}

     public function eliminar($id)
     {
          if (!$id) {
                        show_404 ();
                }
             else{   
                $query = $this->pais_model->delete_pais($id);
                redirect(base_url("index.php/paises/"));
             }
               
     }
     //callback_codigopais
     public function editar($id=null)
     {
         if (! $id) {
            show_404();
        }
         if($this->input->post())
         {
            $this->form_validation->set_rules('codigopais', 'Codigo País', 'required|is_natural');
            $this->form_validation->set_rules('nombre', 'País', 'required|alpha');
            $this->form_validation->set_rules('alfatres', 'Alfa 3', 'required|alpha|exact_length[3]');
            $this->form_validation->set_rules('alfados', 'Alfa 2', 'required|alpha|exact_length[2]');
             if($this->form_validation->run())
             {
             $data = array(
            'cod_num' => $this->input->post('codigopais',TRUE),
            'nombre' => $this->input->post('nombre',TRUE),
            'alfa_tres' => $this->input->post('alfatres',TRUE),
            'alfa_dos' => $this->input->post('alfados',TRUE),
             );
             $queri = $this->pais_model->editar($data,$id);
                    if ($queri == TRUE) {
                        redirect(base_url("index.php/paises/"));
                    } else {
                          show_404 ();
                    }
             }
         }
        $this->load->view('Header');
        $query = $this->pais_model->mostrarPais($id);
        $this->load->view('paises/editar_pais', compact("query","id"));
        $this->load->view('Footer');
         
     }      

}