<?php
// Inicia una nueva sesión o reanuda la sesión existente.
session_start();

// Incluye el archivo de configuración que contiene los datos de conexión a la base de datos.
include "../app/config/config.php";

// Comprueba si no se ha establecido la sesión 'nombre' o si el 'tipo_usuario' no es 'administrador'.
if (!isset($_SESSION['nombre']) || $_SESSION['tipo_usuario'] != 'administrador') {
    // Si la condición anterior se cumple, redirige al usuario a la página de inicio de sesión.
    header("Location: login.php");
    // Finaliza la ejecución del script para asegurarse de que no se ejecute código adicional.
    exit();
}

// Comprueba si se ha enviado el formulario de actualización.
if (!empty($_POST['btnActualizar'])) {
    // Recupera los datos del formulario enviados a través de POST.
    $nuevoEmail = $_POST['nuevo_email'];
    $nuevaPassword = $_POST['nueva_password'];
    $passwordActual = $_POST['password_actual'];

    // Comprueba si alguno de los campos está vacío.
    if (empty($nuevoEmail) || empty($nuevaPassword) || empty($passwordActual)) {
        // Si algún campo está vacío, establece un mensaje de error.
        $mensaje = 'Todos los campos son requeridos.';
    } else {
        // Consulta la base de datos para comprobar si el email y la contraseña actual coinciden con los datos del administrador.
        $resultado = $conexion->query("SELECT * FROM administradores WHERE email='{$_SESSION['email']}' AND password='$passwordActual'");

        // Comprueba si se encontró un administrador con las credenciales proporcionadas.
        if ($resultado->num_rows > 0) {
            // Actualiza el email y la contraseña del administrador en la base de datos.
            $conexion->query("UPDATE administradores SET email='$nuevoEmail', password='$nuevaPassword' WHERE email='{$_SESSION['email']}'");
            // Actualiza el email en la sesión.
            $_SESSION['email'] = $nuevoEmail;
            // Establece un mensaje de éxito.
            $mensaje = 'Datos actualizados correctamente.';
        } else {
            // Si la contraseña actual es incorrecta, establece un mensaje de error.
            $mensaje = 'Contraseña actual incorrecta.';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en" class="light-mode">


<head>
    <!-- Define el conjunto de caracteres utilizado -->
    <meta charset="UTF-8">
    <!-- Define la escala de la página para dispositivos móviles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Enlace a la hoja de estilos CSS externa -->
    <link rel="stylesheet" href="../public/css/perfil1.css">
    <!-- Enlace al ícono del sitio que aparece en la pestaña del navegador -->
    <link rel="shortcut icon" href="../public/img/acceso.png" type="image/x-icon">
    <!-- Enlace a la librería de iconos de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Define el título de la pestaña del navegador -->
    <title>Administrador</title>
</head>

<body>

    <svg style="display:none;">
        <symbol id="logo" viewBox="0 0 140 59">
            <g>
                <path
                    d="M6.8 57c0 .4-.1.7-.2.9-.1.2-.3.4-.4.5-.1.1-.4.199-.5.3-.2 0-.3.1-.5.1-.1 0-.3 0-.5-.1-.2 0-.4-.101-.5-.3-.2 0-.4-.2-.5-.4-.1-.2-.2-.5-.2-.9V44.7h-2c-.3 0-.6-.101-.8-.2-.2-.1-.3-.2-.5-.4s-.2-.3-.2-.4v-.4c0-.1 0-.2.1-.399 0-.2.1-.301.2-.4.1-.1.3-.3.5-.4.1 0 .4-.1.7-.1h2.1v-3.5c0-1 .1-1.9.3-2.7C4.1 35 4.5 34.3 5 33.7c.5-.6 1.1-1.1 1.9-1.4.8-.3 1.7-.5 2.7-.5.9 0 1.5.101 1.8.4.3.3.5.6.5 1.1 0 .3-.1.601-.3.9-.2.3-.6.4-1.2.4h-.6c-.6 0-1.1.101-1.5.301-.4.199-.7.5-.9.8C7.2 36 7 36.5 7 37c-.1.5-.1 1-.1 1.6V42h2.7c.3 0 .6.1.8.2.2.1.3.2.5.399.1.101.2.301.2.401 0 .2.1.3.1.4 0 .1 0 .3-.1.399 0 .2-.1.3-.2.4-.1.1-.3.3-.5.399-.2.101-.5.2-.8.2H6.8V57z" />
                <path
                    d="M30.4 50.2c0 1.3-.2 2.5-.7 3.5-.5 1.1-1.1 2-1.9 2.8-.8.8-1.8 1.4-2.8 1.8-1.1.4-2.3.601-3.5.601-1.3 0-2.4-.2-3.5-.601-1.1-.399-2-1-2.8-1.8-.8-.8-1.4-1.7-1.9-2.8-.5-1.101-.7-2.2-.7-3.5s.2-2.4.7-3.5c.5-1.101 1.1-2 1.9-2.7.8-.8 1.7-1.4 2.8-1.8 1.1-.4 2.3-.601 3.5-.601 1.3 0 2.4.2 3.5.601 1.1.399 2 1 2.8 1.8.8.8 1.4 1.7 1.9 2.7.5 1.1.7 2.3.7 3.5zm-3.4 0c0-.8-.1-1.5-.4-2.3-.2-.7-.6-1.4-1.1-1.9s-1-1-1.7-1.3c-.7-.3-1.5-.5-2.4-.5s-1.7.2-2.4.5-1.3.8-1.7 1.3c-.5.5-.8 1.2-1.1 1.9-.2.699-.4 1.5-.4 2.3s.1 1.5.4 2.3c.2.7.6 1.4 1.1 1.9.5.6 1 1 1.7 1.3s1.5.5 2.4.5 1.7-.2 2.4-.5 1.3-.8 1.7-1.3c.5-.601.8-1.2 1.1-1.9.3-.7.4-1.5.4-2.3z" />
                <path
                    d="M38.1 44.8h.1c.4-.899 1-1.7 1.9-2.3s1.8-.9 2.9-.9c.5 0 1 .101 1.3.301.4.199.6.6.6 1.1 0 .6-.2 1-.6 1.2-.4.2-.8.3-1.4.3h-.2c-1.3 0-2.4.5-3.2 1.4-.8.899-1.3 2.3-1.3 4.1v7c0 .4-.1.7-.2.9-.1.199-.3.399-.4.5-.2.1-.4.199-.5.3-.2 0-.3.1-.5.1-.1 0-.3 0-.5-.1-.2 0-.4-.101-.5-.3-.1-.2-.3-.301-.4-.5C35 57.7 35 57.4 35 57V43.5c0-.4.1-.7.2-.9.1-.199.3-.399.4-.5.2-.1.3-.199.5-.199s.3-.101.5-.101c.1 0 .3 0 .4.101.2 0 .3.1.5.199.2.101.3.301.4.5.1.2.2.5.2.9v1.3z" />
                <path
                    d="M49.2 51.3c0 .7.2 1.4.5 2 .3.601.7 1.2 1.2 1.601.5.5 1.1.8 1.7 1.1s1.3.4 2 .4c1 0 1.8-.2 2.5-.5.7-.4 1.2-.801 1.8-1.2.2-.2.4-.3.6-.4.2-.301.3-.301.5-.301.4 0 .7.1 1 .4.3.199.4.6.4 1 0 .1 0 .3-.1.5s-.2.4-.4.7c-1.6 1.7-3.7 2.5-6.3 2.5-1.3 0-2.4-.199-3.5-.6s-2-1-2.8-1.8c-.8-.8-1.4-1.7-1.8-2.7-.4-1.1-.7-2.3-.7-3.6 0-1.301.2-2.5.6-3.5.4-1.101 1-2 1.8-2.801.8-.8 1.7-1.399 2.7-1.8 1-.399 2.2-.6 3.4-.6 2.1 0 3.8.6 5.2 1.8s2.3 2.9 2.6 5.2c0 .3.1.5.1.6v.5c0 1.101-.6 1.7-1.7 1.7H49.2V51.3zm9.9-2.5c0-.7-.1-1.3-.3-1.8-.2-.6-.5-1.1-.9-1.5s-.9-.7-1.4-1c-.6-.2-1.2-.4-2-.4-.7 0-1.4.101-2 .4-.6.2-1.2.6-1.6 1-.5.4-.8.9-1.1 1.5-.3.6-.5 1.2-.5 1.8h9.8z" />
                <path
                    d="M77.9 55.1c.399-.3.8-.5 1.199-.5.4 0 .7.101 1 .4.2.3.4.6.4.9 0 .199 0 .5-.1.699a1.856 1.856 0 01-.599.701c-.7.5-1.399.9-2.3 1.2s-1.8.4-2.7.4c-1.3 0-2.5-.2-3.5-.601-1.1-.399-2-1-2.8-1.8s-1.4-1.7-1.8-2.7c-.4-1.1-.7-2.3-.7-3.6s.2-2.5.7-3.601c.4-1.1 1.1-2 1.8-2.8.8-.8 1.7-1.399 2.8-1.8 1.101-.4 2.2-.6 3.5-.6.9 0 1.7.1 2.601.399C78.2 42 79 42.4 79.6 43l.7.7c.101.2.2.5.2.7 0 .399-.1.8-.4 1-.3.3-.6.399-1 .399-.199 0-.399 0-.5-.1-.2-.099-.4-.199-.7-.499-.301-.3-.7-.5-1.2-.7s-1-.3-1.7-.3c-.9 0-1.6.2-2.3.5s-1.2.8-1.7 1.3-.8 1.2-1.1 1.9c-.2.699-.4 1.5-.4 2.3s.1 1.5.3 2.2c.2.699.6 1.3 1 1.899.5.5 1 1 1.7 1.3.7.301 1.4.5 2.3.5.7 0 1.3-.1 1.8-.3.4-.099.9-.299 1.3-.699z" />
                <path
                    d="M94.6 56.2h-.1c-.6.899-1.4 1.6-2.3 2.1-.9.5-2 .7-3.3.7-.7 0-1.301-.1-2-.3-.7-.2-1.4-.5-1.9-.9-.6-.399-1.1-.899-1.4-1.6-.4-.7-.6-1.5-.6-2.4 0-1.3.3-2.2 1-3 .7-.7 1.6-1.3 2.7-1.7 1.1-.399 2.3-.6 3.7-.699 1.399-.101 2.8-.2 4.199-.2v-.5c0-1.2-.399-2.101-1.1-2.7s-1.7-.9-3-.9c-.7 0-1.4.101-2 .301-.6.199-1.3.5-1.9 1-.3.199-.699.3-1 .3-.3 0-.6-.101-.899-.4-.2-.2-.4-.6-.4-.899 0-.2.101-.5.2-.7s.3-.4.6-.601c.7-.5 1.601-1 2.5-1.3 1-.3 2-.5 3.2-.5s2.2.2 3.101.5c.899.3 1.6.8 2.199 1.4.601.6 1 1.3 1.301 2.1.3.8.399 1.601.399 2.5V56.9c0 .3-.1.6-.2.899-.1.201-.2.401-.4.501-.2.101-.3.2-.5.2s-.3.1-.4.1c-.1 0-.3 0-.399-.1-.2 0-.301-.1-.5-.2-.201-.1-.301-.3-.401-.5s-.2-.5-.2-.899v-.7h-.2zm-.9-5.5c-.8 0-1.7 0-2.5.1-.9.101-1.7.2-2.4.4s-1.3.5-1.8.9-.7 1-.7 1.7c0 .5.101.9.3 1.2.2.3.5.6.801.8.3.2.699.4 1.1.4.4.1.8.1 1.2.1 1.5 0 2.7-.5 3.5-1.399.8-.9 1.2-2.101 1.2-3.5v-.9h-.7v.199z" />
                <path
                    d="M111.4 45.4c-.5-.5-1-.801-1.5-1-.5-.2-1.101-.301-1.601-.301-.399 0-.7 0-1.1.101-.4.1-.7.2-1 .399-.3.2-.5.4-.7.7s-.3.601-.3 1c0 .7.3 1.2.899 1.601.601.3 1.601.6 2.801.899.8.2 1.5.4 2.199.7.7.3 1.301.6 1.801 1s.899.8 1.199 1.4c.301.5.4 1.199.4 1.899 0 1-.2 1.8-.6 2.5-.4.7-.9 1.2-1.5 1.7-.601.4-1.301.7-2.101.9-.8.199-1.6.3-2.399.3-1 0-2-.2-2.9-.5-1-.3-1.8-.8-2.5-1.4-.3-.3-.5-.5-.6-.7-.098-.198-.098-.398-.098-.598 0-.4.101-.8.4-1 .3-.3.6-.4 1-.4.399 0 .8.2 1.2.5.5.5 1.1.801 1.699 1.101.601.3 1.2.399 1.9.399.4 0 .8 0 1.2-.1.399-.1.7-.2 1-.4.3-.199.6-.399.8-.699.2-.301.3-.7.3-1.2 0-.8-.399-1.3-1.1-1.7s-1.8-.7-3.2-1c-.6-.1-1.1-.3-1.7-.5-.6-.2-1.1-.5-1.6-.8s-.8-.8-1.101-1.3c-.3-.5-.399-1.2-.399-2 0-.9.2-1.601.5-2.301.401-.6.801-1.2 1.401-1.6.601-.4 1.2-.7 2-.9.7-.199 1.5-.3 2.301-.3.899 0 1.699.101 2.6.4.8.3 1.6.7 2.2 1.2.3.3.5.5.6.699.101.2.101.4.101.601 0 .399-.101.7-.4 1s-.6.399-1 .399c-.402-.199-.802-.399-1.102-.699z" />
                <path
                    d="M126 58.4c-.6.3-1.3.399-2.1.399-1.601 0-2.801-.399-3.601-1.3s-1.2-2.2-1.2-3.9v-9H117.2c-.3 0-.601 0-.8-.1-.2-.1-.4-.2-.5-.3-.101-.101-.2-.3-.2-.4 0-.2-.101-.3-.101-.399 0-.101 0-.2.101-.4 0-.2.1-.3.2-.4.1-.1.3-.3.5-.399.199-.101.5-.2.8-.2h1.899v-3.2c0-.399.101-.7.2-.899.101-.2.3-.4.4-.601.2-.1.399-.2.5-.3.2 0 .3-.1.5-.1.1 0 .3 0 .5.1.2 0 .3.1.5.3.2.101.3.3.399.601.101.199.2.6.2.899V42h3.2c.3 0 .6.1.8.2.2.1.3.2.5.399.102.101.202.301.202.401 0 .2.1.3.1.4 0 .1 0 .3-.1.399 0 .2-.1.3-.2.4-.1.1-.3.3-.5.3-.2.1-.5.1-.8.1h-3.2V53.2c0 1 .2 1.7.5 2.1.4.4.8.601 1.4.601.2 0 .5 0 .7-.101.199-.1.399-.1.6-.1.4 0 .7.1.9.399.199.301.3.601.3.9s-.101.5-.2.7c0 .401-.2.601-.5.701z" />
                <path
                    d="M133.2 44.8h.1c.4-.899 1-1.7 1.9-2.3.899-.6 1.8-.9 2.899-.9.5 0 1 .101 1.301.301.4.199.6.599.6 1.099 0 .6-.2 1-.6 1.2-.4.2-.801.3-1.4.3h-.2c-1.3 0-2.399.5-3.2 1.4-.8.899-1.3 2.3-1.3 4.1v7c0 .4-.1.7-.2.9-.1.199-.3.399-.399.5-.101.1-.4.199-.5.3-.2 0-.3.1-.5.1-.101 0-.3 0-.5-.1-.2 0-.4-.101-.5-.3-.2-.101-.3-.301-.4-.5-.1-.2-.2-.5-.2-.9V43.5c0-.4.101-.7.2-.9.101-.199.3-.399.4-.5.2-.1.3-.199.5-.199s.3-.101.5-.101c.1 0 .3 0 .399.101.2 0 .301.1.5.199.2.101.301.301.4.5.1.2.2.5.2.9v1.3z" />
            </g>
            <g>
                <g>
                    <path fill="#08A6DF"
                        d="M70 32.9c-9.1 0-16.5-7.4-16.5-16.5 0-4.8 2.1-9.3 5.7-12.4.5-.4 1.2-.4 1.6.1.4.5.4 1.2-.1 1.6-3.1 2.7-4.9 6.6-4.9 10.7 0 7.8 6.4 14.2 14.2 14.2s14.2-6.4 14.2-14.2c0-7.8-6.4-14.1-14.2-14.1-1.9 0-3.7.4-5.4 1.1-.6.2-1.3 0-1.5-.6-.2-.6 0-1.3.6-1.5C65.7.4 67.8 0 70 0c9.1 0 16.5 7.4 16.5 16.5S79.1 32.9 70 32.9z" />
                </g>
                <g>
                    <path fill="#7C2A8A"
                        d="M70 28.4c-6.6 0-11.9-5.4-11.9-11.9 0-6.6 5.4-11.9 11.9-11.9 5 0 9.5 3.2 11.2 7.9.5 1.3.7 2.6.7 4 0 .6-.5 1.1-1.101 1.1-.6 0-1.1-.5-1.1-1.1 0-1.1-.2-2.2-.601-3.3-1.399-3.8-5-6.4-9.1-6.4-5.3 0-9.6 4.3-9.6 9.6s4.3 9.6 9.6 9.6c.6 0 1.1.5 1.1 1.1.002.8-.498 1.3-1.098 1.3z" />
                </g>
                <g>
                    <path fill="#EC1848"
                        d="M70 23.9c-4.1 0-7.4-3.3-7.4-7.4s3.3-7.4 7.4-7.4c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-2.8 0-5.1 2.3-5.1 5.1s2.3 5.1 5.1 5.1 5.1-2.3 5.1-5.1c0-.6.5-1.1 1.101-1.1.6 0 1.1.5 1.1 1.1.099 4.2-3.201 7.5-7.301 7.5z" />
                </g>
            </g>
        </symbol>
        <symbol id="down" viewBox="0 0 16 16">
            <polygon points="3.81 4.38 8 8.57 12.19 4.38 13.71 5.91 8 11.62 2.29 5.91 3.81 4.38" />
        </symbol>
        <symbol id="users" viewBox="0 0 16 16">
            <path
                d="M8,0a8,8,0,1,0,8,8A8,8,0,0,0,8,0ZM8,15a7,7,0,0,1-5.19-2.32,2.71,2.71,0,0,1,1.7-1,13.11,13.11,0,0,0,1.29-.28,2.32,2.32,0,0,0,.94-.34,1.17,1.17,0,0,0-.27-.7h0A3.61,3.61,0,0,1,5.15,7.49,3.18,3.18,0,0,1,8,4.07a3.18,3.18,0,0,1,2.86,3.42,3.6,3.6,0,0,1-1.32,2.88h0a1.13,1.13,0,0,0-.27.69,2.68,2.68,0,0,0,.93.31,10.81,10.81,0,0,0,1.28.23,2.63,2.63,0,0,1,1.78,1A7,7,0,0,1,8,15Z" />
        </symbol>
        <symbol id="collection" viewBox="0 0 16 16">
            <rect width="7" height="7" />
            <rect y="9" width="7" height="7" />
            <rect x="9" width="7" height="7" />
            <rect x="9" y="9" width="7" height="7" />
        </symbol>
        <symbol id="charts" viewBox="0 0 16 16">
            <polygon
                points="0.64 7.38 -0.02 6.63 2.55 4.38 4.57 5.93 9.25 0.78 12.97 4.37 15.37 2.31 16.02 3.07 12.94 5.72 9.29 2.21 4.69 7.29 2.59 5.67 0.64 7.38" />
            <rect y="9" width="2" height="7" />
            <rect x="12" y="8" width="2" height="8" />
            <rect x="8" y="6" width="2" height="10" />
            <rect x="4" y="11" width="2" height="5" />
        </symbol>
        <symbol id="comments" viewBox="0 0 16 16">
            <path d="M0,16.13V2H15V13H5.24ZM1,3V14.37L5,12h9V3Z" />
            <rect x="3" y="5" width="9" height="1" />
            <rect x="3" y="7" width="7" height="1" />
            <rect x="3" y="9" width="5" height="1" />
        </symbol>
        <symbol id="pages" viewBox="0 0 16 16">
            <rect x="4" width="12" height="12" transform="translate(20 12) rotate(-180)" />
            <polygon points="2 14 2 2 0 2 0 14 0 16 2 16 14 16 14 14 2 14" />
        </symbol>
        <symbol id="appearance" viewBox="0 0 16 16">
            <path
                d="M3,0V7A2,2,0,0,0,5,9H6v5a2,2,0,0,0,4,0V9h1a2,2,0,0,0,2-2V0Zm9,7a1,1,0,0,1-1,1H9v6a1,1,0,0,1-2,0V8H5A1,1,0,0,1,4,7V6h8ZM4,5V1H6V4H7V1H9V4h1V1h2V5Z" />
        </symbol>
        <symbol id="trends" viewBox="0 0 16 16">
            <polygon
                points="0.64 11.85 -0.02 11.1 2.55 8.85 4.57 10.4 9.25 5.25 12.97 8.84 15.37 6.79 16.02 7.54 12.94 10.2 9.29 6.68 4.69 11.76 2.59 10.14 0.64 11.85" />
        </symbol>
        <symbol id="settings" viewBox="0 0 16 16">
            <rect x="9.78" y="5.34" width="1" height="7.97" />
            <polygon points="7.79 6.07 10.28 1.75 12.77 6.07 7.79 6.07" />
            <rect x="4.16" y="1.75" width="1" height="7.97" />
            <polygon points="7.15 8.99 4.66 13.31 2.16 8.99 7.15 8.99" />
            <rect x="1.28" width="1" height="4.97" />
            <polygon points="3.28 4.53 1.78 7.13 0.28 4.53 3.28 4.53" />
            <rect x="12.84" y="11.03" width="1" height="4.97" />
            <polygon points="11.85 11.47 13.34 8.88 14.84 11.47 11.85 11.47" />
        </symbol>
        <symbol id="options" viewBox="0 0 16 16">
            <path d="M8,11a3,3,0,1,1,3-3A3,3,0,0,1,8,11ZM8,6a2,2,0,1,0,2,2A2,2,0,0,0,8,6Z" />
            <path
                d="M8.5,16h-1A1.5,1.5,0,0,1,6,14.5v-.85a5.91,5.91,0,0,1-.58-.24l-.6.6A1.54,1.54,0,0,1,2.7,14L2,13.3a1.5,1.5,0,0,1,0-2.12l.6-.6A5.91,5.91,0,0,1,2.35,10H1.5A1.5,1.5,0,0,1,0,8.5v-1A1.5,1.5,0,0,1,1.5,6h.85a5.91,5.91,0,0,1,.24-.58L2,4.82A1.5,1.5,0,0,1,2,2.7L2.7,2A1.54,1.54,0,0,1,4.82,2l.6.6A5.91,5.91,0,0,1,6,2.35V1.5A1.5,1.5,0,0,1,7.5,0h1A1.5,1.5,0,0,1,10,1.5v.85a5.91,5.91,0,0,1,.58.24l.6-.6A1.54,1.54,0,0,1,13.3,2L14,2.7a1.5,1.5,0,0,1,0,2.12l-.6.6a5.91,5.91,0,0,1,.24.58h.85A1.5,1.5,0,0,1,16,7.5v1A1.5,1.5,0,0,1,14.5,10h-.85a5.91,5.91,0,0,1-.24.58l.6.6a1.5,1.5,0,0,1,0,2.12L13.3,14a1.54,1.54,0,0,1-2.12,0l-.6-.6a5.91,5.91,0,0,1-.58.24v.85A1.5,1.5,0,0,1,8.5,16ZM5.23,12.18l.33.18a4.94,4.94,0,0,0,1.07.44l.36.1V14.5a.5.5,0,0,0,.5.5h1a.5.5,0,0,0,.5-.5V12.91l.36-.1a4.94,4.94,0,0,0,1.07-.44l.33-.18,1.12,1.12a.51.51,0,0,0,.71,0l.71-.71a.5.5,0,0,0,0-.71l-1.12-1.12.18-.33a4.94,4.94,0,0,0,.44-1.07l.1-.36H14.5a.5.5,0,0,0,.5-.5v-1a.5.5,0,0,0-.5-.5H12.91l-.1-.36a4.94,4.94,0,0,0-.44-1.07l-.18-.33L13.3,4.11a.5.5,0,0,0,0-.71L12.6,2.7a.51.51,0,0,0-.71,0L10.77,3.82l-.33-.18a4.94,4.94,0,0,0-1.07-.44L9,3.09V1.5A.5.5,0,0,0,8.5,1h-1a.5.5,0,0,0-.5.5V3.09l-.36.1a4.94,4.94,0,0,0-1.07.44l-.33.18L4.11,2.7a.51.51,0,0,0-.71,0L2.7,3.4a.5.5,0,0,0,0,.71L3.82,5.23l-.18.33a4.94,4.94,0,0,0-.44,1.07L3.09,7H1.5a.5.5,0,0,0-.5.5v1a.5.5,0,0,0,.5.5H3.09l.1.36a4.94,4.94,0,0,0,.44,1.07l.18.33L2.7,11.89a.5.5,0,0,0,0,.71l.71.71a.51.51,0,0,0,.71,0Z" />
        </symbol>
        <symbol id="collapse" viewBox="0 0 16 16">
            <polygon points="11.62 3.81 7.43 8 11.62 12.19 10.09 13.71 4.38 8 10.09 2.29 11.62 3.81" />
        </symbol>
        <symbol id="search" viewBox="0 0 16 16">
            <path
                d="M6.57,1A5.57,5.57,0,1,1,1,6.57,5.57,5.57,0,0,1,6.57,1m0-1a6.57,6.57,0,1,0,6.57,6.57A6.57,6.57,0,0,0,6.57,0Z" />
            <rect x="11.84" y="9.87" width="2" height="5.93" transform="translate(-5.32 12.84) rotate(-45)" />
        </symbol>
    </svg>
    <header class="page-header">
        <!-- Inicio del encabezado de la página -->

        <nav>
            <!-- Inicio de la barra de navegación -->

            <a href="#0" aria-label="forecastr logo" class="logo">
                <!-- Enlace al logo principal con etiqueta ARIA para accesibilidad -->
                <h1><i>PANEVI</i></h1>
                <!-- Título de la marca PANEVI en cursiva -->
                <img src="../public/img/logo_nav (1).png" width="100" alt="">
                <!-- Imagen del logo con un ancho de 100 píxeles -->
            </a>

            <button class="toggle-mob-menu" aria-expanded="false" aria-label="open menu">
                <!-- Botón para alternar el menú en vista móvil, accesible con ARIA -->
                <svg width="20" height="20" aria-hidden="true">
                    <!-- Icono SVG para mostrar el ícono del menú -->
                    <use xlink:href="#down"></use>
                </svg>
            </button>

            <ul class="admin-menu">
                <!-- Lista de navegación principal del menú administrativo -->

                <li class="menu-heading">
                    <!-- Encabezado de sección -->
                    <h3>Administración</h3>
                </li>

                <li>
                    <a href="../public/inicio_admi.php">
                        <!-- Enlace a la página de inicio del administrador -->
                        <svg>
                            <use xlink:href="#pages"></use>
                        </svg>
                        <span>Inicio</span>
                    </a>
                </li>

                <li>
                    <a href="../public/confi_admi.php">
                        <!-- Enlace a la configuración administrativa -->
                        <svg>
                            <use xlink:href="#options"></use>
                        </svg>
                        <span>Configuración</span>
                    </a>
                </li>

                <li>
                    <a href="../public/clien_admi.php">
                        <!-- Enlace para gestionar clientes -->
                        <svg>
                            <use xlink:href="#users"></use>
                        </svg>
                        <span>Clientes</span>
                    </a>
                </li>

                <li>
                    <a href="../public/productos_admin.php">
                        <!-- Enlace para gestionar productos -->
                        <svg>
                            <use xlink:href="#collection"></use>
                        </svg>
                        <span>Productos</span>
                    </a>
                </li>

                <li>
                    <a href="../public/pedidos_admi.php">
                        <!-- Enlace para gestionar pedidos -->
                        <svg>
                            <use xlink:href="#collection"></use>
                        </svg>
                        <span>Pedidos</span>
                    </a>
                </li>

                <li>
                    <a href="../public/factu_envios.php">
                        <!-- Enlace para ver facturas y envíos -->
                        <svg>
                            <use xlink:href="#pages"></use>
                        </svg>
                        <span>Facturas y envíos</span>
                    </a>
                </li>

                <li>
                    <a href="../public/logout.php">
                        <!-- Enlace para cerrar sesión -->
                        <svg>
                            <use xlink:href="#logout"></use>
                        </svg>
                        <span>Cerrar Sesión</span>
                    </a>
                </li>

                <svg style="display: none;">
                    <!-- Definición de un ícono SVG que se utilizará para el cierre de sesión -->
                    <symbol id="logout" viewBox="0 0 24 24">
                        <path d="M10 9v-6h8v18h-8v-6h-2v8h12v-20h-12v8h2zm-6 7l-4-4 4-4v3h9v2h-9v3z" />
                        <!-- Trayectoria del ícono para el cierre de sesión -->
                    </symbol>
                </svg>

                <li>
                    <div class="switch">
                        <!-- Contenedor del interruptor para cambiar entre modos -->
                        <input type="checkbox" id="mode" checked>
                        <!-- Entrada tipo checkbox para habilitar/deshabilitar el modo oscuro -->
                        <label for="mode">
                            <!-- Etiqueta conectada al checkbox -->
                            <span></span>
                            <span>Dark</span>
                            <!-- Texto que indica el modo oscuro -->
                        </label>
                    </div>

                    <button class="collapse-btn" aria-expanded="true" aria-label="collapse menu">
                        <!-- Botón para colapsar o expandir el menú -->
                        <svg aria-hidden="true">
                            <use xlink:href="#collapse"></use>
                        </svg>
                    </button>
                </li>

            </ul>
        </nav>
        <!-- Fin de la barra de navegación -->

    </header>
    <!-- Fin del encabezado de la página -->

    <section class="page-content">
        <section class="search-and-user">
            <h1 style="font-size: 35px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><i>CONFIGURACIÓN</i></h1>
            <div class="admin-profile">
                <span class="greeting">
                    <h3><b><?php echo htmlspecialchars($_SESSION['nombre']); ?></b></h3>
                </span>
                <div class="notifications">
                    <span class="badge">1</span>
                    <div class="profile-pic-container" style="margin-top: 20px;">
                        <img src="ruta_de_la_imagen_del_perfil" alt="Foto de perfil" id="profilePic" class="profile-pic">
                        <input type="file" id="uploadProfilePic" name="uploadProfilePic" style="display: none;" accept="image/*" onchange="changeProfilePic(event)">
                        <p style="cursor: pointer; font-size: 13px; font-weight: bold; color: grey" class="upload-text" onclick="document.getElementById('uploadProfilePic').click();">Cambiar Foto</p>
                    </div>

                    <style>
                        .profile-pic-container {
                            text-align: center;
                            width: 50px;
                            height: 50px;
                            margin-bottom: 20px;
                            position: relative;
                        }

                        .profile-pic {
                            width: 100%;
                            height: 100%;
                            border-radius: 50%;
                            object-fit: cover;
                            transition: transform 0.3s ease;
                        }

                        .profile-pic:hover {
                            transform: scale(1.1);
                        }
                    </style>

                    <script>
                        // Ejecuta la función cuando la ventana termine de cargar
                        window.onload = function() {
                            // Obtiene la imagen de perfil guardada en localStorage (si existe)
                            const savedProfilePic = localStorage.getItem('profilePic');

                            // Si hay una imagen guardada, se asigna como fuente al elemento con id 'profilePic'
                            if (savedProfilePic) {
                                document.getElementById('profilePic').src = savedProfilePic;
                            }
                        }

                        // Función que se ejecuta al cambiar la imagen de perfil mediante un input file
                        function changeProfilePic(event) {
                            // Obtiene el primer archivo seleccionado por el usuario
                            const file = event.target.files[0];

                            // Crea un nuevo objeto FileReader para leer el archivo
                            const reader = new FileReader();

                            // Define lo que ocurrirá cuando el archivo se haya cargado
                            reader.onload = function(e) {
                                // Almacena la URL del archivo cargado (Data URL) en una variable
                                const profilePicSrc = e.target.result;

                                // Asigna la URL como la fuente de la imagen de perfil
                                document.getElementById('profilePic').src = profilePicSrc;

                                // Guarda la URL de la imagen en localStorage para futuras visitas
                                localStorage.setItem('profilePic', profilePicSrc);
                            }

                            // Lee el contenido del archivo como una Data URL
                            reader.readAsDataURL(file);
                        }
                    </script>


                </div>
            </div>
        </section>

        <hr>
        <br>
        <form method="post"
            style="max-width: 500px; margin: auto; padding: 20px; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <!-- Contenedor del formulario con un diseño centrado y estilizado -->

            <br>

            <!-- Título del formulario -->
            <h1 style="font-size: 25px; color: #275d1e; text-align: center;">Actualizar Información</h1>

            <br>

            <!-- Verifica si la variable $mensaje está definida -->
            <?php if (isset($mensaje)): ?>
                <center>
                    <!-- Muestra un mensaje centrado con colores y estilos dinámicos según el contenido del mensaje -->
                    <div style="color: <?= strpos($mensaje, 'correctamente') !== false ? 'green' : 'red' ?>; 
                        font-weight: bold; text-align: center; width: 80%; text-transform: uppercase; 
                        padding: 10px; border: 1px solid <?= strpos($mensaje, 'correctamente') !== false ? 'green' : 'red' ?>; 
                        border-radius: 5px; background-color: <?= strpos($mensaje, 'correctamente') !== false ? '#d4edda' : '#f8d7da' ?>; 
                        font-size: 14px;">
                        <!-- Imprime el contenido del mensaje -->
                        <?= $mensaje ?>
                    </div>
                </center>
            <?php endif; ?>

            <br>

            <center>
                <!-- Etiqueta y campo de entrada para ingresar el nuevo correo electrónico -->
                <label for="nuevo_email" style="display: block; margin-bottom: 5px; text-align: center">
                    <b>Nuevo Correo Electrónico</b>
                </label>
                <input style="width: 85%; padding: 10px; border: 1px solid #ccc; border-radius: 20px; margin-bottom: 20px;"
                    type="email" id="nuevo_email" name="nuevo_email">

                <!-- Etiqueta y campo de entrada para ingresar la contraseña actual -->
                <label for="password_actual" style="display: block; margin-bottom: 5px; text-align: center">
                    <b>Contraseña Actual</b>
                </label>
                <input style="width: 85%; padding: 10px; border: 1px solid #ccc; border-radius: 20px; margin-bottom: 20px;"
                    type="password" id="password_actual" name="password_actual">

                <!-- Etiqueta y campo de entrada para ingresar la nueva contraseña -->
                <label for="nueva_password" style="display: block; margin-bottom: 5px; text-align: center">
                    <b>Nueva Contraseña</b>
                </label>
                <input style="width: 85%; padding: 10px; border: 1px solid #ccc; border-radius: 20px; margin-bottom: 20px;"
                    type="password" id="nueva_password" name="nueva_password">

                <!-- Botón para enviar el formulario y actualizar los datos -->
                <input style="background-color: #275d1e; color: white; font-weight: bold; padding: 10px 15px; margin: 8px 0; 
                      cursor: pointer; width: 50%; border-radius: 20px; border: none; 
                      transition: background-color 0.3s ease, transform 0.3s ease;"
                    onmouseover="this.style.backgroundColor='black'; this.style.transform='scale(1.05)';"
                    onmouseout="this.style.backgroundColor='#275d1e'; this.style.transform='scale(1)';"
                    type="submit" name="btnActualizar" value="Actualizar Datos">
            </center>

            <br>
        </form>

        <footer class="page-footer">
        </footer>
        <script src="../public/js/perfil2.js"></script>
</body>

</html>