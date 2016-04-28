<?php 
header("Content-Type: text/html;charset=utf-8");
require("autoCarga.php");
require("header.php");

$generales = new Generales();
$global_param = new Global_Param();

$page = $_GET['page'];
$modelo = $_GET['MODELO'];

$where = "1=1";
if (!empty($modelo))
{
	$where = " model='$modelo'";
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
                <h1 class="page-header">Búsqueda por Modelos
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-fw fa fa-home"></i> Home</a>
                    </li>
                    <li class="active"><a href="busqueda_modelo.php"><i class="fa fa-fw fa fa-tags"></i> Búsqueda por Modelos</a></li>
                    <?php 
                    	if (!empty($letra)){
							echo '<li class="active">Filtro por letra '.$letra.'</li>';
					}
					?>
                    <?php 
                    	if (!empty($modelo)){
							echo '<li class="active">Filtro por Modelo : '.$generales->getDescripcionModelo($modelo).'</li>';
					}
					?>					
                    <li class="active"><i class="fa fa-fw fa fa-motorcycle"></i> <?php echo number_format($totalPaginacion,0,',','.'); ?> Marcas</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
 
  <div class="row"> 
    <div class="col-lg-12">  
    	<form class="navbar-form navbar-left" name="tabla" ID="tabla" action="busqueda_modelo.php" method="GET">  
        <select name="MODELO" class="form-control" onchange="this.form.submit()">
        <?php 
        		$tabla = new Tabla();
        		$rs1 = $tabla->getModelosWEB();
        		echo $rs1->num_rows;
            	$fila = 1;
            	if ($rs1->num_rows > 0)
            	{
            		if (empty($modelo) or $modelo=='')
            		{
            			echo '<option selected value="">Seleccione Modelo</option>';
            		}
            		else
            		{
            			echo '<option value="">Seleccione Modelo</option>';
            		}
            		while ($rowModelo = $rs1->fetch_assoc()) 
            		{

            				if ($modelo == $rowModelo["ID"])
            				{
            					echo '<option selected value="'.$rowModelo["ID"].'">'.$rowModelo["DESCRIPCION"].'</option>';
            				}
            				else
            				{
            					echo '<option value="'.$rowModelo["ID"].'">'.$rowModelo["DESCRIPCION"].'</option>';
            				}
            		}
            	}
        ?>
 </select>
 </form>
 </div>
</div>
        
<div class="table-responsive">
		<table class="table table-hover">
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
			$modelo_descripcion = $row['MODEL'];
			$idmodelo = $row['IDMODEL'];
			$pais_descripcion  = $row['PAIS'];
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
		<tr role="button" onclick="window.document.location='portfolio-item.php?idmoto=<?php echo $idmoto; ?>'">
		    <td><?php echo $idmoto; ?></td>
		    <td><?php echo $marca; ?></td>
		    <td><?php echo $modelo_descripcion; ?></td>
		    <td><?php echo $pais_descripcion; ?></td>
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
			$url = "busqueda_modelo.php?";
			if (!empty($modelo)) $url = $url.'MODELO='.$idmodelo.'&';
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
        