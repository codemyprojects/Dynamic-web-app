<?php
	require_once("dbconnect.php");
	mysql_connect("localhost","root","");
	mysql_select_db("ols_db");
	$sql = "select * from tbl_album";
	$res = mysql_query($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" />
<title>Untitled Document</title>
</head>

<body>
<div class="wrapper">
	<div class="sidebar">
	<?php include("sidebar.php");?>
	</div>
	<div class="content">
    <p><a href="album.php">Create Album</a></p>
    <p><a href="upload-album-image.php">Upload Image</a></p>
    <p><a href="view-albums.php">View Album Image</a></p>
	<p><a href="gallery/addgalleryimage.php">Add New Image</a></p>
	<form name="frmimage" method="post" action="confirm-image.php" enctype="multipart/form-data">
    
	Albumname: <select name="album">
				<option>select album</option>
    			<?php 
				while($data=mysql_fetch_assoc($res)) { ?>
                <option><?php echo $data['aname'];?></option>
				<?php } ?>
                </select>
    <br />Image: <input type="file" name="pict[]" multiple/><br />
	Caption: <input type="text" name="caption" /><br />
	<input type="submit" name="submit" value="upload" />
</form>


	</div>
	<div class="clear"></div>
</div>


</body>
</html>