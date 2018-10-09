<?php
// operacija1.php
// tiesiog rodomas tas pats index.php meniu ir 

session_start();
// cia sesijos kontrole
if (!isset($_SESSION['prev']) || ($_SESSION['prev'] != "index"))
{ header("Location: logout.php");exit;}

?>

<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8">
        <title>Reitingų ir turnyro apžvalgai</title>
        <link href="include/styles.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <table class="center" ><tr><td> <center><img src="include/top1.png"></center> </td></tr><tr><td>
<?php
			include("include/meniu.php"); //įterpiamas meniu pagal vartotojo rolę
?>
      <table style="border-width: 2px; border-style: dotted;"><tr><td>
         Atgal į [<a href="index.php">Pradžia</a>]
      </td></tr></table><br>
			
		<div style="text-align: center;color:blue"> <br><br>
            <h1>Reitingų ir turnyro apžvalga</h1>
			
<?php
          	$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
 			$sql = "SELECT Nr,username,taskai FROM users ORDER BY taskai DESC";
			$result = mysqli_query($db, $sql);
       
   // echo "<option value='". $row['username'] ."'>" . $row['Nr'] ." " . $row['username'] ." - taškai: " . $row['taskai'] ."</option>";

			
			
			
			
	?>			
			
			  <br><br><br><br><center><font size="4">Reitingas</font></center><br>
		 <table class="center" border="1" cellspacing="0" cellpadding="3">
    <tr><td><b>Vieta</b></td><td><b>Vartotojo numeris</b></td><td><b>Vartotojo vardas</b></td><td><b>Taškai</b></td></tr>		
				<?php	
	       $counter = 1; 
			 
			 while ($row = mysqli_fetch_array($result)) 
	{	 
		
          echo "<tr>";
		  //echo "<td>". $row['username'] ."" . $row['username'] ." - taškai: " . $row['taskai'] ."</td>";
          echo "<td>" . $counter . "</td>"; 
		  echo "<td>" . $row['Nr'] . "</td>";
	      echo "<td>" . $row['username'] . "</td>";
          echo "<td>" . $row['taskai'] . "</td>";
          echo "</tr>";  
		 $counter++;
	}

?>
			</table>	
			 <form method="post" name="input" action="insertRec4.php" >
		

	   <br><center><font size="5">Taškų keitimas</font></center><br>
	
  	 Įveskite vartotojo numerį:<br>
	<input name="Nr" type="text"/><br>
	 Įveskite norimus taškus:<br>
	<input name="taskai" type="text"/><br>
    <input type="submit" name="Submit" value="Pakeisti taškus" /> 
	  
			</form>

  
			 <?php
			
		  $db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
			$sql2 = "SELECT * FROM Turnyras";
			$result2 = mysqli_query($db, $sql2);
			if (!$result2 || (mysqli_num_rows($result2) < 1))  
			{echo "Klaida skaitant lentelę "; exit;}
			 ?> 
			       
			  <br><br><br><br><center><font size="8">Turnyro lentelė</font></center><br>
			   <br><br><br><br><center><font size="4">Pirmo etapo rezultatai</font></center><br>
		
    <table class="center" border="1" cellspacing="0" cellpadding="3">
      <tr><td><b>Turnyro numeris</b></td><td><b>Varžybų dalyviai</b></td><td><b>Varžybų laikas</b></td><td><b>Varžybų Statusas</b></td></tr>
