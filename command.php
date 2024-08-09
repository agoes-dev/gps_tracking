<html> 
<head>
</head>
<body>
<?
if($submit)
{
  // form submitted
//  $host = '192.168.1.14';
//  $port = 8888;
  $host="202.67.15.98";
  $port = 2006;
	// create socket
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
	// connect to server
	$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
	// send string to server
  if(substr($isi_pesan,0,1) == "*")
	{
		$pesan = str_replace("*","\$",$isi_pesan);
		$data1 = substr($pesan,0,7);
		$data2 = substr($pesan,7);
		$message = $data1.$no_imei.",".$data2;
		socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
		// get server response
		$result = socket_read ($socket, 1024) or die("Could not read server response\n");
		// close socket
		socket_close($socket);
		// print result to browser
		echo "<div style=font-family:Arial;font-size:12px;>";
		echo "Status : <b>".$result."</b>";
		echo "</div>";
	}
}
echo "<div style=font-family:Arial;font-size:12px;>";
echo "<form name=form_pesan method=post action=$_SERVER[php_self]>";
echo "IMEI No :&nbsp;";
echo "<select style=width:400px;margin-top:20px; name=no_imei>";
echo "<option value=1061835747>1061835747</option>";
echo "<option value=10000000002>10000000002</option>";
echo "</select></br>";
echo "Perintah Command&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;";
echo "<select style=width:600px;margin-top:15px; name=isi_pesan>";
echo "<option value=*AI2011DA20206701312204D21FF5#>*AI2011DA20206701312204D21FF5# Server Raztel Port 8181</option>";
echo "<option selected value=*AI2011DA20206701312204D2205A#>*AI2011DA20206701312204D2205A# Server Raztel Port 8282</option>";
echo "<option value=*AI2011DB(1INDOSAT)(2INDOSAT)(41,\"IP\",\"INDOSATGPRS\")#>*AI2011DB(1INDOSAT)(2INDOSAT)(41,\"IP\",\"INDOSATGPRS\")# APN Indosat</option>";
echo "<option value=*AI2011DB(1WAP)(2WAP123)(41,\"IP\",\"TELKOMSEL\")#>*AI2011DB(1WAP)(2WAP123)(41,\"IP\",\"TELKOMSEL\")# APN Telkomsel</option>";
echo "<option value=*AI2011BI003CFFFF#>*AI2011BI003CFFFF#1 mnt Time periodik</option>";
echo "<option value=*AI2011BI0258FFFF#>*AI2011BI0258FFFF#10 mnt Time periodik</option>";
echo "<option value=*AI2011BI0078FFFF#>*AI2011BI0078FFFF#2 mnt Time periodik</option>";
echo "<option value=*AI2011BKFFFF#>*AI2011BKFFFF#Heart beat</option>";
echo "<option value=*AI2011AI(A1)#>*AI2011AI(A1)#Posisi diam send data</option>";
echo "<option value=*AI2011AH(2FFFF)#>*AI2011AH(2FFFF)#P save mode</option>";
echo "<option value=*AI2011BH10#>*AI2011BH10#Odometer</option>";
echo "<option value=*AI2011BH00#>*AI2011BH00#Odometer OFF</option>";
echo "<option value=*AI2011BB1#>*AI2011BB1#Relay ON</option>";
echo "<option value=*AI2011BB0#>*AI2011BB0#Relay OFF</option>";
//echo "<option selected value=*AI2000BF081510307769#>*AI2000BF081510307769#GPS call HP</option>";
echo "<option value=*AI2011MC0000005362000#>*AI2011MC0001005282000#Set Parameter BBM</option>";
echo "<option value=*AI2011MD#>*AI2011MD#Tanya Parameter BBM </option>";
echo "<option value=*AI2011AA(3+6285695297118)#>*AI2011AA(3+6285695297118)#monitor number Auto Answer One Way</option>";
echo "<option value=*AI2011AA(1+285695297118)#>*AI2011AA(1+285695297118)#Master service center number Auto Answer Two way</option>";
echo "<option value=*AI2011BA1#>*AI2011BA1#Reset default</option>";
echo "<option value=*AI2011BA0#>*AI2011BA0#Restart </option>";
echo "<option value=*AI2011MA003000603C00601E#>*AI2011MA003000603C00601E#Set Alarm BBM </option>";
echo "<option value=*AI2011MB#>*AI2011MB#Tanya Alarm BBM </option>";
echo "<option value=*AI2011BC#>*AI2011BC#Cancel Alarm</option>";
echo "<option value=*AI2011AH(+0801)#>*AI2011AH(+0801)#time zone +1</option>";
echo "</select></br>";
echo "<input style=margin-top:30px;margin-left:450px; type=submit name=submit value=Kirim >";
echo "</form>";
echo "</div>";
?>
</body>
</html>
