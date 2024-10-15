<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"> <!-- Define la codificación de caracteres como UTF-8 para asegurar que se muestren correctamente todos los caracteres -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Configura la vista para dispositivos móviles, asegurando que el contenido se ajuste al ancho del dispositivo -->
	<meta name="author" content="Untree.co"> <!-- Proporciona información sobre el autor del documento -->
	<link rel="shortcut icon" href="img/logo_nav (1).png"> <!-- Establece un icono que se muestra en la pestaña del navegador -->

	<meta name="description" content="" /> <!-- Meta descripción de la página (vacía en este caso, se puede usar para SEO) -->
	<meta name="keywords" content="bootstrap, bootstrap4" /> <!-- Palabras clave para mejorar el SEO, indicando que la página usa Bootstrap -->

	<link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Enlaza la hoja de estilos CSS de Bootstrap para estilos de diseño responsivo y componentes -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Enlaza la hoja de estilos de Font Awesome para iconos vectoriales -->
	<link href="css/tiny-slider.css" rel="stylesheet"> <!-- Enlaza la hoja de estilos específica para el Tiny Slider, un plugin de carrusel -->
	<link href="css/style.css" rel="stylesheet"> <!-- Enlaza la hoja de estilos personalizada para la página -->
	<link rel="stylesheet" href="css/sty.css"> <!-- Enlaza otra hoja de estilos (sty.css) que puede contener estilos adicionales -->

	<!-- Libraries Stylesheet -->
	<link href="lib/animate/animate.min.css" rel="stylesheet"> <!-- Enlaza la hoja de estilos para animaciones de la biblioteca Animate.css -->
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"> <!-- Enlaza la hoja de estilos para el plugin Owl Carousel, utilizado para crear carruseles -->
	<link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" /> <!-- Enlaza la hoja de estilos para el DateTime Picker de Tempus Dominus, que permite seleccionar fechas y horas -->
	<title>Quienes Somos</title> <!-- Establece el título de la página que se muestra en la pestaña del navegador -->
</head>


