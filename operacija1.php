<?php
session_start();





?>

<html>
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Reitingų apžvalga</title>
        <link href="include/styles.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
     
<?php
			include("include/meniu1.php"); 
?>

			
		<div style="text-align: center;color:#FFFFFF;  font-family: arial"> <br><br>
            <h1><font size="7" >REZULTATAI </font></h1>
			
		
			
	

			
			
			
			 <?php
			
		  $db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
			$sql2 = "SELECT * FROM Turnyras ORDER BY Laikas ASC";
			$result2 = mysqli_query($db, $sql2);
			if (!$result2 || (mysqli_num_rows($result2) < 1))  
			{echo "Klaida skaitant lentelę "; exit;}
			 ?> 
			       
			
				<table class="greyGridTable">
 
	
	


 
  <thead>
<tr>
<th>Vieta</th>
<th>Komanda</th>
<th>Laikas min:sec</th>

</tr>
</thead>
<?php
	       $counter = 1; 
        while($row = mysqli_fetch_assoc($result2)) 
	{	   
		  echo "<tbody> ";
          echo "<tr> ";
		  echo "<td><b>" . $counter . "<b></td>"; 
		  echo "<td>" . $row['Vardas'] . "</td>";
		//  echo "<td>" . $row['Pavarde'] . "</td>";
          echo "<td>" . $row['Laikas'] . "</td>";
          echo "</tr>";   
		  echo "</tbody> ";
          $counter++;		  
	}
 ?>

        
	  </table>
			
	
			
   	
		
		
        </div><br>
		    </body>
	</html>