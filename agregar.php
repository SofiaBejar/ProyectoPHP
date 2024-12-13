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


require_once "./Clases/Usuario.php";
$usuario = unserialize($_SESSION["_usuario"]);

if (!empty($_GET)):

    try {
        $sqli = new mysqli("localhost", "localhost", "", "Gintoneria");
        //echo "conectado";
    } catch (mysqli_sql_exception $excepcion) {
        die("ERROR de conexión con el motor de base de datos: {$excepcion->getMessage()}<br/>");
    }

    # buscando el usuario en la base de datos
    $idGin = $sqli->real_escape_string($_GET['idGin']);
    $sql = "SELECT * FROM Ginebra WHERE idGin = '{$idGin}' ;";

    # lanzando la consulta
    $result = $sqli->query($sql);

    # comprobando si hemos encontrado el usuario
    if ($result->num_rows > 0):

        $ginebra = $result->fetch_object();

        $sqli->close();


    endif;

endif;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gintonería</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./assets/style.css" rel="stylesheet" type="text/css">
    <style>
        .formulario {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60vh;
            margin-top: 100px;
        }

        .card {
            display: flex;
            flex-direction: row;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin: 60px;
        }

        .card-img {
            width: 40%;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
            flex: 1;
        }

        .card-title {
            margin-bottom: 16px;
            text-align: center;
        }

        .card-text {
            margin-bottom: 12px;
            line-height: 1.5;
        }

        .volver {
            display: flex;
            height: 2em;
            width: 150px;
            align-items: center;
            justify-content: center;
            background-color: #eeeeee4b;
            border-radius: 3px;
            letter-spacing: 1px;
            transition: all 0.2s linear;
            cursor: pointer;
            border: none;
            background: #fff;
            font-family: monospace;
            color: black;
            text-decoration: none;
            margin: 15px;
        }

        .volver>svg {
            margin-right: 5px;
            margin-left: 5px;
            font-size: 20px;
            transition: all 0.4s ease-in;
        }

        .volver:hover>svg {
            font-size: 1.2em;
            transform: translateX(-5px);
        }

        .volver:hover {
            box-shadow: 9px 9px 15px #d1d1d1;
            transform: translateY(-2px);
        }

        .text-justify {
            text-align: justify;
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
        <?php if($usuario->getAdmin() == true){
            require_once "./libs/menuAdmin.php";
        }else{
            require_once "./libs/menu.php";
        }
             ?>
        </div>
        <form class="formulario" action="agregarGin.php" method="POST">
            <div class="card">
                <div class="card-body text-start">
                    <label for="nombre">Nombre</label><input type="text" class="form-control" name="nombre"  required>
                    <div class="container text-start">
                        <div class="row row-cols-2 m-4">
                            <div class="col"><label for="tipo">Tipo</label></div>
                            <div class="col"><label for="pais">Pais</label></div>
                            <div class="col"><input type="text" class="form-control fw-lighter" name="tipo"  required></div>
                            <div class="col"><input type="text" class="form-control fw-lighter" name="pais"  required></div>
                        </div>
                    </div>
                    <div class="container text-start">
                        <div class="row row-cols-2 m-4">
                            <div class="col"><label for="precio">Precio</label></div>
                            <div class="col"><label for="alcohol">Alcohol</label></div>
                            <div class="col">
                                <div class="col"><input type="text" class="form-control fw-lighter" name="precio"  required></div>
                            </div>
                            <div class="col">
                                <div class="col"><input type="text" class="form-control fw-lighter" name="alcohol"  required></div>

                            </div>
                        </div>
                    </div>
                    <div class="text-start m-4">
                        <div class="row m-4">
                            <div class="col">
                                <label for="nombre">Imagen</label>
                                <input type="text" class="form-control fw-lighter" name="imagen"  required> 
                            </div>
                            </div>    
                            <div class="row m-4">
                            <div class="col">
                                <label for="descripcion">Descripcion</label>
                                <textarea class="form-control fw-lighter" name="descripcion" id="descripcion" rows="3" cols="60" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="container text-center">
                        <div class="row m-2">
                            <div class="col">
                                <button type="submit" class="btn btn-success">Enviar</button>
                            </div>
                            <div class="col m-2">
                                <a href="main.php" class="btn btn-dark"> Volver </a>
                            </div>
                        </div>
                    </div>

                    <div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>