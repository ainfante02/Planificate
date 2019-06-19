<?php
/*consulta de varias tablas para obtener datos para entrar en seccion*/
class Alfredo_model extends InTouch_Test_Model
{
	 public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }
     
   public function result_getall($id){

    $this->db->select('*');
    $this->db->from('usuario');
    $this->db->join('requerimiento', 'usuario.usuario_id = requerimiento.usuario_id'); 
	if($id !== '0') $this->db->where('usuario.usuario_id',$id); 
 /*  $this->db->where('usuario.nombreusuario','ainfante');*/
    $query = $this->db->get();
    return $query->result();

    }
 }
?>

