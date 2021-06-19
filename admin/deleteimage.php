<?php
session_start();
if(!isset($_SESSION['uname']) && !isset($_SESSION['client']) && $_SESSION['client']!="2pmsite") {
	header("location:index.php");
}
require_once("dbconnect.php");
$page=$_GET['page'];
if($page=='gallery')
{
	$gid=$_GET['gid'];
	$sql = "select imgname from 2pm_gallery where gid='$gid'";
	$resgal = executequery($sql);
	$datagal = mysql_fetch_assoc($resgal);
	$imgname = $datagal['imgname'];
	unlink("../gallery/".$imgname);
	$sql = "update 2pm_gallery set imgname='' where gid='$gid'";
	executequery($sql);
	header("location:editgallery.php?gid=$gid&msg=image deleted successfully");
}
else
{
$pid = $_GET['pid'];
$sql = "select image from 2pm_pages where pid='$pid'";
$res = executequery($sql);
$data = mysql_fetch_assoc($res);
$image = $data['image'];
unlink("../pageimages/".$image);
$sql = "update 2pm_pages set image='' where pid='$pid'";
executequery($sql);
header("location:editpage.php?pid=$pid&msg=image deleted successfully");
}
?>