<!DOTYPE html>
<html lang="en">
<head>
<?php include('head2.php'); ?>
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
                    <li><a href="hims_managegallery.php"><i class="icon-group icon-2x"></i> Gallery</a>                      </li>
								<!--		<li><a href="archive.php"><i class="icon-list-alt icon-2x"></i> Archive</a>                                    </li>-->

					<li class="active"><a href="announcement.php"><i class="icon-bullhorn icon-2x"></i> Announcements</a>                                    </li>
					 <li><a href="hims_manageinquiry.php"><i class="icon-group icon-2x"></i> Manage Inquiry </a>                                    </li>
                    <li><a href="admin.php"><i class="icon-user icon-2x"></i> Admin</a>                                    </li>
					<li></li>
					
				
				</ul>  
			</div>
		</div>
		

	<div class="span10">
		<div class="header24">
					<!--	<img src="../images/chmsc3d.png"> -->
					<div class="subhead">
						<h1>HIMS NEPAL</h1>
						
					</div>
			</div>
	<div class="rightcontainer">
	
	<div class="pagination " style="margin-top:-1px;">
  <ul>
  <?php 
  	
			$count_query = mysql_query("SELECT * FROM user") or die (mysql_error());
			$count = mysql_num_rows($count_query);
			
  ?>
    <li class="disabled"><a href="#"><i class="icon-table icon-large"></i> List of Admin (<?php echo $count?>)</a></li>
    <li><a href="#add_admin" role="button"  data-toggle="modal"><i class="icon-plus-sign icon-large"></i> Add Admin</a></li>
	<?php include('leavemsg.php'); ?>
  </ul>
</div>

<!-- table -->
<div class="above_table">
<br><br>
	<div class="demo_jui1">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
			<thead>
				<tr>
					
					<th>Username</th>
					<th>Password</th>
					<th>Fullname</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			
			
			<?php 
			$query = mysql_query("SELECT * FROM user") or die (mysql_error());
			while ($row=mysql_fetch_array($query)){
			$count = mysql_num_rows($query);
			$u_id=$row['user_id'];
			?>
				<tr>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['password']; ?></td>
					<td><?php echo $row['fullname']; ?></td>
					<td width="200">
					<center>
					<a href="#edit_admin<?php  echo $u_id;?>"  data-toggle="modal"  class="btn btn-warning" ><i class="icon-pencil icon-large"></i>&nbsp;Update</a>
					
					<a href="#delete_admin<?php  echo $u_id;?>"  data-toggle="modal"  class="btn btn-danger" ><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
						<?php include('modal_edit_admin.php');?>
					<?php include('modal_delete_admin.php');?>
				
					</center>
					</td>
				</tr>
							<?php }
			?>
			</tbody>
			
		</table>
		
	</div>
	</div>


	  </div>

	
	</div><!--centerpage -->
</div>
</div>

</body>

</html>