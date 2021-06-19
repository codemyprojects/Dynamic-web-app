<?php
include('dbconn.php');
		if(isset($_POST['add_author'])){
		$firstname=$_POST['firstname'];
		$middlename=$_POST['middlename'];
		$lastname=$_POST['lastname'];
		$email_add=$_POST['email_add'];
		$about=$_POST['about'];
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                $location = "upload/" . $_FILES["image"]["name"];

		
		
		mysql_query("insert into author (firstname, middlename, lastname, email_address, image, about_author) values('$firstname','$middlename','$lastname','$email_add','$location','$about')")or die(mysql_error());
		
		header('location:author.php');
		}
		?>