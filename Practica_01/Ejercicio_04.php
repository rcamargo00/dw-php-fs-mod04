<?php 
    $arreglo = [1,5,10,25,16,18,19];
    echo "De acuerdo al siguiente arreglo:<pre>";
    print_r($arreglo);
    echo "</pre>";
    $a=0;$ap=0;$b=0;$c=0;$d=0;$e=0;$f=0;$pos=0;
    foreach($arreglo as $ele){
        if ($a<=$ele){$a=$ele;$ap=$pos;}
        if ($ele%2 > 0){$b+=$ele;}
        if ($ele%2 == 0){$c+=$ele;}
        if ($pos%2 > 0){$d+=$ele;}
        if ($pos%2 == 0){$e+=$ele;}
        $f+=$ele;
        $pos++;
    }
    $f /= $pos;
    echo "a. El número mayor del array es: $a y su posición es : $ap.<br>";
    echo "b. La suma de los contenidos impares es: $b<br>";
    echo "c. La suma de contenidos pares es: $c<br>";
    echo "d. La suma de contenidos de posiciones impares es: $d<br>";
    echo "e. La suma de contenidos de posiciones pares es: $e<br>";
    echo "f. El promedio de la suma de todo el array es: $f<br>";    
?>