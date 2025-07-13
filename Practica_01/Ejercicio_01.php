<?php
    //1. Realice la multiplicación de dos números por el método de multiplicación ruso.
    $x = 1256;
    $y = 300;    
    $res=0;
    $resT = "El resultado de $x*$y con el método Ruso es: ";
    echo "Resolviendo la multiplicación de $x*$y<br>";   
    // Ordenamos de mayor a menor
    if ($x>$y){
        $t=$x;
        $x = $y;
        $y = $t;
        echo "<br>x mayor que y, entonces ordenamos de menor a mayor <br><br>";
    };    
    echo '<table  border="0px" align="rigth">';
    // aplicamos el método
    do{        
        echo "<tr><td>".$x."</td><td>".$y."</td></tr>";
        if ($x%2>0){$res += $y;};
        $y*=2;
        $x =intval($x/2);
    }while($x>=1);
    echo '</table>';
    // imprimimos el resultdo
    echo "<br>".$resT.$res;
?>


