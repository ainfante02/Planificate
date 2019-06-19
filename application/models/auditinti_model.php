<?php

class Auditinti_model extends CI_Model {
	 public function __construct()
 {
           parent::__construct(); 
           $this->load->database();
     }

        public function auditoria()
        {
        
              $this->db->select('*');
                 $this->db->from('auditoria');
             /*    $this->db->join('requerimiento', 'usuario.usuario_id = requerimiento.usuario_id'); 
           $this->db->where('usuario.usuario_id',$id); */
              $query = $this->db->get();
  
            return $query->result();
  
        }

}