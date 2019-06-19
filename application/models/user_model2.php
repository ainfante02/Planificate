<?php

class User_model2 extends InTouch_Test_Model
{

    /**
     * Definicion de la entidad del modelo
     * datos, tipos de validacion, etc
     * @var array
     */
    public $entity = array (
        
       
'persona_id' => array(
            'pk'    => true,
            'type'  => 'INT',
            
        ),


        'nombre' => array(
          'type'      => 'varchar',
           'required'  => true,
            'unique'    => array(
                'message'       => ' Este Usuario ya se encuentra Registrado ',
                'callback'      => 'check_is_unique'
                )
        ),
 
            'apellido' => array(
            'type'      => 'varchar',
            'length'    => 100,
            'required'  => true
        ),
        
        'cargo' => array(
            'type'      => 'varchar',
            'length'    => 100,
            'required'  => true
        ),
        
       
         'id_user' => array(
          
            'type'  => 'INT'
        ),
        
    );

    /**
     * tabla que se usara
     * @var string
     */
    public $schema = 'persona';



}

