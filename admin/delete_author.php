<?php 

include('dbconn.php');
$id=$_GET['id'];

mysql_query("delete  from author where author_id='$id'")or die(mysql_error());
header('location:author.php');
?>