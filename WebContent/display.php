<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Purchase Summary</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' href='css/displaystyle.css' type='text/css' />
<SCRIPT TYPE="text/javascript"> 
var message="Sorry, right-click has been disabled"; 
function clickIE() {if (document.all) {(message);return false;}} 
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) { 
if (e.which==2||e.which==3) {(message);return false;}}} 
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;} 
document.oncontextmenu=new Function("return false") 
</SCRIPT> 
<style type="text/css">
#mtable
{
font-family:"Tempus Sans ITC",cursive;
text-align: center;
width:100%;
border-collapse:collapse;

}
#mtable td
{
font-size:15px;
text-align:center;
border:3px solid #C1BFCC;
padding:4px 4px ;
color:#302A54;
}
#mtable th 
{
font-size:15px;
text-align:center;
padding-top:4px;
border:3px solid #C1BFCC;
padding-bottom:4px;
background-color:#C1BFCC;
color:#302A54;
}
</style>
</head>
<body>
<div id=#wrapper">
<form >
<div class="username">
<?php
session_start();
if(!isset($_SESSION['user']))
   {
    echo "Welcome:"; echo $_SESSION['user'];
   }
   else
   {
    echo "Welcome:"; echo $_SESSION['user'];
    }
    ?>
    </div>
    <div class="logout">
    <?php 
    echo "<a href=page1.php >Logout</a>";
    session_destroy(); 
    ?>
    </div>
    <div></div>
    <div></div>
<fieldset>
<legend>Purchase Summary</legend>    
    <div>
    <?php 
    $flag=0;
    $con = mysql_connect("localhost","root","");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("test", $con);

$user=$_SESSION['user'];
$product[0]=$_SESSION['apple'];
$product[1]=$_SESSION['samsung'];
$product[2]=$_SESSION['fastrack'];
$product[3]=$_SESSION['sonydslr'];
$product[4]=$_SESSION['sweat_shirt'];
$product[5]=$_SESSION['exthdd'];
$status = "Order in Process";
for ($i=0; $i<6; $i++)
  {
  $price[$i] =$_POST['price'.$i];
  //echo"Price:";
 //echo "$price[$i]";
 //echo "<br />";
  
  
 //CheckBox might not be selected.
 if (isset($_POST['check'.$i]))
 { 
 	 $checkbox[$i] =$_POST['check'.$i];
  	//echo"Check:";
 	 //echo "$checkbox[$i]";
	//echo "<br />";
 	//Quantity can be empty.
  if (isset($_POST['qty'.$i])) 
  {
   	$quantity[$i] =$_POST['qty'.$i];
   	//echo"Qty:";
  	///echo "$quantity[$i]";
  	$total= $price[$i]*$quantity[$i];
  	//echo"Total:";
  	//echo "$total";
 	//echo "<br />";
 	$ref_id=mt_rand(0, 99);
 	if($total != 0)
 	{
 	$con = mysql_connect("localhost","root","");
 	if (!$con)
	{
 		 die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("test", $con);
 	$sql="SELECT * from $user LIMIT 0, 30";
 	if (!mysql_query($sql,$con))
  	{
  	die('Error: ' . mysql_error());
  	}
  	else {
  		$GLOBALS['flag']=1;
  		//echo $flag;
  		$users = strtolower($user);
  		mysql_query("INSERT INTO $users (ref_id, Product, quantity, Price, Total, Status) VALUES ('$ref_id', '$product[$i]', '$quantity[$i]', '$price[$i]', '$total', '$status')");
		mysql_close($con);
	}
	}
  }
	else 
	{
		//echo "Total=0";
	}
 } 
 else 
 {
 	//return false;
 } 
  }
  if($GLOBALS['flag'] == 1)
  {
  	//Email code.
  	$con = mysql_connect("localhost","root","");
	if (!$con)
	{
  		die('Could not connect: ' . mysql_error());
	}
mysql_select_db("test", $con);
$sql_email_check = mysql_query("SELECT email FROM user1 WHERE userid='$user'");
$row = mysql_fetch_assoc($sql_email_check);
require_once "Mail.php";
$from = "sashpre001@gmail.com";
$to=$row["email"];;
$subject = "Hi!";
$body = "Hi,\n\nThank you for registering at Nic'n'Pic.\n
Nic'n'Pic is the best online shopping website\n
Your order has been recieved.\n
You can track your consignment by entering your Reference No.\n
Further asstance mail us @ sashpre001@gmail.com";

$host = "ssl://smtp.gmail.com";//"smtp.gmail.com";
$port = "465";//"587";
$username = "sashpre001";
$password = "sashank_08%";
$headers = array ('From' => $from,
'To' => $to,
'Subject' => $subject);
$smtp =@ Mail::factory('smtp',
array ('host' => $host,
'port' => $port,
'auth' => true,
'username' => $username,
'password' => $password));
$mail = @$smtp->send($to, $headers, $body);

if (@PEAR::isError($mail)) {
echo("<p>" . $mail->getMessage() . "</p>");
  }
  }
?>
</div>
<div class="table">
<?php 
$con = mysql_connect("localhost","root","");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("test", $con);
$user=$_SESSION['user'];
$result=mysql_query("SELECT ref_id, Product, quantity, Price, Total, Status FROM $user LIMIT 0 , 30");
$row = mysql_fetch_row($result); 
echo "<table id='mtable'>
<tr>
<th>Reference Id</th>
<th>Product Name</th>
<th>Quantity</th>
<th>Price</th>
<th>Total</th>
<th>Status</th>
</tr>";
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['ref_id'] . "</td>";
  echo "<td>" . $row['Product'] . "</td>";
  echo "<td>" . $row['quantity']. "</td>";
  echo "<td>" . "Rs.".$row['Price']."/-" . "</td>";
  echo "<td>" . "Rs.".$row['Total'] ."/-" . "</td>";
  echo "<td>" . $row['Status'] . "</td>";
  echo "</tr>";

  }
echo "</table>";
mysql_close($con);
?>
</div>
</fieldset>
</form>
</div>
</body>
</html>