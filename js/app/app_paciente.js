const electronApp= require('electron').remote;
const { Console } = require('console');
const fs= require('fs');
const ipc = require('electron').ipcRenderer;
const shell = require('electron').shell;

const usuario=JSON.parse(localStorage.getItem('user'));
const paciente=JSON.parse(localStorage.getItem('paciente'));
let consultasanoactual=[];
let cosnsultaspendientecargar=[];
let pacientesSinCargar=[];
const usuarios= JSON.parse(fs.readFileSync(__dirname+'/json/usuarios.json', 'utf-8'));
let examenfisicoPrenVal=0;

const generales= JSON.parse(fs.readFileSync(__dirname+'/json/consultas_generales.json', 'utf-8'));
const enfermeria= JSON.parse(fs.readFileSync(__dirname+'/json/consultas_enfermeria.json', 'utf-8'));
const psicologia= JSON.parse(fs.readFileSync(__dirname+'/json/consultas_psicologia.json', 'utf-8'));
const nutricional= JSON.parse(fs.readFileSync(__dirname+'/json/consultas_nutricional.json', 'utf-8'));
const adulto= JSON.parse(fs.readFileSync(__dirname+'/json/consultas_adulto.json', 'utf-8'));
const menor= JSON.parse(fs.readFileSync(__dirname+'/json/consultas_menor.json', 'utf-8'));
const gestante= JSON.parse(fs.readFileSync(__dirname+'/json/consultas_gestaciones.json', 'utf-8'));
const SSR= JSON.parse(fs.readFileSync(__dirname+'/json/consultas_SSR.json', 'utf-8'));
 	
const pacientes= JSON.parse(fs.readFileSync(__dirname+'/json/pacientes.json', 'utf-8'));
const procedimientos= JSON.parse(fs.readFileSync(__dirname+'/json/procedimientos.json', 'utf-8'));
const referencias= JSON.parse(fs.readFileSync(__dirname+'/json/referencias.json', 'utf-8'));

const iso3166= JSON.parse(fs.readFileSync(__dirname+'/json/ISO3166-1.json', 'utf-8'));

const paises= JSON.parse(fs.readFileSync(__dirname+'/json/paises.json', 'utf-8'));
const dptos= JSON.parse(fs.readFileSync(__dirname+'/json/dptos.json', 'utf-8'));
const mnpos= JSON.parse(fs.readFileSync(__dirname+'/json/mnpo.json', 'utf-8'));
const dptosv= JSON.parse(fs.readFileSync(__dirname+'/json/estadosv.json', 'utf-8'));
const mnposv= JSON.parse(fs.readFileSync(__dirname+'/json/ciudadesv.json', 'utf-8'));
 
const eapb= JSON.parse(fs.readFileSync(__dirname+'/json/eapb.json', 'utf-8'));
const puebloindigena= JSON.parse(fs.readFileSync(__dirname+'/json/puebloindigena.json', 'utf-8'));
const medicamentos= JSON.parse(fs.readFileSync(__dirname+'/json/medicamentos.json', 'utf-8'));
const listadoIps= JSON.parse(fs.readFileSync(__dirname+'/json/lista_ips.json', 'utf-8'));

const cups= JSON.parse(fs.readFileSync(__dirname+'/json/cups.json', 'utf-8'));
const cupsProcedimientos= JSON.parse(fs.readFileSync(__dirname+'/json/procedimientoscups.json', 'utf-8'));
const finalidadConsulta= JSON.parse(fs.readFileSync(__dirname+'/json/finalidad_consulta.json', 'utf-8'));
const causaExterna= JSON.parse(fs.readFileSync(__dirname+'/json/causa_externa.json', 'utf-8'));
const cie10= JSON.parse(fs.readFileSync(__dirname+'/json/cie10.json', 'utf-8'));
let listadoCIEPa=[];
let medAsigCons=[];
let ordenMedCons=[]; 
let ordenMedConsRef=[];
let ordenMedConsRefPro=[];

let listadoCIEPaPro=[];
let listadoCIEPaCompPro=[];
let ordenMedConsPro=[];

let valReg=0;
let valRegE=0;
let valRegP=0;
let valRegN=0;
let valRegA=0;
let valRegM=0;
let valRegMN=0;
let valRegG=0;
let valRegPr=0;
let valRegSR=0;
let eventosNotificarGestante=[];
let eventosNotificarGestanteCarie=[];
let eventosNotificarGestanteGienc=[];
let eventosNotificarGestantecontr=[];
let riesgoPbisocp=[];
let controlPrenCons=[];
let cantControles=0;
let examenesHemo=[];
let echoGestan=[];

let consultasServidorGestante=[];
let consultasServidorGeneral=[];
let consultasServidorEnfermeria=[];
let consultasServidorPsicologia=[];
let consultasServidorNutricional=[];
let consultasServidorAdulto=[];
let consultasServidorMenor=[];
let edadPaciente;
let dataIncontrol;

$(function	()	{
    
	$(".nombre-Usuario").html(usuario.nombres);
    self.moveTo(0,0);
    //self.resizeTo(Width="940",Height="730");
    self.resizeTo(screen.availWidth, screen.availHeight);
    console.log(localStorage.getItem('servicioAgendado'));
    console.log(localStorage.getItem('agenda'));
    console.log(localStorage.getItem('entrada'));
    if(localStorage.getItem('entrada')=='ambulatorio'){
        
        $("#Pestana-anexos").removeClass('hide'); 
        $("#Pestana-seguimientos").removeClass('hide'); 
        $("#Pestana-general").removeClass('hide'); 
        $("#Pestana-enfermeria").removeClass('hide'); 
        $("#Pestana-psicologia").removeClass('hide'); 
        $("#Pestana-nutricional").removeClass('hide'); 
        $("#Pestana-adulto").removeClass('hide'); 
        $("#Pestana-menor").removeClass('hide'); 
        $("#Pestana-prenatal").removeClass('hide');
        $("#Pestana-procedimientos").removeClass('hide'); 
        $("#Pestana-ssr").removeClass('hide');  
        $("#Pestana-menornut").removeClass('hide');  
        $("#Pestana-gesNut").removeClass('hide');  
        $("#Pestana-lactNut").removeClass('hide');  

    }else{
        if(localStorage.getItem('servicioAgendado')=='CONSULTAS Y SEGUIMIENTOS GENERAL'){
            $("#Pestana-general").removeClass('hide'); 
            
        } 
        if(localStorage.getItem('servicioAgendado')=='CONSULTAS Y SEGUIMIENTOS ENFERMERIA'){
            $("#Pestana-enfermeria").removeClass('hide'); 
            
        } 
        if(localStorage.getItem('servicioAgendado')=='CONSULTAS Y SEGUIMIENTOS PSICOLOGIA'){
            $("#Pestana-psicologia").removeClass('hide'); 
            
        } 
        if(localStorage.getItem('servicioAgendado')=='CONSULTAS Y SEGUIMIENTOS NUTRICIONAL'){
            $("#Pestana-nutricional").removeClass('hide'); 
            
        } 
        if(localStorage.getItem('servicioAgendado')=='CONSULTAS Y SEGUIMIENTOS ADULTO'){
            $("#Pestana-adulto").removeClass('hide'); 
            
        } 
        if(localStorage.getItem('servicioAgendado')=='CONSULTAS Y SEGUIMIENTOS MENOR'){
            $("#Pestana-menor").removeClass('hide'); 
            
        } 
        if(localStorage.getItem('servicioAgendado')=='CONSULTAS Y SEGUIMIENTOS PRENATAL'){
            $("#Pestana-prenatal").removeClass('hide'); 
            
        }  

    }


    console.log(paciente);
    $('#wrapper').toggleClass('sidebar-hide');
    $('.main-menu').find('.openable').removeClass('open');
    $('.main-menu').find('.submenu').removeAttr('style');
    
    $(".nombre-paciente").html(paciente.nombres+' '+paciente.papellido+' '+paciente.sapellido);
    $("#documento-paciente").html(paciente.tipoidRegPac+' - '+paciente.idRegPac);
    $("#seg-documento-paciente").html(paciente.tipoidRegPac+' - '+paciente.idRegPac);

    $("#paciente-otrodoc").html(paciente.otroDocumRep);
    $("#paciente-numotrodoc").html(paciente.otroDocumRepNum);
    $("#paciente-rumv").html(paciente.rumv);
    $("#paciente-numrumv").html(paciente.rumvNum);
    $("#paciente-PPT").html(paciente.PPT);
    $("#paciente-numPPT").html(paciente.PPTNum);
    $("#paciente-fechanac").html(paciente.fecNac);

    $("#seg-paciente-otrodoc").html(paciente.otroDocumRep);
    $("#seg-paciente-numotrodoc").html(paciente.otroDocumRepNum);
    $("#seg-paciente-rumv").html(paciente.rumv);
    $("#seg-paciente-numrumv").html(paciente.rumvNum);
    $("#seg-paciente-PPT").html(paciente.PPT);
    $("#seg-paciente-numPPT").html(paciente.PPTNum);
    $("#seg-paciente-fechanac").html(paciente.fecNac);

    var contPaises='<option></option>';
    for(var t=0;t<paises.length;t++){
        contPaises+='<option value="'+paises[t].Id+'">'+paises[t].nombre+'</option>';
    }


	$("#paisProcedencia").html(contPaises);
    
	var condptor='<option></option>';
	for(var ty=0;ty<dptos.length;ty++){
		condptor+='<option value="'+dptos[ty].Id+'">'+dptos[ty].nombre+'</option>';
	}
	$("#dptoResidencia").html(condptor);

    var conteapb='<option></option>';
	for(var ty=0;ty<eapb.length;ty++){
		conteapb+='<option value="'+eapb[ty].Id+'">'+eapb[ty].nombre+'</option>';
	} 
	$("#eapb").html(conteapb);
    var contpuebloindigena='<option value="NA" selected>NA</option>';
	for(var ty=0;ty<puebloindigena.length;ty++){
		contpuebloindigena+='<option value="'+puebloindigena[ty].Id+'">'+puebloindigena[ty].nombre+'</option>';
	} 
	$("#pueIndigena").html(contpuebloindigena);
    calcularEdad(paciente.fecNac); 
    $("#paciente-sexo").html(paciente.sexo);
    if(paciente.sexo=='F'){
        $(".sexomujer").removeClass('hide');
    }else{
        $(".sexohombre").removeClass('hide'); 
    }
    $("#paciente-estadocivil").html(paciente.estCivil); 
     
    $("#paciente-paisprocedencia").html(seleccionPais(paciente.paisProcedencia));
    $("#paciente-dptoprocedencia").html(seleccionDpto(paciente.paisProcedencia, paciente.dptoProcedencia));
    $("#paciente-mnpoprocedencia").html(seleccionMnpo(paciente.paisProcedencia, paciente.dptoProcedencia, paciente.mnpoProcedencia));
    $("#paciente-paisresidencia").html(seleccionPais(paciente.paisResidencia));
    $("#paciente-dptoresidencia").html(seleccionDpto(paciente.paisResidencia, paciente.dptoResidencia));
    $("#paciente-mnporesidencia").html(seleccionMnpo(paciente.paisResidencia, paciente.dptoResidencia, paciente.mnpoResidencia));
    $("#paciente-direccion").html(paciente.direccionResidencia);
    $("#paciente-zona").html(paciente.zonaResidencia);
    $("#paciente-telefono").html(paciente.telefono);
    
    $("#paciente-status").html(paciente.status_migratorio);
    $("#paciente-perfil").html(paciente.perfilPacie);
    $("#paciente-movilidad").html(paciente.movilidadPacie);
    $("#paciente-tipomovilidad").html(paciente.tipoMoviliPAc);
    $("#paciente-bdua").html(paciente.BDUA);
    $("#paciente-eapb").html(seleccionEAPB(paciente.eapb));
    $("#paciente-tipopoblacion").html(paciente.tipoPoblacion);
    $("#paciente-regimen").html(seleccionReg(paciente.regimen));
    $("#paciente-etnia").html(seleccionEtnia(paciente.perEtnica));
    $("#paciente-puebloindigena").html(seleccionPuebloInd(paciente.pueIndigena));

    $("#seg-paciente-sexo").html(paciente.sexo);
    $("#seg-paciente-estadocivil").html(paciente.estCivil); 
     
    $("#seg-paciente-paisprocedencia").html(seleccionPais(paciente.paisProcedencia));
    $("#seg-paciente-dptoprocedencia").html(seleccionDpto(paciente.paisProcedencia, paciente.dptoProcedencia));
    $("#seg-paciente-mnpoprocedencia").html(seleccionMnpo(paciente.paisProcedencia, paciente.dptoProcedencia, paciente.mnpoProcedencia));
    $("#seg-paciente-paisresidencia").html(seleccionPais(paciente.paisResidencia));
    $("#seg-paciente-dptoresidencia").html(seleccionDpto(paciente.paisResidencia, paciente.dptoResidencia));
    $("#seg-paciente-mnporesidencia").html(seleccionMnpo(paciente.paisResidencia, paciente.dptoResidencia, paciente.mnpoResidencia));
    $("#seg-paciente-direccion").html(paciente.direccionResidencia);
    $("#seg-paciente-zona").html(paciente.zonaResidencia);
    $("#seg-paciente-telefono").html(paciente.telefono);
    
    $("#seg-paciente-status").html(paciente.status_migratorio);
    $("#seg-paciente-perfil").html(paciente.perfilPacie);
    $("#seg-paciente-movilidad").html(paciente.movilidadPacie);
    $("#seg-paciente-tipomovilidad").html(paciente.tipoMoviliPAc);
    $("#seg-paciente-bdua").html(paciente.BDUA);
    $("#seg-paciente-eapb").html(seleccionEAPB(paciente.eapb));
    $("#seg-paciente-tipopoblacion").html(paciente.tipoPoblacion);
    $("#seg-paciente-regimen").html(seleccionReg(paciente.regimen));
    $("#seg-paciente-etnia").html(seleccionEtnia(paciente.perEtnica));
    $("#seg-paciente-puebloindigena").html(seleccionPuebloInd(paciente.pueIndigena));

    $("#numHistClin").val(paciente.tipoidRegPac+paciente.idRegPac);
    $("#tipoidRegPac").val(paciente.tipoidRegPac);
    $("#idRegPac").val(paciente.idRegPac);
    $("#otroDocumRep").val(paciente.otroDocumRep);
    $("#otroDocumRepNum").val(paciente.otroDocumRepNum);
    $("#rumv").val(paciente.rumv);
    $("#rumvNum").val(paciente.rumvNum);
    $("#PPT").val(paciente.PPT);
    $("#PPTNum").val(paciente.PPTNum);
    $("#nombres").val(paciente.nombres);
    $("#papellido").val(paciente.papellido);
    $("#sapellido").val(paciente.sapellido);
    $("#estCivil").val(paciente.estCivil);
    $("#sexo").val(paciente.sexo);
    $("#fecNac").val(paciente.fecNac);
    console.log(paciente.fecNac);
    console.log(calcularEdad(paciente.fecNac));
    $("#edad").val(calcularEdad(paciente.fecNac));
    console.log(paciente.paisProcedencia);
    $("#paisProcedencia").val(paciente.paisProcedencia);
    seleccionPaisPaciente('paisProcedencia','dptoProcedencia','mnpoProcedencia');
    $("#dptoProcedencia").val(paciente.dptoProcedencia);
    seleccionDptoPaciente('paisProcedencia','dptoProcedencia','mnpoProcedencia');
    $("#mnpoProcedencia").val(paciente.mnpoProcedencia);
    $("#PaisResidencia").val(paciente.paisResidencia);
    $("#dptoResidencia").val(paciente.dptoResidencia);
    console.log('listando munciiooi');
    console.log(paciente.paisResidencia);
    seleccionDptoPacienteResidencia();
    $("#mnpoResidencia").val(paciente.mnpoResidencia);
    $("#direccionResidencia").val(paciente.direccionResidencia);
    $("#zonaResidencia").val(paciente.zonaResidencia);
    $("#telefono").val(paciente.telefono);
    $("#OtraDireccion").val(paciente.OtraDireccion);
    $("#status_migratorio").val(paciente.status_migratorio);
    $("#perfilPacie").val(paciente.perfilPacie);
    $("#movilidadPacie").val(paciente.movilidadPacie);
    $("#tipoMoviliPAc").val(paciente.tipoMoviliPAc);
    $("#BDUA").val(paciente.BDUA);
    $("#eapb").val(seleccionEAPB(paciente.eapb));
    $("#tipoPoblacion").val(paciente.tipoPoblacion);
    $("#tiemrpoingresoColo").val(paciente.tiemrpoingresoColo);
    $("#regimen").val(paciente.regimen);
    $("#perEtnica").val(paciente.perEtnica);
    $("#pueIndigena").val(paciente.pueIndigena);
    $("#correoElec").val(paciente.correoElec);
    $("#remitidoP").val(paciente.remitidoPDesc); 
	//$('#listadoConsultasLocales').dataTable();
    var contcups='<option></option>';
    var contfinalidadConsulta='<option></option>';
    var contcausaExterna='<option></option>'; 
    
    
    
    
    
    var ssrcontcups='<option></option>';
    var MNcontcups='<option></option>';
    var contcupsPsico='<option></option>';
    var ssrcontfinalidadConsulta='<option></option>';
    var ssrcontcausaExterna='<option></option>'; 
    

    for(var r=0;r<cups.length;r++){
        contcups+='<option value="'+cups[r].Id+'">'+cups[r].Id+' - '+cups[r].descripcion+'</option>';
        if(cups[r].Id=='890201' || cups[r].Id=='890205' || cups[r].Id=='890301' || cups[r].Id=='890305'){
            ssrcontcups+='<option value="'+cups[r].Id+'">'+cups[r].Id+' - '+cups[r].descripcion+'</option>';

        }
        if(cups[r].Id=='890201' || cups[r].Id=='890206' || cups[r].Id=='890301' || cups[r].Id=='890306'){
            MNcontcups+='<option value="'+cups[r].Id+'">'+cups[r].Id+' - '+cups[r].descripcion+'</option>';

        }
        if(cups[r].Id=='890208' || cups[r].Id=='890308' ){
            contcupsPsico+='<option value="'+cups[r].Id+'">'+cups[r].Id+' - '+cups[r].descripcion+'</option>';

        }
        
    } 
    for(var r=0;r<finalidadConsulta.length;r++){
        contfinalidadConsulta+='<option value="'+finalidadConsulta[r].Id+'">'+finalidadConsulta[r].Id+' - '+finalidadConsulta[r].descrip+'</option>';
        
        if(finalidadConsulta[r].Id=='03'){
            ssrcontfinalidadConsulta+='<option value="'+finalidadConsulta[r].Id+'">'+finalidadConsulta[r].Id+' - '+finalidadConsulta[r].descrip+'</option>';
        
        }
    }
    for(var r=0;r<causaExterna.length;r++){
        contcausaExterna+='<option value="'+causaExterna[r].Id+'">'+causaExterna[r].Id+' - '+causaExterna[r].descrip+'</option>'
        
        if(causaExterna[r].Id=='15'){
            ssrcontcausaExterna+='<option value="'+causaExterna[r].Id+'">'+causaExterna[r].Id+' - '+causaExterna[r].descrip+'</option>'
        
        }
    }
    $("#NutSSRtipoConsulta").html(ssrcontcups);
    $("#MNMenortipoConsulta").html(MNcontcups);

    $("#NutSSRfinalidadConsulta").html(ssrcontfinalidadConsulta);
    $("#NutSSRcausaExternaConsulta").html(ssrcontcausaExterna);
    
    $("#tipoConsulta").html(contcups);

    $("#finalidadConsulta").html(contfinalidadConsulta);
    $("#causaExternaConsulta").html(contcausaExterna);
 

    $("#EtipoConsulta").html(contcups);
   
    $("#EfinalidadConsulta").html(contfinalidadConsulta);
    $("#EcausaExternaConsulta").html(contcausaExterna);


    $("#PtipoConsulta").html(contcupsPsico);
    
    $("#PfinalidadConsulta").html(contfinalidadConsulta);
    $("#PcausaExternaConsulta").html(contcausaExterna);

    
    $("#NtipoConsulta").html(contcups);

    $("#NfinalidadConsulta").html(contfinalidadConsulta);
    $("#NcausaExternaConsulta").html(contcausaExterna);
 

    $("#AtipoConsulta").html(contcups);

    $("#AfinalidadConsulta").html(contfinalidadConsulta);
    $("#AcausaExternaConsulta").html(contcausaExterna);

    $("#MMenortipoConsulta").html(contcups);

    $("#MMenorfinalidadConsulta").html(contfinalidadConsulta);
    $("#MMenorcausaExternaConsulta").html(contcausaExterna);
    
    var conrpsoso='<option></option>';
    for(var u=0;u<dptos.length; u++){
        conrpsoso+='<option value="'+dptos[u].Id+'">'+dptos[u].nombre+'</option>';
    }  
    $("#dptoatencion-general").html(conrpsoso); 
    $("#dptoatencion-enfermeria").html(conrpsoso); 
    $("#dptoatencion-nutricional").html(conrpsoso); 
    $("#dptoatencion-psicologia").html(conrpsoso); 
    $("#dptoatencion-menor").html(conrpsoso); 
    $("#dptoatencion-adulto").html(conrpsoso); 
    $("#dptoatencion-gestante").html(conrpsoso); 

    $("#GtipoConsulta").html(contcups);

    $("#GfinalidadConsulta").html(contfinalidadConsulta);
    $("#GcausaExternaConsulta").html(contcausaExterna);
 
    var contIps='<option></option>';
    for(var d=0;d<listadoIps.length;d++){
        contIps+='<option value="'+listadoIps[d].nombre+'">'+listadoIps[d].cod+' - '+listadoIps[d].nombre+'</option>';
    }
    $("#IpsServicioReferir").html(contIps);
    $("#IpsProcedeimientoReferir").html(contIps);
    
    $("#EIpsServicioReferir").html(contIps);
    $("#EIpsProcedeimientoReferir").html(contIps);
    
    $("#PIpsServicioReferir").html(contIps);
    $("#PIpsProcedeimientoReferir").html(contIps);
    
    $("#NIpsServicioReferir").html(contIps);
    $("#NIpsProcedeimientoReferir").html(contIps);
    
    $("#AIpsServicioReferir").html(contIps);
    $("#AIpsProcedeimientoReferir").html(contIps);
    
    $("#MIpsServicioReferir").html(contIps);
    $("#MIpsProcedeimientoReferir").html(contIps);
    
    $("#GIpsServicioReferir").html(contIps);
    $("#GIpsProcedeimientoReferir").html(contIps);

    $("#SRIpsServicioReferir").html(contIps);
    $("#SRIpsProcedeimientoReferir").html(contIps);
    //'key':'GimmidsApp'
    varDataIn={ 
        'numid_pac': paciente.idRegPac,
        'tipoid_pac': paciente.tipoidRegPac,  
        'key':'GimmidsApp'
    };
    let contconsPac='';
    
    let contconsPacLocal='';
    
    for(var q=0;q<generales.length;q++){
        if(generales[q].numid_pac==paciente.idRegPac && generales[q].tipoid_pac==paciente.tipoidRegPac){
         
          
           // var dxPAc=decodificarGimmids(generales[q].listadoCIEPa);
            //console.log(dxPAc);
            var userp=buscarUuarioConsulta(generales[q].tipoid_registra,generales[q].id_registra);
             console.log(userp);
            generales[q].nombreProfesional=userp.nombres;
            generales[q].instuser=userp.institucion;
            generales[q].diruser=userp.direccion;
            generales[q].profuser=userp.profesion;
            generales[q].regprousr=userp.reg_prof;

            contconsPacLocal+=`<tr onclick="Javascript: imprimirConsultaLocal(8,'generales',`+q+`);">
                            <td><strong>GENERALES</strong></td>
                            <td>`+generales[q].fechaConsulta+`</td>
                            <td>`+generales[q].motivoConsulta+`</td>
                            <td>`+generales[q].tipoConsulta+`</td>
                            <td>`+generales[q].finalidadConsulta+`</td>
                            <td>`+generales[q].causaExternaConsulta+`</td>
                            <td>`+generales[q].listadoCIEPa+`</td>
                            <td>`+generales[q].tipoDiagnosPrinc+`</td>
                            <td >`+userp.nombres+`</td>
                            <td ></td>
                </tr>`;
        }
    
    }
    for(var q=0;q<enfermeria.length;q++){
        if(enfermeria[q].numid_pac==paciente.idRegPac && enfermeria[q].tipoid_pac==paciente.tipoidRegPac){
         
           // var dxPAc=decodificarGimmids(enfermeria[q].listadoCIEPa);
            //console.log(dxPAc);
            var userp=buscarUuarioConsulta(enfermeria[q].tipoid_registra,enfermeria[q].id_registra);
             
            enfermeria[q].nombreProfesional=userp.nombres;
            enfermeria[q].instuser=userp.institucion;
            enfermeria[q].diruser=userp.direccion;
            enfermeria[q].profuser=userp.profesion;
            enfermeria[q].regprousr=userp.reg_prof;

            contconsPacLocal+=`<tr onclick="Javascript: imprimirConsultaLocal(9,'enfermeria',`+q+`);">
                            <td><strong>ENFERMERIA</strong></td>
                            <td>`+enfermeria[q].fechaConsulta+`</td>
                            <td>`+enfermeria[q].motivoConsulta+`</td>
                            <td>`+enfermeria[q].tipoConsulta+`</td>
                            <td>`+enfermeria[q].finalidadConsulta+`</td>
                            <td>`+enfermeria[q].causaExternaConsulta+`</td>
                            <td>`+enfermeria[q].listadoCIEPa+`</td>
                            <td>`+enfermeria[q].tipoDiagnosPrinc+`</td>
                            <td >`+userp.nombres+`</td>
                            <td ></td>
                </tr>`;
        }
    
    }
    for(var q=0;q<psicologia.length;q++){
        if(psicologia[q].numid_pac==paciente.idRegPac && psicologia[q].tipoid_pac==paciente.tipoidRegPac){
           // var dxPAc=decodificarGimmids(psicologia[q].listadoCIEPa);
            //console.log(dxPAc);
            var userp=buscarUuarioConsulta(psicologia[q].tipoid_registra,psicologia[q].id_registra);
             
            psicologia[q].nombreProfesional=userp.nombres;
            psicologia[q].instuser=userp.institucion;
            psicologia[q].diruser=userp.direccion;
            psicologia[q].profuser=userp.profesion;
            psicologia[q].regprousr=userp.reg_prof;

            contconsPacLocal+=`<tr onclick="Javascript: imprimirConsultaLocal(10,'psicologia',`+q+`);">
                            <td><strong>PSICOLOGIA</strong></td>
                            <td>`+psicologia[q].fechaConsulta+`</td>
                            <td>`+psicologia[q].motivoConsulta+`</td>
                            <td>`+psicologia[q].tipoConsulta+`</td>
                            <td>`+psicologia[q].finalidadConsulta+`</td>
                            <td>`+psicologia[q].causaExternaConsulta+`</td>
                            <td>`+psicologia[q].listadoCIEPa+`</td>
                            <td>`+psicologia[q].tipoDiagnosPrinc+`</td>
                            <td >`+userp.nombres+`</td>
                            <td ></td>
                </tr>`;
        }
    
    
    }

    for(var q=0;q<nutricional.length;q++){
        if(nutricional[q].numid_pac==paciente.idRegPac && nutricional[q].tipoid_pac==paciente.tipoidRegPac){
           // var dxPAc=decodificarGimmids(nutricional[q].listadoCIEPa);
            //console.log(dxPAc);
            var userp=buscarUuarioConsulta(nutricional[q].tipoid_registra,nutricional[q].id_registra);
             
            nutricional[q].nombreProfesional=userp.nombres;
            nutricional[q].instuser=userp.institucion;
            nutricional[q].diruser=userp.direccion;
            nutricional[q].profuser=userp.profesion;
            nutricional[q].regprousr=userp.reg_prof;

            contconsPacLocal+=`<tr onclick="Javascript: imprimirConsultaLocal(11,'nutricional',`+q+`);">
                            <td><strong>NUTRICIONAL</strong></td>
                            <td>`+nutricional[q].fechaConsulta+`</td>
                            <td>`+nutricional[q].motivoConsulta+`</td>
                            <td>`+nutricional[q].tipoConsulta+`</td>
                            <td>`+nutricional[q].finalidadConsulta+`</td>
                            <td>`+nutricional[q].causaExternaConsulta+`</td>
                            <td>`+nutricional[q].listadoCIEPa+`</td>
                            <td>`+nutricional[q].tipoDiagnosPrinc+`</td>
                            <td >`+userp.nombres+`</td>
                            <td ></td>
                </tr>`;
        }
    
    
    }
    for(var q=0;q<menor.length;q++){
        if(menor[q].numid_pac==paciente.idRegPac && menor[q].tipoid_pac==paciente.tipoidRegPac){
           // var dxPAc=decodificarGimmids(menor[q].listadoCIEPa);
            //console.log(dxPAc);
            var userp=buscarUuarioConsulta(menor[q].tipoid_registra,menor[q].id_registra);
             
            menor[q].nombreProfesional=userp.nombres;
            menor[q].instuser=userp.institucion;
            menor[q].diruser=userp.direccion;
            menor[q].profuser=userp.profesion;
            menor[q].regprousr=userp.reg_prof;

            contconsPacLocal+=`<tr onclick="Javascript: imprimirConsultaLocal(13,'menor',`+q+`);">
                            <td><strong>MENOR</strong></td>
                            <td>`+menor[q].fechaConsulta+`</td>
                            <td>`+menor[q].MenormotivoConsulta+`</td>
                            <td>`+menor[q].MenortipoConsulta+`</td>
                            <td>`+menor[q].MenorfinalidadConsulta+`</td>
                            <td>`+menor[q].MenorcausaExternaConsulta+`</td>
                            <td>`+menor[q].listadoCIEPa+`</td>
                            <td>`+menor[q].tipoDiagnosPrinc+`</td>
                            <td >`+userp.nombres+`</td>
                            <td ></td>
                </tr>`;
        }
    
    
    }

    for(var q=0;q<adulto.length;q++){
        if(adulto[q].numid_pac==paciente.idRegPac && adulto[q].tipoid_pac==paciente.tipoidRegPac){
           // var dxPAc=decodificarGimmids(adulto[q].listadoCIEPa);
            //console.log(dxPAc);
            var userp=buscarUuarioConsulta(adulto[q].tipoid_registra,adulto[q].id_registra);
             
            adulto[q].nombreProfesional=userp.nombres;
            adulto[q].instuser=userp.institucion;
            adulto[q].diruser=userp.direccion;
            adulto[q].profuser=userp.profesion;
            adulto[q].regprousr=userp.reg_prof;

            contconsPacLocal+=`<tr onclick="Javascript: imprimirConsultaLocal(12,'adulto',`+q+`);">
                            <td><strong>ADULTO</strong></td>
                            <td>`+adulto[q].fechaConsulta+`</td>
                            <td>`+adulto[q].motivoConsulta+`</td>
                            <td>`+adulto[q].tipoConsulta+`</td>
                            <td>`+adulto[q].finalidadConsulta+`</td>
                            <td>`+adulto[q].causaExternaConsulta+`</td>
                            <td>`+adulto[q].listadoCIEPa+`</td>
                            <td>`+adulto[q].tipoDiagnosPrinc+`</td>
                            <td >`+userp.nombres+`</td>
                            <td ></td>
                </tr>`;
        }
    
    
    }
    for(var q=0;q<gestante.length;q++){
        if(gestante[q].numid_pac==paciente.idRegPac && gestante[q].tipoid_pac==paciente.tipoidRegPac){
           // var dxPAc=decodificarGimmids(gestante[q].listadoCIEPa);
            //console.log(dxPAc);
            var userp=buscarUuarioConsulta(gestante[q].tipoid_registra,gestante[q].id_registra);
             
            gestante[q].nombreProfesional=userp.nombres;
            gestante[q].instuser=userp.institucion;
            gestante[q].diruser=userp.direccion;
            gestante[q].profuser=userp.profesion;
            gestante[q].regprousr=userp.reg_prof;

            contconsPacLocal+=`<tr onclick="Javascript: imprimirConsultaLocal(14,'gestante',`+q+`);">
                            <td><strong>GESTANTE</strong></td>
                            <td>`+gestante[q].fechaConsulta+`</td>
                            <td>`+gestante[q].motivoConsulta+`</td>
                            <td>`+gestante[q].tipoConsulta+`</td>
                            <td>`+gestante[q].finalidadConsulta+`</td>
                            <td>`+gestante[q].causaExternaConsulta+`</td>
                            <td>`+gestante[q].listadoCIEPa+`</td>
                            <td>`+gestante[q].tipoDiagnosPrinc+`</td>
                            <td >`+userp.nombres+`</td>
                            <td ></td>
                </tr>`;
        }
    
    
    }
    console.log(generales);


    $("#listadoConsultasLocalesBody").html(contconsPacLocal);
    
    $('#listadoConsultasLocales').dataTable();
    var Errores='';
    $.ajax({
        url: "https://saludsp.com.co/api/servicios/listarConsultasGestantesPaciente.php",
        type: "post",
        data: {'datos': varDataIn},
       async: false
    }).done(function(res){
        console.log(res);
        try {
            var data=JSON.parse(res) 
            console.log(data); 
            if (data.STATUS == 'OK') {
                consultasServidorGestante=data.DATA;
                for(var q=0;q<data.DATA.length;q++){
                   // var dxPAc=decodificarGimmids(data.DATA[q].listadoCIEPa);
                    //console.log(dxPAc);
                    contconsPac+=`<tr>
                                    <td onclick="Javascript: imprimirConsultaServer(14,'gestante',`+q+`);"><strong>GESTANTE</strong></td>
                                    <td onclick="Javascript: imprimirConsultaServer(14,'gestante',`+q+`);">`+data.DATA[q].fechaConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(14,'gestante',`+q+`);">`+data.DATA[q].motivoConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(14,'gestante',`+q+`);">`+data.DATA[q].tipoConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(14,'gestante',`+q+`);">`+data.DATA[q].finalidadConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(14,'gestante',`+q+`);">`+data.DATA[q].causaExternaConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(14,'gestante',`+q+`);">`+data.DATA[q].listadoCIEPa+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(14,'gestante',`+q+`);">`+data.DATA[q].tipoDiagnosPrinc+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(14,'gestante',`+q+`);" >`+data.DATA[q].nombreProfesional+`</td>
                                    <td ><center><button class="btn btn-info "  onclick="Javascript: modalSeguimientosz(14,'gestante',`+q+`,`+data.DATA[q].id_consulta+`);"><i class="fa fa-eye "></i></button></center></td>
                        </tr>`;

                }
                
            } else {
                console.log(data);  
                
                alert(data.ERROR +' Error al listar consultas desde el servidor');
                
                
            }


        } catch (error) {
            Errores=Errores+'\n Gestante';
        }


    } ).fail(function() { 
        Errores=Errores+'\n Gestante';
        
    });
    
    $.ajax({
        url: "https://saludsp.com.co/api/servicios/listarConsultasGeneralesPaciente.php",
        type: "post",
        data: {'datos': varDataIn},
       async: false
    }).done(function(res){
        try {
            var data=JSON.parse(res) 
            console.log(data); 
            if (data.STATUS == 'OK') {
                
                consultasServidorGeneral=data.DATA;
                for(var q=0;q<data.DATA.length;q++){
                   // var dxPAc=decodificarGimmids(data.DATA[q].listadoCIEPa);
                    //console.log(dxPAc);
                    contconsPac+=`<tr>
                                    <td><strong>GENERAL</strong></td>
                                    <td onclick="Javascript: imprimirConsultaServer(8,'generales',`+q+`);">`+data.DATA[q].fechaConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(8,'generales',`+q+`);">`+data.DATA[q].motivoConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(8,'generales',`+q+`);">`+data.DATA[q].tipoConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(8,'generales',`+q+`);">`+data.DATA[q].finalidadConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(8,'generales',`+q+`);">`+data.DATA[q].causaExternaConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(8,'generales',`+q+`);">`+data.DATA[q].listadoCIEPa+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(8,'generales',`+q+`);">`+data.DATA[q].tipoDiagnosPrinc+`</td>
                                    <td  onclick="Javascript: imprimirConsultaServer(8,'generales',`+q+`);">`+data.DATA[q].nombreProfesional+`</td>
                                    <td ><center><button class="btn btn-info "  onclick="Javascript: modalSeguimientosz(8,'generales',`+q+`,`+data.DATA[q].id_consulta+`);"><i class="fa fa-eye "></i></button></center></td>
                        </tr>`;

                }
                
            } else {
                console.log(data);  
                
                alert(data.ERROR +' Error al listar consultas desde el servidor');
                
                
            }


        } catch (error) {
            Errores=Errores+'\n General';
        }


    } ).fail(function() { 
        Errores=Errores+'\n General';
        
    });


    $.ajax({
        url: "https://saludsp.com.co/api/servicios/listarConsultasEnfermeriaPaciente.php",
        type: "post",
        data: {'datos': varDataIn},
       async: false
    }).done(function(res){ 
        try {
            var data=JSON.parse(res) 
            console.log(data); 
            if (data.STATUS == 'OK') {
                consultasServidorEnfermeria=data.DATA;
                for(var q=0;q<data.DATA.length;q++){
                   // var dxPAc=decodificarGimmids(data.DATA[q].listadoCIEPa);
                    //console.log(dxPAc);
                    contconsPac+=`<tr>
                                    <td><strong>ENFERMERIA</strong></td>
                                    <td onclick="Javascript: imprimirConsultaServer(9,'enfermeria',`+q+`);">`+data.DATA[q].fechaConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(9,'enfermeria',`+q+`);">`+data.DATA[q].motivoConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(9,'enfermeria',`+q+`);">`+data.DATA[q].tipoConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(9,'enfermeria',`+q+`);">`+data.DATA[q].finalidadConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(9,'enfermeria',`+q+`);">`+data.DATA[q].causaExternaConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(9,'enfermeria',`+q+`);">`+data.DATA[q].listadoCIEPa+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(9,'enfermeria',`+q+`);">`+data.DATA[q].tipoDiagnosPrinc+`</td>
                                    <td  onclick="Javascript: imprimirConsultaServer(9,'enfermeria',`+q+`);">`+data.DATA[q].nombreProfesional+`</td>
                                    <td ><center><button class="btn btn-info "  onclick="Javascript: modalSeguimientosz(9,'enfermeria',`+q+`,`+data.DATA[q].id_consulta+`);"><i class="fa fa-eye "></i></button></center></td>
                        </tr>`;

                }
                
            } else {
                console.log(data);  
                
                alert(data.ERROR +' Error al listar consultas desde el servidor');
                
                
            }


        } catch (error) {
            Errores=Errores+'\n Enfermeria';
        }


    } ).fail(function() { 
        Errores=Errores+'\n Enfermeria';
        
    });

    
    $.ajax({
        url: "https://saludsp.com.co/api/servicios/listarConsultasPsicologiaPaciente.php",
        type: "post",
        data: {'datos': varDataIn},
       async: false
    }).done(function(res){
        try {
            var data=JSON.parse(res) 
            console.log(data); 
            if (data.STATUS == 'OK') {
                
                consultasServidorPsicologia=data.DATA;
                for(var q=0;q<data.DATA.length;q++){
                   // var dxPAc=decodificarGimmids(data.DATA[q].listadoCIEPa);
                    //console.log(dxPAc);
                    contconsPac+=`<tr>
                                    <td><strong>PSICOLOGIA</strong></td>
                                    <td onclick="Javascript: imprimirConsultaServer(10,'psicologia',`+q+`);">`+data.DATA[q].fechaConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(10,'psicologia',`+q+`);">`+data.DATA[q].motivoConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(10,'psicologia',`+q+`);">`+data.DATA[q].tipoConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(10,'psicologia',`+q+`);">`+data.DATA[q].finalidadConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(10,'psicologia',`+q+`);">`+data.DATA[q].causaExternaConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(10,'psicologia',`+q+`);">`+data.DATA[q].listadoCIEPa+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(10,'psicologia',`+q+`);">`+data.DATA[q].tipoDiagnosPrinc+`</td>
                                    <td  onclick="Javascript: imprimirConsultaServer(10,'psicologia',`+q+`);">`+data.DATA[q].nombreProfesional+`</td>
                                    <td ><center><button class="btn btn-info "  onclick="Javascript: modalSeguimientosz(10,'psicologia',`+q+`,`+data.DATA[q].id_consulta+`);"><i class="fa fa-eye "></i></button></center></td>
                        </tr>`;

                }
                
            } else {
                console.log(data);  
                
                alert(data.ERROR +' Error al listar consultas desde el servidor');
                
                
            }


        } catch (error) {
            Errores=Errores+'\n Psicologia';
        }


    } ).fail(function() { 
        Errores=Errores+'\n Psicologia';
        
    });

    
    $.ajax({
        url: "https://saludsp.com.co/api/servicios/listarConsultasNutricionalPaciente.php",
        type: "post",
        data: {'datos': varDataIn},
       async: false
    }).done(function(res){
        try {
            var data=JSON.parse(res) 
            console.log(data); 
            if (data.STATUS == 'OK') {
                
                consultasServidorNutricional=data.DATA;
                for(var q=0;q<data.DATA.length;q++){
                   // var dxPAc=decodificarGimmids(data.DATA[q].listadoCIEPa);
                    //console.log(dxPAc);
                    contconsPac+=`<tr>
                                    <td><strong>NUTRICIONAL</strong></td>
                                    <td onclick="Javascript: imprimirConsultaServer(11,'nutricional',`+q+`);">`+data.DATA[q].fechaConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(11,'nutricional',`+q+`);">`+data.DATA[q].motivoConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(11,'nutricional',`+q+`);">`+data.DATA[q].tipoConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(11,'nutricional',`+q+`);">`+data.DATA[q].finalidadConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(11,'nutricional',`+q+`);">`+data.DATA[q].causaExternaConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(11,'nutricional',`+q+`);">`+data.DATA[q].listadoCIEPa+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(11,'nutricional',`+q+`);">`+data.DATA[q].tipoDiagnosPrinc+`</td>
                                    <td  onclick="Javascript: imprimirConsultaServer(11,'nutricional',`+q+`);">`+data.DATA[q].nombreProfesional+`</td>
                                    <td ><center><button class="btn btn-info "  onclick="Javascript: modalSeguimientosz(11,'nutricional',`+q+`,`+data.DATA[q].id_consulta+`);"><i class="fa fa-eye "></i></button></center></td>
                        </tr>`;

                }
                
            } else {
                console.log(data);  
                
                alert(data.ERROR +' Error al listar consultas desde el servidor');
                
                
            }


        } catch (error) {
            Errores=Errores+'\n Nutricional';
        }


    } ).fail(function() { 
        Errores=Errores+'\n Nutricional';
        
    });

    
    $.ajax({
        url: "https://saludsp.com.co/api/servicios/listarConsultasAdultoPaciente.php",
        type: "post",
        data: {'datos': varDataIn},
       async: false
    }).done(function(res){ 
        console.log(res);
        try {
            var data=JSON.parse(res) 
            console.log(data); 
            if (data.STATUS == 'OK') {
                
                consultasServidorAdulto=data.DATA;
                for(var q=0;q<data.DATA.length;q++){
                   // var dxPAc=decodificarGimmids(data.DATA[q].listadoCIEPa);
                    //console.log(dxPAc);
                    contconsPac+=`<tr>
                                    <td><strong>ADULTO</strong></td>
                                    <td onclick="Javascript: imprimirConsultaServer(12,'adulto',`+q+`);">`+data.DATA[q].fechaConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(12,'adulto',`+q+`);">`+data.DATA[q].motivoConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(12,'adulto',`+q+`);">`+data.DATA[q].tipoConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(12,'adulto',`+q+`);">`+data.DATA[q].finalidadConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(12,'adulto',`+q+`);">`+data.DATA[q].causaExternaConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(12,'adulto',`+q+`);">`+data.DATA[q].listadoCIEPa+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(12,'adulto',`+q+`);">`+data.DATA[q].tipoDiagnosPrinc+`</td>
                                    <td  onclick="Javascript: imprimirConsultaServer(12,'adulto',`+q+`);">`+data.DATA[q].nombreProfesional+`</td>
                                    <td ><center><button class="btn btn-info "  onclick="Javascript: modalSeguimientosz(12,'adulto',`+q+`,`+data.DATA[q].id_consulta+`);"><i class="fa fa-eye "></i></button></center></td>
                        </tr>`;

                }
                
            } else {
                console.log(data);  
                
                alert(data.ERROR +' Error al listar consultas desde el servidor');
                
                
            }


        } catch (error) {
            Errores=Errores+'\n Adulto';
        }


    } ).fail(function() { 
        Errores=Errores+'\n Adulto';
        
    });

    
    $.ajax({
        url: "https://saludsp.com.co/api/servicios/listarConsultasMenorPaciente.php",
        type: "post",
        data: {'datos': varDataIn},
       async: false
    }).done(function(res){
        try {
            var data=JSON.parse(res) 
            console.log(data); 
            if (data.STATUS == 'OK') {
                
                consultasServidorMenor=data.DATA;
                for(var q=0;q<data.DATA.length;q++){
                   // var dxPAc=decodificarGimmids(data.DATA[q].listadoCIEPa);
                    //console.log(dxPAc);
                    contconsPac+=`<tr>
                                    <td><strong>MENOR</strong></td>
                                    <td onclick="Javascript: imprimirConsultaServer(13,'menor',`+q+`);">`+data.DATA[q].fechaConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(13,'menor',`+q+`);">`+data.DATA[q].MenormotivoConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(13,'menor',`+q+`);">`+data.DATA[q].MenortipoConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(13,'menor',`+q+`);">`+data.DATA[q].MenorfinalidadConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(13,'menor',`+q+`);">`+data.DATA[q].MenorcausaExternaConsulta+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(13,'menor',`+q+`);">`+data.DATA[q].listadoCIEPa+`</td>
                                    <td onclick="Javascript: imprimirConsultaServer(13,'menor',`+q+`);">`+data.DATA[q].tipoDiagnosPrinc+`</td>
                                    <td  onclick="Javascript: imprimirConsultaServer(13,'menor',`+q+`);">`+data.DATA[q].nombreProfesional+`</td>
                                    <td ><center><button class="btn btn-info "  onclick="Javascript: modalSeguimientosz(13,'menor',`+q+`,`+data.DATA[q].id_consulta+`);"><i class="fa fa-eye "></i></button></center></td>
                        </tr>`;

                }
                
            } else {
                console.log(data);  
                
                alert(data.ERROR +' Error al listar consultas desde el servidor');
                
                
            }


        } catch (error) {
            Errores=Errores+'\n Menor';
        }


    } ).fail(function() { 
        Errores=Errores+'\n Menor';
        
    });

    $("#listadoConsultasServidorBody").html(contconsPac);
    
    $('#listadoConsultasServidor').dataTable();

    //LISTADO D EPORCEIMIENTOSS

    var contProPacLocal='';
    var contProPacServer='';
    for(var q=0;q<procedimientos.length;q++){
        if(procedimientos[q].numDocpPaci==paciente.idRegPac && procedimientos[q].tipodocupacie==paciente.tipoidRegPac){
        // var dxPAc=decodificarGimmids(procedimientos[q].listadoCIEPa);
            //console.log(dxPAc);
            
            contProPacLocal+=`<tr onclick="Javascript: imprimirProcedimientoBase(`+q+`, 'local');"> 
                            <td>`+procedimientos[q].fechaProce+`</td>
                            <td>`+procedimientos[q].cieIngCon+`</td>
                            <td>`+procedimientos[q].cieIngConComp+`</td>
                            <td>`+procedimientos[q].AmbreaProc+`</td>
                            <td>`+procedimientos[q].FinaProc+`</td>
                            <td>`+procedimientos[q].formReaAcQ+`</td>
                            <td>`+procedimientos[q].ordenesIngCon+`</td>
                            <td>`+procedimientos[q].perfilPersonat+`</td>
                            <td>`+procedimientos[q].nombrePersonAtien+`</td> 
                             
                </tr>`;
        }
    
    
    } 
    $("#listadoProcedimientosLocalesBody").html(contProPacLocal);

    $('#listadoProcedimientosLocales').dataTable();


    
    $.ajax({
        url: "https://saludsp.com.co/api/servicios/listarProcedimientosPaciente.php",
        type: "post",
        data: {'datos': varDataIn},
        async:false
    }).done(function(res){
        console.log(res);
        console.log("Respuesta: "); 
        try {
            var data=JSON.parse(res);
            console.log(data);  
            if (data.STATUS == 'OK') {
                for(var q=0;q<data.DATA.length;q++){
                    if(data.DATA[q].numDocpPaci==paciente.idRegPac && data.DATA[q].tipodocupacie==paciente.tipoidRegPac){
                      
                        contProPacServer+=`<tr onclick="Javascript: imprimirProcedimientoBase(`+data.DATA[q].id_procedimiento+`, 'server');"> 
                                        <td>`+data.DATA[q].fechaProce+`</td>
                                        <td>`+data.DATA[q].cieIngCon+`</td>
                                        <td>`+data.DATA[q].cieIngConComp+`</td>
                                        <td>`+data.DATA[q].AmbreaProc+`</td>
                                        <td>`+data.DATA[q].FinaProc+`</td>
                                        <td>`+data.DATA[q].formReaAcQ+`</td>
                                        <td>`+data.DATA[q].ordenesIngCon+`</td>
                                        <td>`+data.DATA[q].perfilPersonat+`</td>
                                        <td>`+data.DATA[q].nombrePersonAtien+`</td> 
                                         
                            </tr>`;
                    }
                
                
                } 
                
                $("#listadoProcedimientosServidorBody").html(contProPacServer);
                
                $('#listadoProcedimientosServidor').dataTable();
              
            } else {
                console.log(data);  
                
                alert(data.ERROR);
                
                
            }


        } catch (error) {
            console.log(error);
        }


    } ).fail(function() { 
        Errores=Errores+'\n Procedimientos';
       
         
         
    });

    
    if(Errores!=''){
        alert('Error al listar las siguientes consultas desde el servidor:\n'+Errores);
    }
});

function seleccionSSR(){
    if($("#NutSSRtipoConsulta").val()=='890201' || $("#NutSSRtipoConsulta").val()=='890205' ){
        $("#ssrEnfer").removeClass('hide');
        $("#ssrMedicina").addClass('hide');
    }else{
        $("#ssrMedicina").removeClass('hide');
        $("#ssrEnfer").addClass('hide');

    }
}

function buscarUuario(tipo, id){
    console.log(tipo);
    console.log(id);
    for(var m=0;m<usuarios.length;m++){
        console.log(usuarios[m]);
        if(usuarios[m].tipoid==tipo && usuarios[m].numid==id){
            console.log(usuarios[m]);
            return usuarios[m].nombres;
        }

    }
    return '';
}
function buscarUuarioConsulta(tipo, id){
    console.log(tipo);
    console.log(id);
    for(var m=0;m<usuarios.length;m++){
        console.log(usuarios[m]);
        if(usuarios[m].tipoid==tipo && usuarios[m].numid==id){
            console.log(usuarios[m]);
            return usuarios[m];
        }

    }
    return '';
}
function cargarProcedimiento(){
    if(valRegPr==0){
        var content='';
        var contentcomp='';
        for (var i = 0; i < cie10.length; i++) {


            content += '<tr    >'
        
            +
            '<td  >' + cie10[i].cod + '</td>' +
                '<td >' + cie10[i].descripcion + '</td>' +
                '<td><a title="Agregar" class="btn btn-success" style="font-size:20px;" onclick="Javascript: adjuntarCieProcedimientodx(`' + cie10[i].cod + '`,`' + cie10[i].descripcion + '`,`consulta`);">></a></td>'
        
            +
            '</tr>';
            contentcomp += '<tr  >'
        
            +
            '<td  >' + cie10[i].cod + '</td>' +
                '<td >' + cie10[i].descripcion + '</td>' +
                '<td><a title="Agregar" class="btn btn-success" style="font-size:20px;" onclick="Javascript: adjuntarCieProcedimientoCompl(`' + cie10[i].cod + '`,`' + cie10[i].descripcion + '`,`consulta`);">></a></td>'
        
            +
            '</tr>';
            ////console.log(data.DATA[i]);
        }
        var contcupsTabla='';
        for(var i=0;i<cupsProcedimientos.length;i++){
            contcupsTabla+= '<tr    onclick="Javascript: adjuntarProcedimeintoPro(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                               '<td >' + cupsProcedimientos[i].cups + '</td>' +
                               '<td >' + cupsProcedimientos[i].desc + '</td>'+
                           '</tr>';
            
                            
                            
    
        }


        $("#ProTablaListCie10").html(content);
        $("#ProTablaListCie10Com").html(contentcomp);
        $("#ProTablaListProceAdultos").html(contcupsTabla);
        $('#ProtableLCie').dataTable();
        $('#ProtableLCieCom').dataTable();
        $('#ProtableLProceAdultos').dataTable();
        if(usuario.profesion=='1'){
            $("#perfilPersonat").val('1 - Medico Especialista');
        }
        if(usuario.profesion=='2'){
            $("#perfilPersonat").val('2 - Medico General');
        }
        if(usuario.profesion=='3'){
            $("#perfilPersonat").val('3 - Enfermero');
        }
        if(usuario.profesion=='4'){
            $("#perfilPersonat").val('4 - Auxiliar de Enfermeria');
        }
        if(usuario.profesion=='5'){
            $("#perfilPersonat").val('5 - Otro');
        }
        valRegPr=1;
    }
    
                
}
function cargarConsultaGeneral(){
    if(valReg==0){
        var contcupsTabla='';
        var contcupsTablaProcedi = '';
        var contcupsTablaProcediRef = '';
        var contcie10='';
        var contMedi='';
       
        for(var i=0;i<cupsProcedimientos.length;i++){
            contcupsTabla+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoRef(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                               '<td >' + cupsProcedimientos[i].cups + '</td>' +
                               '<td >' + cupsProcedimientos[i].desc + '</td>'+
                           '</tr>';
            contcupsTablaProcedi+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeinto(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>';
            contcupsTablaProcediRef+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoRefPro(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>';
                            
                            
    
        }
    
        $("#TablaListProceAdultos").html(contcupsTablaProcedi);
        $("#TablaListProceAdultosRef").html(contcupsTabla);
        $("#TablaListProceAdultosRefPro").html(contcupsTablaProcediRef);
        
        $('#tableLProceAdultos').dataTable();
        $('#tableLProceAdultosRef').dataTable();
        $('#tableLProceAdultosRefPro').dataTable();
        
        for(var t=0;t<cie10.length;t++){
            contcie10+='<tr>'
                        +'<td>'+cie10[t].cod+'</td>'
                        +'<td>'+cie10[t].descripcion+'</td>'
                        +'<td><a class="btn btn-success btn-sm" style="font-size:20px;" onclick="Javascript: adjuntarCie(`'+cie10[t].cod+'`,`'+cie10[t].descripcion+'`, `consulta`);">></a></td>'
                    +'</tr>'; 
        }
        
        $("#TablaListCie10").html(contcie10);
        $('#tableLCie').dataTable();
    
        
        for(var t=0;t<medicamentos.length;t++){
            contMedi+='<tr onclick="Javascript: seleccionarMedicamentoConsulta(`' + medicamentos[t].nombre + '`);">'
                        +'<td>'+medicamentos[t].Id+'</td>'
                        +'<td>'+medicamentos[t].nombre+'</td>'
                        +'</tr>';
           
        }
        $("#TablaListmed_cons").html(contMedi);
        $('#med_cons').dataTable();
        valReg=1;
    }
    

}
function cargarConsultaEnfermeria(){

    if(valRegE==0){
        var EcontcupsTabla='';
        var EcontcupsTablaProcedi = '';
        var EcontcupsTablaProcediRef = '';
        var Econtcie10='';
        var EcontMedi='';
        
        for(var i=0;i<cupsProcedimientos.length;i++){
            EcontcupsTabla+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoRefE(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                               '<td >' + cupsProcedimientos[i].cups + '</td>' +
                               '<td >' + cupsProcedimientos[i].desc + '</td>'+
                           '</tr>';
            EcontcupsTablaProcedi+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoE(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>';
            EcontcupsTablaProcediRef+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoRefProE(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>'; 
        }
        $("#ETablaListProceAdultos").html(EcontcupsTablaProcedi);
        $("#ETablaListProceAdultosRef").html(EcontcupsTabla);
        $("#ETablaListProceAdultosRefPro").html(EcontcupsTablaProcediRef);
        $('#EtableLProceAdultos').dataTable();
        $('#EtableLProceAdultosRef').dataTable();
        $('#EtableLProceAdultosRefPro').dataTable();
    
        for(var t=0;t<cie10.length;t++){
            Econtcie10+='<tr>'
                +'<td>'+cie10[t].cod+'</td>'
                +'<td>'+cie10[t].descripcion+'</td>'
                +'<td><a class="btn btn-success btn-sm" style="font-size:20px;" onclick="Javascript: adjuntarCieE(`'+cie10[t].cod+'`,`'+cie10[t].descripcion+'`, `consulta`);">></a></td>'
            +'</tr>';
    
        }
        $("#ETablaListCie10").html(Econtcie10);
        $('#EtableLCie').dataTable();
    
        
        for(var t=0;t<medicamentos.length;t++){
            EcontMedi+='<tr onclick="Javascript: seleccionarMedicamentoConsultaE(`' + medicamentos[t].nombre + '`);">'
                        +'<td>'+medicamentos[t].Id+'</td>'
                        +'<td>'+medicamentos[t].nombre+'</td>'
                        +'</tr>';
        }
    
        $("#ETablaListmed_cons").html(EcontMedi);
        $('#Emed_cons').dataTable();
        valRegE=1;
        
    }

   
}
function cargarConsultaPsicologia(){
    if(valRegP==0){
        var PcontcupsTabla='';
        var PcontcupsTablaProcedi = '';
        var PcontcupsTablaProcediRef = '';
        var Pcontcie10='';
        var PcontMedi='';
        
        
        for(var i=0;i<cupsProcedimientos.length;i++){
            PcontcupsTabla+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoRefP(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                               '<td >' + cupsProcedimientos[i].cups + '</td>' +
                               '<td >' + cupsProcedimientos[i].desc + '</td>'+
                           '</tr>';
            PcontcupsTablaProcedi+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoP(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>';
            PcontcupsTablaProcediRef+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoRefProP(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>';      
    
        }
        $("#PTablaListProceAdultos").html(PcontcupsTablaProcedi);
        $("#PTablaListProceAdultosRef").html(PcontcupsTabla);
        $("#PTablaListProceAdultosRefPro").html(PcontcupsTablaProcediRef);
        $('#PtableLProceAdultos').dataTable();
        $('#PtableLProceAdultosRef').dataTable();
        $('#PtableLProceAdultosRefPro').dataTable();
    
        for(var t=0;t<cie10.length;t++){
            Pcontcie10+='<tr>'
                +'<td>'+cie10[t].cod+'</td>'
                +'<td>'+cie10[t].descripcion+'</td>'
                +'<td><a class="btn btn-success btn-sm" style="font-size:20px;" onclick="Javascript: adjuntarCieP(`'+cie10[t].cod+'`,`'+cie10[t].descripcion+'`, `consulta`);">></a></td>'
            +'</tr>';
    
        }
        $("#PTablaListCie10").html(Pcontcie10);
        $('#PtableLCie').dataTable();
        
        for(var t=0;t<medicamentos.length;t++){
            PcontMedi+='<tr onclick="Javascript: seleccionarMedicamentoConsultaP(`' + medicamentos[t].nombre + '`);">'
                        +'<td>'+medicamentos[t].Id+'</td>'
                        +'<td>'+medicamentos[t].nombre+'</td>'
                        +'</tr>';
           
        }
        $("#PTablaListmed_cons").html(PcontMedi);
        $('#Pmed_cons').dataTable();
        valRegP=1;
    }
    var contdp='<option></option>';
    for(var u=0;u<dptos.length; u++){
        contdp+='<option value="'+dptos[u].Id+'">'+dptos[u].nombre+'</option>';
    } 
    $("#psicoDptoAtencion").html(contdp);
   
}
function cargarConsultaNutricional(){
    if(valRegN==0){
        var NcontcupsTabla='';
        var NcontcupsTablaProcedi = '';
        var NcontcupsTablaProcediRef = '';
        var Ncontcie10='';
        var NcontMedi='';
       
        for(var i=0;i<cupsProcedimientos.length;i++){
            NcontcupsTabla+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoRefN(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                               '<td >' + cupsProcedimientos[i].cups + '</td>' +
                               '<td >' + cupsProcedimientos[i].desc + '</td>'+
                           '</tr>';
            NcontcupsTablaProcedi+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoN(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>';
            NcontcupsTablaProcediRef+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoRefProN(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>'; 
        }
        $("#NTablaListProceAdultos").html(NcontcupsTablaProcedi);
        $("#NTablaListProceAdultosRef").html(NcontcupsTabla);
        $("#NTablaListProceAdultosRefPro").html(NcontcupsTablaProcediRef);
        $('#NtableLProceAdultos').dataTable();
        $('#NtableLProceAdultosRef').dataTable();
        $('#NtableLProceAdultosRefPro').dataTable();
    
        for(var t=0;t<cie10.length;t++){
            Ncontcie10+='<tr>'
                        +'<td>'+cie10[t].cod+'</td>'
                        +'<td>'+cie10[t].descripcion+'</td>'
                        +'<td><a class="btn btn-success btn-sm" style="font-size:20px;" onclick="Javascript: adjuntarCieN(`'+cie10[t].cod+'`,`'+cie10[t].descripcion+'`, `consulta`);">></a></td>'
                    +'</tr>';
            
        }
        $("#NTablaListCie10").html(Ncontcie10);
        $('#NtableLCie').dataTable();
        
        for(var t=0;t<medicamentos.length;t++){
            NcontMedi+='<tr onclick="Javascript: seleccionarMedicamentoConsultaN(`' + medicamentos[t].nombre + '`);">'
                        +'<td>'+medicamentos[t].Id+'</td>'
                        +'<td>'+medicamentos[t].nombre+'</td>'
                        +'</tr>';
           
        }
        $("#NTablaListmed_cons").html(NcontMedi);
        $('#Nmed_cons').dataTable();
        valRegN=1;
    }
    
}
function cargarConsultaAdulto(){

    if(valRegA==0){
        var AcontcupsTabla='';
        var AcontcupsTablaProcedi = '';
        var AcontcupsTablaProcediRef = '';
        var Acontcie10='';
        var AcontMedi='';
        
        for(var i=0;i<cupsProcedimientos.length;i++){
            AcontcupsTabla+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoRefA(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                               '<td >' + cupsProcedimientos[i].cups + '</td>' +
                               '<td >' + cupsProcedimientos[i].desc + '</td>'+
                           '</tr>';
            AcontcupsTablaProcedi+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoA(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>';
            AcontcupsTablaProcediRef+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoRefProA(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>'; 
    
        }
        $("#ATablaListProceAdultos").html(AcontcupsTablaProcedi);
        $("#ATablaListProceAdultosRef").html(AcontcupsTabla);
        $("#ATablaListProceAdultosRefPro").html(AcontcupsTablaProcediRef);
        $('#AtableLProceAdultos').dataTable();
        $('#AtableLProceAdultosRef').dataTable();
        $('#AtableLProceAdultosRefPro').dataTable();
    
        for(var t=0;t<cie10.length;t++){
            Acontcie10+='<tr>'
                        +'<td>'+cie10[t].cod+'</td>'
                        +'<td>'+cie10[t].descripcion+'</td>'
                        +'<td><a class="btn btn-success btn-sm" style="font-size:20px;" onclick="Javascript: adjuntarCieA(`'+cie10[t].cod+'`,`'+cie10[t].descripcion+'`, `consulta`);">></a></td>'
                    +'</tr>';
            
        }
        $("#ATablaListCie10").html(Acontcie10);
        $('#AtableLCie').dataTable();
        
        for(var t=0;t<medicamentos.length;t++){
            AcontMedi+='<tr onclick="Javascript: seleccionarMedicamentoConsultaA(`' + medicamentos[t].nombre + '`);">'
                        +'<td>'+medicamentos[t].Id+'</td>'
                        +'<td>'+medicamentos[t].nombre+'</td>'
                        +'</tr>';
           
        }
        $("#ATablaListmed_cons").html(AcontMedi);
        $('#Amed_cons').dataTable();
        valRegA=1;
    }
    
}
function cargarConsultaMenor(){

    if(valRegM==0){
        var McontcupsTabla='';
        var McontcupsTablaProcedi = '';
        var McontcupsTablaProcediRef = '';
        var Mcontcie10='';
        var McontMedi='';
        
        for(var i=0;i<cupsProcedimientos.length;i++){
            McontcupsTabla+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoRefM(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                               '<td >' + cupsProcedimientos[i].cups + '</td>' +
                               '<td >' + cupsProcedimientos[i].desc + '</td>'+
                           '</tr>';
            McontcupsTablaProcedi+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoM(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>';
            McontcupsTablaProcediRef+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoRefProM(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>'; 
    
        }
        $("#MTablaListProceAdultos").html(McontcupsTablaProcedi);
        $("#MTablaListProceAdultosRef").html(McontcupsTabla);
        $("#MTablaListProceAdultosRefPro").html(McontcupsTablaProcediRef);
        $('#MtableLProceAdultos').dataTable();
        $('#MtableLProceAdultosRef').dataTable();
        $('#MtableLProceAdultosRefPro').dataTable();
        
        for(var t=0;t<cie10.length;t++){
            Mcontcie10+='<tr>'
                    +'<td>'+cie10[t].cod+'</td>'
                    +'<td>'+cie10[t].descripcion+'</td>'
                    +'<td><a class="btn btn-success btn-sm" style="font-size:20px;" onclick="Javascript: adjuntarCieM(`'+cie10[t].cod+'`,`'+cie10[t].descripcion+'`, `consulta`);">></a></td>'
                +'</tr>';
    
        }
        $("#MTablaListCie10").html(Mcontcie10);
        $('#MtableLCie').dataTable();
        
        for(var t=0;t<medicamentos.length;t++){
            McontMedi+='<tr onclick="Javascript: seleccionarMedicamentoConsultaM(`' + medicamentos[t].nombre + '`);">'
                        +'<td>'+medicamentos[t].Id+'</td>'
                        +'<td>'+medicamentos[t].nombre+'</td>'
                        +'</tr>';
           
        }
        $("#MTablaListmed_cons").html(McontMedi);
        $('#Mmed_cons').dataTable();
        valRegM=1;
    }
    

}
function cargarConsultaGestante(){
    
    if(valRegG==0){
        
        var GcontcupsTabla='';
        var GcontcupsTablaProcedi = '';
        var GcontcupsTablaProcediRef = '';
        var Gcontcie10='';
        var GcontMedi='';
        
        for(var i=0;i<cupsProcedimientos.length;i++){
            GcontcupsTabla+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoRefG(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>';
            GcontcupsTablaProcedi+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoG(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>';
            GcontcupsTablaProcediRef+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoRefProG(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>';
        }
        $("#GTablaListProceAdultos").html(GcontcupsTablaProcedi);
        $("#GTablaListProceAdultosRef").html(GcontcupsTabla);
        $("#GTablaListProceAdultosRefPro").html(GcontcupsTablaProcediRef);
        $('#GtableLProceAdultos').dataTable();
        $('#GtableLProceAdultosRef').dataTable();
        $('#GtableLProceAdultosRefPro').dataTable();
        
        for(var t=0;t<cie10.length;t++){
            Gcontcie10+='<tr>'
                        +'<td>'+cie10[t].cod+'</td>'
                        +'<td>'+cie10[t].descripcion+'</td>'
                        +'<td><a class="btn btn-success btn-sm" style="font-size:20px;" onclick="Javascript: adjuntarCieG(`'+cie10[t].cod+'`,`'+cie10[t].descripcion+'`, `consulta`);">></a></td>'
                    +'</tr>';
        }
        $("#GTablaListCie10").html(Gcontcie10);
        $('#GtableLCie').dataTable();

        
        for(var t=0;t<medicamentos.length;t++){
            GcontMedi+='<tr onclick="Javascript: seleccionarMedicamentoConsultaG(`' + medicamentos[t].nombre + '`);">'
                        +'<td>'+medicamentos[t].Id+'</td>'
                        +'<td>'+medicamentos[t].nombre+'</td>'
                        +'</tr>';
        
        }
        $("#GTablaListmed_cons").html(GcontMedi);
        $('#Gmed_cons').dataTable();

        valRegG=1;
        $("#examenFisico-firma").html(usuario.profesion);

        var gestantePacient=[];
        for(var i=0;i<gestante.length;i++){
            if(gestante[i].tipoid_pac==paciente.tipoidRegPac && gestante[i].numid_pac==paciente.idRegPac){
                gestantePacient.push(gestante[i]);
            }
        } 
        
        varDataIn={ 
            'numid_pac': paciente.idRegPac,
            'tipoid_pac': paciente.tipoidRegPac,  
            'key':'GimmidsApp'
        };

        
        console.log(gestantePacient.length);
        $.ajax({
            url: "https://saludsp.com.co/api/servicios/listarConsultasGestantesPaciente.php",
            type: "post",
            data: {'datos': varDataIn},
            async:false
        }).done(function(res){ 
            try {
                var data=JSON.parse(res) 
                if (data.STATUS == 'OK') {
                    for(var t=0;t<data.DATA.length;t++){ 
                        var consID=0;
                        for(var y=00;y<gestantePacient.length;y++){
                            if(data.DATA[t].id_consulta==gestantePacient[y].id_consulta){
                                consID=1;
                            }
                        }
                        if(consID==0){
                            gestantePacient.push(data.DATA[t]);
                        }
                    }
                } else {
                    console.log(data);  
                    
                    alert(data.ERROR +' Error al listar consultas desde el servidor');
                    
                    
                }
    
    
            } catch (error) {
                console.log(error);
               alert('Error al listar consultas desde el servidor');
            }
    
    
        } ).fail(function() { 
            alert('Error al listar consultas desde el servidor');
        });
        console.log(gestantePacient);
        
        var gestantePacientFinal=[];

        if(gestantePacient.length>0){
            for(var u=0;u<gestantePacient.length;u++){
                console.log(gestantePacient[u].fechaConsulta);
                
                var tiempo=calcularTiempoGests(gestantePacient[u].fechaConsulta);
                console.log(tiempo);
                if(tiempo.anos==0 && tiempo.meses<9){
                    gestantePacientFinal.push(gestantePacient[u]);
                }
    
            }
            console.log(gestantePacientFinal.length);
            console.log(gestantePacientFinal[gestantePacientFinal.length-1]);
            
            $("#GGestanteAntMedicamentosCuales").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntMedicamentosCuales);
            $("#GGestanteAntAlergiassCuales").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntAlergiassCuales);
            $("#GGestanteAntExpoToxicosCuales").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntExpoToxicosCuales);
            $("#GGestanteAntVecesCepilla").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntVecesCepilla);
            $("#otroHabitorhigioral_desc").val(gestantePacientFinal[gestantePacientFinal.length-1].otroHabitorhigioral_desc);
            $("#GGestanteAntFechaUConsO").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntFechaUConsO);
            $("#GGestanteAntEdadMenarquia").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntEdadMenarquia);
            $("#GGestanteSexarquia").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteSexarquia);
            $("#GGestanteAntFechaFum").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntFechaFum);
            $("#GGestanteAntPatronCicloI").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntPatronCicloI);
            $("#GGestanteAntPatronCicloII").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntPatronCicloII);
            $("#GGestanteAntFEchaUltParto").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntFEchaUltParto);
            $("#GGestanteAntFechaFPP").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntFechaFPP);
            $("#GGestanteAntTtoInfertilidadGTipo").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntTtoInfertilidadGTipo);
            $("#GGestanteAntMetodoPlanifica").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntMetodoPlanifica);
            $("#GGestanteAntFechaSusMetodoPlan").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntFechaSusMetodoPlan);
            $("#GGestanteAntGineG").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntGineG);
            $("#GGestanteAntGineP").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntGineP);
            $("#GGestanteAntGineC").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntGineC);
            $("#GGestanteAntGineA").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntGineA);
            $("#GGestanteAntGineE").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntGineE);
            $("#GGestanteAntGineV").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntGineV);
            $("#GGestanteAntGineM").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntGineM);
            $("#GGestanteAntObservaObst").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntObservaObst);
            $("#GGestanteAntLeucorreasDescr").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntLeucorreasDescr);
            $("#GGestanteAntETS").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntETS);
            $("#GGestanteAntFechaCITOLOGIAUtl").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntFechaCITOLOGIAUtl);
            $("#GGestanteAntPerioINTERGENESICO").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntPerioINTERGENESICO);
            $("#GGestanteAntRCIU").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntRCIU);
            $("#GGestanteAntEmbaraMultipleDesc").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntEmbaraMultipleDesc);
            $("#GGestanteAntMALFORMACIONES").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntMALFORMACIONES);
            $("#GGestanteAntGineOtrosCuales").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntGineOtrosCuales);
            $("#GGestanteAntAmenazaAborto").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntAmenazaAborto);
            $("#GGestanteAntMuertePerinatalCausa").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntMuertePerinatalCausa);
            $("#GcausaCesareasAnt").val(gestantePacientFinal[gestantePacientFinal.length-1].GcausaCesareasAnt);
            $("#GGestanteAntOtrosFamiliaresCuales").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntOtrosFamiliaresCuales);
            $("#GBiopEdad").val(gestantePacientFinal[gestantePacientFinal.length-1].BiopEdad);
            $("#GBioPari").val(gestantePacientFinal[gestantePacientFinal.length-1].BioPari);
            console.log(convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntDiabetes));
            
            $("input[name=GGestanteAntDiabetes][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntDiabetes+"']").prop('checked', true);
            $("input[name=GGestanteAntHipertensionArterial][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntHipertensionArterial+"']").prop('checked', true);
            $("input[name=GGestanteAntCirugiaPelvica][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntCirugiaPelvica+"']").prop('checked', true);
            $("input[name=GGestanteAntOtrasCirugias][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntOtrasCirugias+"']").prop('checked', true);
            $("input[name=GGestanteAntPreeclamsia][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntPreeclamsia+"']").prop('checked', true);
            $("input[name=GGestanteAntEclamsia][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntEclamsia+"']").prop('checked', true);
            $("input[name=GGestanteAntFactorRH][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntFactorRH+"']").prop('checked', true);
            $("input[name=GGestanteAntTransfusiones][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntTransfusiones+"']").prop('checked', true);
            $("input[name=GGestanteAntAltTiroideas][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntAltTiroideas+"']").prop('checked', true);
            $("input[name=GGestanteAntNutiPrevDefic][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntNutiPrevDefic+"']").prop('checked', true);
            $("input[name=GGestanteAntEnfRenalCronica][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntEnfRenalCronica+"']").prop('checked', true);
            $("input[name=GGestanteAntTtoInfertilidad][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntTtoInfertilidad+"']").prop('checked', true);
            $("input[name=GGestanteAntDifLactancia][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntDifLactancia+"']").prop('checked', true);
            $("input[name=GGestanteAntAlergias][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntAlergias+"']").prop('checked', true);
            $("input[name=GGestanteAntTraumaticos][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntTraumaticos+"']").prop('checked', true);
            $("input[name=GGestanteAntOtrasTBC][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntOtrasTBC+"']").prop('checked', true);
            $("input[name=GGestanteAntPsicofarm][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntPsicofarm+"']").prop('checked', true);
            $("input[name=GGestanteAntOtrasCigarrilloAlcohol][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntOtrasCigarrilloAlcohol+"']").prop('checked', true);
            $("input[name=GGestanteAnIrradiacion][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAnIrradiacion+"']").prop('checked', true);
            $("input[name=GGestanteVIHSIDA][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteVIHSIDA+"']").prop('checked', true);
            $("input[name=GGestanteAntExpoToxicos][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntExpoToxicos+"']").prop('checked', true);
            $("input[name=GGestanteAntMedicamentos][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntMedicamentos+"']").prop('checked', true);
            $("input[name=GGestanteAntUsaCepillo][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntUsaCepillo+"']").prop('checked', true);
            $("input[name=GGestanteAntUsaCrema][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntUsaCrema+"']").prop('checked', true);
            $("input[name=GGestanteAntUsaSeda][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntUsaSeda+"']").prop('checked', true); 
            
            
            $("input[name=GGestanteAntSangranEncias][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntSangranEncias+"']").prop('checked', true);
            $("input[name=GGestanteAntDolorRuidosATM][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntDolorRuidosATM+"']").prop('checked', true);
            $("input[name=GGestanteAntMovilidadDientes][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntMovilidadDientes+"']").prop('checked', true);
            $("input[name=GGestanteAntLimitacionAbrirBoca][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntLimitacionAbrirBoca+"']").prop('checked', true);
            $("input[name=GGestanteAntConfiableFUM][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntConfiableFUM+"']").prop('checked', true);
            
            console.log(convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntCiclosIrregulares));
            $('#GGestanteAntCiclosIrregulares').prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntCiclosIrregulares));
    
    
            $("input[name=GGestanteAntparejasSexuales][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntparejasSexuales+"']").prop('checked', true);
            $("input[name=GGestanteAntVihRprueba][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntVihRprueba+"']").prop('checked', true);
            
            $('#GGestanteAntTtoInfertilidadG').prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntTtoInfertilidadG)); 
            $("input[name=GGestanteAntEmbarazos][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntEmbarazos+"']").prop('checked', true);
            $('#GGestanteAntAbortoHabitu').prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntAbortoHabitu)); 
            
            
            $("input[name=GGestanteAntLeucorreas][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntLeucorreas+"']").prop('checked', true);
            $("input[name=GGestanteAntCOLPOSCOPIA][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntCOLPOSCOPIA+"']").prop('checked', true);
            $("input[name=GGestanteAntPerioINTERGENESICOUME][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntPerioINTERGENESICOUME+"']").prop('checked', true);
            $("input[name=GGestanteAntAmenaPartoPrematuro][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntAmenaPartoPrematuro+"']").prop('checked', true);
            $("input[name=GGestanteAntPartoPREMATURO][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntPartoPREMATURO+"']").prop('checked', true);
            $("input[name=GGestanteAntEmbaraMultiple][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntEmbaraMultiple+"']").prop('checked', true);
            $("input[name=GGestanteAntMOLAS][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntMOLAS+"']").prop('checked', true);
            $("input[name=GGestanteAntPLACPREVIA][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntPLACPREVIA+"']").prop('checked', true);
            $("input[name=GGestanteAntABRUPTIO][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntABRUPTIO+"']").prop('checked', true);
            $("input[name=GGestanteAntRetePlacenta][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntRetePlacenta+"']").prop('checked', true);
            $("input[name=GGestanteAntRupturaPreMembra][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntRupturaPreMembra+"']").prop('checked', true);
            $("input[name=GGestanteAntOLIGOHIDRAMNIOS][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntOLIGOHIDRAMNIOS+"']").prop('checked', true);
            $("input[name=GGestanteAntOLIGOAMNIOS][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntOLIGOAMNIOS+"']").prop('checked', true);
            $("input[name=GGestanteHemorraObst][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteHemorraObst+"']").prop('checked', true);
            $("input[name=GGestanteTransfucciones][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteTransfucciones+"']").prop('checked', true);
            $("input[name=GGestanteAntEmbProlongado][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntEmbProlongado+"']").prop('checked', true);
            $("input[name=GGestanteAntGineOtros][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntGineOtros+"']").prop('checked', true);
            $("input[name=GGestanteAntInfeccPostParto][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntInfeccPostParto+"']").prop('checked', true);
            $("input[name=GGestanteAntMacromsiaFetal][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntMacromsiaFetal+"']").prop('checked', true);
            $("input[name=GGestanteAntMuertePerinatal][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntMuertePerinatal+"']").prop('checked', true);
            $("input[name=GGestanteAntPsicosisPostParto][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntPsicosisPostParto+"']").prop('checked', true);
            $("input[name=GGestanteAntDiabetesfamiliar][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntDiabetesfamiliar+"']").prop('checked', true);
            $("input[name=GGestanteAntHtaFamiliar][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntHtaFamiliar+"']").prop('checked', true);
            $("input[name=GGestanteAntPreeclamsiaFamiliares][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntPreeclamsiaFamiliares+"']").prop('checked', true);
            $("input[name=GGestanteAntEclamsiaFamiliares][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntEclamsiaFamiliares+"']").prop('checked', true);
            $("input[name=GGestanteAntGemelaresFamiliares][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntGemelaresFamiliares+"']").prop('checked', true);
            $("input[name=GGestanteAntCardiopatiaFamiliares][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntCardiopatiaFamiliares+"']").prop('checked', true);
            $("input[name=GGestanteAntEnfTROMBOFILIAS][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntEnfTROMBOFILIAS+"']").prop('checked', true);
            $("input[name=GGestanteAntTBCFamiliares][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntTBCFamiliares+"']").prop('checked', true);
            $("input[name=GGestanteAntTranstornosMentales][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntTranstornosMentales+"']").prop('checked', true);
            $("input[name=GGestanteAntEpilepsia][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntEpilepsia+"']").prop('checked', true);
            $("input[name=GGestanteAntAutoinmune][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntAutoinmune+"']").prop('checked', true);
            $("input[name=GGestanteAntNeoplasias][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntNeoplasias+"']").prop('checked', true);
            $("input[name=GGestanteAntDiscapacidadFamiliares][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntDiscapacidadFamiliares+"']").prop('checked', true);
            $("input[name=GGestanteAntOtrosFamiliares][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntOtrosFamiliares+"']").prop('checked', true);
            
            console.log(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntBiopssicuno);
            $("#GGestanteAntBiopssicuno").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntBiopssicuno));
            $("#GGestanteAntBiopssicdos").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntBiopssicdos));
            $("#GGestanteAntBiopssictres").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntBiopssictres));
            $("#Gabprhabinfer").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].abprhabinfer));
            $("#GretencPlacent").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].retencPlacent));
            $("#Gpesobebemayor").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].pesobebemayor));
            $("#Gpesobebemenor").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].pesobebemenor));
            $("#GhtaIndEmbara").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].htaIndEmbara));
            $("#GEmbaGemelarCesara").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].EmbaGemelarCesara));
            $("#GmortinatoMuerto").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].mortinatoMuerto));
            $("#GTPProlongada").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].TPProlongada));
            $("#GOXgineolgica").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].OXgineolgica));
            $("#GEnferReanlCronic").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].EnferReanlCronic));
            $("#GdiabetGesta").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].diabetGesta));
            $("#GdiabetesMellitus").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].diabetesMellitus));
            $("#GEnfermCardiaca").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].EnfermCardiaca));
            $("#GEnfermedadInfeccios").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].EnfermedadInfeccios));
            $("#GenfeAutoInmunes").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].enfeAutoInmunes));
            $("#GanemiaHB10gl").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].anemiaHB10gl));
            $("#Ghemorragia20ms").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].hemorragia20ms));
            $("#Gvaginal2oss").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].vaginal2oss));
            $("#GEpronlogadoante").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].Epronlogadoante));
            $("#Ghtaantecdepr").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].htaantecdepr));
            $("#GanteRpm").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].anteRpm));
            $("#GpolidraminiosAntEmbaActual").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].polidraminiosAntEmbaActual));
            $("#GRCIUAntecente").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].RCIUAntecente));
            $("#GembMultipleatne").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].embMultipleatne));
            $("#GMalaPresenta").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].MalaPresenta));
            $("#Gisoirh").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].isoirh));
            $("#GGestanteAntBiopssiccuator").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntBiopssiccuator));
            $("#GGestanteAntBiopssiccinco").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntBiopssiccinco));
            $("#GGestanteAntBiopssicseis").prop('checked',convertStringBoolean(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAntBiopssicseis));
    
                            
            for(var rr=0;rr<gestantePacientFinal.length;rr++){
                var dat=decodificarGimmids(gestantePacientFinal[rr].ControPrenaacieLis);
                console.log(dat);
                if(controlPrenCons.length<9){
                    
                    controlPrenCons.push(dat[dat.length-1]);
                }
    
            }
            contpacl='';
            for(var ty=0;ty<controlPrenCons.length;ty++){
                var conr=1;
                var alertHistory='BAJO';
                contpacl+=`<tr class="text-center">
                        <td>`+(ty+1)+`</td>
                        <td style="min-width:100px;">`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>`;
                        console.log(controlPrenCons[ty][conr]);
                if(controlPrenCons[ty][conr]=='SI'){alertHistory='ALTO'}

                contpacl+=`<td>`+controlPrenCons[ty][conr++]+`</td>`;
                if(controlPrenCons[ty][conr]=='ANORMAL'){alertHistory='ALTO'}
                
                contpacl+=`<td>`+controlPrenCons[ty][conr++]+`</td>`;
                if(controlPrenCons[ty][conr]=='ANORMAL'){alertHistory='ALTO'}
                contpacl+=`<td>`+controlPrenCons[ty][conr++]+`</td>`;
                if(controlPrenCons[ty][conr]=='ANORMAL'){alertHistory='ALTO'}
                contpacl+=`<td>`+controlPrenCons[ty][conr++]+`</td>`;
                if(controlPrenCons[ty][conr]=='ANORMAL'){alertHistory='ALTO'}
                contpacl+=`<td>`+controlPrenCons[ty][conr++]+`</td>`;
                if(controlPrenCons[ty][conr]=='ANORMAL'){alertHistory='ALTO'}
                contpacl+=`<td>`+controlPrenCons[ty][conr++]+`</td>`;
                if(controlPrenCons[ty][conr]=='ANORMAL'){alertHistory='ALTO'}
                contpacl+=`<td>`+controlPrenCons[ty][conr++]+`</td>`;
                if(controlPrenCons[ty][conr]=='ANORMAL'){alertHistory='ALTO'}
                contpacl+=`<td>`+controlPrenCons[ty][conr++]+`</td>`;
                if(controlPrenCons[ty][conr]=='ANORMAL'){alertHistory='ALTO'}
                contpacl+=`<td>`+controlPrenCons[ty][conr++]+`</td>`;
                if(controlPrenCons[ty][conr]=='ANORMAL'){alertHistory='ALTO'}
                contpacl+=`<td>`+controlPrenCons[ty][conr++]+`</td>`;
                if(controlPrenCons[ty][conr]=='ANORMAL'){alertHistory='ALTO'}
                contpacl+=`<td>`+controlPrenCons[ty][conr++]+`</td>`;
                if(controlPrenCons[ty][conr]=='ANORMAL'){alertHistory='ALTO'}
                contpacl+=`<td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+controlPrenCons[ty][conr++]+`</td>
                        <td>`+alertHistory+`</td>
                    </tr>`;
            }
                      
            
            $("#examenFisico-body").append(contpacl);
    
            $("#GObserVExFisico").val(gestantePacientFinal[gestantePacientFinal.length-1].ObserVExFisico);
            
            $("#GGestanteVacu1ra").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteVacu1ra);
            $("#GGestanteVacu2ra").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteVacu2ra);
            $("#GGestanteVacu1").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteVacu1);
            $("#GGestanteVacu2").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteVacu2);
            $("#GGestanteVacu3").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteVacu3);
            
            $("#GGestanteAnaRieNi1").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAnaRieNi1);
            $("#GGestanteAnaRieNi2").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAnaRieNi2);
            $("#GGestanteAnaRieNi3").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAnaRieNi3);
            $("#GGestanteAnaRieMa1").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAnaRieMa1);
            $("#GGestanteAnaRieMa2").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAnaRieMa2);
            $("#GGestanteAnaRieMa3").val(gestantePacientFinal[gestantePacientFinal.length-1].GestanteAnaRieMa3);
             
            $("#GgestanteEntrPreTem1").val(gestantePacientFinal[gestantePacientFinal.length-1].gestanteEntrPreTem1);
            $("#GgestanteEntrPreTem2").val(gestantePacientFinal[gestantePacientFinal.length-1].gestanteEntrPreTem2);
            $("#GgestanteEntrPreTem3").val(gestantePacientFinal[gestantePacientFinal.length-1].gestanteEntrPreTem3);
            $("#GgestanteEntrPreTem4").val(gestantePacientFinal[gestantePacientFinal.length-1].gestanteEntrPreTem4);
            $("#GgestanteEntrPreTem5").val(gestantePacientFinal[gestantePacientFinal.length-1].gestanteEntrPreTem5);
            
            $("#GgestanteEntrPreFec1").val(gestantePacientFinal[gestantePacientFinal.length-1].gestanteEntrPreFec1);
            $("#GgestanteEntrPreFec2").val(gestantePacientFinal[gestantePacientFinal.length-1].gestanteEntrPreFec2);
            $("#GgestanteEntrPreFec3").val(gestantePacientFinal[gestantePacientFinal.length-1].gestanteEntrPreFec3);
            $("#GgestanteEntrPreFec4").val(gestantePacientFinal[gestantePacientFinal.length-1].gestanteEntrPreFec4);
            $("#GgestanteEntrPreFec5").val(gestantePacientFinal[gestantePacientFinal.length-1].gestanteEntrPreFec5);
            
            $("input[name=GGestanteFactProct][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteFactProct+"']").prop('checked', true);
            $("input[name=GGestanteEstimFetal][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteEstimFetal+"']").prop('checked', true);
            $("input[name=GGestanteLactMater][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteLactMater+"']").prop('checked', true);
            $("input[name=GGestanteVincuAfec][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteVincuAfec+"']").prop('checked', true);
            $("input[name=GGestantePreveAutom][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestantePreveAutom+"']").prop('checked', true);
            $("input[name=GGestanteConTaba][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteConTaba+"']").prop('checked', true);
            $("input[name=GGestanteSignAlar][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteSignAlar+"']").prop('checked', true);
            $("#GgestanteOtroEduInd").val(gestantePacientFinal[gestantePacientFinal.length-1].gestanteOtroEduInd);
            
            $("#GGestnteGrupoSa").val(gestantePacientFinal[gestantePacientFinal.length-1].GestnteGrupoSa);
            $("input[name=GGestanteclasRh][value='"+gestantePacientFinal[gestantePacientFinal.length-1].GestanteclasRh+"']").prop('checked', true);
           
            if(gestantePacientFinal[gestantePacientFinal.length-1].examHemogesta!=''){
                var hexmo=decodificarGimmids(gestantePacientFinal[gestantePacientFinal.length-1].examHemogesta);
                console.log(hexmo);
                for(var asop=0;asop<hexmo.length;asop++){
                    var dataIna={
                        'tipoexamenh': hexmo[asop][0],
                        'trimestreexamenh': hexmo[asop][1],
                        'GestanteHEMOGRAMAFec': hexmo[asop][2],
                        'GestanteHEMOGRAMADesc': hexmo[asop][3],
                        'GestanteHEMOGRAMA1': hexmo[asop][4]
                    };
                    examenesHemo.push(dataIna);
                }
            }
            console.log(examenesHemo);
            console.log(gestantePacientFinal[gestantePacientFinal.length-1].echoasgesta)
            
            if(gestantePacientFinal[gestantePacientFinal.length-1].echoasgesta!=''){
                var ecoshos=decodificarGimmids(gestantePacientFinal[gestantePacientFinal.length-1].echoasgesta);
                console.log(ecoshos); 
                for(var asop=0;asop<ecoshos.length;asop++){
                    var dataIno={
                        'GestanteFechEco': ecoshos[asop][0],
                        'GestanteObsEcos': ecoshos[asop][1],
                        'GestanteNormEco': ecoshos[asop][2]
                    };   
                    echoGestan.push(dataIno);
                }

            }
           console.log(examenesHemo);
            var conex='';
            for(var p=0;p<examenesHemo.length;p++){
                console.log(examenesHemo[p]);
                conex+=`<tr class="text-center"  >
                            <td style="border:1px solid white;" >
                                `+examenesHemo[p].tipoexamenh+`
                            </td>
                            <td style="border:1px solid white;" >
                                `+examenesHemo[p].trimestreexamenh+`
                            </td>
                            <td style="border:1px solid white;"> `+examenesHemo[p].GestanteHEMOGRAMAFec+`</td>
                            <td style="border:1px solid white;" > `+examenesHemo[p].GestanteHEMOGRAMADesc+`</td>
                            <td style="border:1px solid white;" colspan="2"> 
                            `+examenesHemo[p].GestanteHEMOGRAMA1+`
                            </td>
                        </tr>`;
            }
            console.log(conex);
            $("#tablaExambody").html(conex);
            var conech='';
            for(var p=0;p<echoGestan.length;p++){
                conech+=`<tr  class="text-center"  >
                            <td >
                                `+echoGestan[p].GestanteFechEco+`
                            </td >
                            <td  >
                                `+echoGestan[p].GestanteObsEcos+`
                            </td>
                            <td >
                                `+echoGestan[p].GestanteNormEco+`
                            </td>
                        </tr>`;
            }
            $("#tablaEchobody").html(conech);
    
        }
        



    }

    
}

function cargarConsultaMenorNut(){

    if(valRegMN==0){
        var MNcontcupsTabla='';
        var MNcontcupsTablaProcedi = '';
        var MNcontcupsTablaProcediRef = '';
        var MNcontcie10='';
        var MNcontMedi='';
        
        for(var i=0;i<cupsProcedimientos.length;i++){
            MNcontcupsTabla+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoRefMN(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                               '<td >' + cupsProcedimientos[i].cups + '</td>' +
                               '<td >' + cupsProcedimientos[i].desc + '</td>'+
                           '</tr>';
            MNcontcupsTablaProcedi+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoMN(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>';
            MNcontcupsTablaProcediRef+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoRefProMN(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>'; 
    
        }
        $("#MNTablaListProceAdultos").html(MNcontcupsTablaProcedi);
        $("#MNTablaListProceAdultosRef").html(MNcontcupsTabla);
        $("#MNTablaListProceAdultosRefPro").html(MNcontcupsTablaProcediRef);
        $('#MNtableLProceAdultos').dataTable();
        $('#MNtableLProceAdultosRef').dataTable();
        $('#MNtableLProceAdultosRefPro').dataTable();
        
        for(var t=0;t<cie10.length;t++){
            MNcontcie10+='<tr>'
                    +'<td>'+cie10[t].cod+'</td>'
                    +'<td>'+cie10[t].descripcion+'</td>'
                    +'<td><a class="btn btn-success btn-sm" style="font-size:20px;" onclick="Javascript: adjuntarCieMN(`'+cie10[t].cod+'`,`'+cie10[t].descripcion+'`, `consulta`);">></a></td>'
                +'</tr>';
    
        }
        $("#MNTablaListCie10").html(MNcontcie10);
        $('#MNtableLCie').dataTable();
        
        for(var t=0;t<medicamentos.length;t++){
            MNcontMedi+='<tr onclick="Javascript: seleccionarMedicamentoConsultaMN(`' + medicamentos[t].nombre + '`);">'
                        +'<td>'+medicamentos[t].Id+'</td>'
                        +'<td>'+medicamentos[t].nombre+'</td>'
                        +'</tr>';
           
        }
        $("#MNTablaListmed_cons").html(MNcontMedi);
        $('#MNmed_cons').dataTable();
        valRegMN=1;
    }
    

}
function cargarConsultaSSR(){
    if(valRegSR==0){
        var contcupsTabla='';
        var contcupsTablaProcedi = '';
        var contcupsTablaProcediRef = '';
        var contcie10='';
        var contMedi='';
        if(edadPaciente<18){
            $("#ssrnutmenor18").removeClass('hide');
        }
       
        for(var i=0;i<cupsProcedimientos.length;i++){
            contcupsTabla+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoRefSR(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                               '<td >' + cupsProcedimientos[i].cups + '</td>' +
                               '<td >' + cupsProcedimientos[i].desc + '</td>'+
                           '</tr>';
            contcupsTablaProcedi+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoSR(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>';
            contcupsTablaProcediRef+= '<tr   class="table-dark text-dark" onclick="Javascript: adjuntarProcedimeintoRefProSR(`' + cupsProcedimientos[i].cups + '`,`' + cupsProcedimientos[i].desc + '`);">' +
                                '<td >' + cupsProcedimientos[i].cups + '</td>' +
                                '<td >' + cupsProcedimientos[i].desc + '</td>'+
                            '</tr>';
                            
                            
    
        }
    
        $("#NutSSRTablaListProceAdultos").html(contcupsTablaProcedi);
        $("#NutSSRTablaListProceAdultosRef").html(contcupsTabla);
        $("#NutSSRTablaListProceAdultosRefPro").html(contcupsTablaProcediRef);
        
        $('#NutSSRtableLProceAdultos').dataTable();
        $('#NutSSRtableLProceAdultosRef').dataTable();
        $('#NutSSRtableLProceAdultosRefPro').dataTable();
        
        for(var t=0;t<cie10.length;t++){
            contcie10+='<tr>'
                        +'<td>'+cie10[t].cod+'</td>'
                        +'<td>'+cie10[t].descripcion+'</td>'
                        +'<td><a class="btn btn-success btn-sm" style="font-size:20px;" onclick="Javascript: adjuntarCieSR(`'+cie10[t].cod+'`,`'+cie10[t].descripcion+'`, `consulta`);">></a></td>'
                    +'</tr>'; 
        }
        
        $("#NutSSRTablaListCie10").html(contcie10);
        $('#NutSSRtableLCie').dataTable();
    
        
        for(var t=0;t<medicamentos.length;t++){
            contMedi+='<tr onclick="Javascript: seleccionarMedicamentoConsultaSR(`' + medicamentos[t].nombre + '`);">'
                        +'<td>'+medicamentos[t].Id+'</td>'
                        +'<td>'+medicamentos[t].nombre+'</td>'
                        +'</tr>';
           
        }
        $("#NutSSRTablaListmed_cons").html(contMedi);
        $('#NutSSRmed_cons').dataTable();
        valRegSR=1;
    }
    var contdp='<option></option>';
    console.log(dptos);
    for(var u=0;u<dptos.length; u++){
        contdp+='<option value="'+dptos[u].Id+'">'+dptos[u].nombre+'</option>';
    }
    $("#NutSSRDptoAtencion").html(contdp);
    $("#psicoDptoAtencion").html(contdp);
    

} 
function convertStringBoolean(dato){
    if(dato=='true' || dato=='on'){
        return true;
    }else{
        return false;
    }
}
//----validacion datos pacientes---
function calcularTiempoGests(fecha){
    
	var nacimiento = fecha;
	var values = nacimiento.split("-");
    console.log(values[2].length);
	var dia = (values[0].length!=4)? values[0]: values[2];
	var mes = values[1];
	var ano = (values[0].length==4)? values[0]: values[2];

	// cogemos los valores actuales
	var fecha_hoy = new Date();
	var ahora_ano = fecha_hoy.getYear();
	var ahora_mes = fecha_hoy.getMonth() + 1;
	var ahora_dia = fecha_hoy.getDate();

	// realizamos el calculo
	var edad = (ahora_ano + 1900) - ano;
	if (ahora_mes < mes) {
		edad--;
	}
	if ((mes == ahora_mes) && (ahora_dia < dia)) {
		edad--;
	}
	if (edad > 1900) {
		edad -= 1900;
	}

	// calculamos los meses
	var meses = 0;
	if (ahora_mes > mes)
		meses = ahora_mes - mes;
	if (ahora_mes < mes)
		meses = 12 - (mes - ahora_mes);
	if (ahora_mes == mes && dia > ahora_dia)
		meses = 11;
	
	// calculamos los dias
	var dias = 0;
	if (ahora_dia > dia)
		dias = ahora_dia - dia;
	if (ahora_dia < dia) {
		var ultimoDiaMes = new Date(ahora_ano, ahora_mes, 0);
		dias = ultimoDiaMes.getDate() - (dia - ahora_dia);
	}

	return {'anos':edad,'meses':(parseInt(meses))};
 
            
}
function calcularEdad(fecha){
	console.log(fecha);
	var nacimiento = fecha;
	var values = nacimiento.split("-");

	var dia = values[2];
	var mes = values[1];
	var ano = values[0];

	// cogemos los valores actuales
	var fecha_hoy = new Date();
	var ahora_ano = fecha_hoy.getYear();
	var ahora_mes = fecha_hoy.getMonth() + 1;
	var ahora_dia = fecha_hoy.getDate();

	// realizamos el calculo
	var edad = (ahora_ano + 1900) - ano;
	if (ahora_mes < mes) {
		edad--;
	}
	if ((mes == ahora_mes) && (ahora_dia < dia)) {
		edad--;
	}
	if (edad > 1900) {
		edad -= 1900;
	}

	// calculamos los meses
	var meses = 0;
	if (ahora_mes > mes)
		meses = ahora_mes - mes;
	if (ahora_mes < mes)
		meses = 12 - (mes - ahora_mes);
	if (ahora_mes == mes && dia > ahora_dia)
		meses = 11;
	
	// calculamos los dias
	var dias = 0;
	if (ahora_dia > dia)
		dias = ahora_dia - dia;
	if (ahora_dia < dia) {
		var ultimoDiaMes = new Date(ahora_ano, ahora_mes, 0);
		dias = ultimoDiaMes.getDate() - (dia - ahora_dia);
	}

	
    var mesess;
	
    if((mes== ahora_mes) && (dia<ahora_dia)){
        mesess=0;
    }else{
        mesess=parseInt(meses);
    }
	$("#paciente-edad").html(edad +' años '+ mesess +' mes(es) y '+ dias +' días');
    $("#seg-paciente-edad").html(edad +' años '+ mesess +' mes(es) y '+ dias +'  días');
    edadPaciente=parseInt(edad);
    return edad +' años '+ mesess +' mes(es) y '+ dias +'días';
            
}

function calcularEdadPaciente(){ 
	var nacimiento = $("#fecNac").val();
    console.log(nacimiento);
	var values = nacimiento.split("-");

	var dia = values[2];
	var mes = values[1];
	var ano = values[0];

	// cogemos los valores actuales
	var fecha_hoy = new Date();
	var ahora_ano = fecha_hoy.getYear();
	var ahora_mes = fecha_hoy.getMonth() + 1;
	var ahora_dia = fecha_hoy.getDate();

	// realizamos el calculo
	var edad = (ahora_ano + 1900) - ano;
	if (ahora_mes < mes) {
		edad--;
	}
	if ((mes == ahora_mes) && (ahora_dia < dia)) {
		edad--;
	}
	if (edad > 1900) {
		edad -= 1900;
	}

	// calculamos los meses
	var meses = 0;
	if (ahora_mes > mes)
		meses = ahora_mes - mes;
	if (ahora_mes < mes)
		meses = 12 - (mes - ahora_mes);
	if (ahora_mes == mes && dia > ahora_dia)
		meses = 11;
	
	// calculamos los dias
	var dias = 0;
	if (ahora_dia > dia)
		dias = ahora_dia - dia;
	if (ahora_dia < dia) {
		var ultimoDiaMes = new Date(ahora_ano, ahora_mes, 0);
		dias = ultimoDiaMes.getDate() - (dia - ahora_dia);
	}
    var mesess;
	
    if((mes== ahora_mes) && (dia<ahora_dia)){
        mesess=0;
    }else{
        mesess=parseInt(meses);
    }
	$("#edad").val(edad +' años '+ mesess +' mes(es) y '+ dias +' días');
     
            
}

function seleccionPais(pais){
    
    for(var t=0;t<paises.length;t++){
        if(pais==paises[t].Id){ 
            return paises[t].nombre;
        }
    } 
}

function seleccionPaisPaciente(pais, dpt, mnp){
	console.log($("#"+pais).val());
	var condpto='';
	var conmnpo='';
	if($("#"+pais).val()=='45'){
		//colombia
		condpto+='<select id="'+dpt+'" name="'+dpt+'"  class="form-control" onchange="Javascript: seleccionDptoPaciente(`'+pais+'`,`'+dpt+'`,`'+mnp+'`);"><option></option>';
		for(var ty=0;ty<dptos.length;ty++){
			condpto+='<option value="'+dptos[ty].Id+'">'+dptos[ty].nombre+'</option>';
		}
		condpto+='</select>';
		conmnpo+='<select id="'+mnp+'" name="'+mnp+'"  class="form-control"><option></option></select>';
		

	}else if($("#"+pais).val()=='242'){
		//venezuela
		condpto+='<select id="'+dpt+'" name="'+dpt+'" onchange="Javascript: seleccionDptoPaciente(`'+pais+'`,`'+dpt+'`,`'+mnp+'`);" class="form-control"><option></option>';
		for(var ty=0;ty<dptosv.length;ty++){
			condpto+='<option value="'+dptosv[ty].Id+'">'+dptosv[ty].nombre+'</option>';
		}
		condpto+='</select>';
		conmnpo+='<select id="'+mnp+'" name="'+mnp+'"  class="form-control"><option></option></select>';
		
	}else{

		condpto+='<input type="text" id="'+dpt+'" name="'+dpt+'"  class="form-control">';
		conmnpo+='<input type="text" id="'+mnp+'" name="'+mnp+'"  class="form-control">';
		 

	}
	$("#"+dpt+"div").html(condpto);
	$("#"+mnp+"div").html(conmnpo);

}
function seleccionDptoPacienteResidencia(){
     
    console.log($("#dptoResidencia").val());
	var conmnpo='';
    for(var ty=0;ty<mnpos.length;ty++){
        if(mnpos[ty].cod_dptop==$("#dptoResidencia").val()){
            conmnpo+='<option value="'+mnpos[ty].cod_mnpo+'">'+mnpos[ty].nombre_mnpo+'</option>';
        }
    }
    $("#mnpoResidencia").html(conmnpo);

}
function seleccionDptoPaciente(pais, dpt, mnp){
	 console.log('seleciionando dpt')
     console.log($("#"+pais).val());
     console.log($("#"+dpt).val());
	var conmnpo='';
	if($("#"+pais).val()=='45'){
		//colombia
		console.log('colombia');
		if(mnp=='AgendarmnpoResidencia' || mnp=='mnpoResidencia'){
			conmnpo+='<option></option>';
		
			for(var ty=0;ty<mnpos.length;ty++){
				if(mnpos[ty].cod_dptop==$("#"+dpt).val()){
					conmnpo+='<option value="'+mnpos[ty].cod_mnpo+'">'+mnpos[ty].nombre_mnpo+'</option>';
				}
			}
		}else{
			conmnpo+='<select id="'+mnp+'" name="'+mnp+'"  class="form-control">';
		
			for(var ty=0;ty<mnpos.length;ty++){
				if(mnpos[ty].cod_dptop==$("#"+dpt).val()){
					conmnpo+='<option value="'+mnpos[ty].cod_mnpo+'">'+mnpos[ty].nombre_mnpo+'</option>';
				}
			}
			conmnpo+='</select>';
		}
		
		

	}else if($("#"+pais).val()=='242'){
		//venezuela
		console.log('venezuela');
		conmnpo+='<select id="'+mnp+'" name="'+mnp+'"  class="form-control">';
		
		for(var ty=0;ty<mnposv.length;ty++){
			if(mnposv[ty].cod_dptop==$("#"+dpt).val()){
				conmnpo+='<option value="'+mnposv[ty].nombre_mnpo+'">'+mnposv[ty].nombre_mnpo+'</option>';
			}
		}
		conmnpo+='</select>';
		
	} else{
		conmnpo+='<input type="text" id="'+mnp+'" name="'+mnp+'"  class="form-control">';
			
	}
	 
		$("#"+mnp+"div").html(conmnpo);
	 
}
function seleccTipoMovilidad(uno,dos){
	 
	if($("#"+uno).val()=='DESPLAZAMIENTO'){
		$("#"+dos).removeAttr('disabled');
	}else{
		$("#"+dos).attr('disabled', true);
		$("#"+dos).val('')
	}
}
function seleccBDUA(uno,dos){
	 
	if($("#"+uno).val()!='NO ASEGURADO'){
		$("#"+dos).removeAttr('disabled');
	}else{
		$("#"+dos).attr('disabled', true);
		$("#"+dos).val('')
	}
}
function seleccPertEtnica(uno,dos){
	 
	if($("#"+uno).val()=='4'){
		$("#"+dos).removeAttr('disabled');
		$("#"+dos).val('');
	}else{
		$("#"+dos).attr('disabled', true);
		$("#"+dos).val('NA');
	}
}
function seleccrumv(uno,dos){
	 
	if($("#"+uno).val()=='SI'){
		$("#"+dos).removeAttr('disabled');
		$("#"+dos).val('');
	}else{
		$("#"+dos).attr('disabled', true);
		$("#"+dos).val('');
	}
}
function seleccppt(uno,dos){
	 
	if($("#"+uno).val()=='SI'){
		$("#"+dos).removeAttr('disabled');
		$("#"+dos).val('');
	}else{
		$("#"+dos).attr('disabled', true);
		$("#"+dos).val('');
	}
}
function seleccionDpto(pais, dpto){ 
    if(pais=='45'){
        for(var ty=0;ty<dptos.length;ty++){
            if(dpto==dptos[ty].Id){ 
                return dptos[ty].nombre;
            }
		}
    }else if(pais=='242'){

        for(var ty=0;ty<dptosv.length;ty++){
            if(dpto==dptosv[ty].Id){ 
                return dptosv[ty].nombre;
            }
		}
    }else{
        return dpto;
    }
}

function seleccionDpto2(pais, dpt, mnp){
    console.log('seleciionando dpt')
   var conmnpo='';
   if($("#"+pais).val()=='45'){
       //colombia
       console.log('colombia');
       if(mnp=='AgendarmnpoResidencia' || mnp=='mnpoResidencia'){
           conmnpo+='<option></option>';
       
           for(var ty=0;ty<mnpos.length;ty++){
               if(mnpos[ty].cod_dptop==$("#"+dpt).val()){
                   conmnpo+='<option value="'+mnpos[ty].cod_mnpo+'">'+mnpos[ty].nombre_mnpo+'</option>';
               }
           }
       }else{
           conmnpo+='<select id="'+mnp+'" name="'+mnp+'"  class="form-control">';
       
           for(var ty=0;ty<mnpos.length;ty++){
               if(mnpos[ty].cod_dptop==$("#"+dpt).val()){
                   conmnpo+='<option value="'+mnpos[ty].cod_mnpo+'">'+mnpos[ty].nombre_mnpo+'</option>';
               }
           }
           conmnpo+='</select>';
       }
       
       

   } 
       $("#"+mnp).html(conmnpo); 
}
function seleccionMnpo(pais, dpto, mnpo){

    if(pais=='45'){
        for(var t=0;t<mnpos.length;t++){
            if(mnpos[t].cod_dptop==dpto && mnpos[t].cod_mnpo==mnpo){
                return mnpos[t].nombre_mnpo;
            }
        }
    }else{
        return mnpo;
    }

}
function cargarMnpoAtencionSSR(){
    console.log(mnpos);
    var contmp='<option></option>';
    for(var t=0;t<mnpos.length;t++){
        if(mnpos[t].cod_dptop==$("#NutSSRDptoAtencion").val()){
            contmp+='<option value="'+mnpos[t].cod_mnpo+'">'+mnpos[t].nombre_mnpo+'</option>'; ;
        }
    }
    
    $("#NutSSRMnpoAtencion").html(contmp);
}
function cargarMnpoAtencionPsico(){
    console.log(mnpos);
    var contmp='<option></option>';
    for(var t=0;t<mnpos.length;t++){
        if(mnpos[t].cod_dptop==$("#psicoDptoAtencion").val()){
            contmp+='<option value="'+mnpos[t].cod_mnpo+'">'+mnpos[t].nombre_mnpo+'</option>'; ;
        }
    }
    
    $("#psicoMnpoAtencion").html(contmp);
}
function seleccionEAPB(eap){
    for(var t=0;t<eapb.length;t++){
        if(eap==eapb[t].Id){
            return eapb[t].nombre;
        }
    }
}
function seleccionReg(reg){
    if(reg=='1'){
        return 'Contributivo';
    }
    if(reg=='2'){
        return 'Subsidiadovar';
    }
    if(reg=='3'){
        return 'Vinculado';
    }
    if(reg=='4'){
        return 'Particular';
    }
    if(reg=='5'){
        return 'Otro';
    }
    if(reg=='6'){
        return 'Víctima con afiliación al Régimen Contributivo';
    }
    if(reg=='7'){
        return 'Víctima con afiliación al Régimen subsidiado';
    }
    if(reg=='8'){
        return 'Víctima no asegurado (Vinculado)';
    }
}
function seleccionEtnia(etn){
    if(etn=='1'){
        return 'NEGRO, MULATO, AFROCOLOMBIANO';
    }
    if(etn=='2'){
        return 'PALENQUERO';
    }
    if(etn=='3'){
        return 'ROOM (GITANO)';
    }
    if(etn=='4'){
        return 'INDIGENA';
    }
    if(etn=='5'){
        return 'RAIZAL';
    }
    if(etn=='6'){
        return 'OTRO';
    } 
}
function seleccionPuebloInd(pue){
    for(var t=0;t<puebloindigena.length;t++){
        if(pue==puebloindigena[t].Id){
            return puebloindigena[t].nombre;
        }
    }
}

//--DOCUMENTOS ANEXOS---

function cargarListadoAnexos(){
    console.log("cargando listado archivos en el servidor del paciente");
    var dataIn={'tipoid': paciente.tipoidRegPac, 'numid': paciente.idRegPac ,"key":'GimmidsApp'};
    console.log(dataIn);
    $.ajax({
        url: "http://api.gimmids.com/intersos/uploads/listarArchivosPaciente.php",
        type: "post",
        data: dataIn,
        async:false
    }).done(function(res){
        console.log(res);
        console.log("Respuesta: ");
        var data=JSON.parse(res);
        console.log(data);  
        if(data.STATUS="OK"){ 
            var contAnexo='';
            for(var t=0;t<data.DATA.length;t++){
                contAnexo+=`<tr>
                                <td class="text-center">`+data.DATA[t].nombre+`.pdf</td>
                                <td class="text-center">`+data.DATA[t].fecha_subida+`</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-success" onclick="Javascript:window.open('http://api.gimmids.com/intersos/uploads/`+data.DATA[t].tipodoc+data.DATA[t].numdoc+`-`+data.DATA[t].nombre+`.pdf', '_blank')">
                                        <i class="fa fa-download fa-lg"></i>
                                    </a>
                                </td>
                            </tr>`;
            }
           
            $("#listadoAnexosBody").html(contAnexo);
            
        }else{
            alert("Error al consultar Servidor: "+data.ERROR);
        } 
    } ).fail(function() { 
        alert("Error de conexion AL LISTAR DOCUMENTOS ANEXOS\n");
    });
}

function subirArchivo(){ 
    
    console.log('data file');
    var formData = new FormData(document.getElementById("formuploadajax"));
    
    formData.append("id_paciente", paciente.id);
    formData.append("doc_user_sube", usuario.numid);
    formData.append("tipodoc", paciente.tipoidRegPac);
    formData.append("numdoc", paciente.idRegPac);
    formData.append("key", 'GimmidsApp');
    console.log(formData);

    $.ajax({
        url: "http://api.gimmids.com/intersos/uploads/recibe.php",
        type: "post",
        dataType: "html",
        data: formData,
        async:false,
        cache: false,
        contentType: false,
        processData: false
    }).done(function(res){
        console.log(res);
        console.log("Respuesta: ");
        var data=JSON.parse(res);
        if(data.STATUS="OK"){
            alert('Archivo Cargado con exito');
            $("#nombreaFile").val(null);
            $("#myfile").val(null);
           
        }else{
            alert("Error al subir al servidor: "+data.ERROR);
        }
        console.log(res);
    } ).fail(function() { 
        alert("Error de conexion\n");
    });  
    
    
}

function registrarSeguimiento(){
    var dataIn={    
        'tipoid_pac':paciente.tipoidRegPac,
        'numid_pac':paciente.idRegPac,
        'nota_seguimiento':$("#notaSeguimiento").val(),
        'inst':usuario.institucion,
        'numid_registra':usuario.numid,
        'nombre_registra':usuario.nombres,
        'key':'GimmidsApp'
    }
    console.log(dataIn);
    
    $.ajax({
        url: "https://saludsp.com.co/api/servicios/registrarSeguimiento.php",
        type: "post",
        data: {'datos': dataIn},
        async:false,
    }).done(function(res){
        console.log(res);
        console.log("Respuesta: ");
        var data=JSON.parse(res);
        if(data.STATUS="OK"){
            alert('Seguimiento registrado con exito'); 
            $("#notaSeguimiento").val(null);
        }else{
            alert("Error al registrar seguimiento: "+data.ERROR);
        }
        console.log(res);
    } ).fail(function() { 
        alert("Error de conexion\n");
    });
}

function cargarListadoSeguimientos(){
    var dataInvoice={
        'tipoid_pac':paciente.tipoidRegPac,
        'numid_pac':paciente.idRegPac,
        'key':'GimmidsApp'
    
    }
    console.log(dataInvoice);

    $.ajax({
        url: "https://saludsp.com.co/api/servicios/listarSeguimientoPaciente.php",
        type: "post",
        data: {'datos': dataInvoice},
        async:false,
    }).done(function(res){
        console.log(res);
        console.log("Respuesta: ");
        var dataReci=JSON.parse(res);
        console.log(dataReci);
        if(dataReci.STATUS=="OK"){
            
            var contSeg='';
            for(var t=0;t<dataReci.DATA.length;t++){
                contSeg+=`<tr>
                            <td class="text-center">`+(t+1)+`</td>
                            <td class="text-center">`+dataReci.DATA[t].nota_seguimiento+`</td>
                            <td class="text-center">`+dataReci.DATA[t].fecha_registro+`</td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-info" onclick="Javascript:verSeguimiento('`+dataReci.DATA[t].nota_seguimiento+`','`+dataReci.DATA[t].fecha_registro+`','`+dataReci.DATA[t].nombre_registra+`','`+dataReci.DATA[t].inst+`');" data-toggle="modal" data-target="#modal-verSeguimiento">
                                    <i class="fa fa-eye fa-lg"></i> Ver
                                </a>
                            </td>
                        </tr>`;
            }
           
            $("#listadoSeguimientosBody").html(contSeg);
        }else{
            alert("Error al listar seguimientos\n");
        }
    } ).fail(function() { 
        alert("Error de conexion al listar seguimientos\n");
    });
    
}
function verSeguimiento(nota, fecha, nombre, inst) {
    //$("#").modal('show');
    $("#seg-paciente-fechaSeg").html(fecha);
    $("#seg-paciente-notaSeg").html(nota);
    localStorage.setItem('seguimientoverPrint', '{"fecha":"'+fecha+'", "nota":"'+nota+'", "nombrepr":"'+nombre+'", "institucion":"'+inst+'"}');
}   
 
function printSeguimiento(divName) {

    if(confirm('Desea imprimir seguimiento?')){
        ipc.send('imprimir-consulta','seguimiento');
    }  else{
        localStorage.removeItem('seguimientoverPrint');
        $("#modal-verSeguimiento").modal('hide');
    } 
    /*var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;*/
}
function decodificarGimmids(data) {
  
    if (data != '') {
        if (data[0].length == 1) {
            var arra = data.split('   -   ');
            ////console.log(arra);
            var dat = []
            for (var t = 0; t < arra.length-1; t++) {
                //console.log(arra[t]);
                dat.push(arra[t].split('-,-'));
                //console.log(dat);
            }

            return dat;

        } else {
            return data;
        }

    }
}

function calcularIMC(input1, input2, input3){
    //input1=peso
    //input2=talla
    //input3=imc
    if($("#"+input1).val() && $("#"+input2).val()){

        $("#"+input3).val(parseFloat(parseFloat($("#"+input1).val()) / (parseFloat($("#"+input2).val())*parseFloat($("#"+input2).val())    )).toFixed(2));
    }
}
function adjuntarCieProcedimientodx(cod, desc, consu){
    var dato = { 'cod': cod, 'desc': desc, 'tipoConsulta': consu };
    console.log(dato);

    var existLp = 0;
    if (listadoCIEPaPro.length < 5) {

        for (var t = 0; t < listadoCIEPaPro.length; t++) {
            if (listadoCIEPaPro[t].cod == dato.cod) {
                existLp = 1;
            }
        }
        if (existLp == 0) {

            listadoCIEPaPro.push(dato);
            console.log(listadoCIEPaPro);
            var contlistadoCIEPaPro='';
            for(var w=0;w<listadoCIEPaPro.length;w++){
                contlistadoCIEPaPro+='<tr>'
                                +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcieProcedimientodx('+w+')">BORRAR   </a></td>'
                                +'<td>'+listadoCIEPaPro[w].cod+'</td>'
                                +'<td>'+listadoCIEPaPro[w].desc+'</td>'
                            +'</tr>';
            }
            $("#ProTablaListCie10Pac").html(contlistadoCIEPaPro);
        } else {
            alert('El diagnostico ya ha sido asignado!...');
        }

    } else {
        alert('Has alcanzado el limite de diagnosticos para consulta!...');
    }
}
function quitarcieProcedimientodx(index){
    console.log(index);
    listadoCIEPaPro.splice(index, 1);
    var contlistadoCIEPaCompPro='';
    for(var w=0;w<listadoCIEPaPro.length;w++){
        contlistadoCIEPaCompPro+='<tr>'
                        +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcieProcedimientodx('+w+')">BORRAR   </a></td>'
                        +'<td>'+listadoCIEPaPro[w].cod+'</td>'
                        +'<td>'+listadoCIEPaPro[w].desc+'</td>'
                    +'</tr>';
    }
    $("#ProTablaListCie10Pac").html(contlistadoCIEPaCompPro);
}
function adjuntarCieProcedimientoCompl(cod, desc, consu){
    var dato = { 'cod': cod, 'desc': desc, 'tipoConsulta': consu };
    console.log(dato);

    var existLp = 0;
    if (listadoCIEPaCompPro.length < 5) {

        for (var t = 0; t < listadoCIEPaCompPro.length; t++) {
            if (listadoCIEPaCompPro[t].cod == dato.cod) {
                existLp = 1;
            }
        }
        if (existLp == 0) {

            listadoCIEPaCompPro.push(dato);
            console.log(listadoCIEPaCompPro);
            var contlistadoCIEPaCompPro='';
            for(var w=0;w<listadoCIEPaCompPro.length;w++){
                contlistadoCIEPaCompPro+='<tr>'
                                +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarCieProcedimientoCompl('+w+')">BORRAR   </a></td>'
                                +'<td>'+listadoCIEPaCompPro[w].cod+'</td>'
                                +'<td>'+listadoCIEPaCompPro[w].desc+'</td>'
                            +'</tr>';
            }
            $("#ProTablaListCie10PacCom").html(contlistadoCIEPaCompPro);
        } else {
            alert('El diagnostico ya ha sido asignado!...');
        }

    } else {
        alert('Has alcanzado el limite de diagnosticos para consulta!...');
    }
}
function quitarCieProcedimientoCompl(index){
    console.log(index);
    listadoCIEPaCompPro.splice(index, 1);
    var contlistadoCIEPaCompPro='';
    for(var w=0;w<listadoCIEPaCompPro.length;w++){
        contlistadoCIEPaCompPro+='<tr>'
                        +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcie('+w+')">BORRAR   </a></td>'
                        +'<td>'+listadoCIEPaCompPro[w].cod+'</td>'
                        +'<td>'+listadoCIEPaCompPro[w].desc+'</td>'
                    +'</tr>';
    }
    $("#ProTablaListCie10PacCom").html(contlistadoCIEPaCompPro);
}
function adjuntarCie(cod, desc, consu){
    var dato = { 'cod': cod, 'desc': desc, 'tipoConsulta': consu };
    console.log(dato);

    var existLp = 0;
    if (listadoCIEPa.length < 5) {

        for (var t = 0; t < listadoCIEPa.length; t++) {
            if (listadoCIEPa[t].cod == dato.cod) {
                existLp = 1;
            }
        }
        if (existLp == 0) {

            listadoCIEPa.push(dato);
            console.log(listadoCIEPa);
            var contlistadoCIEPa='';
            for(var w=0;w<listadoCIEPa.length;w++){
                contlistadoCIEPa+='<tr>'
                                +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcie('+w+')">BORRAR   </a></td>'
                                +'<td>'+listadoCIEPa[w].cod+'</td>'
                                +'<td>'+listadoCIEPa[w].desc+'</td>'
                            +'</tr>';
            }
            $("#TablaListCie10Pac").html(contlistadoCIEPa);
        } else {
            alert('El diagnostico ya ha sido asignado!...');
        }

    } else {
        alert('Has alcanzado el limite de diagnosticos para consulta!...');
    }
}
function quitarcie(index){
    console.log(index);
    listadoCIEPa.splice(index, 1);
    var contlistadoCIEPa='';
    for(var w=0;w<listadoCIEPa.length;w++){
        contlistadoCIEPa+='<tr>'
                        +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcie('+w+')">BORRAR   </a></td>'
                        +'<td>'+listadoCIEPa[w].cod+'</td>'
                        +'<td>'+listadoCIEPa[w].desc+'</td>'
                    +'</tr>';
    }
    $("#TablaListCie10Pac").html(contlistadoCIEPa);
}
function adjuntarCieE(cod, desc, consu){
    var dato = { 'cod': cod, 'desc': desc, 'tipoConsulta': consu };
    console.log(dato);

    var existLp = 0;
    if (listadoCIEPa.length < 5) {

        for (var t = 0; t < listadoCIEPa.length; t++) {
            if (listadoCIEPa[t].cod == dato.cod) {
                existLp = 1;
            }
        }
        if (existLp == 0) {

            listadoCIEPa.push(dato);
            console.log(listadoCIEPa);
            var contlistadoCIEPa='';
            for(var w=0;w<listadoCIEPa.length;w++){
                contlistadoCIEPa+='<tr>'
                                +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcieE('+w+')">BORRAR   </a></td>'
                                +'<td>'+listadoCIEPa[w].cod+'</td>'
                                +'<td>'+listadoCIEPa[w].desc+'</td>'
                            +'</tr>';
            }
            $("#ETablaListCie10Pac").html(contlistadoCIEPa);
        } else {
            alert('El diagnostico ya ha sido asignado!...');
        }

    } else {
        alert('Has alcanzado el limite de diagnosticos para consulta!...');
    }
}
function quitarcieE(index){
    console.log(index);
    listadoCIEPa.splice(index, 1);
    var contlistadoCIEPa='';
    for(var w=0;w<listadoCIEPa.length;w++){
        contlistadoCIEPa+='<tr>'
                        +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcieE('+w+')">BORRAR   </a></td>'
                        +'<td>'+listadoCIEPa[w].cod+'</td>'
                        +'<td>'+listadoCIEPa[w].desc+'</td>'
                    +'</tr>';
    }
    $("#ETablaListCie10Pac").html(contlistadoCIEPa);
}

function adjuntarCieP(cod, desc, consu){
    var dato = { 'cod': cod, 'desc': desc, 'tipoConsulta': consu };
    console.log(dato);

    var existLp = 0;
    if (listadoCIEPa.length < 5) {

        for (var t = 0; t < listadoCIEPa.length; t++) {
            if (listadoCIEPa[t].cod == dato.cod) {
                existLp = 1;
            }
        }
        if (existLp == 0) {

            listadoCIEPa.push(dato);
            console.log(listadoCIEPa);
            var contlistadoCIEPa='';
            for(var w=0;w<listadoCIEPa.length;w++){
                contlistadoCIEPa+='<tr>'
                                +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcieP('+w+')">BORRAR   </a></td>'
                                +'<td>'+listadoCIEPa[w].cod+'</td>'
                                +'<td>'+listadoCIEPa[w].desc+'</td>'
                            +'</tr>';
            }
            $("#PTablaListCie10Pac").html(contlistadoCIEPa);
        } else {
            alert('El diagnostico ya ha sido asignado!...');
        }

    } else {
        alert('Has alcanzado el limite de diagnosticos para consulta!...');
    }
}
function quitarcieP(index){
    console.log(index);
    listadoCIEPa.splice(index, 1);
    var contlistadoCIEPa='';
    for(var w=0;w<listadoCIEPa.length;w++){
        contlistadoCIEPa+='<tr>'
                        +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcieP('+w+')">BORRAR   </a></td>'
                        +'<td>'+listadoCIEPa[w].cod+'</td>'
                        +'<td>'+listadoCIEPa[w].desc+'</td>'
                    +'</tr>';
    }
    $("#PTablaListCie10Pac").html(contlistadoCIEPa);
}

function adjuntarCieN(cod, desc, consu){
    var dato = { 'cod': cod, 'desc': desc, 'tipoConsulta': consu };
    console.log(dato);

    var existLp = 0;
    if (listadoCIEPa.length < 5) {

        for (var t = 0; t < listadoCIEPa.length; t++) {
            if (listadoCIEPa[t].cod == dato.cod) {
                existLp = 1;
            }
        }
        if (existLp == 0) {

            listadoCIEPa.push(dato);
            console.log(listadoCIEPa);
            var contlistadoCIEPa='';
            for(var w=0;w<listadoCIEPa.length;w++){
                contlistadoCIEPa+='<tr>'
                                +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcieN('+w+')">BORRAR   </a></td>'
                                +'<td>'+listadoCIEPa[w].cod+'</td>'
                                +'<td>'+listadoCIEPa[w].desc+'</td>'
                            +'</tr>';
            }
            $("#NTablaListCie10Pac").html(contlistadoCIEPa);
        } else {
            alert('El diagnostico ya ha sido asignado!...');
        }

    } else {
        alert('Has alcanzado el limite de diagnosticos para consulta!...');
    }
}
function quitarcieN(index){
    console.log(index);
    listadoCIEPa.splice(index, 1);
    var contlistadoCIEPa='';
    for(var w=0;w<listadoCIEPa.length;w++){
        contlistadoCIEPa+='<tr>'
                        +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcieN('+w+')">BORRAR   </a></td>'
                        +'<td>'+listadoCIEPa[w].cod+'</td>'
                        +'<td>'+listadoCIEPa[w].desc+'</td>'
                    +'</tr>';
    }
    $("#NTablaListCie10Pac").html(contlistadoCIEPa);
}

function adjuntarCieA(cod, desc, consu){
    var dato = { 'cod': cod, 'desc': desc, 'tipoConsulta': consu };
    console.log(dato);

    var existLp = 0;
    if (listadoCIEPa.length < 5) {

        for (var t = 0; t < listadoCIEPa.length; t++) {
            if (listadoCIEPa[t].cod == dato.cod) {
                existLp = 1;
            }
        }
        if (existLp == 0) {

            listadoCIEPa.push(dato);
            console.log(listadoCIEPa);
            var contlistadoCIEPa='';
            for(var w=0;w<listadoCIEPa.length;w++){
                contlistadoCIEPa+='<tr>'
                                +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcieA('+w+')">BORRAR   </a></td>'
                                +'<td>'+listadoCIEPa[w].cod+'</td>'
                                +'<td>'+listadoCIEPa[w].desc+'</td>'
                            +'</tr>';
            }
            $("#ATablaListCie10Pac").html(contlistadoCIEPa);
        } else {
            alert('El diagnostico ya ha sido asignado!...');
        }

    } else {
        alert('Has alcanzado el limite de diagnosticos para consulta!...');
    }
}
function quitarcieA(index){
    console.log(index);
    listadoCIEPa.splice(index, 1);
    var contlistadoCIEPa='';
    for(var w=0;w<listadoCIEPa.length;w++){
        contlistadoCIEPa+='<tr>'
                        +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcieA('+w+')">BORRAR   </a></td>'
                        +'<td>'+listadoCIEPa[w].cod+'</td>'
                        +'<td>'+listadoCIEPa[w].desc+'</td>'
                    +'</tr>';
    }
    $("#ATablaListCie10Pac").html(contlistadoCIEPa);
}

function adjuntarCieM(cod, desc, consu){
    var dato = { 'cod': cod, 'desc': desc, 'tipoConsulta': consu };
    console.log(dato);

    var existLp = 0;
    if (listadoCIEPa.length < 5) {

        for (var t = 0; t < listadoCIEPa.length; t++) {
            if (listadoCIEPa[t].cod == dato.cod) {
                existLp = 1;
            }
        }
        if (existLp == 0) {

            listadoCIEPa.push(dato);
            console.log(listadoCIEPa);
            var contlistadoCIEPa='';
            for(var w=0;w<listadoCIEPa.length;w++){
                contlistadoCIEPa+='<tr>'
                                +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcieM('+w+')">BORRAR   </a></td>'
                                +'<td>'+listadoCIEPa[w].cod+'</td>'
                                +'<td>'+listadoCIEPa[w].desc+'</td>'
                            +'</tr>';
            }
            $("#MTablaListCie10Pac").html(contlistadoCIEPa);
        } else {
            alert('El diagnostico ya ha sido asignado!...');
        }

    } else {
        alert('Has alcanzado el limite de diagnosticos para consulta!...');
    }
}
function quitarcieM(index){
    console.log(index);
    listadoCIEPa.splice(index, 1);
    var contlistadoCIEPa='';
    for(var w=0;w<listadoCIEPa.length;w++){
        contlistadoCIEPa+='<tr>'
                        +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcieM('+w+')">BORRAR   </a></td>'
                        +'<td>'+listadoCIEPa[w].cod+'</td>'
                        +'<td>'+listadoCIEPa[w].desc+'</td>'
                    +'</tr>';
    }
    $("#MTablaListCie10Pac").html(contlistadoCIEPa);
}
function adjuntarCieMN(cod, desc, consu){
    var dato = { 'cod': cod, 'desc': desc, 'tipoConsulta': consu };
    console.log(dato);

    var existLp = 0;
    if (listadoCIEPa.length < 5) {

        for (var t = 0; t < listadoCIEPa.length; t++) {
            if (listadoCIEPa[t].cod == dato.cod) {
                existLp = 1;
            }
        }
        if (existLp == 0) {

            listadoCIEPa.push(dato);
            console.log(listadoCIEPa);
            var contlistadoCIEPa='';
            for(var w=0;w<listadoCIEPa.length;w++){
                contlistadoCIEPa+='<tr>'
                                +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcieMN('+w+')">BORRAR   </a></td>'
                                +'<td>'+listadoCIEPa[w].cod+'</td>'
                                +'<td>'+listadoCIEPa[w].desc+'</td>'
                            +'</tr>';
            }
            $("#MNTablaListCie10Pac").html(contlistadoCIEPa);
        } else {
            alert('El diagnostico ya ha sido asignado!...');
        }

    } else {
        alert('Has alcanzado el limite de diagnosticos para consulta!...');
    }
}
function quitarcieMN(index){
    console.log(index);
    listadoCIEPa.splice(index, 1);
    var contlistadoCIEPa='';
    for(var w=0;w<listadoCIEPa.length;w++){
        contlistadoCIEPa+='<tr>'
                        +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcieMN('+w+')">BORRAR   </a></td>'
                        +'<td>'+listadoCIEPa[w].cod+'</td>'
                        +'<td>'+listadoCIEPa[w].desc+'</td>'
                    +'</tr>';
    }
    $("#MNTablaListCie10Pac").html(contlistadoCIEPa);
}

function adjuntarCieG(cod, desc, consu){
    var dato = { 'cod': cod, 'desc': desc, 'tipoConsulta': consu };
    console.log(dato);

    var existLp = 0;
    if (listadoCIEPa.length < 5) {

        for (var t = 0; t < listadoCIEPa.length; t++) {
            if (listadoCIEPa[t].cod == dato.cod) {
                existLp = 1;
            }
        }
        if (existLp == 0) {

            listadoCIEPa.push(dato);
            console.log(listadoCIEPa);
            var contlistadoCIEPa='';
            for(var w=0;w<listadoCIEPa.length;w++){
                contlistadoCIEPa+='<tr>'
                                +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcieG('+w+')">BORRAR   </a></td>'
                                +'<td>'+listadoCIEPa[w].cod+'</td>'
                                +'<td>'+listadoCIEPa[w].desc+'</td>'
                            +'</tr>';
            }
            $("#GTablaListCie10Pac").html(contlistadoCIEPa);
        } else {
            alert('El diagnostico ya ha sido asignado!...');
        }

    } else {
        alert('Has alcanzado el limite de diagnosticos para consulta!...');
    }
}
function quitarcieG(index){
    console.log(index);
    listadoCIEPa.splice(index, 1);
    var contlistadoCIEPa='';
    for(var w=0;w<listadoCIEPa.length;w++){
        contlistadoCIEPa+='<tr>'
                        +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcieG('+w+')">BORRAR   </a></td>'
                        +'<td>'+listadoCIEPa[w].cod+'</td>'
                        +'<td>'+listadoCIEPa[w].desc+'</td>'
                    +'</tr>';
    }
    $("#GTablaListCie10Pac").html(contlistadoCIEPa);
}
function adjuntarCieSR(cod, desc, consu){
    var dato = { 'cod': cod, 'desc': desc, 'tipoConsulta': consu };
    console.log(dato);

    var existLp = 0;
    if (listadoCIEPa.length < 5) {

        for (var t = 0; t < listadoCIEPa.length; t++) {
            if (listadoCIEPa[t].cod == dato.cod) {
                existLp = 1;
            }
        }
        if (existLp == 0) {

            listadoCIEPa.push(dato);
            console.log(listadoCIEPa);
            var contlistadoCIEPa='';
            for(var w=0;w<listadoCIEPa.length;w++){
                contlistadoCIEPa+='<tr>'
                                +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcieSR('+w+')">BORRAR   </a></td>'
                                +'<td>'+listadoCIEPa[w].cod+'</td>'
                                +'<td>'+listadoCIEPa[w].desc+'</td>'
                            +'</tr>';
            }
            $("#NutSSRTablaListCie10Pac").html(contlistadoCIEPa);
        } else {
            alert('El diagnostico ya ha sido asignado!...');
        }

    } else {
        alert('Has alcanzado el limite de diagnosticos para consulta!...');
    }
}
function quitarcieSR(index){
    console.log(index);
    listadoCIEPa.splice(index, 1);
    var contlistadoCIEPa='';
    for(var w=0;w<listadoCIEPa.length;w++){
        contlistadoCIEPa+='<tr>'
                        +'<td><a title="Eliminar" class="btn btn-danger" style="font-size:12px;" onclick="quitarcieSR('+w+')">BORRAR   </a></td>'
                        +'<td>'+listadoCIEPa[w].cod+'</td>'
                        +'<td>'+listadoCIEPa[w].desc+'</td>'
                    +'</tr>';
    }
    $("#NutSSRTablaListCie10Pac").html(contlistadoCIEPa);
}
function seleccionarMedicamentoConsulta(nombre){
    console.log(nombre);
    $("#nombreMed").val(nombre);
}
function adjuntarMedConsulta(){
    console.log('adjuntando medicmaento');
    var dtaIn={
        'nombre': $("#nombreMed").val(),
        'presentacion': $("#presentacionMedR").val(),
        'periodicidad': $("#presentacionMed").val(),
        'catdosis': $("#dosificacionMed").val(),
        'viadmin': $("#viaadmMed").val(),
        'tiempo': $("#tiempoMed").val(),
        'catdosis': $("#dosificacionMed").val(),
        'total': $("#cantidadMed").val()
    };
    medAsigCons.push(dtaIn);
    var contmedasi='';
    for(var q=0;q<medAsigCons.length;q++){
        contmedasi+=`<tr >
	
                        <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarMedCons(`+q+`)">BORRAR</a></td>
                        <td style="font-size:10px;">`+medAsigCons[q].nombre+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].presentacion+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].periodicidad+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].catdosis+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].viadmin+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].tiempo+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].total+`</td> 
                    </tr>`;
    }
    $("#TablaListmed_asig_cons").html(contmedasi);
    $("#nombreMed").val('');
    $("#presentacionMedR").val('');
    $("#presentacionMed").val('');
    $("#dosificacionMed").val('');
    $("#viaadmMed").val('');
    $("#tiempoMed").val('');
    $("#dosificacionMed").val('');
    $("#cantidadMed").val('');
}

function borrarMedCons(index){
    medAsigCons.splice(index, 1);
    var contmedasi='';
    for(var q=0;q<medAsigCons.length;q++){
        contmedasi+=`<tr >
	
                        <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarMedCons(`+q+`)">BORRAR</a></td>
                        <td style="font-size:10px;">`+medAsigCons[q].nombre+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].presentacion+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].periodicidad+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].catdosis+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].viadmin+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].tiempo+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].total+`</td> 
                    </tr>`;
    }
    $("#TablaListmed_asig_cons").html(contmedasi);

}
function seleccionarMedicamentoConsultaE(nombre){
    console.log(nombre);
    $("#EnombreMed").val(nombre);
}
function adjuntarMedConsultaE(){
    console.log('adjuntando medicmaento');
    var dtaIn={
        'nombre': $("#EnombreMed").val(),
        'presentacion': $("#EpresentacionMedR").val(),
        'periodicidad': $("#EpresentacionMed").val(),
        'catdosis': $("#EdosificacionMed").val(),
        'viadmin': $("#EviaadmMed").val(),
        'tiempo': $("#EtiempoMed").val(),
        'catdosis': $("#EdosificacionMed").val(),
        'total': $("#EcantidadMed").val()
    };
    medAsigCons.push(dtaIn);
    var contmedasi='';
    for(var q=0;q<medAsigCons.length;q++){
        contmedasi+=`<tr >
	
                        <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarMedConsE(`+q+`)">BORRAR</a></td>
                        <td style="font-size:10px;">`+medAsigCons[q].nombre+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].presentacion+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].periodicidad+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].catdosis+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].viadmin+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].tiempo+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].total+`</td> 
                    </tr>`;
    }
    $("#ETablaListmed_asig_cons").html(contmedasi);
    $("#EnombreMed").val('');
    $("#EpresentacionMedR").val('');
    $("#EpresentacionMed").val('');
    $("#EdosificacionMed").val('');
    $("#EviaadmMed").val('');
    $("#EtiempoMed").val('');
    $("#EdosificacionMed").val('');
    $("#EcantidadMed").val('');
}

function borrarMedConsE(index){
    medAsigCons.splice(index, 1);
    var contmedasi='';
    for(var q=0;q<medAsigCons.length;q++){
        contmedasi+=`<tr >
	
                        <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarMedConsE(`+q+`)">BORRAR</a></td>
                        <td style="font-size:10px;">`+medAsigCons[q].nombre+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].presentacion+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].periodicidad+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].catdosis+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].viadmin+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].tiempo+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].total+`</td> 
                    </tr>`;
    }
    $("#ETablaListmed_asig_cons").html(contmedasi);

}
function seleccionarMedicamentoConsultaP(nombre){
    console.log(nombre);
    $("#PnombreMed").val(nombre);
}
function adjuntarMedConsultaP(){
    console.log('adjuntando medicmaento');
    var dtaIn={
        'nombre': $("#PnombreMed").val(),
        'presentacion': $("#PpresentacionMedR").val(),
        'periodicidad': $("#PpresentacionMed").val(),
        'catdosis': $("#PdosificacionMed").val(),
        'viadmin': $("#PviaadmMed").val(),
        'tiempo': $("#PtiempoMed").val(),
        'catdosis': $("#PdosificacionMed").val(),
        'total': $("#PcantidadMed").val()
    };
    medAsigCons.push(dtaIn);
    var contmedasi='';
    for(var q=0;q<medAsigCons.length;q++){
        contmedasi+=`<tr >
	
                        <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarMedConsP(`+q+`)">BORRAR</a></td>
                        <td style="font-size:10px;">`+medAsigCons[q].nombre+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].presentacion+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].periodicidad+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].catdosis+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].viadmin+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].tiempo+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].total+`</td> 
                    </tr>`;
    }
    $("#PTablaListmed_asig_cons").html(contmedasi);
    $("#PnombreMed").val('');
    $("#PpresentacionMedR").val('');
    $("#PpresentacionMed").val('');
    $("#PdosificacionMed").val('');
    $("#PviaadmMed").val('');
    $("#PtiempoMed").val('');
    $("#PdosificacionMed").val('');
    $("#PcantidadMed").val('');
}

function borrarMedConsP(index){
    medAsigCons.splice(index, 1);
    var contmedasi='';
    for(var q=0;q<medAsigCons.length;q++){
        contmedasi+=`<tr >
	
                        <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarMedConsP(`+q+`)">BORRAR</a></td>
                        <td style="font-size:10px;">`+medAsigCons[q].nombre+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].presentacion+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].periodicidad+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].catdosis+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].viadmin+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].tiempo+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].total+`</td> 
                    </tr>`;
    }
    $("#PTablaListmed_asig_cons").html(contmedasi);

}
function seleccionarMedicamentoConsultaN(nombre){
    console.log(nombre);
    $("#NnombreMed").val(nombre);
}
function adjuntarMedConsultaN(){
    console.log('adjuntando medicmaento');
    var dtaIn={
        'nombre': $("#NnombreMed").val(),
        'presentacion': $("#NpresentacionMedR").val(),
        'periodicidad': $("#NpresentacionMed").val(),
        'catdosis': $("#NdosificacionMed").val(),
        'viadmin': $("#NviaadmMed").val(),
        'tiempo': $("#NtiempoMed").val(),
        'catdosis': $("#NdosificacionMed").val(),
        'total': $("#NcantidadMed").val()
    };
    medAsigCons.push(dtaIn);
    var contmedasi='';
    for(var q=0;q<medAsigCons.length;q++){
        contmedasi+=`<tr >
	
                        <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarMedConsN(`+q+`)">BORRAR</a></td>
                        <td style="font-size:10px;">`+medAsigCons[q].nombre+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].presentacion+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].periodicidad+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].catdosis+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].viadmin+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].tiempo+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].total+`</td> 
                    </tr>`;
    }
    $("#NTablaListmed_asig_cons").html(contmedasi);
    $("#NnombreMed").val('');
    $("#NpresentacionMedR").val('');
    $("#NpresentacionMed").val('');
    $("#NdosificacionMed").val('');
    $("#NviaadmMed").val('');
    $("#NtiempoMed").val('');
    $("#NdosificacionMed").val('');
    $("#NcantidadMed").val('');
}

function borrarMedConsN(index){
    medAsigCons.splice(index, 1);
    var contmedasi='';
    for(var q=0;q<medAsigCons.length;q++){
        contmedasi+=`<tr >
	
                        <td><a class="btn btn-danger" style="font-size:10px;" onclick="NborrarMedCons(`+q+`)">BORRAR</a></td>
                        <td style="font-size:10px;">`+medAsigCons[q].nombre+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].presentacion+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].periodicidad+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].catdosis+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].viadmin+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].tiempo+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].total+`</td> 
                    </tr>`;
    }
    $("#NTablaListmed_asig_cons").html(contmedasi);

}
function seleccionarMedicamentoConsultaA(nombre){
    console.log(nombre);
    $("#AnombreMed").val(nombre);
}
function adjuntarMedConsultaA(){
    console.log('adjuntando medicmaento');
    var dtaIn={
        'nombre': $("#AnombreMed").val(),
        'presentacion': $("#ApresentacionMedR").val(),
        'periodicidad': $("#ApresentacionMed").val(),
        'catdosis': $("#AdosificacionMed").val(),
        'viadmin': $("#AviaadmMed").val(),
        'tiempo': $("#AtiempoMed").val(),
        'catdosis': $("#AdosificacionMed").val(),
        'total': $("#AcantidadMed").val()
    };
    medAsigCons.push(dtaIn);
    var contmedasi='';
    for(var q=0;q<medAsigCons.length;q++){
        contmedasi+=`<tr >
	
                        <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarMedConsA(`+q+`)">BORRAR</a></td>
                        <td style="font-size:10px;">`+medAsigCons[q].nombre+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].presentacion+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].periodicidad+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].catdosis+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].viadmin+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].tiempo+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].total+`</td> 
                    </tr>`;
    }
    $("#ATablaListmed_asig_cons").html(contmedasi);
    $("#AnombreMed").val('');
    $("#ApresentacionMedR").val('');
    $("#ApresentacionMed").val('');
    $("#AdosificacionMed").val('');
    $("#AviaadmMed").val('');
    $("#AtiempoMed").val('');
    $("#AdosificacionMed").val('');
    $("#AcantidadMed").val('');
}

function borrarMedConsA(index){
    medAsigCons.splice(index, 1);
    var contmedasi='';
    for(var q=0;q<medAsigCons.length;q++){
        contmedasi+=`<tr >
	
                        <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarMedConsA(`+q+`)">BORRAR</a></td>
                        <td style="font-size:10px;">`+medAsigCons[q].nombre+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].presentacion+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].periodicidad+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].catdosis+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].viadmin+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].tiempo+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].total+`</td> 
                    </tr>`;
    }
    $("#ATablaListmed_asig_cons").html(contmedasi);

}

function seleccionarMedicamentoConsultaM(nombre){
    console.log(nombre);
    $("#MnombreMed").val(nombre);
}
function adjuntarMedConsultaM(){
    console.log('adjuntando medicmaento');
    var dtaIn={
        'nombre': $("#MnombreMed").val(),
        'presentacion': $("#MpresentacionMedR").val(),
        'periodicidad': $("#MpresentacionMed").val(),
        'catdosis': $("#MdosificacionMed").val(),
        'viadmin': $("#MviaadmMed").val(),
        'tiempo': $("#MtiempoMed").val(),
        'catdosis': $("#MdosificacionMed").val(),
        'total': $("#McantidadMed").val()
    };
    medAsigCons.push(dtaIn);
    var contmedasi='';
    for(var q=0;q<medAsigCons.length;q++){
        contmedasi+=`<tr >
	
                        <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarMedConsM(`+q+`)">BORRAR</a></td>
                        <td style="font-size:10px;">`+medAsigCons[q].nombre+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].presentacion+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].periodicidad+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].catdosis+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].viadmin+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].tiempo+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].total+`</td> 
                    </tr>`;
    }
    $("#MTablaListmed_asig_cons").html(contmedasi);
    $("#MnombreMed").val('');
    $("#MpresentacionMedR").val('');
    $("#MpresentacionMed").val('');
    $("#MdosificacionMed").val('');
    $("#MviaadmMed").val('');
    $("#MtiempoMed").val('');
    $("#MdosificacionMed").val('');
    $("#McantidadMed").val('');
}

function borrarMedConsM(index){
    medAsigCons.splice(index, 1);
    var contmedasi='';
    for(var q=0;q<medAsigCons.length;q++){
        contmedasi+=`<tr >
	
                        <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarMedConsM(`+q+`)">BORRAR</a></td>
                        <td style="font-size:10px;">`+medAsigCons[q].nombre+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].presentacion+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].periodicidad+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].catdosis+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].viadmin+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].tiempo+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].total+`</td> 
                    </tr>`;
    }
    $("#MTablaListmed_asig_cons").html(contmedasi);

}
function seleccionarMedicamentoConsultaMN(nombre){
    console.log(nombre);
    $("#MNnombreMed").val(nombre);
}
function adjuntarMedConsultaMN(){
    console.log('adjuntando medicmaento');
    var dtaIn={
        'nombre': $("#MNnombreMed").val(),
        'presentacion': $("#MNpresentacionMedR").val(),
        'periodicidad': $("#MNpresentacionMed").val(),
        'catdosis': $("#MNdosificacionMed").val(),
        'viadmin': $("#MNviaadmMed").val(),
        'tiempo': $("#MNtiempoMed").val(),
        'catdosis': $("#MNdosificacionMed").val(),
        'total': $("#MNcantidadMed").val()
    };
    medAsigCons.push(dtaIn);
    var contmedasi='';
    for(var q=0;q<medAsigCons.length;q++){
        contmedasi+=`<tr >
	
                        <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarMedConsMN(`+q+`)">BORRAR</a></td>
                        <td style="font-size:10px;">`+medAsigCons[q].nombre+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].presentacion+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].periodicidad+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].catdosis+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].viadmin+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].tiempo+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].total+`</td> 
                    </tr>`;
    }
    $("#MNTablaListmed_asig_cons").html(contmedasi);
    $("#MNnombreMed").val('');
    $("#MNpresentacionMedR").val('');
    $("#MNpresentacionMed").val('');
    $("#MNdosificacionMed").val('');
    $("#MNviaadmMed").val('');
    $("#MNtiempoMed").val('');
    $("#MNdosificacionMed").val('');
    $("#MNcantidadMed").val('');
}

function borrarMedConsMN(index){
    medAsigCons.splice(index, 1);
    var contmedasi='';
    for(var q=0;q<medAsigCons.length;q++){
        contmedasi+=`<tr >
	
                        <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarMedConsMN(`+q+`)">BORRAR</a></td>
                        <td style="font-size:10px;">`+medAsigCons[q].nombre+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].presentacion+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].periodicidad+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].catdosis+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].viadmin+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].tiempo+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].total+`</td> 
                    </tr>`;
    }
    $("#MNTablaListmed_asig_cons").html(contmedasi);

}
function seleccionarMedicamentoConsultaG(nombre){
    console.log(nombre);
    $("#GnombreMed").val(nombre);
}
function adjuntarMedConsultaG(){
    console.log('adjuntando medicmaento');
    var dtaIn={
        'nombre': $("#GnombreMed").val(),
        'presentacion': $("#GpresentacionMedR").val(),
        'periodicidad': $("#GpresentacionMed").val(),
        'catdosis': $("#GdosificacionMed").val(),
        'viadmin': $("#GviaadmMed").val(),
        'tiempo': $("#GtiempoMed").val(),
        'catdosis': $("#GdosificacionMed").val(),
        'total': $("#GcantidadMed").val()
    };
    medAsigCons.push(dtaIn);
    var contmedasi='';
    for(var q=0;q<medAsigCons.length;q++){
        contmedasi+=`<tr >
	
                        <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarMedConsG(`+q+`)">BORRAR</a></td>
                        <td style="font-size:10px;">`+medAsigCons[q].nombre+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].presentacion+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].periodicidad+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].catdosis+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].viadmin+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].tiempo+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].total+`</td> 
                    </tr>`;
    }
    $("#GTablaListmed_asig_cons").html(contmedasi);
    $("#GnombreMed").val('');
    $("#GpresentacionMedR").val('');
    $("#GpresentacionMed").val('');
    $("#GdosificacionMed").val('');
    $("#GviaadmMed").val('');
    $("#GtiempoMed").val('');
    $("#GdosificacionMed").val('');
    $("#GcantidadMed").val('');
}

function borrarMedConsG(index){
    medAsigCons.splice(index, 1);
    var contmedasi='';
    for(var q=0;q<medAsigCons.length;q++){
        contmedasi+=`<tr >
	
                        <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarMedConsG(`+q+`)">BORRAR</a></td>
                        <td style="font-size:10px;">`+medAsigCons[q].nombre+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].presentacion+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].periodicidad+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].catdosis+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].viadmin+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].tiempo+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].total+`</td> 
                    </tr>`;
    }
    $("#GTablaListmed_asig_cons").html(contmedasi);

}

function seleccionarMedicamentoConsultaSR(nombre){
    console.log(nombre);
    $("#NutSSRnombreMed").val(nombre);
}
function adjuntarMedConsultaSR(){
    console.log('adjuntando medicmaento');
    var dtaIn={
        'nombre': $("#NutSSRnombreMed").val(),
        'presentacion': $("#NutSSRpresentacionMedR").val(),
        'periodicidad': $("#NutSSRpresentacionMed").val(),
        'catdosis': $("#NutSSRdosificacionMed").val(),
        'viadmin': $("#NutSSRviaadmMed").val(),
        'tiempo': $("#NutSSRtiempoMed").val(),
        'catdosis': $("#NutSSRdosificacionMed").val(),
        'total': $("#NutSSRcantidadMed").val()
    };
    medAsigCons.push(dtaIn);
    var contmedasi='';
    for(var q=0;q<medAsigCons.length;q++){
        contmedasi+=`<tr >
    
                        <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarMedConsSR(`+q+`)">BORRAR</a></td>
                        <td style="font-size:10px;">`+medAsigCons[q].nombre+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].presentacion+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].periodicidad+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].catdosis+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].viadmin+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].tiempo+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].total+`</td> 
                    </tr>`;
    }
    $("#NutSSRTablaListmed_asig_cons").html(contmedasi);
    $("#NutSSRnombreMed").val('');
    $("#NutSSRpresentacionMedR").val('');
    $("#NutSSRpresentacionMed").val('');
    $("#NutSSRdosificacionMed").val('');
    $("#NutSSRviaadmMed").val('');
    $("#NutSSRtiempoMed").val('');
    $("#NutSSRdosificacionMed").val('');
    $("#NutSSRcantidadMed").val('');
}

function borrarMedConsSR(index){
    medAsigCons.splice(index, 1);
    var contmedasi='';
    for(var q=0;q<medAsigCons.length;q++){
        contmedasi+=`<tr >
    
                        <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarMedConsSR(`+q+`)">BORRAR</a></td>
                        <td style="font-size:10px;">`+medAsigCons[q].nombre+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].presentacion+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].periodicidad+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].catdosis+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].viadmin+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].tiempo+`</td>
                        <td style="font-size:10px;">`+medAsigCons[q].total+`</td> 
                    </tr>`;
    }
    $("#NutSSRTablaListmed_asig_cons").html(contmedasi);

}
function adjuntarProcedimeintoPro(cod, desc) {
    console.log(cod);
    console.log(desc);
    $("#ProcodOrMed").val(cod);
    $("#ProdescOrdMed").val(desc);
}

function adjuntarProcedimeinto(cod, desc) {
    $("#codOrMed").val(cod);
    $("#descOrdMed").val(desc);
}

function adjuntarProcedimeintoRef(cod, desc) {
    $("#codOrMedRef").val(cod);
    $("#descOrdMedRef").val(desc);
}

function adjuntarProcedimeintoRefPro(cod, desc) {
    $("#codOrMedRefPro").val(cod);
    $("#descOrdMedRefPro").val(desc);
}
function adjuntarProcedimeintoE(cod, desc) {
    $("#EcodOrMed").val(cod);
    $("#EdescOrdMed").val(desc);
}

function adjuntarProcedimeintoRefE(cod, desc) {
    $("#EcodOrMedRef").val(cod);
    $("#EdescOrdMedRef").val(desc);
}

function adjuntarProcedimeintoRefProE(cod, desc) {
    $("#EcodOrMedRefPro").val(cod);
    $("#EdescOrdMedRefPro").val(desc);
}


function adjuntarProcedimeintoP(cod, desc) {
    $("#PcodOrMed").val(cod);
    $("#PdescOrdMed").val(desc);
}

function adjuntarProcedimeintoRefP(cod, desc) {
    $("#PcodOrMedRef").val(cod);
    $("#PdescOrdMedRef").val(desc);
}

function adjuntarProcedimeintoRefProP(cod, desc) {
    $("#PcodOrMedRefPro").val(cod);
    $("#PdescOrdMedRefPro").val(desc);
}
function adjuntarProcedimeintoN(cod, desc) {
    $("#NcodOrMed").val(cod);
    $("#NdescOrdMed").val(desc);
}

function adjuntarProcedimeintoRefN(cod, desc) {
    $("#NcodOrMedRef").val(cod);
    $("#NdescOrdMedRef").val(desc);
}

function adjuntarProcedimeintoRefProN(cod, desc) {
    $("#NcodOrMedRefPro").val(cod);
    $("#NdescOrdMedRefPro").val(desc);
}
function adjuntarProcedimeintoA(cod, desc) {
    $("#AcodOrMed").val(cod);
    $("#AdescOrdMed").val(desc);
}

function adjuntarProcedimeintoRefA(cod, desc) {
    $("#AcodOrMedRef").val(cod);
    $("#AdescOrdMedRef").val(desc);
}

function adjuntarProcedimeintoRefProA(cod, desc) {
    $("#AcodOrMedRefPro").val(cod);
    $("#AdescOrdMedRefPro").val(desc);
}
function adjuntarProcedimeintoM(cod, desc) {
    $("#McodOrMed").val(cod);
    $("#MdescOrdMed").val(desc);
}

function adjuntarProcedimeintoRefM(cod, desc) {
    $("#McodOrMedRef").val(cod);
    $("#MdescOrdMedRef").val(desc);
}

function adjuntarProcedimeintoRefProM(cod, desc) {
    $("#McodOrMedRefPro").val(cod);
    $("#MdescOrdMedRefPro").val(desc);
}
function adjuntarProcedimeintoMN(cod, desc) {
    $("#MNcodOrMed").val(cod);
    $("#MNdescOrdMed").val(desc);
}

function adjuntarProcedimeintoRefMN(cod, desc) {
    $("#MNcodOrMedRef").val(cod);
    $("#MNdescOrdMedRef").val(desc);
}

function adjuntarProcedimeintoRefProMN(cod, desc) {
    $("#MNcodOrMedRefPro").val(cod);
    $("#MNdescOrdMedRefPro").val(desc);
}
function adjuntarProcedimeintoG(cod, desc) {
    $("#GcodOrMed").val(cod);
    $("#GdescOrdMed").val(desc);
}

function adjuntarProcedimeintoRefG(cod, desc) {
    $("#GcodOrMedRef").val(cod);
    $("#GdescOrdMedRef").val(desc);
}

function adjuntarProcedimeintoRefProG(cod, desc) {
    $("#GcodOrMedRefPro").val(cod);
    $("#GdescOrdMedRefPro").val(desc);
}   
function adjuntarOrdenMedConsultaPro() {
    var dtaIn = {
        'cod': $("#ProcodOrMed").val(),
        'desc': $("#ProdescOrdMed").val(),
        'observa': $("#ProobserOrMed").val()
    };
    console.log(dtaIn);
    ordenMedConsPro.push(dtaIn);
    var contprosapac='';
    for(var t=0;t<ordenMedConsPro.length;t++){
        contprosapac+=`<tr  >
	
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedConsultaPro(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedConsPro[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedConsPro[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedConsPro[t].observa+`</td>
                        </tr>`;
    }
    $("#TablaListOrde_medPro").html(contprosapac);
    $("#ProcodOrMed").val('')
    $("#ProdescOrdMed").val('')
    $("#ProobserOrMed").val(''); 
}

function adjuntarProcedimeintoSR(cod, desc) {
    $("#NutSSRcodOrMed").val(cod);
    $("#NutSSRdescOrdMed").val(desc);
}

function adjuntarProcedimeintoRefSR(cod, desc) {
    console.log('vamos a ver');
    $("#SRcodOrMedRef").val(cod);
    $("#SRdescOrdMedRef").val(desc);
}

function adjuntarProcedimeintoRefProSR(cod, desc) {
    $("#SRcodOrMedRefPro").val(cod);
    $("#SRdescOrdMedRefPro").val(desc);
}

function adjuntarOrdenMedConsulta() {
    var dtaIn = {
        'cod': $("#codOrMed").val(),
        'desc': $("#descOrdMed").val(),
        'observa': $("#obserOrMed").val()
    };
    ordenMedCons.push(dtaIn);
    var contprosapac='';
    for(var t=0;t<ordenMedCons.length;t++){
        contprosapac+=`<tr  >
	
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMed(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedCons[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].observa+`</td>
                        </tr>`;
    }
    $("#TablaListOrde_med").html(contprosapac);
    $("#codOrMed").val('')
    $("#descOrdMed").val('')
    $("#presenOrMed").val(''); 
}
function adjuntarOrdenMedConsultaE() {
    var dtaIn = {
        'cod': $("#EcodOrMed").val(),
        'desc': $("#EdescOrdMed").val(),
        'observa': $("#EobserOrMed").val()
    };
    ordenMedCons.push(dtaIn);
    var contprosapac='';
    for(var t=0;t<ordenMedCons.length;t++){
        contprosapac+=`<tr  >
	
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedE(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedCons[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].observa+`</td>
                        </tr>`;
    }
    $("#ETablaListOrde_med").html(contprosapac);
    $("#EcodOrMed").val('')
    $("#EdescOrdMed").val('')
    $("#EpresenOrMed").val(''); 
}
function adjuntarOrdenMedConsultaP() {
    var dtaIn = {
        'cod': $("#PcodOrMed").val(),
        'desc': $("#PdescOrdMed").val(),
        'observa': $("#PobserOrMed").val()
    };
    ordenMedCons.push(dtaIn);
    var contprosapac='';
    for(var t=0;t<ordenMedCons.length;t++){
        contprosapac+=`<tr  >
	
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedP(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedCons[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].observa+`</td>
                        </tr>`;
    }
    $("#PTablaListOrde_med").html(contprosapac);
    $("#PcodOrMed").val('')
    $("#PdescOrdMed").val('')
    $("#PpresenOrMed").val(''); 
}
function adjuntarOrdenMedConsultaN() {
    var dtaIn = {
        'cod': $("#NcodOrMed").val(),
        'desc': $("#NdescOrdMed").val(),
        'observa': $("#NobserOrMed").val()
    };
    ordenMedCons.push(dtaIn);
    var contprosapac='';
    for(var t=0;t<ordenMedCons.length;t++){
        contprosapac+=`<tr  >
	
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedN(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedCons[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].observa+`</td>
                        </tr>`;
    }
    $("#NTablaListOrde_med").html(contprosapac);
    $("#NcodOrMed").val('')
    $("#NdescOrdMed").val('')
    $("#NpresenOrMed").val(''); 
}
function adjuntarOrdenMedConsultaA() {
    var dtaIn = {
        'cod': $("#AcodOrMed").val(),
        'desc': $("#AdescOrdMed").val(),
        'observa': $("#AobserOrMed").val()
    };
    ordenMedCons.push(dtaIn);
    var contprosapac='';
    for(var t=0;t<ordenMedCons.length;t++){
        contprosapac+=`<tr  >
	
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedA(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedCons[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].observa+`</td>
                        </tr>`;
    }
    $("#ATablaListOrde_med").html(contprosapac);
    $("#AcodOrMed").val('')
    $("#AdescOrdMed").val('')
    $("#ApresenOrMed").val(''); 
}
function adjuntarOrdenMedConsultaM() {
    var dtaIn = {
        'cod': $("#McodOrMed").val(),
        'desc': $("#MdescOrdMed").val(),
        'observa': $("#MobserOrMed").val()
    };
    ordenMedCons.push(dtaIn);
    var contprosapac='';
    for(var t=0;t<ordenMedCons.length;t++){
        contprosapac+=`<tr  >
	
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedM(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedCons[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].observa+`</td>
                        </tr>`;
    }
    $("#MTablaListOrde_med").html(contprosapac);
    $("#McodOrMed").val('')
    $("#MdescOrdMed").val('')
    $("#MpresenOrMed").val(''); 
}
function adjuntarOrdenMedConsultaMN() {
    var dtaIn = {
        'cod': $("#MNcodOrMed").val(),
        'desc': $("#MNdescOrdMed").val(),
        'observa': $("#MNobserOrMed").val()
    };
    ordenMedCons.push(dtaIn);
    var contprosapac='';
    for(var t=0;t<ordenMedCons.length;t++){
        contprosapac+=`<tr  >
	
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedMN(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedCons[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].observa+`</td>
                        </tr>`;
    }
    $("#MNTablaListOrde_med").html(contprosapac);
    $("#MNcodOrMed").val('')
    $("#MNdescOrdMed").val('')
    $("#MNpresenOrMed").val(''); 
}
function adjuntarOrdenMedConsultaG() {
    var dtaIn = {
        'cod': $("#GcodOrMed").val(),
        'desc': $("#GdescOrdMed").val(),
        'observa': $("#GobserOrMed").val()
    };
    ordenMedCons.push(dtaIn);
    var contprosapac='';
    for(var t=0;t<ordenMedCons.length;t++){
        contprosapac+=`<tr  >
    
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedSR(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedCons[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].observa+`</td>
                        </tr>`;
    }
    $("#GTablaListOrde_med").html(contprosapac);
    $("#GcodOrMed").val('')
    $("#GdescOrdMed").val('')
    $("#GpresenOrMed").val(''); 
}
function adjuntarOrdenMedConsultaSR() {
    var dtaIn = {
        'cod': $("#NutSSRcodOrMed").val(),
        'desc': $("#NutSSRdescOrdMed").val(),
        'observa': $("#NutSSRobserOrMed").val()
    };
    ordenMedCons.push(dtaIn);
    var contprosapac='';
    for(var t=0;t<ordenMedCons.length;t++){
        contprosapac+=`<tr  >
    
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedSR(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedCons[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].observa+`</td>
                        </tr>`;
    }
    $("#NutSSRTablaListOrde_med").html(contprosapac);
    $("#NutSSRcodOrMed").val('')
    $("#NutSSRdescOrdMed").val('')
    $("#NutSSRpresenOrMed").val(''); 
}
function borrarOrMedConsultaPro(index){
    ordenMedConsRefPro.splice(index, 1);
    var contprosapac='';
    for(var t=0;t<ordenMedConsRefPro.length;t++){
        contprosapac+=`<tr  >

                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedConsultaPro(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedConsRefPro[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedConsRefPro[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedConsRefPro[t].observa+`</td>
                        </tr>`;
    }
    $("#TablaListOrde_medPro").html(contprosapac);
}
function borrarOrMed(index){
    ordenMedCons.splice(index, 1);
    var contprosapac='';
    for(var t=0;t<ordenMedCons.length;t++){
        contprosapac+=`<tr  >
	
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMed(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedCons[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].observa+`</td>
                        </tr>`;
    }
    $("#TablaListOrde_med").html(contprosapac);
}
function borrarOrMedE(index){
    ordenMedCons.splice(index, 1);
    var contprosapac='';
    for(var t=0;t<ordenMedCons.length;t++){
        contprosapac+=`<tr  >
	
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedE(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedCons[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].observa+`</td>
                        </tr>`;
    }
    $("#ETablaListOrde_med").html(contprosapac);
}
function borrarOrMedP(index){
    ordenMedCons.splice(index, 1);
    var contprosapac='';
    for(var t=0;t<ordenMedCons.length;t++){
        contprosapac+=`<tr  >
	
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedP(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedCons[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].observa+`</td>
                        </tr>`;
    }
    $("#PTablaListOrde_med").html(contprosapac);
}
function borrarOrMedN(index){
    ordenMedCons.splice(index, 1);
    var contprosapac='';
    for(var t=0;t<ordenMedCons.length;t++){
        contprosapac+=`<tr  >
	
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedN(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedCons[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].observa+`</td>
                        </tr>`;
    }
    $("#NTablaListOrde_med").html(contprosapac);
}
function borrarOrMedA(index){
    ordenMedCons.splice(index, 1);
    var contprosapac='';
    for(var t=0;t<ordenMedCons.length;t++){
        contprosapac+=`<tr  >
	
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedA(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedCons[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].observa+`</td>
                        </tr>`;
    }
    $("#ATablaListOrde_med").html(contprosapac);
}
function borrarOrMedM(index){
    ordenMedCons.splice(index, 1);
    var contprosapac='';
    for(var t=0;t<ordenMedCons.length;t++){
        contprosapac+=`<tr  >
	
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedM(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedCons[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].observa+`</td>
                        </tr>`;
    }
    $("#MTablaListOrde_med").html(contprosapac);
}
function borrarOrMedMN(index){
    ordenMedCons.splice(index, 1);
    var contprosapac='';
    for(var t=0;t<ordenMedCons.length;t++){
        contprosapac+=`<tr  >
	
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedMN(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedCons[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].observa+`</td>
                        </tr>`;
    }
    $("#MNTablaListOrde_med").html(contprosapac);
}
function borrarOrMedG(index){
    ordenMedCons.splice(index, 1);
    var contprosapac='';
    for(var t=0;t<ordenMedCons.length;t++){
        contprosapac+=`<tr  >
	
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedG(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedCons[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].observa+`</td>
                        </tr>`;
    }
    $("#GTablaListOrde_med").html(contprosapac);
}
function borrarOrMedSR(index){
    ordenMedCons.splice(index, 1);
    var contprosapac='';
    for(var t=0;t<ordenMedCons.length;t++){
        contprosapac+=`<tr  >
    
                            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedSR(`+t+`)">BORRAR</a></td>
                            <td style="font-size:10px;">`+ordenMedCons[t].cod+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].desc+`</td>
                            <td style="font-size:10px;">`+ordenMedCons[t].observa+`</td>
                        </tr>`;
    }
    $("#NutSSRTablaListOrde_med").html(contprosapac);
}


function tipoServicioRefVal(tipo,val){
    if($("#"+tipo).val()=='SERVICIO ESPECIALIZADO'){
        $(".servicioEspeRef").removeClass('hide');
    }else{
        
        $(".servicioEspeRef").addClass('hide');
    }
}

 

function adjuntarOrdenMedConsultaRef() {
    console.log('adjuntando');
    var dtaIn = {
        'cod': $("#codOrMedRef").val(),
        'desc': $("#descOrdMedRef").val(),
        'observa': $("#obserOrMedRefGe").val()
    };
    ordenMedConsRef.push(dtaIn);
    var contordrefpasig='';
    for(var t=0;t<ordenMedConsRef.length;t++){
        contordrefpasig+=`<tr  >

            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRef(`+t+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].observa+`</td>
        </tr>`;
    }
    $("#TablaListOrde_medRef").html(contordrefpasig);
    
    $("#codOrMedRef").val('');
    $("#descOrdMedRef").val('');
    $("#obserOrMedRefGe").val('');
}
function adjuntarOrdenMedConsultaRefE() {
    console.log('adjuntando');
    var dtaIn = {
        'cod': $("#EcodOrMedRef").val(),
        'desc': $("#EdescOrdMedRef").val(),
        'observa': $("#EobserOrMedRefGe").val()
    };
    ordenMedConsRef.push(dtaIn);
    var contordrefpasig='';
    for(var t=0;t<ordenMedConsRef.length;t++){
        contordrefpasig+=`<tr  >

            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefE(`+t+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].observa+`</td>
        </tr>`;
    }
    $("#ETablaListOrde_medRef").html(contordrefpasig);
     
    $("#EcodOrMedRef").val('');
    $("#EdescOrdMedRef").val('');
    $("#EobserOrMedRefGe").val('');
}
function adjuntarOrdenMedConsultaRefP() {
    console.log('adjuntando');
    var dtaIn = {
        'cod': $("#PcodOrMedRef").val(),
        'desc': $("#PdescOrdMedRef").val(),
        'observa': $("#PobserOrMedRefGe").val()
    };
    ordenMedConsRef.push(dtaIn);
    var contordrefpasig='';
    for(var t=0;t<ordenMedConsRef.length;t++){
        contordrefpasig+=`<tr  >

            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefP(`+t+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].observa+`</td>
        </tr>`;
    }
    $("#PTablaListOrde_medRef").html(contordrefpasig);
    
    $("#PcodOrMedRef").val('');
    $("#PdescOrdMedRef").val('');
    $("#PobserOrMedRefGe").val('');
}
function adjuntarOrdenMedConsultaRefN() {
    console.log('adjuntando');
    var dtaIn = {
        'cod': $("#NcodOrMedRef").val(),
        'desc': $("#NdescOrdMedRef").val(),
        'observa': $("#NobserOrMedRefGe").val()
    };
    ordenMedConsRef.push(dtaIn);
    var contordrefpasig='';
    for(var t=0;t<ordenMedConsRef.length;t++){
        contordrefpasig+=`<tr  >

            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefN(`+t+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].observa+`</td>
        </tr>`;
    }
    $("#NTablaListOrde_medRef").html(contordrefpasig);
    
    $("#NcodOrMedRef").val('');
    $("#NdescOrdMedRef").val('');
    $("#NobserOrMedRefGe").val('');
}
function adjuntarOrdenMedConsultaRefA() {
    console.log('adjuntando');
    var dtaIn = {
        'cod': $("#AcodOrMedRef").val(),
        'desc': $("#AdescOrdMedRef").val(),
        'observa': $("#AobserOrMedRefGe").val()
    };
    ordenMedConsRef.push(dtaIn);
    var contordrefpasig='';
    for(var t=0;t<ordenMedConsRef.length;t++){
        contordrefpasig+=`<tr  >

            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefA(`+t+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].observa+`</td>
        </tr>`;
    }
    $("#ATablaListOrde_medRef").html(contordrefpasig);
    
    $("#AcodOrMedRef").val('');
    $("#AdescOrdMedRef").val('');
    $("#AobserOrMedRefGe").val('');
}
function adjuntarOrdenMedConsultaRefM() {
    console.log('adjuntando');
    var dtaIn = {
        'cod': $("#McodOrMedRef").val(),
        'desc': $("#MdescOrdMedRef").val(),
        'observa': $("#MobserOrMedRefGe").val()
    };
    ordenMedConsRef.push(dtaIn);
    var contordrefpasig='';
    for(var t=0;t<ordenMedConsRef.length;t++){
        contordrefpasig+=`<tr  >

            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefM(`+t+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].observa+`</td>
        </tr>`;
    }
    $("#MTablaListOrde_medRef").html(contordrefpasig);
    
    $("#McodOrMedRef").val('');
    $("#MdescOrdMedRef").val('');
    $("#MobserOrMedRefGe").val('');
}
function adjuntarOrdenMedConsultaRefMN() {
    console.log('adjuntando');
    var dtaIn = {
        'cod': $("#MNcodOrMedRef").val(),
        'desc': $("#MNdescOrdMedRef").val(),
        'observa': $("#MNobserOrMedRefGe").val()
    };
    ordenMedConsRef.push(dtaIn);
    var contordrefpasig='';
    for(var t=0;t<ordenMedConsRef.length;t++){
        contordrefpasig+=`<tr  >

            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefMN(`+t+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].observa+`</td>
        </tr>`;
    }
    $("#MNTablaListOrde_medRef").html(contordrefpasig);
    
    $("#MNcodOrMedRef").val('');
    $("#MNdescOrdMedRef").val('');
    $("#MNobserOrMedRefGe").val('');
}
function adjuntarOrdenMedConsultaRefG() {
    console.log('adjuntando');
    var dtaIn = {
        'cod': $("#GcodOrMedRef").val(),
        'desc': $("#GdescOrdMedRef").val(),
        'observa': $("#GobserOrMedRefGe").val()
    };
    ordenMedConsRef.push(dtaIn);
    var contordrefpasig='';
    for(var t=0;t<ordenMedConsRef.length;t++){
        contordrefpasig+=`<tr  >

            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefG(`+t+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].observa+`</td>
        </tr>`;
    }
    $("#GTablaListOrde_medRef").html(contordrefpasig);
    
    $("#GcodOrMedRef").val('');
    $("#GdescOrdMedRef").val('');
    $("#GobserOrMedRefGe").val('');
}
function adjuntarOrdenMedConsultaRefSR() {
    console.log('adjuntando');
    var dtaIn = {
        'cod': $("#SRcodOrMedRef").val(),
        'desc': $("#SRdescOrdMedRef").val(),
        'observa': $("#SRobserOrMedRefGe").val()
    };
    ordenMedConsRef.push(dtaIn);
    var contordrefpasig='';
    for(var t=0;t<ordenMedConsRef.length;t++){
        contordrefpasig+=`<tr  >

            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefSR(`+t+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].observa+`</td>
        </tr>`;
    }
    $("#NutSSRTablaListOrde_medRef").html(contordrefpasig);
    
    $("#SRcodOrMedRef").val('');
    $("#SRdescOrdMedRef").val('');
    $("#SRobserOrMedRefGe").val('');
}
function borrarOrMedRef(index) {
    ordenMedConsRef.splice(index,1);
    var contordrefpasig='';
    for(var t=0;t<ordenMedConsRef.length;t++){
        contordrefpasig+=`<tr  >

            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRef(`+t+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].observa+`</td>
        </tr>`;
    }
    $("#TablaListOrde_medRef").html(contordrefpasig);
}
function borrarOrMedRefE(index) {
    ordenMedConsRef.splice(index,1);
    var contordrefpasig='';
    for(var t=0;t<ordenMedConsRef.length;t++){
        contordrefpasig+=`<tr  >

            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefE(`+t+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].observa+`</td>
        </tr>`;
    }
    $("#ETablaListOrde_medRef").html(contordrefpasig);
}
function borrarOrMedRefP(index) {
    ordenMedConsRef.splice(index,1);
    var contordrefpasig='';
    for(var t=0;t<ordenMedConsRef.length;t++){
        contordrefpasig+=`<tr  >

            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefP(`+t+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].observa+`</td>
        </tr>`;
    }
    $("#PTablaListOrde_medRef").html(contordrefpasig);
}
function borrarOrMedRefN(index) {
    ordenMedConsRef.splice(index,1);
    var contordrefpasig='';
    for(var t=0;t<ordenMedConsRef.length;t++){
        contordrefpasig+=`<tr  >

            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefN(`+t+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].observa+`</td>
        </tr>`;
    }
    $("#NTablaListOrde_medRef").html(contordrefpasig);
}
function borrarOrMedRefA(index) {
    ordenMedConsRef.splice(index,1);
    var contordrefpasig='';
    for(var t=0;t<ordenMedConsRef.length;t++){
        contordrefpasig+=`<tr  >

            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefA(`+t+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].observa+`</td>
        </tr>`;
    }
    $("#ATablaListOrde_medRef").html(contordrefpasig);
}
function borrarOrMedRefM(index) {
    ordenMedConsRef.splice(index,1);
    var contordrefpasig='';
    for(var t=0;t<ordenMedConsRef.length;t++){
        contordrefpasig+=`<tr  >

            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefM(`+t+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].observa+`</td>
        </tr>`;
    }
    $("#MTablaListOrde_medRef").html(contordrefpasig);
}
function borrarOrMedRefMN(index) {
    ordenMedConsRef.splice(index,1);
    var contordrefpasig='';
    for(var t=0;t<ordenMedConsRef.length;t++){
        contordrefpasig+=`<tr  >

            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefMN(`+t+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].observa+`</td>
        </tr>`;
    }
    $("#MNTablaListOrde_medRef").html(contordrefpasig);
}

function borrarOrMedRefG(index) {
    ordenMedConsRef.splice(index,1);
    var contordrefpasig='';
    for(var t=0;t<ordenMedConsRef.length;t++){
        contordrefpasig+=`<tr  >

            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefG(`+t+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].observa+`</td>
        </tr>`;
    }
    $("#GTablaListOrde_medRef").html(contordrefpasig);
}

function borrarOrMedRefSR(index) {
    ordenMedConsRef.splice(index,1);
    var contordrefpasig='';
    for(var t=0;t<ordenMedConsRef.length;t++){
        contordrefpasig+=`<tr  >

            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefSR(`+t+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRef[t].observa+`</td>
        </tr>`;
    }
    $("#NutSSRTablaListOrde_medRef").html(contordrefpasig);
}
function adjuntarOrdenMedConsultaRefPro() { 
    var dtaIn = {
        'cod': $("#codOrMedRefPro").val(),
        'desc': $("#descOrdMedRefPro").val(),
        'observa': $("#obserOrMedRefProGe").val()
    };
    ordenMedConsRefPro.push(dtaIn);
    var contormeasign='';
    for(var y=0;y<ordenMedConsRefPro.length;y++){
        contormeasign+=`<tr >
	
            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefPro(`+y+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].observa+`</td>
        </tr>`;
    }
    $("#TablaListOrde_medRefPro").html(contormeasign);
    $("#codOrMedRefPro").val('');
    $("#descOrdMedRefPro").val('');
    $("#obserOrMedRefProGe").val('');
}
function adjuntarOrdenMedConsultaRefProE() { 
    var dtaIn = {
        'cod': $("#EcodOrMedRefPro").val(),
        'desc': $("#EdescOrdMedRefPro").val(),
        'observa': $("#EobserOrMedRefProGe").val()
    };
    ordenMedConsRefPro.push(dtaIn);
    var contormeasign='';
    for(var y=0;y<ordenMedConsRefPro.length;y++){
        contormeasign+=`<tr >
	
            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefProE(`+y+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].observa+`</td>
        </tr>`;
    }
    $("#ETablaListOrde_medRefPro").html(contormeasign);
    $("#EcodOrMedRefPro").val('');
    $("#EdescOrdMedRefPro").val('');
    $("#EobserOrMedRefProGe").val('');
}
function adjuntarOrdenMedConsultaRefProP() { 
    var dtaIn = {
        'cod': $("#PcodOrMedRefPro").val(),
        'desc': $("#PdescOrdMedRefPro").val(),
        'observa': $("#PobserOrMedRefProGe").val()
    };
    ordenMedConsRefPro.push(dtaIn);
    var contormeasign='';
    for(var y=0;y<ordenMedConsRefPro.length;y++){
        contormeasign+=`<tr >
	
            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefProP(`+y+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].observa+`</td>
        </tr>`;
    }
    $("#PTablaListOrde_medRefPro").html(contormeasign);
    $("#PcodOrMedRefPro").val('');
    $("#PdescOrdMedRefPro").val('');
    $("#PobserOrMedRefProGe").val('');
}
function adjuntarOrdenMedConsultaRefProN() { 
    var dtaIn = {
        'cod': $("#NcodOrMedRefPro").val(),
        'desc': $("#NdescOrdMedRefPro").val(),
        'observa': $("#NobserOrMedRefProGe").val()
    };
    ordenMedConsRefPro.push(dtaIn);
    var contormeasign='';
    for(var y=0;y<ordenMedConsRefPro.length;y++){
        contormeasign+=`<tr >
	
            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefProN(`+y+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].observa+`</td>
        </tr>`;
    }
    $("#NTablaListOrde_medRefPro").html(contormeasign);
    $("#NcodOrMedRefPro").val('');
    $("#NdescOrdMedRefPro").val('');
    $("#NobserOrMedRefProGe").val('');
}
function adjuntarOrdenMedConsultaRefProA() { 
    var dtaIn = {
        'cod': $("#AcodOrMedRefPro").val(),
        'desc': $("#AdescOrdMedRefPro").val(),
        'observa': $("#AobserOrMedRefProGe").val()
    };
    ordenMedConsRefPro.push(dtaIn);
    var contormeasign='';
    for(var y=0;y<ordenMedConsRefPro.length;y++){
        contormeasign+=`<tr >
	
            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefProA(`+y+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].observa+`</td>
        </tr>`;
    }
    $("#ATablaListOrde_medRefPro").html(contormeasign);
    $("#AcodOrMedRefPro").val('');
    $("#AdescOrdMedRefPro").val('');
    $("#AobserOrMedRefProGe").val('');
}
function adjuntarOrdenMedConsultaRefProM() { 
    var dtaIn = {
        'cod': $("#McodOrMedRefPro").val(),
        'desc': $("#MdescOrdMedRefPro").val(),
        'observa': $("#MobserOrMedRefProGe").val()
    };
    ordenMedConsRefPro.push(dtaIn);
    var contormeasign='';
    for(var y=0;y<ordenMedConsRefPro.length;y++){
        contormeasign+=`<tr >
	
            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefProM(`+y+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].observa+`</td>
        </tr>`;
    }
    $("#MTablaListOrde_medRefPro").html(contormeasign);
    $("#McodOrMedRefPro").val('');
    $("#MdescOrdMedRefPro").val('');
    $("#MobserOrMedRefProGe").val('');
}
function adjuntarOrdenMedConsultaRefProMN() { 
    var dtaIn = {
        'cod': $("#MNcodOrMedRefPro").val(),
        'desc': $("#MNdescOrdMedRefPro").val(),
        'observa': $("#MNobserOrMedRefProGe").val()
    };
    ordenMedConsRefPro.push(dtaIn);
    var contormeasign='';
    for(var y=0;y<ordenMedConsRefPro.length;y++){
        contormeasign+=`<tr >
	
            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefProMN(`+y+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].observa+`</td>
        </tr>`;
    }
    $("#MNTablaListOrde_medRefPro").html(contormeasign);
    $("#MNcodOrMedRefPro").val('');
    $("#MNdescOrdMedRefPro").val('');
    $("#MNobserOrMedRefProGe").val('');
}
function adjuntarOrdenMedConsultaRefProG() { 
    var dtaIn = {
        'cod': $("#GcodOrMedRefPro").val(),
        'desc': $("#GdescOrdMedRefPro").val(),
        'observa': $("#GobserOrMedRefProGe").val()
    };
    ordenMedConsRefPro.push(dtaIn);
    var contormeasign='';
    for(var y=0;y<ordenMedConsRefPro.length;y++){
        contormeasign+=`<tr >
	
            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefProG(`+y+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].observa+`</td>
        </tr>`;
    }
    $("#GTablaListOrde_medRefPro").html(contormeasign);
    $("#GcodOrMedRefPro").val('');
    $("#GdescOrdMedRefPro").val('');
    $("#GobserOrMedRefProGe").val('');
}
function adjuntarOrdenMedConsultaRefProSR() { 
    var dtaIn = {
        'cod': $("#SRcodOrMedRefPro").val(),
        'desc': $("#SRdescOrdMedRefPro").val(),
        'observa': $("#SRobserOrMedRefProGe").val()
    };
    ordenMedConsRefPro.push(dtaIn);
    var contormeasign='';
    for(var y=0;y<ordenMedConsRefPro.length;y++){
        contormeasign+=`<tr >
	
            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefProSR(`+y+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].observa+`</td>
        </tr>`;
    }
    $("#NutSSRTablaListOrde_medRefPro").html(contormeasign);
    $("#SRcodOrMedRefPro").val('');
    $("#SRdescOrdMedRefPro").val('');
    $("#SRobserOrMedRefProGe").val('');
}
function borrarOrMedRefPro(index){
    ordenMedConsRefPro.splice(index,1);
    var contormeasign='';
    for(var y=0;y<ordenMedConsRefPro.length;y++){
        contormeasign+=`<tr >
	
            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefPro(`+y+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].observa+`</td>
        </tr>`;
    }
    $("#TablaListOrde_medRefPro").html(contormeasign);
}
function borrarOrMedRefProE(index){
    ordenMedConsRefPro.splice(index,1);
    var contormeasign='';
    for(var y=0;y<ordenMedConsRefPro.length;y++){
        contormeasign+=`<tr >
	
            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefProE(`+y+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].observa+`</td>
        </tr>`;
    }
    $("#ETablaListOrde_medRefPro").html(contormeasign);
}
function borrarOrMedRefProP(index){
    ordenMedConsRefPro.splice(index,1);
    var contormeasign='';
    for(var y=0;y<ordenMedConsRefPro.length;y++){
        contormeasign+=`<tr >
	
            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefProP(`+y+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].observa+`</td>
        </tr>`;
    }
    $("#PTablaListOrde_medRefPro").html(contormeasign);
}
function borrarOrMedRefProN(index){
    ordenMedConsRefPro.splice(index,1);
    var contormeasign='';
    for(var y=0;y<ordenMedConsRefPro.length;y++){
        contormeasign+=`<tr >
	
            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefProN(`+y+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].observa+`</td>
        </tr>`;
    }
    $("#NTablaListOrde_medRefPro").html(contormeasign);
}
function borrarOrMedRefProA(index){
    ordenMedConsRefPro.splice(index,1);
    var contormeasign='';
    for(var y=0;y<ordenMedConsRefPro.length;y++){
        contormeasign+=`<tr >
	
            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefProA(`+y+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].observa+`</td>
        </tr>`;
    }
    $("#ATablaListOrde_medRefPro").html(contormeasign);
}
function borrarOrMedRefProM(index){
    ordenMedConsRefPro.splice(index,1);
    var contormeasign='';
    for(var y=0;y<ordenMedConsRefPro.length;y++){
        contormeasign+=`<tr >
	
            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefProM(`+y+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].observa+`</td>
        </tr>`;
    }
    $("#MTablaListOrde_medRefPro").html(contormeasign);
}
function borrarOrMedRefProMN(index){
    ordenMedConsRefPro.splice(index,1);
    var contormeasign='';
    for(var y=0;y<ordenMedConsRefPro.length;y++){
        contormeasign+=`<tr >
	
            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefProMN(`+y+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].observa+`</td>
        </tr>`;
    }
    $("#MNTablaListOrde_medRefPro").html(contormeasign);
}
function borrarOrMedRefProG(index){
    ordenMedConsRefPro.splice(index,1);
    var contormeasign='';
    for(var y=0;y<ordenMedConsRefPro.length;y++){
        contormeasign+=`<tr >
	
            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefProG(`+y+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].observa+`</td>
        </tr>`;
    }
    $("#GTablaListOrde_medRefPro").html(contormeasign);
}
function borrarOrMedRefProSR(index){
    ordenMedConsRefPro.splice(index,1);
    var contormeasign='';
    for(var y=0;y<ordenMedConsRefPro.length;y++){
        contormeasign+=`<tr >
	
            <td><a class="btn btn-danger" style="font-size:10px;" onclick="borrarOrMedRefProSR(`+y+`)">BORRAR</a></td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].cod+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].desc+`</td>
            <td style="font-size:10px;">`+ordenMedConsRefPro[y].observa+`</td>
        </tr>`;
    }
    $("#NutSSRTablaListOrde_medRefPro").html(contormeasign);
}
function obtenerConsecutivoJSONConsultasG(){
    console.log(generales);
    var conse = 0;
    for (var i = 0; i < generales.length; i++) {
        if (generales[i].idJSON_consulta > conse) {
            conse = generales[i].idJSON_consulta;
        }
    }
    return conse + 1;
}
function obtenerConsecutivoJSONConsultasE(){
    console.log(enfermeria);
    var conse = 0;
    for (var i = 0; i < enfermeria.length; i++) {
        if (enfermeria[i].idJSON_consulta > conse) {
            conse = enfermeria[i].idJSON_consulta;
        }
    }
    return conse + 1;
}
function obtenerConsecutivoJSONConsultasP(){
    console.log(psicologia);
    var conse = 0;
    for (var i = 0; i < psicologia.length; i++) {
        if (psicologia[i].idJSON_consulta > conse) {
            conse = psicologia[i].idJSON_consulta;
        }
    }
    return conse + 1;
}
function obtenerConsecutivoJSONConsultasN(){
    console.log(nutricional);
    var conse = 0;
    for (var i = 0; i < nutricional.length; i++) {
        if (nutricional[i].idJSON_consulta > conse) {
            conse = nutricional[i].idJSON_consulta;
        }
    }
    return conse + 1;
}
function obtenerConsecutivoJSONConsultasA(){
    console.log(adulto);
    var conse = 0;
    for (var i = 0; i < adulto.length; i++) {
        if (adulto[i].idJSON_consulta > conse) {
            conse = adulto[i].idJSON_consulta;
        }
    }
    return conse + 1;
}
function obtenerConsecutivoJSONConsultasM(){
    console.log(menor);
    var conse = 0;
    for (var i = 0; i < menor.length; i++) {
        if (menor[i].idJSON_consulta > conse) {
            conse = menor[i].idJSON_consulta;
        }
    }
    return conse + 1;
}
function obtenerConsecutivoJSONConsultasGest(){
    console.log(gestante);
    var conse = 0;
    for (var i = 0; i < gestante.length; i++) {
        if (gestante[i].idJSON_consulta > conse) {
            conse = gestante[i].idJSON_consulta;
        }
    }
    return conse + 1;
}
function obtenerConsecutivoJSONProcedimiento(){
    console.log(procedimientos);
    var conse = 0;
    for (var i = 0; i < procedimientos.length; i++) {
        if (procedimientos[i].idJSON_procedimiento > conse) {
            conse = procedimientos[i].idJSON_procedimiento;
        }
    }
    return conse + 1;
}

function obtenerConsecutivoJSONConsultasSR(){
    console.log(SSR);
    var conse = 0;
    for (var i = 0; i < SSR.length; i++) {
        if (SSR[i].idJSON_consulta > conse) {
            conse = SSR[i].idJSON_consulta;
        }
    }
    return conse + 1;
}
function regitrarConsultaGeneral(){
    console.log('consulta general registrando');
    if(listadoCIEPa.length!=0 && $("#tipoConsulta").val()!='' && $("#finalidadConsulta").val()!='' && $("#causaExternaConsulta").val()!='' && $("#motivoConsulta").val()!='' && $("#tipoDiagnosPrinc").val()!=''){

        var cieIngCon = '';
        for (var i = 0; i < listadoCIEPa.length; i++) {
    
            cieIngCon += listadoCIEPa[i].cod + '-,-' + listadoCIEPa[i].desc + '   -   ';
    
        }
        var medIngCon = '';
        var ordenesIngCon = '';
        var ordenesIngConRef = '';
        var ordenesIngConRefPro = '';
    
        for (var i = 0; i < ordenMedCons.length; i++) {
    
            ordenesIngCon += ordenMedCons[i].cod + '-,-' + ordenMedCons[i].desc + '-,-' + ordenMedCons[i].observa + '   -   ';
    
        }
        for (var i = 0; i < ordenMedConsRef.length; i++) {
    
            ordenesIngConRef += ordenMedConsRef[i].cod + '-,-' + ordenMedConsRef[i].desc + '-,-' + ordenMedConsRef[i].observa + '   -   ';
    
        }
        for (var i = 0; i < ordenMedConsRefPro.length; i++) {
    
            ordenesIngConRefPro += ordenMedConsRefPro[i].cod + '-,-' + ordenMedConsRefPro[i].desc + '-,-' + ordenMedConsRefPro[i].observa + '   -   ';
    
        }
    
        for (var i = 0; i < medAsigCons.length; i++) {
            medIngCon += medAsigCons[i].nombre + '-,-' + medAsigCons[i].presentacion + '-,-' + medAsigCons[i].periodicidad + '-,-' + medAsigCons[i].catdosis + '-,-' + medAsigCons[i].viadmin + '-,-' + medAsigCons[i].tiempo + '-,-' + medAsigCons[i].total + '   -   ';
    
        }
      
        hoy = new Date();
        var mes;
        if(parseInt(( hoy.getMonth() + 1 ))<10){
            mes='0'+( hoy.getMonth() + 1 );
        }else{
            mes=( hoy.getMonth() + 1 );
        }
        fecha = hoy.getDate() + '-' + mes + '-' + hoy.getFullYear();
        hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();


        var dataIn = {
            'id_consulta': 0,
            'idJSON_consulta':obtenerConsecutivoJSONConsultasG(),
            'id_paciente': paciente.id,
            'idJSON_paciente': paciente.idJSON,
            'numid_pac': paciente.idRegPac,
            'tipoid_pac': paciente.tipoidRegPac,
            'tipoIDUserReg': usuario.tipoid,
            'numeroIDUserReg': usuario.numid,
            'institucion': usuario.institucion,
            'id_registra': usuario.numid,
            'tipoid_registra': usuario.tipoid,
            'fechaConsulta': fecha,
            'horaConsulta': hora,
            'profAtiende':  usuario.nombres,
            'dptoatencion': ($("#dptoatencion-general").val()) ? $("#dptoatencion-general").val() : '',
            'mnpoatencion': ($("#mnpoatencion-general").val()) ? $("#mnpoatencion-general").val() : '',
            'atencion': ($("#atencion-general").val()) ? $("#atencion-general").val() : '',
            'tipoConsulta': ($("#tipoConsulta").val()) ? $("#tipoConsulta").val() : '',
            'finalidadConsulta': ($("#finalidadConsulta").val()) ? $("#finalidadConsulta").val() : '',
            'causaExternaConsulta': ($("#causaExternaConsulta").val()) ? $("#causaExternaConsulta").val() : '',
            'motivoConsulta': ($("#motivoConsulta").val()) ? $("#motivoConsulta").val() : '',
            'enfermedadActualConsulta': ($("#enfermedadActualConsulta").val()) ? $("#enfermedadActualConsulta").val() : '',
            'antecedentesConsulta': ($("#antecedentesConsulta").val()) ? $("#antecedentesConsulta").val() : '',
            'tempEA': ($("#tempEA").val()) ? $("#tempEA").val() : '',
            'pulsoEA': ($("#pulsoEA").val()) ? $("#pulsoEA").val() : '',
            'pesoEA': ($("#pesoEA").val()) ? $("#pesoEA").val() : '',
            'tallaEA': ($("#tallaEA").val()) ? $("#tallaEA").val() : '',
            'imcEA': ($("#imcEA").val()) ? $("#imcEA").val() : '',
            'frecuenciarEA': ($("#frecuenciarEA").val()) ? $("#frecuenciarEA").val() : '',
            'tensionaEA': ($("#tensionaEA").val()) ? $("#tensionaEA").val() : '',
            'obserConsuAdulto': ($("#obserConsuAdulto").val()) ? $("#obserConsuAdulto").val() : '',
            'notasEvolucion': ($("#notasEvolucion").val()) ? $("#notasEvolucion").val() : '',
            'recomNotas': ($("#recomNotas").val()) ? $("#recomNotas").val() : '',
            'listadoCIEPa': cieIngCon,
            'tipoDiagnosPrinc': $("#tipoDiagnosPrinc").val(),
            'medAsigCons': medIngCon,
            'ordenMedCons': ordenesIngCon,
            'ordenMedConsRef': ordenesIngConRef,
            'ordenMedConsRefPro': ordenesIngConRefPro,
            'tipoSerRef': ($("#tipoServicioReferir").val()) ? $("#tipoServicioReferir").val() : '',
            'obseSerRef': ($("#ObservacionesReferir").val()) ? $("#ObservacionesReferir").val() : '',
            'IpsServicioReferir': ($("#IpsServicioReferir").val()) ? $("#IpsServicioReferir").val() : '',
            'IpsProcedeimientoReferir': ($("#IpsProcedeimientoReferir").val()) ? $("#IpsProcedeimientoReferir").val() : '',
            'estado': 1 
        };
        console.log(dataIn);
        varDataIn={
            'id_paciente': paciente.id,
            'idJSON_paciente': paciente.idJSON,
            'numid_pac': paciente.idRegPac,
            'tipoid_pac': paciente.tipoidRegPac,
            'institucion': usuario.institucion,
            'data':JSON.stringify(dataIn),
            'key':'GimmidsApp'
        };
        if(paciente.estado==1){
            $.ajax({
                url: "https://saludsp.com.co/api/servicios/registerGeneralConsultation.php",
                type: "post",
                data: {'datos': varDataIn},
                async:false
            }).done(function(res){
                console.log(res);
                console.log("Respuesta: "); 
                try {
                    var data=JSON.parse(res);   
                    console.log(data);  
                    if (data.STATUS == 'OK' && (data.ID!=null && data.ID!=undefined && data.ID!=0)) {
                        dataIn.id_consulta = data.ID;
                        generales.push(dataIn);
                        fs.writeFileSync(__dirname+'/json/consultas_generales.json', JSON.stringify(generales));
                        localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                        localStorage.setItem('consultaRegistradaTipo', 1);
                        alert('Consulta Registrada remota y localmente con exito!');
                        
                         imprimirConsultaMedica();
                        $("#modal-imprimirConsulta").modal('show');
                    } else {
        
                        alert(data.ERROR);
                        
                        if (confirm('Problemas al registrar consulta al servidor. Desea volver a intentarlo, si selecciona cancelar se almacenara localmente?')) {
                            regitrarConsultaGeneral(); 

                        } else {
                            dataIn.estado = 0;  
                            generales.push(dataIn);
                            fs.writeFileSync(__dirname+'/json/consultas_generales.json', JSON.stringify(generales));
                            localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                            localStorage.setItem('consultaRegistradaTipo', 1);
                            alert('Consulta Registrada localmente con exito!');
                            imprimirConsultaMedica();
                            $("#modal-imprimirConsulta").modal('show');
                        


                        }
                    }


                } catch (error) {
                    if(confirm('Error al registrar la consulta al servidor. Desea volver a intentarlo? Si selecciona cancelar se almacenara localmente.')){
                        regitrarConsultaGeneral();
                    }else{
                        dataIn.estado = 0;  
                        generales.push(dataIn);
                        fs.writeFileSync(__dirname+'/json/consultas_generales.json', JSON.stringify(generales));
                        localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                        localStorage.setItem('consultaRegistradaTipo', 1);
                        alert('Consulta Registrada localmente con exito!');
                        imprimirConsultaMedica();
                        $("#modal-imprimirConsulta").modal('show');
                    
                    }
                }


            } ).fail(function() { 
                dataIn.estado = 0;  
                generales.push(dataIn);
                fs.writeFileSync(__dirname+'/json/consultas_generales.json', JSON.stringify(generales));
                localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                localStorage.setItem('consultaRegistradaTipo', 1);
                alert('Consulta Registrada localmente con exito!');
                imprimirConsultaMedica();
                $("#modal-imprimirConsulta").modal('show');
            });
        }else{
            dataIn.estado = 0;  
            generales.push(dataIn);
            fs.writeFileSync(__dirname+'/json/consultas_generales.json', JSON.stringify(generales));
            localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
            localStorage.setItem('consultaRegistradaTipo', 1);
            alert('Consulta Registrada localmente con exito!');
            imprimirConsultaMedica();
            $("#modal-imprimirConsulta").modal('show');
        
        }
    }else{
        alert('Hacen falta varibales obligatorias por digitar!..');
    }

}
function regitrarConsultaEnfermeria(){
    console.log('consulta enfermeria registrando');
    if(listadoCIEPa.length!=0 && $("#EtipoConsulta").val()!='' && $("#EfinalidadConsulta").val()!='' && $("#EcausaExternaConsulta").val()!='' && $("#EmotivoConsulta").val()!='' && $("#EtipoDiagnosPrinc").val()!=''){

        var cieIngCon = '';
        for (var i = 0; i < listadoCIEPa.length; i++) {
    
            cieIngCon += listadoCIEPa[i].cod + '-,-' + listadoCIEPa[i].desc + '   -   ';
    
        }
        var medIngCon = '';
        var ordenesIngCon = '';
        var ordenesIngConRef = '';
        var ordenesIngConRefPro = '';
    
        for (var i = 0; i < ordenMedCons.length; i++) {
    
            ordenesIngCon += ordenMedCons[i].cod + '-,-' + ordenMedCons[i].desc + '-,-' + ordenMedCons[i].observa + '   -   ';
    
        }
        for (var i = 0; i < ordenMedConsRef.length; i++) {
    
            ordenesIngConRef += ordenMedConsRef[i].cod + '-,-' + ordenMedConsRef[i].desc + '-,-' + ordenMedConsRef[i].observa + '   -   ';
    
        }
        for (var i = 0; i < ordenMedConsRefPro.length; i++) {
    
            ordenesIngConRefPro += ordenMedConsRefPro[i].cod + '-,-' + ordenMedConsRefPro[i].desc + '-,-' + ordenMedConsRefPro[i].observa + '   -   ';
    
        }
    
        for (var i = 0; i < medAsigCons.length; i++) {
            medIngCon += medAsigCons[i].nombre + '-,-' + medAsigCons[i].presentacion + '-,-' + medAsigCons[i].periodicidad + '-,-' + medAsigCons[i].catdosis + '-,-' + medAsigCons[i].viadmin + '-,-' + medAsigCons[i].tiempo + '-,-' + medAsigCons[i].total + '   -   ';
    
        }
      
        hoy = new Date();
        var mes;
        if(parseInt(( hoy.getMonth() + 1 ))<10){
            mes='0'+( hoy.getMonth() + 1 );
        }else{
            mes=( hoy.getMonth() + 1 );
        }
        fecha = hoy.getDate() + '-' + mes + '-' + hoy.getFullYear();
        hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();
    
    
        var dataIn = {
            'id_consulta': 0,
            'idJSON_consulta':obtenerConsecutivoJSONConsultasE(),
            'id_paciente': paciente.id,
            'idJSON_paciente': paciente.idJSON,
            'numid_pac': paciente.idRegPac,
            'tipoid_pac': paciente.tipoidRegPac,
            'tipoIDUserReg': usuario.tipoid,
            'numeroIDUserReg': usuario.numid,
            'institucion': usuario.institucion,
            'id_registra': usuario.numid,
            'tipoid_registra': usuario.tipoid,
            'fechaConsulta': fecha,
            'horaConsulta': hora,
            'profAtiende':  usuario.nombres,
            'dptoatencion': ($("#dptoatencion-enfermeria").val()) ? $("#dptoatencion-enfermeria").val() : '',
            'mnpoatencion': ($("#mnpoatencion-enfermeria").val()) ? $("#mnpoatencion-enfermeria").val() : '',
            'atencion': ($("#atencion-enfermeria").val()) ? $("#atencion-enfermeria").val() : '',
            'tipoConsulta': ($("#EtipoConsulta").val()) ? $("#EtipoConsulta").val() : '',
            'finalidadConsulta': ($("#EfinalidadConsulta").val()) ? $("#EfinalidadConsulta").val() : '',
            'causaExternaConsulta': ($("#EcausaExternaConsulta").val()) ? $("#EcausaExternaConsulta").val() : '',
            'motivoConsulta': ($("#EmotivoConsulta").val()) ? $("#EmotivoConsulta").val() : '',
            'enfermedadActualConsulta': ($("#EenfermedadActualConsulta").val()) ? $("#EenfermedadActualConsulta").val() : '',
            'antecedentesConsulta': ($("#EantecedentesConsulta").val()) ? $("#EantecedentesConsulta").val() : '',
            'tempEA': ($("#EtempEA").val()) ? $("#EtempEA").val() : '',
            'pulsoEA': ($("#EpulsoEA").val()) ? $("#EpulsoEA").val() : '',
            'pesoEA': ($("#EpesoEA").val()) ? $("#EpesoEA").val() : '',
            'tallaEA': ($("#EtallaEA").val()) ? $("#EtallaEA").val() : '',
            'imcEA': ($("#EimcEA").val()) ? $("#EimcEA").val() : '',
            'frecuenciarEA': ($("#EfrecuenciarEA").val()) ? $("#EfrecuenciarEA").val() : '',
            'tensionaEA': ($("#EtensionaEA").val()) ? $("#EtensionaEA").val() : '',
            'obserConsuAdulto': ($("#EobserConsuAdulto").val()) ? $("#EobserConsuAdulto").val() : '',
            'notasEvolucion': ($("#EnotasEvolucion").val()) ? $("#EnotasEvolucion").val() : '',
            'recomNotas': ($("#ErecomNotas").val()) ? $("#ErecomNotas").val() : '',
            'listadoCIEPa': cieIngCon,
            'tipoDiagnosPrinc': $("#EtipoDiagnosPrinc").val(),
            'medAsigCons': medIngCon,
            'ordenMedCons': ordenesIngCon,
            'ordenMedConsRef': ordenesIngConRef,
            'ordenMedConsRefPro': ordenesIngConRefPro,
            'tipoSerRef': ($("#EtipoServicioReferir").val()) ? $("#EtipoServicioReferir").val() : '',
            'obseSerRef': ($("#EObservacionesReferir").val()) ? $("#EObservacionesReferir").val() : '',
            'IpsServicioReferir': ($("#EIpsServicioReferir").val()) ? $("#EIpsServicioReferir").val() : '',
            'IpsProcedeimientoReferir': ($("#EIpsProcedeimientoReferir").val()) ? $("#EIpsProcedeimientoReferir").val() : '',
            'estado': 1 
        };
        console.log(dataIn);
        varDataIn={
            'id_paciente': paciente.id,
            'idJSON_paciente': paciente.idJSON,
            'numid_pac': paciente.idRegPac,
            'tipoid_pac': paciente.tipoidRegPac,
            'institucion': usuario.institucion,
            'data':JSON.stringify(dataIn),
            'key':'GimmidsApp'
        };
        if(paciente.estado==1){
            $.ajax({
                url: "https://saludsp.com.co/api/servicios/registerNurseConsultation.php",
                type: "post",
                data: {'datos': varDataIn},
                async:false
            }).done(function(res){
                console.log(res);
                console.log("Respuesta: "); 
                try {
                    var data=JSON.parse(res);
                    console.log(data);  
                    if (data.STATUS == 'OK' && (data.ID!=null && data.ID!=undefined && data.ID!=0)) {
                        dataIn.id_consulta = data.ID;
                        enfermeria.push(dataIn);
                        fs.writeFileSync(__dirname+'/json/consultas_enfermeria.json', JSON.stringify(enfermeria));
                        localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                        localStorage.setItem('consultaRegistradaTipo', 2);
                        alert('Consulta Registrada remota y localmente con exito!');
                        
                         imprimirConsultaMedica();
                        $("#modal-imprimirConsulta").modal('show');
                    } else {
                        console.log(data);  
                        
                        alert(data.ERROR);
                        
                        if (confirm('Problemas al registrar consulta al servidor. Desea volver a intentarlo, si selecciona cancelar se almacenara localmente?')) {
                            regitrarConsultaEnfermeria(); 
        
                        } else {
                            dataIn.estado = 0;  
                            enfermeria.push(dataIn);
                            fs.writeFileSync(__dirname+'/json/consultas_enfermeria.json', JSON.stringify(enfermeria));
                            localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                            localStorage.setItem('consultaRegistradaTipo', 2);
                            alert('Consulta Registrada localmente con exito!');
                            imprimirConsultaMedica();
                            $("#modal-imprimirConsulta").modal('show');
                        
        
        
                        } 
                    }
        
        
                } catch (error) {
                    if(confirm('Error al registrar la consulta al servidor. Desea volver a intentarlo? Si selecciona cancelar se almacenara localmente.')){
                        regitrarConsultaEnfermeria();
                    }else{
                        dataIn.estado = 0;  
                        enfermeria.push(dataIn);
                        fs.writeFileSync(__dirname+'/json/consultas_enfermeria.json', JSON.stringify(enfermeria));
                        localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                        localStorage.setItem('consultaRegistradaTipo', 2);
                        alert('Consulta Registrada localmente con exito!');
                        imprimirConsultaMedica();
                        $("#modal-imprimirConsulta").modal('show');
                    
                    }
                }
        
        
            } ).fail(function() { 
                dataIn.estado = 0;  
                enfermeria.push(dataIn);
                fs.writeFileSync(__dirname+'/json/consultas_enfermeria.json', JSON.stringify(enfermeria));
                localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                localStorage.setItem('consultaRegistradaTipo', 2);
                alert('Consulta Registrada localmente con exito!');
                imprimirConsultaMedica();
                $("#modal-imprimirConsulta").modal('show');
            });
        }else{
            dataIn.estado = 0;  
            enfermeria.push(dataIn);
            fs.writeFileSync(__dirname+'/json/consultas_enfermeria.json', JSON.stringify(enfermeria));
            localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
            localStorage.setItem('consultaRegistradaTipo', 2);
            alert('Consulta Registrada localmente con exito!');
            imprimirConsultaMedica();
            $("#modal-imprimirConsulta").modal('show');
        
        }
      
    }else{
        alert('Hacen falta varibales obligatorias por digitar!..');
    }
}

function regitrarConsultaPsicologia(){
    console.log('consulta psicologia registrando');
    if(listadoCIEPa.length!=0 && $("#PEtipoConsulta").val()!='' && $("#PEfinalidadConsulta").val()!='' && $("#PEcausaExternaConsulta").val()!='' && $("#PEmotivoConsulta").val()!='' && $("#PEtipoDiagnosPrinc").val()!=''){

        var cieIngCon = '';
        for (var i = 0; i < listadoCIEPa.length; i++) {
    
            cieIngCon += listadoCIEPa[i].cod + '-,-' + listadoCIEPa[i].desc + '   -   ';
    
        }
        var medIngCon = '';
        var ordenesIngCon = '';
        var ordenesIngConRef = '';
        var ordenesIngConRefPro = '';
    
        for (var i = 0; i < ordenMedCons.length; i++) {
    
            ordenesIngCon += ordenMedCons[i].cod + '-,-' + ordenMedCons[i].desc + '-,-' + ordenMedCons[i].observa + '   -   ';
    
        }
        for (var i = 0; i < ordenMedConsRef.length; i++) {
    
            ordenesIngConRef += ordenMedConsRef[i].cod + '-,-' + ordenMedConsRef[i].desc + '-,-' + ordenMedConsRef[i].observa + '   -   ';
    
        }
        for (var i = 0; i < ordenMedConsRefPro.length; i++) {
    
            ordenesIngConRefPro += ordenMedConsRefPro[i].cod + '-,-' + ordenMedConsRefPro[i].desc + '-,-' + ordenMedConsRefPro[i].observa + '   -   ';
    
        }
    
        for (var i = 0; i < medAsigCons.length; i++) {
            medIngCon += medAsigCons[i].nombre + '-,-' + medAsigCons[i].presentacion + '-,-' + medAsigCons[i].periodicidad + '-,-' + medAsigCons[i].catdosis + '-,-' + medAsigCons[i].viadmin + '-,-' + medAsigCons[i].tiempo + '-,-' + medAsigCons[i].total + '   -   ';
    
        }
      
        hoy = new Date();
        var mes;
        if(parseInt(( hoy.getMonth() + 1 ))<10){
            mes='0'+( hoy.getMonth() + 1 );
        }else{
            mes=( hoy.getMonth() + 1 );
        }
        fecha = hoy.getDate() + '-' + mes + '-' + hoy.getFullYear();
        hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();
    
    
        var dataIn = {
            'id_consulta': 0,
            'idJSON_consulta':obtenerConsecutivoJSONConsultasP(),
            'id_paciente': paciente.id,
            'idJSON_paciente': paciente.idJSON,
            'numid_pac': paciente.idRegPac,
            'tipoid_pac': paciente.tipoidRegPac,
            'tipoIDUserReg': usuario.tipoid,
            'numeroIDUserReg': usuario.numid,
            'institucion': usuario.institucion,
            'id_registra': usuario.numid,
            'tipoid_registra': usuario.tipoid,
            'fechaConsulta': fecha,
            'horaConsulta': hora,
            'profAtiende':  usuario.nombres,
            'dptoatencion': ($("#dptoatencion-psicologia").val()) ? $("#dptoatencion-psicologia").val() : '',
            'mnpoatencion': ($("#mnpoatencion-psicologia").val()) ? $("#mnpoatencion-psicologia").val() : '',
            'atencion': ($("#atencion-psicologia").val()) ? $("#atencion-psicologia").val() : '',
            'tipoConsulta': ($("#PtipoConsulta").val()) ? $("#PtipoConsulta").val() : '',
            'finalidadConsulta': ($("#PfinalidadConsulta").val()) ? $("#PfinalidadConsulta").val() : '',
            'causaExternaConsulta': ($("#PcausaExternaConsulta").val()) ? $("#PcausaExternaConsulta").val() : '',
            'motivoConsulta': ($("#PmotivoConsulta").val()) ? $("#PmotivoConsulta").val() : '',
            'enfermedadActualConsulta': ($("#PenfermedadActualConsulta").val()) ? $("#PenfermedadActualConsulta").val() : '',
            'antecedentesConsulta': ($("#PantecedentesConsulta").val()) ? $("#PantecedentesConsulta").val() : '',
            'tempEA': ($("#PtempEA").val()) ? $("#PtempEA").val() : '',
            'pulsoEA': ($("#PpulsoEA").val()) ? $("#PpulsoEA").val() : '',
            'pesoEA': ($("#PpesoEA").val()) ? $("#PpesoEA").val() : '',
            'tallaEA': ($("#PtallaEA").val()) ? $("#PtallaEA").val() : '',
            'imcEA': ($("#PimcEA").val()) ? $("#PimcEA").val() : '',
            'frecuenciarEA': ($("#PfrecuenciarEA").val()) ? $("#PfrecuenciarEA").val() : '',
            'tensionaEA': ($("#PtensionaEA").val()) ? $("#PtensionaEA").val() : '',
            'obserConsuAdulto': ($("#PobserConsuAdulto").val()) ? $("#PobserConsuAdulto").val() : '',
            'notasEvolucion': ($("#PnotasEvolucion").val()) ? $("#PnotasEvolucion").val() : '',
            'recomNotas': ($("#PrecomNotas").val()) ? $("#PrecomNotas").val() : '',
            'listadoCIEPa': cieIngCon,
            'tipoDiagnosPrinc': $("#PtipoDiagnosPrinc").val(),
            'medAsigCons': medIngCon,
            'ordenMedCons': ordenesIngCon,
            'ordenMedConsRef': ordenesIngConRef,
            'ordenMedConsRefPro': ordenesIngConRefPro,
            'tipoSerRef': ($("#PtipoServicioReferir").val()) ? $("#PtipoServicioReferir").val() : '',
            'obseSerRef': ($("#PObservacionesReferir").val()) ? $("#PObservacionesReferir").val() : '',
            'IpsServicioReferir': ($("#PIpsServicioReferir").val()) ? $("#PIpsServicioReferir").val() : '',
            'IpsProcedeimientoReferir': ($("#PIpsProcedeimientoReferir").val()) ? $("#PIpsProcedeimientoReferir").val() : '',
            'estado': 1 
        };
        console.log(dataIn);
        varDataIn={
            'id_paciente': paciente.id,
            'idJSON_paciente': paciente.idJSON,
            'numid_pac': paciente.idRegPac,
            'tipoid_pac': paciente.tipoidRegPac,
            'institucion': usuario.institucion,
            'data':JSON.stringify(dataIn),
            'key':'GimmidsApp'
        };
        if(paciente.estado==1){
            $.ajax({
                url: "https://saludsp.com.co/api/servicios/registerPsicoConsultation.php",
                type: "post",
                data: {'datos': varDataIn},
                async:false
            }).done(function(res){
                console.log(res);
                console.log("Respuesta: "); 
                try {
                    var data=JSON.parse(res);
                    console.log(data);  
                    if (data.STATUS == 'OK' && (data.ID!=null && data.ID!=undefined && data.ID!=0)) {
                        dataIn.id_consulta = data.ID;
                        psicologia.push(dataIn);
                        fs.writeFileSync(__dirname+'/json/consultas_psicologia.json', JSON.stringify(psicologia));
                        localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                        localStorage.setItem('consultaRegistradaTipo', 3);
                        alert('Consulta Registrada remota y localmente con exito!');
                        
                         imprimirConsultaMedica();
                        $("#modal-imprimirConsulta").modal('show');
                    } else {
        
                        alert(data.ERROR);
                        
                        if (confirm('Problemas al registrar consulta al servidor. Desea volver a intentarlo, si selecciona cancelar se almacenara localmente?')) {
                            regitrarConsultaPsicologia(); 
        
                        } else {
                            dataIn.estado = 0;  
                            psicologia.push(dataIn);
                            fs.writeFileSync(__dirname+'/json/consultas_psicologia.json', JSON.stringify(psicologia));
                            localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                            localStorage.setItem('consultaRegistradaTipo', 3);
                            alert('Consulta Registrada localmente con exito!');
                            imprimirConsultaMedica();
                            $("#modal-imprimirConsulta").modal('show');
                        
        
        
                        }
                    }
        
        
                } catch (error) {
                    if(confirm('Error al registrar la consulta al servidor. Desea volver a intentarlo? Si selecciona cancelar se almacenara localmente.')){
                        regitrarConsultaPsicologia();
                    }else{
                        dataIn.estado = 0;  
                        psicologia.push(dataIn);
                        fs.writeFileSync(__dirname+'/json/consultas_psicologia.json', JSON.stringify(psicologia));
                        localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                        localStorage.setItem('consultaRegistradaTipo', 3);
                        alert('Consulta Registrada localmente con exito!');
                        imprimirConsultaMedica();
                        $("#modal-imprimirConsulta").modal('show');
                    
                    }
                }
        
        
            } ).fail(function(E) { 
                console.log(E);
                dataIn.estado = 0;  
                psicologia.push(dataIn);
                fs.writeFileSync(__dirname+'/json/consultas_psicologia.json', JSON.stringify(psicologia));
                localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                localStorage.setItem('consultaRegistradaTipo', 3);
                alert('Consulta Registrada localmente con exito!');
                imprimirConsultaMedica();
                $("#modal-imprimirConsulta").modal('show');
            });
        }else{
            dataIn.estado = 0;  
            psicologia.push(dataIn);
            fs.writeFileSync(__dirname+'/json/consultas_psicologia.json', JSON.stringify(psicologia));
            localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
            localStorage.setItem('consultaRegistradaTipo', 3);
            alert('Consulta Registrada localmente con exito!');
            imprimirConsultaMedica();
            $("#modal-imprimirConsulta").modal('show');
        
        }
      
    }else{
        alert('Hacen falta varibales obligatorias por digitar!..');
    }
}

function regitrarConsultaNutricional(){
    console.log('consulta nutricional registrando');
    if(listadoCIEPa.length!=0 && $("#NtipoConsulta").val()!='' && $("#NfinalidadConsulta").val()!='' && $("#NcausaExternaConsulta").val()!='' && $("#NmotivoConsulta").val()!='' && $("#NtipoDiagnosPrinc").val()!=''){

        var cieIngCon = '';
        for (var i = 0; i < listadoCIEPa.length; i++) {
    
            cieIngCon += listadoCIEPa[i].cod + '-,-' + listadoCIEPa[i].desc + '   -   ';
    
        }
        var medIngCon = '';
        var ordenesIngCon = '';
        var ordenesIngConRef = '';
        var ordenesIngConRefPro = '';
    
        for (var i = 0; i < ordenMedCons.length; i++) {
    
            ordenesIngCon += ordenMedCons[i].cod + '-,-' + ordenMedCons[i].desc + '-,-' + ordenMedCons[i].observa + '   -   ';
    
        }
        for (var i = 0; i < ordenMedConsRef.length; i++) {
    
            ordenesIngConRef += ordenMedConsRef[i].cod + '-,-' + ordenMedConsRef[i].desc + '-,-' + ordenMedConsRef[i].observa + '   -   ';
    
        }
        for (var i = 0; i < ordenMedConsRefPro.length; i++) {
    
            ordenesIngConRefPro += ordenMedConsRefPro[i].cod + '-,-' + ordenMedConsRefPro[i].desc + '-,-' + ordenMedConsRefPro[i].observa + '   -   ';
    
        }
    
        for (var i = 0; i < medAsigCons.length; i++) {
            medIngCon += medAsigCons[i].nombre + '-,-' + medAsigCons[i].presentacion + '-,-' + medAsigCons[i].periodicidad + '-,-' + medAsigCons[i].catdosis + '-,-' + medAsigCons[i].viadmin + '-,-' + medAsigCons[i].tiempo + '-,-' + medAsigCons[i].total + '   -   ';
    
        }
      
        hoy = new Date();
        var mes;
        if(parseInt(( hoy.getMonth() + 1 ))<10){
            mes='0'+( hoy.getMonth() + 1 );
        }else{
            mes=( hoy.getMonth() + 1 );
        }
        fecha = hoy.getDate() + '-' + mes + '-' + hoy.getFullYear();
        hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();
    
    
        var dataIn = {
            'id_consulta': 0,
            'idJSON_consulta':obtenerConsecutivoJSONConsultasN(),
            'id_paciente': paciente.id,
            'idJSON_paciente': paciente.idJSON,
            'numid_pac': paciente.idRegPac,
            'tipoid_pac': paciente.tipoidRegPac,
            'tipoIDUserReg': usuario.tipoid,
            'numeroIDUserReg': usuario.numid,
            'institucion': usuario.institucion,
            'id_registra': usuario.numid,
            'tipoid_registra': usuario.tipoid,
            'fechaConsulta': fecha,
            'horaConsulta': hora,
            'profAtiende':  usuario.nombres,
            'dptoatencion': ($("#dptoatencion-nutricional").val()) ? $("#dptoatencion-nutricional").val() : '',
            'mnpoatencion': ($("#mnpoatencion-nutricional").val()) ? $("#mnpoatencion-nutricional").val() : '',
            'atencion': ($("#atencion-nutricional").val()) ? $("#atencion-nutricional").val() : '',
            'tipoConsulta': ($("#NtipoConsulta").val()) ? $("#NtipoConsulta").val() : '',
            'finalidadConsulta': ($("#NfinalidadConsulta").val()) ? $("#NfinalidadConsulta").val() : '',
            'causaExternaConsulta': ($("#NcausaExternaConsulta").val()) ? $("#NcausaExternaConsulta").val() : '',
            'motivoConsulta': ($("#NmotivoConsulta").val()) ? $("#NmotivoConsulta").val() : '',
            'enfermedadActualConsulta': ($("#NenfermedadActualConsulta").val()) ? $("#NenfermedadActualConsulta").val() : '',
            'antecedentesConsulta': ($("#NantecedentesConsulta").val()) ? $("#NantecedentesConsulta").val() : '',
            'tempEA': ($("#NtempEA").val()) ? $("#NtempEA").val() : '',
            'pulsoEA': ($("#NpulsoEA").val()) ? $("#NpulsoEA").val() : '',
            'pesoEA': ($("#NpesoEA").val()) ? $("#NpesoEA").val() : '',
            'tallaEA': ($("#NtallaEA").val()) ? $("#NtallaEA").val() : '',
            'imcEA': ($("#NimcEA").val()) ? $("#NimcEA").val() : '',
            'frecuenciarEA': ($("#NfrecuenciarEA").val()) ? $("#NfrecuenciarEA").val() : '',
            'tensionaEA': ($("#NtensionaEA").val()) ? $("#NtensionaEA").val() : '',
            'obserConsuAdulto': ($("#NobserConsuAdulto").val()) ? $("#NobserConsuAdulto").val() : '',
            'notasEvolucion': ($("#NnotasEvolucion").val()) ? $("#NnotasEvolucion").val() : '',
            'recomNotas': ($("#NrecomNotas").val()) ? $("#NrecomNotas").val() : '',
            'listadoCIEPa': cieIngCon,
            'tipoDiagnosPrinc': $("#NtipoDiagnosPrinc").val(),
            'medAsigCons': medIngCon,
            'ordenMedCons': ordenesIngCon,
            'ordenMedConsRef': ordenesIngConRef,
            'ordenMedConsRefPro': ordenesIngConRefPro,
            'tipoSerRef': ($("#NtipoServicioReferir").val()) ? $("#NtipoServicioReferir").val() : '',
            'obseSerRef': ($("#NObservacionesReferir").val()) ? $("#NObservacionesReferir").val() : '',
            'IpsServicioReferir': ($("#NIpsServicioReferir").val()) ? $("#NIpsServicioReferir").val() : '',
            'IpsProcedeimientoReferir': ($("#NIpsProcedeimientoReferir").val()) ? $("#NIpsProcedeimientoReferir").val() : '',
            'estado': 1 
        };
        console.log(dataIn);
        varDataIn={
            'id_paciente': paciente.id,
            'idJSON_paciente': paciente.idJSON,
            'numid_pac': paciente.idRegPac,
            'tipoid_pac': paciente.tipoidRegPac,
            'institucion': usuario.institucion,
            'data':JSON.stringify(dataIn),
            'key':'GimmidsApp'
        };
        if(paciente.estado==1){
            $.ajax({
                url: "https://saludsp.com.co/api/servicios/registerNutriConsultation.php",
                type: "post",
                data: {'datos': varDataIn},
                async:false
            }).done(function(res){
                console.log(res);
                console.log("Respuesta: "); 
                try {
                    var data=JSON.parse(res);
                    console.log(data);  
                    if (data.STATUS == 'OK' && (data.ID!=null && data.ID!=undefined && data.ID!=0)) {
                        dataIn.id_consulta = data.ID;
                        nutricional.push(dataIn);
                        fs.writeFileSync(__dirname+'/json/consultas_nutricional.json', JSON.stringify(nutricional));
                        localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                        localStorage.setItem('consultaRegistradaTipo', 4);
                        alert('Consulta Registrada remota y localmente con exito!');
                        
                         imprimirConsultaMedica();
                        $("#modal-imprimirConsulta").modal('show');
                    } else {
                        console.log(data);  
                        
                        alert(data.ERROR);
                        
                        if (confirm('Problemas al registrar consulta al servidor. Desea volver a intentarlo, si selecciona cancelar se almacenara localmente?')) {
                            regitrarConsultaNutricional(); 
        
                        } else {
                            dataIn.estado = 0;  
                            nutricional.push(dataIn);
                            fs.writeFileSync(__dirname+'/json/consultas_nutricional.json', JSON.stringify(nutricional));
                            localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                            localStorage.setItem('consultaRegistradaTipo', 4);
                            alert('Consulta Registrada localmente con exito!');
                            imprimirConsultaMedica();
                            $("#modal-imprimirConsulta").modal('show');
                        
        
        
                        } 
                    }
        
        
                } catch (error) {
                    if(confirm('Error al registrar la consulta al servidor. Desea volver a intentarlo? Si selecciona cancelar se almacenara localmente.')){
                        regitrarConsultaNutricional();
                    }else{
                        dataIn.estado = 0;  
                        nutricional.push(dataIn);
                        fs.writeFileSync(__dirname+'/json/consultas_nutricional.json', JSON.stringify(nutricional));
                        localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                        localStorage.setItem('consultaRegistradaTipo', 4);
                        alert('Consulta Registrada localmente con exito!');
                        imprimirConsultaMedica();
                        $("#modal-imprimirConsulta").modal('show');
                    
                    }
                }
        
        
            } ).fail(function() { 
                dataIn.estado = 0;  
                nutricional.push(dataIn);
                fs.writeFileSync(__dirname+'/json/consultas_nutricional.json', JSON.stringify(nutricional));
                localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                localStorage.setItem('consultaRegistradaTipo', 4);
                alert('Consulta Registrada localmente con exito!');
                imprimirConsultaMedica();
                $("#modal-imprimirConsulta").modal('show');
            });
        }else{
            dataIn.estado = 0;  
            nutricional.push(dataIn);
            fs.writeFileSync(__dirname+'/json/consultas_nutricional.json', JSON.stringify(nutricional));
            localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
            localStorage.setItem('consultaRegistradaTipo', 4);
            alert('Consulta Registrada localmente con exito!');
            imprimirConsultaMedica();
            $("#modal-imprimirConsulta").modal('show');
        
        }
      
    }else{
        alert('Hacen falta varibales obligatorias por digitar!..');
    }
}

function regitrarConsultaAdulto(){
    console.log('consulta adulto registrando');

    if(listadoCIEPa.length!=0 && $("#AtipoConsulta").val()!='' && $("#AfinalidadConsulta").val()!='' && $("#AcausaExternaConsulta").val()!='' && $("#AmotivoConsulta").val()!='' && $("#AtipoDiagnosPrinc").val()!=''){

        var cieIngCon = '';
        for (var i = 0; i < listadoCIEPa.length; i++) {
    
            cieIngCon += listadoCIEPa[i].cod + '-,-' + listadoCIEPa[i].desc + '   -   ';
    
        }
        var medIngCon = '';
        var ordenesIngCon = '';
        var ordenesIngConRef = '';
        var ordenesIngConRefPro = '';
    
        for (var i = 0; i < ordenMedCons.length; i++) {
    
            ordenesIngCon += ordenMedCons[i].cod + '-,-' + ordenMedCons[i].desc + '-,-' + ordenMedCons[i].observa + '   -   ';
    
        }
        for (var i = 0; i < ordenMedConsRef.length; i++) {
    
            ordenesIngConRef += ordenMedConsRef[i].cod + '-,-' + ordenMedConsRef[i].desc + '-,-' + ordenMedConsRef[i].observa + '   -   ';
    
        }
        for (var i = 0; i < ordenMedConsRefPro.length; i++) {
    
            ordenesIngConRefPro += ordenMedConsRefPro[i].cod + '-,-' + ordenMedConsRefPro[i].desc + '-,-' + ordenMedConsRefPro[i].observa + '   -   ';
    
        }
    
        for (var i = 0; i < medAsigCons.length; i++) {
            medIngCon += medAsigCons[i].nombre + '-,-' + medAsigCons[i].presentacion + '-,-' + medAsigCons[i].periodicidad + '-,-' + medAsigCons[i].catdosis + '-,-' + medAsigCons[i].viadmin + '-,-' + medAsigCons[i].tiempo + '-,-' + medAsigCons[i].total + '   -   ';
    
        }
      
        hoy = new Date();
        var mes;
        if(parseInt(( hoy.getMonth() + 1 ))<10){
            mes='0'+( hoy.getMonth() + 1 );
        }else{
            mes=( hoy.getMonth() + 1 );
        }
        fecha = hoy.getDate() + '-' + mes + '-' + hoy.getFullYear();
        hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();

        
        var dataIn = {
            'id_consulta': '',
            'idJSON_consulta': obtenerConsecutivoJSONConsultasA(), 
            'id_paciente': paciente.id,
            'idJSON_paciente': paciente.idJSON,
            'numid_pac': paciente.idRegPac,
            'tipoid_pac': paciente.tipoidRegPac,
            'tipoIDUserReg': usuario.tipoid,
            'numeroIDUserReg': usuario.numid,
            'institucion': usuario.institucion,
            'id_registra': usuario.numid,
            'tipoid_registra': usuario.tipoid,
            'fechaConsulta': fecha,
            'horaConsulta': hora,
            'profAtiende': usuario.nombres,
            'dptoatencion': ($("#dptoatencion-adulto").val()) ? $("#dptoatencion-adulto").val() : '',
            'mnpoatencion': ($("#mnpoatencion-adulto").val()) ? $("#mnpoatencion-adulto").val() : '',
            'atencion': ($("#atencion-adulto").val()) ? $("#atencion-adulto").val() : '',
            'tipoConsulta': ($("#AtipoConsulta").val()) ? $("#AtipoConsulta").val() : '',
            'finalidadConsulta': ($("#AfinalidadConsulta").val()) ? $("#AfinalidadConsulta").val() : '',
            'causaExternaConsulta': ($("#AcausaExternaConsulta").val()) ? $("#AcausaExternaConsulta").val() : '',
            'motivoConsulta': ($("#AmotivoConsulta").val()) ? $("#AmotivoConsulta").val() : '',
            'enfermedadActualConsulta': ($("#AenfermedadActualConsulta").val()) ? $("#AenfermedadActualConsulta").val() : '', 
            'infecciosos': ($("#Ainfecciosos").val()) ? $("#Ainfecciosos").val() : '',
            'infecciosos_Desc': ($("#Ainfecciosos_Desc").val()) ? $("#Ainfecciosos_Desc").val() : '',
            'patologicos': ($("#Apatologicos").val()) ? $("#Apatologicos").val() : '',
            'patologicos_Desc': ($("#Apatologicos_Desc").val()) ? $("#Apatologicos_Desc").val() : '',
            'quirurgicos': ($("#Aquirurgicos").val()) ? $("#Aquirurgicos").val() : '',
            'quirurgicos_Desc': ($("#Aquirurgicos_Desc").val()) ? $("#Aquirurgicos_Desc").val() : '',
            'alergicos': ($("#Aalergicos").val()) ? $("#Aalergicos").val() : '',
            'alergicos_Desc': ($("#Aalergicos_Desc").val()) ? $("#Aalergicos_Desc").val() : '',
            'traumas': ($("#Atraumas").val()) ? $("#Atraumas").val() : '',
            'traumas_Desc': ($("#Atraumas_Desc").val()) ? $("#Atraumas_Desc").val() : '',
            'psicologicos': ($("#Apsicologicos").val()) ? $("#Apsicologicos").val() : '',
            'psicologicos_Desc': ($("#Apsicologicos_Desc").val()) ? $("#Apsicologicos_Desc").val() : '',
            'otros_Desc': ($("#Aotros_Desc").val()) ? $("#Aotros_Desc").val() : '',
            'gestaciones': ($("#Agestaciones").val()) ? $("#Agestaciones").val() : '',
            'partos': ($("#Apartos").val()) ? $("#Apartos").val() : '',
            'cesareas': ($("#Acesareas").val()) ? $("#Acesareas").val() : '',
            'abortos': ($("#Aabortos").val()) ? $("#Aabortos").val() : '',
            'vivos': ($("#Avivos").val()) ? $("#Avivos").val() : '',
            'muertos': ($("#Amuertos").val()) ? $("#Amuertos").val() : '',
            'observacionesGine': ($("#AobservacionesGine").val()) ? $("#AobservacionesGine").val() : '',
            'fecUltimaCitologia': ($("#AfecUltimaCitologia").val()) ? $("#AfecUltimaCitologia").val() : '',
            'planifica': ($("#Aplanifica").val()) ? $("#Aplanifica").val() : '',
            'planificaMetodo': ($("#AplanificaMetodo").val()) ? $("#AplanificaMetodo").val() : '',
            'observacionesAnte': ($("#AobservacionesAnte").val()) ? $("#AobservacionesAnte").val() : '',
            'tempEA': ($("#AtempEA").val()) ? $("#AtempEA").val() : '',
            'pulsoEA': ($("#ApulsoEA").val()) ? $("#ApulsoEA").val() : '',
            'pesoEA': ($("#ApesoEA").val()) ? $("#ApesoEA").val() : '',
            'tallaEA': ($("#AtallaEA").val()) ? $("#AtallaEA").val() : '',
            'imcEA': ($("#AimcEA").val()) ? $("#AimcEA").val() : '',
            'frecuenciarEA': ($("#AfrecuenciarEA").val()) ? $("#AfrecuenciarEA").val() : '',
            'tensionaEA': ($("#AtensionaEA").val()) ? $("#AtensionaEA").val() : '',
            'pielyfaneras': ($("input:radio[name=Apielyfaneras]:checked").val()) ? $("input:radio[name=Apielyfaneras]:checked").val() : '',
            'pielyfaneras_Desc': ($("#Apielyfaneras_Desc").val()) ? $("#Apielyfaneras_Desc").val() : '',
            'organosSentidos': ($("input:radio[name=AorganosSentidos]:checked").val()) ? $("input:radio[name=AorganosSentidos]:checked").val() : '',
            'organosSentidos_Desc': ($("#AorganosSentidos_Desc").val()) ? $("#AorganosSentidos_Desc").val() : '',
            'cavidadBucal': ($("input:radio[name=AcavidadBucal]:checked").val()) ? $("input:radio[name=AcavidadBucal]:checked").val() : '',
            'cavidadBucal_Desc': ($("#AcavidadBucal_Desc").val()) ? $("#AcavidadBucal_Desc").val() : '',
            'neurosensorial': ($("input:radio[name=Aneurosensorial]:checked").val()) ? $("input:radio[name=Aneurosensorial]:checked").val() : '',
            'neurosensorial_Desc': ($("#Aneurosensorial_Desc").val()) ? $("#Aneurosensorial_Desc").val() : '',
            'locomotor': ($("input:radio[name=Alocomotor]:checked").val()) ? $("input:radio[name=Alocomotor]:checked").val() : '',
            'locomotor_Desc': ($("#Alocomotor_Desc").val()) ? $("#Alocomotor_Desc").val() : '',
            'cardiovascular': ($("input:radio[name=Acardiovascular]:checked").val()) ? $("input:radio[name=Acardiovascular]:checked").val() : '',
            'cardiovascular_Desc': ($("#Acardiovascular_Desc").val()) ? $("#Acardiovascular_Desc").val() : '',
            'respiratorio': ($("input:radio[name=Arespiratorio]:checked").val()) ? $("input:radio[name=Arespiratorio]:checked").val() : '',
            'respiratorio_Desc': ($("#Arespiratorio_Desc").val()) ? $("#Arespiratorio_Desc").val() : '',
            'gastrointestinal': ($("input:radio[name=Agastrointestinal]:checked").val()) ? $("input:radio[name=Agastrointestinal]:checked").val() : '',
            'gastrointestinal_Desc': ($("#Agastrointestinal_Desc").val()) ? $("#Agastrointestinal_Desc").val() : '',
            'genitorunario': ($("input:radio[name=Agenitorunario]:checked").val()) ? $("input:radio[name=Agenitorunario]:checked").val() : '',
            'genitorunario_Desc': ($("#Agenitorunario_Desc").val()) ? $("#Agenitorunario_Desc").val() : '',
            'endoctrino': ($("input:radio[name=Aendoctrino]:checked").val()) ? $("input:radio[name=Aendoctrino]:checked").val() : '',
            'endoctrino_Desc': ($("#Aendoctrino_Desc").val()) ? $("#Aendoctrino_Desc").val() : '',
            'examama': ($("input:radio[name=Aexamama]:checked").val()) ? $("input:radio[name=Aexamama]:checked").val() : '',
            'examama_Desc': ($("#Aexamama_Desc").val()) ? $("#Aexamama_Desc").val() : '',
            'piel': ($("input:radio[name=Apiel]:checked").val()) ? $("input:radio[name=Apiel]:checked").val() : '',
            'piel_Desc': ($("#Apiel_Desc").val()) ? $("#Apiel_Desc").val() : '',
            'cabeza': ($("input:radio[name=Acabeza]:checked").val()) ? $("input:radio[name=Acabeza]:checked").val() : '',
            'cabeza_Desc': ($("#Acabeza_Desc").val()) ? $("#Acabeza_Desc").val() : '',
            'organosSentidosEA': ($("input:radio[name=AorganosSentidosEA]:checked").val()) ? $("input:radio[name=AorganosSentidosEA]:checked").val() : '',
            'organosSentidosEA_Desc': ($("#AorganosSentidosEA_Desc").val()) ? $("#AorganosSentidosEA_Desc").val() : '',
            'agudezavisual': ($("input:radio[name=Aagudezavisual]:checked").val()) ? $("input:radio[name=Aagudezavisual]:checked").val() : '',
            'agudezavisual_Desc': ($("#Aagudezavisual_Desc").val()) ? $("#Aagudezavisual_Desc").val() : '',
            'cavidadoral': ($("input:radio[name=Acavidadoral]:checked").val()) ? $("input:radio[name=Acavidadoral]:checked").val() : '',
            'cavidadoral_Desc': ($("#Acavidadoral_Desc").val()) ? $("#Acavidadoral_Desc").val() : '',
            'torax': ($("input:radio[name=Atorax]:checked").val()) ? $("input:radio[name=Atorax]:checked").val() : '',
            'torax_Desc': ($("#Atorax_Desc").val()) ? $("#Atorax_Desc").val() : '',
            'abdomen': ($("input:radio[name=Aabdomen]:checked").val()) ? $("input:radio[name=Aabdomen]:checked").val() : '',
            'abdomen_Desc': ($("#Aabdomen_Desc").val()) ? $("#Aabdomen_Desc").val() : '',
            'genitourinaria': ($("input:radio[name=Agenitourinaria]:checked").val()) ? $("input:radio[name=Agenitourinaria]:checked").val() : '',
            'genitourinaria_Desc': ($("#Agenitourinaria_Desc").val()) ? $("#Agenitourinaria_Desc").val() : '',
            'extremidades': ($("input:radio[name=Aextremidades]:checked").val()) ? $("input:radio[name=Aextremidades]:checked").val() : '',
            'extremidades_Desc': ($("#Aextremidades_Desc").val()) ? $("#Aextremidades_Desc").val() : '',
            'neurologico': ($("input:radio[name=Aneurologico]:checked").val()) ? $("input:radio[name=Aneurologico]:checked").val() : '',
            'neurologico_Desc': ($("#Aneurologico_Desc").val()) ? $("#Aneurologico_Desc").val() : '',
            'osteomuscular': ($("input:radio[name=Aosteomuscular]:checked").val()) ? $("input:radio[name=Aosteomuscular]:checked").val() : '',
            'osteomuscular_Desc': ($("#Aosteomuscular_Desc").val()) ? $("#Aosteomuscular_Desc").val() : '',
            'obserConsuAdulto': ($("#AobserConsuAdulto").val()) ? $("#AobserConsuAdulto").val() : '',
            'listadoCIEPa': cieIngCon,
            'tipoDiagnosPrinc': ($("#AtipoDiagnosPrinc").val()) ? $("#AtipoDiagnosPrinc").val() : '',
            'medAsigCons': medIngCon,
            'ordenMedCons': ordenesIngCon,
            'ordenMedConsRef': ordenesIngConRef,
            'ordenMedConsRefPro': ordenesIngConRefPro,
            'tipoSerRef': ($("#AtipoServicioReferir").val()) ? $("#AtipoServicioReferir").val() : '',
            'obseSerRef': ($("#AObservacionesReferir").val()) ? $("#AObservacionesReferir").val() : '',
            'IpsServicioReferir': ($("#AIpsServicioReferir").val()) ? $("#AIpsServicioReferir").val() : '',
            'IpsProcedeimientoReferir': ($("#AIpsProcedeimientoReferir").val()) ? $("#AIpsProcedeimientoReferir").val() : '',
            'notasEvolucion': ($("#AnotasEvolucion").val()) ? $("#AnotasEvolucion").val() : '',
            'recomNotas': ($("#ArecomNotas").val()) ? $("#ArecomNotas").val() : '',
            'estado': 1
        };
        varDataIn={
            'id_paciente': paciente.id,
            'idJSON_paciente': paciente.idJSON,
            'numid_pac': paciente.idRegPac,
            'tipoid_pac': paciente.tipoidRegPac,
            'institucion': usuario.institucion,
            'data':JSON.stringify(dataIn),
            'key':'GimmidsApp'
        };
        if(paciente.estado==1){
            $.ajax({
                url: "https://saludsp.com.co/api/servicios/registerAdultConsultation.php",
                type: "post",
                data: {'datos': varDataIn},
                async:false
            }).done(function(res){
                console.log(res);
                console.log("Respuesta: "); 
                try {
                    var data=JSON.parse(res);
                    console.log(data);  
                    if (data.STATUS == 'OK' && (data.ID!=null && data.ID!=undefined && data.ID!=0)) {
                        dataIn.id_consulta = data.ID;
                        adulto.push(dataIn);
                        fs.writeFileSync(__dirname+'/json/consultas_adulto.json', JSON.stringify(adulto));
                        localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                        localStorage.setItem('consultaRegistradaTipo', 5);
                        alert('Consulta Registrada remota y localmente con exito!');
                        
                         imprimirConsultaMedica();
                        $("#modal-imprimirConsulta").modal('show');
                    } else {
                        console.log(data);  
                        
                        alert(data.ERROR);
                        
                        if (confirm('Problemas al registrar consulta al servidor. Desea volver a intentarlo, si selecciona cancelar se almacenara localmente?')) {
                            regitrarConsultaAdulto(); 
        
                        } else {
                            dataIn.estado = 0;  
                            adulto.push(dataIn);
                            fs.writeFileSync(__dirname+'/json/consultas_adulto.json', JSON.stringify(adulto));
                            localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                            localStorage.setItem('consultaRegistradaTipo', 5);
                            alert('Consulta Registrada localmente con exito!');
                            imprimirConsultaMedica();
                            $("#modal-imprimirConsulta").modal('show');
                        
        
        
                        } 
                    }
        
        
                } catch (error) {
                    if(confirm('Error al registrar la consulta al servidor. Desea volver a intentarlo? Si selecciona cancelar se almacenara localmente.')){
                        regitrarConsultaAdulto();
                    }else{
                        dataIn.estado = 0;  
                        adulto.push(dataIn);
                        fs.writeFileSync(__dirname+'/json/consultas_adulto.json', JSON.stringify(adulto));
                        localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                        localStorage.setItem('consultaRegistradaTipo', 5);
                        alert('Consulta Registrada localmente con exito!');
                        imprimirConsultaMedica();
                        $("#modal-imprimirConsulta").modal('show');
                    
                    }
                }
        
        
            } ).fail(function() { 
                dataIn.estado = 0;  
                adulto.push(dataIn);
                fs.writeFileSync(__dirname+'/json/consultas_adulto.json', JSON.stringify(adulto));
                localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                localStorage.setItem('consultaRegistradaTipo', 5);
                alert('Consulta Registrada localmente con exito!');
                imprimirConsultaMedica();
                $("#modal-imprimirConsulta").modal('show');
            });
        }else{
            dataIn.estado = 0;  
            adulto.push(dataIn);
            fs.writeFileSync(__dirname+'/json/consultas_adulto.json', JSON.stringify(adulto));
            localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
            localStorage.setItem('consultaRegistradaTipo', 5);
            alert('Consulta Registrada localmente con exito!');
            imprimirConsultaMedica();
            $("#modal-imprimirConsulta").modal('show');
        
        }
    
    }else{
        alert('Hacen falta varibales obligatorias por digitar!..');
    }
}

function regitrarConsultaMenor(){
    console.log('consulta menor registrando');
    if(listadoCIEPa.length!=0 && $("#MMenortipoConsulta").val()!='' && $("#MMenorfinalidadConsulta").val()!='' && $("#MMenorcausaExternaConsulta").val()!='' && $("#MMenormotivoConsulta").val()!='' && $("#MtipoDiagnosPrinc").val()!=''){

        var cieIngCon = '';
        for (var i = 0; i < listadoCIEPa.length; i++) {
    
            cieIngCon += listadoCIEPa[i].cod + '-,-' + listadoCIEPa[i].desc + '   -   ';
    
        }
        var medIngCon = '';
        var ordenesIngCon = '';
        var ordenesIngConRef = '';
        var ordenesIngConRefPro = '';
    
        for (var i = 0; i < ordenMedCons.length; i++) {
    
            ordenesIngCon += ordenMedCons[i].cod + '-,-' + ordenMedCons[i].desc + '-,-' + ordenMedCons[i].observa + '   -   ';
    
        }
        for (var i = 0; i < ordenMedConsRef.length; i++) {
    
            ordenesIngConRef += ordenMedConsRef[i].cod + '-,-' + ordenMedConsRef[i].desc + '-,-' + ordenMedConsRef[i].observa + '   -   ';
    
        }
        for (var i = 0; i < ordenMedConsRefPro.length; i++) {
    
            ordenesIngConRefPro += ordenMedConsRefPro[i].cod + '-,-' + ordenMedConsRefPro[i].desc + '-,-' + ordenMedConsRefPro[i].observa + '   -   ';
    
        }
    
        for (var i = 0; i < medAsigCons.length; i++) {
            medIngCon += medAsigCons[i].nombre + '-,-' + medAsigCons[i].presentacion + '-,-' + medAsigCons[i].periodicidad + '-,-' + medAsigCons[i].catdosis + '-,-' + medAsigCons[i].viadmin + '-,-' + medAsigCons[i].tiempo + '-,-' + medAsigCons[i].total + '   -   ';
    
        }
      
        hoy = new Date();
        var mes;
        if(parseInt(( hoy.getMonth() + 1 ))<10){
            mes='0'+( hoy.getMonth() + 1 );
        }else{
            mes=( hoy.getMonth() + 1 );
        }
        fecha = hoy.getDate() + '-' + mes + '-' + hoy.getFullYear();
        hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();
    
       
        var dataIn = {
            'id_consulta': '',
            'idJSON_consulta': obtenerConsecutivoJSONConsultasM(),
            'id_paciente': paciente.id,
            'idJSON_paciente': paciente.idJSON,
            'numid_pac': paciente.idRegPac,
            'tipoid_pac': paciente.tipoidRegPac,
            'tipoIDUserReg': usuario.tipoid,
            'numeroIDUserReg': usuario.numid,
            'institucion': usuario.institucion,
            'id_registra': usuario.numid,
            'tipoid_registra': usuario.tipoid,
            'fechaConsulta': fecha,
            'profAtiende': usuario.nombres,
            'dptoatencion': ($("#dptoatencion-menor").val()) ? $("#dptoatencion-menor").val() : '',
            'mnpoatencion': ($("#mnpoatencion-menor").val()) ? $("#mnpoatencion-menor").val() : '',
            'atencion': ($("#atencion-menor").val()) ? $("#atencion-menor").val() : '',
            'MenornombreAcompana': ($("#MMenornombreAcompana").val()) ? $("#MMenornombreAcompana").val() : '',
            'MenorAcompanaTelefono': ($("#MMenorAcompanaTelefono").val()) ? $("#MMenorAcompanaTelefono").val() : '',
            'MenorparentezcoAcompana': ($("#MMenorparentezcoAcompana").val()) ? $("#MMenorparentezcoAcompana").val() : '',
            'Menornombremadre': ($("#MMenornombremadre").val()) ? $("#MMenornombremadre").val() : '',
            'Menornombremadre': ($("#MMenornombremadre").val()) ? $("#MMenornombremadre").val() : '',
            'Menornombrepadre': ($("#MMenornombrepadre").val()) ? $("#MMenornombrepadre").val() : '',
            'MenortipoConsulta': ($("#MMenortipoConsulta").val()) ? $("#MMenortipoConsulta").val() : '',
            'MenorfinalidadConsulta': ($("#MMenorfinalidadConsulta").val()) ? $("#MMenorfinalidadConsulta").val() : '',
            'MenorcausaExternaConsulta': ($("#MMenorcausaExternaConsulta").val()) ? $("#MMenorcausaExternaConsulta").val() : '',
            'MenormotivoConsulta': ($("#MMenormotivoConsulta").val()) ? $("#MMenormotivoConsulta").val() : '',
            'MenorenfermedadActualConsulta': ($("#MMenorenfermedadActualConsulta").val()) ? $("#MMenorenfermedadActualConsulta").val() : '',
            'Menorembarazodesado': ($("#MMenorembarazodesado").val()) ? $("#MMenorembarazodesado").val() : '',
            'MenoredadGestacional': ($("#MMenoredadGestacional").val()) ? $("#MMenoredadGestacional").val() : '',
            'Menorpatologiasembarazo': ($("#MMenorpatologiasembarazo").val()) ? $("#MMenorpatologiasembarazo").val() : '',
            'MenorPesonacer': ($("#MMenorPesonacer").val()) ? $("#MMenorPesonacer").val() : '',
            'Menortallanacer': ($("#MMenortallanacer").val()) ? $("#MMenortallanacer").val() : '',
            'MenorApgar1min': ($("#MMenorApgar1min").val()) ? $("#MMenorApgar1min").val() : '',
            'MenorApgar5min': ($("#MMenorApgar5min").val()) ? $("#MMenorApgar5min").val() : '',
            'MenorpatologiaReciennacido': ($("#MMenorpatologiaReciennacido").val()) ? $("#MMenorpatologiaReciennacido").val() : '',
            'MenorpartoIns': ($("#MMenorpartoIns").val()) ? $("#MMenorpartoIns").val() : '',
            'MenorProductoUnico': ($("#MMenorProductoUnico").val()) ? $("#MMenorProductoUnico").val() : '',
            'MenorTipoParto': ($("#MMenorTipoParto").val()) ? $("#MMenorTipoParto").val() : '',
            'MenorEdadMadreNacer': ($("#MMenorEdadMadreNacer").val()) ? $("#MMenorEdadMadreNacer").val() : '',
            'MenorAlimentacion': ($("#MMenorAlimentacion").val()) ? $("#MMenorAlimentacion").val() : '',
            'MenorOtrasleches': ($("#MMenorOtrasleches").val()) ? $("#MMenorOtrasleches").val() : '',
            'MenorComplementaria': ($("#MMenorComplementaria").val()) ? $("#MMenorComplementaria").val() : '',
            'MenorNumhermanos': ($("#MMenorNumhermanos").val()) ? $("#MMenorNumhermanos").val() : '',
            'MenorNumhermanosvivos': ($("#MMenorNumhermanosvivos").val()) ? $("#MMenorNumhermanosvivos").val() : '',
            'MenorNumhermanosMuertos': ($("#MMenorNumhermanosMuertos").val()) ? $("#MMenorNumhermanosMuertos").val() : '',
            'MenorPatologiasfamiliares': ($("#MMenorPatologiasfamiliares").val()) ? $("#MMenorPatologiasfamiliares").val() : '',
            'MenortempEA': ($("#MMenortempEA").val()) ? $("#MMenortempEA").val() : '',
            'MenorpulsoEA': ($("#MMenorpulsoEA").val()) ? $("#MMenorpulsoEA").val() : '',
            'MenorpesoEA': ($("#MMenorpesoEA").val()) ? $("#MMenorpesoEA").val() : '',
            'MenortallaEA': ($("#MMenortallaEA").val()) ? $("#MMenortallaEA").val() : '',
            'MenorimcEA': ($("#MMenorimcEA").val()) ? $("#MMenorimcEA").val() : '',
            'MenorfrecuenciarEA': ($("#MMenorfrecuenciarEA").val()) ? $("#MMenorfrecuenciarEA").val() : '',
            'MenorPerimetroCefalico': ($("#MMenorPerimetroCefalico").val()) ? $("#MMenorPerimetroCefalico").val() : '',
            'Menorcabeza': ($("input:radio[name=MMenorcabeza]:checked").val()) ? $("input:radio[name=MMenorcabeza]:checked").val() : '',
            'Menorcabeza_Desc': ($("#MMenorcabeza_Desc").val()) ? $("#MMenorcabeza_Desc").val() : '',
            'MenorOjos': ($("input:radio[name=MMenorOjos]:checked").val()) ? $("input:radio[name=MMenorOjos]:checked").val() : '',
            'MenorOjos_Desc': ($("#MMenorOjos_Desc").val()) ? $("#MMenorOjos_Desc").val() : '',
            'MenorNariz': ($("input:radio[name=MMenorNariz]:checked").val()) ? $("input:radio[name=MMenorNariz]:checked").val() : '',
            'MenorNariz_Desc': ($("#MMenorNariz_Desc").val()) ? $("#MMenorNariz_Desc").val() : '',
            'MenorOidos': ($("input:radio[name=MMenorOidos]:checked").val()) ? $("input:radio[name=MMenorOidos]:checked").val() : '',
            'MenorOidos_Desc': ($("#MMenorOidos_Desc").val()) ? $("#MMenorOidos_Desc").val() : '',
            'MenorBoca': ($("input:radio[name=MMenorBoca]:checked").val()) ? $("input:radio[name=MMenorBoca]:checked").val() : '',
            'MenorBoca_Desc': ($("#MMenorBoca_Desc").val()) ? $("#MMenorBoca_Desc").val() : '',
            'Menorcuello': ($("input:radio[name=MMenorcuello]:checked").val()) ? $("input:radio[name=MMenorcuello]:checked").val() : '',
            'Menorcuello_Desc': ($("#MMenorcuello_Desc").val()) ? $("#MMenorcuello_Desc").val() : '',
            'MenorcardioRespirat': ($("input:radio[name=MMenorcardioRespirat]:checked").val()) ? $("input:radio[name=MMenorcardioRespirat]:checked").val() : '',
            'MenorcardioRespirat_Desc': ($("#MMenorcardioRespirat_Desc").val()) ? $("#MMenorcardioRespirat_Desc").val() : '',
            'Menorabdomen': ($("#input:radio[name=Menorabdomen]:checked").val()) ? $("#input:radio[name=Menorabdomen]:checked").val() : '',
            'Menorabdomen_Desc': ($("#MMenorabdomen_Desc").val()) ? $("#MMenorabdomen_Desc").val() : '',
            'Menorgenitourinario': ($("input:radio[name=MMenorgenitourinario]:checked").val()) ? $("input:radio[name=MMenorgenitourinario]:checked").val() : '',
            'Menorgenitourinario_Desc': ($("#MMenorgenitourinario_Desc").val()) ? $("#MMenorgenitourinario_Desc").val() : '',
            'MenorAno': ($("#input:radio[name=MMenorAno]:checked").val()) ? $("input:radio[name=MMenorAno]:checked").val() : '',
            'MenorAno_Desc': ($("#MMenorAno_Desc").val()) ? $("#MMenorAno_Desc").val() : '',
            'MenorExtremidades': ($("input:radio[name=MMenorExtremidades]:checked").val()) ? $("input:radio[name=MMenorExtremidades]:checked").val() : '',
            'MenorExtremidades_Desc': ($("#MMenorExtremidades_Desc").val()) ? $("#MMenorExtremidades_Desc").val() : '',
            'Menorpiel': ($("input:radio[name=MMenorpiel]:checked").val()) ? $("input:radio[name=MMenorpiel]:checked").val() : '',
            'Menorpiel_Desc': ($("#MMenorpiel_Desc").val()) ? $("#MMenorpiel_Desc").val() : '',
            'Menorsistemanervioso': ($("input:radio[name=MMenorsistemanervioso]:checked").val()) ? $("input:radio[name=MMenorsistemanervioso]:checked").val() : '',
            'Menorsistemanervioso_Desc': ($("#MMenorsistemanervioso_Desc").val()) ? $("#MMenorsistemanervioso_Desc").val() : '',
            'MenordolorMascar': ($("#MMenordolorMascar").val()) ? $("#MMenordolorMascar").val() : '',
            'MenortraumaBoca': ($("#MMenortraumaBoca").val()) ? $("#MMenortraumaBoca").val() : '',
            'MenorLimpiamanana': ($("#MMenorLimpiamanana").val()) ? $("#MMenorLimpiamanana").val() : '',
            'MenorLimpiamedioDia': ($("#MMenorLimpiamedioDia").val()) ? $("#MMenorLimpiamedioDia").val() : '',
            'MenorLimpiaNoche': ($("#MMenorLimpiaNoche").val()) ? $("#MMenorLimpiaNoche").val() : '',
            'MenorLimpiaDientesSolo': ($("#MMenorLimpiaDientesSolo").val()) ? $("#MMenorLimpiaDientesSolo").val() : '',
            'MenorusaCepillo': ($("#MMenorusaCepillo").val()) ? $("#MMenorusaCepillo").val() : '',
            'MenorusaCrema': ($("#MMenorusaCrema").val()) ? $("#MMenorusaCrema").val() : '',
            'MenorusaSeda': ($("#MMenorusaSeda").val()) ? $("#MMenorusaSeda").val() : '',
            'MenorusaChupoB': ($("#MMenorusaChupoB").val()) ? $("#MMenorusaChupoB").val() : '',
            'MenorfechaUConsOdo': ($("#MMenorfechaUConsOdo").val()) ? $("#MMenorfechaUConsOdo").val() : '',
            'Menorpesoedad02': ($("#MMenorpesoedad02").val()) ? $("#MMenorpesoedad02").val() : '',
            'Menorpesoedad25': ($("#MMenorpesoedad25").val()) ? $("#MMenorpesoedad25").val() : '',
            'Menortallaedad018': ($("#MMenortallaedad018").val()) ? $("#MMenortallaedad018").val() : '',
            'Menorpesotalla018': ($("#MMenorpesotalla018").val()) ? $("#MMenorpesotalla018").val() : '',
            'Menorimc05': ($("#MMenorimc05").val()) ? $("#MMenorimc05").val() : '',
            'Menorimc518': ($("#MMenorimc518").val()) ? $("#MMenorimc518").val() : '',
            'MenorperimetroCefalicoEV': ($("#MMenorperimetroCefalicoEV").val()) ? $("#MMenorperimetroCefalicoEV").val() : '',
            'MenorTendenciaPeso': ($("#MMenorTendenciaPeso").val()) ? $("#MMenorTendenciaPeso").val() : '',
            'MenorHemoclasificacion': ($("#MMenorHemoclasificacion").val()) ? $("#MMenorHemoclasificacion").val() : '',
            'MenorSerologia': ($("#MMenorSerologia").val()) ? $("#MMenorSerologia").val() : '',
            'MenorHipotiroidismo': ($("#MMenorHipotiroidismo").val()) ? $("#MMenorHipotiroidismo").val() : '',
            'listadoCIEPa': cieIngCon,
            'tipoDiagnosPrinc': ($("#MtipoDiagnosPrinc").val()) ? $("#MtipoDiagnosPrinc").val() : '',
            'medAsigCons': medIngCon,
            'notasEvolucion': ($("#MnotasEvolucion").val()) ? $("#MnotasEvolucion").val() : '',
            'recomNotas': ($("#MrecomNotas").val()) ? $("#MrecomNotas").val() : '',
            'ordenMedCons': ordenesIngCon,
            'ordenMedConsRef': ordenesIngConRef,
            'ordenMedConsRefPro': ordenesIngConRefPro,
            'tipoSerRef': ($("#MtipoServicioReferir").val()) ? $("#MtipoServicioReferir").val() : '',
            'obseSerRef': ($("#MObservacionesReferir").val()) ? $("#MObservacionesReferir").val() : '', 
            'IpsServicioReferir': ($("#MIpsServicioReferir").val()) ? $("#MIpsServicioReferir").val() : '',
            'IpsProcedeimientoReferir': ($("#MIpsProcedeimientoReferir").val()) ? $("#MIpsProcedeimientoReferir").val() : '',
            'estado': 1
        };
        console.log(dataIn);
        varDataIn={
            'id_paciente': paciente.id,
            'idJSON_paciente': paciente.idJSON,
            'numid_pac': paciente.idRegPac,
            'tipoid_pac': paciente.tipoidRegPac,
            'institucion': usuario.institucion,
            'data':JSON.stringify(dataIn),
            'key':'GimmidsApp'
        };
        
        if(paciente.estado==1){
            $.ajax({
                url: "https://saludsp.com.co/api/servicios/registerMenorConsultation.php",
                type: "post",
                data: {'datos': varDataIn},
                async:false
            }).done(function(res){
                console.log(res);
                console.log("Respuesta: "); 
                try {
                    var data=JSON.parse(res);
                    console.log(data);  
                    if (data.STATUS == 'OK' && (data.ID!=null && data.ID!=undefined && data.ID!=0)) {
                        dataIn.id_consulta = data.ID;
                        menor.push(dataIn);
                        fs.writeFileSync(__dirname+'/json/consultas_menor.json', JSON.stringify(menor));
                        localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                        localStorage.setItem('consultaRegistradaTipo', 6);
                        alert('Consulta Registrada remota y localmente con exito!');
                        
                         imprimirConsultaMedica();
                        $("#modal-imprimirConsulta").modal('show');
                    } else {
                        console.log(data);  
                        
                        alert(data.ERROR);
                        
                        if (confirm('Problemas al registrar consulta al servidor. Desea volver a intentarlo, si selecciona cancelar se almacenara localmente?')) {
                            regitrarConsultaMenor(); 
        
                        } else {
                            dataIn.estado = 0;  
                            menor.push(dataIn);
                            fs.writeFileSync(__dirname+'/json/consultas_menor.json', JSON.stringify(menor));
                            localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                            localStorage.setItem('consultaRegistradaTipo', 6);
                            alert('Consulta Registrada localmente con exito!');
                            imprimirConsultaMedica();
                            $("#modal-imprimirConsulta").modal('show');
                        
        
        
                        } 
                    }
        
        
                } catch (error) {
                    if(confirm('Error al registrar la consulta al servidor. Desea volver a intentarlo? Si selecciona cancelar se almacenara localmente.')){
                        regitrarConsultaMenor();
                    }else{
                        dataIn.estado = 0;  
                        menor.push(dataIn);
                        fs.writeFileSync(__dirname+'/json/consultas_menor.json', JSON.stringify(menor));
                        localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                        localStorage.setItem('consultaRegistradaTipo', 6);
                        alert('Consulta Registrada localmente con exito!');
                        imprimirConsultaMedica();
                        $("#modal-imprimirConsulta").modal('show');
                    
                    }
                }
        
        
            } ).fail(function() { 
                dataIn.estado = 0;  
                menor.push(dataIn);
                fs.writeFileSync(__dirname+'/json/consultas_menor.json', JSON.stringify(menor));
                localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                localStorage.setItem('consultaRegistradaTipo', 6);
                alert('Consulta Registrada localmente con exito!');
                imprimirConsultaMedica();
                $("#modal-imprimirConsulta").modal('show');
            });
        }else{
            dataIn.estado = 0;  
            menor.push(dataIn);
            fs.writeFileSync(__dirname+'/json/consultas_menor.json', JSON.stringify(menor));
            localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
            localStorage.setItem('consultaRegistradaTipo', 6);
            alert('Consulta Registrada localmente con exito!');
            imprimirConsultaMedica();
            $("#modal-imprimirConsulta").modal('show');
        
        }
    
    }else{
        alert('Hacen falta varibales obligatorias por digitar!..');
    }
    
    
}

function regitrarConsultaGestante(){
    console.log('consulta gestante registrando');

    console.log('consulta menor registrando');
    if(listadoCIEPa.length!=0 && $("#GtipoConsulta").val()!='' && $("#GfinalidadConsulta").val()!='' && $("#GcausaExternaConsulta").val()!='' && $("#GmotivoConsulta").val()!='' && $("#GtipoDiagnosPrinc").val()!='' && examenfisicoPrenVal==1){

        var cieIngCon = '';
        for (var i = 0; i < listadoCIEPa.length; i++) {
    
            cieIngCon += listadoCIEPa[i].cod + '-,-' + listadoCIEPa[i].desc + '   -   ';
    
        }
        var medIngCon = '';
        var ordenesIngCon = '';
        var ordenesIngConRef = '';
        var ordenesIngConRefPro = '';
    
        for (var i = 0; i < ordenMedCons.length; i++) {
    
            ordenesIngCon += ordenMedCons[i].cod + '-,-' + ordenMedCons[i].desc + '-,-' + ordenMedCons[i].observa + '   -   ';
    
        }
        for (var i = 0; i < ordenMedConsRef.length; i++) {
    
            ordenesIngConRef += ordenMedConsRef[i].cod + '-,-' + ordenMedConsRef[i].desc + '-,-' + ordenMedConsRef[i].observa + '   -   ';
    
        }
        for (var i = 0; i < ordenMedConsRefPro.length; i++) {
    
            ordenesIngConRefPro += ordenMedConsRefPro[i].cod + '-,-' + ordenMedConsRefPro[i].desc + '-,-' + ordenMedConsRefPro[i].observa + '   -   ';
    
        }
    
        for (var i = 0; i < medAsigCons.length; i++) {
            medIngCon += medAsigCons[i].nombre + '-,-' + medAsigCons[i].presentacion + '-,-' + medAsigCons[i].periodicidad + '-,-' + medAsigCons[i].catdosis + '-,-' + medAsigCons[i].viadmin + '-,-' + medAsigCons[i].tiempo + '-,-' + medAsigCons[i].total + '   -   ';
    
        }
      
        
        var ControPrenaacieLis = '';

        ControPrenaacieLis += dataIncontrol.num + '-,-' + dataIncontrol.GestantetFechaCons1 + '-,-' + dataIncontrol.GestanteSemaGes1 + '-,-' + dataIncontrol.GestantepesoEA1 + '-,-' + dataIncontrol.GestantetallaEA1 + '-,-' + dataIncontrol.GestantepulsoEA1 + '-,-' + dataIncontrol.GestantefrecuenciarEA1 + '-,-' + dataIncontrol.GestantetempEA1 + '-,-' + dataIncontrol.GestantePresionArte1 + '-,-' + dataIncontrol.GestanteEdadGesRiesgo + '-,-' + dataIncontrol.Gestantepielyfaneras1 + '-,-' + dataIncontrol.GestanteorganosSentidos1 + '-,-' + dataIncontrol.GestantecavidadBucal1 + '-,-' + dataIncontrol.Gestanteneurosensorial1 + '-,-' + dataIncontrol.Gestantelocomotor1 + '-,-' + dataIncontrol.Gestantecardiovascular1 + '-,-' + dataIncontrol.Gestanterespiratorio1 + '-,-' + dataIncontrol.Gestantegastrointestinal1 + '-,-' + dataIncontrol.Gestantegenitorunario1 + '-,-' + dataIncontrol.Gestanteendoctrino1 + '-,-' + dataIncontrol.Gestanteexamama1 + '-,-' + dataIncontrol.GestanteAlturaUterina1 + '-,-' + dataIncontrol.GestanteNumFetos1 + '-,-' + dataIncontrol.GestanteSituacionC1 + '-,-' + dataIncontrol.GestantePresentFetal1 + '-,-' + dataIncontrol.GestantefrecuecardiaFetal1 + '-,-' + dataIncontrol.GestanteMovimFetal1 + '-,-' + dataIncontrol.GestanteValGine1 + '-,-' + dataIncontrol.GestantegananciaPesoInadecuado1 + '-,-' + dataIncontrol.GestanteIntoleraAlimentos1 + '-,-' + dataIncontrol.GestanteCefaleas1 + '-,-' + dataIncontrol.GestanteVisionBorosa1 + '-,-' + dataIncontrol.GestanteEpigastralgia1 + '-,-' + dataIncontrol.GestanteSintomasUrinario1 + '-,-' + dataIncontrol.GestanteFlujVagina1 + '-,-' + dataIncontrol.GestanteEdemas1 + '-,-' + dataIncontrol.GestanteClasifRhneg1 + '-,-' + dataIncontrol.GestanteRiesgosGene1 + '-,-' + dataIncontrol.GestanteBiologEspe1 + '-,-' + dataIncontrol.GestanteRiePsico1 + '-,-' + dataIncontrol.GestanteRiedeprePostparto + '-,-' + dataIncontrol.firma + '   -   ';
 
        
        var examHemogesta = '';
        for (var i = 0; i < examenesHemo.length; i++) {
            examHemogesta += examenesHemo[i].tipoexamenh + '-,-' + examenesHemo[i].trimestreexamenh + '-,-' + examenesHemo[i].GestanteHEMOGRAMAFec + '-,-' + examenesHemo[i].GestanteHEMOGRAMADesc + '-,-' + examenesHemo[i].GestanteHEMOGRAMA1 + '   -   ';

        }
        var echoasgesta = '';
        for (var i = 0; i < echoGestan.length; i++) {
            echoasgesta += echoGestan[i].GestanteFechEco + '-,-' + echoGestan[i].GestanteObsEcos + '-,-' + echoGestan[i].GestanteNormEco + '   -   ';

        }

         

        hoy = new Date();
        var mes;
        if(parseInt(( hoy.getMonth() + 1 ))<10){
            mes='0'+( hoy.getMonth() + 1 );
        }else{
            mes=( hoy.getMonth() + 1 );
        }
        fecha = hoy.getDate() + '-' + mes + '-' + hoy.getFullYear();
        hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();
    
       
        
        var dataIn = {
            'id_consulta': '',
            'idJSON_consulta': obtenerConsecutivoJSONConsultasGest(),
            'id_gestacion': 0,
            'id_gestacionJSON': 0,
            'numid_pac': paciente.idRegPac,
            'tipoid_pac':paciente.tipoidRegPac, 
            'id_registra': usuario.numid,
            'tipoid_registra': usuario.tipoid,
            'insitucion': usuario.institucion,
            'fechaConsulta': fecha,
            'horaConsulta': hora,
            'dptoatencion': ($("#dptoatencion-gestante").val()) ? $("#dptoatencion-gestante").val() : '',
            'mnpoatencion': ($("#mnpoatencion-gestante").val()) ? $("#mnpoatencion-gestante").val() : '',
            'atencion': ($("#atencion-gestante").val()) ? $("#atencion-gestante").val() : '',
            'tipoConsulta': ($("#GtipoConsulta").val()) ? $("#GtipoConsulta").val() : '',
            'finalidadConsulta': ($("#GfinalidadConsulta").val()) ? $("#GfinalidadConsulta").val() : '',
            'causaExternaConsulta': ($("#GcausaExternaConsulta").val()) ? $("#GcausaExternaConsulta").val() : '',
            'motivoConsulta': ($("#GmotivoConsulta").val()) ? $("#GmotivoConsulta").val() : '',
            'enfermedadActualConsulta': ($("#GenfermedadActualConsulta").val()) ? $("#GenfermedadActualConsulta").val() : '',
            'embraActuaPlanea': ($("#GembraActuaPlanea").val()) ? $("#GembraActuaPlanea").val() : '',
            'embraActuaDesead': ($("#GembraActuaDesead").val()) ? $("#GembraActuaDesead").val() : '',
            'deseaInterrumEmbara': ($("#GdeseaInterrumEmbara").val()) ? $("#GdeseaInterrumEmbara").val() : '',
            'GestanteAntDiabetes': ($("input:radio[name=GGestanteAntDiabetes]:checked").val()) ? $("input:radio[name=GGestanteAntDiabetes]:checked").val() : '',
            'GestanteAntHipertensionArterial': ($("input:radio[name=GGestanteAntHipertensionArterial]:checked").val()) ? $("input:radio[name=GGestanteAntHipertensionArterial]:checked").val() : '',
            'GestanteAntCirugiaPelvica': ($("input:radio[name=GGestanteAntCirugiaPelvica]:checked").val()) ? $("input:radio[name=GGestanteAntCirugiaPelvica]:checked").val() : '',
            'GestanteAntOtrasCirugias': ($("input:radio[name=GGestanteAntOtrasCirugias]:checked").val()) ? $("input:radio[name=GGestanteAntOtrasCirugias]:checked").val() : '',
            'GestanteAntPreeclamsia': ($("input:radio[name=GGestanteAntPreeclamsia]:checked").val()) ? $("input:radio[name=GGestanteAntPreeclamsia]:checked").val() : '',
            'GestanteAntEclamsia': ($("input:radio[name=GGestanteAntEclamsia]:checked").val()) ? $("input:radio[name=GGestanteAntEclamsia]:checked").val() : '',
            'GestanteAntFactorRH': ($("input:radio[name=GGestanteAntFactorRH]:checked").val()) ? $("input:radio[name=GGestanteAntFactorRH]:checked").val() : '',
            'GestanteAntTransfusiones': ($("input:radio[name=GGestanteAntTransfusiones]:checked").val()) ? $("input:radio[name=GGestanteAntTransfusiones]:checked").val() : '',
            'GestanteAntAltTiroideas': ($("input:radio[name=GGestanteAntAltTiroideas]:checked").val()) ? $("input:radio[name=GGestanteAntAltTiroideas]:checked").val() : '',
            'GestanteAntNutiPrevDefic': ($("input:radio[name=GGestanteAntNutiPrevDefic]:checked").val()) ? $("input:radio[name=GGestanteAntNutiPrevDefic]:checked").val() : '',
            'GestanteAntEnfRenalCronica': ($("input:radio[name=GGestanteAntEnfRenalCronica]:checked").val()) ? $("input:radio[name=GGestanteAntEnfRenalCronica]:checked").val() : '',
            'GestanteAntTtoInfertilidad': ($("input:radio[name=GGestanteAntTtoInfertilidad]:checked").val()) ? $("input:radio[name=GGestanteAntTtoInfertilidad]:checked").val() : '',
            'GestanteAntDifLactancia': ($("input:radio[name=GGestanteAntDifLactancia]:checked").val()) ? $("input:radio[name=GGestanteAntDifLactancia]:checked").val() : '',
            'GestanteAntAlergias': ($("input:radio[name=GGestanteAntAlergias]:checked").val()) ? $("input:radio[name=GGestanteAntAlergias]:checked").val() : '',
            'GestanteAntAlergiassCuales': ($("#GGestanteAntAlergiassCuales").val()) ? $("#GGestanteAntAlergiassCuales").val() : '',
            'GestanteAntTraumaticos': ($("input:radio[name=GGestanteAntTraumaticos]:checked").val()) ? $("input:radio[name=GGestanteAntTraumaticos]:checked").val() : '',
            'GestanteAntOtrasTBC': ($("input:radio[name=GGestanteAntOtrasTBC]:checked").val()) ? $("input:radio[name=GGestanteAntOtrasTBC]:checked").val() : '',
            'GestanteAntPsicofarm': ($("input:radio[name=GGestanteAntPsicofarm]:checked").val()) ? $("input:radio[name=GGestanteAntPsicofarm]:checked").val() : '',
            'GestanteAntOtrasCigarrilloAlcohol': ($("input:radio[name=GGestanteAntOtrasCigarrilloAlcohol]:checked").val()) ? $("input:radio[name=GGestanteAntOtrasCigarrilloAlcohol]:checked").val() : '',
            'GestanteAnIrradiacion': ($("input:radio[name=GGestanteAnIrradiacion]:checked").val()) ? $("input:radio[name=GGestanteAnIrradiacion]:checked").val() : '',
            'GestanteVIHSIDA': ($("input:radio[name=GGestanteVIHSIDA]:checked").val()) ? $("input:radio[name=GGestanteVIHSIDA]:checked").val() : '',
            'GestanteAntExpoToxicos': ($("input:radio[name=GGestanteAntExpoToxicos]:checked").val()) ? $("input:radio[name=GGestanteAntExpoToxicos]:checked").val() : '',
            'GestanteAntExpoToxicosCuales': ($("#GestanteAntExpoToxicosCuales").val()) ? $("#GGestanteAntExpoToxicosCuales").val() : '',
            'GestanteAntMedicamentos': ($("input:radio[name=GGestanteAntMedicamentos]:checked").val()) ? $("input:radio[name=GGestanteAntMedicamentos]:checked").val() : '',
            'GestanteAntMedicamentosCuales': ($("#GGestanteAntMedicamentosCuales").val()) ? $("#GGestanteAntMedicamentosCuales").val() : '',
            'GestanteAntUsaCepillo': ($("input:radio[name=GGestanteAntUsaCepillo]:checked").val()) ? $("input:radio[name=GGestanteAntUsaCepillo]:checked").val() : '',
            'GestanteAntUsaCrema': ($("input:radio[name=GGestanteAntUsaCrema]:checked").val()) ? $("input:radio[name=GGestanteAntUsaCrema]:checked").val() : '',
            'GestanteAntUsaSeda': ($("input:radio[name=GGestanteAntUsaSeda]:checked").val()) ? $("input:radio[name=GGestanteAntUsaSeda]:checked").val() : '',
            'GestanteAntVecesCepilla': ($("#GGestanteAntVecesCepilla").val()) ? $("#GGestanteAntVecesCepilla").val() : '',
            'GestanteAntSangranEncias': ($("input:radio[name=GGestanteAntSangranEncias]:checked").val()) ? $("input:radio[name=GGestanteAntSangranEncias]:checked").val() : '',
            'GestanteAntDolorRuidosATM': ($("input:radio[name=GGestanteAntDolorRuidosATM]:checked").val()) ? $("input:radio[name=GGestanteAntDolorRuidosATM]:checked").val() : '',
            'GestanteAntMovilidadDientes': ($("input:radio[name=GGestanteAntMovilidadDientes]:checked").val()) ? $("input:radio[name=GGestanteAntMovilidadDientes]:checked").val() : '',
            'GestanteAntLimitacionAbrirBoca': ($("input:radio[name=GGestanteAntLimitacionAbrirBoca]:checked").val()) ? $("input:radio[name=GGestanteAntLimitacionAbrirBoca]:checked").val() : '',
            'GestanteAntFechaUConsO': ($("#GGestanteAntFechaUConsO").val()) ? $("#GGestanteAntFechaUConsO").val() : '',
            'GestanteAntEdadMenarquia': ($("#GGestanteAntEdadMenarquia").val()) ? $("#GGestanteAntEdadMenarquia").val() : '',
            'GestanteSexarquia': ($("#GGestanteSexarquia").val()) ? $("#GGestanteSexarquia").val() : '',
            'GestanteAntFechaFum': ($("#GGestanteAntFechaFum").val()) ? $("#GGestanteAntFechaFum").val() : '',
            'GestanteAntConfiableFUM': ($("input:radio[name=GGestanteAntConfiableFUM]:checked").val()) ? $("input:radio[name=GGestanteAntConfiableFUM]:checked").val() : '',
            'GestanteAntCiclosIrregulares': ($("#GGestanteAntCiclosIrregulares").val()) ? $("#GGestanteAntCiclosIrregulares").val() : '',
            'GestanteAntPatronCicloI': ($("#GGestanteAntPatronCicloI").val()) ? $("#GGestanteAntPatronCicloI").val() : '',
            'GestanteAntPatronCicloII': ($("#GGestanteAntPatronCicloII").val()) ? $("#GGestanteAntPatronCicloII").val() : '',
            'GestanteAntFEchaUltParto': ($("#GGestanteAntFEchaUltParto").val()) ? $("#GGestanteAntFEchaUltParto").val() : '',
            'GestanteAntFechaFPP': ($("#GGestanteAntFechaFPP").val()) ? $("#GGestanteAntFechaFPP").val() : '',
            'GestanteAntparejasSexuales': ($("input:radio[name=GGestanteAntparejasSexuales]:checked").val()) ? $("input:radio[name=GGestanteAntparejasSexuales]:checked").val() : '',
            'GestanteAntVihRprueba': ($("input:radio[name=GGestanteAntVihRprueba]:checked").val()) ? $("input:radio[name=GGestanteAntVihRprueba]:checked").val() : '',
            'GestanteAntTtoInfertilidadG': ($("#GGestanteAntTtoInfertilidadG").val()) ? $("#GGestanteAntTtoInfertilidadG").val() : '',
            'GestanteAntTtoInfertilidadGTipo': ($("#GGestanteAntTtoInfertilidadGTipo").val()) ? $("#GGestanteAntTtoInfertilidadGTipo").val() : '',
            'GestanteAntMetodoPlanifica': ($("#GGestanteAntMetodoPlanifica").val()) ? $("#GGestanteAntMetodoPlanifica").val() : '',
            'GestanteAntFechaSusMetodoPlan': ($("#GGestanteAntFechaSusMetodoPlan").val()) ? $("#GGestanteAntFechaSusMetodoPlan").val() : '',
            'GestanteAntEmbarazos': ($("input:radio[name=GGestanteAntEmbarazos]:checked").val()) ? $("input:radio[name=GGestanteAntEmbarazos]:checked").val() : '',
            'GestanteAntAbortoHabitu': ($("#GGestanteAntAbortoHabitu").val()) ? $("#GGestanteAntAbortoHabitu").val() : '',
            'GestanteAntGineG': ($("#GGestanteAntGineG").val()) ? $("#GGestanteAntGineG").val() : '',
            'GestanteAntGineP': ($("#GGestanteAntGineP").val()) ? $("#GGestanteAntGineP").val() : '',
            'GestanteAntGineC': ($("#GGestanteAntGineC").val()) ? $("#GGestanteAntGineC").val() : '',
            'GestanteAntGineA': ($("#GGestanteAntGineA").val()) ? $("#GGestanteAntGineA").val() : '',
            'GestanteAntGineE': ($("#GGestanteAntGineE").val()) ? $("#GGestanteAntGineE").val() : '',
            'GestanteAntGineV': ($("#GGestanteAntGineV").val()) ? $("#GGestanteAntGineV").val() : '',
            'GestanteAntGineM': ($("#GGestanteAntGineM").val()) ? $("#GGestanteAntGineM").val() : '',
            'GestanteAntObservaObst': ($("#GGestanteAntObservaObst").val()) ? $("#GGestanteAntObservaObst").val() : '',
            'GestanteAntLeucorreas': ($("input:radio[name=GGestanteAntLeucorreas]:checked").val()) ? $("input:radio[name=GGestanteAntLeucorreas]:checked").val() : '',
            'GestanteAntLeucorreasDescr': ($("#GGestanteAntLeucorreasDescr").val()) ? $("#GGestanteAntLeucorreasDescr").val() : '',
            'GestanteAntETS': ($("#GGestanteAntETS").val()) ? $("#GGestanteAntETS").val() : '',
            'GestanteAntFechaCITOLOGIAUtl': ($("#GestanteAntFechaCITOLOGIAUtl").val()) ? $("#GestanteAntFechaCITOLOGIAUtl").val() : '',
            'GestanteAntCOLPOSCOPIA': ($("input:radio[name=GGestanteAntCOLPOSCOPIA]:checked").val()) ? $("input:radio[name=GGestanteAntCOLPOSCOPIA]:checked").val() : '',
            'GestanteAntPerioINTERGENESICO': ($("#GGestanteAntPerioINTERGENESICO").val()) ? $("#GGestanteAntPerioINTERGENESICO").val() : '',
            'GestanteAntPerioINTERGENESICOUME': ($("input:radio[name=GGestanteAntPerioINTERGENESICOUME]:checked").val()) ? $("input:radio[name=GGestanteAntPerioINTERGENESICOUME]:checked").val() : '',
            'GestanteAntRCIU': ($("#GGestanteAntRCIU").val()) ? $("#GGestanteAntRCIU").val() : '',
            'GestanteAntAmenaPartoPrematuro': ($("input:radio[name=GGestanteAntAmenaPartoPrematuro]:checked").val()) ? $("input:radio[name=GGestanteAntAmenaPartoPrematuro]:checked").val() : '',
            'GestanteAntPartoPREMATURO': ($("input:radio[name=GGestanteAntPartoPREMATURO]:checked").val()) ? $("input:radio[name=GGestanteAntPartoPREMATURO]:checked").val() : '',
            'GestanteAntEmbaraMultiple': ($("input:radio[name=GGestanteAntEmbaraMultiple]:checked").val()) ? $("input:radio[name=GGestanteAntEmbaraMultiple]:checked").val() : '',
            'GestanteAntEmbaraMultipleDesc': ($("#GGestanteAntEmbaraMultipleDesc").val()) ? $("#GGestanteAntEmbaraMultipleDesc").val() : '',
            'GestanteAntMALFORMACIONES': ($("#GGestanteAntMALFORMACIONES").val()) ? $("#GGestanteAntMALFORMACIONES").val() : '',
            'GestanteAntMOLAS': ($("input:radio[name=GGestanteAntMOLAS]:checked").val()) ? $("input:radio[name=GGestanteAntMOLAS]:checked").val() : '',
            'GestanteAntPLACPREVIA': ($("input:radio[name=GGestanteAntPLACPREVIA]:checked").val()) ? $("input:radio[name=GGestanteAntPLACPREVIA]:checked").val() : '',
            'GestanteAntABRUPTIO': ($("input:radio[name=GGestanteAntABRUPTIO]:checked").val()) ? $("input:radio[name=GGestanteAntABRUPTIO]:checked").val() : '',
            'GestanteAntRetePlacenta': ($("input:radio[name=GGestanteAntRetePlacenta]:checked").val()) ? $("input:radio[name=GGestanteAntRetePlacenta]:checked").val() : '',
            'GestanteAntRupturaPreMembra': ($("input:radio[name=GGestanteAntRupturaPreMembra]:checked").val()) ? $("input:radio[name=GGestanteAntRupturaPreMembra]:checked").val() : '',
            'GestanteAntOLIGOHIDRAMNIOS': ($("input:radio[name=GGestanteAntOLIGOHIDRAMNIOS]:checked").val()) ? $("input:radio[name=GGestanteAntOLIGOHIDRAMNIOS]:checked").val() : '',
            'GestanteAntOLIGOAMNIOS': ($("input:radio[name=GGestanteAntOLIGOAMNIOS]:checked").val()) ? $("input:radio[name=GGestanteAntOLIGOAMNIOS]:checked").val() : '',
            'GestanteHemorraObst': ($("input:radio[name=GGestanteHemorraObst]:checked").val()) ? $("input:radio[name=GGestanteHemorraObst]:checked").val() : '',
            'GestanteTransfucciones': ($("input:radio[name=GGestanteTransfucciones]:checked").val()) ? $("input:radio[name=GGestanteTransfucciones]:checked").val() : '',
            'GestanteAntEmbProlongado': ($("input:radio[name=GGestanteAntEmbProlongado]:checked").val()) ? $("input:radio[name=GGestanteAntEmbProlongado]:checked").val() : '',
            'GestanteAntGineOtros': ($("input:radio[name=GGestanteAntGineOtros]:checked").val()) ? $("input:radio[name=GGestanteAntGineOtros]:checked").val() : '',
            'GestanteAntGineOtrosCuales': ($("#GGestanteAntGineOtrosCuales").val()) ? $("#GGestanteAntGineOtrosCuales").val() : '',
            'GestanteAntAmenazaAborto': ($("#GGestanteAntAmenazaAborto").val()) ? $("#GGestanteAntAmenazaAborto").val() : '',
            'GestanteAntInfeccPostParto': ($("input:radio[name=GGestanteAntInfeccPostParto]:checked").val()) ? $("input:radio[name=GGestanteAntInfeccPostParto]:checked").val() : '',
            'GestanteAntMacromsiaFetal': ($("input:radio[name=GGestanteAntMacromsiaFetal]:checked").val()) ? $("input:radio[name=GGestanteAntMacromsiaFetal]:checked").val() : '',
            'GestanteAntMuertePerinatal': ($("input:radio[name=GGestanteAntMuertePerinatal]:checked").val()) ? $("input:radio[name=GGestanteAntMuertePerinatal]:checked").val() : '',
            'GestanteAntMuertePerinatalCausa': ($("#GGestanteAntMuertePerinatalCausa").val()) ? $("#GGestanteAntMuertePerinatalCausa").val() : '',
            'GestanteAntPsicosisPostParto': ($("input:radio[name=GGestanteAntPsicosisPostParto]:checked").val()) ? $("input:radio[name=GGestanteAntPsicosisPostParto]:checked").val() : '',
            'GestanteAntDiabetesfamiliar': ($("input:radio[name=GGestanteAntDiabetesfamiliar]:checked").val()) ? $("input:radio[name=GGestanteAntDiabetesfamiliar]:checked").val() : '',
            'GestanteAntHtaFamiliar': ($("input:radio[name=GGestanteAntHtaFamiliar]:checked").val()) ? $("input:radio[name=GGestanteAntHtaFamiliar]:checked").val() : '',
            'GestanteAntPreeclamsiaFamiliares': ($("input:radio[name=GGestanteAntPreeclamsiaFamiliares]:checked").val()) ? $("input:radio[name=GGestanteAntPreeclamsiaFamiliares]:checked").val() : '',
            'GestanteAntEclamsiaFamiliares': ($("input:radio[name=GGestanteAntEclamsiaFamiliares]:checked").val()) ? $("input:radio[name=GGestanteAntEclamsiaFamiliares]:checked").val() : '',
            'GestanteAntGemelaresFamiliares': ($("input:radio[name=GGestanteAntGemelaresFamiliares]:checked").val()) ? $("input:radio[name=GGestanteAntGemelaresFamiliares]:checked").val() : '',
            'GestanteAntCardiopatiaFamiliares': ($("input:radio[name=GGestanteAntCardiopatiaFamiliares]:checked").val()) ? $("input:radio[name=GGestanteAntCardiopatiaFamiliares]:checked").val() : '',
            'GestanteAntEnfTROMBOFILIAS': ($("input:radio[name=GGestanteAntEnfTROMBOFILIAS]:checked").val()) ? $("input:radio[name=GGestanteAntEnfTROMBOFILIAS]:checked").val() : '',
            'GestanteAntTBCFamiliares': ($("input:radio[name=GGestanteAntTBCFamiliares]:checked").val()) ? $("input:radio[name=GGestanteAntTBCFamiliares]:checked").val() : '',
            'GestanteAntTranstornosMentales': ($("input:radio[name=GGestanteAntTranstornosMentales]:checked").val()) ? $("input:radio[name=GGestanteAntTranstornosMentales]:checked").val() : '',
            'GestanteAntEpilepsia': ($("input:radio[name=GGestanteAntEpilepsia]:checked").val()) ? $("input:radio[name=GGestanteAntEpilepsia]:checked").val() : '',
            'GestanteAntAutoinmune': ($("input:radio[name=GGestanteAntAutoinmune]:checked").val()) ? $("input:radio[name=GGestanteAntAutoinmune]:checked").val() : '',
            'GestanteAntNeoplasias': ($("input:radio[name=GGestanteAntNeoplasias]:checked").val()) ? $("input:radio[name=GGestanteAntNeoplasias]:checked").val() : '',
            'GestanteAntDiscapacidadFamiliares': ($("input:radio[name=GGestanteAntTranstornosMentales]:checked").val()) ? $("input:radio[name=GGestanteAntTranstornosMentales]:checked").val() : '',
            'GestanteAntOtrosFamiliares': ($("input:radio[name=GGestanteAntOtrosFamiliares]:checked").val()) ? $("input:radio[name=GGestanteAntOtrosFamiliares]:checked").val() : '',
            'GestanteAntOtrosFamiliaresCuales': ($("#GGestanteAntOtrosFamiliaresCuales").val()) ? $("#GGestanteAntOtrosFamiliaresCuales").val() : '',
            'GestanteAntBiopssicuno': ($("#GGestanteAntBiopssicuno").is(":checked")) ? $("#GGestanteAntBiopssicuno").val() : '',
            'GestanteAntBiopssicdos': ($("#GGestanteAntBiopssicdos").is(":checked")) ? $("#GGestanteAntBiopssicdos").val() : '',
            'GestanteAntBiopssictres': ($("#GGestanteAntBiopssictres").is(":checked")) ? $("#GGestanteAntBiopssictres").val() : '',
            'BiopEdad': ($("#GBiopEdad").val()) ? $("#GBiopEdad").val() : '',
            'BioPari': ($("#GBioPari").val()) ? $("#GBioPari").val() : '',
            'abprhabinfer': ($("#Gabprhabinfer").is(":checked")) ? $("#Gabprhabinfer").val() : '',
            'retencPlacent': ($("#GretencPlacent").is(":checked")) ? $("#GretencPlacent").val() : '',
            'pesobebemayor': ($("#Gpesobebemayor").is(":checked")) ? $("#Gpesobebemayor").val() : '',
            'pesobebemenor': ($("#Gpesobebemenor").is(":checked")) ? $("#Gpesobebemenor").val() : '',
            'htaIndEmbara': ($("#GhtaIndEmbara").is(":checked")) ? $("#GhtaIndEmbara").val() : '',
            'EmbaGemelarCesara': ($("#GEmbaGemelarCesara").is(":checked")) ? $("#GEmbaGemelarCesara").val() : '',
            'mortinatoMuerto': ($("#GmortinatoMuerto").is(":checked")) ? $("#GmortinatoMuerto").val() : '',
            'TPProlongada': ($("#GTPProlongada").is(":checked")) ? $("#GTPProlongada").val() : '',
            'OXgineolgica': ($("#GOXgineolgica").is(":checked")) ? $("#GOXgineolgica").val() : '',
            'EnferReanlCronic': ($("#GEnferReanlCronic").is(":checked")) ? $("#GEnferReanlCronic").val() : '',
            'diabetGesta': ($("#GdiabetGesta").is(":checked")) ? $("#GdiabetGesta").val() : '',
            'diabetesMellitus': ($("#GdiabetesMellitus").is(":checked")) ? $("#GdiabetesMellitus").val() : '',
            'EnfermCardiaca': ($("#GEnfermCardiaca").is(":checked")) ? $("#GEnfermCardiaca").val() : '',
            'EnfermedadInfeccios': ($("#GEnfermedadInfeccios").is(":checked")) ? $("#GEnfermedadInfeccios").val() : '',
            'enfeAutoInmunes': ($("#GenfeAutoInmunes").is(":checked")) ? $("#GenfeAutoInmunes").val() : '',
            'anemiaHB10gl': ($("#GanemiaHB10gl").is(":checked")) ? $("#GanemiaHB10gl").val() : '',
            'hemorragia20ms': ($("#Ghemorragia20ms").is(":checked")) ? $("#Ghemorragia20ms").val() : '',
            'vaginal2oss': ($("#Gvaginal2oss").is(":checked")) ? $("#Gvaginal2oss").val() : '',
            'Epronlogadoante': ($("#GEpronlogadoante").is(":checked")) ? $("#GEpronlogadoante").val() : '',
            'htaantecdepr': ($("#Ghtaantecdepr").is(":checked")) ? $("#Ghtaantecdepr").val() : '',
            'anteRpm': ($("#GanteRpm").is(":checked")) ? $("#GanteRpm").val() : '',
            'polidraminiosAntEmbaActual': ($("#GpolidraminiosAntEmbaActual").is(":checked")) ? $("#GpolidraminiosAntEmbaActual").val() : '',
            'RCIUAntecente': ($("#GRCIUAntecente").is(":checked")) ? $("#GRCIUAntecente").val() : '',
            'embMultipleatne': ($("#GembMultipleatne").is(":checked")) ? $("#GembMultipleatne").val() : '',
            'MalaPresenta': ($("#GMalaPresenta").is(":checked")) ? $("#GMalaPresenta").val() : '',
            'isoirh': ($("#Gisoirh").is(":checked")) ? $("#Gisoirh").val() : '',
            'GestanteAntBiopssiccuator': ($("#GGestanteAntBiopssiccuator").is(":checked")) ? $("#GGestanteAntBiopssiccuator").val() : '',
            'GestanteAntBiopssiccinco': ($("#GGestanteAntBiopssiccinco").is(":checked")) ? $("#GGestanteAntBiopssiccinco").val() : '',
            'GestanteAntBiopssicseis': ($("#GGestanteAntBiopssicseis").is(":checked")) ? $("#GGestanteAntBiopssicseis").val() : '',
            'ControPrenaacieLis': ControPrenaacieLis,
            'GestanteVacu1ra': ($("#GGestanteVacu1ra").val()) ? $("#GGestanteVacu1ra").val() : '',
            'GestanteVacu2ra': ($("#GGestanteVacu2ra").val()) ? $("#GGestanteVacu2ra").val() : '',
            'GestanteVacu1': ($("#GGestanteVacu1").val()) ? $("#GGestanteVacu1").val() : '',
            'GestanteVacu2': ($("#GGestanteVacu2").val()) ? $("#GGestanteVacu2").val() : '',
            'GestanteVacu3': ($("#GGestanteVacu3").val()) ? $("#GGestanteVacu3").val() : '',
            'GestanteAnaRieMa1': ($("#GGestanteAnaRieMa1").val()) ? $("#GGestanteAnaRieMa1").val() : '',
            'GestanteAnaRieNi1': ($("#GGestanteAnaRieNi1").val()) ? $("#GGestanteAnaRieNi1").val() : '',
            'GestanteAnaRieMa2': ($("#GGestanteAnaRieMa2").val()) ? $("#GGestanteAnaRieMa2").val() : '',
            'GestanteAnaRieNi2': ($("#GGestanteAnaRieNi2").val()) ? $("#GGestanteAnaRieNi2").val() : '',
            'GestanteAnaRieMa3': ($("#GGestanteAnaRieMa3").val()) ? $("#GGestanteAnaRieMa3").val() : '',
            'GestanteAnaRieNi3': ($("#GGestanteAnaRieNi3").val()) ? $("#GGestanteAnaRieNi3").val() : '',
            'gestanteEntrPreTem1': ($("#GgestanteEntrPreTem1").val()) ? $("#GgestanteEntrPreTem1").val() : '',
            'gestanteEntrPreTem2': ($("#GgestanteEntrPreTem2").val()) ? $("#GgestanteEntrPreTem2").val() : '',
            'gestanteEntrPreTem3': ($("#GgestanteEntrPreTem3").val()) ? $("#GgestanteEntrPreTem3").val() : '',
            'gestanteEntrPreTem4': ($("#GgestanteEntrPreTem4").val()) ? $("#GgestanteEntrPreTem4").val() : '',
            'gestanteEntrPreTem5': ($("#GgestanteEntrPreTem5").val()) ? $("#GgestanteEntrPreTem5").val() : '',
            'gestanteEntrPreFec1': ($("#GgestanteEntrPreFec1").val()) ? $("#GgestanteEntrPreFec1").val() : '',
            'gestanteEntrPreFec2': ($("#GgestanteEntrPreFec2").val()) ? $("#GgestanteEntrPreFec2").val() : '',
            'gestanteEntrPreFec3': ($("#GgestanteEntrPreFec3").val()) ? $("#GgestanteEntrPreFec3").val() : '',
            'gestanteEntrPreFec4': ($("#GgestanteEntrPreFec4").val()) ? $("#GgestanteEntrPreFec4").val() : '',
            'gestanteEntrPreFec5': ($("#GgestanteEntrPreFec5").val()) ? $("#GgestanteEntrPreFec5").val() : '',
            'GestanteFactProct': ($("input:radio[name=GGestanteFactProct]:checked").val()) ? $("input:radio[name=GGestanteFactProct]:checked").val() : '',
            'GestanteEstimFetal': ($("input:radio[name=GGestanteEstimFetal]:checked").val()) ? $("input:radio[name=GGestanteEstimFetal]:checked").val() : '',
            'GestanteLactMater': ($("input:radio[name=GGestanteLactMater]:checked").val()) ? $("input:radio[name=GGestanteLactMater]:checked").val() : '',
            'GestanteVincuAfec': ($("input:radio[name=GGestanteVincuAfec]:checked").val()) ? $("input:radio[name=GGestanteVincuAfec]:checked").val() : '',
            'GestantePreveAutom': ($("input:radio[name=GGestantePreveAutom]:checked").val()) ? $("input:radio[name=GGestantePreveAutom]:checked").val() : '',
            'GestanteConTaba': ($("input:radio[name=GGestanteConTaba]:checked").val()) ? $("input:radio[name=GGestanteConTaba]:checked").val() : '',
            'GestanteSignAlar': ($("input:radio[name=GGestanteSignAlar]:checked").val()) ? $("input:radio[name=GGestanteSignAlar]:checked").val() : '',
            'gestanteOtroEduInd': ($("#GgestanteOtroEduInd").val()) ? $("#GgestanteOtroEduInd").val() : '',
            'GestnteGrupoSa': ($("#GGestnteGrupoSa").val()) ? $("#GGestnteGrupoSa").val() : '',
            'GestanteclasRh': ($("input:radio[name=GGestanteclasRh]:checked").val()) ? $("input:radio[name=GGestanteclasRh]:checked").val() : '',
            'examHemogesta':examHemogesta,
            'echoasgesta':echoasgesta,
            'GestanteCitolVag': ($("input:radio[name=GGestanteCitolVag]:checked").val()) ? $("input:radio[name=GGestanteCitolVag]:checked").val() : '',
            'GestanteFechaultCito': ($("#GestanteFechaultCito").val()) ? $("#GestanteFechaultCito").val() : '',
            'GestanteNormSatis': ($("#GGestanteNormSatis").val()) ? $("#GGestanteNormSatis").val() : '',
            'GestanteCamBeni': ($("#GGestanteCamBeni").val()) ? $("#GGestanteCamBeni").val() : '',
            'GestanteAnorPlant': ($("#GGestanteAnorPlant").val()) ? $("#GGestanteAnorPlant").val() : '',
            'GestanteColscopPl': ($("#GGestanteColscopPl").val()) ? $("#GGestanteColscopPl").val() : '',
            'listadoCIEPa': cieIngCon,
            'tipoDiagnosPrinc': ($("#GtipoDiagnosPrinc").val()) ? $("#GtipoDiagnosPrinc").val() : '',
            'medAsigCons': medIngCon, 
            'notasEvolucion': ($("#GnotasEvolucion").val()) ? $("#GnotasEvolucion").val() : '',
            'recomNotas': ($("#GrecomNotas").val()) ? $("#GrecomNotas").val() : '',
            'ordenMedCons': ordenesIngCon,
            'ordenMedConsRef': ordenesIngConRef,
            'ordenMedConsRefPro': ordenesIngConRefPro,
            'tipoSerRef': ($("#GtipoServicioReferir").val()) ? $("#GtipoServicioReferir").val() : '',
            'obseSerRef': ($("#GObservacionesReferir").val()) ? $("#GObservacionesReferir").val() : '',
            'IpsServicioReferir': ($("#GIpsServicioReferir").val()) ? $("#GIpsServicioReferir").val() : '',
            'IpsProcedeimientoReferir': ($("#GIpsProcedeimientoReferir").val()) ? $("#GIpsProcedeimientoReferir").val() : '',
            'causaCesareasAnt': ($("#GcausaCesareasAnt").val()) ? $("#GcausaCesareasAnt").val() : '',
            'ObserVExFisico': ($("#GObserVExFisico").val()) ? $("#GObserVExFisico").val() : '',
            'estado': 1
            
        }; 

        if(paciente.estado==1){
            $.ajax({
                url: "https://saludsp.com.co/api/servicios/registerPregnantConsultation.php",
                type: "post",
                data: { 'datos': dataIn,'key': 'GimmidsApp' },
                async:false
            }).done(function(res){
                console.log(res);
                console.log("Respuesta: "); 
                try {
                    var data=JSON.parse(res);
                    console.log(data);  
                    if (data.STATUS == 'OK' && (data.ID!=null && data.ID!=undefined && data.ID!=0)) {
                        dataIn.id_consulta = data.ID;
                        gestante.push(dataIn);
                        fs.writeFileSync(__dirname+'/json/consultas_gestaciones.json', JSON.stringify(gestante));
                        localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                        localStorage.setItem('consultaRegistradaTipo', 7);
                        alert('Consulta Registrada remota y localmente con exito!');
                        
                         imprimirConsultaMedica();
                        $("#modal-imprimirConsulta").modal('show');
                    } else {
                        console.log(data);  
                        
                        alert(data.ERROR);
                        
                        if (confirm('Problemas al registrar consulta al servidor. Desea volver a intentarlo, si selecciona cancelar se almacenara localmente?')) {
                            regitrarConsultaGestante(); 
        
                        } else {
                            dataIn.estado = 0;  
                            gestante.push(dataIn);
                            fs.writeFileSync(__dirname+'/json/consultas_gestaciones.json', JSON.stringify(gestante));
                            localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                            localStorage.setItem('consultaRegistradaTipo', 7);
                            alert('Consulta Registrada localmente con exito!');
                            imprimirConsultaMedica();
                            $("#modal-imprimirConsulta").modal('show');
                        
        
        
                        } 
                    }
        
        
                } catch (error) {
                    if(confirm('Error al registrar la consulta al servidor. Desea volver a intentarlo? Si selecciona cancelar se almacenara localmente.')){
                        regitrarConsultaGestante();
                    }else{
                        dataIn.estado = 0;  
                        gestante.push(dataIn);
                        fs.writeFileSync(__dirname+'/json/consultas_gestaciones.json', JSON.stringify(gestante));
                        localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                        localStorage.setItem('consultaRegistradaTipo', 7);
                        alert('Consulta Registrada localmente con exito!');
                        imprimirConsultaMedica();
                        $("#modal-imprimirConsulta").modal('show');
                    
                    }
                }
        
        
            } ).fail(function() { 
                dataIn.estado = 0;  
                gestante.push(dataIn);
                fs.writeFileSync(__dirname+'/json/consultas_gestaciones.json', JSON.stringify(gestante));
                localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                localStorage.setItem('consultaRegistradaTipo', 7);
                alert('Consulta Registrada localmente con exito!');
                imprimirConsultaMedica();
                $("#modal-imprimirConsulta").modal('show');
            });
        }else{
            dataIn.estado = 0;  
            gestante.push(dataIn);
            fs.writeFileSync(__dirname+'/json/consultas_gestaciones.json', JSON.stringify(gestante));
            localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
            localStorage.setItem('consultaRegistradaTipo', 7);
            alert('Consulta Registrada localmente con exito!');
            imprimirConsultaMedica();
            $("#modal-imprimirConsulta").modal('show');
        
        }
    
    }else{
        alert('Hacen falta varibales obligatorias por digitar!..');
    }
    
}

function regitrarConsultaSSR(){
    console.log('consulta ssr registrando CONSULTA SSR');
    if(listadoCIEPa.length!=0 && $("#NutSSRtipoConsulta").val()!='' && $("#NutSSRfinalidadConsulta").val()!='' && $("#NutSSRcausaExternaConsulta").val()!='' && $("#NutSSRmotivoConsulta").val()!='' && $("#NutSSRtipoDiagnosPrinc").val()!=''){

        var cieIngCon = '';
        for (var i = 0; i < listadoCIEPa.length; i++) {
    
            cieIngCon += listadoCIEPa[i].cod + '-,-' + listadoCIEPa[i].desc + '   -   ';
    
        }
        var medIngCon = '';
        var ordenesIngCon = '';
        var ordenesIngConRef = '';
        var ordenesIngConRefPro = '';
    
        for (var i = 0; i < ordenMedCons.length; i++) {
    
            ordenesIngCon += ordenMedCons[i].cod + '-,-' + ordenMedCons[i].desc + '-,-' + ordenMedCons[i].observa + '   -   ';
    
        }
        for (var i = 0; i < ordenMedConsRef.length; i++) {
    
            ordenesIngConRef += ordenMedConsRef[i].cod + '-,-' + ordenMedConsRef[i].desc + '-,-' + ordenMedConsRef[i].observa + '   -   ';
    
        }
        for (var i = 0; i < ordenMedConsRefPro.length; i++) {
    
            ordenesIngConRefPro += ordenMedConsRefPro[i].cod + '-,-' + ordenMedConsRefPro[i].desc + '-,-' + ordenMedConsRefPro[i].observa + '   -   ';
    
        }
    
        for (var i = 0; i < medAsigCons.length; i++) {
            medIngCon += medAsigCons[i].nombre + '-,-' + medAsigCons[i].presentacion + '-,-' + medAsigCons[i].periodicidad + '-,-' + medAsigCons[i].catdosis + '-,-' + medAsigCons[i].viadmin + '-,-' + medAsigCons[i].tiempo + '-,-' + medAsigCons[i].total + '   -   ';
    
        }
      
        hoy = new Date();
        var mes;
        if(parseInt(( hoy.getMonth() + 1 ))<10){
            mes='0'+( hoy.getMonth() + 1 );
        }else{
            mes=( hoy.getMonth() + 1 );
        }
        fecha = hoy.getDate() + '-' + mes + '-' + hoy.getFullYear();
        hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();


        console.log($("#NutSSRlugarAtencion").val());
        var dataIn = {
            'id_consulta': '',
            'idJSON_consulta': obtenerConsecutivoJSONConsultasSR(),
            'id_paciente': paciente.id,
            'idJSON_paciente': paciente.idJSON,
            'numid_pac': paciente.idRegPac,
            'tipoid_pac': paciente.tipoidRegPac,
            'tipoIDUserReg': usuario.tipoid,
            'numeroIDUserReg': usuario.numid,
            'institucion': usuario.institucion,
            'id_registra': usuario.numid,
            'tipoid_registra': usuario.tipoid,
            'fechaConsulta': fecha,
            'horaConsulta': hora,
            'profAtiende': usuario.nombres,
            'tipoConsulta': ($("#NutSSRtipoConsulta").val()) ? $("#NutSSRtipoConsulta").val() : '',
            'finalidadConsulta': ($("#NutSSRfinalidadConsulta").val()) ? $("#NutSSRfinalidadConsulta").val() : '',
            'causaExternaConsulta': ($("#NutSSRcausaExternaConsulta").val()) ? $("#NutSSRcausaExternaConsulta").val() : '',                     
            'lugarAtenci': ($("#NutSSRlugarAtencion").val()) ? $("#NutSSRlugarAtencion").val() : '',
            'DptoAtencion': ($("#NutSSRDptoAtencion").val()) ? $("#NutSSRDptoAtencion").val() : '',
            'MnpoAtencion': ($("#NutSSRMnpoAtencion").val()) ? $("#NutSSRMnpoAtencion").val() : '',
            'acompana': ($("#NutSSRAcompana").val()) ? $("#NutSSRAcompana").val() : '',
            'iniciorelsex': ($("#NutSSRiniciorelsex").val()) ? $("#NutSSRiniciorelsex").val() : '',
            'edadiniciorelsex': ($("#NutSSRedadiniciorelsex").val()) ? $("#NutSSRedadiniciorelsex").val() : '',
            'parejasexual': ($("#NutSSRparejasexual").val()) ? $("#NutSSRparejasexual").val() : '',
            'otroparejasex': ($("#NutSSRotroparejasex").val()) ? $("#NutSSRotroparejasex").val() : '', 
            'utilizaCondon': ($("#NutSSRutilizaCondon").val()) ? $("#NutSSRutilizaCondon").val() : '',
            'razonnocondon': ($("#NutSSRrazonnocondon").val()) ? $("#NutSSRrazonnocondon").val() : '',
            'despuesRealizprVIH': ($("#NutSSRdespuesRealizprVIH").val()) ? $("#NutSSRdespuesRealizprVIH").val() : '',
            'despuesRealizprITS': ($("#NutSSRdespuesRealizprITS").val()) ? $("#NutSSRdespuesRealizprITS").val() : '',
            'CualesITSdesp': ($("#NutSSRCualesITSdesp").val()) ? $("#NutSSRCualesITSdesp").val() : '',
            'concoecondonm': ($("#NutSSRconcoecondonm").val()) ? $("#NutSSRconcoecondonm").val() : '',
            'edadMenarquia': ($("#NutSSRedadMenarquia").val()) ? $("#NutSSRedadMenarquia").val() : '',
            'hasestadoEmbara': ($("#NutSSRhasestadoEmbara").val()) ? $("#NutSSRhasestadoEmbara").val() : '',
            'fechaUltMenstr': ($("#NutSSRfechaUltMenstr").val()) ? $("#NutSSRfechaUltMenstr").val() : '',
            'regularCiclMenst': ($("#NutSSRregularCiclMenst").val()) ? $("#NutSSRregularCiclMenst").val() : '',
            'presentadoDismenorrea': ($("#NutSSRpresentadoDismenorrea").val()) ? $("#NutSSRpresentadoDismenorrea").val() : '',
            'elemnHigienMens': ($("#NutSSRelemnHigienMens").val()) ? $("#NutSSRelemnHigienMens").val() : '',
            'otroelemeHigien': ($("#NutSSRotroelemeHigien").val()) ? $("#NutSSRotroelemeHigien").val() : '',
            'CuentaelemenNeceMens': ($("#NutSSRCuentaelemenNeceMens").val()) ? $("#NutSSRCuentaelemenNeceMens").val() : '',
            'MenstruaAfectaVivir': ($("#NutSSRMenstruaAfectaVivir").val()) ? $("#NutSSRMenstruaAfectaVivir").val() : '',
            'MenstruaAfectaVivirporque': ($("#NutSSRMenstruaAfectaVivirporque").val()) ? $("#NutSSRMenstruaAfectaVivirporque").val() : '',
            'realizadoCitologia': ($("#NutSSRrealizadoCitologia").val()) ? $("#NutSSRrealizadoCitologia").val() : '',
            'fechaUltimaCitologia': ($("#NutSSRfechaUltimaCitologia").val()) ? $("#NutSSRfechaUltimaCitologia").val() : '',
            'resultadoCitologia': ($("#NutSSRresultadoCitologia").val()) ? $("#NutSSRresultadoCitologia").val() : '',
            'realizaExMamaMensual': ($("#NutSSRrealizaExMamaMensual").val()) ? $("#NutSSRrealizaExMamaMensual").val() : '',
            'realizadoCitrealizaExTestMensual': ($("#NutSSRrealizadoCitrealizaExTestMensualologia").val()) ? $("#NutSSRrealizadoCitrealizaExTestMensualologia").val() : '',
            'hasTenidoITSVIH': ($("#NutSSRhasTenidoITSVIH").val()) ? $("#NutSSRhasTenidoITSVIH").val() : '',
            'hasTenidoITSVIHCual': ($("#NutSSRhasTenidoITSVIHCual").val()) ? $("#NutSSRhasTenidoITSVIHCual").val() : '',
            'repostroparejaITS': ($("#NutSSRrepostroparejaITS").val()) ? $("#NutSSRrepostroparejaITS").val() : '',
            'noreportparegPorque': ($("#NutSSRnoreportparegPorque").val()) ? $("#NutSSRnoreportparegPorque").val() : '',
            'realizottoITS': ($("#NutSSRrealizottoITS").val()) ? $("#NutSSRrealizottoITS").val() : '',
            'realizottoITSPorque': ($("#NutSSRrealizottoITSPorque").val()) ? $("#NutSSRrealizottoITSPorque").val() : '',
            'notenidoRelaUltiMensNormal': ($("#NutSSRnotenidoRelaUltiMensNormal").val()) ? $("#NutSSRnotenidoRelaUltiMensNormal").val() : '',
            'correctousometoAnticon': ($("#NutSSRcorrectousometoAnticon").val()) ? $("#NutSSRcorrectousometoAnticon").val() : '',
            'diasMenstruacion': ($("#NutSSRdiasMenstruacion").val()) ? $("#NutSSRdiasMenstruacion").val() : '',
            'semanpostparto': ($("#NutSSRsemanpostparto").val()) ? $("#NutSSRsemanpostparto").val() : '',
            'diasaborto': ($("#NutSSRdiasaborto").val()) ? $("#NutSSRdiasaborto").val() : '',
            'amamantamenos6meses': ($("#NutSSRamamantamenos6meses").val()) ? $("#NutSSRamamantamenos6meses").val() : '',
            'sintmaEmbarazo': ($("#NutSSRsintmaEmbarazo").val()) ? $("#NutSSRsintmaEmbarazo").val() : '',
            'sintmaEmbarazoCual': ($("#NutSSRsintmaEmbarazoCual").val()) ? $("#NutSSRsintmaEmbarazoCual").val() : '',
            'requiePruebaembarazo': ($("#NutSSRrequiePruebaembarazo").val()) ? $("#NutSSRrequiePruebaembarazo").val() : '',
            'resultPruebaembarazo': ($("#NutSSRresultPruebaembarazo").val()) ? $("#NutSSRresultPruebaembarazo").val() : '',
            'antgestaciones': ($("#NutSSRantgestaciones").val()) ? $("#NutSSRantgestaciones").val() : '',
            'antpartos': ($("#NutSSRantpartos").val()) ? $("#NutSSRantpartos").val() : '',
            'antCesareas': ($("#NutSSRantCesareas").val()) ? $("#NutSSRantCesareas").val() : '',
            'antabortos': ($("#NutSSRantabortos").val()) ? $("#NutSSRantabortos").val() : '',
            'antTipoAborto': ($("#NutSSRantTipoAborto").val()) ? $("#NutSSRantTipoAborto").val() : '',
            'antnacidosvivos': ($("#NutSSRantnacidosvivos").val()) ? $("#NutSSRantnacidosvivos").val() : '',
            'antFechaUltParto': ($("#NutSSRantFechaUltParto").val()) ? $("#NutSSRantFechaUltParto").val() : '',
            'antAlgunaInfePostevento': ($("#NutSSRantAlgunaInfePostevento").val()) ? $("#NutSSRantAlgunaInfePostevento").val() : '',
            'antActualmemLactando': ($("#NutSSRantActualmemLactando").val()) ? $("#NutSSRantActualmemLactando").val() : '',
            'antproceAdicionales': ($("#NutSSRantproceAdicionales").val()) ? $("#NutSSRantproceAdicionales").val() : '',
            'EnfermeCardioVascular': ($("#NutSSREnfermeCardioVascular").val()) ? $("#NutSSREnfermeCardioVascular").val() : '',
            'EnfermeCardioVascularCual': ($("#NutSSREnfermeCardioVascularCual").val()) ? $("#NutSSREnfermeCardioVascularCual").val() : '',
            'EnfermeGinecolo': ($("#NutSSREnfermeGinecolo").val()) ? $("#NutSSREnfermeGinecolo").val() : '',
            'EnfermeGinecoloCual': ($("#NutSSREnfermeGinecoloCual").val()) ? $("#NutSSREnfermeGinecoloCual").val() : '',
            'EnfermedadesOtras': ($("#NutSSREnfermedadesOtras").val()) ? $("#NutSSREnfermedadesOtras").val() : '',
            'EnfermedadesOtrasCual': ($("#NutSSREnfermedadesOtrasCual").val()) ? $("#NutSSREnfermedadesOtrasCual").val() : '',
            'EnfermedadesTabaquismo': ($("#NutSSREnfermedadesTabaquismo").val()) ? $("#NutSSREnfermedadesTabaquismo").val() : '',
            'EnfermedadesFrecuenFuma': ($("#NutSSREnfermedadesFrecuenFuma").val()) ? $("#NutSSREnfermedadesFrecuenFuma").val() : '',
            'EnfermedadesEdadFumar': ($("#NutSSREnfermedadesEdadFumar").val()) ? $("#NutSSREnfermedadesEdadFumar").val() : '',
            'EnfermedadesRepercusionConsumoTabaco': ($("#NutSSREnfermedadesRepercusionConsumoTabaco").val()) ? $("#NutSSREnfermedadesRepercusionConsumoTabaco").val() : '',
            'EnfermedadesRepercusionConsumoComoTabaco': ($("#NutSSREnfermedadesRepercusionConsumoComoTabaco").val()) ? $("#NutSSREnfermedadesRepercusionConsumoComoTabaco").val() : '',
            'EnfermedadesAlcohol': ($("#NutSSREnfermedadesAlcohol").val()) ? $("#NutSSREnfermedadesAlcohol").val() : '',
            'EnfermedadesFrecuenAlcohol': ($("#NutSSREnfermedadesFrecuenAlcohol").val()) ? $("#NutSSREnfermedadesFrecuenAlcohol").val() : '',
            'EnfermedadesEdadAlcohol': ($("#NutSSREnfermedadesEdadAlcohol").val()) ? $("#NutSSREnfermedadesEdadAlcohol").val() : '',
            'EnfermedadesRepercusionConsumoAlcoh': ($("#NutSSREnfermedadesRepercusionConsumoAlcoh").val()) ? $("#NutSSREnfermedadesRepercusionConsumoAlcoh").val() : '',
            'EnfermedadesRepercusionConsumoComoAlcoho': ($("#NutSSREnfermedadesRepercusionConsumoComoAlcoho").val()) ? $("#NutSSREnfermedadesRepercusionConsumoComoAlcoho").val() : '',
            'EnfermedadesPsicoactivas': ($("#NutSSREnfermedadesPsicoactivas").val()) ? $("#NutSSREnfermedadesPsicoactivas").val() : '',
            'EnfermedadesFrecuenPsicoactiva': ($("#NutSSREnfermedadesFrecuenPsicoactiva").val()) ? $("#NutSSREnfermedadesFrecuenPsicoactiva").val() : '',
            'EnfermedadesEdadPsicoactiva': ($("#NutSSREnfermedadesEdadPsicoactiva").val()) ? $("#NutSSREnfermedadesEdadPsicoactiva").val() : '',
            'EnfermedadesRepercusionConsumoPsico': ($("#NutSSREnfermedadesRepercusionConsumoPsico").val()) ? $("#NutSSREnfermedadesRepercusionConsumoPsico").val() : '',
            'EnfermedadesRepercusionConsumoComoPsioc': ($("#NutSSREnfermedadesRepercusionConsumoComoPsioc").val()) ? $("#NutSSREnfermedadesRepercusionConsumoComoPsioc").val() : '',
            'UtilizaMetoAnticonceptivo': ($("#NutSSRUtilizaMetoAnticonceptivo").val()) ? $("#NutSSRUtilizaMetoAnticonceptivo").val() : '',
            'MetoAnticonceptivoUsado': ($("#NutSSRMetoAnticonceptivoUsado").val()) ? $("#NutSSRMetoAnticonceptivoUsado").val() : '',
            'MetoAnticonceptivoUsadoTiempo': ($("#NutSSRMetoAnticonceptivoUsadoTiempo").val()) ? $("#NutSSRMetoAnticonceptivoUsadoTiempo").val() : '',
            'PrescritoPersonalSalud': ($("#NutSSRPrescritoPersonalSalud").val()) ? $("#NutSSRPrescritoPersonalSalud").val() : '',
            'EfectoSecundario': ($("#NutSSREfectoSecundario").val()) ? $("#NutSSREfectoSecundario").val() : '',
            'EfectoSecundarioCual': ($("#NutSSREfectoSecundarioCual").val()) ? $("#NutSSREfectoSecundarioCual").val() : '',
            'razonNoUsaMetodo': ($("#NutSSRrazonNoUsaMetodo").val()) ? $("#NutSSRrazonNoUsaMetodo").val() : '',
            'razonNoUsaMetodoCual': ($("#NutSSRrazonNoUsaMetodoCual").val()) ? $("#NutSSRrazonNoUsaMetodoCual").val() : '',
            'tensionArterial': ($("#NutSSRtensionArterial").val()) ? $("#NutSSRtensionArterial").val() : '',
            'preentaAnormalidadGenitales': ($("#NutSSRpreentaAnormalidadGenitales").val()) ? $("#NutSSRpreentaAnormalidadGenitales").val() : '',
            'preentaAnormalidadGenitalesCual': ($("#NutSSRpreentaAnormalidadGenitalesCual").val()) ? $("#NutSSRpreentaAnormalidadGenitalesCual").val() : '',
            'hallazgosRelevantes': ($("#NutSSRhallazgosRelevantes").val()) ? $("#NutSSRhallazgosRelevantes").val() : '',
            'deseaPlanificarAsesoria': ($("#NutSSRdeseaPlanificarAsesoria").val()) ? $("#NutSSRdeseaPlanificarAsesoria").val() : '',
            'MetodoPlaniPreElegi': ($("#NutSSRMetodoPlaniPreElegi").val()) ? $("#NutSSRMetodoPlaniPreElegi").val() : '',
            'sientedanada': ($("#NutSSRsientedanada").val()) ? $("#NutSSRsientedanada").val() : '',
            'requieSeguim': ($("#NutSSRrequieSeguim").val()) ? $("#NutSSRrequieSeguim").val() : '',
            'fechaSeguimiento': ($("#NutSSRfechaSeguimiento").val()) ? $("#NutSSRfechaSeguimiento").val() : '',
            'SensibilidadSSR': ($("#NutSSRSensibilidadSSR").val()) ? $("#NutSSRSensibilidadSSR").val() : '',
            'SensibilidadSSRotro': ($("#NutSSRSensibilidadSSRotro").val()) ? $("#NutSSRSensibilidadSSRotro").val() : '',
            'remitidoa': ($("#NutSSRremitidoa").val()) ? $("#NutSSRremitidoa").val() : '',
            'remitidoaotro': ($("#NutSSRremitidoaotro").val()) ? $("#NutSSRremitidoaotro").val() : '',
            'listadoCIEPa': cieIngCon,
            'tipoDiagnosPrinc': $("#NutSSRtipoDiagnosPrinc").val(),
            'medAsigCons': medIngCon,
            'notasEvolucion': ($("#NutSSRnotasEvolucion").val()) ? $("#NutSSRnotasEvolucion").val() : '',
            'recomNotas': ($("#NutSSRrecomNotas").val()) ? $("#NutSSRrecomNotas").val() : '',
            'ordenMedCons': ordenesIngCon,
            'ordenMedConsRef': ordenesIngConRef,
            'ordenMedConsRefPro': ordenesIngConRefPro,
            'tipoSerRef': ($("#SRtipoServicioReferir").val()) ? $("#SRtipoServicioReferir").val() : '',
            'obseSerRef': ($("#SRObservacionesReferir").val()) ? $("#SRObservacionesReferir").val() : '',
            'IpsServicioReferir': ($("#SRIpsServicioReferir").val()) ? $("#SRIpsServicioReferir").val() : '',
            'IpsProcedeimientoReferir': ($("#SRIpsProcedeimientoReferir").val()) ? $("#SRIpsProcedeimientoReferir").val() : '',
            'estado': 1
        };
        console.log(dataIn);
        /* varDataIn={
            'id_paciente': paciente.id,
            'idJSON_paciente': paciente.idJSON,
            'numid_pac': paciente.idRegPac,
            'tipoid_pac': paciente.tipoidRegPac,
            'institucion': usuario.institucion,
            'data':JSON.stringify(dataIn),
            'key':'GimmidsApp'
        }; */
       //console.log(varDataIn);

        if(paciente.estado==1){
            
            $.ajax({
                url: "https://saludsp.com.co/api/servicios/registerSSRConsultation.php",
                type: "post",
                data: { 'datos': dataIn,'key': 'GimmidsApp' },
                async:false
            }).done(function(res){
                console.log(res);
                console.log("Respuesta: "); 
                try {
                    var data=JSON.parse(res);
                    console.log(data);  
                    if (data.STATUS == 'OK' && (data.ID!=null && data.ID!=undefined && data.ID!=0)) {
                        dataIn.id_consulta = data.ID;
                        SSR.push(dataIn);
                        fs.writeFileSync(__dirname+'/json/consultas_SSR.json', JSON.stringify(SSR));
                        localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                        localStorage.setItem('consultaRegistradaTipo', 15);
                        alert('Consulta Registrada remota y localmente con exito!');
                        
                        imprimirConsultaMedica();
                       $("#modal-imprimirConsulta").modal('show');
                    } else {
                        console.log(data);  
                        
                        alert(data.ERROR);
                        
                        if (confirm('Problemas al registrar consulta al servidor. Desea volver a intentarlo, si selecciona cancelar se almacenara localmente?')) {
                            regitrarConsultaSSR(); 
        
                        } else {
                            dataIn.estado = 0;  
                            SSR.push(dataIn);
                            fs.writeFileSync(__dirname+'/json/consultas_SSR.json', JSON.stringify(SSR));
                            localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                            localStorage.setItem('consultaRegistradaTipo', 15);
                            alert('Consulta Registrada localmente con exito!');
                            imprimirConsultaMedica();
                            $("#modal-imprimirConsulta").modal('show');
                        
        
        
                        } 
                    }
        
        
                } catch (error) {
                    if(confirm('Error al registrar la consulta al servidor. Desea volver a intentarlo? Si selecciona cancelar se almacenara localmente.')){
                        regitrarConsultaSSR();
                    }else{
                        dataIn.estado = 0;  
                        SSR.push(dataIn);
                        fs.writeFileSync(__dirname+'/json/consultas_SSR.json', JSON.stringify(SSR));
                        localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                        localStorage.setItem('consultaRegistradaTipo', 15);
                        alert('Consulta Registrada localmente con exito!');
                        imprimirConsultaMedica();
                        $("#modal-imprimirConsulta").modal('show');
                    
                    }
                }
        
        
            } ).fail(function() { 
                dataIn.estado = 0;  
                SSR.push(dataIn);
                fs.writeFileSync(__dirname+'/json/consultas_SSR.json', JSON.stringify(SSR));
                localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
                localStorage.setItem('consultaRegistradaTipo', 15);
                alert('Consulta Registrada localmente con exito!');
                imprimirConsultaMedica();
                $("#modal-imprimirConsulta").modal('show');
            });
        }else{
            dataIn.estado=0;
            SSR.push(dataIn);
            fs.writeFileSync(__dirname+'/json/consultas_SSR.json', JSON.stringify(SSR));
            localStorage.setItem('consultaRegistrada', JSON.stringify(dataIn));
            localStorage.setItem('consultaRegistradaTipo', 15);
            alert('Consulta registrada localmente con exito!..');
            imprimirConsultaMedica();
            $("#modal-imprimirConsulta").modal('show');
        }

    }else{
        alert('Hacen falta varibales obligatorias por digitar!..');
    }

}
 
function imprimirConsultaMedica(){
     console.log('consulta imprimir');
    ipc.send('imprimir-consulta', 'consultaMedicas');
    
}
function imprimirOrdenServicio(){
    console.log('consulta imprimir');
    
    
    ipc.send('imprimir-orden', 'ordenesMedicas');
  
}
function imprimirRecetaMedica(){
    console.log('consulta imprimir');
    
    ipc.send('imprimir-receta', 'recetasMedicas');
     
}
function generarReferenciaMedica(){
    $("#modal-imprimirConsulta").modal('hide');
    setTimeout(function(){
       console.log('consulta referencia');
       var consulta=JSON.parse(localStorage.getItem('consultaRegistrada'));
       var tipoconsulta=JSON.parse(localStorage.getItem('consultaRegistradaTipo'));
        $("#nombre_prestador").val(usuario.institucion);
        $("#direccion_prestador").val(usuario.direccion);
    
    
        $("#tipoid_paciente").val(consulta.tipoid_pac);
        $("#numid_paciente").val(consulta.numid_pac);
    
        
        $("#nombre_paciente").val(paciente.nombres+' '+paciente.papellido+' '+paciente.sapellido);
        $("#fechnac_paciente").val(paciente.fecNac);
        $("#direccion_paciente").val(paciente.direccionResidencia+'\n'+paciente.OtraDireccion);
    
        for(var rr=0;rr<dptos.length;rr++){
            if(dptos[rr].Id==paciente.dptoResidencia){
                $("#dpto_paciente").val(dptos[rr].nombre);
            }
        }
    
        //$("#dpto_paciente").val(paciente.dptoResidencia);
        var contene3='<option></option>';
        
        for(var we=0;we<mnpos.length;we++){
            
            if(mnpos[we].cod_dptop==paciente.dptoResidencia && mnpos[we].cod_mnpo==paciente.mnpoResidencia ){
    
                contene3+='<option selected value="'+mnpos[we].nombre_mnpo+'" >'+mnpos[we].nombre_mnpo+'</option>';
            }else{
                contene3+='<option value="'+mnpos[we].nombre_mnpo+'" >'+mnpos[we].nombre_mnpo+'</option>';
            }
        } 
        $("#mnpo_paciente").html(contene3);
        $("#munp_prestador").html(contene3);
        $("#telefono_paciente").val(paciente.telefono);
    
        $("#nombre_profesional").val(usuario.nombres);
        var contcups='<option></option>';
        for( var tyu=0; tyu<cups.length;tyu++){
            if(tipoconsulta==6){
                if(cups[tyu].cups==consulta.MenortipoConsulta){
         
                    $("#sersolicita_profesional").val(consulta.MenortipoConsulta+' - '+cups[tyu].desc+'\n'); 
                    
                    
                }

            }else{
                if(cups[tyu].cups==consulta.tipoConsulta){
         
                    $("#sersolicita_profesional").val(consulta.tipoConsulta+' - '+cups[tyu].desc+'\n'); 
                    
                    
                }

            }
        }
        var contservic='';
        if(consulta.tipoSerRef!=''){
            contservic+=consulta.tipoSerRef+'\n';
        }
    
        if(consulta.ordenMedConsRef!=''){
            var gimmordmed=decodificarGimmids(consulta.ordenMedConsRef);
    
            for(var i=0;i<gimmordmed.length;i++){
                contservic+=gimmordmed[i][0]+', '+gimmordmed[i][1]+', '+gimmordmed[i][2]+'\n';
            } 
        }
    
        if(consulta.obseSerRef!=''){
            contservic+=consulta.obseSerRef+'\n';
        }
        if(consulta.ordenMedConsRefPro!=''){
            contservic+='ORDENES DE REFERENCIA:\n';
        
            var gimmordenMedConsRefPro=decodificarGimmids(consulta.ordenMedConsRefPro);
        
            for(var i=0;i<gimmordenMedConsRefPro.length;i++){
                contservic+=gimmordenMedConsRefPro[i][0]+', '+gimmordenMedConsRefPro[i][1]+', '+gimmordenMedConsRefPro[i][2]+'\n';
            } 
        }
        $("#serReferencia_profesional").val(contservic);
    
    
        contservic='';
    
        for( var tyu=0; tyu<causaExterna.length;tyu++){
            if(tipoconsulta==6){
                if(causaExterna[tyu].Id==consulta.MenorcausaExternaConsulta){
        
                    contservic+='CAUSA EXTERNA CONSULTA:\n'+consulta.MenorcausaExternaConsulta+' - '+causaExterna[tyu].descrip+'\n'; 
                }

            }else{
                if(causaExterna[tyu].Id==consulta.causaExternaConsulta){
        
                    contservic+='CAUSA EXTERNA CONSULTA:\n'+consulta.causaExternaConsulta+' - '+causaExterna[tyu].descrip+'\n'; 
                }

            }
        }
    
        for( var tyu=0; tyu<finalidadConsulta.length;tyu++){
            if(tipoconsulta==6){
                if(finalidadConsulta[tyu].Id==consulta.MenorfinalidadConsulta){
                    contservic+='FINALIDAD CONSULTA:\n'+consulta.MenorfinalidadConsulta+' - '+finalidadConsulta[tyu].descrip+'\n'; 
                
                }

            }else{
                if(finalidadConsulta[tyu].Id==consulta.finalidadConsulta){
                    contservic+='FINALIDAD CONSULTA:\n'+consulta.finalidadConsulta+' - '+finalidadConsulta[tyu].descrip+'\n'; 
                
                }

            }
        }    
        if(tipoconsulta==6){
            
            contservic+='\n'+consulta.MenorenfermedadActualConsulta+'\n'; 
            contservic+=consulta.MenormotivoConsulta+'\n';
             
            $("#fc").val(consulta.MenorpulsoEA);
            $("#fr").val(consulta.MenorfrecuenciarEA);
            $("#tem").val(consulta.MenortempEA);
            $("#peso").val(consulta.MenorpesoEA); 
        }else{
            
            contservic+='\n'+consulta.enfermedadActualConsulta+'\n';
            contservic+=consulta.antecedentesConsulta+'\n';
            contservic+=consulta.motivoConsulta+'\n';
            $("#ta").val(consulta.tensionaEA);
            $("#fc").val(consulta.pulsoEA);
            $("#fr").val(consulta.frecuenciarEA);
            $("#tem").val(consulta.tempEA);
            $("#peso").val(consulta.pesoEA);
            $("#examen_fisico").val(consulta.obserConsuAdulto);
        }
        contservic+=consulta.notasEvolucion+'\n';
        contservic+=consulta.recomNotas+'\n';
        $("#anamnesis").val(contservic);
    
    
    
    
        var dxcont='';
    
        if(consulta.listadoCIEPa!=''){
            var gimmolistadoCIEPa=decodificarGimmids(consulta.listadoCIEPa);
        
            for(var i=0;i<gimmolistadoCIEPa.length;i++){
                dxcont+='<tr><td scope="row">'+parseInt(i+1)+'</td><td>'+gimmolistadoCIEPa[i][1]+'</td><td>'+gimmolistadoCIEPa[i][0]+'</td></tr>';
            } 
        }
    
        $("#contDiagns").html(dxcont);
    
        contservic='';
        if(tipoconsulta==6){
            contservic+=consulta.MenormotivoConsulta+'\n'; 
            contservic+=consulta.obseSerRef+'\n';
            
        }else{
            contservic+=consulta.motivoConsulta+'\n';
            contservic+=consulta.obserConsuAdulto+'\n';
            contservic+=consulta.obseSerRef+'\n';
            
        }
    
        $("#motivo").val(contservic);
        $("#modal-referencia").modal('show'); 
        
    },1500);
   
    
}
function cancelarReferencia() {
    $("#modal-referencia").modal('hide');
    setTimeout(function(){ $("#modal-imprimirConsulta").modal('show'); }, 1500);
    
}
function RegistrarReferencia() {
    var consulta=JSON.parse(localStorage.getItem('consultaRegistrada'));
        
    var contReferencias=0;
    for (var tuiw=0;tuiw<referencias.length;tuiw++){
        if(contReferencias<parseInt(referencias[tuiw].id)){
            contReferencias=parseInt(referencias[tuiw].id);
        }
    }
    dataIn={
        'id':0,
        'idJSON':contReferencias+1,
        'nombre_prestador':$("#nombre_prestador").val(),
        'nit_prestador':$("#nit_prestador").val(),
        'codigo_prestador':$("#codigo_prestador").val(),
        'direccion_prestador':$("#direccion_prestador").val(),
        'munp_prestador':$("#munp_prestador").val(),
        'indTel_prestador':$("#indTel_prestador").val(),
        'telefono_prestador':$("#telefono_prestador").val(),
        'nombre_paciente':$("#nombre_paciente").val(),
        'tipoid_paciente':$("#tipoid_paciente").val(),
        'numid_paciente':$("#numid_paciente").val(),
        'fechnac_paciente':$("#fechnac_paciente").val(),
        'direccion_paciente':$("#direccion_paciente").val(),
        'dpto_paciente':$("#dpto_paciente").val(),
        'mnpo_paciente':$("#mnpo_paciente").val(),
        'telefono_paciente':$("#telefono_paciente").val(),
        'nombre_profesional':$("#nombre_profesional").val(),
        'indTel_profesional':$("#indTel_profesional").val(),
        'Tel_profesional':$("#Tel_profesional").val(),
        'celular_profesional':$("#celular_profesional").val(),
        'sersolicita_profesional':$("#sersolicita_profesional").val(),
        'serReferencia_profesional':$("#serReferencia_profesional").val(),
        'anamnesis':$("#anamnesis").val(),
        'ta':$("#ta").val(),
        'fc':$("#fc").val(),
        'fr':$("#fr").val(),
        'tem':$("#tem").val(),
        'peso':$("#peso").val(),
        'examen_fisico':$("#examen_fisico").val(),
        'exaAux':$("#exaAux").val(),
        'tipoexamen':$("#tipoexamen").val(),
        'hallazgos':$("#hallazgos").val(),
        'fecahex':$("#fecahex").val(),
        'listadoCIEPa':consulta.listadoCIEPa,
        'complicaciones':$("#complicaciones").val(),
        'tto_aplicados':$("#tto_aplicados").val(),
        'motivo':$("#motivo").val(),
        'estado':1,
        'key':'GimmidsApp'
    }
    console.log(dataIn);
    $.ajax({
        url: "https://saludsp.com.co/api/servicios/registerReference.php",
        type: "post",
        data:  {'datos': dataIn},
        async:false
    }).done(function(res){
        console.log(res);
        console.log("Respuesta: ");
        try {
            var dataRegRef=JSON.parse(res);
            if(dataRegRef.STATUS=='OK'){
                dataIn.id=parseInt(dataRegRef.ID);
                referencias.push(dataIn);
                fs.writeFileSync(__dirname+'/json/referencias.json', JSON.stringify(referencias));
                localStorage.setItem('referenciaRegistrada', JSON.stringify(dataIn));
                alert("Referencia registrada local y remotamente con exito!..");
                cancelarReferencia();
                ipc.send('imprimir-referencia', 'referenciasMedicas');
            }else{
                if(confirm('error al registrar referencia en sel servidor.\nDesea intentar nuevamente, si selecciona cancelar se almacenara localmente.')){
                    RegistrarReferencia();
                }else{
                    dataIn.estado=0;
                    referencias.push(dataIn);
                    fs.writeFileSync(__dirname+'/json/referencias.json', JSON.stringify(referencias));
                    localStorage.setItem('referenciaRegistrada', JSON.stringify(dataIn));
                    alert("Referencia registrada localmente con exito!..");
                    cancelarReferencia();
                    ipc.send('imprimir-referencia', 'referenciasMedicas');
                }
             
                 
            }
        } catch (error) {
            dataIn.estado=0;
            referencias.push(dataIn);
            fs.writeFileSync(__dirname+'/json/referencias.json', JSON.stringify(referencias));
            localStorage.setItem('referenciaRegistrada', JSON.stringify(dataIn));
            alert("Referencia registrada localmente con exito!..");
            cancelarReferencia();
            ipc.send('imprimir-referencia', 'referenciasMedicas');
        }
    } ).fail(function() { 
        dataIn.estado=0;
        referencias.push(dataIn);
        fs.writeFileSync(__dirname+'/json/referencias.json', JSON.stringify(referencias));
        localStorage.setItem('referenciaRegistrada', JSON.stringify(dataIn));
        alert("Referencia registrada localmente con exito!..");
        cancelarReferencia();
        ipc.send('imprimir-referencia', 'referenciasMedicas');

    });
}

function registarProcedimiento(){
    console.log(listadoCIEPaPro);
    console.log(listadoCIEPaCompPro);
    console.log(ordenMedConsPro);
    if(listadoCIEPaPro.length>0 && ordenMedConsPro.length>0 && $("#AmbreaProc").val() && $("#FinaProc").val() && $("#perfilPersonat").val() && $("#formReaAcQ").val()){
        var cieIngCon = '';
        var cieIngConComp = '';
        var ordenesIngCon = '';
        for (var i = 0; i < listadoCIEPaPro.length; i++) {
        
            cieIngCon += listadoCIEPaPro[i].cod + '-,-' + listadoCIEPaPro[i].desc + '   -   ';
        
        }
        
        for (var i = 0; i < listadoCIEPaCompPro.length; i++) {
        
            cieIngConComp += listadoCIEPaCompPro[i].cod + '-,-' + listadoCIEPaCompPro[i].desc + '   -   ';
        
        }
        for (var i = 0; i < ordenMedConsPro.length; i++) {
        
            ordenesIngCon += ordenMedConsPro[i].cod + '-,-' + ordenMedConsPro[i].desc + '-,-' + ordenMedConsPro[i].observa + '   -   ';
        
        }
        hoy = new Date();
        var mes;
        if(parseInt(( hoy.getMonth() + 1 ))<10){
            mes='0'+( hoy.getMonth() + 1 );
        }else{
            mes=( hoy.getMonth() + 1 );
        }
        fecha = hoy.getDate() + '-' + mes + '-' + hoy.getFullYear();
        hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();
            
        var dataIn = {
            'id_procedimiento': 0,
            'idJSON_procedimiento': obtenerConsecutivoJSONProcedimiento(),
            'fechaProce': fecha,
            'horaProce': hora,
            'nombrPacienteAte': paciente.nombres+' '+paciente.papellido+' '+paciente.sapellido,
            'tipodocupacie': paciente.tipoidRegPac,
            'numDocpPaci': paciente.idRegPac,
            'sexoPAciees': paciente.sexo,
            'cieIngCon': cieIngCon,
            'cieIngConComp': cieIngConComp,
            'AmbreaProc':$("#AmbreaProc").val(),
            'FinaProc':$("#FinaProc").val(),
            'perfilPersonat': $("#perfilPersonat").val(),
            'nombrePersonAtien': usuario.nombres,
            'formReaAcQ': $("#formReaAcQ").val(),
            'ordenesIngCon': ordenesIngCon,
            'estado': 1
        
        }

        console.log(dataIn);
        varDataIn={
            'id_paciente': paciente.id,
            'idJSON_paciente': paciente.idJSON,
            'numid_pac': paciente.idRegPac,
            'tipoid_pac': paciente.tipoidRegPac,
            'institucion': usuario.institucion,
            'data':JSON.stringify(dataIn),
            'key':'GimmidsApp'
        };
        console.log(varDataIn);
        if(paciente.estado==1){

             
            $.ajax({
                url: "https://saludsp.com.co/api/servicios/registrarProcedimiento.php",
                type: "post",
                data: {'datos': varDataIn},
                async:false
            }).done(function(res){
                console.log(res);
                console.log("Respuesta: "); 
                try {
                    var data=JSON.parse(res);
                    console.log(data);  
                    if (data.STATUS == 'OK' && (data.ID!=null && data.ID!=undefined && data.ID!=0)) {
                        dataIn.id_consulta = data.ID;
                        procedimientos.push(dataIn);
                        fs.writeFileSync(__dirname+'/json/procedimientos.json', JSON.stringify(procedimientos));
                        alert('Procedimiento registrado local y remotamente con exito!...');
                        localStorage.setItem('consultImprim', JSON.stringify(dataIn));
                        imprimirProcedimiento();
                      
                    } else {
                        console.log(data);  
                        
                        alert(data.ERROR);
                        
                        if (confirm('Problemas al registrar Procedimiento al servidor. Desea volver a intentarlo, si selecciona cancelar se almacenara localmente?')) {
                            registarProcedimiento(); 
        
                        } else {
                            dataIn.estado = 0;
                            procedimientos.push(dataIn);
                            fs.writeFileSync(__dirname+'/json/procedimientos.json', JSON.stringify(procedimientos));
                            alert('Procedimiento registrado localmente con exito!...');
                            localStorage.setItem('consultImprim', JSON.stringify(dataIn));
                            imprimirProcedimiento();
                            
        
        
                        } 
                    }
        
        
                } catch (error) {
                    if(confirm('Error al registrar la Procedimiento al servidor. Desea volver a intentarlo? Si selecciona cancelar se almacenara localmente.')){
                        registarProcedimiento();
                    }else{
                        dataIn.estado = 0;
                        procedimientos.push(dataIn);
                        fs.writeFileSync(__dirname+'/json/procedimientos.json', JSON.stringify(procedimientos));
                        alert('Procedimiento registrado localmente con exito!...');
                        localStorage.setItem('consultImprim', JSON.stringify(dataIn));
                        imprimirProcedimiento(); 
                          
                         
                    }
                }
        
        
            } ).fail(function() { 
                dataIn.estado = 0; 
                procedimientos.push(dataIn);
                fs.writeFileSync(__dirname+'/json/procedimientos.json', JSON.stringify(procedimientos));
                alert('Procedimiento registrado localmente con exito!...');
                localStorage.setItem('consultImprim', JSON.stringify(dataIn));
                imprimirProcedimiento();  
                 
                 
            });
        }

    }else{
        alert('Faltan datos por digitar!...');
    }
}
function imprimirProcedimiento(){
    if(confirm('Desea imprimir el procedimiento?..')){
        ipc.send('imprimir', 'procedimientoRealizado');

    }else{
        localStorage.removeItem('consultImprim'); 
    }
    location.reload();
}

function habilitarElementForm(a,b){
    console.log($("#"+a).is(':checked'));
    if($("#"+a).val()=='SI' || $("#"+a).is(':checked')==true){
        
        $("#"+b).attr('disabled', false);
    }else{
        $("#"+b).attr('disabled', true);
        $("#"+b).val(null);
    }
}
function habilitarElementFormExa(a,b){ 
    console.log($("input:radio[name="+a+"]:checked").val());
    if($("input:radio[name="+a+"]:checked").val()=='ANORMAL'){
        
        $("#"+b).attr('disabled', false);
    }else{
        $("#"+b).attr('disabled', true);
        $("#"+b).val(null);
    }
}
function verTablasNutricionales(pag) {
    var ruta = __dirname + '/tablasnut/tablas-nutricional-' + pag + '.pdf';
    console.log(__dirname);
    shell.openExternal(ruta)

}

function clasPesoEdad02(){
    if($("#MMenorpesoedad02").val()=='<-3'){
        $("#clasPesoEdad02").html('<strong>Peso muy bajo para la edad o Desnutrición global severa</Strong>');
    }else if($("#MMenorpesoedad02").val()=='<-2 a >=-3'){
        $("#clasPesoEdad02").html('<strong>Peso bajo para la edad o Desnutrición global</Strong>');
    }else if($("#MMenorpesoedad02").val()=='<-2 a <-1'){
        $("#clasPesoEdad02").html('<strong>Riesgo de peso bajo para la edad</Strong>');
    }else if($("#MMenorpesoedad02").val()=='>=-1 a <=1'){
        $("#clasPesoEdad02").html('<strong>Peso adecuado para la edad</Strong>');
    }else {
        $("#clasPesoEdad02").html('Selecciona un valor');
    }
}
function clasPesoEdad25(){
    if($("#MMenorpesoedad25").val()=='<-2'){
        $("#clasPesoEdad25").html('<strong>Peso bajo para la edad o Desnutrición global</Strong>');
    }else {
        $("#clasPesoEdad25").html('Selecciona un valor');
    }
}
function clasTallaEdad018(){
    if($("#MMenortallaedad018").val()=='<-2'){
        $("#clasTallaEdad018").html('<strong>Talla baja para la edad o retraso en talla</Strong>');
    }else if($("#MMenortallaedad018").val()=='>=-2 a <-1'){
        $("#clasTallaEdad018").html('<strong>Riesgo de talla baja</Strong>');
    }else if($("#MMenortallaedad018").val()=='>=1'){
        $("#clasTallaEdad018").html('<strong>Talla adecuada para la edad</Strong>');
    }else{
        $("#clasTallaEdad018").html('Selecciona un valor');
    }
}
function clasPesoTalla018(){
    if($("#MMenorpesotalla018").val()=='<-3'){
        $("#clasPesoTalla018").html('<strong>Peso muy bajo para la talla o Desnutrición aguda severa</Strong>');
    }else if($("#MMenorpesotalla018").val()=='<-2'){
        $("#clasPesoTalla018").html('<strong>Peso bajo para la talla o Desnutricioón aguda</Strong>');
    }else if($("#MMenorpesotalla018").val()=='>=2 a <-1'){
        $("#clasPesoTalla018").html('<strong>Riesgo de peso bajo para la talla</Strong>');
    }else if($("#MMenorpesotalla018").val()=='>=-1 a <=1'){
        $("#clasPesoTalla018").html('<strong>Peso adecuado para la talla</Strong>');
    }else if($("#MMenorpesotalla018").val()=='>1 a <=2'){
        $("#clasPesoTalla018").html('<strong>Sobrepeso</Strong>');
    }else if($("#MMenorpesotalla018").val()=='>2'){
        $("#clasPesoTalla018").html('<strong>Obesidad</Strong>');
    }else{
        $("#clasPesoTalla018").html('Selecciona un valor');
    }
}
function clasIMC05() {
    if($("#MMenorimc05").val()=='>1 a <=2'){
        $("#clasIMC05").html('<strong>Sobrepeso</Strong>');
    }else if($("#MMenorimc05").val()=='>2'){
        $("#clasIMC05").html('<strong>Obesidad</Strong>');
    }else{
        $("#clasIMC05").html('Selecciona un valor');
    }
}
function clasIMC518(){
    if($("#MMenorimc518").val()=='<-2'){
        $("#clasIMC518").html('<strong>Delgadez</Strong>');
    }else if($("#MMenorimc518").val()=='>=-2 a <-1'){
        $("#clasIMC518").html('<strong>Riesgo de delgadez</Strong>');
    }else if($("#MMenorimc518").val()=='>=-1 a <= 1'){
        $("#clasIMC518").html('<strong>Adecuado para la edad</Strong>');
    }else if($("#MMenorimc518").val()=='>1 a <=2'){
        $("#clasIMC518").html('<strong>Sobrepeso</Strong>');
    }else if($("#MMenorimc518").val()=='>2'){
        $("#clasIMC518").html('<strong>Obesidad</Strong>');
    }else{
        $("#clasIMC518").html('Selecciona un valor');
    }
}
function clasPerimetroCef(){
    if($("#MMenorperimetroCefalicoEV").val()=='<-2'){
        $("#clasPerimetroCef").html('<strong>Factor de riesgo para el neurodesarrollo</Strong>');
    }else if($("#MMenorperimetroCefalicoEV").val()=='>=-2 a <=2'){
        $("#clasPerimetroCef").html('<strong>Normal</Strong>');
    }else if($("#MMenorperimetroCefalicoEV").val()=='>2'){
        $("#clasPerimetroCef").html('<strong>Factor de riesgo para el neurodesarrollo</Strong>');
    }else{
        $("#clasPerimetroCef").html('Selecciona un valor');
    }
}
function NotificarEvento(event, val, scope){
    console.log(scope);
        var valll = 0;
        if (scope) {
            for (var t = 0; t < eventosNotificarGestante.length; t++) {

                if (eventosNotificarGestante[t].evento == event) {
                    valll = 1;
                }
            }
            if (valll == 0) {
               // ipc.send('warning', 'Paciente en riesgo');
                eventosNotificarGestante.push({ 'evento': event, 'paciente': paciente });

            }


        } else {
            for (var t = 0; t < eventosNotificarGestante.length; t++) {
                console.log(eventosNotificarGestante);
                if (eventosNotificarGestante[t].evento == event) {
                    eventosNotificarGestante.splice(t, 1);
                }
            }
        }
        console.table(eventosNotificarGestante);
        if(eventosNotificarGestante.length>0){
            $("#eventosNotificarGestante").removeClass('hide');
        }else{
            
            $("#eventosNotificarGestante").addClass('hide');
        }
}
function NotificarEventoCaries(event, val, scope){
    console.log(scope);
    var valll = 0;
    if (scope) {
        for (var t = 0; t < eventosNotificarGestanteCarie.length; t++) {

            if (eventosNotificarGestanteCarie[t].evento == event) {
                valll = 1;
            }
        }
        if (valll == 0) {
            //ipc.send('warning', 'Paciente en riesgo');
            eventosNotificarGestanteCarie.push({ 'evento': event, 'paciente': paciente });

        }


    } else {
        for (var t = 0; t < eventosNotificarGestanteCarie.length; t++) {
            console.log(eventosNotificarGestanteCarie);
            if (eventosNotificarGestanteCarie[t].evento == event) {
                eventosNotificarGestanteCarie.splice(t, 1);
            }
        }
    }
    if(eventosNotificarGestanteCarie.length>0){
        $("#eventosNotificarGestanteCarie").removeClass('hide');
    }else{
        
        $("#eventosNotificarGestanteCarie").addClass('hide');
    }
    console.table(eventosNotificarGestanteCarie);
}
function NotificarEventoGine(event, val, scope) {
    console.log(scope);
        var valll = 0;
        if (scope) {
            console.log('asd');
            for (var t = 0; t < eventosNotificarGestanteGienc.length; t++) {

                if (eventosNotificarGestanteGienc[t].evento == event) {
                    valll = 1;
                }
            }
            if (valll == 0) {
                //ipc.send('warning', 'Paciente en riesgo');
                eventosNotificarGestanteGienc.push({ 'evento': event, 'paciente': paciente });

            }


        } else {
            for (var t = 0; t < eventosNotificarGestanteGienc.length; t++) {
                console.log(eventosNotificarGestanteGienc);
                if (eventosNotificarGestanteGienc[t].evento == event) {
                    eventosNotificarGestanteGienc.splice(t, 1);
                }
            }
        }
        console.table(eventosNotificarGestanteGienc);
        if(eventosNotificarGestanteGienc.length>0){
            $("#eventosNotificarGestanteGienc").removeClass('hide');
        }else{
            
            $("#eventosNotificarGestanteGienc").addClass('hide');
        }
}
function NotificarEventoControl(event, val, scope){
    console.log(scope);
    var valll = 0;
    if (scope) {
        for (var t = 0; t < eventosNotificarGestantecontr.length; t++) {

            if (eventosNotificarGestantecontr[t].evento == event) {
                valll = 1;
            }
        }
        if (valll == 0) {

            eventosNotificarGestantecontr.push({ 'evento': event, 'paciente': paciente });

        }


    } else {
        for (var t = 0; t < eventosNotificarGestantecontr.length; t++) {
            console.log(eventosNotificarGestantecontr);
            if (eventosNotificarGestantecontr[t].evento == event) {
                eventosNotificarGestantecontr.splice(t, 1);
            }
        }
    }
    console.table(eventosNotificarGestantecontr);
    if (eventosNotificarGestantecontr.length > 0) {
        GestanteRiesgoNivel = "ALTO";
        $("#examenFisico-riesgo").addClass('text-danger');
    } else {
        $("#examenFisico-riesgo").removeClass('text-danger');
        GestanteRiesgoNivel = "BAJO";
       
    }
    $("#examenFisico-riesgo").html(GestanteRiesgoNivel);
}

function calcularRiesgoBiopsico(event, val){
    sumRiesgo = 0;
    console.log(val);
    var valll = 0;
    if (event != 'BiopEdad' && event != 'BioPari') {
        for (var t = 0; t < riesgoPbisocp.length; t++) {

            if (riesgoPbisocp[t].evento == event) {
                valll = 1;
            }
        }
        if (valll == 0) {

            riesgoPbisocp.push({ 'evento': event, 'val': val });


        } else {
            for (var t = 0; t < riesgoPbisocp.length; t++) {
                console.log(riesgoPbisocp);
                if (riesgoPbisocp[t].evento == event) {
                    riesgoPbisocp.splice(t, 1);
                }
            }

        }
    }

    if ($("#GBiopEdad").val()) {
        var sBiopEdad = parseInt($("#GBiopEdad").val());
    } else {
        var sBiopEdad = 0;
    }
    if ($("#GBioPari").val()) {
        var sBioPari = parseInt($("#GBioPari").val());
    } else {
        var sBioPari = 0;
    }
    for (var t = 0; t < riesgoPbisocp.length; t++) {

        sumRiesgo = sumRiesgo + riesgoPbisocp[t].val;
    }
    sumRiesgo = sumRiesgo + sBiopEdad + sBioPari;
    console.log(sumRiesgo);
    if (sumRiesgo < 2) {
        textAlert = 'BAJO RIESGO !... Total escala: '+sumRiesgo;
        $("#textAlert").removeClass('hide');
        $("#textAlert").removeClass('alert-danger');
        $("#textAlert").removeClass('alert-warning');
        $("#textAlert").addClass('alert-success');
        $("#textAlerttexto").html(textAlert);
    }
    if (sumRiesgo > 2 && sumRiesgo < 7) {

        textAlert = '<strong>Alerta!</strong> ALTO RIESGO !... Total escala: '+sumRiesgo;
        $("#textAlert").removeClass('hide');
        $("#textAlert").removeClass('alert-success');
        $("#textAlert").removeClass('alert-danger');
        $("#textAlert").addClass('alert-warning');
        $("#textAlerttexto").html(textAlert);
    }
    if (sumRiesgo > 6) {
        textAlert = '<strong>Alerta!</strong> RIESGO SEVERO !... Total escala: '+sumRiesgo;
        $("#textAlert").removeClass('hide');
        $("#textAlert").removeClass('alert-success');
        $("#textAlert").removeClass('alert-warning');
        $("#textAlert").addClass('alert-danger');
        $("#textAlerttexto").html(textAlert);

    }
}
function RegistrarControlPrenatal() {
    if (confirm('Confirmas el ingreso del control?. Una vez ingresado no se podra modificar.')) {
        if (controlPrenCons.length > 0) {
            var inicio = controlPrenCons[controlPrenCons.length - 1][1];
            var fin = $("#GestantetFechaCons1").val();
            console.log(inicio);
            console.log(fin);
            if (fin > inicio) {
                if ($("#GestanteSemaGes1").val() > parseInt(controlPrenCons[controlPrenCons.length - 1][2])) {
                    continuarRegistrarControlPrenatal();
                } else {
                    ipc.send('info', 'El numero de semanas de gestacion debe ser mayor al control anterior!...');
                    $("#GestanteSemaGes1").focus();
                }
            } else {
                ipc.send('warning', 'La fecha debe ser mayor a la del control anterior!...');
                $("#GestantetFechaCons1").focus();

            }



        } else {
            continuarRegistrarControlPrenatal();
        }


    }
}
function continuarRegistrarControlPrenatal(){
    dataIncontrol = {
        'num': cantControles + 1,
        'GestantetFechaCons1': $("#GestantetFechaCons1").val(),
        'GestanteSemaGes1': $("#GestanteSemaGes1").val(),
        'GestantepesoEA1': $("#GestantepesoEA1").val(),
        'GestantetallaEA1': $("#GestantetallaEA1").val(),
        'GestantepulsoEA1': $("#GestantepulsoEA1").val(),
        'GestantefrecuenciarEA1': $("#GestantefrecuenciarEA1").val(),
        'GestantetempEA1': $("#GestantetempEA1").val(),
        'GestantePresionArte1': $("#GestantePresionArte1").val(),
        'GestanteEdadGesRiesgo': $('input:radio[name="GGestanteEdadGesRiesgo"]:checked').val(),
        'Gestantepielyfaneras1': $('input:radio[name="GGestantepielyfaneras1"]:checked').val(),
        'GestanteorganosSentidos1': $('input:radio[name="GGestanteorganosSentidos1"]:checked').val(),
        'GestantecavidadBucal1': $('input:radio[name="GGestantecavidadBucal1"]:checked').val(),
        'Gestanteneurosensorial1': $('input:radio[name="GGestanteneurosensorial1"]:checked').val(),
        'Gestantelocomotor1': $('input:radio[name="GGestantelocomotor1"]:checked').val(),
        'Gestantecardiovascular1': $('input:radio[name="GGestantecardiovascular1"]:checked').val(),
        'Gestanterespiratorio1': $('input:radio[name="GGestanterespiratorio1"]:checked').val(),
        'Gestantegastrointestinal1': $('input:radio[name="GGestantegastrointestinal1"]:checked').val(),
        'Gestantegenitorunario1': $('input:radio[name="GGestantegenitorunario1"]:checked').val(),
        'Gestanteendoctrino1': $('input:radio[name="GGestanteendoctrino1"]:checked').val(),
        'Gestanteexamama1': $('input:radio[name="GGestanteexamama1"]:checked').val(),
        'GestanteAlturaUterina1': $("#GestanteAlturaUterina1").val(),
        'GestanteNumFetos1': $("#GestanteNumFetos1").val(),
        'GestanteSituacionC1': $("#GestanteSituacionC1").val(),
        'GestantePresentFetal1': $("#GestantePresentFetal1").val(),
        'GestantefrecuecardiaFetal1': $("#GestantefrecuecardiaFetal1").val(),
        'GestanteMovimFetal1': $("#GestanteMovimFetal1").val(),
        'GestanteValGine1': $('input:radio[name="GGestanteValGine1"]:checked').val(),
        'GestantegananciaPesoInadecuado1': $("#GestantegananciaPesoInadecuado1").val(),
        'GestanteIntoleraAlimentos1': $('input:radio[name="GGestanteIntoleraAlimentos1"]:checked').val(),
        'GestanteCefaleas1': $('input:radio[name="GGestanteCefaleas1"]:checked').val(),
        'GestanteVisionBorosa1': $('input:radio[name="GGestanteVisionBorosa1"]:checked').val(),
        'GestanteEpigastralgia1': $('input:radio[name="GGestanteEpigastralgia1"]:checked').val(),
        'GestanteSintomasUrinario1': $('input:radio[name="GGestanteSintomasUrinario1"]:checked').val(),
        'GestanteFlujVagina1': $('input:radio[name="GGestanteFlujVagina1"]:checked').val(),
        'GestanteEdemas1': $('input:radio[name="GGestanteEdemas1"]:checked').val(),
        'GestanteClasifRhneg1': $('input:radio[name="GGestanteClasifRhneg1"]:checked').val(),
        'GestanteRiesgosGene1': $('input:radio[name="GGestanteRiesgosGene1"]:checked').val(),
        'GestanteBiologEspe1': $('input:radio[name="GGestanteBiologEspe1"]:checked').val(),
        'GestanteRiePsico1': $('input:radio[name="GGestanteRiePsico1"]:checked').val(),
        'GestanteRiedeprePostparto': $('input:radio[name="GGestanteRiedeprePostparto"]:checked').val(),
        'GestanteRiesgoNivel': (eventosNotificarGestantecontr.length > 0) ? 'ALTO' : 'BAJO',
        'firma': usuario.profesion
    };
    console.log(dataIncontrol);
    var datCont=[];
    examenfisicoPrenVal=1;
    //$("#cantControles = $("#controlPrenCons.length + 1;
    if (controlPrenCons.length < 8) {
        
        //controlPrenCons.push(datCont);
        var cont=`<tr class="text-center">
                    <td>`+controlPrenCons.length+`</td>
                    <td style="min-width:100px;">`+dataIncontrol.GestantetFechaCons1+`</td>
                    <td>`+dataIncontrol.GestanteSemaGes1+`</td>
                    <td>`+dataIncontrol.GestantepesoEA1+`</td>
                    <td>`+dataIncontrol.GestantetallaEA1+`</td>
                    <td>`+dataIncontrol.GestantepulsoEA1+`</td>
                    <td>`+dataIncontrol.GestantefrecuenciarEA1+`</td>
                    <td>`+dataIncontrol.GestantetempEA1+`</td>
                    <td>`+dataIncontrol.GestantePresionArte1+`</td>
                    <td>`+dataIncontrol.GestanteEdadGesRiesgo+`</td>
                    <td>`+dataIncontrol.Gestantepielyfaneras1+`</td>
                    <td>`+dataIncontrol.GestanteorganosSentidos1+`</td>
                    <td>`+dataIncontrol.GestantecavidadBucal1+`</td>
                    <td>`+dataIncontrol.Gestanteneurosensorial1+`</td>
                    <td>`+dataIncontrol.Gestantelocomotor1+`</td>
                    <td>`+dataIncontrol.Gestantecardiovascular1+`</td>
                    <td>`+dataIncontrol.Gestanterespiratorio1+`</td>
                    <td>`+dataIncontrol.Gestantegastrointestinal1+`</td>
                    <td>`+dataIncontrol.Gestantegenitorunario1+`</td>
                    <td>`+dataIncontrol.Gestanteendoctrino1+`</td>
                    <td>`+dataIncontrol.Gestanteexamama1+`</td>
                    <td>`+dataIncontrol.GestanteAlturaUterina1+`</td>
                    <td>`+dataIncontrol.GestanteNumFetos1+`</td>
                    <td>`+dataIncontrol.GestanteSituacionC1+`</td>
                    <td>`+dataIncontrol.GestantePresentFetal1+`</td>
                    <td>`+dataIncontrol.GestantefrecuecardiaFetal1+`</td>
                    <td>`+dataIncontrol.GestanteMovimFetal1+`</td>
                    <td>`+dataIncontrol.GestanteValGine1+`</td>
                    <td>`+dataIncontrol.GestantegananciaPesoInadecuado1+`</td>
                    <td>`+dataIncontrol.GestanteIntoleraAlimentos1+`</td>
                    <td>`+dataIncontrol.GestanteCefaleas1+`</td>
                    <td>`+dataIncontrol.GestanteVisionBorosa1+`</td>
                    <td>`+dataIncontrol.GestanteEpigastralgia1+`</td>
                    <td>`+dataIncontrol.GestanteSintomasUrinario1+`</td>
                    <td>`+dataIncontrol.GestanteFlujVagina1+`</td>
                    <td>`+dataIncontrol.GestanteEdemas1+`</td>
                    <td>`+dataIncontrol.GestanteClasifRhneg1+`</td>
                    <td>`+dataIncontrol.GestanteRiesgosGene1+`</td>
                    <td>`+dataIncontrol.GestanteBiologEspe1+`</td>
                    <td>`+dataIncontrol.GestanteRiePsico1+`</td>
                    <td>`+dataIncontrol.GestanteRiedeprePostparto+`</td>
                    <td>`+dataIncontrol.firma+`</td>
                    <td>`+dataIncontrol.GestanteRiesgoNivel+`</td>
                </tr>`;
                $("#examenFisico-form").addClass('hide');
                $("#examenFisico-btn").addClass('hide');
                $("#examenFisico-body").append(cont);

                $("#num").val(null);
                $("#GestantetFechaCons1").val(null);
                $("#GestanteSemaGes1").val(null);
                $("#GestantepesoEA1").val(null);
                $("#GestantetallaEA1").val(null);
                $("#GestantepulsoEA1").val(null);
                $("#GestantefrecuenciarEA1").val(null);
                $("#GestantetempEA1").val(null);
                $("#GestantePresionArte1").val(null);
                $("#GestanteEdadGesRiesgo").val(null);
                $("#Gestantepielyfaneras1").val(null);
                $("#GestanteorganosSentidos1").val(null);
                $("#GestantecavidadBucal1").val(null);
                $("#Gestanteneurosensorial1").val(null);
                $("#Gestantelocomotor1").val(null);
                $("#Gestantecardiovascular1").val(null);
                $("#Gestanterespiratorio1").val(null);
                $("#Gestantegastrointestinal1").val(null);
                $("#Gestantegenitorunario1").val(null);
                $("#Gestanteendoctrino1").val(null);
                $("#Gestanteexamama1").val(null);
                $("#GestanteAlturaUterina1").val(null);
                $("#GestanteNumFetos1").val(null);
                $("#GestanteSituacionC1").val(null);
                $("#GestantePresentFetal1").val(null);
                $("#GestantefrecuecardiaFetal1").val(null);
                $("#GestanteMovimFetal1").val(null);
                $("#GestanteValGine1").val(null);
                $("#GestantegananciaPesoInadecuado1").val(null);
                $("#GestanteIntoleraAlimentos1").val(null);
                $("#GestanteCefaleas1").val(null);
                $("#GestanteVisionBorosa1").val(null);
                $("#GestanteEpigastralgia1").val(null);
                $("#GestanteSintomasUrinario1").val(null);
                $("#GestanteFlujVagina1").val(null);
                $("#GestanteEdemas1").val(null);
                $("#GestanteClasifRhneg1").val(null);
                $("#GestanteRiesgosGene1").val(null);
                $("#GestanteBiologEspe1").val(null);
                $("#GestanteRiePsico1").val(null);
                $("#GestanteRiedeprePostparto").val(null); 
                $("#GestanteRiesgoNivel").val('');
    }
    console.log(controlPrenCons); 
    
}
function adjuntarExamenHemo() {
    console.log('adjuntanod examen');
        var dataIn={
            'tipoexamenh': $("#Gtipoexamenh").val(),
            'trimestreexamenh': $("#Gtrimestreexamenh").val(),
            'GestanteHEMOGRAMAFec': $("#GGestanteHEMOGRAMAFec").val(),
            'GestanteHEMOGRAMADesc':  $("#GGestanteHEMOGRAMADesc").val(),
            'GestanteHEMOGRAMA1':  $('input:radio[name="GGestanteHEMOGRAMA1"]:checked').val()
        };
        examenesHemo.push(dataIn);
        console.log(examenesHemo);
        $("#Gtipoexamenh").val(null); 
        $("#GGestanteHEMOGRAMADesc").val(null) ;
        $('input:radio[name="GGestanteHEMOGRAMA1"]:checked').val(null);
        var cont='';
        cont+=`
            <tr class="text-center" >
                <td  >
                    `+dataIn.tipoexamenh+`
                </td>
                <td  >
                `+dataIn.trimestreexamenh+`
                </td>
                <td > `+dataIn.GestanteHEMOGRAMAFec+`</td>
                <td  > `+dataIn.GestanteHEMOGRAMADesc+`</td>
                <td  colspan="2"> 
                `+dataIn.GestanteHEMOGRAMA1+`
                </td>
            </tr>`;
        $("#tabla-examens").append(cont);

}
function adjuntarEcho(){
    var dataIn={
        'GestanteFechEco': $("#GGestanteFechEco").val(),
        'GestanteObsEcos': $("#GGestanteObsEcos").val(),
        'GestanteNormEco': $('input:radio[name="GGestanteNormEco"]:checked').val()
    }; 
    $("#GGestanteFechEco").val(null); 
    echoGestan.push(dataIn); 
    $("#GGestanteObsEcos").val('');
    var cont=`<tr class="text-center">
                <td>`+dataIn.GestanteFechEco+`</td>
                <td>`+dataIn.GestanteObsEcos+`</td>
                <td>`+dataIn.GestanteNormEco+`</td>
            </tr>`; 

    $("#tabla-echos").append(cont);
}
function imprimirConsultaLocal(tipo,consulta, index){
    console.log(tipo)
    if(consulta=='generales'){
        
        localStorage.setItem('consultaRegistrada', JSON.stringify(generales[index]));
    }
    if(consulta=='enfermeria'){
        localStorage.setItem('consultaRegistrada', JSON.stringify(enfermeria[index]));
        
    }
    if(consulta=='psicologia'){
        localStorage.setItem('consultaRegistrada', JSON.stringify(psicologia[index]));
        
    }
    if(consulta=='nutricional'){
        localStorage.setItem('consultaRegistrada', JSON.stringify(nutricional[index]));
        
    }
    if(consulta=='adulto'){
        localStorage.setItem('consultaRegistrada', JSON.stringify(adulto[index]));
        
    }
    if(consulta=='menor'){
        localStorage.setItem('consultaRegistrada', JSON.stringify(menor[index]));
        
    }
    if(consulta=='gestante'){
        localStorage.setItem('consultaRegistrada', JSON.stringify(gestante[index]));
        
    }
    localStorage.setItem('consultaRegistradaTipo', tipo);
    if(confirm('Deseas ver la consulta?')){
        imprimirConsultaMedica();
    }else{
        localStorage.removeItem('consultaRegistrada');
        localStorage.removeItem('consultaRegistradaTipo');
    }

}
function imprimirConsultaServer(tipo,consulta, index){
    console.log(tipo)
    if(consulta=='generales'){
        
        localStorage.setItem('consultaRegistrada', JSON.stringify(consultasServidorGeneral[index]));
        console.log(consultasServidorGeneral[index]);
    }
    if(consulta=='enfermeria'){
        localStorage.setItem('consultaRegistrada', JSON.stringify(consultasServidorEnfermeria[index]));
        console.log(consultasServidorEnfermeria[index]);
        
    }
    if(consulta=='psicologia'){
        localStorage.setItem('consultaRegistrada', JSON.stringify(consultasServidorPsicologia[index]));
        console.log(consultasServidorPsicologia[index]);
        
    }
    if(consulta=='nutricional'){
        localStorage.setItem('consultaRegistrada', JSON.stringify(consultasServidorNutricional[index]));
        console.log(consultasServidorNutricional[index]);
        
    }
    if(consulta=='adulto'){
        localStorage.setItem('consultaRegistrada', JSON.stringify(consultasServidorAdulto[index]));
        console.log(consultasServidorAdulto[index]);
        
    }
    if(consulta=='menor'){
        localStorage.setItem('consultaRegistrada', JSON.stringify(consultasServidorMenor[index]));
        console.log(consultasServidorMenor[index]);
        
    }
    if(consulta=='gestante'){
        localStorage.setItem('consultaRegistrada', JSON.stringify(consultasServidorGestante[index]));
        console.log(consultasServidorGestante[index]);
        
    }
    localStorage.setItem('consultaRegistradaTipo', tipo);
    localStorage.setItem('consultatipoacala', consulta);
    $("#modal-imprimirConsultaListado").modal('show');
    

}

function abrirModalNotaAclaratoria(){
    
    $("#modal-imprimirConsultaListado").modal('hide');
    var consulta=JSON.parse(localStorage.getItem('consultaRegistrada'));
    console.log(consulta.id_consulta);
    var tipo=localStorage.getItem('consultatipoacala');
    console.log(tipo);
    $("#idconsultanota").val(consulta.id_consulta);
    $("#tipoconsultanota").val(tipo);
    $("#nota_aclaratoria").val(consulta.nota_aclaratoria);
     
   
    setTimeout(() => {
        
        $("#modal-notaAclaratoria").modal('show');
    }, 1000);

}

function actualizarNota(){
    if(confirm('Actualizar nota?')){
        varDataIn={
            'id':  $('#idconsultanota').val(),
            'consulta':   $('#tipoconsultanota').val(),
            'nota':   $('#nota_aclaratoria').val(),
            'key':'GimmidsApp'
        };
        console.log(varDataIn);
        $.ajax({
            url: "https://saludsp.com.co/api/servicios/actualizarNotaAclaratoria.php",
            type: "post",
            data: {'datos': varDataIn},
            async:false
        }).done(function(res){
            console.log(res);
            console.log("Respuesta: "); 
            try {
                var data=JSON.parse(res);
                console.log(data);  
                if (data.STATUS == 'OK') {
                   
                    $("#modal-notaAclaratoria").modal('hide'); 
                    alert('nota actualizada con exito!');
                    location.reload();

                } else {
                    console.log(data);  
                    
                    alert(data.ERROR);
                     
                }
    
    
            } catch (error) {
                console.log(error);
                 
            }
    
    
        } ).fail(function(a) { 
             
             console.log(e);
             
        });

    }
}
function calcularRiesgoEscala(){
    console.log('Claculando caida');
    var total=0;
    if($("#caida_previa").val()=='SI'){
        total=total+1;
    } 
    if($("#caida_medicamentos").val()=='var'){
        total=total+1;
    }
    if($("#caida_medicamentos").val()=='TRANQUILIZANTES, SEDANTES' || $("#caida_medicamentos").val()=='DIURETICOS HIPOTENSORES NO DIURETICOS' || $("#caida_medicamentos").val()=='ANTIPARKINSONIANOS, ANTIDEPRESIVOS, OTROS'){
        total=total+1;
    }
    if($("#caida_deficit").val()=='ALTERACIONES VISUALES O AUDITIVAS'){
        total=total+1;
    }
    if($("#caida_cateteres").val()=='SI'){
        total=total+20;
    }
    if($("#caida_mental").val()=='CONFUSO' || $("#caida_mental").val()=='AGITACION PSICOMOTORA'){
        total=total+1;
    }
    if($("#caida_deambulacion").val()=='var' || $("#caida_deambulacion").val()=='var'){
        total=total+1;
    } 
    var riesgo='';
    if(total<3){
        riesgo='RIESGO BAJO';
        $("#riesgo_escala").removeClass('text-danger');
        $("#riesgo_escala").removeClass('text-warning');
        $("#riesgo_escala").addClass('text-success');
    }
    if(total>2 && total<5){
        riesgo='RIESGO MEDIO';
        $("#riesgo_escala").removeClass('text-success');
        $("#riesgo_escala").removeClass('text-danger');
        $("#riesgo_escala").addClass('text-warning');
    }
    if(total>4){
        riesgo='RIESGO ALTO';
        $("#riesgo_escala").removeClass('text-success');
        $("#riesgo_escala").removeClass('text-warning');
        $("#riesgo_escala").addClass('text-danger');
    }
    $("#riesgo_escala").html(riesgo);
}
function cerrarmodalPrintListado(){

    localStorage.removeItem('consultaRegistrada');
    localStorage.removeItem('consultaRegistradaTipo');
 
}
    
function imprimirProcedimientoBase(index, tipo){
    console.log(tipo);
    console.log(index);
    if(confirm('deseas ver la consulta?')){
        if(tipo=='local'){ 
            localStorage.setItem('consultImprim', JSON.stringify(procedimientos[index]));
        }else{
              
           
            varDataIn={
                'id':  index,
                'key':'GimmidsApp'
            };
            $.ajax({
                url: "https://saludsp.com.co/api/servicios/listarProcedimientoID.php",
                type: "post",
                data: {'datos': varDataIn},
                async:false
            }).done(function(res){
                console.log(res);
                console.log("Respuesta: "); 
                try {
                    var data=JSON.parse(res);
                    console.log(data);  
                    if (data.STATUS == 'OK') {
                       
                        localStorage.setItem('consultImprim', JSON.stringify(data.DATA[data.DATA.length-1]));
        
                      
                    } else {
                        console.log(data);  
                        
                        alert(data.ERROR);
                         
                    }
        
        
                } catch (error) {
                     
                }
        
        
            } ).fail(function() { 
                 
                 
                 
            });
        }
        ipc.send('imprimir', 'procedimientoRealizado');

    }
    
     
}

function iniciorelsex(){
    if($("#NutSSRiniciorelsex").val()=='Si'){
        $(".NutSSRedadiniciorelsex").removeClass('hide');
        $(".NutSSRparejasexual").removeClass('hide');
        $("#NutSSRhasestadoEmbara").attr( "disabled", false );
    }else{
        $(".NutSSRparejasexual").addClass('hide');
        $(".NutSSRedadiniciorelsex").addClass('hide');
        $("#NutSSRhasestadoEmbara").attr( "disabled", true );

    }
}
function parejaSecualCam(){

    if($("#NutSSRparejasexual").val()=='Otro'){

        $("#NutSSRotroparejasex").attr( "disabled", false );
    }else{

        $("#NutSSRotroparejasex").attr( "disabled", true );
    }
}
function NutSSRutilizaCondonCam(){

    if($("#NutSSRutilizaCondon").val()=='A veces' || $("#NutSSRutilizaCondon").val()=='Nunca'){

        $("#NutSSRrazonnocondon").attr( "disabled", false );
    }else{

        $("#NutSSRrazonnocondon").attr( "disabled", true );
    }
}
function NutSSRdespuesRealizprITSCam(){

    if($("#NutSSRdespuesRealizprITS").val()=='Si'){

        $("#NutSSRCualesITSdesp").attr( "disabled", false );
    }else{

        $("#NutSSRCualesITSdesp").attr( "disabled", true );
    }
}
function valelemnHigienMens(){

    if($("#NutSSRelemnHigienMens").val()=='Otro'){

        $("#NutSSRotroelemeHigien").attr( "disabled", false );
    }else{

        $("#NutSSRotroelemeHigien").attr( "disabled", true );
    }
}
function MenstruaAfectaVivirCam(){

    if($("#NutSSRMenstruaAfectaVivir").val()=='Si'){

        $("#NutSSRMenstruaAfectaVivirporque").attr( "disabled", false );
    }else{

        $("#NutSSRMenstruaAfectaVivirporque").attr( "disabled", true );
    }
}

function realizadoCitologiaCam(){

    if($("#NutSSRrealizadoCitologia").val()=='Si'){

        $("#NutSSRfechaUltimaCitologia").attr( "disabled", false );
        $("#NutSSRresultadoCitologia").attr( "disabled", false );
    }else{

        $("#NutSSRfechaUltimaCitologia").attr( "disabled", true );
        $("#NutSSRresultadoCitologia").attr( "disabled", true );
    }
}
function hasTenidoITSVIHCam(){

    if($("#NutSSRhasTenidoITSVIH").val()=='Si'){

        $("#NutSSRhasTenidoITSVIHCual").attr( "disabled", false ); 
        $("#NutSSRrepostroparejaITS").attr( "disabled", false ); 
        $("#NutSSRrealizottoITS").attr( "disabled", false ); 
    }else{

        $("#NutSSRhasTenidoITSVIHCual").attr( "disabled", true );
        $("#NutSSRrepostroparejaITS").attr( "disabled", true );
        $("#NutSSRrealizottoITS").attr( "disabled", true );
        
    }
}
function NutSSRrepostroparejaITSCam(){

    if($("#NutSSRrepostroparejaITS").val()=='No'){

        $("#NutSSRnoreportparegPorque").attr( "disabled", false ); 
       
    }else{

        $("#NutSSRnoreportparegPorque").attr( "disabled", true );
        
        
    }
}
function NutSSRrealizottoITSCam(){

    if($("#NutSSRrealizottoITS").val()=='No'){

        $("#NutSSRrealizottoITSPorque").attr( "disabled", false ); 
       
    }else{

        $("#NutSSRrealizottoITSPorque").attr( "disabled", true );
        
        
    }
}

function camAntecPat(a,b){

    if($("#"+a).val()=='Si'){

        $("#"+b).attr( "disabled", false ); 
       
    }else{

        $("#"+b).attr( "disabled", true );
        
        
    }
}
function camAnteConsumoPat(a,b,c,d){

    if($("#"+a).val()=='Si'){

        $("#"+b).attr( "disabled", false );
        $("#"+c).attr( "disabled", false );
        $("#"+d).attr( "disabled", false ); 
       
    }else{

        $("#"+b).attr( "disabled", true );
        $("#"+c).attr( "disabled", true );
        $("#"+d).attr( "disabled", true );
        
        
    }
}

function UtilizaMetoAnticonceptivoCam(){

    if($("#NutSSRUtilizaMetoAnticonceptivo").val()=='Si'){

        $("#NutSSRMetoAnticonceptivoUsado").attr( "disabled", false );
        $("#NutSSRMetoAnticonceptivoUsadoTiempo").attr( "disabled", false );
        $("#NutSSRPrescritoPersonalSalud").attr( "disabled", false );
        $("#NutSSREfectoSecundario").attr( "disabled", false );
        $("#NutSSREfectoSecundarioCual").attr( "disabled", false );
        $("#NutSSRrazonNoUsaMetodo").attr( "disabled", true );
       
    }else{

        $("#NutSSRMetoAnticonceptivoUsado").attr( "disabled", true );
        $("#NutSSRMetoAnticonceptivoUsadoTiempo").attr( "disabled", true );
        $("#NutSSRPrescritoPersonalSalud").attr( "disabled", true );
        $("#NutSSREfectoSecundario").attr( "disabled", true );
        $("#NutSSREfectoSecundarioCual").attr( "disabled", true );
        $("#NutSSRrazonNoUsaMetodo").attr( "disabled", false );
        
        
    }
}
function razonNoUsaMetodoCualCam(){

    if($("#NutSSRrazonNoUsaMetodo").val()=='Otra'){

        $("#NutSSRrazonNoUsaMetodoCual").attr( "disabled", false );
         
    }else{

        $("#NutSSRrazonNoUsaMetodoCual").attr( "disabled", true );
         
        
    }
}
function preentaAnormalidadGenitalesCam(){

    if($("#NutSSRpreentaAnormalidadGenitales").val()=='Si'){

        $("#NutSSRpreentaAnormalidadGenitalesCual").attr( "disabled", false );
         
    }else{

        $("#NutSSRpreentaAnormalidadGenitalesCual").attr( "disabled", true );
         
        
    }
}
function deseaPlanificarAsesoriaCam(){

    if($("#NutSSRdeseaPlanificarAsesoria").val()=='Si'){

        $("#NutSSRMetodoPlaniPreElegi").attr( "disabled", false );
         
    }else{

        $("#NutSSRMetodoPlaniPreElegi").attr( "disabled", true );
         
        
    }
}
function requieSeguimCam(){

    if($("#NutSSRrequieSeguim").val()=='Si'){

        $("#NutSSRfechaSeguimiento").attr( "disabled", false );
         
    }else{

        $("#NutSSRfechaSeguimiento").attr( "disabled", true );
         
        
    }
}
function modalSeguimientosz(tipoConsultaimprimir, consulta, position, id){
    $("#modal-seguimiento-consulta").modal('show');
    $("#tipoConsImpriSeg").val(tipoConsultaimprimir);
    $("#consultaImpriSeg").val(consulta);
    $("#positionImpriSeg").val(position);
    $("#idImpriSeg").val(id);
    if(consulta=='generales'){
        
        localStorage.setItem('consultaRegistrada', JSON.stringify(consultasServidorGeneral[position]));
    }
    if(consulta=='enfermeria'){
        localStorage.setItem('consultaRegistrada', JSON.stringify(consultasServidorEnfermeria[position]));
        
    }
    if(consulta=='psicologia'){
        localStorage.setItem('consultaRegistrada', JSON.stringify(consultasServidorPsicologia[position]));
        
    }
    if(consulta=='nutricional'){
        localStorage.setItem('consultaRegistrada', JSON.stringify(consultasServidorNutricional[position]));
        
    }
    if(consulta=='adulto'){
        localStorage.setItem('consultaRegistrada', JSON.stringify(consultasServidorAdulto[position]));
        
    }
    if(consulta=='menor'){
        localStorage.setItem('consultaRegistrada', JSON.stringify(consultasServidorMenor[position]));
        
    }
    if(consulta=='gestante'){
        localStorage.setItem('consultaRegistrada', JSON.stringify(consultasServidorGestante[position]));
        
    }
    localStorage.setItem('consultaRegistradaTipo', tipoConsultaimprimir);


}


function registrarSeguimientoCons(){

    if(confirm("confirmas el registro del seguimiento?")){
        var dataIn={    
            'tipoid_pac':paciente.tipoidRegPac,
            'numid_pac':paciente.idRegPac,
            'nota_seguimiento':$("#notaSeguimientoCons").val(),
            'inst':usuario.institucion,
            'numid_registra':usuario.numid,
            'nombre_registra':usuario.nombres,
            'tipo_consulta':$("#consultaImpriSeg").val(),
            'id_consulta':$("#idImpriSeg").val(),
            'key':'GimmidsApp'
        }
        console.log(dataIn);
        
        $.ajax({
            url: "https://saludsp.com.co/api/servicios/registrarSeguimientoConsulta.php",
            type: "post",
            data: {'datos': dataIn},
            async:false,
        }).done(function(res){
            console.log(res);
            console.log("Respuesta: ");
            var data=JSON.parse(res);
            if(data.STATUS="OK"){
                alert('Seguimiento registrado con exito'); 
                $("#notaSeguimientoCons").val(null);
            }else{
                alert("Error al registrar seguimiento: "+data.ERROR);
            }
            console.log(res);
        } ).fail(function() { 
            alert("Error de conexion\n");
        });
    }
   
}

function cargarListadoSeguimientosCons(){
    var dataInvoice={
        'tipo_consulta':$("#consultaImpriSeg").val(),
        'id_consulta':$("#idImpriSeg").val(),
        'key':'GimmidsApp'
    
    }
    console.log(dataInvoice);

    $.ajax({
        url: "https://saludsp.com.co/api/servicios/listarSeguimientoPacienteConsulta.php",
        type: "post",
        data: {'datos': dataInvoice},
        async:false,
    }).done(function(res){
        console.log(res);
        console.log("Respuesta: ");
        var dataReci=JSON.parse(res);
        console.log(dataReci);
        if(dataReci.STATUS=="OK"){
            
            var contSeg='';
            for(var t=0;t<dataReci.DATA.length;t++){
                contSeg+=`<tr>
                            <td class="text-center">`+(t+1)+`</td>
                            <td class="text-center">`+dataReci.DATA[t].nota_seguimiento+`</td>
                            <td class="text-center">`+dataReci.DATA[t].fecha_registro+`</td>
                             
                        </tr>`;
            }
           
            $("#listadoSeguimientosBodyCons").html(contSeg);
        }else{
            alert("Error al listar seguimientos\n");
        }
    } ).fail(function() { 
        alert("Error de conexion al listar seguimientos\n");
    });
    
}

function seleeccTipoMN(){
    console.log($("#MNMenortipoConsulta").val());
    cont='<option></option>';
    if($("#MNMenortipoConsulta").val()=='890201' || $("#MNMenortipoConsulta").val()=='890206'){
        cont+='<option  value="04">04 - Detección de alteraciones de crecimiento y desarrollo del menor de diez años</option>';
        cont+='<option  value="09">09 - Detección de enfermedad profesional</option>';
    }else{
        cont+='<option  value="09">09 - Detección de enfermedad profesional</option>';
    }
    $("#MNMenorfinalidadConsulta").html(cont);
}
function seleeccFinaMN(){
    console.log($("#MNMenorfinalidadConsulta").val());
    cont='<option></option>';
    if(($("#MNMenortipoConsulta").val()=='890201' || $("#MNMenortipoConsulta").val()=='890206') && $("#MNMenorfinalidadConsulta").val()=='04'){
        cont+='<option  value="15">15 - Otra</option>';
        
    }else if(($("#MNMenortipoConsulta").val()=='890201' || $("#MNMenortipoConsulta").val()=='890206') && $("#MNMenorfinalidadConsulta").val()=='09'){
        cont+='<option  value="13">13 - Enfermedad general</option>';
    }else{
        cont+='<option  value="13">13 - Enfermedad general</option>';
    } 
    $("#MNMenorcausaExternaConsulta").html(cont);
}


function SeleccPsiocTipo(){
    if($("#PtipoConsulta").val()=='890208'){
        $("#primera_psico").removeClass('hide');
        $("#seguimiento_psico").addClass('hide');
    }else if($("#PtipoConsulta").val()=='890308'){
        
        $("#primera_psico").addClass('hide');
        $("#seguimiento_psico").removeClass('hide')
    }else{
        $("#primera_psico").addClass('hide');
        $("#seguimiento_psico").addClass('hide')

    }
}
function seleccOtro(a,b){
    console.log(a);
    console.log($("#"+a).val());
    if($("#"+a).val()=='Otro' || $("#"+a).val()=='Si'){
        $("#"+b).attr('disabled', false);
    }else{
        $("#"+b).val(null);
        $("#"+b).attr('disabled', true);

    }
}
function seleccOtroapoyo(){
    var sd=$("#familparticprog").val();
    console.log(sd);
    var val=0;
    for(var i=0;i<sd.length;i++){
        if(sd[i]=='Otro' || sd[i]=='Otra'){
            val=1;
        }
    }
    if($("#familparticprog").val()=='Otro' ){
        $("#familparticprogotro").attr('disabled', false);
        $("#familparticprogporno").attr('disabled', true);
        $("#familparticprogporno").val(null);
    }else if($("#"+a).val()=='No recibe ningún apoyo'){
        $("#familparticprogporno").attr('disabled', false);
        $("#familparticprogotro").attr('disabled', true);
        $("#familparticprogotro").val(null);
    }else{ 

        $("#familparticprogporno").val(null);
        $("#familparticprogotro").val(null);
        $("#familparticprogotro").attr('disabled', true);
        $("#familparticprogporno").attr('disabled', true);
    }
}
function selecctipoFamilia(){
    if($("#tipofamiMigran").val()=='Otro'){
        $("#tipofamiMigranotro").attr('disabled', false);
        $("#vocafamimigra").attr('disabled', true);
        $("#vocafamimixta").attr('disabled', true);
        $("#vocafamimigra").val(null);
        $("#vocafamimixta").val(null);
    }else if($("#tipofamiMigran").val()=='Migrante'){
        $("#tipofamiMigranotro").val(null);
        $("#vocafamimixta").val(null);
        $("#vocafamimigra").attr('disabled', false);
        $("#vocafamimixta").attr('disabled', true);
        $("#tipofamiMigranotro").attr('disabled', true);
    }else if($("#tipofamiMigran").val()=='Familia mixta'){
        $("#vocafamimixta").attr('disabled', false);
        $("#tipofamiMigranotro").attr('disabled', true);
        $("#vocafamimigra").attr('disabled', true);
        $("#tipofamiMigranotro").val(null);
        $("#vocafamimigra").val(null);
    }else{ 
        $("#tipofamiMigranotro").attr('disabled', true);
        $("#vocafamimigra").attr('disabled', true);
        $("#vocafamimixta").attr('disabled', true);
        $("#tipofamiMigranotro").val(null);
        $("#vocafamimigra").val(null);
        $("#vocafamimixta").val(null);

    }
}

function valselecOtroMult(a,b){
    var sd=$("#"+a).val();
    console.log(sd);
    var val=0;
    for(var i=0;i<sd.length;i++){
        if(sd[i]=='Otro' || sd[i]=='Otra'){
            val=1;
        }
    }
    if(val==1){ 
        $("#"+b).attr('disabled', false);
    }else{
        
        $("#"+b).val(null);
        $("#"+b).attr('disabled', true);
    }
}

function numOtroDocument(tipo, num){
	if($('#'+tipo).val()!='NINGUNO'){
		$('#'+num).removeAttr('disabled');
	}else if($('#'+tipo).val()=='NINGUNO'){
		
		$('#'+num).attr('disabled', true);
		$('#'+num).val('');
	}
}

function cargaNumHistClinic(tipoid,numid, historia){
	 
	$("#"+historia+"").val($("#"+tipoid+"").val()+$("#"+numid+"").val());
}
function actualizarDatosPaciente(){
    regPaciente = { 
        "id": paciente.id,
        "idJSON": paciente.idJSON,
        "tipoidRegPac":paciente.tipoidRegPac,
        "idRegPac": paciente.idRegPac,
        "otroDocumRep": ($("#otroDocumRep").val()) ? $("#otroDocumRep").val() : '',
        "nombres": $("#nombres").val(),
        "papellido": $("#papellido").val(),
        "sapellido": ($("#sapellido").val()) ? $("#sapellido").val() : '',
        "estCivil": $("#estCivil").val(),
        "sexo": $("#sexo").val(),
        "fecNac": $("#fecNac").val(),
        "paisProcedencia": $("#paisProcedencia").val(),
        "dptoProcedencia": $("#dptoProcedencia").val(),
        "mnpoProcedencia": $("#mnpoProcedencia").val(),
        "paisResidencia": '45',
        "dptoResidencia": $("#dptoResidencia").val(),
        "mnpoResidencia": $("#mnpoResidencia").val(),
        "direccionResidencia": $("#direccionResidencia").val(),
        "zonaResidencia": $("#zonaResidencia").val(),
        "telefono": ($("#telefono").val()) ? $("#telefono").val() : '',
        "status_migratorio": $("#status_migratorio").val(),
        "perfilPacie": ($("#perfilPacie").val()) ? $("#perfilPacie").val() : '',
        "movilidadPacie": $("#movilidadPacie").val(),
        "tipoMoviliPAc": ($("#tipoMoviliPAc").val()) ? $("#tipoMoviliPAc").val() : '',
        "BDUA": ($("#BDUA").val()) ? $("#BDUA").val() : '',
        "eapb": ($("#eapb").val()) ? $("#eapb").val() : '',
        "tipoPoblacion": ($("#tipoPoblacion").val()) ? $("#tipoPoblacion").val() : '',
        "regimen": ($("#regimen").val()) ? $("#regimen ").val(): '',
        "perEtnica": ($("#perEtnica").val()) ? $("#perEtnica").val() : '',
        "pueIndigena": ($("#pueIndigena").val()) ? $("#pueIndigena").val() : '',
        "OtraDireccion": ($("#OtraDireccion").val()) ? $("#OtraDireccion").val() : '',
        "correoElec": ($("#correoElec").val()) ? $("#correoElec").val() : '',
        "tiemrpoingresoColo": ($("#tiemrpoingresoColo").val()) ? $("#tiemrpoingresoColo").val() : '',
        "remitidoP": ($("#remitidoP").val()) ? $("#remitidoP").val() : '',
        "remitidoPDesc": ($("#remitidoPDesc").val()) ? $("#remitidoPDesc").val() : '',
        "otroDocumRepNum": ($("#otroDocumRepNum").val()) ? $("#otroDocumRepNum").val() : '',
        "rumv": ($("#rumv").val()) ? $("#rumv").val() : '',
        "rumvNum": ($("#rumvNum").val()) ? $("#rumvNum").val() : '',
        "PPT": ($("#PPT").val()) ? $("#PPT").val() : '',
        "PPTNum": ($("#PPTNum").val()) ? $("#PPTNum").val() : '',
        "fecha_registro": paciente.fecha_registro,
        "usuario_regitraid": paciente.usuario_regitraid,
        "usuario_regitratipoid": paciente.usuario_regitratipoid,
        "usuario_registrainst": paciente.usuario_registrainst,
        'estado': paciente.estado,
        "aceptaTerminos": paciente.aceptaTerminos
        
    }
    console.log(regPaciente);
   if(confirm("seguro de actualizar datos?")){
        $.ajax({
            url: "https://saludsp.com.co/api/servicios/actualizarDatosPaciente.php",
            type: "post",
            data: {'datos':regPaciente, 'key':'GimmidsApp'  },
            async:false,
        }).done(function(res){
            console.log(res);
            var data=JSON.parse(res);
            console.log(data);
            if(data.STATUS=='OK' && data.ROW>0){

                
                localStorage.setItem('paciente', JSON.stringify(regPaciente));
                for(var too=0;too<pacientes.length;too++){
                    if(pacientes[too].tipoidRegPac && pacientes[too].idRegPac){
                        pacientes[too]=regPaciente;
                    }
                }
                fs.writeFileSync(__dirname+'/json/pacientes.json', JSON.stringify(pacientes));	
            
                alert('Datos actualizados!..');
                location.reload();

            }else{

                if (confirm('Problemas al actualizar paciente al servidor. Desea volver a intentarlo?')) {
                    actualizarDatosPaciente();
                } 

            }
            
        }).fail(function() { 
            if (confirm('Problemas al actualizar paciente al servidor. Desea volver a intentarlo?')) {
                actualizarDatosPaciente();
            } 
            
        });
   }
}
function actualizarDatosPacienteIdentificacion(){
    regPaciente = { 
        "tipoidRegPac": $("#tipoidRegPac").val(),
        "idRegPac": $("#idRegPac").val(),
        "tipoid_viejo": paciente.tipoidRegPac,
        "id_viejo": paciente.idRegPac
    }
    console.log(regPaciente);
    if(confirm('seguro de actualizar datos?')){
        
        $.ajax({
            url: "https://saludsp.com.co/api/servicios/actualizarDatosPacienteID.php",
            type: "post",
            data: {'datos':regPaciente, 'key':'GimmidsApp'  },
            async:false,
        }).done(function(res){
            console.log(res);
            var data=JSON.parse(res);
            console.log(data);
            if(data.STATUSPac=='OK' && data.ROWpac>0){

                
                for(var too=0;too<pacientes.length;too++){
                    if(pacientes[too].tipoidRegPac && pacientes[too].idRegPac){
                        pacientes[too].idRegPac=$("#idRegPac").val();
                        pacientes[too].tipoidRegPac=$("#tipoidRegPac").val();
                        
                        localStorage.setItem('paciente', JSON.stringify(pacientes[too]));
                    }
                }
                fs.writeFileSync(__dirname+'/json/pacientes.json', JSON.stringify(pacientes));	
            
                alert('Datos actualizados!..\n Consultas actualizadas: '+(data.ROWcons+data.ROWcons2+data.ROWcons3+data.ROWcons4+data.ROWcons5+data.ROWcons6+data.ROWcons7));
                location.reload();

            }else{

                if (confirm('Problemas al actualizar paciente al servidor. Desea volver a intentarlo?')) {
                    actualizarDatosPacienteIdentificacion();
                } 

            }
            
        }).fail(function() { 
            if (confirm('Problemas al registrar paciente al servidor. Desea volver a intentarlo?')) {
                actualizarDatosPacienteIdentificacion();
            } 
            
        });
    }
}
function cargarEscalaPAciente(){
    nota = {  
        "tipoid_pac": paciente.tipoidRegPac,
        "numid_pac": paciente.idRegPac
    }
    console.log(nota);
    $.ajax({
        url: "https://saludsp.com.co/api/servicios/listarEscalaPaciente.php",
        type: "post",
        data: {'datos':nota, 'key':'GimmidsApp'  },
        async:false,
    }).done(function(res){
        console.log(res);
        var data=JSON.parse(res);
        console.log(data);
        if(data.STATUS=='OK'){
            if(data.DATA.length>0){

                $("#caida_previa").val(data.DATA[0].caidas_previas);
                $("#caida_medicamentos").val(data.DATA[0].medicamentos);
                $("#caida_deficit").val(data.DATA[0].deficit_sensoriales);
                $("#caida_cateteres").val(data.DATA[0].cateres);
                $("#caida_mental").val(data.DATA[0].estado_mental);
                $("#caida_deambulacion").val(data.DATA[0].deambulacion);
                calcularRiesgoEscala();
            }

        }else{
            if (confirm('Problemas al listar Escala . Desea volver a intentarlo?')) {
                cargarEscalaPAciente();
            } 
        }

          
        
    }).fail(function() { 
        if (confirm('Problemas al listar escala del servidor. Desea volver a intentarlo?')) {
            cargarEscalaPAciente();
        } 
        
    });
}
function registrarEscalaPaciente(){
    escala = {  
        "tipoid_pac": paciente.tipoidRegPac,
        "numid_pac": paciente.idRegPac,
        "prof_reg": usuario.nombres,
        "caidas_previas": $("#caida_previa").val(),
        "medicamentos": $("#caida_medicamentos").val(),
        "deficit_sensoriales": $("#caida_deficit").val(),
        "cateres": $("#caida_cateteres").val(),
        "estado_mental": $("#caida_mental").val(),
        "deambulacion": $("#caida_deambulacion").val()
    }
    console.log(escala);
    $.ajax({
        url: "https://saludsp.com.co/api/servicios/registrarEscalaPaciente.php",
        type: "post",
        data: {'datos':escala, 'key':'GimmidsApp'  },
        async:false,
    }).done(function(res){
        console.log(res);
        var data=JSON.parse(res);
        console.log(data);
        if(data.STATUS=='OK'){
            alert('Escala registrada con exito');
            location.reload();

        }else{
            if (confirm('Problemas al registrar Escala . Desea volver a intentarlo?')) {
                registrarEscalaPaciente();
            } 
        }

          
        
    }).fail(function() { 
        if (confirm('Problemas al registrar escala del servidor. Desea volver a intentarlo?')) {
            registrarEscalaPaciente();
        } 
        
    });
}