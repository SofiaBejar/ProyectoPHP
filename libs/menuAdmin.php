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
        <div class="col">
            <form action="logout.php" method="post">
                <a href="agregar.php" type="submit" class="btn btn-outline-light">Agregar ginebra</a>
                <a href="logout.php" type="submit" class="btn btn-light">Cerrar sesión</a>
            </form>
        </div>
    </div>
</nav>