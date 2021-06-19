<?php
include('dbconn.php');
$id = $_POST['id'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$email_add = $_POST['email_add'];
$about = $_POST['about'];


								 $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                $photo = "upload/" . $_FILES["image"]["name"];

mysql_query("update author set firstname = '$firstname' , middlename = '$middlename', lastname = '$lastname', email_address = '$email_add' ,image = '$photo' , about_author = '$about' where author_id = '$id' ")or die(mysql_error());
header('location: author.php');
?>