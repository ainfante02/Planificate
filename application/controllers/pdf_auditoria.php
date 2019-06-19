<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_auditoria extends CI_Controller {

	function __construct()
	{
		parent::__construct();
   $this->load->model('auditint_model', 'auditint_model');
        $this->load->model('project_model', 'model');

	}

	public function index()
	{
		redirect('pdf_auditoria/descargar');
		/*$this->load->view('v_dpdf');*/
				
	}

	public function descargar(){
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
        /*    'limit' =>  array($page, $per_page)*/
        ));

     
       

        $data = array(
                'results'       => $rows,

        );



        $this->load->view('structure/footer');

	$data['query']=$this->auditint_model->auditoria();

		$hoy = date("dmyhis");

        //load the view and saved it into $html variable
      

       $html = $this->load->view('actividades/v_dpdf_auditoria',$data,true);
 		
 		//$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath = "Planificate_".$hoy.".pdf";
 
        //load mPDF library
        $this->load->library('M_pdf');
   
       // //generate the PDF from the given html
       $this->m_pdf->pdf->WriteHTML($html);
 
       //  //download it.
  $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
  
 


	}

	public function dExcel(){
		$result = $this->mpersona->getPersona();
		// echo var_dump($result);
		$this->export_excel->to_excel($result, 'lista_de_personas');
	}

	public function getPersonas(){
		$result = $this->mpersona->getPersonas();
		echo json_encode($result);
	}

// escribe una línea en el archivo 


}
