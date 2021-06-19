<!DOTYPE html>
<html lang="en">
<head>

<?php include ("dbconn.php"); ?>
	<meta charset="utf-8">
	<title>HIMS NEPAL</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	
	
<!--[if !IE]><!--><script type='text/javascript' src='scripts/jquery.mobile-1.0rc2.customized.min.js'></script><!--<![endif]-->
<script type='text/javascript' src='scripts/jquery.easing.1.3.js'></script> 
<script type='text/javascript' src='scripts/jquery.hoverIntent.minified.js'></script> 



	
	<!-- Evo slider-->
 
	
	<!-- Evo slider-->
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <link href="css/style_1.css" rel="stylesheet" media="screen">
  
	<link rel="Stylesheet" type="text/css" href="css/default/reset.css" />
    <link rel="Stylesheet" type="text/css" href="css/evoslider.css" />
    <link rel="Stylesheet" type="text/css" href="css/default/default.css" />   
    <script type="text/javascript" src="js/jquery.evoslider.lite-1.1.0.js"></script>   
	        
	<style>
		body{
		background:#E9EAED;
		}
		
	</style>
</head>
		

<body>
	
	<div id="container">
	<img src="images/banner.jpg" class="banner">

			<div class="nav">
				<ul>
					<a href="index.php"><li><i class="icon-home icon-large"> </i> Home</li></a>
				<a href="whats_new.php"><li><i class="icon-list-alt icon-large"> </i> What's New?</li></a>
					<a href="about.php"><li class="active"><i class="icon-folder-open icon-large"> </i> About Us</li></a>
					
				<ul>
			</div>
				
		<div class="alert alert-success">
			<strong>WELCOME</strong> to Hims Nepal Org.
				<div class="pull-right">
								<i class="icon-calendar icon-large"></i>
								<?php
								$Today = date('y:m:d');
								$new = date('l, F d, Y', strtotime($Today));
								echo $new;
								?>
			</div>
			</div>
			
			<div class="searchform1">
			
			<font style=" color:darkblue; font:bold 24px 'cambria';">
						<i class="icon icon-exclamation"></i> About Us</font><hr style="margin:8px; border-bottom:1px solid #ccc;">
						<p align="justify">
 
HIMS Nepal is a community based organization of beneficiaries established in 2005 from community initiative for over development of locals. The organization is established from community people hence it has always emphasizes on inclusion of diverse people. Most of the staff of the organization is from ethnic background along with representative from Dalit and Women. Staffs are recruited through fair and transparent organization procedure; priority is given local people, women and people from marginalized community.  As most of staffs and volunteers are from same community hence we had very good understanding of community dimensions. Staffs are responsible for carrying out organizational work along with assess the needs of community people. They also develop helping relationship with beneficiaries. It is very challenging for new organization to carryout programs in these communities as it is difficult to develop professional relationship. In contrast HIMS is established organization with most of its board and General assembly members from same communities. 
</p>
				
				</div><!--end of searchform1-->
				
				<div class="sitemap">	
	<font style=" color:darkblue; font:bold 24px 'cambria';">
						<i class="icon icon-sitemap"></i> Sitemap</font>
					
                    <!--	 <p><iframe width="374" height="315" frameborder="10" scrolling="no" marginheight="0" marginwidth="auto"
                           src="http://maps.google.com/maps/ms?doflg=ptm&amp;ie=UTF8&amp;msa=0&amp;msid=203722259750162261795.0004aafd513ccced356f4&amp;sll=10.743085,122.969515&amp;sspn=0,0&amp;ll=10.743346,122.969686&amp;spn=0,0&amp;t=h&amp;vpsrc=0&amp;output=embed">
                    </iframe></p> -->
					
				</div>
				
				
	<div class="content-left">
		<font style=" color:darkblue; font:bold 24px 'cambria';">
		<i class="icon icon-book"></i> Mission, Vision & Goals</font><hr style="margin:8px; border-bottom:1px solid #ccc;">
		<?php include('evoslider.php');?>
		</div>
		
		
		
		
	
	
		
		

<footer>
<center>Copyright &copy; himsnepal.org.np | All Rights Reserved 2016 || Powered by : Indra Ale </center>
</footer>		
	</div><!-- end container --->

</body>

<?php include('scripts.php'); ?>
</html>