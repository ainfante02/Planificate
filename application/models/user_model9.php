<?php


class User_model9 extends InTouch_Test_Model
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
           'required'  => true,
            'unique'    => array(
                'message'       => ' Esta Actividad ya se encuentra Registrada ',
                'callback'      => 'check_is_unique'
                )
        ),
    

        'mensaje_actividad' => array(
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
