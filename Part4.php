<!DOCTYPE html>
<html>
<head>
  <title>Part 4</title>
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



echo("<b>*** PART 4 *** </b>");
#define NO_ZEROLENGTH_COMMUNITY 1


$ip = "127.0.0.1:161";

/////////////////////////////////////////////////////////////////////////////////////////////////////////

echo("<b><br><br>============================================== Interfaces Table ==============================================</b>");

$InterfaceDesc = snmp2_walk($ip, "public", ".1.3.6.1.2.1.2.2.1.2");//A textual string containing information about the interface
$InterfaceMTU = snmp2_walk($ip, "public", ".1.3.6.1.2.1.2.2.1.4");//The size of the largest datagram which can be sent/received on the interface
$IfPhysicalAddress = snmp2_walk($ip, "public", ".1.3.6.1.2.1.2.2.1.6");//The interface's address 





$i =0;
echo"<table>";
echo "<tr>  <td><b>Index</b></td>  <td><b>Interface Description</b></td>  <td><b>Interface MTU</b></td> <td><b>Interface MAC</b></td></tr>";

foreach ($InterfaceDesc as $k=>$val) {
	

$InterfaceDesc[$i] = substr($InterfaceDesc[$i],12);
$InterfaceMTU[$i] = substr($InterfaceMTU[$i],8);
if(strlen($IfPhysicalAddress[$i])>2) $IfPhysicalAddress[$i] = substr($IfPhysicalAddress[$i],12);



$InterfaceDesc[$i] = preg_replace('/\s+/', '', $InterfaceDesc[$i]);
$InterfaceDesc[$i] = hex2bin($InterfaceDesc[$i]);


echo "<tr> <td>$i</td> <td><b>$InterfaceDesc[$i]</b></td>  
<td> <b>$InterfaceMTU[$i] </b> </td>  
<td style='color:RED;'> <b>$IfPhysicalAddress[$i] </b> </td>  
</tr>";
	$i++;
}
echo "<br>";
echo"</table>";


print("<br>------------------------------------------------------------------<br>");


?>

<form action="/SNMP/Part3.php">
  <input type="submit" name="Previous" value="Previous Page">
</form>



</body>
</html>










