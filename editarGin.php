<?php
/**
 * Proyecto 1º Trimestrte DWS
 * curso 2024|25
 * 
 * @author Sofía Béjar
 */ 
session_start();

//Verifico si el usuario está logueado y la sesión sin caducar
if ((empty($_SESSION)) || (time() >= $_SESSION["_tiempo"])):
    $_SESSION = [];
    die(header("location: ./index.php"));
endif;

//Actualizo el tiempo de sesion
$_SESSION["_tiempo"] = time() + 300;

if (!empty($_GET)):

    try {
        $sqli = new mysqli("db", "root", "", "Gintoneria");
        //echo "conectado";
    } catch (mysqli_sql_exception $excepcion) {
        die("ERROR de conexión con el motor de base de datos: {$excepcion->getMessage()}<br/>");
    }
    // Comprobar si se han recibido los datos del formulario
    if (isset(
        $_POST['nombre'],
        $_POST['tipo'],
        $_POST['pais'],
        $_POST['precio'],
        $_POST['alcohol'],
        $_POST['imagen'],
        $_POST['descripcion']
    )) {
        $tipo = $sqli->real_escape_string($_POST['tipo']);
        $pais = $sqli->real_escape_string($_POST['pais']);
        $precio = $sqli->real_escape_string($_POST['precio']);
        $alcohol = $sqli->real_escape_string($_POST['alcohol']);
        $imagen = $sqli->real_escape_string($_POST['imagen']);
        $descripcion = $sqli->real_escape_string($_POST['descripcion']);
        $idGin = $sqli->real_escape_string($_GET['idGin']);
        $sql = "UPDATE Ginebra SET tipo = '{$tipo}', 
            pais = '{$pais}', precio = '{$precio}',
            alcohol = '{$alcohol}', imagen = '{$imagen}', 
            descripcion = '{$descripcion}' WHERE idGin = '{$idGin}' ;";

        if ($sqli->query($sql)) {

            $_SESSION['mensaje'] = "¡La ginebra '{$_POST["nombre"]}' se ha editado correctamente!";

            $sqli->close();

            die(header("Location: main.php"));
        }
    }
endif;
