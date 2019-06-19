<h1>Gestion del Sistema</h1>


<?php
/* if ($user->rol==1){

$this->ui->box->add( $this->ui->box->load( 'ui/box/projects_action.php'), 2 );

} */

/*
else{
	 $this->ui->box->add( $this->ui->box->load( 'ui/box/proyectSupervisor.php'), 2 ); 
}*/

?>




<div class="container">
    <div class="row">
        <div class="col-md-4" >
		<?php
		
            /* $this->load->view('users/box/actions.php'); */
	
		?>
        </div>
        <div class="col-md-8">

  

            <table class="table">
                <thead>
                    <tr>
                    <th>Accion</th>
                        <th>Id del Usuario</th>
                        <th>fecha de la Accion</th>

                       
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if( !empty ( $query ) ) {
                            foreach( $query AS $row ) {
                            	
                               
							   ?>
                       
   
		



                                 <tr>
                                <td>

                                        <?php echo $row->accion ?>
                                        	
                                        	
                                        </td>
                               
                                    <td>
									
									<?php echo $row->usuario_id ?>
									
									</td>
                                 
                                    
                                    <td>

                                        <?php echo $row->fecha?>
                                        	
                                        	
                                        </td>
							  <?php } 
						}
							  ?>
                    </tr>
                </tbody>
            </table >
            
    	
</div>
</div>
</div>

					 <div
<h1>Exportar a Pdf</h1>

	<form action="<?php echo base_url();?>pdf_auditorias/descargar/" method="POST">
	<!--	<input type="text" name="txtPDF"><br>-->
		<input type="submit" name="btnDownload">
	</form>
</div>
					
</div>
</div>