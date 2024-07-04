
<?php

    //* Se debe colocar al principio del archivo
    // declare(strict_types=1);

    //* Funcion para mostrar los templates
    function renderTemplate(string $template, array $data = []) {

        //? Extraer las variables del array asociativo, en vez de $data["title" -> titulo] se obtiene $title = "titulo"
        extract($data);
        require "templates/$template.php";

    }

    //* Funcion para consumir la api
    function getData(string $url) : array {
        //? Otra opcion para llamar a la api es usar file_get_contents (Solo si quieres hacer el GET de una API)
        $result = file_get_contents($url);

        //* Convertir el resultado en un array asociativo
        $data = json_decode($result, true);

        return $data;
    }

    function getUntilMessage(int $dias) : string {

        return match (true) {
            $dias === 0     => "Hoy se estrena 🥳",
            $dias === 1     => "Mañana se estrena 😀",
            $dias < 7       => "Esta semana se estrena 😯",
            $dias < 30      => "Este mes se estrena 😎",
            default         => "Faltan $dias dias para el estreno 📅"
        };

    }