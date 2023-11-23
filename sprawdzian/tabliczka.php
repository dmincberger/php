<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>


</body>
</html>
<?php

$mnoznik = 1;
    for ($i = 1; $i <= 5; $i++){
        echo "<tr>";
        echo "<th>".$i."</th>";
        for ($y = 2; $y <= 8; $y++){
            if ($mnoznik == 1){
            echo "<th>".$y*$mnoznik."</th>";
            echo " ";
        } else {
            echo "<td>".$y*$mnoznik."</td>";
            echo " ";  
        }   
    }
    $mnoznik = $mnoznik + 1;
}
?>
</table>