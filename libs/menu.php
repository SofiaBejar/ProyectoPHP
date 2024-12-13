<?php
/**
* Proyecto 1º Trimestrte DWS
* curso 2024|25
* 
* @author Sofía Béjar
*/
# recuperamos el usuario de la sesión.
require_once "./Clases/Usuario.php";
$usuario = unserialize($_SESSION["_usuario"]);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded p-4">
    <div class="row container-fluid ms-5">
        <div class="col">
            <img src="./assets/images/blackLogo.png" class="navbar-brand" style="width: 70px; height: auto;" />
        </div>
        <div class="col">
            <img src="<?= $usuario->getFoto() ?>" alt="Imagen de usuario" class="rounded-circle" style="width:40px; height:40px;" />
            <span class="ms-2 text-white"><?php echo $usuario; ?></span>
        </div>
        <div class="col d-flex mr-2">
            <a href="favoritas.php" type="submit" class="heartMenu btn btn-outline-light">
                <svg id="Layer_1" version="1.0" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path d="M16.4,4C14.6,4,13,4.9,12,6.3C11,4.9,9.4,4,7.6,4C4.5,4,2,6.5,2,9.6C2,14,12,22,12,22s10-8,10-12.4C22,6.5,19.5,4,16.4,4z" fill="white"></path>
            </svg> Favoritas</a>
            <a href="logout.php" type="submit" class="btn btn-light">Cerrar sesión</a>
        </div>
    </div>
</nav>
