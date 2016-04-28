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
			         <li><a href="edicion.php"><i class="fa fa-fw fa fa-sliders"></i> Home</a></li>
				     <li class="active"><i class="fa fa-fw fa fa-sitemap"></i> Tablas</li>
			       </ol>
			    </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-tags"></i> Modelos</h4>
                    </div>
                    <div class="panel-body">
                        <p>Acualización de modelos</p>
                        <br>
                        <a href="edicion_tablas_modelos.php" class="btn btn-primary">Editar Datos</a>
                    </div>
                </div>
            </div>
               <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-map"></i> Países</h4>
                    </div>
                    <div class="panel-body">
                        <p>Acualización de Países</p>
                        <br>
                        <a href="edicion_tablas_paises.php" class="btn btn-primary">Editar Datos</a>
                    </div>
                </div>
            </div>
               <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-shield"></i> Escudos</h4>
                    </div>
                    <div class="panel-body">
                        <p>Acualización de Escudos</p>
                        <br>
                        <a href="edicion_tablas_escudos.php" class="btn btn-primary">Editar Datos</a>
                    </div>
                </div>
            </div>            
         </div>
         <div class="row">  
               <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-map-marker"></i> Ciudades</h4>
                    </div>
                    <div class="panel-body">
                        <p>Acualización de Ciudades</p>
                        <br>
                        <a href="edicion_tablas_ciudades.php" class="btn btn-primary">Editar Datos</a>
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