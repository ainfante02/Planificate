<!doctype html>
<html lang="en"class="prueba">
<head>
    <meta charset="UTF-8">
    <title>Planificate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	   <link href="<?php echo base_url()?>css/clean-blog.min.css" rel="stylesheet">
	 
    <link href="<?php echo base_url()?>asset/css/bootstrap.min.css" rel="stylesheet"> 
 	 
    <link href="<?php echo base_url()?>asset/css/theme.css" rel="stylesheet">
	
     <link href="<?php echo base_url()?>asset/css/Prueba.css" rel="stylesheet">

	   <link href="<?php echo base_url()?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		


    </head>
    </html>
<body>
<?php $this->load->view('structure/menu1.php', 
                                        array(
											'user'  => $user
                                        )
                                    ) ?>
                                    
</body>