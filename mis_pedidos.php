<?php
// Inicia una nueva sesión o reanuda la sesión existente.
session_start();
// Incluye el archivo de configuración que contiene los datos de conexión a la base de datos.
require '../app/config/config.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id_cliente'])) {
    // Si no está autenticado, redirige al usuario a la página de inicio de sesión.
    header('Location: login.php');
    exit();
}
// Verificar si se han establecido las variables de sesión 'nombre' y 'apellido'.
if (!isset($_SESSION['nombre']) || !isset($_SESSION['apellido'])) {
    // Si no se han establecido, redirige al usuario a la página de inicio de sesión.
    header("Location: login.php");
    exit();
}
// Obtener el id del cliente desde la sesión.
$id_cliente = $_SESSION['id_cliente'];

// Consultar los pedidos del cliente
$query = "SELECT p.id_pedido, p.id_cliente, p.fecha_pedido, p.fecha_envio, p.fecha_entrega, p.estado, p.total
          FROM pedidos p
          WHERE p.id_cliente = ?";
// Prepara la consulta SQL.
$stmt = $conexion->prepare($query);
// Vincula el parámetro del id del cliente a la consulta preparada.
$stmt->bind_param('i', $id_cliente);
// Ejecuta la consulta.
$stmt->execute();
// Obtiene el resultado de la consulta.
$result = $stmt->get_result();

