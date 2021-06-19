<?php
session_start();
if(!isset($_SESSION['uname']) && !isset($_SESSION['client']) && $_SESSION['client']!="2pmsite") {
	header("location:index.php");
}
if(isset($_POST['submit'])) {
	mysql_connect("localhost","root","");
	mysql_select_db("php_project-2pm");
	$aname = $_POST['aname'];
	mkdir("../photogallary/".$aname);
	$sql = "insert into tbl_album (aid,aname) values (null,'$aname')";
	mysql_query($sql);
	header("location:album.php?msg=success");
}

//print_r($_POST);
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
    <p><a href="gallery/gallery/album.php">Create Album</a></p>
    <p><a href="gallery/gallery/upload-album-image.php">Upload Image</a></p>
    <p><a href="gallery/gallery/view-albums.php">View Album Image</a></p>
	<p><a href="gallery/addgalleryimage.php">Add New Image</a></p>
	<?php
    if(isset($_GET['msg']) && $_GET['msg']=='success')
        echo "album created successfully";
    ?>
    <form name="frmalbum" method="post">
    Albumname: <input type="text" name="aname" /><br />
    <input type="submit" name="submit" value="create album" />
    </form>

	</div>
	<div class="clear"></div>
</div>
</body>
</html>