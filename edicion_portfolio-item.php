<?php
header("Content-Type: text/html;charset=utf-8"); 
require("seguridad.php"); 
require("autoCarga.php");
require("header_edicion.php");

$generales = new Generales();
$idmoto = $generales->verificaVariable($_GET['idmoto']);

 $motoDetalle = new MotoDetalle();
 $where = "marcas.id_moto = $idmoto";

 $rs = $motoDetalle->getMotoDetalleNOWEB($where);
 $row = $rs->fetch_assoc();
 
 $marca = $row["MARCA"];
 $rs = $motoDetalle->getMotoDetalleLogotipoPrincipal($idmoto);
 $row1 = $rs->fetch_assoc();
 $img_logo = $row1["FICHERO"];
 $marca1 = $row["MARCA1"];
 $marca2 = $row["MARCA2"];
 $marca3 = $row["MARCA3"];
 $marca4 = $row["MARCA4"];
 $marca5 = $row["MARCA5"];
 $notes = $row["NOTES"];
 $modelo = $row["MODEL"];
 $rs = $motoDetalle->getMotoDetalleIdModelo($modelo);
 $row1 = $rs->fetch_assoc();
 $des_modelo = $row1["DESCRIPCION"];
 $pais = $row["PAIS"];
 $rs = $motoDetalle->getMotoDetalleIdPais($pais);
 $row1 = $rs->fetch_assoc();
 $img_pais = $row1["FICHERO"];
 $des_pais = $row1["DESCRIPCION"];
 $pais3 = $row["PAIS3"];
 $rs = $motoDetalle->getMotoDetalleIdPais($pais3);
 $row1 = $rs->fetch_assoc();
 $img_pais3 = $row1["FICHERO"];
 $des_pais3 = $row1["DESCRIPCION"];
 $pais4 = $row["PAIS4"];
 $rs = $motoDetalle->getMotoDetalleIdPais($pais4);
 $row1 = $rs->fetch_assoc();
 $img_pais4 = $row1["FICHERO"];
 $des_pais4 = $row1["DESCRIPCION"];
 $pais5 = $row["PAIS5"];
 $rs = $motoDetalle->getMotoDetalleIdPais($pais5);
 $row1 = $rs->fetch_assoc();
 $img_pais5 = $row1["FICHERO"];
 $des_pais5 = $row1["DESCRIPCION"];
 $anyo = $row["ANY"];
 $ciudad = $row["CIUTAT"];
 $ciudad1 = $row["CIUTAT1"];
 $rs = $motoDetalle->getMotoDetalleIdCiudad($ciudad);
 $row1 = $rs->fetch_assoc();
 $img_ciudad = $row1["FICHERO"];
 $des_ciudad = $row1["DESCRIPCION"];
 $rs = $motoDetalle->getMotoDetalleIdEscudos($ciudad1);
 $row1 = $rs->fetch_assoc();
 $img_ciudad1 = $row1["FICHERO"];
 $des_ciudad1 = $row1["DESCRIPCION"];
 $localizacion = $des_ciudad." - ".$des_ciudad1;
 $fundador = $row["FUNDADOR"];
 $fabrica = $row["FABRICANT"];
 $any_inicio1 = $row["ANY_INICIO1"];
 $any_fin1 = $row["ANY_FIN1"];
 $any_inicio2 = $row["ANY_INICIO2"];
 $any_fin2 = $row["ANY_FIN2"];
 $fabrica1 = $row["FABRICANT2"];
 $ingeniero = $row["INGINIER"];

