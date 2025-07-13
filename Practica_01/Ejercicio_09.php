<?php
    //9. Crea una función llamada sumarTodos() que acepte una cantidad ilimitada de 
    //   números y devuelva su suma. (Debe utilizar la función que acepte este argumento …args)   
    
    // funcion principal 
    function sumarTodos(...$numeros) {
        $sumaTotal = 0; // Inicializamos la suma a cero
        // Iteramos sobre cada número en el array $numeros
        foreach ($numeros as $numero) {
            $sumaTotal += $numero; // Añadimos el número actual a la suma total
        }
        return $sumaTotal; // Devolvemos el resultado
    }
    //Ejemplos de uso
    echo sumarTodos(1, 2, 3)." es la Suma de 1, 2, 3 <br>"; // Salida: 6

    echo sumarTodos(10, 20, 30, 40, 50)." es la Suma de 10, 20, 30, 40, 50: <br>"; // Salida: 150

    echo sumarTodos(-5, 10, 2.5)." es la Suma de -5, 10, 2.5: <br>"; // Salida: 7.5

    echo sumarTodos()." es la Suma sin argumentos: <br>"; // Salida: 0 (porque la suma se inicializa en 0)
    
    $misNumeros = [100, 200, 300];
    echo sumarTodos(...$misNumeros)." es la Suma de un array [100, 200, 300]: <br>"; // Salida: 600
?>