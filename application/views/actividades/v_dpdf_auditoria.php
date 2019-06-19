<h1>Intentos de usuarios </h1>
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
  

					 <div
<h1>Exportar a Pdf</h1>

	<form action="<?php echo base_url();?>pdf_auditoria/descargar/" method="POST">
	<!--	<input type="text" name="txtPDF"><br>-->
		<input type="submit" name="btnDownload">
	</form>
</div>
					
</div>
</div>