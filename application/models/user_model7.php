<?php

class User_model7 extends InTouch_Test_Model
{

    /**
     * Definicion de la entidad del modelo
     * datos, tipos de validacion, etc
     * @var array
     */
    public $entity = array (
        
        'viarecepcion_id' => array(
            'pk'    => true,
            'type'  => 'INT'
        ),

        '	viarecepcion' => array(
            'type'      => 'varchar',
            'length'    => 50,
            'required'  => true  
    ),
);
    /**
     * tabla que se usara
     * @var string
     */
    public $schema = 'viarecepcion';
}