<?php 
        while($row = mysqli_fetch_assoc($result2)) 
	{	 
          echo "<tr>";
		  echo "<td>" . $row['Turnnr'] . "</td>";
		//  echo "<td>" . $row['Vardas'] . "</td>";
		  echo "<td>" . $row['Vardas'] . "</td>";
          echo "<td>" . $row['Data'] . "</td>";
          echo "<td>" . $row['Statusas'] . "</td>";
	//    echo "<td><input type='checkbox' name='naudotojai[]' value'". $row['Vardas'] ."'</td>";
          echo "</tr>";      		

        
    }
        ?>
         </table>
      
	
    <form method="post" name="input" action="insertRec.php" >
		 <table class="center" border="1" cellspacing="0" cellpadding="3">

	   <br><center><font size="5">Pirmo varžybų etapo turnyrų pridėjimas</font></center><br>
	Turnyro identifikavimo numeris:<br>
    <input name="Turnnr" type="text"/><br>
             Pasirinkite kas prieš ką žais turnyre
              <tr><td><b>Varžybų dalyviai</b></td><td><b>Pirmas</b></td><td><b>Pries</b></td><td><b>Antras</b></td></tr>
             
       <?php 
            
          	$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
 			$sql10 = "SELECT * FROM users";
			$result10 = mysqli_query($db, $sql10);
       
   // echo "<option value='". $row['username'] ."'>" . $row['Nr'] ." " . $row['username'] ." - taškai: " . $row['taskai'] ."</option>";
	
			$str = "Pries";
				
        while($row = mysqli_fetch_assoc($result10)) 
	{	 
          echo "<tr>";
		  echo "<td>" . $row['username'] . "</td>";
		  echo "<td><input type='checkbox' name='naudotojai[]' value='". $row['username'] ."'</td>";
          echo "<td>$str </td>";
          echo "<td><input type='checkbox' name='naudotojai[]' value='". $row['username'] ."'</td>";
          echo "</tr>";      		
	
    }
 ?>
 </table>
        
   	Varžybų laikas:<br>
	<input name="Data" type="text"/><br>
	Laimėtojų sąrašas:<br>
	<input name="Statusas" type="text"/><br>
    <input type="submit" name="Submit" value="Pridėti" /> 
	   
			</form>

           <form method="post" name="input" action="insertRec5.php" >
			 <table class="center" border="1" cellspacing="0" cellpadding="3">

	   <br><center><font size="5">Pirmo varžybų etapo turnyrų redagavimas</font></center><br>
	Turnyro identifikavimo numeris:(Būtina įvesti jau egzistuojantį)<br>
    <input name="Turnnr" type="text"/><br>
             Pasirinkite kas prieš ką žais turnyre
              <tr><td><b>Varžybų dalyviai</b></td><td><b>Pirmas</b></td><td><b>Pries</b></td><td><b>Antras</b></td></tr>
             
       <?php 
            
          	$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
 			$sql10 = "SELECT * FROM users";
			$result10 = mysqli_query($db, $sql10);
       
   // echo "<option value='". $row['username'] ."'>" . $row['Nr'] ." " . $row['username'] ." - taškai: " . $row['taskai'] ."</option>";
	
			$str = "Pries";
				
        while($row = mysqli_fetch_assoc($result10)) 
	{	 
          echo "<tr>";
		  echo "<td>" . $row['username'] . "</td>";
		  echo "<td><input type='checkbox' name='naudotojai[]' value='". $row['username'] ."'</td>";
          echo "<td>$str </td>";
          echo "<td><input type='checkbox' name='naudotojai[]' value='". $row['username'] ."'</td>";
          echo "</tr>";      		
	
    }
 ?>
 </table>
        
   	Varžybų laikas:<br>
	<input name="Data" type="text"/><br>
	Laimėtojų sąrašas:<br>
	<input name="Statusas" type="text"/><br>
    <input type="submit" name="Submit" value="Redaguoti" /> 
	   
			</form>
			
		 <br><center><font size="5">Pirmo varžybų etapo turnyrų trynimas</font></center><br>	
		 <form action="insertRec6.php" method="post">
Įveskite Turnyro numerį:
<input name="Turnnr" type="text" />
<input name="Submit" type="submit" value="Ištrinti" />
</form>
			
			
			
			
			
			 <?php
			
		  $db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
			$sql3 = "SELECT * FROM Turnyras2";
			$result3 = mysqli_query($db, $sql3);
			if (!$result3 || (mysqli_num_rows($result3) < 1))  
			{echo "Klaida skaitant lentelę "; exit;}
			 ?> 
			       
			 
			   <br><br><br><br><center><font size="4">Antro etapo rezultatai</font></center><br>
		
    <table class="center" border="1" cellspacing="0" cellpadding="3">
      <tr><td><b>Turnyro numeris</b></td><td><b>Varžybų dalyviai</b></td><td><b>Varžybų laikas</b></td><td><b>Varžybų Statusas</b></td><td><b>Šalinti?</b></td></tr>
