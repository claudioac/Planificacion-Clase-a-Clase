<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }

    
    public function index()
	{
                
		$this->load->view('index/Login');
                
	}
        
    public function login()
    {
        if($this->input->post())
        {
           $this->form_validation->set_rules('rut', 'Rut', 'required');
           $this->form_validation->set_rules('password','Password', 'required');
            
            $this->form_validation->set_message('required','El Campo %s es Requerido');
           
            if($this->form_validation->run())
            {
              
            }
           
        $this->load->view('index/Head');
	$this->load->view('index/Login');
        $this->load->view('Footer');  
                
            }
        
	
        
            
        }
        
        
    }
        
        
        
