<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
        
    }
 
    public function getPlanificacion($id)
    {
        
                $where = array ("cod_clasificacion" => $id);
                $query = $this->db
                ->select("*")
                ->from ("planificacion")
                ->where($where)
                ->get();
                return $query;
    }  
    
    public function getContenidos($id)
    {
        $query= $this->db
                ->select('*')
                ->from('contenido')
                ->where('cod_clasificacion', $id)
                ->order_by('unidad')
                ->get();
        
        
        return $query;
    }
    
    
    
}    