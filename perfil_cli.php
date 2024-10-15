<?php
// Inicia una nueva sesión o reanuda la sesión existente.
session_start();

// Comprueba si no se han establecido las variables de sesión 'nombre' o 'apellido'.
if (!isset($_SESSION['nombre']) || !isset($_SESSION['apellido'])) {
	// Si no se han establecido, redirige al usuario a la página de inicio de sesión.
	header("Location: login.php");
	// Finaliza la ejecución del script para asegurarse de que no se ejecute código adicional.
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Define la codificación de caracteres utilizada en el documento -->
	<meta charset="utf-8">

	<!-- Configura el viewport para asegurar que el contenido se ajuste correctamente en dispositivos móviles -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Define el autor de la página -->
	<meta name="author" content="Untree.co">

	<!-- Vincula un icono que se mostrará en la pestaña del navegador -->
	<link rel="shortcut icon" href="img/logo_nav (1).png">

	<!-- Metaetiquetas para SEO, que proporcionan una descripción y palabras clave sobre el contenido de la página -->
	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<!-- Vincula la hoja de estilos de Bootstrap (estilos predefinidos para el diseño) -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Vincula la hoja de estilos de Font Awesome para íconos -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

	<!-- Otra versión de la hoja de estilos de Font Awesome, se puede eliminar la anterior si no se usa -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

	<!-- Vincula una versión de la hoja de estilos de Bootstrap (posiblemente redundante) -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

	<!-- Vincula la hoja de estilos para el control deslizante Tiny Slider -->
	<link href="css/tiny-slider.css" rel="stylesheet">

	<!-- Vincula la hoja de estilos principal del proyecto -->
	<link href="css/style.css" rel="stylesheet">

	<!-- Vincula otra hoja de estilos que podría contener estilos adicionales -->
	<link rel="stylesheet" href="css/sty.css">

	<!-- Hojas de estilo de bibliotecas externas -->
	<link href="lib/animate/animate.min.css" rel="stylesheet"> <!-- Vincula estilos para animaciones -->
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"> <!-- Vincula estilos para un carrusel -->
	<link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" /> <!-- Vincula estilos para un selector de fecha y hora -->
	<!-- Meta tags para especificar el conjunto de caracteres, la compatibilidad con dispositivos móviles y el autor -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="img/logo_nav (1).png">

	<!-- Meta tags para descripción y palabras clave (vacíos en este caso) -->
	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<!-- Importación de hojas de estilo CSS: Bootstrap, Font Awesome y estilos personalizados -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="css/tiny-slider.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="css/sty.css">



	<!-- Libraries Stylesheet -->
	<link href="lib/animate/animate.min.css" rel="stylesheet">
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
	<!-- Título de la página -->
	<!-- Título de la pestaña del navegador -->
	<title>Perfil Cliente</title>
</head>


<body>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">
		<!-- Contenedor para el logo y elementos del encabezado -->
		<div class="container-logo">

			<div class="header-images">
				<!-- Contenedor para la información del usuario -->
				<div style="display: flex; align-items: center; color: white; text-align: center; margin-right: 5px;">

					<!-- Muestra el nombre y apellido del usuario almacenados en la sesión -->
					<span style="font-weight: bold; font-size: 17px; margin-right: 10px;">
						<?php echo htmlspecialchars($_SESSION['nombre'] . ' ' . $_SESSION['apellido']); ?>
					</span>

					<!-- Botón de menú desplegable para opciones del usuario -->
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: none; border: none; color: white;">
							<!-- Ícono de menú -->
							<i class="fa fa-bars"></i>
						</button>
						<!-- Contenedor del menú desplegable -->
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="font-size: 13px">
							<!-- Enlace para cambiar correo y contraseña -->
							<a class="dropdown-item" href="configuraciones.php" style="color: grey; font-weight: bold;">
								<i class="fa fa-key"></i> Cambiar Correo y Contraseña
							</a>
							<!-- Enlace para ver pedidos y compras -->
							<a class="dropdown-item" href="mis_pedidos.php" style="color: grey; font-weight: bold;">
								<i class="fa fa-shopping-cart"></i> Ver mis Pedidos y Compras
							</a>
							<!-- Enlace para cerrar sesión -->
							<a class="dropdown-item" href="logout.php" style="color: grey; font-weight: bold;">
								<i class="fa fa-sign-out-alt"></i> Cerrar Sesión
							</a>
						</div>

					</div>
				</div>

				<!-- Logo de la página -->
				<img src="img/logo_nav (1).png" id="logo">
				<!-- Imágenes de la cabecera -->
				<img src="img/P.PNG" alt="Imagen 1">
				<img src="img/A.png" alt="Imagen 1">
				<img src="img/N.png" alt="Imagen 1">
				<img src="img/E.png" alt="Imagen 1">
				<img src="img/V.png" alt="Imagen 1">
				<img src="img/I.png" alt="Imagen 1">
			</div>
		</div>

		<!-- Contenedor principal de la barra de navegación -->
		<div class="container">

			<!-- Botón para colapsar la barra de navegación en pantallas pequeñas -->
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
				aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Contenedor colapsable de la barra de navegación -->
			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<!-- Contenedor de búsqueda -->
					<div class="busqueda">
						<input type="text" id="bus" placeholder="Buscar"> <!-- Campo de búsqueda -->
						<div class="buttonb">
							<i class="fa fa-search"></i> <!-- Ícono de búsqueda -->
						</div>
					</div>
					<!-- Enlace a la página de inicio -->
					<li class="nav-item active">
						<a class="nav-link" href="perfil_cli.php">Inicio</a>
					</li>
					<!-- Enlace a la página de "¿Quiénes somos?" -->
					<li><a style="text-align: center;" class="nav-link" href="quienes_somos.php">¿Quienes Somos?</a></li>
					<!-- Enlace a la página de productos -->
					<li><a class="nav-link" href="productos_cli.php">Productos</a></li>
				</ul>
			</div>
		</div>

	</nav>


	<section id="containe"> <!-- Sección principal que contiene el carrusel de elementos -->
		<div class="containerr"> <!-- Contenedor principal para los elementos del carrusel -->
			<div class="slide"> <!-- Contenedor para las diapositivas del carrusel -->

				<div class="item" style="background-image: url('img/imagen66.jpg');"> <!-- Primer elemento con imagen de fondo -->
					<div class="content"> <!-- Contenedor para el contenido del elemento -->
						<div class="name">Información de contacto</div> <!-- Título del contenido -->
						<div class="des">Enlaces a redes sociales</div> <!-- Descripción breve del contenido -->
						<a href="quienes_somos.php"> <!-- Enlace a la página "quienes somos" -->
							<button id="buttoncate">Ver más</button></a> <!-- Botón para ver más información -->
					</div>
				</div>
				<div class="item" style="background-image: url('img/imagen1.jpg')"> <!-- Segundo elemento con imagen de fondo -->
					<div class="content"> <!-- Contenedor para el contenido del elemento -->
						<div class="name">Introducción al producto principal</div> <!-- Título del contenido -->
						<div class="des">Descripción breve de la panela</div> <!-- Descripción breve del contenido -->
						<a href="ver_mass.php"> <!-- Enlace a la página "ver más" -->
							<button id="buttoncate">Ver más</button></a> <!-- Botón para ver más información -->
					</div>
				</div>
				<div class="item" style="background-image: url('img/imagen22.png');"> <!-- Tercer elemento con imagen de fondo -->
					<div class="content"> <!-- Contenedor para el contenido del elemento -->
						<div class="name">Proceso de producción sostenible</div> <!-- Título del contenido -->
						<div class="des">Impacto positivo en las comunidades locales</div> <!-- Descripción breve del contenido -->
						<a href="quienes_somos.php"> <!-- Enlace a la página "quienes somos" -->
							<button id="buttoncate">Ver más</button></a> <!-- Botón para ver más información -->
					</div>
				</div>
				<div class="item" style="background-image: url('img/imagen33.jpg');"> <!-- Cuarto elemento con imagen de fondo -->
					<div class="content"> <!-- Contenedor para el contenido del elemento -->
						<div class="name">Variedades de panela y derivados</div> <!-- Título del contenido -->
						<div class="des">Diferentes tipos y presentaciones de panela</div> <!-- Descripción breve del contenido -->
						<a href="productos_cli.php"> <!-- Enlace a la página "productos" -->
							<button id="buttoncate">Ver más</button></a> <!-- Botón para ver más información -->
					</div>
				</div>
				<div class="item" style="background-image: url('img/imagen44.jpg');"> <!-- Quinto elemento con imagen de fondo -->
					<div class="content"> <!-- Contenedor para el contenido del elemento -->
						<div class="name">Cultura y tradición</div> <!-- Título del contenido -->
						<div class="des">Fiestas o celebraciones donde la panela es protagonista</div> <!-- Descripción breve del contenido -->
						<a href="ver_mass.php"> <!-- Enlace a la página "ver más" -->
							<button id="buttoncate">Ver más</button></a> <!-- Botón para ver más información -->
					</div>
				</div>
				<div class="item" style="background-image: url('img/imagen55.jpeg')"> <!-- Sexto elemento con imagen de fondo -->
					<div class="content"> <!-- Contenedor para el contenido del elemento -->
						<div class="name">Beneficios para la Salud</div> <!-- Título del contenido -->
						<div class="des">Recetas y preparaciones hechas con panela</div> <!-- Descripción breve del contenido -->
						<a href="quienes_somos.php"> <!-- Enlace a la página "quienes somos" -->
							<button id="buttoncate">Ver más</button></a> <!-- Botón para ver más información -->
					</div>
				</div>
			</div>

			<div class="button"> <!-- Contenedor para los botones de navegación -->
				<button class="prev"><i class="fa-solid fa-arrow-left"></i></button> <!-- Botón para ir a la diapositiva anterior -->
				<button class="next"><i class="fa-solid fa-arrow-right"></i></button> <!-- Botón para ir a la siguiente diapositiva -->
			</div>
			<script src="js/index_animaciones1.js"></script> <!-- Enlace al archivo JavaScript que maneja la animación del carrusel -->
		</div>
	</section>



	</div>
	<section id="cuadrado">

		<br>
		<br>
	</section>



	<!-- About Start -->
	<div class="coontainer-xxl py-5">
		<div class="coontainer">
			<div class="row g-5 align-items-center">
				<div class="col-lg-6">
					<div class="row g-3">
						<div class="col-6 text-start">
							<img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/c1 (1).jpeg">
						</div>
						<div class="col-6 text-start">
							<img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/c1 (2).jpeg" style="margin-top: 25%;">
						</div>
						<div class="col-6 text-end">
							<img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/c1 (3).jpeg">
						</div>
						<div class="col-6 text-end">
							<img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/c4 (4).jpeg">
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<h5 class="section-title ff-secondary text-start text-primary fw-normal">PANEVI</h5>
					<h1 class="mb-6">SOBRE NOSOTROS</h1>
					<br>
					<p style="font-size: 18px; margin-right: 35px;"> En Panevi, somos apasionados por la panela de alta calidad. Fundada con el objetivo de
						rescatar y promover la tradición de la producción de panela en nuestra región, nos dedicamos
						a ofrecer un producto natural, saludable y lleno de sabor.</p>
					<br>
					<br>
					<center><a class="btnn btn-success py-3 px-5 mt-2" href="quienes_somos.php">Conocer más..</a></center>
				</div>



			</div>
		</div>
	</div>
	<!-- About End -->


	<!-- Service Start -->
	<div class="coontainer-xxl py-5">
		<div class="coontainer">
			<div class="row g-4">
				<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
					<div class="service-item rounded pt-3">
						<div class="p-4">
							<i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
							<h3>Nuestra</h3>
							<p style="font-size: 18px; margin-right: 35px;">Panela se elabora de manera artesanal.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
					<div class="service-item rounded pt-3">
						<div class="p-4">
							<i class="fa fa-3x fa-utensils text-primary mb-4"></i>
							<h3>Creemos</h3>
							<p style="font-size: 18px; margin-right: 35px;">Firmemente en la importancia de apoyar a los agricultores locales</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
					<div class="service-item rounded pt-3">
						<div class="p-4">
							<i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
							<h3>En Panevi</h3>
							<p style="font-size: 18px; margin-right: 35px;">No solo nos enfocamos en la calidad de nuestros productos.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
					<div class="service-item rounded pt-3">
						<div class="p-4">
							<i class="fa fa-3x fa-headset text-primary mb-4"></i>
							<h3>Endulzante</h3>
							<p style="font-size: 18px; margin-right: 35px;">Natural. rico en nutrientes y perfecto.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Service End -->


	<br>


	<!-- Team Start -->
	<div class="container-xxl pt-5 pb-3">
		<div class="container">
			<div class="text-center wow fadeInUp" data-wow-delay="0.1s">

				<h1 class="mb-5">Nuestros Árticulos</h1>
			</div>
			<div class="container-categories">
				<div class="card-category category-propiedades " style="background-image: url('img/imagen4.jpg');">

					<p>Propiedades</p>
					<a href="ver_mass.php" style="text-decoration: none;"><span>Ver más</span></a>
				</div>
				<div class="card-category category-beneficios" style="background-image: url('img/bene.jpg');">

					<p>Beneficios</p>
					<a href="ver_mass.php" style="text-decoration: none;"><span>Ver más</span></a>
				</div>
				<div class="card-category category-nutricional" style="background-image: url('img/valo.png');">
					<p>Valor Nutricional</p>
					<a href="ver_mass.php" style="text-decoration: none;"><span>Ver más</span></a>
				</div>
			</div>


		</div>
	</div>
	</div>






	<!-- Testimonial Start -->
	<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
		<div class="container">
			<div class="text-center">
				<h5 class="section-title ff-secondary text-center text-primary fw-normal">Acerca de la PANELA</h5>
				<h1 class="mb-5">Importancia!!!</h1>
			</div>
			<div class="owl-carousel testimonial-carousel">
				<div class="testimonial-item bg-transparent border rounded p-4">
					<i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
					<p class="card-text" style="font-size: 16px">¿Sabías que la panela se produce de manera artesanal en muchas comunidades rurales? El proceso de producción de la panela incluye la extracción del jugo de caña, su cocción y moldeado en formas típicas.</p>
					<div class="d-flex align-items-center">
						<img class="img-fluid flex-shrink-0 rounded-circle" src="img/produ.jpg" style="width: 50px; height: 50px;">
						<div class="ps-3">
							<h5 class="mb-1">Curiosidades</h5>
							<small>Producción</small>
						</div>
					</div>
				</div>
				<div class="testimonial-item bg-transparent border rounded p-4">
					<i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
					<p class="card-text" style="font-size: 16px">Aguapanela con limón, flan de panela y galletas de panela son algunas recetas populares que utilizan panela como ingrediente principal. Son deliciosas y fáciles de preparar.</p>
					<div class="d-flex align-items-center">
						<img class="img-fluid flex-shrink-0 rounded-circle" src="img/bene.jpg" style="width: 50px; height: 50px;">
						<div class="ps-3">
							<h5 class="mb-1">Recetas </h5>
							<small>Populares</small>
						</div>
					</div>
				</div>
				<div class="testimonial-item bg-transparent border rounded p-4">
					<i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
					<p class="card-text" style="font-size: 16px">La producción de panela apoya a miles de familias rurales, proporcionando empleo y mejorando la calidad de vida. Comprar panela ayuda a conservar tradiciones ancestrales y promueve prácticas agrícolas sostenibles.</p>
					<div class="d-flex align-items-center">
						<img class="img-fluid flex-shrink-0 rounded-circle" src="img/comu.jpg" style="width: 50px; height: 50px;">
						<div class="ps-3">
							<h5 class="mb-1">Impacto Positivo</h5>
							<small>Comunidades</small>
						</div>
					</div>
				</div>
				<div class="testimonial-item bg-transparent border rounded p-4">
					<i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
					<p class="card-text" style="font-size: 16px">La producción de panela suele ser más sostenible comparada con el azúcar refinado, ya que utiliza menos químicos y procesos industriales. Apoya la biodiversidad local al fomentar prácticas agrícolas que protegen los ecosistemas.</p>
					<div class="d-flex align-items-center">
						<img class="img-fluid flex-shrink-0 rounded-circle" src="img/natu.jpg" style="width: 50px; height: 50px;">
						<div class="ps-3">
							<h5 class="mb-1">Panela </h5>
							<small>Medio Ambiente</small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Testimonial End -->




	<!-- Nuetros Productos -->
	<div class="container-xxl py-5 bg-dark hero-header mb-5" style="background-image: url('img/histo1.jpg');">
		<div class="container text-center my-5 pt-5 pb-4 ">

		</div>

	</div>
	<center>
		<h1 class="section-title mb-4" style="color: black">Conoce la Panela y Nuestros Productos
		</h1>
	</center>

	<section class="container productos-section mt-5">
		<div class="row">
			<div class="col-md-4 mb-4">
				<div class="card product-card">
					<img src="img/panelas_unidad.jpg" class="card-img-top" alt="Panela Tradicional">
					<div class="card-body">
						<h5 class="card-title" style="color: #1a3e14; text-align: center; font-size: 20px">Panela Tradicional</h5>
						<p class="card-text" style="text-align: center; font-size: 15px">La panela es un endulzante natural que proviene de la caña de azúcar, sin procesos químicos. Es ideal para endulzar bebidas y postres de manera saludable.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-4">
				<div class="card product-card">
					<img src="img/vari.jpg" class="card-img-top" alt="Panela con Cacao">
					<div class="card-body">
						<h5 class="card-title" style="color: #1a3e14; text-align: center">Panela en Polvo</h5>
						<p class="card-text" style="text-align: center; font-size: 15px">La presentación en polvo de la panela es ideal para disolver rápidamente en líquidos, perfecta para preparar bebidas calientes o batidos naturales.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-4">
				<div class="card product-card">
					<img src="img/miell.jpg" class="card-img-top" alt="Panela Granulada">
					<div class="card-body">
						<h5 class="card-title" style="color: #1a3e14; text-align: center">Panela en Miel</h5>
						<p class="card-text" style="text-align: center; font-size: 15px">Nuestra Miel de Panela combina la dulzura natural de la panela con las propiedades nutritivas de la miel, ofreciendo un producto único y saludable.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="container mt-8">
		<div class="row">
			<div class="col-12">
				<div class="card shadow-lg border-0">
					<div class="card-body">
						<p class="card-text" style="font-size: 16px; text-align: justify;">La panela es un endulzante natural y saludable, elaborado a partir de la caña de azúcar sin procesos
							químicos. En nuestra tienda ofrecemos una variedad de productos de panela, cuidadosamente seleccionados
							para llevar a tu mesa lo mejor de este delicioso y nutritivo ingrediente. Descubre nuestras presentaciones
							y disfruta de la autenticidad y el sabor que la panela ofrece. ¡Tu opción ideal para una vida más sana
							y dulce!</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br>
	<br>
	<div class="text-center">

		<h2 class="section-title mb-4" style="color: #275d1e; margin-right: 50px;">Derivados de la Panela</h2>
	</div>
	<section class="container productos-section mt-5"> <!-- Sección principal que contiene todos los productos -->
		<div class="row"> <!-- Fila que agrupa los productos en columnas -->
			<div class="col-md-2 mb-3"> <!-- Columna para el primer producto -->
				<div class="card product-card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"> <!-- Tarjeta que representa el producto con sombra -->
					<img src="img/melcoo.jpg" class="card-img-top" alt="Panela Tradicional" style="border-radius: 15px 15px 0 0;"> <!-- Imagen del producto con bordes redondeados en la parte superior -->
					<div class="card-body"> <!-- Cuerpo de la tarjeta que contiene el título y la descripción -->
						<h5 class="card-title" style="color: #1a3e14; text-align: center">Melcochas</h5> <!-- Título del producto -->
						<p class="card-text" style="text-align: center; font-size: 14px;">Las melcochas de panela son dulces tradicionales, masticables y pegajosos, hechos calentando panela y mezclándola con ingredientes como coco.</p> <!-- Descripción del producto -->
						<div class="text-center"> <!-- Centro de la tarjeta para el botón de compra -->
							<a href="productos_cli.php"> <!-- Enlace a la página de productos -->
								<button style="background-color: #1a3e14; border-color: #1a3e14;" class="btn btn-success"> <!-- Botón de compra con estilo personalizado -->
									<i class="fas fa-shopping-cart"></i> <!-- Icono de carrito de compras -->
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-3"> <!-- Columna para el segundo producto -->
				<div class="card product-card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"> <!-- Tarjeta del producto -->
					<img src="img/aguapa.jpg" class="card-img-top" alt="Panela Granulada" style="border-radius: 15px 15px 0 0;"> <!-- Imagen del producto -->
					<div class="card-body"> <!-- Cuerpo de la tarjeta -->
						<h5 class="card-title" style="color: #1a3e14; text-align: center">Bebidas de panela</h5> <!-- Título del producto -->
						<p class="card-text" style="text-align: center; font-size: 14px;">Las bebidas de panela son preparadas disolviendo panela en agua, a veces con saborizantes como limón o canela.</p> <!-- Descripción del producto -->
						<div class="text-center"> <!-- Centro de la tarjeta para el botón de compra -->
							<a href="productos_cli.php"> <!-- Enlace a la página de productos -->
								<button style="background-color: #1a3e14; border-color: #1a3e14;" class="btn btn-success"> <!-- Botón de compra -->
									<i class="fas fa-shopping-cart"></i> <!-- Icono de carrito de compras -->
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-3"> <!-- Columna para el tercer producto -->
				<div class="card product-card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"> <!-- Tarjeta del producto -->
					<img src="img/panelitas.jpg" class="card-img-top" alt="Panela con Cacao" style="border-radius: 15px 15px 0 0;"> <!-- Imagen del producto -->
					<div class="card-body"> <!-- Cuerpo de la tarjeta -->
						<h5 class="card-title" style="color: #1a3e14; text-align: center">Panelitas</h5> <!-- Título del producto -->
						<p class="card-text" style="text-align: center; font-size: 14px;">Las panelitas son pequeñas golosinas hechas a base de panela, a menudo enriquecidas con ingredientes adicionales como coco, leche o frutos secos.</p> <!-- Descripción del producto -->
						<div class="text-center"> <!-- Centro de la tarjeta para el botón de compra -->
							<a href="productos_cli.php"> <!-- Enlace a la página de productos -->
								<button style="background-color: #1a3e14; border-color: #1a3e14;" class="btn btn-success"> <!-- Botón de compra -->
									<i class="fas fa-shopping-cart"></i> <!-- Icono de carrito de compras -->
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-3"> <!-- Columna para el cuarto producto -->
				<div class="card product-card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"> <!-- Tarjeta del producto -->
					<img src="img/coca.jpg" class="card-img-top" alt="Cocadas" style="border-radius: 15px 15px 0 0;"> <!-- Imagen del producto -->
					<div class="card-body"> <!-- Cuerpo de la tarjeta -->
						<h5 class="card-title" style="color: #1a3e14; text-align: center">Cocadas</h5> <!-- Título del producto -->
						<p class="card-text" style="text-align: center; font-size: 14px;">Las cocadas de panela son dulces tradicionales elaborados con coco rallado y panela, con una textura suave y un delicioso sabor a coco caramelizado.</p> <!-- Descripción del producto -->
						<div class="text-center"> <!-- Centro de la tarjeta para el botón de compra -->
							<a href="productos_cli.php"> <!-- Enlace a la página de productos -->
								<button style="background-color: #1a3e14; border-color: #1a3e14;" class="btn btn-success"> <!-- Botón de compra -->
									<i class="fas fa-shopping-cart"></i> <!-- Icono de carrito de compras -->
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-3"> <!-- Columna para el quinto producto -->
				<div class="card product-card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"> <!-- Tarjeta del producto -->
					<img src="img/alfa.jpg" class="card-img-top" alt="Alfeñiques" style="border-radius: 15px 15px 0 0;"> <!-- Imagen del producto -->
					<div class="card-body"> <!-- Cuerpo de la tarjeta -->
						<h5 class="card-title" style="color: #1a3e14; text-align: center">Alfandoques</h5> <!-- Título del producto -->
						<p class="card-text" style="text-align: center; font-size: 14px;">Los alfandoques de panela son dulces tradicionales colombianos hechos con panela tradicional, también conocida como papelón o raspadura.</p> <!-- Descripción del producto -->
						<div class="text-center"> <!-- Centro de la tarjeta para el botón de compra -->
							<a href="productos_cli.php"> <!-- Enlace a la página de productos -->
								<button style="background-color: #1a3e14; border-color: #1a3e14;" class="btn btn-success"> <!-- Botón de compra -->
									<i class="fas fa-shopping-cart"></i> <!-- Icono de carrito de compras -->
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-3"> <!-- Columna para el sexto producto -->
				<div class="card product-card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"> <!-- Tarjeta del producto -->
					<img src="img/dulce.jpg" class="card-img-top" alt="Café endulzado con panela" style="border-radius: 15px 15px 0 0;"> <!-- Imagen del producto -->
					<div class="card-body"> <!-- Cuerpo de la tarjeta -->
						<h5 class="card-title" style="color: #1a3e14; text-align: center">Dulces de café con panela</h5> <!-- Título del producto -->
						<p class="card-text" style="text-align: center; font-size: 14px;">Los dulces de café con panela son un postre que combina la riqueza del café puro con la dulzura de dicha panela colombiana.</p> <!-- Descripción del producto -->
						<div class="text-center"> <!-- Centro de la tarjeta para el botón de compra -->
							<a href="productos_cli.php"> <!-- Enlace a la página de productos -->
								<button style="background-color: #1a3e14; border-color: #1a3e14;" class="btn btn-success"> <!-- Botón de compra -->
									<i class="fas fa-shopping-cart"></i> <!-- Icono de carrito de compras -->
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="container mt-5">
		<div class="row">
			<div class="col-12">
				<div class="card shadow-lg border-0">
					<div class="card-body">
						<center>
							<h2 class="section-title mb-4" style="color: #275d1e; margin-right: 50px;">¡Únete a Nuestra Dulce Tradición! </h2>
						</center>
						<p class="card-text" style="font-size: 16px; text-align: center;">La panela es mucho más que un simple endulzante; es un ingrediente lleno de historia, cultura y beneficios para la salud. Desde su producción artesanal hasta su impacto positivo en las comunidades rurales y el medio ambiente, la panela representa una opción sostenible y nutritiva. Te invitamos a descubrir y disfrutar de nuestros productos de panela, apoyando así a los productores locales y promoviendo un estilo de vida más saludable y natural. ¡Gracias por visitar nuestra página y ser parte de esta dulce tradición!</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br>
	<br>
	<style>
		.product-card {
			border: none;
			border-radius: 10px;
			overflow: hidden;
			box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
			transition: transform 0.3s;
		}

		.product-card:hover {
			transform: scale(1.05);
		}

		.card-title {
			font-size: 1.25rem;
			font-weight: bold;
		}

		.card-text {
			color: #555;
		}

		.card img {
			height: 200px;
			object-fit: cover;
		}

		.section-title {
			text-align: center;
			margin-bottom: 30px;
			color: #28a745;
			font-weight: bold;
			font-size: 2rem;
		}
	</style>
	<footer class="footer-section"> <!-- Inicio de la sección del pie de página -->
		<div class="container relative"> <!-- Contenedor principal para el contenido del pie de página -->

			<div class="row g-5 mb-5"> <!-- Fila principal que contiene columnas para el contenido -->
				<div class="col-lg-4"> <!-- Columna para el logo y enlaces de redes sociales -->
					<div class="mb-4 footer-logo-wrap" style="font-size: 45px;color: white">
						<span>PANEVI</span> <!-- Nombre o logo de la empresa -->
					</div>

					<p class="mb-4"></p> <!-- Espacio en blanco (puede ser para margen) -->

					<ul class="list-unstyled custom-social"> <!-- Lista de enlaces de redes sociales -->
						<li>
							<a href="https://www.facebook.com/profile.php?id=61552234777986&locale=es_LA">
								<span class="fa fa-brands fa-facebook-f"></span> <!-- Icono de Facebook -->
							</a>
						</li>
						<li>
							<a href="https://www.instagram.com/innovatech_4/">
								<span class="fa fa-brands fa-instagram"></span> <!-- Icono de Instagram -->
							</a>
						</li>
						<li>
							<a href="https://wa.me/573102307944">
								<span class="fa fa-brands fa-whatsapp"></span> <!-- Icono de WhatsApp -->
							</a>
						</li>
					</ul>
				</div>

				<div class="col-lg-8"> <!-- Columna para los enlaces informativos -->
					<div class="row links-wrap"> <!-- Fila para los enlaces agrupados -->
						<div style="margin-left: 15%;" class="col-6 col-sm-6 col-md-3"> <!-- Primera columna de enlaces -->
							<ul class="list-unstyled">
								<li style="color: white; text-transform: uppercase;font-size: 20px">Información</li> <!-- Título de la sección -->
								<li><a href="#" style="color: grey">Acerca de Nosotros</a></li> <!-- Enlace a información sobre la empresa -->
								<li><a href="#" style="color: grey">Politicas de Privacidad</a></li> <!-- Enlace a políticas de privacidad -->
								<li><a href="#" style="color: grey">Términos y Condiciones</a></li> <!-- Enlace a términos y condiciones -->
							</ul>
						</div>

						<div class="col-6 col-sm-6 col-md-3"> <!-- Segunda columna de enlaces -->
							<ul class="list-unstyled">
								<li style="color: white; text-transform: uppercase;font-size: 20px">MI CUENTA</li> <!-- Título de la sección -->
								<li><a href="#" style="color: grey">Mi Cuenta</a></li> <!-- Enlace a la cuenta del usuario -->
								<li><a href="#" style="color: grey">Mi información</a></li> <!-- Enlace a la información del usuario -->
							</ul>
						</div>

						<div class="col-6 col-sm-6 col-md-3"> <!-- Tercera columna de información de contacto -->
							<ul class="list-unstyled">
								<li style="color: white; text-transform: uppercase;font-size: 20px">CONTACTO</li> <!-- Título de la sección -->
								<li>Teléfono: 3102307944</li> <!-- Número de teléfono de contacto -->
								<li>Ciudad: Villeta</li> <!-- Ciudad de la empresa -->
								<li>Código postal: 253410</li> <!-- Código postal de la empresa -->
							</ul>
						</div>

						<div class="col-6 col-sm-6 col-md-3"> <!-- Cuarta columna vacía (puede ser para futuros enlaces) -->
							<ul class="list-unstyled">
								<li><a href="#"></a></li> <!-- Espacio vacío para un posible enlace -->
								<li><a href="#"></a></li> <!-- Espacio vacío para otro posible enlace -->
							</ul>
						</div>
					</div>
				</div>

			</div>

			<div class="border-top copyright"> <!-- Sección de derechos de autor -->
				<div class="row pt-4"> <!-- Fila para organizar contenido en la sección de derechos -->
					<div class="col-lg-6"> <!-- Columna para el texto de derechos de autor -->
						<p class="mb-2 text-center text-lg-start">Derechos de Autor &copy;
							<script>
								document.write(new Date().getFullYear()); <!--Inserta el año actual-->
							</script>. Todos los derechos reservados.<br>
							Correo: innovatech004@gmail.com <!-- Correo de contacto -->
						</p>
						<!-- License information: https://untree.co/license/ --> <!-- Comentario sobre la información de licencia -->
					</div>

					<div class="col-lg-6 text-center text-lg-end"> <!-- Columna para un mensaje adicional -->
						<ul class="list-unstyled d-inline-flex ms-auto">
							<li class="me-4" style="color: white; font-size: 18px">Panevi - Endulza tu vida</li> <!-- Mensaje promocional -->
						</ul>
					</div>

				</div>
			</div>

		</div>
	</footer> <!-- Fin de la sección del pie de página -->


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
	<script src="lib/owlcarousel/owl.carousel.min.js"></script>
	<script src="lib/tempusdominus/js/moment.min.js"></script>
	<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
	<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

	<!-- Template Javascript -->
	<script src="js/main1.js"></script>
</body>

</html>