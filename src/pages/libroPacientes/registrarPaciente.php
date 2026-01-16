<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <title>SISTB</title>
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
      </div>
      <!-- /theme-setting -->
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
         </div>
         <!-- /breadcrumb-->
         <div class="padding-md">
            <div class="row">
               <div class="col-lg-12">
                  <div class="panel   fadeInDown animation-delay5" style="box-shadow: 3px 3px #888888">
                     <div class="panel-body">
                        <div class="row">
                           <div class="col-md-12 ">
                              <div class="form-group text-center"  >
                                 <label for="Nombres" >Nombres: </label>
                                 <input type="text" id="Nombres" class="form-control text-center"   aria-describedby="Nombres" >
                              </div>
                              <div class="col-md-12">
                                 <div class="form-inline text-center">
                                    <div class="form-group ">
                                       <label for="TipoId">Tipo Id: </label>
                                       <select id="TipoId" class="form-control " aria-describedby="TipoId">
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
                                    <div class="form-group">
                                       <label for="id"># Id: </label>
                                       <input type="text" id="id" class="form-control" aria-describedby="id">
                                    </div>
                                    <div class="form-group "  >
                                       <label for="Trimestre"> Trimestre: </label>
                                       <input type="text" id="Trimestre" readonly class="form-control " aria-describedby="Trimestre"  >
                                       <label for="ano"> Año: </label>
                                       <input type="number" id="ano" readonly class="form-control "  aria-describedby="ano">
                                    </div>
                                    <div class="form-group "  >
                                       <label for="Consecutivo">Consecutivo:</label>
                                       <input type="number" id="Consecutivo" readonly value="001" class="form-control " aria-describedby="Consecutivo">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <br>
                                 <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">Datos Basicos - Identificación del Paciente</a></li>
                                    <li><a data-toggle="tab" href="#menu1">Diagnostico y Clasificación</a></li>
                                    <li><a data-toggle="tab" href="#menu2">Control de Tratamiento</a></li>
                                    <li><a data-toggle="tab" href="#menu3">Acciones de Vigilancia</a></li>
                                 </ul>
                                 <div class="tab-content">
                                    <br>
                                    <div id="home" class="tab-pane fade in active">
                                       <div class="row ">
                                          <div class="col-md-4 ">
                                             <label for="ingresaT" >Ingresa Tratamiento: </label>
                                             <select id="ingresaT" class="form-control " aria-describedby="ingresaT">
                                                <option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                                </option>
                                             </select>
                                          </div>
                                          <div class="col-md-4 asa">
                                             <label for="FechaGM"> Fecha de Gestion al Medicamento: </label>
                                             <input type="date" id="FechaGM" class="form-control " aria-describedby="FechaGM">
                                          </div>
                                          <div class="col-md-4 asa" id="divtaes">
                                             <label for="FechaIT"> Fecha de Inicio TAES: </label>
                                             <input type="date" id="FechaIT" class="form-control " aria-describedby="FechaIT">
                                          </div>
                                          <div class="col-md-6"   >
                                             <label for="ipsdiagnostica" >IPS que Diagnostica: </label>
                                             <!--<select name="ipsdiagnosticaEs" id="ipsdiagnosticaEs" class="form-control " >
                                                <option></option>
                                                </select>-->
                                             <input list="listaIps1" id="ipsdiagnosticaEs" placeholder="Selecciona una IPS..."  class="form-control ">
                                             <datalist id="listaIps1"></datalist>
                                          </div>
                                          <div class="col-md-6"  >
                                             <label for="ipscontinua" >IPS que Continua: </label>
                                             <!--<select name="ipscontinuaES" id="ipscontinuaESs" class="form-control "  >
                                                </select>-->
                                             <input list="listaIps2" id="ipscontinuaES" placeholder="Selecciona una IPS..."  class="form-control ">
                                             <datalist id="listaIps2"></datalist>
                                          </div>
                                          <div class="col-md-4"  >
                                             <label for="Pais" >Pais: </label>
                                             <select name="Pais" id="pasi" class="form-control ">
                                                <option value="45">COLOMBIA</option>
                                             </select>
                                          </div>
                                          <div class="col-md-4 asa"  >
                                             <label for="Entidadt" >Entidad Territorial: </label>
                                             <select list="Entidadt" name="Entidadt" id="Entidadte" class="form-control " onChange="seleccionDpto('Entidadte','Municipiope')">
                                                <option></option>
                                             </select>
                                          </div>
                                          <div class="col-md-4 asa munprov"  >
                                             <label for="Municipiop" >Municipio Procedencia: </label>
                                             <select list="Municipiop" name="Municipiop" id="Municipiope" class="form-control ">
                                             </select>
                                          </div>
                                          <div class="col-md-4 " >
                                             <label for="sexo" >Sexo: </label>
                                             <select id="sexo" class="form-control " aria-describedby="sexo"  >
                                                <option>
                                                </option>
                                                <option value="F">F</option>
                                                <option value="M">M</option>
                                             </select>
                                          </div>
                                          <div class="col-md-4 " >
                                             <label for="edad"> Edad: </label>
                                             <input type="edad" id="edad" class="form-control " aria-describedby="FechaGM">
                                          </div>
                                          <div class="col-md-4 asa" >
                                             <label for="UnidadM"> Unidad de Medida: </label>
                                             <select id="UnidadM" class="form-control ">
                                                <option value=""></option>
                                                <option value="0">AÑOS</option>
                                                <option value="1">MESES</option>
                                             </select>
                                          </div>
                                          <div class="col-md-6 "  >
                                             <label for="PertenenciaE" >Pertenencia Etnica: </label>
                                             <select id="PertenenciaE" class="form-control " aria-describedby="PertenenciaE" onChange="controlarIndigenas()">
                                                <option>
                                                </option>
                                                <option value="OTRO">OTRO</option>
                                                <option value="NEGRO, MULATO, AFROCOLOMBIANO">NEGRO, MULATO, AFROCOLOMBIANO</option>
                                                <option value="PALENQUERO">PALENQUERO</option>
                                                <option value="ROOM (GITANO)">ROOM (GITANO)</option>
                                                <option value="INDIGENA">INDIGENA</option>
                                                <option value="RAIZAL">RAIZAL</option>
                                             </select>
                                          </div>
                                          <div class="col-md-6 asa pueblii" >
                                             <label for="Puebloi">Pueblo Indígena: </label>
                                             <select id="Puebloi" class="form-control ">
                                                <option value=""></option>
                                             </select>
                                          </div>
                                          <div class="col-md-4 "   >
                                             <label for="Sector" >Sector: </label>
                                             <select id="Sector" class="form-control " aria-describedby="Sector"   >
                                                <option>
                                                </option>
                                                <option value="ASENTAMIENTO">ASENTAMIENTO</option>
                                                <option value="BARRIO">BARRIO</option>
                                                <option value="VEREDA">VEREDA</option>
                                                <option value="CORREGIMIENTO">CORREGIMIENTO</option>
                                             </select>
                                          </div>
                                          <div class="col-md-4 "  >
                                             <label for="SECTORLE" >Descripción  sector: </label>
                                             <input type="text" name="SECTORL" class="form-control " id="SECTORLE"  >
                                          </div>
                                          <div class="col-md-4 " >
                                             <label for="Comuna" >Comuna: </label>
                                             <input type="text" id="Comuna" class="form-control " aria-describedby="Comuna"  >
                                          </div>
                                          <div class="col-md-6"  >
                                             <label for="ocupacion" >Ocupación: </label>
                                             <input list="ocupacion" name="ocupacion" id="ocupaciones" class="form-control "  >
                                             <datalist id="ocupacion">
                                                <option value="">
                                             </datalist>
                                          </div>
                                          <div class="col-md-6"  >
                                          <label for="EAPB" >EAPB: </label>
                                          <input list="EAPB" name="EAPB" id="EAPBes" class="form-control " >
                                          <datalist id="EAPB">
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
                                          <div class="col-md-4 "  >
                                          <label for="Regimen" >Régimen: </label>
                                          <select id="Regimen" class="form-control " aria-describedby="Regimen" >
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
                                          <div class="col-md-4 "   >
                                             <label for="UbicacionG"> Ubicación Geográfica: </label>
                                             <select id="UbicacionG" class="form-control " aria-describedby="UbicacionG"  >
                                                <option>
                                                </option>
                                                <option value="URBANA">URBANA</option>
                                                <option value="RURAL">RURAL</option>
                                             </select>
                                          </div>
                                          <div class="col-md-4 " >
                                             <label for="telefono" >Teléfonos: </label>
                                             <input type="number" id="telefono" class="form-control " aria-describedby="telefono">
                                          </div>
                                          <div class="col-md-3 " >
                                             <label for="direccion"> Dirección: </label>
                                             <input type="text" id="direccion" class="form-control " aria-describedby="direccion" >
                                          </div>
                                          <div class="col-md-3 vieGeupoP"  >
                                             <label for="grupoPob"> Grupo Poblacional: </label>
                                             <select id="grupoPob" class="form-control " aria-describedby="grupoPob" >
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
                                          <div class="col-md-3 asa"  >
                                             <label for="Departamenton" >Departemento que Notifica: </label>
                                             <select name="Departamenton" id="Departamenton" class="form-control " onChange="seleccionDpto('Departamenton','MunicipionE')">
                                                <option></option>
                                             </select>
                                          </div>
                                          <div class="col-md-3" >
                                             <label for="Municipion" >Municipio que Notifica: </label>
                                             <select name="Municipion" id="MunicipionE" class="form-control " >
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                       <div class="row " style="width: 100%;">
                                          <div class="col-md-3 "   >
                                             <label for="FechaIS" >Fecha inicio Sintomas: </label>
                                             <input type="date" id="FechaIS" class="form-control " aria-describedby="FechaIS"   >
                                          </div>
                                          <div class="col-md-3 "   >
                                             <label for="fechaD"> fecha Diagnostico: </label>
                                             <input type="date" id="fechaD" class="form-control "  onChange="calcularTrimestre()" aria-describedby="fechaD"   >
                                          </div>
                                          <div class="col-md-3 "  >
                                             <label for="tipotb" >Tipo de Tuberculosis: </label>
                                             <select id="tipotb" class="form-control " aria-describedby="tipotb" onChange="controlarTipoTB()"  >
                                                <option></option>
                                                <option value="PULMONAR">PULMONAR</option>
                                                <option value="EXTRAPULMONAR">EXTRAPULMONAR</option>
                                             </select>
                                          </div>
                                          <div class="col-md-3 "    >
                                             <label for="Localizacion"> Localizacion: </label>  
                                             <select id="Localizacion" class="form-control " aria-describedby="Localizacion"   >
                                                <option></option>
                                             </select>
                                          </div>
                                          <div class="col-md-3 condiv" >
                                             <label for="Condicioni"> Condición de Ingreso: </label>
                                             <select id="Condicioni" class="form-control " aria-describedby="Condicioni">
                                                <option></option>
                                                <option value="REINGRESO TRAS PERDIDA EN EL SEGUIMIENTO">REINGRESO TRAS PERDIDA EN EL SEGUIMIENTO</option>
                                                <option value="REINGRESO TRAS FRACASO">REINGRESO TRAS FRACASO</option>
                                                <option value="REINGRESO TRAS RECAIDA">REINGRESO TRAS RECAIDA</option>
                                                <option value="OTROS PREVIAMENTE TRATADOS">OTROS PREVIAMENTE TRATADOS</option>
                                                <option value="REMITIDO">REMITIDO</option>
                                                <option value="NUEVO">NUEVO</option>
                                             </select>
                                          </div>
                                          <div class="col-md-3 "   >
                                             <label for="calisificaciotb" >Clasificación:  </label>
                                             <select id="calisificaciotb" class="form-control " aria-describedby="calisificaciotb"  >
                                                <option></option>
                                                <option value="CONFIRMADO BACTERIOLOGICAMENTE">CONFIRMADO BACTERIOLOGICAMENTE</option>
                                                <option value="SIN CONFIRMACION BACTERIOLOGICA">SIN CONFIRMACION BACTERIOLOGICA</option>
                                             </select>
                                          </div>
                                          <div class="col-md-3  "   >
                                             <label for="Diagnosticobas" >Diagnóstico Baciloscopia: </label>
                                             <select id="Diagnosticobas"   class="form-control " aria-describedby="Diagnosticobas"  >
                                                <option></option>
                                                <option value="-">-</option>
                                                <option value="1 A 9 BAAR">1 A 9 BAAR</option>
                                                <option value="+">+</option>
                                                <option value="++">++</option>
                                                <option value="+++">+++</option>
                                                <option value="NR">NR</option>
                                             </select>
                                          </div>
                                          <div class="col-md-3 "   >
                                             <label for="fechaBAS"> fecha Baciloscopia: </label>
                                             <input type="date" id="fechaBAS" class="form-control "   aria-describedby="fechaBAS"  >
                                          </div>
                                          <div class="col-md-3  "   >
                                             <label for="cultivoDiagnostico" >Cultivo de Diagnóstico: </label>
                                             <select id="cultivoDiagnostico" class="form-control "  aria-describedby="Diagnosticobas"  >
                                                <option></option>
                                                <option value="EN PROCESO">EN PROCESO</option>
                                                <option value="-">-</option>
                                                <option value="1 A 19 COLONIAS">1 A 19 COLONIAS</option>
                                                <option value="+">+</option>
                                                <option value="++">++</option>
                                                <option value="+++">+++</option>
                                                <option value="NR">NR</option>
                                             </select>
                                          </div>
                                          <div class="col-md-3 "    >
                                             <label for="fechac"> fecha Cultivo: </label>
                                             <input type="date" id="fechac" class="form-control " aria-describedby="fechac"   >
                                          </div>
                                          <div class="col-md-3"   >
                                             <label for="pruebaMol" >Prueba Molecular: </label>
                                             <select id="pruebaMol" class="form-control "   aria-describedby="pruebaMol"  >
                                                <option></option>
                                                <option value="NO REALIZADA">NO REALIZADA</option>
                                                <option value="DETECTADO">DETECTADO</option>
                                                <option value="NO DETECTADO">NO DETECTADO</option>
                                                <option value="NO INTERPRETABLE">NO INTERPRETABLE</option>
                                                <option value="CONTAMINADO">CONTAMINADO</option>
                                             </select>
                                          </div>
                                          <div class="col-md-3 "   >
                                             <label for="fechapm"> fecha Prueba Molecular: </label>
                                             <input type="date" id="fechapm" class="form-control " aria-describedby="fechapm"  >
                                          </div>
                                          <div class="col-md-12 "   >
                                             <label for="Otrosc"> Otros Criterios Medicos de Diagnóstico: </label>
                                             <select id="Otrosc" class="multiselect-ui form-control" multiple="multiple">
                                                <option value="HISTOPATOLOGÍA">HISTOPATOLOGÍA</option>
                                                <option value="GENEXPERT">GENEXPERT</option>
                                                <option value="GENOTYPE">GENOTYPE</option>
                                                <option value="ADA">ADA</option>
                                                <option value="CLÍNICO">CLÍNICO</option>
                                                <option value="RADIOLÓGICO">RADIOLÓGICO</option>
                                                <option value="TUBERCULINICO">TUBERCULINICO</option>
                                                <option value="EPIDEMIOLÓGICO">EPIDEMIOLÓGICO</option>
                                                <option value="NA">NA</option>
                                             </select>
                                             <!--<a onclick="Javascript: otroMed();"><span class="lnr lnr-plus-circle"></span></a>
                                                <input type="text" id="detalleOtroC" class="form-control">
                                                -->
                                          </div>
                                       </div>
                                       <br>
                                       <div class="panel panel-success" >
                                          <div class="panel-heading text-center"><label>TAMIZAJE PARA VIH</label></div>
                                          <div class="panel-body text-center">
                                             <div class="row " style="width: 100%;">
                                                <div class="col-md-4 "  >
                                                   <label for="realizoapv" >Se Realizo APV: </label>
                                                   <select id="realizoapv" class="form-control " aria-describedby="realizoapv"  >
                                                      <option></option>
                                                      <option value="VIH + PREVIO">VIH + PREVIO</option>
                                                      <option value="SI">SI</option>
                                                      <option value="NO">NO</option>
                                                      <option value="PTE NO ACEPTA">PTE NO ACEPTA</option>
                                                   </select>
                                                </div>
                                                <div class="col-md-4 "    >
                                                   <label for="Realizoprueba"> Se Realizó Prueba: </label>
                                                   <select id="Realizoprueba" class="form-control " aria-describedby="Realizoprueba"  >
                                                      <option></option>
                                                      <option value="VIH + PREVIO">VIH + PREVIO</option>
                                                      <option value="SI">SI</option>
                                                      <option value="NO">NO</option>
                                                      <option value="PTE NO ACEPTA">PTE NO ACEPTA</option>
                                                      <option value="PENDIENTE">PENDIENTE</option>
                                                   </select>
                                                </div>
                                                <div class="col-md-4 "    >
                                                   <label for="Resultadoprueba"> Resultado Prueba: </label>
                                                   <select id="Resultadoprueba" class="form-control " aria-describedby="Resultadoprueba"  >
                                                      <option></option>
                                                      <option value="NO REALIZADA">NO REALIZADA</option>
                                                      <option value="VIH + PREVIO">VIH + PREVIO</option>
                                                      <option value="POSITIVO">POSITIVO</option>
                                                      <option value="PENDIENTE">PENDIENTE</option>
                                                      <option value="NEGATIVO">NEGATIVO</option>
                                                   </select>
                                                </div>
                                                <div class="col-md-4 "  >
                                                   <label for="fecharepor" >Fecha de Reporte de VIH: </label>
                                                   <input type="date" id="fecharepor" class="form-control " aria-describedby="fecharepor"  >
                                                </div>
                                                <div class="col-md-4 "   >
                                                   <label for="pruebacon"> Prueba Confirmatoria Acorde a la Norma: </label>
                                                   <select id="pruebacon" class="form-control " aria-describedby="pruebacon"  >
                                                      <option></option>
                                                      <option value="NO REQUIERE">NO REQUIERE</option>
                                                      <option value="PENDIENTE">PENDIENTE</option>
                                                      <option value="NEGATIVO">NEGATIVO</option>
                                                      <option value="POSITIVO">POSITIVO</option>
                                                      <option value="PACIENTE NO ACEPTA">PACIENTE NO ACEPTA</option>
                                                      <option value="VIH + PREVIO">VIH + PREVIO</option>
                                                      <option value="N/A">N/A</option>
                                                   </select>
                                                </div>
                                                <div class="col-md-4 "  >
                                                   <label for="fecharedx" >Fecha de Realizacion (DX PREVIO O ACTUAL): </label>
                                                   <input type="date" id="fecharedx" class="form-control " aria-describedby="fecharedx"  >
                                                </div>
                                                <div class="col-md-3 "   >
                                                   <label for="TAR"> Recibe TAR: </label>
                                                   <select id="TAR" class="form-control " aria-describedby="TAR"  >
                                                      <option></option>
                                                      <option value="SI">SI</option>
                                                      <option value="NO">NO</option>
                                                      <option value="N/A">N/A</option>
                                                   </select>
                                                </div>
                                                <div class="col-md-3 "  >
                                                   <label for="recibetto" >Recibe Tto preventivo con trimetoprim sulfa/cotrimoxazol: </label>
                                                   <select id="recibetto" class="form-control " aria-describedby="recibetto"  >
                                                      <option></option>
                                                      <option value="SI">SI</option>
                                                      <option value="NO">NO</option>
                                                      <option value="N/A">N/A</option>
                                                   </select>
                                                </div>
                                                <div class="col-md-3 "   >
                                                   <label for="coinfecc"> Existe Coinfeccion TB/VIH:: </label>
                                                   <select id="coinfecc" class="form-control " aria-describedby="coinfecc"  >
                                                      <option></option>
                                                      <option value="SI">SI</option>
                                                      <option value="NO">NO</option>
                                                      <option value="DESCONOCIDO">DESCONOCIDO</option>
                                                   </select>
                                                </div>
                                                <div class="col-md-3 "   >
                                                   <label for="Diagnosticovih">Diagnóstico Previo de VIH: </label>
                                                   <select id="Diagnosticovih" class="form-control " aria-describedby="Diagnosticovih"  >
                                                      <option></option>
                                                      <option value="SI">SI</option>
                                                      <option value="NO">NO</option>
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row " style="width: 100%;">
                                          <div class="col-md-3 "  >
                                             <label for="pruebasf" >Prueba de Susceptibilidad a Farmacos: </label>
                                             <select id="pruebasf" class="form-control "  aria-describedby="pruebasf"  >
                                                <option></option>
                                                <option value="NITRATO REDUCTASA">NITRATO REDUCTASA</option>
                                                <option value="PROPORCIONES EN LJ">PROPORCIONES EN LJ</option>
                                                <option value="BACTEC MGIT">BACTEC MGIT</option>
                                                <option value="PROPORCIONES EN AGAR">PROPORCIONES EN AGAR</option>
                                                <option value="LiPA">LiPA</option>
                                                <option value="PCR EN T REAL">PCR EN T REAL</option>
                                                <option value="NO REALIZADA">NO REALIZADA</option>
                                             </select>
                                          </div>
                                          <div class="col-md-3 "   >
                                             <label for="fechapsf"> fecha Reporte P.S.F : </label>
                                             <input type="date" id="fechapsf" class="form-control " aria-describedby="fechapsf"   >
                                          </div>
                                          <div class="col-md-3 "  >
                                             <label for="tipofar" >Tipo de Farmacorresistencia: </label>
                                             <select id="tipofar" class="form-control "   aria-describedby="tipofar"  >
                                                <option></option>
                                                <option value="MONO R">MONO R</option>
                                                <option value="MDR">MDR</option>
                                                <option value="XDR">XDR</option>
                                                <option value="POLI QUE INCLUYE R">POLI QUE INCLUYE R</option>
                                                <option value="POLI QUE INCLUYA H">POLI QUE INCLUYA H</option>
                                                <option value="MONO H">MONO H</option>
                                                <option value="OTRO MONORRESISTENTE">OTRO MONORRESISTENTE</option>
                                                <option value="NINGUNA">NINGUNA</option>
                                                <option value="N/A">N/A</option>
                                             </select>
                                          </div>
                                          <div class="col-md-3 "  >
                                             <label for="resisteneta"> Resistente a : </label>
                                             <input type="text" id="resisteneta" class="form-control " aria-describedby="resisteneta"   >
                                          </div>
                                          <div class="col-md-6 "   >
                                             <label for="coomorbi"> Coomorbilidad: </label>
                                             <select id="coomorbi" class="form-control " aria-describedby="coomorbi"  >
                                                <option></option>
                                                <option value="ALCOHOLISMO">ALCOHOLISMO</option>
                                                <option value="ER-EH-DNT">ER-EH-DNT</option>
                                                <option value="ER-DNT">ER-DNT</option>
                                                <option value="DM-ER-DNT">DM-ER-DNT</option>
                                                <option value="TABAQUISMO">TABAQUISMO</option>
                                                <option value="DM">DM</option>
                                                <option value="ER">ER</option>
                                                <option value="DNT">DNT</option>
                                                <option value="DM-EH-DNT">DM-EH-DNT</option>
                                                <option value="OTRAS">OTRAS</option>
                                                <option value="FARMACODEPENDENCIA">FARMACODEPENDENCIA</option>
                                                <option value="SILICOSIS">SILICOSIS</option>
                                                <option value="DM-ER-EH">DM-ER-EH</option>
                                                <option value="GESTANTE">GESTANTE</option>
                                                <option value="EH">EH</option>
                                                <option value="DM-ER">DM-ER</option>
                                                <option value="DM-EH">DM-EH</option>
                                                <option value="EH-DNT">EH-DNT</option>
                                                <option value="DM-ER-EH-DNT">DM-ER-EH-DNT</option>
                                                <option value="EPOC">EPOC</option>
                                                <option value="ER-EH">ER-EH</option>
                                                <option value="VIH/SIDA">VIH/SIDA</option>
                                                <option value="NINGUNA">NINGUNA</option>
                                                <option value="DM-DNT">DM-DNT</option>
                                             </select>
                                             <label id="detalleCoorm"></label>
                                          </div>
                                          <div class="col-md-6 " >
                                             <label for="Observaciones"> Observaciones: </label>
                                             <textarea id="Observaciones" class="form-control " aria-describedby="Observaciones"   ></textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                       <div class="row"  >
                                          <div class="col-md-3 "  >
                                             <label for="2do"> 2°: </label>
                                             <select id="2do" class="form-control " aria-describedby="2do"  >
                                                <option></option>
                                                <option value="-">-</option>
                                                <option value="1 A 9 BAAR">1 A 9 BAAR</option>
                                                <option value="+">+</option>
                                                <option value="++">++</option>
                                                <option value="+++">+++</option>
                                                <option value="NR">NR</option>
                                             </select>
                                          </div>
                                          <div class="col-md-3  "   >
                                             <label for="fecha2do"> Fecha del 2°: </label>
                                             <input type="date" id="fecha2do" class="form-control "   aria-describedby="fecha2do"  style=" ">
                                          </div>
                                          <div class="col-md-3"  >
                                             <label for="4do">BK 4 MES: </label>
                                             <select id="4do" class="form-control " aria-describedby="4do"   >
                                                <option></option>
                                                <option value="-">-</option>
                                                <option value="1 A 9 BAAR">1 A 9 BAAR</option>
                                                <option value="+">+</option>
                                                <option value="++">++</option>
                                                <option value="+++">+++</option>
                                                <option value="NR">NR</option>
                                             </select>
                                          </div>
                                          <div class="col-md-3 "   >
                                             <label for="fecha4do"> Fecha del 4°: </label>
                                             <input type="date" id="fecha4do" class="form-control "   aria-describedby="fecha4do"  style="">
                                          </div>
                                          <div class="col-md-3 "  >
                                             <label for="6do"> 6°: </label>
                                             <select id="6do" class="form-control " aria-describedby="6do"  >
                                                <option></option>
                                                <option value="-">-</option>
                                                <option value="1 A 9 BAAR">1 A 9 BAAR</option>
                                                <option value="+">+</option>
                                                <option value="++">++</option>
                                                <option value="+++">+++</option>
                                                <option value="NR">NR</option>
                                             </select>
                                          </div>
                                          <div class="col-md-3 "  >
                                             <label for="fecha6do"> Fecha del 6°: </label>
                                             <input type="date" id="fecha6do" class="form-control "   aria-describedby="fecha6do"  style=" ">
                                          </div>
                                          <div class="col-md-3 "  >
                                             <label for="9do">  BK 9 MES: </label>
                                             <select id="9do" class="form-control " aria-describedby="9do"  >
                                                <option></option>
                                                <option value="-">-</option>
                                                <option value="1 A 9 BAAR">1 A 9 BAAR</option>
                                                <option value="+">+</option>
                                                <option value="++">++</option>
                                                <option value="+++">+++</option>
                                                <option value="NR">NR</option>
                                             </select>
                                          </div>
                                          <div class="col-md-3 "  >
                                             <label for="fecha9do"> Fecha del 9°: </label>
                                             <input type="date" id="fecha9do" class="form-control "   aria-describedby="fecha9do"  style=" ">
                                          </div>
                                       </div>
                                       <br><br>
                                       <ul class="nav nav-tabs">
                                          <li class="active"><a data-toggle="tab" href="#medico">Controles Medicos</a></li>
                                          <li><a data-toggle="tab" href="#enfermera">Controles de Enfermeria</a></li>
                                       </ul>
                                       <div class="tab-content"  style="border:1px solid #FFFFFF">
                                          <div id="medico" class="tab-pane fade in active">
                                             <div class="row" >
                                                <div class="col-md-3 "    >
                                                   <label for="medico2do"> Control Medico del 2° Mes: </label>
                                                   <select id="medico2do" class="form-control " aria-describedby="medico2do"   >
                                                      <option></option>
                                                      <option value="EVOLUCION SATISFACTORIA">EVOLUCION SATISFACTORIA</option>
                                                      <option value="EVOLUCION NO SATISFACTORIA">EVOLUCION NO SATISFACTORIA</option>
                                                      <option value="NO SE RELAIZA CONTROL MÉDICO">NO SE RELAIZA CONTROL MÉDICO</option>
                                                   </select>
                                                </div>
                                                <div class="col-md-3 "   >
                                                   <label for="fechamedico2do"> Fecha del 2° Mes: </label>
                                                   <input type="date" id="fechamedico2do" class="form-control "   aria-describedby="fechamedico2do" >
                                                </div>
                                                <div class="col-md-6"  >
                                                   <label for="observa2medico"> Observaciones: </label>
                                                   <textarea id="observa2medico" class="form-control "   aria-describedby="observa2medico"   ></textarea>
                                                </div>
                                             </div>
                                             <br>
                                             <div class="row" style="width:100%; ">
                                                <div class="col-md-3 "  >
                                                   <label for="medico4do"> Control Medico del 4° Mes: </label>
                                                   <select id="medico4do" class="form-control " aria-describedby="medico4do"   >
                                                      <option></option>
                                                      <option value="EVOLUCION SATISFACTORIA">EVOLUCION SATISFACTORIA</option>
                                                      <option value="EVOLUCION NO SATISFACTORIA">EVOLUCION NO SATISFACTORIA</option>
                                                      <option value="NO SE RELAIZA CONTROL MÉDICO">NO SE RELAIZA CONTROL MÉDICO</option>
                                                   </select>
                                                </div>
                                                <div class="col-md-3 " >
                                                   <label for="fechamedico4do"> Fecha del 4° Mes: </label>
                                                   <input type="date" id="fechamedico4do" class="form-control "   aria-describedby="fechamedico4do"  style=" ">
                                                </div>
                                                <div class="col-md-6"   >
                                                   <label for="observa4medico"> Observaciones: </label>
                                                   <textarea id="observa4medico" class="form-control "   aria-describedby="observa4medico"   ></textarea>
                                                </div>
                                             </div>
                                             <br>
                                             <div class="row" style="width:100%; ">
                                                <div class="col-md-3 "   >
                                                   <label for="medico6do"> Control Medico del 6° Mes: </label>
                                                   <select id="medico6do" class="form-control " aria-describedby="medico6do"   >
                                                      <option></option>
                                                      <option value="EVOLUCION SATISFACTORIA">EVOLUCION SATISFACTORIA</option>
                                                      <option value="EVOLUCION NO SATISFACTORIA">EVOLUCION NO SATISFACTORIA</option>
                                                      <option value="NO SE RELAIZA CONTROL MÉDICO">NO SE RELAIZA CONTROL MÉDICO</option>
                                                   </select>
                                                </div>
                                                <div class="col-md-3 "  >
                                                   <label for="fechamedico6do"> Fecha del 6° Mes: </label>
                                                   <input type="date" id="fechamedico6do" class="form-control "   aria-describedby="fechamedico6do"  style=" ">
                                                </div>
                                                <div class="col-md-6"  >
                                                   <label for="observa6medico"> Observaciones: </label>
                                                   <textarea id="observa6medico" class="form-control "   aria-describedby="observa2medico"  ></textarea>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="enfermera" class="tab-pane fade">
                                             <div class="row" style="width:100%; ">
                                                <div class="col-md-3  >
                                                   <label for="enfermera1">
                                                   Controles por Enfermeria 1° Mes: </label>
                                                   <select id="enfermera1" class="form-control " aria-describedby="medico2do"  >
                                                      <option></option>
                                                      <option value="EVOLUCION SATISFACTORIA">EVOLUCION SATISFACTORIA</option>
                                                      <option value="EVOLUCION NO SATISFACTORIA">EVOLUCION NO SATISFACTORIA</option>
                                                      <option value="NO SE RELAIZA CONTROL MÉDICO">NO SE RELAIZA CONTROL MÉDICO</option>
                                                   </select>
                                                </div>
                                                <div class="col-md-3 "  >
                                                   <label for="enfermera1"> Fecha del 1° Mes: </label>
                                                   <input type="date" id="fechaenfermera1" class="form-control "   aria-describedby="fechamedico2do"  style=" ">
                                                </div>
                                                <div class="col-md-6"  >
                                                   <label for="observa1enfermera"> Observaciones: </label>
                                                   <textarea id="observa1enfermera" class="form-control "   aria-describedby="observa2medico"  ></textarea>
                                                </div>
                                             </div>
                                             <br>
                                             <div class="row" style="width:100%; ">
                                                <div class="col-md-3 "  >
                                                   <label for="enfermera3do"> Controles por Enfermeria 3° Mes: </label>
                                                   <select id="enfermera3do" class="form-control " aria-describedby="medico4do"  >
                                                      <option></option>
                                                      <option value="EVOLUCION SATISFACTORIA">EVOLUCION SATISFACTORIA</option>
                                                      <option value="EVOLUCION NO SATISFACTORIA">EVOLUCION NO SATISFACTORIA</option>
                                                      <option value="NO SE RELAIZA CONTROL MÉDICO">NO SE RELAIZA CONTROL MÉDICO</option>
                                                   </select>
                                                </div>
                                                <div class="col-md-3 "  >
                                                   <label for="fechamedico3do"> Fecha del 3° Mes: </label>
                                                   <input type="date" id="fechamedico3do" class="form-control "   aria-describedby="fechamedico4do"  style=" ">
                                                </div>
                                                <div class="col-md-6"  >
                                                   <label for="observa3enfermera"> Observaciones: </label>
                                                   <textarea id="observa3enfermera" class="form-control "   aria-describedby="observa4medico"  ></textarea>
                                                </div>
                                             </div>
                                             <br>
                                             <div class="row" style="width:100%; ">
                                                <div class="col-md-3 "   >
                                                   <label for="enfermera5do"> Controles por Enfermeria 5° Mes: </label>
                                                   <select id="enfermera5do" class="form-control " aria-describedby="medico6do"   >
                                                      <option></option>
                                                      <option value="EVOLUCION SATISFACTORIA">EVOLUCION SATISFACTORIA</option>
                                                      <option value="EVOLUCION NO SATISFACTORIA">EVOLUCION NO SATISFACTORIA</option>
                                                      <option value="NO SE RELAIZA CONTROL MÉDICO">NO SE RELAIZA CONTROL MÉDICO</option>
                                                   </select>
                                                </div>
                                                <div class="col-md-3 "  >
                                                   <label for="fechaenfermera5do"> Fecha del 5° Mes: </label>
                                                   <input type="date" id="fechaenfermera5do" class="form-control "   aria-describedby="fechamedico6do"  style=" ">
                                                </div>
                                                <div class="col-md-6"  >
                                                   <label for="observa5enfermera"> Observaciones: </label>
                                                   <textarea id="observa5enfermera" class="form-control "   aria-describedby="observa2medico"  ></textarea>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <hr>
                                       <div class="row" style="width:100%; ">
                                          <div class="col-md-6 "  >
                                             <label for="cultfinaltto"> Cultivo al Final de Tratamiento: </label>
                                             <select id="cultfinaltto" class="form-control " aria-describedby="cultfinaltto"  >
                                                <option></option>
                                                <option value="-">-</option>
                                                <option value="1 A 19 COLONIAS">1 A 19 COLONIAS</option>
                                                <option value="+">+</option>
                                                <option value="++">++</option>
                                                <option value="+++">+++</option>
                                                <option value="NR">NR</option>
                                                <option value="CONTAMINADO">CONTAMINADO</option>
                                             </select>
                                          </div>
                                          <div class="col-md-6 "   >
                                             <label for="fechacultivofinaltto"> Fecha del Cultivo: </label>
                                             <input type="date" id="fechacultivofinaltto" class="form-control "   aria-describedby="fechacultivofinaltto"  style=" ">
                                          </div>
                                          <div class="col-md-4 "   >
                                             <label for="condegreso"> Condicion de Egreso: </label>
                                             <select id="condegreso" class="form-control " aria-describedby="condegreso"   >
                                                <option></option>
                                                <option value="CURADO">CURADO</option>
                                                <option value="TRATAMIENTO TERMINADO">TRATAMIENTO TERMINADO</option>
                                                <option value="FRACASO">FRACASO</option>
                                                <option value="PERDIDA EN EL SEGUIMIENTO">PERDIDA EN EL SEGUIMIENTO</option>
                                                <option value="FALLECIDO DURANTE EL TRATAMIENTO">FALLECIDO DURANTE EL TRATAMIENTO</option>
                                                <option value="NO EVALUADO">NO EVALUADO</option>
                                                <option value="EXCLUIDO DE LA CORTE POR RR">EXCLUIDO DE LA CORTE POR RR</option>
                                                <option value="DESCARTADO">DESCARTADO</option>
                                                <option value="EXCLUIDO DE LA CORTE POR RESISTENCIA">EXCLUIDO DE LA CORTE POR RESISTENCIA</option>
                                             </select>
                                          </div>
                                          <div class="col-md-4 " >
                                             <label for="fechaegreso"> Fecha del Egreso: </label>
                                             <input type="date" id="fechaegreso" class="form-control "   aria-describedby="fechaegreso"  style=" ">
                                          </div>
                                          <div class="col-md-4 "   >
                                             <label for="resultBKFinal"> Resultado BK Final: </label>
                                             <select id="resultBKFinal" class="form-control " aria-describedby="resultBKFinal"   >
                                                <option></option>
                                                <option value="CURADO">-</option>
                                                <option value="TRATAMIENTO TERMINADO">+</option>
                                                <option value="FRACASO">++</option>
                                                <option value="PERDIDA EN EL SEGUIMIENTO">+++</option>
                                                <option value="FALLECIDO DURANTE EL TRATAMIENTO">NR</option>
                                                <option value="NO EVALUADO">1 A 9 BAAR</option>
                                             </select>
                                          </div>
                                       </div>
                                       <hr>
                                       <div class="row"  >
                                          <div class="col-md-4 "   >
                                             <label for="fechaFinaltto"> Fecha de Finalizacion de Tratamiento: </label>
                                             <input type="date" id="fechaFinaltto" class="form-control " aria-describedby="condegreso"   >
                                          </div>
                                          <div class="col-md-8 "   >
                                             <label for="observacionesControl">Observaciones: </label>
                                             <textarea id="observacionesControl" class="form-control " aria-describedby="condegreso"    ></textarea>
                                          </div>
                                       </div>
                                       <br>
                                    </div>
                                    <div id="menu3" class="tab-pane fade text-center">
                                       <div class="panel panel-info">
                                          <div class="panel-heading">Datos de Medida</div>
                                          <div class="panel-body">
                                             <div class="row" style="width:100%; ">
                                                <div class="col-md-4 "    >
                                                   <label for="peso">Peso: </label>
                                                   <input type="number" id="peso" class="form-control " aria-describedby="peso"  onChange="Javascript: calcularIMC('0');"  > 
                                                   <label>Kilogramos</label>
                                                </div>
                                                <div class="col-md-4 "    >
                                                   <label for="talla">Talla (x.xxx): </label>
                                                   <input type="number" id="talla" class="form-control " aria-describedby="talla"  onChange="Javascript: calcularIMC('0');" > 
                                                   <label>Metros</label>
                                                </div>
                                                <div class="col-md-4 "    >
                                                   <label for="imc">I.M.C: </label>
                                                   <input type="number" id="imc" class="form-control " readonly aria-describedby="imc"   > 
                                                </div>
                                             </div>
                                             <br>
                                          </div>
                                       </div>
                                       <div class="panel panel-primary ">
                                          <div class="panel-heading">Acciones de Vigilancia</div>
                                          <div class="panel-body">
                                             <div class="row" style="width:100%; ">
                                                <div class="col-md-4 "    >
                                                   <label for="semanaEpid">Semana Epidemiológica: </label>
                                                   <select id="semanaEpid" class="form-control " aria-describedby="semanaEpid"   >
                                                      <option></option>
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
                                                   </select>
                                                </div>
                                                <div class="col-md-4 "    >
                                                   <label for="peridoepid">Periodo Epidemiológico: </label>
                                                   <select id="peridoepid" class="form-control " aria-describedby="semanaEpid"   >
                                                      <option></option>
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
                                                   </select>
                                                </div>
                                                <div class="col-md-4 "    >
                                                   <label for="progrmaaSivigila" class="text-uppercase">Programa - Sivigila: </label>
                                                   <select id="progrmaaSivigila" class="form-control " aria-describedby="semanaEpid"   >
                                                      <option></option>
                                                      <option class="CONCORDANTE">CONCORDANTE</option>
                                                      <option class="PROGRAMA">PROGRAMA</option>
                                                      <option class="SIVIGILA">SIVIGILA</option>
                                                   </select>
                                                </div>
                                             </div>
                                             <br>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-xs-6">
                                             <h4 class="no-margin"></h4>
                                          </div>
                                          <!-- /.col -->
                                          <div class="col-xs-6 text-right">
                                             <a type="button" class="btn btn-success  " onClick="registraPaciente();" id="RegistroP" >Registrar Paciente</a>
                                          </div>
                                          <!-- /.col -->
                                       </div>
                                       <!-- /.row -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="panel-footer">
                        </div>
                     </div>
                     <!-- /panel -->
                  </div>
               </div>
               <!-- /.row -->
            </div>
            <!-- /.padding-md -->
         </div>
         <!-- /main-container -->
         <!-- Footer
            ================================================== -->
         <?php 
            include("../../footer.php");
            ?>
      </div>
      <!-- /wrapper -->
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
      <script></script>
   </body>
</html>