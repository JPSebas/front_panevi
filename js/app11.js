var carritoVisible = false; // Variable que indica si el carrito es visible o no.

if (document.readyState == 'loading') {
    // Si el documento se está cargando, se agrega un listener para ejecutar la función 'ready' cuando esté listo.
    document.addEventListener('DOMContentLoaded', ready)
} else {
    // Si el documento ya está cargado, ejecuta la función 'ready' inmediatamente.
    ready();
}

function ready() {
    // Función que se ejecuta cuando el documento está listo.

    var botonesEliminarItem = document.getElementsByClassName('btn-eliminar'); // Obtiene todos los botones de eliminar.
    for (var i = 0; i < botonesEliminarItem.length; i++) {
        var button = botonesEliminarItem[i];
        button.addEventListener('click', eliminarItemCarrito); // Agrega un evento para eliminar el item del carrito.
    }

    var botonesSumarCantidad = document.getElementsByClassName('sumar-cantidad'); // Obtiene todos los botones para sumar cantidad.
    for (var i = 0; i < botonesSumarCantidad.length; i++) {
        var button = botonesSumarCantidad[i];
        button.addEventListener('click', sumarCantidad); // Agrega un evento para sumar cantidad del item.
    }

    var botonesRestarCantidad = document.getElementsByClassName('restar-cantidad'); // Obtiene todos los botones para restar cantidad.
    for (var i = 0; i < botonesRestarCantidad.length; i++) {
        var button = botonesRestarCantidad[i];
        button.addEventListener('click', restarCantidad); // Agrega un evento para restar cantidad del item.
    }

    var botonesAgregarAlCarrito = document.getElementsByClassName('boton-item'); // Obtiene todos los botones para agregar items al carrito.
    for (var i = 0; i < botonesAgregarAlCarrito.length; i++) {
        var button = botonesAgregarAlCarrito[i];
        button.addEventListener('click', agregarAlCarritoClicked); // Agrega un evento para manejar el clic en agregar al carrito.
    }

    document.getElementsByClassName('btn-pagar')[0].addEventListener('click', pagarClicked); // Agrega un evento para manejar el clic en el botón de pagar.
}

function pagarClicked() {
    // Función que se ejecuta al hacer clic en el botón de pagar.

    var alerta = document.getElementById('alerta-compra'); // Obtiene el elemento de alerta.
    alerta.classList.remove('oculto'); // Muestra la alerta.

    setTimeout(function () {
        alerta.classList.add('oculto'); // Oculta la alerta después de 9 segundos.
    }, 9000);

    document.querySelector('.btn-cerrar-alerta').addEventListener('click', function () {
        alerta.classList.add('oculto'); // Permite cerrar la alerta manualmente.
    });

    var carritoItems = document.getElementsByClassName('carrito-items')[0]; // Obtiene la lista de items del carrito.
    while (carritoItems.hasChildNodes()) {
        // Elimina todos los items del carrito.
        carritoItems.removeChild(carritoItems.firstChild);
    }
    actualizarTotalCarrito(); // Actualiza el total del carrito después de eliminar items.
    ocultarCarrito(); // Oculta el carrito si no hay items.
}

function agregarAlCarritoClicked(event) {
    // Función que se ejecuta al hacer clic en agregar un item al carrito.

    var button = event.target; // Obtiene el botón que fue clickeado.
    var item = button.parentElement; // Obtiene el elemento padre (el contenedor del item).
    var titulo = item.getElementsByClassName('titulo-item')[0].innerText; // Obtiene el título del item.
    var precio = item.getElementsByClassName('precio-item')[0].innerText; // Obtiene el precio del item.
    var imagenSrc = item.getElementsByClassName('img-item')[0].src; // Obtiene la fuente de la imagen del item.
    console.log(imagenSrc); // Muestra la imagen en la consola.

    agregarItemAlCarrito(titulo, precio, imagenSrc); // Llama a la función para agregar el item al carrito.

    hacerVisibleCarrito(); // Hace visible el carrito si no lo está.
}

function hacerVisibleCarrito() {
    // Función que hace visible el carrito.

    carritoVisible = true; // Cambia el estado de la variable a visible.
    var carrito = document.getElementsByClassName('carrito')[0]; // Obtiene el contenedor del carrito.
    carrito.style.marginRight = '0'; // Ajusta el margen del carrito para hacerlo visible.
    carrito.style.opacity = '1'; // Ajusta la opacidad del carrito para hacerlo visible.

    var items = document.getElementsByClassName('contenedor-items')[0]; // Obtiene el contenedor de items.
    items.style.width = '60%'; // Ajusta el ancho del contenedor de items.
}

