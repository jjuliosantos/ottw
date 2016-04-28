<?php
header("Content-Type: text/html;charset=utf-8");

require("autoCarga.php");
require("header_edicion.php");

$generales = new Generales();

?>
<script>
function sf(ID){
document.getElementById(ID).focus();
}
</script>
</head>
<body onload="sf('usuario');">

<div class="container"> 
        <div class="row">
            <div class="col-lg-12">
            	<div class="page-header">
			        <h1>Mantenimiento OTTW</h1> 
                </div>
            </div>
         </div>
         <div class="row">
         <form class="form-horizontal" action="control.php" method="post" id="form">
			  <div class="form-group">
			    <label class="control-label col-sm-4" for="email">Usuario:</label>
			    <div class="col-sm-8">
			    <input type="text" class="form-control" name="usuario" id="usuario" />
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-4" for="pwd">Password:</label>
			    <div class="col-sm-8">
			    <input type="password" class="form-control" id="pwd" name="pwd">
			    </div>
			  </div>
			  <button type="submit" class="class="btn btn-default">Entrar</button>
			 </form>
  		</div>
  		
<?php
require("footer.php");
?>
</div>