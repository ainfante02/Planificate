<?php

/* En este codigo recibo los datos de user_model.php para validar datos */
class Php extends CI_Controller {

   function login($idioma=null)
   {
         
      //$this->config->set_item('language', 'spanish');      //   Setear dinámicamente el idioma que deseamos que ejecute nuestra aplicación
      if(!isset($_POST['maillogin'])){   //   Si no recibimos ningún valor proveniente del formulario, significa que el usuario recién ingresa.   
         $this->load->view('login');      //   Por lo tanto le presentamos la pantalla del formulario de ingreso.
      }
      else{                        //   Si el usuario ya pasó por la pantalla inicial y presionó el botón "Ingresar"
       $this->form_validation->set_rules('maillogin','Usuario','required');      //   Configuramos las validaciones ayudandonos con la librería form_validation del Framework Codeigniter
         $this->form_validation->set_rules('passwordlogin','Contrasena','required');
	//   Verificamos si el usuario superó la validación /*        print_r($this->session->userdata(usuario_id));*/	 
	
         if(($this->form_validation->run()==FALSE)){
    
            $this->load->view('login'); 
            
                              //   En caso que no, volvemos a presentar la pantalla de login
	
	
	
         }
         else{                                       //   Si ambos campos fueron correctamente rellanados por el usuario,
            $this->load->model('users_model');
            $ExisteUsuarioyPassoword=$this->users_model->ValidarUsuario($this->input->post('maillogin'),md5($this->input->post('maillogin').$this->input->post('passwordlogin')));   //   comprobamos que el usuario exista en la base de datos y la password ingresada sea correcta
            if($ExisteUsuarioyPassoword){   // La variable $ExisteUsuarioyPassoword recibe valor TRUE si el usuario existe y FALSE en caso que no. Este valor lo determina el modelo.
			$this->session->set_userdata('user',$ExisteUsuarioyPassoword );
			 $this->users_model->insertarAccion($ExisteUsuarioyPassoword->usuario_id,"Ingreso correcto");
               if ($ExisteUsuarioyPassoword-> rol == 1 and $ExisteUsuarioyPassoword-> estado == 1) {
             
   $this->session->set_flashdata('correcto', 'Usuario registrado correctamente!');
 
  	   echo "<script> console.log('Bienvenido Administrador a Planificate'); </script>";
 /* $data['ip'] = $this->input->ip_address();*/
   
/*$this->load->view('login',$data);*/
   
             	redirect('users1/', 'refresh');
             
				 /* echo "Este Usuario se encuentra inactivo Por favor consulte a su administrador de Sistemas<br><br><a href=''>Volver</a>";  */ 
			  }
					
			  
			  elseif($ExisteUsuarioyPassoword-> rol == 0 and $ExisteUsuarioyPassoword-> estado == 1) {
			  	
			  	  $this->session->set_flashdata('correcto', 'Usuario registrado correctamente!');
 
  	   echo "<script> alert('Bienvenido Analista a Planificate'); </script>";

             
				
				   redirect('usuario/'.$ExisteUsuarioyPassoword->usuario_id, 'refresh');
				  
			  }
			  
			   elseif($ExisteUsuarioyPassoword-> rol == 2 and $ExisteUsuarioyPassoword-> estado == 1) {
			
				  $this->session->set_flashdata('correcto', 'Usuario registrado correctamente!');
 
  	   echo "<script> alert('Bienvenido Supervisor a Planificate'); </script>";

             	redirect('users1/', 'refresh');
				  
			  }
	
	
		
	//Usuario Bloqueado con rol Analista
	 elseif($ExisteUsuarioyPassoword-> rol == 0 and $ExisteUsuarioyPassoword-> estado == 0) {
				
 echo "<script> alert('Usuario Bloqueado Por favor consulte al administrador'); </script>";
	 
	  $this->load->view('login'); 
				  
			  }
	
	
	
	//Usuario Bloqueado con rol Administrador
	 elseif($ExisteUsuarioyPassoword-> rol == 1 and $ExisteUsuarioyPassoword-> estado == 0) {
				
 echo "<script> alert('Usuario Bloqueado'); </script>";
	 
	  $this->load->view('login'); 
				  
			  }
	
	
	//Usuario Bloqueado con rol supervisor
	 elseif($ExisteUsuarioyPassoword-> rol == 2 and $ExisteUsuarioyPassoword-> estado == 0) {
				
 echo "<script> alert('Usuario Bloqueado'); </script>";
	 
	  $this->load->view('login'); 
				  
			  }

						
					
			
      
/*exit;*/

            }
       else{   //   Si no logró validar
       			
       			$usuarioIngresado = $this->input->post('maillogin');
       			if( $this->users_model->buscarUsuario($usuarioIngresado)) {
					
					$this->load->helper('date');
					$timestamp = now();
					$timezone = 'UM4';
					$daylight_saving = FALSE;
					$now = gmt_to_local($timestamp, $timezone, $daylight_saving);
					$datestring = "%Y-%m-%d";
					
					$usuarioId = $this->users_model->obtenerId($usuarioIngresado);
					$nIntentos = $this->users_model->consultarDBIntentos($usuarioId, mdate($datestring, $now));
					
					if($nIntentos < 3 ){
						$data['error']= "Intento Fallido: ".$nIntentos.". Usuario o password incorrecto, Recuerde que despues de 3 intento su usuario se bloqueara.";
						$this->load->view('login',$data);
					}else{
						$this->users_model->cambiarEstadoUsuario($usuarioId,0);
						$data['error']= "Su usuario ha sido bloqueado por demasiados intentos faliidos. Consulte al administrador.";
						$this->load->view('login',$data);
					}
				}
				
			
               $data['error']="El usuario no se encuentra registrado , Por favor consulte al administrador.";
               $this->load->view('login',$data);
            }
            
         }
       
      }
   }
 
   function logout () {
   	
	   $userId = $this->session->user->usuario_id;
	   if ($userId != NULL) $this->insertarAccion($userId,'Cierre de Sesion');
	   $this->session->sess_destroy();
	   
	   redirect('php/login');
   }
   
   function insertarAccion($usuario_id, $accion){
    	$dataTry = array(
            'accion' => $accion,
            'usuario_id' => $usuario_id
        );
    	
		$this->db->insert('auditoria',$dataTry);
	}
}
?>