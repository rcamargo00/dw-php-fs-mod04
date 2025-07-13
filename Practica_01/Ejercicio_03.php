<?php
    //3.	Realice la suma, resta, multiplicación y división de dos números complejos.    
    //Función para sumar dos números complejos.     
    function sumarComplejos($c1, $c2) {
        $real = $c1['real'] + $c2['real'];
        $imaginaria = $c1['imaginaria'] + $c2['imaginaria'];
        return ['real' => $real, 'imaginaria' => $imaginaria];
        //return array El resultado de la suma (['real' => x, 'imaginaria' => y]).
    }    
    //Función para restar dos números complejos.
    function restarComplejos($c1, $c2) {
        $real = $c1['real'] - $c2['real'];
        $imaginaria = $c1['imaginaria'] - $c2['imaginaria'];
        return ['real' => $real, 'imaginaria' => $imaginaria];
        //return array El resultado de la resta (['real' => x, 'imaginaria' => y]).
    }    
    //Función para multiplicar dos números complejos.     
    function multiplicarComplejos($c1, $c2) {
        $real = ($c1['real'] * $c2['real']) - ($c1['imaginaria'] * $c2['imaginaria']);
        $imaginaria = ($c1['real'] * $c2['imaginaria']) + ($c1['imaginaria'] * $c2['real']);
        return ['real' => $real, 'imaginaria' => $imaginaria];
        //return array El resultado de la multiplicación (['real' => x, 'imaginaria' => y]).
    }    
    //Función para dividir dos números complejos.    
    //La fórmula para la división de (a + bi) / (c + di) es:
    //[(ac + bd) / (c^2 + d^2)] + [(bc - ad) / (c^2 + d^2)]i
    function dividirComplejos($c1, $c2) {
        $denominador = ($c2['real'] * $c2['real']) + ($c2['imaginaria'] * $c2['imaginaria']);

        // Evitar división por cero
        if ($denominador == 0) {
            return ['error' => 'División por cero: el divisor es un número complejo cero.'];
        }
        $real = (($c1['real'] * $c2['real']) + ($c1['imaginaria'] * $c2['imaginaria'])) / $denominador;
        $imaginaria = (($c1['imaginaria'] * $c2['real']) - ($c1['real'] * $c2['imaginaria'])) / $denominador;
        return ['real' => $real, 'imaginaria' => $imaginaria];
        //return array El resultado de la división (['real' => x, 'imaginaria' => y]) o un error si el divisor es cero.
    }
    // --- Ejemplos de uso ---
    // Definir dos números complejos
    $num1 = ['real' => 3, 'imaginaria' => 2]; // Representa 3 + 2i
    $num2 = ['real' => 1, 'imaginaria' => -4]; // Representa 1 - 4i
    $num3 = ['real' => 0, 'imaginaria' => 0]; // Representa 0 + 0i (para probar división por cero)

    echo "<h2>Operaciones con números complejos (sin clases)</h2>";

    echo "Número 1: " . $num1['real'] . ($num1['imaginaria'] >= 0 ? ' + ' : ' - ') . abs($num1['imaginaria']) . "i<br>";
    echo "Número 2: " . $num2['real'] . ($num2['imaginaria'] >= 0 ? ' + ' : ' - ') . abs($num2['imaginaria']) . "i<br><br>";

    // Suma
    $resultadoSuma = sumarComplejos($num1, $num2);
    echo "Suma ($num1[real] + {$num1['imaginaria']}i) + ($num2[real] + {$num2['imaginaria']}i): <br>";
    echo "Resultado: " . $resultadoSuma['real'] . ($resultadoSuma['imaginaria'] >= 0 ? ' + ' : ' - ') . abs($resultadoSuma['imaginaria']) . "i<br><br>";

    // Resta
    $resultadoResta = restarComplejos($num1, $num2);
    echo "Resta ($num1[real] + {$num1['imaginaria']}i) - ($num2[real] + {$num2['imaginaria']}i): <br>";
    echo "Resultado: " . $resultadoResta['real'] . ($resultadoResta['imaginaria'] >= 0 ? ' + ' : ' - ') . abs($resultadoResta['imaginaria']) . "i<br><br>";

    // Multiplicación
    $resultadoMultiplicacion = multiplicarComplejos($num1, $num2);
    echo "Multiplicación ($num1[real] + {$num1['imaginaria']}i) * ($num2[real] + {$num2['imaginaria']}i): <br>";
    echo "Resultado: " . $resultadoMultiplicacion['real'] . ($resultadoMultiplicacion['imaginaria'] >= 0 ? ' + ' : ' - ') . abs($resultadoMultiplicacion['imaginaria']) . "i<br><br>";

    // División
    $resultadoDivision = dividirComplejos($num1, $num2);
    echo "División ($num1[real] + {$num1['imaginaria']}i) / ($num2[real] + {$num2['imaginaria']}i): <br>";
    if (isset($resultadoDivision['error'])) {
        echo "Error: " . $resultadoDivision['error'] . "<br><br>";
    } else {
        echo "Resultado: " . round($resultadoDivision['real'], 4) . ($resultadoDivision['imaginaria'] >= 0 ? ' + ' : ' - ') . abs(round($resultadoDivision['imaginaria'], 4)) . "i<br><br>";
    }

    // Probar división por cero
    echo "División ($num1[real] + {$num1['imaginaria']}i) / ($num3[real] + {$num3['imaginaria']}i): <br>";
    $resultadoDivisionCero = dividirComplejos($num1, $num3);
    if (isset($resultadoDivisionCero['error'])) {
        echo "Error: " . $resultadoDivisionCero['error'] . "<br><br>";
    } else {
        echo "Resultado: " . round($resultadoDivisionCero['real'], 4) . ($resultadoDivisionCero['imaginaria'] >= 0 ? ' + ' : ' - ') . abs(round($resultadoDivisionCero['imaginaria'], 4)) . "i<br><br>";
    }
?>