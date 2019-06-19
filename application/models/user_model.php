<?php

class User_model extends InTouch_Test_Model
{

    /**
     * Definicion de la entidad del modelo
     * datos, tipos de validacion, etc
     * @var array
     */
    public $entity = array (
        
        'usuario_id' => array(
            'pk'    => true,
            'type'  => 'INT'
        ),

        'nombreusuario' => array(
            'type'      => 'varchar',
           'required'  => true,
            'unique'    => array(
                'message'       => ' Este Usuario ya se encuentra Registrado ',
                'callback'      => 'check_is_unique'
                )
        ),

        'email' => array (
            'type'      => 'email',
            'required'  => true,
            'unique'    => array(
                'message'       => ' Este correo electronico ya se encuentra registrado ',
                'callback'      => 'check_is_unique'
            )
        ),

        'password' => array (
            'type'          => 'varchar',
            'length'        => 50,
            'required'      => true,
            'equal_data'    => array (
                    'field' => 'confirm_password',
                    'message' => 'Las contraseñas deben coincidir'
            ),
            'save' => array(
                'is_null'  => 'ignore', 
                'merge' => 'nombreusuario',
                'crypt' => 'md5'
            )
        ),

        'rol'     => array(
            'type'      => 'int',
            'required'  => 'true',
            'default'   => 1
        ),
         'estado'     => array(
            'type'      => 'int',
            'required'  => 'true',
            'default'   => 1
        ),

    );

    /**
     * tabla que se usara
     * @var string
     */
    public $schema = 'usuario';



}

