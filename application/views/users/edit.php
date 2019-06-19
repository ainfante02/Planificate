
<?php 

  $_formData = array(
   
   'nombreusuario' => '',
        'password' => '',
        'confirm_password' => '',
        'email' => '',
      'nombre' => '',
    'apellido' => '',   
     'estado' => '1',
     'rol' => '1',
     'cargo' => '',
       "accion" => 'Se edito Usuario',

     );
    

    $action = 'edit';

    $title = 'Editar';
	
	$ar ='Usuario';
	
$resultado=$title . " " . $ar;

    $this->ui->box->add( 
        $this->ui->box->load(
            'ui/box/return.php', 
            array(
                'box_data' => array(
                    'link' => base_url() .'users',
                    'title' => 'volver',
                    //'class' => ''
                )
            )
        ), 5
    );

    if( isset( $data ) ) {

        $_formData = array_merge( $_formData , $data);

        if( isset ( $_formData['usuario_id'] ) ) {
            $action = 'edit/' . $_formData['usuario_id'];
            $title = 'Editar';
            
        }

    }

    // debug
    
    /*
        if( isset( $errors ) ) {
            ?>

            <pre>
            
                <?php print_r($errors) ; ?>
            </pre> 

            <?php 
        } 
    */

?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
             <?php $this->load->view('users/box/actions.php')?>
        </div>
        
        <div class="col-md-8">
            <h1><?php echo $resultado ?> usuario</h1>

            <form action="<?php echo base_url()?>users/<?php echo $action ?>" method="POST" role="form">

               
                    <?php 
                    // Agrego el input para el fk
                    if( isset ( $_formData['usuario_id'] ) ) {
                        ?>
                        <input type="hidden" name="usuario_id" value="<?php echo $_formData['usuario_id'] ?>" />
                        <?php
                    }
                ?>   
                
                
                
                 <?php 
                    // Agrego el input para el fk
                   if( isset ( $_formData['accion'] ) ) {
                        ?>
                        <input type="hidden" name="accion" value="<?php echo $_formData['accion'] ?>" />
                        <?php
                    }
                ?>
               
                 <!-- campo se encuentra en la tabla persona---------------------------------------------------->

             <!--   <div class="form-group <?php if( isset( $errors['nombre'] ) ) echo 'has-error' ?>">
                    <label for="inp_name">Nombres:</label>
                    <input id="inp_name" type="text" name="nombre" class="form-control" value="<?php echo $_formData['nombre'] ?>" >
                  
                      
                          <?php 
                        // Mostrar el error si hubo
                       
                        if( isset( $errors['nombre'] ) ) {
                            foreach( $errors['nombre'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>
                </div>
               -->
                 
           
<!-- ------------------------------------------------------------------------------------->
                 <!-- campo se encuentra en la tabla persona---------------------------------------------------->
<!--
                <div class="form-group <?php if( isset( $errors['apellido'] ) ) echo 'has-error' ?>">
                    <label for="inp_name">Apellidos:</label>
                    <input id="inp_name" type="text" name="apellido" class="form-control" value="<?php echo $_formData['apellido'] ?>" >
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['apellido'] ) ) {
                            foreach( $errors['apellido'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>
                </div>-->
<!-- ------------------------------------------------------------------------------------->
               
               
               <!-- campo se encuentra en la tabla Usuraio---------------------------------------------------->

                <div class="form-group <?php if( isset( $errors['nombreusuario'] ) ) echo 'has-error' ?>">
                    <label for="inp_name">Nombre de usuario:</label>
                    <input id="inp_name" type="text" name="nombreusuario" class="form-control" value="<?php echo $_formData['nombreusuario'] ?>" >
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['nombreusuario'] ) ) {
                            foreach( $errors['nombreusuario'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>
                </div>
<!-- ------------------------------------------------------------------------------------->



<!-- campo se encuentra en la tabla usuario------------------------------------------>
                <div class="form-group <?php if( isset( $errors['password'] ) ) echo 'has-error' ?>">    
                   <!-- <label for="inp_password">Password:</label>-->
                    <input id="inp_password" type="hidden" name="password" class="form-control" value="<?php echo $_formData['password'] ?>" >

                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['password']['required'] ) ) {
                            ?>
                            <span class="help-block"><?php echo $errors['password']['required'] ?></span>
                            <?php 
                        } 
                    ?>
                </div>


<!-- ------------------------------------------------------------------------------------->

<!-- campo se encuentra en la tabla usuario------------------------------------------->
                <div class="form-group <?php if( isset( $errors['password']['equal_data'] ) ) echo 'has-error' ?>">
                  <!--  <label for="inp_confirm_password">Repetir Password:</label>-->
                    <input id="inp_confirm_password" type="hidden" name="confirm_password" class="form-control" value="<?php echo $_formData['confirm_password'] ?>">

                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['password']['equal_data'] ) ) {
                            ?>
                            <span class="help-block"><?php echo $errors['password']['equal_data'] ?></span>
                            <?php 
                        } 
                    ?>
                </div>
                <!-- ------------------------------------------------------------------------------------->
              
 <!--    <!-- -----------------------------------campo se encuentra en la tabla usuario-------------------------------------------------->
                <div class="form-group <?php if( isset( $errors['email'] ) ) echo 'has-error' ?>">
                    <label for="inp_email">Email:</label>
                    <input id="inp_email" type="text" name="email" class="form-control" value="<?php echo $_formData['email'] ?>">

                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['email'] ) ) {
                            foreach( $errors['email'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>
                </div>
<!-- ------------------------------------------------------------------------------------->
     
    <!-- campo se encuentra en la tabla usuario---------------------------------------------------->

          <div class="row">´
             <label for="inp_name">Rol del usuario</label>
              <div class="col-md-12">
                        <p>
						<?php
				if ($user->rol == 1){ ?>
                            <label class="radio-inline">
                                <input type="radio" name="rol" value="1" <?php if ( $_formData['rol'] == "1" ) echo ' checked ' ; ?>> Administrador
                            </label>
							
							<?php } ?>
                            <label class="radio-inline">
                              <input type="radio"  name="rol" value="0" <?php if ( $_formData['rol'] == "0" ) echo ' checked ' ; ?>> Analista
                            </label>
                            
                            <label class="radio-inline">
                              <input type="radio"  name="rol" value="2" <?php if ( $_formData['rol'] == "2" ) echo ' checked ' ; ?>> Supervisor
                            </label>
                        </p>
                    </div>
					
                </div>
           
           
           
         
           
           
           
            <!-- campo se encuentra en la tabla estadousuario---------------------------------------------------->

         
           <div class="row">´
             <label for="inp_name">Estado del usuario</label>
              <div class="col-md-12">
                        <p>
						<?php
				if ($user->rol ==1){ ?>
                            <label class="radio-inline">
                                <input type="radio" name="estado" value="1" <?php if ( $_formData['estado'] == "1" ) echo ' checked ' ; ?>> Activo
                            </label>
							
							<?php } ?>
                            <label class="radio-inline">
                              <input type="radio"  name="estado" value="0" <?php if ( $_formData['estado'] == "0" ) echo ' checked ' ; ?>> Inactivo
                            </label>
                        </p>
                    </div>
					
                </div>
           
           
        <!-- ------------------------------------------------------------------------------------->   
           
      
                
            <!--  <div class="form-group <?php if( isset( $errors['cargo'] ) ) echo 'has-error' ?>">
                    <label for="inp_name">cargo:</label>
                    <input id="inp_name" type="text" name="cargo" class="form-control" value="<?php echo $_formData['cargo'] ?>" >
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['cargo'] ) ) {
                            foreach( $errors['cargo'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>
      
                    
                </div>-->
                    <input type="submit" value="<?php echo  $resultado ?>  "class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>   