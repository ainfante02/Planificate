<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Users1 extends InTouch_Test_Controller {

    function __construct() {
		
        parent::__construct();
        $this->load->model('user_model', 'model');
        $this->load->model('user_model', 'model');
        $this->load->model('user_model2', 'user_model2');
          $this->load->model('user_model9', 'user_model9');
       /* $this->load->model('user_model3', 'user_model3');*/
		
		if (!isset($this->session->user)){
			
			redirect('php/login');
		}
    }

    function index() {

        $per_page = 10;

        $page =($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $this->load->library('pagination');

        $rows = $this->model->find(array(
            'select' => 'usuario_id, nombreusuario, email, rol, estado,password,',
            /*
            'conditions' => array(
                array(
                    'field' => 'name',
                    'operator' => 'LIKE',
                    'value' => '%Psa%'
                ),
                array(
                    'field' => 'email',
                    'operator'=> 'LIKE',
                    'value' => '%@gmail%',
                    'join'  => 'or'
                )
            ),
            */
            'limit' =>  array($page, $per_page)
        ));





        $this->pagination->initialize( array(
            'base_url' => base_url() . "users/index",
            'total_rows' => $this->model->total_rows,
            'per_page' => $per_page,
            'uri_segment' => 3
            
        ));

        

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
 

        $this->load->view('users1/index.php', $data);
        


        $this->load->view('structure/footer');
    }

    public function add()
    {   
        if( $this->request->request_method == 'POST' ){
        	
            // Guardo el modelo con los datos obtenidos en la peticion
            // 
            if( ! $this->model->validate ( $this->request->post() ) ) {
            	$this->user_model2->entity['nombre']['required'] = true;
                
                 $this->load->view('structure/header', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    );
                $this->load->view  (  'users/form.php', 
                                        array(
                                            'errors'    => $this->model->errors,
                                            'data'      => $this->request->post()
                                        )
                                    );
                $this->load->view('structure/footer'); 
              
                return;
                
            }
             $aid=$this->model->save( $this->request->post() );
             $this->user_model2->save2( $this->request->post(), $aid );
         	
            header('location: ' . base_url() . 'users' );
            die;
        } elseif ( $this->request->request_method == 'GET' ) {
        	
               $this->load->view('structure/header', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    );
              $this->load->view('users/form.php'); 
              $this->load->view('structure/footer');
        }

    }

public function add2()
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
                $this->load->view('projects/forma.php', 
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
             $this->User_model9->save( $this->request->post() );
           
            header('location: ' . base_url() . 'projects/');
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
        
        // Si no viene el id o no es un entero
        if( ! $this->uri->segment(3) ) {
            header( 'location: ' . base_url() .'users?error=a');
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
                $this->load->view  (  'users/form.php', 
                                        array(
                                            'errors'    => $this->model->errors,
                                            'data'      => $this->request->post()
                                        )
                                    );
                $this->load->view('structure/footer'); 
               
                return;
            }
            
            $this->model->save( $this->request->post() );

            header('location: ' . base_url() . 'users' );
            die;
        
        } elseif ( $this->request->request_method == 'GET' ) {
        
                $rows = $this->model->find(array(
                    'select' => 'usuario_id, nombreusuario, email, null as password, null AS confirm_password, rol, estado,',
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
                    header('Location: ' . base_url() . 'users?found=0');

                
                 $this->load->view('structure/header', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    ); 
                $this->load->view (  'users/form.php', 
                                        array(
                                            'errors'    => $this->model->errors,
                                            'data'      => (array) $rows[0]
                                        )
                                    ); 
                $this->load->view ( 'structure/footer' );
        }

        

    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */