<?php
header("Content-Type: text/html;charset=utf-8"); 
require("seguridad.php");
require("autoCarga.php");
require("header_edicion.php"); 

$generales = new Generales();
$idmoto = $generales->verificaVariable($_POST['ID_MOTO']);
$motoDetalle = new MotoDetalle();
$where = "marcas.id_moto = $idmoto";

if ($_POST['OPERACION'] == 'MODIF')
{
	$motoDetalle->updateMotoDetalle(
			$_POST['ID_MOTO'], 
			$_POST['MARCA'], 
			$_POST['MARCA1'],
			$_POST['MARCA2'],
			$_POST['MARCA3'],
			$_POST['MARCA4'],
			$_POST['MARCA5'],
			$_POST['NOTES'],
			$_POST['TIPOLOGIA_MODEL'],
			$_POST['TIPOLOGIA_PAIS'],
			$_POST['TIPOLOGIA_PAIS2'],
			$_POST['TIPOLOGIA_PAIS3'],
			$_POST['TIPOLOGIA_PAIS4'],
			$_POST['TIPOLOGIA_PAIS5'],
			$_POST['ANY'],
			$_POST['TIPOLOGIA_CIUDAD'],
			$_POST['TIPOLOGIA_CIUDAD1'],
			$_POST['FUNDADOR'],
			$_POST['FABRICANT'],
			$_POST['FABRICANT2'],
			$_POST['INGINIER'],
			$_POST['ANY_INICIO1'],
			$_POST['ANY_FIN1'],
			$_POST['ANY_INICIO2'],
			$_POST['ANY_FIN2'],
			$_POST['PUBLI_WEB']);
	$mensaje = "Registro actualizado";
}
elseif ($_POST['OPERACION'] == 'ALTA')
{
	$motoDetalle->setMotoDetalleId(
			$_POST['MARCA'],
			$_POST['MARCA1'],
			$_POST['MARCA2'],
			$_POST['MARCA3'],
			$_POST['MARCA4'],
			$_POST['MARCA5'],
			$_POST['NOTES'],
			$_POST['TIPOLOGIA_MODEL'],
			$_POST['TIPOLOGIA_PAIS'],
			$_POST['TIPOLOGIA_PAIS2'],
			$_POST['TIPOLOGIA_PAIS3'],
			$_POST['TIPOLOGIA_PAIS4'],
			$_POST['TIPOLOGIA_PAIS5'],
			$_POST['ANY'],
			$_POST['TIPOLOGIA_CIUDAD'],
			$_POST['TIPOLOGIA_CIUDAD1'],
			$_POST['FUNDADOR'],
			$_POST['FABRICANT'],
			$_POST['FABRICANT2'],
			$_POST['INGINIER'],
			$_POST['ANY_INICIO1'],
			$_POST['ANY_FIN1'],
			$_POST['ANY_INICIO2'],
			$_POST['ANY_FIN2'],
			$_POST['PUBLI_WEB']);
	$mensaje = "Registro actualizado";
}

$rs = $motoDetalle->getMotoDetalleId($where);
$row = $rs->fetch_assoc();

if ($rs->num_rows == 0)
{
	$mensaje = "Marca no existe en la Base de Datos.";
}

$marca = $row["MARCA"];
$marca1 = $row["MARCA1"];
$marca2 = $row["MARCA2"];
$marca3 = $row["MARCA3"];
$marca4 = $row["MARCA4"];
$marca5 = $row["MARCA5"];
$notes = $row["NOTES_NOWEB"];
$modelo = $row["MODEL"];
$pais = $row["PAIS"];
$pais2 = $row["PAIS2"];
$pais3 = $row["PAIS3"];
$pais4 = $row["PAIS4"];
$pais5 = $row["PAIS5"];
$anyo = $row["ANY"];
$ciudad = $row["CIUTAT"];
$ciudad1 = $row["CIUTAT1"];
$fundador = $row["FUNDADOR"];
$fabrica = $row["FABRICANT"];
$any_inicio1 = $row["ANY_INICIO1"];
$any_fin1 = $row["ANY_FIN1"];
$any_inicio2 = $row["ANY_INICIO2"];
$any_fin2 = $row["ANY_FIN2"];
$fabrica1 = $row["FABRICANT2"];
$ingeniero = $row["INGINIER"];
$fecha_mod = $row["FECHA_MOD"];
$web = $row["PUBLI_WEB"];

