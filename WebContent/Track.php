<html>
<head>
<title>Track Summary</title>
<link rel='stylesheet' href='css/trackstyle.css' type='text/css' />
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
color:#eee;;
}
#mtable th 
{
font-size:15px;
text-align:center;
padding-top:4px;
border:3px solid #C1BFCC;
padding-bottom:4px;
background-color:#859D85;
color:#334639;
}
</style>
</head>
<body>
<fieldset>
<legend>Track Summary</legend>
<div id="wrapper">
<?php 
$con = mysql_connect("localhost","root","");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("test", $con);
$user=$_POST['userid'];
$pass=$_POST['passid'];
$id=$_POST['id'];

$sql="SELECT userid,password from user1 where userid='$user' AND password='$pass' ";
if (!mysql_query($sql,$con))
{
  die('Error: ' . mysql_error());
}
    else 
{
  	$sql_check=mysql_query($sql);
  	$count=mysql_num_rows($sql_check);
  	if($count==1)
  	{
  		echo "<br />Your UserId and Password have matched.<br />";
  		$successMsg= "<br />Login Successful!<br />";
  		echo "$successMsg";
  			//table
$query="SELECT ref_id, Product, Status FROM $user where ref_id='$id'";
$result=mysql_query($query);
$num=mysql_numrows($result);
$i=0; 
if($num == 1)
{
echo "<table id='mtable'>
<tr>
<th>Reference Id</th>
<th>Product Name</th>
<th>Status</th>
</tr>";
while($i < $num)
  {
  	$ref_id=mysql_result($result,$i,"ref_id");
	$prod=mysql_result($result,$i,"Product");
	$stat=mysql_result($result,$i,"Status");
  echo "<tr>";
  echo "<td>" . $ref_id . "</td>";
  echo "<td>" . $prod . "</td>";
  echo "<td>" . $stat . "</td>";
  echo "</tr>";
	$i++;
  }
echo "</table>";

  		exit();
}
else {
$errorMsg= "<b>ERROR:</b><br />Your Reference Id dont match with that in our database. Please try again<br />";
  		echo "$errorMsg";
              Echo "<a href=page4.php>Back</a>";
              exit();	
}
  	}
  	else{
  		$errorMsg= "<b>ERROR:</b><br />Your UserId and Password dont match. Please try again<br />";
  		echo "$errorMsg";
              Echo "<a href=page4.php>Back</a>";
              exit();
  	}
  	mysql_close($con);
}  
?>
</div>
</fieldset>
</body>
</html>
