<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editar_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
        
    }
    
   public function mostrarPlanificacion($id)
    {
        $where = array(
            "cod_clasificacion" => $id
        );
        $query = $this->db
                ->select("*")
                ->from('planificacion')
                ->where($where)
                ->get();
        return $query->row();
    }
    
      public function editar($datos = array(), $id) {
        $this->db->where('cod_clasificacion', $id);
        $this->db->update('planificacion', $datos);
        return true;
    }
    
}