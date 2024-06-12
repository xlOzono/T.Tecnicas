document.getElementById('Login').addEventListener('click', function() {
    let usuarios = [
        { correo: "usuario1@example.com", contrasena: "contrasena1" },
        { correo: "usuario2@example.com", contrasena: "contrasena2" },
        { correo: "usuario3@example.com", contrasena: "contrasena3" }
    ];
    
    // Función para autenticar al usuario
    function autenticarUsuario(correo, contrasena) {
        // Buscar al usuario en la base de datos
        let usuario = usuarios.find(user => user.correo === correo);
    
        // Verificar si el usuario existe y la contraseña es correcta
        if (usuario && usuario.contrasena === contrasena) {
            return true; // Credenciales válidas
        } else {
            return false; // Credenciales inválidas
        }
    }
    
    // Ejemplo de uso
    let correo = document.getElementById('CorreoElectronico').value;
    let contrasena = document.getElementById('Contrasena').value;
    
    if (autenticarUsuario(correo, contrasena)) {
        alert('¡Inicio de sesión exitoso!')
        
    } else {
        alert('¡Inicio de sesión Fallido!')
    }
    document.getElementById('CorreoElectronico').value = "";
    document.getElementById('Contrasena').value = "";
    
});

function abrirRegistro() {
    // Crear un elemento div para la ventana modal
    var modal = document.createElement('div');
    modal.classList.add('modal');

    // Contenido de la ventana modal con el formulario
    modal.innerHTML = `
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Formulario de Registro</h2>
            <form id="registroForm">
                <label for="nombreNuevo">Nombre:</label>
                <input type="text" id="nombreNuevo" name="nombre" required><br><br>
                <label for="edadNuevo">Edad:</label>
                <input type="number" id="edadNuevo" name="edad" required><br><br>
                <label for="pesoNuevo">Peso:</label>
                <input type="number" id="pesoNuevo" name="peso" required><br><br>
                <label for="alturaNuevo">Altura:</label>
                <input type="number" id="alturaNuevo" name="altura" required><br><br>
                <label for="emailNuevo">Correo Electrónico:</label>
                <input type="email" id="emailNuevo" name="email" required><br><br>
                <label for="passwordNuevo">Contraseña:</label>
                <input type="password" id="passwordNuevo" name="password" required><br><br>
                <button type="submit">Registrar</button>
            </form>
        </div>
    `;

    // Agregar la ventana modal al body
    document.body.appendChild(modal);

    // Cerrar la ventana modal al hacer clic en la 'x'
    var closeButton = modal.querySelector('.close');
    closeButton.addEventListener('click', function() {
        modal.remove();
    });

    // Manejar el envío del formulario
    var registroForm = document.getElementById('registroForm');
    registroForm.addEventListener('submit', function(event) {
        event.preventDefault();

        // Obtener los datos del formulario
        var nombre = document.getElementById('nombreNuevo').value;
        var edad = document.getElementById('edadNuevo').value;
        var peso = document.getElementById('pesoNuevo').value;
        var altura = document.getElementById('alturaNuevo').value;
        var email = document.getElementById('emailNuevo').value;
        var password = document.getElementById('passwordNuevo').value;

        // Puedes hacer algo con los datos del formulario aquí
        console.log('Nombre:', nombre);
        console.log('Edad:', edad);
        console.log('Peso:', peso);
        console.log('Altura:', altura);
        console.log('Correo Electrónico:', email);
        console.log('Contraseña:', password);

        // Cerrar la ventana modal
        modal.remove();
    });
}

// Añadir el event listener al botón Registrar
document.getElementById('Registrar').addEventListener('click', function() {
    abrirRegistro();
});

document.getElementById('menu').addEventListener('click', function() {
    window.location.href = "https://www.youtube.com/watch?v=4EALtccIQ-U";

});