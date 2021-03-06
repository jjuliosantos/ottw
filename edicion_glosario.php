<?php      
header("Content-Type: text/html;charset=utf-8"); 
require("seguridad.php");
require("autoCarga.php");
require("header_edicion.php");

$generales = new Generales();

$page = $_GET['page'];
$cantidad = 20;
$paginacion = new Paginacion($cantidad, $page);
$from = $paginacion->getFrom();

$tabla = new Tabla();
$rs = $tabla->getGlosario();
$totalPaginacion = $rs->num_rows;

$limit = "LIMIT $from, $cantidad";
$rs = $tabla->getGlosario($limit);

?>

    <!-- Page Content -->
    <div class="container">
    

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
			     <div class="page-header">
			        <h1>Mantenimiento OTTW</h1>
			        <ol class="breadcrumb">
			         <li><a href="edicion.php"><i class="fa fa-fw fa fa-sliders"></i> Home</a></li>
				     <li class="active"><i class="fa fa-fw fa fa-book"></i><?php echo ' '.number_format($totalPaginacion,0,',','.'); ?> Términos</li>
			        </ol>
			      </div>
            </div>
        </div>
        <!-- /.row -->
        <form class="form-horizontal" name="tabla" method="POST" action="edicion_glosario_editar.php">
        <div class="row">
		    <div class="form-group" >
		        <div class="col-xs-12">
		        	<input type="hidden" name="OPERACION" id="OPERACION">
		        	<input type="hidden" name="ID" id="ID">
		        	<button type="button" class="btn btn-primary" onclick="document.getElementById('OPERACION').value='PRE-ALTA';document.getElementById('ID').value='';document.tabla.submit();"><i class="fa fa-fw fa-plus"></i> Añadir Registro</button>
	        	</div>
	    	</div>
	    	</div> 
	    </form>
		<?php
     		$url = "edicion_glosario.php?";
			$paginacion->generaPaginacion($totalPaginacion,$url);
		?>
        
<div class="table-responsive">
		<table class="table table-hover">
  <thead>
        <tr>
            <th>ID</th>
            <th>Término</th>
            <th>Descripción</th>
            <th>Fichero</th>
        </tr>
    </thead>
    <tbody data-link="row" class="rowlink">
    
		<?php
		while ($row = $rs->fetch_assoc()) {
			$id = $row['ID'];
			$termino = $row['TERMINO'];
			$descripcion  = $row['DESCRIPCION'];
			$fichero = $row['FICHERO'];
		?>
		<tr role="button" onclick="document.getElementById('OPERACION').value='PRE-MODIF';document.getElementById('ID').value='<?php echo $id; ?>';document.tabla.submit();">
		    <td><?php echo $id; ?></td>
		    <td><?php echo $termino; ?></td>
		    <td><?php echo $descripcion; ?></td>
		    <td><?php 
					if (!empty($fichero))
                     echo ' <img class="img-thumbnail" width="55" height="33" src="img/glosario/'.$fichero.'" >';
					echo $fichero;
		    ?>
		    </td>
		</tr>
		<?php
		}
		?>		    
    
    </tbody>
</table>		
</div>
		
		<hr>
		<?php
     		$url = "edicion_glosario.php?";
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