function agregarItemAlCarrito(titulo, precio, imagenSrc) {
    // Función que agrega un item al carrito.

    var item = document.createElement('div'); // Crea un nuevo div para el item.
    item.classList.add = ('item'); // (Error aquí, debería ser `item.classList.add('item');`) - Agrega la clase 'item' al nuevo div.
    var itemsCarrito = document.getElementsByClassName('carrito-items')[0]; // Obtiene la lista de items en el carrito.

    var nombresItemsCarrito = itemsCarrito.getElementsByClassName('carrito-item-titulo'); // Obtiene todos los títulos de items en el carrito.
    for (var i = 0; i < nombresItemsCarrito.length; i++) {
        if (nombresItemsCarrito[i].innerText == titulo) {
            return; // Si el item ya está en el carrito, no lo agrega de nuevo.
        }
    }

    // Contenido HTML del nuevo item en el carrito.
    var itemCarritoContenido = `
        <div class="carrito-item">
            <img src="${imagenSrc}" width="80px" alt="">
            <div class="carrito-item-detalles">
                <span class="carrito-item-titulo">${titulo}</span>
                <div class="selector-cantidad">
                    <i class="fa-solid fa-minus restar-cantidad"></i> <!-- Icono para restar cantidad -->
                    <input type="text" value="1" class="carrito-item-cantidad" disabled> <!-- Campo que muestra la cantidad (no editable) -->
                    <i class="fa-solid fa-plus sumar-cantidad"></i> <!-- Icono para sumar cantidad -->
                </div>
                <span class="carrito-item-precio">${precio}</span> <!-- Muestra el precio del item en el carrito -->
            </div>
            <button class="btn-eliminar"> <!-- Botón para eliminar el item del carrito -->
                <i class="fa-solid fa-trash"></i> <!-- Icono de papelera -->
            </button>
        </div>
    `
    item.innerHTML = itemCarritoContenido; // Inserta el contenido HTML en el nuevo div.
    itemsCarrito.append(item); // Agrega el nuevo item a la lista de items en el carrito.

    // Agrega eventos a los elementos del nuevo item.
    item.getElementsByClassName('btn-eliminar')[0].addEventListener('click', eliminarItemCarrito);

    var botonRestarCantidad = item.getElementsByClassName('restar-cantidad')[0];
    botonRestarCantidad.addEventListener('click', restarCantidad); // Agrega evento para restar cantidad.

    var botonSumarCantidad = item.getElementsByClassName('sumar-cantidad')[0];
    botonSumarCantidad.addEventListener('click', sumarCantidad); // Agrega evento para sumar cantidad.

    actualizarTotalCarrito(); // Actualiza el total del carrito después de agregar el nuevo item.
}

function sumarCantidad(event) {
    // Función que se ejecuta al hacer clic en sumar cantidad de un item.

    var buttonClicked = event.target; // Obtiene el botón que fue clickeado.
    var selector = buttonClicked.parentElement; // Obtiene el contenedor del selector de cantidad.
    console.log(selector.getElementsByClassName('carrito-item-cantidad')[0].value); // Muestra la cantidad actual en la consola.

    var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0].value; // Obtiene la cantidad actual.
    cantidadActual++; // Incrementa la cantidad.
    selector.getElementsByClassName('carrito-item-cantidad')[0].value = cantidadActual; // Actualiza el campo de cantidad.
    actualizarTotalCarrito(); // Actualiza el total del carrito.
}

function restarCantidad(event) {
    // Función que se ejecuta al hacer clic en restar cantidad de un item.

    var buttonClicked = event.target; // Obtiene el botón que fue clickeado.
    var selector = buttonClicked.parentElement; // Obtiene el contenedor del selector de cantidad.
    console.log(selector.getElementsByClassName('carrito-item-cantidad')[0].value); // Muestra la cantidad actual en la consola.

    var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0].value; // Obtiene la cantidad actual.
    cantidadActual--; // Decrementa la cantidad.
    if (cantidadActual >= 1) { // Si la cantidad es mayor o igual a 1
        selector.getElementsByClassName('carrito-item-cantidad')[0].value = cantidadActual; // Actualiza el campo de cantidad.
        actualizarTotalCarrito(); // Actualiza el total del carrito.
    }
}

function eliminarItemCarrito(event) {
    // Función que se ejecuta al hacer clic en eliminar un item del carrito.

    var buttonClicked = event.target; // Obtiene el botón que fue clickeado.
    buttonClicked.parentElement.parentElement.remove(); // Elimina el item del carrito.
    actualizarTotalCarrito(); // Actualiza el total del carrito después de eliminar el item.

    ocultarCarrito(); // Oculta el carrito si no hay items.
}

function ocultarCarrito() {
    // Función que oculta el carrito si está vacío.

    var carritoItems = document.getElementsByClassName('carrito-items')[0]; // Obtiene la lista de items del carrito.
    if (carritoItems.childElementCount == 0) { // Si no hay items en el carrito
        var carrito = document.getElementsByClassName('carrito')[0]; // Obtiene el contenedor del carrito.
        carrito.style.marginRight = '-100%'; // Ajusta el margen para ocultar el carrito.
        carrito.style.opacity = '0'; // Cambia la opacidad a 0 para ocultar el carrito.
        carritoVisible = false; // Cambia el estado de la variable a no visible.

        var items = document.getElementsByClassName('contenedor-items')[0]; // Obtiene el contenedor de items.
        items.style.width = '100%'; // Ajusta el ancho del contenedor de items.
    }
}

function actualizarTotalCarrito() {
    // Función que actualiza el total del carrito.

    var carritoContenedor = document.getElementsByClassName('carrito')[0]; // Obtiene el contenedor del carrito.
    var carritoItems = carritoContenedor.getElementsByClassName('carrito-item'); // Obtiene todos los items del carrito.
    var total = 0; // Inicializa el total en 0.
    for (var i = 0; i < carritoItems.length; i++) { // Itera sobre cada item del carrito.
        var item = carritoItems[i]; // Obtiene el item actual.
        var precioElemento = item.getElementsByClassName('carrito-item-precio')[0]; // Obtiene el elemento de precio del item.
        var precio = parseFloat(precioElemento.innerText.replace('$', '').replace('.', '')); // Convierte el precio a número.
        var cantidadItem = item.getElementsByClassName('carrito-item-cantidad')[0]; // Obtiene la cantidad del item.
        console.log(precio); // Muestra el precio en la consola.
        var cantidad = cantidadItem.value; // Obtiene el valor de cantidad.
        total = total + (precio * cantidad); // Suma el precio del item por su cantidad al total.
    }
    total = Math.round(total * 100) / 100; // Redondea el total a dos decimales.

    document.getElementsByClassName('carrito-precio-total')[0].innerText = '$' + total.toLocaleString("es") + ",00"; // Muestra el total en el contenedor del carrito.
}
