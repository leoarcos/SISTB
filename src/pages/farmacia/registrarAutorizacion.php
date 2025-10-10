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
					 <li><i class="fa fa-dashboard"></i><a href="index.html"> Registrar Autorización</a></li> 
				</ul>
			</div><!-- /breadcrumb-->
		 
		 
			<div class="padding-md" > 
				<div class="row">
					<div class="col-lg-12">
						<div class="panel   fadeInDown animation-delay5" >
							
							<div class="panel-body">
								
								<div class="row">
                    
                    <div class="col-md-12 " style="marign:1rem;">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#datosBasicos">Datos Basicos</a></li>
                            <li><a data-toggle="tab" href="#historialMEdicamento">Historial de Medicamentos</a></li>
                            <li><a data-toggle="tab" href="#medicamentos">Medicamentos</a></li>
                            <li><a data-toggle="tab" href="#observaciones">Observaciones    </a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="datosBasicos" class="tab-pane fade in active">
                                <div class=" row" >
                                    <div class="form-group col-md-3  "> 
                                        <span>Tipo Paciente: </span>
                                        <select class="form-control" id="tipoPac"  >
                                            <option> </option>
                                            <option value="TB SENSIBLE">TB SENSIBLE</option>
                                            <option value="QUIMIOPROFILAXIS">QUIMIOPROFILAXIS</option>
                                            <option value="RESISTENTE A FARMACOS">RESISTENTE A FARMACOS</option>
                                            
                                        </select>  
                                    </div>
                                    <div class="form-group col-md-3 "> 
                                            <span>Año: </span>
                                            <select class="form-control" id="ano"  >
                                                <option> </option>
                                                <option value="2000">2000</option>
                                                <option value="2001">2001</option>
                                                <option value="2002">2002</option>
                                                <option value="2003">2003</option>
                                                <option value="2004">2004</option>
                                                <option value="2005">2005</option>
                                                <option value="2006">2006</option>
                                                <option value="2007">2007</option>
                                                <option value="2008">2008</option>
                                                <option value="2009">2009</option>
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
                                    <div class="form-group  col-md-3 "> <span>Trimestre: </span>
                                            <select class="form-control" id="trimestre"  >
                                                <option > </option>
                                                <option value="I">I</option>
                                                <option value="II">II</option> 
                                                <option value="III">III</option>
                                                <option value="IV">IV</option> 
                                            </select> 
                                    </div>
                                    <div class="form-group col-md-3  ">  
                                        <span>Consecutivo</span>
                                        <input type="number" class="form-control" id="consecutivo" value="0" disabled >
                                        
                                    </div> 
                                    <div class="form-group col-md-3  ">
                                        <span for="tipoid">Tipo Identificación: </span> 
                                        <select id="tipoid" class="form-control " aria-describedby="TipoId" onchange="Javascript: validarBotonBuscarPacienteMedicamento()">
                                            <option>   </option>
                                            <option value="CC">CC</option>
                                            <option value="CE">CE</option>
                                            <option value="TI">TI</option>
                                            <option value="RC">RC</option>
                                            <option value="MS">MS</option>
                                            <option value="AS">AS</option>
                                            <option value="CR">CR</option>
                                            <option value="PS">PS</option>
                                            <option value="NUIP">NUIP</option>
                                        </select>   
                                    </div>
                                    <div class="form-group col-md-3 ">
                                        <span for="id"># Identificación: </span>
                                        <div class="input-group">
                                           
                                            <input class="form-control" onchange="Javascript: validarBotonBuscarPacienteMedicamento()" type="text" id="id">
                                            <span class="input-group-btn "  onclick="Javascript: buscarPaciente();"  > <a class="btn btn-info" id="btnSEPaci" disabled>Buscar!</a> </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 ">
                                        <span for="fechaSolicitud">Fecha Solicitud: </span> 
                                        <input type="date" class="form-control" id="fechaSolicitud">
                                    </div>
 
                                    <div class="form-group col-md-3 "> 
                                        <span>Nombres y Apellidos: </span>
                                        <input type="text" class="form-control" id="nombres"  >
                                            
                                    </div>
                                    <div class="form-group col-md-3  "> 
                                            <span>Sexo: </span>
                                            <select class="form-control" id="sexo"  >
                                                <option> </option>
                                                <option value="M">M</option>
                                                <option value="F">F</option> 
                                            </select>  
                                    </div>
                                    <div class="form-group col-md-3  "> 
                                        <span>Edad: </span>
                                        <input type="number" min='0' class="form-control" id="edad"  >
                                            
                                    </div>
                                    <div class="form-group col-md-3  ">  
                                        <span for="UnidadM">U. Medida</span>
                                        <select id="UnidadM" class="form-control ">
                                            <option value=""></option>
                                            <option value="0">AÑOS</option>
                                            <option value="1">MESES</option>
                                        </select>
                                    </div> 
                                    <div class="form-group col-md-3  ">  
                                        <span for="mnpo">Municipio</span>
                                        <select id="mnpo" class="form-control ">
                                            <option value=""></option>
                                             
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3  ">  
                                        <span for="telefono">Telefono</span>
                                        <input type="number" id="telefono" class="form-control ">
                                             
                                    </div>
                                    <div class="form-group col-md-3  ">  
                                        <span for="peso">Peso</span>
                                        <input type="number" id="peso" class="form-control ">
                                        <span>Kg</span>
                                    </div> 
                                    <div class="form-group col-md-3  ">  
                                        <span for="Regimen">Regimen</span>
                                        <select id="Regimen" class="form-control ">
                                            <option value=""></option>
                                             
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 " >
                                        <label for="EAPB" >E. Afiliadora: </label>
                                        <input list="EAPB" name="EAPB" id="EAPBes" class="form-control "  >
                                        <datalist id="EAPB">
                                        
                                        </datalist>

                                    </div> 
                                    <div class="form-group col-md-8 " >
                                        <label for="ipsDiagnos" >IPS Diagnostica: </label>
                                        <input list="ipsDiagnos" name="ipsDiagnos" id="ipsDiagnoses" class="form-control "  >
                                        <datalist id="ipsDiagnos">
                                        
                                        </datalist>

                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <label for="proximaEntrega" >Proxima Entrega: </label>
                                        <input type="date" name="proximaEntrega" id="proximaEntrega" class="form-control " >
                                    </div>
                                </div><br>
                                <div class="  row">
                                    
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
                            <div id="historialMEdicamento" class="tab-pane fade">
                                <div class=" row">
                                    
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <center>
                                                <label>
                                                    Listado de Medicamentos Entregados
                                                </label>
                                            </center>
                                        </div>
                                        <div class="panel-body">
                                            <table class="table table-hover display" id="tableMedicamentosEntregados" style="max-height: 600px;">
                                                <thead>
                                                <tr>
                                                    <th>Autorización  </th>
                                                    <th>Nombre</th>
                                                    <th>Presentación</th>
                                                    <th>Concentración</th>
                                                    <th>Cantidad Formulada</th>
                                                    <th>Cantidad Autorizada</th>
                                                    <th>Lote</th>
                                                    <th>Laboratorio</th>
                                                    <th>Fecha Vencimiento</th>
                                                    <th>Fecha Ingreso</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody id="TablaMedicamentosEntregados">
                                                    <tr class="text-center">
                                                        <td colspan="10"> SIN DATOS</td>
                                                    </tr>
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <center>
                                                <label>
                                                    Listado de Medicamentos Pendientes
                                                </label>
                                            </center>
                                        </div>
                                        <div class="panel-body">
                                            <table class="table table-hover display" id="tableMedicamentosEntregados" style="max-height: 600px;">
                                                <thead>
                                                <tr>
                                                    <th>Autorización  </th>
                                                    <th>Nombre</th>
                                                    <th>Presentación</th>
                                                    <th>Concentración</th>
                                                    <th>Cantidad Formulada</th>
                                                    <th>Cantidad Autorizada</th>
                                                    <th>Lote</th>
                                                    <th>Laboratorio</th>
                                                    <th>Fecha Vencimiento</th>
                                                    <th>Fecha Ingreso</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody id="TablaMedicamentosEntregados">
                                                    <tr class="text-center">
                                                        <td colspan="10"> SIN DATOS</td>
                                                    </tr>
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="medicamentos" class="tab-pane fade">
                                <div class=" row">
                                    <div class="form-group col-md-4">
                                        <span for="nombre-Medicamento">Nombre:</span>
                                        <input type="text" class="form-control" readonly name="nombre-Medicamento" id="nombre-Medicamento">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <span for="presentacion-Medicamento">Presentación:</span>
                                        <input type="text" class="form-control" readonly name="presentacion-Medicamento" id="presentacion-Medicamento">
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <span for="concentracion-Medicamento">Concentración:</span>
                                        <input type="text" class="form-control" readonly name="concentracion-Medicamento" id="concentracion-Medicamento">
                                    </div>
                                      
                                    <div class="form-group col-md-4">
                                        <span for="cantiFormu-Medicamento">Cantidad Formulada:</span>
                                        <input type="number" min='0' class="form-control" name="cantiFormu-Medicamento" id="cantiFormu-Medicamento">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <span for="cantiAutor-Medicamento">Cantidad Autorizada:</span>
                                        <input type="number"  min='0' class="form-control" name="cantiAutor-Medicamento" id="cantiAutor-Medicamento">
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <span for="Lote-Medicamento">Lote:</span>
                                        <input type="text" class="form-control" readonly name="Lote-Medicamento" id="Lote-Medicamento">
                                    </div>
                                      
                                    <div class="form-group col-md-4">
                                        <span for="clasificacion-Medicamento">Clasificación:</span>
                                        <select  class="form-control" name="clasificacion-Medicamento" id="clasificacion-Medicamento">
                                            <option></option>
                                            <option value="TB INFANTIL">TB INFANTIL</option>
                                            <option value="TB ADULTO">TB ADULTO</option>
                                            <option value="TB VIH">TB VIH</option>
                                            <option value="TB DIABETES">TB DIABETES</option>
                                            <option value="QUIMIOPROFILAXIS">QUIMIOPROFILAXIS</option>
                                            <option value="RESISTENTE FARMACOS">RESISTENTE FARMACOS</option>
                                            <option value="OTRO">OTRO</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <span for="Categoria-Medicamento">Categoria:</span>
                                        <select  class="form-control" name="Categoria-Medicamento" id="Categoria-Medicamento">
                                            <option></option>
                                            <option value="I">I</option>
                                            <option value="IV">IV</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <span for="Fase-Medicamento">Fase:</span>
                                        <select  class="form-control" name="Fase-Medicamento" id="Fase-Medicamento">
                                            <option></option>
                                            <option value="I">I</option>
                                            <option value="II">II</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <span for="Laboratorio-Medicamento">Laboratorio:</span>
                                        <input type="text" class="form-control" readonly name="Laboratorio-Medicamento" id="Laboratorio-Medicamento">
                                    </div>
                                     
                                    <div class="form-group col-md-4">
                                        <span for="fechaIngres-Medicamento">Fecha Ingreso Medicamento:</span>
                                        <input type="date" class="form-control" readonly name="fechaIngres-Medicamento" id="fechaIngres-Medicamento">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <span for="fechaVencimi-Medicamento">Fecha Vencimiento Medicamento:</span>
                                        <input type="date" class="form-control" readonly name="fechaVencimi-Medicamento" id="fechaVencimi-Medicamento">
                                    </div>
                                    
                                     
                                </div>
                                <div class=" row">
                                    <div class="form-group col-md-9 ">
                                    
                                    </div>
                                    <div class="form-group col-md-2 ">
                                        <a class="btn btn-success" onclick="Javascript: adjuntarMedicamento();">Adjuntar Medicamento</a>
                                    </div>

                                </div>
                                <br>
                                <div class=" row">
                                    
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
                                <div class=" row">
                                    
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
                                                    <th>Cantidad Formulada</th> 
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
                                <div class=" row">
                                    <div class="form-group col-md-3">
                                        <span for="requiSoliTto-Medicamento">Cumple con los requisitos para la solicitud del tratamiento:</span>
                                        <select  class="form-control" name="requiSoliTto-Medicamento" id="requiSoliTto-Medicamento">
                                            <option></option>
                                            <option vlaue="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div> 
                                     
                                    <div class="form-group col-md-9">
                                        <span for="soportePendiente-Medicamento">Soportes Pendientes:</span>
                                        <textarea  class="form-control" rows="5" name="soportePendiente-Medicamento" id="soportePendiente-Medicamento" style="width:100%;"></textarea>
                                    </div> 
                                     
                                    <div class="form-group col-md-4">
                                        <span for="funverdoc-Medicamento">Funcionario que realiza la supervisión de la documentación:</span>
                                        <input type="text"  class="form-control" name="funverdoc-Medicamento" id="funverdoc-Medicamento">
                                           
                                    </div> 
                                     
                                    <div class="form-group col-md-8">
                                        <span for="Observaciones-Medicamento">Observaciones:</span>
                                        <textarea  class="form-control" rows="5" name="Observaciones-Medicamento" id="Observaciones-Medicamento" style="width:100%;"></textarea>
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
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <span for="nombreAutoriza">Nombres:</span>
                                                        <input type="text"  class="form-control"  name="nombreAutoriza" id="nombreAutoriza" value="<?php echo $_SESSION['usuario']['nombres']." ".$_SESSION['usuario']['apellidos'];?>" > 
                                                    </div> 
                                                    <div class="form-group col-md-4">
                                                        <span for="cargoAutoriza">CARGO:</span>
                                                        <input type="text"  class="form-control"  name="cargoAutoriza" id="cargoAutoriza" value="<?php echo $_SESSION['usuario']['cargo']; ?>"> 
                                                    </div> 
                                                    <div class="form-group col-md-4">
                                                        <span for="telefonoAutoriza">TELEFONO:</span>
                                                        <input type="text"  class="form-control" name="telefonoAutoriza" id="telefonoAutoriza"  value="<?php echo $_SESSION['usuario']['numerocomunicacionusuario'];?>"> 
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
                                <button type="button" onclick="Javascript:registrarAutorizacion();" href="#datosBasicos" class="btn btn-success btn-block" style="background-color: #41B314;  height: 50px;" >Registrar Autorización</button>
                            </a>
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
	<script src="../../../js/app/app_libroPacientes.js"></script>
	<script src="../../../js/app/app.js"></script>
	<script>
		
	</script>
	
  </body>
</html>
