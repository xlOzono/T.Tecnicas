// Ajustar la altura de las barras con JavaScript
function ajustarAlturas(actividades) {
    const numeros = actividades.split(',').map(Number); // Convertir la cadena de números en un array de números
    
    for (let i = 0; i < numeros.length && i < 18; i++) {
        const barra = document.querySelector('.bar' + (i + 1));
        if (barra) {
            barra.style.height = (numeros[i] * 5) + 'px'; // Multiplicar por 10 para escalar visualmente
        }
    }
}

// Mostrar al hacer click
function selectMachine(name, startDate, endDate, actividades, imageUrl) {
    document.getElementById('machineName').textContent = name;
    document.getElementById('startDate').textContent = startDate;
    document.getElementById('endDate').textContent = endDate;
    
    const image = document.getElementById('machineImage');
    image.src = imageUrl;
    image.style.display = 'block';

    ajustarAlturas(actividades); // Llamar a la función para ajustar las alturas de las barras
}