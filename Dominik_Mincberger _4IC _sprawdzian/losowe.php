<?php
$wszystkie = [];
$wiecej = [];

    for ($i = 0; $i < 30; $i++){
        $liczba = rand(-20,20);
        echo $liczba;
        echo "<br>";
        $wszystkie[$i] = $liczba;
        for ($y = 0; $y < sizeof($wszystkie)-1; $y++){
            if ($wszystkie[$y] == $liczba){
                array_push($wiecej,$liczba);
            }
        }
    }
    $unikaty = array_unique($wiecej);
    $dlugosc = sizeof($unikaty);
    echo "Ilosc duplikatow: ";
    echo $dlugosc;
?>