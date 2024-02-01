<?php
    $napis = "";
    mysqli_report(MYSQLI_REPORT_OFF);
    $conn=@mysqli_connect("localhost","root","",'dmincberger');
    if(!$conn) die('Brak połączenia z MySQL');
    $result=mysqli_query($conn,"UPDATE auta, osoby
    SET `auta`.PESEL=`osoby`.`PESEL`
    WHERE `osoby`.`IMIE`='KAROL' AND `osoby`.`NAZWISKO`='HUBICKI' AND `auta`.`Rejestracja`='KR21004'") or die('Błąd w SELECT');
    echo $result
?>