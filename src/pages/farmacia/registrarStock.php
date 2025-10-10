<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>SISTB - Farmacia</title>
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
					 <li><i class="fa fa-dashboard"></i><a href="index.html"> Registrar STOCK</a></li> 
				</ul>
			</div><!-- /breadcrumb-->
		 
		 
			<div class="padding-md" > 
				<div class="row">
					<div class="col-lg-12">
						<div class="panel   fadeInDown animation-delay5" >
							
							<div class="panel-body">
								
								<div class="row">
									<div class="col-md-12">
										<center><h3 class="panel-title text-success "><strong>Registro Stock</strong></h3></center>
                
                  
	                  <div class="row">
	                    
	                    <div class="col-md-12 ">
	                        <ul class="nav nav-tabs">
	                            <li class="active"><a data-toggle="tab" href="#datosBasicos">Datos Basicos</a></li> 
	                            <li><a data-toggle="tab" href="#medicamentos">Medicamentos</a></li>
	                            <li><a data-toggle="tab" href="#observaciones">Observaciones    </a></li>
	                        </ul>

	                        <div class="tab-content">
	                            <div id="datosBasicos" class="tab-pane fade in active">
	                                <div class=" row">
	                                	<div class="col-md-8">
	                                		<div class="row">
	                                			<div class="form-group  col-md-6   "> 
	                                        <span>Fecha de Solicitud: </span>
	                                        <input type="date" class="form-control" id="fechaSolicitud"  > 
		                                    </div>
		                                    <div class="form-group col-md-6   "> 
		                                        <span>Municipio: </span>
		                                        <select class="form-control" id="mnpo"  >
		                                            <option> </option> 
		                                        </select>   
		                                    </div>
		                                    <div class="form-group col-md-6  ">
		                                        <span for="EAPBes">Nombre: </span> 
		                                        <input list="EAPB" name="EAPB" id="EAPBes" class="form-control "  >
		                                        <datalist id="EAPB">
		                                        
		                                        </datalist>
		                                    </div>
		                                    <div class="form-group col-md-6">
		                                        <span for="telefono">Telefono: </span>
		                                        
		                                            <input class="form-control" type="number" id="telefono">
		                                        
		                                    </div> 
	                                		</div>
	                                		
	                                	</div>
	                                	<div class="col-md-4">
	                                		<br>
	                                		<div class="panel panel-success consec">
	                                            <div class="panel-heading">
	                                                <center>
	                                                    <label>
	                                                        Autorización
	                                                    </label>
	                                                </center>
	                                            </div>
	                                            <div class="panel-body">
	                                                <center>
	                                                    <label id="consec" class="text-info">
	                                                        0
	                                                    </label>
	                                                </center>
	                                            </div>
	                                        </div>
	                                	</div>
	                                    
	                                </div>
	                                
	                                <div class=" row">
	                                    
	                                    <div class="panel panel-info">
	                                        <div class="panel-heading">
	                                            <center>
	                                                <label>
	                                                    FUNCIONARIO QUE REALIZA LA SOLICITUD
	                                                </label>
	                                            </center>
	                                        </div>
	                                        <div class="panel-body">
	                                            <center>
	                                                <div class=" row">
	                                                    <div class="form-group col-md-3">
	                                                        <label for="nombreFuncionario" >Nombres: </label>
	                                                        <input type="text" name="nombreFuncionario" id="nombreFuncionario" class="form-control "  >
	                                                    </div>
	                                                    <div class="form-group col-md-3">
	                                                        <label for="cargoFuncionario" >Cargo: </label>
	                                                        <input type="text" name="cargoFuncionario" id="cargoFuncionario" class="form-control "  >
	                                                    </div> 
	                                                    <div class="form-group col-md-3">
	                                                        <label for="instFuncionario" >Institución: </label>
	                                                        <input type="text" name="instFuncionario" id="instFuncionario" class="form-control "  >
	                                                    </div>
	                                                    <div class="form-group col-md-3">
	                                                        <label for="telefonoFuncionario" >Telefono: </label>
	                                                        <input type="number" name="telefonoFuncionario" id="telefonoFuncionario" class="form-control "  >
	                                                    </div>
	                                                </div>
	                                            </center>
	                                        </div>
	                                    </div>
	                                </div>
	                               
	                            </div>
	                           
	                            <div id="medicamentos" class="tab-pane fade">
	                                <div class="  row">
	                                    <div class="form-group col-md-3">
	                                        <span for="nombre-Medicamento">Nombre:</span>
	                                        <input type="text" class="form-control" readonly name="nombre-Medicamento" id="nombre-Medicamento">
	                                    </div>
	                                    <div class="form-group col-md-3">
	                                        <span for="presentacion-Medicamento">Presentación:</span>
	                                        <input type="text" class="form-control" readonly name="presentacion-Medicamento" id="presentacion-Medicamento">
	                                    </div>
	                                    <div class="form-group col-md-3 ">
	                                        <span for="concentracion-Medicamento">Concentración:</span>
	                                        <input type="text" class="form-control" readonly name="concentracion-Medicamento" id="concentracion-Medicamento">
	                                    </div>
	                                      
	                                    <div class="form-group col-md-3">
	                                        <span for="cantiAutor-Medicamento">Cantidad Autorizada:</span>
	                                        <input type="number"  min='0' class="form-control" name="cantiAutor-Medicamento" id="cantiAutor-Medicamento">
	                                    </div>
	                                    <div class="form-group col-md-3 ">
	                                        <span for="Lote-Medicamento">Lote:</span>
	                                        <input type="text" class="form-control" readonly name="Lote-Medicamento" id="Lote-Medicamento">
	                                    </div>
	                                    <div class="form-group col-md-3 ">
	                                        <span for="Laboratorio-Medicamento">Laboratorio:</span>
	                                        <input type="text" class="form-control" readonly name="Laboratorio-Medicamento" id="Laboratorio-Medicamento">
	                                    </div> 
	                                    <div class="form-group col-md-3">
	                                        <span for="fechaIngres-Medicamento">Fecha Ingreso Medicamento:</span>
	                                        <input type="date" class="form-control" readonly name="fechaIngres-Medicamento" id="fechaIngres-Medicamento">
	                                    </div>
	                                    <div class="form-group col-md-3">
	                                        <span for="fechaVencimi-Medicamento">Fecha Vencimiento Medicamento:</span>
	                                        <input type="date" class="form-control" readonly name="fechaVencimi-Medicamento" id="fechaVencimi-Medicamento">
	                                    </div>
	                                    
	                                     
	                                </div>
	                                <div class="  row">
	                                    <div class="form-group col-md-9 ">
	                                    
	                                    </div>
	                                    <div class="form-group col-md-12 ">
	                                        <a class="btn btn-success btn-block" onclick="Javascript: adjuntarMedicamento();">Adjuntar Medicamento</a>
	                                    </div>

	                                </div>
	                                <br>
	                                <div class="  row">
	                                    
	                                    <div class="panel panel-primary">
	                                        <div class="panel-heading">
	                                            <center>
	                                                <label>
	                                                    Listado de Medicamentos En Bodega
	                                                </label>
	                                            </center>
	                                        </div>
	                                        <div class="panel-body">
	                                            <table class="table table-hover display" id="tableMedicamentosExistentes" style="max-height: 600px;">
	                                                <thead>
	                                                <tr> 
	                                                    <th>Nombre</th>
	                                                    <th>Presentación</th>
	                                                    <th>Concentración</th>
	                                                    <th>Cantidad</th> 
	                                                    <th>Lote</th>
	                                                    <th>Laboratorio</th>
	                                                    <th>Fecha Ingreso</th>
	                                                    <th>Fecha Vencimiento</th>
	                                                    
	                                                </tr>
	                                                </thead>
	                                                <tbody id="TablaMedicamentosExistentes">
	                                                    <tr class="text-center">
	                                                        <td colspan="8"> SIN DATOS</td>
	                                                    </tr>
	                                                
	                                                </tbody>
	                                            </table>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="  row">
	                                    
	                                    <div class="panel panel-primary">
	                                        <div class="panel-heading">
	                                            <center>
	                                                <label>
	                                                    Listado de Medicamentos Asignados al Paciente
	                                                </label>
	                                            </center>
	                                        </div>
	                                        <div class="panel-body">
	                                            <table class="table table-hover display" id="tableMedicamentosAsignadosPaciente" style="max-height: 600px;">
	                                                <thead>
	                                                <tr>
	                                                    <th>Nombre</th>
	                                                    <th>Presentación</th>
	                                                    <th>Concentración</th> 
	                                                    <th>Cantidad Autorizada</th> 
	                                                    <th>Lote</th>
	                                                    <th>Laboratorio</th>
	                                                    <th>Fecha Ingreso</th>
	                                                    <th>Fecha Vencimiento</th>
	                                                    <th>Acción</th>
	                                                </tr>
	                                                </thead>
	                                                <tbody id="TablaMedicamentosAsignadosPaciente">
	                                                    <tr class="text-center">
	                                                        <td colspan="10"> SIN DATOS</td>
	                                                    </tr>
	                                                
	                                                </tbody>
	                                            </table>
	                                        </div>
	                                    </div>
	                                </div>


	                                    
	                            </div>
	                            <div id="observaciones" class="tab-pane fade">
	                                <div class="  row">
	                                    <div class="form-group col-md-4">
	                                        <span for="funcionarioSuperDocumentacion">Funcionario que Relaiza la Supervisión de la Información:</span>
	                                        <input type="text" class="form-control" name="funcionarioSuperDocumentacion" id="funcionarioSuperDocumentacion">
	                                            
	                                    </div> 
	                                      
	                                    <div class="form-group col-md-8">
	                                        <span for="observacionesStock">Observaciones:</span>
	                                        <textarea  class="form-control" rows="5" name="observacionesStock" id="observacionesStock" style="width:100%;"></textarea>
	                                    </div> 
	                                    
	                                      
	                                    <div class="form-group col-md-12">
	                                        <span for="pendiente">Soportes Pendientes:</span>
	                                        <select class="form-control" name="pendiente" id="pendiente">
	                                            <option></option>
	                                            <option value='SI'>SI</option>
	                                            <option value='NO'>NO</option>
	                                        </select>
	                                            
	                                    </div> 
	                                    
	                                </div>
	                                
	                                <div class="  row">
	                                <br>
	                                    <div class="panel panel-info">
	                                        <div class="panel-heading">
	                                            <center>
	                                                <label>
	                                                    AUTORIZA
	                                                </label>
	                                            </center>
	                                        </div>
	                                        <div class="panel-body">
	                                            <center>
	                                                <div class="  row">
	                                                    <div class="form-group col-md-4">
	                                                        <span for="nombreAutoriza">Nombres:</span>
	                                                        <input type="text"  class="form-control" rows="5" name="nombreAutoriza" id="nombreAutoriza" value="<?php echo $_SESSION['usuario']['nombres']." ".$_SESSION['usuario']['apellidos'];?>" > 
	                                                    </div> 
	                                                    <div class="form-group col-md-4">
	                                                        <span for="cargoAutoriza">CARGO:</span>
	                                                        <input type="text"  class="form-control" rows="5" name="cargoAutoriza" id="cargoAutoriza" value="<?php echo $_SESSION['usuario']['cargo']; ?>"> 
	                                                    </div> 
	                                                    <div class="form-group col-md-4">
	                                                        <span for="telefonoAutoriza">TELEFONO:</span>
	                                                        <input type="text"  class="form-control" rows="5" name="telefonoAutoriza" id="telefonoAutoriza"  value="<?php echo $_SESSION['usuario']['numerocomunicacionusuario'];?>"> 
	                                                    </div> 
	                                                    
	                                                </div>
	                                            </center>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        
	                       
	                         
	                    
	                       
	                    </div>
	                    <div class="row text-center">
	                        
	                        <div class="col-md-12">
	                            <a  >
	                                <button type="button" onclick="Javascript:registrarStock();" href="#datosBasicos" class="btn btn-success btn-block" style="background-color: #41B314;  height: 50px;" >Registrar Stock</button>
	                            </a>
	                        </div>
	                    </div>
	                  </div>
									</div>
								</div>

								 
							</div>
							<div class="panel-footer">
							 
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
