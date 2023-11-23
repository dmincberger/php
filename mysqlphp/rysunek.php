<?php
  for($i=0; $i<10; $i++)
    { $liczby[$i] = rand()%10; }
  header("Content-type: image/jpeg");
  $rysunek = imagecreate (1000,1000)
    or die("Biblioteka graficzna nie została zainstalowana!");
  $kolorbialy = imagecolorallocate ($rysunek, 255, 255, 255);
  $kolorczarny = imagecolorallocate ($rysunek, 0, 0, 0);
  imagefill($rysunek, 0, 0, $kolorbialy);

  for( $i=0; $i<10; $i++)
  {
    $kolorslupka = imagecolorallocate ($rysunek, 25*$i, 25*$i,0);
    imagefilledrectangle ($rysunek,20,$i*10+460,20+$liczby[$i]*100,$i*10+462, $kolorslupka);
    imagestring ($rysunek, 1,20+$liczby[$i]*100, $i*10+457, $i, $kolorczarny);
  }
  imagegif($rysunek);
?>
