<?php

class User_model4 extends InTouch_Test_Model
{

    /**
     * Definicion de la entidad del modelo
     * datos, tipos de validacion, etc
     * @var array
     */
    public $entity = array (
        
        'estadorequerimiento_id' => array(
            'pk'    => true,
            'type'  => 'INT'
        ),

        'estadorequerimiento' => array(
            'type'      => 'varchar',
            'length'    => 100,
            'required'  => true
        ),
    
	
	 'nivelestadorequerimiento' => array(
            'type'      => 'varchar',
            'length'    => 100,
            'required'  => true
        ),
	
    );

    /**
     * tabla que se usara
     * @var string
     */
    public $schema = 'estadorequerimiento';
}
?>
