<?php

require_once("dbconnect.php");
$id = $_GET['id'];
$sql="DELETE   from ols_inquiry where id='$id'";
executequery($sql);
header("location:hims_manageinquiry.php?msg=inquiry deleted successfully");
?>
