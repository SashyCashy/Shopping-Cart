<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="stylesheet" href="css/loginstyle.css" />
</head>
<body>
	<div id="wrapper">
        <?php include 'header.php'; ?>
        
        <div class="LoginForm">
        	<form id="login" action="check.php" method="post">
            	<fieldset>
                <legend>Login</legend>
                	<ul>
                	<div class="username">
                    	<li><label for="userid" id="uid">User id:</label></li>
                        <li><input type="text" name="userid" size="10" required="required"></li>
                        </div>
                        <div class="pass">
                        <li><label for="passid">Password:</label></li>
                        <li><input type="password" name="passid" size="10" required="required"/></li>
                         </div>
                        <li><input type="submit" name="submit" value="Login" return false/></li>
                    </ul>
                </fieldset>
            </form>
            </div>
        <?php include 'footer.php'?>
    </div>
</body>
</html>
