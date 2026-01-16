let dptos=[], paises=[], mnpos=[], pruebasRealizadas=[], indigenas=[];
 
$(function	()	{
	$("#menuHome").removeClass('active');
	$("#menuLibro").removeClass('active');
	$("#menuQuimioprofilaxis").removeClass('active');
	$("#menuResistentes").removeClass('active');
	$("#menuFarmacia").removeClass('active');
	$("#menuInformes").removeClass('active');
	$("#menuAdmin").removeClass('active'); 

	$("#menuSintomaticos").addClass('active');
	fetchData(); 

});

async function fetchData() {
	
    const pueblo = document.getElementById('puebloIndigena'); 
    if (pueblo) {
        pueblo.disabled = true;
        pueblo.value = '';
    }    
    usuario=JSON.parse(localStorage.getItem('user'));
	console.log(usuario);
	//enviroments
	try {
		const response = await fetch('../../json/enviroments.json'); // Reemplaza con la ruta a tu archivo JSON
		
		if (!response.ok) {
		throw new Error('Error al cargar el archivo JSON'); // Manejo de errores si la respuesta no es ok
		}

		env = await response.json(); // Convierte la respuesta a JSON
    	console.log(env); // Aquí puedes trabajar con los datos JSON
	} catch (error) {
		console.error('Error DPTOS:', error); // Manejo de errores
	}
	//dptos
	try {
		const response = await fetch('../../json/dptos.json'); // Reemplaza con la ruta a tu archivo JSON
		
		if (!response.ok) {
		throw new Error('Error al cargar el archivo JSON'); // Manejo de errores si la respuesta no es ok
		}

		dptos = await response.json(); // Convierte la respuesta a JSON
    	console.log(dptos); // Aquí puedes trabajar con los datos JSON
		dptos.forEach(u => {
			const option = document.createElement('option');
			option.value = u.Id; // valor de la opción 
			option.textContent = u.nombre; // valor de la opción 
			//document.getElementById('dpto').appendChild(option);
			(document.getElementById('dpto'))? document.getElementById('dpto').appendChild(option):'';	 
  			//const optionClone = option.cloneNode(true); // Clonamos el nodo

			//document.getElementById('Departamenton').appendChild(optionClone);
				 
			 
		});
	} catch (error) {
		console.error('Error DPTOS:', error); // Manejo de errores
	}
	//paises
	try {
		const response = await fetch('../../json/paises.json'); // Reemplaza con la ruta a tu archivo JSON
		
		if (!response.ok) {
		throw new Error('Error al cargar el archivo JSON'); // Manejo de errores si la respuesta no es ok
		}

		paises = await response.json(); // Convierte la respuesta a JSON
    	console.log(paises); // Aquí puedes trabajar con los datos JSON
	} catch (error) {
		console.error('Error DPTOS:', error); // Manejo de errores
	}
	//mnpos
	try {
		const response = await fetch('../../json/mnpo.json'); // Reemplaza con la ruta a tu archivo JSON
		
		if (!response.ok) {
		throw new Error('Error al cargar el archivo JSON'); // Manejo de errores si la respuesta no es ok
		}

		mnpos = await response.json(); // Convierte la respuesta a JSON
    	console.log(mnpos); // Aquí puedes trabajar con los datos JSON
	} catch (error) {
		console.error('Error DPTOS:', error); // Manejo de errores
	}
	//indigenas
	try {
		const response = await fetch('../../json/indigenas.json'); // Reemplaza con la ruta a tu archivo JSON
		
		if (!response.ok) {
		throw new Error('Error al cargar el archivo JSON'); // Manejo de errores si la respuesta no es ok
		}

		indigenas = await response.json(); // Convierte la respuesta a JSON
    	console.log(indigenas); // Aquí puedes trabajar con los datos JSON

        indigenas.forEach(u => {
			const option = document.createElement('option');
			option.value = u.nombre; // valor de la opción 
			option.textContent = u.nombre; // valor de la opción 
			//document.getElementById('puebloIndigena').appendChild(option);
			 (document.getElementById('puebloIndigena'))? document.getElementById('puebloIndigena').appendChild(option):'';	 
				 
			 
		});
	} catch (error) {
		console.error('Error DPTOS:', error); // Manejo de errores
	}
	//ips
	try {
		const response = await fetch('../../../'+env.url_api+'servicios/ips.csv'); // Reemplaza con la ruta a tu archivo JSON
		
		if (!response.ok) {
		throw new Error('Error al cargar el archivo JSON'); // Manejo de errores si la respuesta no es ok
		}
		
		// Leemos el CSV como texto
		const csvText = await response.text();

		// Convertimos a filas (por línea)
		const lines = csvText.trim().split('\n');

		// Tomamos la primera fila como encabezados
		const headers = lines[0].split(';').map(h => h.trim());

		// Convertimos el resto de las filas a objetos
		const ips = lines.slice(1).map(line => {
			const values = line.split(';').map(v => v.trim());
			const obj = {};
			headers.forEach((header, i) => {
			obj[header] = values[i] || '';
			});
			return obj;
		});
		ips.forEach(u => {
			const option = document.createElement('option');
			option.value = u.nombres; // valor de la opción 
			//document.getElementById('institucionList').appendChild(option);
			(document.getElementById('institucionList'))? document.getElementById('institucionList').appendChild(option):'';	 
  			//const optionClone = option.cloneNode(true); // Clonamos el nodo

			//document.getElementById('listaIps2').appendChild(optionClone);
				 
			 
		});
		console.log(ips); 
	} catch (error) {
		console.error('Error ips:', error); // Manejo de errores
	}
	listarSintomaticos();
}   


