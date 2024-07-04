<?php

    declare(strict_types=1);

    class NextMovie {

        public function __construct(
            private string $title,
            private int $days_until,
            private string $following_production,
            private string $release_date,
            private string $poster_url,
            private string $overview
        )
        {
            
        }

        public function getUntilMessage() {

            $dias = $this->days_until;
            return match (true) {
                $dias === 0     => "Hoy se estrena 🥳",
                $dias === 1     => "Mañana se estrena 😀",
                $dias < 7       => "Esta semana se estrena 😯",
                $dias < 30      => "Este mes se estrena 😎",
                default         => "Faltan $dias dias para el estreno 📅"
            };
    
        }


        public static function fetchAndCreateMovie(string $api_url) : NextMovie {
            //? Otra opcion para llamar a la api es usar file_get_contents (Solo si quieres hacer el GET de una API)
            $result = file_get_contents($api_url);
    
            //* Convertir el resultado en un array asociativo
            $data = json_decode($result, true);
    
            return new self(
                $data["title"],
                $data["days_until"],
                $data["following_production"]["title"] ?? "Desconocido",
                $data["release_date"],
                $data["poster_url"],
                $data["overview"]
            );
        }

        //* Recuperar todas las propiedades del objeto
        public function get_data() {
            return get_object_vars($this); 
        }
    }




?>