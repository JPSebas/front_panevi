var mostrarResultadoValidacion = true; // Variable para determinar si se debe mostrar el resultado de la validación
var nombreOk = false; // Variable para indicar si el nombre es válido
var apellidoOk = false; // Variable para indicar si el apellido es válido
var emailOk = false; // Variable para indicar si el email es válido
var telefonoOk = false; // Variable para indicar si el teléfono es válido
var passwordOk = false; // Variable para indicar si la contraseña es válida
var direccionOk = false; // Variable para indicar si la dirección es válida
var longitudMinimaTelefono = 7; // Longitud mínima requerida para el número de teléfono
var expRegNumeroEntero = /^-?[0-9]*$/; // Expresión regular para validar números enteros (positivos y negativos)
var expRegNumeroEnteroPositivo = /^[0-9]*$/; // Expresión regular para validar solo números enteros positivos
var expRegTxtNombre = /^[A-Z~-ÿ]{1}[~-ÿ\s\w\.\'-]{1,}$/i; // Expresión regular para validar nombres (inicia con letra)
var expRegTxtEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/; // Expresión regular para validar emails
var expRegTxtPassword = /^(?=.*[A-Za-z])(?=.*\d).{8,}$/; // Expresión regular para validar contraseñas (mínimo 8 caracteres)
var expRegTxtDireccion = /^.*$/; // Expresión regular para validar direcciones (cualquier texto)

// Función que cambia el color de fondo al recibir foco
function estiloINGRESO() {
    this.style.backgroundColor = "cyan"; // Cambia el fondo del elemento a color cian
}

// Función para aplicar estilo correcto al input y limpiar el mensaje de error
function estiloCORRECTO(inputElement, errorElement) {
    inputElement.style.background = 'transparent'; // Cambia el fondo del input a transparente
    if (errorElement) {
        errorElement.textContent = ''; // Limpia el mensaje de error si existe
    }
}

// Función para aplicar estilo incorrecto al input y mostrar el mensaje de error
function estiloINCORRECTO(inputElement, errorElement, errorMessage) {
    inputElement.style.backgroundColor = ""; // Restablece el color de fondo del input
    if (errorElement) {
        errorElement.textContent = errorMessage; // Muestra el mensaje de error en el elemento especificado
    }
}

// Función para validar el nombre
function validarNombre() {
    var objetoNombre = document.getElementById("nombre"); // Obtiene el elemento del DOM con ID "nombre"
    var errorElement = document.getElementById("error-nombre"); // Obtiene el elemento de error correspondiente
    if ((expRegTxtNombre.test(objetoNombre.value)) == true) { // Verifica si el nombre es válido
        nombreOk = true; // Marca el nombre como válido
        estiloCORRECTO(objetoNombre, errorElement); // Aplica el estilo correcto
    } else {
        nombreOk = false; // Marca el nombre como no válido
        estiloINCORRECTO(objetoNombre, errorElement, "El nombre debe comenzar con una letra y puede contener espacios, letras, números, puntos y guiones."); // Muestra el mensaje de error
    }
}

// Función para validar el apellido
function validarApellido() {
    var objetoApellido = document.getElementById("apellido"); // Obtiene el elemento del DOM con ID "apellido"
    var errorElement = document.getElementById("error-apellido"); // Obtiene el elemento de error correspondiente
    if ((expRegTxtNombre.test(objetoApellido.value)) == true) { // Verifica si el apellido es válido
        apellidoOk = true; // Marca el apellido como válido
        estiloCORRECTO(objetoApellido, errorElement); // Aplica el estilo correcto
    } else {
        apellidoOk = false; // Marca el apellido como no válido
        estiloINCORRECTO(objetoApellido, errorElement, "El apellido debe comenzar con una letra y puede contener espacios, letras, números, puntos y guiones."); // Muestra el mensaje de error
    }
}

// Función para validar el teléfono
function validarTelefono() {
    var objetoTelefono = document.getElementById("telefono"); // Obtiene el elemento del DOM con ID "telefono"
    var errorElement = document.getElementById("error-telefono"); // Obtiene el elemento de error correspondiente
    if ((objetoTelefono.value != '') && // Verifica que el teléfono no esté vacío
        (objetoTelefono.value.length >= longitudMinimaTelefono) && // Verifica que tenga la longitud mínima
        expRegNumeroEnteroPositivo.test(objetoTelefono.value)) { // Verifica que solo contenga números
        telefonoOk = true; // Marca el teléfono como válido
        estiloCORRECTO(objetoTelefono, errorElement); // Aplica el estilo correcto
    } else {
        telefonoOk = false; // Marca el teléfono como no válido
        estiloINCORRECTO(objetoTelefono, errorElement, "El teléfono debe contener al menos " + longitudMinimaTelefono + " dígitos y solo números."); // Muestra el mensaje de error
    }
}

// Función para validar el email
function validarEmail() {
    var objetoEmail = document.getElementById("email"); // Obtiene el elemento del DOM con ID "email"
    var errorElement = document.getElementById("error-email"); // Obtiene el elemento de error correspondiente
    var email = objetoEmail.value.toLowerCase(); // Convierte el email a minúsculas
    email = comprobarAtEmail(email); // Reemplaza ' at ' por '@' en el email
    if ((expRegTxtEmail.test(email)) == true) { // Verifica si el email es válido
        emailOk = true; // Marca el email como válido
        objetoEmail.value = email; // Asigna el email corregido al input
        estiloCORRECTO(objetoEmail, errorElement); // Aplica el estilo correcto
    } else {
        emailOk = false; // Marca el email como no válido
        estiloINCORRECTO(objetoEmail, errorElement, "El email debe ser válido, por ejemplo: usuario@dominio.com."); // Muestra el mensaje de error
    }
}

// Función para reemplazar ' at ' por '@' en el email
function comprobarAtEmail(email) {
    var expresion = /\sat\s/g; // Expresión regular para encontrar ' at '
    return email.replace(expresion, '@'); // Reemplaza ' at ' por '@'
}

// Función para validar la contraseña
function validarPassword() {
    var objetoPassword = document.getElementById("password"); // Obtiene el elemento del DOM con ID "password"
    var errorElement = document.getElementById("error-password"); // Obtiene el elemento de error correspondiente
    if ((expRegTxtPassword.test(objetoPassword.value)) == true) { // Verifica si la contraseña es válida
        passwordOk = true; // Marca la contraseña como válida
        estiloCORRECTO(objetoPassword, errorElement); // Aplica el estilo correcto
    } else {
        passwordOk = false; // Marca la contraseña como no válida
        estiloINCORRECTO(objetoPassword, errorElement, "La contraseña debe tener al menos 8 caracteres, incluyendo una letra, un número y un carácter especial."); // Muestra el mensaje de error
    }
}

// Función para validar la dirección
function validarDireccion() {
    var objetoDireccion = document.getElementById("direccion"); // Obtiene el elemento del DOM con ID "direccion"
    var errorElement = document.getElementById("error-direccion"); // Obtiene el elemento de error correspondiente
    if ((expRegTxtDireccion.test(objetoDireccion.value)) == true) { // Verifica si la dirección es válida
        direccionOk = true; // Marca la dirección como válida
        estiloCORRECTO(objetoDireccion, errorElement); // Aplica el estilo correcto
    } else {
        direccionOk = false; // Marca la dirección como no válida
        estiloINCORRECTO(objetoDireccion, errorElement, "La dirección debe ser válida, por ejemplo: Calle 123."); // Muestra el mensaje de error
    }
}

// Función para mostrar un mensaje de éxito y enviar el formulario después de 3 segundos
function mostrarMensajeExito() {
    var successMessage = document.getElementById("success-message"); // Obtiene el elemento del DOM para mostrar el mensaje de éxito
    successMessage.classList.add("show"); // Añade la clase 'show' para mostrar el mensaje
    setTimeout(function () {
        document.forms["miniformulario"].submit(); // Envía el formulario después de 3 segundos
    }, 3000);
}

// Función para validar todos los datos
function validarDatos() {
    validarNombre(); // Llama a la función para validar el nombre
    validarApellido(); // Llama a la función para validar el apellido
    validarEmail(); // Llama a la función para validar el email
    validarTelefono(); // Llama a la función para validar el teléfono
    validarPassword(); // Llama a la función para validar la contraseña
    validarDireccion(); // Llama a la función para validar la dirección

    // Verifica si todos los campos son válidos
    if (nombreOk && apellidoOk && emailOk && telefonoOk && passwordOk && direccionOk) {
        mostrarMensajeExito(); // Muestra el mensaje de éxito si todos los datos son válidos
        return false; // Prevenir el envío del formulario por defecto
    } else {
        return false; // Previene el envío del formulario si hay errores
    }
}

// Agrega un evento 'focus' para cambiar el estilo al recibir foco en los inputs
document.getElementById("nombre").addEventListener("focus", estiloINGRESO);
document.getElementById("apellido").addEventListener("focus", estiloINGRESO);
document.getElementById("email").addEventListener("focus", estiloINGRESO);
document.getElementById("telefono").addEventListener("focus", estiloINGRESO);
document.getElementById("password").addEventListener("focus", estiloINGRESO);
document.getElementById("direccion").addEventListener("focus", estiloINGRESO);

// Agrega un evento 'blur' para validar los inputs al perder el foco
document.getElementById("nombre").addEventListener("blur", validarNombre);
document.getElementById("apellido").addEventListener("blur", validarApellido);
document.getElementById("email").addEventListener("blur", validarEmail);
document.getElementById("telefono").addEventListener("blur", validarTelefono);
document.getElementById("password").addEventListener("blur", validarPassword);
document.getElementById("direccion").addEventListener("blur", validarDireccion);
