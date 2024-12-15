<?php
/**
 * Proyecto 1º Trimestrte DWS
 * curso 2024|25
 * 
 * @author Sofía Béjar
 */
session_start();

//verifica si el usuario está logueado y la sesion sin caducar
if ((empty($_SESSION)) || (time() >= $_SESSION["_tiempo"])):
    $_SESSION = [];
    die(header("location: ./index.php"));
endif;

# actualizamos el tiempo de sesion
$_SESSION["_tiempo"] = time() + 300;
 
if (!empty($_GET)):

try {
    $sqli = new mysqli("localhost", "root", "", "Gintoneria");
    //echo "conectado";
} catch (mysqli_sql_exception $excepcion) {
    die("ERROR de conexión con el motor de base de datos: {$excepcion->getMessage()}<br/>");
}

// Elimino la ginebra ocn el id obtenido
$idGin = $sqli->real_escape_string($_GET['idGin']);
$sql = "DELETE FROM Ginebra WHERE idGin = '{$idGin}' ;";

//Lanzo la consulta
$sqli->query($sql);

$_SESSION['mensaje'] = "¡La ginebra se ha eliminado correctamente!";

$sqli->close();

die(header("Location: main.php"));
    

endif;