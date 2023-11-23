<?php
if (isset($_POST['login'],$_POST['pass'])){
    if($_POST['login']=='admin'&&$_POST['pass']=='admin'){
        session_start();
        $_SESSION['login']=$_POST['login'];
        header("Location: glowan.php");
        exit();
    }
    else 
    $error = "<b>Błędny login lub hasło</b><br>";
} else
    $error = false;
?>