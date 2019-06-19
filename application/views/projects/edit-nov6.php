<?php



    $_formData = array(
        "mensaje_actividad" => '',
        "usuario_id" => '',
        "descripcionrequerimiento" => '',
        "fechainicio" => '',
        "fechaestimada" => '',
        "fechafin" => '',
        "prioridad" => '',
        "estadorequerimiento" => '',
        "requerimiento_id" => '',
        "viarecepcion" => '',
        "tiporequerimiento" => '',
         "contacto" => '',
        
    );


    $action = 'edit';

    $title = 'Crear nueva';
	$act = 'Actividad';
	
	/* En esta linea hacemos la el filtro por usuario para que el mismo regrese a su pantalla de proyectos */

	 $this->ui->box->add( 

        $this->ui->box->load(
            'ui/box/return.php', 
			
	
			array(
		
                'box_data' => array(		
                    'link' => base_url() .'projects/',
                    'title' => 'volver',
					
                    //'class' => ''
	
                )
            )
			
        ), 5
		
    );

   
    if( isset( $data ) ) {
        $_formData = array_merge( $_formData, $data );
        if( isset ( $_formData['usuario_id'] ) ) {
            $action = 'edit/' . $_formData['usuario_id'];
            $title = 'Editar';
            
        }
    }
	
	$disabled="";	
	if ($user->rol == 1){ 
	 $disabled= "readonly";
	}
