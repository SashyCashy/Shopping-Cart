<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Track Status</title>
<link rel="stylesheet" href="css/trackstyle.css" />
<!--This is a trial  --> 

<SCRIPT TYPE="text/javascript">

function numbersonly(myfield, e, dec)
{
var key;
var keychar;

if (window.event)
   key = window.event.keyCode;
else if (e)
   key = e.which;
else
   return true;
keychar = String.fromCharCode(key);

// control keys
if ((key==null) || (key==0) || (key==8) || 
    (key==9) || (key==13) || (key==27) )
   return true;

// numbers
else if ((("0123456789").indexOf(keychar) > -1))
   return true;

// decimal point jump
else if (dec && (keychar == "."))
   {
   myfield.form.elements[dec].focus();
   return false;
   }
else
   return false;
}
</SCRIPT>
</head>
<body>
<div id="wrapper">
<div><?php include 'header.php'; ?></div>
<div class="trackForm">
<form name='track' action="track.php" method="post">
<fieldset>
<legend>Track Status</legend>
<div class="login">
<ul>
<li><label for="userid" id="uid">User id:</label></li>
                        <li><input type="text" name="userid" size="10" required="required"/></li>
                        <li><label for="passid">Password:</label></li>
                        <li><input type="password" name="passid" size="10" required="required"/></li>
                        <li><label for="id">Reference Id:</label></li>
                        <li><input type="text" name="id" size="2" minlength="1" maxlength="2" onkeypress="return numbersonly(this,event)" required="required"/></li>
                        <li><input type="submit" name="Track" value="Track" return false/></li>
</ul>
</div>
</fieldset>
</form>
</div>        

