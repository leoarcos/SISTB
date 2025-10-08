<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>SISTB - Quimioprofilaxis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	 

    <!-- Bootstrap core CSS -->
    <link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Font Awesome -->
	<link href="../../../css/font-awesome.min.css" rel="stylesheet">
	
	<!-- Pace -->
	<link href="../../../css/pace.css" rel="stylesheet">
	
	<!-- Color box -->
	<link href="../../../css/colorbox/colorbox.css" rel="stylesheet">
	
	<!-- Morris -->
	<link href="../../../css/morris.css" rel="stylesheet"/>	
	
	<!-- Perfect -->
	<link href="../../../css/app.min.css" rel="stylesheet">
	<link href="../../../css/app-skin.css" rel="stylesheet">
	
	<!-- Datatable -->
	<link href="../../../css/jquery.dataTables_themeroller.css" rel="stylesheet">
	
	<style>
		#div2 { overflow-y: scroll; margin-bottom: 12px;}
	</style>
  </head>

  <body class="overflow-hidden">
	<!-- Overlay Div -->
	<div id="overlay" class="transparent"></div>
	
	<a href="../" id="theme-setting-icon"><i class="fa fa-cog fa-lg"></i></a>
	<div id="theme-setting">
		<div class="title">
			<strong class="no-margin">Skin Color</strong>
		</div>
		<div class="theme-box">
			<a class="theme-color" style="background:#323447" id="default"></a>
			<a class="theme-color" style="background:#efefef" id="skin-1"></a>
			<a class="theme-color" style="background:#a93922" id="skin-2"></a>
			<a class="theme-color" style="background:#3e6b96" id="skin-3"></a>
			<a class="theme-color" style="background:#635247" id="skin-4"></a>
			<a class="theme-color" style="background:#3a3a3a" id="skin-5"></a>
			<a class="theme-color" style="background:#495B6C" id="skin-6"></a>
		</div>
		<div class="title">
			<strong class="no-margin">Sidebar Menu</strong>
		</div>
		<div class="theme-box">
			<label class="label-checkbox">
				<input type="checkbox" checked id="fixedSidebar">
				<span class="custom-checkbox"></span>
				Fixed Sidebar
			</label>
		</div>
	</div><!-- /theme-setting -->

	<div id="wrapper" class="preload">
		
		<?php 
			
			include("../../navbar.php");
		?>
		<?php 
			
			include("../../sidebar.php");
		?>
		<div id="main-container">
			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-flask"></i><a href="index.html"> Consulta Quimioprofilaxis</a></li> 
				</ul>
			</div><!-- /breadcrumb-->
		 
		 
			<div class="padding-md" > 
				<div class="row">
					<div class="col-lg-12">
						<div class="panel   fadeInDown animation-delay5" >
							
							<div class="panel-body">
								
								<div class="row">
									<div class="col-md-12 ">
                      <a id="Excel007">
                          <button type="button" id="botonQuimio" class="btn btn-success btn-block" style="background-color: #41B314;  height: 50px;">Generar Listado en Excel</button>
                      </a>
                  </div>

			            <div class="col-md-12">
			                <!-- TABLE HOVER -->
			                <div class="panel table-responsive">
			                    <div class="panel-heading text-center">
			                        <h3 class="panel-title text-primary"><strong>Quimioprofilaxis</strong> </h3>
			                    </div>
			                    <div class="panel-body">
			                        <table class="table table-hover display table-responsive" id="tableQuimioprofilaxis" style="max-height: 600px;">
			                            <thead>
			                            <tr>
			                                <th>Acción  </th>
			                                <th>#</th>
			                                <th>Fecha</th>
			                                <th>Nombres</th>
			                                <th>Identificacion</th> 
			                                <th>Municipio</th>
			                                <th>EPS/ARS</th>
			                                <th>Sexo</th>
			                                <th>Edad</th>
			                                
			                            </tr>
			                            </thead>
			                            <tbody id="tableQuimioprofilaxisContenido">
			                            
			                            
			                            </tbody>
			                        </table>
			                    </div>
			                </div>
			                <!-- END TABLE HOVER -->
			            </div>
								</div>

								 
							</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-xs-6">
										<h4 class="no-margin"></h4>
									</div><!-- /.col -->
									<div class="col-xs-6 text-right">
										<a type="button" class="btn btn-success  " id="RegistroP" >Registrar Paciente</a>
									</div><!-- /.col -->
								</div><!-- /.row -->
							</div>
						</div><!-- /panel -->
								
					</div>
					 
				</div><!-- /.row -->
			</div><!-- /.padding-md -->
		</div><!-- /main-container -->
		<!-- Footer
		================================================== -->
		
		<?php 
			
			include("../../footer.php");
		?>
		 
	</div><!-- /wrapper -->

	<a href="../../../" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
	 
	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
	<!-- Jquery -->
	<script src="../../../js/jquery-1.10.2.min.js"></script>

	<!-- Bootstrap -->
    <script src="../../../bootstrap/js/bootstrap.js"></script>
   
	<!-- Flot -->
	<script src='../../../js/jquery.flot.min.js'></script>
   
	<!-- Morris -->
	<script src='../../../js/rapheal.min.js'></script>	
	<script src='../../../js/morris.min.js'></script>	
	
	<!-- Colorbox -->
	<script src='../../../js/jquery.colorbox.min.js'></script>	

	<!-- Sparkline -->
	<script src='../../../js/jquery.sparkline.min.js'></script>
	
	<!-- Pace -->
	<script src='../../../js/uncompressed/pace.js'></script>
	
	<!-- Popup Overlay -->
	<script src='../../../js/jquery.popupoverlay.min.js'></script>
	
	<!-- Slimscroll -->
	<script src='../../../js/jquery.slimscroll.min.js'></script>
	
	<!-- Modernizr -->
	<script src='../../../js/modernizr.min.js'></script>
	
	<!-- Cookie -->
	<script src='../../../js/jquery.cookie.min.js'></script>
	
	<!-- Datatable -->
	<script src='../../../js/jquery.dataTables.min.js'></script>	

	 
	<!-- Perfect -->
	<script src="../../../js/app/app_quimioprofilaxis.js"></script>
	<script src="../../../js/app/app.js"></script>
	<script>
		
	</script>
	
  </body>
</html>
