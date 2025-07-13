<?php
    //6. Realice el cálculo de la aproximación del valor de PI utilizando la fórmula de Ramanujam:
    //1/π = (2√2 / 9801) * Σ [n=0 a ∞] ((4n)! / (n!)⁴) * (1103 + 26390n) / (396^(4n))    
    $nro = 3;
    $x = (2*sqrt(2)/9801)*(1103/1);
    function factorial($n){
        $r=1;
        for ($i=1;$i<=$n;$i++){$r *= $i;}        
        return $r;
    }
    // Corremos n iteraciones    
    $sum =0.0;
    for ($i=0;$i<$nro;$i++){
        //Calculamos en numerador
        $num = factorial(4 * $i) * (1103 + (26390 * $i));
        // Calculamos el dominador 
        $deno = pow(factorial($i), 4) * pow(396, 4 * $i);        
        $sum += ($num/$deno);        
    }
    //Calculamos la constrante 
    $const = (2*sqrt(2))/9801;
    // Obtenemos el resultado final
    $PIAprox = ($const*$sum);
    echo (1/PI())." es el valor de PI<br>";
    echo $PIAprox." valor de PI calculado con la fórmula Ramanujam con $nro iteraciones<br>";   

?>