<?php
session_start();
include("include/functions.php");
?>

<html>
    <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     
        <link href="include/styles.css" rel="stylesheet" type="text/css" >
    </head>

	<body>
        <table class="center" ><tr><td>
       
        </td></tr><tr><td> 
<?php
           
    if (!empty($_SESSION['user']))    
    {                                 
		
		inisession("part");   
		$_SESSION['prev']="index"; 
        
        include("include/meniu.php"); 
	}
?>

                <div style="text-align: center; color:Black">
                   <center><img src="top1.gif" width="600" height="500"></center>
<a href="operacija1.php?id=3" class="myButton">Tikrinti rezultatus</a>

                </div><br>
      
            </body>
</html>
