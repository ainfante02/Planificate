<?php

class User_model5 extends InTouch_Test_Model
{

    /**
     * Definicion de la entidad del modelo
     * datos, tipos de validacion, etc
     * @var array
     */
    public $entity = array (
        
        'priorequerimiento_id' => array(
            'pk'    => true,
            'type'  => 'INT'
        ),

        'nivelrequerimiento' => array(
            'type'      => 'int',
            'length'    => 1,
            'required'  => true
        ),
		
		'nombrerequerimiento' => array(
            'type'      => 'varchar',
            'length'    => 50,
            'required'  => true
        ),
    
    );

    /**
     * tabla que se usara
     * @var string
     */
    public $schema = 'priorequerimiento';
}
?>
