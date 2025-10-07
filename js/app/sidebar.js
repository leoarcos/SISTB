

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
