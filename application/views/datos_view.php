<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--necesario para utilizar ajax-->
      <!--  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
         <script type="text/javascript" src="<?php echo base_url("asset/js/jquery.min.js"); ?>"></script>
        <title><?= $titulo ?></title>
        <style type="text/css">
            /*los estilos*/
            th{
                background-color: #222;
                color: #fff;
				    TEXT-ALIGN: CENTER;
            }
            td{
                padding: 5px 40px 5px 40px;
                background-color: #D0D0D0;
            }
            label{
                display: block;
            }
            #editar{
                margin: 30px 0px 0px 300px;
                background-color: #D0D0D0;
                border: 3px solid #999;
                width: 500px;
                padding: 20px;
                display: none;
            }
            input[type=text],input[type=email]{
                padding: 5px;
                width: 250px;
            }
            input[type=submit]{
                padding: 4px 15px 4px 15px;
                background-color: #123;
                border-radius: 4px;
                color: #ddd;
            }
            #actualizadoCorrectamente{
                padding: 5px;
                background-color: #005702;
                color: #fff;
                font-weight: bold;
                text-align: center;
            }
        </style>
        <script type="text/javascript">
            //función encargada de procesar la solicitud al pulsar el botón pasar_edicion
            function saltar(id){
                $("#editar").load("http://localhost:80/proyecto/planificate/datos/mostrar_datos", { id: id }); 
                $("#editar").fadeIn('2000');
            }
        </script>
    </head>
 
    <body>
        <table>
            <tr>
			
                <th>Mensaje para alarma</th>
                <th>Fecha estimada de Cierre</th>
				
                <th>Editar</th>
            
            </tr>
            <?php
            foreach ($requerimiento as $fila):
                $requerimiento_id = $fila->requerimiento_id;
                //creamos el botón que debe colocar los datos dentro de los campos
                //del formulario que se creará con la función saltar($id) que le pasamos
                //la id del mensaje
                $boton = array(
                    'name' => 'pasar_edicion',
                    'id' => 'pasar_edicion',
                    'onclick' => "saltar($requerimiento_id)"
                );
                ?>
	
                <tr>
                    <td><?= $fila->mensaje_actividad ?></td>
               
                    <td><?= $fila->fechaestimada ?></td>
                    <td><?= form_button($boton, 'Editar') ?></td>
                </tr>
                <?php
            endforeach;
            ?>
            <?php
            //si se hace la actualización mostramos el mensaje que contiene
            //la sesión flashdata actualizado que hemos creado en el controlado
            $actualizar = $this->session->flashdata('actualizado');
            if ($actualizar) {
                ?>
                <tr>
                    <td colspan="5" id="actualizadoCorrectamente"><?= $actualizar ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <div id="editar">            
        </div>
    </body>
</html>