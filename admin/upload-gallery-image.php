<?php
require_once("dbconnect.php");
$loc = $_POST['location'];
$caption = $_POST['caption'];
if(isset($_FILES['pict']['name'])) {
//$rand = rand();
//$imgname = $rand."_".$_FILES['pict']['name'];
$imgname = $_FILES['pict']['name'];
$tmploc = $_FILES['pict']['tmp_name'];
//$perloc="../gallery/".$imgname;
$perloc = "../gallery/".$imgname;
move_uploaded_file($tmploc,$perloc);
$sql = "insert into ols_gallery (gid,imgname,caption,location,status) values (null,'$imgname','$caption','$loc',1)";

}else {
$sql = "insert into ols_gallery (gid,imgname,caption,location,status) values (null,'','$caption','$loc',1)";

}
executequery($sql);
header("location:hims_addgalleryimage.php?msg=image added successfully");
?>