?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php $this->load->view('users/box/actions.php')?>
        </div>
        <div class="col-md-8">
            <h1><?php echo $title .''. $act?> </h1>
            <form action="<?php echo base_url()?>projects/<?php echo $action ?>" method="POST" role="form">
               <?php 
                    // Agrego el input para el fk
                   if( isset ( $_formData['usuario_id'] ) ) {
                        ?>
                        <input type="hidden" name="usuario_id" value="<?php echo $_formData['usuario_id'] ?>" />
                        <?php
                    }
                ?>

               
  
                <div class="form-group <?php if( isset( $errors['usuario_id'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_iduser">Usuario:</label>
                    <select id="inp_iduser" type="text" name="usuario_id" class="form-control">
                        <?php 

                            if ( isset ( $this->usuario ) ) {
                                foreach( $this->usuario AS $userObj ) {
                                    $chk = ( $userObj->usuario_id == $_formData['usuario_id'] ) ? ' selected ' : '';
									
									if ($user->rol == !1){ 
										if($userObj->id != $_formData['usuario_id']){
											continue;
										}
									}
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
				
                 <div class="form-group <?php if( isset( $errors['descripcionrequerimiento'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_name">Nombre del proyecto:</label>

                    <input id="inp_name" type="text" name="descripcionrequerimiento" class="form-control" value="<?php echo $_formData['descripcionrequerimiento'] ?>">
                   
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['descripcionrequerimiento'] ) ) {
                            foreach( $errors['descripcionrequerimiento'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>
		

                </div>
			
			
		<!--	------------------------->
			
			  <div class="form-group <?php if( isset( $errors['contacto'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_name">Nombre del proyecto:</label>

                    <input id="inp_name" type="text" name="contacto" class="form-control" value="<?php echo $_formData['contacto'] ?>">
                   
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['contacto'] ) ) {
                            foreach( $errors['contacto'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>
		

                </div>
		
			<!-------------------------------->
			
			 <div class="form-group <?php if( isset( $errors['descripcionrequerimiento'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_name">Nombre del proyecto:</label>

                    <input id="inp_name" type="text" name="descripcionrequerimiento" class="form-control" value="<?php echo $_formData['descripcionrequerimiento'] ?>">
                   
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['descripcionrequerimiento'] ) ) {
                            foreach( $errors['descripcionrequerimiento'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>
		

                </div>
			
                
   <!-- -------------------------- -->           
                
                
                 <div class="form-group <?php if( isset( $errors['mensaje_actividad'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_name">Mensaje Para Alarma:</label>

                    <input id="inp_name" type="text" name="mensaje_actividad" class="form-control" value="<?php echo $_formData['mensaje_actividad'] ?>" >
                   
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['mensaje_actividad'] ) ) {
                            foreach( $errors['mensaje_actividad'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>
					
					
					

                </div>  
   
<!--                
     ------------------------------   -->        
				

                 <div class="row">
                 <label for="inp_name">Estado del Usuario</label>
                    <div class="col-md-12">
                        <p>
						<?php
				if ($user->rol== 1){ ?>
                            <label class="radio-inline">
                                <input type="radio" name="estadorequerimiento" value="0" <?php if ( $_formData['estadorequerimiento'] == "0" ) echo ' checked ' ; ?>> Activo
                            </label>
							
						
                            <label class="radio-inline">
                              <input type="radio"  name="estadorequerimiento" value="1" <?php if ( $_formData['estadorequerimiento'] == "1" ) echo ' checked ' ; ?>> Cerrado
                            </label>
                            
                             <label class="radio-inline">
                              <input type="radio"  name="estadorequerimiento" value="2" <?php if ( $_formData['estadorequerimiento'] == "2" ) echo ' checked ' ; ?>> Pausado
                 	<?php } ?>
                            </label>
                        </p>
                    </div>
					
                </div>
                    
      <!--  ------------------------------   -->           
               
             <div class="row">´
             <label for="inp_name">Priridad del Requerimiento</label>
              <div class="col-md-12">
                        <p>
						<?php
				if ($user->rol == 1){ ?>
                            <label class="radio-inline">
                                <input type="radio" name="prioridad" value="1" <?php if ( $_formData['prioridad'] == "1" ) echo ' checked ' ; ?>> Emergente
                            </label>
							
							<?php } ?>
                            <label class="radio-inline">
                              <input type="radio"  name="prioridad" value="0" <?php if ( $_formData['prioridad'] == "0" ) echo ' checked ' ; ?>> Normal
                            </label>
                            
                            <label class="radio-inline">
                              <input type="radio"  name="prioridad" value="2" <?php if ( $_formData['prioridad'] == "4" ) echo ' checked ' ; ?>> Medio
                            </label>
                        </p>
                    </div>
					
                </div> 
                <!--  ------------------------------   -->   
                 
                 <div class="form-group <?php if( isset( $errors['viarecepcion'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_name">Mensaje Para Alarma:</label>

                    <input id="inp_name" type="text" name="viarecepcion" class="form-control" value="<?php echo $_formData['viarecepcion'] ?>" >
                   
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['viarecepcion'] ) ) {
                            foreach( $errors['viarecepcion'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>
			

                </div>  
       
                    
               
               <!--  ------------------------------   -->   
               
               
               
               
               
                <div class="row">
                    <div class="col-md-6">
					
                        <div class="form-group <?php if( isset( $errors['fechainicio'] ) ) echo 'has-error' ?>">
                         <?php
				if ($user->rol ==1){ ?>
                           
						   <label for="inp_startdate">Fecha de inicio Y Hora de Inicio:</label>
							
                      
				
                            <input id="inp_startdate" type="text" name="fechainicio" class="form-control date-picker" value="<?php echo $_formData['fechainicio'] ?>"  data-format="YYYY/MM/DD " >
                          
						  <?php } ?>
						   
                            <?php 
                                // Mostrar el error si hubo
                                if( isset( $errors['fechainicio'] ) ) {
                                    foreach( $errors['fechainicio'] AS $info ) : ?>
                                        <span class="help-block"><?php echo $info ?></span>
                                    <?php endforeach;
                                } 
                            ?>
					
                        </div>
                    </div>
                    
                    

                    <div class="col-md-6">
                        <div class="form-group <?php if( isset( $errors['fechaestimada'] ) ) echo 'has-error' ?>">
                    
                            <label for="inp_enddate">Fecha Cierre Estimada:</label>
                           
                            <input id="inp_enddate" type="text" name="fechaestimada" class="form-control date-picker" value="<?php echo $_formData['fechaestimada'] ?>"  data-format="YYYY/MM/DD">

                            <?php 
                                // Mostrar el error si hubo
                                if( isset( $errors['fechaestimada'] ) ) {
                                    foreach( $errors['fechaestimada'] AS $info ) : ?>
                                        <span class="help-block"><?php echo $info ?></span>
                                    <?php endforeach;
                                } 
                            ?>

                        </div>
                    </div>
                    
                    
                    
                    <div class="col-md-6">
                        <div class="form-group <?php if( isset( $errors['fechafin'] ) ) echo 'has-error' ?>">
                    
                            <label for="inp_enddate">Fecha Cierre Y Hora de Cierre:</label>
                           
                            <input id="inp_enddate" type="text" name="fechafin" class="form-control date-picker" value="<?php echo $_formData['fechafin'] ?>"  data-format="YYYY/MM/DD">

                            <?php 
                                // Mostrar el error si hubo
                                if( isset( $errors['fechaFin'] ) ) {
                                    foreach( $errors['fechaFin'] AS $info ) : ?>
                                        <span class="help-block"><?php echo $info ?></span>
                                    <?php endforeach;
                                } 
                            ?>

                        </div>
                    </div>
                    
      
                
                
<!--
				 <div class="row">
                    <div class="col-md-12">
					 <?php
					  if ($user->rolusuario_id==1){ ?>
					  <label for="ob">Cierre:</label>
					  
					  
					  
                        <textarea class="form-control" id="ob" name="ob" rows="3"><?php 
						 if(isset($_formData['ob'] )){
							 echo $_formData['ob'];
						 }
							
						?></textarea>
						
					   <?php } ?>
						
                    </div>
					
					<!--text tarea para administrador
					
					<div class="col-md-12">
					 <?php
					  if ($user->rolusuario_id==2){ ?>
					  <label for="oba">Requerimiento:</label>
					  
					  
					  
                        <textarea class="form-control" id="oba" name="oba" rows="3"><?php 
						 if(isset($_formData['oba'] )){
							 echo $_formData['oba'];
						 }
							
						?></textarea>
						
					   <?php } ?>
						
                    </div>
					
					
                </div>-->
                
             
           
                
             
                
                
                
    
                
                
               <div class="row">
                    <div class="col-md-12">
                        <input type="submit" value="<?php echo  $title ?> proyecto" class="btn btn-primary">
                    </div>
                </div>

            </form>

        </div>
    </div>


</div>








