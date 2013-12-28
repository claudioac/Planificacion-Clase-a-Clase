<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
   
    function __construct() {
        parent::__construct();
        $this->load->database();
        
    }
    public function logeo($login,$pass)
    {
        $query =  $this->db
                ->select('id,login,pass')
                ->from('usuarios')
                ->where(array("login"=>$login,"pass"=>$pass))
                ->count_all_results();
//                echo  $this->db->last_query();
        
        return $query;
    }
    
}