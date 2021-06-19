<?php
session_start();
if(!isset($_SESSION['uname']) && !isset($_SESSION['client']) && $_SESSION['client']!="2pmsite" ) {
	header("location:index.php");
}

require_once("dbconnect.php");
$sql = "select * from 2pm_pages where ppid=0";
$respage =executequery($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script type="text/javascript">
function chk(lnk) {
	//alert(lnk);
	if(confirm("are you sure you want to delete")) {
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
    <?php echo"Welcom You are Logged  in As:".strtoupper($_SESSION['uname'])."&nbsp;&nbsp;user";?>
	<p><a href="addpage.php">ADD NEW PAGE</a></p>
	<table width="100%">
		<tr>
			<th>Page Title</th>
			<th>Status</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	<?php
		while($datapage = mysql_fetch_assoc($respage)) { 
		$pid = $datapage['pid'];
	?>
		<tr>
			<td><strong><?php echo $datapage['pagetitle'];?></strong></td>
			<td>
			<?php $status =  $datapage['status'];
			if($status==1) {
			?>
			<a href="updatestatus.php?pid=<?php echo $pid;?>&status=0">Active</a>
			<?php
			}//end of if
			else {
			?>
			<a href="updatestatus.php?pid=<?php echo $pid;?>&status=1">InActive</a>
			<?php
			}
			?></td>
            
			<td>
            <?php if($_SESSION['uname']=='admin'){?>
            <a href="editpage.php?pid=<?php echo $pid;?>"> Edit</a>
		    <?php } else?> 
            <?php { //echo"Edit";?> <?php } ?>
            </td>
           
			<td><a href="javascript:void(0)" onclick="chk('deletepage.php?pid=<?php echo $pid;?>&page=parent')">Delete</a></td>
		</tr>
		<?php
			$sql = "select * from 2pm_pages where ppid='$pid'";
			$resc = executequery($sql); 
			while($datacpage = mysql_fetch_assoc($resc)) { 
			$cpid = $datacpage['pid'];
		?>
		<tr class="child">
			<td class="first">&raquo; <?php echo $datacpage['pagetitle'];?></td>
			<td>
			<?php $cstatus =  $datacpage['status'];
			if($cstatus==1) {
			?>
			<a href="updatestatus.php?pid=<?php echo $cpid;?>&status=0">Active</a>
			<?php
			}//end of if
			else {
			?>
			<a href="updatestatus.php?pid=<?php echo $cpid;?>&status=1">InActive</a>
			<?php
			}
			?></td>
			<td>
            <?php if($_SESSION['uname']=='admin')
			{?><a href="editpage.php?pid=<?php echo $cpid;?>">Edit</a>
            <?php } 
			else
			?> 
            <?php //{ echo"Edit"; } ?>
            </td>
			<td><a href="javascript:void(0)" onclick="chk('deletepage.php?pid=<?php echo $cpid;?>&page=child')">Delete</a></td>
		</tr>
	<?php } 
		}
	?>
	</table>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>