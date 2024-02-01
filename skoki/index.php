<?php
mysqli_report(MYSQLI_REPORT_OFF);
$conn=@mysqli_connect("localhost","root","","skoki");
$result=@mysqli_query($conn, "SELECT `konkursy`.`ID_konkursu`
FROM `konkursy`");
while ($wynik=mysqli_fetch_array($result)){
    echo "<a href=index.php?id_konk=".$wynik[0].">".$wynik[0]."</a>";
    echo "<br>";
};
if (!empty($_GET["id_konk"])){
    $id_konk = $_GET["id_konk"];
    echo $id_konk;
    $result_dwa=@mysqli_query($conn, "SELECT `zawodnicy`.`Imie`,`zawodnicy`.`Nazwisko`,`wyniki`.`Skok1`,`wyniki`.`Skok2`,`wyniki`.`Skok2`,`wyniki`.`ID_konkursu`
FROM `zawodnicy`
INNER JOIN `wyniki` ON `wyniki`.`ID_zawodnika`=`zawodnicy`.`ID_zawodnika`
WHERE `wyniki`.`ID_konkursu`=$id_konk");
while ($wynik_dwa=mysqli_fetch_array($result_dwa)){
    echo $wynik_dwa[0];
    echo "<br>";
};
};


?>