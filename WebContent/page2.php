<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product</title>
<link rel="stylesheet" href="css/prodstyle.css" />
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
        $apple="Apple iMac";
        $samsung="Samsung Galaxy S3";
        $fastrack="FasTrack";
        $sonydslr="Sony DSLR";
        $sweat_shirt="Sweat-Shirt";
        $exthdd="Seagate External HDD";
		    $_SESSION['apple']=$apple;
			$_SESSION['samsung']=$samsung;
			$_SESSION['fastrack']=$fastrack;
			$_SESSION['sonydslr']=$sonydslr;
			$_SESSION['sweat_shirt']=$sweat_shirt;
			$_SESSION['exthdd']=$exthdd;
?>
</div>
        <?php include 'header.php'; ?>
     
      <div class="phpname">
  
      </div>  
        <div class="ProductForm">
        	<form name="product" action="display.php" method="post">
        	
            	<fieldset>
                <legend>Products</legend>
                <div class="productListing">
            	<div class="prodDesc">
            	<img src="images/appleimac.jpg" />
            	
                <h3>Apple iMac</h3>
                <div class="prodPrice"> <label for="price0">Price:</label> <input name="price0" type="text" readonly="readonly" class="price" id="price0" value="74900" /></div>
                <div class="prodQuantity"><label for="qty0">Quantity:</label><input name="qty0" id="qty0" type="text" maxlength="3" onkeypress="return numbersonly(this,event)"/></div>
                <label for="check0"></label><input type="checkbox" id="check0" name="check0" value="Check0"/>
                </div>
                
                <div class="prodDesc">
            	<img src="images/galaxys3.jpg" />
                <h3>Samsung Galaxy S3</h3>
                <div class="prodPrice"> <label for="price1">Price:</label> <input name="price1" type="text" readonly="readonly" class="price" id="price1" value="32108" /></div>
                <div class="prodQuantity"><label for="qty1">Quantity:</label><input name="qty1" id="qty1" type="text" maxlength="3" onkeypress="return numbersonly(this,event)"/></div>
                <label for="check1"></label><input type="checkbox" id="prod1" name="check1" value="Check1"/>
                </div>
                
                <div class="prodDesc">
            	<img src="images/watches.jpg" />
                <h3>FasTrack</h3>
                <div class="prodPrice"> <label for="price2">Price:</label> <input name="price2" type="text" readonly="readonly" class="price" id="price2" value="650" /></div>
                <div class="prodQuantity"><label for="qty2">Quantity:</label><input name="qty2" id="qty2" type="text" maxlength="3" onkeypress="return numbersonly(this,event)"/></div>
                <label for="check2"></label><input type="checkbox" id="prod2" name="check2" value="Check2"/>
                </div>
                
                <div class="prodDesc">
            	<img src="images/sonydslr.jpg" />
                <h3>Sony DSLR</h3>
                <div class="prodPrice"><label for="price3">Price:</label><input name="price3" type="text" readonly="readonly" class="price" id="price3" value="45000" /></div>
                <div class="prodQuantity"><label for="qty3">Quantity:</label><input name="qty3" id="qty3" type="text" maxlength="3" onkeypress="return numbersonly(this,event)"/></div>
                <label for="check3"></label><input type="checkbox" id="prod3" name="check3" value="Check3"/>
                </div>
                
                <div class="prodDesc">
            	<img src="images/externalhdd.jpg" />
                <h3>Seagate External HDD 1 Tb</h3>
                <div class="prodPrice"><label for="price4">Price:</label><input name="price4" type="text" readonly="readonly" class="price" id="price4" value="7000" /></div>
                <div class="prodQuantity"><label for="qty4">Quantity:</label><input name="qty4" id="qty4" type="text" maxlength="3" onkeypress="return numbersonly(this,event)"/></div>
                <label for="check4"></label><input type="checkbox" id="prod4" name="check4" value="Check4"/>
                </div>
                
                <div class="prodDesc">
            	<img src="images/sweatshirt.jpg" />
                <h3>Sweat-Shirt</h3>
                <div class="prodPrice"><label for="price5">Price:</label><input name="price5" type="text" readonly="readonly" class="price" id="price5" value="500" /></div>
                <div class="prodQuantity"><label for="qty5">Quantity:</label><input name="qty5" id="qty5" type="text" maxlength="3" onkeypress="return numbersonly(this,event)"/></div>
                <label for="check5"></label><input type="checkbox" id="prod5" name="check5" value="Check5"/>
                </div>
            </div>
            
            <div>
            	<input type="submit" name="Proceed" value="Proceed" />
            </div>
            <!--productListing-->
            </fieldset>
            </form>
        </div>
        <?php include 'footer.php'?>
        </div>
       
    </body>
</html>
