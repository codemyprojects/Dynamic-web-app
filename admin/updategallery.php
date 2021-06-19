<?php
require_once("dbconnect.php");
$gid=$_POST['gid'];
$sql="select * from ols_gallery where gid='$gid'";
$data=executequery($sql);
$datagal=mysql_fetch_assoc($data);
$image=$datagal['imgname'];
$caption=$_POST['caption'];
$location=$_POST['location'];
if(isset($_FILES['pict']['name']))
{
$imgname=$_FILES['pict']['name'];
$tmploc=$_FILES['pict']['tmp_name'];
$perloc="../gallery/".$imgname;
move_uploaded_file($tmploc,$perloc);
$sql = "update ols_gallery set caption='$caption',location='$location',imgname='$imgname' where gid='$gid'";
//print_r($sql);
	//die();
}
else
{
	$sql = "update ols_gallery set caption='$caption',location='$location',imgname='$image' where gid='$gid'";
	
}
$rescat = executequery($sql);
header("location:managegallery.php?msg=gallery updated successfully");
?>