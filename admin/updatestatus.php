<?php
	require_once("dbconnect.php");
	$page=$_GET['page'];
	if($page=='category')
{
	$catid=$_GET['catid'];	
	$status=$_GET['status'];
	$sql = "update ols_category set status = '$status' where catid='$catid'";
	header("location:hims_managecategory.php?msg=cateagory updated successfully");
}
else if	($page=='gallery')
{
	$gid=$_GET['gid'];	
	$status=$_GET['status'];
	$sql = "update ols_gallery set status = '$status' where gid='$gid'";
	header("location:hims_managegallery.php?msg=cateagory updated successfully");
}
else if	($page=='articles')
{
	$aid=$_GET['aid'];
	$status=$_GET['status'];
	$sql = "update ols_articles set status = '$status' where aid='$aid'";
    header("location:hims_managearticles.php?msg=cateagory updated successfully");
}
else
{
	$pid = $_GET['pid'];
	$status = $_GET['status'];
	$sql = "update menu_pages set status = '$status' where pid='$pid'";
	header("location:hims_managepages.php?msg=page updated successfully");
}
$respage = executequery($sql);

?>