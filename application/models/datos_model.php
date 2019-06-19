<?php class Datos_model extends CI_Model {     
 
function __construct() 
{        
    parent::__construct();    
}     
 
//obtenemos todos los mensajes a mostrar en la tabla     
function mensajes() 
{         
    $query = $this->db->get('requerimiento');
        foreach ($query->result() as $fila) 
        {
            $data[] = $fila;
        }
    return $data;
}
 
    //obtenemos la fila completa del mensaje a editar
    //vemos que como solo queremos una fila utilizamos
    //la funci�n row que s�lo nos devuelve una fila,
    //as� la consulta ser� m�s r�pida
    function obtener($requerimiento_id) {
        $this->db->where('requerimiento_id', $requerimiento_id);
        $query = $this->db->get('requerimiento');
        $fila = $query->row();
        return $fila;
    }
 
    //actualizamos los datos en la base de datos con el patr�n
    //active record de codeIginiter, recordar que no hace falta
    //escapar las consultas ya que lo hace �l automatic�mente
    function actualizar_mensaje($requerimiento_id, $mensaje_actividad, $fechaestimada) {
        $data = array(
            'mensaje_actividad' => $mensaje_actividad,
         
            'fechaestimada' => $fechaestimada
		
         
        );
        $this->db->where('requerimiento_id', $requerimiento_id);
        return $this->db->update('requerimiento', $data);
    }
}
/*application/models/datos_model.php
 * el modelo datos_model.php
 */