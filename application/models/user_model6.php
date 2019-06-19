<?php

class User_model6 extends InTouch_Test_Model
{

    /**
     * Definicion de la entidad del modelo
     * datos, tipos de validacion, etc
     * @var array
     */
    public $entity = array (
        
        'contacto_id' => array(
            'pk'    => true,
            'type'  => 'INT'
        ),

        'contacto' => array(
            'type'      => 'varchar',
            'length'    => 50,
            'required'  => true
        ),
		
		'gerencia' => array(
            'type'      => 'varchar',
            'length'    => 50,
            'required'  => true
        ),
		
    
    );

    /**
     * tabla que se usara
     * @var string
     */
    public $schema = 'contacto';
}
?>
