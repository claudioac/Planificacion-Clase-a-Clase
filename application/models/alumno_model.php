<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumno_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getPlanificacion($data = array())
    {
    $query=$this->db->query("
                select planificacion.*,docentes.nombre,docentes.apellidos
                from planificacion 
                join docentes
                on docentes.nombre='".$data['nombre']."' and 
                    docentes.apellidos='".$data['apellidos']."'
                        and planificacion.carrera =' ".$data['carrera']."'
                            and planificacion.semestre ='".$data['semestre']."'
                                and planificacion.asignatura ='".$data['asignatura']."'
                order by planificacion.fecha

        ");
        
//                        echo  $this->db->last_query();
        
        return $query->result();
    }
    
    public function getContenidosyEstrategias ($id)
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
    
    public function getContenidos($id)
    {
        $query= $this->db
                ->select('*')
                ->from('contenido')
                ->where('cod_clasificacion', $id)
                ->get();
        
        return $query->result();
    }
    
    public function Getmostrarcontenidos($id)
    {
        
         $query = $this->db
                ->select("*")
                ->from('contenido')
                ->where("id_contenido",$id)
                ->get();
        return $query->row();
    }
    
}