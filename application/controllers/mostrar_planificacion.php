<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mostrar_planificacion extends CI_Controller {
    
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->load->view('Header');
        $this->load->view('crud_planificacion/mostrar_planificacion');
        $this->load->view('Footer');
    } 
    
}