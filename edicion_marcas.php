<?php 
header("Content-Type: text/html;charset=utf-8"); 
require("seguridad.php");
require("autoCarga.php");
require("header_edicion.php");
?>

<div class="container"> 
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <h1>Mantenimiento OTTW</h1> 
                    <ol class="breadcrumb">
         				<li><a href="edicion.php"><i class="fa fa-fw fa fa-sliders"></i> Home</a></li>
         				<li class="active"><i class="fa fa-fw fa-motorcycle"></i> Marcas</li>
         			</ol>
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-recycle"></i> Modificación</h4>
                    </div>
                    <div class="panel-body">
                        <p>Actualización de datos y fotos de marcas</p>
                        <br>
                        <form class="form-inline" method="POST" action="edicion_marca.php">
    						<div class="form-group">
        						<label class="sr-only" for="inputEmail">ID</label>
        							<input type="text" class="form-control" placeholder="Introduzca ID de la marca" name="ID_MOTO">
    							</div>
    						<button type="submit" class="btn btn-primary">Editar datos</button>
						</form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-plus"></i> Altas</h4>
                    </div>
                    <div class="panel-body">
                        <p>Alta de nuevas marcas.</p>
                        <br>
                        <a href="edicion_marca_alta.php" class="btn btn-primary">Alta</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-times"></i> Borrado</h4>
                    </div>
                    <div class="panel-body">
                        <p>Borrado de marcas.</p>
                        <br>
                        <form class="form-inline" method="POST" action="edicion_marca_baja.php">
    						<div class="form-group">
        						<label class="sr-only" for="inputEmail">ID</label>
        							<input type="text" class="form-control" placeholder="Introduzca ID de la marca" name="ID_MOTO">
    							</div>
    						<button type="submit" class="btn btn-danger">Eliminar datos</button>
						</form>
                    </div>
                </div>
            </div>            

            </div> 
        <div class="row">                       
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-binoculars"></i> Consultas</h4>
                    </div>
                    <div class="panel-body">
                        <p>Consultas y previsualización de marcas.</p>
                        <br>
                        <a href="edicion_busqueda_marcas.php" class="btn btn-primary">Acceder</a>
                    </div>
                </div>
            </div>
            </div>
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