$rs = $motoDetalle->getNumeroFotos($idmoto);
$row = $rs->fetch_assoc();
$num_fotos = $row["NUMERO"];

$global_param = new Global_Param();
?>

  <div class="container">
	<div class="page-header">
       <h1>Mantenimiento OTTW</h1>
       <ol class="breadcrumb">
         <li><a href="edicion.php"><i class="fa fa-fw fa fa-sliders"></i> Home</a></li>
	     <li class="active"><a href="edicion_marcas.php"><i class="fa fa-fw fa-motorcycle"></i> Marcas</a></li>
         <li class="active"><i class="fa fa-fw fa-recycle"></i> Modificación <?php echo $marca; ?></li>
       </ol>       
    </div> 
<form class="form-horizontal" name="marca" method="POST" action="edicion_marca.php">
    <div class="form-group">
        <div class="col-xs-12">
        	<input type="hidden" name="OPERACION" id="OPERACION">
        	<button type="button" class="btn btn-success" onclick="document.getElementById('OPERACION').value='MODIF';document.marca.action='edicion_marca.php';document.marca.submit();">Guardar Cambios</button>
            <button type="submit" class="btn btn-primary" onclick="document.getElementById('OPERACION').value='';document.marca.action='edicion_marca_fotos.php';document.marca.submit();">Listado Fotos <span class="badge"><?php echo $num_fotos; ?></span></button>
        </div>
    </div> 
    <div class="form-group">
        <div class="col-xs-3">
        </div>
        <div class="col-xs-3">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-tag"></span></span>
                <input type="text" disabled="disabled" class="form-control" placeholder="ID_MOTO" value='<?php echo $idmoto; ?>'>
                <input type="hidden" name="ID_MOTO" value='<?php echo $idmoto; ?>'>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="input-group">
            	<select id="PUBLI_WEB" name="PUBLI_WEB" id="PUBLI_WEB" class="form-control" >
            		<?php
            			if ($web == '1')
            			{
            				echo '<option selected value="1">Publicado en WEB</option>';
            				echo '<option value="0">NO Publicado en WEB</option>';
            			}
            			else
            			{ 
            				echo '<option value="1">Publicado en WEB</option>';
            				echo '<option selected value="0">NO Publicado en WEB</option>';
            			}
            		?>
            	</select>
        	</div>            
        </div>
        <div class="col-xs-3">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-floppy-disk"></span></span>
                <input type="text" disabled="disabled" class="form-control" id="FECHA_MOD" placeholder="FECHA_MOD" value='<?php echo $fecha_mod; ?>'>
            </div>
        </div>
    </div>
    <?php
    	if (!empty($mensaje))
    	{
    			echo '<div class="alert alert-success">'.$mensaje.'</div>';
    	} 
    ?>     
    
    
    <div class="form-group">
        <label class="control-label col-xs-3">Marca:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="MARCA" placeholder="Marca" name="MARCA" value='<?php echo $marca; ?>'>
            
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Marca1:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="MARCA1" name="MARCA1" placeholder="Marca1" value='<?php echo $marca1; ?>'>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Marca2:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="MARCA2" name="MARCA2" placeholder="Marca2" value='<?php echo $marca2; ?>'>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Marca3:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="MARCA3" name="MARCA3" placeholder="Marca3" value='<?php echo $marca3; ?>'>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Marca4:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="MARCA4" name="MARCA4" placeholder="Marca4" value='<?php echo $marca4; ?>'>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Marca5:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="MARCA5" name="MARCA5" placeholder="Marca5" value='<?php echo $marca5; ?>'>
        </div>
    </div>    
    <div class="form-group">
        <label class="control-label col-xs-3">Notes:</label>
        <div class="col-xs-9">
            <textarea rows="20" class="form-control" id="NOTES" name="NOTES" placeholder="Notes" ><?php echo $notes; ?></textarea>
        </div>
    </div>
   <div class="form-group">
        <label class="control-label col-xs-3">Model:</label>
        <div class="col-xs-9">    
	    <select id="TIPOLOGIA_MODEL" name="TIPOLOGIA_MODEL" class="form-control" >
		   <?php 
	            	$rs1 = $global_param->getTipologiasModelos();
	            	$fila = 1;
	            	if ($rs1->num_rows > 0){
	            		while ($rowTipo = $rs1->fetch_assoc()) {
	            			if ($rowTipo["IDMODELO"] == $modelo){
	            				echo '<option selected value="'.$rowTipo["IDMODELO"].'">'.$rowTipo["DESCRIPCION"].'</option>';
	            			}
	            			elseif (empty($modelo) and $fila == 1){
	            				echo '<option selected value=""></option>';
	            				$fila = 0;
	            			}	            			
	            			else {
	            				echo '<option value="'.$rowTipo["IDMODELO"].'">'.$rowTipo["DESCRIPCION"].'</option>';
	            			}
	            		}
	            	}
	        ?>
		</select> 
        </div>
    </div>
   <div class="form-group">
        <label class="control-label col-xs-3">Pais:</label>
        <div class="col-xs-9">    
	    <select id="TIPOLOGIA_PAIS" name="TIPOLOGIA_PAIS" class="form-control" >
		   <?php 
	            	$rs1 = $global_param->getTipologiasPaises();
	            	$fila = 1;
	            	if ($rs1->num_rows > 0){
	            		while ($rowTipo = $rs1->fetch_assoc()) {
	            			if ($rowTipo["ID"] == $pais){
	            				echo '<option selected value="'.$rowTipo["ID"].'">'.$rowTipo["DESCRIPCION"].'</option>';
	            			}
	            			elseif (empty($pais) and $fila == 1){
	            				echo '<option selected value=""></option>';
	            				$fila = 0;
	            			}
	            			else {
	            				echo '<option value="'.$rowTipo["ID"].'">'.$rowTipo["DESCRIPCION"].'</option>';
	            			}
	            		}
	            	}
	        ?>
		</select> 
        </div>
    </div>
   <div class="form-group">
        <label class="control-label col-xs-3">Pais2:</label>
        <div class="col-xs-9">    
	    <select id="TIPOLOGIA_PAIS2" name="TIPOLOGIA_PAIS2" class="form-control" >
		   <?php 
	            	$rs1 = $global_param->getTipologiasPaises();
	            	$fila = 1;
	            	if ($rs1->num_rows > 0){
	            		while ($rowTipo = $rs1->fetch_assoc()) {
	            			if ($rowTipo["ID"] == $pais2){
	            				echo '<option selected value="'.$rowTipo["ID"].'">'.$rowTipo["DESCRIPCION"].'</option>';
	            			}
	            			elseif (empty($pais2) and $fila == 1){
	            				echo '<option selected value=""></option>';
	            				$fila = 0;
	            			}
	            			else {
	            				echo '<option value="'.$rowTipo["ID"].'">'.$rowTipo["DESCRIPCION"].'</option>';
	            			}
	            		}
	            	}
	        ?>
		</select> 
        </div>
    </div>
   <div class="form-group">
        <label class="control-label col-xs-3">Pais3:</label>
        <div class="col-xs-9">    
	    <select id="TIPOLOGIA_PAIS3" name="TIPOLOGIA_PAIS3" class="form-control" >
		   <?php 
	            	$rs1 = $global_param->getTipologiasPaises();
	            	$fila = 1;
	            	if ($rs1->num_rows > 0){
	            		while ($rowTipo = $rs1->fetch_assoc()) {
	            			if ($rowTipo["ID"] == $pais3){
	            				echo '<option selected value="'.$rowTipo["ID"].'">'.$rowTipo["DESCRIPCION"].'</option>';
	            			}
	            			elseif (empty($pais3) and $fila == 1){
	            				echo '<option selected value=""></option>';
	            				$fila = 0;
	            			}
	            			else {
	            				echo '<option value="'.$rowTipo["ID"].'">'.$rowTipo["DESCRIPCION"].'</option>';
	            			}
	            		}
	            	}
	        ?>
		</select> 
        </div>
    </div>
   <div class="form-group">
        <label class="control-label col-xs-3">Pais4:</label>
        <div class="col-xs-9">    
	    <select id="TIPOLOGIA_PAIS4" name="TIPOLOGIA_PAIS4" class="form-control" >
		   <?php 
	            	$rs1 = $global_param->getTipologiasPaises();
	            	$fila = 1;
	            	if ($rs1->num_rows > 0){
	            		while ($rowTipo = $rs1->fetch_assoc()) {
	            			if ($rowTipo["ID"] == $pais4){
	            				echo '<option selected value="'.$rowTipo["ID"].'">'.$rowTipo["DESCRIPCION"].'</option>';
	            			}
	            			elseif (empty($pais4) and $fila == 1){
	            				echo '<option selected value=""></option>';
	            				$fila = 0;
	            			}
	            			else {
	            				echo '<option value="'.$rowTipo["ID"].'">'.$rowTipo["DESCRIPCION"].'</option>';
	            			}
	            		}
	            	}
	        ?>
		</select> 
        </div>
    </div>  
   <div class="form-group">
        <label class="control-label col-xs-3">Pais5:</label>
        <div class="col-xs-9">    
	    <select id="TIPOLOGIA_PAIS5" name="TIPOLOGIA_PAIS5" class="form-control" >
		   <?php 
	            	$rs1 = $global_param->getTipologiasPaises();
	            	$fila = 1;
	            	if ($rs1->num_rows > 0){
	            		while ($rowTipo = $rs1->fetch_assoc()) {
	            			if ($rowTipo["ID"] == $pais5){
	            				echo '<option selected value="'.$rowTipo["ID"].'">'.$rowTipo["DESCRIPCION"].'</option>';
	            			}
	            			elseif (empty($pais5) and $fila == 1){
	            				echo '<option selected value=""></option>';
	            				$fila = 0;
	            			}
	            			else {
	            				echo '<option value="'.$rowTipo["ID"].'">'.$rowTipo["DESCRIPCION"].'</option>';
	            			}
	            		}
	            	}
	        ?>
		</select> 
        </div>
    </div>                   	          
    <div class="form-group">
        <label class="control-label col-xs-3">Any:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="ANY" name="ANY" placeholder="Any" value='<?php echo $anyo; ?>'>
        </div>
    </div>
   <div class="form-group">
        <label class="control-label col-xs-3">Ciudad:</label>
        <div class="col-xs-9">    
	    <select id="TIPOLOGIA_CIUDAD" name="TIPOLOGIA_CIUDAD" class="form-control" >
		   <?php 
	            	$rs1 = $global_param->getTipologiasCiudades();
	            	$fila = 1;
	            	if ($rs1->num_rows > 0){
	            		while ($rowTipo = $rs1->fetch_assoc()) {
	            			if ($rowTipo["ID"] == $ciudad){
	            				echo '<option selected value="'.$rowTipo["ID"].'">'.$rowTipo["DESCRIPCION"].'</option>';
	            			}
	            			elseif (empty($ciudad) and $fila == 1){
	            				echo '<option selected value=""></option>';
	            				$fila = 0;
	            			}
	            			else {
	            				echo '<option value="'.$rowTipo["ID"].'">'.$rowTipo["DESCRIPCION"].'</option>';
	            			}
	            		}
	            	}
	        ?>
		</select> 
        </div>
    </div>      
   <div class="form-group">
        <label class="control-label col-xs-3">Ciudad1:</label>
        <div class="col-xs-9">    
	    <select id="TIPOLOGIA_CIUDAD1" name="TIPOLOGIA_CIUDAD1" class="form-control" >
		   <?php 
	            	$rs1 = $global_param->getTipologiasEscudos();
	            	$fila = 1;
	            	if ($rs1->num_rows > 0){
	            		while ($rowTipo = $rs1->fetch_assoc()) {
	            			if ($rowTipo["ID"] == $ciudad1){
	            				echo '<option selected value="'.$rowTipo["ID"].'">'.$rowTipo["DESCRIPCION"].'</option>';
	            			}
	            			elseif (empty($ciudad1) and $fila == 1){
	            				echo '<option selected value=""></option>';
	            				$fila = 0;
	            			}
	            			else {
	            				echo '<option value="'.$rowTipo["ID"].'">'.$rowTipo["DESCRIPCION"].'</option>';
	            			}
	            		}
	            	}
	        ?>
		</select> 
        </div>
    </div>     
    <div class="form-group">
        <label class="control-label col-xs-3">Fundador:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="FUNDADOR" name="FUNDADOR" placeholder="Fundador" value='<?php echo $fundador; ?>'>
        </div>
    </div>       
    <div class="form-group">
        <label class="control-label col-xs-3">Fabricant:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="FABRICANT" name="FABRICANT" placeholder="Fabricant" value='<?php echo $fabrica; ?>'>
        </div>
    </div>      
    <div class="form-group">
        <label class="control-label col-xs-3">Fabricant2:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="FABRICANT2" name="FABRICANT2" placeholder="Fabricant2" value='<?php echo $fabrica1; ?>'>
        </div>
    </div>   
    <div class="form-group">
        <label class="control-label col-xs-3">Any inicio1:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="ANY_INICIO1" name="ANY_INICIO1" placeholder="Any inicio1" value='<?php echo $any_inicio1; ?>'>
        </div>
    </div>    
    <div class="form-group">
        <label class="control-label col-xs-3">Any fin1:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="ANY_FIN1" name="ANY_FIN1" placeholder="Any fin1" value='<?php echo $any_fin1; ?>'>
        </div>
    </div>   
    <div class="form-group">
        <label class="control-label col-xs-3">Any inicio2:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="ANY_INICIO2" name="ANY_INICIO2" placeholder="Any inicio2" value='<?php echo $any_inicio2; ?>'>
        </div>
    </div>  
    <div class="form-group">
        <label class="control-label col-xs-3">Any fin2:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="ANY_FIN2" name="ANY_FIN2" placeholder="Any fin2" value='<?php echo $any_fin2; ?>'>
        </div>
    </div>  
    <div class="form-group">
        <label class="control-label col-xs-3">Inginier:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" id="INGINIER" name="INGINIER" placeholder="Inginier" value='<?php echo $ingeniero; ?>'>
        </div>
    </div>   
    <div class="form-group">
        <div class="col-xs-12">
        	<button type="button" class="btn btn-success" onclick="document.getElementById('OPERACION').value='MODIF';document.marca.action='edicion_marca.php';document.marca.submit();">Guardar Cambios</button>
            <button type="submit" class="btn btn-primary" onclick="document.getElementById('OPERACION').value='';document.marca.action='edicion_marca_fotos.php';document.marca.submit();">Listado Fotos <span class="badge"><?php echo $num_fotos; ?></span></button>
        </div>
    </div>                                                  
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