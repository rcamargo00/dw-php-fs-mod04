<?php
    // 11. Funciones arrow con array_map, array_filter y array_reduce:
    //     Dado el siguiente vector:        
    $productos = [
        ['nombre' => 'Laptop', 'precio' => 1200, 'activo' => true],
        ['nombre' => 'Mouse', 'precio' => 25, 'activo' => true],
        ['nombre' => 'Monitor', 'precio' => 300, 'activo' => false],
        ['nombre' => 'Teclado', 'precio' => 80, 'activo' => true],
    ];
    // resolviendo inciso "a"
    $a = array_filter($productos, fn($prod) => $prod['activo']);
    $ar = array_map(fn($productos) => strtoupper($productos['nombre']),$a);
    echo "a. La lista con el nombre en mayúsculas de todos los productos activos es :";
    echo "<pre>"; print_r($ar); echo "</pre>";

    // resolviendo inciso "b"
    $b = array_filter($productos, fn($producto) => $producto['precio'] > 100);
    echo "b. Los productos que cuesten más de 100 son:";    
    echo "<pre>"; print_r($b); echo "</pre>";

    // resolviendo inciso "c"
    $c = array_reduce( $a, fn($sum, $producto) => $sum + $producto['precio']);
    $ca = array_map(fn($productos) => $productos['precio'],$a);
    echo "c. El precio de los productos activos son:";
    echo "<pre>"; print_r($ca); echo "</pre>";  echo " y el total es: $c";
?>