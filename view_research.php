<!DOTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>HIMS NEPAL</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	
	
<link rel='stylesheet' id='style-css'  href='diapo.css' type='text/css' media='all'> 
<script type='text/javascript' src='scripts/jquery.min.js'></script>
<!--[if !IE]><!--><script type='text/javascript' src='scripts/jquery.mobile-1.0rc2.customized.min.js'></script><!--<![endif]-->
<script type='text/javascript' src='scripts/jquery.easing.1.3.js'></script> 
<script type='text/javascript' src='scripts/jquery.hoverIntent.minified.js'></script> 
<script type='text/javascript' src='scripts/diapo.js'></script> 

<script>
$(function(){
	$('.pix_diapo').diapo();
});

</script>

	
	<?php include ("dbconn.php");?>
	<?php $get_id = $_GET['id']; ?>
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
			<br>
			<div id="content">
				
		
		  <div id="rightcont">
		  <div style="margin-top:-0px;" class="searchform3">
				<?php
			$query=mysql_query("SELECT * FROM research where research_id = '$get_id'") or die (mysql_error());
			while ($r_row=mysql_fetch_array($query)){
			$r_id=$r_row['research_id'];
			?>
				
				<div class="topviewtab"><?php echo $r_row['research_title'];?></div>
				<div class='blue'><?php echo $r_row['status'];?></div>
				

				
				
				<h1><p style="margin-left:100px"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Program Information </p></h1>  <br>
				<p style="margin-left:100px"><strong>Location:</strong><br><font style="font:Normal 30px 'Calibri';"> <?php echo $r_row['location']; ?></font><br><br>
				
				<strong style="font:bold 15px 'Arial';">Summary:</strong><br>
				<?php echo $r_row['research_summary']; ?><br>
			<?php } ?> </p>
			
			<div class="pull-left">
			
		
		
		
		</div>
			
				
			
			</div>
			</div>
				<script SRC="js/jquery.tools.min.js"></script>
<script type="text/javascript" language="javascript" src="administrator/media/js/jquery.dataTables.js"></script>
<link rel='stylesheet' id='style-css'  href='scripts/diapo.css' type='text/css' media='all' /> 
<script type='text/javascript' src='scripts/jquery.hoverIntent.minified.js'></script> 
<script type='text/javascript' src='scripts/diapo.js'></script> 
		
		
		<div id="sidebar" >
			<div class="serts">
							<form method="post" action="search.php"><br>
							<div style="font:bold 15px 'arial';">Seach Here: </div>
								<input class="serts" style="padding:10px;" type="search" name="search" placeholder="Search by Title, Year, Author.......">
							</form>
					</div>
					<div class="text-right" style="margin-top: -23px;">
					
					
					
					<font style=" color:darkblue; font:bold 24px 'cambria';">Completion Programs</font><hr style="margin:8px; border-bottom:1px solid #ccc;">
							
								<?php
								$r_query = mysql_query("select * from research where category = 'News' and status != 'Archive' ORDER BY rand() LIMIT 5")or die(mysql_error());
								while($r_row=mysql_fetch_array($r_query)){
								$r_id = $r_row['research_id'];
								?>
									<div style="margin:8px;">	
									<i class="icon-book icon-large"></i> <a style ="color:#000; font-size:16px; line-height:25px;" href="view_research.php?id=<?php echo $r_id; ?>"><?php echo $r_row['research_title']; ?></a><br>
									</div>
							
								<?php } ?>
								<div class="line-block"></div>
								<font style=" color:darkblue; font:bold 24px 'cambria';">Running Programs</font><hr style="margin:8px; border-bottom:1px solid #ccc;">
								<?php
								$r_query = mysql_query("select * from research where category = 'Programme' and status != 'Archive' ORDER BY rand() LIMIT 5")or die(mysql_error());
								while($r_row=mysql_fetch_array($r_query)){
								$r_id = $r_row['research_id'];
								?>
									<div style="margin:8px;">
									<div class="ellipsis-text"> <i class="icon-book icon-large"></i> <a style ="color:#000; font-size:16px; line-height:25px;" href="view_research.php?id=<?php echo $r_id; ?>"><?php echo $r_row['research_title']; ?></a><br>
									</div></div>
							
								<?php } ?>
					</div>
					<br><br>
						<div class="text-right"  style="margin-top: -23px;">
					
						<font style=" color:darkblue; font:bold 24px 'cambria';">Staff Overview</font><hr style="margin:8px; border-bottom:1px solid #ccc;">

								<?php
								$a_query = mysql_query("select * from author ORDER BY rand() LIMIT 6")or die(mysql_error());
								while($a_row=mysql_fetch_array($a_query)){
								$a_id = $a_row['author_id'];
								?>
									<script type="text/javascript">
											$(document).ready(function(){                                     
                                            $('#<?php echo $a_id; ?>').tooltip('show')
                                            $('#<?php echo $a_id; ?>').tooltip('hide')
                                        });
                                    </script>
												
								<a style ="color:blue; border-bottom:1px solid #aaa; font-size:16px; line-height:25px;" href="view_staff_profile.php?id=<?php echo $a_id; ?>">
								<img class="img-polaroid" rel="tooltip"  data-placement="bottom"  title="<?php echo $a_row['firstname']." ".$a_row['middlename']." ".$a_row['lastname']; ?>" id="<?php echo $a_id; ?>" src="admin/<?php echo $a_row['image']; ?>" style="width:110px; height:80px; padding:5px;">
								</a>
								
								<?php } ?>
								<br>
							
		
			
							
					</div>
					
	
				
										

			</div>

		</div><!-- end content --->
		
	</div><!-- end container --->

</body>

<?php include('scripts.php'); ?>
</html>