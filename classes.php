
<?php 
    // declare(strict_types=1);

    class SuperHero {

        //* Propiedades y metodos
        // public $name;
        // public $powers;
        // public $planet;

        //* Crear al heroe, el constructor ayuda a crear un nuevo objeto ademas de inicializar los atributos dados
        // public function __construct($name, $powers, $planet)
        // {
        //     $this->name = $name;
        //     $this->powers = $powers;
        //     $this->planet = $planet;
        // }
        
        //* Es lo mismo, solo funciona en PHP 8 - Promoted Properties
        public function __construct(
            private string $name, 
            public array $powers, 
            public string $planet
        ) {
            
        }  

        public function attack() {
            return "¡$this->name ataca con sus poderes!";
        }

        public function show_all() {
            return get_object_vars($this); //* Recuperar todas las propiedades del objeto
        }

        public function description() {
            //? Implode: Convertir los elementos de un array en string
            $powers = implode(", ", $this->powers);
            return "$this->name es un superheroe que viene de $this->planet y tiene los siguientes poderes: $powers";
        }

        public static function random() {
            $names = ["Thor", "Spiderman", "Wolverine", "Ironman", "Hulk"];
            $powers = [
                ["Superfuerza", "Volar", "Martillo mjolnir"],
                ["Superfuerza", "Agilidad", "Telarañas"],
                ["Regeneracion", "Superfuerza", "Garras de adamantium"],
                ["Superfuerza", "Volar", "Rayos laser"],
                ["Superfuerza", "Super agilidad", "Cambio de tamaño"]
            ];
            $planets = ["Asgard", "Hulkworld", "Krypton", "Tierra"];

            //* Array rand te devuelve una llave random del arreglo (no el valor)
            $name = $names[array_rand($names)];
            $power = $powers[array_rand($powers)];
            $planet = $planets[array_rand($planets)];

            //* Self se refiere a la propia clase
            return new self($name, $power, $planet);
        }
    }

    //* Metodo publico
    // $hero = new SuperHero("Superman", ["Superfuerza", "super calzones rojos", "y rayos laser"], "Krypton");
    // echo $hero->description();

    // var_dump($hero->show_all());

    //* Metodo estatico
    $hero = SuperHero::random();
    echo $hero->description();
?>