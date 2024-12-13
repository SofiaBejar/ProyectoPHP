<?php
/**
 * Proyecto 1º Trimestrte DWS
 * curso 2024|25
 * 
 * @author Sofía Béjar
 */
    
    session_start() ;

    # hacemos un logout

    # 1. eliminamos la información de la sesión
    $_SESSION = [] ;

    # 2. destruimos la sesión
    session_destroy() ;

    # 3. redirigimos al usuario a la página de login
    header("location: ./index.php") ;