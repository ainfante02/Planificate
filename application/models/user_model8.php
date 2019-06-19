<?php

class User_model8 extends InTouch_Test_Model
{

    /**
     * Definicion de la entidad del modelo
     * datos, tipos de validacion, etc
     * @var array
     */
    public $entity = array (
        
        'tiporequerimiento_id' => array(
            'pk'    => true,
            'type'  => 'INT'
        ),

        '	tiporequerimiento' => array(
            'type'      => 'varchar',
            'length'    => 50,
            'required'  => true
       
    
    ),
);
    /**
     * tabla que se usara
     * @var string
     */
    public $schema = 'tiporequerimiento';
}
?>
