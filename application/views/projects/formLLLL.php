<?php
    $_formData = array(
        "usuario_id" => '',
        "descripcionrequerimiento" => '',

    );
    $action = 'add';
    $title = 'Crear nuevo';
    $this->ui->box->add( 
        $this->ui->box->load(
            'ui/box/return.php', 
            array(
                'box_data' => array(
                    'link' => base_url() .'projects',
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
?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php echo $this->load->view('users/box/actions.php')?>
        </div>

        <div class="col-md-8">
            <h1><?php echo $title ?> proyecto</h1>
            <form action="<?php echo base_url()?>projects/<?php echo $action ?>" method="POST" role="form">
                <?php 
                    // Agrego el input para el fk
                    if( isset ( $_formData['requerimiento_id'] ) ) {
                        ?>
                        <input type="hidden" name="requerimiento_id" value="<?php echo $_formData['requerimiento_id'] ?>" />
                        <?php
                    }
                ?>

                <div class="form-group <?php if( isset( $errors['descripcionrequerimiento'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_name">Nombre del proyecto:</label>

                    <input id="inp_name" type="text" name="descripcionrequerimiento" class="form-control" value="<?php echo $_formData['descripcionrequerimiento'] ?>" >
                   
                    <?php 
                        // Mostrar el error si hubo
                        if( isset( $errors['descripcionrequerimiento'] ) ) {
                            foreach( $errors['descripcionrequerimiento'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>

                </div>

               

                <div class="form-group <?php if( isset( $errors['usuario_id'] ) ) echo 'has-error' ?>">
                   
                    <label for="inp_iduser">Usuario:</label>
                    <select id="inp_iduser" type="text" name="usuario_id" class="form-control">
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
                        if( isset( $errors['usario_id'] ) ) {
                            foreach( $errors['usario_id'] AS $info ) : ?>
                                <span class="help-block"><?php echo $info ?></span>
                            <?php endforeach;
                        } 
                    ?>

                </div>

               
                
                
               <div class="row">
                    <div class="col-md-12">
                        <input type="submit" value="<?php echo  $title ?> proyecto" class="btn btn-primary">
                    </div>
                </div>

            </form>

        </div>
    </div>


</div>