<?php
        while($row = mysqli_fetch_assoc($result3)) 
	{	 
          echo "<tr>";
		  echo "<td>" . $row['Turnnr'] . "</td>";
		  echo "<td>" . $row['Vardas'] . "</td>";
          echo "<td>" . $row['Data'] . "</td>";
          echo "<td>" . $row['Statusas'] . "</td>";
	//	  echo "<td><input type=\"checkbox\" name=\"naikinti_". $row['Turnnr'] ."\">";
          echo "</tr>";      		
	}
 ?>

        
		  </table>
		
    <form method="post" name="input" action="insertRec2.php" >
		 <table class="center" border="1" cellspacing="0" cellpadding="3">

	   <br><center><font size="5">Antro varžybų etapo turnyrų pridėjimas</font></center><br>
	Turnyro identifikavimo numeris:<br>
    <input name="Turnnr" type="text"/><br>
             Pasirinkite kas prieš ką žais turnyre
              <tr><td><b>Varžybų dalyviai</b></td><td><b>Pirmas</b></td><td><b>Pries</b></td><td><b>Antras</b></td></tr>
             
       <?php 
            
          	$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
 			$sql10 = "SELECT * FROM users";
			$result10 = mysqli_query($db, $sql10);
       
   // echo "<option value='". $row['username'] ."'>" . $row['Nr'] ." " . $row['username'] ." - taškai: " . $row['taskai'] ."</option>";
	
			$str = "Pries";
				
        while($row = mysqli_fetch_assoc($result10)) 
	{	 
          echo "<tr>";
		  echo "<td>" . $row['username'] . "</td>";
		  echo "<td><input type='checkbox' name='naudotojai[]' value='". $row['username'] ."'</td>";
          echo "<td>$str </td>";
          echo "<td><input type='checkbox' name='naudotojai[]' value='". $row['username'] ."'</td>";
          echo "</tr>";      		
	
    }
 ?>
 </table>
        
   	Varžybų laikas:<br>
	<input name="Data" type="text"/><br>
	Laimėtojų sąrašas:<br>
	<input name="Statusas" type="text"/><br>
    <input type="submit" name="Submit" value="Pridėti" /> 
	   
			</form>

           <form method="post" name="input" action="insertRec7.php" >
			 <table class="center" border="1" cellspacing="0" cellpadding="3">

	   <br><center><font size="5">Antro varžybų etapo turnyrų redagavimas</font></center><br>
	Turnyro identifikavimo numeris:(Būtina įvesti jau egzistuojantį)<br>
    <input name="Turnnr" type="text"/><br>
             Pasirinkite kas prieš ką žais turnyre
              <tr><td><b>Varžybų dalyviai</b></td><td><b>Pirmas</b></td><td><b>Pries</b></td><td><b>Antras</b></td></tr>
             
       <?php 
            
          	$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
 			$sql10 = "SELECT * FROM users";
			$result10 = mysqli_query($db, $sql10);
       
   // echo "<option value='". $row['username'] ."'>" . $row['Nr'] ." " . $row['username'] ." - taškai: " . $row['taskai'] ."</option>";
	
			$str = "Pries";
				
        while($row = mysqli_fetch_assoc($result10)) 
	{	 
          echo "<tr>";
		  echo "<td>" . $row['username'] . "</td>";
		  echo "<td><input type='checkbox' name='naudotojai[]' value='". $row['username'] ."'</td>";
          echo "<td>$str </td>";
          echo "<td><input type='checkbox' name='naudotojai[]' value='". $row['username'] ."'</td>";
          echo "</tr>";      		
	
    }
 ?>
 </table>
        
   	Varžybų laikas:<br>
	<input name="Data" type="text"/><br>
	Laimėtojų sąrašas:<br>
	<input name="Statusas" type="text"/><br>
    <input type="submit" name="Submit" value="Redaguoti" /> 
	   
			</form>
			
		 <br><center><font size="5">Antro varžybų etapo turnyrų trynimas</font></center><br>	
		 <form action="insertRec8.php" method="post">
Įveskite Turnyro numerį:
<input name="Turnnr" type="text" />
<input name="Submit" type="submit" value="Ištrinti" />
</form>
			
			
   	
			 <?php
			
		  $db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
			$sql4 = "SELECT * FROM Turnyras3";
			$result4 = mysqli_query($db, $sql4);
			if (!$result4 || (mysqli_num_rows($result4) < 1))  
			{echo "Klaida skaitant lentelę "; exit;}
			 ?> 
			       
			 
			   <br><br><br><br><center><font size="4">Finalinio etapo rezultatai</font></center><br>
		
    <table class="center" border="1" cellspacing="0" cellpadding="3">
      <tr><td><b>Turnyro numeris</b></td><td><b>Varžybų dalyviai</b></td><td><b>Varžybų laikas</b></td><td><b>Varžybų Statusas</b></td><td><b>Šalinti?</b></td></tr>
