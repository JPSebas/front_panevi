var carritoVisible = false; // Indica si el carrito está visible o no

let carrito = []; // Arreglo para almacenar los productos del carrito

// Verifica si el documento ha terminado de cargar
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready) // Ejecuta la función 'ready' cuando la página esté completamente cargada
} else {
    ready(); // Si ya cargó, llama inmediatamente a la función 'ready'
}

// Función que se ejecuta cuando la página está lista
function ready() {

    // Asigna el evento de eliminar a cada botón con clase 'btn-eliminar'
    var botonesEliminarItem = document.getElementsByClassName('btn-eliminar');
    for (var i = 0; i < botonesEliminarItem.length; i++) {
        var button = botonesEliminarItem[i];
        button.addEventListener('click', eliminarItemCarrito); // Elimina un producto al hacer clic
    }

    // Asigna el evento para aumentar la cantidad a los botones correspondientes
    var botonesSumarCantidad = document.getElementsByClassName('sumar-cantidad');
    for (var i = 0; i < botonesSumarCantidad.length; i++) {
        var button = botonesSumarCantidad[i];
        button.addEventListener('click', sumarCantidad); // Aumenta la cantidad al hacer clic
    }

    // Asigna el evento para reducir la cantidad a los botones correspondientes
    var botonesRestarCantidad = document.getElementsByClassName('restar-cantidad');
    for (var i = 0; i < botonesRestarCantidad.length; i++) {
        var button = botonesRestarCantidad[i];
        button.addEventListener('click', restarCantidad); // Reduce la cantidad al hacer clic
    }

    // Asigna el evento para agregar productos al carrito
    var botonesAgregarAlCarrito = document.getElementsByClassName('boton-item');
    for (var i = 0; i < botonesAgregarAlCarrito.length; i++) {
        var button = botonesAgregarAlCarrito[i];
        button.addEventListener('click', agregarAlCarritoClicked); // Agrega un producto al carrito
    }

    // Asigna el evento para procesar el pago
    document.getElementsByClassName('btn-pagar')[0].addEventListener('click', pagarClicked)
}

// Función para procesar el pago
function pagarClicked() {
    const form = document.createElement('form'); // Crea un formulario para enviar los datos
    form.method = 'POST'; // Establece el método POST
    form.action = 'resumen_compra.php'; // Define la ruta de destino del formulario

    const input = document.createElement('input'); // Crea un campo oculto con los datos del carrito
    input.type = 'hidden';
    input.name = 'carrito';
    input.value = JSON.stringify(getCartItems()); // Convierte los datos del carrito en JSON

    form.appendChild(input); // Agrega el campo oculto al formulario
    document.body.appendChild(form); // Agrega el formulario al cuerpo del documento

    form.submit(); // Envía el formulario
}

// Obtiene los datos actuales del carrito
function getCartItems() {
    var carritoItems = [];
    var items = document.getElementsByClassName('carrito-item');
    for (var i = 0; i < items.length; i++) {
        var item = items[i];
        var id = item.getElementsByClassName('carrito-item-id')[0].innerText; // Obtiene el ID del producto
        var titulo = item.getElementsByClassName('carrito-item-titulo')[0].innerText; // Obtiene el título
        var precio = parseFloat(item.getElementsByClassName('carrito-item-precio')[0].innerText.replace('$', '').replace('.', '')); // Obtiene el precio
        var cantidad = parseInt(item.getElementsByClassName('carrito-item-cantidad')[0].value); // Obtiene la cantidad
        carritoItems.push({ id: id, titulo: titulo, precio: precio, cantidad: cantidad }); // Agrega el producto al arreglo
    }
    return carritoItems;
}

// Maneja el evento de agregar un producto al carrito
function agregarAlCarritoClicked(event) {
    var button = event.target;
    var item = button.parentElement;
    var id = item.getElementsByClassName('id-item')[0].innerText; // Obtiene el ID del producto
    var titulo = item.getElementsByClassName('titulo-item')[0].innerText; // Obtiene el título
    var precio = item.getElementsByClassName('precio-item')[0].innerText; // Obtiene el precio
    var imagenSrc = item.getElementsByClassName('img-item')[0].src; // Obtiene la ruta de la imagen

    agregarItemAlCarrito(id, titulo, precio, imagenSrc); // Agrega el producto al carrito

    hacerVisibleCarrito(); // Muestra el carrito
}