async function registrarSintomatico(){
	
	const dataIn={ 
		'fechaCaptacion': changeDateFormat(document.getElementById('fechaCaptacion').value),
		'ano': document.getElementById('ano').value,
		'remitidoPor': document.getElementById('remitidoPor').value,
		'fechaSintomas': changeDateFormat(document.getElementById('fechaSintomas').value),
		'dpto': document.getElementById('dpto').value,
		'mnpo': document.getElementById('mnpo').value,
		'nombres': document.getElementById('nombres').value,
		'papellido': document.getElementById('papellido').value,
		'sapellido': document.getElementById('sapellido').value,
		'sexo': document.getElementById('sexo').value,
		'edad': document.getElementById('edad').value,
		'tipoid': document.getElementById('tipoid').value,
		'numid': document.getElementById('numid').value,
		'etnia': document.getElementById('etnia').value,
		'puebloIndigena': document.getElementById('puebloIndigena').value,
		'grupoPoblacional': document.getElementById('grupoPoblacional').value,
		'sector': document.getElementById('sector').value,
		'sectorDeta': document.getElementById('sectorDeta').value,
		'direccion': document.getElementById('direccion').value,
		'comuna': document.getElementById('comuna').value,
		'telefono': document.getElementById('telefono').value,
		'ocupacion': document.getElementById('ocupacion').value,
		'regimen': document.getElementById('regimen').value,
		'eapb': document.getElementById('eapb').value,
		'pruebaRealizadas': pruebasRealizadas,
		'observaciones': document.getElementById('observaciones').value,
		'institucion': document.getElementById('institucion').value,
		'responsable': document.getElementById('responsable').value
	};
	console.log(dataIn);
	const estaIncompleto = Object.entries(dataIn).some(([key, value]) => {
		// Excluir observaciones de la validación si es opcional
		if (key === 'observaciones') return false; 
		if (key === 'sectorDeta') return false; 
		if (key === 'direccion') return false; 
		if (key === 'comuna') return false; 
		if (key === 'telefono') return false; 
		if (key === 'ocupacion') return false;  
		if (key === 'puebloIndigena') return false;  
		if (key === 'sapellido') return false;  
			
		// Si es array, verificar longitud; si no, verificar si es string vacío
		return Array.isArray(value) ? value.length === 0 : (value === "" || value === null);
	});

	if (estaIncompleto) {
		alert("Hay campos obligatorios vacíos. Por favor revisa el formulario.");
		return;
	}

	const data=dataIn;
	let dataSend={ key: env.key,  token: usuario.token , id_registra:usuario.data.id, data };

	try {
		const respuesta = await fetch('../../../'+env.url_api+'servicios/registrarSintomatico.php', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json' // Indica que estás enviando JSON
		},
		body: JSON.stringify(dataSend)
		});

		if (!respuesta.ok) {
		throw new Error(`Error HTTP: ${respuesta.status}`);
		}

		const resultado = await respuesta.json(); // Si el servidor responde con JSON
		console.log('Respuesta del servidor:', resultado);
		if(resultado.STATUS=='OK' ){
			alert('Sintomatico registrado!..');
			location.reload();
			

		}else{
			alert('Error al registrar el sintomatico!..\n'+    resultado.ERROR)
		}

	} catch (error) {
		alert('Error en la petición:', error);
	}
}


