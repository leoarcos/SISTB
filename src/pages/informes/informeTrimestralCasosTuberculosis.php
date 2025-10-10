<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>SISTB - Informes</title>
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
		.modal-dialog{
      width: 90% !important;
    }
    .form-group{
      margin-top:1%;
    }
    .pagination li{
      font-size:10px;
    
    }   
    .main label{
        font-weight: bold;
    }
    input:focus, select:focus, textarea:focus {
        background-color: #D9EDF7 !important;
    }
    @media (min-width: 992px) {
        .consec{
            margin-top: -50%;
        }
    }
    
    table.tableizer-table {
	   font-size: 12px;
	   border: 1px solid #CCC; 
	   font-family: Arial, Helvetica, sans-serif;
	   width:100%;
   	} 
	   .tableizer-table td {
		   padding: 4px;
		   margin: 3px;
		   border: 1px solid #CCC;
   	}
	   .tableizer-table th {
	   background-color: #104E8B; 
	   color: #FFF;
	   font-weight: bold;
   	}				
    .verticalText {
        writing-mode: vertical-rl; /* o vertical-lr */
  text-orientation: upright;

        transform: rotate(360deg) !important;
        vertical-align: middle;
        
    }
    td a{
        cursor:pointer;
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
					 <li><i class="fa fa-dashboard"></i><a href="index.html"> Informe trimestral casos de actividades</a></li> 
				</ul>
			</div><!-- /breadcrumb-->
		 
		 
			<div class="padding-md" > 
				<div class="row">
					<div class="col-lg-12">
						<div class="panel   fadeInDown animation-delay5" >
							
							<div class="panel-body">
								
								<div class="row">
									<div class="col-md-12">
										<center><h3 class="panel-title"><strong>República de Colombia - Ministerio de la Protección Social<br>INFORME DE CASOS Y ACTIVIDADES DE TUBERCULOSIS - TRIMESTRAL</strong></h3></center>
                   	<div class="row">
                              
                      <div class="form-group col-md-3  "> 
                              <span>Año: </span>
                              <select class="form-control" id="CM-ano" name="CM-ano" disabled>
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
                      </div>
                      <div class="form-group col-md-3  ">
                           
                              <span>Trimestre: </span>
                              <select class="form-control" id="CM-trimestre" name="CM-trimestre" disabled>
                                  <option > </option>
                                  <option value="I">I</option>
                                  <option value="II">II</option> 
                                  <option value="III">III</option>
                                  <option value="IV">IV</option> 
                              </select> 
                      </div>
                      <div class="form-group col-md-3 ">  
                              <span>Departamento: </span>
                              <select class="form-control" id="dpto" onchange="Javascript: listarMnpos();" >
                                  <option> </option> 
                              </select> 
                      </div>
                      <div class="form-group col-md-3 ">
                           
                              <input type="checkbox" id="CCM-mnpo" onChange="Javascript: checkBoxConsultaMultiple('mnpo');">
                              <span>Municipio: </span>
                              <input class="form-control" id="CM-mnpo" name="CM-mnpo" list="CM-mnpoES" disabled  >
                              <datalist id="CM-mnpoES">
                      
                              </datalist>   
                      </div> 
                       
                      <div class="form-group col-md-3 "> 
                              <input type="checkbox" id="CCM-ipsInicia" onChange="Javascript: checkBoxConsultaMultiple('ipsInicia');">
                              <span>IPS que Inicia Tratamiento: </span>
                              <input class="form-control" id="CM-ipsInicia" name="CM-ipsInicia" list="CM-ipsIniciaes" disabled  >
                              <datalist id="CM-ipsIniciaes">
                      
                              </datalist>   
                      </div>   
                      <div class="form-group col-md-3 "> 
                              <input type="checkbox" id="CCM-ipsContinua" onChange="Javascript: checkBoxConsultaMultiple('ipsContinua');">
                              <span>IPS que Continua Tratamiento: </span>
                              <input class="form-control" id="CM-ipsContinua" name="CM-ipsContinua" list="CM-ipsContinuaes" disabled  >
                              <datalist id="CM-ipsContinuaes">
                      
                              </datalist> 
                      </div>   
                      <div class="form-group col-md-3 "> 
                              <input type="checkbox" id="CCM-eapb" onChange="Javascript: checkBoxConsultaMultiple('eapb');">
                              <span>Entidad: </span>
                              <input class="form-control" id="CM-eapb" name="CM-eapb" list="CM-eapbes" disabled  >
                              <datalist id="CM-eapbes">
                      
                              </datalist> 
                      </div>   
                      
                      <div class="form-group col-md-3 "> 
                              
                              <span>Fecha Diligenciamiento Informe: </span>
                              <input type="date" class="form-control" id="CM-fechadiligencia" name="CM-fechadiligencia" >
                                  
                                   
                      </div>   
                       
                        <div class="form-group col-md-12 " id="apol"> 
                            <button type="button" id="botonConsultar" class="btn btn-success  "   onclick="Javascript: validarCheckboxInformeTrimestral();" style="background-color: #41B314;  height: 40px; width:100%;">Consultar</button>
                        </div>   
                    </div>
                          
                       
                    </div>
									</div>
									<div class="col-md-12">
										
            <!-- END OVERVIEW -->
            <div id="vistaInforme" class="panel panel-headline">
                <div class="panel-heading">
                    <p class="demo-button">
                        <div class="panel-body">
                            <center><h3 class="panel-title"><strong>República de Colombia - Ministerio de la Protección Social<br>INFORME DE CASOS Y ACTIVIDADES DE TUBERCULOSIS - TRIMESTRAL</strong></h3></center>
                    
                    
                            <div class="row">
                            


                                <table class="tableizer-table table-responsive" >
                                    <thead>
                                        <tr class="tableizer-firstrow " style='height:30px;'>
                                            <th colspan='28' class='text-center' style='font-weight:bold'> 2. CASOS DE TUBERCULOSIS REGISTRADOS EN EL TRIMESTRE </th>
                                             
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class='text-center bgtd' style='font-weight:bold'>
                                            <td colspan='7' rowspan='3'>TIPOS DE TB Y CONDICIÓN DE INGRESO</td>
                                            <td colspan='21'> GRUPO EDAD Y GENERO </td>
                                        </tr>
                                         
                                        
                                        <tr  class='text-center' style='font-weight:bold'> 
                                            <td colspan='2'><1</td>
                                             
                                            <td colspan='2'>1 - 4</td> 
                                            <td colspan='2'>5 - 14</td> 
                                            <td colspan='2'>15 - 24</td> 
                                            <td colspan='2'>25 - 34</td> 
                                            <td colspan='2'>35 - 44</td> 
                                            <td colspan='2'>45 - 54</td> 
                                            <td colspan='2'>55 - 64</td> 
                                            <td colspan='2'>65 O MAS</td> 
                                            <td colspan='3'>TOTAL</td> 
                                        </tr>
                                        
                                        <tr style='font-weight:bold'>
                                            
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td>SUMA</td>
                                        </tr>
                                         
                                        <tr>
                                            <td rowspan='21' class="verticalText content" style='font-weight:bold'>Pulmonares</td>
                                            <td colspan='3' rowspan='5' style='font-weight:bold' class='text-center'>Nuevo</td> 
                                            <td colspan='3' style='font-weight:bold'>BK(+)</td> 
                                            <td class='text-center' id="am1">0</td>
                                            <td class='text-center' id="af1">0</td>
                                            <td class='text-center' id="am2">0</td>
                                            <td class='text-center' id="af2">0</td>
                                            <td class='text-center' id="am3">0</td>
                                            <td class='text-center' id="af3">0</td>
                                            <td class='text-center' id="am4">0</td>
                                            <td class='text-center' id="af4">0</td>
                                            <td class='text-center' id="am5">0</td>
                                            <td class='text-center' id="af5">0</td>
                                            <td class='text-center' id="am6">0</td>
                                            <td class='text-center' id="af6">0</td>
                                            <td class='text-center' id="am7">0</td>
                                            <td class='text-center' id="af7">0</td>
                                            <td class='text-center' id="am8">0</td>
                                            <td class='text-center' id="af8">0</td>
                                            <td class='text-center' id="am9">0</td>
                                            <td class='text-center' id="af9">0</td>
                                            <td class='text-center' id="am10">0</td>
                                            <td class='text-center' id="af10">0</td>
                                            <td class='text-center'  id="s1"><a href='#'>0</a></td>
                                        </tr>
                                        <tr> 
                                            <td colspan='3' style='font-weight:bold'>Bk negativo cultivo(+)</td>
                                             
                                            <td class='text-center' id="bm1">0</td>
                                            <td class='text-center' id="bf1">0</td>
                                            <td class='text-center' id="bm2">0</td>
                                            <td class='text-center' id="bf2">0</td>
                                            <td class='text-center' id="bm3">0</td>
                                            <td class='text-center' id="bf3">0</td>
                                            <td class='text-center' id="bm4">0</td>
                                            <td class='text-center' id="bf4">0</td>
                                            <td class='text-center' id="bm5">0</td>
                                            <td class='text-center' id="bf5">0</td>
                                            <td class='text-center' id="bm6">0</td>
                                            <td class='text-center' id="bf6">0</td>
                                            <td class='text-center' id="bm7">0</td>
                                            <td class='text-center' id="bf7">0</td>
                                            <td class='text-center' id="bm8">0</td>
                                            <td class='text-center' id="bf8">0</td>
                                            <td class='text-center' id="bm9">0</td>
                                            <td class='text-center' id="bf9">0</td>
                                            <td class='text-center' id="bm10">0</td>
                                            <td class='text-center' id="bf10">0</td>
                                            <td class='text-center'  id="s2"><a href='#'>0</a></td>
                                        </tr>
                                        <tr> 
                                            <td colspan='3' style='font-weight:bold'>Bk negativo prueba molecular(+)</td>
                                            <td class='text-center' id="cm1">0</td>
                                            <td class='text-center' id="cf1">0</td>
                                            <td class='text-center' id="cm2">0</td>
                                            <td class='text-center' id="cf2">0</td>
                                            <td class='text-center' id="cm3">0</td>
                                            <td class='text-center' id="cf3">0</td>
                                            <td class='text-center' id="cm4">0</td>
                                            <td class='text-center' id="cf4">0</td>
                                            <td class='text-center' id="cm5">0</td>
                                            <td class='text-center' id="cf5">0</td>
                                            <td class='text-center' id="cm6">0</td>
                                            <td class='text-center' id="cf6">0</td>
                                            <td class='text-center' id="cm7">0</td>
                                            <td class='text-center' id="cf7">0</td>
                                            <td class='text-center' id="cm8">0</td>
                                            <td class='text-center' id="cf8">0</td>
                                            <td class='text-center' id="cm9">0</td>
                                            <td class='text-center' id="cf9">0</td>
                                            <td class='text-center' id="cm10">0</td>
                                            <td class='text-center' id="cf10">0</td>
                                            <td class='text-center'  id="s3"><a href='#'>0</a></td>
                                        </tr>
                                        <tr> 
                                            <td colspan='3' style='font-weight:bold'>Bk negativo</td>
                                            <td class='text-center' id="dm1">0</td>
                                            <td class='text-center' id="df1">0</td>
                                            <td class='text-center' id="dm2">0</td>
                                            <td class='text-center' id="df2">0</td>
                                            <td class='text-center' id="dm3">0</td>
                                            <td class='text-center' id="df3">0</td>
                                            <td class='text-center' id="dm4">0</td>
                                            <td class='text-center' id="df4">0</td>
                                            <td class='text-center' id="dm5">0</td>
                                            <td class='text-center' id="df5">0</td>
                                            <td class='text-center' id="dm6">0</td>
                                            <td class='text-center' id="df6">0</td>
                                            <td class='text-center' id="dm7">0</td>
                                            <td class='text-center' id="df7">0</td>
                                            <td class='text-center' id="dm8">0</td>
                                            <td class='text-center' id="df8">0</td>
                                            <td class='text-center' id="dm9">0</td>
                                            <td class='text-center' id="df9">0</td>
                                            <td class='text-center' id="dm10">0</td>
                                            <td class='text-center' id="df10">0</td>
                                            <td class='text-center'  id="s4"><a href='#'>0</a></td>
                                        </tr>
                                        <tr> 
                                            <td colspan='3' style='font-weight:bold'>Sin BK</td>
                                            <td class='text-center' id="em1">0</td>
                                            <td class='text-center' id="ef1">0</td>
                                            <td class='text-center' id="em2">0</td>
                                            <td class='text-center' id="ef2">0</td>
                                            <td class='text-center' id="em3">0</td>
                                            <td class='text-center' id="ef3">0</td>
                                            <td class='text-center' id="em4">0</td>
                                            <td class='text-center' id="ef4">0</td>
                                            <td class='text-center' id="em5">0</td>
                                            <td class='text-center' id="ef5">0</td>
                                            <td class='text-center' id="em6">0</td>
                                            <td class='text-center' id="ef6">0</td>
                                            <td class='text-center' id="em7">0</td>
                                            <td class='text-center' id="ef7">0</td>
                                            <td class='text-center' id="em8">0</td>
                                            <td class='text-center' id="ef8">0</td>
                                            <td class='text-center' id="em9">0</td>
                                            <td class='text-center' id="ef9">0</td>
                                            <td class='text-center' id="em10">0</td>
                                            <td class='text-center' id="ef10">0</td>
                                            <td class='text-center'  id="s5"><a href='#'>0</a></td>
                                        </tr>
                                        <tr> 
                                            <td rowspan='16' style='font-weight:bold' class="verticalText">Previamente tratado</td>
                                            <td colspan='2' style='font-weight:bold' class='text-center' rowspan='4'>Tras recaída</td> 
                                            <td colspan='3' style='font-weight:bold' >BK(+)</td>
                                            <td class='text-center' id="fm1">0</td>
                                            <td class='text-center' id="ff1">0</td>
                                            <td class='text-center' id="fm2">0</td>
                                            <td class='text-center' id="ff2">0</td>
                                            <td class='text-center' id="fm3">0</td>
                                            <td class='text-center' id="ff3">0</td>
                                            <td class='text-center' id="fm4">0</td>
                                            <td class='text-center' id="ff4">0</td>
                                            <td class='text-center' id="fm5">0</td>
                                            <td class='text-center' id="ff5">0</td>
                                            <td class='text-center' id="fm6">0</td>
                                            <td class='text-center' id="ff6">0</td>
                                            <td class='text-center' id="fm7">0</td>
                                            <td class='text-center' id="ff7">0</td>
                                            <td class='text-center' id="fm8">0</td>
                                            <td class='text-center' id="ff8">0</td>
                                            <td class='text-center' id="fm9">0</td>
                                            <td class='text-center' id="ff9">0</td>
                                            <td class='text-center' id="fm10">0</td>
                                            <td class='text-center' id="ff10">0</td>
                                            <td class='text-center'  id="s6"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                             
                                            <td colspan='3' style='font-weight:bold'>Bk negativo cultivo(+)</td> 
                                            <td class='text-center' id="gm1">0</td>
                                            <td class='text-center' id="gf1">0</td>
                                            <td class='text-center' id="gm2">0</td>
                                            <td class='text-center' id="gf2">0</td>
                                            <td class='text-center' id="gm3">0</td>
                                            <td class='text-center' id="gf3">0</td>
                                            <td class='text-center' id="gm4">0</td>
                                            <td class='text-center' id="gf4">0</td>
                                            <td class='text-center' id="gm5">0</td>
                                            <td class='text-center' id="gf5">0</td>
                                            <td class='text-center' id="gm6">0</td>
                                            <td class='text-center' id="gf6">0</td>
                                            <td class='text-center' id="gm7">0</td>
                                            <td class='text-center' id="gf7">0</td>
                                            <td class='text-center' id="gm8">0</td>
                                            <td class='text-center' id="gf8">0</td>
                                            <td class='text-center' id="gm9">0</td>
                                            <td class='text-center' id="gf9">0</td>
                                            <td class='text-center' id="gm10">0</td>
                                            <td class='text-center' id="gf10">0</td>
                                            <td class='text-center'  id="s7"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                           
                                            <td colspan='3' style='font-weight:bold'>Bk negativo prueba molecular(+)</td> 
                                            <td class='text-center' id="hm1">0</td>
                                            <td class='text-center' id="hf1">0</td>
                                            <td class='text-center' id="hm2">0</td>
                                            <td class='text-center' id="hf2">0</td>
                                            <td class='text-center' id="hm3">0</td>
                                            <td class='text-center' id="hf3">0</td>
                                            <td class='text-center' id="hm4">0</td>
                                            <td class='text-center' id="hf4">0</td>
                                            <td class='text-center' id="hm5">0</td>
                                            <td class='text-center' id="hf5">0</td>
                                            <td class='text-center' id="hm6">0</td>
                                            <td class='text-center' id="hf6">0</td>
                                            <td class='text-center' id="hm7">0</td>
                                            <td class='text-center' id="hf7">0</td>
                                            <td class='text-center' id="hm8">0</td>
                                            <td class='text-center' id="hf8">0</td>
                                            <td class='text-center' id="hm9">0</td>
                                            <td class='text-center' id="hf9">0</td>
                                            <td class='text-center' id="hm10">0</td>
                                            <td class='text-center' id="hf10">0</td>
                                            <td class='text-center'  id="s8"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                             
                                            <td colspan='3' style='font-weight:bold'>Bk negativo</td> 
                                            <td class='text-center' id="im1">0</td>
                                            <td class='text-center' id="if1">0</td>
                                            <td class='text-center' id="im2">0</td>
                                            <td class='text-center' id="if2">0</td>
                                            <td class='text-center' id="im3">0</td>
                                            <td class='text-center' id="if3">0</td>
                                            <td class='text-center' id="im4">0</td>
                                            <td class='text-center' id="if4">0</td>
                                            <td class='text-center' id="im5">0</td>
                                            <td class='text-center' id="if5">0</td>
                                            <td class='text-center' id="im6">0</td>
                                            <td class='text-center' id="if6">0</td>
                                            <td class='text-center' id="im7">0</td>
                                            <td class='text-center' id="if7">0</td>
                                            <td class='text-center' id="im8">0</td>
                                            <td class='text-center' id="if8">0</td>
                                            <td class='text-center' id="im9">0</td>
                                            <td class='text-center' id="if9">0</td>
                                            <td class='text-center' id="im10">0</td>
                                            <td class='text-center' id="if10">0</td>
                                            <td class='text-center'  id="s9"><a href='#'>0</a></td>
                                        </tr>
                                        <tr> 
                                            <td colspan='2' rowspan='4' style='font-weight:bold' class='text-center'>Tras fracaso</td>
                                             
                                            <td  colspan='3' style='font-weight:bold'>BK(+)</td> 
                                            <td class='text-center' id="jm1">0</td>
                                            <td class='text-center' id="jf1">0</td>
                                            <td class='text-center' id="jm2">0</td>
                                            <td class='text-center' id="jf2">0</td>
                                            <td class='text-center' id="jm3">0</td>
                                            <td class='text-center' id="jf3">0</td>
                                            <td class='text-center' id="jm4">0</td>
                                            <td class='text-center' id="jf4">0</td>
                                            <td class='text-center' id="jm5">0</td>
                                            <td class='text-center' id="jf5">0</td>
                                            <td class='text-center' id="jm6">0</td>
                                            <td class='text-center' id="jf6">0</td>
                                            <td class='text-center' id="jm7">0</td>
                                            <td class='text-center' id="jf7">0</td>
                                            <td class='text-center' id="jm8">0</td>
                                            <td class='text-center' id="jf8">0</td>
                                            <td class='text-center' id="jm9">0</td>
                                            <td class='text-center' id="jf9">0</td>
                                            <td class='text-center' id="jm10">0</td>
                                            <td class='text-center' id="jf10">0</td>
                                            <td class='text-center'  id="s10"><a href='#'>0</a></td>
                                        </tr>
                                        <tr> 
                                            <td  colspan='3' style='font-weight:bold'>Bk negativo cultivo(+)</td>
                                             
                                            <td class='text-center' id="km1">0</td>
                                            <td class='text-center' id="kf1">0</td>
                                            <td class='text-center' id="km2">0</td>
                                            <td class='text-center' id="kf2">0</td>
                                            <td class='text-center' id="km3">0</td>
                                            <td class='text-center' id="kf3">0</td>
                                            <td class='text-center' id="km4">0</td>
                                            <td class='text-center' id="kf4">0</td>
                                            <td class='text-center' id="km5">0</td>
                                            <td class='text-center' id="kf5">0</td>
                                            <td class='text-center' id="km6">0</td>
                                            <td class='text-center' id="kf6">0</td>
                                            <td class='text-center' id="km7">0</td>
                                            <td class='text-center' id="kf7">0</td>
                                            <td class='text-center' id="km8">0</td>
                                            <td class='text-center' id="kf8">0</td>
                                            <td class='text-center' id="km9">0</td>
                                            <td class='text-center' id="kf9">0</td>
                                            <td class='text-center' id="km10">0</td>
                                            <td class='text-center' id="kf10">0</td>
                                            <td class='text-center'  id="s11"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                            
                                            <td  colspan='3' style='font-weight:bold'>Bk negativo prueba molecular(+)</td>
                                             
                                            <td class='text-center' id="lm1">0</td>
                                            <td class='text-center' id="lf1">0</td>
                                            <td class='text-center' id="lm2">0</td>
                                            <td class='text-center' id="lf2">0</td>
                                            <td class='text-center' id="lm3">0</td>
                                            <td class='text-center' id="lf3">0</td>
                                            <td class='text-center' id="lm4">0</td>
                                            <td class='text-center' id="lf4">0</td>
                                            <td class='text-center' id="lm5">0</td>
                                            <td class='text-center' id="lf5">0</td>
                                            <td class='text-center' id="lm6">0</td>
                                            <td class='text-center' id="lf6">0</td>
                                            <td class='text-center' id="lm7">0</td>
                                            <td class='text-center' id="lf7">0</td>
                                            <td class='text-center' id="lm8">0</td>
                                            <td class='text-center' id="lf8">0</td>
                                            <td class='text-center' id="lm9">0</td>
                                            <td class='text-center' id="lf9">0</td>
                                            <td class='text-center' id="lm10">0</td>
                                            <td class='text-center' id="lf10">0</td>
                                            <td class='text-center'  id="s12"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                             
                                            <td  colspan='3' style='font-weight:bold'>Bk negativo</td>
                                             
                                            <td class='text-center' id="mm1">0</td>
                                            <td class='text-center' id="mf1">0</td>
                                            <td class='text-center' id="mm2">0</td>
                                            <td class='text-center' id="mf2">0</td>
                                            <td class='text-center' id="mm3">0</td>
                                            <td class='text-center' id="mf3">0</td>
                                            <td class='text-center' id="mm4">0</td>
                                            <td class='text-center' id="mf4">0</td>
                                            <td class='text-center' id="mm5">0</td>
                                            <td class='text-center' id="mf5">0</td>
                                            <td class='text-center' id="mm6">0</td>
                                            <td class='text-center' id="mf6">0</td>
                                            <td class='text-center' id="mm7">0</td>
                                            <td class='text-center' id="mf7">0</td>
                                            <td class='text-center' id="mm8">0</td>
                                            <td class='text-center' id="mf8">0</td>
                                            <td class='text-center' id="mm9">0</td>
                                            <td class='text-center' id="mf9">0</td>
                                            <td class='text-center' id="mm10">0</td>
                                            <td class='text-center' id="mf10">0</td>
                                            <td class='text-center'  id="s13"><a href='#'>0</a></td>
                                        </tr>
                                        <tr> 
                                            <td colspan='2' rowspan='4' style='font-weight:bold' class='text-center'>Tras pérdida de segimiento</td>
                                             
                                            <td  colspan='3' style='font-weight:bold'>BK(+)</td>
                                             
                                            <td class='text-center' id="nm1">0</td>
                                            <td class='text-center' id="nf1">0</td>
                                            <td class='text-center' id="nm2">0</td>
                                            <td class='text-center' id="nf2">0</td>
                                            <td class='text-center' id="nm3">0</td>
                                            <td class='text-center' id="nf3">0</td>
                                            <td class='text-center' id="nm4">0</td>
                                            <td class='text-center' id="nf4">0</td>
                                            <td class='text-center' id="nm5">0</td>
                                            <td class='text-center' id="nf5">0</td>
                                            <td class='text-center' id="nm6">0</td>
                                            <td class='text-center' id="nf6">0</td>
                                            <td class='text-center' id="nm7">0</td>
                                            <td class='text-center' id="nf7">0</td>
                                            <td class='text-center' id="nm8">0</td>
                                            <td class='text-center' id="nf8">0</td>
                                            <td class='text-center' id="nm9">0</td>
                                            <td class='text-center' id="nf9">0</td>
                                            <td class='text-center' id="nm10">0</td>
                                            <td class='text-center' id="nf10">0</td>
                                            <td class='text-center'  id="s14"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                            
                                            <td  colspan='3' style='font-weight:bold'>Bk negativo cultivo(+)</td>
                                             
                                            <td class='text-center' id="om1">0</td>
                                            <td class='text-center' id="of1">0</td>
                                            <td class='text-center' id="om2">0</td>
                                            <td class='text-center' id="of2">0</td>
                                            <td class='text-center' id="om3">0</td>
                                            <td class='text-center' id="of3">0</td>
                                            <td class='text-center' id="om4">0</td>
                                            <td class='text-center' id="of4">0</td>
                                            <td class='text-center' id="om5">0</td>
                                            <td class='text-center' id="of5">0</td>
                                            <td class='text-center' id="om6">0</td>
                                            <td class='text-center' id="of6">0</td>
                                            <td class='text-center' id="om7">0</td>
                                            <td class='text-center' id="of7">0</td>
                                            <td class='text-center' id="om8">0</td>
                                            <td class='text-center' id="of8">0</td>
                                            <td class='text-center' id="om9">0</td>
                                            <td class='text-center' id="of9">0</td>
                                            <td class='text-center' id="om10">0</td>
                                            <td class='text-center' id="of10">0</td>
                                            <td class='text-center'  id="s15"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                            
                                            <td  colspan='3'style='font-weight:bold'>Bk negativo prueba molecular(+)</td>
                                             
                                            <td class='text-center' id="pm1">0</td>
                                            <td class='text-center' id="pf1">0</td>
                                            <td class='text-center' id="pm2">0</td>
                                            <td class='text-center' id="pf2">0</td>
                                            <td class='text-center' id="pm3">0</td>
                                            <td class='text-center' id="pf3">0</td>
                                            <td class='text-center' id="pm4">0</td>
                                            <td class='text-center' id="pf4">0</td>
                                            <td class='text-center' id="pm5">0</td>
                                            <td class='text-center' id="pf5">0</td>
                                            <td class='text-center' id="pm6">0</td>
                                            <td class='text-center' id="pf6">0</td>
                                            <td class='text-center' id="pm7">0</td>
                                            <td class='text-center' id="pf7">0</td>
                                            <td class='text-center' id="pm8">0</td>
                                            <td class='text-center' id="pf8">0</td>
                                            <td class='text-center' id="pm9">0</td>
                                            <td class='text-center' id="pf9">0</td>
                                            <td class='text-center' id="pm10">0</td>
                                            <td class='text-center' id="pf10">0</td>
                                            <td class='text-center'  id="s16"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                            
                                            <td  colspan='3' style='font-weight:bold'>Bk negativo</td>
                                            
                                            <td class='text-center' id="qm1">0</td>
                                            <td class='text-center' id="qf1">0</td>
                                            <td class='text-center' id="qm2">0</td>
                                            <td class='text-center' id="qf2">0</td>
                                            <td class='text-center' id="qm3">0</td>
                                            <td class='text-center' id="qf3">0</td>
                                            <td class='text-center' id="qm4">0</td>
                                            <td class='text-center' id="qf4">0</td>
                                            <td class='text-center' id="qm5">0</td>
                                            <td class='text-center' id="qf5">0</td>
                                            <td class='text-center' id="qm6">0</td>
                                            <td class='text-center' id="qf6">0</td>
                                            <td class='text-center' id="qm7">0</td>
                                            <td class='text-center' id="qf7">0</td>
                                            <td class='text-center' id="qm8">0</td>
                                            <td class='text-center' id="qf8">0</td>
                                            <td class='text-center' id="qm9">0</td>
                                            <td class='text-center' id="qf9">0</td>
                                            <td class='text-center' id="qm10">0</td>
                                            <td class='text-center' id="qf10">0</td>
                                            <td class='text-center'  id="s17"><a href='#'>0</a></td>
                                        </tr>
                                        <tr> 
                                            <td colspan='2' style='font-weight:bold' class='text-center' rowspan='4'>Otros pacientes previamente tratados</td>
                                             
                                            <td  colspan='3' style='font-weight:bold' >BK(+)</td>
                                             
                                            <td class='text-center' id="rm1">0</td>
                                            <td class='text-center' id="rf1">0</td>
                                            <td class='text-center' id="rm2">0</td>
                                            <td class='text-center' id="rf2">0</td>
                                            <td class='text-center' id="rm3">0</td>
                                            <td class='text-center' id="rf3">0</td>
                                            <td class='text-center' id="rm4">0</td>
                                            <td class='text-center' id="rf4">0</td>
                                            <td class='text-center' id="rm5">0</td>
                                            <td class='text-center' id="rf5">0</td>
                                            <td class='text-center' id="rm6">0</td>
                                            <td class='text-center' id="rf6">0</td>
                                            <td class='text-center' id="rm7">0</td>
                                            <td class='text-center' id="rf7">0</td>
                                            <td class='text-center' id="rm8">0</td>
                                            <td class='text-center' id="rf8">0</td>
                                            <td class='text-center' id="rm9">0</td>
                                            <td class='text-center' id="rf9">0</td>
                                            <td class='text-center' id="rm10">0</td>
                                            <td class='text-center' id="rf10">0</td>
                                            <td class='text-center'  id="s18"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                          
                                            <td  colspan='3' style='font-weight:bold' >Bk negativo cultivo(+)</td>
                                           
                                            <td class='text-center' id="sm1">0</td>
                                            <td class='text-center' id="sf1">0</td>
                                            <td class='text-center' id="sm2">0</td>
                                            <td class='text-center' id="sf2">0</td>
                                            <td class='text-center' id="sm3">0</td>
                                            <td class='text-center' id="sf3">0</td>
                                            <td class='text-center' id="sm4">0</td>
                                            <td class='text-center' id="sf4">0</td>
                                            <td class='text-center' id="sm5">0</td>
                                            <td class='text-center' id="sf5">0</td>
                                            <td class='text-center' id="sm6">0</td>
                                            <td class='text-center' id="sf6">0</td>
                                            <td class='text-center' id="sm7">0</td>
                                            <td class='text-center' id="sf7">0</td>
                                            <td class='text-center' id="sm8">0</td>
                                            <td class='text-center' id="sf8">0</td>
                                            <td class='text-center' id="sm9">0</td>
                                            <td class='text-center' id="sf9">0</td>
                                            <td class='text-center' id="sm10">0</td>
                                            <td class='text-center' id="sf10">0</td>
                                            <td class='text-center'  id="s19"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                           
                                            <td  colspan='3' style='font-weight:bold'>Bk negativo prueba molecular(+)</td>
                                            
                                            <td class='text-center' id="tm1">0</td>
                                            <td class='text-center' id="tf1">0</td>
                                            <td class='text-center' id="tm2">0</td>
                                            <td class='text-center' id="tf2">0</td>
                                            <td class='text-center' id="tm3">0</td>
                                            <td class='text-center' id="tf3">0</td>
                                            <td class='text-center' id="tm4">0</td>
                                            <td class='text-center' id="tf4">0</td>
                                            <td class='text-center' id="tm5">0</td>
                                            <td class='text-center' id="tf5">0</td>
                                            <td class='text-center' id="tm6">0</td>
                                            <td class='text-center' id="tf6">0</td>
                                            <td class='text-center' id="tm7">0</td>
                                            <td class='text-center' id="tf7">0</td>
                                            <td class='text-center' id="tm8">0</td>
                                            <td class='text-center' id="tf8">0</td>
                                            <td class='text-center' id="tm9">0</td>
                                            <td class='text-center' id="tf9">0</td>
                                            <td class='text-center' id="tm10">0</td>
                                            <td class='text-center' id="tf10">0</td>
                                            <td class='text-center'  id="s20"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                            
                                            <td  colspan='3' style='font-weight:bold'>Bk negativo</td>
                                            
                                            <td class='text-center' id="um1">0</td>
                                            <td class='text-center' id="uf1">0</td>
                                            <td class='text-center' id="um2">0</td>
                                            <td class='text-center' id="uf2">0</td>
                                            <td class='text-center' id="um3">0</td>
                                            <td class='text-center' id="uf3">0</td>
                                            <td class='text-center' id="um4">0</td>
                                            <td class='text-center' id="uf4">0</td>
                                            <td class='text-center' id="um5">0</td>
                                            <td class='text-center' id="uf5">0</td>
                                            <td class='text-center' id="um6">0</td>
                                            <td class='text-center' id="uf6">0</td>
                                            <td class='text-center' id="um7">0</td>
                                            <td class='text-center' id="uf7">0</td>
                                            <td class='text-center' id="um8">0</td>
                                            <td class='text-center' id="uf8">0</td>
                                            <td class='text-center' id="um9">0</td>
                                            <td class='text-center' id="uf9">0</td>
                                            <td class='text-center' id="um10">0</td>
                                            <td class='text-center' id="uf10">0</td>
                                            <td class='text-center'  id="s21"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                            <td rowspan='6' style='font-weight:bold' class="verticalText text-center">Meníngeos</td>
                                            <td colspan='3' style='font-weight:bold' class='text-center'  rowspan='2'>Nuevo</td>
                                             
                                            <td colspan='3' style='font-weight:bold'>Bacteriológicamente positivo</td>
                                            
                                            <td class='text-center' id="vm1">0</td>
                                            <td class='text-center' id="vf1">0</td>
                                            <td class='text-center' id="vm2">0</td>
                                            <td class='text-center' id="vf2">0</td>
                                            <td class='text-center' id="vm3">0</td>
                                            <td class='text-center' id="vf3">0</td>
                                            <td class='text-center' id="vm4">0</td>
                                            <td class='text-center' id="vf4">0</td>
                                            <td class='text-center' id="vm5">0</td>
                                            <td class='text-center' id="vf5">0</td>
                                            <td class='text-center' id="vm6">0</td>
                                            <td class='text-center' id="vf6">0</td>
                                            <td class='text-center' id="vm7">0</td>
                                            <td class='text-center' id="vf7">0</td>
                                            <td class='text-center' id="vm8">0</td>
                                            <td class='text-center' id="vf8">0</td>
                                            <td class='text-center' id="vm9">0</td>
                                            <td class='text-center' id="vf9">0</td>
                                            <td class='text-center' id="vm10">0</td>
                                            <td class='text-center' id="vf10">0</td>
                                            <td class='text-center'  id="s22"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                              
                                            <td colspan='3' style='font-weight:bold'>Sin confirmación bacteriológica</td>
                                             
                                            <td class='text-center' id="wm1">0</td>
                                            <td class='text-center' id="wf1">0</td>
                                            <td class='text-center' id="wm2">0</td>
                                            <td class='text-center' id="wf2">0</td>
                                            <td class='text-center' id="wm3">0</td>
                                            <td class='text-center' id="wf3">0</td>
                                            <td class='text-center' id="wm4">0</td>
                                            <td class='text-center' id="wf4">0</td>
                                            <td class='text-center' id="wm5">0</td>
                                            <td class='text-center' id="wf5">0</td>
                                            <td class='text-center' id="wm6">0</td>
                                            <td class='text-center' id="wf6">0</td>
                                            <td class='text-center' id="wm7">0</td>
                                            <td class='text-center' id="wf7">0</td>
                                            <td class='text-center' id="wm8">0</td>
                                            <td class='text-center' id="wf8">0</td>
                                            <td class='text-center' id="wm9">0</td>
                                            <td class='text-center' id="wf9">0</td>
                                            <td class='text-center' id="wm10">0</td>
                                            <td class='text-center' id="wf10">0</td>
                                            <td class='text-center'  id="s23"><a href='#'>0</a></td>
                                        </tr>
                                        <tr> 
                                            <td colspan='3' class='text-center' style='font-weight:bold' rowspan='4'>Previamente tratado</td>
                                            
                                            <td colspan='3' style='font-weight:bold'>Tras recaída</td>
                                             
                                            <td class='text-center' id="xm1">0</td>
                                            <td class='text-center' id="xf1">0</td>
                                            <td class='text-center' id="xm2">0</td>
                                            <td class='text-center' id="xf2">0</td>
                                            <td class='text-center' id="xm3">0</td>
                                            <td class='text-center' id="xf3">0</td>
                                            <td class='text-center' id="xm4">0</td>
                                            <td class='text-center' id="xf4">0</td>
                                            <td class='text-center' id="xm5">0</td>
                                            <td class='text-center' id="xf5">0</td>
                                            <td class='text-center' id="xm6">0</td>
                                            <td class='text-center' id="xf6">0</td>
                                            <td class='text-center' id="xm7">0</td>
                                            <td class='text-center' id="xf7">0</td>
                                            <td class='text-center' id="xm8">0</td>
                                            <td class='text-center' id="xf8">0</td>
                                            <td class='text-center' id="xm9">0</td>
                                            <td class='text-center' id="xf9">0</td>
                                            <td class='text-center' id="xm10">0</td>
                                            <td class='text-center' id="xf10">0</td>
                                            <td class='text-center'  id="s24"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                             
                                            <td colspan='3' style='font-weight:bold'>Tras fracaso</td>
                                             
                                            <td class='text-center' id="ym1">0</td>
                                            <td class='text-center' id="yf1">0</td>
                                            <td class='text-center' id="ym2">0</td>
                                            <td class='text-center' id="yf2">0</td>
                                            <td class='text-center' id="ym3">0</td>
                                            <td class='text-center' id="yf3">0</td>
                                            <td class='text-center' id="ym4">0</td>
                                            <td class='text-center' id="yf4">0</td>
                                            <td class='text-center' id="ym5">0</td>
                                            <td class='text-center' id="yf5">0</td>
                                            <td class='text-center' id="ym6">0</td>
                                            <td class='text-center' id="yf6">0</td>
                                            <td class='text-center' id="ym7">0</td>
                                            <td class='text-center' id="yf7">0</td>
                                            <td class='text-center' id="ym8">0</td>
                                            <td class='text-center' id="yf8">0</td>
                                            <td class='text-center' id="ym9">0</td>
                                            <td class='text-center' id="yf9">0</td>
                                            <td class='text-center' id="ym10">0</td>
                                            <td class='text-center' id="yf10">0</td>
                                            <td class='text-center'  id="s25"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                            
                                            <td colspan='3' style='font-weight:bold' >Tras perdida de segimiento</td>
                                            
                                            <td class='text-center' id="zm1">0</td>
                                            <td class='text-center' id="zf1">0</td>
                                            <td class='text-center' id="zm2">0</td>
                                            <td class='text-center' id="zf2">0</td>
                                            <td class='text-center' id="zm3">0</td>
                                            <td class='text-center' id="zf3">0</td>
                                            <td class='text-center' id="zm4">0</td>
                                            <td class='text-center' id="zf4">0</td>
                                            <td class='text-center' id="zm5">0</td>
                                            <td class='text-center' id="zf5">0</td>
                                            <td class='text-center' id="zm6">0</td>
                                            <td class='text-center' id="zf6">0</td>
                                            <td class='text-center' id="zm7">0</td>
                                            <td class='text-center' id="zf7">0</td>
                                            <td class='text-center' id="zm8">0</td>
                                            <td class='text-center' id="zf8">0</td>
                                            <td class='text-center' id="zm9">0</td>
                                            <td class='text-center' id="zf9">0</td>
                                            <td class='text-center' id="zm10">0</td>
                                            <td class='text-center' id="zf10">0</td>
                                            <td class='text-center'  id="s26"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                             
                                            <td colspan='3'  style='font-weight:bold'>Otros previamente tratados</td>
                                             
                                            <td class='text-center' id="aam1">0</td>
                                            <td class='text-center' id="aaf1">0</td>
                                            <td class='text-center' id="aam2">0</td>
                                            <td class='text-center' id="aaf2">0</td>
                                            <td class='text-center' id="aam3">0</td>
                                            <td class='text-center' id="aaf3">0</td>
                                            <td class='text-center' id="aam4">0</td>
                                            <td class='text-center' id="aaf4">0</td>
                                            <td class='text-center' id="aam5">0</td>
                                            <td class='text-center' id="aaf5">0</td>
                                            <td class='text-center' id="aam6">0</td>
                                            <td class='text-center' id="aaf6">0</td>
                                            <td class='text-center' id="aam7">0</td>
                                            <td class='text-center' id="aaf7">0</td>
                                            <td class='text-center' id="aam8">0</td>
                                            <td class='text-center' id="aaf8">0</td>
                                            <td class='text-center' id="aam9">0</td>
                                            <td class='text-center' id="aaf9">0</td>
                                            <td class='text-center' id="aam10">0</td>
                                            <td class='text-center' id="aaf10">0</td>
                                            <td class='text-center'  id="s27"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                            <td rowspan='6'  style='font-weight:bold' class="verticalText text-center">Otros Extrapulmonares</td>
                                            <td rowspan='2'  class='text-center' style='font-weight:bold' colspan='3'>Nuevo</td> 
                                            <td colspan='3' style='font-weight:bold'>Bacteriológicamente positivo</td> 
                                            <td class='text-center' id="abm1">0</td>
                                            <td class='text-center' id="abf1">0</td>
                                            <td class='text-center' id="abm2">0</td>
                                            <td class='text-center' id="abf2">0</td>
                                            <td class='text-center' id="abm3">0</td>
                                            <td class='text-center' id="abf3">0</td>
                                            <td class='text-center' id="abm4">0</td>
                                            <td class='text-center' id="abf4">0</td>
                                            <td class='text-center' id="abm5">0</td>
                                            <td class='text-center' id="abf5">0</td>
                                            <td class='text-center' id="abm6">0</td>
                                            <td class='text-center' id="abf6">0</td>
                                            <td class='text-center' id="abm7">0</td>
                                            <td class='text-center' id="abf7">0</td>
                                            <td class='text-center' id="abm8">0</td>
                                            <td class='text-center' id="abf8">0</td>
                                            <td class='text-center' id="abm9">0</td>
                                            <td class='text-center' id="abf9">0</td>
                                            <td class='text-center' id="abm10">0</td>
                                            <td class='text-center' id="abf10">0</td>
                                            <td class='text-center'  id="s28"><a href='#'>0</a></td>
                                        </tr>
                                        <tr> 
                                            <td colspan='3' style='font-weight:bold'>Sin confirmación bacteriológica</td>
                                            
                                            <td class='text-center' id="acm1">0</td>
                                            <td class='text-center' id="acf1">0</td>
                                            <td class='text-center' id="acm2">0</td>
                                            <td class='text-center' id="acf2">0</td>
                                            <td class='text-center' id="acm3">0</td>
                                            <td class='text-center' id="acf3">0</td>
                                            <td class='text-center' id="acm4">0</td>
                                            <td class='text-center' id="acf4">0</td>
                                            <td class='text-center' id="acm5">0</td>
                                            <td class='text-center' id="acf5">0</td>
                                            <td class='text-center' id="acm6">0</td>
                                            <td class='text-center' id="acf6">0</td>
                                            <td class='text-center' id="acm7">0</td>
                                            <td class='text-center' id="acf7">0</td>
                                            <td class='text-center' id="acm8">0</td>
                                            <td class='text-center' id="acf8">0</td>
                                            <td class='text-center' id="acm9">0</td>
                                            <td class='text-center' id="acf9">0</td>
                                            <td class='text-center' id="acm10">0</td>
                                            <td class='text-center' id="acf10">0</td>
                                            <td class='text-center'  id="s29"><a href='#'>0</a></td>
                                        </tr>
                                        <tr> 
                                            <td rowspan='4'  class='text-center' style='font-weight:bold' colspan='3'>Previamente tratado</td>
                                             
                                            <td colspan='3' style='font-weight:bold' >Tras recaída</td>
                                             
                                            <td class='text-center' id="adm1">0</td>
                                            <td class='text-center' id="adf1">0</td>
                                            <td class='text-center' id="adm2">0</td>
                                            <td class='text-center' id="adf2">0</td>
                                            <td class='text-center' id="adm3">0</td>
                                            <td class='text-center' id="adf3">0</td>
                                            <td class='text-center' id="adm4">0</td>
                                            <td class='text-center' id="adf4">0</td>
                                            <td class='text-center' id="adm5">0</td>
                                            <td class='text-center' id="adf5">0</td>
                                            <td class='text-center' id="adm6">0</td>
                                            <td class='text-center' id="adf6">0</td>
                                            <td class='text-center' id="adm7">0</td>
                                            <td class='text-center' id="adf7">0</td>
                                            <td class='text-center' id="adm8">0</td>
                                            <td class='text-center' id="adf8">0</td>
                                            <td class='text-center' id="adm9">0</td>
                                            <td class='text-center' id="adf9">0</td>
                                            <td class='text-center' id="adm10">0</td>
                                            <td class='text-center' id="adf10">0</td>
                                            <td class='text-center'  id="s30"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                             
                                            <td colspan='3' style='font-weight:bold' >Tras fracaso</td>
                                            
                                            <td class='text-center' id="aem1">0</td>
                                            <td class='text-center' id="aef1">0</td>
                                            <td class='text-center' id="aem2">0</td>
                                            <td class='text-center' id="aef2">0</td>
                                            <td class='text-center' id="aem3">0</td>
                                            <td class='text-center' id="aef3">0</td>
                                            <td class='text-center' id="aem4">0</td>
                                            <td class='text-center' id="aef4">0</td>
                                            <td class='text-center' id="aem5">0</td>
                                            <td class='text-center' id="aef5">0</td>
                                            <td class='text-center' id="aem6">0</td>
                                            <td class='text-center' id="aef6">0</td>
                                            <td class='text-center' id="aem7">0</td>
                                            <td class='text-center' id="aef7">0</td>
                                            <td class='text-center' id="aem8">0</td>
                                            <td class='text-center' id="aef8">0</td>
                                            <td class='text-center' id="aem9">0</td>
                                            <td class='text-center' id="aef9">0</td>
                                            <td class='text-center' id="aem10">0</td>
                                            <td class='text-center' id="aef10">0</td>
                                            <td class='text-center'  id="s31"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                            
                                            <td colspan='3' style='font-weight:bold' >Tras perdida de segimiento</td>
                                             
                                            <td class='text-center' id="afm1">0</td>
                                            <td class='text-center' id="aff1">0</td>
                                            <td class='text-center' id="afm2">0</td>
                                            <td class='text-center' id="aff2">0</td>
                                            <td class='text-center' id="afm3">0</td>
                                            <td class='text-center' id="aff3">0</td>
                                            <td class='text-center' id="afm4">0</td>
                                            <td class='text-center' id="aff4">0</td>
                                            <td class='text-center' id="afm5">0</td>
                                            <td class='text-center' id="aff5">0</td>
                                            <td class='text-center' id="afm6">0</td>
                                            <td class='text-center' id="aff6">0</td>
                                            <td class='text-center' id="afm7">0</td>
                                            <td class='text-center' id="aff7">0</td>
                                            <td class='text-center' id="afm8">0</td>
                                            <td class='text-center' id="aff8">0</td>
                                            <td class='text-center' id="afm9">0</td>
                                            <td class='text-center' id="aff9">0</td>
                                            <td class='text-center' id="afm10">0</td>
                                            <td class='text-center' id="aff10">0</td>
                                            <td class='text-center'  id="s32"><a href='#'>0</a></td>
                                        </tr>
                                        <tr> 
                                            <td colspan='3' style='font-weight:bold'>Otros previamente tratados</td>
                                             
                                            <td class='text-center' id="agm1">0</td>
                                            <td class='text-center' id="agf1">0</td>
                                            <td class='text-center' id="agm2">0</td>
                                            <td class='text-center' id="agf2">0</td>
                                            <td class='text-center' id="agm3">0</td>
                                            <td class='text-center' id="agf3">0</td>
                                            <td class='text-center' id="agm4">0</td>
                                            <td class='text-center' id="agf4">0</td>
                                            <td class='text-center' id="agm5">0</td>
                                            <td class='text-center' id="agf5">0</td>
                                            <td class='text-center' id="agm6">0</td>
                                            <td class='text-center' id="agf6">0</td>
                                            <td class='text-center' id="agm7">0</td>
                                            <td class='text-center' id="agf7">0</td>
                                            <td class='text-center' id="agm8">0</td>
                                            <td class='text-center' id="agf8">0</td>
                                            <td class='text-center' id="agm9">0</td>
                                            <td class='text-center' id="agf9">0</td>
                                            <td class='text-center' id="agm10">0</td>
                                            <td class='text-center' id="agf10">0</td>
                                            <td class='text-center'  id="s33"><a href='#'>0</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan='7' class='text-center' style='font-weight:bold'>TOTAL</td>  
                                            <td class='text-center' id="ahm1">0</td>
                                            <td class='text-center' id="ahf1">0</td>
                                            <td class='text-center' id="ahm2">0</td>
                                            <td class='text-center' id="ahf2">0</td>
                                            <td class='text-center' id="ahm3">0</td>
                                            <td class='text-center' id="ahf3">0</td>
                                            <td class='text-center' id="ahm4">0</td>
                                            <td class='text-center' id="ahf4">0</td>
                                            <td class='text-center' id="ahm5">0</td>
                                            <td class='text-center' id="ahf5">0</td>
                                            <td class='text-center' id="ahm6">0</td>
                                            <td class='text-center' id="ahf6">0</td>
                                            <td class='text-center' id="ahm7">0</td>
                                            <td class='text-center' id="ahf7">0</td>
                                            <td class='text-center' id="ahm8">0</td>
                                            <td class='text-center' id="ahf8">0</td>
                                            <td class='text-center' id="ahm9">0</td>
                                            <td class='text-center' id="ahf9">0</td>
                                            <td class='text-center' id="ahm10">0</td>
                                            <td class='text-center' id="ahf10">0</td>
                                            <td class='text-center'  id="s34" name="sa34"><a href='#'>0</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <table class="tableizer-table table-responsive" border='10 px black solid'>
                                    <thead>
                                        <tr class="tableizer-firstrow text-center" style='height:30px;'>
                                            <th colspan='7' class='text-center' style='font-weight:bold'> 3. RELACION DE ACTIVIDADES REALIZADAS </th>
                                            <th  class='text-center' colspan='4' style='font-weight:bold'> 4. ESTUDIO DE CONTACTOS </th>
                                             
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class='text-center'  style='font-weight:bold'>
                                            <td colspan='3'  >DILIGENCIAR EN NIVEL IPS,MUNICIPIO,DISTRITO Y DEPARTAMENTO</td>
                                            <td colspan='4'  > DILIGENCIAR EN DISTRITO Y DEPARTAMENTO </td>
                                            <td colspan='4'  > DILIGENCIAR EN MUNICIPIO,DISTRITO Y DEPARTAMENTO</td>
                                        </tr>
                                        <tr class='text-center'  style='font-weight:bold'> 
                                            <td>Si es IPS: Consulta de primera vez> de 15 años.*Si es ET:Población> 15 años.</td>
                                            <td>Sintomáticos respiratorios (SR) CAPTADOS</td>
                                            <td>Sintomáticos respiratorios (SR) EXAMINADOS</td>
                                            <td>Total de baciloscopia de diagnostico realizada</td>
                                            <td>Personas con baciloscopia positiva</td>
                                            <td>Personas examinadas con cultivo</td>
                                            <td>Personas con cultivo positivo</td>
                                            <td>Contactos Identificados</td>
                                            <td>Contactos SR</td>
                                            <td>Contactos SR Examinados conBK</td>
                                            <td>Total de contactos enfermos</td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td class='text-center' id="aim1">0</td>
                                            <td class='text-center' id="aim2">0</td>
                                            <td class='text-center' id="aim3">0</td>
                                            <td class='text-center' id="aim4">0</td>
                                            <td class='text-center' id="aim5">0</td>
                                            <td class='text-center' id="aim6">0</td>
                                            <td class='text-center' id="aim7">0</td>
                                            <td class='text-center' id="aim8">0</td>
                                            <td class='text-center' id="aim9">0</td>
                                            <td class='text-center' id="aim10">0</td>
                                            <td class='text-center' id="aim11">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <table class="tableizer-table table-responsive" >
                                    <thead>
                                        <tr class="tableizer-firstrow " style='height:30px;'>
                                            <th colspan='28' class='text-center'  style='font-weight:bold'> 5. TUBERCULOSIS-VIH (Nuevos y Previamente tratados) </th>
                                             
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class='text-center'  style='font-weight:bold'>
                                            <td colspan='7' rowspan='3' >CASOS QUE INGRESARON DURANTE EL TRIMESTRE</td>
                                            <td colspan='21'> GRUPO EDAD Y GENERO </td>
                                        </tr>
                                         
                                        
                                        <tr  class='text-center'  style='font-weight:bold'> 
                                            <td colspan='2'><1</td>
                                             
                                            <td colspan='2'>1 - 4</td> 
                                            <td colspan='2'>5 - 14</td> 
                                            <td colspan='2'>15 - 24</td> 
                                            <td colspan='2'>25 - 34</td> 
                                            <td colspan='2'>35 - 44</td> 
                                            <td colspan='2'>45 - 54</td> 
                                            <td colspan='2'>55 - 64</td> 
                                            <td colspan='2'>65 O MAS</td> 
                                            <td colspan='3'>TOTAL</td> 
                                        </tr>
                                        
                                        <tr  style='font-weight:bold'>
                                            
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td class='text-center'>M</td>
                                            <td class='text-center'>F</td>
                                            <td>SUMA</td>
                                        </tr>
                                         
                                        <tr>
                                             
                                            <td colspan='7'  style='font-weight:bold'>Pacientes de TB Pulmonar VIH positivos</td> 
                                            <td class='text-center' id="ajm1">0</td>
                                            <td class='text-center' id="ajf1">0</td>
                                            <td class='text-center' id="ajm2">0</td>
                                            <td class='text-center' id="ajf2">0</td>
                                            <td class='text-center' id="ajm3">0</td>
                                            <td class='text-center' id="ajf3">0</td>
                                            <td class='text-center' id="ajm4">0</td>
                                            <td class='text-center' id="ajf4">0</td>
                                            <td class='text-center' id="ajm5">0</td>
                                            <td class='text-center' id="ajf5">0</td>
                                            <td class='text-center' id="ajm6">0</td>
                                            <td class='text-center' id="ajf6">0</td>
                                            <td class='text-center' id="ajm7">0</td>
                                            <td class='text-center' id="ajf7">0</td>
                                            <td class='text-center' id="ajm8">0</td>
                                            <td class='text-center' id="ajf8">0</td>
                                            <td class='text-center' id="ajm9">0</td>
                                            <td class='text-center' id="ajf9">0</td>
                                            <td class='text-center' id="ajm10">0</td>
                                            <td class='text-center' id="ajf10">0</td>
                                            <td class='text-center'  id="s35"><a href='#'>0</a></td>
                                        </tr>
                                        <tr> 
                                            <td colspan='7'  style='font-weight:bold'>Pacientes de TB Extra Pulmonar VIH positivos</td>
                                             
                                            <td class='text-center' id="akm1">0</td>
                                            <td class='text-center' id="akf1">0</td>
                                            <td class='text-center' id="akm2">0</td>
                                            <td class='text-center' id="akf2">0</td>
                                            <td class='text-center' id="akm3">0</td>
                                            <td class='text-center' id="akf3">0</td>
                                            <td class='text-center' id="akm4">0</td>
                                            <td class='text-center' id="akf4">0</td>
                                            <td class='text-center' id="akm5">0</td>
                                            <td class='text-center' id="akf5">0</td>
                                            <td class='text-center' id="akm6">0</td>
                                            <td class='text-center' id="akf6">0</td>
                                            <td class='text-center' id="akm7">0</td>
                                            <td class='text-center' id="akf7">0</td>
                                            <td class='text-center' id="akm8">0</td>
                                            <td class='text-center' id="akf8">0</td>
                                            <td class='text-center' id="akm9">0</td>
                                            <td class='text-center' id="akf9">0</td>
                                            <td class='text-center' id="akm10">0</td>
                                            <td class='text-center' id="akf10">0</td>
                                            <td class='text-center'  id="s36"><a href='#'>0</a></td>
                                        </tr>
                                        <tr> 
                                            <td colspan='7'  style='font-weight:bold'>Total de casos de Asociacion en Tratamiento ARV</td>
                                            <td class='text-center' id="alm1">0</td>
                                            <td class='text-center' id="alf1">0</td>
                                            <td class='text-center' id="alm2">0</td>
                                            <td class='text-center' id="alf2">0</td>
                                            <td class='text-center' id="alm3">0</td>
                                            <td class='text-center' id="alf3">0</td>
                                            <td class='text-center' id="alm4">0</td>
                                            <td class='text-center' id="alf4">0</td>
                                            <td class='text-center' id="alm5">0</td>
                                            <td class='text-center' id="alf5">0</td>
                                            <td class='text-center' id="alm6">0</td>
                                            <td class='text-center' id="alf6">0</td>
                                            <td class='text-center' id="alm7">0</td>
                                            <td class='text-center' id="alf7">0</td>
                                            <td class='text-center' id="alm8">0</td>
                                            <td class='text-center' id="alf8">0</td>
                                            <td class='text-center' id="alm9">0</td>
                                            <td class='text-center' id="alf9">0</td>
                                            <td class='text-center' id="alm10">0</td>
                                            <td class='text-center' id="alf10">0</td>
                                            <td class='text-center'  id="s37"><a href='#'>0</a></td>
                                        </tr>
                                        <tr> 
                                            <td colspan='7'  style='font-weight:bold'>Casos de coinfección TB/VIH con Trimetoprim Sulfa</td>
                                            <td class='text-center' id="amm1">0</td>
                                            <td class='text-center' id="amf1">0</td>
                                            <td class='text-center' id="amm2">0</td>
                                            <td class='text-center' id="amf2">0</td>
                                            <td class='text-center' id="amm3">0</td>
                                            <td class='text-center' id="amf3">0</td>
                                            <td class='text-center' id="amm4">0</td>
                                            <td class='text-center' id="amf4">0</td>
                                            <td class='text-center' id="amm5">0</td>
                                            <td class='text-center' id="amf5">0</td>
                                            <td class='text-center' id="amm6">0</td>
                                            <td class='text-center' id="amf6">0</td>
                                            <td class='text-center' id="amm7">0</td>
                                            <td class='text-center' id="amf7">0</td>
                                            <td class='text-center' id="amm8">0</td>
                                            <td class='text-center' id="amf8">0</td>
                                            <td class='text-center' id="amm9">0</td>
                                            <td class='text-center' id="amf9">0</td>
                                            <td class='text-center' id="amm10">0</td>
                                            <td class='text-center' id="amf10">0</td>
                                            <td class='text-center'  id="s38"><a href='#'>0</a></td>
                                        </tr>
                                        <tr> 
                                            <td colspan='6'  style='font-weight:bold'>PACIENTES CON TB CON APV : </td>
                                            <td class='text-center' id="an">0</td>
                                            <td colspan='8'  style='font-weight:bold'>PACIENTES CON RESULTADO DE PRUEBA DE VIH : </td>
                                            
                                            <td colspan='4' class='text-center' id="ao">0</td>
                                             
                                            <td  colspan='7'  style='font-weight:bold'>PACIENTES CON RESULTADO POSITIVO DE VIH : </td>
                                            
                                            <td class='text-center' colspan='2' id='ap'>0</td> 
                                        </tr>
                                        <tr> 
                                            <td colspan='7'  style='font-weight:bold'>PACIENTES CON DIAGNOSTICO PREVIO DE VIH : </td>
                                            <td class='text-center' colspan='6' id='aq'>0</td>
                                            <td colspan='10'  style='font-weight:bold'>TOTAL DE PACIENTES CON COINFECCION: </td>
                                            
                                            <td colspan='5' class='text-center' id="ar">0</td>
                                           
                                        </tr>
                                        <tr> 
                                            <td colspan='7' rowspan='2' class='bg'  style='font-weight:bold'>QUIMIOPROFILAXIS CON ISONIAZIDA </td>
                                            <td colspan='18'  style='font-weight:bold'>Total de personas con VIH que recibieron quimioprofilaxis en el trimestre </td>
                                            <td colspan='3' class='text-center' id="as">0</td>
                                           
                                           
                                        </tr> 
                                        <tr> 
                                            
                                            <td colspan='18'  style='font-weight:bold'>Total de Otras personas sin VIH o desconocido que recibieron quimioprofilaxis en el trimestre </td>
                                            <td colspan='3' class='text-center' id="at">0</td>
                                           
                                           
                                        </tr>
                                    </tbody>
                                </table>



                                <br>
                                <button type="button" id="botonGeneralExcel" class="btn btn-success  " disabled  onclick="Javascript: generalInformeXLS();" style="background-color: #41B314;  height: 40px; width:100%;">General Excel</button>
                                 
                            </div>
                    
                           
                        </div>
                    </p>
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
	<script src="../../../js/app/app_libroPacientes.js"></script>
	<script src="../../../js/app/app.js"></script>
	<script>
		
	</script>
	
  </body>
</html>
