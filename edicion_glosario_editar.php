<?php    
header("Content-Type: text/html;charset=utf-8"); 
require("seguridad.php");
require("autoCarga.php");
require("header_edicion.php"); 

$generales = new Generales();
$id = $_POST['ID'];
$operacion = $_POST['OPERACION'];

$tabla = new Tabla();

if (!empty($_FILES["fileToUpload"]["name"]))
{
	$target_dir = '/home/u981718063/public_html/test1/img/glosario/';

	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			$mensaje = "Fichero es una imagen - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			$mensaje = "Fichero no es una imagen.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		$mensaje = $mensaje." El fichero ya existe.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		$mensaje = $mensaje." El fichero es demasiado grande.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
		$mensaje = $mensaje." Solo ficheros JPG, JPEG, PNG & GIF son permitidos.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$mensaje = $mensaje." Uppsss, ha ocurrido un error al subir el fichero.";
		// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$mensaje = $mensaje." El fichero ". basename( $_FILES["fileToUpload"]["name"]). " ha sido subido.";
		} else {
			$mensaje = $mensaje." Uppsss, ha ocurrido un error al subir el fichero.(".$_FILES["fileToUpload"]["tmp_name"]."-".$target_file;
			echo print_r($_FILES);
		}
	}
}

if ($_POST['OPERACION'] == 'BAJA')
{
	$tabla->deleteGlosario($_POST['ID'],'img/glosario/'.$_POST['FICHERO']);
	$mensaje = $mensaje."Registro dado de baja";
	$operacion = 'BAJA';
}
elseif ($_POST['OPERACION'] == 'MODIF')
{
	if (empty($_FILES["fileToUpload"]["name"]))
	{
		$FICHERO = $_POST['FICHERO'];
	}
	else
	{
		$FICHERO = $_FILES["fileToUpload"]["name"];
	}
	$tabla->setGlosario($_POST['ID'], $_POST['TERMINO'], $_POST['DESCRIPCION'],$FICHERO );

	$mensaje = $mensaje."Registro actualizado";
	$operacion = 'PRE-MODIF';
}
elseif ($_POST['OPERACION'] == 'ALTA')
{
	$id = $tabla->newGlosario($_POST['TERMINO'],$_POST['DESCRIPCION'],$_FILES["fileToUpload"]["name"]);

	$mensaje = $mensaje."Registro actualizado";
	$operacion = 'PRE-MODIF';
}

	$rs = $tabla->getTermino($id);
	
	$row = $rs->fetch_assoc();
	$id = $row['ID'];
	$termino = $row['TERMINO'];
	$descripcion  = $row['DESCRIPCION'];
	$fichero = $row['FICHERO'];


?>

  <div class="container"> 
      <div class="row">
            <div class="col-lg-12">
			     <div class="page-header">
			        <h1>Mantenimiento OTTW</h1>
			        <ol class="breadcrumb">
			         <li><a href="edicion.php"><i class="fa fa-fw fa fa-sliders"></i> Home</a></li>
				     <li class="active"><a href="edicion_glosario.php"><i class="fa fa-fw fa fa-book"></i> Glosario</a></li>
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
		<form class="form-horizontal" name="tabla" method="POST" action="edicion_glosario_editar.php" enctype="multipart/form-data">
			<input type="hidden" name="OPERACION" id="OPERACION">
		    <div class="form-group">
		        <label class="control-label col-xs-3">ID:</label>
		        <div class="col-xs-9">
		            <input type="text" disabled="disabled" class="form-control" id="ID" placeholder="Identificador" name="ID" value='<?php echo $id; 	?>'>
		            <input type="hidden" name="ID" id="ID" value='<?php echo $id; ?>'>
		        </div>
		    </div> 
	    <div class="form-group">
	        <label class="control-label col-xs-3">Término:</label>
	        <div class="col-xs-9">
	            <input type="text" class="form-control" id="TERMINO" placeholder="Término" name="TERMINO" value='<?php echo $termino;?>'>
	        </div>
	    </div>	    	      
	    <div class="form-group">
	        <label class="control-label col-xs-3">Descripción:</label>
	        <div class="col-xs-9">
	            <textarea rows="5" class="form-control" id="DESCRIPCION" name="DESCRIPCION" placeholder="Descripción" ><?php echo $descripcion; ?></textarea>
	        </div>
	    </div>   
	    <div class="form-group">
	        <label class="control-label col-xs-3">Fichero:</label>
	        <div class="col-xs-3">
	        <?php 
	        if (!empty($fichero))
	        	echo ' <img class="img-thumbnail" width="55" height="33" src="img/glosario/'.$fichero.'" >';
	        ?>
	        </div>
	        <div class="col-xs-6">
	            <input type="text" disabled="disabled" class="form-control" placeholder="Fichero"  value='<?php echo $fichero;?>'>
				<input type="hidden" name="FICHERO" id="FICHERO" value='<?php echo $fichero;?>'>
	            <input type="file" name="fileToUpload" id="fileToUpload">  
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