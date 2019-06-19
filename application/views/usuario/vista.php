
<html>
<head>

</head>
<body>
 
  <form action="<?php echo base_url()?>index.php/vista" method="POST">
 
  
  <!--  <?php $valueVaraible = "Ejemplo" ?>-->
    <!--Enviar otros valores que no se muestran en el formulario -->
   <!-- <input type="hidden" id="valueInput" name="valueInput" value="<?php echo $valueVaraible ?>">-->
 
<?php
$_formData = array(
  
           "usuario_id" => ''
    );
    
      $title = 'Consultar';
    ?>
       <?php 
                    // Agrego el input para el fk
                   if( isset ( $_formData['usuario_id'] ) ) {
                        ?>
                        <input type="hidden" name="usuario_id" value="<?php echo $_formData['usuario_id'] ?>" />
                        <?php
                    }
                ?> 

     <div class="col-md-12">
                        <input type="submit" value="<?php echo  $title ?>" class="btn btn-primary">
                    </div>
</form>

</body>
</html>