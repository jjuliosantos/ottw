<?php  
header("Content-Type: text/html;charset=utf-8"); 
require("seguridad.php");
require("autoCarga.php");
require("header_edicion.php"); 

$generales = new Generales();
$id = $_POST['ID'];
$operacion = $_POST['OPERACION'];

$tabla = new Tabla();

if ($_POST['OPERACION'] == 'BAJA')
{
	$tabla->deleteModelo($_POST['ID']);
	$mensaje = $mensaje."Registro dado de baja";
	$operacion = 'BAJA';
}
elseif ($_POST['OPERACION'] == 'MODIF')
{
	$tabla->setModelo($_POST['ID'], $_POST['DESCRIPCION']);

	$mensaje = $mensaje."Registro actualizado";
	$operacion = 'PRE-MODIF';
}
elseif ($_POST['OPERACION'] == 'ALTA')
{
	$id = $tabla->newModelo($_POST['DESCRIPCION']);

	$mensaje = $mensaje."Registro actualizado";
	$operacion = 'PRE-MODIF';
}

$rs = $tabla->getModelo($id);

$row = $rs->fetch_assoc();
$id = $row['ID'];
$descripcion  = $row['DESCRIPCION'];

?>

?>

  <div class="container"> 
      <div class="row">
            <div class="col-lg-12">
			     <div class="page-header">
			        <h1>Mantenimiento OTTW</h1>
			        <ol class="breadcrumb">
			         <li><a href="edicion.php"><i class="fa fa-fw fa fa-sliders"></i> Home</a></li>
				     <li class="active"><a href="edicion_tablas.php"><i class="fa fa-fw fa fa-sitemap"></i> Tablas</a></li>
				     <li class="active"><a href="edicion_tablas_modelos.php"><i class="fa fa-fw fa fa-tags"></i> Modelos</a></li>
				     <?php
            			if ($operacion == 'PRE-MODIF')
            			{
            				echo '<li class="active"><i class="fa fa-fw fa fa-recycle"></i> Actualizar Registro</li>';
            			}
            			elseif ($operacion == 'BAJA')
            			{
            				echo '<li class="active"><i class="fa fa-fw fa fa-recycle"></i> Baja Registro</li>';
            			}            			
            			else 
            			{
            				echo '<li class="active"><i class="fa fa-fw fa fa-plus"></i> Añadir Registro</li>';
            			}
            				
            		 ?>
			        </ol>
			      </div>
    		</div>   
    	</div> 
<form class="form-horizontal" name="tabla" method="POST" action="edicion_tablas_modelos_editar.php" >
			<input type="hidden" name="OPERACION" id="OPERACION">
		    <div class="form-group">
		        <label class="control-label col-xs-3">ID:</label>
		        <div class="col-xs-9">
		            <input type="text" disabled="disabled" class="form-control" id="ID" placeholder="Identificador" name="ID" value='<?php echo $id; 	?>'>
		            <input type="hidden" name="ID" id="ID" value='<?php echo $id; ?>'>
		        </div>
		    </div>   
	    <div class="form-group">
	        <label class="control-label col-xs-3">Descripción:</label>
	        <div class="col-xs-9">
	            <input type="text" class="form-control" id="DESCRIPCION" placeholder="Descripción" name="DESCRIPCION" value='<?php echo $descripcion;?>'>
	         
	        </div>
	    </div>   
      
    <br>
    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            <?php
            if ($operacion == 'PRE-ALTA')
            	echo '<button type="button" class="btn btn-primary" onclick="document.getElementById(\'OPERACION\').value=\'ALTA\';document.tabla.submit();">Alta</button>';
            elseif ($operacion == 'PRE-MODIF')
            {
            	echo '<button type="button" class="btn btn-primary" onclick="document.getElementById(\'OPERACION\').value=\'MODIF\';document.tabla.submit();">Modificar</button>';
            	echo '<button type="button" class="btn btn-danger" onclick="document.getElementById(\'OPERACION\').value=\'BAJA\';document.tabla.submit();">Eliminar</button>';
            }
            ?>
        </div>
    </div>
    <?php
    	if (!empty($mensaje))
    	{
			echo '<div class="alert alert-success">'.$mensaje.'</div>';
    	} 
    ?>     
</form>



<?php
require("footer.php");
?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<script src="js/ekko-lightbox.min.js"></script>
	
	<script>
	$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
	}); 
</script>
	<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>
</body> 

</html> 