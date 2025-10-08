let dptos=[], paises=[], mnpos=[];
 

$(function	()	{
	fetchData(); 
});

async function fetchData() {
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
	} catch (error) {
		console.error('Error DPTOS:', error); // Manejo de errores
	}
}   