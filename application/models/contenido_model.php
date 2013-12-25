<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contenido_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function crear($datos = array())
    {
        $this->db->insert('contenido',$datos);
        return TRUE;
    }  
    
        public function getContenido($data)
    {
        $array= array('cod_clasificacion'=> $data['cod_clasificacion'],
            'num_semana_anual'=> $data['num_semana_anual'],
            'num_sem_semestral'=> $data['num_sem_semestral'],
            'fecha_iniciosemana'=> $data['fecha_iniciosemana'],
            'fecha_iniciosemana'=> $data['fecha_iniciosemana'],
            'unidad'=> $data['unidad'],
            );
         $query = $this->db
                ->select("*")
                ->from('contenido')
                ->where($array)
                ->get();
        return $query->row();
    }
    public function Geteditarcontenido($id)
    {
        
         $query = $this->db
                ->select("*")
                ->from('contenido')
                ->where("id_contenido",$id)
                ->get();
        return $query->row();
    }
          
    
    public function getContenidos($id)
    {
        $query= $this->db
                ->select('*')
                ->from('contenido')
                ->where('cod_clasificacion', $id)
                ->get();
        
        return $query->result();
    }
    
    public function  recatar_codigo($id)
    {
        $query = $this->db
                ->select('cod_clasificacion')
                ->from('contenido')
                ->where('id_contenido',$id)
                ->get();
                return $query->row();        
        
    }     

        public function delete_contenido($id)
    {
                $this->db
                ->delete( "contenido", array( "id_contenido" => $id));
                return true;
    } 
    
    
    public function Actualizar($datos = array(),$id)
    {
        $this->db->where('id_contenido', $id);
        $this->db->update('contenido', $datos);
        return true;
    }
    
}