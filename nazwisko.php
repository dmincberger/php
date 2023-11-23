<?php
    if(!empty($_GET['imie']) && !empty($_GET['nazwisko'])){
        $imie = $_GET['imie'];
        $nazwisko = $_GET['nazwisko'];
        $len = strlen($imie);
        $sub = substr($imie,$len-1,1);

        echo substr($imie, 0, 1);
        echo substr($nazwisko, 0, 1);
        echo "\n";
        if ($sub =="a"){
            echo "Jestes kobieta";
        } else {
            echo "Jestes mezczyzna";
        }
    }
?>