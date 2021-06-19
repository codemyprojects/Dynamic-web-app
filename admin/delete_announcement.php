<?php 

include('dbconn.php');
$id=$_GET['id'];

mysql_query("delete  from announcement where announcement_id='$id'")or die(mysql_error());
header('location:announcement.php');
?>