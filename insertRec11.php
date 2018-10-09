<?php

  include("include/nustatymai.php");
  include("include/functions.php");

 $sql = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$username = $_POST['username'];
$taskai=$_GET['taskai'];
echo $taskai;
//$Turnnr = $_POST['Turnnr'];
//$Vardas = $_POST['Vardas'];
//$Turnnr = (int)$_GET['Turnnr'];
//$query = "INSERT INTO Turnyras(Turnnr,Vardas,Data,Statusas)VALUES('$Turnnr', '" . $naudotojas . "' , '$Data','$Statusas')";
//$query = "INSERT INTO Turnyras(Turnnr,Vardas,Data,Statusas)VALUES('$Turnnr','$Vardas', '$Data','$Statusas')";
$query = "UPDATE `users` SET `taskai` = taskai + 50 WHERE `username`='".$username."'";

if(mysqli_query($sql,$query)){
header("Location:operacija2.php");exit;}
else{
echo "fail";}


?>