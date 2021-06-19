<?php
session_start();
if(!isset($_SESSION['uname']) && !isset($_SESSION['client']) && $_SESSION['client']!="2pmsite") {
	header("location:index.php");
}
require_once("dbconnect.php");
$sql="select * from 2pm_gallery";
$res=executequery($sql);
//$sql = "select * from 2pm_gallery order by location";
//$resgal = executequery($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script type="text/javascript">
function chk(lnk) {
	//alert(lnk);
	if(confirm("are you sure you want to delete")) {
		window.location = lnk;
	}
}
</script>
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
	<p><a href="addgalleryimage.php">Add New Image</a></p>
	<table width="100%">
		<tr>
			<th>Image</th>
			<th>Location</th>
			<th>Status</th>
			<th>Edit</th>
            <th>Delete</th>
		</tr>
	<?php
	$totrec = mysql_num_rows($res);
	$pagesize = 4;
	$totpages = ceil($totrec/$pagesize);//ceil function takes the upper value e.g 5/2=2.5~3
	//echo $totpages;
	//die();
	if(!isset($_GET['resultpage'])) {
									$offset = 0;
	}else 
	{
		$offset = $pagesize * $_GET['resultpage']-$pagesize;
		//echo $offset;
		//die();
	}
	$sqlnew = $sql." limit ".$offset.",".$pagesize;
	//print_r($sqlnew);
	//die();
	$resgal = mysql_query($sqlnew);
		while($datagal = mysql_fetch_assoc($resgal)) {$gid=$datagal['gid']; ?>
		<tr>
			<td>
			<?php 
			if(!empty($datagal['imgname'])) {
			?>
			<img src="../gallery/<?php echo $datagal['imgname'];?>" width="100" height="75" /><br />
			<?php echo $datagal['caption'];?>
			<?php } else {
				echo "no image found";
			}
			?></td>
			<td><?php 
			if($datagal['location']=='h') 
			{echo "home";
			}
			 else 
			 {
				 echo "portfolio";
			 }?>
            </td>
			<td>
			<?php $status =  $datagal['status'];
			if($status==1) {
			?>
			<a href="updatestatus.php?gid=<?php echo $datagal['gid'];?>&status=0,&page=gallery">Active</a>
			<?php
			}//end of if
			else {
			?>
			<a href="updatestatus.php?gid=<?php echo $datagal['gid'];?>&status=1,&page=gallery">InActive</a>
            <?php
			}
			?>
            
            </td>
			<td><a href="editgallery.php?gid=<?php echo $gid;?>">Edit</a></td>
			<td><a href="javascript:void(0)" onclick="chk('deletegallery.php?gid=<?php echo $gid;?>')">Delete</a></td>
		</tr>
<?php } ?>
	</table>
      <?php $page=$_GET['resultpage'];$page=$page-1;?>
      <?php if($page>=1){?>
		<a href="managegallery.php?resultpage=<?php echo $page;//for previous page?>">Previous</a>
        <?php }?>
    <?php if(isset($_GET['resultpage'])){for($i=1;$i<=$totpages;$i++){?>
	<span <?php if($_GET['resultpage'] == $i){?> style="font-weight:bold;font-size:14px" <?php }?>>
		<a href="managegallery.php?resultpage=<?php echo $i;?>"><?php echo $i;?></a>
    </span>
<?php }}else{ for($i=1;$i<=$totpages;$i++){?>

		<a href="managegallery.php?resultpage=<?php echo $i;?>">
			<?php 
				if($i=='1')
				{
					echo '<span style="font-weight:bold;font-size:14px">'.$i.'</span>';
				}
				else
					echo $i;
			
			?>
        </a>
<?php }}?>
  <?php $page=$_GET['resultpage'];
  if($page<$totpages){$page=$page+1;
  if(($page=='1')) $page='2';
  ?>
		<a href="managegallery.php?resultpage=<?php echo $page;?>">Next</a>
        <?php }//for next page?>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>