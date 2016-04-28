<?php
header("Content-Type: text/html;charset=utf-8"); 
require("seguridad.php");
require("autoCarga.php");
require("header_edicion.php");

?>

<div class="container"> 
        <div class="row">
            <div class="col-lg-12">
            	<div class="page-header">
			        <h1>Mantenimiento OTTW</h1> 
                    <ol class="breadcrumb">
         				<li><i class="fa fa-fw fa fa-sliders"></i> Home</li>
         			</ol>                    
                </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-motorcycle"></i> Marcas</h4>
                    </div>
                    <div class="panel-body">
                        <p>Actualización de datos y fotos de marcas</p>
                        <br>
                        <a href="edicion_marcas.php" class="btn btn-primary">Editar Datos</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-home"></i> Página principal</h4>
                    </div>
                    <div class="panel-body">
                        <p>Acualización de Prólogo e Introducción. Actualización fotos carrusel Home</p>
                        <a href="edicion_home.php" class="btn btn-primary">Editar Datos</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-sitemap"></i> Tablas</h4>
                    </div>
                    <div class="panel-body">
                        <p>Acualización de tablas generales</p>
                        <br>
                        <a href="edicion_tablas.php" class="btn btn-primary">Editar Datos</a>
                    </div>
                </div>
            </div>
            </div> 
         <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-book"></i> Glosario</h4>
                    </div>
                    <div class="panel-body">
                        <p>Actualización de datos y fotos del glosario</p>
                        <br>
                        <a href="edicion_glosario.php" class="btn btn-primary">Editar Datos</a>
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