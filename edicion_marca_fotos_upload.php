<?php
header("Content-Type: text/html;charset=utf-8"); 
require("seguridad.php");
require("autoCarga.php");
require("header_edicion.php");

$generales = new Generales();
$idmoto = $generales->verificaVariable($_POST['ID_MOTO']);
$global_param = new Global_Param();

$motoDetalle = new MotoDetalle();
$where = "marcas.id_moto = $idmoto";

$rs = $motoDetalle->getMotoDetalleId($where);
$row = $rs->fetch_assoc();

$marca = $row["MARCA"];
$fecha_mod = $row["FECHA_MOD"];
$web = $row["PUBLI_WEB"];

if (!empty($_FILES["fileToUpload"]["name"]))
{
	$rs1 = $global_param->getDirectorioTipologiasFotos($_POST['TIPOLOGIA_FOTOS']);
	$rowTipo = $rs1->fetch_assoc();
	$target_dir = $rowTipo["RUTA"];
	
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
			$global_param->insertFotoTipologia($_POST['TIPOLOGIA_FOTOS'], $_FILES["fileToUpload"]["name"], $marca, $idmoto);
		} else {
			$mensaje = $mensaje." Uppsss, ha ocurrido un error al subir el fichero.";
		}
	}
}

$rs = $motoDetalle->getNumeroFotos($idmoto);
$row = $rs->fetch_assoc();
$num_fotos = $row["NUMERO"];



?>

  <div class="container">
	<div class="page-header">
        <h1>Mantenimiento OTTW</h1>
        <ol class="breadcrumb">
         <li><a href="edicion.php"><i class="fa fa-fw fa fa-sliders"></i> Home</a></li>
	     <li class="active"><a href="edicion_marcas.php"><i class="fa fa-fw fa-motorcycle"></i> Marcas</a></li>
         <li class="active"><a onclick="document.getElementById('fotos').action='edicion_marca.php';document.getElementById('ID_MOTO').value='<?php echo $idmoto;?>';document.getElementById('fotos').submit();"><i class="fa fa-fw fa-recycle"></i> Modificación <?php echo $marca; ?></a></li>
         <li class="active"><a onclick="document.getElementById('fotos').action='edicion_marca_fotos.php';document.getElementById('ID_MOTO').value='<?php echo $idmoto;?>';document.getElementById('fotos').submit();"><i class="fa fa-fw fa-picture-o"></i> Listado Fotos (<?php echo $num_fotos;?>)</a></li>
         <li class="active"><i class="fa fa-fw fa-upload"></i> Upload Foto</li>
       </ol>
    </div>    
<form class="form-horizontal" id="fotos" name="fotos" method="POST" action="edicion_marca_fotos_upload.php" enctype="multipart/form-data">
    <div class="form-group">
        <div class="col-xs-4">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-tag"></span></span>
                <input type="text" disabled="disabled" class="form-control" id="ID_MOTO" placeholder="ID_MOTO" value='<?php echo $idmoto; ?>'>
                <input type="hidden" name="ID_MOTO" id="ID_MOTO" value='<?php echo $idmoto; ?>'>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="input-group">
            	<label class="checkbox-inline">
            		<?php
            			if ($web == 1)
            			{
            				echo '<input disabled="disabled" type="checkbox" value="news" checked> <span class="glyphicon glyphicon-eye-open"></span> Publicado en Web';
            			}
            			else
            			{ 
            				echo '<input disabled="disabled" type="checkbox" value="news"> <span class="glyphicon glyphicon glyphicon-eye-close"></span> No Publicado en Web';
            			}
            		?>
            	</label>
        	</div>            
        </div>
        <div class="col-xs-4">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-floppy-disk"></span></span>
                <input type="text" disabled="disabled" class="form-control" id="FECHA_MOD" placeholder="FECHA_MOD" value='<?php echo $fecha_mod; ?>'>
            </div>
        </div>
    </div>
     <br>
       <div class="form-group">
        	<label class="control-label col-xs-3">Fichero:</label>
        	<div class="col-xs-9">
            	<input type="file" name="fileToUpload" id="fileToUpload">            
       		</div>
       </div>
   <div class="form-group">
        <label class="control-label col-xs-3">Tipología:</label>
        <div class="col-xs-9">
            <select name="TIPOLOGIA_FOTOS" class="form-control" >
		        <?php 
		            	$rs1 = $global_param->getTipologiasFotos();
		            	if ($rs1->num_rows > 0){
		            		while ($rowTipo = $rs1->fetch_assoc()) {
		            		 	echo '<option value="'.$rowTipo["DESCRIPCION"].'">'.$rowTipo["DESCRIPCION_WEB"].'</option>';
		            		}
		            	}
		        ?>
			</select>
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
            <button type="button" class="btn btn-primary" onclick="document.fotos.submit();"><i class="fa fa-fw fa-upload"></i> Subir Fichero</button>
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