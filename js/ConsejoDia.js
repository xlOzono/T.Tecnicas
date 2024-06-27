var diccionario = {
    1: "Incluye una variedad de alimentos en tu dieta, como frutas, verduras, granos enteros, proteínas magras y grasas saludables.",
    2: "Bebe suficiente agua durante el día para mantener tu cuerpo hidratado y ayudar a la digestión y el funcionamiento adecuado de los órganos.",
    3: "Realiza actividad física de forma regular, como caminar, correr, nadar o practicar deportes, para fortalecer tu corazón y mejorar tu salud general.",
    4: "Duerme al menos 7-8 horas por noche para permitir que tu cuerpo se recupere y recargue energías para el día siguiente.",
    5: "Practica técnicas de manejo del estrés, como la meditación, el yoga o la respiración profunda, para reducir el impacto negativo del estrés en tu salud.",
    6: "Mantén un peso saludable a través de una dieta equilibrada y ejercicio regular para reducir el riesgo de enfermedades crónicas como la diabetes y la hipertensión.",
    7: "Protege tu piel del sol usando protector solar y ropa adecuada, y mantén una rutina de cuidado de la piel para prevenir el envejecimiento prematuro y el cáncer de piel.",
    8: "Cuida tu salud mental practicando la gratitud, la autoaceptación y buscando apoyo cuando sea necesario.",
    9: "Programa chequeos médicos regulares para detectar y tratar cualquier problema de salud de manera temprana."
};
function mostrarConsejoAleatorio() {
    var numeroAleatorio = Math.floor(Math.random() * 9) + 1;
    var consejoAleatorio = diccionario[numeroAleatorio];
    document.getElementById("consejo").textContent = consejoAleatorio;
}