
<main>

    <section class="pelicula">
        <h2>La proxima pelicula de Marvel</h2> 
        <img class="poster" src="<?= $poster_url; ?>" width="300" alt="Poster de <?= $title; ?>">   
    </section>

    <hgroup class="descripcion">
        <h3><?= $title; ?> - <?= $until_message; ?></h3>
        <p>Fecha de Estreno: <?= $release_date; ?></p>
        <p>El proximo estreno es: <span class="titulo-serie"><?= $following_production; ?></span>  </p>
    </hgroup>
</main>