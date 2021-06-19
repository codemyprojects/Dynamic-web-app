<?php
require_once("dbconnect.php");
$pid=$_POST['pid'];
$sql1="select * from menu_pages where pid='$pid'";
$data=executequery($sql1);
$datapage=mysql_fetch_assoc($data);
$image=$datapage['image'];
$ppid=$_POST['ppid'];
$ptitle=$_POST['ptitle'];
$pdesc=$_POST['pdesc'];
if(isset($_FILES['pict']['name']))
{
$imgname=$_FILES['pict']['name'];
$tmploc=$_FILES['pict']['tmp_name'];
$perloc="../pageimages/".$imgname;
move_uploaded_file($tmploc,$perloc);
$sql="update menu_pages set pagetitle='$ptitle',pagedesc='$pdesc',image='$imgname',status='1',ppid='$ppid' where pid='$pid'";
//die();
}
else
{
$sql="update menu_pages set pagetitle='$ptitle',pagedesc='$pdesc',image='$image',status='1',ppid='$ppid' where pid='$pid'";
//die();
}
//print_r($sql);
//die();
executequery($sql);
header("location:hims_managepages.php?msg=page updated successfully");
?>