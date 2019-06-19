<?php 
class Datos extends CI_Controller 
{     
    function __construct() 
    {         
         parent::__construct();         
         $this->load->model('datos_model');
		 
		 if (!isset($this->session->user)){
			
			redirect('php/login');
		}
    }
 
    function index() 
    {
        $data['titulo'] = 'Update con codeIgniter';
        $data['requerimiento'] = $this->datos_model->mensajes();
		
		  $this->load->view('structure/header', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    );

        $this->load->view('datos_view', $data);
    }
 
    //funci�n encargada de mostrar los formularios por ajax
    //dependiendo el bot�n que hayamos pulsado
    function mostrar_datos() 
    {
        //recuperamos la id que hemos env�ado por ajax
        $id = $this->input->post('id');
        //solicitamos al modelo los datos de esa id
        $edicion = $this->datos_model->obtener($id);
        //recorremos el array con los datos de ese id
        //y creamos el formulario con el helper form

		
		
            $mensaje_actividad = array(
                'name' => 'mensaje_actividad',
                'id' => 'mensaje_actividad',
                'value' => $edicion->mensaje_actividad
            );

            $fechaestimada = array(
                'name' => 'fechaestimada',
                'id' => 'fechaestimada',
                'cols' => '50',
                'rows' => '6',
                'value' => $edicion->fechaestimada
            );
            $submit = array(
                'name' => 'editando',
                'id' => 'editando',
                'value' => 'Editar mensaje'
            );
            $oculto = array(
                'id_mensaje' => $id
               );
 
            //mostramos el formulario con los datos cargados
            ?>
            <?= form_open(base_url() . 'datos/actualizar_datos','', $oculto) ?>
           
		   <?= form_input($mensaje_actividad) ?>
            <?= form_input($fechaestimada) ?>
 
            <?= form_submit($submit) ?>
            <?php echo form_close() ?>
            <?php     
            }     
 
           //funci�n encargada de actualizar los datos     
           function actualizar_datos()     
           {         
               $id = $this->input->post('id_mensaje');
               $mensaje_actividad = $this->input->post('mensaje_actividad');
            
               $fechaestimada = $this->input->post('fechaestimada');
 
               $actualizar = $this->datos_model->actualizar_mensaje($id,$mensaje_actividad,$fechaestimada);
               //si la actualizaci�n ha sido correcta creamos una sesi�n flashdata para decirlo
               if($actualizar)
               {
                $this->session->set_flashdata('Actualizado', 'Actualizado correctamente');
                redirect('../projects', 'refresh');
               }
    }
}
/*application/controllers/datos.php
 * el controlador datos.php
 */