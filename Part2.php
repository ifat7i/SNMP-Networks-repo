<!DOCTYPE html>
<html>
<head>
  <title>Part 2</title>
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



echo("<b>*** PART 2 *** </b><br>");
#define NO_ZEROLENGTH_COMMUNITY 1


$ip = "127.0.0.1:161";

/////////////////////////////////////////////////////////////////////////////////////////////////////////

echo("<b><br><br>======================== IP Address Table ========================</b><br>");

$ipAdEntAddr = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.20.1.1");//IP ADDRESSES
$ipAdEntIfIndex = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.20.1.2");
$ipAdEntNetMask = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.20.1.3");//NETMASK ADDRESSES
$ipAdEntBcastAddr= snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.20.1.4");
$ipAdEntReasmMaxSize = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.20.1.5");



$i =0;
echo"<table>";
echo "<tr> <td > <b> Index </b> </td><td> <b> IP Address </b> </td> <td > <b> IfIndex </b> </td> 
 <td> <b> Netmask </b> </td>  <td> <b> IP Broadcast Address </b>   </td> <td> <b>  Reassemble Max size </b>   </td> </tr>";

foreach ($ipAdEntAddr as $k=>$val) {
echo "<tr>   <td>$i</td> <td style='color:RED;'>  <b> $ipAdEntAddr[$i] </b>  </td> <td>$ipAdEntIfIndex[$i]</td>
<td style='color:RED;'> <b>$ipAdEntNetMask[$i] </b> </td> <td> $ipAdEntBcastAddr[$i] </td>  <td> $ipAdEntReasmMaxSize[$i] </td> </tr>";
	$i++;
}
echo "<br>";
echo"</table>";


echo("<br>---------------------------------------------------------------------------------------------------------<br>");


///////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo("<b><br><br>================ IP Net To Media Table (ARP TABLE) ================</b> ");

$ifIndex = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.1");
$a = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.2");//Physical Addresses
$b = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.3");//IP Addresseses
$c = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.4");//TYPE

$i =0;
echo"<table>";
echo "<tr> <td> <b> Index </b> </td> <td> <b> IfIndex </b> </td> <td> <b> Mac </b> </td> <td > <b> IP </b> </td><td> <b> Type </b> </td>  </tr>";
foreach ($a as $k=>$val) {
echo "<tr>   <td>$i</td> <td> $ifIndex[$i] </td>  <td style='color:RED;'>  <b> $a[$i] </b>  </td> <td style='color:RED;'> <b> $b[$i] </b> </td><td> $c[$i] </td>  </tr>";
    //echo "($i) $val  $b[$i] ------ $c[$i] <br>\n";
	$i++;
}
echo "<br>";
echo"</table>";





print("<br>------------------------------------------------------------------<br>");




?>


<form action="/SNMP/Part1.php">
  <input type="submit" name="Previous" value="Previous Page">
</form>


<form action="/SNMP/Part3.php">
  <input type="submit" name="Next" value="Next Page">
</form>



</body>
</html>










