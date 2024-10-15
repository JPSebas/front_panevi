<!DOCTYPE html>
<!-- Declaración del tipo de documento para HTML5 -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Establece la codificación de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Configura la vista para dispositivos móviles, asegurando que se ajuste al ancho de la pantalla -->
    <title>Login</title>
    <!-- Título que aparece en la pestaña del navegador -->
    <link rel="stylesheet" href="css/estiles.css">
    <!-- Vincula una hoja de estilos CSS externa para el diseño de la página -->
    <link rel="shortcut icon" href="../public/img/acceso.png" type="image/x-icon">
    <!-- Establece un ícono de acceso rápido que aparece en la pestaña del navegador -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Vincula la hoja de estilos de Font Awesome para usar iconos -->
</head>
<body id="fondo" style="background-image: url('img/imagen22.png')">
    <!-- Establece el fondo de la página con una imagen -->
    <a href="index.php" class="home-icon"><i class="fas fa-home"></i></a>
    <!-- Enlace a la página de inicio con un icono de casa -->
    <br><br>
    <br><br>
    <form id="form1" method="post"> 
        <!-- Formulario con método POST para el inicio de sesión -->
        <h2>INGRESO USUARIOS REGISTRADOS</h2>
        <!-- Título del formulario -->
        <div class="register-container">
            <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
            <!-- Mensaje que invita a los usuarios a registrarse si no tienen cuenta -->
        </div>
        <?php 
        include "../app/config/config.php";
        // Incluye el archivo de configuración de la aplicación
        include "../app/controladores/AuthControlador.php";
        // Incluye el controlador de autenticación para manejar el inicio de sesión
        ?>
        <input type="email" id="email" name="email" placeholder="Dirección de correo electrónico">
        <!-- Campo de entrada para el correo electrónico del usuario -->
        
        <input type="password" id="password" name="password" placeholder="Contraseña">
        <!-- Campo de entrada para la contraseña del usuario -->
        <a href="forgot_password.php" style="text-decoration: none;"><p>¿Contraseña olvidada?</p></a>
        <!-- Enlace a la página de recuperación de contraseña -->
        
        <div class="submit-container">
            <input style="background-color: #134914;color:white;padding: 10px 15px;margin: 8px 0;
            cursor: pointer;width: 75%;border-radius: 30px;border: none;"
            onmouseover="this.style.backgroundColor='#0f3b0e'; this.style.opacity='0.8';"
            onmouseout="this.style.backgroundColor='#134914'; this.style.opacity='1';"
            type="submit" class="btn" name="btningresar" value="Iniciar Sesion">
            <!-- Botón para enviar el formulario y realizar el inicio de sesión, con estilos en línea y efectos al pasar el ratón -->
        </div>
    </form>
    
</body>
</html>
