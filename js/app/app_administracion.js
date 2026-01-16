let dptos=[], paises=[], mnpos=[], mnposNorte=[];
let env, usuario, usuarios;
$(function	()	{
	fetchData(); 
});
function calcularEdad(){ 
	const input = document.getElementById('fechanaci');
    console.log('Valor final:', input.value);
    const fechaNacimiento = new Date(input.value);
    const hoy = new Date();

    let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
    const mes = hoy.getMonth() - fechaNacimiento.getMonth();
    const dia = hoy.getDate() - fechaNacimiento.getDate();

    // Si aún no ha sido el cumpleaños este año, restamos 1
    if (mes < 0 || (mes === 0 && dia < 0)) {
        edad--;
    }	
	
    document.getElementById('edad').value = edad;
}
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
	//dptos
	try {
		const response = await fetch('../../json/dptos.json'); // Reemplaza con la ruta a tu archivo JSON
		
		if (!response.ok) {
		throw new Error('Error al cargar el archivo JSON'); // Manejo de errores si la respuesta no es ok
		}

		dptos = await response.json(); // Convierte la respuesta a JSON
    	console.log(dptos); // Aquí puedes trabajar con los datos JSON
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
		mnposNorte=mnpos.filter(dat => dat.cod_dptop=='54');
		console.log(mnposNorte);
		mnposNorte.forEach(u => {
			const option = document.createElement('option');
			option.value = u.cod_mnpo; // valor de la opción
			option.textContent = u.nombre_mnpo; // texto visible
			document.getElementById('mnpo').appendChild(option);
			const option2 = document.createElement('option');
			option2.value = u.cod_mnpo; // valor de la opción
			option2.textContent = u.nombre_mnpo; // texto visible 
			document.getElementById('Emnpo').appendChild(option2);
		});
	} catch (error) {
		console.error('Error DPTOS:', error); // Manejo de errores
	}
 
	let dat={ key: env.key, token: usuario.token , id_registra:usuario.data.id};
	

	try {
		const respuesta = await fetch('../../../'+env.url_api+'servicios/listarUsuarios.php', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json' // Indica que estás enviando JSON
		},
		body: JSON.stringify(dat)
		});

		if (!respuesta.ok) {
		throw new Error(`Error HTTP: ${respuesta.status}`);
		}

		const resultado = await respuesta.json(); // Si el servidor responde con JSON
		console.log('Respuesta del servidor:', resultado);
		usuarios=resultado.DATA;
		const tablaBody = document.getElementById('contUsuarios');
  		tablaBody.innerHTML = ''; // Limpiar tabla antes de insertar

		usuarios.forEach(item => {
			
			const fila = document.createElement('tr');
			
			// Ajusta estas columnas según tu estructura de datos
			fila.innerHTML = `
			<td>${item.nombres || ''}</td>
			<td>${item.identificacion || ''}</td>
			<td>${item.fechanacimiento || ''}</td>
			<td>${item.sexo || ''}</td>
			<td>${item.cargo || ''}</td>
			<td>${mnposNorte.filter(dat => dat.cod_mnpo==item.mnpo)[0].nombre_mnpo || ''}</td>
			<td><button href="#simpleModal" role="button" data-toggle="modal" class="btn btn-primary" onClick="cargarDatosModalEditar(${item.id})" >Ver / Editar</button></td>
			`;

			tablaBody.appendChild(fila);


		});
	} catch (error) {
		console.error('Error en la petición:', error);
	}
	//this.registrarUsuario();
}   
async function registrarUsuario(){
	const data={
		nonbres:document.getElementById('nonbres').value,
		apellidos:document.getElementById('apellidos').value,
		id:document.getElementById('id').value,
		sexo:document.getElementById('sexo').value,
		fechanaci:document.getElementById('fechanaci').value,
		edad:document.getElementById('edad').value,
		cargo:document.getElementById('cargo').value,
		mnpo:document.getElementById('mnpo').value,
		email:document.getElementById('email').value,
		numcontacto:document.getElementById('numcontacto').value,
		user:document.getElementById('email').value,
		pass:document.getElementById('pass').value,
		rol:document.getElementById('rol').value
	};
	console.log(data, env);
	 
	let dataSend={ key: env.key,  token: usuario.token , id_registra:usuario.data.id, data };

	try {
		const respuesta = await fetch('../../../'+env.url_api+'servicios/registrarUsuario.php', {
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
		if(resultado.STATUS=='OK' && parseInt(resultado.ID)>0){
			alert('usuario registrado!..');
			window.location.reload();

		}else{
			alert('Error al registrar el usuario!..')
		}

	} catch (error) {
		alert('Error en la petición:', error);
	}

}
async function cargarDatosModalEditar(data){
	console.log(data);
	const info=usuarios.filter(dat => dat.id==data)[0];
	console.log(info);
	document.getElementById('Enonbres').value=info.nombres;
	document.getElementById('Eapellidos').value=info.apellidos;
	document.getElementById('Eid').value=info.identificacion;
	document.getElementById('Esexo').value=info.sexo;
	document.getElementById('Efechanaci').value=info.fechanacimiento;
	//document.getElementById('Eedad').value=info.fechanacimiento;
	document.getElementById('Ecargo').value=info.cargo;
	document.getElementById('Emnpo').value=info.mnpo;
	document.getElementById('Eemail').value=info.correoelectronico;
	document.getElementById('Enumcontacto').value=info.numerocomunicacionusuario;
	document.getElementById('Eemail').value=info.correoelectronico;
	document.getElementById('Epass').value=info.contrasena;
	document.getElementById('Erol').value=info.tipousuario;
}