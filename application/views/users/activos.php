<?php
     if ($user->rol==1){
		$this->ui->box->add( $this->ui->box->load( 'ui/box/users_action.php'), 2 ); 
		 
	 }
  
?>

<div class="container">
    <div class="row">
        <div class="col-md-4" >
            <?php $this->load->view('users/box/actions.php')?>
        </div>
        <div class="col-md-8">
            <h1>Usuarios</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th>Id del usuario</th>
                        <th>Nombre del Usuario</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th colspan="2">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if( !empty ( $results ) ) {
                            foreach( $results AS $row ) {
                                ?>
                                 <?php   if ($row->estado ==1 ){

?>
                                <tr>
                                    <td><?php echo $row->usuario_id ?></td>
                                    <td><?php echo $row->nombreusuario ?></td>
                                    <td><?php echo $row->email ?></td>
                                     <td>
                                           
                                           
                                           
                                       <?php 
                                            if( $row->rol == 1 ) {
                                               $label3 = 'Administrador';  
                                                $class = 'label label-danger4'; 
                                            }
                         
                                            elseif ( $row->rol == 0 ){
                                                $label3 = 'Analista';  
                                                            
                                                $class = 'label label-success5';
                                            }
                                            
                                             elseif ( $row->rol == 2 ){
                                                $label3 = 'Supervisor';  
                                                            
                                                $class = 'label label-success6';
                                            }
                                        ?>
                                
                                        <span class="<?php echo $class?>"> <?php echo $label3 ?></span>
                                           <!--<?php echo ( $row->prioridad == 1 ) ? 'Emergente '  : 'Normal' ; ?>-->
                                           
                                           
                                           
                                            </td>
                                  <!--  <td><?php echo ( $row->rol == 1 ) ? 'Administrador '  : 'Analista' ;?></td>-->
                                    <td><?php echo ( $row->estado == 1 ) ? 'Activo'  : 'Inactivo' ;?></td>
                                    <td><a href="<?php echo base_url()?>users/edit/<?php echo $row->usuario_id ?>">editar</a></td>
                                    
                                    <td><a class="btn btn-default" href="<?php echo base_url()?>projects/<?php echo $row->usuario_id ?>">ver projectos</a></td>
                                </tr>
                                <?php
                            }
                        }
                       }
                    ?>
                </tbody>
            </table >
			
            <?php echo $pagination ?>
        </div>
    </div>
</div>


