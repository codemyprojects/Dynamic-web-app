<?php


require_once("dbconnect.php");
$gid = $_GET['gid'];

$sql="DELETE   from ols_gallery where gid='$gid'";
executequery($sql);
header("location:hims_managegallery.php?msg=galllery deleted successfully");
?>
