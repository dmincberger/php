<!-- <form method="GET" action="formularz.php">
    <input type="number" name="num1">
    <input type="number" name="num2">
    <button type="submit">Wyślij</button>
</form> -->
<?php
    // echo $_GET['num1'];
    // echo $_GET['num2'];
//     function pole($a, $b){
//         return $a*$b;
//     }
// if(!empty($_GET['num1']) && !empty($_GET['num2'])){
//     $a = $_GET['num1'];
//     $b = $_GET['num2'];
// $wynik = pole($a, $b);
// echo $wynik;
// } else {
//     echo "cum";
// }

$a = 1;
$b = 1;
$m = 1;
$z = 1;
function kroliki($z, $a, $m, $b){
    if ($m == 11){
        return $z;
    } else {
        return kroliki($z = $a + $b, $a = $b, $m + 1, $b = $z);
    } 
}
echo kroliki($z, $a, $m, $b);
// 1 1 2
// 1 2 3
// 2 3 5
?>
