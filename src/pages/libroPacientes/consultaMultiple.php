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
        .form-check {
    margin: 10px 0;
    display: flex;
    align-items: center;
  }

  .form-check-input {
    width: 20px;
    height: 20px;
    margin-right: 10px;
    accent-color: #007bff; /* Cambia el color del checkbox en navegadores modernos */
    cursor: pointer;
  }

  .form-check-label {
    font-size: 16px;
    color: #333;
    cursor: pointer;
  }
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
					 <li><i class="fa fa-dashboard"></i><a href="index.html"> Consulta Multiple</a></li> 
				</ul>
			</div><!-- /breadcrumb-->
		 
		 
			<div class="padding-md" > 
				<div class="row">
					<div class="col-lg-12">
						<div class="panel   fadeInDown animation-delay5" >
							
							<div class="panel-body">
								
								<div class="row">
                                    <div class="col-md-12">
                                                                      <div class="form-group col-md-2 ">
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
  <label class="form-check-label" for="flexCheckChecked">
    Checked checkbox
  </label>
</div>
                                    </div>
									<div class="col-md-12 ">
                                        <div class="form-inline row">
              
                                                <label class="fancy-checkbox" >
                                                    <input type="checkbox" style="border: 1px solid black;" class="form-check" id="CCM-ano" onChange="Javascript: checkBoxConsultaMultiple('ano');">
                                                    <span>Año: </span>
                                                    <select class="form-control" id="CM-ano" disabled>
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
                                                </label>  
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label class="fancy-checkbox" >
                                                    <input type="checkbox" id="CCM-trimestre" onChange="Javascript: checkBoxConsultaMultiple('trimestre');">
                                                    <span>Trimestre: </span>
                                                    <select class="form-control" id="CM-trimestre" disabled>
                                                        <option > </option>
                                                        <option value="I">I</option>
                                                        <option value="II">II</option> 
                                                        <option value="III">III</option>
                                                        <option value="IV">IV</option> 
                                                    </select>
                                                </label>  
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="fancy-checkbox" >
                                                    <input type="checkbox" id="CCM-sexo" onChange="Javascript: checkBoxConsultaMultiple('sexo');">
                                                    <span>Sexo</span>
                                                    <select class="form-control" id="CM-sexo" disabled>
                                                        <option > </option>
                                                        <option value="F">F</option>
                                                        <option value="M">M</option> 
                                                    </select>
                                                </label>  
                                            </div>
                                            
                                        </div>
                                        <div class="form-inline row">
                                            <div class="form-group col-md-4 ">
                                                <label class="fancy-checkbox" >
                                                    <input type="checkbox" id="CCM-dpto" onChange="Javascript: checkBoxConsultaMultiple('dpto');">
                                                    <span>Entidad Territorial: </span>
                                                    <input class="form-control" id="CM-dpto" name="CM-dpto" list="CM-dptoES" disabled  >
                                                    <datalist id="CM-dptoES">
                                            
                                                    </datalist>  
                                                    
                                                </label>  
                                            </div>
                                            <div class="form-group col-md-4 ">
                                                <label class="fancy-checkbox" >
                                                    <input type="checkbox" id="CCM-mnpo" onChange="Javascript: checkBoxConsultaMultiple('mnpo');">
                                                    <span>Municipio: </span>
                                                    <input class="form-control" id="CM-mnpo" name="CM-mnpo" list="CM-mnpoES" disabled  >
                                                    <datalist id="CM-mnpoES">
                                            
                                                    </datalist>  
                                                </label>  
                                            </div> 
                                        </div>
                                        <div class="form-inline row">
                                            <div class="form-group col-md-12 ">
                                                <label class="fancy-checkbox" >
                                                    <input type="checkbox" id="CCM-ipsInicia" onChange="Javascript: checkBoxConsultaMultiple('ipsInicia');">
                                                    <span>IPS que Inicia Tratamiento: </span>
                                                    <input class="form-control" id="CM-ipsInicia" name="CM-ipsInicia" list="CM-ipsIniciaes" disabled style="width:60%;">
                                                    <datalist id="CM-ipsIniciaes">
                                            
                                                    </datalist>  
                                                </label>  
                                            </div>  
                                        </div>
                                        <div class="form-inline row">
                                            <div class="form-group col-md-12 ">
                                                <label class="fancy-checkbox" >
                                                    <input type="checkbox" id="CCM-ipsContinua" onChange="Javascript: checkBoxConsultaMultiple('ipsContinua');">
                                                    <span>IPS que Continua Tratamiento: </span>
                                                    <input class="form-control" id="CM-ipsContinua" name="CM-ipsContinua" list="CM-ipsContinuaes" disabled style="width:60%;">
                                                    <datalist id="CM-ipsContinuaes">
                                            
                                                    </datalist> 
                                                </label>  
                                            </div>  
                                        </div>
                                        <div class="form-inline row">
                                            <div class="form-group col-md-12 ">
                                                <label class="fancy-checkbox" >
                                                    <input type="checkbox" id="CCM-eapb" onChange="Javascript: checkBoxConsultaMultiple('eapb');">
                                                    <span>EPS/ARS: </span>
                                                    <input class="form-control" id="CM-eapb" name="CM-eapb" list="CM-eapbes" disabled style="width: 60%;">
                                                    <datalist id="CM-eapbes">
                                            
                                                    </datalist>
                                                </label>  
                                            </div>  
                                        </div>
                                        
                                        <div class="form-inline row">
                                            <div class="form-group col-md-3 ">
                                                <label class="fancy-checkbox" >
                                                    <input type="checkbox" id="CCM-regimen" onChange="Javascript: checkBoxConsultaMultiple('regimen');">
                                                    <span>Regimen: </span>
                                                    <select class="form-control" id="CM-regimen" disabled>
                                                        
                                                    </select>
                                                </label>  
                                            </div>  
                                            <div class="form-group col-md-5 ">
                                                <label class="fancy-checkbox" >
                                                    <input type="checkbox" id="CCM-grupoP" onChange="Javascript: checkBoxConsultaMultiple('grupoP');">
                                                    <span>Grupo Poblacional: </span>
                                                    <select class="form-control" id="CM-grupoP" disabled>
                                                       
                                                    </select>
                                                </label>  
                                            </div>  
                                            <div class="form-group col-md-4">
                                                <label class="fancy-checkbox" >
                                                    <input type="checkbox" id="CCM-edades" onChange="Javascript: checkBoxConsultaMultiple('edades');">
                                                    <span>Rango de Edades: </span>
                                                    <select class="form-control" id="CM-edades" disabled>
                                                        <option > </option>
                                                        <option value="PRIMERA INFANCIA 0 - 5 AÑOS">PRIMERA INFANCIA 0 - 5 AÑOS</option>
                                                        <option value="INFANCIA 6 - 12 AÑOS">INFANCIA 6 - 12 AÑOS</option> 
                                                        <option value="ADOLESCENCIA 13 - 17 AÑOS">ADOLESCENCIA 13 - 17 AÑOS</option> 
                                                        <option value="JUVENTUD 18 - 26 AÑOS">JUVENTUD 18 - 26 AÑOS</option> 
                                                        <option value="ADULTO JOVEN 27 - 45 AÑOS">ADULTO JOVEN 27 - 45 AÑOS</option> 
                                                        <option value="ADULTO MAYOR 46 AÑOS O MAS">ADULTO MAYOR 46 AÑOS O MAS</option> 
                                                    </select>
                                                </label>  
                                            </div>  
                                        </div>
                                        <div class="form-inline row">
                                            <div class="form-group col-md-3">
                                                <label class="fancy-checkbox" >
                                                    <input type="checkbox" id="CCM-tipotb" onChange="Javascript: checkBoxConsultaMultiple('tipotb');">
                                                    <span>Tipo Tuberculosis: </span>
                                                    <select class="form-control" id="CM-tipotb" disabled>
                                                        <option></option>
                                                        <option values="PULMONAR">PULMONAR</option>
                                                       
                                                    </select>
                                                </label>  
                                            </div>  
                                            <div class="form-group col-md-3">
                                                <label class="fancy-checkbox" >
                                                    <input type="checkbox" id="CCM-condIngreso" onChange="Javascript: checkBoxConsultaMultiple('condIngreso');">
                                                    <span>Condicion Ingreso: </span>
                                                    <select class="form-control" id="CM-condIngreso" disabled>
                                                        <option></option>
                                                        <option values="NUEVO">NUEVO</option>
                                                        <option values="NUEVO">FRACASO</option>
                                                        <option values="NUEVO">ABANDONO</option>
                                                        <option values="NUEVO">RECAIDA</option>
                                                        <option values="NUEVO">TRANSFERIDO</option> 
                                                    </select>
                                                </label>  
                                            </div>  
                                            <div class="form-group col-md-5">
                                                <label class="fancy-checkbox" >
                                                    <input type="checkbox" id="CCM-condEgreso" onChange="Javascript: checkBoxConsultaMultiple('condEgreso');">
                                                    <span>Condicion Egreso: </span>
                                                    <select class="form-control" id="CM-condEgreso" disabled>
                                                        <option > </option>
                                                        <option values="TRATAMIENTO TERMINADO">TRATAMIENTO TERMINADO</option>
                                                        <option values="CURADO">CURADO</option>
                                                        <option values="FRACASO">FRACASO</option>
                                                        <option values="PERDIDA EN EL SEGUIMIENTO">PERDIDA EN EL SEGUIMIENTO</option>
                                                        <option values="FALLECIDO DURANTE EL TRATAMIENTO">FALLECIDO DURANTE EL TRATAMIENTO</option> 
                                                        <option values="NO EVALUADO">NO EVALUADO</option>
                                                        <option values="EXCLUIDO DE LA COHORTE POR RR">EXCLUIDO DE LA COHORTE POR RR</option>
                                                        <option values="DESCARTADO">DESCARTADO</option>
                                                        <option values="EXCLUIDO DE LA COHORTE POR RESISTENCIA">EXCLUIDO DE LA COHORTE POR RESISTENCIA</option>
                                                        <option values="FALLECIDO">FALLECIDO</option> 
                                                        <option values="ABANDONO">ABANDONO</option>
                                                        <option values="TRANSFERIDO">TRANSFERIDO</option>
                                                        <option values="SN">SN</option>
                                                    </select>
                                                </label>  
                                            </div>  
                                        </div>
                                        <div class="form-inline row">
                                            <div class="form-group col-md-7">
                                                <label class="fancy-checkbox" >
                                                    <input type="checkbox" id="CCM-vihwb" onChange="Javascript: checkBoxConsultaMultiple('vihwb');">
                                                    <span>VIH - WB: </span>
                                                    <select class="form-control" id="CM-vihwb" disabled>
                                                        <option></option>
                                                        
                                                       
                                                    </select>
                                                </label>  
                                            </div>  
                                            <div class="form-group col-md-5 " id="apol"> 
                                                
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
										<button type="button" class="btn btn-success  "   onclick="Javascript: validarCheckBox();" style="background-color: #41B314;  height: 30px; width:100%;">Consultar</button>
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
