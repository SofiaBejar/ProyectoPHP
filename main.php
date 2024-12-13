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
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gintonería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./assets/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        
        <?php if($usuario->getAdmin() == true){
            require_once "./libs/menuAdmin.php";
        }else{
            require_once "./libs/menu.php";
        }
             ?>

        <div class="container mt-4">
            <?php
            # En caso de haber podido guardar la ginebra agregado, un mensaje
            if (isset($_SESSION['mensaje'])) {
                echo '<div class="alert alert-success" role="alert">' . $_SESSION['mensaje'] . '</div>';

                // Eliminar el mensaje después de mostrarlo
                unset($_SESSION['mensaje']);
            }

            // Ejemplo de base de datos para ginebras
            $sqli = new mysqli("db", "root", "", "Gintoneria");
            if ($sqli->connect_error) {
                die("Conexión fallida: " . $sqli->connect_error);
            }

            // Obtener los tipos de ginebras y países para los filtros
            $tiposQuery = "SELECT DISTINCT tipo FROM Ginebra";
            $paisesQuery = "SELECT DISTINCT pais FROM Ginebra";
            $tiposResult = $sqli->query($tiposQuery);
            $paisesResult = $sqli->query($paisesQuery);


            ?>

            <!-- Filtro de Ginebras -->
            <form method="GET">
                <div class="row align-items-center mb-4">
                    <div class="col-md-5">
                        <select class="form-select" name="tipoFilter">
                            <option value="">Filtrar por Tipo</option>
                            <?php while ($tipo = $tiposResult->fetch_assoc()): ?>
                                <!-- 1. le doy el valor del tipo-->
                                <option value="<?php echo $tipo['tipo']; ?>">
                                    <!-- 2. Imprimo el valor del tipo-->
                                    <?php echo $tipo['tipo']; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <select class="form-select" name="paisFilter">
                            <option value="">Filtrar por País</option>
                            <?php while ($pais = $paisesResult->fetch_assoc()): ?>
                                <!-- 1. le doy el valor del país-->
                                <option value="<?php echo $pais['pais']; ?>">
                                    <!-- 2. Imprimo el valor del país-->
                                    <?php echo $pais['pais']; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-dark">Aplicar filtro</button>
                    </div>
                </div>
            </form>
            <?php

            /* Obtener todas las ginebras, usando una igualacion verdadera, 
                para que en caso de tener que aplicar filtro, podamos usar AND*/
            $sql = "SELECT * FROM Ginebra WHERE 1=1";

            if (!empty($_GET['tipoFilter'])) {
                $tipoFilter = $_GET['tipoFilter'];
                $sql .= " AND tipo = '$tipoFilter'";
            }
            if (!empty($_GET['paisFilter'])) {
                $paisFilter = $_GET['paisFilter'];
                $sql .= " AND pais = '$paisFilter'";
            }


            $ginebrasResult = $sqli->query($sql);
            if($ginebrasResult->num_rows <= 0):
                echo "<div class=\"alert alert-warning text-center mt-4\" role=\"alert\">
                        <i class=\"bi bi-exclamation-triangle-fill\"></i>
                        <strong>¡Ups!</strong> No hay ginebras con el filtro que has especificado en este momento.  
                    </div>";
            else:
            ?>

            <!-- Cards de Ginebras -->
            <div class="row row-cols-md-3 g-4">
                <?php while ($ginebra = $ginebrasResult->fetch_assoc()): ?>
                    <div class="col">
                        <div class="card text-center rounded">
                            <img src="<?php echo $ginebra['imagen']; ?>" class="img mt-3 mb-3" alt="<?php echo $ginebra['nombre']; ?>">
                            <div class="card-body">
                                <div class="mb-3">
                                    <h2><?= $ginebra['nombre']; ?></h2>
                                </div>
                                <div class="container text-center">
                                    <div class="row row-cols-3 ">
                                        <div class="col">
                                            <h3 class="fw-lighter"><?= $ginebra['precio']; ?><small>€</small></h3>
                                        </div>
                                        <div class="col">
                                            <a href="info.php?idGin=<?= $ginebra['idGin'] ?>" class="btn btn-dark">Ver más</a>
                                        </div>
                                        <div class="col">
                                            <label class="heart">
                                                <?php 
                                                    $idUsu = $sqli->real_escape_string($usuario->getIdUsu());
                                                    $idGin = $sqli->real_escape_string($ginebra['idGin']);
                                                    $sql= "SELECT * FROM Favorita WHERE idUsu = '{$idUsu}' AND idGin = '{$idGin}'";
                                                    $result = $sqli->query($sql);
                                                    if($result->num_rows > 0){
                                                        $checked = "checked";
                                                    }else{
                                                        $checked = "";
                                                    }
                                                ?>
                                                <a href="meGusta.php?idGin=<?= $ginebra['idGin']?>&checked=<?= $checked?>">
                                                    <input type="checkbox" <?=$checked?>>
                                                    <svg id="Layer_1" version="1.0" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <path d="M16.4,4C14.6,4,13,4.9,12,6.3C11,4.9,9.4,4,7.6,4C4.5,4,2,6.5,2,9.6C2,14,12,22,12,22s10-8,10-12.4C22,6.5,19.5,4,16.4,4z"></path>
                                                    </svg>
                                                </a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; 
                endif;?>
            </div>

        </div>
    </div>
</body>

</html>

<?php
// Cerrar la conexión a la base de datos
$sqli->close();
?>