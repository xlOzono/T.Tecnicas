// Mostrar al hacer click
function selectMachine(name, description, state, imageUrl) {
   
    document.getElementById('machineName').textContent = name;
    document.getElementById('description').textContent = description;
    document.getElementById('state').textContent = state;
    
    const image = document.getElementById('machineImage');
    image.src = imageUrl;
    image.style.display = 'block';
}