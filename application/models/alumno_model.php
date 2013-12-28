<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumno_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
//    select planificacion.*,docentes.nombre,docentes.apellidos
//from planificacion 
//join docentes
//on docentes.nombre='Sebastian' and docentes.apellidos='Salazar Molina' and planificacion.carrera = '21030'
//order by planificacion.fecha
    public function getPlanificacion($data = array())
    {
//        $where = array (
//            "docentes.nombre" => $data['nombre'],
//            'docentes.apellidos' => $data['apellidos'],
//            'planificacion.carrera' => $data['carrera'],
//            'planficacion.semestre' => $data['semestre'],
//            'planificacion.asignatura' => $data['asignatura']
//            
//            
//        );
//        
//        $query = $this->db
//                 ->select("planificacion.*,docentes.nombre,docentes.apellidos")
//                 ->from('planificacion')
//                 ->join('docentes','docentes.nombre =' $data['nombre'],'inner')
//                 ->where($where)
//                 ->order_by('planificacion.fecha')
//                 ->get();
//        return $query->result();
        
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
        
                        echo  $this->db->last_query();
        
        return $query->result();
    }
    
}