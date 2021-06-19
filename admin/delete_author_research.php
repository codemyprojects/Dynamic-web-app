<?php 

include('dbconn.php');
$id=$_GET['id'];

mysql_query("delete  from author_has_research where author_has_research_id ='$id'")or die(mysql_error());
header('location:research.php');
?>