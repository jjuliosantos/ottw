<?php
header("Content-Type: text/html;charset=utf-8"); 
require("seguridad.php");
require("autoCarga.php");
require("header_edicion.php");
?>

<div class="container">
	<div class="page-header">
       <h1>Mantenimiento OTTW<small> - Acceso </small></h1>
    </div>  
<form class="form-inline" method="POST" action="edicion.php">
    <div class="form-group">
        <label class="sr-only" for="inputEmail">Usuario</label>
        <input type="text" class="form-control" placeholder="Email">
    </div>
    <div class="form-group">
       <label class="sr-only" for="inputPassword">Password</label>
       <input type="password" class="form-control"  placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Acceder</button>
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