// Muestra el carrito en pantalla
function hacerVisibleCarrito() {
    carritoVisible = true;
    var carrito = document.getElementsByClassName('carrito')[0];
    carrito.style.marginRight = '0';
    carrito.style.opacity = '1';

    var items = document.getElementsByClassName('contenedor-items')[0];
    items.style.width = '60%';
}

// Agrega un producto al carrito
function agregarItemAlCarrito(id, titulo, precio, imagenSrc) {
    var item = document.createElement('div');
    item.classList.add = ('item');
    var itemsCarrito = document.getElementsByClassName('carrito-items')[0];

    // Verifica si el producto ya está en el carrito
    var nombresItemsCarrito = itemsCarrito.getElementsByClassName('carrito-item-titulo');
    for (var i = 0; i < nombresItemsCarrito.length; i++) {
        if (nombresItemsCarrito[i].innerText == titulo) {
            return; // Si ya está, no lo agrega de nuevo
        }
    }

    // Contenido del producto en el carrito
    var itemCarritoContenido = `
<div class="carrito-item">
    <img src="${imagenSrc}" width="80px" alt="">
    <div class="carrito-item-detalles">
        <span class="carrito-item-id oculto">${id}</span>
        <span class="carrito-item-titulo">${titulo}</span>
        <div class="selector-cantidad">
            <i class="fa-solid fa-minus restar-cantidad"></i>
            <input type="text" value="1" class="carrito-item-cantidad" disabled>
            <i class="fa-solid fa-plus sumar-cantidad"></i>
        </div>
        <span class="carrito-item-precio">${precio}</span>
    </div>
    <button class="btn-eliminar">
        <i class="fa-solid fa-trash"></i>
    </button>
</div>
`
    item.innerHTML = itemCarritoContenido;
    itemsCarrito.append(item); // Agrega el producto al carrito

    // Asigna eventos a los botones del producto
    item.getElementsByClassName('btn-eliminar')[0].addEventListener('click', eliminarItemCarrito);
    item.getElementsByClassName('restar-cantidad')[0].addEventListener('click', restarCantidad);
    item.getElementsByClassName('sumar-cantidad')[0].addEventListener('click', sumarCantidad);

    actualizarTotalCarrito(); // Actualiza el total
}

// Aumenta la cantidad de un producto
function sumarCantidad(event) {
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;
    var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0].value;
    cantidadActual++;
    selector.getElementsByClassName('carrito-item-cantidad')[0].value = cantidadActual;
    actualizarTotalCarrito(); // Actualiza el total
}

// Reduce la cantidad de un producto
function restarCantidad(event) {
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;
    var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0].value;
    cantidadActual--;
    if (cantidadActual >= 1) {
        selector.getElementsByClassName('carrito-item-cantidad')[0].value = cantidadActual;
        actualizarTotalCarrito(); // Actualiza el total
    }
}

// Elimina un producto del carrito
function eliminarItemCarrito(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.remove(); // Elimina el elemento del DOM
    actualizarTotalCarrito(); // Actualiza el total

    ocultarCarrito(); // Oculta el carrito si no hay productos
}

// Oculta el carrito si está vacío
function ocultarCarrito() {
    var carritoItems = document.getElementsByClassName('carrito-items')[0];
    if (carritoItems.childElementCount == 0) {
        var carrito = document.getElementsByClassName('carrito')[0];
        carrito.style.marginRight = '-100%';
        carrito.style.opacity = '0';
        carritoVisible = false;

        var items = document.getElementsByClassName('contenedor-items')[0];
        items.style.width = '100%';
    }
}

// Actualiza el total del carrito
function actualizarTotalCarrito() {
    var carritoContenedor = document.getElementsByClassName('carrito')[0];
    var carritoItems = carritoContenedor.getElementsByClassName('carrito-item');
    var total = 0;

    // Calcula el total sumando el precio por la cantidad de cada producto
    for (var i = 0; i < carritoItems.length; i++) {
        var item = carritoItems[i];
        var precioElemento = item.getElementsByClassName('carrito-item-precio')[0];
        var precio = parseFloat(precioElemento.innerText.replace('$', '').replace('.', ''));
        var cantidadItem = item.getElementsByClassName('carrito-item-cantidad')[0];
        var cantidad = cantidadItem.value;
        total = total + (precio * cantidad);
    }
    total = Math.round(total * 100) / 100; // Redondea el total a dos decimales

    document.getElementsByClassName('carrito-precio-total')[0].innerText = '$' + total.toLocaleString("es") + ",00"; // Muestra el total
}
