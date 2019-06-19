


<div class="container">
    <div class="row">
        <div class="col-md-4" >
	
        </div>
        <div class="col-md-8">
                
        
            <h1>Actividades Activas</h1>

            <table class="table">
                <thead>
                    <tr>
                    <th>Cod-Activ</th>
                        <th>Id del Usuario</th>
                        <th>Actividades</th>
                        <th>Prioridad</th>
                       <th> Via de Recepcion</th>
                       <th> Tipo de Actividad</th>
                        <th>Inicio</th>
                        <th>Estimada de Cierre</th>
               
               
                       
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if( !empty ( $results ) ) {
                            foreach( $results AS $row ) {
                                ?>
                            
<?php   if ($row->estadorequerimiento==0 ){
		
?>

                                 <tr>
								
                                <td>

                                        <?php echo $row->requerimiento_id ?>
                                        	
                                        	
                                        </td>
                         
                                    <td><?php echo $row->usuario_id ?></td>
                                 
                                    
                                    <td>

                                        <?php echo $row->descripcionrequerimiento ?>
                                        	
                                        	
                                        </td>
                                      
                                      
                                      
                                      
                                      
                                     <!-- ------------------------------------------->
                                     
                               
                                       
                                           <td>
                                           
                                           
                                           
                                       <?php 
                                            if( $row->prioridad == 1 ) {
                                               $label3 = 'Emergente';  
                                                $class = 'label label-danger3'; 
                                            }
                         
                                            elseif ( $row->prioridad == 0 ){
                                                $label3 = 'Normal';  
                                               $class = 'label label-success2';
                                            }
                                            
                                            
                                            elseif ( $row->prioridad == 4 ){
                                                $label3 = 'Medio';  
                                               $class = 'label label-success5';
                                            }
                                        ?>
                                
                                        <span class="<?php echo $class?>"> <?php echo $label3 ?></span>
                                         
                                           
                                           
                                           
                                            </td>
                                       
                                         
                                    <td> <?php echo $row->viarecepcion?></td>
                                    
                                    <td> <?php echo $row->tiporequerimiento?></td>
                                    
                                    <td>
                                    
                                    
                                    <?php echo $row->fechainicio ?></td>
                                    
                                  <td><?php echo $row->fechaestimada?></td>
                                    

                                     </tr>

                                <?php
                           }
                        }
                         } 
                    ?>
                   
                </tbody>
            </table >
            
           
      
</div>
</div>


  

					 <div
<h1>Exportar a Pdf</h1>

	<form action="<?php echo base_url();?>pdf_activas/descargar/" method="POST">
	<!--	<input type="text" name="txtPDF"><br>-->
		<input type="submit" name="btnDownload">
	</form>
</div>
					
</div>
