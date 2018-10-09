<?php

  include("include/nustatymai.php");
  include("include/functions.php");

 $sql = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);


$Vardas = $_POST['Vardas'];
$Pavarde = $_POST['Pavarde'];
$Laikas = $_POST['Laikas'];
$Statusas = $_POST['Statusas'];
$Pradzioslaikas = $_POST['Pradzioslaikas'];
$Pabaigoslaikas = $_POST['Pabaigoslaikas'];


$query = "INSERT INTO Turnyras(Vardas,Pavarde,Laikas,Statusas, Pradzioslaikas, Pabaigoslaikas)VALUES('$Vardas', '$Pavarde' , '$Laikas','$Statusas','$Pradzioslaikas','$Pabaigoslaikas')";

if(mysqli_query($sql,$query)){
header("Location:operacija2.php");exit;}
else{
echo "fail";}


?>