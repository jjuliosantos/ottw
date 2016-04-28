<?php
header("Content-Type: text/html;charset=utf-8");

require("autoCarga.php");
require("header.php");

$generales = new Generales();
$global_param = new Global_Param();
$rs = $global_param->getHomeCarousel();
$num_imagenes = $rs->num_rows;

?>
    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
       
        <?php
           	$rs = $global_param->getHomeCarousel();
           	$totalFilas = $rs->num_rows;           	
            if ($totalFilas > 0){
        		echo '<div class="row row-eq-height"><div class="col-md-12"><div id="carousel-example-generic" class="carousel slide container" data-ride="carousel">';
        		echo '<ol class="carousel-indicators">';
        		for ($fila=1; $fila <= $totalFilas; $fila ++)
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
            	$TotalCarrusel = 10;
            	$numbers = range(1, $totalFilas);
            	shuffle($numbers);
            	echo '<div class="carousel-inner">';
		
            	for ($fila = 1; $fila <= $TotalCarrusel and $fila <= $totalFilas; $fila ++){
            			$rs->data_seek($numbers[$fila - 1] - 1);
            			$rowImagen = $rs->fetch_assoc();
            			if ($fila == 1){
            				echo '<div class="item active"><div style="background: url(\''.$rowImagen["FICHERO"].'\') center center; background-size:contain;" class="slider-size">';
            				echo '<div class="carousel-caption"><h1>'.$rowImagen["DESCRIPCION"].'</h1>';
							echo '</div></div></div>';
            			}
            			else {
            				echo '<div class="item"><div style="background: url(\''.$rowImagen["FICHERO"].'\') center center; background-size:contain;" class="slider-size">';
            				echo '<div class="carousel-caption"><h1>'.$rowImagen["DESCRIPCION"].'</h1>';
							echo '</div></div></div>';
            			}
            		}
            		echo '</div>';            			
            	
            	echo '<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>';
            	echo '<a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a></div></div></div>';
            }
            ?>        
        
        
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    OTTW - One Two Three Wheels
                </h1>
            </div>
            <?php 
            	$rs = $global_param->getHomeDescripciones(1);
            	if ($rs->num_rows > 0){
            		while ($rowHome = $rs->fetch_assoc()) { 
            			echo '<div class="col-md-6"><div class="panel panel-default"><div class="panel-heading"><h4><i class="fa fa-fw fa-check"></i>';
            			echo $rowHome["TITULO"].'</h4></div><div class="panel-body"><p class="pre-scrollable text-justify">'.$rowHome["DESCRIPCION"].'</p></div></div></div>';
            		}  
            	}
            	$rs = $global_param->getHomeDescripciones(2);
            	if ($rs->num_rows > 0){
            		while ($rowHome = $rs->fetch_assoc()) {
            			echo '<div class="col-md-6"><div class="panel panel-default"><div class="panel-heading"><h4><i class="fa fa-fw fa-check"></i>';
            			echo $rowHome["TITULO"].'</h4></div><div class="panel-body"><p class="pre-scrollable text-justify">'.$rowHome["DESCRIPCION"].'</p></div></div></div>';
            		}
            	}            	         
            ?>
        </div>                	
        <!-- /.row -->

        <!-- Service Panels -->
        <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
		<section class="success" id="servicios">
		  <div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="page-header">Buscadores</h2>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<span class="fa-stack fa-5x">
								  <i class="fa fa-circle fa-stack-2x text-primary"></i>
								  <i class="fa fa-motorcycle fa-stack-1x fa-inverse"><span class="badge"><?php echo number_format($generales->getNumMarcas(),0,',','.');?></span></i>
							</span>
						</div>
						<div class="panel-body">
							<h4>Marcas</h4>
							<p>Búsquedas por marcas</p>
							<a href="busqueda_marcas.php" class="btn btn-primary">Acceder</a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<span class="fa-stack fa-5x">
								  <i class="fa fa-circle fa-stack-2x text-primary"></i>
								  <i class="fa fa-map-o fa-stack-1x fa-inverse"><span class="badge"><?php echo $generales->getNumPaisesWEB();?></span></i>
							</span>
						</div>
						<div class="panel-body">
							<h4>País</h4>  
							<p>Búsquedas por país</p>
							<a href="busqueda_pais.php" class="btn btn-primary">Acceder</a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<span class="fa-stack fa-5x">
								  <i class="fa fa-circle fa-stack-2x text-primary"></i>
								  <i class="fa fa-tags fa-stack-1x fa-inverse"><span class="badge"><?php echo $generales->getNumModelosWEB();?></span></i>
							</span>
						</div>
						<div class="panel-body">
							<h4>Modelos</h4>
							<p>Búsquedas por modelos</p>
							<a href="busqueda_modelo.php" class="btn btn-primary">Acceder</a>
						</div>
					</div>
				</div>
				
			</div>	
		  </div>
		</section>
        <!-- Footer -->
<?php
require("footer.php");
?>

		<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
		<div class="scroll-top page-scroll visible-xs visible-sm">
			<a class="btn btn-primary" href="#page-top">
				<i class="fa fa-chevron-up"></i>
			</a>
		</div>		
		
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
