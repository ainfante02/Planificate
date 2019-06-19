<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Alfredo2 extends InTouch_Test_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Alfredo_model', 'Alfredo_model');
          $this->load->model('User_model', 'User_model');
    	
		if (!isset($this->session->user)){
			
			redirect('php/login');
		}
    }

function index() {
	
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

       /* $this->load->model('Alfredo_model', 'Alfredo_model');*/

       /* $id=$this->input->post('usuario_id');  */
         $id='0';
          $data = array(
		  	
		

               /*  $data['query'] = $this->Alfredo_model->result_getall($id); */
                'query'       => $this->Alfredo_model->result_getall($id)
				
        ); 
	
        $d=$data['query'];
        $listaUsuarios= $this->capturarUsuarios($d);
        $usuarioUnicos= $this->obtenerUnico($listaUsuarios);
        
        $data['grafica'] = $this->crearGrafico($d,$listaUsuarios,$usuarioUnicos);
 
       
 //print_r($data['query']);
		/*print_r($this->obtenerUnico( $this->capturarUsuarios($d)) );*/
		
		

    $this->load->view('structure/header', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    );
                                    
                                    
        $this->load->view('alfredo/index2.php', $data);
        
        $this->load->view('structure/footer');



}

        
  public function contarEnArreglo($arreglo,$cadena){
    	$contador=0;
    	for($i=0;$i<count($arreglo);$i++){
    		
    		if($arreglo[$i]===$cadena) $contador++;
    		
    
		
		}
    	return $contador;
		
	}
	
	public function contarActividades($arreglo, $usuario ,$tipodeActividad){
    	$contador=0;
    	for($i=0;$i<count($arreglo);$i++){
    		
    		if($arreglo[$i]->nombreusuario === $usuario && 
    		   $arreglo[$i]->estadorequerimiento === $tipodeActividad) $contador++;
    		
		}
    	return $contador;
		
	}
	
 public function capturarUsuarios($arreglo){
    	$resultado=array();
    	
    	for($i=0;$i<count($arreglo);$i++){
			array_push($resultado,$arreglo[$i]->nombreusuario);
		}
    	
    	return $resultado;
		
	}	
	
	
	public function obtenerUnico($arreglo){
    	$resultado=array();
    	
    	for($i=0;$i<count($arreglo);$i++){
		
			if(!$this->buscarEnArreglo($resultado,$arreglo[$i])) array_push($resultado,$arreglo[$i]);
		}
    	
    	return $resultado;
		
	}
	
	 public function buscarEnArreglo($arreglo,$cadena){

    	for($i=0;$i<count($arreglo);$i++){
    		
    		if($arreglo[$i]===$cadena) return true;
		
		}
    	
    	return false;
		
	}
	 public function crearGrafico($query,$arregloCompleto,$arregloMinimo){
		
		$contenedorGrafico="";
		
    	for($i=0;$i<count($arregloMinimo);$i++){
    		$nActividades=$this->contarEnArreglo($arregloCompleto,$arregloMinimo[$i]);
    		//$porcentajeActividades=number_format((($nActividades*100)/count($arregloCompleto)), 2);
    		
    		$actAbiertas = $this->contarActividades($query,$arregloMinimo[$i],'0');
    		$porcAbiertas = number_format(($actAbiertas*100)/$nActividades,2);
    		$actCerradas = $this->contarActividades($query,$arregloMinimo[$i],'1');
    		$porcCerradas = number_format(($actCerradas*100)/$nActividades,2);
    		$actPausadas = $this->contarActividades($query,$arregloMinimo[$i],'2');
    		$porcPausadas = number_format(($actPausadas*100)/$nActividades,2);
    		
    		$contenedorGrafico.="<h2>" .$arregloMinimo[$i] .  "</h2>" .
    					        '<div class="progress">'.
    								'<div class="progress-bar progress-bar-danger role="progressbar" style="width:'.$porcAbiertas. '%">'.
											   'Abiertas '.$actAbiertas.
    								'</div>'.
    								'<div class="progress-bar progress-bar-warning role="progressbar" style="width:'.$porcPausadas. '%">'.
											   'Pausadas '.$actPausadas.
    								'</div>'.
    								'<div class="progress-bar progress-bar-success role="progressbar" style="width:'.$porcCerradas. '%">'.
											   'Cerradas '.$actCerradas.
    								'</div>'.
    						    '</div>';
		}
    	
    	return $contenedorGrafico;
		
	}
	
	
}




