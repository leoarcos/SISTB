 
let usuario=JSON.parse(localStorage.getItem('user'));
let consultasanoactual=[];
let cosnsultaspendientecargar=[];
let pacientesSinCargar=[];

let generales= Array();
let enfermeria= Array();
let psicologia= Array();
let nutricional= Array();
let adulto= Array();
let menor= Array();
let gestante= Array();
 	
let pacientes= Array();
let procedimientos= Array();



let iso3166= Array();

let paises= Array();
let dptos= Array();
let mnpos= Array();
let dptosv= Array();
let mnposv= Array();
 
let eapb= Array();
let puebloindigena= Array();
let medicamentos= Array();

/*

let iso3166= JSON.parse(fs.readFileSync(__dirname+'/json/ISO3166-1.json', 'utf-8'));

let paises= JSON.parse(fs.readFileSync(__dirname+'/json/paises.json', 'utf-8'));
let dptos= JSON.parse(fs.readFileSync(__dirname+'/json/dptos.json', 'utf-8'));
let mnpos= JSON.parse(fs.readFileSync(__dirname+'/json/mnpo.json', 'utf-8'));
let dptosv= JSON.parse(fs.readFileSync(__dirname+'/json/estadosv.json', 'utf-8'));
let mnposv= JSON.parse(fs.readFileSync(__dirname+'/json/ciudadesv.json', 'utf-8'));
 
let eapb= JSON.parse(fs.readFileSync(__dirname+'/json/eapb.json', 'utf-8'));
let puebloindigena= JSON.parse(fs.readFileSync(__dirname+'/json/puebloindigena.json', 'utf-8'));
let medicamentos= JSON.parse(fs.readFileSync(__dirname+'/json/medicamentos.json', 'utf-8'));

*/
let pacientesServidor=[];
let generalServidor=[];
let enfermeriaServidor=[];
let psicologiaServidor=[];
let nutricionalServidor=[];
let adultoServidor=[];
let menorServidor=[];
let gestanteServidor=[];


async function cargarDatos(){

	const datos={'sql': "SELECT count(*) AS cantidad FROM libroderegistro"};
    const url = 'https://cors-anywhere.herokuapp.com/http://186.31.31.123/sistbweb/servicios/listarLibroPacientes.php'; 
	try {
		const respuesta = await fetch(url, {
		  method: 'POST',
		  headers: {
		    'Content-Type': 'application/json' // Indica que estás enviando JSON
		  },
		  body: JSON.stringify(datos)
		});

		if (!respuesta.ok) {
		  throw new Error(`Error HTTP: ${respuesta.status}`);
		}

		const resultado = await respuesta.json(); // Si el servidor responde con JSON
		console.log('Respuesta del servidor:', resultado);

	} catch (error) {
		console.error('Error en la petición:', error);
	}
}


