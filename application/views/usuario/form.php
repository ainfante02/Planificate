<?php



    $_formData = array(
        /*"descripcionrequerimiento" => '',*/
      /*"usuario_id" => '',*/
      /*  "prioridad" => '',*/
        "mensaje_actividad" => '',
        "fechainicio" => '',
        "fechaestimada" => '',
        "fechafin" => '',
        "nivelestadorequerimiento" => '', 
      "viarecepcion" => '', 
        "tiporequerimiento" => '',
           "fecha" => '',
          "accion" => 'Editaron requerimiento',
           "usuario_id" => '',
           "estadorequerimiento" => '1',  
       
    );
 


    $action = 'add';

    $title = 'Crear nuevo';

	 $this->ui->box->add( 

        $this->ui->box->load(
            'ui/box/return.php', 
			
			//En este arreglo debo busacar la forma de que cuando regrese de buscar un proyecto me lleve a proyecto y no al id 1
     
		
			array(
		
                'box_data' => array(		
                    'link' => base_url() .'usuario/' .$user->usuario_id,
                    'title' => 'volver',
					
                    //'class' => ''
	
                )
            )
			
        ), 5
		
    );   
	   
   
	   
   
    if( isset( $data ) ) {
        $_formData = array_merge( $_formData, $data );
        if( isset ( $_formData['usuario_id'] ) ) {
            $action = 'edit/' . $_formData['usuario_id']; /*id del usuario*/
            $title = 'Accionar';
            
        }
    }
	
	$disabled="";	
	 $disabled= "readonly";
	
