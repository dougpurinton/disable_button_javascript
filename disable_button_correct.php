<!DOCTYPE html>
<html lang = "en-US">
<head>
<title>Super Awesome Title!</title>
<meta charset = "UTF-8"/>

<?php

$the_request = null;
$input_the_method = null;

// This check excludes 'HEAD' and 'PUT'.
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
 $the_request = &$_POST;
 $input_the_method = INPUT_POST;
}
elseif ($_SERVER['REQUEST_METHOD'] === 'GET')
{
 $the_request = &$_GET;
 $input_the_method = INPUT_GET;
}

function IsHiddenValue($f_hidden_value)
{
 global $the_request;
	if (!is_null($the_request))
	{
		if (isset($the_request['hidden_form_name']))
		{
			if ($the_request['hidden_form_name'] === $f_hidden_value)
			{
			 return true;
			}
		}
	}
 return false;
}
// It's a good idea to include all PHP code above in every PHP script.
// This way "IsHiddenValue" is all that needs to be called to check for form submission.

if(IsHiddenValue("myform1_value"))
{
	sleep(3);
	// only use $input_the_method with the filter_input function when IsHiddenValue returns true.
	// FILTER_SANITIZE_FULL_SPECIAL_CHARS is equivalent to calling htmlspecialchars() with ENT_QUOTES set.
	$sanitized_text = filter_input($input_the_method, 'zip_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$unsanitized_text = $the_request['zip_name']; // In this case, the following is equivalent: $unsanitized_text = $_POST['zip_name'];
	echo "The two lines below might look the same in the browser, but view the page source!<br>\n";
	echo $sanitized_text . "<br>\n";
	echo $unsanitized_text . "<br>\n";
	echo "<script type = \"text/javascript\">alert(\"Yah! You were able to display myform1_value in PHP!\");</script>";
}

elseif(IsHiddenValue("myform2_value"))
{
	sleep(3);
	echo "<script type = \"text/javascript\">alert(\"Yah! You were able to display myform2_value in PHP!\");</script>";
}
?>

<script type = "text/javascript">
// This function returns the element passed to it by using its ID. It's used to simply improve the efficiency of coding event handlers.
function $(id) {return document.getElementById(id);}

// This function accounts for older browsers so that this web page knows whether or not it can operate correctly or not.
function addEvent(element, evnt, funct)
{
	if (element.attachEvent)
	{return element.attachEvent('on'+evnt, funct);}
	else
	{return element.addEventListener(evnt, funct, false);}
}

// This funtion will run when the page fully loads, and without causing any errors.
function afterAllLoadsGoGoGo()
{
	$('submitbutton1_id').disabled = false;
	$('submitbutton2_id').disabled = false;
}

function disableSubmit(thisform)
{
	$('submitbutton1_id').disabled = true;
	$('submitbutton2_id').disabled = true;
	//thisform.action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8"); ?>"; // this action attribute can be changed to any existing PHP file.
	thisform.submit();
}

addEvent(window, 'load', afterAllLoadsGoGoGo);
</script>

</head>
<body>

<noscript>
<div style="border: 1px solid purple; padding: 10px">
<span style="color:red">JavaScript is not enabled! This page needs JavaScript in order to function.</span>
</div>
</noscript>

<form id="myform1_id" method="post" action="" onsubmit="disableSubmit(this)">
<input type="hidden" name="hidden_form_name" value="myform1_value"/>
<label for="zip_name">Try some of these special characters! &'"<> </label>
<input type="text" name="zip_name" autocomplete="off" id="zip_id" value=""/>
<br>
<input type="submit" id="submitbutton1_id" name="submitbutton1_name" value="Submit" disabled="disabled"/>
</form>
<br>
<br>
<form id="myform2_id" method="post" action="" onsubmit="disableSubmit(this)">
<input type="hidden" name="hidden_form_name" value="myform2_value"/>
<input type="submit" id="submitbutton2_id" name="submitbutton2_name" value="Submit" disabled="disabled"/>
</form>

</body>
</html>