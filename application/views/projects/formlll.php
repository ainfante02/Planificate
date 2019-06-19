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
       
    );


    $action = 'add';

    $title = 'Crear nuevo';
	

			
			//En este arreglo debo busacar la forma de que cuando regrese de buscar un proyecto me lleve a proyecto y no al id 1
     
		if( $user->usuario_id == 1){
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
}
   else{
	 $this->ui->box->add( 

        $this->ui->box->load(
            'ui/box/return.php', 
			
			//En este arreglo debo busacar la forma de que cuando regrese de buscar un proyecto me lleve a proyecto y no al id 1
     
		
			array(
		
                'box_data' => array(		
                    'link' => base_url() .'projects/' .$user->usuario_id,
                    'title' => 'volver',
					
                    //'class' => ''
	
                )
            )
			
        ), 5
		
    );   
	   
   }
	   
   
    if( isset( $data ) ) {
        $_formData = array_merge( $_formData, $data );
        if( isset ( $_formData['usuario_id'] ) ) {
            $action = 'edit/' . $_formData['usuario_id']; /*id del usuario*/
            $title = 'Editar';
            
        }
    }
	
	$disabled="";	
	if ($user->rol!=1){ 
	 $disabled= "readonly";
	}
?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php $this->load->view('users/box/actions.php')?>
        </div>
        <div class="col-md-8">
            <h1><?php echo $title ?> Requerimientos</h1>
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
                     <option> </option>
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
				<!----Selecciono las actividades de la tabla actividad-------------------->
				 
				<div class="form-group <?php if( isset( $errors['descripcionrequerimiento'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_iduser">Actividad:</label>
                    <select id="inp_iduser" type="text" name="descripcionrequerimiento" class="form-control" <?php echo $disabled; ?>>
                     <option> </option>
                        <?php 

                            if ( isset ( $this->actividad ) ) {
                                foreach( $this->actividad AS $userObj ) {
                                    $chk = ( $userObj->nombreactividad == $_formData['nombreactividad'] ) ? ' selected ' : '';
									
									if ($user->rol!=1){ 
										if($userObj->nombreactividad != $_formData['nombreactividad']){
											continue;
										}
									}
                                    ?>
                                        <option value="<?php echo $userObj->nombreactividad?>" <?php echo $chk?> > <?php echo $userObj->nombreactividad ?></option>
                                       
                                    <?php
                                    
                                     
									
                                }
                            }

                        ?>
                    </select>
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['descripcionrequerimiento'] ) ) {
                            foreach( $errors['descripcionrequerimiento'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>

                </div>
                <!----------------------------------->
                
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
   
				
				<!--selecciono el estado del requerimiento de la tabla estado requerimiento----------------------------->
				
  

<div class="form-group <?php if( isset( $errors['nivelrequerimiento'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_iduser">prioridad del  Requerimiento:</label>
                    <select id="inp_iduser" type="text" name="prioridad" class="form-control" <?php echo $disabled; ?>>
                     <option> </option>
                        <?php 

                            if ( isset ( $this->priorequerimiento ) ) {
                                foreach( $this->priorequerimiento AS $userObj ) {
                                    $chk = ( $userObj->nivelrequerimiento == $_formData['nivelrequerimiento'] ) ? ' selected ' : '';
									
									if ($user->rol!=1){ 
										if($userObj->nombrerequerimiento != $_formData['nombrerequerimiento']){
											continue;
										}
									}
                                    ?>
                                        <option value="<?php echo $userObj->nivelrequerimiento?>" <?php echo $chk?> > <?php echo $userObj->nombrerequerimiento ?></option>
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







<div class="form-group <?php if( isset( $errors['tiporequerimiento_id'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_iduser">Tipo de Requerimiento:</label>
                    <select id="inp_iduser" type="text" name="tiporequerimiento" class="form-control" <?php echo $disabled; ?>>
                     <option> </option>
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
                                        <option value="<?php echo $userObj->tiporequerimiento?>" <?php echo $chk?> > <?php echo $userObj->tiporequerimiento ?></option>
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

                </div>



<div class="form-group <?php if( isset( $errors['contacto'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_iduser">Contacto del Requerimiento:</label>
                    <select id="inp_iduser" type="text" name="contacto" class="form-control" <?php echo $disabled; ?>>
                     <option> </option>
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

                </div>




<div class="form-group <?php if( isset( $errors['nivelestadorequerimiento'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_iduser">Estado del requerimiento:</label>
                    <select id="inp_iduser" type="text" name="estadorequerimiento" class="form-control" <?php echo $disabled; ?>>
                     <option> </option>
                        <?php 

                            if ( isset ( $this->estadorequerimiento ) ) {
                                foreach( $this->estadorequerimiento AS $userObj ) {
                                    $chk = ( $userObj->nivelestadorequerimiento == $_formData['nivelestadorequerimiento'] ) ? ' selected ' : '';
									
									if ($user->rol!=1){ 
										if($userObj->estadorequerimiento != $_formData['estadorequerimiento']){
											continue;
										}
									}
                                    ?>
                                        <option value="<?php echo $userObj->nivelestadorequerimiento?>" <?php echo $chk?> > <?php echo $userObj->estadorequerimiento ?></option>
                                    <?php
									
                                }
                            }

                        ?>
                    </select>
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['estadorequerimiento'] ) ) {
                            foreach( $errors['estadorequerimiento'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>

                </div>





























<!----Selecciono de la tabla via requerimiento----------------------------->
<div class="form-group <?php if( isset( $errors['viarecepcion'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_iduser">Via de recepcion:</label>
                    <select id="inp_iduser" type="text" name="viarecepcion" class="form-control" <?php echo $disabled; ?>>
                     <option> </option>
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



<!---Fecha del Inicio------------------------------------------->

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
                
                    <!----Fecha del Estimada------------------------------------------->
                     <div class="col-md-6">
                        <div class="form-group <?php if( isset( $errors['fechaestimada'] ) ) echo 'has-error' ?>">
                    
                            <label for="inp_enddate">Fecha Estimada Cierre :</label>
                           
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
               
                    
                 <!----Fecha del Fin------------------------------------------->   
                    
                    

                    <div class="col-md-6">
                        <div class="form-group <?php if( isset( $errors['fechafin'] ) ) echo 'has-error' ?>">
                    
                            <label for="inp_enddate">Fecha Cierre :</label>
                           
                            <input id="inp_enddate" type="text" name="fechafin" class="form-control date-picker" value="<?php echo $_formData['fechafin'] ?>"  data-format="YYYY/MM/DD">

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
                </div>

				
                    <div class="col-md-12">
                        <input type="submit" value="<?php echo  $title ?>" class="btn btn-primary">
                    </div>
                </div>

            </form>

        </div>
   









