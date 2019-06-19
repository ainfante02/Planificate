<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Actividades | Vencidas</title>
	<link type="text/css" rel="stylesheet" 
	href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" />
	<style type='text/css'>
	<body>
	{
		padding: 11px;
	}
	</body>
	</style>
</head>
<body>
	<h1>Actividades Vencidas</h1> 
    <div>
		<?php if($promociones): ?>
			<?php foreach($promociones as $promocion): ?>
				<div class="alert alert-info">
				<strong><?php echo $promocion->	descripcionrequerimiento; ?></strong><br />
				<?php echo $promocion->mensaje_actividad; ?><br />
				Fecha de vencimiento: <?php echo $promocion->fechaestimada; ?>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
			<div class="alert alert-danger">
				No hay Actividades Vencidas
			</div>
		<?php endif; ?>
    </div>
</body>
</html>
