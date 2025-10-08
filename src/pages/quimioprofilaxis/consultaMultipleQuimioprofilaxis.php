<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>SISTB - QUIMIOPROFILAXIS</title>
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
					 <li><i class="fa fa-flask"></i><a href="index.html"> Consulta multiple</a></li> 
				</ul>
			</div><!-- /breadcrumb-->
		 
		 
			<div class="padding-md" > 
				<div class="row">
					<div class="col-lg-12">
						<div class="panel   fadeInDown animation-delay5" >
							
							<div class="panel-body">
								
								
                <div class=" row">
                    <div class="form-group col-md-3 ">
                         <span>Año: </span>
                            <select class="form-control" id="CM-ano" >
                                <option> </option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030 ">2030</option>
                            </select>
                         
                    </div>
                    <div class="form-group col-md-3 ">
                        <span>Trimestre: </span>
                            <select class="form-control" id="CM-trimestre" >
                                <option > </option>
                                <option value="I">I</option>
                                <option value="II">II</option> 
                                <option value="III">III</option>
                                <option value="IV">IV</option> 
                            </select>
                        
                    </div>
                    <div class="form-group col-md-3">
                        <span>Sexo</span>
                            <select class="form-control" id="CM-sexo" >
                                <option > </option>
                                <option value="F">F</option>
                                <option value="M">M</option> 
                            </select>
                        
                    </div>
                    <div class="form-group col-md-3 ">
                         <span>Municipio: </span>
                            <input class="form-control" id="CM-mnpo" name="CM-mnpo" list="CM-mnpoES"   >
                            <datalist id="CM-mnpoES">
                    
                            </datalist>  
                         
                    </div> 
                    
                
                    <div class="form-group col-md-4 ">
                        <span>IPS que Inicia Tratamiento: </span>
                            <input class="form-control" id="CM-ipsInicia" name="CM-ipsInicia" list="CM-ipsIniciaes"  style="width:60%;">
                            <datalist id="CM-ipsIniciaes">
                    
                            </datalist>  
                         
                    </div>  
                
                    <div class="form-group col-md-4 ">
                         
                            <span>IPS que Continua Tratamiento: </span>
                            <input class="form-control" id="CM-ipsContinua" name="CM-ipsContinua" list="CM-ipsContinuaes"  style="width:60%;">
                            <datalist id="CM-ipsContinuaes">
                    
                            </datalist>  
                    </div>  
                
                    <div class="form-group col-md-4 ">
                        
                        <span>Entidad: </span>
                            <input class="form-control" id="CM-eapb" name="CM-eapb" list="CM-eapbes"  style="width: 60%;">
                            <datalist id="CM-eapbes">
                    
                            </datalist> 
                    </div>  
                
                    <div class="form-group col-md-4 ">
                         <span>Regimen: </span>
                            <select class="form-control" id="CM-regimen" >
                                
                            </select>
                        
                    </div>  
                    <div class="form-group col-md-4 ">
                        <span>Ubicación Geografica: </span>
                            <select class="form-control" id="CM-ubicacionG" >
                                <option></option>
                                <option value="URBANA">URBANA</option>
                                <option value="RURAL">RURAL</option>
                                
                            </select>
                          
                    </div>  
                    <div class="form-group col-md-4">
                       <span>Rango de Edades: </span>
                            <select class="form-control" id="CM-edades" >
                                <option > </option>
                                <option value="PRIMERA INFANCIA 0 - 5 AÑOS">PRIMERA INFANCIA 0 - 5 AÑOS</option>
                                <option value="INFANCIA 6 - 12 AÑOS">INFANCIA 6 - 12 AÑOS</option> 
                                <option value="ADOLESCENCIA 13 - 17 AÑOS">ADOLESCENCIA 13 - 17 AÑOS</option> 
                                <option value="JUVENTUD 18 - 26 AÑOS">JUVENTUD 18 - 26 AÑOS</option> 
                                <option value="ADULTO JOVEN 27 - 45 AÑOS">ADULTO JOVEN 27 - 45 AÑOS</option> 
                                <option value="ADULTO MAYOR 46 AÑOS O MAS">ADULTO MAYOR 46 AÑOS O MAS</option> 
                            </select>
                         
                    </div>  
                
                    <div class="form-group col-md-7">
                       
                    </div>  
                    <div class="form-group col-md-5 " id="apol"> 
                        <button type="button" class="btn btn-success  "   onclick="Javascript: validarCheckBox();" style="background-color: #41B314;  height: 30px; width:100%;">Consultar</button>
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
