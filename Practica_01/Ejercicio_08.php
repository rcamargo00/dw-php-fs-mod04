<?php
    //8.	Crea una función llamada procesarTexto($texto, $callback) que reciba una cadena de texto y una función de callback.
    //      a.	La función debe aplicar el callback al texto y retornar el resultado.
    //      b.	Prueba la función con una función anónima que convierta el texto a mayúsculas.
    
    function procesarTexto($texto, callable $callback) {
        // Aplica la función de callback al texto y retorna el resultado
        return $callback($texto);
    }    
    $miTexto = "Hola, mundo. Esta es una prueba de texto.";
    echo "Texto original: " . $miTexto . "<br><br>";
    // Definimos una función anónima que convierte el texto a mayúsculas
    $convertirAMayusculas = function($cadena) {
        return strtoupper($cadena);
    };
    // Llamamos a procesarTexto, pasando la cadena y la función anónima
    $textoMayusculas = procesarTexto($miTexto, $convertirAMayusculas);
    echo "Texto en mayúsculas: " . $textoMayusculas . "<br><br>";
    // También puedes pasar la función anónima directamente sin asignarla a una variable
    $textoMinusculas = procesarTexto($miTexto, function($cadena) {
        return strtolower($cadena);
    });
    echo "Texto en minúsculas: " . $textoMinusculas . "<br><br>";
?>