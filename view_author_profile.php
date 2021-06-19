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
					<a href="help.php"><li><i class="icon-large icon-exclamation-sign"></i> Help</li></a>
				<ul>
			</div>
			<br>
			<div id="content">
				
		
		  <div id="rightcont">
		  <div style="margin-top:-0px;" class="searchform3">
				<?php
			$query=mysql_query("SELECT * FROM author where author_id = '$get_id'") or die (mysql_error());
			while ($a_row=mysql_fetch_array($query)){
			$a_id=$a_row['author_id'];
			?>
				<img class="img-polaroid" src="admin/<?php echo $a_row['image']; ?>" style="width:300px; height:250px;">
				<hr>
				FULL NAME:<br>
				<font style="font:Normal 30px 'Calibri';"> <?php echo $a_row['firstname'].' '. $a_row['middlename'].' ' .$a_row['lastname']; ?></font><br><br>
				EMAIL ADDRESS: <br>
				<font style="font:Normal 30px 'Calibri';"> <?php echo $a_row['email_address']; ?></font><br><br><br><br><br><br><hr>
				ABOUT THE AUTHOR:
				<font style="font:Normal 30px 'Calibri';"> <?php echo $a_row['about_author']; ?></font>
			<?php } ?>	
			<hr>
			<font style="font:bold 20px 'Aleo';">RESEARCHES:</font><br>
				<?php 
				$research_query=mysql_query
				("select research.research_id, research.research_title  , research.research_summary  , research.location, research.copyright_year,
				author_has_research.research_id   from research  , author_has_research
				where author_has_research.author_id = '$a_id' and research.research_id = author_has_research.author_id
				OR author_has_research.author_id = '$a_id' and research.research_id = author_has_research.research_id") or die (mysql_error());
				while ($r_row=mysql_fetch_array($research_query)){
				$r_id=$r_row['research_id'];
				?>
				<a><font style="font:Normal 30px 'Calibri';"> <?php echo $r_row['research_title']; ?></font></a><br>
				
				<?php } ?>
			</div>
			</div>
		
			<?php include ('sidebar1.php');?>



		</div><!-- end content --->
		
	</div><!-- end container --->

</body>

<?php include('scripts.php'); ?>
</html>