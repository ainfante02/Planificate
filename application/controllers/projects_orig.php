<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Projects extends InTouch_Test_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model', 'User_model');
        $this->load->model('project_model', 'model');
        $this->load->model('user_model3', 'User_model3');
        $this->load->model('user_model5', 'User_model5');
         $this->load->model('user_model7', 'User_model7');
          $this->load->model('user_model8', 'User_model8');
          $this->load->model('user_model6', 'User_model6');
          $this->load->model('user_model4', 'User_model4');
          $this->load->model('user_model9', 'User_model9');
          
       	/* Cargamos la libreria groceru_crud */
		$this->load->library('grocery_crud');
     	/* Obtenemos la fecha actual */
     	
     	$this->load->helper('date');
		$timestamp = now();
		$timezone = 'UM4';
		$daylight_saving = FALSE;

		$now = gmt_to_local($timestamp, $timezone, $daylight_saving);
		$datestring = "%Y-%m-%d";
		
		$this->now = mdate($datestring, $now);
		
		if (!isset($this->session->user)){
			
			redirect('php/login');
		}
    }

    function index() {
        
        
        
		
		/* Redirigimos a la funcion promociones() */
		redirect('projects/promociones');
	
	
    }
    
   public function promociones()
	{
		$per_page = 10;
        
        // Si el segundo [ method ] parametro de la redireccion es distinto 
        // al segundo parametro del request uri
        // Esta comprobacion se hace debido a que el segmento es tomado por el request_uri 
        // y para hacer mas agradable la url utilizo una redireccion en el route para acceder
        // mediante ``` projects/:user_id/:page_number
        $segment_user = $this->uri->rsegment(2) !== $this->uri->segment(2) ? 2 : 3; // projects/1   <=> projects/index/1

        // Si no existe el id de usario listar todos los proyectos independientemente del usario
		$operator = "=";
        if( ! $this->uri->segment($segment_user) ) {
            $operator = "!=";
        }

        $usuario_id = $this->uri->segment($segment_user);
        
        $segment_page = $this->uri->rsegment(2) !== $this->uri->segment(2) ? 3 : 4; // projects/1/1 <=> projects/index/1/1
        
        $page = $this->uri->segment($segment_page) ? $this->uri->segment($segment_page) : 0;

        $this->load->library('pagination');

        $rows = $this->model->find(array(
            'select' => 'usuario_id,descripcionrequerimiento, fechainicio, fechaestimada, fechafin,prioridad,estadorequerimiento,requerimiento_id,viarecepcion,tiporequerimiento,fechaestimada',
            'conditions' => array(
                array(
                    'field'     => 'usuario_id',
                    'operator'  => $operator,
                    'value'     => $usuario_id	
                )
            ),
            'limit' =>  array($page, $per_page)
        ));

        $this->pagination->initialize(
            array(
                'base_url'    => base_url() . "projects/index" . $usuario_id,
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

      $this->load->view('structure/header', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    );


/*    $this->load->view('projects/index.php', $data);*/
          
      /*    
          $txt= fopen('opcion.txt', 'a') or die ('Problemas al crear el archivo');
		#  Se establecen los datos que va a conterner el archivo
		fwrite($txt, "primer dato,");
		fwrite($txt, "segundo dato,");
		#  Se hace el ciere para no sobre escribir datos 
		fclose($txt);*/

   
/*
$datos = "Este es mi texto"; 
file_put_contents('salida.txt', $datos);*/
  
          
        $this->load->view('structure/footer');
        
		
		/* Si la fecha de inicio de la Actividad es menor o igual a la fecha actual */
		$this->db->where('fechainicio <=', $this->now);
		
		/* Y la fecha de vencimiento es mayor a la fecha actual */
		$this->db->where('fechaestimada <=', $this->now);
	
		
		/* Traemos todas las promociones de nuestra base de datos */
		$data['promociones'] = $this->db->get('requerimiento')->result();
	/*	print_r($data['promociones']);
		*/
		/* Mandamos las variables a la vista alarma/application/view/catalogo/promociones.php */
	/*	$this->load->view('catalogo/promociones', $data);*/
	    $this->load->view('projects/index.php', $data );
	    
	    
	}


    public function add()
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
            
             $this->viarecepcion = $this->User_model7->find(
                array(
                    'select'    => 'viarecepcion_id,viarecepcion',
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
                    'select'    => 'contacto_id,contacto,gerencia',
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

        if( $this->request->request_method == 'POST' ){
            // Guardo el modelo con los datos obtenidos en la peticion
            // 
            if( ! $this->model->validate ( $this->request->post() ) ) {
                
               
              $this->load->view('structure/header', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    );
                $this->load->view  (  'projects/form.php', 
                                        array(
                                            'errors'    => $this->model->errors,
                                            'data'      => $this->request->post(),
											'user'  => $this->session->user
                                        )
                                    );
                                
                $this->load->view('structure/footer'); 
               
                return;
            }
            $this->model->save( $this->request->post() );
       
            header('location: ' . base_url() . 'projects/' . $this->request->usuario_id);
            header('location: ' . base_url() . 'projects/' . $this->request->nombreactividad);
             header('location: ' . base_url() . 'projects/' . $this->request->nivelrequerimiento);
             header('location: ' . base_url() . 'projects/' . $this->request->viarecepcion_id);
             header('location: ' . base_url() . 'projects/' . $this->request->contacto_id);
             header('location: ' . base_url() . 'projects/' . $this->request->nivelestadorequerimiento);

            die;
        } elseif ( $this->request->request_method == 'GET' ) {

           
            
            $this->load->view('structure/header', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    );
            
            $this->load->view('projects/form.php', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    );
                                    
                               
            
            $this->load->view('structure/footer');
        }

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
            
           
           

        // Si no viene el id o no es un entero
        if( ! $this->uri->segment(3) ) {
            header( 'location: ' . base_url() .'projects?error=a');
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
                $this->load->view  (  'projects/edit.php', 
                                        array(
                                            'errors'    => $this->model->errors,
                                            'data'      => $this->request->post(),
											'user'  => $this->session->user
                                        )
                                    );
                $this->load->view('structure/footer'); 
				
               
               return;
            }
            
            $this->model->save( $this->request->post()) ;
       
       header('location: ' . base_url() . 'projects/' . $this->request->usuario_id);
        /*    header('location: ' . base_url() . 'projects/' . $this->request->descripcionrequerimiento);
             header('location: ' . base_url() . 'projects/' . $this->request->prioridad);
             header('location: ' . base_url() . 'projects/' . $this->request->estadorequerimiento);
             header('location: ' . base_url() . 'projects/' . $this->request->requerimiento_id);
             header('location: ' . base_url() . 'projects/' . $this->request->viarecepcion);
             header('location: ' . base_url() . 'projects/' . $this->request->tiporequerimiento);
             header('location: ' . base_url() . 'projects/' . $this->request->mensaje_actividad);*/
            die;
        
        } elseif ( $this->request->request_method == 'GET' ) {
        
                $rows = $this->model->find(array(
                    'select' => 'usuario_id,descripcionrequerimiento, fechainicio, fechaestimada,fechafin,prioridad,estadorequerimiento,requerimiento_id,viarecepcion,tiporequerimiento,mensaje_actividad,contacto',
                    'conditions' => array(
                        array(
                            'field' => 'usuario_id',
                            'operator' => '=',
                            'value' => $this->uri->segment(3)
                        )
                    ),
                    'limit' => '1'
                ));
				

                if( count( $rows ) == 0 )
                    header('Location: ' . base_url() . 'projects?found=0');

                
                
               $this->load->view('structure/header', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    );
                $this->load->view (  'projects/edit.php', 
                                        array(
                                            'errors'    => $this->model->errors,
                                            'data'      => (array) $rows[0],
											'user'  => $this->session->user
                                        )
                                    ); 
                $this->load->view ( 'structure/footer' );
        }

        

    }
    
  
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */