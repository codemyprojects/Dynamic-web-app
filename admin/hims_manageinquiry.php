
<?php


require_once("dbconnect.php");
$sql = "select * from ols_inquiry";
$rescat = executequery($sql);
?>

<!DOTYPE html>
<html lang="en">


<head>

<?php include('head2.php'); ?>
<script type="text/javascript" src="ajax.js">
<script type="text/javascript">
function chk(lnk) {
	//alert(lnk);
	if(confirm("Are you sure you want to delete")) {
		window.location = lnk;
	}
}
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
					<li><a href="research.php"><i class="icon-book icon-2x"></i> News Contents</a>                                     </li>
					<li><a href="profile.php"><i class="icon-group icon-2x"></i> Staff Profile</a></li> 
                    <li><a href="hims_managegallery.php"><i class="icon-group icon-2x"></i>Gallery</a>  
                                                      </li>
								<!--		<li><a href="archive.php"><i class="icon-list-alt icon-2x"></i> Archive</a>                                    </li>-->

					<li class="active"><a href="announcement.php"><i class="icon-bullhorn icon-2x"></i> Announcements</a>                                    </li>
					 <li><a href="hims_manageinquiry.php"><i class="icon-group icon-2x"></i> Manage Inquiry </a>                                    </li>
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
    <li class="disabled"><a href="#"><i class="icon-list icon-large"></i> List of Message Inquiries (<?php echo $count?>)</a></li>
    
  </ul>
</div>
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
			<a href="#" onClick="ajax(<?php echo $datainq['id'];?>)">edit</a>
			
		
            <td><a href="javascript:void(0)" onClick="chk('deleteinquiry.php?id=<?php echo $datainq['id'];?>')">Delete</a></td>
		</tr>
<?php } ?>
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