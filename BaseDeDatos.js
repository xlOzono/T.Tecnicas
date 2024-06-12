// Abrir o crear una base de datos llamada "miBaseDeDatos" con versión 1
var solicitud = indexedDB.open('miBaseDeDatos', 1);

// Manejar la creación o actualización de la base de datos
solicitud.onupgradeneeded = function(evento) {
    var db = evento.target.result;

    // Crear un almacén de objetos llamado "miAlmacen"
    var almacen = db.createObjectStore('miAlmacen', {keyPath: 'id'});

    // Crear un índice llamado "indiceNombre" para buscar por el campo "nombre"
    almacen.createIndex('indiceNombre', 'nombre', {unique: false});
};

// Manejar la apertura exitosa de la base de datos
solicitud.onsuccess = function(evento) {
    var db = evento.target.result;

    // Realizar operaciones en la base de datos
    // Por ejemplo, añadir un objeto
    var transaccion = db.transaction(['miAlmacen'], 'readwrite');
    var almacen = transaccion.objectStore('miAlmacen');
    var objeto = {id: 1, nombre: 'Ejemplo'};
    var solicitud = almacen.add(objeto);

    // Manejar el resultado de la operación
    solicitud.onsuccess = function(evento) {
        console.log('Objeto añadido con éxito');
    };

    // Manejar errores
    solicitud.onerror = function(evento) {
        console.error('Error al añadir el objeto');
    };

    // Cerrar la transacción y la conexión a la base de datos
    transaccion.oncomplete = function(evento) {
        db.close();
    };
};

// Manejar errores en la apertura de la base de datos
solicitud.onerror = function(evento) {
    console.error('Error al abrir la base de datos');
};

