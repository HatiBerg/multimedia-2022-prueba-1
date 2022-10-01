<?php
    $a = $_POST['variable_a'];
    $b = $_POST['variable_b'];
    $c = $_POST['variable_c'];

    function FuncionCuadratica($a,$b,$c){
        $raiz = sqrt((pow($b,2) - (4 * $a * $c)));
        if($raiz >= 0){
            $x1 = ((-$b) + ($raiz)) / (2 * $a);
            $x2 = ((-$b) - ($raiz)) / (2 * $a);

            if($x1==$x2){
                echo "Esta ecuacion tiene una solución unica:";
                echo "<br>";
                echo $x1;
            }else{
                echo "Los valores de la ecuacion son:";
                echo "<br>";
                echo "x1 = ".$x1;
                echo "<br>";
                echo "x2 = ".$x2;
                echo "<br>";
            }
        }else{
            echo "El resultado es un número imaginario";
            echo "<br>";
        }
    }

    if (!$a==0 && !$b==0 && !$c==0) {
        FuncionCuadratica($a,$b,$c);
    }else{
        $a=1;
        $b=-2;
        $c=1;
        FuncionCuadratica($a,$b,$c);
    }