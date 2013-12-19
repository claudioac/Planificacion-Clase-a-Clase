<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pais_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
        
    }
    
    public function getPais()
    {
        
                
                $query = $this->db
                ->select("*")
                ->from ("paises")
                ->get();
                return $query->result ();
    }
    
    public function verificar($data=array())
    {
                 $where = array ("alfa_dos" => $data['alfa_dos']) OR array("alfa_tres"=>['alfa_tres']);
                $query = $this->db
                ->select("nombre")
                ->from ("paises")
                ->where($where)
                ->get();
                return $query->result();
    }      

        public function crear($data)
    {
        $this->db->insert('paises',array('cod_num'=>$data['codigo'],'alfa_tres'=>$data['alfa_tres'],'alfa_dos'=>$data['alfa_dos'],'nombre'=>$data['pais']));
        return TRUE;
    }
    
    public function delete_pais($id)
    {
                $this->db
                ->delete( "paises", array( "pk" => $id));
                return true;
    }
    

    
    public function mostrarPais($id)
    {
        $where = array(
            "pk" => $id
        );
        $query = $this->db
                ->select("*")
                ->from('paises')
                ->where($where)
                ->get();
        return $query->row();
    }
    
   
        public function editar($datos = array(), $id) {
        $this->db->where('pk', $id);
        $this->db->update('paises', $datos);
        return true;
    }
   
    
}