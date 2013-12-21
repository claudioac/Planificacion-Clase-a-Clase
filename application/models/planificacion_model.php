<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Planificacion_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

     public function facultades()
    {
        $facultad = $this->db->get('facultades');
        return $facultad;
        
    }
    
    public function departamentos($facultad)
    {
        
        $departamentos = $this->db->get_where('departamentos',array('facultad_fk' => $facultad));
        if($departamentos->num_rows()>0)
        {
            return $departamentos;
        }
    }

    public function escuelas($departamentos)
     {
        $escuelas = $this->db->get_where('escuela',array('departamento_fk' => $departamentos));
        if($escuelas->num_rows()>0)
        {
            return $escuelas;
        }
    }
    
    public function carreras($escuelas)
    {
       $carreras = $this->db->get_where('carrera',array('escuela_fk' => $escuelas));
        if($carreras->num_rows()>0)
        {
            return $carreras;
        }
    }
        public function asignaturas($carreras)
    {
       $ramo = $this->db->get_where('carrera_asignatura',array('codigo_carrera' => $carreras));
       
       foreach ($ramo->result() as $dato)
       
       $asignatura= $this->db->get_where('asignatura',array('codigo'=>$dato->codigo_asignatura));
        if($asignatura->num_rows()>0)
        {
            return $asignatura;
        }
    }

    public function crearPlanificacion($data)
    {
        $this->db->insert('planificacion',array('rut'=>$data['profesor'],'objetivo'=>$data['objetivo'],'estrategia'=>$data['estrategia'],'fecha'=>$data['fecha'],'semestre'=>$data['semestre'],'facultad'=>$data['facultad'],'departamento'=>$data['departamento'],'escuela'=>$data['escuela'],'carrera'=>$data['carrera'],'asignatura'=>$data['asignatura']));
    
        return TRUE;
    }
}   
    
     