<?php
    mysqli_report(MYSQLI_REPORT_OFF);
    $conn=@mysqli_connect("localhost","root","",'dmincberger');
    if(!$conn) die('Brak połączenia z MySQL');
    $przycisk='Dodaj';
    $id='';
    $imie='';
    $nazwisko='';
    $dataur='';
    if(isset($_GET['akcja'])){
        switch($_GET['akcja']){
            case 'Usuń':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    mysqli_query($conn, "DELETE FROM pracownicy WHERE id_pracownika=$id") or die('Nie można usunąć rekordu');
                }
                break;
            case 'Dodaj':
                if(isset($_GET['imie'],$_GET['nazwisko'],$_GET['dataur'])){
                    $imie=$_GET['imie'];
                    $nazwisko=$_GET['nazwisko'];
                    $dataur = $_GET['dataur'];
                    mysqli_query($conn, "INSERT INTO pracownicy(imie,nazwisko,data_urodzenia) 
                    VALUES('$imie','$nazwisko','$dataur')") or die('INSERT nie działa');
                    $imie='';
                    $nazwisko='';
                    $dataur='';
                }
                break;
            case 'Edytuj':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $result=mysqli_query($conn,"SELECT imie,nazwisko,data_urodzenia FROM pracownicy WHERE id_pracownika=$id") or die('Błąd w SELECT');
                    $row=mysqli_fetch_array($result);
                    $imie=$row['imie'];
                    $nazwisko=$row['nazwisko'];
                    $dataur=$row['data_urodzenia'];
                    $przycisk='Zapisz';
                }
            case 'Zapisz':
                if(isset($_GET['id'],$_GET['imie'],$_GET['nazwisko'],$_GET['dataur'])){
                    $id=$_GET['id'];
                    $imie=$_GET['imie'];
                    $nazwisko=$_GET['nazwisko'];
                    $dataur = $_GET['dataur'];
                    mysqli_query($conn, "UPDATE pracownicy SET imie='$imie', nazwisko='$nazwisko', data_urodzenia='$dataur' WHERE id_pracownika=$id") or die('Aktualizacja nie działa');
                    $id='';
                    $imie='';
                    $nazwisko='';
                    $dataur='';
                }
                break;
        }
    }
    
    
    $result=mysqli_query($conn,"SELECT id_pracownika AS id,imie,nazwisko,data_urodzenia FROM pracownicy") or die('Błąd w SELECT');
    if(mysqli_num_rows($result)>0){
        echo '<table border=1><tr><th>Imię</th><th>Nazwisko</th><th>Data urodzenia</th><th>Usuwanie</th>
        <th>Edycja</th></tr>';
        while($row=mysqli_fetch_array($result)){
            echo '<form><tr><td><input type="hidden" name="id" value="',$row['id'],'">',$row['imie'],'</td>
            <td>',$row['nazwisko'].'</td>
            <td>',$row['data_urodzenia'],'</td>
            <td><input type="submit" name="akcja" value="Usuń"></td>
            <td><input type="submit" name="akcja" value="Edytuj"></td></tr></form>';
        };
        echo '</table><br>';
    }
    mysqli_close($conn);
echo "
<form>
    <input type='hidden' name='id' id='id' value='$id'>
    Imię: <input type='text' name='imie' id='imie' value='$imie'><br>
    Nazwisko: <input type='text' name='nazwisko' id='nazwisko' value='$nazwisko'><br>
    Data urodzenia: <input type='date' name='dataur' id='dataur' value='$dataur'><br>
    <input type='submit' name='akcja' value='$przycisk'>
</form>"
?>