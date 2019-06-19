<h1>Cantidad de actividades por usuarios</h1>

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
          <!--  <?php echo $grafica ?> -->
			



</div>
			
   <form action="<?php echo base_url()?>index.php/cerradas" method="POST">
 <!--<input type="number" class="form-control" id="valueInput" name="valueInput" value="Algún valor">-->

<!--
<div class="form-group"  type="number" id="valueInput"  name="valueInput" value="Algún valor">
  <label for="sel1">Selecione Usuario: </label>
  <select class="form-control" id="sel1">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</div>
-->
  
  <!--  <?php $valueVaraible = "Ejemplo" ?>-->
    <!--Enviar otros valores que no se muestran en el formulario -->
   <!-- <input type="hidden" id="valueInput" name="valueInput" value="<?php echo $valueVaraible ?>">-->
 
<?php
$_formData = array(
  
           "usuario_id" => ''
    );
    
      $title = 'Consultar';
    ?>
    <div class="form-group <?php if( isset( $errors['actividad_id'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_iduser">Usuario:</label>
                    <select id="inp_iduser" type="text" name="usuario_id" class="form-control" <?php echo $disabled; ?>>
                    <option>Seleccione un usuario</option>
                        <?php 

                            if ( isset ( $this->usuario ) ) {
                                foreach( $this->usuario AS $userObj ) {
                                    $chk = ( $userObj->usuario_id == $_formData['usuario_id'] ) ? ' selected ' : '';
									
								
                                    ?>
                                        <option value="<?php echo $userObj->usuario_id?>" <?php echo $chk?> > <?php echo $userObj->nombreusuario ?></option>
                                    <?php
									
                                }
                            }

                        ?>
                    </select>
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['usuario_id'] ) ) {
                            foreach( $errors['usuario_id'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>
				
		


                </div>

     <div class="col-md-12">
                        <input type="submit" value="<?php echo  $title ?>" class="btn btn-primary">
                    </div>
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

		<?php   if ($row->estadorequerimiento==1 ){

		
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
                            
                                <?php
								}
                           
                        }
                         } 

                    ?>
                   
                </tbody>
            </table >
            
 <h1>   <a  class="btn btn-info" href="<?php echo base_url()?>pdf_cerradas">Exportar actividades a Pdf</a></h1>

</div>
