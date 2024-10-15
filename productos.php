<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"> <!-- Define la codificación de caracteres como UTF-8 -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Configura el viewport para que sea responsivo -->
	<meta name="author" content="Untree.co"> <!-- Especifica el autor de la página -->
	<link rel="shortcut icon" href="img/logo_nav (1).png"> <!-- Vincula el ícono de la pestaña del navegador -->

	<meta name="description" content="" /> <!-- Descripción de la página (vacía en este caso) -->
	<meta name="keywords" content="bootstrap, bootstrap4" /> <!-- Palabras clave para SEO -->

	<link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Vincula el archivo CSS de Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Vincula la hoja de estilos de Font Awesome para iconos -->
	<link href="css/tiny-slider.css" rel="stylesheet"> <!-- Vincula la hoja de estilos de Tiny Slider -->
	<script src="js/app11.js" async></script> <!-- Vincula el script de JavaScript de la aplicación, cargándolo de forma asíncrona -->
	<link href="css/style.css" rel="stylesheet"> <!-- Vincula la hoja de estilos personalizada -->
	<title>Productos</title> <!-- Título de la pestaña del navegador -->
</head>

<body>
	<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar"> <!-- Navegación con estilos de Bootstrap -->
		<div class="container-logo"> <!-- Contenedor para el logo -->

			<div class="header-images"> <!-- Contenedor para las imágenes del encabezado -->
				<img src="img/logo_nav (1).png" id="logo"> <!-- Logo de la página -->
				<img src="img/P.PNG" alt="Imagen 1"> <!-- Imágenes adicionales -->
				<img src="img/A.png" alt="Imagen 1">
				<img src="img/N.png" alt="Imagen 1">
				<img src="img/E.png" alt="Imagen 1">
				<img src="img/V.png" alt="Imagen 1">
				<img src="img/I.png" alt="Imagen 1">
			</div>
		</div>

		<div class="container"> <!-- Contenedor principal de la navegación -->

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
				aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation"> <!-- Botón para alternar la visibilidad del menú en pantallas pequeñas -->
				<span class="navbar-toggler-icon"></span> <!-- Icono del botón -->
			</button>

			<div class="collapse navbar-collapse" id="navbarsFurni"> <!-- Sección colapsable del menú de navegación -->
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0"> <!-- Lista de elementos de navegación -->
					<div class="busqueda"> <!-- Contenedor para la barra de búsqueda -->
						<input type="text" id="bus" placeholder="Buscar"> <!-- Campo de entrada para buscar productos -->
						<div class="buttonb"> <!-- Contenedor para el botón de búsqueda -->
							<i class="fa fa-search"></i> <!-- Icono de búsqueda -->
						</div>
					</div>
					<li>
						<a class="nav-link" href="index.php">Inicio</a> <!-- Enlace a la página de inicio -->
					</li>
					<li><a class="nav-link" href="login.php">Ingresar</a></li> <!-- Enlace a la página de inicio de sesión -->
					<li><a class="nav-link" href="registro.php">Registrarse</a></li> <!-- Enlace a la página de registro -->
					<li class="nav-item active"><a class="nav-link" href="productos.php">Productos</a></li> <!-- Enlace a la página de productos -->
				</ul>
			</div>
		</div>
	</nav>

	<body>
		<br>
		<h3 style="text-align: center;color: #1a3e14; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif"><b>Descubre nuestra selección de productos de alta calidad</b></h3> <!-- Título principal de la sección de productos -->
		<section class="contenedor"> <!-- Sección contenedora para los productos -->
			<div class="contenedor-items"> <!-- Contenedor para los elementos de productos -->
				<?php
				// Incluye el archivo de configuración que contiene los datos de conexión a la base de datos.
				include("../app/config/config.php");

				// Define la consulta SQL para seleccionar todos los campos de la tabla productos.
				$tab_sql = "SELECT id_producto, nombre, precio, imagen FROM productos";
				// Ejecuta la consulta SQL y almacena el resultado en la variable $result.
				$result = $conexion->query($tab_sql);

				// Comprueba si la consulta ha devuelto alguna fila.
				if ($result->num_rows > 0) {
					// Itera a través de las filas devueltas por la consulta.
					while ($row = $result->fetch_assoc()) {
						// Genera un div con la clase 'item' para cada producto.
						echo "<div class='item'>";
						// Muestra el id del producto en un span oculto.
						echo "<span class='id-item' style='color: black; font-size: 16px; display:none'>" . $row["id_producto"] . "</span>";
						// Muestra el nombre del producto en un span.
						echo "<span class='titulo-item' style='color: black; font-size: 16.8px;'>" . $row["nombre"] . "</span>";
						// Muestra el precio del producto en un span.
						echo "<span class='precio-item' style='color: black; font-size: 16px'>$" . $row["precio"] . "</span>";
						// Muestra la imagen del producto en un img con la clase 'img-item'.
						echo "<img src='" . $row["imagen"] . "' alt='" . $row["nombre"] . "' class='img-item'>";
						// Genera un botón para agregar el producto al carrito con un evento onclick.
						echo "<button class='boton-item' onclick='agregarAlCarritoClicked(this, " . $row["id_producto"] . ")'><i class='fas fa-shopping-cart'></i>   Comprar</button>";
						echo "</div>"; // Cierra el div del producto
					}
				}
				?>
			</div>

			<div class="carrito" id="carrito"> <!-- Contenedor del carrito de compras -->
				<div class="header-carrito">
					<h2>Tu Carrito</h2> <!-- Título del carrito -->
				</div>
				<div class="carrito-items" style="color: black"></div> <!-- Contenedor para los artículos del carrito -->
				<div class="carrito-total" style="color: black"> <!-- Contenedor para el total del carrito -->
					<div class="fila">
						<strong>Tu Total</strong> <!-- Etiqueta para el total -->
						<span class="carrito-precio-total">$0.00</span> <!-- Muestra el precio total del carrito -->
					</div>
					<button class="btn-pagar">Pagar <i class="fa-solid fa-bag-shopping"></i></button> <!-- Botón para proceder al pago -->
				</div>

				<div id="alerta-compra" class="alerta oculto"> <!-- Contenedor para alerta de compra -->
					<span class="mensaje-alerta">¡Ups! Necesitas registrarte o iniciar sesión para poder comprar.</span> <!-- Mensaje de alerta -->
					<button class="btn-cerrar-alerta">&times;</button> <!-- Botón para cerrar la alerta -->
				</div>
			</div>
		</section>
	</body>
	<br>
	<footer class="footer-section"> <!-- Sección del pie de página -->
		<div class="container relative"> <!-- Contenedor principal del pie -->

			<div class="row g-5 mb-5"> <!-- Fila para los contenidos del pie -->
				<div class="col-lg-4"> <!-- Columna para el logo y enlaces sociales -->
					<div class="mb-4 footer-logo-wrap" style="font-size: 45px;color: white"><span>PANEVI</span></div> <!-- Logo del pie -->

					<p class="mb-4"></p> <!-- Espaciado (vacío) -->

					<ul class="list-unstyled custom-social"> <!-- Lista de enlaces a redes sociales -->
						<li><a href="https://www.facebook.com/profile.php?id=61552234777986&locale=es_LA"><span class="fa fa-brands fa-facebook-f"></span></a></li> <!-- Enlace a Facebook -->
						<li><a href="https://www.instagram.com/innovatech_4/"><span class="fa fa-brands fa-instagram"></span></a></li> <!-- Enlace a Instagram -->
						<li><a href="https://wa.me/573102307944"><span class="fa fa-brands fa-whatsapp"></span></a></li> <!-- Enlace a WhatsApp -->
					</ul>
				</div>

				<div class="col-lg-8"> <!-- Columna para enlaces de información -->
					<div class="row links-wrap"> <!-- Fila para los enlaces -->
						<div style="margin-left: 15%;" class="col-6 col-sm-6 col-md-3"> <!-- Columna para enlaces de información -->
							<ul class="list-unstyled"> <!-- Lista de enlaces -->
								<li style="color: white; text-transform: uppercase;font-size: 20px">Información</li> <!-- Título de la sección -->
								<li><a href="#" style="color: grey">Acerca de Nosotros</a></li> <!-- Enlace a "Acerca de" -->
								<li><a href="#" style="color: grey">Politicas de Privacidad</a></li> <!-- Enlace a las políticas de privacidad -->
								<li><a href="#" style="color: grey">Términos y Condiciones</a></li> <!-- Enlace a los términos y condiciones -->
							</ul>
						</div>

						<div class="col-6 col-sm-6 col-md-3"> <!-- Columna para la cuenta del usuario -->
							<ul class="list-unstyled">
								<li style="color: white; text-transform: uppercase;font-size: 20px">MI CUENTA</li> <!-- Título de la sección -->
								<li><a href="#" style="color: grey">Mi Cuenta</a></li> <!-- Enlace a la cuenta del usuario -->
								<li><a href="#" style="color: grey">Mi información</a></li> <!-- Enlace a la información del usuario -->
							</ul>
						</div>

						<div class="col-6 col-sm-6 col-md-3"> <!-- Columna para información de contacto -->
							<ul class="list-unstyled">
								<li style="color: white; text-transform: uppercase;font-size: 20px">CONTACTO</li> <!-- Título de la sección -->
								<li>Teléfono: 3102307944</li> <!-- Información de contacto (teléfono) -->
								<li>Ciudad: Villeta</li> <!-- Información de contacto (ciudad) -->
								<li>Código postal: 253410</li> <!-- Información de contacto (código postal) -->
							</ul>
						</div>

						<div class="col-6 col-sm-6 col-md-3"> <!-- Columna vacía para futuros enlaces -->
							<ul class="list-unstyled">
								<li><a href="#"></a></li>
								<li><a href="#"></a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>

			<div class="border-top copyright"> <!-- Separador y sección de derechos de autor -->
				<div class="row pt-4"> <!-- Fila para el texto de derechos de autor -->
					<div class="col-lg-6"> <!-- Columna para la información de derechos de autor -->
						<p class="mb-2 text-center text-lg-start">Derechos de Autor &copy; <!-- Mensaje de derechos de autor -->
							<script>
								document.write(new Date().getFullYear()); // Muestra el año actual dinámicamente
							</script>. Todos los derechos reservados.<br>
							Correo: innovatech004@gmail.com</a> <!-- Correo de contacto -->
							<!-- License information: https://untree.co/license/ --> <!-- Información de licencia (comentario) -->
						</p>
					</div>

					<div class="col-lg-6 text-center text-lg-end"> <!-- Columna para mensaje adicional -->
						<ul class="list-unstyled d-inline-flex ms-auto"> <!-- Lista de texto adicional -->
							<li class="me-4" style="color: white; font-size: 18px">Panevi - Endulza tu vida</li> <!-- Mensaje adicional -->
						</ul>
					</div>

				</div>
			</div>

		</div>
	</footer>
	<!-- End Footer Section -->

	<script src="js/bootstrap.bundle.min.js"></script> <!-- Vincula el script de Bootstrap -->
	<script src="js/tiny-slider.js"></script> <!-- Vincula el script de Tiny Slider -->
	<script src="js/custom.js"></script> <!-- Vincula el script de JavaScript personalizado -->

	<!-- JavaScript Libraries -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> <!-- Vincula jQuery -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> <!-- Vincula Bootstrap JS -->
	<script src="lib/wow/wow.min.js"></script> <!-- Vincula la biblioteca WOW.js para animaciones -->
	<script src="lib/easing/easing.min.js"></script> <!-- Vincula la biblioteca de easing -->
	<script src="lib/waypoints/waypoints.min.js"></script> <!-- Vincula la biblioteca Waypoints para desplazamiento -->
	<script src="lib/counterup/counterup.min.js"></script> <!-- Vincula la biblioteca CounterUp para contadores -->
	<script src="lib/owlcarousel/owl.carousel.min.js"></script> <!-- Vincula la biblioteca Owl Carousel para carruseles -->
	<script src="lib/tempusdominus/js/moment.min.js"></script> <!-- Vincula Moment.js para manejo de fechas -->
	<script src="lib/tempusdominus/js/moment-timezone.min.js"></script> <!-- Vincula Moment Timezone para zonas horarias -->
	<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script> <!-- Vincula Tempus Dominus para selección de fecha y hora -->

	<!-- Template Javascript -->
	<script src="js/main1.js"></script> <!-- Vincula el script principal de la plantilla -->

</body>

</html>