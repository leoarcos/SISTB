<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>SISTB - Medicamentos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<script>
		console.log("Bienvenido a GIMMIDS");
			if (typeof module === 'object') {
				window.module = module; 
				module = undefined;
			}

	</script>

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
					 <li><i class="fa fa-magic"></i><a href="index.html"> Registrar Medicamento</a></li> 
				</ul>
			</div><!-- /breadcrumb-->
		 
		 
			<div class="padding-md" > 
				<div class="row">
					<div class="col-lg-12">
						<div class="panel   fadeInDown animation-delay5" >
							
							<div class="panel-body">
								
								<div class="row">
									
								</div>
								<form action='Javascript: registrarMedicamento();'>
                      <div class=" row">
                        <div class="form-group col-md-3" >
                            <span for="nombreMedicamento" >Nombre: </span>
                            <input list="nombreMedicamentos" name="nombreMedicamento" id="nombreMedicamento" class="form-control "  >
                            <datalist id="nombreMedicamentos">
                            
                            </datalist>

                        </div>
                        <div class="form-group col-md-3 "> 
                            <span>Presentación: </span>
                            <select class="form-control" id="presentacion"  >
                                <option> </option>
                                <option value="TABLETAS">TABLETAS</option>
                                <option value="FRASCOS">FRASCOS</option>
                                <option value="AMPOLLA">AMPOLLA </option>
                                <option value="SOBRES">SOBRES</option>
                                <option value="CAPSULAS">CAPSULAS</option>
                                <option value="COMPRIMIDOS">COMPRIMIDOS</option>
                                
                            </select>  
                        </div>
                        <div class="form-group col-md-3 "> 
                            <span>Concentracion: </span>
                            <input list="concentracion" name="concentracions" id="concentracions" class="form-control "  >
                            <datalist id="concentracion">
                            
                            </datalist> 
                                
                        </div>
                        <div class="form-group col-md-3 "> 
                            <span>Laboratorio: </span>
                            <input type="text" class="form-control" id="laboratorio"  >
                                
                        </div>
                        <div class="form-group col-md-3 "> 
                            <span>Cantidad: </span>
                            <input type="number" class="form-control" min=1 id="cantidad"  >
                                
                        </div>
                        <div class="form-group col-md-3 "> 
                            <span>Lote: </span>
                            <input type="text" class="form-control" id="lote"  >
                                
                        </div> 
                        <div class="form-group col-md-3 "> 
                            <span>Fecha Ingreso: </span>
                            <input type="date" class="form-control" id="fechaIngreso"  >
                                
                        </div>
                        <div class="form-group col-md-3 "> 
                            <span>Fecha Vencimiento: </span>
                            <input type="date" class="form-control" id="fechaVencimiento"  >
                                
                        </div>
                      </div>
                      <div class=" row">
                        <div class="form-group col-md-12 "> 
                            <span>Observaciones: </span>
                            <textarea  class="form-control" id="observaciones"  style="width:100%;"></textarea>
                                
                        </div>
                        
                      </div>
                      <div class=" row">
                        
                        <div class="form-group col-md-3"> 
                            <span>Donado: </span>
                            <select class="form-control" id="donado"  >
                                <option> </option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                                
                            </select>  
                        </div> 
                        <div class="form-group col-md-9  "> 
                            <span>Nombre del donante: </span>
                            <input type="text" class="form-control" id="nombreDonante"  >
                                
                        </div>
                      </div>
                      <div class=" row">
                        
                        <div class="form-group col-md-8"> 
                          
                        </div> 
                        <div class="form-group col-md-4  ">  
                            <input type="submit" class="form-control btn btn-success" id="nombreDonante"  value="Registrar Medicamento">
                                
                        </div>
                      </div>
                    </form>

								 
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
	<script src="../../../js/app/app_farmacia.js"></script>
	<script src="../../../js/app/app.js"></script>
	<script>
		
	</script>
	
  </body>
</html>
