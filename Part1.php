<!DOCTYPE html>
<html>
<head>
  <title>Part 1</title>
</head>
<body>
<?php


$flag = 0;
echo("<b>*** PART 1 *** </b><br>");
#define NO_ZEROLENGTH_COMMUNITY 1


$ip = "127.0.0.1:161";
print("<b>----------- System -----------</b><br>");

if(isset($_POST['submit'])){		
    $Location = $_POST['Location'];
    $Contact = $_POST['Contact'];
	
	$sysSer = snmp2_set("127.0.0.1", "public", ".1.3.6.1.2.1.1.6.0","s",$Location);
	$sysSer = snmp2_set("127.0.0.1", "public", ".1.3.6.1.2.1.1.4.0","s",$Contact);
	$flag = 1;
	
}

/*$SystemValues = snmp2_walk($ip, "public", ".1.3.6.1.2.1.1");//All Values now in $SystemValues

$i =0;
foreach ($SystemValues as $k=>$val) {
	echo"<table>";
	echo "<tr>   <td><b>System Description</b></td> </tr>";
	echo "<tr> <td><b> $SystemValues[$i] </b></td>   
	</tr>";
	$i++;

	echo "<br>";
	echo"</table>";
	
}
*/



$sysName = snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.5.0");
$sysName = substr($sysName,7);
print ("<br> System Name: <b> $sysName </b> <br>");



$sysDis = snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.1.0");
$sysDis = substr($sysDis,7);
print ("<br> System Description: <b> $sysDis </b> <br>");

$sysTime = snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.3.0");
print ("<br> System Up Time: <b> $sysTime </b> <br>");

$sysOID = snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.2.0");
print ("<br> System Object ID: <b> $sysOID </b> <br>");


$Location = snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.6.0");
$Location = substr($Location,7);
print ("<br> System Location: <b> $Location </b> <br>");


$Contact = snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.4.0");
$Contact = substr($Contact,7);
print ("<br> System Contact: <b> $Contact </b> <br>");

$sysSer = snmp2_get("127.0.0.1", "public", ".1.3.6.1.2.1.1.7.0");
$sysSer = substr($sysSer,8);
print ("<br> System Services: <b> $sysSer </b> <br>");


print("<br><b>-------- end --------</b><br>");

if($flag == 1){
	echo "successfully changed";
	echo "<br>";
	$flag = 0;
}

print("<br>------------------------------------------------------------------<br>");
?>

<br>
<h3> Change System Location or System Conatact </h3>

<form method="POST" action="/SNMP/Part1.php">
  System Location : <input type="text" name="Location" placeholder="Enter Location" Required>
  <br/>
  System Contact: <input type="text" name="Contact" placeholder="Enter Contact" Required>
  <br/>
  <input type="submit" name="submit" value="Submit">
</form>

<form action="/SNMP/Part2.php">
  <input type="submit" name="Next" value="Next Page">
</form>

</body>
</html>










