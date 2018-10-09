<?php


session_start();
include("include/functions.php");
?>

<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>LAZIRINTAS</title>
        <link href="include/styles.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <table class="center" ><tr><td>
          
        </td></tr><tr><td> 
<?php
          
    if (!empty($_SESSION['user']))     
    {                                  
		
		inisession("part");  
		$_SESSION['prev']="Prisijungimas"; 
        
        include("include/meniu.php"); 
		
		
?>

                <div style="text-align: center; color:Black">
                    <center><img src="top1.gif" width="600" height="500"></center>
<a href="operacija1.php?id=3" class="myButton">Tikrinti rezultatus</a>
				
				
      <?php
	  
          }                
          else {   			 
              
              if (!isset($_SESSION['prev'])) inisession("full");             
              else {if ($_SESSION['prev'] != "proclogin") inisession("part"); 
                   }  
   			 
				echo "<div align=\"center\">";echo "<font size=\"4\" color=\"#ff0000\">".$_SESSION['message'] . "<br></font>";          
		
                echo "<table class=\"center\"><tr><td>";
                include("include/login.php");                  
                echo "</td></tr></table></div><br>";
           
		  }
		  
?>
            </body>
</html>