function controlarIndigenas() {
    const select1 = document.getElementById('etnia');
    const select2 = document.getElementById('puebloIndigena');

    if (select1.value === 'INDIGENA') {
        select2.disabled = false; // habilita
    } else {
        select2.disabled = true;  // deshabilita
        select2.value = '';       // opcional: limpia selección
    }
}


async function listarSintomaticos(){
	console.log(usuario);
    let dataSend={ key: env.key,  token: usuario.token , id_registra:usuario.data.id };
    console.log(dataSend);
    try {
        const respuesta = await fetch('../../../'+env.url_api+'servicios/listarSintomaticos.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json' // Indica que estás enviando JSON
        },
        body: JSON.stringify(dataSend)
        });

        if (!respuesta.ok) {
        throw new Error(`Error HTTP: ${respuesta.status}`);
        }

        const resultado = await respuesta.json(); // Si el servidor responde con JSON
        console.log('Respuesta del servidor:', resultado);
        if(resultado.STATUS=='OK' ){
            if(resultado.DATA){
				
                mostrarTablaCompleta(resultado.DATA);
            }
             
            

        }else{
            alert('Error al registrar el paciente!..\n'+    resultado.ERROR)
        }

    } catch (error) {
        alert('Error en la petición:', error);
    }
}



//------------------PRUEBAS REALIZADAS
function adjuntarPrueba(){
    console.log('adjuntando Prueba');
    var data={'prueba': document.getElementById('pruebaRealizada').value, 'resultado': document.getElementById('resultadoPrueba').value , 'fecha': changeDateFormat(document.getElementById('fechaPreuba').value)};
    
    pruebasRealizadas.push(data);
    console.log(pruebasRealizadas);
    cargarTablaPruebasRealizadas();
}

function cargarTablaPruebasRealizadas(){
    var con='';
    for(var u=0; u<pruebasRealizadas.length; u++){
        con+='<tr>'
                +'<td  class="">'+pruebasRealizadas[u].prueba+'</td>'
                +'<td  class="">'+pruebasRealizadas[u].resultado+'</td>'
                +'<td  class="">'+pruebasRealizadas[u].fecha+'</td>'
                +'<td  class=""><a onclick="Javascript: descartarPrueba('+u+');" class="btn btn-danger">Borrar</a></td>'
            +'</tr>'
        
    }
    $("#TablaPruebasRealizadas").html(con);
    $("#pruebaRealizada").val(null);
    $("#resultadoPrueba").val(null);
    $("#fechaPreuba").val(null);
}
function descartarPrueba(index){
    pruebasRealizadas.splice(index, 1);
    cargarTablaPruebasRealizadas();
}

//----- cambio de dpto

function seleccionDpto(dpto, mnpo){
    document.getElementById(mnpo).innerHTML='<option></option';
    const valor=document.getElementById(dpto).value;
    console.log(valor);
    const datos=mnpos.filter(data => data.cod_dptop==valor);
    console.log(datos);

    datos.forEach(u => {
        const option = document.createElement('option');
        option.value = u.cod_mnpo; // valor de la opción 
        option.textContent = u.nombre_mnpo; // valor de la opción 
        document.getElementById(mnpo).appendChild(option);
            
                
            
    });
}
//--obtener consecutivo

