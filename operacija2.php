<?php


session_start();

if (!isset($_SESSION['prev']) || ($_SESSION['prev'] != "index"))
{ header("Location: logout.php");exit;}

?>


<html>
    <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <div style="text-align: center;  font-family: arial;"> <br><br>
        <title>Reitingų ir turnyro apžvalgai</title>
        <link href="include/styles.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
  
<?php
			include("include/meniu.php");
?>
      <table style="border-width: 2px; border-style: dotted;"><tr><td>
         Atgal į [<a href="index.php">Pradžia</a>]
      </td></tr></table><br>
			
		<div style="text-align: center;color:#FFFFFF;font-family: arial;"> <br><br> 
            <h1>Reitingų ir turnyro apžvalga</h1>
			
			

			

  
			 <?php
			
		  $db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
			$sql2 = "SELECT * FROM Turnyras ORDER BY Laikas ASC";
			$result2 = mysqli_query($db, $sql2);
			if (!$result2 || (mysqli_num_rows($result2) < 1))  
			{echo "Klaida skaitant lentelę "; exit;}
			 ?> 
			
			       
			   <br><br><br><br><center><font size="4">Rezultatai</font></center><br>

			   
			   


			   
<table class="greyGridTable">
    
	
	 <thead>
<tr>
<th>Numeris</th>
<th>Vieta</th>
<th>Vardas</th>
<th>Pavardė</th>
<th>Laikas min:sec</th>
<th>Pradžios laikas h:min:sec</th>
<th>Pabaigos laikas h:min:sec</th>
<th>Telefono numeris</th>
<th>Naikinti?</th>

</tr>
</thead>

<?php
		$counter = 1; 
        while($row = mysqli_fetch_assoc($result2)) 
	{	 
		  echo "<tbody> ";
          echo "<tr>";
		  echo "<td>" . $row['Numeris'] . "</td>";
		  echo "<td><b>" . $counter . "</b></td>"; 	 
		  echo "<td>" . $row['Vardas'] . "</td>";
		  echo "<td>" . $row['Pavarde'] . "</td>";
          echo "<td>" . $row['Laikas'] . "</td>";
		  echo "<td>" . $row['Pradzioslaikas'] . "</td>";
		  echo "<td>" . $row['Pabaigoslaikas'] . "</td>";
          echo "<td>" . $row['Statusas'] . "</td>";
		  echo "<td><a href='insertRec6.php?Numeris=".$row['Numeris']."'>Naikinti</a></td>";
		
		  echo "</tr>";   
		  echo "</tbody> ";
          $counter++;		  
	}
 ?>

 
         </table>
		 
	
		  <div style="float: center; text-align: center;color:#FFFFFF;  font-size: 20px; font-family: arial; ">
 <a href="insertRec.php" id="insert-more"> Pridėti eilutę </a>
 </div>
		 	<div style="float: left ;text-align: center;color:#FFFFFF;font-family: arial;">
    <form method="post" name="input" action="insertRec7.php" >
  <table style="float: left" border="1" cellspacing="0" cellpadding="3">

	<br><center><font size="4">Laiko redagavimas</font></center><br>
	Numeris:(Būtina įvesti jau egzistuojantį)<br>
   <input name="Numeris" type="text"/><br>
    Įveskite Laiką min:sec:<br>
	<input name="Laikas" type="text"/><br>
	
    <input type="submit" name="Submit" value="Redaguoti laiką" /> 
	  </table>
			</form>
	
	</div>
	
		<div style="float: right ;text-align: center;color:#FFFFFF;font-family: arial;">
    <form method="post" name="input" action="insertRec8.php" >
  <table style="float: right" border="1" cellspacing="0" cellpadding="3">

	<br><center><font size="4">Pradžios ir pabaigos laiko redagavimas</font></center><br>
	Numeris:(Būtina įvesti jau egzistuojantį)<br>
   <input name="Numeris" type="text"/><br>
    Įveskite Pradžios laiką h:min:sec:<br>
	<input name="Pradzioslaikas" type="text"/><br>
	Įveskite Pabaigos laiką h:min:sec:<br>
	<input name="Pabaigoslaikas" type="text"/><br>	
    <input type="submit" name="Submit" value="Redaguoti laikus" /> 
	  </table>
			</form>
	
	</div>
	
	
      <script>
 $("#insert-more").click(function () {
     $("#darkTable").each(function () {
         var tds = '<tr>';
         jQuery.each($('tr:last td', this), function () {
             tds += '<td>' + $(this).html() + '</td>';
         });
         tds += '</tr>';
         if ($('tbody', this).length > 0) {
             $('tbody', this).append(tds);
         } else {
             $(this).append(tds);
         }
     });
});

 </script>
 
 
 </div>
	<div style="float: left; text-align: center;color:#FFFFFF;font-family: arial">
    <form method="post" name="input" action="insertRec.php" >
	  <table style="float: left" border="1" cellspacing="0" cellpadding="3">


	   <br><center><font size="4">Duomenų pridėjimas</font></center><br>
    Įveskite Vardą:<br>
    <input name="Vardas" type="text"/><br>
	Įveskite Pavardę:<br>
    <input name="Pavarde" type="text"/><br>      
    Įveskite Laiką min:sec:<br>
	<input name="Laikas" type="text"/><br>
	Įveskite Pradžios laiką h:min:sec:<br>
	<input name="Pradzioslaikas" type="text"/><br>
	Įveskite Pabaigos laiką h:min:sec:<br>
	<input name="Pabaigoslaikas" type="text"/><br>
	Įveskite Telefono numerį:<br>
	<input name="Statusas" type="text"/><br>
    <input type="submit" name="Submit" value="Pridėti" /> 
	    </table>
	</form>

	</div>
	

	
	<div style="float: right;text-align: center;color:#FFFFFF;font-family: arial; ">
    <form method="post" name="input" action="insertRec5.php" >
  <table style="float: right" border="1" cellspacing="0" cellpadding="3">

	<br><center><font size="4">Duomenų redagavimas</font></center><br>
	Numeris:(Būtina įvesti jau egzistuojantį)<br>
    <input name="Numeris" type="text"/><br>
    Įveskite Vardą:<br>
    <input name="Vardas" type="text"/><br>
	Įveskite Pavardę:<br>
    <input name="Pavarde" type="text"/><br>      
    Įveskite Laiką min:sec:<br>
	<input name="Laikas" type="text"/><br>
	Įveskite Pradžios laiką h:min:sec:<br>
	<input name="Pradzioslaikas" type="text"/><br>
	Įveskite Pabaigos laiką h:min:sec:<br>
	<input name="Pabaigoslaikas" type="text"/><br>
	Įveskite Telefono numerį:<br>
	<input name="Statusas" type="text"/><br>
    <input type="submit" name="Submit" value="Redaguoti" /> 
	  </table>
			</form>

			
			
			
			  
		
		
           </div><br>
</div>
		</body>
		</html>
