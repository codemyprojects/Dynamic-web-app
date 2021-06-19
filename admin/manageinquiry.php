<?php
session_start();
if(!isset($_SESSION['uname']) && !isset($_SESSION['client']) && $_SESSION['client']!="2pmsite") {
	header("location:index.php");
}

require_once("dbconnect.php");
$sql = "select * from 2pm_inquiry";
$rescat = executequery($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script type="text/javascript" src="ajax.js">

</script>
<script type="text/javascript">
function chk(lnk) {
	//alert(lnk);
	if(confirm("Are you sure you want to delete")) {
		window.location = lnk;
	}
}
</script>
</head>

<body>
<div class="wrapper">
	<div class="sidebar">
	<?php include("sidebar.php");?>
	</div>
	<div class="content">
	<table width="100%">
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
            <th>Message</th>
			<th>Status</th>
			<th>Delete</th>
		</tr>
	<?php
		while($datainq = mysql_fetch_assoc($rescat)) { ?>
		<tr>
			<td><?php echo $datainq['cname'];?></td>
            <td><?php echo $datainq['email'];?></td>
			<td><?php echo $datainq['phone'];?></td>
			<td><?php echo $datainq['message'];?></td>
			<td>
			<p id="status<?php echo $datainq['id'];?>">
			<?php echo $datainq['status']; ?>
			</p>
			<a href="#" onclick="ajax(<?php echo $datainq['id'];?>)">edit</a>
			
		
            <td><a href="javascript:void(0)" onclick="chk('deletegallery.php?id=<?php echo $datainq['id'];?>')">Delete</a></td>
		</tr>
<?php } ?>
	</table>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>