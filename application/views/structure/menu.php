
<nav class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="navigation">
  
    <div class="navbar-header">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        
<!--<a href="<?php echo base_url() ?>php/logout" class="btn btn-primary">Cerrar Sesion</a>-->
 <a class="dropdown-toggle" href="<?php echo base_url() ?>php/logout" >Cerrar Sesión </a> 
		
        
    </div>

	
  <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		
        <div class="container">
		
		<!-- Con la el if se fltra el nivel del usuario y mostrar  -->
		
            <ul class="nav navbar-nav">
            
                <li class="dropdown">
              
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configuracion <b class="caret"></b></a>
                   
                    <ul class="dropdown-menu">
                    
                    
                     <?php if ($user->rol==1){ ?>
                     <li><a href="<?php echo base_url()?>pactividad">Cargar Actividades</a></li>
                      <?php } ?>	
                      
                      <?php if ($user->rol==1){ ?>
                      <li><a href="<?php echo base_url()?>requerimiento_edit">Requerimientos</a></li>
                            <?php } ?>
                            
                     <li><a href="<?php echo base_url()?>prequerimiento">Cargar Prioridad del Requerimiento</a></li>
                     
               <!--      <li><a href="<?php echo base_url()?>trequerimiento">Cargar Tipo de Requerimiento</a></li>-->
                     
                        <?php if ($user->rol==1){ ?>
                     <li><a href="<?php echo base_url()?>gerencia">Cargar Contactos de Gerencias</a></li>
                       <?php } ?>
                     
                     <li><a href="<?php echo base_url()?>erequerimiento">Cargar estados del Requerimeinto</a></li>
                     <li><a href="<?php echo base_url()?>viarecepcion">Cargar Vias de recepcion</a></li>
                     <?php if ($user->rol==1){ ?>
                     <li><a href="<?php echo base_url()?>datos">Cargar Alarmas</a></li>
                 <!--     <li><a href="<?php echo base_url()?>users">Listados de Usuarios</a></li>-->
                      <li><a href="<?php echo base_url()?>users/add">Crear Nuevo Usuario</a></li>
                      <li><a href="<?php echo base_url()?>users/">Ver todos los usuarios</a></li>
                        <li><a href="<?php echo base_url()?>auditoria">Auditoria de gestion del sistema</a></li>
                         <li><a href="<?php echo base_url()?>auditint">Auditoria de gestion de Ingresos Fallidos</a></li>
                         
                      
                      <!--  <li><a href="<?php echo base_url()?>admin">Planicador de Alarmas</a></li>-->
                     <!--   <li><a href="<?php echo base_url()?>catalogo">Actividades Vencidas</a></li>-->
                         <li><a href="<?php echo base_url()?>pdf">Exportar Actividades a PDF</a></li>
                      <li role="presentation" class="divider"></li>
                      <li>
                        <form action="#" data-redirect="<?php echo base_url()?>users/edit/%id">
                            <div class="col-md-12">
                            <label for="_nav_id_usario">Editar Usuario</label>
                            <input id="_nav_id_usario"type="text" class="form-control" name="id" placeholder="id de usuario">
                            </div>
                              <?php } ?>
                        </form>
                      </li> 
                      
                    </ul>
                    
                </li>
            </ul>
            <li class="dropdown"> <a class="dropdown-toggle" href="<?php echo base_url() ?>users1" >Volver al Inicio</a>	 </li> 
		
		
		<!--Aca se controla el nombre del usuario que se muestra en seccion-->
		
		<div class="text-muted">
		
		</li> Conectado:</li> <?php echo $user->nombreusuario ?> 
		
		</div>
		
        </div>
		
  </div>
</nav>