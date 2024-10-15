(function() {  // Inicio de la función anónima
	'use strict';  // Activa el modo estricto de JavaScript para ayudar a prevenir errores

	var tinyslider = function() {  // Definición de la función tinyslider
		var el = document.querySelectorAll('.testimonial-slider');  // Selecciona todos los elementos con la clase 'testimonial-slider'

		if (el.length > 0) {  // Comprueba si hay al menos un elemento con la clase 'testimonial-slider'
			var slider = tns({  // Inicializa el slider utilizando la librería tns
				container: '.testimonial-slider',  // Especifica el contenedor del slider
				items: 1,  // Número de elementos que se mostrarán en una vista
				axis: "horizontal",  // Orientación del slider
				controlsContainer: "#testimonial-nav",  // Contenedor para los controles de navegación
				swipeAngle: false,  // Desactiva el ángulo de deslizamiento
				speed: 700,  // Velocidad de transición entre slides en milisegundos
				nav: true,  // Habilita la navegación por puntos
				controls: true,  // Habilita los controles de avance y retroceso
				autoplay: true,  // Habilita la reproducción automática
				autoplayHoverPause: true,  // Pausa la reproducción automática al pasar el ratón
				autoplayTimeout: 3500,  // Tiempo entre cada slide en milisegundos
				autoplayButtonOutput: false  // Desactiva la salida del botón de autoplay
			});
		}
	};
	tinyslider();  // Llama a la función tinyslider para inicializar el slider


	var sitePlusMinus = function() {  // Definición de la función sitePlusMinus

		var value,  // Variable para almacenar el valor actual de la cantidad
    		quantity = document.getElementsByClassName('quantity-container');  // Selecciona todos los elementos con la clase 'quantity-container'

		function createBindings(quantityContainer) {  // Función para crear los eventos de los botones dentro de un contenedor de cantidad
	      var quantityAmount = quantityContainer.getElementsByClassName('quantity-amount')[0];  // Selecciona el elemento que muestra la cantidad
	      var increase = quantityContainer.getElementsByClassName('increase')[0];  // Selecciona el botón para aumentar la cantidad
	      var decrease = quantityContainer.getElementsByClassName('decrease')[0];  // Selecciona el botón para disminuir la cantidad
	      increase.addEventListener('click', function (e) { increaseValue(e, quantityAmount); });  // Agrega un evento al botón de aumentar
	      decrease.addEventListener('click', function (e) { decreaseValue(e, quantityAmount); });  // Agrega un evento al botón de disminuir
	    }

	    function init() {  // Función para inicializar la funcionalidad de cantidad
	        for (var i = 0; i < quantity.length; i++ ) {  // Itera sobre todos los contenedores de cantidad
						createBindings(quantity[i]);  // Crea los eventos para cada contenedor
	        }
	    };

	    function increaseValue(event, quantityAmount) {  // Función para aumentar la cantidad
	        value = parseInt(quantityAmount.value, 10);  // Convierte el valor actual a un número entero

	        console.log(quantityAmount, quantityAmount.value);  // Imprime el elemento de cantidad y su valor en la consola

	        value = isNaN(value) ? 0 : value;  // Si el valor no es un número, establece en 0
	        value++;  // Incrementa el valor
	        quantityAmount.value = value;  // Actualiza el valor en el elemento de cantidad
	    }

	    function decreaseValue(event, quantityAmount) {  // Función para disminuir la cantidad
	        value = parseInt(quantityAmount.value, 10);  // Convierte el valor actual a un número entero

	        value = isNaN(value) ? 0 : value;  // Si el valor no es un número, establece en 0
	        if (value > 0) value--;  // Decrementa el valor solo si es mayor que 0

	        quantityAmount.value = value;  // Actualiza el valor en el elemento de cantidad
	    }
	    
	    init();  // Llama a la función init para inicializar la funcionalidad de cantidad
		
	};
	sitePlusMinus();  // Llama a la función sitePlusMinus para activar la funcionalidad de aumentar/disminuir

})()  // Cierra la función anónima
