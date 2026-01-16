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
                                <select class="form-control" id="dpto" onchange="Javascript: seleccionDpto('dpto', 'mnpo');" >
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
                                    <option></option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="52">52</option>
                                    <option value="53">53</option>
                                    <option value="54">54</option>
                                    <option value="55">55</option>
                                    <option value="56">56</option>
                                    <option value="57">57</option>
                                    <option value="58">58</option>
                                    <option value="59">59</option>
                                    <option value="60">60</option>
                                    <option value="61">61</option>
                                    <option value="62">62</option>
                                    <option value="63">63</option>
                                    <option value="64">64</option>
                                    <option value="65">65</option>
                                    <option value="66">66</option>
                                    <option value="67">67</option>
                                    <option value="68">68</option>
                                    <option value="69">69</option>
                                    <option value="70">70</option>
                                    <option value="71">71</option>
                                    <option value="72">72</option>
                                    <option value="73">73</option>
                                    <option value="74">74</option>
                                    <option value="75">75</option>
                                    <option value="76">76</option>
                                    <option value="77">77</option>
                                    <option value="78">78</option>
                                    <option value="79">79</option>
                                    <option value="80">80</option>
                                    <option value="81">81</option>
                                    <option value="82">82</option>
                                    <option value="83">83</option>
                                    <option value="84">84</option>
                                    <option value="85">85</option>
                                    <option value="86">86</option>
                                    <option value="87">87</option>
                                    <option value="88">88</option>
                                    <option value="89">89</option>
                                    <option value="90">90</option>
                                    <option value="91">91</option>
                                    <option value="92">92</option>
                                    <option value="93">93</option>
                                    <option value="94">94</option>
                                    <option value="95">95</option>
                                    <option value="96">96</option>
                                    <option value="97">97</option>
                                    <option value="98">98</option>
                                    <option value="99">99</option>
                                    <option value="100">100</option>
                                    <option value="101">101</option>
                                    <option value="102">102</option>
                                    <option value="103">103</option>
                                    <option value="104">104</option>
                                    <option value="105">105</option>
                                    <option value="106">106</option>
                                    <option value="107">107</option>
                                    <option value="108">108</option>
                                    <option value="109">109</option>
                                    <option value="110">110</option>
                                    <option value="111">111</option>
                                    <option value="112">112</option>
                                    <option value="113">113</option>
                                    <option value="114">114</option>
                                    <option value="115">115</option>
                                    <option value="116">116</option>
                                    <option value="117">117</option>
                                    <option value="118">118</option>
                                    <option value="119">119</option>
                                    <option value="120">120</option>
                                    <option value="121">121</option>
                                    <option value="122">122</option>
                                    <option value="123">123</option>
                                    <option value="124">124</option>
                                    <option value="125">125</option>
                                    <option value="126">126</option>
                                    <option value="127">127</option>
                                    <option value="128">128</option>
                                    <option value="129">129</option>
                                    <option value="130">130</option>
                                </select> 
                                      
                            </div>
                            <div class="form-group col-md-3 "> 
                                <span>Tipo Id: </span>
                                <select   class="form-control" id="tipoid"  >
                                    <option>
                                    </option>
                                    <option value="CC">CC</option>
                                    <option value="CE">CE</option>
                                    <option value="TI">TI</option>
                                    <option value="RC">RC</option>
                                    <option value="MS">MS</option>
                                    <option value="AS">AS</option>
                                    <!--<option value="CR">CR</option>-->
                                    <option value="PS">PS</option>
                                    <option value="NUIP">NUIP</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3 "> 
                                <span># Id: </span>
                                <input type="text" class="form-control" id="numid"  >
                                    
                            </div>
                             
                            <div class="form-group col-md-4 "> 
                                <span>Etnia: </span>
                                <select class="form-control" id="etnia" onChange="controlarIndigenas()">
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
                                    <option></option>
                                    <option value="OTRO">OTRO</option>
                                    <option value="FUERZAS MILITARES - POLICIA">FUERZAS MILITARES - POLICIA</option>
                                    <option value="PERSONA CON DISCAPACIDAD">PERSONA CON DISCAPACIDAD</option>
                                    <option value="DESPLAZADO">DESPLAZADO</option>
                                    <option value="MIGRANTE">MIGRANTE</option>
                                    <option value="POBLACIÓN CARCELARIA">POBLACIÓN CARCELARIA</option>
                                    <option value="GESTANTE">GESTANTE</option>
                                    <option value="HABITANTE DE CALLE">HABITANTE DE CALLE</option>
                                    <option value="POBLACIÓN INFANTIL A CARGO DEL ICBF">POBLACIÓN INFANTIL A CARGO DEL ICBF</option>
                                    <option value="MADRES COMUNITARIAS">MADRES COMUNITARIAS</option>
                                    <option value="DESMOVILIZADOS">DESMOVILIZADOS</option>
                                    <option value="POBLACIÓN EN CENTROS PSIQUIATRICOS">POBLACIÓN EN CENTROS PSIQUIATRICOS</option>
                                    <option value="VICTIMA DE VIOLENCIA ARMADA">VICTIMA DE VIOLENCIA ARMADA</option>
                                    <option value="TRABAJADOR DE LA SALUD">TRABAJADOR DE LA SALUD</option>
                                    <option value="DESPLAZADO">DESPLAZADO</option>
                                </select>    
                            </div>
                              
                            <div class="form-group col-md-3  "> 
                                <span>Sector: </span>
                                <select name="sector" id="sector" class="form-control "   >
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
                                <input type="text" name="ocupacion" id="ocupacion" class="form-control "  >
                                  
                            </div> 
                              
                            
                            <div class="form-group col-md-3 "> 
                                <span>Regimen Afiliación: </span>
                                <select class="form-control" id="regimen"  >
                                    <option></option>
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
                            <div class="form-group col-md-3 "> 
                                <span>Entidad Afiliadora: </span>
                                <input list="eapbList" name="eapb" id="eapb" class="form-control "  >
                                <datalist id="eapbList">
                                    <option></option>
                                    <option value="ASOCIACION MUTUAL LA ESPERANZA ASMET SALUD ESS"></option>
                                    <option value="CAJA DE COMPENSACIÓN FAMILIAR DE SUCRE - COMFASUCRE"></option>
                                    <option value="CAPITAL SALUD E.P.S."></option>
                                    <option value="CAPRESOCA E.P.S"></option>
                                    <option value="COMFAORIENTE  CAJA DE COMPENSACION FAMILIAR DEL ORIENTE"></option>
                                    <option value="COOMEVA E.P.S. S.A."></option>
                                    <option value="COOPERATIVA DE SALUD COMUNITARIA-COMPARTA"></option>
                                    <option value="DIRECCION DE SANIDAD POLICIA NACIONAL"></option>
                                    <option value="DIRECCION GENERAL DE SANIDAD MILITAR"></option>
                                    <option value="ECOPETROL"></option>
                                    <option value="EMPRESA COOPERATIVA SOLIDARIA DE SALUD ECOOPSOS"></option>
                                    <option value="EPS COOSALUD"></option>
                                    <option value="EPS SALUDVIDA"></option>
                                    <option value="EPS SANITAS"></option>
                                    <option value="FIDUPREVISORA S.A"></option>
                                    <option value="MEDIMAS"></option>
                                    <option value="NO APLICA"></option>
                                    <option value="NUEVA EPS"></option>
                                </datalist>   
                            </div> 
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <center>
                                            <span>
                                                Pruebas Realizadas
                                            </span>
                                        </center>
                                    </div>
                                    <div class="panel-body">
                                        <form action='Javascript: adjuntarPrueba();'>
                                            <div class="form-inline row">
                                            
                                                <div class="form-group col "> 
                                                    <span>Prueba Realizada: </span>
                                                    <select class="form-control" id="pruebaRealizada"  required>
                                                        <option></option>
                                                        <option value="BK">BK</option>
                                                        <option value="CULTIVO">CULTIVO</option>
                                                        <option value="PRUEBA MOLECULAR">PRUEBA MOLECULAR</option>
                                                        <option value="NINGUNA">NINGUNA</option>
                                                    </select>
                                                        
                                                </div> 
                                                <div class="form-group col "> 
                                                    <span>Resultado Prueba: </span>
                                                    <select class="form-control" id="resultadoPrueba"  >
                                                        <option></option>
                                                        <option value="-">-</option>
                                                        <option value="+">+</option>
                                                        <option value="++">++</option>
                                                        <option value="+++">+++</option>
                                                        <option value="NA">NA</option>
                                                    </select>
                                                </div> 
                                                <div class="form-group col "> 
                                                    <span>Fecha Prueba: </span>
                                                    <input type="date" name="fechaPreuba" id="fechaPreuba"  class="form-control "  >
                                                    
                                                </div> 
                                                <div class="form-group col "> 
                                                    <input type="submit" class="btn btn-success"  value='Adjuntar Prueba'> 
                                                    
                                                </div> 
                                                
                                                
                                            </div>
                                        </form>
                                        <br>
                                        <div class="form-inline row">
                                            
                                                <table  class="table table-striped display" id="TablePruebasRealizadas" >
                                                    <thead >
                                                        <tr > 
                                                            <th>Prueba Realizada</th>
                                                            <th>Resultado Prueba</th>
                                                            <th>Fecha Prueba</th>
                                                            <th>Acción</th>
                                                            
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody id="TablaPruebasRealizadas" class="text-default">
                                                        <tr class="text-center">
                                                            <td colspan="4" class="bg-info"> SIN DATOS</td>
                                                        </tr>
                                                    
                                                    </tbody>
                                                </table> 
                                        </div>
                                
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group col-md-4 "> 
                                <span>Observaciones: </span>
                                <textarea class="form-control" id="observaciones" cols="90"></textarea>
                                        
                            </div>  
                            <div class="form-group col-md-4 "> 
                                <span>Institucion: </span>
                                <input list="institucionList" name="institucion" id="institucion" class="form-control "  >
                                <datalist id="institucionList">
                                    
                                </datalist>      
                            </div>  
                            <div class="form-group col-md-4 "> 
                                <span>Responsable: </span>
                                <input type="text" class="form-control" id="responsable"  > 
                                        
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
										<a type="button" class="btn btn-success  " id="RegistroP"  onclick="registrarSintomatico()">Registrar Sintomatico respiratorio</a>
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
