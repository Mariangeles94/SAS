<?php
require './clases/AutoCarga.php';
if (isset($_POST["enviar"])) {
    //Capturo los datos del formulario
    $nss = $_POST["id_us"];
    $dni = $_POST["dni"];
    $dia = $_POST["dia"];
    $mes = $_POST["mes"];
    $anio = $_POST["anio"];

    //iniciamos una sesion con el usuario
    $sesion = new Session();
    $usuario = new Usuario($nss, $dni, $dia, $mes, $anio);
    $sesion->setUser($usuario);
    $user = $sesion->getUser();
    
    //Capturo el NSS del usuario introducido
    $nombre = $user->getNss();
    
    //Capturo el archivo generado 
    $files = $_FILES['imagen']['name'];
    $upload = new Multiupload();
    $directorio=$usuario->getRuta();
    $mensajeSubido = $upload->subirArchivos($files,$nombre,$directorio);
    $upload->setMensaje($mensajeSubido);
    //redirecciono al documento visualizar
    $sesion->sendRedirect("visualizar.php");
 
}






