<!DOTYPE html>
<html lang="en">
<head>
<?php include('head2.php'); ?>
	<?php $get_id = $_GET ['id'];  ?>

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
												<li><img class="img-polaroid" src="images/avatar3.png"> </li>

					<li><a href="home.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
					<li><a href="research.php"><i class="icon-book icon-2x"></i> News Contents</a>                                     </li>
					<li><a href="author.php"><i class="icon-group icon-2x"></i> Photo Gallery</a>                                    </li>
								<!--		<li><a href="archive.php"><i class="icon-list-alt icon-2x"></i> Archive</a>                                    </li>-->
					<li class="active"><a href="announcement.php"><i class="icon-bullhorn icon-2x"></i> Announcements</a>                                    </li>
							<li><a href="admin.php"><i class="icon-user icon-2x"></i> Admin</a>                                    </li>
					<li></li>				
				</ul>  
			</div>
		</div>
		
			<div class="span10">
		<div class="header24">
					<img src="../images/chmsc3d.png">
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
    <li><a href="author.php"><i class="icon-arrow-left icon-large"></i> List of Photo (<?php echo $count?>)</a></li>
    <li class="disabled"><a href="#"><i class="icon-search icon-large"></i> View Photo</a></li>
  </ul>
</div>
			
			
<div class="above_table">
	
			<?php
			$query=mysql_query("SELECT * FROM author where author_id = '$get_id'") or die (mysql_error());
			while ($ar_row=mysql_fetch_array($query)){
			$ar_id=$ar_row['author_id'];
			?>
					
				<p><img class="img-polaroid"  style=" height:40px;" src="<?php echo $ar_row['image'];?>" width="55">
				<a><?php echo $ar_row['firstname']." ".$ar_row['middlename']." ".$ar_row['lastname'];?>
				</a>
			<?php } ?>
			
			
		<?php 
		$c_query=mysql_query
				("select research.research_id , research.research_title  , research.category, research.document  , research.location, research.copyright_year  , research.research_summary  , 
				author_has_research.research_id   from research  , author_has_research
				where author_has_research.author_id = '$get_id' and research.research_id = author_has_research.author_id
				OR author_has_research.author_id = '$get_id' and research.research_id = author_has_research.research_id") or die (mysql_error());
		$count_r = mysql_num_rows($c_query);
		?>
		-
		Have <?php echo $count_r;?> Researches</p>
	

<br>
<!-- table -->
	<div class="demo_jui1">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
			<thead>
				<tr>
					
					
					<th>Research Title</th>
					<th>Category</th>
					<th>Document</th>
					<th>Location</th>
					<th>Copyright Year</th>
					<th>View Summary</th>
				
				</tr>
			</thead>
			<tbody>
			
			
			<?php 
				$research_query=mysql_query
				("select research.research_id , research.research_title  , research.category , research.document  , research.location, research.copyright_year  , research.research_summary  , 
				author_has_research.research_id   from research  , author_has_research
				where author_has_research.author_id = '$get_id' and research.research_id = author_has_research.author_id
				OR author_has_research.author_id = '$get_id' and research.research_id = author_has_research.research_id") or die (mysql_error());
				while ($ar_row=mysql_fetch_array($research_query)){
				$a123id = $ar_row['research_id'];
			?>
				<tr>

					<td><?php echo $ar_row['research_title']; ?></td>
					<td><?php echo $ar_row['category']; ?></td>
					<td><?php echo $ar_row['document']; ?></td>
					<td><?php echo $ar_row['location']; ?></td>
					<td><?php echo $ar_row['copyright_year']; ?></td>
					<td width="100"> 
					<center><a href="#view_summary<?php  echo $a123id;?>"  data-toggle="modal"  class="btn btn-primary" ><i class="icon-list-alt icon-large"></i> Summary</a>
					<?php include ('modal_view_research.php'); ?>
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
</div>	
</div>	
			


</body>

				

</html>