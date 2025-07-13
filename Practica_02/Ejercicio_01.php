<?php
    // clase principal
    class Animal{
        // Atributos
        public $sonido;
        public $alimento;
        public $habitat;
        public $nombreCientifico;
        // Contructor
        public function __construct($sonido,$alimento,$habitat,$nombreCientifico){
            $this->sonido = $sonido;
            $this->alimento = $alimento;
            $this->habitat = $habitat;
            $this->nombreCientifico = $nombreCientifico;
        }
        // Implementamos los getter y setter 
        public function getsonido(){ return $this->sonido;}
        public function setsonido($sonido){ $this->sonido = $sonido; }
        public function getalimento(){ return $this->alimento;}
        public function setalimento($alimento){ $this->alimento = $alimento; }
        public function gethabitat(){ return $this->habitat;}
        public function sethabitat($habitat){ $this->habitat = $habitat; }
        public function getnombreCientifico(){ return $this->nombreCientifico;}
        public function setnombreCientifico($nombreCientifico=""){ $this->nombreCientifico = $nombreCientifico;}        
        // Método genérico para describir al animal
        public function describir(){
            return "Este animal es un <b>{$this->nombreCientifico}</b>, su sonido es <b>'{$this->sonido}'</b>, se alimenta de <b>{$this->alimento}</b> y vive en <b>{$this->habitat}</b>.";}
    }
    // Implementamos la clase Canido
    //-------------------------------------------------------
    class Canino extends Animal{        
        public $raza; // Atributo adicional para Canido
        public function __construct($sonido, $alimento, $habitat, $nombreCientifico, $raza) {
            parent::__construct($sonido, $alimento, $habitat, $nombreCientifico);
            $this->raza = $raza;
        }
        public function getRaza() {return $this->raza; }
        // Método específico para cánidos
        public function aullar(){
            return "El <b>{$this->nombreCientifico}</b> de raza <b>{$this->raza}</b> está aullando";
        }
        // Sobrescribir el método describir para incluir la raza
        public function describir(){
            return parent::describir() . " Es de la raza <b>{$this->raza}</b>.";
        }
    }
    // Implementamos la clase Felino
    //-------------------------------------------------------
    class Felino extends Animal{
        public $esNocturno; // Atributo adicional para Felino
        // Contructor
        public function __construct($sonido, $alimento, $habitat, $nombreCientifico, bool $esNocturno) {
            parent::__construct($sonido, $alimento, $habitat, $nombreCientifico);
            $this->esNocturno = $esNocturno;
        }
        public function esNocturno() {return $this->esNocturno;}
        // Método específico para felinos
        public function treparArboles(){
            return "El <b>{$this->nombreCientifico}</b> está trepando un árbol con agilidad.";
        }
        // Sobrescribir el método describir para indicar si es nocturno
        public function describir(){
            $nocturnoStr = $this->esNocturno ? "es nocturno" : "no es nocturno";
            return parent::describir() . " Y <b>{$nocturnoStr}</b>.";
        }
    }
    // Implementamos la clase Perro
    //*******************************************************
    class Perro extends Canino{
        public $nombreMascota; // Atributo adicional para Perro
        public $esDomestico; // Atributo adicional para Perro
        // Contructor
        public function __construct($nombreMascota, $raza, $sonido = "ladrido", $alimento = "croquetas y carne", $habitat = "hogar", $nombreCientifico = "Canis familiaris", $esDomestico = true) {
            parent::__construct($sonido, $alimento, $habitat, $nombreCientifico, $raza);
            $this->nombreMascota = $nombreMascota;
            $this->esDomestico = $esDomestico;
        }
        public function getNombreMascota() {return $this->nombreMascota;}
        public function esDomestico(){return $this->esDomestico; }
        // Método específico para perros
        public function ladrar() {
            return "<b>{$this->nombreMascota}</b> está ladrando: ¡Guau guau!";
        }
        // Sobrescribir el método describir para incluir el nombre de la mascota y si es doméstico
        public function describir(){
            $domesticoStr = $this->esDomestico ? "es doméstico" : "no es doméstico";
            return "Este perro se llama <b>{$this->nombreMascota}</b>, <b>{$this->describirCanido()}</b> y <b>{$domesticoStr}</b>.";
        }
        // Método auxiliar para no duplicar la descripción del canido
        private function describirCanido() {
            return "es un <b>{$this->nombreCientifico}</b> de raza <b>{$this->raza}</b>, su sonido es <b>'{$this->sonido}'</b>, se alimenta de <b>{$this->alimento}</b> y vive en <b>{$this->habitat}</b>";
        }
    }
    // Implementamos la clase Lobo 
    //*******************************************************
    class Lobo extends Canino{
        public $tipoManada; // Atributo adicional para Lobo
        // Contructor
        public function __construct($tipoManada, $sonido = "aullido", $alimento = "carne", $habitat = "bosques y montañas", $nombreCientifico = "Canis lupus", $raza = "Lobo") {
            parent::__construct($sonido, $alimento, $habitat, $nombreCientifico, $raza);
            $this->tipoManada = $tipoManada;
        }
        // getter 
        public function getTipoManada() {return $this->tipoManada;}
        // Método específico para lobos
        public function cazar() {
            return "El lobo de <b>{$this->tipoManada}</b> está cazando en la noche.";
        }
        // Sobrescribir el método describir para incluir el tipo de manada
        public function describir(){
            return parent::describir() . " Vive en una manada de tipo <b>{$this->tipoManada}</b>.";
        }
    }
    // Implementamos la clase Gato
    //*******************************************************
    class Gato extends Felino{
        public $colorPelaje; // Atributo adicional para Gato
        public $tieneBigotesLargos; // Atributo adicional para Gato
        // Contructor
        public function __construct($colorPelaje, bool $tieneBigotesLargos = true, $sonido = "maullido", $alimento = "pescado ", $habitat = "hogar", $nombreCientifico = "Felis catus", bool $esNocturno = false) {
            parent::__construct($sonido, $alimento, $habitat, $nombreCientifico, $esNocturno);
            $this->colorPelaje = $colorPelaje;
            $this->tieneBigotesLargos = $tieneBigotesLargos;
        }
        // getter 
        public function getColorPelaje(){return $this->colorPelaje;}
        public function tieneBigotesLargos(): bool {
            return $this->tieneBigotesLargos;
        }
        // Método específico para gatos
        public function ronronear(){
            return "El gato <b>{$this->colorPelaje}</b> está ronroneando";
        }
        // Sobrescribir el método describir para incluir color de pelaje y bigotes
        public function describir(){
            $bigotesStr = $this->tieneBigotesLargos ? "tiene bigotes largos" : "no tiene bigotes largos";
            return parent::describir() . " Su pelaje es <b>{$this->colorPelaje}</b> y <b>{$bigotesStr}</b>.";
        }
    }
    // Implementamos la clase Leon
    //*******************************************************
    class Leon extends Felino{
        public $tipoMelena; // Atributo adicional para León
        public $cantidadManada; // Atributo adicional para León
        // Contructor
        public function __construct($tipoMelena, int $cantidadManada, $sonido = "rugido", $alimento = "carne", $habitat = "sabana", $nombreCientifico = "Panthera leo", bool $esNocturno = true) {
            parent::__construct($sonido, $alimento, $habitat, $nombreCientifico, $esNocturno);
            $this->tipoMelena = $tipoMelena;
            $this->cantidadManada = $cantidadManada;
        }
        // getter 
        public function getTipoMelena(){return $this->tipoMelena;}
        public function getCantidadManada(){return $this->cantidadManada;}
        // Método específico para leones
        public function rugir(){
            return "El león con melena <b>{$this->tipoMelena}</b> ruge";
        }
        // Sobrescribir el método describir para incluir tipo de melena y cantidad de manada
        public function describir(){
            return parent::describir() . " Tiene una melena de tipo <b>{$this->tipoMelena}</b> y su manada tiene <b>{$this->cantidadManada}</b> miembros.";
        }
    }
    // Implementamos los ejemplos
    echo "<h2>Animales:</h2>";

    $animalGenerico = new Animal("variado", "una dieta variada", "diferentes lugares", "Ser vivo");
    echo "<p>" . $animalGenerico->describir() . "</p>";

    echo "<h2>Cánidos:</h2>";

    $perro = new Perro("Max", "Golden Retriever");
    echo "<p>" . $perro->describir() . "</p>";
    echo "<p>" . $perro->ladrar() . "</p>";
    echo "<p>" . $perro->aullar() . "</p>";
    echo "<p>El perro es doméstico: " . ($perro->esDomestico() ? "Sí" : "No") . "</p>";


    $lobo = new Lobo("Alfa");
    echo "<p>" . $lobo->describir() . "</p>";
    echo "<p>" . $lobo->aullar() . "</p>";
    echo "<p>" . $lobo->cazar() . "</p>";
    echo "<p>Tipo de manada del lobo: " . $lobo->getTipoManada() . "</p>";

    echo "<h2>Felinos:</h2>";

    $gato = new Gato("negro", true);
    echo "<p>" . $gato->describir() . "</p>";
    echo "<p>" . $gato->ronronear() . "</p>";
    echo "<p>" . $gato->treparArboles() . "</p>";
    echo "<p>Color del pelaje del gato: " . $gato->getColorPelaje() . "</p>";

    $leon = new Leon("oscura y abundante", 15);
    echo "<p>" . $leon->describir() . "</p>";
    echo "<p>" . $leon->rugir() . "</p>";
    echo "<p>" . $leon->treparArboles() . "</p>";
    echo "<p>Cantidad de miembros en la manada del león: " . $leon->getCantidadManada() . "</p>";

?>