?>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
            	<div class="page-header">Previsualización<?php echo ' ('.$idmoto.')'; ?>
                <h1 >               
                    <small><?php 
                    			if (!empty($img_logo)) echo '<img class="img-thumbnail" src="img/logos/'.$img_logo.'" title="'.$marca.'" alt="'.$marca.'"> ';
                    			echo $marca;
                    			if (!empty($marca1)) echo ' - '.$marca1;
                    			if (!empty($marca2)) echo ' - '.$marca2;
                    			if (!empty($marca3)) echo ' - '.$marca3;
                    			if (!empty($marca4)) echo ' - '.$marca4;
                    			if (!empty($marca5)) echo ' - '.$marca5;
                    			if (!empty($pais) and !empty($img_pais))
                    				echo ' <img class="img-thumbnail" width="55" height="33" src="img/banderas/'.$img_pais.'" title="'.$des_pais.'" alt="'.$des_pais.'">';
                    			if (!empty($pais3) and !empty($img_pais3))
                    				echo ' <img class="img-thumbnail" width="55" height="33" src="img/banderas/'.$img_pais3.'" title="'.$des_pais3.'" alt="'.$des_pais3.'">';
                    			if (!empty($pais4) and !empty($img_pais4))
                    				echo ' <img class="img-thumbnail" width="55" height="33" src="img/banderas/'.$img_pais4.'" title="'.$des_pais4.'" alt="'.$des_pais4.'">';
                    			if (!empty($pais5) and !empty($img_pais5))
                    				echo ' <img class="img-thumbnail" width="55" height="33" src="img/banderas/'.$img_pais5.'" title="'.$des_pais5.'" alt="'.$des_pais5.'">';
                    			if (!empty($ciudad1) and !empty($img_ciudad1))
                    				echo ' <img class="img-thumbnail" width="55" height="33" src="img/escudos/'.$img_ciudad1.'" title="'.$des_ciudad1.'" alt="'.$des_ciudad1.'">';
                    			if (!empty($ciudad) and !empty($img_ciudad))
                    				echo ' <img class="img-thumbnail" width="55" height="33" src="img/ciudades/'.$img_ciudad.'" title="'.$des_ciudad.'" alt="'.$des_ciudad.'">';
                    		?></small>
                </h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="edicion.php"><i class="fa fa-fw fa fa-sliders"></i> Home</a></li>
                    <li class="active"><a href="edicion_marcas.php"><i class="fa fa-fw fa-motorcycle"></i> Marcas</a></li>
                    <li class="active"><a href="edicion_busqueda_marcas.php"><i class="fa fa-fw fa-binoculars"></i> Consultas</a></li>
                    <li class="active"><i class="fa fa-fw fa fa-file-text"></i> Previsualización - <?php echo $idmoto.' - '.$marca; ?></li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
           	$rs = $motoDetalle->getMotoDetalleImagenAleatoria($idmoto);
            $totalFilas = $rs->num_rows;
            if ($totalFilas > 0){
        		echo '<div class="row row-eq-height"><div class="col-md-12"><div id="carousel-example-generic" class="carousel slide container" data-ride="carousel">';
        		echo '<ol class="carousel-indicators">';
        		$TotalCarrusel = 3;
        		for ($fila = 1; $fila <= $totalFilas and $fila <= $TotalCarrusel; $fila ++)
        		{
        			if ($fila == 1)
        			{
        				echo '<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';
        			}
        			else 
        			{
        				echo '<li data-target="#carousel-example-generic" data-slide-to="'.$fila.'"></li>';
        			}
        		}
        		echo '</ol>';
	       		$fila = 0;
            	$numbers = range(1, $totalFilas);
            	shuffle($numbers);
            	echo '<div class="carousel-inner">';
		
            	for ($fila = 1; $fila <= $TotalCarrusel and $fila <= $totalFilas; $fila ++){
            			$rs->data_seek($numbers[$fila - 1] - 1);
            			$rowImagen = $rs->fetch_assoc();
            			if ($fila == 1){
            				echo '<div class="item active"><div style="background: url(\''.$rowImagen["RUTA"].'\') center center; background-size:contain;" class="slider-size">';
            				echo '<div class="carousel-caption"><h2>'.$marca.'</h2><p>'.$rowImagen["RUTA"].'</p>';
							echo '</div></div></div>';
            			}
            			else {
            				echo '<div class="item"><div style="background: url(\''.$rowImagen["RUTA"].'\') center center; background-size:contain;" class="slider-size">';
            				echo '<div class="carousel-caption"><h2>'.$marca.'</h2><p>'.$rowImagen["RUTA"].'</p>';
							echo '</div></div></div>';
            			}
            		}
            		echo '</div>';            			
            	
            	if ($totalFilas > 1)
            	{
            		echo '<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>';
            		echo '<a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>';
            	}
            	echo '</div></div></div>';
            }
            ?>

		<div class="row"> 
		
            <div class="col-md-12">
                <h3>Marca descripción</h3>
                <p class="text-justify"><?php echo $notes; ?></p>
                <h3>Detalles</h3>
				

				
				<dl class="dl-horizontal">
					<dt>Modelo:</dt>
					<dd><?php echo $des_modelo; ?></dd>
					<dt>País:</dt>
					<dd><?php echo $des_pais; ?></dd>
					<dt>Año fundaciÓn:</dt>
					<dd><?php echo $anyo; ?></dd>
					<dt>Localización:</dt>
					<dd>
						<?php 
							echo $localizacion."</dd>";
							if (!empty($fundador)){
								echo "<dt>Fundador:</dt><dd>";
								echo $fundador;
								echo "</dd>";
							}
							echo "<dt>Fábrica:</dt><dd>";
						echo $fabrica." (".$any_inicio1;
						if (!empty($any_fin1)){
								echo " - ".$any_fin1;
							}
						echo ")</dd>";
						if(!empty($fabrica1)){
							echo "<dt>Fábrica continuación:</dt><dd>";
							echo $fabrica1." (".$any_inicio2;
							if (!empty($any_fin2)){
								echo " - ".$any_fin2;
							}
							echo ")</dd>";
						} 
						if (!empty($ingeniero)){
							echo "<dt>Ingeniero/Dise�ador:</dt><dd>";
							echo $ingeniero;
							echo "</dd>";
						}
					?>
            </div>

        </div>
        <!-- /.row -->
		
        <!-- Related Projects Row -->
        <div class="row">
		
             <?php
            	$rs = $motoDetalle->getMotoDetalleMotocicletas($idmoto);
            	if ($rs->num_rows > 0){
            		$fila = 1;
            		while ($rowMotocicleta = $rs->fetch_assoc()) {
            			if($fila==1){
            				echo '<div class="row"><div class="col-lg-12"><h3 class="page-header">Motocicleta</h3></div>';
            			}
            			elseif (($fila - 1) % 4 == 0){
            				echo '</div><div class="row">';
            			}
            			echo '<div class="col-sm-3 col-xs-6">';
            			echo '<a href="img/mfotos/'.$rowMotocicleta["FICHERO"].'" data-toggle="lightbox" data-gallery="Motocicleta" data-title="Motocicleta">';
            			echo '<img class="thumbnail img-responsive img-hover img-related center-block" src="img/mfotos/'.$rowMotocicleta["FICHERO"].'" alt="'.$rowMotocicleta["DESCRIPCION"].'" id="imageresource">';
            			echo '</a></div>';
            			$fila = $fila + 1;
            		}
            		echo '</div>';            		
            	}

            ?>        
        
      
             <?php
            	$rs = $motoDetalle->getMotoDetalleAutoCicloVelomotor($idmoto);
            	if ($rs->num_rows > 0){
            		$fila = 1;
            		while ($rowAutoCicloVelomotor = $rs->fetch_assoc()) {
            			if($fila==1){
            				echo '<div class="row"><div class="col-lg-12"><h3 class="page-header">AutoCiclo / Ciclomotor / Velomotor</h3></div>';
            			}
            			elseif (($fila - 1) % 4 == 0){
            				echo '</div><div class="row">';
            			}
            			echo '<div class="col-sm-3 col-xs-6">';
            			echo '<a href="img/auto-ciclo-velomotor/'.$rowAutoCicloVelomotor["FICHERO"].'" data-toggle="lightbox" data-gallery="AutoCiclo / Ciclomotor / Velomotor" data-title="AutoCiclo / Ciclomotor / Velomotor">';
            			echo '<img class="thumbnail img-responsive img-hover img-related center-block" src="img/auto-ciclo-velomotor/'.$rowAutoCicloVelomotor["FICHERO"].'" alt="'.$rowAutoCicloVelomotor["DESCRIPCION"].'" id="imageresource">';
            			echo '</a></div>';
            			$fila = $fila + 1;
            		}
            		echo '</div>';            		
            	}

            ?>               
        
             <?php
            	$rs = $motoDetalle->getMotoDetalleRacing($idmoto);
            	if ($rs->num_rows > 0){
            		$fila = 1;
            		while ($rowRacing = $rs->fetch_assoc()) {
            			if($fila==1){
            				echo '<div class="row"><div class="col-lg-12"><h3 class="page-header">Racing</h3></div>';
            			}
            			elseif (($fila - 1) % 4 == 0){
            				echo '</div><div class="row">';
            			}
            			echo '<div class="col-sm-3 col-xs-6">';
            			echo '<a href="img/racing/'.$rowRacing["FICHERO"].'" data-toggle="lightbox" data-gallery="Racing" data-title="Racing">';
            			echo '<img class="thumbnail img-responsive img-hover img-related center-block" src="img/racing/'.$rowRacing["FICHERO"].'" alt="'.$rowRacing["DESCRIPCION"].'" id="imageresource">';
            			echo '</a></div>';
            			$fila = $fila + 1;
            		}
            		echo '</div>';            		
            	}

            ?>        
        
            <?php
            	$rs = $motoDetalle->getMotoDetalleEscuter($idmoto);
            	if ($rs->num_rows > 0){
            		$fila = 1;
            		while ($rowEscuter = $rs->fetch_assoc()) {
            			if($fila==1){
            				echo '<div class="row"><div class="col-lg-12"><h3 class="page-header">Esc�ter</h3></div>';
            			}
            			elseif (($fila - 1) % 4 == 0){
            				echo '</div><div class="row">';
            			}
            			echo '<div class="col-sm-3 col-xs-6">';
            			echo '<div class="media"><div class="media-middle">';
            			echo '<a href="img/escuter/'.$rowEscuter["FICHERO"].'" data-toggle="lightbox" data-gallery="Esc�ter" data-title="Esc�ter">';
            			echo '<img class="media-object thumbnail img-responsive img-hover img-related center-block" src="img/escuter/'.$rowEscuter["FICHERO"].'" alt="'.$rowEscuter["DESCRIPCION"].'" id="imageresource">';
            			echo '</a></div></div></div>';
            			$fila = $fila + 1;
            		}
            		echo '</div>';            		
            	}

            ?>          
        
             <?php
            	$rs = $motoDetalle->getMotoDetalleTT($idmoto);
            	if ($rs->num_rows > 0){
            		$fila = 1;
            		while ($rowTT = $rs->fetch_assoc()) {
            			if($fila==1){
            				echo '<div class="row"><div class="col-lg-12"><h3 class="page-header">TT</h3></div>';
            			}
            			elseif (($fila - 1) % 4 == 0){
            				echo '</div><div class="row">';
            			}
            			echo '<div class="col-sm-3 col-xs-6">';
            			echo '<a href="img/tt/'.$rowTT["FICHERO"].'" data-toggle="lightbox" data-gallery="TT" data-title="TT">';
            			echo '<img class="thumbnail img-responsive img-hover img-related center-block" src="img/tt/'.$rowTT["FICHERO"].'" alt="'.$rowTT["DESCRIPCION"].'" id="imageresource">';
            			echo '</a></div>';
            			$fila = $fila + 1;
            		}
            		echo '</div>';            		
            	}

            ?>          
        
            <?php
            	$rs = $motoDetalle->getMotoDetalleMotores($idmoto);
            	if ($rs->num_rows > 0){
            		$fila = 1;
            		while ($rowMotor = $rs->fetch_assoc()) {
            			if($fila==1){
            				echo '<div class="row"><div class="col-lg-12"><h3 class="page-header">Motor</h3></div>';
            			}
            			elseif (($fila - 1) % 4 == 0){
            				echo '</div><div class="row">';
            			}
            			echo '<div class="col-sm-3 col-xs-6">';
            			echo '<a href="img/motor/'.$rowMotor["FICHERO"].'" data-toggle="lightbox" data-gallery="Motor" data-title="Motor">';
            			echo '<img class="thumbnail img-responsive img-hover img-related center-block" src="img/motor/'.$rowMotor["FICHERO"].'" alt="'.$rowMotor["DESCRIPCION"].'" id="imageresource">';
            			echo '</a></div>';
            			$fila = $fila + 1;
            		}
            		echo '</div>';            		
            	}

            ?>         
        
            <?php
            	$rs = $motoDetalle->getMotoDetalleSides($idmoto);
            	if ($rs->num_rows > 0){
            		$fila = 1;
            		while ($rowSide = $rs->fetch_assoc()) {
            			if($fila==1){
            				echo '<div class="row"><div class="col-lg-12"><h3 class="page-header">Side</h3></div>';
            			}
            			elseif (($fila - 1) % 4 == 0){
            				echo '</div><div class="row">';
            			}
            			echo '<div class="col-sm-3 col-xs-6">';
            			echo '<a href="img/sides/'.$rowSide["FICHERO"].'" data-toggle="lightbox" data-gallery="Side" data-title="Side">';
            			echo '<img class="thumbnail img-responsive img-hover img-related center-block" src="img/sides/'.$rowSide["FICHERO"].'" alt="'.$rowSide["DESCRIPCION"].'" id="imageresource">';
            			echo '</a></div>';
            			$fila = $fila + 1;
            		}
            		echo '</div>';            		
            	}

            ?>          
        
             <?php
            	$rs = $motoDetalle->getMotoDetalle3ruedas($idmoto);
            	if ($rs->num_rows > 0){
            		$fila = 1;
            		while ($row3ruedas = $rs->fetch_assoc()) {
            			if($fila==1){
            				echo '<div class="row"><div class="col-lg-12"><h3 class="page-header">MotoCarro / Tricar / Triciclo / Trike</h3></div>';
            			}
            			elseif (($fila - 1) % 4 == 0){
            				echo '</div><div class="row">';
            			}
            			echo '<div class="col-sm-3 col-xs-6">';
            			echo '<a href="img/3ruedas/'.$row3ruedas["FICHERO"].'" data-toggle="lightbox" data-gallery="MotoCarro / Tricar / Triciclo / Trike" data-title="MotoCarro / Tricar / Triciclo / Trike">';
            			echo '<img class="thumbnail img-responsive img-hover img-related center-block" src="img/3ruedas/'.$row3ruedas["FICHERO"].'" alt="'.$row3ruedas["DESCRIPCION"].'" id="imageresource">';
            			echo '</a></div>';
            			$fila = $fila + 1;
            		}
            		echo '</div>';            		
            	}

            ?>  
        
            <?php
            	$rs = $motoDetalle->getMotoDetalleCarteles($idmoto);
            	if ($rs->num_rows > 0){
            		$fila = 1;
            		while ($rowCartel = $rs->fetch_assoc()) {
            			if($fila==1){
            				echo '<div class="row"><div class="col-lg-12"><h3 class="page-header">Carteles</h3></div>';
            			}
            			elseif (($fila - 1) % 4 == 0){
            				echo '</div><div class="row">';
            			}
            			echo '<div class="col-sm-3 col-xs-6">';
            			echo '<a href="img/carteles/'.$rowCartel["FICHERO"].'" data-toggle="lightbox" data-gallery="Carteles" data-title="Carteles">';
            			echo '<img class="thumbnail img-responsive img-hover img-related center-block" src="img/carteles/'.$rowCartel["FICHERO"].'" alt="" id="imageresource">';
            			echo '</a></div>';
            			$fila = $fila + 1;
            		}
            		echo '</div>';            		
            	}

            ?>         
        
            <?php
            	$rs = $motoDetalle->getMotoDetalleEfemerides($idmoto);
            	if ($rs->num_rows > 0){
            		$fila = 1;
            		while ($rowEfemeride = $rs->fetch_assoc()) {
            			if($fila==1){
            				echo '<div class="row"><div class="col-lg-12"><h3 class="page-header">Efemérides</h3></div>';
            			}
            			elseif (($fila - 1) % 4 == 0){
            				echo '</div><div class="row">';
            			}
            			echo '<div class="col-sm-3 col-xs-6">';
            			echo '<a href="img/efemerides/'.$rowEfemeride["FICHERO"].'" data-toggle="lightbox" data-gallery="Efemerides" data-title="Efemerides">';
            			echo '<img class="img-responsive img-hover img-related" src="img/efemerides/'.$rowEfemeride["FICHERO"].'" alt="'.$rowEfemeride["DESCRIPCION"].'" id="imageresource">';
            			echo '</a></div>';
            			$fila = $fila + 1;
            		}
            		echo '</div>';            		
            	}

            ?>         
        
            <?php
            	$rs = $motoDetalle->getMotoDetalleConcept($idmoto);
            	if ($rs->num_rows > 0){
            		$fila = 1;
            		while ($rowConcept = $rs->fetch_assoc()) {
            			if($fila==1){
            				echo '<div class="row"><div class="col-lg-12"><h3 class="page-header">Concept</h3></div>';
            			}
            			elseif (($fila - 1) % 4 == 0){
            				echo '</div><div class="row">';
            			}
            			echo '<div class="col-sm-3 col-xs-6">';
            			echo '<a href="img/concept/'.$rowConcept["FICHERO"].'" data-toggle="lightbox" data-gallery="Concept" data-title="Concept">';
            			echo '<img class="thumbnail img-responsive img-hover img-related center-block" src="img/concept/'.$rowConcept["FICHERO"].'" alt="'.$rowConcept["DESCRIPCION"].'" id="imageresource">';
            			echo '</a></div>';
            			$fila = $fila + 1;
            		}
            		echo '</div>';            		
            	}

            ?>          
        
            <?php
            	$rs = $motoDetalle->getMotoDetalleRaras($idmoto);
            	if ($rs->num_rows > 0){
            		$fila = 1;
            		while ($rowRara = $rs->fetch_assoc()) {
            			if($fila==1){
            				echo '<div class="row"><div class="col-lg-12"><h3 class="page-header">Rarezas</h3></div>';
            			}
            			elseif (($fila - 1) % 4 == 0){
            				echo '</div><div class="row">';
            			}
            			echo '<div class="col-sm-3 col-xs-6">';
            			echo '<a href="img/raras/'.$rowRara["FICHERO"].'" data-toggle="lightbox" data-gallery="Rarezas" data-title="Rarezas">';
            			echo '<img class="thumbnail img-responsive img-hover img-related center-block" src="img/raras/'.$rowRara["FICHERO"].'" alt="'.$rowRara["DESCRIPCION"].'" id="imageresource">';
            			echo '</a></div>';
            			$fila = $fila + 1;
            		}
            		echo '</div>';            		
            	}

            ?>         
 
            <?php
            	$rs = $motoDetalle->getMotoDetalleLogotipos($idmoto);
            	if ($rs->num_rows > 0){
            		$fila = 1;
            		while ($rowLogo = $rs->fetch_assoc()) {
            			if($fila==1){
            				echo '<div class="row"><div class="col-lg-12"><h3 class="page-header">Logotipos</h3></div>';
            			}
            			elseif (($fila - 1) % 4 == 0){
            				echo '</div><div class="row">';
            			}            			
            			echo '<div class="col-sm-3 col-xs-6">';
            			echo '<a href="img/logos/'.$rowLogo["FICHERO"].'" data-toggle="lightbox" data-gallery="Logotipos" data-title="Logotipos">';
            			echo '<img class="thumbnail img-responsive img-hover img-related" src="img/logos/'.$rowLogo["FICHERO"].'" alt="" id="imageresource">';
            			echo '</a></div>';
            			$fila = $fila + 1;
            		}
            		echo '</div>';            		
            	}

            ?>
		
        <hr>
		
        <!-- Footer -->
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
