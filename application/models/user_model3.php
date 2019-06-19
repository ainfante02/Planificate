<?php

class User_model3 extends InTouch_Test_Model
{

    /**
     * Definicion de la entidad del modelo
     * datos, tipos de validacion, etc
     * @var array
     */
    public $entity = array (
        
        'actividad_id' => array(
            'pk'    => true,
            'type'  => 'INT'
        ),

        'nombreactividad' => array(
            'type'      => 'varchar',
            'length'    => 100,
            'required'  => true
        ),
    

        'descripcionactividad' => array(
            'type'      => 'int',
            'required'  => 'true',
            'default'   => 1
        ),

    );

    /**
     * tabla que se usara
     * @var string
     */
    public $schema = 'actividad';
}

