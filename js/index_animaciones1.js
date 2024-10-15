// Selecciona el botón "siguiente" del DOM
const $next = document.querySelector('.next');
// Selecciona el botón "anterior" del DOM
const $prev = document.querySelector('.prev');
// Selecciona todos los elementos con la clase "item"
const items = document.querySelectorAll('.item');
// Inicializa el índice actual en 0
let currentIndex = 0;

// Función para mostrar la siguiente imagen
function showNextImage() {
    // Incrementa el índice actual, utilizando el módulo para reiniciar al principio si es necesario
    currentIndex = (currentIndex + 1) % items.length;
    // Agrega el elemento actual a la diapositiva (se muestra la siguiente imagen)
    document.querySelector('.slide').appendChild(items[currentIndex]);
}

// Función para mostrar la imagen anterior
function showPrevImage() {
    // Decrementa el índice actual, ajustándolo para que vuelva al final si es negativo
    currentIndex = (currentIndex - 1 + items.length) % items.length;
    // Añade el elemento actual al principio de la diapositiva (se muestra la imagen anterior)
    document.querySelector('.slide').prepend(items[currentIndex]);
}

// Agrega un evento de clic al botón "siguiente" que llama a la función showNextImage
$next.addEventListener('click', showNextImage);
// Agrega un evento de clic al botón "anterior" que llama a la función showPrevImage
$prev.addEventListener('click', showPrevImage);

// Configura un intervalo que llama a showNextImage cada 6000 milisegundos (6 segundos)
setInterval(showNextImage, 6000);
