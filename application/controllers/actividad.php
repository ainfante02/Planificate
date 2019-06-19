<?php defined('BASEPATH') OR exit('No direct script access allowed');



class actividad extends InTouch_Test_Controller {

    function __construct() {
        parent::__construct();
      
        $this->load->model('user_model9', 'model');
	
		if (!isset($this->session->user)){
			
			redirect('php/login');
		}
    }function index() {
  
 	redirect('users');
	}
   
    public function add()
    
    {   

      

        if( $this->request->request_method == 'POST' ){
            // Guardo el modelo con los datos obtenidos en la peticion
            // 
            if( ! $this->model->validate ( $this->request->post() ) ) {
                
               
              $this->load->view('structure/header', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    );
                $this->load->view  (  'projects/forma.php', 
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
            
			 header('location: ' . base_url() . 'actividad/' );
/* $this->User_model2->save( $this->request->post() );*/
/*             header('location: ' . base_url() . 'parametros/' . $this->request->usuario_id);
            header('location: ' . base_url() . 'parametros/' . $this->request->nombreactividad);
             header('location: ' . base_url() . 'parametros/' . $this->request->nivelrequerimiento);
             header('location: ' . base_url() . 'parametros/' . $this->request->viarecepcion_id);
             header('location: ' . base_url() . 'parametros/' . $this->request->contacto_id);
             header('location: ' . base_url() . 'parametros/' . $this->request->nivelestadorequerimiento); */
            die;
        } elseif ( $this->request->request_method == 'GET' ) {

           
            
            $this->load->view('structure/header', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    );
            
            $this->load->view('projects/forma.php', 
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
          

        // Si no viene el id o no es un entero
        if( ! $this->uri->segment(3) ) {
            header( 'location: ' . base_url() .'parametros?error=a');
            return;
        }

        if( $this->request->request_method == 'POST' ){
            // Guardo el modelo con los datos obtenidos en la peticion
            // 
            $this->model->entity['password']['required'] = false;
           
            if( ! $this->model->validate ( $this->request->post(), 'update' ) ) {
                
                $this->load->view('structure/header', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    );
                $this->load->view  (  'parametros/form.php', 
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


           
       /* header('location: ' . base_url() . 'parametros/' . $this->request->usuario_id . $this->request->estadorequerimiento . $this->request->nombreactividad . $this->request->priorequerimiento_id); */
            die;
        
        } elseif ( $this->request->request_method == 'GET' ) {
        
                $rows = $this->model->find(array(
                    'select' => 'usuario_id,descripcionrequerimiento, fechainicio, fechaestimada, fechafin,prioridad,estadorequerimiento,requerimiento_id,viarecepcion,tiporequerimiento,fechaestimada',
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
                    header('Location: ' . base_url() . 'parametros?found=0');

                
                
               $this->load->view('structure/header', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    );
                $this->load->view (  'parametros/form.php', 
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