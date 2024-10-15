(function ($) {
    "use strict"; // Activa el modo estricto para evitar errores comunes en JavaScript.

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            // Si el elemento con ID 'spinner' existe, se elimina la clase 'show' después de 1 milisegundo.
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(); // Llama a la función spinner para que se ejecute al cargar el script.


    // Inicia el wow.js para animaciones al hacer scroll.
    new WOW().init();


    // Navbar adhesivo
    $(window).scroll(function () {
        // Si el desplazamiento vertical es mayor a 45 píxeles, se añade la clase 'sticky-top' y 'shadow-sm' a la barra de navegación.
        if ($(this).scrollTop() > 45) {
            $('.navbar').addClass('sticky-top shadow-sm');
        } else {
            // Si no, se eliminan esas clases.
            $('.navbar').removeClass('sticky-top shadow-sm');
        }
    });


    // Dropdown al pasar el mouse
    const $dropdown = $(".dropdown"); // Selecciona todos los elementos con la clase 'dropdown'.
    const $dropdownToggle = $(".dropdown-toggle"); // Selecciona todos los elementos con la clase 'dropdown-toggle'.
    const $dropdownMenu = $(".dropdown-menu"); // Selecciona todos los elementos con la clase 'dropdown-menu'.
    const showClass = "show"; // Clase que se usará para mostrar el menú desplegable.

    // Se activan las funciones de hover al cargar o redimensionar la ventana.
    $(window).on("load resize", function () {
        if (this.matchMedia("(min-width: 992px)").matches) {
            // Si el ancho de la ventana es mayor a 992px, se añade el comportamiento de hover.
            $dropdown.hover(
                function () {
                    const $this = $(this); // Referencia al dropdown actual.
                    $this.addClass(showClass); // Añade la clase 'show' al dropdown.
                    $this.find($dropdownToggle).attr("aria-expanded", "true"); // Cambia el atributo aria para accesibilidad.
                    $this.find($dropdownMenu).addClass(showClass); // Muestra el menú desplegable.
                },
                function () {
                    const $this = $(this); // Referencia al dropdown actual.
                    $this.removeClass(showClass); // Elimina la clase 'show' al salir del hover.
                    $this.find($dropdownToggle).attr("aria-expanded", "false"); // Cambia el atributo aria para accesibilidad.
                    $this.find($dropdownMenu).removeClass(showClass); // Oculta el menú desplegable.
                }
            );
        } else {
            // Si la ventana es menor a 992px, se desactiva el comportamiento de hover.
            $dropdown.off("mouseenter mouseleave");
        }
    });


    // Botón de volver arriba
    $(window).scroll(function () {
        // Si el desplazamiento vertical es mayor a 300 píxeles, el botón 'back-to-top' aparece con un efecto de desvanecimiento.
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            // Si no, el botón se desvanece lentamente.
            $('.back-to-top').fadeOut('slow');
        }
    });
    // Al hacer clic en el botón 'back-to-top', se anima el desplazamiento hacia arriba de la página.
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo'); // Desplazamiento suave hacia arriba.
        return false; // Previene el comportamiento por defecto del clic.
    });


    // Contador de hechos
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10, // Retraso entre incrementos del contador.
        time: 2000 // Tiempo total para completar el conteo.
    });


    // Modal de video
    $(document).ready(function () {
        var $videoSrc; // Variable para almacenar la fuente del video.
        $('.btn-play').click(function () {
            // Al hacer clic en un botón con la clase 'btn-play', se guarda la fuente del video desde el atributo 'data-src'.
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc); // Muestra la fuente del video en la consola.

        // Al abrir el modal, se establece la fuente del video para que se reproduzca automáticamente.
        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        });

        // Al cerrar el modal, se restablece la fuente del video.
        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        });
    });


    // Carrusel de testimonios
    $(".testimonial-carousel").owlCarousel({
        autoplay: true, // El carrusel reproduce automáticamente.
        smartSpeed: 1000, // Velocidad de la animación del carrusel.
        center: true, // Centra el elemento actual.
        margin: 24, // Margen entre elementos.
        dots: true, // Muestra puntos de navegación.
        loop: true, // El carrusel se reinicia al final.
        nav: false, // Desactiva las flechas de navegación.
        responsive: { // Configuración del carrusel según el ancho de la ventana.
            0: {
                items: 1 // Muestra un item en pantallas pequeñas.
            },
            768: {
                items: 2 // Muestra dos items en pantallas medianas.
            },
            992: {
                items: 3 // Muestra tres items en pantallas grandes.
            }
        }
    });

})(jQuery); // Se cierra la función anónima y se pasa jQuery como argumento.


