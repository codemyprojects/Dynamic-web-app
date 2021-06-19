<?php 

include('dbconn.php');
$id=$_GET['id'];

mysql_query("delete  from user where user_id='$id'")or die(mysql_error());
header('location:admin.php');
?>