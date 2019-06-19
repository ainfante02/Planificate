
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

        
            <h1>   <a  class="btn btn-info" href="<?php echo base_url()?>pdf">Exportar a Pdf</a></h1>

            <table class="table">
                <thead>
                    <tr>
                   
                        <th>Id del Usuario</th>
						 <th>Nombre del usuario</th>
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
									
									<?php echo $row->usuario_id ?>
									
									</td>
									
									   <td>

                                        <?php echo $row->nombreusuario ?>
                                        	
                                        	
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