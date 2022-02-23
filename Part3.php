<!DOCTYPE html>
<html>
<head>
  <title>Part 3</title>
</head>
<body>

<style>
table, tr, td {
  border: 3px solid black;
  border-collapse: collapse;
  border-color:solid black;
}
</style>

<?php



echo("<b>*** PART 3 *** </b>");
#define NO_ZEROLENGTH_COMMUNITY 1


$ip = "127.0.0.1:161";

/////////////////////////////////////////////////////////////////////////////////////////////////////////

echo("<b><br><br>====== UDP Table ======</b>");

$udpLocalAddress = snmp2_walk($ip, "public", ".1.3.6.1.2.1.7.5.1.1");//LOCAL ADDRESS
$udpLocalPort = snmp2_walk($ip, "public", ".1.3.6.1.2.1.7.5.1.2");//PORT




$i =0;
echo"<table>";
echo "<tr>  <td><b>Index</b></td>  <td><b>Local Address</b></td>  <td><b>Local Port</b></td> </tr>";

foreach ($udpLocalAddress as $k=>$val) {
$udpLocalAddress[$i] = substr($udpLocalAddress[$i],10);
$udpLocalPort[$i] = substr($udpLocalPort[$i],8);
echo "<tr> <td>$i</td> <td style='color:RED;'><b>$udpLocalAddress[$i]</b></td>  
<td style='color:RED;'> <b>$udpLocalPort[$i] </b> </td>  </tr>";
	$i++;
}
echo "<br>";
echo"</table>";



///////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo("<b><br><br>====== UDp In Datagrams ======</b> ");

$udpInDatagrams = snmp2_get($ip, "public", ".1.3.6.1.2.1.7.1.0");
$udpInDatagrams = substr($udpInDatagrams,10);
echo"<table>";
echo "<tr> <td><b> Number of UDP In Datagrams</b></td> <td style='color:RED;'><b>$udpInDatagrams</b></td>" ;
echo "<br>";
echo"</table>";

print("<br>------------------------------------------------------------------<br>");
?>

<form action="/SNMP/Part2.php">
  <input type="submit" name="Previous" value="Previous Page">
</form>


<form action="/SNMP/Part4.php">
  <input type="submit" name="Next" value="Next Page">
</form>



</body>
</html>










