<?php
	mysql_connect("localhost","root","");
	mysql_select_db("php_project-2pm");
	$sql = "select * from tbl_album";
	$res = mysql_query($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" />
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
	<ul>
		<?php while($data=mysql_fetch_assoc($res)) { ?>
            <li><a href="view-albums.php?aid=<?php echo $data['aid'];?>"><?php echo $data['aname'];?></a></li>
        <?php } 
        if(isset($_GET['aid'])) {
            $aid = $_GET['aid'];
            $sqla = "select aname from tbl_album where aid='$aid'";
            $resa = mysql_query($sqla);
            $dataa = mysql_fetch_assoc($resa);
            $aname = $dataa['aname'];
            
            $sql = "select * from tbl_image where aid='$aid'";
            $result = mysql_query($sql);
            echo "<ul>";
            while($dataimg=mysql_fetch_array($result)) { 	
        ?>
            <li>
            <img src="albums/<?php echo $aname;?>/<?php echo $dataimg['imgname'];?>" width="200" height="100" /><br />
            <p><?php echo $dataimg['caption'];?></p>
            <a href="edit-image.php?iid=<?php echo $dataimg['iid'];?>">Edit</a><br /><? // for passing the iid through url to edit and delete image pages?>
            <a href="deletealbumimage.php?iid=<?php echo $dataimg['iid'];?>">Delete</a>
            </li>
        <?php
            }//end of while
            echo "</ul>";
        }//end of if
        ?>
</ul>

	</div>
	<div class="clear"></div>
</div>

</body>
</html>