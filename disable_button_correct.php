<!DOCTYPE html>
<html lang = "en-US">
<head>
<title>Super Awesome Title!</title>
<meta charset = "UTF-8"/>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') // if(isset($_POST['SubmitButton']))
{
	sleep(3);
	echo "<script type = \"text/javascript\">alert(\"Yah! You were able to display PHP!\");</script>";
}
?>

<script type = "text/javascript">
// This function returns the element passed to it by using its ID. It's used to simply improve the efficiency of coding event handlers.
function $(id)
{
    return document.getElementById(id);
}

// This funtion will run when the page fully loads, and without causing any errors.
function afterAllLoadsGoGoGo()
{
	$('submitbutton_1').disabled = false;
}

function disableSubmit1()
{
	$('submitbutton_1').disabled = true;
	$("myform").submit();
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

<form id="myform" method="post">
<input type="submit" name="SubmitButton" id="submitbutton_1" value="Submit" onclick="disableSubmit1()" disabled="disabled" />
</form>

</body>
</html>