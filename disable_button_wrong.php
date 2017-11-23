<!DOCTYPE html>
<html lang = "en-US">
<head>
<title>Super Awesome Title!</title>
<meta charset = "UTF-8"/>

<?php
if(isset($_POST['SubmitButton']))
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

<form id="myform" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
<input type="submit" id="submitbutton_1" name="SubmitButton" value="Submit"/>
</form>

</body>
</html>