<?php
session_start();
if(!isset($_SESSION['uname']) && !isset($_SESSION['client']) && $_SESSION['client']!="2pmsite") {
	header("location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
<div class="wrapper">
	<div class="sidebar">
	<?php include("sidebar.php");?>
	</div>
	<div class="content">
	<form name="frmimage" method="post" action="upload-gallery-image.php" enctype="multipart/form-data">
	Albumname: <select name="location">
				<option value="h">Home</option>
    			<option value="p">Portfolio</option>
				</select>
    <br />Image: <input type="file" name="pict" /><br />
	Caption: <input type="text" name="caption" /><br />

    
	<input type="submit" name="submit" value="upload" />
</form>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>