<?php
        while($row = mysqli_fetch_assoc($result4)) 
	{	 
          echo "<tr>";
		  echo "<td>" . $row['Turnnr'] . "</td>";
		  echo "<td>" . $row['Vardas'] . "</td>";
          echo "<td>" . $row['Data'] . "</td>";
          echo "<td>" . $row['Statusas'] . "</td>";
		 // echo "<td><input type=\"checkbox\" name=\"naikinti_". $row['Turnnr'] ."\">";
          echo "</tr>";      		
	}
 ?>

        
  </table>
	
   <div>
		  <form method="post" name="input" action="insertRec3.php" >
		 <table class="center" border="1" cellspacing="0" cellpadding="3">

	   <br><center><font size="5">Finalinio varžybų etapo turnyrų pridėjimas</font></center><br>
	Turnyro identifikavimo numeris:<br>
    <input name="Turnnr" type="text"/><br>
             Pasirinkite kas prieš ką žais turnyre
              <tr><td><b>Varžybų dalyviai</b></td><td><b>Pirmas</b></td><td><b>Pries</b></td><td><b>Antras</b></td></tr>
             
       <?php 
            
          	$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
 			$sql10 = "SELECT * FROM users";
			$result10 = mysqli_query($db, $sql10);
       
   // echo "<option value='". $row['username'] ."'>" . $row['Nr'] ." " . $row['username'] ." - taškai: " . $row['taskai'] ."</option>";
	
			$str = "Pries";
				
        while($row = mysqli_fetch_assoc($result10)) 
	{	 
          echo "<tr>";
		  echo "<td>" . $row['username'] . "</td>";
		  echo "<td><input type='checkbox' name='naudotojai[]' value='". $row['username'] ."'</td>";
          echo "<td>$str </td>";
          echo "<td><input type='checkbox' name='naudotojai[]' value='". $row['username'] ."'</td>";
          echo "</tr>";      		
	
    }
 ?>
 </table>
        
   	Varžybų laikas:<br>
	<input name="Data" type="text"/><br>
	Laimėtojų sąrašas:<br>
	<input name="Statusas" type="text"/><br>
    <input type="submit" name="Submit" value="Pridėti" /> 
	   
			</form>

           <form method="post" name="input" action="insertRec9.php" >
			 <table class="center" border="1" cellspacing="0" cellpadding="3">

	   <br><center><font size="5">Finalinio varžybų etapo turnyrų redagavimas</font></center><br>
	Turnyro identifikavimo numeris:(Būtina įvesti jau egzistuojantį)<br>
    <input name="Turnnr" type="text"/><br>
             Pasirinkite kas prieš ką žais turnyre
              <tr><td><b>Varžybų dalyviai</b></td><td><b>Pirmas</b></td><td><b>Pries</b></td><td><b>Antras</b></td></tr>
             
       <?php 
            
          	$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
 			$sql10 = "SELECT * FROM users";
			$result10 = mysqli_query($db, $sql10);
       
   // echo "<option value='". $row['username'] ."'>" . $row['Nr'] ." " . $row['username'] ." - taškai: " . $row['taskai'] ."</option>";
	
			$str = "Pries";
				
        while($row = mysqli_fetch_assoc($result10)) 
	{	 
          echo "<tr>";
		  echo "<td>" . $row['username'] . "</td>";
		  echo "<td><input type='checkbox' name='naudotojai[]' value='". $row['username'] ."'</td>";
          echo "<td>$str </td>";
          echo "<td><input type='checkbox' name='naudotojai[]' value='". $row['username'] ."'</td>";
          echo "</tr>";      		
	
    }
 ?>
 </table>
        
   	Varžybų laikas:<br>
	<input name="Data" type="text"/><br>
	Laimėtojų sąrašas:<br>
	<input name="Statusas" type="text"/><br>
    <input type="submit" name="Submit" value="Redaguoti" /> 
	   
			</form>
			
		 <br><center><font size="5">Finalinio varžybų etapo turnyrų trynimas</font></center><br>	
		 <form action="insertRec10.php" method="post">
Įveskite Turnyro numerį:
<input name="Turnnr" type="text" />
<input name="Submit" type="submit" value="Ištrinti" />
</form>
	
		
		
		
		
        </div><br>
