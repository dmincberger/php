<?php
    $tab = [];
    $slowa = [];
    if(!empty($_GET["tekst"])){
        for ($i = 0; $i < strlen($_GET["tekst"])+1; $i++){
            $slowo = "";
            $litera = ord($_GET["tekst"][$i]);
            echo " ";
            if ($litera == 32 || $litera == 0){
                $slowo = implode("",$tab);
                array_push($slowa,$slowo);
                $tab = [];
                $slowo = "";
            } else {
                $tab[$i] = chr($litera);
            }
            
        }
        for ($indeks = 0; $indeks < sizeof($slowa); $indeks++){
            if (strlen($slowa[$indeks])%2 == 1){
                $p = ucfirst($slowa[$indeks]);
                $p = strrev($p);
                $p = ucfirst($p);
                echo strrev($p);
                echo " ";
            } else {
                echo $slowa[$indeks];
                echo " ";
            }
        }
    }
?>