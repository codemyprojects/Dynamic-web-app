<!DOCTYPE html>
<html lang="en">
<head>

	<?php include('head.php'); ?>
	<?php include('session.php'); ?>
	
</head>
<style>
	body{
	background:#f4f2f2;
	}
</style>

<body>

<?php include('navbartop.php'); ?>
	
<div class="container-fluid">
 <div class="row-fluid">
		<div class="span2">
			<div class="sidenavfixed" style="background-color:#006666;">
				<ul class="nav nav-list" style="margin-top:40px;">
<!--<li><img class="img-polaroid" src="images/avatar3.png"> </li> -->
				<li><a href="home.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
					<li><a href="hims_managepages.php"><i class="icon-dashboard icon-2x"></i> Manage Pages </a></li>
                    <li><a href="research.php"><i class="icon-book icon-2x"></i> News Contents</a>                                     </li>
					<li><a href="profile.php"><i class="icon-group icon-2x"></i> Staff Profile</a>
                    <li><a href="hims_managegallery.php"><i class="icon-group icon-2x"></i> Gallery</a>                                    </li>
								<!--		<li><a href="archive.php"><i class="icon-list-alt icon-2x"></i> Archive</a>                                    </li>-->

					<li class="active"><a href="announcement.php"><i class="icon-bullhorn icon-2x"></i> Announcements</a>                                    </li>
					  <li><a href="hims_manageinquiry.php"><i class="icon-group icon-2x"></i> Manage Inquiry </a>                                    </li>
					
                    		<li><a href="admin.php"><i class="icon-user icon-2x"></i> Admin</a>                                    </li>
					<li></li>
				
				</ul>  
			</div>
		</div>
		
		<div class="span10" style="background-color: #CC99FF;">
			<div class="header24">
				<!--	<img src="../images/chmsc3d.png"> -->
					<div class="subhead">
						<h1>HIMS NEPAL</h1>
						
					</div>
			</div>
			<div class="rightcontainer">
					<div class="dashboard">
					<?php $result = mysql_query("SELECT * FROM research") or die (mysql_error());
					$count = mysql_num_rows($result);
					?>
						<a style="background: #009966; color:#fff;" href="research.php"><font style="font:bold 30px 'aleo';">
						<i class="icon-2x icon-book"></i> <br>
						News Contents <br><div class="span_count"> <?php echo $count;?> </div></font></a>
					
                    
                    
                    <?php $result = mysql_query("SELECT * FROM research") or die (mysql_error());
					$count = mysql_num_rows($result);
					?>
						<a style="background: #009966; color:#fff;" href="add_page_menu.php"><font style="font:bold 30px 'aleo';">
						<i class="icon-2x icon-book"></i> <br>
						Add Pages <br><div class="span_count"> <?php echo $count;?> </div></font></a>
					
                    
                    <?php $result = mysql_query("SELECT * FROM research") or die (mysql_error());
					$count = mysql_num_rows($result);
					?>
						<a style="background: #009966; color:#fff;" href="hims_album.php"><font style="font:bold 30px 'aleo';">
						<i class="icon-2x icon-book"></i> <br>
						Create Album <br><div class="span_count"> <?php echo $count;?> </div></font></a>
					
                    
                    
                    
                    
                     <?php $result = mysql_query("SELECT * FROM research") or die (mysql_error());
					$count = mysql_num_rows($result);
					?>
						<a style="background: #009966; color:#fff;" href="hims_addgalleryimage.php"><font style="font:bold 30px 'aleo';">
						<i class="icon-2x icon-book"></i> <br>
						Upload Image <br><div class="span_count"> <?php echo $count;?> </div></font></a>
                    
                    
                    	
					<?php $result = mysql_query("SELECT * FROM author") or die (mysql_error());
					$count1 = mysql_num_rows($result);
					?>
						<a style="background: #009966; color:#fff;" href="author.php"><font style="font:bold 30px 'aleo';">
						<i class="icon-2x icon-group"></i> <br>
						Photos <br><div class="span_count"> <?php echo $count1;?> </div></font></a>
					
                    
                    	
					<?php $result = mysql_query("SELECT * FROM announcement") or die (mysql_error());
					$count2 = mysql_num_rows($result);
					?>
						<a style="background: #009966; color:#fff;" href="announcement.php"><font style="font:bold 30px 'aleo';">
						<i class="icon-2x icon-bullhorn"></i> <br>
						Announcement <br><div class="span_count"> <?php echo $count2;?> </div></font></a>
					
                    
                    
					<?php $result = mysql_query("SELECT * FROM user") or die (mysql_error());
					$count3 = mysql_num_rows($result);
					?>
						<a style="background: #009966; color:#fff;" href="admin.php"><font style="font:bold 30px 'aleo';">
						<i class="icon-2x icon-user"></i> <br>
						Admin <br><div class="span_count"> <?php echo $count3;?> </div></font></a>
					</div>
			</div>
		</div>

 </div>
</div><!-- container-fluid -->

</body>

</html>