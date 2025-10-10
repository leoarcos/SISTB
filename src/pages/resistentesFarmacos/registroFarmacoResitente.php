<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>SISTB - Resistente a Farmacos</title>
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
					 <li><i class="fa fa-dashboard"></i><a href="index.html"> Registrar Resistente a Farmacos</a></li> 
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
                        <strong>Registro Resistente a Farmacos</strong>
                    </h3> 
									</div>
									<div class="col-md-12">
										
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#datosBasicos">Datos Basicos </a></li>
                        <li><a data-toggle="tab" href="#tipotb">Tipo de Tuberculosis y Medicamentos</a></li>
                        <li><a data-toggle="tab" href="#esqtto">Esquema de Tratamiento</a></li>
                        <li><a data-toggle="tab" href="#segubac">Seguimiento Bacteriologico</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="datosBasicos" class="tab-pane fade in active">
                            <div class=" row">
                                <div class="form-group col-md-4">
                                    <label for="numero" >Numero: </label>
                                    <input type="number" id="numero" class="form-control " readonly aria-describedby="numero">
                                         
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tipocaso"> Tipo de Caso: </label>
                                    <select id="tipocaso" class="form-control " aria-describedby="tipocaso">
                                        <option></option>
                                        <option value="CONFIRMACION BACTERIOLOGICA">CONFIRMACION BACTERIOLOGICA</option>
                                        <option value="CONFIRMACION POR CLINICA">CONFIRMACION POR CLINICA</option>
                                        <option value="NEXO">NEXO</option>
                                    </select>
                                
                                </div>
                               
                                <div class="form-group col-md-4" id="divano">
                                    <label for="ano"> Año Confirmacion de Caso: </label>
                                    <select  id="ano"   class="form-control " aria-describedby="ano">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                             
                          
                            <div class="row">
                                <div class="form-group col-md-6" >
                                    <label for="ingresatto" >Ingresa Tratamiento: </label>
                                    <select id="ingresatto" class="form-control " aria-describedby="ingresatto">
                                        <option></option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                         
                                </div>
                                <div class="form-group col-md-6" >
                                    <label for="fechaIngresoTto" >Fecha de ingreso a tratamiento con medicamentos de segunda linea: </label>
                                    <input type="date" id="fechaIngresoTto" class="form-control "  aria-describedby="fechaIngresoTto">
                                         
                                </div>
                                <div class="form-group col-md-3" >
                                    <label for="nombresyapellidos" >Nombres y apellidos completos: </label>
                                    <input type="text" id="nombresyapellidos" class="form-control " aria-describedby="nombresyapellidos">
                                         
                                </div>
                                <div class="form-group col-md-3" >
                                    <label for="sexo" >Sexo: </label>
                                    <select id="sexo" class="form-control " aria-describedby="sexo">
                                        <option></option>
                                        <option value="F">F</option>
                                        <option value="M">M</option>
                                    </select>
                                         
                                </div>
                                <div class="form-group col-md-3" >
                                    <label for="edad" >Edad: </label>
                                    <select   id="edad" class="form-control "  aria-describedby="edad">
                                    </select>
                                </div>
                                <div class="form-group col-md-3" > 
                                    <label for="edad" >U. medida edad: </label>

                                    <select   id="uedad" class="form-control "  aria-describedby="uedad">
                                        <option></option>
                                        <option value="0">AÑOS</option>
                                        <option value="1">MESES</option>
                                        
                                    </select>
                                </div> 
                                <div class="form-group col-md-4" >
                                    <label for="tipoid" >Tipo identificación: </label>
                                    <select id="tipoid" class="form-control "  aria-describedby="tipoid">
                                        <option></option>
                                        <option value="CC">CC</option>
                                        <option value="TI">TI</option>
                                        <option value="RC">RC</option>
                                        <option value="MS">MS</option>
                                        <option value="AS">AS</option> 
                                        <option value="CE">CE</option>
                                        <option value="PS">PS</option>
                                        <option value="NUIP">NUIP</option>
                                    </select>
                                             
                                </div>
                                <div class="form-group col-md-4" >
                                    <label for="numeroid" >Numero de Identificación: </label>
                                    <input type="text" id="numeroid" class="form-control "  aria-describedby="numeroid">
                                         
                                </div>
                                <div class="form-group col-md-4" >
                                    <label for="regimen" >Regimen de Afiliación: </label>
                                    <select id="regimen" class="form-control "  aria-describedby="regimen">
                                        <option></option>
                                        <option value="P - EXCEPCIÓN">P - EXCEPCIÓN</option>
                                        <option value="C - CONTRIBUTIVO">C - CONTRIBUTIVO</option>
                                        <option value="N - NO ASEGURADO">N - NO ASEGURADO</option>
                                        <option value="E - ESPECIAL">E - ESPECIAL</option>
                                        <option value="S - SUBSIDIADO">S - SUBSIDIADO</option>

                                    </select>
                                </div> 
                                <div class="form-group col-md-4" >
                                    <label for="dpto" >Entidad territorial: </label>
                                    <select id="dpto" class="form-control "  aria-describedby="dpto" onChange='Javascript: listarMnpos();'>
                                    </select>  
                                </div>
                                <div class="form-group col-md-4" >
                                    <label for="Municipio" >Municipio: </label>
                                    <select id="Municipio" class="form-control "  aria-describedby="Municipio">
                                    </select>
                                </div>
                                <div class="form-group col-md-4" >
                                    <label for="zona" >Zona: </label>
                                    <select id="zona" class="form-control "  aria-describedby="zona">
                                        <option></option>
                                        <option value="RURAL">RURAL</option>
                                        <option value="URBANA">URBANA</option>
                                    </select>
                                </div> 
                                <div class="form-group col-md-4" >
                                    <label for="direccion" >Dirección: </label>
                                    <input type="text" id="direccion" class="form-control "  aria-describedby="direccion">
                                         
                                </div>
                                <div class="form-group col-md-4" >
                                    <label for="telefono" >Telefono: </label>
                                    <input type="text" id="telefono" class="form-control "  aria-describedby="telefono">
                                         
                                </div>
                                <div class="form-group col-md-4" >
                                    <label for="barrio" >Barrio: </label>
                                    <input type="text" id="barrio" class="form-control "  aria-describedby="barrio">
                                         
                                </div> 
                                <div class="form-group col-md-3" >
                                    <label for="EAPB" >EAPB: </label>
                                    <input list="EAPBlist" name="EAPB" id="EAPB"  class="form-control "   >
                                    <datalist id="EAPBlist" >
                                        
                                    </datalist>    
                                </div>
                                 
                                <div class="form-group col-md-3" >
                                    <label for="pertenenciaEtnica" >Pertenencia Etnica: </label>
                                    <select class="form-control" id="etnia" onchange="Javascript: listarPuebloIndigena();" >
                                        <option></option> 
                                        <option value="PALENQUERO">NEGRO, MULATO </option>
                                        <option value="PALENQUERO">PALENQUERO</option>
                                        <option value="ROOM (GITANO)">ROOM (GITANO)</option> 
                                        <option value="INDIGENA">INDIGENA</option> 
                                        <option value="RAIZAL">RAIZAL</option> 
                                        <option value="OTRO">OTRO</option>   
                                    </select> 
                                </div>
                                <div class="form-group col-md-3" >
                                    <label for="peubloIndigena" >Pueblo Indigena: </label>
                                    <select name="peubloIndigena" id="peubloIndigena"   class="form-control "   >
                                      
                                    </select>    
                                </div>
                                 
                                <div class="form-group col-md-3" >
                                    <label for="grupoPoblacional" >Grupo Poblacional: </label>
                                    <select name="grupoPoblacional" id="grupoPoblacional"   class="form-control "   >
                                      
                                    </select>    
                                </div>
                                <div class="form-group col-md-3" >
                                    <label for="ocupacion" >Ocupación: </label>
                                    <input list="ocupacionlist" name="ocupacion" id="ocupacion"   class="form-control "   >
                                    <datalist id="ocupacionlist" >
                                        
                                    </datalist>    
                                </div>
                                 
                                <div class="form-group col-md-3" >
                                    <label for="factores" >Factores de Riesgo/condiciones especiales : </label>
                                    <select name="factores" id="factores"   class="form-control "   >
                                        <option></option>
                                        <option value="NINGUNO">NINGUNO</option>
                                        <option value="CONTACTO CON PACIENTE FARMACORESISTENTE">CONTACTO CON PACIENTE FARMACORESISTENTE</option>
                                        <option value="FARMACODEPENDENCIA (ALCOHOL - TABACO Y/O DROGAS)">FARMACODEPENDENCIA (ALCOHOL - TABACO Y/O DROGAS)</option>
                                        <option value="HABITANTE DE CALLE">HABITANTE DE CALLE</option>
                                        <option value="OTROS FACTORES INMUNOSUPRESORES">OTROS FACTORES INMUNOSUPRESORES</option>
                                        <option value="TRATAMIENTO IRREGULAR POR MÁS DE UN MES">TRATAMIENTO IRREGULAR POR MÁS DE UN MES</option>
                                        <option value="HA VIVIDO EN ÁREAS DE ALTA CARGA DE TB FARMACORRESISTENTE">HA VIVIDO EN ÁREAS DE ALTA CARGA DE TB FARMACORRESISTENTE</option>
                                        <option value="TRATAMIENTO CON MENOS DE TRES MEDICAMENTOS">TRATAMIENTO CON MENOS DE TRES MEDICAMENTOS</option>
                                      
                                        
                                    </select>    
                                </div>
                                <div class="form-group col-md-3" >
                                    <label for="coomorbilidad" >coomorbilidad: </label>
                                    <select name="coomorbilidad" id="coomorbilidad"  class="form-control "  onChange="Javascript: verCoomorbilidad();" >
                                        
                                    </select>    
                                </div>
                                 
                                <div class="form-group col-md-3" >
                                    <label for="realizaAPV" >se Realizó APV: </label>
                                    <select name="realizaAPV" id="realizaAPV"   class="form-control "   >
                                        <option></option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                        <option value="PTE NO ACEPTA">PTE NO ACEPTA</option>
                                        <option value="VIH + PREVIO">VIH + PREVIO</option>
                                        <option value="DESCONOCIDO">DESCONOCIDO</option>
                                    </select> 
                                </div>
                                <div class="form-group col-md-3" >
                                    <label for="realizoprueba" >se Realizó Prueba: </label>
                                    <select name="realizoprueba" id="realizoprueba"   class="form-control "   >
                                        <option></option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                        <option value="PTE NO ACEPTA">PTE NO ACEPTA</option>
                                        <option value="VIH + PREVIO">VIH + PREVIO</option>
                                        <option value="PENDIENTE">PENDIENTE</option>
                                    </select>    
                                </div>
                                <div class="form-group col-md-3" >
                                    <label for="resultadoprueba" >Resultado Prueba: </label>
                                    <select name="resultadoprueba" id="resultadoprueba"   class="form-control "   >
                                        <option></option>
                                        <option value="POSITIVO">POSITIVO</option>
                                        <option value="NEGATIVO">NEGATIVO</option>
                                        <option value="PTE NO ACEPTA">PTE NO ACEPTA</option>
                                        <option value="VIH + PREVIO">VIH + PREVIO</option>
                                        <option value="NO REALIZADA">NO REALIZADA</option>
                                    </select>   
                                </div>
                                 
                                <div class="form-group col-md-3" >
                                    <label for="fechaRealizacionPrueba" >fecha Realización: </label>
                                    <input type="date" name="fechaRealizacionPrueba" id="fechaRealizacionPrueba"  class="form-control "   >
                                    
                                </div>
                                <div class="form-group col-md-3" >
                                    <label for="preubaconfirmatoria" >Prueba Confirmatoria Acorde a la Norma: </label>
                                    <select name="preubaconfirmatoria" id="preubaconfirmatoria"   class="form-control "   >
                                        <option></option>
                                        <option value="POSITIVO">POSITIVO</option>
                                        <option value="NEGATIVO">NEGATIVO</option>
                                        <option value="PACIENTE NO ACEPTA">PACIENTE NO ACEPTA</option>
                                        <option value="DESCONOCIDO">DESCONOCIDO</option>
                                        <option value="NO REQUIERE">NO REQUIERE</option>
                                        <option value="PENDIENTE">PENDIENTE</option>
                                        <option value="N/A">NO APLICA</option>
                                    </select>      
                                </div>
                                 
                                <div class="form-group col-md-3" >
                                    <label for="fechaRealizacionDx" >Fecha Realizacion (Dx Previo o actual): </label>
                                    <input type="date" name="fechaRealizacionDx" id="fechaRealizacionDx" class="form-control "   >
                                   
                                </div>
                                <div class="form-group col-md-3" >
                                    <label for="coinfeccionTBVIH" >Coinfección TB/VIH Confirmado en le momento: </label>
                                    <select name="coinfeccionTBVIH" id="coinfeccionTBVIH"   class="form-control "   >
                                        <option></option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option> 
                                        <option value="DESCONOCIDO">DESCONOCIDO</option>
                                        <option value="NO APLICA">NO APLICA</option> 
                                    </select>      
                                </div>
                                 
                                <div class="form-group col-md-3" >
                                    <label for="recibeTAR" >Recibe TAR: </label>
                                    <select name="recibeTAR" id="recibeTAR"   class="form-control "   >
                                        <option></option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option> 
                                        <option value="DESCONOCIDO">DESCONOCIDO</option>
                                        <option value="NO APLICA">NO APLICA</option> 
                                    </select>       
                                </div>
                                <div class="form-group col-md-3" >
                                    <label for="recibetmtprin" >Recibe Trimetoprim: </label>
                                    <select name="recibetmtprin" id="recibetmtprin"   class="form-control "   >
                                        <option></option>  
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                        <option value="N/A">N/A</option>
                                    </select>    
                                </div>
                                
                            </div>





                            
                        </div>
                        <div id="tipotb" class="tab-pane fade ">
                            <div class="row " >
                            	<div class="col-md-4">
                                <div class="form-group "  >
                                    <label for="tipotbs" >Tipo de Tuberculosis: </label>
                                    <select id="tipotbs" class="form-control "   aria-describedby="tipotbs"   >
                                        <option></option>
                                        <option value="PULMONAR">PULMONAR</option>
                                        <option value="EXTRAPULMONAR">EXTRAPULMONAR</option>
                                    </select>
                                </div>
                            		
                            	</div> 
                            	<div class="col-md-4">
                                <div class="form-group "    >
                                    <label for="Localizacion"> Localizacion: </label>
                                    <select id="Localizacion" class="form-control " aria-describedby="Localizacion"   >
                                        <option></option>
                                        
                                    </select>
                                
                                </div>
                            		
                            	</div> 
                            	<div class="col-md-4">
                                <div class="form-group condiv" >
                                    <label for="Condicioni"> Condición de Ingreso: </label>
                                    <select id="Condicioni" class="form-control " aria-describedby="Condicioni" >
                                        <option></option>
                                    </select> 
                                </div>
                            		
                            	</div> 
                            	<div class="col-md-4">
                                <div class="form-group condiv" >
                                    <label for="medicamentos2daLinea"> Ha recibido medicamentos de 2da linea: </label>
                                    <select id="medicamentos2daLinea" class="form-control " aria-describedby="medicamentos2daLinea" >
                                        <option></option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                        <option value="DESCONOCIDO">DESCONOCIDO</option>
                                        
                                    </select> 
                                </div>
                            		
                            	</div> 
                            	<div class="col-md-4">
                                <div class="form-group "   >
                                    <label for="fechapsf"> fecha Reporte P.S.F : </label>
                                    <input type="date" id="fechapsf" class="form-control " aria-describedby="fechapsf"   >
                                
                                </div>
                            		
                            	</div> 
                            	<div class="col-md-4">
                                <div class="form-group "   >
                                    <label for="metodologiUti"> Metodología utilizada: </label>
                                    <select id="metodologiUti" class="form-control " aria-describedby="metodologiUti" >
                                        <option></option>
                                        <option value="BACTEC MGIT">BACTEC MGIT</option>
                                        <option value="LIPA">LIPA</option>
                                        <option value="NITRATO REDUCTASA">NITRATO REDUCTASA</option>
                                        <option value="PCR EN T REAL">PCR EN T REAL</option>
                                        <option value="PROPORCIONES EN AGAR">PROPORCIONES EN AGAR</option>
                                        <option value="PROPORCIONES EN LJ">PROPORCIONES EN LJ</option>
                                    </select>
                                </div>
                            		
                            	</div> 
                            </div>

                            
                            <BR>
                            <div class="panel panel-success" >
                                <div class="panel-heading text-center">
                                    <label>MEDICAMENTOS</label>
                                </div>
                                <div class="panel-body  ">
                                	<div class="row text-center" >
                                    <div class="form-inline  col-md-12 " style="width: 100%;">
                                    
                                        <div class="form-group "   >
                                            <label for="medica1">S 1µg </label>
                                            <select id="medica1" class="form-control " aria-describedby="medica1" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica2">S 4µg </label>
                                            <select id="medica2" class="form-control " aria-describedby="medica2" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica3">H 0,1µg </label>
                                            <select id="medica3" class="form-control " aria-describedby="medica3" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica4">H 0,4µg </label>   
                                            <select id="medica4" class="form-control " aria-describedby="metodologiUti" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica5">R </label>
                                            <select id="medica5" class="form-control " aria-describedby="medica5" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        
                                
                                    </div>
                                  	<br>

                                    <div class="form-inline  col-md-12" style="width: 100%;">
                                    
                                        <div class="form-group "   >
                                            <label for="medica6">E 5µg: </label>
                                            <select id="medica6" class="form-control " aria-describedby="medica6" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica7">E 7,5µg: </label>
                                            <select id="medica7" class="form-control " aria-describedby="medica7" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica8">Z:</label>
                                            <select id="medica8" class="form-control " aria-describedby="medica8" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica9">Km: </label>   
                                            <select id="medica9" class="form-control " aria-describedby="medica9" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica10">Lfx: </label>
                                            <select id="medica10" class="form-control " aria-describedby="medica10" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        
                                
                                    </div>
                                    <br>

                                    <div class="form-inline  col-md-12" style="width: 100%;">
                                    
                                        <div class="form-group "    >
                                            <label for="medica11">Mfx:</label>
                                            <select id="medica11" class="form-control " aria-describedby="medica11" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica12">Am: </label>
                                            <select id="medica12" class="form-control " aria-describedby="medica12" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica13">Eto: </label>
                                            <select id="medica13" class="form-control " aria-describedby="medica13" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica14">Cm: </label>   
                                            <select id="medica14" class="form-control " aria-describedby="medica14" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica15">Ofx: </label>
                                            <select id="medica15" class="form-control " aria-describedby="medica15" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        
                                
                                    </div>
                                    <br>

                                    <div class="form-inline  col-md-12" style="width: 100%;">
                                        
                                        <div class="form-group "   >
                                            <label for="medica16">Cs:</label>
                                            <select id="medica16" class="form-control " aria-describedby="medica16" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica17">Otra:</label>
                                            <select id="medica17" class="form-control " aria-describedby="medica17" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica18">Otra:</label>
                                            <select id="medica18" class="form-control " aria-describedby="medica18" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica19">PAS: </label>   
                                            <select id="medica19" class="form-control " aria-describedby="medica19" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica20">Cfz: </label>
                                            <select id="medica20" class="form-control " aria-describedby="medica20" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        
                                
                                    </div>
                                    <br>

                                    <div class="form-inline   col-md-12" style="width: 100%;">
                                        
                                        <div class="form-group "   >
                                            <label for="medica21">Lzd: </label>
                                            <select id="medica21" class="form-control " aria-describedby="medica21" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica22">Amx/Clv: </label>
                                            <select id="medica22" class="form-control " aria-describedby="medica22" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica23">Ipm:</label>
                                            <select id="medica23" class="form-control " aria-describedby="medica23" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica24">Mz: </label>   
                                            <select id="medica24" class="form-control " aria-describedby="medica24" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica25">Clr: </label>
                                            <select id="medica25" class="form-control " aria-describedby="medica25" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        
                                
                                    </div>
                                    <br>

                                    <div class="form-inline  col-md-12" style="width: 100%;">
                                        
                                        <div class="form-group "   >
                                            <label for="medica26">Rfb: </label>
                                            <select id="medica26" class="form-control " aria-describedby="medica26" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                    </div>

                                		
                                	</div>
                                
                                </div>


                                <div class="row" style="width: 100%;">
                                    
                                    <div class="form-group col-md-4"  >
                                        <label for="tipoRes">tipo de resistencia: </label>
                                        <select id="tipoRes" class="form-control " aria-describedby="tipoRes" >
                                            <option></option>
                                            <option value="POLI">POLI</option>
                                            <option value="MDR">MDR</option>
                                            <option value="XDR">XDR</option>
                                            <option value="POLI QUE INCLUYE R">POLI QUE INCLUYE R</option>
                                            <option value="MONO R">MONO R</option>
                                            <option value="RR">RR</option>
                                            <option value="MONO H">MONO H</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4"   >
                                        <label for="resistenciaa">Resistencia a: </label>
                                        <input type="text" id="resistenciaa" class="form-control " aria-describedby="resistenciaa" >
                                            
                                    </div>
                                    <div class="form-group col-md-4"   >
                                        <label for="semananaconfirmCaso">Semana de confirmación del caso:</label>
                                        <input type="text" id="semananaconfirmCaso" class="form-control " aria-describedby="semananaconfirmCaso" >
                                            
                                    </div>
                                </div>
                               
                                <div class="row" style="width: 100%;">
                                    
                                    <div class="form-group col-md-6"   >
                                        <label for="ipsdiagnosticaEs">IPS de diagnostico: </label>
                                        <select name="ipsdiagnosticaEs" id="ipsdiagnosticaEs" class="form-control " >
                                        </select>
                                    </div>
                                 
                                    <div class="form-group col-md-6"   >
                                        <label for="ipssegumiento">IPS de sguimiento de tratamiento: </label>
                                        <select name="ipssegumiento" id="ipssegumiento" class="form-control "  > 
                                        </select>   
                                    </div>
                                </div>


                            </div>
                            


                        </div>


                        <div id="esqtto" class="tab-pane fade ">
                             
                            <div class="form-inline  " style="width: 100%;">
                                    
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="espcmedica">Especialidad Medica que atiende: </label>
                                    <input type="text" name="espcmedica" id="espcmedica" class="form-control "  >
                                     
                                </div>
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="numttprevios">Número de tratameintos recibidos previamente: </label>
                                    <input type="text" name="numttprevios" id="numttprevios" class="form-control "  >
                                     
                                </div>
                            </div>
                            <div class="form-inline  " style="width: 100%;">
                                    
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="inicial">Inicial: </label>
                                    <input type="text" name="inicial" id="inicial" class="form-control "  >
                                     
                                </div>
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="antecettosiglas">Antecedentes de tratamiento en siglas de condición de ingreso-año: </label>
                                    <input type="text" name="antecettosiglas" id="antecettosiglas" class="form-control "  >
                                     
                                </div>
                            </div>
                            <div class="form-inline  " style="width: 100%;">
                                    
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="tiesqttoactual">Tipo de esquema de tratamiento actual: </label>
                                    <select name="tiesqttoactual" id="tiesqttoactual" class="form-control "  >
                                    
                                        <option></option>
                                        <option value="ESTANDARIZADO">ESTANDARIZADO</option>
                                        <option value="INDIVIDUALIZADO">INDIVIDUALIZADO</option>
                                    </select>
                                </div>
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="ajustetto1">ajuste de tratamiento: </label>
                                    <input type="text" name="ajustetto1" id="ajustetto1" class="form-control "  >
                                     
                                </div>
                            </div>
                            <div class="form-inline  " style="width: 100%;">
                                    
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="ajustetto2">ajuste de tratamiento: </label>
                                    <input type="text" name="ajustetto2" id="ajustetto2" class="form-control "  >
                                     
                                </div>
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="tenidointerrupciones">Ha tenido interrupciones: </label>
                                    <select name="tenidointerrupciones" id="tenidointerrupciones" class="form-control "  >
                                        <option></option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                        <option value="NO APLICA">NO APLICA</option>
                                    </select>
                                </div>
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="diasInterrupcion">Dias de interrupción: </label>
                                    <input type="text" name="diasInterrupcion" id="diasInterrupcion" class="form-control "  >
                                     
                                </div>
                            </div>
                            <div class="form-inline  " style="width: 100%;">
                                    
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="causaInterrupcion">Causa de la interrupción: </label>
                                    <select name="causaInterrupcio" id="causaInterrupcio" class="form-control "  >
                                        
                                        <option></option>
                                        <option value="NO ADHERENTE">NO ADHERENTE</option>
                                        <option value="DIFICULTADES DE DESPLAZAMIENTO">DIFICULTADES DE DESPLAZAMIENTO</option>
                                        <option value="DIFICULTADES PARA ADQUISICION DE LOS MEDICAMENTOS">DIFICULTADES PARA ADQUISICION DE LOS MEDICAMENTOS</option>
                                        <option value="DESABASTECIMIENTO DE MEDICAMENTOS">DESABASTECIMIENTO DE MEDICAMENTOS</option>
                                        <option value="NINGUNA">NINGUNA</option>
                                        <option value="REACCIONES ADVERSAS A MEDICAMENTOS">REACCIONES ADVERSAS A MEDICAMENTOS</option>
                                    </select>
                                </div>
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="rquehospit">Requirio Hospitalización: </label>
                                    <select name="rquehospit" id="rquehospit" class="form-control "  >
                                    
                                        <option></option>
                                        <option value="SI">SI</option> 
                                        <option value="NO">NO</option> 
                                        <option value="NA">NA</option> 
                                        <option value="SD">SD</option>  
                                    </select>
                                </div>
                            </div>
                            <div class="form-inline  " style="width: 100%;">
                                    
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="causaHospita">Causas de la Hospitalización: </label>
                                    <select name="causaHospita" id="causaHospita" class="form-control "  >
                                    
                                        <option></option>
                                        <option value="MEDICAS: ENFERMEDAD SEVERA (HEMOPTISIS INSF RESPIRATORIA OTRAS)">MEDICAS: ENFERMEDAD SEVERA (HEMOPTISIS INSF RESPIRATORIA OTRAS)</option>
                                        <option value="MEDICAS: REACCIONES ADVERSAS GRAVES">MEDICAS: REACCIONES ADVERSAS GRAVES</option>
                                        <option value="MEDICAS:  CO-MORBILIDADES  NO CONTROLADAS: DIABETES INSUFICIENCIA CARDÍACA">MEDICAS:  CO-MORBILIDADES  NO CONTROLADAS: DIABETES INSUFICIENCIA CARDÍACA</option>
                                        <option value="MEDICAS: ALTO RIESGO DE RAFAS: PACIENTE CON INFECCIÓN VIH ENFERMEDAD HEPÁTICA  DESNUTRICIÓN SEVERA (CAQUEXIA)">MEDICAS: ALTO RIESGO DE RAFAS: PACIENTE CON INFECCIÓN VIH ENFERMEDAD HEPÁTICA  DESNUTRICIÓN SEVERA (CAQUEXIA)</option>
                                        <option value="CONTROL DE LA INFECCIÓN EN CONDICIONES ESPECIALES: FARMACODEPENDENCIA (ALCOHOL TABACOY DROGA) HABITANTE DE CALLE">CONTROL DE LA INFECCIÓN EN CONDICIONES ESPECIALES: FARMACODEPENDENCIA (ALCOHOL TABACOY DROGA) HABITANTE DE CALLE</option>
                                        <option value="CONTROL DE LA INFECCIÓN:  PERTENENCIA A COMUNIDADES CERRADAS: HOGAR DE ANCIANOS INDÍGENAS POBLACIÓN PRIVADA DE LA LIBERTAD SOCIALES: SOPORTE FAMILIAR Y SOCIAL INSUFICIENTE">CONTROL DE LA INFECCIÓN:  PERTENENCIA A COMUNIDADES CERRADAS: HOGAR DE ANCIANOS INDÍGENAS POBLACIÓN PRIVADA DE LA LIBERTAD SOCIALES: SOPORTE FAMILIAR Y SOCIAL INSUFICIENTE</option>
                                        <option value="SOCIALES: SOPORTE FAMILIAR Y SOCIAL INSUFICIENTE">SOCIALES: SOPORTE FAMILIAR Y SOCIAL INSUFICIENTE</option> 
                                        <option value="NO APLICA">NO APLICA</option> 
                                        
                                    </select>
                                </div>
                                
                            </div>
                            <div class="form-inline  " style="width: 100%;">
                                    
                             <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="condicionactual">Condicion actual: </label>
                                    <select name="condicionactual" id="condicionactual" class="form-control "  >
                                        <option></option>
                                        <option value="FRACASO">FRACASO</option>
                                        <option value="NO HA INICIADO">NO HA INICIADO</option>
                                        <option value="TRANSFERIDO">TRANSFERIDO</option>
                                        <option value="TRATAMIENTO TERMINADO">TRATAMIENTO TERMINADO</option>
                                        <option value="DESCARTADO">DESCARTADO</option>
                                        <option value="CURADO">CURADO</option>
                                        <option value="FALLECIDO POR OTRA CAUSA">FALLECIDO POR OTRA CAUSA</option>
                                        <option value="NA">NA</option>
                                        <option value="EN TRATAMIENTO">EN TRATAMIENTO"</option>
                                        <option value="ABANDONO">ABANDONO</option>
                                        <option value="FALLECIDO POR TB">FALLECIDO POR TB</option>
                                    </select>
                                </div>
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="fechaactualizac">Fecha de actualización: </label>
                                    <input type="date" name="fechaactualizac" id="fechaactualizac" class="form-control "  >
                                     
                                </div>
                               
                            </div>
                            <div class="form-inline  " style="width: 100%;">
                                    
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="condicionegreso">Condicion de egreso: </label>
                                    <input type="text" name="condicionegreso" id="condicionegreso" class="form-control "  >
                                     
                                </div>
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="fechaEgreso">Fecha de egreso: </label>
                                    <input type="date" name="fechaEgreso" id="fechaEgreso" class="form-control "  >
                                     
                                </div>
                            </div>
                            <div class="form-inline  " style="width: 100%;">
                                    
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="obervacio">Observaciones: </label>
                                    <textarea name="obervacio" id="obervacio" class="form-control " style="min-width:500px;" rows="5"></textarea>
                                     
                                </div>
                                
                            </div>
                            <div class="form-inline  " style="width: 100%;">
                                    
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="responsdiligencia">Responsable del diligenciamiento: </label>
                                    <input type="text" name="responsdiligencia" id="responsdiligencia" class="form-control "  >
                                     
                                </div>
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="importMSPS">Importante MSPS: </label>
                                    <select name="importMSPS" id="importMSPS" class="form-control "  >
                                        <option></option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                     
                                </div>
                            </div>
                            <div class="form-inline  " style="width: 100%;">
                                    
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="listadoMSPS">Listado de MSPS: </label>
                                    <select name="listadoMSPS" id="listadoMSPS" class="form-control "  >
                                        <option></option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="sivigila">SIVIGILA: </label>
                                    <select name="sivigila" id="sivigila" class="form-control "  >
                                        <option></option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-inline  " style="width: 100%;">
                                    
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="observacionesINS">Observaciones INS </label>
                                    <textarea name="observacionesINS" id="observacionesINS" class="form-control "  style="min-width:500px;" rows="5"></textarea>
                                </div>
                                
                            </div>


                        </div>
                        <div id="segubac" class="tab-pane fade">
                            <div class="form-inline  " style="width: 100%;">
                                    
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="messeguBact">Mes:</label>
                                    <select name="messeguBact" id="messeguBact" class="form-control "   >
                                    
                                    </select>
                                </div>
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="seguibacterio">digite Si para guaradar el seguimiento bacteriologico:</label>
                                    <select name="seguibacterio" id="seguibacterio" class="form-control "   >
                                        <option></option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                                
                                
                            </div>
                            <div class="form-inline  " style="width: 100%;">
                                    
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="cultivo">Cultivo:</label>
                                    <select name="cultivo" id="cultivo" class="form-control "   >
                                        <option></option>
                                        <option value="CULTIVO NEGATIVO PARA BAAR">CULTIVO NEGATIVO PARA BAAR</option>
                                        <option value="CONTAMINADO">CONTAMINADO</option>
                                        <option value="CULTIVO POSITIVO (+)">CULTIVO POSITIVO (+)</option>
                                        <option value="CULTIVO POSITIVO (++)">CULTIVO POSITIVO (++)</option>
                                        <option value="CULTIVO POSITIVO (+++)">CULTIVO POSITIVO (+++)</option>
                                        
                                    </select>
                                </div>
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="fechacultivo">fecha del cultivo:</label>
                                    <input type="date" name="fechacultivo" id="fechacultivo" class="form-control "   >
                                        
                                </div>
                                
                                
                            </div>
                            <div class="form-inline  " style="width: 100%;">
                                    
                                    <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                        <label for="bkresistente">BK:</label>
                                        <select name="bkresistente" id="bkresistente" class="form-control "   >
                                            <option></option>
                                            <option value="CULTIVO NEGATIVO PARA BAAR">NO REALIZADO</option>
                                            <option value="CONTAMINADO">NEGATICO PARA BAAR</option>
                                            <option value="CULTIVO POSITIVO (+)">POSITIVO PARA BAAR (+)</option>
                                            <option value="CULTIVO POSITIVO (++)">POSITIVO PARA BAAR (++)</option>
                                            <option value="CULTIVO POSITIVO (+++)">POSITIVO PARA BAAR (+++)</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                        <label for="fechabkresistente">fecha del bk:</label>
                                        <input type="date" name="fechabkresistente" id="fechabkresistente" class="form-control "   >
                                            
                                    </div>
                                    
                                    
                                </div>
                            <div class="form-inline  " style="width: 100%;">
                                    
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="fechaconversnega">fecha de conversion negativa:</label>
                                    <input type="date" name="fechaconversnega" id="fechaconversnega" class="form-control "   >
                                        
                                </div>
                                <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                    <label for="fechareverspost">fecha de reversion positiva:</label>
                                    <input type="date" name="fechareverspost" id="fechareverspost" class="form-control "   >
                                        
                                </div>
                                
                                
                                
                                
                            </div>
                            <div class="panel panel-success" >
                                <div class="panel-heading text-center">
                                    <label>OTRA PSF</label>
                                </div>
                                <div class="panel-body  ">

                                    <div class="form-inline  " style="width: 100%;">
                                        
                                        <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                            <label for="fecharesultadopsf">fecha de resultado de la PSF:</label>
                                            <input type="date" name="fecharesultadopsf" id="fecharesultadopsf" class="form-control "   >
                                                
                                        </div>
                                        <div class="form-group " style="margin:1rem;" style="width: 100%;"  >
                                            <label for="metodologiapsf">Metodologia utilizada:</label>
                                            <select name="metodologiapsf" id="metodologiapsf" class="form-control "   >
                                            
                                                <option></option>
                                                <option value="BACTEC MGIT">BACTEC MGIT</option>
                                                <option value="LIPA">LIPA</option>
                                                <option value="NITRATO REDUCTASA">NITRATO REDUCTASA</option>
                                                <option value="PCR EN T REAL">PCR EN T REAL</option>
                                                <option value="PROPORCIONES EN AGAR">PROPORCIONES EN AGAR</option>
                                                <option value="PROPORCIONES EN LJ">PROPORCIONES EN LJ</option>

                                            </select>
                                                
                                        </div>
                                        
                                        
                                        
                                        
                                    </div><HR>
                                    <div class="form-inline   " style="width: 100%;">
                                    
                                        <div class="form-group "   >
                                            <label for="medica27">S 1µg </label>
                                            <select id="medica27" class="form-control " aria-describedby="medica1" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica28">S 4µg </label>
                                            <select id="medica28" class="form-control " aria-describedby="medica2" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica29">H 0,1µg </label>
                                            <select id="medica29" class="form-control " aria-describedby="medica3" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica30">H 0,4µg </label>   
                                            <select id="medica30" class="form-control " aria-describedby="metodologiUti" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica31">R </label>
                                            <select id="medica31" class="form-control " aria-describedby="medica5" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        
                                
                                    </div>
                                    <div class="form-inline  " style="width: 100%;">
                                    
                                        <div class="form-group "   >
                                            <label for="medica32">E 5µg: </label>
                                            <select id="medica32" class="form-control " aria-describedby="medica6" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica33">E 7,5µg: </label>
                                            <select id="medica33" class="form-control " aria-describedby="medica7" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica34">Z:</label>
                                            <select id="medica34" class="form-control " aria-describedby="medica8" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica35">Km: </label>   
                                            <select id="medica35" class="form-control " aria-describedby="medica9" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica36">Lfx: </label>
                                            <select id="medica36" class="form-control " aria-describedby="medica10" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        
                                
                                    </div>
                                
                                    <div class="form-inline  " style="width: 100%;">
                                    
                                        <div class="form-group "    >
                                            <label for="medica37">Mfx:</label>
                                            <select id="medica37" class="form-control " aria-describedby="medica11" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica38">Am: </label>
                                            <select id="medica38" class="form-control " aria-describedby="medica12" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica39">Eto: </label>
                                            <select id="medica39" class="form-control " aria-describedby="medica13" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica40">Cm: </label>   
                                            <select id="medica40" class="form-control " aria-describedby="medica14" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica41">Ofx: </label>
                                            <select id="medica41" class="form-control " aria-describedby="medica15" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        
                                
                                    </div>
                                    <div class="form-inline  " style="width: 100%;">
                                        
                                        <div class="form-group "   >
                                            <label for="medica42">Cs:</label>
                                            <select id="medica42" class="form-control " aria-describedby="medica16" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica43">Otra:</label>
                                            <select id="medica43" class="form-control " aria-describedby="medica17" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica44">Otra:</label>
                                            <select id="medica44" class="form-control " aria-describedby="medica18" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica45">Otra: </label>   
                                            <select id="medica45" class="form-control " aria-describedby="medica19" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group "   >
                                            <label for="medica46">Otra: </label>
                                            <select id="medica46" class="form-control " aria-describedby="medica20" >
                                                <option></option>
                                                <option value="NR">NR</option>
                                                <option value="S">S</option>
                                                <option value="R">R</option>
                                                <option value="NI">NI</option>
                                                <option value="NV">NV</option>
                                                <option value="C">C</option>
                                                
                                            </select>
                                        </div>
                                        
                                
                                    </div> 
                                    <div class="form-inline  " style="width: 100%;">
                                        
                                        <div class="form-group "   >
                                            <label for="observacionessegubact">Observaciones del seguimiento:</label>
                                            <textarea id="observacionessegubact" class="form-control " aria-describedby="observacionessegubact" style="min-width:500px;"  rows="5"></textarea>
                                        </div>
                                    </div>
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
	<script src="../../../js/app/app_libroPacientes.js"></script>
	<script src="../../../js/app/app.js"></script>
	<script>
		
	</script>
	
  </body>
</html>
