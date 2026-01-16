<?php
 	session_start();
 
    if(!isset($_SESSION['usuario'])){
        header('Location: ../../');
       
        
    }else{
		echo "<script>console.log('session iniciada');</script>";
    }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>GIMMIDS</title>
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
					 <li><i class="fa fa-dashboard"></i><a href="index.html"> Registrar Paciente</a></li> 
				</ul>
			</div><!-- /breadcrumb-->
		 
		 
			<div class="padding-md" > 
				<div class="row">
					<div class="col-lg-12">
						<div class="panel   fadeInDown animation-delay5" >
							
							<div class="panel-body">
								
								<div class="row">
									<div class="col-md-12">
										<h3 class="panel-title text-success text-center">
											<strong>USUARIOS</strong>
											 
										</h3> 
									</div>
									<div class="col-md-12">
										<ul class="nav nav-tabs">
											<li class="active"><a data-toggle="tab" href="#registrarUsuario">Registrar usuario </a></li>
											
										</ul>

										<div class="tab-content">
											<hr>
											<div id="registrarUsuario" class="tab-pane fade in active">
												<div class="row">
													<div class=" col-md-5 ">
														<form action="Javascript: registrarUsuario();"> 
															<div class="row">
																<div class="form-group col-md-6">
																	<label for="nonbres" >Nombre: </label>  
																	<input type="text" id="nonbres" class="form-control " required aria-describedby="numero">
																		
																</div> 
																<div class="form-group col-md-6">
																	<label for="apellidos" >Apellidos: </label>  
																	<input type="text" id="apellidos" class="form-control " required aria-describedby="numero">
																		
																</div> 
																<div class="form-group col-md-12">
																	<label for="id" >Identificación: </label>  
																	<input type="text"  id="id" class="form-control " required aria-describedby="numero">
																		
																</div> 
																<div class="form-group col-md-4">
																	<label for="sexo" >Sexo: </label>  
																	<select id="sexo" class="form-control " aria-describedby="numero" required>
																		<option></option>
																		<option value="FEMENINO">FEMENINO</option>
																		<option value="MASCULINO">MASCULINO</option>
																	</select>
																</div> 
																<div class="form-group col-md-4">
																	<label for="fechanaci">Fecha de Nacimiento</label>
																	
																	<input type="date" onchange="calcularEdad()" id="fechanaci" required class="form-control " aria-describedby="numero">
																	
																</div> 
															
																<div class="form-group col-md-4">
																	<label for="edad" >Edad: </label>  
																	<input type="text" readonly id="edad" class="form-control " required aria-describedby="numero">
																	
																</div> 
																<div class="form-group col-md-6">
																	<label for="cargo" >Cargo: </label>  
																	<input type="text"  id="cargo" class="form-control " required aria-describedby="numero">
																	
																</div> 
																<div class="form-group col-md-6">
																	<label for="mnpo" >Municipio: </label>  
																	<select id="mnpo" class="form-control " aria-describedby="mnpo" required>
																		<option></option>
																	</select>
																</div> 
																<div class="form-group col-md-6">
																	<label for="numcontacto" >Número de contacto: </label> 
																	
																	<input type="number" id="numcontacto" class="form-control " aria-describedby="numero" required>
																	
																</div> 
																<div class="form-group col-md-6">
																	<label for="rol" >Rol: </label> 
																	
																	<select id="rol" class="form-control " aria-describedby="rol" required>
																		<option></option>
																		<option value="DEPARTAMENTAL">DEPARTAMENTAL</option>
																		<option value="MUNICIPAL">MUNICIPAL</option>
																	</select>
																	
																</div> 
																<div class="form-group col-md-6">
																	<label for="email" >Correo electronico: </label>
																	
																	<input type="email" id="email" class="form-control " aria-describedby="numero" required>
																	
																</div> 
																<div class="form-group col-md-6">
																	<label for="pass" >Contraseña: </label> 
																	
																	<input type="text" class="form-control " aria-describedby="pass" id="pass" required>
																	
																</div>
																<div class="form-group col-md-12">
																	
																	
																	<input type="submit" class="btn btn-success btn-block" value="Registrar">
																	
																</div>
															</div>
														</form>
													</div>
													 <div class="col-md-7">
														<table class="table table-responsive" id="tablaUsuarios">
															<thead>
																<th>Nombres y Apellidos</th>
																<th>Identificacion</th>
																<th>Edad</th>
																<th>Sexo</th>
																<th>Cargo</th>
																<th>Municipio</th>
																<th><i class="lnr lnr-eye"></i></th>
															</thead>
															<tbody id="contUsuarios">

															</tbody>
														</table>                                                
													</div>
												</div>
												





												
											</div>
											<div id="listarUsuarios" class="tab-pane fade ">
												<div class="row">
													<div class="col-12">
														<table class="table table-responsive" id="tablaUsuarios">
															<thead>
																<th>Nombres y Apellidos</th>
																<th>Identificacion</th>
																<th>Edad</th>
																<th>Sexo</th>
																<th>Cargo</th>
																<th>Municipio</th>
																<th>Acción</th>
															</thead>
															<tbody id="contUsuarios">

															</tbody>
														</table>                                                
													</div>
												</div>
												


											</div>
											<div id="datosUsuarios" class="tab-pane fade ">
											
												
												<div class="row">
													<div class="col-12">
																							
													</div>
												</div>

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
									 
								</div><!-- /.row -->
							</div>
						</div><!-- /panel -->
								
					</div>
					 
				</div><!-- /.row -->
			</div><!-- /.padding-md -->
		</div><!-- /main-container -->
		<!-- Footer
		================================================== -->
		
		<!--Modal-->
		<div class="modal fade" id="simpleModal">
  			<div class="modal-dialog">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>Editar Usuario</h4>
      				</div>
				    <div class="modal-body">
				        <form action="Javascript: editarUsuario();"> 
							<div class="row">
								<div class="form-group col-md-6">
									<label for="Enonbres" >Nombre: </label>  
									<input type="text" id="Enonbres" class="form-control " required aria-describedby="numero">
										
								</div> 
								<div class="form-group col-md-6">
									<label for="Eapellidos" >Apellidos: </label>  
									<input type="text" id="Eapellidos" class="form-control " required aria-describedby="numero">
										
								</div> 
								<div class="form-group col-md-12">
									<label for="Eid" >Identificación: </label>  
									<input type="text"  id="Eid" class="form-control " required aria-describedby="numero">
										
								</div> 
								<div class="form-group col-md-6">
									<label for="Esexo" >Sexo: </label>  
									<select id="Esexo" class="form-control " aria-describedby="numero" required>
										<option></option>
										<option value="FEMENINO">FEMENINO</option>
										<option value="MASCULINO">MASCULINO</option>
									</select>
								</div> 
								<div class="form-group col-md-6">
									<label for="Efechanaci">Fecha de Nacimiento</label>
									
									<input type="date"   id="Efechanaci" required class="form-control " aria-describedby="numero">
									
								</div> 
							 
								<div class="form-group col-md-6">
									<label for="Ecargo" >Cargo: </label>  
									<input type="text"  id="Ecargo" class="form-control " required aria-describedby="numero">
									
								</div> 
								<div class="form-group col-md-6">
									<label for="Emnpo" >Municipio: </label>  
									<select id="Emnpo" class="form-control " aria-describedby="mnpo" required>
										<option></option>
									</select>
								</div> 
								<div class="form-group col-md-6">
									<label for="Enumcontacto" >Número de contacto: </label> 
									
									<input type="number" id="Enumcontacto" class="form-control " aria-describedby="numero" required>
									
								</div> 
								<div class="form-group col-md-6">
									<label for="Erol" >Rol: </label> 
									
									<select id="Erol" class="form-control " aria-describedby="rol" required>
										<option></option>
										<option value="DEPARTAMENTAL">DEPARTAMENTAL</option>
										<option value="MUNICIPAL">MUNICIPAL</option>
									</select>
									
								</div> 
								<div class="form-group col-md-6">
									<label for="Eemail" >Correo electronico: </label>
									
									<input type="email" id="Eemail" class="form-control " aria-describedby="numero" required>
									
								</div> 
								<div class="form-group col-md-6">
									<label for="Epass" >Contraseña: </label> 
									
									<input type="text" class="form-control " aria-describedby="pass" id="Epass" required>
									
								</div>
								<div class="form-group col-md-12">
									
									
									<input type="submit" class="btn btn-success btn-block" value="Editar">
									
								</div>
							</div>
						</form>
				    </div>
				    <div class="modal-footer">
				        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
						<a href="#" class="btn btn-danger btn-sm">Save changes</a>
				    </div>
			  	</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
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
	<script src="../../../js/app/app_administracion.js"></script>
	<script src="../../../js/app/app.js"></script>
	<script>
		
	</script>
	
  </body>
</html>
