<?php
include('dbconn.php');
$id = $_POST['id'];
$research_title=$_POST['research_title'];
		$category=$_POST['category'];
		$document=$_POST['document'];
		$location=$_POST['location'];
		$copyright_year=$_POST['copyright_year'];
		$summary=$_POST['summary'];
		$status=$_POST['status'];
		

mysql_query("update research set research_title = '$research_title' , category = '$category', document = '$document',
 location = '$location' ,copyright_year = '$copyright_year'  , status = '$status' , summary = '$summary' where research_id = '$id' ")or die(mysql_error());
header('location: research.php');
?>