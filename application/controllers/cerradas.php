
<?php 
class  Cerradas  extends  CI_Controller  { 
public function __construct()
        {
                parent::__construct();
                $this->load->model('User_model', 'User_model');
		 
        }
        public  function  index () 
        { 
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
	
		  $this->load->model('reporte_model');
	
		     $id=$this->input->post('usuario_id');  

                $data['query'] = $this->reporte_model->get_last_ten_entries($id);
                
                   $this->load->view('structure/header', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    );
                                    
                                    
      $this->load->view('projects/cerradas', $data);
      
     
        
        $this->load->view('structure/footer');

             /*   $this->load->view('Welcome', $data);*/
                
        } 
}