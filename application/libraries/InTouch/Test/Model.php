<?php 
Class InTouch_Test_Model extends CI_Model
{
    /**
     * Definicion de la entidad del modelo
     * datos, tipos de validacion, etc
     * @var array
     */
    /*protected $entity = array (*/
        
       /* 'id' => array(
            'pk'    => true,
            'type'  => 'INT'
        ),

        'nombreusuario' => array(
            'type'      => 'varchar',
            'length'    => 100,
            'required'  => true,
        ),*/

  /*  'email' => array (
            'type'      => 'email',
            'required'  => false,
            'unique'    => array(
                'message'       => ' Este correo electronico ya se encuentra registrado m',
                'callback'      => 'check_is_unique'
            )
        ),*/
/*
        'password' => array (
            'type'          => 'varchar',
            'length'        => 50,
            'required'      => true,
            'equal_data'    => array (
                    'field' => 'confirm_password',
                    'message' => 'Las contraseñas deben coincidir'
                    )
            ),
         'save' => array(
                'is_null'  => 'ignore', 
                'merge' => 'name',
                'crypt' => 'md5'
            
        ),*/
       

  /*  );*/

    /**
     * tabla que se usara
     * @var string
     */
   /*protected $schema = 'usuario';*/

    /**
     * variable de control de errores para el validador
     * @var boolean
     */
    public $errors = false;
//    public $userIdPersona;

    /**
     * Total de datos que tien el modelo en una instancia determinada
     * @var int
     */
    public $total_rows;
    public $lastTime = 0;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Metodo para buscar dentro del modelo user
     * formato:
     *     { 
     *         select : "fields",
     *         limit : [ int | [page, offset] ]
     *         conditions : [
     *             {
     *                 // nombre del campo a evaluar
     *                 'field' : 'field_name',
     *                 // operador de comparacion
     *                 'operator' : [>, <, =, <=, >=, <>, !=, LIKE, etc],
     *                 // valor a comparar
     *                 'value': 'criteria',
     *                 // Tipo de union con respecto a otras condiciones
     *                 'join' : [and, or]
     *             }
     *         ]
     *     } 
     * @param  array  $parameter 
     * @return object devuelve el listado de datos que encuentre la consulta generada
     */
    public function find($parameter = array())
    {
        $select     = ( isset ( $parameter['select'] ) ) ? $parameter['select'] : '*';
        $conditions = ( isset ( $parameter['conditions'] ) ) ? $this->_parseConditions( $parameter['conditions'] ) : null; 
        $limit      = ( isset ( $parameter['limit'] ) ) ? $parameter['limit'] : 10; 

    
        $this->db
        -> select( 'SQL_CALC_FOUND_ROWS ' . $select, FALSE )
        -> from( $this->schema );
        
        if( is_array( $limit ) ) {

            $this->db->limit( $limit[1], $limit[0]);
        }else{
            $this->db->limit( $limit );
        }		
		
        $resource = $this->db->get();

        $query = $this->db->query('SELECT FOUND_ROWS() AS `Count`');
        $objCount = $query->result_array();
        $this->total_rows = $objCount[0]['Count'];

        return $resource->result();


    }

    /**
     * Guarda o actualizado los datos segun si se encuentra
     * presente la clave primaria
     *     
     * @param  array $saveData [description]
     * @return [type]           [description]
     */
     
     
    public function save( $saveData, $audita = FALSE )
    {
        $action = 'insert';
        $setData = array();
        $pk = null;
        
        
        
        if($audita === TRUE && $saveData["nombreusuario"] != NULL ){
       		if( $this->hayCambioEstado($saveData["nombreusuario"],$saveData["estado"]) ){   			
       			$tempId = $this->obtenerId($saveData["nombreusuario"]);
       			if($saveData["estado"] == 1) $this->insertarAccion($tempId,"Usuario desbloqueado.");
       			else $this->insertarAccion($tempId,"Usuario bloqueado.");
       			$this->limpiarIntentos($tempId);
       			
			}
		}
		
		
        
        
        foreach( $this->entity AS $field_name => $data )
        {
        	
        	
            if( isset($data['pk'] ) && $data['pk'] == true ) {
                $pk = $field_name;
                if( isset( $saveData[$pk] ) ) {
                    $action = 'update';
                    $this->db->where($pk, $saveData[$pk]);
                }
            }
            // Verifico si esta seteado el nombre del campo y si no es la clave primaria
            if( isset( $saveData[$field_name] ) && ( !isset( $data['pk'] ) || $data['pk'] == false ) ) {
                if( isset( $data['save'] ) ) {
                  
                    // Hooks before inser/update  
                    if( isset( $data['save']['hook'] ) ) {
                        if( $action == 'update') {
							
                            if( isset( $data['save']['hook']['before_update'] ) ) {
                                $method = $data['save']['hook']['before_update'];
                                $class = $this;
                                if( method_exists( $class , $method ) ) {
                                    $saveData = call_user_func_array( array( $class, $method) , array( $saveData ) );
                                }
                            }
                        }
                    }

                    

                    if( isset( $data['save']['is_null'] ) && empty( $saveData[$field_name] ) ) {
                    
                        if( $data['save']['is_null'] == 'ignore' ) {
                            continue;
                        } elseif ( $data['save']['is_null'] == 'default' && isset( $data['default'] ) ) {
                            $saveData[$field_name] = $data['default'];                           
                        } else {
                            $saveData[$field_name] = $data['save']['is_null'];
                        }                        
                    
                    } 


                    
                    $tmp = ( isset( $data['save']['merge'] ) ) ? $saveData[$data['save']['merge']] . $saveData[$field_name] : $saveData[$field_name] ;
                    
                    if( isset( $data['save']['crypt'] ) ) {
                        $tmp = call_user_func_array( $data['save']['crypt'], array( $tmp ) );
                    }
                    
                    $saveData[$field_name] = $tmp;
                }
                $setData[$field_name] = $saveData[$field_name];
            }
        }
		
        $this->db->{$action}($this->schema, $setData);
        $userIdPersona=$this-> db-> insert_id ();
        $saveData["id_user"] = $userIdPersona;
        $saveData["usuario_id"] = $userIdPersona;
       	$debug = 0;
       	
       	return $userIdPersona;

    }


/*-------------------------------Recibe el valor de usuario_id que esta en save-------------------------------------------*/
    public function save2( $saveData, $userId )
    {
        $action = 'insert';
        $setData = array();
        $pk = null;
        
        $saveData["id_user"] = $userId;
        
        foreach( $this->entity AS $field_name => $data )
        {
        	
       
        	
            if( isset($data['pk'] ) && $data['pk'] == true ) {
                $pk = $field_name;
                if( isset( $saveData[$pk] ) ) {
                    $action = 'update';
                    $this->db->where($pk, $saveData[$pk]);
                }
            }
            // Verifico si esta seteado el nombre del campo y si no es la clave primaria
            if( isset( $saveData[$field_name] ) && ( !isset( $data['pk'] ) || $data['pk'] == false ) ) {
                if( isset( $data['save'] ) ) {
                  
                    // Hooks before inser/update  
                    if( isset( $data['save']['hook'] ) ) {
                        if( $action == 'update') {
							
                            if( isset( $data['save']['hook']['before_update'] ) ) {
                                $method = $data['save']['hook']['before_update'];
                                $class = $this;
                                if( method_exists( $class , $method ) ) {
                                    $saveData = call_user_func_array( array( $class, $method) , array( $saveData ) );
                                }
                            }
                        }
                    }

                    

                    if( isset( $data['save']['is_null'] ) && empty( $saveData[$field_name] ) ) {
                    
                        if( $data['save']['is_null'] == 'ignore' ) {
                            continue;
                        } elseif ( $data['save']['is_null'] == 'default' && isset( $data['default'] ) ) {
                            $saveData[$field_name] = $data['default'];                           
                        } else {
                            $saveData[$field_name] = $data['save']['is_null'];
                        }                        
                    
                    } 


                    
                    $tmp = ( isset( $data['save']['merge'] ) ) ? $saveData[$data['save']['merge']] . $saveData[$field_name] : $saveData[$field_name] ;
                    
                    if( isset( $data['save']['crypt'] ) ) {
                        $tmp = call_user_func_array( $data['save']['crypt'], array( $tmp ) );
                    }
                    
                    $saveData[$field_name] = $tmp;
                }
                $setData[$field_name] = $saveData[$field_name];
            }
        }


        $this->db->{$action}($this->schema, $setData);
       
    }
/*--------------------------------------------------------------------------*/
  public function save3( $saveData, $userId )
    {
        $action = 'insert';
        $setData = array();
        $pk = null;
        
        $saveData["usuario_id"] = $userId;
        
        foreach( $this->entity AS $field_name => $data )
        {
        	
       
        	
            if( isset($data['pk'] ) && $data['pk'] == true ) {
                $pk = $field_name;
                if( isset( $saveData[$pk] ) ) {
                    $action = 'update';
                    $this->db->where($pk, $saveData[$pk]);
                }
            }
            // Verifico si esta seteado el nombre del campo y si no es la clave primaria
            if( isset( $saveData[$field_name] ) && ( !isset( $data['pk'] ) || $data['pk'] == false ) ) {
                if( isset( $data['save'] ) ) {
                  
                    // Hooks before inser/update  
                    if( isset( $data['save']['hook'] ) ) {
                        if( $action == 'update') {
							
                            if( isset( $data['save']['hook']['before_update'] ) ) {
                                $method = $data['save']['hook']['before_update'];
                                $class = $this;
                                if( method_exists( $class , $method ) ) {
                                    $saveData = call_user_func_array( array( $class, $method) , array( $saveData ) );
                                }
                            }
                        }
                    }

                    

                    if( isset( $data['save']['is_null'] ) && empty( $saveData[$field_name] ) ) {
                    
                        if( $data['save']['is_null'] == 'ignore' ) {
                            continue;
                        } elseif ( $data['save']['is_null'] == 'default' && isset( $data['default'] ) ) {
                            $saveData[$field_name] = $data['default'];                           
                        } else {
                            $saveData[$field_name] = $data['save']['is_null'];
                        }                        
                    
                    } 


                    
                    $tmp = ( isset( $data['save']['merge'] ) ) ? $saveData[$data['save']['merge']] . $saveData[$field_name] : $saveData[$field_name] ;
                    
                    if( isset( $data['save']['crypt'] ) ) {
                        $tmp = call_user_func_array( $data['save']['crypt'], array( $tmp ) );
                    }
                    
                    $saveData[$field_name] = $tmp;
                }
                $setData[$field_name] = $saveData[$field_name];
            }
        }


        $this->db->{$action}($this->schema, $setData);
       
    }




/*----------------------------------------------------------------------*/

    /**
     * Define las condiciones
     * @param  array $arrayConditions  
     * [
     *     'field' => 'field_name',
     *     'operator' => '=',
     *     'join'   => 'and/or',
     *     'value'  => 'string'
     * ]
     * @return [type]                  [description]
     */
    private function _parseConditions( $arrayConditions ) 
    {
        $fieldList = array_keys( $this->entity );

        $_def = array('operator' => '=', 'join' => 'and');

        if( count( $arrayConditions ) > 0 ) {
            foreach( $arrayConditions AS $_condition ) {
                if( in_array($_condition['field'], $fieldList ) ) {
                    $_condition = array_merge( $_def, $_condition);
                    $key_condition = $_condition['field'] . ' ' . $_condition['operator'];
                   
                    if( $_condition['join'] == 'and') {
                        $this->db->where( $key_condition, $_condition['value']);
                    } else {
                        $this->db->or_where( $key_condition, $_condition['value']);
                    }
                }
            }
        }


    }

    /**
     * Validacion de campos segun la configuracion de las entidades
     *
     * @see  self::$entity
     *       
     * @param  array $data datos a validar [{ field => value},...]
     * @return bool  
     */
    public function validate ( $data, $action = 'create' )
    {
        foreach ( $this->entity As $entity_field => $entity_data ) {

            if( isset( $entity_data['compare'] ) && isset( $data[$entity_field] ) ) {

                if( ! $this->_validate_compare( $entity_data['compare']['operator'], $data[$entity_field], $data[$entity_data['compare']['field']] ) ) {
                    
                    $this->errors[$entity_field]['compare'] = 
                        isset( $entity_data['compare']['message'] ) ? 
                            $entity_data['compare']['message'] 
                        : 
                            ' Error en la comparacion de la expresion ( ' .  $entity_field . ' ' . $entity_data['compare']['operator'] .' ' . $entity_data['compare']['field'] . ')';
                
                }
            }
            
            // Verificar si se definieron los datos requeridos
            
            if( isset( $entity_data['required'] ) && $entity_data['required'] ) {
                if ( !isset( $data[$entity_field] ) || $data[$entity_field] == '' ) {

                    $this->errors[$entity_field]['required'] = ' Este campo es obligatorio ';
                }
            } 

            // Verificar si requiere una comprobacion de igualdad con otro elemento

            if ( isset( $entity_data['equal_data'] )  ) {
                if( !isset( $data[$entity_data['equal_data']['field']] ) ) {
                    $this->errors[$entity_field]['equal_data'] = !isset( $entity_data['equal_data']['message']) 
                                                                    ?
                                                                     ' nx . el campo ' . $entity_field . ' tiene que ser igual a ' . $entity_data['equal_data']['field']
                                                                     : 
                                                                     $entity_data['equal_data']['message'];
                } elseif( $data[$entity_data['equal_data']['field']] != $data[$entity_field] ) {
                    $this->errors[$entity_field]['equal_data'] = !isset( $entity_data['equal_data']['message']) 
                                                                    ?
                                                                     'el campo ' . $entity_field . ' tiene que ser igual a ' . $entity_data['equal_data']['field']
                                                                     : 
                                                                     $entity_data['equal_data']['message'];
                }

            }

            if ( isset( $entity_data['type'] ) && $entity_data['type'] == 'email' && isset( $data[$entity_field] ) ) {
                if (version_compare(phpversion(), '5.2.0', '>=')) {
                    if( ! filter_var($data[$entity_field], FILTER_VALIDATE_EMAIL) ) {
                         $this->errors[$entity_field]['email'] = 'email no válido';
                    }
                } else {
                    if( ! preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/is", $data[$entity_field] ) ) {
                         $this->errors[$entity_field]['email'] = 'email no válido';
                    }
                }
            }

            // Chequear datos unicos
            if ( $action == 'create' && isset( $entity_data['unique'] ) && isset( $data[$entity_field] ) ) {
                    $method = $entity_data['unique']['callback'];
                    $class = $this;
                    if( method_exists( $class , $method ) ) {
                        if ( ! call_user_func_array( array( $class, $method) , array( $entity_field, $data[$entity_field] ) ) ) {
                             $this->errors[$entity_field]['email'] = $entity_data['unique']['message'];
                        }
                    }
            }
        }

        return empty( $this->errors );
    }

    public function _validate_compare( $operator, $var_1, $var_2) {
        $map = array(
            ">"     => $var_1 > $var_2,
            "<"     => $var_1 < $var_2,
            "=="    => $var_1 == $var_2,
            "!="    => $var_1 != $var_2,
            '<='    => $var_1 <= $var_2,
            '>='    => $var_1 >= $var_2,
            '==='   => $var_1 === $var_2
        );

        return $map[$operator];
    }


    public function check_is_unique( $field_name, $field_value ) {
        $this->db
        -> select( ' COUNT(*) AS t' )
        -> from( $this->schema )
        -> where( $field_name, $field_value )
        -> limit(1);

        $resource = $this->db->get();
        $count = $resource->result_array();

        return $count[0]['t'] == 0;

    }
    
    function limpiarIntentos($usuario_id){
		$this->db->where('usuario_id', $usuario_id);
		$this->db->delete('intentosentrada');
	}
	
	function hayCambioEstado($nombreusuario,$estado){
		$this->db->where('nombreusuario', $nombreusuario);
		$row = $this->db->get('usuario')->row();
		
		
		if( $row !== NULL && $row->estado == $estado ){
			return FALSE;
		}
		
		return TRUE;
	}
	
	function insertarAccion($usuario_id, $accion){
    	$dataTry = array(
            'accion' => $accion,
            'usuario_id' => $usuario_id
        );
    	if($usuario_id !== NULL ) $this->db->insert('auditoria',$dataTry);
	}
	
	function obtenerId($nombreusuario){
		$this->db->where('nombreusuario', $nombreusuario);
		$query = $this->db->get('usuario')->row();
		if($query !== NULL ) return $query->usuario_id;
		return NULL;
	}
	
}