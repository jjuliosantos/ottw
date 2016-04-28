<?php 
header("Content-Type: text/html;charset=utf-8"); 
require("seguridad.php");
require("autoCarga.php");
require("header_edicion.php");

$generales = new Generales();
$idmoto = $generales->verificaVariable($_POST['ID_MOTO']);
$global_param = new Global_Param();

if (!empty($_FILES["fileToUpload"]["name"]))
{
	$target_dir = 'img/home/';
	
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
			$global_param->insertFotoHome($target_file, $_POST['DESCRIPCION'] );
		} else {
			$mensaje = $mensaje." Uppsss, ha ocurrido un error al subir el fichero.";
		}
	}
}

?>

  <div class="container">
	<div class="page-header">
	        <h1>Mantenimiento OTTW</h1>
	        <ol class="breadcrumb">
	         <li><a href="edicion.php"><i class="fa fa-fw fa fa-sliders"></i> Home</a></li>
		     <li class="active"><a href="edicion_home.php"><i class="fa fa-fw fa fa-home"></i> Actualización Home</a></li>
		     <li class="active"><a href="edicion_home_fotos.php"><i class="fa fa-fw fa-picture-o"></i> Listado Fotos</a></li>
		     <li class="active"><i class="fa fa-fw fa-upload"></i> Subir Fotos</a></li>
	        </ol>
    </div>   
<form class="form-horizontal" name="fotos" method="POST" action="edicion_home_fotos_upload.php" enctype="multipart/form-data">
       <div class="form-group">
        	<label class="control-label col-xs-3">Fichero:</label>
        	<div class="col-xs-9">
            	<input type="file" name="fileToUpload" id="fileToUpload">            
       		</div>
       </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Descripcion:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="DESCRIPCION" placeholder="Descripcion del fichero" name="DESCRIPCION" >
         
        </div>
    </div>       
    <?php
    	if (!empty($mensaje))
    	{
    		if ($uploadOk == 0) {
    			echo '<div class="alert alert-danger">'.$mensaje.'</div>';
    		}
    		else {
    			echo '<div class="alert alert-success">'.$mensaje.'</div>';
    		}
    	} 
    ?>       
                                          
    <br>
    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            <input type="submit" class="btn btn-primary" value="Subir Fichero">
        </div>
    </div>
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