function calcularCalorias() {
    // Obtén los valores del formulario
    const edad = document.getElementById('edad').value;
    const peso = document.getElementById('peso').value;
    const altura = document.getElementById('altura').value;
    const actividad = document.getElementById('actividad').value;
    const grasaCorporal = document.getElementById('grasaCorporal').value || 0;
    const genero = document.querySelector('input[name="genero"]:checked').value;

    // Calcula el TMB (Tasa Metabólica Basal)
    let tmb;
    if (genero === 'Masculino') {
        tmb = 88.362 + (13.397 * peso) + (4.799 * altura) - (5.677 * edad);
    } else {
        tmb = 447.593 + (9.247 * peso) + (3.098 * altura) - (4.330 * edad);
    }

    // Ajusta el TMB según el nivel de actividad
    const maintenance = tmb * actividad;
    const deficit = maintenance - 500;
    const superavit = maintenance + 500;

    // Calcula los macronutrientes
    const proteina = peso * 2.2;
    const grasa = peso * 0.9;
    const carbohidratos = (maintenance - (proteina * 4 + grasa * 9)) / 4;

    // Muestra los resultados
    document.getElementById('maintenance').innerText = Math.round(maintenance);
    document.getElementById('deficit').innerText = Math.round(deficit);
    document.getElementById('superavit').innerText = Math.round(superavit);
    document.getElementById('proteina').innerText = Math.round(proteina);
    document.getElementById('grasa').innerText = Math.round(grasa);
    document.getElementById('carbohidratos').innerText = Math.round(carbohidratos);

    document.getElementById('results').style.display = 'block';
}
