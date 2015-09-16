<html>
<head>
<title>Confirm</title>
</head>
<body>
<link rel='stylesheet' href='css/style.css' type='text/css' />
<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
$con = mysql_connect("localhost","root","");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("test", $con);

$d=$_POST['userid'];
$p=$_POST['email'];
$s=$_POST['passid'];
$sql="SELECT * from user1 where userid='$_POST[userid]'";


if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  
  else {
  	$rc = mysql_affected_rows();
if(!$rc)
{
$sql="INSERT INTO user1 (userid,password,username,sex,address,country,zip,email) VALUES ('$_POST[userid]','$_POST[passid]','$_POST[username]','$_POST[sex]','$_POST[address]','$_POST[country]','$_POST[zip]','$_POST[email]')";
$to=$_POST['email'];
$sql_email_check = mysql_query("SELECT email FROM user1 WHERE email='$to'");
$email_check = mysql_num_rows($sql_email_check);
if ($email_check > 0){ 
              $errorMsg = "<b>ERROR:</b><br />Your Email address is already in use. Please try again<br />";
              echo "$errorMsg";
              Echo "<a href=page1.php>Back</a>";
              exit();
}
else {
	require_once "Mail.php";
$from = "sashpre001@gmail.com";
$to=$_POST['email'];
$subject = "Hi!";
$body = "Hi,\n\nThank you for registering at Nic'n'Pic.\n
Nic'n'Pic is the best online shopping website\n
Your username : $d\n
Your Password : $s\n
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
} else {
echo("<p>Message successfully sent!</p>");
}
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
 
echo "<p align='center'> Thank You..You are successfully registered.An Email has been  sent to your mail-id</p>"; 
echo "<p align='center'>Login to make order..<p>";
echo "<form action='page3.php' method='POST'>
<p align='center'> <input type='submit' name=' button' value='Login' /><br/></p></form>";
}
}
else {echo "username/Email already exists";}
mysql_close($con);

$con = mysql_connect("localhost","root","");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("test", $con);
$sql = "CREATE TABLE $d
(
ref_id int,
Product varchar(15),
quantity int,
Price int,
Total int,
Status varchar(100)
)";

// Execute query
mysql_query($sql,$con);
mysql_query("INSERT INTO $d (ref_id, Product, quantity, Price, Total, Status) VALUES ('', '', '', '', '', '')");
mysql_close($con);
}
?>
</body>
</html>