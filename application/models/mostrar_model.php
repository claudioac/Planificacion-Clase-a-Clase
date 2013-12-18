<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mostrar_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
        
    }
    
    public function consulta($data)
    {
        
                $where = array ("rut" => $data);
                $query = $this->db
                ->select("*")
                ->from ("planificacion")
                ->where($where)
                ->get();
                return $query->result ();
    }
}