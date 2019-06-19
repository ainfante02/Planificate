<nav class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="navigation">
  
    <div class="navbar-header">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

		 <a class="dropdown-toggle" href="<?php echo base_url() ?>php/logout" >Cerrar Sesión </a> <br>
		 
		 </li> Conectado:</li> <?php echo $user->nombreusuario ?> 
        
    </div>

	
  <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		
        <div class="container">
		
		
		<!--Aca se controla el nombre del usuario que se muestra en seccion-->
		
		<div class="text-muted">
		
		</li> Conectado:</li> <?php echo $user->nombreusuario ?> 
		
		</div>
		
        </div>
		
  </div><!-- /.navbar-collapse -->
</nav>