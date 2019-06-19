<?php

Class Auditoria_model extends InTouch_Test_Model
{


    public $entity = array(
    
        'id' => array(
            'pk'    => true,
            'type'  => 'int'
        ),
    
        
 
        
        'fecha' => array(
            'type' => 'date',
			'default' => null,
             /*'save' => array(
                'field_value' => array(
                    'field' => 'estadorequerimiento',
                    'value' => 1,
                    'callback' => 'now'
                )
            )*/
        ),
        
         'accion' => array(
            'type'      => 'varchar',
            'required'  => true
        ),
        
           'usuario_id' => array(
            'type'      => 'varchar',
            'required'  => true
        ),
 );
		

    public $schema = 'auditoria';
    
    
}



 /*   /**
     * Hook before update
    
    public function set_end_date( $data )
    { 
        if( $data['fechafin'] == 1 ) {
            $data['fechainicio'] = time();
        }
        return $data;
    }

}*/
?>
