<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logeo extends CI_Controller {

//    private $session_id;
    public function __construct() {
        parent::__construct();
//        $this->session_id =  $this->session->userdata('login');
        session_start();
        
    }

    
    public function index()
	{
                if(!empty($this->session_id))
                {
                    $this->load->view('Header');
                    $this->load->view('index/inicio');
                    $this->load->view('Footer');
                }
                else
                {
                    redirect(base_url('index.php/logeo/login'),301);   
                }
       
		
                
	}
        
   public function login()
   {
       if($this->input->post())
       {
           $this->form_validation->set_rules('Usuarios', 'Usuarios','trim');
//            die(sha1($this->input->post("Password",TRUE)));
           if($this->form_validation->run())
           {
           $datos = $this->login_model->logeo($this->input->post("Usuario",TRUE), sha1($this->input->post("Password",TRUE)));
//           echo $datos;exit;
           
                if ($datos==1) 
                {
                  $_SESSION['profesor'] = $this->input->post("Usuario",true);  
//                $this->session->set_userdata("planificacion");
//                $this->session->set_userdata('login', $this->input->post('login',true));
                //$this->session->set_userdata('saludo','hola te saludo desde la sessión');
                //$session_id = $this->session->userdata('login');
                //echo $this->session->userdata('saludo');
                redirect(base_url().'index.php/inicio',  301);
                    
                }
                else {
                    $this->session->set_flashdata('ControllerMessage','Usuario y/o clave invalida.');
                    redirect(base_url('index.php/logeo/login'),301);  
                }
           
           }
           
       }
       $this->load->view('index/Login');
       
   }
   
       public function logout()
        {
//            $this->session->unset_userdata(array('login' => ''));
//            $this->session->sess_destroy("planificacion");
        session_destroy();
             redirect(base_url('index.php/logeo/login'),301);
        }
        
        
    }
        
        
        
