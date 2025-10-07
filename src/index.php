<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>SISTB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	 
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Font Awesome -->
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	
	<!-- Pace -->
	<link href="../css/pace.css" rel="stylesheet">
	
	<!-- Color box -->
	<link href="../css/colorbox/colorbox.css" rel="stylesheet">
	
	<!-- Morris -->
	<link href="../css/morris.css" rel="stylesheet"/>	
	
	<!-- Perfect -->
	<link href="../css/app.min.css" rel="stylesheet">
	<link href="../css/app-skin.css" rel="stylesheet">
	
	<!-- Datatable -->
	<link href="../css/jquery.dataTables_themeroller.css" rel="stylesheet">
	
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
			
			include("navbar.php");
		?>
		<?php 
			
			include("sidebar.php");
		?>
		<div id="main-container">
			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-dashboard"></i><a href="index.html"> Tablero</a></li> 
				</ul>
			</div><!-- /breadcrumb-->
			<div class="main-header clearfix">
				<div class="page-title">
					<h3 class="no-margin">Tablero</h3>
					<span>Bienvenido <strong class="nombre-Usuario">Nombre Usuario</strong> </span>
				</div><!-- /page-title -->
				
				<ul class="page-stats"> 
			    	<li>
			    		<div class="value">
			    			<span>Atenciones</span>
			    			<h4><strong id="currentBalance"></strong></h4>
			    		</div>
			    		 
			    	</li>
			    </ul><!-- /page-stats -->
			</div><!-- /main-header -->
			
		 
			<div class="padding-md">
				<div class="row">
					<div class="col-sm-6 col-md-3">
						<div class="panel-stat3 bg-info">
							<h2 class="m-top-none" id="userCount">362</h2>
							<h5>Pacientes registrados</h5>
							
							<div class="stat-icon">
								<i class="fa fa-user fa-3x"></i>
							</div>
							 
							<div class="loading-overlay">
								<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
							</div>
						</div>
					</div><!-- /.col -->
					<div class="col-sm-6 col-md-3">
						<div class="panel-stat3 bg-info">
							<h2 class="m-top-none"><span id="serverloadCount">15</span></h2>
							<h5>Sintomaticos respiratorios</h5>
							
							<div class="stat-icon">
								<i class="fa fa-fire fa-3x"></i>
							</div>
							
							<div class="loading-overlay">
								<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
							</div>
						</div>
					</div><!-- /.col -->
					<div class="col-sm-6 col-md-3">
						<div class="panel-stat3 bg-info">
							<h2 class="m-top-none" id="orderCount">593</h2>
							<h5>Quimiprofilaxis</h5>
							<div class="stat-icon">
								<i class="fa fa-flask fa-3x"></i>
							</div>
							<div class="loading-overlay">
								<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
							</div>
						</div>
					</div><!-- /.col -->
					<div class="col-sm-6 col-md-3">
						<div class="panel-stat3 bg-info">
							<h2 class="m-top-none" id="orderCount">593</h2>
							<h5>Resistentes a farmacos</h5>
							<div class="stat-icon">
								<i class="fa fa-plus-circle fa-3x"></i>
							</div>
							<div class="loading-overlay">
								<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
							</div>
						</div>
					</div><!-- /.col -->
				 
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="panel bg-primary fadeInDown animation-delay5">
							<div class="panel-body">
								<div id="barChart" style="height: 250px;"></div>
							</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-xs-6">
										<h4 class="no-margin">Total Consultas</h4>
									</div><!-- /.col -->
									<div class="col-xs-6 text-right">
										<h4 class="no-margin" id="serverloadCount2">531</h4>
									</div><!-- /.col -->
								</div><!-- /.row -->
							</div>
						</div><!-- /panel -->
								
					</div>
					<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading clearfix">
								<span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i> Trafico consultas al año por mes(#)</span>
								 
							</div>
							<div class="panel-body" id="trafficWidget">
								<div id="placeholder" class="graph" style="height:250px"></div>
							</div>
						 
							 
						</div><!-- /panel -->
								
					 
					 
					</div><!-- /.col -->
					<div class="col-lg-6"> 	
					
						 
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.padding-md -->
		</div><!-- /main-container -->
		<!-- Footer
		================================================== -->
		
		<?php 
			
			include("footer.php");
		?>
		
		<!--Modal-->
		<div class="modal fade" id="admisionar-modal">
  			<div class="modal-dialog">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>Admisionar</h4>
      				</div>
					  <div class="panel-body">
						  
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="AdmnumHistClin">Numero Historia:</label>

                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" disabled id="AdmnumHistClin" ng-model="AdmnumHistClin" name="AdmnumHistClin" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="AgendartipoidRegPac">Tipo ID:</label>
                                <select class="form-control" id="AgendartipoidRegPac"  onchange="Javascript: cargaNumHistClinic('AgendartipoidRegPac', 'AgendaridRegPac', 'AdmnumHistClin');"  name="AgendartipoidRegPac" required>
									<option ></option>
									<option value="CC">CC -Cedula de Ciudadania</option>
									<option value="CE">CE - Cédula de extranjería</option>
									<option value="CD">CD - Carné diplomático</option>
									<option value="PA">PA - Pasaporte</option>
									<option value="SC">SC - Salvoconducto</option>
									<option value="PE">PE - Permiso Especial de Permanencia</option>
									<option value="RC">RC - Registro civil</option>
									<option value="TI">TI - Tarjeta de identidad</option> 
									<option value="CN">CN - Certificado de nacido vivo </option>
									<option value="AS">AS - Adulto sin identificar</option>
									<option value="MS">MS - Menor sin identificar</option>  
									<option value="PPT">PPT - Permiso por Protección Temporal</option>  
									
								</select>


                            </div>
                            <div class="col-md-6 form-group">
                                <label for="AgendaridRegPac">Identificación:</label>
                                <input class="form-control" type="text" id="AgendaridRegPac"   name="AgendaridRegPac" onkeyup="Javascript: cargaNumHistClinic('AgendartipoidRegPac', 'AgendaridRegPac', 'AdmnumHistClin');"  required>
                            </div>
                            <div class="col-md-12" style="margin-top: auto;margin-bottom: auto;">
                                <a class="btn btn-info btn-block" onclick="Javascript:continuarRegistroAdmision();">Buscar</a>

                            </div>



                        </div> 
						<div class="row text-center hide" id="contAdmisionarPaciente" >
							<div class="col-md-6 form-group">			
								<label for="AgendarotroDocumRep">Otro documento:</label>
								<select id="AgendarotroDocumRep" ng-model="AgendarotroDocumRep" name="AgendarotroDocumRep" onchange="Javascript: numOtroDocument('AgendarotroDocumRep','AgendarotroDocumRepNum');" class="form-control" required> 
									<option ></option>
									<option value="RAMV">RAMV (REGISTRO ADMINISTRATIVO DE MIGRANTES VENEZOLANOS)</option>
									<option value="SALVO CONDUCTO DE PERMANENCIA">SALVO CONDUCTO DE PERMANENCIA</option>
									<option value="TARJETA DE MOVILIDAD FRONTERIZA" >TARJETA DE MOVILIDAD FRONTERIZA</option>
									<option value="SALVO CONDUCTO DE SALIDA" >SALVO CONDUCTO DE SALIDA</option>
									<option value="VISA MIGRANTE" >VISA MIGRANTE</option>
									<option value="VISA DE RESIDENTE">VISA DE RESIDENTE</option>
									<option value="VISA DE VISITANTE">VISA DE VISITANTE</option>
									<option value="PERMISO DE INGRESO Y PERMANENCIA" >PERMISO DE INGRESO Y PERMANENCIA</option>
									<option value="ACTA DE NACIMIENTO" >ACTA DE NACIMIENTO</option>
									<option value="CEDULA PAIS DE ORIGEN" >CEDULA PAIS DE ORIGEN</option>
									<option value="NINGUNO" >NINGUNO</option>
								</select>
						
							</div>
							<div class="col-md-6 form-group">			
								<label for="AgendarotroDocumRepNum"># Otro documento:</label>
								<input type="text" id="AgendarotroDocumRepNum"  name="AgendarotroDocumRepNum" class="form-control" disabled> 
									 
						
							</div>
							<div class="col-md-3 form-group">			
								<label for="Agendarrumv">RUMV:</label>
								<select id="Agendarrumv"   name="Agendarrumv" onchange="Javascript: seleccrumv('Agendarrumv','AgendarrumvNum');" class="form-control" required> 
									<option ></option>
									<option value="SI">SI</option>
									<option value="NO">NO</option>
									 
								</select>
						
							</div>
							<div class="col-md-3 form-group">			
								<label for="AgendarrumvNum"># RUMV:</label>
								<input type="number" id="AgendarrumvNum"  name="AgendarrumvNum" class="form-control" disabled > 
									 
						
							</div>
							<div class="col-md-3 form-group">			
								<label for="AgendarPPT">PPT:</label>
								<select id="AgendarPPT"  name="AgendarPPT" onchange="Javascript: seleccppt('AgendarPPT','AgendarPPTNum');" class="form-control" required> 
									<option ></option>
									<option value="SI">SI</option>
									<option value="NO">NO</option>
									 
								</select>
						
							</div>
							<div class="col-md-3 form-group">			
								<label for="AgendarPPTNum"># PPT:</label>
								<input type="number" id="AgendarPPTNum"  name="AgendarPPTNum" class="form-control" disabled> 
									 
						
							</div>
							<div class="col-md-4 form-group">
								<label for="Agendarnombres">Nombres:</label>
								<input class="form-control" type="text" id="Agendarnombres" ng-model="Agendarnombres" name="Agendarnombres" required>
						
						
							</div>
							<div class="col-md-4 form-group">
								<label for="Agendarpapellido">Primer apellido:</label>
								<input class="form-control" type="text" id="Agendarpapellido" ng-model="Agendarpapellido" name="Agendarpapellido" required>
							</div>
							<div class="col-md-4 form-group">
								<label for="Agendarsapellido">Segundo apellido:</label>
								<input class="form-control" type="text" id="Agendarsapellido" ng-model="Agendarsapellido" name="Agendarsapellido" >
							</div>
							<div class="col-md-4 form-group">
								<label for="AgendarestCivil">Estado civil:</label>
								<select class="form-control" id="AgendarestCivil" ng-model="AgendarestCivil" name="AgendarestCivil" required> 
									<option ></option>
									<option value="SOLTERO">SOLTERO</option>
									<option value="CASADO">CASADO</option>
									<option value="VIUDO">VIUDO</option>
									<option value="DIVORCIADO">DIVORCIADO</option>
									<option value="UNION LIBRE">UNION LIBRE</option>  
								</select>
							</div>
							<div class="col-md-4 form-group">
								<label for="Agendarsexo">Sexo:</label>
								<select class="form-control" id="Agendarsexo" ng-model="Agendarsexo" name="Agendarsexo" required> 
									<option ></option>
									<option value="F">FEMENINO</option>
									<option value="M">MASCULINO</option>
								</select>
							</div>
							<div class="col-md-4 form-group">
								<label for="AgendarfecNac">Fecha de nacimiento:</label>
								<input class="form-control" onchange="Javascript: calcularEdad('AgendarfecNac','Agendaredad')" type="date" id="AgendarfecNac" ng-model="AgendarfecNac" name="AgendarfecNac" required>
							</div>
							<div class="col-md-12 form-group   justify-content-center ">
								<label for="Agendaredad">edad:</label>
								<input class="form-control text-info justify-content-center " type="text" readonly id="Agendaredad" ng-model="Agendaredad" name="Agendaredad" style="text-align:center;background-color:transparent;border-bottom-color: blanchedalmond;border-top:0px;border-left: 0px;border-right: 0px;border-radius: 0px;">
						
						
							</div>
							<div class="col-md-12">
								<div class="card" style="border: 1px solid black; ">   
									<div class="card-header bg-info">DATOS DE PROCEDENCIA</div>
									<div class="card-body" >
										<div class="row">
											<div class="col-md-4 form-group">
												<label for="AgendarpaisProcedencia">País:</label>
												<select class="form-control "  id="AgendarpaisProcedencia" onchange="Javscript: seleccionPais('AgendarpaisProcedencia','AgendardptoProcedencia','AgendarmnpoProcedencia');" ng-model="AgendarpaisProcedencia" name="AgendarpaisProcedencia" style="color:black;" required>
													<option  ></option>
												</select>
											</div>
											<div class="col-md-4 form-group" >
												<label for="AgendardptoProcedencia">Departamento</label>
												<div id="AgendardptoProcedenciadiv">

												</div>
												<!-- <input   type="text" class="form-control " id="AgendardptoProcedencia" ng-model="AgendardptoProcedencia" name="AgendardptoProcedencia" required>
												<select   class="form-control hide" id="AgendardptoProcedencia" ng-change="cargarMnpoAdmision(1)" ng-model="AgendardptoProcedencia" name="AgendardptoProcedencia" required> 
												 
												</select>
												-->		
											</div>
											<div class="col-md-4 form-group" >
												<label for="AgendarmnpoProcedencia">Municipio:</label>
												<div id="AgendarmnpoProcedenciadiv">

												</div>
												<!-- <input ng-show="!AgendardptoProc" type="text" class="form-control" id="AgendarmnpoProcedencia" ng-model="AgendarmnpoProcedencia" name="AgendarmnpoProcedencia" required>
												<select ng-show="AgendardptoProc" class="form-control text-uppercase" id="AgendarmnpoProcedencia" ng-model="AgendarmnpoProcedencia" name="AgendarmnpoProcedencia" required> 
													
												</select> -->
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="card" style="margin-top:1%;border: 1px solid black; ">
									<div class="card-header bg-info">DATOS DE RESIDENCIA EN COLOMBIA</div>
									<div class="card-body" >
										<div class="row">
											<div class="col-md-12 form-group">
												<label for="AgendarPaisResidencia">País</label>
												<select class="form-control" id="AgendarPaisResidencia"   name="AgendarPaisResidencia"> 
													<option value="45" >COLOMBIA</option>
													<option value="NA" >NA</option>
												</select>
											</div>
											<div class="col-md-6 form-group">
												<label for="AgendardptoResidencia">Departamento</label>
												<select class="form-control" id="AgendardptoResidencia" onchange="Javascript: seleccionDpto(`AgendarPaisResidencia`,`AgendardptoResidencia`,`AgendarmnpoResidencia`);" required  name="AgendardptoResidencia"> 
												</select>
											</div>
											<div class="col-md-6 form-group">
												<label for="AgendarmnpoResidencia">Municipio:</label>
												<select class="form-control" id="AgendarmnpoResidencia" ng-model="AgendarmnpoResidencia" name="AgendarmnpoResidencia" required> 
																
												</select>
											</div>
											<div class="col-md-12 form-group">
												<label for="AgendardireccionResidencia">Dirección:</label>
												<input type="text" class="form-control" id="AgendardireccionResidencia" ng-model="AgendardireccionResidencia" name="AgendardireccionResidencia" required>
						
											</div>
											<div class="col-md-6 form-group">
												<label for="AgendarzonaResidencia">Zona:</label>
												<select class="form-control" id="AgendarzonaResidencia" ng-model="AgendarzonaResidencia" name="AgendarzonaResidencia" required> 
																
																<option></option>
																<option value="RURAL">RURAL</option>
																<option value="URBANO">URBANO</option>
						
															</select>
											</div>
											<div class="col-md-6 form-Telefono">
												<label for="Agendartelefono">Telefono:</label>
												<input class="form-control" type="number" id="Agendartelefono" ng-model="Agendartelefono" name="Agendartelefono" >
											</div>
											<div class="col-md-12 form-Telefono">
												<label for="AgendarOtraDireccion">Otra Dirección: (notificar para pendulares)</label>
												<input class="form-control" type="text" id="AgendarOtraDireccion" ng-model="AgendarOtraDireccion" name="AgendarOtraDireccion" >
											</div>
										</div>
									</div>
								</div>
							</div>
						
							<div class="col-md-6 form-group">
								<label for="Agendarstatus_migratorio">Status Migratorio:</label>
								<select class="form-control" id="Agendarstatus_migratorio" ng-model="Agendarstatus_migratorio" name="Agendarstatus_migratorio" required> 
										
										<option></option>
										<option value="REGULAR">REGULAR</option>
										<option value="IRREGULAR">IRREGULAR</option> 
									</select>
							</div>
							<div class="col-md-6 form-group">
								<label for="AgendarperfilPacie">Perfil:</label>
								<select class="form-control" id="AgendarperfilPacie" ng-model="AgendarperfilPacie" name="AgendarperfilPacie" > 
										
										<option></option>
										<option value="REFUGIADO">REFUGIADO</option>
										<option value="APATRIDA">APÁTRIDA</option> 
										<option value="MENORES DE EDAD NO ACOMPANADOS">MENORES DE EDAD NO ACOMPAÑADOS</option> 
										<option value="MENORES SEPARADOS">MENORES SEPARADOS</option> 
										<option value="MIGRANTE ECONOMICO">MIGRANTE ECONOMICO</option> 
										<option value="NINGUNO">NINGUNO</option> 
									</select>
							</div>
							<div class="col-md-8 form-group text-center">
								<label for="AgendarmovilidadPacie">Movilidad:</label>
								<select class="form-control" id="AgendarmovilidadPacie" onchange="Javascript: seleccTipoMovilidad('AgendarmovilidadPacie','AgendartipoMoviliPAc');" name="AgendarmovilidadPacie" required> 
										
										<option></option>
										<option value="EMIGRAR">EMIGRAR</option>
										<option value="INMIGRAR">INMIGRAR</option> 
										<option value="RETORNAR">RETORNAR</option> 
										<option value="PENDULAR">PENDULAR</option> 
										<option value="DESPLAZAMIENTO">DESPLAZAMIENTO</option> 
										<option value="PERMANECER">PERMANECER</option> 
									</select>
							</div>
							<div class="col-md-4 form-group ">
								<label for="AgendartipoMoviliPAc">Tipo Desplazamiento:</label>
								<select class="form-control"  disabled id="AgendartipoMoviliPAc"  name="AgendartipoMoviliPAc" required style="margin-top:4%;"> 
										
										<option></option>
										<option value="INTERNO">INTERNO</option>
										<option value="EXTERNO">EXTERNO</option>  
									</select>
							</div>
						
							<div class="col-md-12 form-group"  >
								<label for="AgendarBDUA">Verificación de derecho BDUA:</label>
								<select class="form-control" id="AgendarBDUA" onchange="Javascript: seleccBDUA('AgendarBDUA','Agendareapb');" name="AgendarBDUA" style="width:100%;"> 
										<option></option> 
										<option value="ASEGURADO">ASEGURADO</option>
										<option value="NO ASEGURADO">NO ASEGURADO</option>
										<option value="BENEFICICARIO SISBEN">BENEFICICARIO  SISBEN</option>
									</select>
							</div>
							<div class="col-md-12 form-group" ng-show="AgendarvalBDUA()">
								<label for="Agendareapb">EAPB:</label>
								<input type="text" class="form-control" id="Agendareapb" ng-model="Agendareapb" name="Agendareapb" disabled style="width:100%;"> 
								
							</div>
							<div class="col-md-12 form-group">
								<label for="AgendartipoPoblacion">Tipo población:</label>
								<select class="form-control" id="AgendartipoPoblacion" ng-model="AgendartipoPoblacion" name="AgendartipoPoblacion" style="width:100%;"> 
										<option></option> 
										<option value="COLOMBIANO RETORNADO">COLOMBIANO RETORNADO</option>
										<option value="COMUNIDAD RECEPTORA">COMUNIDAD RECEPTORA</option>
										<option value="MIGRANTE">MIGRANTE</option>
									</select>
							</div>
							
							<div class="col-md-12 form-group">
								<label for="AgendartiemrpoingresoColo">Hace cuanto tiempo ingreso a colombia:</label>
								<input type="text" class="form-control" id="AgendartiemrpoingresoColo" ng-model="AgendartiemrpoingresoColo" name="AgendartiemrpoingresoColo" style="width:100%;">  
							</div>
							<div class="col-md-12 form-group">
								<label for="Agendarregimen">Regimen:</label>
								<select class="form-control text-uppercase" id="Agendarregimen" ng-model="Agendarregimen" name="Agendarregimen" required> 
									
									<option ></option> 
									<option value="1">1 - Contributivo</option>
									<option value="1">1 - Contributivo</option>
									<option value="2">2 - Subsidiado</option>
									<option value="3">3 - Vinculado</option>
									<option value="4">4 - Particular</option>
									<option value="5">5 - Otro</option>
									<option value="6">6 - Víctima con afiliación al Régimen Contributivo</option>
									<option value="7">7 - Víctima con afiliación al Régimen subsidiado</option>
									<option value="8">8 - Víctima no asegurado (Vinculado)</option>
								</select>
							</div>
							<div class="col-md-6 form-group">
								<label for="AgendarperEtnica">Pertenencia etnica:</label>
								 
								<select class="form-control"id="AgendarperEtnica" onchange="Javascript: seleccPertEtnica('AgendarperEtnica','AgendarpueIndigena');" name="AgendarperEtnica" required>
										
									<option ></option> 
									<option   value="1">NEGRO, MULATO, AFROCOLOMBIANO</option> 
									<option   value="2">PALENQUERO</option> 
									<option   value="3">ROOM (GITANO)</option> 
									<option   value="4">INDIGENA</option> 
									<option   value="5">RAIZAL</option> 
									<option   value="6">OTRO</option> 
									
										 
								</select>
							</div>
							<div class="col-md-6	 form-group">
								<label for="AgendarpueIndigena">Pueblo indigena:</label>
								<select class="form-control" id="AgendarpueIndigena" disabled name="AgendarpueIndigena" required> 
									
								</select>
							</div>
							<div class="col-md-12    form-group">
								<label for="AgendarcorreoElec">Correo Electrónico:</label>
								<input type="email" class="form-control" id="AgendarcorreoElec" ng-model="AgendarcorreoElec" name="AgendarcorreoElec" >   
							</div>  
							<div class="col-md-4    form-group">
								<label for="AgendarremitidoP">Remitido?:</label>
								<Select class="form-control" id="AgendarremitidoP" ng-model="AgendarremitidoP" name="AgendarremitidoP" > 
									<option></option>
									<option value="SI">SI</option>
									<option value="NO">NO</option>
								</Select>  
							</div>
							<div class="col-md-8    form-group">
							   
								<label for=""></label>
								<textarea class="form-control" id="AgendarremitidoPDesc" ng-model="AgendarremitidoPDesc" name="AgendarremitidoPDesc" placeholder="de donde..."></textarea>  
							</div>
							<div class="col-md-12">
								<h4>Aviso legal</h4>
								<p style="text-align: justify; text-justify: inter-word;">
								  POR FAVOR LEA CON ATENCION ESTE AVISO
								  LEGAL  ANTES DE FORMALIZAR SU REGISTRO.
								</p>
						
								<p style="text-align: justify; text-justify: inter-word;">
								  Con el registro de sus datos personales en este aplicativo, usted está manifestando su consentimiento libre, expreso e informado, en los términos de la ley de protección de datos personales (Ley 1581 de 2012) y su decretos reglamentarios, para que <label class="user-institucion"></label> almacene, administre y utilice los datos que tiene como finalidad, enviarle información relacionada con citas, actividades relacionadas con su salud o cualquier otra información relacionada con temas de nuestra institución.
								</p>
						
								<p style="text-align: justify; text-justify: inter-word;">
								  Si usted no esta de acuerdo con el contenido de este aviso legal, le solicitamos abstenerse de registrar
								  sus datos personales y comunicarse directamente para solicitar información.
								</p>
								<label class="label-checkbox " style="cursor: pointer;">
									<input type="checkbox" name="aceptaTerminosAdm" id="aceptaTerminosAdm"   >
									<span class="custom-checkbox"></span>
									Acepto
								</label>
								 
							</div>
							<div class="col-md-12">
								<br><br>
								<button  class="btn btn-success btn-sm btn-block btnReg" onclick="Javascript: registrarPaciente(1);"  >Registrar paciente</button>
							</div>
						
						</div> 
						 
					</div> 
				    <div class="modal-footer">
				        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
						
				    </div>
			  	</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
		<!--Modal-->
		<div class="modal fade" id="ambulatorio-modal">
            <div class="modal-dialog">
              	<div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4>Ambulatorio</h4>
                    </div>
                    <div class="panel-body">
                        
                      <div class="row">
                          <div class="col-md-6 form-group">
                              <label for="AdmnumHistClin">Numero Historia:</label>

                          </div>
                          <div class="col-md-6 form-group">
                              <input type="text" class="form-control" disabled id="numHistClin"  name="numHistClin" required>
                          </div>
                          <div class="col-md-6 form-group">
                              <label for="tipoidRegPac">Tipo ID:</label>
                              <select class="form-control" id="tipoidRegPac"  onchange="Javascript: cargaNumHistClinic('tipoidRegPac', 'idRegPac', 'numHistClin');"  name="tipoidRegPac" required>
                                  <option ></option>
                                  <option value="CC">CC -Cedula de Ciudadania</option>
                                  <option value="CE">CE - Cédula de extranjería</option>
                                  <option value="CD">CD - Carné diplomático</option>
                                  <option value="PA">PA - Pasaporte</option>
                                  <option value="SC">SC - Salvoconducto</option>
                                  <option value="PE">PE - Permiso Especial de Permanencia</option>
                                  <option value="RC">RC - Registro civil</option>
                                  <option value="TI">TI - Tarjeta de identidad</option> 
                                  <option value="CN">CN - Certificado de nacido vivo </option>
                                  <option value="AS">AS - Adulto sin identificar</option>
                                  <option value="MS">MS - Menor sin identificar</option>  
								  <option value="PPT">PPT - Permiso por Protección Temporal</option>  
                                  
                              </select>


                          </div>
                          <div class="col-md-6 form-group">
                              <label for="idRegPac">Identificación:</label>
                              <input class="form-control" type="text" id="idRegPac"   name="idRegPac" onkeyup="Javascript: cargaNumHistClinic('tipoidRegPac', 'idRegPac', 'numHistClin');"  required>
                          </div>
                          <div class="col-md-12" style="margin-top: auto;margin-bottom: auto;">
                              <a class="btn btn-info btn-block" onclick="Javascript:continuarRegistro();">Buscar</a>

                          </div>

                      </div> 
                      <div class="row text-center hide" id="contPaciente" >
                          <div class="col-md-6 form-group">			
                              <label for="otroDocumRep">Otro documento:</label>
                              <select id="otroDocumRep" ng-model="otroDocumRep" name="otroDocumRep" onchange="Javascript: numOtroDocument('otroDocumRep','otroDocumRepNum');" class="form-control" required> 
                                  <option ></option>
                                  <option value="RAMV">RAMV (REGISTRO ADMINISTRATIVO DE MIGRANTES VENEZOLANOS)</option>
                                  <option value="SALVO CONDUCTO DE PERMANENCIA">SALVO CONDUCTO DE PERMANENCIA</option>
                                  <option value="TARJETA DE MOVILIDAD FRONTERIZA" >TARJETA DE MOVILIDAD FRONTERIZA</option>
                                  <option value="SALVO CONDUCTO DE SALIDA" >SALVO CONDUCTO DE SALIDA</option>
                                  <option value="VISA MIGRANTE" >VISA MIGRANTE</option>
                                  <option value="VISA DE RESIDENTE">VISA DE RESIDENTE</option>
                                  <option value="VISA DE VISITANTE">VISA DE VISITANTE</option>
                                  <option value="PERMISO DE INGRESO Y PERMANENCIA" >PERMISO DE INGRESO Y PERMANENCIA</option>
                                  <option value="ACTA DE NACIMIENTO" >ACTA DE NACIMIENTO</option>
								  <option value="CEDULA PAIS DE ORIGEN" >CEDULA PAIS DE ORIGEN</option>
                                  <option value="NINGUNO" >NINGUNO</option>
                              </select>
                      
                          </div>
                          <div class="col-md-6 form-group">			
                              <label for="otroDocumRepNum"># Otro documento:</label>
                              <input type="text" id="otroDocumRepNum"  name="otroDocumRepNum" class="form-control" disabled> 
                                   
                      
                          </div>
                          <div class="col-md-3 form-group">			
                              <label for="rumv">RUMV:</label>
                              <select id="rumv"   name="rumv" onchange="Javascript: seleccrumv('rumv','rumvNum');" class="form-control" required> 
                                  <option ></option>
                                  <option value="SI">SI</option>
                                  <option value="NO">NO</option>
                                   
                              </select>
                      
                          </div>
                          <div class="col-md-3 form-group">			
                              <label for="rumvNum"># RUMV:</label>
                              <input type="number" id="rumvNum"  name="rumvNum" class="form-control" disabled > 
                                   
                      
                          </div>
                          <div class="col-md-3 form-group">			
                              <label for="PPT">PPT:</label>
                              <select id="PPT"  name="PPT" onchange="Javascript: seleccppt('PPT','PPTNum');" class="form-control" required> 
                                  <option ></option>
                                  <option value="SI">SI</option>
                                  <option value="NO">NO</option>
                                   
                              </select>
                      
                          </div>
                          <div class="col-md-3 form-group">			
                              <label for="PPTNum"># PPT:</label>
                              <input type="number" id="PPTNum"  name="PPTNum" class="form-control" disabled> 
                                   
                      
                          </div>
                          <div class="col-md-4 form-group">
                              <label for="nombres">Nombres:</label>
                              <input class="form-control" type="text" id="nombres" ng-model="nombres" name="nombres" required>
                      
                      
                          </div>
                          <div class="col-md-4 form-group">
                              <label for="papellido">Primer apellido:</label>
                              <input class="form-control" type="text" id="papellido" ng-model="papellido" name="papellido" required>
                          </div>
                          <div class="col-md-4 form-group">
                              <label for="sapellido">Segundo apellido:</label>
                              <input class="form-control" type="text" id="sapellido" ng-model="sapellido" name="sapellido" >
                          </div>
                          <div class="col-md-4 form-group">
                              <label for="estCivil">Estado civil:</label>
                              <select class="form-control" id="estCivil" ng-model="estCivil" name="estCivil" required> 
                                  <option ></option>
                                  <option value="SOLTERO">SOLTERO</option>
                                  <option value="CASADO">CASADO</option>
                                  <option value="VIUDO">VIUDO</option>
                                  <option value="DIVORCIADO">DIVORCIADO</option>
                                  <option value="UNION LIBRE">UNION LIBRE</option>  
                              </select>
                          </div>
                          <div class="col-md-4 form-group">
                              <label for="sexo">Sexo:</label>
                              <select class="form-control" id="sexo" ng-model="sexo" name="sexo" required> 
                                  <option ></option>
                                  <option value="F">FEMENINO</option>
                                  <option value="M">MASCULINO</option>
                              </select>
                          </div>
                          <div class="col-md-4 form-group">
                              <label for="fecNac">Fecha de nacimiento:</label>
                              <input class="form-control" onchange="Javascript: calcularEdad('fecNac','edad')" type="date" id="fecNac" ng-model="fecNac" name="fecNac" required>
                          </div>
                          <div class="col-md-12 form-group   justify-content-center ">
                              <label for="edad">edad:</label>
                              <input class="form-control text-info justify-content-center " type="text" readonly id="edad" ng-model="edad" name="edad" style="text-align:center;background-color:transparent;border-bottom-color: blanchedalmond;border-top:0px;border-left: 0px;border-right: 0px;border-radius: 0px;">
                      
                      
                          </div>
                          <div class="col-md-12">
                              <div class="card" style="border: 1px solid black; ">   
                                  <div class="card-header bg-info">DATOS DE PROCEDENCIA</div>
                                  <div class="card-body" >
                                      <div class="row">
                                          <div class="col-md-4 form-group">
                                              <label for="paisProcedencia">País:</label>
                                              <select class="form-control "  id="paisProcedencia" onchange="Javscript: seleccionPais('paisProcedencia','dptoProcedencia','mnpoProcedencia');" ng-model="paisProcedencia" name="paisProcedencia" style="color:black;" required>
                                                  <option  ></option>
                                              </select>
                                          </div>
                                          <div class="col-md-4 form-group" >
                                              <label for="dptoProcedencia">Departamento</label>
                                              <div id="dptoProcedenciadiv">

                                              </div>
                                              <!-- <input   type="text" class="form-control " id="dptoProcedencia" ng-model="dptoProcedencia" name="dptoProcedencia" required>
                                              <select   class="form-control hide" id="dptoProcedencia" ng-change="cargarMnpoAdmision(1)" ng-model="dptoProcedencia" name="dptoProcedencia" required> 
                                               
                                              </select>
                                              -->		
                                          </div>
                                          <div class="col-md-4 form-group" >
                                              <label for="mnpoProcedencia">Municipio:</label>
                                              <div id="mnpoProcedenciadiv">

                                              </div>
                                              <!-- <input ng-show="!dptoProc" type="text" class="form-control" id="mnpoProcedencia" ng-model="mnpoProcedencia" name="mnpoProcedencia" required>
                                              <select ng-show="dptoProc" class="form-control text-uppercase" id="mnpoProcedencia" ng-model="mnpoProcedencia" name="mnpoProcedencia" required> 
                                                  
                                              </select> -->
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="card" style="margin-top:1%;border: 1px solid black; ">
                                  <div class="card-header bg-info">DATOS DE RESIDENCIA EN COLOMBIA</div>
                                  <div class="card-body" >
                                      <div class="row">
                                          <div class="col-md-12 form-group">
                                              <label for="PaisResidencia">País</label>
                                              <select  class="form-control" id="PaisResidencia"   name="PaisResidencia"> 
												<option value="45" selected>COLOMBIA</option>
												<option value="NA" selected>NA</option>
                                              </select>
                                          </div>
                                          <div class="col-md-6 form-group">
                                              <label for="dptoResidencia">Departamento</label>
                                              <select class="form-control" id="dptoResidencia" onchange="Javascript: seleccionDpto(`PaisResidencia`,`dptoResidencia`,`mnpoResidencia`);" required  name="dptoResidencia"> 
                                              </select>
                                          </div>
                                          <div class="col-md-6 form-group">
                                              <label for="mnpoResidencia">Municipio:</label>
                                              <select class="form-control" id="mnpoResidencia" ng-model="mnpoResidencia" name="mnpoResidencia" required> 
                                                              
                                              </select>
                                          </div>
                                          <div class="col-md-12 form-group">
                                              <label for="direccionResidencia">Dirección:</label>
                                              <input type="text" class="form-control" id="direccionResidencia" ng-model="direccionResidencia" name="direccionResidencia" required>
                      
                                          </div>
                                          <div class="col-md-6 form-group">
                                              <label for="zonaResidencia">Zona:</label>
                                              <select class="form-control" id="zonaResidencia" ng-model="zonaResidencia" name="zonaResidencia" required> 
                                                              
                                                              <option></option>
                                                              <option value="RURAL">RURAL</option>
                                                              <option value="URBANO">URBANO</option>
                      
                                                          </select>
                                          </div>
                                          <div class="col-md-6 form-Telefono">
                                              <label for="telefono">Telefono:</label>
                                              <input class="form-control" type="number" id="telefono" ng-model="telefono" name="telefono" >
                                          </div>
                                          <div class="col-md-12 form-Telefono">
                                              <label for="OtraDireccion">Otra Dirección: (notificar para pendulares)</label>
                                              <input class="form-control" type="text" id="OtraDireccion" ng-model="OtraDireccion" name="OtraDireccion" >
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      
                          <div class="col-md-6 form-group">
                              <label for="status_migratorio">Status Migratorio:</label>
                              <select class="form-control" id="status_migratorio" ng-model="status_migratorio" name="status_migratorio" required> 
                                      
                                      <option></option>
                                      <option value="REGULAR">REGULAR</option>
                                      <option value="IRREGULAR">IRREGULAR</option> 
                                  </select>
                          </div>
                          <div class="col-md-6 form-group">
                              <label for="perfilPacie">Perfil:</label>
                              <select class="form-control" id="perfilPacie" ng-model="perfilPacie" name="perfilPacie" > 
                                      
                                      <option></option>
                                      <option value="REFUGIADO">REFUGIADO</option>
                                      <option value="APATRIDA">APÁTRIDA</option> 
                                      <option value="MENORES DE EDAD NO ACOMPANADOS">MENORES DE EDAD NO ACOMPAÑADOS</option> 
                                      <option value="MENORES SEPARADOS">MENORES SEPARADOS</option> 
                                      <option value="MIGRANTE ECONOMICO">MIGRANTE ECONOMICO</option> 
                                      <option value="NINGUNO">NINGUNO</option> 
                                  </select>
                          </div>
                          <div class="col-md-8 form-group text-center">
                              <label for="movilidadPacie">Movilidad:</label>
                              <select class="form-control" id="movilidadPacie" onchange="Javascript: seleccTipoMovilidad('movilidadPacie','tipoMoviliPAc');" name="movilidadPacie" required> 
                                      
                                      <option></option>
                                      <option value="EMIGRAR">EMIGRAR</option>
                                      <option value="INMIGRAR">INMIGRAR</option> 
                                      <option value="RETORNAR">RETORNAR</option> 
                                      <option value="PENDULAR">PENDULAR</option> 
                                      <option value="DESPLAZAMIENTO">DESPLAZAMIENTO</option> 
                                      <option value="PERMANECER">PERMANECER</option> 
                                  </select>
                          </div>
                          <div class="col-md-4 form-group ">
                              <label for="tipoMoviliPAc">Tipo Desplazamiento:</label>
                              <select class="form-control"  disabled id="tipoMoviliPAc"  name="tipoMoviliPAc" required style="margin-top:4%;"> 
                                      
                                      <option></option>
                                      <option value="INTERNO">INTERNO</option>
                                      <option value="EXTERNO">EXTERNO</option>  
                                  </select>
                          </div>
                      
                          <div class="col-md-12 form-group"  >
                              <label for="BDUA">Verificación de derecho BDUA:</label>
                              <select class="form-control" id="BDUA" onchange="Javascript: seleccBDUA('BDUA','eapb');" name="BDUA" style="width:100%;"> 
                                      <option></option> 
                                      <option value="ASEGURADO">ASEGURADO</option>
                                      <option value="NO ASEGURADO">NO ASEGURADO</option>
                                      <option value="BENEFICICARIO SISBEN">BENEFICICARIO  SISBEN</option>
                                  </select>
                          </div>
                          <div class="col-md-12 form-group" ng-show="valBDUA()">
                              <label for="eapb">EAPB:</label>
                              <input type="text" class="form-control" id="eapb" ng-model="eapb" name="eapb" disabled style="width:100%;"> 
                               
                          </div>
                          <div class="col-md-12 form-group">
                              <label for="tipoPoblacion">Tipo población:</label>
                              <select class="form-control" id="tipoPoblacion" ng-model="tipoPoblacion" name="tipoPoblacion" style="width:100%;"> 
                                      <option></option> 
                                      <option value="COLOMBIANO RETORNADO">COLOMBIANO RETORNADO</option>
                                      <option value="COMUNIDAD RECEPTORA">COMUNIDAD RECEPTORA</option>
                                      <option value="MIGRANTE">MIGRANTE</option>
                                  </select>
                          </div>
                          
                          <div class="col-md-12 form-group">
                              <label for="tiemrpoingresoColo">Hace cuanto tiempo ingreso a colombia:</label>
                              <input type="text" class="form-control" id="tiemrpoingresoColo" ng-model="tiemrpoingresoColo" name="tiemrpoingresoColo" style="width:100%;">  
                          </div>
                          <div class="col-md-12 form-group">
                              <label for="regimen">Regimen:</label>
                              <select class="form-control text-uppercase" id="regimen" ng-model="regimen" name="regimen" required> 
                                  
                                  <option ></option>  
								  <option value="1">1 - Contributivo</option>
                                  <option value="2">2 - Subsidiado</option>
                                  <option value="3">3 - Vinculado</option>
                                  <option value="4">4 - Particular</option>
                                  <option value="5">5 - Otro</option>
                                  <option value="6">6 - Víctima con afiliación al Régimen Contributivo</option>
                                  <option value="7">7 - Víctima con afiliación al Régimen subsidiado</option>
                                  <option value="8">8 - Víctima no asegurado (Vinculado)</option>
                              </select>
                          </div>
                          <div class="col-md-6 form-group">
                              <label for="perEtnica">Pertenencia etnica:</label>
                               
                              <select class="form-control"id="perEtnica" onchange="Javascript: seleccPertEtnica('perEtnica','pueIndigena');" name="perEtnica" required>
                                      
                                  <option ></option> 
                                  <option   value="1">NEGRO, MULATO, AFROCOLOMBIANO</option> 
                                  <option   value="2">PALENQUERO</option> 
                                  <option   value="3">ROOM (GITANO)</option> 
                                  <option   value="4">INDIGENA</option> 
                                  <option   value="5">RAIZAL</option> 
                                  <option   value="6">OTRO</option> 
                                  
                                       
                              </select>
                          </div>
                          <div class="col-md-6	 form-group">
                              <label for="pueIndigena">Pueblo indigena:</label>
                              <select class="form-control" id="pueIndigena" disabled name="pueIndigena" required> 
                                  
                              </select>
                          </div>
                          <div class="col-md-12    form-group">
                              <label for="correoElec">Correo Electrónico:</label>
                              <input type="email" class="form-control" id="correoElec" ng-model="correoElec" name="correoElec" >   
                          </div>  
                          <div class="col-md-4    form-group">
                              <label for="remitidoP">Remitido?:</label>
                              <Select class="form-control" id="remitidoP" ng-model="remitidoP" name="remitidoP" > 
                                  <option></option>
                                  <option value="SI">SI</option>
                                  <option value="NO">NO</option>
                              </Select>  
                          </div>
                          <div class="col-md-8    form-group">
                             
                              <label for=""></label>
                              <textarea class="form-control" id="remitidoPDesc" ng-model="remitidoPDesc" name="remitidoPDesc" placeholder="de donde..."></textarea>  
                          </div>
                          <div class="col-md-12">
                              <h4>Aviso legal</h4>
                              <p style="text-align: justify; text-justify: inter-word;">
                                POR FAVOR LEA CON ATENCION ESTE AVISO
                                LEGAL  ANTES DE FORMALIZAR SU REGISTRO.
                              </p>
                      
                              <p style="text-align: justify; text-justify: inter-word;">
                                Con el registro de sus datos personales en este aplicativo, usted está manifestando su consentimiento libre, expreso e informado, en los términos de la ley de protección de datos personales (Ley 1581 de 2012) y su decretos reglamentarios, para que <label class="user-institucion"></label> almacene, administre y utilice los datos que tiene como finalidad, enviarle información relacionada con citas, actividades relacionadas con su salud o cualquier otra información relacionada con temas de nuestra institución.
                              </p>
                      
                              <p style="text-align: justify; text-justify: inter-word;">
                                Si usted no esta de acuerdo con el contenido de este aviso legal, le solicitamos abstenerse de registrar
                                sus datos personales y comunicarse directamente para solicitar información.
                              </p>
                              <label class="label-checkbox " style="cursor: pointer;">
                                  <input type="checkbox" name="aceptaTerminos" id="aceptaTerminos"   >
                                  <span class="custom-checkbox"></span>
                                  Acepto
                              </label>
                               
                          </div>
						  <div class="col-md-12"><br><br>
							<button   class="btn btn-success btn-sm btnReg " onclick="Javascript: registrarPaciente(2);" >Registrar paciente</button>
						  </div>
                      
                      </div> 
                       
                  	</div> 
					<div class="modal-footer">
						<button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
						
					</div>
                </div><!-- /.modal-content -->
          	</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<div class="modal fade" id="regAdmision-modal">
			<div class="modal-dialog">
			  	<div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4>Registrar Admision</h4>
					</div>
					<div class="modal-body">
                        <input type="number" class="fade" disabled ng-model="AgendarID" name="AgendarID" id="AgendarID">
                        <input type="number" class="fade" disabled ng-model="AgendarIDJSON" name="AgendarIDJSON" id="AgendarIDJSON">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="AgendartipoidRegPacAdmision">Tipo ID:</label>
                                <select class="form-control" disabled id="AgendartipoidRegPacAdmision" ng-model="AgendartipoidRegPacAdmision" name="AgendartipoidRegPacAdmision" required>
									<option ></option>
									<option value="CC">CC -Cedula de Ciudadania</option>
										<option value="CE">CE - Cédula de extranjería</option>
										<option value="CD">CD - Carné diplomático</option>
										<option value="PA">PA - Pasaporte</option>
										<option value="SC">SC - Salvoconducto</option>
										<option value="PE">PE - Permiso Especial de Permanencia</option>
										<option value="RC">RC - Registro civil</option>
										<option value="TI">TI - Tarjeta de identidad</option> 
										<option value="CN">CN - Certificado de nacido vivo </option>
										<option value="AS">AS - Adulto sin identificar</option>
										<option value="MS">MS - Menor sin identificar</option>  
										<option value="PPT">PPT - Permiso por Protección Temporal</option>  
									
								</select>


                            </div>
                            <div class="col-md-6 form-group">
                                <label for="AgendaridRegPacAdmision">Identificación:</label>
                                <input class="form-control" disabled type="text" id="AgendaridRegPacAdmision" ng-model="AgendaridRegPacAdmision" name="AgendaridRegPacAdmision" required>
                            </div>
                            <div class="col-md-8 form-group">
                                <label for="AgendarotroDocumRepAdmision">Otro documento:</label>
                                <select id="AgendarotroDocumRepAdmision" disabled ng-model="AgendarotroDocumRepAdmision" name="AgendarotroDocumRepAdmision" class="form-control" required> 
									<option ></option>
									<option value="RAMV">RAMV (REGISTRO ADMINISTRATIVO DE MIGRANTES VENEZOLANOS)</option>
									<option value="SALVO CONDUCTO DE PERMANENCIA">SALVO CONDUCTO DE PERMANENCIA</option>
									<option value="TARJETA DE MOVILIDAD FRONTERIZA" >TARJETA DE MOVILIDAD FRONTERIZA</option>
									<option value="SALVO CONDUCTO DE SALIDA" >SALVO CONDUCTO DE SALIDA</option>
									<option value="VISA MIGRANTE" >VISA MIGRANTE</option>
									<option value="VISA DE RESIDENTE">VISA DE RESIDENTE</option>
									<option value="VISA DE VISITANTE">VISA DE VISITANTE</option>
									<option value="PERMISO DE INGRESO Y PERMANENCIA" >PERMISO DE INGRESO Y PERMANENCIA</option>
									<option value="ACTA DE NACIMIENTO" >ACTA DE NACIMIENTO</option>
									<option value="CEDULA PAIS DE ORIGEN" >CEDULA PAIS DE ORIGEN</option>
									<option value="NINGUNO" >NINGUNO</option>
								</select>

                            </div>
                            <div class="col-md-4 form-group">
                                <label for="AgendarSexo">Sexo:</label>
                                <select id="AgendarSexo" disabled ng-model="AgendarSexo " name="AgendarSexo" class="form-control" required> 
									<option ></option>
									<option value="M">MASCULINO</option>
									<option value="F">FEMENINO</option> 
								</select>

                            </div>
                            <div class="col-md-12 form-group">
                                <label for="AgendarNombresAdmision">Nombres:</label>
                                <input type="text" id="AgendarNombresAdmision" disabled ng-model="AgendarNombresAdmision" name="AgendarNombresAdmision" class="form-control" required>


                            </div>
                            <div class="col-md-12	 form-group">
                                <label for="AgendarpprofeAgendarAdmision">PROFESIONAL A AGENDAR:</label>
                                <select class="form-control" id="AgendarpprofeAgendarAdmision"  name="AgendarpprofeAgendarAdmision" required> 
									
								</select>
                            </div>
                            <div class="col-md-12	 form-group">
                                <label for="AgendarServicioAdmision">Servicio a agendar:</label>
                                <select class="form-control" id="AgendarServicioAdmision" ng-model="AgendarServicioAdmision" name="AgendarServicioAdmision" required> 
									<option></option>
                                    <option  value="CONSULTAS Y SEGUIMIENTOS GENERAL"> CONSULTAS Y SEGUIMIENTOS GENERAL</option>
                                    <option  value="CONSULTAS Y SEGUIMIENTOS ENFERMERIA"> CONSULTAS Y SEGUIMIENTOS ENFERMERIA</option>
                                    <option  value="CONSULTAS Y SEGUIMIENTOS NUTRICIONAL"> CONSULTAS Y SEGUIMIENTOS NUTRICIONAL</option>
                                    <option  value="CONSULTAS Y SEGUIMIENTOS PSICOLOGIA"> CONSULTAS Y SEGUIMIENTOS PSICOLOGIA</option>
									<option  value="CONSULTAS Y SEGUIMIENTOS ADULTO"> CONSULTAS Y SEGUIMIENTOS ADULTO</option>
									<option  value="CONSULTAS Y SEGUIMIENTOS MENOR">CONSULTAS Y SEGUIMIENTOS MENOR</option>
									<option ng-show="AgendarSexo=='F'" value="CONSULTAS Y SEGUIMIENTOS PRENATAL">CONSULTAS Y SEGUIMIENTOS PRENATAL</option>
								</select>
                            </div>
                            <div class="col-md-6	 form-group">
                                <label for="AgendarFechaAgendarAdmision">FECHA AGENDAR:</label>
                                <input type="date" class="form-control" id="AgendarFechaAgendarAdmision" ng-model="AgendarFechaAgendarAdmision" name="AgendarFechaAgendarAdmision" required>
                            </div>
                            <div class="col-md-6	 form-group">
                                <label for="AgendarHoraAgendarAdmision">HORA AGENDAR:</label>
                                <input type="time" class="form-control" id="AgendarHoraAgendarAdmision" ng-model="AgendarHoraAgendarAdmision" name="AgendarHoraAgendarAdmision" required>
                            </div>
                        </div>

                    </div>
					<div class="modal-footer">
						<button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
						<button class="btn btn-success btn-sm" onclick="Javascript: registrarAdmision();">Registrar admision</button>
					</div>
				</div><!-- /.modal-content -->
		  	</div><!-- /.modal-dialog -->
	  	</div><!-- /.modal -->
		<div class="modal fade" id="agenda-modal">
  			<div class="modal-dialog modal-lg">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>Agenda</h4>
      				</div>
				    <div class="modal-body">
						<div class="panel panel-default table-responsive">
							<div class="panel-heading">
								Listado de pacientes en agenda
								<span class="btn btn-info pull-right btn-xs" style="cursor:pointer;" onclick="Javascript: listarAgenda();"><i class="fa fa-refresh fa-lg"></i>Actualizar</span>
							</div>
							<div class="padding-md clearfix">
								<table class="table table-striped" id="listadoAgenda">
									<thead>
										<tr>
											<th>Profesional</th>
											<th>Tipo ID</th>
											<th># ID</th>
											<th>Nombres</th>
											<th>Tipo consulta</th>
											<th>Fecha</th>
											<th>Hora</th>
											<th>Acción</th>
										</tr>
									</thead>
									<tbody id="listadoAgendaBody">
										<tr>
											<td colspan="8">SIN DATOS</td>
											 
										</tr>
								  
									</tbody>
								</table>
							</div><!-- /.padding-md -->
						</div><!-- /panel -->
				    </div>
				    <div class="modal-footer">
				        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Cerrar</button> 
				    </div>
			  	</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<div class="modal fade" id="RIPS-modal">
  			<div class="modal-dialog modal-lg">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>RIPS</h4>
      				</div>
				    <div class="modal-body"> 
						<div class="panel panel-default">
							<div class="panel-heading">
								GENERACION RIPS
							</div>
							<div class="panel-body no-padding">
								<div class="tab-left">
									<ul class="tab-bar">
										<li class="active"><a href="#ripslocal" data-toggle="tab"><i class="fa fa-home"></i>LOCAL</a></li>
										<li ><a href="#ripsservidor" data-toggle="tab" ><i class="fa fa-home" ></i>SERVIDOR</a></li>
									
									</ul>
									<div class="tab-content">
										<div class="tab-pane fade in active" id="ripslocal">
											<form action="Javascript: generarRIPS();" class="row">
												<div class="col-md-6 form-group">
													<label for="idRegPac">Código del prestador de servicios de salud:</label>
													<input class="form-control" type="text" id="rips-codprest"   name="rips-codprest" onkeyup="Javascript: cargaNumHistClinic('tipoidRegPac', 'idRegPac', 'numHistClin');"  required>
												</div>
												<div class="col-md-6 form-group">
													<label for="idRegPac">Razón social o apellidos y nombre del prestador de servicios de salud:</label>
													<input class="form-control" type="text" id="rips-nombrePres"   name="rips-nombrePres" onkeyup="Javascript: cargaNumHistClinic('tipoidRegPac', 'idRegPac', 'numHistClin');"  required>
												</div>
												<div class="col-md-6 form-group">
													<label for="idRegPac">Tipo de identificación del prestador de servicios de salud:</label>
													<select class="form-control"  id="rips-tipoidPres"   name="rips-tipoidPres" onkeyup="Javascript: cargaNumHistClinic('tipoidRegPac', 'idRegPac', 'numHistClin');"  required>
														<option></option>
														<option value="NI">NI=Número de identificación tributaria – NIT</option>
														<option value="CC">CC=Cédula de Ciudadanía </option>
														<option value="CE">CE=Cédula de Extranjería </option>
														<option value="CD">CD=Carné diplomático </option>
														<option value="PA">PA= Pasaporte</option>
														<option value="PE">PE=Permiso Especial de Permanencia </option>
													</select>
												</div>
												<div class="col-md-6 form-group">
													<label for="idRegPac">Número de identificación del prestador:</label>
													<input class="form-control" type="text" id="rips-numidPres"   name="rips-numidPres" onkeyup="Javascript: cargaNumHistClinic('tipoidRegPac', 'idRegPac', 'numHistClin');"  required>
												</div>
												<div class="col-md-6 form-group">
													<label for="idRegPac">Código entidad administradora:</label>
													<input class="form-control" type="text" id="rips-codentPres"   name="rips-codentPres" onkeyup="Javascript: cargaNumHistClinic('tipoidRegPac', 'idRegPac', 'numHistClin');"  required>
												</div>
												<div class="col-md-6 form-group">
													<label for="idRegPac">Nombre entidad administradora:</label>
													<input class="form-control" type="text" id="rips-nombrentPres"   name="rips-nombrentPres" onkeyup="Javascript: cargaNumHistClinic('tipoidRegPac', 'idRegPac', 'numHistClin');"  required>
												</div>
												<div class="col-md-4 form-group">
													<label>Año:</label>
													<select id="anoReporrtRipsUS" class="form-control"  name="anoReporrtRipsUS" required>
														<option></option>
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
														<option value="2030">2030</option>
														<option value="2031">2031</option>
													</select>
												</div>
												<div class="col-md-4 form-group">
													<label>Mes inicio:</label>
													<select id="mesReporrtRipsUS" class="form-control"  namE="mesReporrtRipsUS" required>
														<option></option>
														<option value="01">Enero</option>
														<option value="02">Febrero</option>
														<option value="03">Marzo</option>
														<option value="04">Abril</option>
														<option value="05">Mayo</option>
														<option value="06">Junio</option>
														<option value="07">Julio</option>
														<option value="08">Agosto</option>
														<option value="09">Septiembre</option>
														<option value="10">Octubre</option>
														<option value="11">Noviembre</option>
														<option value="12">Diciembre</option> 
													</select>	
												</div>
												<div class="col-md-4 form-group text-center">
													<label>RIPS</label>
													<input type="submit"   class="btn btn-success form-control" value="Generar archivos"> 
												</div>
					
											</form>  
										
										</div>
										<div class="tab-pane fade " id="ripsservidor">
											<form action="Javascript: generarRIPSServidor();" class="row">
												<div class="col-md-6 form-group">
													<label for="idRegPac">Código del prestador de servicios de salud:</label>
													<input class="form-control" type="text" id="Serverrips-codprest"   name="Serverrips-codprest" onkeyup="Javascript: cargaNumHistClinic('tipoidRegPac', 'idRegPac', 'numHistClin');"  required>
												</div>
												<div class="col-md-6 form-group">
													<label for="idRegPac">Razón social o apellidos y nombre del prestador de servicios de salud:</label>
													<input class="form-control" type="text" id="Serverrips-nombrePres"   name="Serverrips-nombrePres" onkeyup="Javascript: cargaNumHistClinic('tipoidRegPac', 'idRegPac', 'numHistClin');"  required>
												</div>
												<div class="col-md-6 form-group">
													<label for="idRegPac">Tipo de identificación del prestador de servicios de salud:</label>
													<select class="form-control"  id="Serverrips-tipoidPres"   name="Serverrips-tipoidPres" onkeyup="Javascript: cargaNumHistClinic('tipoidRegPac', 'idRegPac', 'numHistClin');"  required>
														<option></option>
														<option value="NI">NI=Número de identificación tributaria – NIT</option>
														<option value="CC">CC=Cédula de Ciudadanía </option>
														<option value="CE">CE=Cédula de Extranjería </option>
														<option value="CD">CD=Carné diplomático </option>
														<option value="PA">PA= Pasaporte</option>
														<option value="PE">PE=Permiso Especial de Permanencia </option>
													</select>
												</div>
												<div class="col-md-6 form-group">
													<label for="idRegPac">Número de identificación del prestador:</label>
													<input class="form-control" type="text" id="Serverrips-numidPres"   name="Serverrips-numidPres" onkeyup="Javascript: cargaNumHistClinic('tipoidRegPac', 'idRegPac', 'numHistClin');"  required>
												</div>
												<div class="col-md-6 form-group">
													<label for="idRegPac">Código entidad administradora:</label>
													<input class="form-control" type="text" id="Serverrips-codentPres"   name="Serverrips-codentPres" onkeyup="Javascript: cargaNumHistClinic('tipoidRegPac', 'idRegPac', 'numHistClin');"  required>
												</div>
												<div class="col-md-6 form-group">
													<label for="idRegPac">Nombre entidad administradora:</label>
													<input class="form-control" type="text" id="Serverrips-nombrentPres"   name="Serverrips-nombrentPres" onkeyup="Javascript: cargaNumHistClinic('tipoidRegPac', 'idRegPac', 'numHistClin');"  required>
												</div>
												<div class="col-md-4 form-group">
													<label>Año:</label>
													<select id="ServeranoReporrtRipsUS" class="form-control"  name="ServeranoReporrtRipsUS" required>
														<option></option>
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
														<option value="2030">2030</option>
														<option value="2031">2031</option>
													</select>
												</div>
												<div class="col-md-4 form-group">
													<label>Mes inicio:</label>
													<select id="ServermesReporrtRipsUS" class="form-control"  name="ServermesReporrtRipsUS" required>
														<option></option>
														<option value="01">Enero</option>
														<option value="02">Febrero</option>
														<option value="03">Marzo</option>
														<option value="04">Abril</option>
														<option value="05">Mayo</option>
														<option value="06">Junio</option>
														<option value="07">Julio</option>
														<option value="08">Agosto</option>
														<option value="09">Septiembre</option>
														<option value="10">Octubre</option>
														<option value="11">Noviembre</option>
														<option value="12">Diciembre</option> 
													</select>	
												</div>
												<div class="col-md-4 form-group text-center">
													<label>RIPS</label>
													<input type="submit"   class="btn btn-success form-control" value="Generar archivos"> 
												</div>
					
											</form>  
								
										</div>
										
										
									</div>
								</div>
							</div>
						</div>
						
					 
				    </div>
				    <div class="modal-footer">
				        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button> 
				    </div>
			  	</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<div class="modal fade" id="usuarios-modal">
  			<div class="modal-dialog modal-lg">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>Administración</h4>
      				</div>
				    <div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Administración GIMMIDS
									</div>
									<div class="panel-body no-padding">
										<div class="tab-left">
											<ul class="tab-bar">
												<li class="active"><a href="#usuariosAdminRegistrar" data-toggle="tab"><i class="fa fa-home"></i>Registrar Usuario</a></li>
												<li ><a href="#usuariosAdmin" data-toggle="tab" onclick="Javascript: listarUsuariosGimmids();"><i class="fa fa-home" ></i>Listado Usuarios</a></li>
												<li><a href="#medicamentosAdminRegistrar" data-toggle="tab"><i class="fa fa-pencil"></i>Registrar Medicamento</a></li>
												<li><a href="#medicamentosAdmin" data-toggle="tab"><i class="fa fa-pencil"></i>Listado Medicamentos</a></li>
												
											</ul>
											<div class="tab-content">
												<div class="tab-pane fade in " id="usuariosAdmin">
													<label>Listado de usuarios GIMMIDS</label>
													<table class="table table-striped" id="listadoUsuarios">
														<thead style="font-size:12px;">
															<tr role="row">
																<!--<th  rowspan="2">ACCION</th>-->
																<th rowspan="2">Tipo ID</th>
																<th rowspan="2"># ID
																</th><th rowspan="2">NOMBRES</th>
																<th rowspan="2">PROFESION</th>
																<th rowspan="2">REG. PROFESIONAL</th>
																<th rowspan="2">INSTITUCION</th>
																<th rowspan="2">USUARIO</th>
																<th rowspan="2">CONTRASEÑA</th>
																<th rowspan="2">DIRECCION</th>
																<th colspan="5" class="text-center" >PERMISOS</th>
																
																 
				
															</tr>
															<tr role="row">
																
																<th >AGENDAR</th>
																<th >REGISTRO</th>
																<th >PROCEDIMIENTOS</th>
																<th >INFORMES</th>
																<th >USUARIOS</th> 
				
															</tr>
														</thead>
														<tbody id="listadoUsuariosBody">
															<tr>
																<td colspan="14">SIN DATOS</td>
																
															</tr>
													
														</tbody>
													</table>
													
													 
												
												</div>
												<div class="tab-pane fade in active" id="usuariosAdminRegistrar">
													<label>Registro de usuarios GIMMIDS</label>
													<div class="row">
														<div class="col-md-6 form-group" style="font-size:10px"> 
															<label>Tipo ID</label> 
															<select  id="tipoid_user" name="tipoid_user" class="form-control">
																<option></option>
																<option value="CC">CC -Cedula de Ciudadania</option>
																<option value="CE">CE - Cédula de extranjería</option>
																<option value="CD">CD - Carné diplomático</option>
																<option value="PA">PA - Pasaporte</option>
																<option value="SC">SC - Salvoconducto</option>
																<option value="PE">PE - Permiso Especial de Permanencia</option>
																<option value="RC">RC - Registro civil</option>
																<option value="TI">TI - Tarjeta de identidad</option> 
																<option value="CN">CN - Certificado de nacido vivo </option>
																<option value="AS">AS - Adulto sin identificar</option>
																<option value="MS">MS - Menor sin identificar</option>  
																<option value="PPT">PPT - Permiso por Protección Temporal</option>  
																
															</select>
														</div>
												 
														<div class="col-md-6 form-group" style="font-size:10px"> 
															<label># ID</label>
														 
															<input type="text"   id="numid_user" name="numid_user" class="form-control">
														</div>
													</div>
													<div class="row">
														<div class="col-md-12 form-group" style="font-size:10px"> 
															<label>Nombres</label>
														 
															<input type="text" ng-model="nombres_user" id="nombres_user" name="nombres_user" class="form-control">
														</div>
													</div>
													<div class="row">
														<div class="col-md-6 form-group" style="font-size:10px"> 
															<label>Profesion</label>
														 
															<select ng-model="profesion_user" id="profesion_user" name="profesion_user" class="form-control">
																<option></option>
																<option value="1">1 = Médico (a) especialista</option>
																<option value="2">2 = Médico (a) general</option>
																<option value="3">3 = Enfermera (o)</option>
																<option value="4">4 = Auxiliar de enfermería</option>
																<option value="5">5 = Otro</option>
															</select>
														</div> 
														<div class="col-md-6" style="font-size:10px"> 
															<label>Reg. Profesional</label>
														 
															<input type="text"  id="regprof_user" name="regprof_user" class="form-control">
														</div>
													</div>
													<div class="row">
														<div class="col-md-6" style="font-size:10px"> 
															<label>Institución</label>
													 
															<input type="text"  id="insti_user" name="insti_user" class="form-control">
														</div>
													 
														<div class="col-md-6" style="font-size:10px"> 
															<label>Direccion</label>
														 
															<input type="text" ng-model="direccion_user" id="direccion_user" name="direccion_user" class="form-control" >
														</div>
													</div>
													<div class="row">
														<div class="col-md-6" style="font-size:10px"> 
															<label>Usuario</label>
													 
															<input type="text" ng-model="user_user" id="user_user" name="user_user" class="form-control">
														</div>
													 
														<div class="col-md-6" style="font-size:10px"> 
															<label>Contraseña</label>
													 
															<input type="text" ng-model="pass_user" id="pass_user" name="pass_user" class="form-control">
														</div>
													</div>
													<div class="row " >
														<div class="col-md-12 " > 
															<label>Permisos</label>
													 		
														</div>
														<div class="col-md-4 " > 
															 <label class="label-checkbox " style="cursor: pointer;"><input type="checkbox"   id="permiso_agendar" name="permiso_agendar" ><span class="custom-checkbox"></span>Agendar y Registrar</label>
															
														</div>
														<div class="col-md-4 " > 
															 
															<label class="label-checkbox " style="cursor: pointer;"><input type="checkbox"   id="permiso_registro" name="permiso_registro" ><span class="custom-checkbox"></span>Realizar Consultas</label>
															
														</div>
														<div class="col-md-4 " > 
															 
															<label class="label-checkbox " style="cursor: pointer;"><input type="checkbox"   id="permiso_procedimientos" name="permiso_procedimientos" ><span class="custom-checkbox"></span>Procedimientos</label>
															
														</div>
														<div class="col-md-4 " > 
															 
															<label class="label-checkbox " style="cursor: pointer;"><input type="checkbox"   id="permiso_informes" name="permiso_informes" ><span class="custom-checkbox"></span>RIPS</label>
															
														</div>
														<div class="col-md-4 " > 
															 
															<label class="label-checkbox " style="cursor: pointer;"><input type="checkbox"   id="permiso_usuarios" name="permiso_usuarios" ><span class="custom-checkbox"></span>Administracción</label>
														</div>
														
													</div>		
													<div class="row" style="margin-top:2%;">
														<div class="col-md-12">
															<button class="btn btn-success btn-block" onclick="Javascript: registrarUsuarioGimmids();">
																Registrar Usuario
															</button>
	
														</div>
														
													</div>	
										
												</div>
												<div class="tab-pane fade" id="medicamentosAdminRegistrar">
													<label>Registro de medicamento GIMMIDS</label>
													 
													<div class="row">
														<div class="col-md-6 form-group" style="font-size:10px"> 
															<label>COD</label> 
															<input type="text" id="cod-medicamento" name="cod-medicamento" class="form-control">
																 
														</div>
												 
														<div class="col-md-6 form-group" style="font-size:10px"> 
															<label>Nombre medicamento</label>
														 
															<input type="text"   id="nombre-medicamento" name="nombre-medicamento" class="form-control">
														</div>
													</div>
													<div class="row" style="margin-top:2%;">
														<div class="col-md-12">
															<button class="btn btn-success btn-block" onclick="Javascript: registrarMedicamentoGimmids();">
																Registrar Medicamento
															</button>
	
														</div>
														
													</div>	
												</div>
												<div class="tab-pane fade" id="medicamentosAdmin">
													<label>Listado de medicamentos GIMMIDS</label>
													<table class="table table-striped" id="listadoMedicamentos">
														<thead>
															<tr>
																<th>Codigo</th>
																<th>Nombre</th>
																<th>Acción</th> 
														 
															</tr>
														</thead>
														<tbody id="listadoMedicamentosBody">
															<tr>
																<td colspan="3">SIN DATOS</td>
																
															</tr>
													
														</tbody>
													</table>		
														 
													
														 
												</div>
												 
											</div>
										</div>
									</div>
								</div><!-- /panel -->
							</div><!-- /.col --> 
						</div>
				    </div>
				    <div class="modal-footer">
				        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
						
					</div>
			  	</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<div class="modal fade" id="registrarUsuario-modal">
  			<div class="modal-dialog">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>Create new folder</h4>
      				</div>
				    <div class="modal-body">
				        <form>
							<div class="form-group">
								<label for="folderName">Folder Name</label>
								<input type="text" class="form-control input-sm" id="folderName" placeholder="Folder name here...">
							</div>
						</form>
				    </div>
				    <div class="modal-footer">
				        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
						<a href="../#" class="btn btn-danger btn-sm">Save changes</a>
				    </div>
			  	</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<div class="modal fade" id="registrarMedicamento-modal">
  			<div class="modal-dialog">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>Create new folder</h4>
      				</div>
				    <div class="modal-body">
				        <form>
							<div class="form-group">
								<label for="folderName">Folder Name</label>
								<input type="text" class="form-control input-sm" id="folderName" placeholder="Folder name here...">
							</div>
						</form>
				    </div>
				    <div class="modal-footer">
				        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
						<a href="../#" class="btn btn-danger btn-sm">Save changes</a>
				    </div>
			  	</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<div class="modal fade" id="servidor-modal">
  			<div class="modal-dialog modal-lg">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>SERVIDOR</h4>
      				</div>
				    <div class="modal-body">
				        
						<div class="panel panel-default">
							<div class="panel-heading">
								Servidor GIMMIDS
							</div>
							<div class="panel-heading">
								<form class="form-inline no-margin" action="Javascript: abrirServidor();">
									<div class="form-group">
										<label class="">Mes</label>
										<select class="form-control input-sm" placeholder="mes" id="mes_servidor" name="mes_servidor">
											<option></option>
											<option value="01">Enero</option>
											<option value="02">Febrero</option>
											<option value="03">Marzo</option>
											<option value="04">Abril</option>
											<option value="05">Mayo</option>
											<option value="06">Junio</option>
											<option value="07">Julio</option>
											<option value="08">Agosto</option>
											<option value="09">Septiembre</option>
											<option value="10">Octubre</option>
											<option value="11">Noviembre</option>
											<option value="12">Diciembre</option> 
										</select>
									</div><!-- /form-group -->
									<div class="form-group">
										<label class="">Año</label>
										<select class="form-control input-sm" placeholder="año" id="ano_servidor" name="ano_servidor">
											<option></option> 
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
											<option value="2030">2030</option>
											<option value="2031">2031</option>
										</select>
									</div><!-- /form-group -->
									  
									<button type="submit" class="btn btn-sm btn-success">Consultar</button>
								</form>
							</div>
							<div class="panel-body no-padding">
								 
								<div class="tab-left">
									<ul class="tab-bar">
										<li class="active"><a href="#listadoPacientesServer" data-toggle="tab"><i class="fa fa-home"></i>Listado pacientes</a></li>
										<li ><a href="#listadoConsultassServer" data-toggle="tab"  ><i class="fa fa-home" ></i>Listado consultas</a></li>
										<li ><a href="#listadoConsultassServer2" data-toggle="tab"  ><i class="fa fa-home" ></i>Listado consultas 2</a></li>
										<li ><a href="#listadoConsultassServer3" data-toggle="tab"  ><i class="fa fa-home" ></i>Listado consultas Sanidad</a></li>
										
									</ul>
									<div class="tab-content">
										<div class="tab-pane fade in active" id="listadoPacientesServer">
											<div class="row">
												<div class="col-md-6">
													<label>Listado de pacientes GIMMIDS</label>

												</div>
												<div class="col-md-6">
													<button onclick="exportTableToExcel('Pacientes servidor')" class="btn btn-success">Exportar .XLSX</button>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													
													<table class="table table-striped" id="listadoPacientesServerTabla">
														<thead style="font-size:12px;">
															<tr role="row">
																<th>TIPO ID</th>
																<th>IDENTIFICACIÓN</th>
																<th>Otro documento</th> 
																<th>NOMBRES</th>
																<th>Estado civil</th>
																<th>SEXO</th>
																<th>FECHA NACIMIENTO</th>
																<th>STATUS</th> 
																<th>TIPO POBLACION</th> 
																<th>Perfil</th> 
																<th>Movilidad</th> 
																<th>TELEFONO</th> 
																<th>DIRECCIÓN </th> 
																<th>ZONA </th> 
																<th>PAIS PROCEDENCIA</th> 
																<th>DPTO PROCEDENCIA</th> 
																<th>MNP PROCEDENCIA</th> 
																<th>BDUA</th>  
																<th>EAPB</th>   
																<th> tiempo ingreso a colombia.</th>
																<th>Regimen</th>  
																<th>Pertenencia etnica.</th>   
																<th>EMAIL.</th>  
																<th>Fecha registro</th>
																	
				
															</tr> 
														</thead>
														<tbody id="listadoPacientesServerTablaBody">
															<tr>
																<td colspan="23">SIN DATOS</td>
																
															</tr>
													
														</tbody>
													</table>
											

												</div>
											</div>
												
										
										</div>
											
										<div class="tab-pane fade" id="listadoConsultassServer">
											<div class="row">
												<div class="col-md-6">
													<label>Listado de consultas GIMMIDS</label>

												</div>
												<div class="col-md-6">
													<button onclick="exportTableToExcel('Consultas servidor')" class="btn btn-success">Exportar .XLSX</button>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
											
													<table class="table table-striped" id="listadoConsultassServerTabla">
														<thead>
															<tr>
																<th>TIPO CONSULTA</th>
																<th>FECHA CONSULTA</th>
																<th>TIPO ID</th>
																<th>IDENTIFICACIÓN</th>
																<th>Otro documento</th> 
																<th>NOMBRES</th>
																<th>Estado civil</th>
																<th>SEXO</th>
																<th>FECHA NACIMIENTO</th>
																<th>STATUS</th> 
																<th>TIPO POBLACION</th> 
																<th>Perfil</th> 
																<th>Movilidad</th> 
																<th>TELEFONO</th> 
																<th>DIRECCIÓN </th> 
																<th>ZONA </th> 
																<th>PAIS PROCEDENCIA</th> 
																<th>DPTO PROCEDENCIA</th> 
																<th>MNP PROCEDENCIA</th> 
																<th>BDUA</th>  
																<th>EAPB</th>   
																<th> tiempo ingreso a colombia.</th>
																<th>Regimen</th>  
																<th>Pertenencia etnica.</th>   
																<th>EMAIL.</th>  
																<th>NOMBRES</th>
																<th>TIPO ID</th>
																<th>IDENTIFICACION</th>
																<th>MOTIVO CONSULTA</th>
																<th>TIPO CONSULTA</th>
																<th>FINALIDAD</th> 
																<th>CAUSA EXTERNA</th> 
																<th>DIAGNOSTICOS</th>  
																<th>Tipo Dx Principal</th> 
																<th>PROFESIONAL ATIENDE</th>  
															
															</tr>
														</thead>
														<tbody id="listadoConsultassServerTablaBody">
															<tr>
																<td colspan="35">SIN DATOS</td>
																
															</tr>
													
														</tbody>
													</table>	
												</div>
											</div>	
													
											
													
										</div>
										<div class="tab-pane fade" id="listadoConsultassServer2">
											<div class="row">
												<div class="col-md-6">
													<label>Listado de consultas</label>

												</div>
												<div class="col-md-6">
													<button onclick="exportTableToExcel('Consultas servidor2')" class="btn btn-success">Exportar .XLSX</button>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
											
													<table class="table table-striped" id="listadoConsultassServerTabla2">
														<thead>
															<tr>
																<th>Municipio</th>
																<th>Punto de Atención</th>
																<th>Fecha (mm/dd/aa)</th>
																<th>Nacionalidad</th> 
																<th>Tipo de Documento</th> 
																<th>Numero de Documento</th> 
																<th>Nombres</th> 
																<th>Apellidos</th> 
																<th>Sexo</th> 
																<th>Fecha de Nacimiento (mm/dd/aa)</th> 
																<th>Edad</th> 
																<th>Discapacidad</th> 
																<th>Perfil Migratorio</th> 
																<th>Ciudad de residencia</th> 
																<th>Barrio</th> 
																<th>Direccion</th> 
																<th>Teléfono</th> 
																<th>Servicio Planificación</th> 
																<th>Metodo Anticonceptivo</th> 
																<th>Clasificación Riesgo Obstétrico</th> 
																<th>Antecedentes Ginecológicos</th> 
																<th>Fecha de la última menstruación (dd/mm/aa)</th> 
																<th>¿ Recibio apoyo por fondos de Vulnerabilidad?</th> 
																<th>Monto Recibido</th> 
																<th>Donante asociado al monto entregado</th> 
																<th># Payment  de la legalizacion</th> 
																<th>Criterio de Atención</th> 
																<th>Observación</th> 
																<th>Profesional que Atiende</th>  
															
															</tr>
														</thead>
														<tbody id="listadoConsultassServerTablaBody2">
															<tr>
																<td colspan="28">SIN DATOS</td>
																
															</tr>
													
														</tbody>
													</table>	
												</div>
											</div>	
													
											
													
										</div>
										<div class="tab-pane fade" id="listadoConsultassServer3">
											<div class="row">
												<div class="col-md-6">
													<label>Listado de consultas</label>

												</div>
												<div class="col-md-6">
													<button onclick="exportTableToExcel('Consultas servidor3')" class="btn btn-success">Exportar .XLSX</button>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
											
													<table class="table table-striped" id="listadoConsultassServerTabla3">
														<thead>
															<tr> 
																<th>Fecha</th>  
																<th>CAS</th>  
																<th>Municipio</th>  
																<th>FEcha nacimiento</th>  
																<th>Nombre</th> 
																<th>Tipo id</th>   
																<th># id</th>  
																<th>Edad</th>  
																<th>U. edad</th>  
																<th>Grupo edad</th>  
																<th>Pais destino</th>  
																<th>Telefono</th>  
																<th>Genero</th>  
																<th>Nacionalidad</th>  
																<th>Fecha ingreso</th>  
																<th>Estado de movilidad</th>  
																<th>Pais procedencia</th>  
																<th>Municipio Procedencia</th>  
																<th>Ciudad destino</th>  
																<th>EMbarazada</th>  
																<th>Meses embarazo</th>  
																<th>Afiliacion Sis. salud</th>  
																<th>EPS</th>  
																<th>Condicion</th>  
																<th>Tipo discapacidad</th>  
																<th>Enfermedad base</th>  
																<th>Otra enfermedad</th>  
																<th>Servicio brindado</th>  
																<th>CIE10</th>  
																<th>CIE10 descripción</th>  
																<th>Cooperante</th>  
																<th>Profesional</th>   
															
															</tr>
														</thead>
														<tbody id="listadoConsultassServerTablaBody3">
															<tr>
																<td colspan="33">SIN DATOS</td>
																
															</tr>
													
														</tbody>
													</table>	
												</div>
											</div>	
													
											
													
										</div>
											
									</div>
								</div>
							</div>
						</div><!-- /panel -->
				    </div>
				    <div class="modal-footer">
				        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button> 
				    </div>
			  	</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<div class="modal fade" id="bases-modal">
  			<div class="modal-dialog modal-lg">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>BASES</h4>
      				</div>
				    <div class="modal-body">
				        <div class="panel panel-default">
							<div class="panel-heading">
								Bases GIMMIDS
							</div>
							<div class="panel-body no-padding">
								<div class="tab-left">
									<ul class="tab-bar">
										<li class="active"><a href="#listadoPacientesBase" data-toggle="tab"><i class="fa fa-home"></i>Listado pacientes</a></li>
										<li ><a href="#listadoConsultassBase" data-toggle="tab"  ><i class="fa fa-home" ></i>Listado consultas</a></li>
										
									</ul>
									<div class="tab-content">
										<div class="tab-pane fade in active" id="listadoPacientesBase">
											<div class="row">
												<div class="col-md-6">
													<label>Listado de pacientes GIMMIDS</label>

												</div>
												<div class="col-md-6">
													<button onclick="exportTableToExcel('Pacientes local')" class="btn btn-success">Exportar .XLSX</button>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<table class="table table-striped" id="listadoPacientesBaseTabla">
														<thead style="font-size:12px;">
															<tr role="row">
																<th>TIPO ID</th>
																<th>IDENTIFICACIÓN</th>
																<th>Otro documento</th> 
																<th>NOMBRES</th>
																<th>Estado civil</th>
																<th>SEXO</th>
																<th>FECHA NACIMIENTO</th>
																<th>STATUS</th> 
																<th>TIPO POBLACION</th> 
																<th>Perfil</th> 
																<th>Movilidad</th> 
																<th>TELEFONO</th> 
																<th>DIRECCIÓN </th> 
																<th>ZONA </th> 
																<th>PAIS PROCEDENCIA</th> 
																<th>DPTO PROCEDENCIA</th> 
																<th>MNP PROCEDENCIA</th> 
																<th>BDUA</th>  
																<th>EAPB</th>   
																<th> tiempo ingreso a colombia.</th>
																<th>Regimen</th>  
																<th>Pertenencia etnica.</th>   
																<th>EMAIL.</th>  
																<th>Fecha registro.</th>  
																	
				
															</tr> 
														</thead>
														<tbody id="listadoPacientesBaseTablaBody">
															<tr>
																<td colspan="23">SIN DATOS</td>
																
															</tr>
													
														</tbody>
													</table>
												</div>
											</div>
											
												
										
										</div>
											
										<div class="tab-pane fade" id="listadoConsultassBase">
											<div class="row">
												<div class="col-md-6">
													<label>Listado de consultas GIMMIDS</label>

												</div>
												<div class="col-md-6">
													<button onclick="exportTableToExcel('Consultas local')" class="btn btn-success">Exportar .XLSX</button>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<table class="table table-striped" id="listadoConsultassBaseTabla">
														<thead>
															<tr>
																<th>TIPO CONSULTA</th>
																<th>FECHA CONSULTA</th>
																<th>NOMBRES</th>
																<th>TIPO ID</th>
																<th>IDENTIFICACION</th>
																<th>MOTIVO CONSULTA</th>
																<th>TIPO CONSULTA</th>
																<th>FINALIDAD</th> 
																<th>CAUSA EXTERNA</th> 
																<th>DIAGNOSTICOS</th>  
																<th>Tipo Dx Principal</th> 
																<th>PROFESIONAL ATIENDE</th>  
															
															</tr>
														</thead>
														<tbody id="listadoConsultassBaseTablaBody">
															<tr>
																<td colspan="12">SIN DATOS</td>
																
															</tr>
													
														</tbody>
												
													</table>
												</div>
											</div>
													
											
													
										</div>
											
									</div>
								</div>
							</div>
						</div><!-- /panel -->
				    </div>
				    <div class="modal-footer">
				        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button> 
				    </div>
			  	</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<div class="modal fade" id="newFolder">
  			<div class="modal-dialog">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>Create new folder</h4>
      				</div>
				    <div class="modal-body">
				        <form>
							<div class="form-group">
								<label for="folderName">Folder Name</label>
								<input type="text" class="form-control input-sm" id="folderName" placeholder="Folder name here...">
							</div>
						</form>
				    </div>
				    <div class="modal-footer">
				        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
						<a href="../#" class="btn btn-danger btn-sm">Save changes</a>
				    </div>
			  	</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<div class="modal fade" id="COMPARAR-modal">
  			<div class="modal-dialog">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>Create new folder</h4>
      				</div>
				    <div class="modal-body">
				         
				    </div>
				    <div class="modal-footer">
				        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
						<a href="../#" class="btn btn-danger btn-sm">Save changes</a>
				    </div>
			  	</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div><!-- /wrapper -->

	<a href="../" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
	
	<!-- Logout confirmation -->
	<div class="custom-popup width-100" id="logoutConfirm">
		<div class="padding-md">
			<h4 class="m-top-none">Seguro de cerrar sesión?</h4>
		</div>

		<div class="text-center">
			<a class="btn btn-success m-right-sm" href="#" onclick="Javascript:localStorage.removeItem('user'); window.location.href='../index.html'">Cerrar sesión</a>
			<a class="btn btn-danger logoutConfirm_close">Cancelar</a>
		</div>
	</div>
	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
	<!-- Jquery -->
	<script src="../js/jquery-1.10.2.min.js"></script>

	<!-- Bootstrap -->
    <script src="../bootstrap/js/bootstrap.js"></script>
   
	<!-- Flot -->
	<script src='../js/jquery.flot.min.js'></script>
   
	<!-- Morris -->
	<script src='../js/rapheal.min.js'></script>	
	<script src='../js/morris.min.js'></script>	
	
	<!-- Colorbox -->
	<script src='../js/jquery.colorbox.min.js'></script>	

	<!-- Sparkline -->
	<script src='../js/jquery.sparkline.min.js'></script>
	
	<!-- Pace -->
	<script src='../js/uncompressed/pace.js'></script>
	
	<!-- Popup Overlay -->
	<script src='../js/jquery.popupoverlay.min.js'></script>
	
	<!-- Slimscroll -->
	<script src='../js/jquery.slimscroll.min.js'></script>
	
	<!-- Modernizr -->
	<script src='../js/modernizr.min.js'></script>
	
	<!-- Cookie -->
	<script src='../js/jquery.cookie.min.js'></script>
	
	<!-- Datatable -->
	<script src='../js/jquery.dataTables.min.js'></script>	

	 
	<!-- Perfect -->
	<script src="../js/app/app_dashboard.js"></script>
	<script src="../js/app/app.js"></script>
	<script>

		 
		const datos = {
		    user:  'asdasd'
		  };
		  console.log(datos);
			
	</script>
	
  </body>
</html>
