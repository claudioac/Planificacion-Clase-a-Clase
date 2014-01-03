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
//           $datos = $this->login_model->logeo($this->input->post("Usuario",TRUE), sha1($this->input->post("Password",TRUE)));
           $rut = $this->input->post("Usuario",TRUE);
           $p = strtoupper($this->input->post("password",TRUE));
           $str = hash("SHA256", $p);
           $resultado = autenticar($rut, $str);
//           echo $resultado;exit;
           
                if ($resultado) 
                {
                    $_SESSION['profesor'] = $this->input->post("Usuario", true);
                    redirect(base_url() . 'index.php/inicio', 301);
                    
                }
                else {
                    $this->session->set_flashdata('ControllerMessage','Usuario y/o clave invalida.');
                    redirect(base_url('index.php/logeo/login'),301);  
                }
           
           }
           
       }
       $this->load->view('index/Login');
       
   }
   
        public function autenticar($rut , $contrasena)
        {
             $resultado = false;

        try {

        // Creacion de un arreglo con los parámetros de entrada.
        $parametros = array();
        $parametros['rut'] = $rut;
        $parametros['password'] = $contrasena;

        // usuario de webService
        $autenticacion = array('login' => 'cacuna',
            'password' => '30a7a0479c66576762bdc671041ceb1817ded11f');

        $cliente = new SoapClient("http://informatica.utem.cl:8011/dirdoc-auth/ws/auth?wsdl", $autenticacion);
        $objeto = $cliente->autenticar($parametros);
        $codigo = (int) $objeto->return->codigo;
        $descripcion = (string) verificar($objeto->return->descripcion);

                if ($codigo > 0) {
                    $resultado = true;
                } else {
                    error_log("Servicio WEB respondió: $descripcion ($codigo)");
                }
                } catch (Exception $e) {
                $resultado = false;
                error_log("Error en autenticacion: {$e->getMessage()}");
                }
            return $resultado;
        }


        public function logout()
        {
//            $this->session->unset_userdata(array('login' => ''));
//            $this->session->sess_destroy("planificacion");
        session_destroy();
             redirect(base_url('index.php/logeo/login'),301);
        }
        
        
    }
        
        
        
