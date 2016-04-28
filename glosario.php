<?php 
require("autoCarga.php");
require("header.php");

$generales = new Generales();

?>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Glosario
            
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-fw fa fa-home"></i> Home</a>
                    </li>
                    <li class="active"><i class="fa fa-fw fa fa-book"></i> Glosario (<?php echo number_format($generales->getNumTerminosGlosario(),0,',','.'); ?> Término/s)</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">2T</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
							<div class="row">
								<div class="col-md-3">
									<a href="#">
										<img class="img-responsive img-hover" src="img/glosario/2T otro.gif" alt="">
									</a>
								</div>
								<div class="col-md-9">
									<h3>2 Tiempos</h3>
									<h4>Definici�n</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
								</div>
							</div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">2t'</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
							<div class="row">
								<div class="col-md-3">
									<a href="#">
										<img class="img-responsive img-hover" src="img/glosario/2T.gif" alt="">
									</a>
								</div>
								<div class="col-md-9">
									<h3>2 Tiempos</h3>
									<h4>Definici�n</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
								</div>
							</div>
                        </div>
                    </div>					

                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">2V</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
							<div class="row">
								<div class="col-md-3">
									<a href="#">
										<img class="img-responsive img-hover" src="img/glosario/2V.gif" alt="">
									</a>
								</div>
								<div class="col-md-9">
									<h3>2 Valvulas</h3>
									<h4>Definici�n</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
								</div>
							</div>
                        </div>
                    </div>
                    <!-- /.panel -->
					
					
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">4T</a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
							<div class="row">
								<div class="col-md-3">
									<a href="#">
										<img class="img-responsive img-hover" src="img/glosario/4T.gif" alt="">
									</a>
								</div>
								<div class="col-md-9">
									<h3>4 Tiempos</h3>
									<h4>Definici�n</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
								</div>
							</div>
                        </div>
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">4V</a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
							<div class="row">
								<div class="col-md-3">
									<a href="#">
										<img class="img-responsive img-hover" src="img/glosario/4V.gif" alt="">
									</a>
								</div>
								<div class="col-md-9">
									<h3>4 Valvulas</h3>
									<h4>Definici�n</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
								</div>
							</div>
                        </div>
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">8V</a>
                            </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse">
							<div class="row">
								<div class="col-md-3">
									<a href="#">
										<img class="img-responsive img-hover" src="img/glosario/8V.gif" alt="">
									</a>
								</div>
								<div class="col-md-9">
									<h3>8 Valvulas</h3>
									<h4>Definici�n</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
								</div>
							</div>
                        </div>
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">16V</a>
                            </h4>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse">
							<div class="row">
								<div class="col-md-3">
									<a href="#">
										<img class="img-responsive img-hover" src="img/glosario/2T otro.gif" alt="">
									</a>
								</div>
								<div class="col-md-9">
									<h3>16 Valvulas</h3>
									<h4>Definici�n</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
								</div>
							</div>
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.panel-group -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

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
