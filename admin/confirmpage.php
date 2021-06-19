<?php
require_once("dbconnect.php");

$ppid = $_POST['ppid'];
$ptitle = $_POST['ptitle'];
$pdesc = $_POST['pdesc'];

if(isset($_FILES['pict']['name'])) {
//$rand = rand();
//$imgname = $rand."_".$_FILES['pict']['name'];
$imgname = $_FILES['pict']['name'];
$tmploc = $_FILES['pict']['tmp_name'];
//$filesize=$_FILES['pict']['size'];
//echo $filesize;
//print_r($filesize);
//die();
$perloc = "../pageimages/".$imgname;
move_uploaded_file($tmploc,$perloc);
$sql = "insert into menu_pages (pid,pagetitle,pagedesc,image,status,ppid) values (null,'$ptitle','$pdesc','$imgname',1,'$ppid')";

}else {
$sql = "insert into menu_pages (pid,pagetitle,pagedesc,status,ppid) values (null,'$ptitle','$pdesc',1,'$ppid')";
}
$respage = executequery($sql);
header("location:add_page_menu.php?msg=page added successfully");
?>