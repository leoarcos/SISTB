let dptos=[], paises=[], mnpos=[], indigenas=[];
let env, usuario, libro, ips;
 

$(function	()	{
    
    const pueblo = document.getElementById('Puebloi');
    const clasifica = document.getElementById('calisificaciotb');

    if (pueblo) {
        pueblo.disabled = true;
        pueblo.value = '';
    }
    if (clasifica) {
        clasifica.disabled = true;
        clasifica.value = '';
    }
	fetchData(); 
});

async function fetchData() {
  
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
			//document.getElementById('listaIps1').appendChild(option);
			(document.getElementById('listaIps1'))? document.getElementById('listaIps1').appendChild(option):'';
  			const optionClone = option.cloneNode(true); // Clonamos el nodo

			//document.getElementById('listaIps2').appendChild(optionClone);
			
			(document.getElementById('listaIps2'))? document.getElementById('listaIps2').appendChild(option):'';	 
			 
		});
		console.log(ips); 
	} catch (error) {
		console.error('Error ips:', error); // Manejo de errores
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
			//document.getElementById('Puebloi').appendChild(option);
			
			(document.getElementById('Puebloi'))? document.getElementById('Puebloi').appendChild(option):'';
				 
			 
		});
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
			 
			(document.getElementById('Entidadte'))? document.getElementById('Entidadte').appendChild(option):'';
  			const optionClone = option.cloneNode(true); // Clonamos el nodo

			//document.getElementById('Departamenton').appendChild(optionClone);
			(document.getElementById('Departamenton'))? document.getElementById('Departamenton').appendChild(option):'';
				 
			 
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

        paises.forEach(u => {
			const option = document.createElement('option');
			option.value = u.Id; // valor de la opción 
			option.textContent = u.nombre; // valor de la opción 
			//document.getElementById('pasi').appendChild(option);
			 
            (document.getElementById('pasi'))? document.getElementById('pasi').appendChild(option):'';
				 
			 
		});
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
    
    listarLibro(); 
}   
async function registraPaciente(){
	 
     var otros='';
     if($("#Otrosc").val()){
        for(var i=0;i<$("#Otrosc").val().length;i++){
            if(i==($("#Otrosc").val().length)-1){
                otros+=$("#Otrosc").val()[i];
            }else{
                otros+=$("#Otrosc").val()[i]+', ';
            }
            
        }
    } 
     
     if(document.getElementById('Nombres').value!='' && document.getElementById('TipoId').value!=''  && document.getElementById('id').value!=''  && document.getElementById('fechaD').value!='' ){
        
        const dataIn={ 
            nombres: document.getElementById('Nombres').value,
            id: document.getElementById('id').value,
            tipoId: document.getElementById('TipoId').value,
            ingresaTto: document.getElementById('ingresaT').value,
            fechaGestionMedicamento: changeDateFormat(document.getElementById('FechaGM').value),
            fechaTAES: changeDateFormat(document.getElementById('FechaIT').value),
            ano: document.getElementById('ano').value,
            ipsDiagnostica: document.getElementById('ipsdiagnosticaEs').value,
            ipsContinua: document.getElementById('ipscontinuaES').value,
            Pais: document.getElementById('pasi').value,
            entidadTerritorial:document.getElementById('Entidadte').value ,
            municipioProcedencia: document.getElementById('Municipiope').value,
            sexo:document.getElementById('sexo').value,
            edad: document.getElementById('edad').value,
            uMedida: document.getElementById('UnidadM').value,
            pertenenciaEtnica: document.getElementById('PertenenciaE').value,
            puebloIndigena: document.getElementById('Puebloi').value,
            sector: document.getElementById('Sector').value,
            barrio: document.getElementById('SECTORLE').value,
            comuna: document.getElementById('Comuna').value,
            ocupacion: document.getElementById('ocupaciones').value,
            EAPB: document.getElementById('EAPBes').value,
            regimen: document.getElementById('Regimen').value,
            ubicacionGeografica: document.getElementById('UbicacionG').value,
            telefono: document.getElementById('telefono').value,
            direccion: document.getElementById('direccion').value,
            grupoPoblacional: document.getElementById('grupoPob').value,
            municipioNotifica: document.getElementById('MunicipionE').value,
            fechaInicioSintomas: changeDateFormat(document.getElementById('FechaIS').value),
            fechaDiagnostico: changeDateFormat(document.getElementById('fechaD').value),
            trimestre: document.getElementById('Trimestre').value,
            tipoTB: document.getElementById('tipotb').value,
            localizacionTB: document.getElementById('Localizacion').value,
            condicionIngreso: document.getElementById('Condicioni').value,
            ClasificacionTB: document.getElementById('calisificaciotb').value,
            otroosCriteriosMedicos: otros,
            DiagnosticoBK: document.getElementById('Diagnosticobas').value,
            fechaDiagnosticoBK: changeDateFormat(document.getElementById('fechaBAS').value),
            cultivoDiagnostico:document.getElementById('cultivoDiagnostico').value,
            fechacultivoDiagnostico: changeDateFormat(document.getElementById('fechac').value),
            pruebaMolecular: document.getElementById('pruebaMol').value,
            fechaPruebaMolecular: changeDateFormat(document.getElementById('fechapm').value),
            realizoAPVVIH: document.getElementById('realizoapv').value,
            realizoPruebaVIH: document.getElementById('Realizoprueba').value,
            resultadoPruebaVIH: document.getElementById('Resultadoprueba').value,
            FechaReporteVIH: changeDateFormat(document.getElementById('fecharepor').value),
            PruebaConfirmatoriaAcordeNormaVIH: document.getElementById('pruebacon').value,
            fechaDXPrevioActualVIH: changeDateFormat(document.getElementById('fecharedx').value),
            recibeTARVIH: document.getElementById('TAR').value,
            recibeTtoPreventivoVIH: document.getElementById('recibetto').value,
            coinfeccionPrevioVIH: document.getElementById('coinfecc').value,
            diagnosticoPrevioVIH: document.getElementById('Diagnosticovih').value,
            pruebasusceptibilidadFarmacoResitencia: document.getElementById('pruebasf').value,
            fechaReportePSF: changeDateFormat(document.getElementById('fechapsf').value),
            tipoFarmacoResistencia: document.getElementById('tipofar').value,
            resitenteA: document.getElementById('resisteneta').value,
            cooomorbilidad: document.getElementById('coomorbi').value,
            observacionesDiagnostico: document.getElementById('Observaciones').value,
            BK2Mes: document.getElementById('2do').value,
            fechaBk2: changeDateFormat(document.getElementById('fecha2do').value),
            BK4Mes: document.getElementById('4do').value,
            fechaBk4: changeDateFormat(document.getElementById('fecha4do').value),
            BK6Mes: document.getElementById('6do').value,
            fechaBk6: changeDateFormat(document.getElementById('fecha6do').value),
            BK9Mes: document.getElementById('9do').value,
            fechaBk9: changeDateFormat(document.getElementById('fecha9do').value),
            controlMedico2Mes: document.getElementById('medico2do').value,
            fechaControlMedico2Mes: changeDateFormat(document.getElementById('fechamedico2do').value),
            observacionesControlMedico2Mes: document.getElementById('observa2medico').value,
            controlMedico4Mes: document.getElementById('medico4do').value,
            fechaControlMedico4Mes:changeDateFormat(document.getElementById('fechamedico4do').value),
            observacionesControlMedico4Mes: document.getElementById('observa4medico').value,
            controlMedico6Mes: document.getElementById('medico6do').value,
            fechaControlMedico6Mes: changeDateFormat(document.getElementById('fechamedico6do').value),
            observacionesControlMedico6Mes: document.getElementById('observa6medico').value,
            controlEnfermeria1Mes: document.getElementById('enfermera1').value,
            fechaControlEnfermeria1Mes: changeDateFormat(document.getElementById('fechaenfermera1').value), 
            observacionesControlEnfermeria1Mes: document.getElementById('observa1enfermera').value,
            controlEnfermeria3Mes: document.getElementById('enfermera3do').value,
            fechaControlEnfermeria3Mes: changeDateFormat(document.getElementById('fechamedico3do').value),
            observacionesControlEnfermeria3Mes: document.getElementById('observa3enfermera').value,
            controlEnfermeria5Mes: document.getElementById('enfermera5do').value,
            fechaControlEnfermeria5Mes: changeDateFormat(document.getElementById('fechaenfermera5do').value),
            observacionesControlEnfermeria5Mes: document.getElementById('observa5enfermera').value,
            cultivoFinalTto: document.getElementById('cultfinaltto').value,
            fechaCultivoFinalTto: changeDateFormat(document.getElementById('fechacultivofinaltto').value),
            condicionEgreso: document.getElementById('condegreso').value,
            fechaCondicionEgreso: changeDateFormat(document.getElementById('fechaegreso').value),
            fechaFinalTto: changeDateFormat(document.getElementById('fechaFinaltto').value),
            observacionesControl: document.getElementById('observacionesControl').value,
            peso: document.getElementById('peso').value,
            talla: document.getElementById('talla').value,
            imc:document.getElementById('imc').value,
            semanaEpidemiologica: document.getElementById('semanaEpid').value,
            periodoEpidemiologico: document.getElementById('peridoepid').value,
            programasivigila: document.getElementById('progrmaaSivigila').value
        };
        
	    console.log(dataIn);
        const data=dataIn;
        console.log(usuario);
        let dataSend={ key: env.key,  token: usuario.token , id_registra:usuario.data.id, data };

        try {
            const respuesta = await fetch('../../../'+env.url_api+'servicios/registrarLibroPacientes.php', {
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
                alert('paciente registrado!..');
                location.reload();
                

            }else{
                alert('Error al registrar el paciente!..\n'+    resultado.ERROR)
            }

        } catch (error) {
            alert('Error en la petición:', error);
        }

     }else{
        alert('Ingrese Datos!')
     }

}

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
function controlarIndigenas() {
    const select1 = document.getElementById('PertenenciaE');
    const select2 = document.getElementById('Puebloi');

    if (select1.value === 'INDIGENA') {
        select2.disabled = false; // habilita
    } else {
        select2.disabled = true;  // deshabilita
        select2.value = '';       // opcional: limpia selección
    }
}
function controlarTipoTB() {
    const select1 = document.getElementById('tipotb');
    const select2 = document.getElementById('Localizacion');
    console.log(select1.value);

    if (select1.value === 'PULMONAR') {
        select2.disabled = false; // habilita
        document.getElementById('calisificaciotb').disabled= true;
        document.getElementById('calisificaciotb').value= '';
        select2.innerHTML=`<option></option><option value="LARINGEA">LARINGEA</option><option value="MILIAR">MILIAR</option><option value="PULMONAR">PULMONAR</option>`;
    } else if (select1.value === 'EXTRAPULMONAR') {
        document.getElementById('calisificaciotb').disabled= false;
        select2.disabled = false; // habilita
        select2.innerHTML=`<option></option><option value="CUTANEA">CUTANEA</option><option value="GANGLIONAR">GANGLIONAR</option><option value="GENITOURINARIA">GENITOURINARIA</option><option value="INTESTINAL">INTESTINAL</option><option value="MAMARIA">MAMARIA</option><option value="MENINGEA">MENINGEA</option><option value="OSTEOARTICULAR">OSTEOARTICULAR</option><option value="OTRO">OTRO</option><option value="PERICARDICA">PERICARDICA</option><option value="PERITONEAL">PERITONEAL</option><option value="PLEURAL">PLEURAL</option><option value="RENAL">RENAL</option>`;
    }else{

        document.getElementById('calisificaciotb').disabled= true;
        document.getElementById('calisificaciotb').value= '';
        select2.disabled = true;  // deshabilita
        select2.value = '';       // opcional: limpia selección
    }
}

function calcularIMC(va){
    //console.log(va);
    if(va=='0'){
        document.getElementById('imc').value= (document.getElementById('peso').value/(document.getElementById('talla').value*document.getElementById('talla').value)).toFixed(2);
    }else{
        document.getElementById('Mimc').value= (document.getElementById('Mpeso').value/(document.getElementById('Mtalla').value*document.getElementById('Mtalla').value)).toFixed(2);
    }
   
}
async function calcularTrimestre() {
    console.log('cslul');
    const input = document.getElementById('fechaD').value;

    if (!input) {
         
        return;
    }

    const fecha = new Date(input);
    const mes = fecha.getMonth() + 1; // 1 a 12
    const anio = fecha.getFullYear();

    let trimestre;
    if (mes <= 3) {
        trimestre = 1;
    } else if (mes <= 6) {
        trimestre = 2;
    } else if (mes <= 9) {
        trimestre = 3;
    } else {
        trimestre = 4;
    }

    document.getElementById('Trimestre').value=trimestre;
    document.getElementById('ano').value=anio; 
    const data={'ano':anio};
	let dataSend={ key: env.key,  token: usuario.token , id_registra:usuario.data.id, data };

	try {
		const respuesta = await fetch('../../../'+env.url_api+'servicios/numeroConsecutivo.php', {
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
                document.getElementById('Consecutivo').value=resultado.DATA[0].num;
            }else{
                
                document.getElementById('Consecutivo').value='001';
            } 
			 

		}else{
			alert('Error al registrar el usuario!..')
		}

	} catch (error) {
		alert('Error en la petición:', error);
	}


}
function changeDateFormat(inputDate){  // expects Y-m-d
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
//-----------LISTADO
async function listarLibro(){ 
    console.log(usuario);
    let dataSend={ key: env.key,  token: usuario.token , id_registra:usuario.data.id };
    console.log(dataSend);
    try {
        const respuesta = await fetch('../../../'+env.url_api+'servicios/listarLibroPacientes.php', {
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
function exportarExcel() {
    // 1. Seleccionar la tabla
    const tabla = document.querySelector("table");
    
    // 2. Convertir la tabla HTML a un libro de trabajo (Workbook)
    const wb = XLSX.utils.table_to_book(tabla, { sheet: "Libro de Pacientes" });
    
    // 3. Generar el nombre del archivo con la fecha actual
    const fecha = new Date().toISOString().slice(0, 10);
    const nombreArchivo = `Reporte_Pacientes_${fecha}.xlsx`;
    
    // 4. Descargar el archivo
    XLSX.writeFile(wb, nombreArchivo);
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