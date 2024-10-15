// Variable para mostrar el resultado de la validación
var mostrarResultadoValidacion = true;

// Variables para almacenar el estado de validación de cada campo
var nombreOk = false;
var apellidoOk = false;
var emailOk = false;
var telefonoOk = false;
var passwordOk = false;
var direccionOk = false;

// Longitud mínima requerida para el teléfono
var longitudMinimaTelefono = 7;

// Expresiones regulares para validar distintos tipos de entradas
var expRegNumeroEntero = /^-?[0-9]*$/; // Validar números enteros (positivos y negativos)
var expRegNumeroEnteroPositivo = /^[0-9]*$/; // Validar solo números enteros positivos
var expRegTxtNombre = /^[A-Z~-ÿ]{1}[~-ÿ\s\w\.\'-]{1,}$/i; // Validar nombres que comienzan con letra
var expRegTxtEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/; // Validar formato de correo electrónico
var expRegTxtPassword = /^(?=.*[A-Za-z])(?=.*\d).{8,}$/; // Validar contraseña (mínimo 8 caracteres, al menos una letra y un número)
var expRegTxtDireccion = /^.*$/; // Validar dirección (cualquier carácter)

// Función para cambiar el estilo de fondo al enfocarse en el campo de entrada
function estiloINGRESO() {
    this.style.backgroundColor = "cyan"; // Cambia el fondo a cian
}

// Función para aplicar estilo correcto a un campo de entrada
function estiloCORRECTO(inputElement, errorElement) {
    inputElement.style.background = 'transparent'; // Establece el fondo como transparente
    if (errorElement) {
        errorElement.textContent = ''; // Limpia el mensaje de error
    }
}

// Función para aplicar estilo incorrecto a un campo de entrada
function estiloINCORRECTO(inputElement, errorElement, errorMessage) {
    inputElement.style.backgroundColor = ""; // Reinicia el color de fondo
    if (errorElement) {
        errorElement.textContent = errorMessage; // Muestra el mensaje de error
    }
}

// Función para validar el nombre
function validarNombre() {
    var objetoNombre = document.getElementById("nombre"); // Obtiene el elemento del nombre
    var errorElement = document.getElementById("error-nombre"); // Obtiene el elemento para mostrar errores
    if ((expRegTxtNombre.test(objetoNombre.value)) == true) { // Valida el nombre con la expresión regular
        nombreOk = true; // Establece que el nombre es válido
        estiloCORRECTO(objetoNombre, errorElement); // Aplica el estilo correcto
    } else {
        nombreOk = false; // Establece que el nombre no es válido
        estiloINCORRECTO(objetoNombre, errorElement, "El nombre debe comenzar con una letra y puede contener espacios, letras, números, puntos y guiones."); // Muestra mensaje de error
    }
}

// Función para validar el apellido
function validarApellido() {
    var objetoApellido = document.getElementById("apellido"); // Obtiene el elemento del apellido
    var errorElement = document.getElementById("error-apellido"); // Obtiene el elemento para mostrar errores
    if ((expRegTxtNombre.test(objetoApellido.value)) == true) { // Valida el apellido con la expresión regular
        apellidoOk = true; // Establece que el apellido es válido
        estiloCORRECTO(objetoApellido, errorElement); // Aplica el estilo correcto
    } else {
        apellidoOk = false; // Establece que el apellido no es válido
        estiloINCORRECTO(objetoApellido, errorElement, "El apellido debe comenzar con una letra y puede contener espacios, letras, números, puntos y guiones."); // Muestra mensaje de error
    }
}

// Función para validar el teléfono
function validarTelefono() {
    var objetoTelefono = document.getElementById("telefono"); // Obtiene el elemento del teléfono
    var errorElement = document.getElementById("error-telefono"); // Obtiene el elemento para mostrar errores
    // Verifica que el teléfono no esté vacío, tenga la longitud mínima y sea un número positivo
    if ((objetoTelefono.value != '') &&
        (objetoTelefono.value.length >= longitudMinimaTelefono) &&
        expRegNumeroEnteroPositivo.test(objetoTelefono.value)) {
        telefonoOk = true; // Establece que el teléfono es válido
        estiloCORRECTO(objetoTelefono, errorElement); // Aplica el estilo correcto
    } else {
        telefonoOk = false; // Establece que el teléfono no es válido
        estiloINCORRECTO(objetoTelefono, errorElement, "El teléfono debe contener al menos " + longitudMinimaTelefono + " dígitos y solo números."); // Muestra mensaje de error
    }
}

// Función para validar el email
function validarEmail() {
    var objetoEmail = document.getElementById("email"); // Obtiene el elemento del email
    var errorElement = document.getElementById("error-email"); // Obtiene el elemento para mostrar errores
    var email = objetoEmail.value.toLowerCase(); // Convierte el email a minúsculas
    email = comprobarAtEmail(email); // Reemplaza 'at' por '@' en el email
    if ((expRegTxtEmail.test(email)) == true) { // Valida el email con la expresión regular
        emailOk = true; // Establece que el email es válido
        objetoEmail.value = email; // Actualiza el valor del email
        estiloCORRECTO(objetoEmail, errorElement); // Aplica el estilo correcto
    } else {
        emailOk = false; // Establece que el email no es válido
        estiloINCORRECTO(objetoEmail, errorElement, "El email debe ser válido, por ejemplo: usuario@dominio.com."); // Muestra mensaje de error
    }
}

// Función para reemplazar 'at' por '@' en el email
function comprobarAtEmail(email) {
    var expresion = /\sat\s/g; // Expresión regular para encontrar ' at '
    return email.replace(expresion, '@'); // Reemplaza ' at ' con '@'
}

// Función para validar la contraseña
function validarPassword() {
    var objetoPassword = document.getElementById("password"); // Obtiene el elemento de la contraseña
    var errorElement = document.getElementById("error-password"); // Obtiene el elemento para mostrar errores
    if ((expRegTxtPassword.test(objetoPassword.value)) == true) { // Valida la contraseña con la expresión regular
        passwordOk = true; // Establece que la contraseña es válida
        estiloCORRECTO(objetoPassword, errorElement); // Aplica el estilo correcto
    } else {
        passwordOk = false; // Establece que la contraseña no es válida
        estiloINCORRECTO(objetoPassword, errorElement, "La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra y un número."); // Muestra mensaje de error
    }
}

// Función para validar la dirección
function validarDireccion() {
    var objetoDireccion = document.getElementById("direccion"); // Obtiene el elemento de la dirección
    var errorElement = document.getElementById("error-direccion"); // Obtiene el elemento para mostrar errores
    if ((expRegTxtDireccion.test(objetoDireccion.value)) == true) { // Valida la dirección con la expresión regular
        direccionOk = true; // Establece que la dirección es válida
        estiloCORRECTO(objetoDireccion, errorElement); // Aplica el estilo correcto
    } else {
        direccionOk = false; // Establece que la dirección no es válida
        estiloINCORRECTO(objetoDireccion, errorElement, "La dirección debe ser válida, por ejemplo: Calle 123."); // Muestra mensaje de error
    }
}

// Función para mostrar un mensaje de éxito y enviar el formulario
function mostrarMensajeExito() {
    var successMessage = document.getElementById("success-message"); // Obtiene el elemento del mensaje de éxito
    successMessage.classList.add("show"); // Muestra el mensaje de éxito
    setTimeout(function() { // Espera 3 segundos antes de enviar el formulario
        document.forms["miniformulario"].submit(); // Envía el formulario
    }, 3000); 
}

// Función para validar todos los datos ingresados
function validarDatos() {
    // Llama a cada función de validación individualmente
    validarNombre();
    validarApellido();
    validarEmail();
    validarTelefono();
    validarPassword();
    validarDireccion();

    // Verifica si todos los campos son válidos
    if (nombreOk && apellidoOk && emailOk && telefonoOk && passwordOk && direccionOk) {
        mostrarMensajeExito(); // Muestra el mensaje de éxito
        return false; // Evita el envío inmediato del formulario
    } else {
        return false; // Retorna false si hay algún error de validación
    }
}

// Agrega un evento para cambiar el estilo al enfocarse en los campos de entrada
document.getElementById("nombre").addEventListener("focus", estiloINGRESO);
document.getElementById("apellido").addEventListener("focus", estiloINGRESO);
document.getElementById("email").addEventListener("focus", estiloINGRESO);
document.getElementById("telefono").addEventListener("focus", estiloINGRESO);
document.getElementById("password").addEventListener("focus", estiloINGRESO);
document.getElementById("direccion").addEventListener("focus", estiloINGRESO);

// Agrega eventos para validar los campos al perder el foco
document.getElementById("nombre").addEventListener("blur", validarNombre);
document.getElementById("apellido").addEventListener("blur", validarApellido);
document.getElementById("email").addEventListener("blur", validarEmail);
document.getElementById("telefono").addEventListener("blur", validarTelefono);
document.getElementById("password").addEventListener("blur", validarPassword);
document.getElementById("direccion").addEventListener("blur", validarDireccion);
