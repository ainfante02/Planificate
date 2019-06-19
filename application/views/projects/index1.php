<?php
if ($user->rol==1){

$this->ui->box->add( $this->ui->box->load( 'ui/box/projects_action.php'), 2 );
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-4" >
		<?php
		if ($user->rol==1){
            $this->load->view('users/box/actions.php');
		}
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
                        <th>Acciones</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if( !empty ( $results ) ) {
                            foreach( $results AS $row ) {
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
                                           <!--<?php echo ( $row->prioridad == 1 ) ? 'Emergente '  : 'Normal' ; ?>-->
                                           
                                           
                                           
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
                                            
                                         
                                        
                                             elseif ( $row->estadorequerimiento == 0 ){
                                                $label = ' ';
                                                $label2 = 'Abierto';
                                                $class = 'label label-danger';
                                            }
                                            elseif ( $row->estadorequerimiento == 2 ){
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
                                    
                                        
                                    <td><a class="btn btn-success" href="<?php echo base_url()?>projects/edit/<?php echo $row->requerimiento_id ?>">editar</a></td> </tr>
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
        </div>
    </div>
</div>