// Consultar los detalles del pedido si se ha solicitado uno
$detalle_result = null;
if (isset($_GET['id_pedido'])) {
    $id_pedido = $_GET['id_pedido'];

    $query_detalle = "SELECT dp.id_detalle_pedido, p.nombre, dp.precio_unitario, dp.cantidad, dp.subtotal
                      FROM detalle_pedido dp
                      JOIN productos p ON dp.id_producto = p.id_producto
                      WHERE dp.id_pedido = ?";

    $stmt_detalle = $conexion->prepare($query_detalle);
    $stmt_detalle->bind_param('i', $id_pedido);
    $stmt_detalle->execute();
    $detalle_result = $stmt_detalle->get_result();

    // Consultar la información del pedido
    $query_pedido = "SELECT fecha_pedido, total, estado FROM pedidos WHERE id_pedido = ?";
    $stmt_pedido = $conexion->prepare($query_pedido);
    $stmt_pedido->bind_param('i', $id_pedido);
    $stmt_pedido->execute();
    $pedido_info = $stmt_pedido->get_result()->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"> <!-- Define la codificación de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Configura el viewport para un diseño responsivo -->
    <meta name="author" content="Untree.co"> <!-- Especifica el autor del documento -->
    <link rel="shortcut icon" href="img/logo_nav (1).png"> <!-- Enlaza el ícono que se mostrará en la pestaña del navegador -->

    <meta name="description" content="" /> <!-- Descripción de la página, actualmente vacía -->
    <meta name="keywords" content="bootstrap, bootstrap4" /> <!-- Palabras clave relacionadas con el contenido de la página -->

    <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Enlaza la hoja de estilos de Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"> <!-- Enlaza la hoja de estilos de Font Awesome (versión 5.15.3) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Enlaza la hoja de estilos de Font Awesome (versión 6.0.0-beta3) -->
    <link href="css/tiny-slider.css" rel="stylesheet"> <!-- Enlaza la hoja de estilos para el slider Tiny Slider -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- Enlaza la hoja de estilos de Bootstrap (versión 4.5.2) -->
    <link href="css/style.css" rel="stylesheet"> <!-- Enlaza la hoja de estilos personalizada para la página -->
    <title>Pedidos</title> <!-- Establece el título de la página que aparece en la pestaña del navegador -->
    
    <style>
        /* Estilos CSS para varios elementos de la página */

        h1,
        h2 {
            color: #28a745; /* Define el color verde para los encabezados h1 y h2 */
        }

        .table {
            margin-bottom: 20px; /* Agrega un margen inferior a las tablas */
        }

        .styled-table {
            width: 100%; /* Establece el ancho de la tabla al 100% del contenedor */
            border-collapse: collapse; /* Colapsa los bordes de la tabla */
            margin: 25px 0; /* Agrega márgenes superior e inferior a la tabla */
            font-size: 16px; /* Define el tamaño de la fuente dentro de la tabla */
            text-align: left; /* Alinea el texto a la izquierda */
        }

        .styled-table thead tr {
            background-color: #28a745; /* Color de fondo verde para la fila del encabezado */
            color: #fff; /* Color del texto blanco para el encabezado */
            text-align: center; /* Centra el texto en el encabezado */
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px; /* Agrega espacio interno en las celdas de la tabla */
            text-align: center; /* Centra el texto en las celdas */
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #ddd; /* Agrega un borde inferior a las filas del cuerpo de la tabla */
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3; /* Color de fondo gris claro para filas pares */
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #28a745; /* Borde inferior más grueso en la última fila */
        }

        .btn {
            background-color: #28a745; /* Color de fondo verde para los botones */
            color: #fff; /* Color del texto blanco en los botones */
            border: none; /* Sin borde en los botones */
            padding: 10px 20px; /* Espacio interno para los botones */
            font-size: 16px; /* Tamaño de fuente para el texto del botón */
            border-radius: 5px; /* Bordes redondeados para los botones */
            transition: background-color 0.3s, transform 0.3s; /* Efecto de transición para el color de fondo y la transformación */
        }

        .btn:hover {
            background-color: grey; /* Color de fondo gris al pasar el mouse sobre el botón */
            transform: scale(1.05); /* Aumenta el tamaño del botón al pasar el mouse */
        }

        .form-control {
            border-radius: 0.25rem; /* Bordes ligeramente redondeados para controles de formulario */
            border-color: #28a745; /* Color del borde verde para controles de formulario */
        }

        .estado-text {
            background-color: #fff; /* Color de fondo blanco para el texto del estado */
            padding: 5px; /* Espacio interno para el texto del estado */
            border-radius: 5px; /* Bordes redondeados para el texto del estado */
        }

        .pedido-info {
            margin-bottom: 20px; /* Agrega un margen inferior a la información del pedido */
        }

        .pedido-info p {
            margin: 5px 0; /* Agrega márgenes superior e inferior a los párrafos de la información del pedido */
            font-size: 16px; /* Tamaño de fuente para los párrafos */
            text-align: center; /* Centra el texto en los párrafos */
            color: black; /* Color del texto negro */
        }

        .btn-view-details {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; /* Define la familia de fuentes para el botón de ver detalles */
            background-color: grey; /* Color de fondo gris para el botón de ver detalles */
            color: white; /* Color del texto blanco en el botón */
            font-weight: bold; /* Define el texto en negrita para el botón */
            border: none; /* Sin borde en el botón */
            font-size: 14px; /* Tamaño de fuente para el texto del botón */
            border-radius: 30px; /* Bordes redondeados para el botón */
            transition: background-color 0.3s, transform 0.3s; /* Efecto de transición para el color de fondo y la transformación */
        }

        .btn-view-details:hover {
            background-color: #5a5a5a; /* Color de fondo gris más oscuro al pasar el mouse sobre el botón */
            transform: scale(1.05); /* Aumenta el tamaño del botón al pasar el mouse */
        }

        .btn-back {
            background-color: #007bff; /* Color de fondo azul para el botón de volver */
            color: #fff; /* Color del texto blanco en el botón */
            border: none; /* Sin borde en el botón */
            padding: 12px 24px; /* Espacio interno para el botón de volver */
            font-size: 18px; /* Tamaño de fuente para el texto del botón */
            border-radius: 8px; /* Bordes redondeados para el botón de volver */
            transition: background-color 0.3s, transform 0.3s; /* Efecto de transición para el color de fondo y la transformación */
        }

        .btn-back:hover {
            background-color: #0056b3; /* Color de fondo azul más oscuro al pasar el mouse sobre el botón de volver */
            transform: scale(1.05); /* Aumenta el tamaño del botón al pasar el mouse */
        }
    </style>
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

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <div class="busqueda">
                        <input type="text" id="bus" placeholder="Buscar">
                        <div class="buttonb">
                            <i class="fa fa-search"></i>
                        </div>
                    </div>
                    <li class="nav-item active">
                        <a class="nav-link" href="perfil_cli.php">Inicio</a>
                    </li>
                    <li><a style="text-align: center;" class="nav-link" href="quienes_somos.php">¿Quienes Somos?</a></li>
                    <li><a class="nav-link" href="productos_cli.php">Productos</a></li>


                </ul>


            </div>
        </div>

    </nav>
    <br>
    <div class="container">
        <h3 style="font-size: 25px; color: green; font-weight: bold; text-align: center;">Mis Pedidos</h3>

        <?php if ($result->num_rows > 0): ?>
            <table class="styled-table">
                <thead>
                    <tr>
                        <!-- Encabezados de la tabla con estilos -->
                        <th style="background-color: #083e05">ID Pedido</th>
                        <th style="background-color: #083e05">Fecha Pedido</th>
                        <th style="background-color: #083e05">Fecha Envío</th>
                        <th style="background-color: #083e05">Fecha Entrega</th>
                        <th style="background-color: #083e05">Total</th>
                        <th style="background-color: #083e05">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Itera a través de cada fila del resultado de la consulta -->
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <!-- Itera a través de cada fila del resultado de la consulta -->
                            <td style="color: black"><?php echo htmlspecialchars($row["id_pedido"]); ?></td>
                            <td style="color: black"><?php echo htmlspecialchars($row["fecha_pedido"]); ?></td>
                            <td style="color: black"><?php echo htmlspecialchars($row["fecha_envio"]); ?></td>
                            <td style="color: black"><?php echo htmlspecialchars($row["fecha_entrega"]); ?></td>
                            <td style="color: black">$<?php echo number_format($row["total"], 2); ?></td>
                            <td>
                                <!-- Botón para ver los detalles del pedido con estilos -->
                                <a href="?id_pedido=<?php echo htmlspecialchars($row["id_pedido"]); ?>" class="btn btn-view-details" title="Ver Detalles" style="background-color: #275d1e; border-color: #275d1e; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
                                    <i class="fas fa-info-circle" style="margin-right: 5px;"></i> Ver Detalles
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <!-- Fin de la tabla -->
        <?php else: ?>
            <p style="text-align: center; font-size: 18px"><b>No tienes pedidos.</b></p>
        <?php endif; ?>

        <?php if ($detalle_result): ?>
            <!-- Contenedor para la información del pedido -->
            <div class="pedido-info">
                <!-- Título de los detalles del pedido con estilos -->
                <h3 style="font-size: 25px; color: green; font-weight: bold; text-align: center;">
                    Detalles del Pedido #<?php echo htmlspecialchars($id_pedido); ?>
                </h3>
                <br>
                <!-- Comprobación si la información del pedido existe -->
                <?php if ($pedido_info): ?>
                    <!-- Mostrar la fecha del pedido -->
                    <p><b>Fecha del Pedido:</b> <?php echo htmlspecialchars($pedido_info['fecha_pedido']); ?></p>
                    <!-- Mostrar el total del pedido -->
                    <p><b>Total:</b> $<?php echo number_format($pedido_info['total'], 2); ?></p>
                    <!-- Mostrar el estado del pedido -->
                    <p><b>Estado:</b> <?php echo htmlspecialchars($pedido_info['estado']); ?></p>
                    <br>
                    <!-- Título de los productos en el pedido con estilos -->
                    <h3 style="font-size: 25px; color: green; font-weight: bold; text-align: center;">
                        Productos en el Pedido
                    </h3>
                    <!-- Comprobación si hay resultados de detalles del pedido -->
                    <?php if ($detalle_result->num_rows > 0): ?>
                        <!-- Inicio de la tabla de productos en el pedido -->
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <!-- Encabezados de la tabla con estilos -->
                                    <th style="background-color: #083e05">Nombre Producto</th>
                                    <th style="background-color: #083e05">Precio Unitario</th>
                                    <th style="background-color: #083e05">Cantidad</th>
                                    <th style="background-color: #083e05">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php while ($row = $detalle_result->fetch_assoc()): ?>
                                    <!-- Itera a través de cada fila del resultado de los detalles del pedido -->
                                    <tr>
                                        <!-- Celda para el nombre del producto -->
                                        <td style="color: black"><?php echo htmlspecialchars($row['nombre']); ?></td>
                                        <!-- Celda para el precio unitario del producto, formateado como número con dos decimales -->
                                        <td style="color: black">$<?php echo number_format($row['precio_unitario'], 2); ?></td>
                                        <!-- Celda para la cantidad del producto -->
                                        <td style="color: black"><?php echo htmlspecialchars($row['cantidad']); ?></td>
                                        <!-- Celda para el subtotal del producto, formateado como número con dos decimales -->
                                        <td style="color: black">$<?php echo number_format($row['subtotal'], 2); ?></td>
                                    </tr>
                                <?php endwhile; ?>

                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>No hay detalles para este pedido.</p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <footer class="footer-section">
    <!-- Sección del pie de página con clase 'footer-section' -->
    <div class="container relative">
        <!-- Contenedor principal con clase 'relative' para posicionamiento -->

        <div class="row g-5 mb-5">
            <!-- Fila que contiene los elementos del pie de página con márgenes -->

            <div class="col-lg-4">
                <!-- Columna que ocupa 4 de 12 partes del ancho en pantallas grandes -->
                <div class="mb-4 footer-logo-wrap" style="font-size: 45px;color: white">
                    <span>PANEVI</span>
                    <!-- Logo o nombre de la empresa, en este caso "PANEVI", con estilo -->
                </div>

                <p class="mb-4"></p>
                <!-- Espacio en blanco para separación -->

                <ul class="list-unstyled custom-social">
                    <!-- Lista no ordenada de enlaces a redes sociales -->
                    <li>
                        <a href="https://www.facebook.com/profile.php?id=61552234777986&locale=es_LA">
                            <span class="fa fa-brands fa-facebook-f"></span>
                            <!-- Enlace a Facebook con icono de Font Awesome -->
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/innovatech_4/">
                            <span class="fa fa-brands fa-instagram"></span>
                            <!-- Enlace a Instagram con icono de Font Awesome -->
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/573102307944">
                            <span class="fa fa-brands fa-whatsapp"></span>
                            <!-- Enlace a WhatsApp con icono de Font Awesome -->
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-8">
                <!-- Columna que ocupa 8 de 12 partes del ancho en pantallas grandes -->
                <div class="row links-wrap">
                    <!-- Fila para agrupar enlaces -->

                    <div style="margin-left: 15%;" class="col-6 col-sm-6 col-md-3">
                        <!-- Columna que ocupa 3 de 12 partes del ancho en pantallas medianas -->
                        <ul class="list-unstyled">
                            <!-- Lista no ordenada de enlaces -->
                            <li style="color: white; text-transform: uppercase;font-size: 20px">Información</li>
                            <!-- Título de la sección 'Información' -->
                            <li><a href="#" style="color: grey">Acerca de Nosotros</a></li>
                            <!-- Enlace a la página 'Acerca de Nosotros' -->
                            <li><a href="#" style="color: grey">Politicas de Privacidad</a></li>
                            <!-- Enlace a la página de 'Políticas de Privacidad' -->
                            <li><a href="#" style="color: grey">Términos y Condiciones</a></li>
                            <!-- Enlace a la página de 'Términos y Condiciones' -->
                        </ul>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3">
                        <!-- Columna que ocupa 3 de 12 partes del ancho en pantallas medianas -->
                        <ul class="list-unstyled">
                            <!-- Lista no ordenada de enlaces -->
                            <li style="color: white; text-transform: uppercase;font-size: 20px">MI CUENTA</li>
                            <!-- Título de la sección 'MI CUENTA' -->
                            <li><a href="#" style="color: grey">Mi Cuenta</a></li>
                            <!-- Enlace a la página 'Mi Cuenta' -->
                            <li><a href="#" style="color: grey">Mi información</a></li>
                            <!-- Enlace a la página 'Mi Información' -->
                        </ul>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3">
                        <!-- Columna que ocupa 3 de 12 partes del ancho en pantallas medianas -->
                        <ul class="list-unstyled">
                            <!-- Lista no ordenada de información de contacto -->
                            <li style="color: white; text-transform: uppercase;font-size: 20px">CONTACTO</li>
                            <!-- Título de la sección 'CONTACTO' -->
                            <li>Teléfono: 3102307944</li>
                            <!-- Información de contacto (teléfono) -->
                            <li>Ciudad: Villeta</li>
                            <!-- Información de contacto (ciudad) -->
                            <li>Código postal: 253410</li>
                            <!-- Información de contacto (código postal) -->
                        </ul>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3">
                        <!-- Columna que ocupa 3 de 12 partes del ancho en pantallas medianas -->
                        <ul class="list-unstyled">
                            <!-- Lista vacía (puede ser para enlaces adicionales) -->
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="border-top copyright">
            <!-- Sección de derechos de autor con borde superior -->
            <div class="row pt-4">
                <!-- Fila con espaciado superior -->

                <div class="col-lg-6">
                    <!-- Columna que ocupa 6 de 12 partes del ancho en pantallas grandes -->
                    <p class="mb-2 text-center text-lg-start">
                        Derechos de Autor &copy;
                        <script>
                            document.write(new Date().getFullYear());
                            <!-- Script que imprime el año actual -->
                        </script>. Todos los derechos reservados.<br>
                        Correo: innovatech004@gmail.com
                        <!-- Información de contacto (correo electrónico) -->
                        </a>
                        <!-- Comentario sobre la licencia -->
                        <!-- License information: https://untree.co/license/ -->
                    </p>
                </div>

                <div class="col-lg-6 text-center text-lg-end">
                    <!-- Columna que ocupa 6 de 12 partes del ancho en pantallas grandes y está alineada a la derecha en pantallas grandes -->
                    <ul class="list-unstyled d-inline-flex ms-auto">
                        <!-- Lista no ordenada de texto con estilo de flexbox -->
                        <li class="me-4" style="color: white; font-size: 18px">Panevi - Endulza tu vida</li>
                        <!-- Slogan o mensaje adicional -->
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
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main1.js"></script>
</body>

</html>