async function numeroAnoCaptacion(){ 
    const input = document.getElementById('fechaCaptacion').value;
	const fecha = new Date(input);
	const anio = fecha.getFullYear();
	
    document.getElementById('ano').value=anio; 
	 const data={'ano':anio};
	let dataSend={ key: env.key,  token: usuario.token , id_registra:usuario.data.id, data };
	console.log(dataSend);
	try {
		const respuesta = await fetch('../../../'+env.url_api+'servicios/numeroConsecutivoSintomatico.php', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json' // Indica que estás enviando JSON
		},
		body: JSON.stringify(dataSend)
		});

		if (!respuesta.ok) {
		throw new Error(`Error HTTP: ${respuesta.status}`);
		}

		const resultado = await respuesta.json(); // Si el servidor responde con JSON
		console.log('Respuesta del servidor:', resultado);
		if(resultado.STATUS=='OK' ){
            if(resultado.DATA){
                document.getElementById('numero').value=resultado.DATA[0].num+1;
            }else{
                
                document.getElementById('numero').value='001';
            } 
			 

		}else{
			alert('Error al consultar numero!..')
		}

	} catch (error) {
		alert('Error en la petición:', error);
	}

}
function changeDateFormat(inputDate){  // RETORNA DD/MM/YYYY
    ////console.log(inputDate);
    if(inputDate){
        var splitDate = inputDate.split('-');
        if(splitDate.count == 0){
            return null;
        }
    
        var year = splitDate[0];
        var month = splitDate[1];
        var day = splitDate[2]; 
    
        return day + '/' + month + '/' + year;
    }else{
        return '';
    }

} 
function mostrarTablaCompleta(datos) {
    if(!document.getElementById('tabla-cabecera') || !document.getElementById('tabla-cuerpo')){
        return;
    }       

    const thead = document.getElementById('tabla-cabecera');
    const tbody = document.getElementById('tabla-cuerpo');
    thead.innerHTML = '';
    tbody.innerHTML = '';

    if (!datos || datos.length === 0) return;

    // 1. Obtener llaves excluyendo las 2 primeras
    let columnasVisibles = Object.keys(datos[0]).slice(2);

    // 2. Reordenar 'ano' a la segunda posición (índice 1 de las visibles)
    const nombreColumnaMover = 'ano';
    const indexAno = columnasVisibles.indexOf(nombreColumnaMover);
    if (indexAno > -1) {
        columnasVisibles.splice(indexAno, 1);
        columnasVisibles.splice(1, 0, nombreColumnaMover);
    }

    // 3. Generar Encabezados
    const filaCabecera = document.createElement('tr');
    
    // --- NUEVA COLUMNA DE ACCIONES ---
    const thAccion = document.createElement('th');
    thAccion.textContent = 'ACCIONES';
    filaCabecera.appendChild(thAccion);
    
    columnasVisibles.forEach(columna => {
        const th = document.createElement('th');
        th.textContent = columna === 'ano' ? 'AÑO' : columna.toUpperCase().replace(/_/g, ' ');
        filaCabecera.appendChild(th);
    });
    thead.appendChild(filaCabecera);

    // 4. Generar Filas de datos
    datos.forEach(item => {
        const fila = document.createElement('tr');
        
        // --- CELDA CON BOTÓN EDITAR ---
        const tdEditar = document.createElement('td');
        const botonEditar = document.createElement('button');
        botonEditar.innerHTML = '📝 ver / Editar';
        botonEditar.className = 'btn btn-primary btn-sm'; // Clases opcionales (Bootstrap)
        
        // Al hacer clic, enviamos el objeto completo del paciente a la función
        botonEditar.onclick = function() {
            ejecutarEdicion(item);
        };
        
        tdEditar.appendChild(botonEditar);
        fila.appendChild(tdEditar);

        // Celdas de datos normales
        columnasVisibles.forEach(columna => {
            const td = document.createElement('td');
            let valor = item[columna];
            
            if (columna === 'ano') {
                td.style.fontWeight = 'bold';
                td.style.textAlign = 'center';
            }

            td.textContent = (valor !== null && valor !== undefined) ? valor : '-';
            fila.appendChild(td);
        });
        
        tbody.appendChild(fila);
    });
}
// 5. Función que se ejecuta al dar clic
function ejecutarEdicion(paciente) {
    console.log("Editando paciente:", paciente);
    alert("Vas a editar a: " + paciente.id);
    
    // Aquí puedes cargar los datos en un formulario o abrir un modal
    // Ejemplo: document.getElementById('inputNombre').value = paciente.nombresyapellidos;
}
function filtrarTabla() {
    const textoBusqueda = document.getElementById('buscarPaciente').value.toLowerCase();
    const filas = document.querySelectorAll('#tabla-cuerpo tr');
    const tbody = document.getElementById('tabla-cuerpo');
    
    // 1. Eliminar mensaje de "SIN DATOS" previo si existe
    const mensajePrevio = document.getElementById('fila-sin-datos');
    if (mensajePrevio) mensajePrevio.remove();

    let coincidencias = 0;

    filas.forEach(fila => {
        const contenidoFila = fila.textContent.toLowerCase();
        
        if (textoBusqueda === "" || contenidoFila.includes(textoBusqueda)) {
            fila.style.display = "";
            coincidencias++;
        } else {
            fila.style.display = "none";
        }
    });

    // 2. Si no hubo coincidencias, crear la fila de aviso
    if (coincidencias === 0 && filas.length > 0) {
        const numeroColumnas = document.querySelectorAll('#tabla-cabecera th').length;
        const filaSinDatos = document.createElement('tr');
        filaSinDatos.id = 'fila-sin-datos';
        
        filaSinDatos.innerHTML = `
            <td colspan="${numeroColumnas}" style=" padding: 20px; color: #666; font-weight: bold;">
                🚫 NO SE ENCONTRARON CONCORDANCIAS
            </td>
        `;
        tbody.appendChild(filaSinDatos);
    }
}