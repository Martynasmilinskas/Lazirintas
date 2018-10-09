<?php

  include("include/nustatymai.php");
  include("include/functions.php");

 $sql = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);


$taskai = $_POST['taskai'];
$Nr = $_POST['Nr'];

//$ingredients = implode(', ', $_POST['Products']);

$query = "UPDATE users SET taskai='".$taskai."' where Nr=".$Nr;


if(mysqli_query($sql,$query)){
header("Location:operacija3.php");exit;}
else{
echo "fail";}


?>