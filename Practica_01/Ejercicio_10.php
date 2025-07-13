<?php
    //10. Crea una función concatenarTexto() que reciba múltiples cadenas de texto y 
    //    las una en una sola, separándolas por un espacio. (Debe utilizar la función 
    //    que acepte este argumento …args) 

    //Función que Concatena una cantidad ilimitada de cadenas de texto, separándolas por un espacio.
    function concatenarTexto(...$cadenas) {
        // La función implode() es perfecta para esto: une los elementos de un array        
        return implode(' ', $cadenas);
    }
    
    //Ejemplos de uso
    echo "Ejemplo 1: " . concatenarTexto("Hola", "mundo", "PHP") . "<br>";
    // Salida esperada: Hola mundo PHP

    echo "Ejemplo 2: " . concatenarTexto("Programación", "es", "divertida", "y", "útil") . "<br>";
    // Salida esperada: Programación es divertida y útil

    echo "Ejemplo 3: " . concatenarTexto("Una", "sola", "palabra") . "<br>";
    // Salida esperada: Una sola palabra

    echo "Ejemplo 4: " . concatenarTexto() . "<br>";
    // Salida esperada: (cadena vacía, ya que no hay argumentos para unir)

    $frase = ["Esto", "es", "un", "array", "de", "palabras"];
    echo "Ejemplo 5 (con un array): " . concatenarTexto(...$frase) . "<br>";
    // Salida esperada: Esto es un array de palabras
?>