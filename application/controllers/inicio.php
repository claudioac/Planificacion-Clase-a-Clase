<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
//        private $session_id;
        public function __construct() {
        parent::__construct();
//        $this->session_id =  $this->session->userdata('login');
        session_start();
        if(!isset($_SESSION['profesor']))
        {
            redirect(base_url('index.php/logeo/login'),301);
        }
        
        }
        
	public function index()
	{
//                 if(!empty($this->session_id))
//                {   
                $this->load->view('Header');
		$this->load->view('index/Home');
                $this->load->view('Footer');
//                }
//                else
//                {
//                     redirect(base_url('index.php/logeo/login'),301); 
//                }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */