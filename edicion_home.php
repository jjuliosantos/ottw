<?php
header("Content-Type: text/html;charset=utf-8"); 
require("seguridad.php");
require("autoCarga.php");
require("header_edicion.php"); 

$generales = new Generales();
$global_param = new Global_Param();

$rs = $global_param->getNumeroFotosHome();
$row = $rs->fetch_assoc();
$num_fotos = $row["NUMERO"];

if ($_POST['OPERACION'] == 'MODIF')
{
	$global_param->setHomeDescripciones($_POST['TITULO1'],1);
	$global_param->setHomeDescripciones($_POST['TITULO2'],2);
	$mensaje = "Registro actualizado";
}

?>

  <div class="container">
	<div class="page-header">
        <h1>Mantenimiento OTTW</h1>
        <ol class="breadcrumb">
         <li><a href="edicion.php"><i class="fa fa-fw fa fa-sliders"></i> Home</a></li>
	     <li class="active"><i class="fa fa-fw fa fa-home"></i> Actualización Home</li>
       </ol>
    </div> 
<form class="form-horizontal" id="home" name="home" method="POST" action="edicion_home.php">
    <div class="form-group">
        <div class="col-xs-12">
        	<input type="hidden" name="OPERACION" id="OPERACION">
        	<button type="button" class="btn btn-success" onclick="document.getElementById('OPERACION').value='MODIF';document.home.submit();">Guardar Cambios</button>        
            <button type="submit" class="btn btn-primary" onclick="document.home.action='edicion_home_fotos.php';document.home.submit();">Listado Fotos Carrusel <span class="badge"><?php echo $num_fotos; ?></span></button>
        </div>
    </div> 
        <?php
    	if (!empty($mensaje))
    	{
    			echo '<div class="alert alert-success">'.$mensaje.'</div>';
    	} 
    ?> 
            <?php 
            	$rs = $global_param->getHomeDescripciones(1);
            	if ($rs->num_rows > 0){
            		while ($rowHome = $rs->fetch_assoc()) { 
            			echo '<div class="form-group"><label class="control-label col-xs-3">'.$rowHome["TITULO"].':</label><div class="col-xs-9">';
            			echo '<textarea rows="20" class="form-control" name="TITULO1">'.$rowHome["DESCRIPCION"].'</textarea></div></div>';
            		}  
            	}  
            	$rs = $global_param->getHomeDescripciones(2);
            	if ($rs->num_rows > 0){
            		while ($rowHome = $rs->fetch_assoc()) {
            			echo '<div class="form-group"><label class="control-label col-xs-3">'.$rowHome["TITULO"].':</label><div class="col-xs-9">';
            			echo '<textarea rows="20" class="form-control" name="TITULO2">'.$rowHome["DESCRIPCION"].'</textarea></div></div>';
            		}
            	}            	       
            ?>    
    <br>
    <div class="form-group">
        <div class="col-xs-12">
        	<button type="button" class="btn btn-success" onclick="document.getElementById('OPERACION').value='MODIF';document.home.submit();">Guardar Cambios</button>
            <button type="submit" class="btn btn-primary" onclick="document.home.action='edicion_home_fotos.php';document.home.submit();">Listado Fotos Carrusel <span class="badge"><?php echo $num_fotos; ?></span></button>
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