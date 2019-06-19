<?php
// En este codigo paso los datos de validacion para poder entrar al sistema ,quien recibe es php.php//
class Users_model extends CI_Model{
   function ValidarUsuario($nombreusuario,$password){         //   Consulta Mysql para buscar en la tabla Usuario aquellos usuarios que coincidan con el mail y password ingresados en pantalla de login
      $query = $this->db->where('nombreusuario',$nombreusuario);   //   La consulta se efectúa mediante Active Record. Una manera alternativa, y en lenguaje más sencillo, de generar las consultas Sql.
      //$query = $this->db->where('Password',$password);
	   
      $query = $this->db->get('usuario');
      
       if($query->row() == NULL ) {
       	$this->registrarIntento(0,$nombreusuario);
       	return FALSE;
	  }
      
      if($query->row()->password != $password){ 
      	$this->registrarIntento($query->row()->usuario_id,$nombreusuario);
      	return FALSE;
	  }
      
      $this->limpiarIntentos($query->row()->usuario_id);
      
      return $query->row();    //Devolvemos al controlador la fila que coincide con la búsqueda. (FALSE en caso que no existir coincidencias)
   }
   
   function registrarIntento($usuario_id,$nombreusuario){
   	$dataTry = array(
            'usuario_id' => $usuario_id,
            'nombreusuario' => $nombreusuario
        );
    if($dataTry['usuario_id'] == NULL) $dataTry['usuario_id'] = 0;
      $this->db->insert('intentosentrada',$dataTry);
	}
	
	function insertarAccion($usuario_id, $accion){
    	$dataTry = array(
            'accion' => $accion,
            'usuario_id' => $usuario_id
        );
    	
		$this->db->insert('auditoria',$dataTry);
	}
	
	function consultarDBIntentos($usuario_id,$fecha){
		$this->db->where('usuario_id',$usuario_id);
		$this->db->like('fecha',$fecha);
		return count($this->db->get('intentosentrada')->result());
	}
	
	function cambiarEstadoUsuario($usuario_id,$estado){
		$data = array(
               'estado' => $estado
               );

		$this->db->where('usuario_id', $usuario_id);
		$this->db->update('usuario', $data);
		
		if($estado == 0) $this->insertarAccion($usuario_id,'Usuario bloqueado.');
		else if($estado == 1) $this->insertarAccion($usuario_id,'Usuario desbloqueado.');
		
		return TRUE;
	}
	
	function buscarUsuario($nombreusuario){
		$this->db->where('nombreusuario', $nombreusuario);
		$query = $this->db->get('usuario');
		if( $query->row() != NULL ) return TRUE;
		else return FALSE;
	}
	
	function limpiarIntentos($usuario_id){
		$this->db->where('usuario_id', $usuario_id);
		$this->db->delete('intentosentrada');
	}
	
	function obtenerId($nombreusuario){
		$this->db->where('nombreusuario', $nombreusuario);
		$query = $this->db->get('usuario');
		return $query->row()->usuario_id;
	}
}
?>