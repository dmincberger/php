<?php
    $napis = "";
    $pogrub = 0;
    mysqli_report(MYSQLI_REPORT_OFF);
    $conn=@mysqli_connect("localhost","root","",'dmincberger');
    if(!$conn) die('Brak połączenia z MySQL');
    $result=mysqli_query($conn,"SELECT `osoby`.`IMIE`, `osoby`.`NAZWISKO`
    FROM `osoby` 
    INNER JOIN `auta` ON `auta`.`PESEL` = `osoby`.`PESEL`
    GROUP BY `osoby`.`IMIE`, `osoby`.`NAZWISKO`
    HAVING COUNT(`auta`.`PESEL`) > 1;") or die('Błąd w SELECT');
    while($wynik = mysqli_fetch_array($result))
    {
        $napis = "";
        $kolumny = mysqli_field_count($conn);
        for ($i=0;$i<$kolumny;$i++){
        if ($pogrub%2){
            echo "<strong>".$wynik[$i]." </strong>";
        } else {
        echo $wynik[$i]." ";
        }
        }
        echo "<br>";
        $pogrub += 1;
    };
?>