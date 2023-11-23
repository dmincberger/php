<?php
    mysqli_report(MYSQLI_REPORT_OFF);
    $conn=@mysqli_connect("localhost","root","",'dmincberger');
    if(!$conn) die('Brak połączenia z MySQL');
    $result=mysqli_query($conn,"SELECT odwiedziny FROM odwiedziny") or die('Błąd w SELECT');
    $wynik = mysqli_fetch_array($result);
    $licznik = $wynik;
    $odwiedz = $licznik["odwiedziny"] + 1;
    mysqli_query($conn, "UPDATE `odwiedziny` SET `odwiedziny`='$odwiedz' WHERE 1") or die('BŁĄD JAKIS');
    mysqli_close($conn);
    echo $odwiedz;
?>