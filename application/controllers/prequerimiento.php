<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prequerimiento extends CI_Controller {

	protected $now;

	public function __construct() 
	{
		parent::__construct();
		/* Cargamos el helper url y date */
		$this->load->helper('url');
		$this->load->helper('date');
		
		/* Inicializamos la base de datos */
		$this->load->database();
		
		/* Cargamos la libreria groceru_crud */
		$this->load->library('grocery_crud');
		
		/* Obtenemos la fecha actual */
		$timestamp = now();
		$timezone = 'UM4';
		$daylight_saving = FALSE;

		$now = gmt_to_local($timestamp, $timezone, $daylight_saving);
		$datestring = "%Y-%m-%d %h:%i:%s";
		
		$this->now = mdate($datestring, $now);
		
		if (!isset($this->session->user)){
			
			redirect('php/login');
		}
	}

	public function index()
	{
		
		/* Redirigimos a la funcion promociones() */
		redirect('prequerimiento/promociones');
		
	}
	
	public function promociones()
	{
		try{
			/* Instanciamos la clase grocery CRUD */
			$crud = new grocery_CRUD();
			
			/* Establecemos flexigrid como nuestro tema */
			$crud->set_theme('flexigrid');
			
			/* Le decimos que la tabla con la que trabajaremos es requerimiento */
			$crud->set_table('priorequerimiento');
			
			/* Nombre de referencia a la tabla */
			$crud->set_subject('priorequerimiento');
			
			/* Establecemos espa–ol como el lenguaje predeterminado */
			$crud->set_language('spanish');
			
			/* A–adimos una funcionalidad extra a las columnas */
			$crud->callback_column('estatus',array($this,'_GC_Estatus'));
				$crud->required_fields(
				'nivelrequerimiento', 
				'nombrerequerimiento'
			
			);
			
			/* Establecemos las columnas que mostraran */
		$crud->columns(
				'nivelrequerimiento', 
				'nombrerequerimiento' 
			
			);
	
			
			/* Obtenemos la tabla dinamica */
			$output = $crud->render();
			
			/* La mandamos a la vista alermas/application/view/admin/promociones.php */
			 $this->load->view('structure/header', 
                                        array(
											'user'  => $this->session->user
                                        )
                                    );
	                 $this->load->view('parametros/prequerimiento', $output);
									
  
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	public function _GC_Estatus($value, $row) {
		
		/* Si la fecha actual es mayor o igual a la del inicio de la promocion y es menor
		 * a la de la fecha de vencimiento, la promocion esta activa.
		 */
		if($this->now > $row->fechainicio AND $this->now < $row->fechaestimada) {
			return '<span class="alert alert-success">Activa</span>';
		} else {
			return '<span class="alert alert-danger">Inactiva</span>';
		}
	}
}