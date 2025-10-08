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
					 <li><i class="fa fa-dashboard"></i><a href="index.html"> Registrar Quimioprofilaxis</a></li> 
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
                            <div class="form-group  col-md-3    "> 
                                <label for="fechaCaptacion">Fecha Captación: </label>
                                <input type='date' class="form-control" id="fechaCaptacion" onchange='Javascript: numeroAnoCaptacion();' >
                                    
                            </div>
                           
                            <div class="form-group  col-md-3    "> 
                                <label  for="numero">Numero: </label>
                                <input type='number' readonly class="form-control" id="numero"  >
                                    
                            </div>
                            <div class="form-group  col-md-3     "> 
                                <label for="trimestre">Trimestre: </label>
                                <input type='text' readonly class="form-control" id="trimestre"  >
                                    
                            </div>
                            <div class="form-group  col-md-3     "> 
                                <label for="ano">Año: </label>
                                <input type='number' readonly class="form-control" id="ano"  >
                                    
                            </div>
                         
                            <div class="form-group col-md-4 "> 
                                <label for="nombres">Nombres: </label>
                                <input type="text" class="form-control" id="nombres"  >
                                    
                            </div>
                            <div class="form-group col-md-4 "> 
                                <label for="tipoid">Tipo Id: </label>
                                <select   class="form-control" id="tipoid"  >
                                </select>
                            </div>
                            <div class="form-group col-md-4 "> 
                                <label for="numid"># Id: </label>
                                <input type="text" class="form-control" id="numid"  >
                                    
                            </div>
                            
                             
                            <div class="form-group col-md-3"> 
                                <label for="direccion">Direccion: </label>
                                <input type="text" class="form-control" id="direccion"  >
                                      
                            </div> 
                            <div class="form-group col-md-3  "> 
                                <label for="Barrio">Barrio: </label>
                                <input list="BarrioList" onChange="Javascript: cargarComuna();" name="Barrio" id="Barrio" class="form-control "  >
                                <datalist id="BarrioList">
                                    <option value="">
                                </datalist>
                            </div>
                            
                            <div class="form-group col-md-3 "> 
                                <label for="comuna">Comuna: </label>
                                <input type="TEXT" class="form-control" id="comuna"  >
                                      
                            </div> 
                              
                            <div class="form-group col-md-3 "> 
                                <label for="telefono">Tel/Cel: </label>
                                <input type="number" class="form-control" id="telefono"  >
                                      
                            </div> 
                            <div class="form-group col-md-4 "> 
                                <label for="etnia">Etnia: </label>
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
                                <label  for="puebloIndigena">Pueblo Indigena: </label>
                                <select class="form-control" id="puebloIndigena">
                                    <option> </option> 
                                </select>    
                            </div> 
                            <div class="form-group col-md-4 "> 
                                <label  for="grupoPoblacional">Grupo Poblacional: </label>
                                <select class="form-control" id="grupoPoblacional">
                                    <option> </option> 
                                </select>    
                            </div> 
                            <div class="form-group col-md-4 "> 
                                <label  for="dpto">Departamento: </label>
                                <select class="form-control" id="dpto" onchange="Javascript: listarMnpos();" >
                                    <option> </option> 
                                </select>   
                            </div>
                            <div class="form-group col-md-4"> 
                                <label  for="mnpo">Municipio: </label>
                                <select class="form-control" id="mnpo"  >
                                    <option> </option> 
                                </select>   
                            </div>
                             
                            <div class="form-group col-md-4 "> 
                                <label  for="ubicacionGeografica">Ubicacion Geografica: </label>
                                <select class="form-control" id="ubicacionGeografica"  >
                                    <option ></option> 
                                    <option value="RURAL">RURAL</option> 
                                    <option value="URBANA">URBANA</option> 
                                </select> 
                            </div>
                            <div class="form-group col-md-3 "> 
                                <label  for="edad">Edad: </label>
                                <select class="form-control" id="edad"  >
                                    <option ></option> 
                                     
                                </select>  
                                      
                            </div>
                            <div class="form-group col-md-3 "> 
                                <label  for="edad">U. medida edad: </label> 
                                <select class="form-control" id="edadMEdidad"  >
                                <option ></option>  
                                    <option value="1">MESES</option> 
                                    <option value="0">AÑOS</option> 
                                     
                                </select> 
                                      
                            </div>
                            <div class="form-group col-md-3 "> 
                                <label  for="sexo">Sexo: </label>
                                <select class="form-control" id="sexo"  >
                                    <option ></option> 
                                    <option value="M">M</option> 
                                    <option value="F">F</option> 
                                </select> 
                            </div>
                            
                            
                             
                            <div class="form-group col-md-3 "> 
                                <label  for="regimen">Regimen Afiliación: </label>
                                <select class="form-control" id="regimen"  >
                                    <option><option>
                                </select>
                                      
                            </div> 
                            <div class="form-group col-md-12 "> 
                                <label  for="eapb">Entidad Afiliadora: </label>
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
                        <div class="row">
                        	<div class="col-md-12">
		                        		
		                        <div class="panel panel-primary">
		                            <div class="panel-heading">
		                                <center>
		                                    <LABEL>
		                                        EVOLUCIÓN Y SEGUIMIENTO
		                                    </LABEL>
		                                </center>
		                            </div>
		                            <div class="panel-body">
		                                <div class=" row">
		                                     
		                                     <div class="form-group col-md-12 "> 
		                                         <label>Medios y Apoyo de Diagnostico</label>
		                                          
		                                     </div>  
		                                
		                                    <div class="form-group col-md-3 "> 
		                                        <label for="bk">bk: </label>
		                                        <select class="form-control" id="bk"   >
		                                            <option></option> 
		                                            <option value="NO REALIZADO">NO REALIZADO</option>
		                                            <option value="-">-</option>
		                                            <option value="+">+</option>
		                                            <option value="++">++</option>
		                                            <option value="+++">+++</option>
		                                            <option value="1 a 9 BAAR">1 a 9 BAAR</option> 
		                                        </select>
		                                            
		                                    </div> 
		                                    <div class="form-group col-md-3 "> 
		                                        <label for="cultivo">Cultivo: </label>
		                                        <select class="form-control" id="cultivo"  >
		                                            <option></option>
		                                            <option value="-">-</option>
		                                            <option value="+">+</option>
		                                            <option value="++">++</option>
		                                            <option value="+++">+++</option>
		                                            <option value="NA">NA</option>
		                                        </select>
		                                    </div> 
		                                    <div class="form-group col-md-3 "> 
		                                        <label for="realizoppd">Se Realizo PPD: </label>
		                                        <select name="realizoppd" id="realizoppd"  class="form-control "  >
		                                            <option></option>
		                                            <option value="SI">SI</option>
		                                            <option value="NO">NO</option>
		                                            
		                                        </select>
		                                    </div> 
		                                    <div class="form-group col-md-3 "> 
		                                        <label for="PPD">PPD(mm): </label>
		                                        <select name="PPD" id="PPD"  class="form-control "  >
		                                        </select>
		                                    </div> 
		                                        
		                                    
		                                    <div class="form-group col-md-3">
		                                        <label  onclick="Javascript: aass();" class="col-md-3 control-label" for="clinico">Clinico</label>
		                                        <div class="col-md-9">
		                                            <select id="clinico" class="multiselect-ui form-control" multiple="multiple">
		                                                
		                                                <option value="ASINTOMATICO">ASINTOMATICO</option>
		                                                <option value="FIEBRE">FIEBRE</option>
		                                                <option value="TOS">TOS</option>
		                                                <option value="SUDORACION">SUDORACION</option>
		                                                <option value="PERDIDA DE PESO">PERDIDA DE PESO</option>
		                                            </select>
		                                        </div>
		                                    </div>
		                                     

		                                    <div class="form-group col-md-3 "> 
		                                        <label for="rx">Rx: </label>
		                                        <select class="form-control" id="rx"   >
		                                            <option></option>
		                                            <option value="NORMAL">NORMAL</option>
		                                            <option value="SUGESTIVO">SUGESTIVO</option>
		                                            <option value="NO REALIZA">NO REALIZA</option>
		                                             
		                                        </select>
		                                            
		                                    </div>    
		                                    <div class="form-group col-md-3 "> 
		                                        <label for="nexoEpidemiologico">Nexo Epidemiologico: </label>
		                                        <input type="text" class="form-control " id="nexoEpidemiologico"   style="width:80%;">
		                                         
		                                            
		                                    </div>  

		                                    <div class="form-group col-md-3 "> 
		                                        <label for="criteirotpi">Criterio Por el Cual Se Administra TPI: </label>
		                                        <select class="form-control" id="criteirotpi"   >
		                                            <option></option>
		                                            <option value="VIH">VIH</option>
		                                            <option value="<5 CONTACTO TB P"><5 CONTACTO TB P</option>
		                                            <option value=">= CONTACTO TB P">>= CONTACTO TB P   </option>
		                                            <option value="SILICOSIS">SILICOSIS</option>
		                                            <option value="PRE TRANSPARENTE">PRE TRANSPARENTE</option>
		                                            <option value="TTO ANTI TNF">TTO ANTI TNF</option>
		                                            <option value="DIALISIS">DIALISIS</option>
		                                            <option value="OTRO">OTRO</option>
		                                             
		                                        </select>
		                                            
		                                    </div>   
		                                    <div class="form-group col-md-3 "> 
		                                        <label for="TratamientoAUtoriCompleto">Tratamiento Autorizado (Completo): </label>
		                                        <select class="form-control" id="TratamientoAUtoriCompleto"   >
		                                            <option></option>
		                                            <option value="180">180</option>
		                                            <option value="270">270</option>
		                                            <option value="360">360</option>
		                                            <option value="540">540</option>
		                                            <option value="810">810</option>
		                                             
		                                        </select>
		                                            
		                                    </div>    
		                                    <div class="form-group col-md-12">
		                                        <label>Control de Evolución Medica</label>

		                                    </div>
 
		                                    <div class="form-group col-md-4 "> 
		                                        <label for="cirterioMedico1">1: </label>
		                                        <input Type="text" class="form-control" id="cirterioMedico1"   >
		                                           
		                                            
		                                    </div>   
		                                    <div class="form-group col-md-4 "> 
		                                        <label for="cirterioMedico2">2: </label>
		                                        <input Type="text" class="form-control" id="cirterioMedico2"   >
		                                           
		                                            
		                                    </div>   
		                                    <div class="form-group col-md-4 "> 
		                                        <label for="cirterioMedico3">3: </label>
		                                        <input Type="text" class="form-control" id="cirterioMedico3"   >
		                                           
		                                            
		                                    </div>   
		                                    <div class="form-group col-md-4 "> 
		                                        <label for="cirterioMedico4">4: </label>
		                                        <input Type="text" class="form-control" id="cirterioMedico4"   >
		                                           
		                                            
		                                    </div>   
		                                    <div class="form-group col-md-4 "> 
		                                        <label for="cirterioMedico5">5: </label>
		                                        <input Type="text" class="form-control" id="cirterioMedico5"   >
		                                           
		                                            
		                                    </div>   
		                                    <div class="form-group col-md-4 "> 
		                                        <label for="cirterioMedico6">6: </label>
		                                        <input Type="text" class="form-control" id="cirterioMedico6"   >
		                                           
		                                            
		                                    </div>   
		                                    <div class="form-group col-md-4 "> 
		                                        <label for="cirterioMedico7">7: </label>
		                                        <input Type="text" class="form-control" id="cirterioMedico7"   >
		                                           
		                                            
		                                    </div>   
		                                    <div class="form-group col-md-4 "> 
		                                        <label for="cirterioMedico8">8: </label>
		                                        <input Type="text" class="form-control" id="cirterioMedico8"   >
		                                           
		                                            
		                                    </div>   

		                                    <div class="form-group col-md-4 "> 
		                                        <label for="cirterioMedico9">9: </label>
		                                        <input Type="text" class="form-control" id="cirterioMedico9"   >
		                                           
		                                            
		                                    </div>   
		                                    
		                                    <div class="form-group col-md-4">
		                                        <label for="tarjeteattoegreso">Tarjeta de Tratamiento al Egreso:</label>
		                                        <select class="form-control" id="tarjeteattoegreso"   >
		                                            <option></option>
		                                            <option value="SI">SI</option>
		                                            <option value="NO">NO</option>
		                                        </select>
		                                    </div>
 
		                                <hr> 
		                                    <div class="form-group col-md-4 "> 
		                                        <label for="IpsIniciaMnjo">Ips que Inicia el Manejo: </label>
		                                        <select name="IpsIniciaMnjo" id="IpsIniciaMnjo" class="form-control "  >
		                                        </select>  
		                                    </div>  
		                                    <div class="form-group col-md-4 "> 
		                                        <label for="IpscontinuaMnjo">Ips que Continua o sitio al Cual se Transfirio el Paciente: </label>
		                                        <select name="IpscontinuaMnjo" id="IpscontinuaMnjo" class="form-control "  >
		                                        
		                                        </select>       
		                                    </div>  
		                                    <div class="form-group col-md-4">
		                                        <label for="condicionegreso">Condicion de Egreso:</label>
		                                        <select class="form-control" id="condicionegreso"   >
		                                            <option></option>
		                                            <option value="SI">SI</option>
		                                            <option value="NO">NO</option>
		                                        </select>
		                                    </div>
 
		                                    <div class="form-group col-md-4">
		                                        <label for="observacionesFormatoMSPS">Observaciones Formato MSPS: </label>
		                                        <textarea  class="form-control" cols="70" id="observacionesFormatoMSPS"   ></textarea>
		                                          
		                                    </div> 
		                                    <div class="form-group col-md-4">
		                                        <label for="observacionesFormatoIDS">Observaciones del Formato IDS:</label>
		                                        <textarea  class="form-control" cols="69" id="observacionesFormatoIDS"   ></textarea>
		                                          
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
										<a type="button" class="btn btn-success  " id="RegistroP" >Registrar</a>
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
