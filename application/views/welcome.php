<html>
<head>

</head>
<body>
   
   <form action="<?php echo base_url()?>index.php/Welcome" method="POST">
    <input type="number" class="form-control" id="valueInput" name="valueInput" value="Algún valor">
    
     <option>
     
     
      </option>
  <!--  <?php $valueVaraible = "Ejemplo" ?>-->
    <!--Enviar otros valores que no se muestran en el formulario -->
   <!-- <input type="hidden" id="valueInput" name="valueInput" value="<?php echo $valueVaraible ?>">-->
   <input type="submit">enviar parametro</input>
</form>





</body>
</html>