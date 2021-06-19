<?php
session_start();
if(!isset($_SESSION['uname']) && !isset($_SESSION['client']) && $_SESSION['client']!="2pmsite") {
	header("location:index.php");
}

require_once("dbconnect.php");
$sql = "select * from 2pm_pages where ppid=0";
$resppage = executequery($sql);
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
	<form name="frmpage" method="post" enctype="multipart/form-data" action="confirmpage.php">
		<h2>Add New Page</h2>
		<table>
			<tr>
				<td>Select Parent</td>
				<td>
				<select name="ppid">
				<option value="0">select</option>
				<?php
				while($datapage = mysql_fetch_assoc($resppage)) { 
				?>
				<option value="<?php echo $datapage['pid'];?>"><?php echo $datapage['pagetitle'];?></option>
				<?php } ?>
				</select>
				
				</td>
			</tr>
			<tr>
				<td>Page Title</td>
				<td><input type="text" name="ptitle" /></td>
			</tr>
			<tr>
				<td>Page Desc</td>
				<td>
				<?php
				include("fckeditor/fckeditor.php");
				$objfckeditor = new FCKeditor("pdesc");
				$objfckeditor->BasePath = "fckeditor/";
				$objfckeditor->Width=500;
				$objfckeditor->Height=400;
				$objfckeditor->Value='';
				$objfckeditor->Create();
				?>
				</td>
			</tr>
			<tr>
				<td>Image</td>
				<td><input type="file" name="pict" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="add page" /></td>
			</tr>
		</table>
	</form>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>