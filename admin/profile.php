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
                    <li><a href="hims_managegallery.php"><i class="icon-group icon-2x"></i> Gallery</a>  </li>
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
    <li class="disabled"><a href="#"><i class="icon-list icon-large"></i> List of Staff Profiles (<?php echo $count?>)</a></li>
    <li><a href="add_staff.php"><i class="icon-plus-sign icon-large"></i> Add Photo</a></li>
  </ul>
</div>

<div class="above_table">
<br><br>
<div class="demo_jui1">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
  <thead>
    <tr>
     <th>Firstname</th>
	 <th>Middlename</th>
	 <th>Lastname</th>
	 <th>Photo</th>
	 <th>View</th>
	 <th width="100">Action</th>
    </tr>
	
  </thead>
  <tbody>
   <?php 
			$query = mysql_query("SELECT * FROM author") or die (mysql_error());
			while ($author_row=mysql_fetch_array($query)){
			$count = mysql_num_rows($query);
			$a_id=$author_row['author_id'];
			?>
				<tr>
					<td><?php echo $author_row['firstname']; ?></td>
					<td><?php echo $author_row['middlename']; ?></td>
					<td><?php echo $author_row['lastname']; ?></td>
					<td width="70"><img class="img-polaroid" src="<?php echo $author_row['image']; ?>" width="50" style=" height:40px;"></td>
					<td width="210"><a href="#about_author<?php echo $a_id; ?>"  data-toggle="modal"  style="text-decoration:none;" class="btn-large btn-default" > 
					<center><span class="label label-success"><i class="icon-search"></i> About Pictures</span></a>
					<?php include('modal_view_about_author.php'); ?>
					<a style="text-decoration:none;" href="view_author_research.php?id=<?php echo $a_id; ?>">
					<?php $count_query=mysql_query
				("select research.research_id , research.research_title  , research.category, research.document  , research.location, research.copyright_year  , research.research_summary  , 
				author_has_research.research_id   from research  , author_has_research
				where author_has_research.author_id = '$a_id' and research.research_id = author_has_research.author_id
				OR author_has_research.author_id = '$a_id' and research.research_id = author_has_research.research_id") or die (mysql_error());
				$count= mysql_num_rows($count_query); ?> 
				
				<span class="label label-success"><?php echo $count;?> Research</span>
					</a> 
					</center></td>
					<td width="120">
					<center>
					<a href="edit_author.php?id=<?php echo $a_id;?>"    class="btn btn-warning" ><i class="icon-pencil icon-large"></i></a>
					<a href="#delete_author<?php  echo $a_id;?>"  data-toggle="modal"  class="btn btn-danger" ><i class="icon-trash icon-large"></i></a>
					
						<?php include('modal_delete_author.php');?>
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