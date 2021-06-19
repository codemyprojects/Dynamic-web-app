<?php 

include('dbconn.php');
		if(isset($_POST['add_announcement'])){
		$title=$_POST['title'];
		$content=$_POST['content'];
		$date=$_POST['date'];
	
		
		mysql_query("insert into announcement (title, content, date) values('$title','$content', '$date' )")or die(mysql_error());
		
		header('location:announcement.php');
		}
		?>



