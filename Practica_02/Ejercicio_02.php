<?php
    // Implementamos la interface Actor
    //-------------------------------------------------------
    interface Actor {
        public function actuar();
        public function moverse($destino);
    }
    // Implementamos la interface ObjetoInerte
    //-------------------------------------------------------
    interface ObjetoInerte {
        public function describir();
        public function getPeso();
    }
    // Implementamos la clase abstracta persona
    //-------------------------------------------------------
    abstract class Persona implements Actor {
        public $nombre;
        public $edad;
        public $identificacion; // Por ejemplo, DNI, CI, Pasaporte

        public function __construct( $nombre, $edad,  $identificacion) {
            $this->nombre = "<b>".$nombre."</b>";
            $this->edad = "<b>".$edad."</b>";
            $this->identificacion = "<b>".$identificacion."</b>";
        }
        // getter y setter 
        public function getNombre() {return $this->nombre;}
        public function getEdad() {return $this->edad; }
        public function getIdentificacion() {return $this->identificacion;}
        // Métodos de la interfaz Actor
        public function actuar() {
            return $this->nombre . " está realizando una acción genérica.";
        }
        public function moverse( $destino) {
            return $this->nombre . " se está moviendo hacia " . $destino . ".";
        }
        // Método abstracto
        abstract public function presentarse();
    }
    // Implementamos la Profesor
    //*******************************************************
    class Profesor extends Persona {
        private $departamento;
        private $cursosImpartidos;
        public function __construct( $nombre, $edad,  $identificacion,  $departamento) {
            parent::__construct($nombre, $edad, $identificacion);
            $this->departamento = $departamento;
            $this->cursosImpartidos = [];
        }
        public function getDepartamento()  {return $this->departamento;}
        public function agregarCurso( $curso){$this->cursosImpartidos[] = "<b>".$curso."</b>";}
        public function getCursosImpartidos(){return $this->cursosImpartidos;}
        // Implementación del método abstracto de Persona
        public function presentarse()  {
            $cursos = !empty($this->cursosImpartidos) ? "Imparto los cursos: " . implode(", ", $this->cursosImpartidos) . "." : "Actualmente no tiene cursos asignados.";
            return "Hola, soy el Profesor " . $this->nombre . ", tengo " . $this->edad . " años, mi identificación es " . $this->identificacion . " y pertenezco al departamento de " . $this->departamento . ". " . $cursos;
        }
        // Método específico de Profesor
        public function impartirClase( $curso)  {
            return $this->nombre . " está impartiendo la clase de <b>" . $curso . "</b>.";}
    }
    // Implementamos la clase Estudiante
    //*******************************************************
    class Estudiante extends Persona {
        private $carrera;
        private $semestre;
        private $materiasInscritas;
        public function __construct( $nombre, $edad,  $identificacion,  $carrera, $semestre) {
            parent::__construct($nombre, $edad, $identificacion);
            $this->carrera = $carrera;
            $this->semestre = $semestre;
            $this->materiasInscritas = [];}
        // getter y setter 
        public function getCarrera()  {return $this->carrera;}
        public function getSemestre() {return $this->semestre;}
        public function inscribirMateria( $materia){$this->materiasInscritas[] = $materia;}
        public function getMateriasInscritas(){return $this->materiasInscritas;}
        // Implementación del método abstracto de Persona
        public function presentarse()  {
            $materias = !empty($this->materiasInscritas) ? "Está inscrito en: " . implode(", ", $this->materiasInscritas) . "." : "No tiene materias inscritas aún.";
            return "Hola, soy " . $this->nombre . ", tengo " . $this->edad . " años, mi identificación es " . $this->identificacion . ", estudio la carrera de " . $this->carrera . " y estoy en el semestre " . $this->semestre . ". " . $materias;}
        // Método específico de Estudiante
        public function estudiar( $materia)  {
            return $this->nombre . " está estudiando la materia de <b>" . $materia . "</b>.";}
    }
    // Implementamos la clase Vehiculo
    //*******************************************************
    class Vehiculo implements Actor, ObjetoInerte {
        public $marca;
        public $modelo;
        public $anioFabricacion;
        public $pesoKg; // Atributo para ObjetoInerte
        public function __construct( $marca,  $modelo, $anioFabricacion,$pesoKg) {
            $this->marca = "<b>".$marca."</b>";
            $this->modelo = "<b>".$modelo."</b>";
            $this->anioFabricacion = "<b>".$anioFabricacion."</b>";
            $this->pesoKg = "<b>".$pesoKg."</b>";}
        // getter y setter 
        public function getMarca()  {return $this->marca;}
        public function getModelo()  {return $this->modelo;}
        public function getAnioFabricacion() {return $this->anioFabricacion;}
        // Métodos de la interfaz Actor
        public function actuar()  {
            return "El " . $this->marca . " " . $this->modelo . " está en funcionamiento.";
        }
        public function moverse( $destino)  {
            return "El " . $this->marca . " " . $this->modelo . " se está dirigiendo hacia <b>" . $destino . "</b>.";
        }
        // Métodos de la interfaz ObjetoInerte
        public function describir()  {
            return "Es un vehículo marca " . $this->marca . ", modelo " . $this->modelo . ", fabricado en " . $this->anioFabricacion . " y pesa " . $this->pesoKg . " kg.";
        }
        public function getPeso(){
            return $this->pesoKg;
        }
        // Método genérico de Vehículo
        public function encender()  {
            return "El " . $this->modelo . " ha sido encendido.";
        }
    }
    // Implementamos la clase Coche
    //*******************************************************
    class Coche extends Vehiculo {
        private $numPuertas;
        private  $tipoCombustible;
        public function __construct( $marca,  $modelo, $anioFabricacion,$pesoKg, $numPuertas,  $tipoCombustible) {
            parent::__construct($marca, $modelo, $anioFabricacion, $pesoKg);
            $this->numPuertas = "<b>".$numPuertas."</b>";
            $this->tipoCombustible = "<b>".$tipoCombustible."</b>";
        }
        // getter y setter
        public function getNumPuertas() {return $this->numPuertas; }
        public function getTipoCombustible()  {return $this->tipoCombustible; }
        // Sobreescritura del método describir para el coche
        public function describir()  {
            return parent::describir() . " Tiene " . $this->numPuertas . " puertas y usa " . $this->tipoCombustible . ".";}
        // Método específico de Coche
        public function acelerar()  {
            return "El " . $this->marca . " " . $this->modelo . " está acelerando.";}
    }
    // Implementamos la clase Bicicleta
    //*******************************************************
    class Bicicleta extends Vehiculo {
        private $numMarchas;
        private  $tipoBicicleta; // Ej. Montaña, Carretera, Urbana
        public function __construct( $marca,  $modelo, $anioFabricacion,$pesoKg, $numMarchas,  $tipoBicicleta) {
            // Una bicicleta puede tener un "peso" ligero, pero sigue siendo un ObjetoInerte
            parent::__construct($marca, $modelo, $anioFabricacion, $pesoKg);
            $this->numMarchas = "<b>".$numMarchas."</b>";
            $this->tipoBicicleta = "<b>".$tipoBicicleta."</b>";
        }
        // getter y setter
        public function getNumMarchas() {return $this->numMarchas;}
        public function getTipoBicicleta(){return $this->tipoBicicleta;}
        // Sobreescritura del método describir para la bicicleta
        public function describir()  {
            return parent::describir() . " Es una bicicleta de tipo " . $this->tipoBicicleta . " y tiene " . $this->numMarchas . " marchas.";
        }
        // Sobreescritura de los métodos Actor para ser más específicos de bicicleta
        public function actuar()  {
            return "La " . $this->marca . " " . $this->modelo . " está siendo pedaleada.";}
        public function moverse( $destino)  {
            return "La bicicleta " . $this->marca . " " . $this->modelo . " se está desplazando hacia " . $destino . " con energía humana.";
        }
        // Método específico de Bicicleta
        public function pedalear()  {return "Se está pedaleando la " . $this->modelo . ".";}
    }

    //Ejemplos de uso
    echo "<h1>Ejemplos de Uso</h1>";

    echo "<h2>Personas:</h2>";
    $profesor = new Profesor("Dr. Humberto Gómez", 45, "1234567-P", "Sistemas");
    $profesor->agregarCurso("Programación Orientada a Objetos");
    $profesor->agregarCurso("Bases de Datos I");
    echo "<p>" . $profesor->presentarse() . "</p>";
    echo "<p>" . $profesor->impartirClase("Programación Web") . "</p>";
    echo "<p>" . $profesor->moverse("la sala de profesores") . "</p>";
    echo "<hr>";

    $estudiante = new Estudiante("Juan Pérez", 20, "7890123-E", "Ingeniería Informática", 4);
    $estudiante->inscribirMateria("Estructura de Datos");
    $estudiante->inscribirMateria("Cálculo II");
    echo "<p>" . $estudiante->presentarse() . "</p>";
    echo "<p>" . $estudiante->estudiar("Estructura de Datos") . "</p>";
    echo "<p>" . $estudiante->actuar() . "</p>";
    echo "<hr>";

    echo "<h2>Vehículos:</h2>";
    $coche = new Coche("Toyota", "Corolla", 2022, 1300.5, 4, "Gasolina");
    echo "<p>" . $coche->describir() . "</p>";
    echo "<p>" . $coche->encender() . "</p>";
    echo "<p>" . $coche->moverse("el centro de la ciudad") . "</p>";
    echo "<p>" . $coche->acelerar() . "</p>";
    echo "<p>Peso del coche: " . $coche->getPeso() . " kg</p>";
    echo "<hr>";

    $bicicleta = new Bicicleta("Warrior", "Carretera", 2023, 13.7, 12, "Montaña");
    echo "<p>" . $bicicleta->describir() . "</p>";
    echo "<p>" . $bicicleta->pedalear() . "</p>";
    echo "<p>" . $bicicleta->moverse("el sendero del parque") . "</p>";
    echo "<p>Peso de la bicicleta: " . $bicicleta->getPeso() . " kg</p>";
    echo "<p>" . $bicicleta->actuar() . "</p>";
    echo "<hr>";

    // Demostración de Polimorfismo
    echo "<h2>Demostración de Polimorfismo:</h2>";

    function mostrarActor(Actor $actor) {
        echo "<p>" . $actor->actuar() . "</p>";
        echo "<p>" . $actor->moverse("algún lugar") . "</p>";
    }

    echo "<h3>Actores:</h3>";
    mostrarActor($profesor);
    mostrarActor($estudiante);
    mostrarActor($coche);
    mostrarActor($bicicleta);
    echo "<hr>";

    function mostrarObjetoInerte(ObjetoInerte $objeto) {
        echo "<p>" . $objeto->describir() . "</p>";
        echo "<p>El objeto pesa: " . $objeto->getPeso() . " kg</p>";
    }

    echo "<h3>Objetos Inertes:</h3>";
    mostrarObjetoInerte($coche);
    mostrarObjetoInerte($bicicleta);
    
    echo "<hr>";
?>