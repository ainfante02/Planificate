 <h1>Actividades y Desempeño de los Usuarios
</h1>

<head>
    <meta charset="UTF-8">
    <title>Planificate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	   <link href="<?php echo base_url()?>css/clean-blog.min.css" rel="stylesheet">
	 
    <link href="<?php echo base_url()?>asset/css/bootstrap.min.css" rel="stylesheet"> 
 	 
    <link href="<?php echo base_url()?>asset/css/theme.css" rel="stylesheet">
	
     <link href="<?php echo base_url()?>asset/css/Prueba.css" rel="stylesheet">

	   <link href="<?php echo base_url()?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		
  

    </head>
   
   
<div class="container">

    
    <!-- <?php 
                        if( !empty ( $query ) ) {
                            foreach( $query AS $row ) {
                            	
                 ?>
    
    
    	   <?php echo $row->nombreusuario?> 
                                <?php
                                
                           
                        }
                         } 
                    ?>-->
            <?php echo $grafica ?> 
			



</div>
			
   <form action="<?php echo base_url()?>index.php/alfredo" method="POST">

  
  <!--  <?php $valueVaraible = "Ejemplo" ?>-->

   <!-- <input type="hidden" id="valueInput" name="valueInput" value="<?php echo $valueVaraible ?>">-->
 
<?php
$_formData = array(
  
           "usuario_id" => ''
    );
    
      $title = 'Consultar';
    ?>
  
							
                  


</form>


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
                        if( !empty ( $query ) ) {
                            foreach( $query AS $row ) {
                            
                            	
                                ?>
                              <!-- Se filtra que se quiere mostrar,abierto,cerrado,pausado -->
<?php   /*if ($row->estadorequerimiento==0 OR $row->estadorequerimiento==2 ){
		}*/
?>


                                 <tr>
                                <td>

                                        <?php echo $row->requerimiento_id ?>
                                        	
                                        	
                                        </td>
                               
                                    <td><?php echo $row->nombreusuario?></td>
                                 
                                    
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
                                    
                                        
                         </tr>
                              
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
            

  

					 <div


	<form action="<?php echo base_url();?>pdf_graficos/descargar/" method="POST">
	<!--	<input type="text" name="txtPDF"><br>-->
		<input type="submit" name="btnDownload">
	</form>
</div>
					
</div>
</div>