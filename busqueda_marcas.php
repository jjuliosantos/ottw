<?php
header("Content-Type: text/html;charset=utf-8"); 

require("autoCarga.php");
require("header.php");

$generales = new Generales();
session_start();
if ($_POST['SESSION'] == 'RESET')
{
	$_SESSION['busqueda']='';
}
$page = $_GET['page'];
$letra = $_GET['letra'];
if (!empty($_POST['busqueda']))
{
	$busqueda = $_POST['busqueda'];
	$_SESSION['busqueda'] = $busqueda;
}
else 
{
	$busqueda = $_SESSION['busqueda'];
}
if (!empty($letra)){
	$where = "marca LIKE '$letra%'";
	if (!empty($busqueda)){
		$where = $where." AND (marca SOUNDS LIKE '$busqueda' OR fn_remove_accents(marca) LIKE concat('%',fn_remove_accents('$busqueda'),'%'))";
	}
}
else {
	$where = "1";
	if (!empty($busqueda)){
		$where = " (marca SOUNDS LIKE '$busqueda' OR fn_remove_accents(marca) LIKE concat('%',fn_remove_accents('$busqueda'),'%'))";
	}	
}
$cantidad = 20;
$paginacion = new Paginacion($cantidad, $page);
$from = $paginacion->getFrom();

$marca = new Marca();
$rs = $marca->getMarca($where);
$totalPaginacion = $rs->num_rows;

$limit = "LIMIT $from, $cantidad";
$rs = $marca->getMarca($where, $limit);

$motoDetalle = new MotoDetalle();

?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Búsqueda por Marcas
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-fw fa fa-home"></i> Home</a>
                    </li>
                    <li class="active"><a href="#" onclick="document.getElementById('busqueda').value='';document.getElementById('SESSION').value='RESET';document.filtro.action='busqueda_marcas.php';document.filtro.submit();"><i class="fa fa-fw fa fa-search"></i> Búsqueda por Marcas</a></li>
                    <?php 
                    	if (!empty($letra)){
							echo '<li class="active">Filtro por letra '.$letra.'</li>';
					}
					?>
                    <?php 
                    	if (!empty($busqueda)){
							echo '<li class="active">Filtro por texto : '.$busqueda.'</li>';
					}
					?>					
                    <li class="active"><i class="fa fa-fw fa fa-motorcycle"></i> <?php echo number_format($totalPaginacion,0,',','.'); ?> Marcas</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-4">
					<form class="form-inline" id="filtro" name="filtro" role="search" action="busqueda_marcas.php" method="post">
						<div class="form-group">
							<input type="search" name="busqueda" id="busqueda" class="form-control" placeholder="Introduzca Marca" value='<?php echo $busqueda; ?>'>
							<input type="hidden" ID="SESSION" name="SESSION" value=''>
							<button type="submit" class="btn btn-default">Buscar</button>
						</div>
					  </form>
			</div>
            <div class="col-lg-8">		
				<ul class="list-inline  center-block">
				   <li><a href="?letra=A">A</a></li>
				   <li><a href="?letra=B">B</a></li>
				   <li><a href="?letra=C">C</a></li>
				   <li><a href="?letra=D">D</a></li>
				   <li><a href="?letra=E">E</a></li>
				   <li><a href="?letra=F">F</a></li>
				   <li><a href="?letra=G">G</a></li>
				   <li><a href="?letra=H">H</a></li>
				   <li><a href="?letra=I">I</a></li>
				   <li><a href="?letra=J">J</a></li>
				   <li><a href="?letra=K">K</a></li>
				   <li><a href="?letra=L">L</a></li>
				   <li><a href="?letra=M">M</a></li>
				   <li><a href="?letra=N">N</a></li>
				   <li><a href="?letra=O">O</a></li>
				   <li><a href="?letra=P">P</a></li>
				   <li><a href="?letra=Q">Q</a></li>
				   <li><a href="?letra=R">R</a></li>
				   <li><a href="?letra=S">S</a></li>
				   <li><a href="?letra=T">T</a></li>
				   <li><a href="?letra=U">U</a></li>
				   <li><a href="?letra=V">V</a></li>
				   <li><a href="?letra=W">W</a></li>
				   <li><a href="?letra=X">X</a></li>
				   <li><a href="?letra=Y">Y</a></li>
				   <li><a href="?letra=Z">Z</a></li>
				   <li> 

					</li>
				</ul>

            </div>
        </div>
        <!-- /.row -->

        <hr>
		
<div class="table-responsive">
		<table class="table table-hover ">
  <thead>
        <tr>
            <th>#</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>País</th>
            <th>Localización</th>
            <th>Año</th>			
        </tr>
    </thead>
    <tbody data-link="row" class="rowlink">
    
		<?php
		while ($row = $rs->fetch_assoc()) {
			$idmoto = $row['id_moto'];
			$marca  = $row['MARCA'];
			$modelo = $row['MODEL'];
			$pais   = $row['PAIS'];
			$ciudad = $row["CIUTAT"];
			$ciudad1 = $row["CIUTAT1"];
			$rs1 = $motoDetalle->getMotoDetalleIdCiudad($ciudad);
			$row1 = $rs1->fetch_assoc();
			$des_ciudad = $row1["DESCRIPCION"];
			$rs1 = $motoDetalle->getMotoDetalleIdEscudos($ciudad1);
			$row1 = $rs1->fetch_assoc();
			$des_ciudad1 = $row1["DESCRIPCION"];
			$localizacion = $des_ciudad." - ".$des_ciudad1;
			$anyo	= $row['ANY'];
		?>
		<tr role="button" onclick="window.document.location='portfolio-item.php?idmoto=<?php echo $idmoto; ?>';">
		    <td><?php echo $idmoto; ?></td>
		    <td><?php echo $marca; ?></td>
		    <td><?php echo $modelo; ?></td>
		    <td><?php echo $pais; ?></td>
		    <td><?php echo $localizacion; ?></td>
		    <td><?php echo $anyo; ?></td>
		</tr>
		<?php
		}
		?>		    
    
    </tbody>
</table>		
</div>
		
		<hr>
		<?php
			$url = "busqueda_marcas.php?";
			if (!empty($letra)) $url = $url.'letra='.$letra.'&';
			$paginacion->generaPaginacion($totalPaginacion,$url);
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

</body>

</html>
