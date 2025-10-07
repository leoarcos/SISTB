let dptos=[], paises=[], mnpos=[];
document.addEventListener('DOMContentLoaded', () => {
    const menuItem = document.querySelector('.menu-item');
    const arrowIcon = menuItem.querySelector('.arrow-icon i'); // Seleccionar el ícono de flecha
    const submenu = menuItem.nextElementSibling; // Seleccionar el submenú

    if (menuItem) { // Verifica que el elemento existe antes de agregar el evento
        menuItem.addEventListener('click', (event) => {
            event.preventDefault(); // Evitar que el enlace navegue
            
            // Alternar la clase 'show' en el submenú
            submenu.classList.toggle('show');

            // Cambiar la dirección de la flecha
            if (submenu.classList.contains('show')) {
                arrowIcon.classList.add('active-arrow'); // Agregar la clase de rotación
            } else {
                arrowIcon.classList.remove('active-arrow'); // Quitar la clase de rotación
            }
        });
    } else {
        console.error('El elemento .menu-item no se encontró en el DOM.');
    }
});

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