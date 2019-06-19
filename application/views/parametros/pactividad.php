<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Parametros de Actividades</title>
	<?php 
	foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	<?php foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
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
	<h1>Parametros de Actividades</h1> 
    <div>
		<?php echo $output; ?>
    </div>
</body>
</html>


</html>
