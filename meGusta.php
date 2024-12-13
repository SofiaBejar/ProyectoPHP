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

require_once "./Clases/Usuario.php";
$usuario = unserialize($_SESSION["_usuario"]);

//Actualizo el tiempo de sesion
$_SESSION["_tiempo"] = time() + 300;


try {
    $sqli = new mysqli("localhost", "localhost", "", "Gintoneria");
    //echo "conectado";
} catch (mysqli_sql_exception $excepcion) {
    die("ERROR de conexión con el motor de base de datos: {$excepcion->getMessage()}<br/>");
}
// Comprobar si se han recibido los datos del formulario
if (isset($_GET['idGin'], $_GET['checked'])) {
    require_once "./Clases/Usuario.php";
    $idUsu = (int)$sqli->real_escape_string($usuario->getIdUSu());
    $idGin = (int)$sqli->real_escape_string($_GET['idGin']);
    if($_GET['checked'] == ""){
    $sql = "INSERT INTO Favorita (idUsu, idGin) 
                VALUES ('{$idUsu}', '{$idGin}');";

    }else{
        $sql = "DELETE FROM Favorita WHERE idUsu = {$idUsu} AND idGin = {$idGin};";
    }
    if ($sqli->query($sql)) {

        $sqli->close();
        if(isset($_GET['fav'])){
            die(header("Location: favoritas.php"));
        }
        die(header("Location: main.php"));
    }
}
