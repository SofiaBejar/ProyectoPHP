<?php

/**
 * Proyecto 1º Trimestrte DWS
 * curso 2024|25
 * 
 * @author Sofía Béjar
 */

session_start();


if (!empty($_POST)):

    try {
        $sqli = new mysqli("localhost", "localhost", "", "Gintoneria");
        //echo "conectado";
    } catch (mysqli_sql_exception $excepcion) {
        die("ERROR de conexión con el motor de base de datos: {$excepcion->getMessage()}<br/>");
    }

    # buscando el usuario en la base de datos
    $nombre = $sqli->real_escape_string($_POST["nombre"]);
    $apellido = $sqli->real_escape_string($_POST["apellido"]);
    $email = $sqli->real_escape_string($_POST["email"]);
    $clave = md5($sqli->real_escape_string($_POST["clave"]));
    $sql = "INSERT INTO Usuario (nombre, apellido, email, clave, administrador) VALUES ('{$nombre}', '{$apellido}', '{$email}', '{$clave}', 0) ;";
    
    
    $sqli->query($sql);

    $sql = "SELECT idUsu, email, nombre, apellido FROM Usuario WHERE email = '{$email}' AND clave = '{$clave}' ;";
    $result = $sqli->query($sql);

    # comprobando si hemos encontrado el usuario
    if ($result->num_rows > 0):
        # recuperamos e instanciando el objeto Usuario
        require_once "./clases/Usuario.php";
        $usuario = $result->fetch_object("Usuario");
       
        # cerrar la conexión con la base de datos
        $sqli->close();

        # guardamos los datos de usuario en la sesión
        $_SESSION["_tiempo"]  = time() + 300;
        $_SESSION["_usuario"] = serialize($usuario);

       
        die(header("Location: main.php"));
    endif;
endif;

?>