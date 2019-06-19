<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link rel="stylesheet" href="<?php echo base_url("asset/css/bootstrap.css"); ?>" />


</head>

<body style="margin-top:124px">

<?php echo form_open('/php/login/'); ?>

<script type="text/javascript" src="<?php echo base_url("asset/js/jQuery.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("asset/js/bootstrap.js"); ?>"></script>


 <div class="container">

<div class="panel panel-default">

<div class="panel-heading"><h6>Bienvenidos a Planificate</h6></div>


   <input type="text" name="maillogin" value="<?= set_value('maillogin'); ?>" size="25"   class="form-control" placeholder="Usuario" aria-describedby="basic-addon1">
  
  <?php
      if(isset($error)){
         echo "<p>".$error."</p>";
      }
      echo form_error('maillogin');
      ?>
  
   <input type="password" name="passwordlogin" value="<?= set_value('passwordlogin'); ?>" size="25"    class="form-control" placeholder="Contraseña" aria-describedby="basic-addon1">  
 
  <div class="LoginUsuariosError"><?= form_error('passwordlogin');?></div>
   
  <button type="submit" class="btn btn-default" class="form-control" aria-describedby="basic-addon1"> Ingresar </button>
   
   </div>
</div>
     
</div>
</form>
</body>
</html>