<?php


?>
<div class="container">
    <div class="row">
        <div class="col-md-4" >
		<?php
	
		?>
        </div>
        <div class="col-md-8">
            <h1>Actividades</h1>

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
                         <th>Cierre</th>
                        <th>Estado</th>
                         <th>   </th>
                         <th>   </th>
                  <!--      <th>Acciones</th>-->
                       
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if( !empty ( $results ) ) {
                            foreach( $results AS $row ) {
                                ?>
                              <!-- Se filtra que se quiere mostrar,abierto,cerrado,pausado -->
<?php   /*if ($row->estadorequerimiento==0 OR $row->estadorequerimiento==2 ){
		}*/
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
                                        ?>
                                
                                        <span class="<?php echo $class?>"> <?php echo $label3 ?></span>
                                         
                                           
                                           
                                           
                                            </td>
                                       
                                         
                                    <td> <?php echo $row->viarecepcion?></td>
                                    
                                    <td> <?php echo $row->tiporequerimiento?></td>
                                    
                                    <td>
                                    
                                    
                                    <?php echo $row->fechainicio ?></td>
                                    
                                  <td><?php echo $row->fechaestimada?></td>
                                    
                                     
                                  
                                  <td> <?php
                                    if( $row->estadorequerimiento == 1 ) {
                                               echo $row->fechafin ;
                                            } else {
                                            	' ';
                                            }
                                    
                                     ?>
 	
                                    </td>
                        
							
                                    <td>
                                    
                                   
                                       <?php 
                                       if( $row->estadorequerimiento == 1 ) {
                                               $label = ' ';
                                                $label2 = 'cerrado';
                                                $class = 'label label-success'; 
                                           
		                                        	}
                                         
                                        
                                           if ( $row->estadorequerimiento == 0 ){
                                                $label = ' ';
                                                $label2 = 'Abierto';
                                                $class = 'label label-danger';
                                         	
	                                             	}
	                                             	
			                            if ( $row->estadorequerimiento == 2 ){
                                                $label = ' ';
                                                 $label2 = 'Pausado';
                                                $class = 'label label-danger2';
                                                
		                                          	}
		                                          
                                        ?>
                                
                                        <span class="<?php echo $class?>"> <?php echo $label2 ?> <?php echo $label ?></span>

                                    </td>
                                    
                                    
                                        <td>
                                        
                                        
                                    </td>
                                      <td>
                                        
                                        
                                    </td>
                                    
                                        
                                    <!--<td><a class="btn btn-success" href="<?php echo base_url()?>projects/edit/<?php echo $row->requerimiento_id ?>">editar</a></td>--> </tr>
                                <!--<td><?php echo $row->oba ?></td>
								<td><?php echo $row->ob ?></td>
								</tr>-->
                                <?php
                           
                        }
                         } 
                    ?>
                   
                </tbody>
            </table >
            

  

					 <div
<h1>Exportar a Pdf</h1>

	<form action="<?php echo base_url();?>Welcome/descargar/" method="POST">
	<!--	<input type="text" name="txtPDF"><br>-->
		<input type="submit" name="btnDownload">
	</form>
</div>
					
</div>
</div>