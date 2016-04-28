<?php 
header("Content-Type: text/html;charset=utf-8"); 
require("seguridad.php");
require("autoCarga.php");
require("header_edicion.php");

$generales = new Generales();
$global_param = new Global_Param();

if (!empty($_POST['FICHERO_A_BORRAR']))
{
 $global_param->deleteHomeCarouselImage($_POST['FICHERO_A_BORRAR']);
}

?>
<script type="text/javascript">
    function Borrado(ruta) {
        document.getElementById('FICHERO_A_BORRAR').value = ruta;
        document.fotos.action='edicion_home_fotos.php';
        document.fotos.submit();
    }
</script>

  <div class="container">
	<div class="page-header">
	        <h1>Mantenimiento OTTW</h1>
	        <ol class="breadcrumb">
	         <li><a href="edicion.php"><i class="fa fa-fw fa fa-sliders"></i> Home</a></li>
		     <li class="active"><a href="edicion_home.php"><i class="fa fa-fw fa fa-home"></i> Actualización Home</a></li>
		     <li class="active"><i class="fa fa-fw fa-picture-o"></i> Listado Fotos</li>
	        </ol>
    </div>    
<form class="form-horizontal" name="fotos" method="POST" action="edicion_home_fotos_upload.php"> 
	       	<div class="form-group">
        		<div class="col-xs-12">
        			<button type="button" class="btn btn-primary" onclick="document.fotos.submit();"><i class="fa fa-fw fa-upload"></i> Subir Fotos</button>
            		<input type="hidden" id="FICHERO_A_BORRAR" name="FICHERO_A_BORRAR" value=''>
        		</div>
    		</div>
              <?php
            	$rs = $global_param->getHomeCarousel();
            	if ($rs->num_rows > 0){
            		while ($rowFoto = $rs->fetch_assoc()) {
            			echo '<div class="col-xs-4"><div class="thumbnail"><img src="'.$rowFoto["FICHERO"].'" alt="'.$rowFoto["FICHERO"].'">';
            			echo '<div class="caption"><h3>'.$rowFoto["DESCRIPCION"].'</h3>';
          				echo '<p>'.$rowFoto["FICHERO"].'</p>';
            			echo '<p><a href="'.$rowFoto["FICHERO"].'" class="btn btn-primary">Ver</a> ';
            			echo '<button type="button" class="btn btn-danger" onclick="Borrado(\''.$rowFoto["FICHERO"].'\');"><i class="fa fa-fw fa-remove"></i> Borrar</button></p></div></div></div>';
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