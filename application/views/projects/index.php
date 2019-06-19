


<?php
if ($user->rol==1){

$this->ui->box->add( $this->ui->box->load( 'ui/box/projects_action.php'), 2 );

}


else{
	$this->ui->box->add( $this->ui->box->load( 'ui/box/proyectSupervisor.php'), 2 );
}

?>




<div class="container">
    <div class="row">
        <div class="col-md-4" >
		<?php
		
            $this->load->view('users/box/actions.php');
	
		?>
        </div>
        <div class="col-md-8">
        
  
  
        
        
            <h1>   <a  class="btn btn-info" href="<?php echo base_url()?>pdf">Exportar actividades a Pdf</a></h1>

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
                        <!--<th>Acciones</th>-->
                       
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
                                     <td>
                                     <?php
                                    if( $row->estadorequerimiento == 1 ) {
                                               echo $row->fechafin ;
                                            } else {
                                            	' ';
                                            }
                                    
                                     ?>
 	
                                    </td>
                                    <!--<td><?php echo $row->enddate ?></td>-->
                                   
							<!-- <td><?php echo $row->estadorequerimiento_id ?></td>-->
							
							
							
							
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
                                    <?php
                             if ($user->rol==1){   
                             ?>         
                         <td><a class="btn btn-success" href="<?php echo base_url()?>projects/edit/<?php echo $row->requerimiento_id ?>">editar</a></td> </tr>
                            
                             <?php
                              }
                                 ?>   
                                 
                                  </tr>
                                <!--<td><?php echo $row->oba ?></td>
								<td><?php echo $row->ob ?></td>
								</tr>-->
                                <?php
                           
                        }
                         } 
                    ?>
                   
                </tbody>
            </table >
            
           
                     
            <?php echo $pagination ?>
    	<div>
    	<?php 
    	if ($user->rol==2){
    		?>
			<?php if($promociones): ?>
				<?php foreach($promociones as $promocion): ?>
					<div class="alert alert-danger">
					<strong><?php echo $promocion->	descripcionrequerimiento; ?></strong><br />
					<?php echo $promocion->mensaje_actividad; ?><br />
					Fecha de vencimiento: <?php echo $promocion->fechaestimada; ?>
					</div>
					 
				<?php endforeach; ?>
				
			<?php else: ?>
				<div class="alert alert-info">
					No hay Actividades Vencidas
				</div>
			<?php endif; ?>
			<?php
			}?>
    	</div>
    	

                    
</div>
</div>
