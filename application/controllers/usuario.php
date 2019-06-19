<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Usuario extends InTouch_Test_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model', 'User_model');
       /* $this->load->model('project_model', 'model');*/
        $this->load->model('user_model3', 'User_model3');
        $this->load->model('user_model5', 'User_model5');
         $this->load->model('user_model7', 'User_model7');
          $this->load->model('user_model8', 'User_model8');
          $this->load->model('user_model6', 'User_model6');
          $this->load->model('user_model4', 'User_model4');
          $this->load->model('user_model9', 'User_model9');
           $this->load->model('usuario_model', 'model');
          $this->load->model('auditoria_model', 'auditoria_model'); 
   
		
		if (!isset($this->session->user)){
			
			redirect('php/login');
		}
    }

    function index() {
        
        $per_page = 10;
        
        // Si el segundo [ method ] parametro de la redireccion es distinto 
        // al segundo parametro del request uri
        // Esta comprobacion se hace debido a que el segmento es tomado por el request_uri 
        // y para hacer mas agradable la url utilizo una redireccion en el route para acceder
        // mediante ``` projects/:user_id/:page_number
        $segment_user = $this->uri->rsegment(3) !== $this->uri->segment(3) ? 2 : 3; // projects/1   <=> projects/index/1

        // Si no existe el id de usario listar todos los proyectos independientemente del usario
		
			$operator = "=";
        if( ! $this->uri->segment($segment_user) ) {
            $operator = "!=";
        }
		      $user_id = $this->uri->segment($segment_user);
		/*$operator = "=";
        if( ! $this->uri->segment($segment_user) ) {
            $operator = "!=";
        }

        $usuario_id = $this->uri->segment($segment_user);*/
        
        $segment_page = $this->uri->rsegment(2) !== $this->uri->segment(2) ? 3 : 4; // projects/1/1 <=> projects/index/1/1
        
        $page = $this->uri->segment($segment_page) ? $this->uri->segment($segment_page) : 0;

        $this->load->library('pagination');

        $rows = $this->model->find(array(
            'select' => 'usuario_id,descripcionrequerimiento, fechainicio, fechaestimada, fechafin,prioridad,estadorequerimiento,requerimiento_id,viarecepcion,tiporequerimiento,fechaestimada',
            'conditions' => array(
                array(
                    'field'     => 'usuario_id',
                    'operator'  => $operator,
                    'value'     => $user_id
                )
            ),
            'limit' =>  array($page, $per_page)
        ));

        $this->pagination->initialize(
            array(
                'base_url'    => base_url() . "usuario/index",
                'total_rows'  => $this->model->total_rows,
                'per_page'    => $per_page,
                'uri_segment' => $segment_page
            )
        );
       

        $data = array(
                'results'       => $rows,
                'pagination'    => $this->pagination->create_links(),
				'user' => $this->session->user
        );

      $this->load->view('structure/header_usuario', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    );

		
        $this->load->view('usuario/index.php', $data);
        


        $this->load->view('structure/footer');
        
   
    }
	
/*--------------------------------------------------------------*/

    public function edit()
    {
    	
        /**
        * Tarea 2
        * Los usuarios no pueden más proyectos que (`Level` * 5), independientemente del estado en el que se encuentre.
        * 
        */
            $this->usuario = $this->User_model->find(
                array(
                    'select'    => 'usuario_id, nombreusuario',
                    'conditions' => array(
                       /* array(
                            'field' => 'rol',
                            'operator' => '!=',
                            'value' => 1
                        )*/
                    )
                )
            );
            
           $this->actividad = $this->User_model3->find(
                array(
                    'select'    => 'actividad_id,nombreactividad',
                    'conditions' => array(
                       /* array(
                            'field' => 'rol',
                            'operator' => '!=',
                            'value' => 1
                        )*/
                    )
                )
            );
            
             $this->priorequerimiento = $this->User_model5->find(
                array(
                    'select'    => 'priorequerimiento_id,nombrerequerimiento,nivelrequerimiento',
                    'conditions' => array(
                       /* array(
                            'field' => 'rol',
                            'operator' => '!=',
                            'value' => 1
                        )*/
                    )
                )
            );
            
         
            
              $this->tiporequerimiento = $this->User_model8->find(
                array(
                    'select'    => 'tiporequerimiento_id,tiporequerimiento',
                    'conditions' => array(
                       /* array(
                            'field' => 'rol',
                            'operator' => '!=',
                            'value' => 1
                        )*/
                    )
                )
            );
            
             $this->contacto = $this->User_model6->find(
                array(
                    'select' => 'contacto_id,contacto,gerencia',
                    'conditions' => array(
                       /* array(
                            'field' => 'rol',
                            'operator' => '!=',
                            'value' => 1
                        )*/
                    )
                )
            );
            
            $this->estadorequerimiento = $this->User_model4->find(
                array(
                    'select'    => 'estadorequerimiento_id,estadorequerimiento,nivelestadorequerimiento',
                    'conditions' => array(
                       /* array(
                            'field' => 'rol',
                            'operator' => '!=',
                            'value' => 1
                        )*/
                    )
                )
            );
           

        // Si no viene el id o no es un entero
        if( ! $this->uri->segment(3) ) {
            header( 'location: ' . base_url() .'Usuario?error=a');
            return;
        }

        if( $this->request->request_method == 'POST' ){
        	
            // Guardo el modelo con los datos obtenidos en la peticion
            // 

           
            if( ! $this->model->validate ( $this->request->post(), 'update' ) ) {
                
                $this->load->view('structure/header', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    );
                $this->load->view  (  'usuario/form.php', 
                                        array(
                                            'errors'    => $this->model->errors,
                                            'data'      => $this->request->post(),
											'user'  => $this->session->user
                                        )
                                    );
                $this->load->view('structure/footer'); 
				
                /*redirect('usuario/'.$this->usuario_id, 'refresh');*/
               return;
            }
            
            $this->model->save( $this->request->post()) ;
             $this->auditoria_model->save( $this->request->post() );
   	
   	$userId = $this->session->user->usuario_id;
      header('location: ' . base_url() . 'usuario/'.$userId );
     /*     $this->regresarUsuario();*/
      
/*     redirect('usuario/'. $usuario_id);*/
 /*   redirect(base_url() .'usuario/' .$this->usuario_id );*/
 

            die;
      
        } elseif ( $this->request->request_method == 'GET' ) {
        		
        	
        
                $rows = $this->model->find(array(
                    'select' => 'usuario_id,descripcionrequerimiento, fechainicio, fechaestimada,fechafin,prioridad,estadorequerimiento,requerimiento_id,viarecepcion,tiporequerimiento,mensaje_actividad,contacto,ob',
                    'conditions' => array(
                        array(
                            'field' => 'requerimiento_id',
                            'operator' => '=',
                            'value' => $this->uri->segment(3)
                        )
                    ),
                    'limit' => '1'
                ));
				

                if( count( $rows ) == 0 )
                    header('Location: ' . base_url() . 'usuario?found=0');

                
                
               $this->load->view('structure/header', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    );
                $this->load->view (  'usuario/form.php', 
                                        array(
                                            'errors'    => $this->model->errors,
                                            'data'      => (array) $rows[0],
											'user'  => $this->session->user
										
                                        )
                                    ); 
                $this->load->view ( 'structure/footer' );
        }

   

    }
    
/* public function regresarUsuario(){
  	
	redirect('vista');
  
  }*/

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */