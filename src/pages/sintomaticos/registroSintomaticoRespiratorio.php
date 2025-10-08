<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>SISTB - Sintomaticos respiratorios</title>
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
					 <li><i class="fa fa-dashboard"></i><a href="index.html"> Registrar Sintomatico respiratorio</a></li> 
				</ul>
			</div><!-- /breadcrumb-->
		 
		 
			<div class="padding-md" > 
				<div class="row">
					<div class="col-lg-12">
						<div class="panel   fadeInDown animation-delay5" >
							
							<div class="panel-body">
								
								<div class="row">
									
                    <div class="col-md-12 ">
                        <div class="row">
                            <div class="form-group  col-md-4   "> 
                                <span>Fecha Captación: </span>
                                <input type='date' class="form-control" id="fechaCaptacion" onchange='Javascript: numeroAnoCaptacion();' >
                                    
                            </div>
                            <div class="form-group  col-md-4   "> 
                                <span>Año: </span>
                                <input type='number' readonly class="form-control" id="ano"  >
                                    
                            </div>
                            <div class="form-group  col-md-4  "> 
                                <span>Numero: </span>
                                <input type='number' readonly class="form-control" id="numero"  >
                                    
                            </div>
                         
                            <div class="form-group col-md-3 ">
                                <span for="remitidoPor">Remitido Por: </span> 
                                <input list="remitidoPorList" name="remitidoPor" id="remitidoPor" class="form-control "  >
                                <datalist id="remitidoPorList">
                                    <option value="AUXILIAR DE ENFERMERIA">
                                    <option value="MEDICO">
                                    <option value="ENFERMERA">
                                    <option value="AGENTE COMUNITARIO">
                                    <option value="BACTERIOLOGO">
                                    <option value="ESTUDIANTE">
                                </datalist>
                            </div>
                            <div class="form-group  col-md-3  "> 
                                <span>Fecha Sintomas: </span>
                                <input type='date' class="form-control" id="fechaSintomas"  >
                                    
                            </div>
                            
                             
                            <div class="form-group col-md-3 "> 
                                <span>Departamento: </span>
                                <select class="form-control" id="dpto" onchange="Javascript: listarMnpos();" >
                                    <option> </option> 
                                </select>   
                            </div>
                            <div class="form-group col-md-3"> 
                                <span>Municipio: </span>
                                <select class="form-control" id="mnpo"  >
                                    <option> </option> 
                                </select>   
                            </div>
                             
                            <div class="form-group col-md-4 "> 
                                <span>Nombres: </span>
                                <input type="text" class="form-control" id="nombres"  >
                                    
                            </div>
                            <div class="form-group col-md-4 "> 
                                <span>Primer Apellido: </span>
                                <input type="text" class="form-control" id="papellido"  >
                                      
                            </div>
                            <div class="form-group col-md-4 "> 
                                <span>Segundo Apellido: </span>
                                <input type="text" class="form-control" id="sapellido"  >
                                    
                            </div>
                             
                            <div class="form-group col-md-3 "> 
                                <span>Sexo: </span>
                                <select class="form-control" id="sexo"  >
                                    <option ></option> 
                                    <option value="M">M</option> 
                                    <option value="F">F</option> 
                                </select> 
                            </div>
                            <div class="form-group col-md-3 "> 
                                <span>Edad: </span>
                                <select class="form-control" id="edad"  >
                                    <option ></option> 
                                     
                                </select> 
                                      
                            </div>
                            <div class="form-group col-md-3 "> 
                                <span>Tipo Id: </span>
                                <select   class="form-control" id="tipoid"  >
                                </select>
                            </div>
                            <div class="form-group col-md-3 "> 
                                <span># Id: </span>
                                <input type="text" class="form-control" id="numid"  >
                                    
                            </div>
                             
                            <div class="form-group col-md-4 "> 
                                <span>Etnia: </span>
                                <select class="form-control" id="etnia" onchange="Javascript: listarPuebloIndigena();" >
                                    <option></option> 
                                    <option value="PALENQUERO">PALENQUERO</option>
                                    <option value="ROOM (GITANO)">ROOM (GITANO)</option> 
                                    <option value="INDIGENA">INDIGENA</option> 
                                    <option value="RAIZAL">RAIZAL</option> 
                                    <option value="OTRO">OTRO</option>   
                                </select> 
                            </div>
                            <div class="form-group col-md-4 "> 
                                <span>Pueblo Indigena: </span>
                                <select class="form-control" id="puebloIndigena">
                                    <option> </option> 
                                </select>    
                            </div>
                            <div class="form-group col-md-4 "> 
                                <span>Grupo Poblacional: </span>
                                <select class="form-control" id="grupoPoblacional">
                                    <option> </option> 
                                </select>    
                            </div>
                              
                            <div class="form-group col-md-3  "> 
                                <span>Sector: </span>
                                <select name="sector" id="sector" class="form-control " onchange="Javascript: listarSectores();" >
                                    <option> </option> 
                                    <option value="BARRIO">BARRIO</option>
                                    <option value="VEREDA">VEREDA</option>
                                    <option value="CORREGIMIENTO">CORREGIMIENTO</option>
                                    <option value="ASENTAMIENTO">ASENTAMIENTO</option>
                                     
                                </select>
                            </div>
                            <div class="form-group col-md-3 "> 
                                
                                <span>Descripción sector: </span>

                                <input list="sectorDetaList" onChange="Javascript: cargarComuna();" name="sectorDeta" id="sectorDeta" class="form-control "  >
                                <datalist id="sectorDetaList">
                                    <option value="">
                                </datalist>
                            </div> 
                            <div class="form-group col-md-3 "> 
                                <span>Direccion: </span>
                                <input type="text" class="form-control" id="direccion"  >
                                      
                            </div> 
                            <div class="form-group col-md-3 "> 
                                <span>Comuna: </span>
                                <input type="number" class="form-control" id="comuna"  >
                                      
                            </div> 
                              
                            <div class="form-group col-md-3 "> 
                                <span>Tel/Cel: </span>
                                <input type="number" class="form-control" id="telefono"  >
                                      
                            </div> 
                            <div class="form-group col-md-3 "> 
                                <span>ocupacion: </span>
                                <input list="ocupacionList" name="ocupacion" id="ocupacion" class="form-control "  >
                                <datalist id="ocupacionList">
                                    <option value="AUXILIAR DE ENFERMERIA">
                                    <option value="MEDICO">
                                    <option value="ENFERMERA">
                                    <option value="AGENTE COMUNITARIO">
                                    <option value="BACTERIOLOGO">
                                    <option value="ESTUDIANTE">
                                </datalist>   
                            </div> 
                              
                            
                            <div class="form-group col-md-3 "> 
                                <span>Regimen Afiliación: </span>
                                <select class="form-control" id="regimen"  >
                                    <option><option>
                                </select>
                                      
                            </div> 
                            <div class="form-group col-md-3 "> 
                                <span>Entidad Afiliadora: </span>
                                <input list="eapbList" name="eapb" id="eapb" class="form-control "  >
                                <datalist id="eapbList">
                                    <option value="AUXILIAR DE ENFERMERIA">
                                    <option value="MEDICO">
                                    <option value="ENFERMERA">
                                    <option value="AGENTE COMUNITARIO">
                                    <option value="BACTERIOLOGO">
                                    <option value="ESTUDIANTE">
                                </datalist>   
                            </div> 
                             
                        </div>
                         
                    
                       
                    </div>
								</div>

								 
							</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-xs-6">
										<h4 class="no-margin"></h4>
									</div><!-- /.col -->
									<div class="col-xs-6 text-right">
										<a type="button" class="btn btn-success  " id="RegistroP" >Registrar Sintomatico respiratorio</a>
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
	<script src="../../../js/app/app_sintomaticos.js"></script>
	<script src="../../../js/app/app.js"></script>
	<script>
		
	</script>
	
  </body>
</html>
