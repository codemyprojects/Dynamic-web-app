<?php
				include('dbconn.php');
			
				$author_id=$_POST['author_id'];
				$research=$_POST['research'];
				
												
				mysql_query("insert into author_has_research (author_id,research_id)
				values('$author_id','$research')")or die(mysql_error());

				header('location:author.php');
				?>	
