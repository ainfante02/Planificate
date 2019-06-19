<h1>Intentos de usuarios </h1>
<div class="container">
    <div class="row">
        <div class="col-md-4" >
		<?php
		
            /* $this->load->view('users/box/actions.php'); */
	
		?>
        </div>
        <div class="col-md-8">

        
            <h1>   <a  class="btn btn-info" href="<?php echo base_url()?>Pdf_auditoria">Exportar a Pdf</a></h1>

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