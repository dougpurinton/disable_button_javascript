<!DOCTYPE html>
<html lang = "en-US">
<head>
<title>Super Awesome Title!</title>
<meta charset = "UTF-8"/>

<?php
function postIsHiddenValue($f_hidden_value)
{
	if (isset($_POST))
	{
		if (in_array($f_hidden_value, $_POST, true))
		{
		return true;
		}
	}
return false;
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && postIsHiddenValue("myform1_value"))
{
	sleep(3);
	echo "<script type = \"text/javascript\">alert(\"Yah! You were able to display myform1_value in PHP!\");</script>";
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && postIsHiddenValue("myform2_value"))
{
	sleep(3);
	echo "<script type = \"text/javascript\">alert(\"Yah! You were able to display myform2_value in PHP!\");</script>";
}
?>

<script type = "text/javascript">
// This function returns the element passed to it by using its ID. It's used to simply improve the efficiency of coding event handlers.
function $(id)
{return document.getElementById(id);}

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
	thisform.action = "<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"; // this action attribute can be changed to any existing PHP file.
	thisform.submit();
}

// This is used to make sure the correct function (onload or load) is used and appended correctly, instead of recreating it (which can cause errors).
if (window.attachEvent) {
    window.attachEvent('onload', afterAllLoadsGoGoGo);
} else if (window.addEventListener) {
    window.addEventListener('load', afterAllLoadsGoGoGo, false);
} else {
    document.addEventListener('load', afterAllLoadsGoGoGo, false);
}
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