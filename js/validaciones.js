// Variable que controla si se debe mostrar el resultado de la validación
var mostrarResultadoValidacion = true;

// Variables que indican si cada campo de entrada es válido
var nombreOk = false;
var apellidoOk = false;
var emailOk = false;
var telefonoOk = false;
var passwordOk = false;
var direccionOk = false;

// Longitud mínima requerida para el campo de teléfono
var longitudMinimaTelefono = 7;

// Expresiones regulares para validar diferentes tipos de datos
var expRegNumeroEntero = /^-?[0-9]*$/; // Valida números enteros, positivos o negativos
var expRegNumeroEnteroPositivo = /^[0-9]*$/; // Valida números enteros positivos
var expRegTxtNombre = /^[A-Z~-ÿ]{1}[~-ÿ\s\w\.\'-]{1,}$/i; // Valida nombres que comienzan con una letra
var expRegTxtEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/; // Valida el formato de un email
var expRegTxtPassword = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/; // Valida contraseña con mínimo 8 caracteres, una letra, un número y un carácter especial
var expRegTxtDireccion = /^[a-zA-Z0-9\s,.'-]{3,}$/; // Valida direcciones con un mínimo de 3 caracteres

// Función que cambia el color de fondo del campo de entrada al recibir el foco
function estiloINGRESO() {
    this.style.backgroundColor = "cyan"; // Cambia el fondo a cyan
}

// Función para aplicar estilo correcto al campo de entrada
function estiloCORRECTO(inputElement, errorElement) {
    inputElement.style.background = 'transparent'; // Resetea el fondo a transparente
    if (errorElement) {
        errorElement.textContent = ''; // Limpia el mensaje de error si existe
    }
}

// Función para aplicar estilo incorrecto al campo de entrada y mostrar un mensaje de error
function estiloINCORRECTO(inputElement, errorElement, errorMessage) {
    inputElement.style.backgroundColor = ""; // Resetea el color de fondo
    if (errorElement) {
        errorElement.textContent = errorMessage; // Muestra el mensaje de error
    }
}

// Función para validar el campo de nombre
function validarNombre() {
    var objetoNombre = document.getElementById("nombre"); // Obtiene el elemento de nombre
    var errorElement = document.getElementById("error-nombre"); // Obtiene el elemento para mostrar errores
    // Verifica si el valor cumple con la expresión regular
    if ((expRegTxtNombre.test(objetoNombre.value)) == true) {
        nombreOk = true; // Marca como válido
        estiloCORRECTO(objetoNombre, errorElement); // Aplica estilo correcto
    } else {
        nombreOk = false; // Marca como no válido
        estiloINCORRECTO(objetoNombre, errorElement, "El nombre debe comenzar con una letra y puede contener espacios, letras, números, puntos y guiones."); // Aplica estilo incorrecto con mensaje
    }
}

// Función para validar el campo de apellido
function validarApellido() {
    var objetoApellido = document.getElementById("apellido"); // Obtiene el elemento de apellido
    var errorElement = document.getElementById("error-apellido"); // Obtiene el elemento para mostrar errores
    // Verifica si el valor cumple con la expresión regular
    if ((expRegTxtNombre.test(objetoApellido.value)) == true) {
        apellidoOk = true; // Marca como válido
        estiloCORRECTO(objetoApellido, errorElement); // Aplica estilo correcto
    } else {
        apellidoOk = false; // Marca como no válido
        estiloINCORRECTO(objetoApellido, errorElement, "El apellido debe comenzar con una letra y puede contener espacios, letras, números, puntos y guiones."); // Aplica estilo incorrecto con mensaje
    }
}

// Función para validar el campo de teléfono
function validarTelefono() {
    var objetoTelefono = document.getElementById("telefono"); // Obtiene el elemento de teléfono
    var errorElement = document.getElementById("error-telefono"); // Obtiene el elemento para mostrar errores
    // Verifica si el teléfono no está vacío, cumple con la longitud mínima y es un número positivo
    if ((objetoTelefono.value != '') &&
        (objetoTelefono.value.length >= longitudMinimaTelefono) &&
        expRegNumeroEnteroPositivo.test(objetoTelefono.value)) {
        telefonoOk = true; // Marca como válido
        estiloCORRECTO(objetoTelefono, errorElement); // Aplica estilo correcto
    } else {
        telefonoOk = false; // Marca como no válido
        estiloINCORRECTO(objetoTelefono, errorElement, "El teléfono debe contener al menos " + longitudMinimaTelefono + " dígitos y solo números."); // Aplica estilo incorrecto con mensaje
    }
}

// Función para validar el campo de email
function validarEmail() {
    var objetoEmail = document.getElementById("email"); // Obtiene el elemento de email
    var errorElement = document.getElementById("error-email"); // Obtiene el elemento para mostrar errores
    var email = objetoEmail.value.toLowerCase(); // Convierte el email a minúsculas
    email = comprobarAtEmail(email); // Llama a la función para corregir el símbolo '@'
    // Verifica si el email cumple con la expresión regular
    if ((expRegTxtEmail.test(email)) == true) {
        emailOk = true; // Marca como válido
        objetoEmail.value = email; // Actualiza el valor del email en minúsculas
        estiloCORRECTO(objetoEmail, errorElement); // Aplica estilo correcto
    } else {
        emailOk = false; // Marca como no válido
        estiloINCORRECTO(objetoEmail, errorElement, "El email debe ser válido, por ejemplo: usuario@dominio.com."); // Aplica estilo incorrecto con mensaje
    }
}

// Función para corregir el símbolo '@' en el email si fue ingresado como 'at'
function comprobarAtEmail(email) {
    var expresion = /\sat\s/g; // Expresión regular para buscar ' at '
    return email.replace(expresion, '@'); // Reemplaza ' at ' con '@'
}

// Función para validar el campo de contraseña
function validarPassword() {
    var objetoPassword = document.getElementById("password"); // Obtiene el elemento de contraseña
    var errorElement = document.getElementById("error-password"); // Obtiene el elemento para mostrar errores
    // Verifica si la contraseña cumple con la expresión regular
    if ((expRegTxtPassword.test(objetoPassword.value)) == true) {
        passwordOk = true; // Marca como válido
        estiloCORRECTO(objetoPassword, errorElement); // Aplica estilo correcto
    } else {
        passwordOk = false; // Marca como no válido
        estiloINCORRECTO(objetoPassword, errorElement, "La contraseña debe tener al menos 8 caracteres, incluyendo una letra, un número y un carácter especial."); // Aplica estilo incorrecto con mensaje
    }
}

// Función para validar el campo de dirección
function validarDireccion() {
    var objetoDireccion = document.getElementById("direccion"); // Obtiene el elemento de dirección
    var errorElement = document.getElementById("error-direccion"); // Obtiene el elemento para mostrar errores
    // Verifica si la dirección cumple con la expresión regular
    if ((expRegTxtDireccion.test(objetoDireccion.value)) == true) {
        direccionOk = true; // Marca como válido
        estiloCORRECTO(objetoDireccion, errorElement); // Aplica estilo correcto
    } else {
        direccionOk = false; // Marca como no válido
        estiloINCORRECTO(objetoDireccion, errorElement, "La dirección debe ser válida, por ejemplo: Calle 123."); // Aplica estilo incorrecto con mensaje
    }
}

// Función para mostrar un mensaje de éxito y enviar el formulario después de un tiempo
function mostrarMensajeExito() {
    var successMessage = document.getElementById("success-message"); // Obtiene el elemento para mostrar el mensaje de éxito
    successMessage.classList.add("show"); // Agrega la clase para mostrar el mensaje
    // Envía el formulario después de 3 segundos
    setTimeout(function () {
        document.forms["miniformulario"].submit(); // Envía el formulario llamado "miniformulario"
    }, 3000);
}

// Función que valida todos los datos
function validarDatos() {
    validarNombre(); // Valida el nombre
    validarApellido(); // Valida el apellido
    validarEmail(); // Valida el email
    validarTelefono(); // Valida el teléfono
    validarPassword(); // Valida la contraseña
    validarDireccion(); // Valida la dirección

    // Verifica si todos los campos son válidos
    if (nombreOk && apellidoOk && emailOk && telefonoOk && passwordOk && direccionOk) {
        mostrarMensajeExito(); // Muestra el mensaje de éxito si todo es válido
        return false; // Evita el envío del formulario por defecto
    } else {
        return false; // Evita el envío del formulario si hay errores
    }
}

// Agrega eventos para cambiar el estilo al recibir foco en cada campo
document.getElementById("nombre").addEventListener("focus", estiloINGRESO);
document.getElementById("apellido").addEventListener("focus", estiloINGRESO);
document.getElementById("email").addEventListener("focus", estiloINGRESO);
document.getElementById("telefono").addEventListener("focus", estiloINGRESO);
document.getElementById("password").addEventListener("focus", estiloINGRESO);
document.getElementById("direccion").addEventListener("focus", estiloINGRESO);

// Agrega eventos para validar cada campo al perder el foco
document.getElementById("nombre").addEventListener("blur", validarNombre);
document.getElementById("apellido").addEventListener("blur", validarApellido);
document.getElementById("email").addEventListener("blur", validarEmail);
document.getElementById("telefono").addEventListener("blur", validarTelefono);
document.getElementById("password").addEventListener("blur", validarPassword);
document.getElementById("direccion").addEventListener("blur", validarDireccion);