?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php $this->load->view('users/box/actions.php')?>
        </div>
        <div class="col-md-8">
            <h1><?php echo $title ?> Requerimientos</h1>
            <form action="<?php echo base_url()?>usuario/<?php echo $action ?>" method="POST" role="form">
            
      
                <?php 
                    // Agrego el input para el fk requerimiento_id
                   if( isset ( $_formData['requerimiento_id'] ) ) {
                        ?>
                        <input type="hidden" name="requerimiento_id" value="<?php echo $_formData['requerimiento_id'] ?>" />
                        <?php
                    }
                ?>

             
  <?php 
                    // Agrego el input para el fk usuario_id
                   if( isset ( $_formData['usuario_id'] ) ) {
                        ?>
                        <input type="hidden" name="usuario_id" value="<?php echo $_formData['usuario_id'] ?>" />
                        <?php
                    }
                ?>
                
               
            
               
               <?php 
                    // Agrego el accion en la tabla de auditoria
                   if( isset ( $_formData['accion'] ) ) {
                        ?>
                        <input type="hidden" name="accion" value="<?php echo $_formData['accion'] ?>" />
                        <?php
                    }
                ?>
        <!--  consulto usuario_id-->
                 
            <div class="form-group <?php
          
            
             if( isset( $errors['usuario_id'] ) ) echo 'has-error' ?>">
                    <?php
				if ($user->rol==1){ ?>
                    <label for="inp_iduser">Usuario:</label>
                    <select id="inp_iduser" type="text" name="usuario_id" class="form-control">
             <!-- <option> </option>-->
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
 <?php } ?>
                </div>
				<!----Selecciono las actividades de la tabla actividad--------------->
				 
				<!--Descripcion del requerimiento-->
				<div class="form-group <?php if( isset( $errors['descripcionrequerimiento'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_name">Descripcion de Actividad:</label>

                    <input id="inp_name" type="text" name="descripcionrequerimiento" class="form-control" value="<?php echo $_formData['descripcionrequerimiento'] ?>"<?php echo $disabled; ?> >
                   
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['descripcionrequerimiento'] ) ) {
                            foreach( $errors['descripcionrequerimiento'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>

                </div>
                <!--------Mensaje de alarma-------->
                
                 <div class="form-group <?php if( isset( $errors['mensaje_actividad'] ) ) echo 'has-error' ?>">
                   <?php
				if ($user->rol==1){ ?> 
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
					 <?php } ?>
					
					

                </div>  
   
				
				<!----Prioridad del Requerimiento------->
<div class="form-group <?php if( isset( $errors['prioridad'] ) ) echo 'has-error' ?>">
                <?php
				if ($user->rol==1){ ?>   
                    <label for="inp_name">prioridad:</label>

                    <input id="inp_name" type="text" name="prioridad" class="form-control" value="<?php echo $_formData['prioridad'] ?>" >
                   
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['prioridad'] ) ) {
                            foreach( $errors['prioridad'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>
<?php } ?>
                </div>
                <!----Tipo de Requerimiento------->

<div class="form-group <?php if( isset( $errors['tiporequerimiento_id'] ) ) echo 'has-error' ?>">
                  <?php
				if ($user->rol==1){ ?>
                    <label for="inp_iduser">Tipo de Requerimiento:</label>
                    <select id="inp_iduser" type="text" name="tiporequerimiento" class="form-control" <?php echo $disabled; ?>>
                     <!-- <option> </option>-->
                    
                        <?php 

                            if ( isset ( $this->tiporequerimiento ) ) {
                                foreach( $this->tiporequerimiento AS $userObj ) {
                                    $chk = ( $userObj->tiporequerimiento == $_formData['tiporequerimiento'] ) ? ' selected ' : '';
									
									if ($user->rol!=1){ 
										if($userObj->tiporequerimiento != $_formData['tiporequerimiento']){
											continue;
										}
									}
                                    ?>
                                        <option value="<?php echo $userObj->tiporequerimiento?>" <?php echo $chk?> > <?php echo $userObj->tiporequerimiento ?>  </option>
                                    <?php
									
                                }
                            }

                        ?>
                    </select>
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['tiporequerimiento_id'] ) ) {
                            foreach( $errors['tiporequerimiento_id'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>
  <?php } ?>
                </div>

               <!----Contacto del Requerimiento------->

<div class="form-group <?php if( isset( $errors['contacto'] ) ) echo 'has-error' ?>">
              <?php
				if ($user->rol==1){ ?> 
				     
                    <label for="inp_iduser">Contacto del Requerimiento:</label>
                    <select id="inp_iduser" type="text" name="contacto" class="form-control" <?php echo $disabled; ?>>
                     <!-- <option> </option>-->
                     
                    
                        <?php 

                            if ( isset ( $this->contacto ) ) {
                                foreach( $this->contacto AS $userObj ) {
                                    $chk = ( $userObj->contacto == $_formData['contacto'] ) ? ' selected ' : '';
									
									if ($user->rol!=1){ 
										if($userObj->contacto != $_formData['contacto']){
											continue;
										}
									}
                                    ?>
                                        <option value="<?php echo $userObj->contacto?>" <?php echo $chk?> > <?php echo $userObj->contacto ?></option>
                                    <?php
									
                                }
                            }

                        ?>
                    </select>
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['contacto'] ) ) {
                            foreach( $errors['contacto'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>
  <?php } ?>
                </div>


               <!----Estado del Requerimiento------->
 <div class="row">
                    <div class="col-md-12">
                        <p>
                            <label class="radio-inline">
                             
                                <input type="radio" name="estadorequerimiento" value="2" <?php if ( $_formData['estadorequerimiento'] == "0" ) echo ' checked ' ; ?>> Pausado
                                
                                  
                            </label>
                            <label class="radio-inline">
                              <input type="radio"  name="estadorequerimiento" value="1" <?php if ( $_formData['estadorequerimiento'] == "1" ) echo ' checked ' ; ?>> Cerrado
                            </label>
                        </p>
                    </div>
                </div>


<!----Selecciono de la tabla via requerimiento----------------------------->


                <!----Via de Recepcion------->
<div class="form-group <?php if( isset( $errors['viarecepcion'] ) ) echo 'has-error' ?>">
                   <?php
				if ($user->rol==1){ ?>
				
                    <label for="inp_iduser">Via de recepcion:</label>
                    <select id="inp_iduser" type="text" name="viarecepcion" class="form-control" <?php echo $disabled; ?>>
                     <!-- <option> </option>-->
                     
                      
                        <?php 

                            if ( isset ( $this->viarecepcion ) ) {
                                foreach( $this->viarecepcion AS $userObj ) {
                                    $chk = ( $userObj->viarecepcion_id == $_formData['viarecepcion_id'] ) ? ' selected ' : '';
									
									if ($user->rol!=1){ 
										if($userObj->viarecepcion != $_formData['viarecepcion']){
											continue;
										}
									}
                                    ?>
                                        <option value="<?php echo $userObj->viarecepcion?>" <?php echo $chk?> > <?php echo $userObj->viarecepcion ?></option>
                                        
                                        <?php } ?>
                                    <?php
									
                                }
                            }

                        ?>
                    </select>
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['nombrerequerimiento'] ) ) {
                            foreach( $errors['nombrerequerimiento'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>

                </div>

                <!----Mensaje Actividad------->

<div class="form-group <?php if( isset( $errors['mensaje_actividad'] ) ) echo 'has-error' ?>">
                    <?php
				if ($user->rol==1){ ?>
                    <label for="inp_name">mensaje :</label>

                    <input id="inp_name" type="text" name="mensaje_actividad" class="form-control" value="<?php echo $_formData['mensaje_actividad'] ?>" <?php echo $disabled; ?> >
                   
  <?php } ?>
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['mensaje_actividad'] ) ) {
                            foreach( $errors['mensaje_actividad'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>
					
					
					

                </div>

                 <!---Fecha del Inicio------>

                    <div class="col-md-6">
					
                        <div class="form-group <?php if( isset( $errors['fechainicio'] ) ) echo 'has-error' ?>">
                         <?php
				if ($user->rol==1){ ?>
                           
						   <label for="inp_startdate">Fecha de inicio :</label>
							
                      
				
                            <input id="inp_startdate" type="text" name="fechainicio" class="form-control date-picker" value="<?php echo $_formData['fechainicio'] ?>"  data-format="YYYY/MM/DD " <?php echo $disabled; ?> >
                          
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
                
                 <!----Fecha del Estimada---->
                     <div class="col-md-6">
                        <div class="form-group <?php if( isset( $errors['fechaestimada'] ) ) echo 'has-error' ?>">
                          <?php
				if ($user->rol==1){ ?>
                            <label for="inp_enddate">Fecha Estimada Cierre :</label>
                           
                            <input id="inp_enddate" type="text" name="fechaestimada" class="form-control date-picker" value="<?php echo $_formData['fechaestimada'] ?>"  data-format="YYYY/MM/DD">
  <?php } ?>
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
               
                    
                 <!----Fecha del Fin--------->   
                    
                    

                    <div class="col-md-6">
                        <div class="form-group <?php if( isset( $errors['fechafin'] ) ) echo 'has-error' ?>">
                    
                            <label for="inp_enddate">Fecha Cierre :</label>
                           
                            <input id="inp_enddate" type="text" name="fechafin" class="form-control date-picker" value="<?php echo $_formData['fechafin'] ?>"  data-format="YYYY/MM/DD" >

                            <?php 
                                // Mostrar el error si hubo
                                if( isset( $errors['fechafin'] ) ) {
                                    foreach( $errors['fechafin'] AS $info ) : ?>
                                        <span class="help-block"><?php echo $info ?></span>
                                    <?php endforeach;
                                } 
                            ?>

                        </div>
                    </div>
                          <!--Observacion del usuario-->
                    <div class="col-md-12">
					 <?php
					  if ($user->usuario_id!=40){ ?>
					  <label for="oba">Observaciones:</label>
  					  
                        <textarea class="form-control" id="ob" name="ob" rows="3"><?php 
						 if(isset($_formData['ob'] )){
							 echo $_formData['ob'];
						 }
							
						?></textarea>
						
					   <?php } ?>
						
                    </div>
                    
                    
                    
                    
                </div>
                
                
          
 
	
                    
                  
		
                    <div class="col-md-12">
                        <input type="submit" value="<?php echo  $title ?>" class="btn btn-primary">
                    </div>
                </div>

            </form>

        </div>
   



















