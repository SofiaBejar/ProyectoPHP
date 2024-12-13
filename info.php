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
        section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60vh;
            margin: 85px;
        }

        .card {
            display: flex;
            flex-direction: row;
            max-width: 900px;
            /* Ancho máximo */
            width: 90%;
            /* Ajustable */
            border-radius: 12px;
            overflow: hidden;
            /* Para esquinas redondeadas con la imagen */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin: 30px;
        }

        .card-img {
            width: 40%;
            /* Imagen ocupará el 40% del ancho del card */
            object-fit: cover;
            /* Mantiene la proporción de la imagen */
        }

        .card-body {
            padding: 20px;
            flex: 1;
        }

        .card-title {
            font-size: 28px;
            margin-bottom: 16px;
            text-align: center;
        }

        .card-text {
            font-size: 16px;
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
        <?php if ($usuario->getAdmin() == true) {
            require_once "./libs/menuAdmin.php";
        } else {
            require_once "./libs/menu.php";
        }
        ?>

        <section>
            <div class="card">
                <img src="<?= $ginebra->imagen ?>" alt="Foto de Ginebra" class="card-img">
                <div class="card-body text-center">
                    <h1><?= $ginebra->nombre ?></h1>
                    <div class="container text-center">
                        <div class="row row-cols-2 m-4">
                            <div class="col">Tipo</div>
                            <div class="col">País</div>
                            <div class="col fw-lighter"> <?= $ginebra->tipo ?></div>
                            <div class="col fw-lighter"><?= $ginebra->pais ?></div>
                        </div>
                    </div>
                    <div class="container text-center">
                        <div class="row row-cols-2 m-4">
                            <div class="col">Precio</div>
                            <div class="col">Alcohol</div>
                            <div class="col">
                                <div class="col fw-lighter"><?= $ginebra->precio ?><small>€</small></div>
                            </div>
                            <div class="col">
                                <div class="col fw-lighter"> <?= $ginebra->alcohol ?><small>%</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="fw-lighter ">
                        <p class="text-justify"><strong>Descripción:</strong> <?= $ginebra->descripcion ?></p>
                    </div>
                    <div class="container text-center">
                        <?php if ($usuario->getAdmin() == true): ?>
                            <div class="row row-cols-3 m-4">
                                <div class="col">
                                    <a href="editar.php?idGin=<?= $ginebra->idGin ?>" class="btn btn-outline-dark">Editar</a>
                                </div>
                                <div class="col">
                                    <a href="eliminar.php?idGin=<?= $ginebra->idGin ?>" class="btn btn-outline-danger">Eliminar</a>
                                </div>
                                <div class="col">
                                    <a href="main.php" class="btn btn-dark"> Volver</a>
                                </div>
                            </div>
                        <?php
                        else: ?>
                            <div class="row m-4">

                                <div class="col">
                                    <a href="main.php" class="btn btn-dark"> Volver</a>
                                </div>
                            </div>

                        <?php endif;
                        ?>


                    </div>

                    <div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>