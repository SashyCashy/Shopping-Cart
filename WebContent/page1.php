<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
<!--This is a trial  --> 
<script src="validation.js"></script>
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
        
        <div class="registrationForm">
        	<form name='registration' onSubmit="return formValidation();" action="confirm.php" method="post">
            	<fieldset>
                <legend>Registration</legend>
                	<ul>
                    	<li><label for="userid" id="uid">User id:</label></li>
                        <li><input type="text" name="userid" size="40" /></li>
                        <li><label for="passid">Password:</label></li>
                        <li><input type="password" name="passid" size="40" /></li>
                        <li><label for="username">Name:</label></li>
                        <li><input type="text" name="username" size="40" /></li>
                        <li><label for ="email">Enter Email:</label></li>
                        <li><input type="email" name="email" size="40" /></li>
                        <li><label for="address">Address:</label></li>  
                        <li><textarea name="address" id="address"/></textarea></li>  
                        <li><label for="country">Country:</label></li>  
                        <li><select name="country">  
                        <option selected="" value="Default">(Please select a country)</option>  
                        <option value="Australia">Australia</option>  
                        <option value="Canada">Canada</option>  
                        <option value="India">India</option>  
                        <option value="Russia">Russia</option>  
                        <option value="USA">USA</option>  
                        </select></li>  
                        <li><label for="zip">ZIP Code:</label></li>  
                        <li><input type="text" name="zip" mnlength="6" maxlength="6" onkeypress="return numbersonly(this,event)"/></li>    
                        <li><label id="gender">Sex:</label></li>  
                        <li><input type="radio" name="sex" value="Male" checked /><span>Male</span></li>  
                        <li><input type="radio" name="sex" value="Female" /><span>Female</span></li>                       
                        <li><input type="submit" name="submit" value="Submit" return false/></li>
                    </ul>
                </fieldset>
            </form>
            </div>
        <?php include 'footer.php'?>
    </div>
    
</body>
</html>
