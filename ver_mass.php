<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<?php
session_start();
if (!isset($_SESSION['nombre']) || !isset($_SESSION['apellido'])) {
	header("Location: login.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Define la codificación de caracteres utilizada en el documento (UTF-8) -->
	<meta charset="utf-8">
	<!-- Configura la vista para dispositivos móviles, asegurando que el diseño se adapte al tamaño de la pantalla -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Metadato que indica el autor del documento -->
	<meta name="author" content="Untree.co">
	<!-- Icono de acceso rápido que aparecerá en la pestaña del navegador -->
	<link rel="shortcut icon" href="img/logo_nav (1).png">

	<!-- Metadato que proporciona una descripción del documento (vacío en este caso) -->
	<meta name="description" content="" />
	<!-- Metadato que proporciona palabras clave para SEO -->
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<!-- Enlace a la hoja de estilo CSS de Bootstrap para el diseño y estilo de la página -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Enlace a la hoja de estilo de Font Awesome para íconos -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
	<!-- Enlace a la hoja de estilo de Font Awesome versión 6 -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<!-- Enlace a la hoja de estilo para el control deslizante Tiny Slider -->
	<link href="css/tiny-slider.css" rel="stylesheet">
	<!-- Enlace a otra versión de la hoja de estilo CSS de Bootstrap -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<!-- Enlace a la hoja de estilo CSS personalizada para estilos específicos del sitio -->
	<link href="css/style.css" rel="stylesheet">

	<!-- Título de la página que se muestra en la pestaña del navegador -->
	<title>Quienes Somos</title>
</head>

<body>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
		<div class="container-logo">

			<div class="header-images">
				<div style="display: flex; align-items: center; color: white; text-align: center; margin-right: 5px;">
					<span style="font-weight: bold; font-size: 17px; margin-right: 10px;">
						<?php echo htmlspecialchars($_SESSION['nombre'] . ' ' . $_SESSION['apellido']); ?>
					</span>
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: none; border: none; color: white;">
							<i class="fa fa-bars"></i>
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="font-size: 13px">
							<a class="dropdown-item" href="configuraciones.php" style="color: grey; font-weight: bold;">
								<i class="fa fa-key"></i> Cambiar Correo y Contraseña
							</a>
							<a class="dropdown-item" href="mis_pedidos.php" style="color: grey; font-weight: bold;">
								<i class="fa fa-shopping-cart"></i> Ver mis Pedidos y Compras
							</a>
							<a class="dropdown-item" href="logout.php" style="color: grey; font-weight: bold;">
								<i class="fa fa-sign-out-alt"></i> Cerrar Sesión
							</a>
						</div>

					</div>
				</div>

				<img src="img/logo_nav (1).png " id="logo">
				<img src="img/P.PNG" alt="Imagen 1">
				<img src="img/A.png" alt="Imagen 1">
				<img src="img/N.png" alt="Imagen 1">
				<img src="img/E.png" alt="Imagen 1">
				<img src="img/V.png" alt="Imagen 1">
				<img src="img/I.png" alt="Imagen 1">
			</div>
		</div>

		<div class="container">
			<!-- Botón que se utiliza para colapsar o expandir la barra de navegación en dispositivos móviles -->
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
				aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<!-- Icono que representa el estado del botón (hamburguesa) -->
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Div que contiene los elementos de navegación colapsables -->
			<div class="collapse navbar-collapse" id="navbarsFurni">
				<!-- Lista de elementos de navegación, utilizando clases de Bootstrap para el estilo -->
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<!-- Div que contiene el campo de búsqueda -->
					<div class="busqueda">
						<!-- Campo de entrada de texto para la búsqueda -->
						<input type="text" id="bus" placeholder="Buscar">
						<!-- Div que contiene el icono de búsqueda -->
						<div class="buttonb">
							<!-- Icono de búsqueda de Font Awesome -->
							<i class="fa fa-search"></i>
						</div>
					</div>
					<!-- Elemento de la lista de navegación para el enlace a la página de inicio -->
					<li class="nav-item active">
						<a class="nav-link" href="perfil_cli.php">Inicio</a>
					</li>
					<!-- Elemento de la lista de navegación para el enlace a la página "¿Quiénes somos?" -->
					<li><a style="text-align: center;" class="nav-link" href="quienes_somos.php">¿Quienes Somos?</a></li>
					<!-- Elemento de la lista de navegación para el enlace a la página de productos -->
					<li><a class="nav-link" href="productos_cli.php">Productos</a></li>
				</ul>
			</div>
		</div>

	</nav>


	<br>

	<body>

		<section class="section-padding pt-4">
			<!-- Contenedor principal para organizar el contenido -->
			<div class="container">
				<!-- Fila que contiene las columnas de contenido -->
				<div class="row">
					<!-- Columna principal que ocupa 8 de 12 unidades en pantallas grandes y medianas -->
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<article class="post-grid mb-5">
							<!-- Inicio de la sección de testimonios -->
							<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
								<!-- Contenedor interno para centrar el contenido -->
								<div class="container">
									<!-- Sección de encabezado para el título -->
									<div class="text-center">
										<!-- Título de la sección, con clase de estilo -->
										<h5 class="section-title ff-secondary text-center text-primary fw-normal">Historia</h5>
										<!-- Título principal de la historia -->
										<h1 class="mb-5">¡¡¡PANELA!!!</h1>
									</div>
									<!-- Carrusel de testimonios -->
									<div class="owl-carousel testimonial-carousel">
										<!-- Elemento del testimonio con fondo transparente y bordes redondeados -->
										<div class="testimonial-item bg-transparent border rounded p-4">
											<!-- Icono de cita al inicio del testimonio -->
											<i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
											<!-- Texto del testimonio, justificado y con tamaño de fuente específico -->
											<p class="card-text" style="font-size: 16px; text-align:justify">La panela es un producto ancestral que tiene una rica historia vinculada a las culturas agrícolas de América Latina y otras regiones tropicales del mundo. Su origen se remonta a la época en que la caña de azúcar fue introducida en el continente americano por los colonizadores españoles en el siglo XVI, quienes trajeron consigo el conocimiento de la producción de azúcar, que ya se practicaba en Asia y Europa. Sin embargo, fueron los pueblos indígenas y los esclavos africanos quienes adaptaron las técnicas para crear la panela, que se convirtió en un alimento fundamental en las zonas rurales.</p>
											<div class="d-flex align-items-center">
												<!-- Imagen del autor del testimonio, con clase para ajustarla -->
												<img class="img-fluid flex-shrink-0 rounded-circle" src="img/produ.jpg" style="width: 50px; height: 50px;">
												<div class="ps-3">
													<!-- Espacio para más contenido sobre el autor, actualmente vacío -->
												</div>
											</div>
										</div>

										<br>

										<article class="post-grid mb-1">
											<!-- Enlace que envuelve la imagen -->
											<a>
												<!-- Imagen relacionada con la historia -->
												<img src="img/his.jpg" alt="" class="img-fluid w-100">
											</a>
											<!-- Etiqueta con un hashtag que describe el contenido -->
											<span class="font-sm text-color letter-spacing text-uppercase post-meta font-extra">#AYUDANDOALOSPANELEROS</span>
											<!-- Título de la entrada, resaltando una parte del texto -->
											<h2 style="color: #000000;" class="mb-2 mt-2 post-title"><strong>A lo largo </strong></h2>

											<div class="post-content mt-3" style="font-size: 17px; text-align:justify;">
												<!-- Texto que describe la producción de panela a lo largo de los siglos -->
												<p>De los siglos, la panela se ha producido mediante un proceso artesanal que ha permanecido casi inalterado. Se extrae el jugo de la caña de azúcar y, tras ser filtrado y cocido en grandes calderas, se evapora el agua y se solidifica sin pasar por procesos de refinamiento ni blanqueamiento. Este método asegura que la panela conserve todas sus propiedades nutritivas, como vitaminas, minerales y antioxidantes. Durante generaciones, ha sido valorada no solo como endulzante, sino también como una fuente accesible de energía y nutrientes para las comunidades rurales.</p>
											</div>
										</article>

										<!-- Otro elemento del testimonio con fondo transparente y bordes redondeados -->
										<div class="testimonial-item bg-transparent border rounded p-4">
											<!-- Texto del testimonio sobre el reconocimiento global de la panela -->
											<p class="card-text" style="font-size: 16px; text-align:justify">En la actualidad, la panela ha ganado reconocimiento global por sus beneficios para la salud en comparación con los azúcares refinados, siendo considerada un endulzante natural y saludable. A medida que las personas buscan opciones más saludables y sostenibles, el consumo de panela ha crecido en mercados internacionales, lo que a su vez ha impulsado el comercio justo y ha dado lugar a iniciativas que apoyan a pequeños agricultores. La historia de la panela es un reflejo del trabajo de miles de campesinos que, a lo largo de los siglos, han mantenido viva esta tradición y han encontrado en su producción una forma de sustento y desarrollo económico.
											</p>
										</div>
									</div>
								</div>
							</div>
						</article>
					</div>
					<!-- Columna lateral que ocupa 4 de 12 unidades en pantallas grandes y medianas -->
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<!-- Sidebar para contenido adicional a la derecha -->
						<div class="sidebar sidebar-right">
							<!-- Contenedor de la sidebar -->
							<div class="sidebar-wrap mt-5 mt-lg-0">
								<!-- Widget de la sidebar para mostrar información sobre el autor o tema -->
								<div class="sidebar-widget about mb-5  p-3">
									<!-- Imagen del autor o tema -->
									<div class="about-author">
										<img src="img/pane1.jpg" alt="" class="img-fluid">
									</div>
									<!-- Otra imagen relacionada con el tema -->
									<div class="about-author">
										<img src="img/story.png" alt="" class="img-fluid">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>



	</body>




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



	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/tiny-slider.js"></script>
	<script src="js/custom.js"></script>
	<!-- JavaScript Libraries -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="lib/wow/wow.min.js"></script>
	<script src="lib/easing/easing.min.js"></script>
	<script src="lib/waypoints/waypoints.min.js"></script>
	<script src="lib/counterup/counterup.min.js"></script>

	<!-- Template Javascript -->
	<script src="js/main1.js"></script>
</body>

</html>