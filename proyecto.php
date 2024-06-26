
<?php

    //* Url de la api
    const API_URL = "https://whenisthenextmcufilm.com/api"; 

    //* Inicializar una nueva sesion de cURL; ch = cURL handle
    $ch = curl_init(API_URL);

    //* Indicar que quiero recibir el resultado de la peticion y no mostrarla en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //* Configurar certificados ssl para que funcione la llamada
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    //* Ejecutar la peticion y guardar el resultado
    $result = curl_exec($ch);

    //? Otra opcion para llamar a la api es usar file_get_contents (Solo si quieres hacer un GET de una API)
    //? $result = file_get_contents(API_URL);

    $data = json_decode($result, true);

    curl_close($ch);

    // var_dump($data);
?>

<head>
    <meta charset="UTF-8" />
    <title>La proxima pelicula de Marvel</title>
    <meta name="description" content="La proxima pelicula de Marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fluid viewport --> 
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.fluid.classless.min.css"
    />
    <link rel="stylesheet" href="estilos.css">
</head>

<main>

    <section class="pelicula">
        <h2>La proxima pelicula de Marvel</h2> 
        <img class="poster" src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"]; ?>">   
    </section>

    <hgroup class="descripcion">
        <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> dias</h3>
        <p>Fecha de Estreno: <?= $data["release_date"]; ?></p>
        <p>El proximo estreno es: <span class="titulo-serie"><?= $data["following_production"]["title"]; ?></span>  </p>
    </hgroup>
</main>