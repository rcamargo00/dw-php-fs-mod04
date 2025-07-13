<?php
    //2.	Dado un número, verificar si dicho número es palíndromo.       
    function esPalindromo($x){
      $y=$x;    
      $t=0;
      while($y>0){
        $t =($t*10)+($y%10);
        $y=intval($y/10);
      };
      if ($x==$t){echo "$x es un número palíndromo<br>";}
      else{echo "$x no es un número palíndromo<br>";}
    }
    // Ejemplos 

    esPalindromo(7837)."<br>";
    esPalindromo(78387)."<br>";
    
?>