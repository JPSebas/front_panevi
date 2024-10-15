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
	<title>Panevi</title>
</head>

<body>

	<!-- Barra de navegación personalizada -->
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
		<!-- Contenedor de logo e imágenes en la cabecera -->
		<div class="container-logo">

			<div class="header-images">
				<img src="img/logo_nav (1).png " id="logo">
				<!-- Varias imágenes consecutivas -->
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
			<!-- Botón de menú para versiones móviles -->
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
				aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- Opciones del menú -->
			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<!-- Barra de búsqueda -->
					<div class="busqueda">
						<input type="text" id="bus" placeholder="Buscar">
						<div class="buttonb">
							<i class="fa fa-search"></i>
						</div>
					</div>
					<!-- Enlaces de navegación -->
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Inicio</a>
					</li>
					<li><a style="text-align: center" class="nav-link" href="login.php">Ingresar</a></li>
					<li><a class="nav-link" href="registro.php">Registrarse</a></li>
					<li><a class="nav-link" href="productos.php">Productos</a></li>


				</ul>


			</div>
		</div>

	</nav>

	<!-- Sección principal de la página, con un ID para estilización o manipulación con JavaScript -->
	<section id="containe">
		<div class="containerr"><!-- Un contenedor para los elementos deslizantes -->
			<div class="slide"><!-- Sección de deslizamiento de imágenes/items -->
				<!-- Cada "item" representa un elemento que puede ser mostrado en el slider -->
				<div class="item" style="background-image: url('img/imagen66.jpg');">
					<!-- Contenido del item -->
					<div class="content">
						<div class="name">Información de contacto</div><!-- Título del item -->
						<br>
						<div class="des">Enlaces a redes sociales</div><!-- Descripción del item -->
						<br>
						<button id="buttoncate">Ver más</button><!-- Botón que podría llevar a otra sección -->
					</div>
				</div>
				<!-- Otros "items" que siguen el mismo patrón -->
				<div class="item" style="background-image: url('img/imagen1.jpg')">
					<div class="content">
						<div class="name">Introducción al producto principal</div>
						<div class="des">Descripción breve de la panela</div>
						<a href="ver_mas.php">
							<button id="buttoncate">Ver más</button></a><!-- Botón que enlaza a otra página -->
					</div>
				</div>
				<div class="item" style="background-image: url('img/imagen22.png');">
					<div class="content">
						<div class="name">Proceso de producción sostenible</div>
						<div class="des">Impacto positivo en las comunidades locales</div>
						<a href="ver_mas.php">
							<button id="buttoncate">Ver más</button></a>
					</div>
				</div>
				<div class="item" style="background-image: url('img/imagen33.jpg');">
					<div class="content">
						<div class="name">Variedades de panela y derivados</div>
						<div class="des">Diferentes tipos y presentaciones de panela</div>
						<a href="productos.php">
							<button id="buttoncate">Ver más</button></a>
					</div>
				</div>
				<div class="item" style="background-image: url('img/imagen44.jpg');">
					<div class="content">
						<div class="name">Cultura y tradición</div>
						<div class="des">Fiestas o celebraciones donde la panela es protagonista</div>
						<a href="ver_mas.php">
							<button id="buttoncate">Ver más</button></a>
					</div>
				</div>
				<div class="item" style="background-image: url('img/imagen55.jpeg')">
					<div class="content">
						<div class="name">Información de contacto</div>
						<div class="des">Enlaces a redes sociales</div>
						<a href="ver_mas.php">
							<button id="buttoncate">Ver más</button></a>
					</div>
				</div>
			</div>

			<!-- Contenedor para los botones de navegación -->
			<div class="button">
				<button class="prev"><i class="fa-solid fa-arrow-left"></i></button><!-- Botón para retroceder en el slider -->
				<button class="next"><i class="fa-solid fa-arrow-right"></i></button> <!-- Botón para avanzar en el slider -->
			</div>
			<script src="js/index_animaciones1.js"></script> <!-- Script para manejar animaciones en el slider -->
		</div>
	</section>


	</div>
	<section id="cuadrado"><!-- Sección adicional, posiblemente para separación o diseño -->

		<br>
		<br>
	</section>


	<!-- About Start -->
	<div class="coontainer-xxl py-5"> <!-- Contenedor principal para la sección 'Sobre nosotros' -->
		<div class="coontainer"> <!-- Contenedor interno -->
			<div class="row g-5 align-items-center"> <!-- Fila de contenido con alineación -->
				<div class="col-lg-6"> <!-- Columna para imágenes -->
					<div class="row g-3"> <!-- Sub-fila de imágenes -->
						<div class="col-6 text-start"> <!-- Primera columna de imagen -->
							<img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/c1 (1).jpeg"> <!-- Imagen -->
						</div>
						<div class="col-6 text-start"> <!-- Segunda columna de imagen -->
							<img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/c1 (2).jpeg" style="margin-top: 25%;"> <!-- Imagen con margen superior -->
						</div>
						<div class="col-6 text-end"> <!-- Tercera columna de imagen -->
							<img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/c1 (3).jpeg"> <!-- Imagen -->
						</div>
						<div class="col-6 text-end"> <!-- Cuarta columna de imagen -->
							<img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/c4 (4).jpeg"> <!-- Imagen -->
						</div>
					</div>
				</div>
				<div class="col-lg-5"> <!-- Columna para texto -->
					<h5 class="section-title ff-secondary text-start text-primary fw-normal">PANEVI</h5> <!-- Título de sección -->
					<h1 class="mb-6">SOBRE NOSOTROS</h1> <!-- Subtítulo -->
					<br>
					<p style="font-size: 18px; margin-right: 35px;"> En Panevi, somos apasionados por la panela de alta calidad. Fundada con el objetivo de
						rescatar y promover la tradición de la producción de panela en nuestra región, nos dedicamos
						a ofrecer un producto natural, saludable y lleno de sabor.</p> <!-- Descripción de la empresa -->
					<br>
					<br>
					<center><a class="btnn btn-success py-3 px-5 mt-2" href="quienes_somos">Conocer más..</a></center> <!-- Botón para más información -->
				</div>
			</div>
		</div>
	</div>
	<!-- About End -->


	<!-- Service Start -->
	<div class="coontainer-xxl py-5"> <!-- Contenedor para la sección de servicios -->
		<div class="coontainer"> <!-- Contenedor interno -->
			<div class="row g-4"> <!-- Fila para los servicios -->
				<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s"> <!-- Primer servicio -->
					<div class="service-item rounded pt-3"> <!-- Contenedor del servicio -->
						<div class="p-4"> <!-- Contenedor del contenido -->
							<i class="fa fa-3x fa-user-tie text-primary mb-4"></i> <!-- Icono del servicio -->
							<h3>Nuestra</h3> <!-- Título del servicio -->
							<p style="font-size: 18px; margin-right: 35px;">Panela se elabora de manera artesanal.</p> <!-- Descripción del servicio -->
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s"> <!-- Segundo servicio -->
					<div class="service-item rounded pt-3">
						<div class="p-4">
							<i class="fa fa-3x fa-utensils text-primary mb-4"></i>
							<h3>Creemos</h3>
							<p style="font-size: 18px; margin-right: 35px;">Firmemente en la importancia de apoyar a los agricultores locales</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s"> <!-- Tercer servicio -->
					<div class="service-item rounded pt-3">
						<div class="p-4">
							<i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
							<h3>En Panevi</h3>
							<p style="font-size: 18px; margin-right: 35px;">No solo nos enfocamos en la calidad de nuestros productos.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s"> <!-- Cuarto servicio -->
					<div class="service-item rounded pt-3">
						<div class="p-4">
							<i class="fa fa-3x fa-headset text-primary mb-4"></i>
							<h3>Endulzante</h3>
							<p style="font-size: 18px; margin-right: 35px;">Natural. La panela es un endulzante natural.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Service End -->

	<br>


	<!-- Testimonial Start -->
	<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s"> <!-- Contenedor para testimonios con efecto de animación -->
		<div class="container"> <!-- Contenedor interno -->
			<div class="text-center"> <!-- Alineación de texto al centro -->
				<h5 class="section-title ff-secondary text-center text-primary fw-normal">Acerca de la PANELA</h5> <!-- Título de sección -->
				<h1 class="mb-5">Importancia!!!</h1> <!-- Subtítulo -->
			</div>
			<div class="owl-carousel testimonial-carousel"> <!-- Carrusel para testimonios -->
				<div class="testimonial-item bg-transparent border rounded p-4"> <!-- Elemento de testimonio -->
					<i class="fa fa-quote-left fa-2x text-primary mb-3"></i> <!-- Ícono de cita -->
					<p class="card-text" style="font-size: 16px">¿Sabías que la panela se produce de manera artesanal en muchas comunidades rurales? El proceso de producción de la panela incluye la extracción del jugo de caña, su cocción y moldeado en formas típicas.</p> <!-- Texto del testimonio -->
					<div class="d-flex align-items-center"> <!-- Contenedor para imagen y texto del autor -->
						<img class="img-fluid flex-shrink-0 rounded-circle" src="img/produ.jpg" style="width: 50px; height: 50px;"> <!-- Imagen del autor -->
						<div class="ps-3"> <!-- Contenedor para el nombre y descripción -->
							<h5 class="mb-1">Curiosidades</h5> <!-- Nombre del autor -->
							<small>Producción</small> <!-- Descripción -->
						</div>
					</div>
				</div>
				<div class="testimonial-item bg-transparent border rounded p-4"> <!-- Otro testimonio -->
					<i class="fa fa-quote-left fa-2x text-primary mb-3"></i> <!-- Ícono de cita -->
					<p class="card-text" style="font-size: 16px">Aguapanela con limón, flan de panela y galletas de panela son algunas recetas populares que utilizan panela como ingrediente principal. Son deliciosas y fáciles de preparar.</p> <!-- Texto del testimonio -->
					<div class="d-flex align-items-center"> <!-- Contenedor para imagen y texto del autor -->
						<img class="img-fluid flex-shrink-0 rounded-circle" src="img/rece.jpg" style="width: 50px; height: 50px;"> <!-- Imagen del autor -->
						<div class="ps-3"> <!-- Contenedor para el nombre y descripción -->
							<h5 class="mb-1">Recetas </h5> <!-- Nombre del autor -->
							<small>Populares</small> <!-- Descripción -->
						</div>
					</div>
				</div>
				<div class="testimonial-item bg-transparent border rounded p-4"> <!-- Otro testimonio -->
					<i class="fa fa-quote-left fa-2x text-primary mb-3"></i> <!-- Ícono de cita -->
					<p class="card-text" style="font-size: 16px">La producción de panela apoya a miles de familias rurales, proporcionando empleo y mejorando la calidad de vida. Comprar panela ayuda a conservar tradiciones ancestrales y promueve prácticas agrícolas sostenibles.</p> <!-- Texto del testimonio -->
					<div class="d-flex align-items-center"> <!-- Contenedor para imagen y texto del autor -->
						<img class="img-fluid flex-shrink-0 rounded-circle" src="img/comu.jpg" style="width: 50px; height: 50px;"> <!-- Imagen del autor -->
						<div class="ps-3"> <!-- Contenedor para el nombre y descripción -->
							<h5 class="mb-1">Impacto Positivo</h5> <!-- Nombre del autor -->
							<small>Comunidades</small> <!-- Descripción -->
						</div>
					</div>
				</div>
				<div class="testimonial-item bg-transparent border rounded p-4"> <!-- Otro testimonio -->
					<i class="fa fa-quote-left fa-2x text-primary mb-3"></i> <!-- Ícono de cita -->
					<p class="card-text" style="font-size: 16px">La producción de panela suele ser más sostenible comparada con el azúcar refinado, ya que utiliza menos químicos y procesos industriales. Apoya la biodiversidad local al fomentar prácticas agrícolas que protegen los ecosistemas.</p> <!-- Texto del testimonio -->
					<div class="d-flex align-items-center"> <!-- Contenedor para imagen y texto del autor -->
						<img class="img-fluid flex-shrink-0 rounded-circle" src="img/natu.jpg" style="width: 50px; height: 50px;"> <!-- Imagen del autor -->
						<div class="ps-3"> <!-- Contenedor para el nombre y descripción -->
							<h5 class="mb-1">Panela </h5> <!-- Nombre del autor -->
							<small>Medio Ambiente</small> <!-- Descripción -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Testimonial End -->




	<!-- Nuestros Productos -->
	<div class="container-xxl py-5 bg-dark hero-header mb-5" style="background-image: url('img/produ_pane.jpeg');"> <!-- Sección de productos con fondo de imagen -->
		<div class="container text-center my-5 pt-5 pb-4 "> <!-- Contenedor para el título -->
			<h1 class="section-title mb-4" style="color: #ffff; margin-right: 50px;">Conoce la Panela y Nuestros Productos</h1> <!-- Título de sección -->
		</div>
	</div>

	<!-- Sección principal de productos -->
	<section class="container productos-section mt-5">
		<div class="row"><!-- Contenedor de filas para productos -->
			<div class="col-md-4 mb-4"><!-- Columna para el primer producto -->
				<div class="card product-card"><!-- Tarjeta del producto -->
					<img src="img/panelas_unidad.jpg" class="card-img-top" alt="Panela Tradicional"><!-- Imagen del producto -->
					<div class="card-body"> <!-- Cuerpo de la tarjeta -->
						<h5 class="card-title" style="color: #1a3e14; text-align: center; font-size: 20px">Panela Tradicional</h5><!-- Título del producto -->
						<p class="card-text" style="text-align: center; font-size: 15px">La panela es un endulzante natural que proviene de la caña de azúcar, sin procesos químicos. Es ideal para endulzar bebidas y postres de manera saludable.</p><!-- Descripción del producto -->
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-4"> <!-- Columna para el segundo producto -->
				<div class="card product-card"> <!-- Tarjeta del producto -->
					<img src="img/vari.jpg" class="card-img-top" alt="Panela con Cacao"> <!-- Imagen del producto -->
					<div class="card-body"> <!-- Cuerpo de la tarjeta -->
						<h5 class="card-title" style="color: #1a3e14; text-align: center">Panela en Polvo</h5> <!-- Título del producto -->
						<p class="card-text" style="text-align: center; font-size: 15px">La presentación en polvo de la panela es ideal para disolver rápidamente en líquidos, perfecta para preparar bebidas calientes o batidos naturales.</p> <!-- Descripción del producto -->
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-4"> <!-- Columna para el tercer producto -->
				<div class="card product-card"> <!-- Tarjeta del producto -->
					<img src="img/miell.jpg" class="card-img-top" alt="Panela Granulada"> <!-- Imagen del producto -->
					<div class="card-body"> <!-- Cuerpo de la tarjeta -->
						<h5 class="card-title" style="color: #1a3e14; text-align: center">Panela en Miel</h5> <!-- Título del producto -->
						<p class="card-text" style="text-align: center; font-size: 15px">Nuestra Miel de Panela combina la dulzura natural de la panela con las propiedades nutritivas de la miel, ofreciendo un producto único y saludable.</p> <!-- Descripción del producto -->
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
	<section class="container mt-8"> <!-- Sección que describe la panela -->
		<div class="row"> <!-- Contenedor de fila para la descripción -->
			<div class="col-12"> <!-- Columna que ocupa todo el ancho -->
				<div class="card shadow-lg border-0"> <!-- Tarjeta para la descripción -->
					<div class="card-body"> <!-- Cuerpo de la tarjeta -->
						<p class="card-text" style="font-size: 16px; text-align: justify;">La panela es un endulzante natural y saludable, elaborado a partir de la caña de azúcar sin procesos
							químicos. En nuestra tienda ofrecemos una variedad de productos de panela, cuidadosamente seleccionados
							para llevar a tu mesa lo mejor de este delicioso y nutritivo ingrediente. Descubre nuestras presentaciones
							y disfruta de la autenticidad y el sabor que la panela ofrece. ¡Tu opción ideal para una vida más sana
							y dulce!</p> <!-- Descripción de la panela -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<br> <!-- Espaciado en blanco -->
	<br> <!-- Espaciado en blanco -->

	<div class="text-center"> <!-- Contenedor para centrar el título -->
		<h2 class="section-title mb-4" style="color: #275d1e; margin-right: 50px;">Derivados de la Panela</h2> <!-- Título de la sección de derivados -->
	</div>

	<section class="container productos-section mt-5"> <!-- Sección de derivados de la panela -->
		<div class="row"> <!-- Contenedor de filas para derivados -->
			<div class="col-md-2 mb-3"> <!-- Columna para el primer derivado -->
				<div class="card product-card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"> <!-- Tarjeta del derivado -->
					<img src="img/melcoo.jpg" class="card-img-top" alt="Panela Tradicional" style="border-radius: 15px 15px 0 0;"> <!-- Imagen del derivado -->
					<div class="card-body"> <!-- Cuerpo de la tarjeta -->
						<h5 class="card-title" style="color: #1a3e14; text-align: center">Melcochas</h5> <!-- Título del derivado -->
						<p class="card-text" style="text-align: center; font-size: 14px;">Las melcochas de panela son dulces tradicionales, masticables y pegajosos, hechos calentando panela y mezclándola con ingredientes como coco.</p> <!-- Descripción del derivado -->
						<div class="text-center"> <!-- Contenedor para centrar el botón -->
							<a href="productos.php"> <!-- Enlace a la página de productos -->
								<button style="background-color: #1a3e14; border-color: #1a3e14;" class="btn btn-success"> <!-- Botón para comprar -->
									<i class="fas fa-shopping-cart"></i> <!-- Icono del carrito de compras -->
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-3"> <!-- Columna para el segundo derivado -->
				<div class="card product-card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"> <!-- Tarjeta del derivado -->
					<img src="img/aguapa.jpg" class="card-img-top" alt="Panela Granulada" style="border-radius: 15px 15px 0 0;"> <!-- Imagen del derivado -->
					<div class="card-body"> <!-- Cuerpo de la tarjeta -->
						<h5 class="card-title" style="color: #1a3e14; text-align: center">Bebidas de panela</h5> <!-- Título del derivado -->
						<p class="card-text" style="text-align: center; font-size: 14px;">Las bebidas de panela son preparadas disolviendo panela en agua, a veces con saborizantes como limón o canela.</p> <!-- Descripción del derivado -->
						<div class="text-center"> <!-- Contenedor para centrar el botón -->
							<a href="productos.php"> <!-- Enlace a la página de productos -->
								<button style="background-color: #1a3e14; border-color: #1a3e14;" class="btn btn-success"> <!-- Botón para comprar -->
									<i class="fas fa-shopping-cart"></i> <!-- Icono del carrito de compras -->
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-3"> <!-- Columna para el tercer derivado -->
				<div class="card product-card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"> <!-- Tarjeta del derivado -->
					<img src="img/panelitas.jpg" class="card-img-top" alt="Panela con Cacao" style="border-radius: 15px 15px 0 0;"> <!-- Imagen del derivado -->
					<div class="card-body"> <!-- Cuerpo de la tarjeta -->
						<h5 class="card-title" style="color: #1a3e14; text-align: center">Panelitas</h5> <!-- Título del derivado -->
						<p class="card-text" style="text-align: center; font-size: 14px;">Las panelitas son pequeñas golosinas hechas a base de panela, a menudo enriquecidas con ingredientes adicionales como coco, leche o frutos secos.</p> <!-- Descripción del derivado -->
						<div class="text-center"> <!-- Contenedor para centrar el botón -->
							<a href="productos.php"> <!-- Enlace a la página de productos -->
								<button style="background-color: #1a3e14; border-color: #1a3e14;" class="btn btn-success"> <!-- Botón para comprar -->
									<i class="fas fa-shopping-cart"></i> <!-- Icono del carrito de compras -->
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-3"> <!-- Columna para el cuarto derivado -->
				<div class="card product-card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"> <!-- Tarjeta del derivado -->
					<img src="img/coca.jpg" class="card-img-top" alt="Cocadas" style="border-radius: 15px 15px 0 0;"> <!-- Imagen del derivado -->
					<div class="card-body"> <!-- Cuerpo de la tarjeta -->
						<h5 class="card-title" style="color: #1a3e14; text-align: center">Cocadas</h5> <!-- Título del derivado -->
						<p class="card-text" style="text-align: center; font-size: 14px;">Las cocadas de panela son dulces tradicionales elaborados con coco rallado y panela, con una textura suave y un delicioso sabor a coco caramelizado.</p> <!-- Descripción del derivado -->
						<div class="text-center"> <!-- Contenedor para centrar el botón -->
							<a href="productos.php"> <!-- Enlace a la página de productos -->
								<button style="background-color: #1a3e14; border-color: #1a3e14;" class="btn btn-success"> <!-- Botón para comprar -->
									<i class="fas fa-shopping-cart"></i> <!-- Icono del carrito de compras -->
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-3"> <!-- Columna para el quinto derivado -->
				<div class="card product-card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"> <!-- Tarjeta del derivado -->
					<img src="img/alfa.jpg" class="card-img-top" alt="Alfeñiques" style="border-radius: 15px 15px 0 0;"> <!-- Imagen del derivado -->
					<div class="card-body"> <!-- Cuerpo de la tarjeta -->
						<h5 class="card-title" style="color: #1a3e14; text-align: center">Alfandoques</h5> <!-- Título del derivado -->
						<p class="card-text" style="text-align: center; font-size: 14px;">Los alfandoques de panela son dulces tradicionales colombianos hechos con panela tradicional, también conocida como papelón o raspadura.</p> <!-- Descripción del derivado -->
						<div class="text-center"> <!-- Contenedor para centrar el botón -->
							<a href="productos.php"> <!-- Enlace a la página de productos -->
								<button style="background-color: #1a3e14; border-color: #1a3e14;" class="btn btn-success"> <!-- Botón para comprar -->
									<i class="fas fa-shopping-cart"></i> <!-- Icono del carrito de compras -->
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-3"> <!-- Columna para el sexto derivado -->
				<div class="card product-card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"> <!-- Tarjeta del derivado -->
					<img src="img/dulce.jpg" class="card-img-top" alt="Café endulzado con panela" style="border-radius: 15px 15px 0 0;"> <!-- Imagen del derivado -->
					<div class="card-body"> <!-- Cuerpo de la tarjeta -->
						<h5 class="card-title" style="color: #1a3e14; text-align: center">Dulces de café con panela</h5> <!-- Título del derivado -->
						<p class="card-text" style="text-align: center; font-size: 14px;">Los dulces de café con panela son un postre que combina la riqueza del café puro con la dulzura de dicha panela colombiana.</p> <!-- Descripción del derivado -->
						<div class="text-center"> <!-- Contenedor para centrar el botón -->
							<a href="productos.php"> <!-- Enlace a la página de productos -->
								<button style="background-color: #1a3e14; border-color: #1a3e14;" class="btn btn-success"> <!-- Botón para comprar -->
									<i class="fas fa-shopping-cart"></i> <!-- Icono del carrito de compras -->
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="container mt-5"> <!-- Sección para unirse a la tradición -->
		<div class="row"> <!-- Contenedor de fila para la sección -->
			<div class="col-12"> <!-- Columna que ocupa todo el ancho -->
				<div class="card shadow-lg border-0"> <!-- Tarjeta para la información final -->
					<div class="card-body"> <!-- Cuerpo de la tarjeta -->
						<center> <!-- Centrar el contenido -->
							<h2 class="section-title mb-4" style="color: #275d1e; margin-right: 50px;">¡Únete a Nuestra Dulce Tradición! </h2> <!-- Título de la sección -->
						</center>
						<p class="card-text" style="font-size: 16px; text-align: center;">La panela es mucho más que un simple endulzante; es un ingrediente lleno de historia, cultura y beneficios para la salud. Desde su producción artesanal hasta su impacto positivo en las comunidades rurales y el medio ambiente, la panela representa una opción sostenible y nutritiva. Te invitamos a descubrir y disfrutar de nuestros productos de panela, apoyando así a los productores locales y promoviendo un estilo de vida más saludable y natural. ¡Gracias por visitar nuestra página y ser parte de esta dulce tradición!</p> <!-- Descripción de la tradición y el llamado a la acción -->
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

	<!-- Scripts JavaScript -->
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/tiny-slider.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/main.js"></script>

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