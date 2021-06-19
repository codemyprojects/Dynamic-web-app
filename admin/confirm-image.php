<?php
$album = $_POST['album'];
mysql_connect("localhost","root","");
mysql_select_db("php_project-2pm");
$sql = "select aid from tbl_album where aname='$album'";
$res = mysql_query($sql);
$data = mysql_fetch_assoc($res);
$aid = $data['aid'];
$caption = $_POST['caption'];

if(!isset($_FILES['pict']['name'])) {
	//$rand = rand();
	//$imgname = $rand."_".$_FILES['pict']['name'];
$tmploc = $_FILES['pict']['tmp_name'];
//$perloc = "../images/".$album ."/".$imgname;
$perloc = "../photogallary/".$album ."/".$imgname;
move_uploaded_file($tmploc,$perloc);
$sql = "insert into tbl_image (iid,imgname,caption,aid) values (null,null,'$caption','$aid')";

}
else 
{

//$rand = rand().rand();
//$imgname = $rand."_".$_FILES['pict']['name'];
$imgname = $_FILES['pict']['name'];
$tmploc = $_FILES['pict']['tmp_name'];
/*$perloc = "../image/".$album."/".$imgname;*/
//$perloc = "../images/".$album ."/".$imgname;
$perloc = "../photogallary/".$album ."/".$imgname;
move_uploaded_file($tmploc,$perloc);
$sql = "insert into tbl_image (iid,imgname,caption,aid) values (null,'$imgname','$caption','$aid')";

}
mysql_query($sql);
echo "success";
?>