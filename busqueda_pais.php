<?php
header("Content-Type: text/html;charset=utf-8");
require("autoCarga.php");
require("header.php");

$generales = new Generales();
$global_param = new Global_Param();

$page = $_GET['page'];
$pais = $_GET['PAIS'];

$where = "1=1";
if (!empty($pais))
{
	$where = " pais='$pais'";
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
                <h1 class="page-header">Búsqueda por Países
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-fw fa fa-home"></i> Home</a>
                    </li>
                    <li class="active"><a href="busqueda_pais.php"><i class="fa fa-fw fa fa-search"></i> Búsqueda por Países</a></li>
                    <?php 
                    	if (!empty($letra)){
							echo '<li class="active">Filtro por letra '.$letra.'</li>';
					}
					?>
                    <?php 
                    	if (!empty($pais)){
							echo '<li class="active">Filtro por País : '.$generales->getDescripcionPais($pais).'</li>';
					}
					?>					
                    <li class="active"><i class="fa fa-fw fa fa-motorcycle"></i> <?php echo number_format($totalPaginacion,0,',','.'); ?> Marcas</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
 
  <div class="row"> 
    <div class="col-lg-12">  
    	<form class="navbar-form navbar-left" name="tabla" ID="tabla" action="busqueda_pais.php" method="GET">  
        <select name="PAIS" class="form-control" onchange="this.form.submit()">
        <?php 
        		$tabla = new Tabla();
        		$rs1 = $tabla->getPaisesWEB();
            	$fila = 1;
            	if ($rs1->num_rows > 0)
            	{
            		while ($rowPais = $rs1->fetch_assoc()) 
            		{
            			if ($fila == 1)
            			{
            				if (!empty($pais) or $pais=='')
            				{
            					echo '<option selected value="">Seleccione País</option>';
            				}
            				else
            				{
            					echo '<option value="">Seleccione País</option>';
            				}
            				$fila = 0;
            			}
            			else
            			{
            				if ($pais == $rowPais["ID"])
            				{
            					echo '<option selected value="'.$rowPais["ID"].'">'.$rowPais["DESCRIPCION"].'</option>';
            				}
            				else
            				{
            					echo '<option value="'.$rowPais["ID"].'">'.$rowPais["DESCRIPCION"].'</option>';
            				}
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
			$modelo = $row['MODEL'];
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
		    <td><?php echo $modelo; ?></td>
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
			$url = "busqueda_pais.php?";
			if (!empty($pais)) $url = $url.'PAIS='.$pais.'&';
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
        