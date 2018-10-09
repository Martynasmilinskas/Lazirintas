<?php
//nustatymai.php

define("DB_SERVER", "localhost");
define("DB_USER", "lantas_lazirintas");
define("DB_PASS", "KalneliauKirkzdyti");
define("DB_NAME", "lantas_Lazirintas");
define("TBL_USERS", "users");

$user_roles=array(      // vartotojų rolių vardai lentelėse ir  atitinkamos userlevel reikšmės
	"Administratorius"=>"9",
//	"Vadybininkas"=>"8",
	"Valdytojas"=>"5",
	"Klientas"=>"1");
define("UZBLOKUOTAS","255");      // vartotojas negali prisijungti kol administratorius nepakeis rolės
define("DEFAULT_LEVEL","Klientas");  // kokia rolė priskiriama kai registruojasi
define("ADMIN_LEVEL","Administratorius");  // kas turi vartotojų valdymo teisę
                                           // galioja ir vartotojas "guest", kuris neturi userlevel

$uregister="both";  // kaip registruojami vartotojai
// self - pats registruojasi, admin - tik ADMIN_LEVEL, both - abu atvejai

// * Email Constants - 
define("EMAIL_FROM_NAME", "Demo");
define("EMAIL_FROM_ADDR", "demo@ktu.lt");
define("EMAIL_WELCOME", false);

?>
