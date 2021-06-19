<?php
require_once("dbconnect.php");
$sql = "select * from menu_pages where ppid=0";
$respage =executequery($sql);
?>
<!DOTYPE html>
<html lang="en">
<head>
<?php include('head2.php'); ?>
<script type="text/javascript">
function chk(lnk) {
	//alert(lnk);
	if(confirm("are you sure you want to delete?")) {
		window.location = lnk;
	}
	
}

function chek(lnk) {
	//alert(lnk);
	if(confirm("are you sure you want to edit?")) {
		window.location = lnk;
	}
	
}


</script>
<script type="text/javascript">

</script>
</head>
<script type="text/javascript" >
		 	jQuery(document).ready(function() {
				oTable = jQuery('#example').dataTable({
					"bJQueryUI": true,
					"sPaginationType": "full_numbers"
				});
			}); 
		</script>
<style>
	body{
	background:#f4f2f2;
	}
</style>

<body>
<?php include ('navbartop.php'); ?>
	
<div class="container-fluid">
 <div class="row-fluid">
		<div class="span2">
			<div class="sidenavfixed">
				<ul class="nav nav-list" style="margin-top:40px;">
<!--<li><img class="img-polaroid" src="images/avatar3.png"> </li> -->
					<li><a href="home.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
                    <li><a href="hims_managepages.php"><i class="icon-dashboard icon-2x"></i> Manage Pages </a></li> 
					<li><a href="research.php"><i class="icon-book icon-2x"></i> News Contents</a>                                     </li>
					<li><a href="profile.php"><i class="icon-group icon-2x"></i> Staff Profile</a></li> 
                    <li><a href="hims_managegallery.php"><i class="icon-group icon-2x"></i>Gallery</a></li>
								<!--		<li><a href="archive.php"><i class="icon-list-alt icon-2x"></i> Archive</a>                                    </li>-->

					<li class="active"><a href="announcement.php"><i class="icon-bullhorn icon-2x"></i> Announcements</a>                                    </li>
					 <li><a href="hims_manageinquiry.php"><i class="icon-group icon-2x"></i> </a>                                    </li>	
                    <li><a href="admin.php"><i class="icon-user icon-2x"></i> Admin</a>                                    </li>
					<li></li>
                    					<br><br><br><br><br><br><br><br><br><br>		
					
				
				</ul>  
			</div>
		</div>
		

	<div class="span10">
		<div class="header24">
					<!--	<img src="../images/chmsc3d.png"> -->
					<div class="subhead">
						<h1>HIMS NEPAL</h1>
						<p><strong><font style="font-size:23px;;">Online Public Access Catalog</font></strong><font style="color:#818181;"> for News and Events</font></p>
					</div>
			</div>
	<div class="rightcontainer">
	
	<div class="pagination " style="margin-top:-1px;">
  <ul>
  <?php 
  	
			$count_query = mysql_query("SELECT * FROM author") or die (mysql_error());
			$count = mysql_num_rows($count_query);
			
  ?>
    <li class="disabled"><a href="#"><i class="icon-list icon-large"></i> List of Pages (<?php echo $count?>)</a></li>
    <li><a href="add_page_menu.php"><i class="icon-plus-sign icon-large"></i> Add Page</a></li>
  </ul>
</div>

<div class="wrapper">
	<div class="sidebar">
	<?php include("sidebar.php");?>
	</div>
	<div class="content">
    <?php echo"Welcom You are Logged  in As:".strtoupper($_SESSION['uname'])."&nbsp;&nbsp;user";?>
	<p><a href="add_page_menu.php">ADD NEW PAGE</a></p>
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
            

           <td><a href="javascript:void(0)" onClick="chek('editpage.php?pid=<?php echo $pid;?>&page=parent')">Edit</a></td>
			<td><a href="javascript:void(0)" onClick="chk('deletepage.php?pid=<?php echo $pid;?>&page=parent')">Delete</a></td>
		</tr>
		<?php
			$sql = "select * from menu_pages where ppid='$pid'";
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
			
			<td><a href="javascript:void(0)" onClick="chek('editpage.php?pid=<?php echo $cpid;?>&page=child')">Edit</a></td>
            <td><a href="javascript:void(0)" onClick="chk('deletepage.php?pid=<?php echo $cpid;?>&page=child')">Delete</a></td>
		</tr>
	<?php } 
		}
	?>
	</table>
	</div>
	<div class="clear"></div>
</div>



	  </div>

	
	</div><!--centerpage -->
</div>
</div>

</body>

</html>