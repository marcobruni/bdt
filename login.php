<?php
session_start();
include("db_con.php"); 

$usr = mysql_real_escape_string($_POST["username"]);
$pwd = mysql_real_escape_string($_POST["password"]);
$_SESSION["username"]=$usr; 
$_SESSION["password"]=$pwd; 

if (strlen(trim($usr)) > 0 and strlen(trim($pwd)))
{
$query = mysql_query("SELECT * FROM Soci WHERE Username='".$usr."' AND Password ='".$pwd."'")  
or DIE('query non riuscita'.mysql_error());

if(mysql_num_rows($query)){        
	$row = mysql_fetch_assoc($query); 
	$_SESSION["logged"] = true;
	$_SESSION["Nome"] = $row["Nome"];  
	$_SESSION["Cognome"] = $row["Cognome"];
	$_SESSION["Id"] = $row["Id"];
	header("location:conto.php"); 
}
else
{
	echo "Non sei iscritto alla Banca del Tempo, per maggiori informazioni visita il nostro sito </br>"; 
	echo "<a target=\"_blank\" href=\"https://bdtgrottammare.wordpress.com\">bdtgrottammare.wordpress.com</a>";
}
}
else
{
	echo "Devi inserire il tuo Username e Password"; 
}

?>
