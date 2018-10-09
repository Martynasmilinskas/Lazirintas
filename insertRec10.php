<?php

  include("include/nustatymai.php");
  include("include/functions.php");

 $sql = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);


$Turnnr = $_POST['Turnnr'];
//$Vardas = $_POST['Vardas'];
//$Turnnr = (int)$_GET['Turnnr'];
//$query = "INSERT INTO Turnyras(Turnnr,Vardas,Data,Statusas)VALUES('$Turnnr', '" . $naudotojas . "' , '$Data','$Statusas')";
//$query = "INSERT INTO Turnyras(Turnnr,Vardas,Data,Statusas)VALUES('$Turnnr','$Vardas', '$Data','$Statusas')";
$query = "DELETE FROM Turnyras3 WHERE Turnnr='".$Turnnr."'";

if(mysqli_query($sql,$query)){
header("Location:operacija3.php");exit;}
else{
echo "fail";}


?>