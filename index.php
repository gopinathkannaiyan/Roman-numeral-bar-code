<!DOCTYPE table PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<style type="text/css">
	div {
	    border: 0px solid black;
	    padding: 1px; 
	    background: black;
	    height: 15px;
	    float:left;
	    margin-left: 4px;
	}
</style>
</head>
<body>
<?php
$number=false;
//If form submitted means
if(isset($_POST['submit'])) {
	$output=false;
	$number=$_POST['number'];
	if (is_numeric($number)){//Check the entered value is numeric or not
		$output="Output <br><br>" ;
		//load roman numeral class
		require("roman_numeral_class.php");
		//calling number_to_roman function
		$roman_numeral = new RomanNumeral();
		//Covert numeric value into roman number
		$response = $roman_numeral->number_to_roman($number);
		$output.="Roman Number : ".$response."<br><br>" ;
		//Covert roman number value into bar code
		$output.=$roman_numeral->romannum_to_barcode($response);
	} else {//If is not numeric then showing validation failure message
		$output="$number is not Numeric. <br>" ;
	}
} 
?>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="<?php echo $PHP_SELF;?>">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Roman numeral bar code </strong></td>
</tr>
<tr>
<td width="78">Number</td>
<td width="6">:</td>
<td width="294"><input name="number" type="text" id="number" value="<?php echo $number;?>"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="Submit"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
<br/><br/>
<?php if($output){ ?>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td>
<?php echo $output;?>
</td>
</tr>
</table>
<?php } ?>
</body>
</html>