<?php
include('dbconn.php');
$id = $_POST['id'];
$ann_title=$_POST['title'];
$content=$_POST['content'];

mysql_query("update announcement set title = '$ann_title' , content = '$content' where announcement_id = '$id' ")or die(mysql_error());
header('location: announcement.php');
?>