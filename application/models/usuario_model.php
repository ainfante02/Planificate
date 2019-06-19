<?php

Class Usuario_model extends InTouch_Test_Model
{


    public $entity = array(
    
        'requerimiento_id' => array(
            'pk'    => true,
            'type'  => 'int'
        ),
    
        
		
        'fechainicio' => array(
            'type'  => 'date',
            'default' => null,
        ), 
        
        'fechafin' => array(
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
        'fechaestimada' => array(
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
       
				 /*
				 ),
				   'estadorequerimiento_id' => array(
            'type'      => 'varchar',
            'length'    => 100,
            'required'  => false
        ), */
		
		
		
	
	
                /*
                Este hook permite que se setee la fecha de enddate 
                si el valor de isfinished pasa a 1, dejo desactivada
                esta funcionalidad
                'hook'  => array(
                    'before_update' => 'set_end_date'
                )
                */
                
  /* Apartir de esta linea estaremos usando dato de otras tablas*/
  
  'usuario_id' => array(
            'type' => 'int',
            'required' => false
        ),
                
             'descripcionrequerimiento' => array(
            'type'      => 'varchar',
            'required'  => false
        ),    
          /*'nivelrequerimiento' => array(
            'type' => 'int',
            'default' => 0,
            /*'save' => array(
                'is_null' => 'default',
                
                 ),*/   
                 
                 'prioridad' => array(
            'type' => 'int',
            'default' => null,
            /*'save' => array(
                'is_null' => 'default',*/
                
                 ),     
                 
             'viarecepcion' => array(
            'type'      => 'varchar',
            'required'  => false
        ), 
        
        'tiporequerimiento' => array(
            'type'      => 'varchar',
            'required'  => false
        ), 
        
        'contacto' => array(
            'type'      => 'varchar',
            'required'  => false
        ), 
        
    
        
        	 'estadorequerimiento' => array(
              'type' => 'int',
            'required' => false
        ),
        
          'mensaje_actividad' => array(
            'type'      => 'varchar',
            'length'    => 100,
            'required'  => false
        ), 
    
    	
		 'ob' => array(
            'type'      => 'text',
            'required'  => false
        ), 

    );
    
 
		

    public $schema = 'requerimiento';
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
