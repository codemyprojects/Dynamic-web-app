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
                    <li><a href="hims_managegallery.php"><i class="icon-group icon-2x"></i> Gallery</a>                    </li>
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
	<div class="pagination " style="margin-top:1px;">
  <ul>
  <?php 
  	
			$count_query = mysql_query("SELECT * FROM research") or die (mysql_error());
			$count = mysql_num_rows($count_query);
			
  ?>
    <li class="disabled"><a href="#"><i class="icon-list icon-large"></i> List of News (<?php echo $count?>)</a></li>
    <li><a href="add_research.php"><i class="icon-plus-sign icon-large"></i> Add News || Programs</a></li>
  </ul>
</div>
<div class="above_table">
<br><br>
<div class="demo_jui1">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">

  <thead>
    <tr>
      <th>Research Title</th>
      <th>Category</th>
      <th>Document</th>
      <th>View</th>
      <th>Location</th>
      <th>Copyright Year</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
	
  </thead>
  <tbody>
    <?php
	$query=mysql_query("select * from research  where status != 'Archive'")or die(mysql_error());
	while($row=mysql_fetch_array($query)){
	$r_id=$row['research_id'];
		
	?>
    <tr>
     <td> <?php echo $row['research_title'];?></td>
     <td> <?php echo $row['category'];?></td>
      <td>	 <center>  <a href="#<?php  echo $r_id;?>"  data-toggle="modal"  class="btn btn-info" ><i class="icon-download icon-large"></i></a></center></td>
      <td width="150"><a href="#view_summary<?php  echo $r_id;?>"  data-toggle="modal" style="text-decoration:none;"><span class="label label-info"> Summary</span></a>
	  	<?php 
				$result=mysql_query
				("select author.author_id , author.firstname  , author.middlename  , author.lastname, author.image,
				author_has_research.author_id   from author  , author_has_research
				where author_has_research.research_id = '$r_id' and author.author_id = author_has_research.research_id
				OR author_has_research.research_id = '$r_id' and author.author_id = author_has_research.author_id") or die (mysql_error());
				$count = mysql_num_rows($result);

			?>
	  | <a href="#view_research_author<?php  echo $r_id;?>" data-toggle="modal"><span class="label label-info"> <?php echo $count;?> Authors</span></a>
	  </td>
	  <?php include('modal_view_research_author.php');?>
	  <?php include("modal_research_summary.php"); ?>
      <td><?php echo $row['location'];?></td>
      <td><?php echo $row['copyright_year'];?></td>
      <td>
	  <center>
	  <a href="#update_status<?php  echo $r_id;?>"  data-toggle="modal" style="text-decoration:none;"><span class="label label-info"><?php echo $row['status'];?></span></a></center></td>
	   <?php include('modal_update_status.php');?>
	   <td width="150"> 
	   <a href="#add_author_to_research<?php  echo $r_id;?>"  data-toggle="modal"  class="btn btn-success" ><i class="icon-plus icon-large"></i></a>
		 <?php include('modal_addresearch_to_author.php');?>
		<a href="edit_research.php?id=<?php echo $r_id;?>"    class="btn btn-warning" ><i class="icon-pencil icon-large"></i></a>
	<a href="#delete_research<?php echo $r_id; ?>" a data-toggle="modal" class="btn btn-danger">  <i class="icon-trash icon-large"></i></a>
	<?php include('modal_delete_research.php');?>
	</td>
    </tr>
	<?php } ?> 
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