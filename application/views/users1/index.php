<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Planificate</title>
<!--  <?php
$correcto = $this->session->flashdata('correcto');
    if ($correcto) 
    {
    ?>
       <span id="registroCorrecto"><?= $correcto ?></span>
    <?php
    }
    ?>-->
 
 <style>
.dropbtn {
    background-color:#014598;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}




.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: #014598;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #ff1414;
}
</style>
  </head>

  <body>

<div class="container">
 <div class="row">
  <!-- Trigger the modal with a button -->

  <div class="col-sm-3">
  <button type="button" class="btn btn-info btn-lg  " data-toggle="modal" data-target="#myModal">Configuracion</button>
  </div>

  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Configuracion</h4>
        </div>
        <div class="modal-body">

     <?php
    if ($user->rol==1)
    
    { ?> <a href="<?php echo base_url()?>users/add"  data-toggle="tooltip" title="Seleccione para crear un Nuevo Usuario">Registrar Nuevo Usuario </a><br>
    
     <?php } ?>    
          
<a href="<?php echo base_url()?>projects/add"  data-toggle="tooltip" title="Seleccione para crear un Nuevo Requerimiento">Crear Nuevo Requerimiento </a><br> 


</div>

        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        </div>
      </div>
    </div>
  
  
  
  

 
  <!-- Trigger the modal with a button -->
  <div class="col-sm-3">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Estadisticas</button>
</div>
  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Estadisticas</h4>
        </div>
        <div class="modal-body">
         
          
<a href="<?php echo base_url()?>Welcome"  data-toggle="tooltip" title="Cantidad de Actividades Por Usuario">Cantidad de Actividades Por Usuario </a><br> 
 <a href="<?php echo base_url()?>activas"  data-toggle="tooltip" title="Ver actividades Activas">Cantidad de Actividades Activas Por Usuario </a><br>
  <a href="<?php echo base_url()?>cerradas"  data-toggle="tooltip" title="Ver actividades Activas">Cantidad de Actividades Cerradas Por Usuario </a><br>  
    <a href="<?php echo base_url()?>pausadas"  data-toggle="tooltip" title="Ver actividades Activas">Cantidad de Actividades Pausadas Por Usuario </a><br> 

</div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        </div>
      </div>
    </div>

  
 
  <!-- Trigger the modal with a button -->
  <div class="col-sm-3">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">Reportes</button>
</div>
  <!-- Modal -->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Informe de Gestion </h4>
        </div>
        <div class="modal-body">
         
        
<a href="<?php echo base_url()?>Alfredo"  data-toggle="tooltip" title="Listado de las Actividades y Desempeño de los Usuarios
"> Actividades y Desempeño de los Usuarios </a><br> 

<a href="<?php echo base_url()?>Alfredo2"  data-toggle="tooltip" title="Listado de las Actividades y Desempeño de los Usuarios General
"> Actividades y Desempeño de los Usuarios General </a><br> 


</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        </div>
      </div>
    </div>
  
 
  <!-- Trigger the modal with a button -->
  <div class="col-sm-3">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" title="Crear,Activas,Cerradas,Pausadas,Todas" data-target="#myModal4">Actividades</button>
</div>
  <!-- Modal -->
  <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Actividades</h4>
        </div>
        <div class="modal-body">
         
   <?php
    if ($user->rol==1)
    
    { ?>          
<a href="<?php echo base_url()?>pactividad"  data-toggle="tooltip" title="Seleccione para crear una nueva actividad">Crear Nueva Actividad </a><br> 
<?php } ?>   

 
  <a href="<?php echo base_url()?>projects"  data-toggle="tooltip" title="Todas las Actividades">Todas las Actividades </a>

</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        </div>
      </div>
    </div>
    </div>
    </div>
  
  
 
<!----------------------------->


<div class="container">
<div
style="
	text-align: center;
vertical-align: middle;
line-height: 50px;
    font-family: Adobe Arabic;
    font-size: 30px;
">PLANIFÍCATE
</div>


</div>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
  
      <img src="http://localhost/proyecto/planificate/img/banner-sobre-el-ceac.jpg" alt="Chicago" style="width:100%;">
      </div>

      <div class="item">
        <img src="http://localhost/proyecto/planificate/img/banner-sobre-las-bases-de-misiones-2.jpg" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="http://localhost/proyecto/planificate/img/banner-sobre-mercal-2.jpg" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>




<!--------------------------------->


  <script type="text/javascript" src="<?php echo base_url("vendor/jquery/jquery.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
    <!-- Custom scripts for this template -->


    <script type="text/javascript" src="<?php echo base_url("js/clean-blog.min.js"); ?>"></script>
	
	<div class="container">
	<div class="row">
	<div class="alert1 alert-danger alert-dismissible" role="alert">
  <button type="button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
 <marquee><p<style="font-family: Impact; font-size: 18pt;" style="
    color: black;
    font-size: 22px; </style> <style="font-family: Impact; font-size: 18pt;">UNA POTENTE HERRAMIENTA PARA ORGANIZAR TU LABOR, PLANIFÍCATE BUSCA FACILITAR Y DISMINUIR EL TRABAJO DEL DIA DIA</style> </p></marquee>
</div>
	</div>
</div>

<!-- Contador de visitas -->
<center><a href="http://www.websmultimedia.com/contador-de-visitas-gratis" title="Contador De Visitas Gratis">
<img style="border: 0px solid; display: inline;" alt="contador de visitas" src="http://www.websmultimedia.com/contador-de-visitas.php?id=243313"></a><br><a href='http://www.websmultimedia.com/contador-de-visitas-gratis'>Visitante N°</a><br></center>
<!-- Fin Contador de visitas -->

  </body>

</html>
