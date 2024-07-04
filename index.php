<?php

    require_once "consts.php"; //* Url de la api
    require_once "functions.php";
    require_once "classes/NextMovie.php";

    //* Esta funcion recibe el llamado a la api como un array asociativo
    // $data = getData(API_URL);

    //* Esta funcion recibe los dias que faltan y muestra el mensaje basandose en las condiciones
    // $until_message = getUntilMessage($data["days_until"]);
    
    $next_movie = NextMovie::fetchAndCreateMovie(API_URL);
    $next_movie_data = $next_movie->get_data();

    //? array_merge combina los elementos en un solo array
?>

<?php renderTemplate("head", $next_movie_data); ?>
<?php renderTemplate("main", array_merge($next_movie_data, ["until_message" => $next_movie->getUntilMessage()])); ?>