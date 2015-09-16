<html>
<head>
<title>Check</title>
</head>
<body>
<link rel='stylesheet' href='css/loginstyle.css' type='text/css' />

<form id="check" action="page2.php" method="post">
<?php

$con = mysql_connect("localhost","root","");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("test", $con);
$d=$_POST['userid'];
$s=$_POST['passid'];
$sql="SELECT userid,password from user1 where userid='$d' AND password='$s' ";

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
  		echo "<br />Your UserId and Password have matched. Please Proceed.<br />";
  		$successMsg= "<br />Login Successful!<br />";
  		echo "$successMsg";
  			session_start();
			$_SESSION['user']=$d;
			
              Echo "<a href=page2.php>Next</a>";
              exit();
  	}
  	else{
  		$errorMsg= "<b>ERROR:</b><br />Your UserId and Password dont match. Please try again<br />";
  		echo "$errorMsg";
              Echo "<a href=page3.php>Back</a>";
              exit();
  	}
  	mysql_close($con);
  }
  ?>
  </form>
  </body>
  </html>