$(function	()	{
	fetchData();
	dptos=fetch('json/dptos.json')
  	.then(response => {
		if (!response.ok) {
		throw new Error('Error al cargar el archivo JSON');
		}
		return response.json();
	})
	.then(data => {
		console.log(data); // Aquí puedes trabajar con los datos
	})
	.catch(error => {
		console.error('Error:', error);
	});
	
	console.log(dptos);  
	var totalatencion=generales.length + enfermeria.length + psicologia.length + nutricional.length + adulto.length + menor.length + gestante.length + procedimientos.length;
	 


	var today = new Date();
	var year = today.getFullYear();

	con1=4;con2=5;con3=6;con4=8;con5=31;con6=40;con7=50;con8=20;con9=30;con10=10;con11=20;con12=30;
	consultasanoactual['general']=0;consultasanoactual['enfermeria']=0;consultasanoactual['psicologia']=0;consultasanoactual['nutricional']=0;consultasanoactual['adulto']=0;consultasanoactual['menor']=0;consultasanoactual['gestante']=0;
	cosnsultaspendientecargar['general']=[];cosnsultaspendientecargar['enfermeria']=[];cosnsultaspendientecargar['psicologia']=[];cosnsultaspendientecargar['nutricional']=[];cosnsultaspendientecargar['adulto']=[];cosnsultaspendientecargar['menor']=[];cosnsultaspendientecargar['gestante']=[];
 
	  
	var cont='';
	var contPac='';
	var contPro='';
	var contlop=1;
	var contlopro=1; 
	 
	(cont=='')?$("#tableUpload").html('<tr><td colspan="5">No hay datos pendientes</td></tr>'):$("#tableUpload").html(cont);
	(contPro=='')?$("#tableUploadProc").html('<tr><td colspan="5">No hay datos pendientes</td></tr>'):$("#tableUploadProc").html(contPro);
	(contPac=='')?$("#tableUploadPac").html('<tr><td colspan="5">No hay datos pendientes</td></tr>'):$("#tableUploadPac").html(contPac);
	//$("#tableUpload").html(cont);
	//$("#tableUploadPac").html(contPac);
	if(pacientesSinCargar.length!=0){
		$(".btnupload").addClass('disabled');
		$(".btnuploadPac").removeClass('disabled');
		$(".btnuploadProc").addClass('disabled');
	} 
	//Flot Chart
	//Website traffic chart				
	var init = { data: [ [1, con1], [2, con2], [3, con3], [4, con4], [5,con5], [6, con6], [7, con7], [8, con8], [9, con9], [10, con10], [11, con11], [12, con12]],
			 label: "Consultas"
		},
		options = {	
			series: {
				lines: {
					show: true, 
					fill: true,
					fillColor: 'rgba(121,206,167,0.2)'
				},
				points: {
					show: true,
					radius: '4.5'
				}
			},
			grid: {
				hoverable: true,
				clickable: true
			},
			colors: ["#37b494"]
		},
		plot;
			
	plot = $.plot($('#placeholder'), [init], options);
			
	$("<div id='tooltip'></div>").css({
		position: "absolute",
		display: "none",
		border: "1px solid #222",
		padding: "4px",
		color: "#fff",
		"border-radius": "4px",
		"background-color": "rgb(0,0,0)",
		opacity: 0.90
	}).appendTo("body");

	$("#placeholder").bind("plothover", function (event, pos, item) {

		var str = "(" + pos.x.toFixed(2) + ", " + pos.y.toFixed(2) + ")";
		$("#hoverdata").text(str);
	
		if (item) {
			var x = item.datapoint[0],
				y = item.datapoint[1];
				var mes='';
				if(x==1){ mes='Enero'} 
				if(x==2){ mes='Febrero'}
				if(x==3){ mes='Marzo'}
				if(x==4){ mes='Abril'}
				if(x==5){ mes='Mayo'}
				if(x==6){ mes='Junio'}
				if(x==7){ mes='Julio'}
				if(x==8){ mes='Agosto'}
				if(x==9){ mes='Septiembre'}
				if(x==10){ mes='Octubre'}
				if(x==11){ mes='Noviembre'}
				if(x==12){ mes='Diciembre'} 
				$("#tooltip").html("Total pacientes "+ mes +": " + y)
				.css({top: item.pageY+5, left: item.pageX+5})
				.fadeIn(200);
		} else {
			$("#tooltip").hide();
		}
	});

	$("#placeholder").bind("plotclick", function (event, pos, item) {
		if (item) {
			$("#clickdata").text(" - click point " + item.dataIndex + " in " + item.series.label);
			plot.highlight(item.series, item.datapoint);
		}
	});
			
	var animate = function () {
	   $('#placeholder').animate( {tabIndex: 0}, {
		   duration: 3000,
		   step: function ( now, fx ) {

				 var r = $.map( init.data, function ( o ) {
					  return [[ o[0], o[1] * fx.pos ]];
				});

				 plot.setData( [{ data: r }] );
			 plot.draw();
			}	
		});
	}
		
	animate();
 
	var barChart = Morris.Bar({
	  element: 'barChart',
	  data: [
		{ y: 'Pacientes', a: 21},
		{ y: 'Sintomaticos', a: 31 },
		{ y: 'Quimioprofilaxis', a: 34 },
		{ y: 'Resistente F.', a: 11 }, 
	  ],
	  xkey: 'y',
	  ykeys: 'a',
	  grid: true,
	  labels: ['Total'],
	  barColors: ['#6BAFBD'],
	  gridTextColor : '#fff'
	});

	//Sparkline
	 
	//Timeline color box
	$('.timeline-img').colorbox({
		rel:'group1',
		width:"90%",
		maxWidth:'800px'
	});

	//Resize graph when toggle side menu
	$('.navbar-toggle').click(function()	{
		setTimeout(function() {
			//donutChart.redraw();
			//lineChart.redraw();
			barChart.redraw();			
			
			$.plot($('#placeholder'), [init], options);
		},500);	
	});
	
	$('.size-toggle').click(function()	{
		//resize morris chart
		setTimeout(function() {
			//uudonutChart.redraw();
			//lineChart.redraw();
			barChart.redraw();	

			$.plot($('#placeholder'), [init], options);			
		},500);
	});

	//Refresh statistic widget
	$('.refresh-button').click(function() {
		var _overlayDiv = $(this).parent().children('.loading-overlay');
		_overlayDiv.addClass('active');
		
		setTimeout(function() {
			_overlayDiv.removeClass('active');
		}, 2000);
		
		return false;
	});
	
	$(window).resize(function(e)	{
		
		//Sparkline
		$('#visits').sparkline([15,19,20,22,33,27,31,27,19,30,21,10,15,18,25,9], {
			type: 'bar', 
			barColor: '#fa4c38',	
			height:'35px',
			weight:'96px'
		});
		$('#balances').sparkline([220,160,189,156,201,220,104,242,221,111,164,242,183,165], {
			type: 'bar', 
			barColor: '#92cf5c',	
			height:'35px',
			weight:'96px'
		});

		//resize morris chart
		setTimeout(function() {
			//donutChart.redraw();
			//lineChart.redraw();
			barChart.redraw();			
			
			$.plot($('#placeholder'), [init], options);
		},500);
	});
	
	$(window).load(function(e)	{
	
		//Number Animation
		 
		var currentBalance = $('#currentBalance').text();
		
		$({numberValue: 0}).animate({numberValue: currentBalance}, {
			duration: 2500,
			easing: 'linear',
			step: function() { 
				$('#currentBalance').text(totalatencion); 
			}
		});
			
		setInterval(function() {
			var currentNumber = $('#visitorCount').text();
			var randomNumber = Math.floor(Math.random()*50) + 1;
			var newNumber = parseInt(currentNumber, 10) + parseInt(randomNumber, 10); 
		
			$({numberValue: currentNumber}).animate({numberValue: newNumber}, {
				duration: 500,
				easing: 'linear',
				step: function() { 
					$('#visitorCount').text(Math.ceil(this.numberValue)); 
				}
			});
		}, 5000);
	});
	var contPaises='<option></option>';
	for(var t=0;t<paises.length;t++){
		contPaises+='<option value="'+paises[t].Id+'">'+paises[t].nombre+'</option>';
	}

	var condptor='<option></option>';
	for(var ty=0;ty<dptos.length;ty++){
		condptor+='<option value="'+dptos[ty].Id+'">'+dptos[ty].nombre+'</option>';
	}
	$("#AgendardptoResidencia").html(condptor);

	$("#dptoResidencia").html(condptor);

	$("#AgendarpaisProcedencia").html(contPaises);
	$("#paisProcedencia").html(contPaises);

	var conteapb='<option></option>';
	for(var ty=0;ty<eapb.length;ty++){
		conteapb+='<option value="'+eapb[ty].Id+'">'+eapb[ty].nombre+'</option>';
	}
	$("#Agendareapb").html(conteapb);
	$("#eapb").html(conteapb);

	var contpuebloindigena='<option value="NA" selected>NA</option>';
	for(var ty=0;ty<puebloindigena.length;ty++){
		contpuebloindigena+='<option value="'+puebloindigena[ty].Id+'">'+puebloindigena[ty].nombre+'</option>';
	}
	$("#AgendarpueIndigena").html(contpuebloindigena);
	$("#pueIndigena").html(contpuebloindigena);

	$("#AgendarPaisResidencia").val(45);
	$("#PaisResidencia").val(45); 
});
async function fetchData() {
	//dptos
	try {
		const response = await fetch('json/dptos.json'); // Reemplaza con la ruta a tu archivo JSON
		
		if (!response.ok) {
		throw new Error('Error al cargar el archivo JSON'); // Manejo de errores si la respuesta no es ok
		}

		dptos = await response.json(); // Convierte la respuesta a JSON
    	console.log(dptos); // Aquí puedes trabajar con los datos JSON
	} catch (error) {
		console.error('Error DPTOS:', error); // Manejo de errores
	}
}