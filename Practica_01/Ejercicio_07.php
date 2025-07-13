<?php
    //7. Resolver la ecuación de segundo grado (debe considerar también la solución de números complejos): ax^2+bx+c=0        
    function solveQuadraticEquation($a, $b, $c) {
        // Caso especial: si 'a' es 0, no es una ecuación de segundo grado.
        // Podría ser una ecuación lineal o simplemente inválida.
        if ($a == 0) {            
            return ['error' => "El coeficiente 'a' no puede ser cero para una ecuación cuadrática."];
        }
        $solutions = [];
        // Calcular el discriminante
        $discriminant = ($b * $b) - (4 * $a * $c);
        // Caso 1: Discriminante positivo (dos soluciones reales distintas)
        if ($discriminant > 0) {
            $x1 = (-$b + sqrt($discriminant)) / (2 * $a);
            $x2 = (-$b - sqrt($discriminant)) / (2 * $a);
            $solutions[] = ['real' => $x1, 'imaginary' => 0.0];
            $solutions[] = ['real' => $x2, 'imaginary' => 0.0];
        }
        // Caso 2: Discriminante cero (una solución real doble)
        elseif ($discriminant == 0) {
            $x = (-$b) / (2 * $a);
            $solutions[] = ['real' => $x, 'imaginary' => 0.0];
        }
        // Caso 3: Discriminante negativo (dos soluciones complejas conjugadas)
        else {
            $realPart = (-$b) / (2 * $a);
            // La parte imaginaria es sqrt(|discriminante|) / (2 * a)
            $imaginaryPart = sqrt(abs($discriminant)) / (2 * $a);
            $solutions[] = ['real' => $realPart, 'imaginary' => $imaginaryPart];
            $solutions[] = ['real' => $realPart, 'imaginary' => -$imaginaryPart];
        }
        return $solutions;
    }    
    //Función auxiliar para imprimir las soluciones.
    function printSolutions($solutions) {
        if (isset($solutions['error'])) {
            echo "Error: " . $solutions['error'] . "<br>";
            return;
        }
        echo "Soluciones:\n";
        foreach ($solutions as $index => $sol) {
            echo "  x" . ($index + 1) . " = ";
            if ($sol['imaginary'] == 0) {
                echo $sol['real']."  ;  ";
            } else {
                // Formato para números complejos: a + bi o a - bi
                if ($sol['imaginary'] > 0) {
                    echo $sol['real'] . " + " . $sol['imaginary'] . "i ; ";
                } else {
                    echo $sol['real'] . " - " . abs($sol['imaginary']) . "i ";
                }
            }
        }
    }
    // --- Ejemplos de uso ---
    echo "Ejemplo 1: Dos soluciones reales distintas (x^2 - 5x + 6 = 0) <br>";
    $a1 = 1;    $b1 = -5;   $c1 = 6;
    $solutions1 = solveQuadraticEquation($a1, $b1, $c1);
    printSolutions($solutions1);

    echo "<br><br> Ejemplo 2: Una solución real doble (x^2 - 4x + 4 = 0) <br>";
    $a2 = 1;    $b2 = -4;    $c2 = 4;
    $solutions2 = solveQuadraticEquation($a2, $b2, $c2);
    printSolutions($solutions2);    

    echo "<br><br>Ejemplo 3: Dos soluciones complejas (x^2 + x + 1 = 0) <br>";
    $a3 = 1;    $b3 = 1;    $c3 = 1;
    $solutions3 = solveQuadraticEquation($a3, $b3, $c3);
    printSolutions($solutions3);    

    echo "<br><br>Ejemplo 4: Coeficiente 'a' cero (no es cuadrática)<br>";
    $a4 = 0;    $b4 = 2;    $c4 = 4;
    $solutions4 = solveQuadraticEquation($a4, $b4, $c4);
    printSolutions($solutions4);
    
    echo "<br>Ejemplo 5: Otra con números complejos (x^2 + 4 = 0)<br>";
    $a5 = 1;    $b5 = 0;    $c5 = 4;
    $solutions5 = solveQuadraticEquation($a5, $b5, $c5);
    printSolutions($solutions5);
    echo "<br>";
?>