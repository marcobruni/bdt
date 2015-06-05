<?php 
session_start();

if ($_SESSION["logged"])
{
include("db_con.php");

echo "<table>";
echo "<tr>";
echo "<td>";
echo  "<img src=\"http://www.assoicare.org/wp-content/uploads/2015/06/Logo_BdT.png\" alt=\"Logo Banca del Tempo di Grottammare\" height=\"50\" width=\"50\">";  
echo "</td>";
echo "<td>";
echo "Benvenuta/o ".$_SESSION["Nome"]." ".$_SESSION["Cognome"]." nel tuo conto corrente"; 
echo "</td>";
echo "</tr>";
echo "</table>";

echo "</br></br>";

$result = mysql_query("SELECT * FROM Registro WHERE Socio1 = ".$_SESSION["Id"]) 
or DIE('query non riuscita'.mysql_error());

if(mysql_num_rows($result))
{
   echo "<table border=\"1\" cellpadding = \"5\" >";
   echo "<tr>";
   echo "<td align = \"center\"><b>DATA</b></td>";
   echo "<td align = \"center\"><b>OPERAZIONE</b></td>";
   echo "<td align = \"center\"><b>SOCIO</b></td>";
   echo "<td align = \"center\"><b>ORE</b></td>";
   echo "<td align = \"center\"><b>SALDO</b></td>";
   echo "<td align = \"center\"><b>SERVIZIO</b></td>";
   echo "<td align = \"center\"><b>NOTE</b></td>";
   echo "</tr>";
   $saldo = 0;
   while ($row=mysql_fetch_assoc($result))
   {
   	echo "<tr>";
        echo "<td>".$row["Data"]."</td>";

        echo "<td>".$row["Operazione"]."</td>";

        $socio2 = mysql_query("SELECT * FROM Soci WHERE Id = ".$row["Socio2"]);
        $row2 = mysql_fetch_assoc($socio2);
        echo "<td>".$row2["Nome"]. " ".$row2["Cognome"]."</td>";

        echo "<td>".$row["Ore"]."</td>";

        if ($row["Operazione"] == "+")
        {
           $saldo = $saldo + $row["Ore"];
        }
        else
        {
           $saldo = $saldo - $row["Ore"];
        }

        echo "<td>".$saldo."</td>";


        $resservizio = mysql_query("SELECT * FROM Servizi WHERE Id = ".$row["Servizio"]);
        $rowserv = mysql_fetch_assoc($resservizio);
        echo "<td>".$rowserv["Nome"]."</td>";

        echo "<td>".$row["Note"]."</td>";

        echo "</tr>";
   }
   echo "</table>";
}
}
else
{
  echo "Non sei autorizzato per visualizzare questa pagina!!!";
}

?>
