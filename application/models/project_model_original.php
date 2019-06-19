<?php

Class Project_model extends InTouch_Test_Model
{


    public $entity = array(
    
        'requerimiento_id' => array(
            'pk'    => true,
            'type'  => 'int'
        ),
 
  'usuario_id' => array(
            'type' => 'int',
            'required' => true
        ),
                
             'descripcionrequerimiento' => array(
            'type'      => 'varchar',
            'required'  => true
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
