let dptos=[], paises=[], mnpos=[];


$(function	()	{

	$("#menuHome").removeClass('active');
	$("#menuLibro").removeClass('active');
	$("#menuSintomaticos").removeClass('active');
	$("#menuResistentes").removeClass('active');
	$("#menuFarmacia").removeClass('active');
	$("#menuInformes").removeClass('active');
	$("#menuAdmin").removeClass('active'); 

	$("#menuQuimioprofilaxis").addClass('active');
    const puebloIndigena = document.getElementById('puebloIndigena'); 

    if (puebloIndigena) {
        puebloIndigena.disabled = true;
        puebloIndigena.value = '';
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
			(document.getElementById('IpsIniciaMnjo'))? document.getElementById('IpsIniciaMnjo').appendChild(option):'';
  			const optionClone = option.cloneNode(true); // Clonamos el nodo

			//document.getElementById('listaIps2').appendChild(optionClone);
			
			(document.getElementById('IpscontinuaMnjo'))? document.getElementById('IpscontinuaMnjo').appendChild(optionClone):'';	 
			 
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
			
			(document.getElementById('puebloIndigena'))? document.getElementById('puebloIndigena').appendChild(option):'';
				 
			 
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
			 
			(document.getElementById('dpto'))? document.getElementById('dpto').appendChild(option):'';
  			 	 
			 
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
    
   // listarLibro(); 
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
    const select1 = document.getElementById('etnia');
    const select2 = document.getElementById('puebloIndigena');

    if (select1.value === 'INDIGENA') {
        select2.disabled = false; // habilita
    } else {
        select2.disabled = true;  // deshabilita
        select2.value = '';       // opcional: limpia selección
    }
}