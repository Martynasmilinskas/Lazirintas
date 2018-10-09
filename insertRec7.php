<?php

  include("include/nustatymai.php");
  include("include/functions.php");

 $sql = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);



$Numeris = $_POST['Numeris'];

$Laikas = $_POST['Laikas'];

$query = "UPDATE Turnyras SET  Laikas='".$Laikas."' where Numeris=".$Numeris;

if(mysqli_query($sql,$query)){
header("Location:operacija2.php");exit;}
else{
echo "fail";}


?>