<?php
    //5.	Dado un valor de n, dibuje algo parecido a un arbolito de navidad 
    //      (sin su base).
    $n=10;$char="";$rep=-1;
    echo "El siguiente arbolito tiene una base de $n pisos.<br><br>";
    echo '<table  border="0px" align="rigth">';
    for($i=$n;$i>0;$i--){
        $rep+=2;
        // calculamos las n repeticiones
        $char = str_repeat("    *   ", $rep);
        echo '<tr><td align="center">'.$char.'</td><tr>';
    } 
    echo '</table>';
?>