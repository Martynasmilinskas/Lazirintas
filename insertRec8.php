<?php

  include("include/nustatymai.php");
  include("include/functions.php");

 $sql = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);



$Numeris = $_POST['Numeris'];
$Pradzioslaikas = $_POST['Pradzioslaikas'];
$Pabaigoslaikas = $_POST['Pabaigoslaikas'];



$query = "UPDATE Turnyras SET  Pradzioslaikas='".$Pradzioslaikas."', Pabaigoslaikas='".$Pabaigoslaikas."' where Numeris=".$Numeris;

if(mysqli_query($sql,$query)){
header("Location:operacija2.php");exit;}
else{
echo "fail";}


?>