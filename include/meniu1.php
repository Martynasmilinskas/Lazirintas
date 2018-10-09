<?php
// meniu.php  rodomas meniu pagal vartotojo rolę

if (!isset($_SESSION)) { header("Location: logout.php");exit;}
include("include/nustatymai.php");
$user=$_SESSION['user'];
$userlevel=$_SESSION['ulevel'];

  //  echo "<table width=100% border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"meniu\">";
    //    echo "<tr><td>";
      //  echo "Prisijungęs vartotojas: <b>".$user."</b> <br>";
   //     echo "</td></tr><tr><td>";
        //if ($_SESSION['user'] != "guest") 
      //  echo "[<a href=\"operacija1.php\">Reitingų ir turnyro apžvalga</a>] &nbsp;&nbsp;";
      //  . "[<a href=\"operacija1.php\">Reitingų ir turnyro apžvalga</a>] &nbsp;&nbsp;";
     //Trečia operacija rodoma valdytojui ir administratoriui
        if ($userlevel == $user_roles[ADMIN_LEVEL] || $userlevel == $user_roles['Valdytojas']) {
			echo "<table width=100% border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"meniu\">";
			echo "<tr><td>";
			echo "Prisijungęs vartotojas: <b>".$user."</b> <br>";
			echo "</td></tr><tr><td>";
			echo "[<a href=\"operacija1.php\">Reitingų ir turnyro apžvalga</a>] &nbsp;&nbsp;";
            echo "[<a href=\"operacija2.php\">Reitingo ir turnyro redagavimas</a>] &nbsp;&nbsp;";
			
        }   
        //Administratoriaus sąsaja rodoma tik administratoriui
        if ($userlevel == $user_roles[ADMIN_LEVEL] ) {
            echo "[<a href=\"admin.php\">Administratoriaus sąsaja</a>] &nbsp;&nbsp;";
			//echo "[<a href=\"useredit.php\">Redaguoti paskyrą</a>] &nbsp;&nbsp;";
			echo "[<a href=\"logout.php\">Atsijungti</a>]";			
			echo "</td></tr></table>";
        }
//echo "[<a href=\"useredit.php\">Redaguoti paskyrą</a>] &nbsp;&nbsp;";
        //echo "[<a href=\"logout.php\">Atsijungti</a>]";
    //  echo "</td></tr></table>";
?>       
    
 