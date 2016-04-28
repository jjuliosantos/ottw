<?php
header("Content-Type: text/html;charset=utf-8"); 
require("seguridad.php");
require("autoCarga.php");
require("header_edicion.php");

$generales = new Generales();
$idmoto = $generales->verificaVariable($_POST['ID_MOTO']);

$motoDetalle = new MotoDetalle();
$where = "marcas.id_moto = $idmoto";

if (!empty($_POST['FICHERO_A_BORRAR']))
{
	$motoDetalle->deleteImage($_POST['FICHERO_A_BORRAR'],$_POST['TABLA_FICHERO'],$idmoto);
	$mensaje = "Fichero ".$_POST['FICHERO_A_BORRAR']." borrado correctamente.";
}

$rs = $motoDetalle->getMotoDetalleId($where);
$row = $rs->fetch_assoc();

$marca = $row["MARCA"];
$fecha_mod = $row["FECHA_MOD"];
$web = $row["PUBLI_WEB"];

$rs = $motoDetalle->getNumeroFotos($idmoto);
$row = $rs->fetch_assoc();
$num_fotos = $row["NUMERO"];

?>
<script type="text/javascript">
    function Borrado(fichero,directorio) {
        document.getElementById('FICHERO_A_BORRAR').value = fichero;
        document.getElementById('TABLA_FICHERO').value = directorio;
        document.fotos.action='edicion_marca_fotos.php';
        document.fotos.submit();
    }
</script>

  <div class="container">
	<div class="page-header">
       <h1>Mantenimiento OTTW</h1>
        <ol class="breadcrumb">
         <li><a href="edicion.php"><i class="fa fa-fw fa fa-sliders"></i> Home</a></li>
	     <li class="active"><a href="edicion_marcas.php"><i class="fa fa-fw fa-motorcycle"></i> Marcas</a></li>
         <li class="active"><a onclick="document.getElementById('fotos').action='edicion_marca.php';document.getElementById('ID_MOTO').value='<?php echo $idmoto;?>';document.getElementById('fotos').submit();"><i class="fa fa-fw fa-recycle"></i> Modificación <?php echo $marca; ?></a></li>
         <li class="active"><i class="fa fa-fw fa-picture-o"></i> Listado Fotos (<?php echo $num_fotos;?>)</li>
       </ol>
       
    </div>    
        <?php
    	if (!empty($mensaje))
    	{
    			echo '<div class="alert alert-success">'.$mensaje.'</div>';
    	} 
    ?> 
<form class="form-horizontal" name="fotos" id="fotos" method="POST" action="edicion_marca_fotos_upload.php"> 
	       	<div class="form-group">
        		<div class="col-xs-12">
            		<button type="button" class="btn btn-primary" onclick="document.fotos.submit();"><i class="fa fa-fw fa-upload"></i> Subir Fotos</button>
            		<input type="hidden" id="FICHERO_A_BORRAR" name="FICHERO_A_BORRAR" value=''>
            		<input type="hidden" id="TABLA_FICHERO" name="TABLA_FICHERO" value=''>
        		</div>
    		</div>
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
            				echo '<input type="checkbox" disabled="disabled" value="news" checked> <span class="glyphicon glyphicon-eye-open"></span> Publicado en Web';
            			}
            			else
            			{ 
            				echo '<input type="checkbox" disabled="disabled" value="news"> <span class="glyphicon glyphicon glyphicon-eye-close"></span> No Publicado en Web';
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
              <?php
            	$rs = $motoDetalle->getMotoDetalleImagenes($idmoto);
            	if ($rs->num_rows > 0){
            		$num_imagen = 1;
            		while ($rowFoto = $rs->fetch_assoc()) 
            		{
            			if ($num_imagen % 4 == 0)
            			{
            				echo '<div class="row">';
            			}
            			echo '<div class="col-xs-3"><div class="thumbnail"><img src="'.$rowFoto["RUTA"].'" alt="'.$rowFoto["RUTA"].'">';
            			echo '<div class="caption"><h3>'.$rowFoto["DESCRIPCION_WEB"].'</h3>';
          				echo '<p>'.$rowFoto["RUTA"].'</p>';
            			echo '<p><a href="'.$rowFoto["RUTA"].'" class="btn btn-primary">Ver </a>';
            			echo '<button type="button" class="btn btn-danger" onclick="Borrado(\''.$rowFoto["FICHERO"].'\',\''.$rowFoto["DIRECTORIO"].'\');"><i class="fa fa-fw fa-remove"></i> Borrar</button></p></div></div></div>';
            			if ($num_imagen % 4 == 0)
            			{
            				echo '</div>';
            			} 
            			$num_imagen = $num_imagen + 1;           			
             		}
  		
            	}

            ?>        
                                                
    <br>

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