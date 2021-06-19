<?php 

include('dbconn.php');
$id=$_GET['id'];

mysql_query("UPDATE research set status = 'Archive' where research_id ='$id'")or die(mysql_error());
header('location:research.php');
?>