<body>

	<!-- Barra de navegación principal -->
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
		<div class="container-logo">
			<!-- Contenedor para el logo y otras imágenes de la cabecera -->
			<div class="header-images">
				<!-- Logo de la navegación -->
				<img src="img/logo_nav (1).png " id="logo">
				<!-- Imágenes adicionales en la cabecera -->
				<img src="img/P.PNG" alt="Imagen 1">
				<img src="img/A.png" alt="Imagen 1">
				<img src="img/N.png" alt="Imagen 1">
				<img src="img/E.png" alt="Imagen 1">
				<img src="img/V.png" alt="Imagen 1">
				<img src="img/I.png" alt="Imagen 1">
			</div>
		</div>

		<div class="container">
			<!-- Botón para mostrar/ocultar el menú de navegación en dispositivos móviles -->
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
				aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Menú de navegación colapsable -->
			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<!-- Campo de búsqueda -->
					<div class="busqueda">
						<input type="text" id="bus" placeholder="Buscar"> <!-- Campo de texto para búsqueda -->
						<div class="buttonb">
							<i class="fa fa-search"></i> <!-- Icono de búsqueda -->
						</div>
					</div>
					<!-- Enlaces de navegación -->
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Inicio</a> <!-- Enlace a la página de inicio -->
					</li>
					<li><a style="text-align: center" class="nav-link" href="login.php">Ingresar</a></li> <!-- Enlace a la página de inicio de sesión -->
					<li><a class="nav-link" href="registro.php">Registrarse</a></li> <!-- Enlace a la página de registro -->
					<li><a class="nav-link" href="productos.php">Productos</a></li> <!-- Enlace a la página de productos -->
				</ul>

			</div>
		</div>

	</nav>
	<br>

	<!-- Sección principal de contenido -->
	<body>
		<section class="section-padding pt-4">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<article class="post-grid mb-5">
							<a>
								<img src="img/.q1.jpeg" alt="" class="img-fluid w-100"> <!-- Imagen del artículo -->
							</a>
							<span class="font-sm text-color letter-spacing text-uppercase post-meta font-extra">#AYUDANDOALOSPANELEROS</span> <!-- Meta información del artículo -->
							<h2 style="color: #000000;" class="mb-2 mt-2 post-title"><strong>Sobre Nosotros</strong></h2> <!-- Título del artículo -->

							<div class="post-content mt-3" style="font-size: 17px; text-align:justify;">
								<p>Somos una plataforma de comercio electrónico dedicada a ayudar a los productores de panela en el campo a vender sus productos de manera directa y justa. Creemos en el valor del trabajo agrícola y nos comprometemos a brindarles a los campesinos una herramienta fácil de usar para conectarse con un mercado más amplio, eliminando intermediarios y garantizando que reciban un pago justo por su esfuerzo. A través de nuestra plataforma, los consumidores pueden adquirir productos frescos y de alta calidad, apoyando a las comunidades rurales y fomentando un comercio más equitativo y sostenible.</p>
							</div>
						</article>

						<div class="row">
							<div class="col-lg-6">
								<article class="post-grid mb-5">
									<a class="post-thumb mb-4 d-block" href="blog-single.html">
										<img src="img/03.jpeg" alt="" class="img-fluid"> <!-- Imagen del artículo -->
									</a>
									<span class="font-sm text-color letter-spacing text-uppercase post-meta font-extra">Travel</span> <!-- Meta información del artículo -->
									<h3 class="post-title mb-1 mt-2"> Ayudamos</h3> <!-- Título del artículo -->

									<div class="post-content mt-4">
										<p style="font-size: 15px; text-align:justify;">Gracias a nuestra plataforma de ecommerce, comprar productos derivados de la panela nunca ha sido tan fácil. Ofrecemos una experiencia de compra sencilla y segura, con envíos rápidos y atención personalizada. Sabemos que nuestros clientes buscan calidad, y por eso cada uno de los productos que ofrecemos ha pasado por estrictos controles para asegurar que conservan todas las propiedades nutritivas y el sabor inigualable de la panela.</p>
									</div>
								</article>
							</div>

							<div class="col-lg-6">
								<article class="post-grid mb-5">
									<a class="post-thumb mb-4 d-block" href="blog-single.html">
										<img src="img/.q4.jpg" alt="" class="img-fluid"> <!-- Imagen del artículo -->
									</a>
									<span class="font-sm text-color letter-spacing text-uppercase post-meta font-extra">Explore</span> <!-- Meta información del artículo -->
									<h3 class="post-title mb-1 mt-2">Que Ofrecemos</h3> <!-- Título del artículo -->

									<div class="post-content mt-4">
										<p style="font-size: 15px; text-align:justify;">En nuestra tienda online, brindamos una amplia gama de productos derivados de la panela, desde dulces tradicionales hasta polvos y jarabes, ideales para quienes buscan alternativas naturales al azúcar refinado. Creemos en el poder de lo natural y trabajamos para que cada compra contribuya no solo a tu bienestar, sino también al fortalecimiento de comunidades rurales que dependen de la producción de este valioso recurso</p>
									</div>
								</article>
							</div>

							<div class="col-lg-6">
								<article class="post-grid mb-5">
									<h3 class="post-title mb-1 mt-2">Valores</h3> <!-- Título de la sección de valores -->

									<div class="post-content mt-4">
										<ul>
											<li><strong>Calidad</strong> </li> <!-- Valor: Calidad -->
											<li><strong>Sostenibilidad</strong></li> <!-- Valor: Sostenibilidad -->
											<li><strong>Transparencia</strong> </li> <!-- Valor: Transparencia -->
											<li><strong>Innovación</strong> </li> <!-- Valor: Innovación -->
											<li><strong>Compromiso Social</strong> </li> <!-- Valor: Compromiso Social -->
											<li><strong>Salud</strong></li> <!-- Valor: Salud -->
										</ul>

									</div>
								</article>
							</div>

							<div class="col-lg-6">
								<article class="post-grid mb-5">
									<a class="post-thumb mb-4 d-block" href="blog-single.html">
										<img src="img/02.jpg" alt="" class="img-fluid"> <!-- Imagen del artículo -->
									</a>
								</article>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="sidebar sidebar-right">
							<div class="sidebar-wrap mt-5 mt-lg-0">
								<div class="sidebar-widget about mb-5  p-3">
									<div class="about-author">
										<img src="img/.q2.webp" alt="" class="img-fluid"> <!-- Imagen del autor -->
									</div>
									<h4 class="mb-0 mt-4 text-center">Misión </h4> <!-- Título de la sección: Misión -->
									<p class=" text-center">Panevi</p>

									<p style="font-size: 17px; text-align:justify;">En Panevi, nuestra misión es ofrecer productos de panela de la más alta calidad, promoviendo un estilo
										de vida saludable y sostenible. Nos dedicamos a llevar a cada hogar la autenticidad y el sabor puro de
										la panela, cultivada de manera ética y responsable. A través de nuestra tienda virtual, buscamos conectar
										a los consumidores con los productores locales, fortaleciendo las comunidades rurales y fomentando
										prácticas agrícolas que respeten el medio ambiente.</p>
									<img src="images/liammason.png" alt="" class="img-fluid"> <!-- Imagen adicional -->
								</div>

								<div class="sidebar-widget about mb-5  p-3">
										<h4 class="mb-0 mt-4 text-center">Visión</h4> <!-- Título de la sección: Visión -->
										<p class=" text-center">Panevi</p>

										<p style="font-size: 17px; text-align:justify;">Nuestra visión es ser la plataforma líder en la venta de productos derivados de la panela, reconocida por su
											impacto positivo en la comunidad y el medio ambiente. Aspira a expandir el acceso a productos naturales,
											basados en la panela, fomentando hábitos de consumo responsables y saludables. Nos comprometemos a
											trabajar codo a codo con los productores de panela, brindándoles oportunidades justas y
											sostenibles, y a educar a nuestros clientes sobre los beneficios de elegir productos locales y
											ecológicos.</p>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Pie de página -->
		

		<footer class="footer-section">
		<div class="container relative">

			<div class="row g-5 mb-5">

				<div class="col-lg-4">
					<!-- Columna de redes sociales -->
					<div class="mb-4 footer-logo-wrap" style="font-size: 45px;color: white"><span>PANEVI</span></div>

					<p class="mb-4"></p>

					<ul class="list-unstyled custom-social">
						<li><a href="https://www.facebook.com/profile.php?id=61552234777986&locale=es_LA"><span class="fa fa-brands fa-facebook-f"></span></a></li>
						<li><a href="https://www.instagram.com/innovatech_4/"><span class="fa fa-brands fa-instagram"></span></a></li>
						<li><a href="https://wa.me/573102307944"><span class="fa fa-brands fa-whatsapp"></span></a></li>
					</ul>
				</div>


				<div class="col-lg-8">
					<div class="row links-wrap">
						<div style="margin-left: 15%;" class="col-6 col-sm-6 col-md-3">
							<ul class="list-unstyled">
								<li style="color: white; text-transform: uppercase;font-size: 20px">Información</li>
								<li><a href="#" style="color: grey">Acerca de Nosotros</a></li>
								<li><a href="#" style="color: grey">Politicas de Privacidad</a></li>
								<li><a href="#" style="color: grey">Términos y Condiciones</a></li>
							</ul>
						</div>

						<div class="col-6 col-sm-6 col-md-3">
							<ul class="list-unstyled">
								<li style="color: white; text-transform: uppercase;font-size: 20px">MI CUENTA</li>
								<li><a href="#" style="color: grey">Mi Cuenta</a></li>
								<li><a href="#" style="color: grey">Mi información</a></li>
							</ul>
						</div>
						<!-- Columna de contacto -->
						<div class="col-6 col-sm-6 col-md-3">
							<ul class="list-unstyled">
								<li style="color: white; text-transform: uppercase;font-size: 20px">CONTACTO</li>
								<li>Teléfono: 3102307944</li>
								<li>Ciudad: Villeta</li>
								<li>Código postal: 253410</li>
							</ul>
						</div>

						<div class="col-6 col-sm-6 col-md-3">
							<ul class="list-unstyled">
								<li><a href="#"></a></li>
								<li><a href="#"></a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
			<!-- Columna de derechos reservados -->
			<div class="border-top copyright">
				<div class="row pt-4">
					<div class="col-lg-6">
						<p class="mb-2 text-center text-lg-start">Derechos de Autor &copy;
							<script>
								document.write(new Date().getFullYear());
							</script>. Todos los derechos reservados.<br>
							Correo: innovatech004@gmail.com</a>
							<!-- License information: https://untree.co/license/ -->
						</p>
					</div>


					<div class="col-lg-6 text-center text-lg-end">
						<ul class="list-unstyled d-inline-flex ms-auto">
							<li class="me-4" style="color: white; font-size: 18px">Panevi - Endulza tu vida</li>
						</ul>
					</div>

				</div>
			</div>

		</div>
	</footer>



		
	</body>


</html>