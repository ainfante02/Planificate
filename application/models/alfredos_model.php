<?php
/*consulta de varias tablas para obtener datos para entrar en seccion*/
class Alfredo_model extends InTouch_Test_Model
{

function join($id_usuario){
	
$this->db->select('*');
$this->db->from('usuario O');
$this->db->from('requerimiento P');
$this->db->join('requerimiento R', 'R.usuario_id = O.usuario_id');

$query = $this->db->get();
if ($query->num_rows() > 0){
   		return $query->result_array();
	}
	return null; 
 }
}
?>