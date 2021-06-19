<?php
include('dbconn.php');
		if(isset($_POST['add_research'])){
		$research_title=$_POST['research_title'];
		$category=$_POST['category'];
		$location=$_POST['location'];
		$copyright_year=$_POST['copyright_year'];
		$summary=$_POST['summary'];
		$status=$_POST['status'];
		
		mysql_query("insert into research (research_title, category, location, copyright_year, research_summary, status) values('$research_title','$category','$location','$copyright_year','$summary','$status')")or die(mysql_error());
		
		header('location:research.php');
		}
		
		?>