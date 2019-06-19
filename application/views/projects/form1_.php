<?php



    $_formData = array(
        "nombreactividad" => '',
        "descripcionactividad" => '',
        /*"fechainicio" => '',
        "fechafin" => '',
        "requerimiento_id" => '',
       "nombreusuario" => '',*/
    
    );


    $action = 'add2';

    $title = 'Crear nueva';
	$act = 'Actividad';
	
	/* En esta linea hacemos la el filtro por usuario para que el mismo regrese a su pantalla de proyectos */
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
            $action = 'edit/' . $_formData['usuario_id'];
            $title = 'Editar';
            
        }
    }
	
	$disabled="";	
	/*if ($user->usuario_id == 1){ 
	$disabled= "readonly";
	}*/
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
                        <input type="hidden" name="actividad_id" value="<?php echo $_formData['actividad_id'] ?>" />
                        <?php
                    }
                ?>

                <div class="form-group <?php if( isset( $errors['nombreactividad'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_name">Requerimiento:</label>

                    <input id="inp_name" type="text" name="nombreactividad" class="form-control" value="<?php echo $_formData['nombreactividad'] ?>" <?php echo $disabled; ?> >
                   
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['nombreactividad'] ) ) {
                            foreach( $errors['nombreactividad'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>
					
					
					

                </div>
			
			<!----tabla Actividad-------------------->
			
			
			  <div class="form-group <?php if( isset( $errors['descripcionactividad'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_name">Descripcion del Requerimiento:</label>

                    <input id="inp_name" type="text" name="descripcionactividad" class="form-control" value="<?php echo $_formData['descripcionactividad'] ?>" <?php echo $disabled; ?> >
                   
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['descripcionactividad'] ) ) {
                            foreach( $errors['descripcionactividad'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>
					
					
					

                </div>
               
               <div class="row">
                    <div class="col-md-12">
                        <input type="submit" value="<?php echo  $title ?> Actividad" class="btn btn-primary">
                    </div>
                </div>

            </form>

        </div>
    </div>


</div>






