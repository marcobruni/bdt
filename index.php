<?php
session_start();// come sempre prima cosa, aprire la sessione 
include("db_con.php"); // includere la connessione al database
?>
<html>  
<head>
<title>Banca del Tempo di Grottammare</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<table>
<tr>
<td>
<img src="http://www.assoicare.org/wp-content/uploads/2015/06/Logo_BdT.png" alt="Logo Banca del Tempo di Grottammare" height="60" width="60">  
</td>
<td>
<h2>Banca del Tempo di Grottammare</h2>
</td>
</tr>
</table>

</br>

<form name="form_login" method="post" action="login.php">
<table>
<tr>
<td>Username</td>
<td><input type="text" name="username" ><td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="password"><td>
</tr>
<tr>
<td></td>
<td><button>Accedi</button><td>
</tr>
</table>
</form>
<body>
</html>
