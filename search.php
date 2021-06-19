<!DOTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>HIMS NEPAL</title>	
	
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="admin/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="admin/css/bootstrap-responsive.css">
	<link rel="stylesheet" href="admin/css/font-awesome.min.css">
	<script src="admin/js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<script src="admin/js/jquery.js" type="text/javascript"></script>
	<script src="admin/js/bootstrap.js" type="text/javascript"></script>


	<!-- Data Table -->
<!--  <link href="datatable/style1.css" rel="stylesheet" type="text/css"> -->
<!-- <script type="text/javascript" src="datatable/jquery-1.6.js" charset="utf-8" ></script> -->
<link href="admin/datatable/demo_table_jui.css" rel="stylesheet" type="text/css"/> 
<link href="admin/datatable/jquery-ui-1.8.4.custom.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" language="javascript" src="admin/datatable/jquery.dataTables.js"></script>

	
<!--[if !IE]><!--><script type='text/javascript' src='../scripts/jquery.mobile-1.0rc2.customized.min.js'></script><!--<![endif]-->
<script type='text/javascript' src='../scripts/jquery.easing.1.3.js'></script> 
<script type='text/javascript' src='../scripts/jquery.hoverIntent.minified.js'></script> 
<script type='text/javascript' src='../scripts/diapo.js'></script> 

	
<script type="text/javascript" >
		 	jQuery(document).ready(function() {
				oTable = jQuery('#example').dataTable({
					"bJQueryUI": true,
					"sPaginationType": "full_numbers"
				});
			}); 
		</script>
	
	<?php include ("dbconn.php");?>
	<?php $search = $_POST['search']; ?>
</head>


<body>
		
		<div id="container">
		<img src="images/banner.jpg" class="banner">
		
			<div class="nav">
					<ul>
					<a href="index.php"><li class="active"><i class="icon-home icon-large"></i> Home</li></a>
					<a href="whats_new.php"><li><i class="icon-list-alt icon-large"> </i> What's New?</li></a>
					<a href="about.php"><li><i class="icon-folder-open icon-large"> </i> About Us</li></a>
					
				<ul>
			</div>
			
		<div id="content">
		
					<center>
							<form method="post" action="search.php"><br>
								<input type="search" name="search" style="padding:10px; width:500px; text-align:center;" placeholder="Search by Title, Year.....">
							</form>
				</center>
							<center>	<h2><i class="icon-large icon-search"></i> Search Result</h2> </center>

				
	<!-- table -->
<div class="above_table">
<br><br>
	<div class="demo_jui1">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
			<thead>
				<tr>
					
						<th>Title</th>
							<th>Category</th>
							<th>Copyright Year</th>
							<th>Location</th>
					
				</tr>
			</thead>
			<tbody>
			
			<?php
	
	$query = mysql_query("select * from author_has_research INNER JOIN research ON author_has_research.research_id=research.research_id 
	INNER JOIN author ON author_has_research.author_id=author.author_id 
	where research.research_title LIKE '%$search%'  or research.copyright_year  LIKE '%$search%' or research.research_summary LIKE '%$search%' or author.firstname  LIKE '%$search%' or  author.lastname LIKE '%$search%'");
	$count = mysql_num_rows($query);
		while($row = mysql_fetch_array($query)){
	if ($count > 0){ 
	$r_id = $row['research_id'];
	?>
	
				
						<tr >
							<td><a href="view_research.php?id=<?php echo $r_id; ?>"><?php echo $row['research_title'];?></a></td>
							<td><?php echo $row['category'];?></td>
							<td><?php echo $row['copyright_year'];?></td>
							<td><?php echo $row['location'];?></td>
							<td><?php echo $row['firstname']." ". $row['middlename']." ". $row['lastname'];;?></td>
						</tr>
				<?php }

		elseif ($count == 0)
		{
			echo 'No Data Available';
		}
		else
		{
		
		}}

						?>
  
					</tbody>
						
		</table>
		
	</div>
	</div>
			
				
				
				
				
				
		</div><!-- end content --->
		<footer>
<center>Copyright &copy; HIMS NEPAL ORG | All Rights Reserved 2016 | Powered by : Indra Ale </center>
</footer>
	</div><!-- end container --->

</body>

<?php include('scripts.php'); ?>
</html>