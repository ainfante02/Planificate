<?php



    $_formData = array(
       
        "nivelrequerimiento" => '',
        "nombrerequerimiento" => '',
         /*"actividad_id" => '',*/
       
    );


    $action = 'add';

    $title = 'Cargar nuevos';
	$act = 'Parametros';
	

	 $this->ui->box->add( 

        $this->ui->box->load(
            'ui/box/return.php', 
			
		
			array(
		
                'box_data' => array(		
                    'link' => base_url() .'users/',
                    'title' => 'volver',
					
                    //'class' => ''
	
                )
            )
			
        ), 5
		
    );   
	   
  /* }*/
    if( isset( $data ) ) {
        $_formData = array_merge( $_formData, $data );
        if( isset ( $_formData['usuario_id'] ) ) {
            $action = 'edit/' . $_formData['usuario_id'];
            $title = 'Editar';
            
        }
    }
	
	/*$disabled="";	
	if ($user->usuario_id == 1){ 
	$disabled= "readonly";
	}*/
?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php $this->load->view('users/box/actions.php')?>
        </div>
        <div class="col-md-8">
            <h1><?php echo $title ."  ". $act?> </h1>
            <form action="<?php echo base_url()?>prequerimiento/<?php echo $action ?>" method="POST" role="form">
                <?php 
                    // Agrego el input para el fk
                    if( isset ( $_formData['usuario_id'] ) ) {
                        ?>
                        <input type="hidden" name="usuario_id" value="<?php echo $_formData['usuario_id'] ?>" />
                        <?php
                    }
                ?>

                <div class="form-group <?php if( isset( $errors['nivelrequerimiento'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_name">Nicel del estado del requerimiento:</label>

                    <input id="inp_name" type="text" name="nivelrequerimiento" class="form-control" value="<?php echo $_formData['nivelrequerimiento']?>" placeholder="Valor expresado en numeros"/>
                   
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['nivelrequerimiento'] ) ) {
                            foreach( $errors['nivelrequerimiento'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>

                </div>
                
                
                
                <div class="form-group <?php if( isset( $errors['nombrerequerimiento'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_name">Nombre de la Prioridad del Requerimiento:</label>

                    <input id="inp_name" type="text" name="nombrerequerimiento" class="form-control" value="<?php echo $_formData['nombrerequerimiento'] ?>"placeholder="Ejemplo: Cerrar,Pausar..etc" />
                   
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['nombrerequerimiento'] ) ) {
                            foreach( $errors['nombrerequerimiento'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>

                </div>
			               
                 
				
       
                
               <div class="row">
                    <div class="col-md-12">
                        <input type="submit" value="<?php echo  $title ?>Parametros" class="btn btn-primary2">
                    </div>
                </div>

            </form>

        </div>
    </div>








