<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eliminar_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
        
    }
    
    public function consulta()
    {
        $query= $this->db->get('planificacion');
        
        return $query;
    }
    
}