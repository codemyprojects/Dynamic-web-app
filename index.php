<?php
include("admin/dbconnect.php");
include("pagefunction.php");
$pid = $_GET['pid'];
$datappage = getPageContentById($pid);

	
	// The following include is required in order to call 
	// the isChallengeAccepted() function.
	require_once('includes/challenge.php');

	// If there was a form post, handle it 
?>


<!DOTYPE html>
<html lang="en">
<?php include ('head.php'); ?>
<head>

<link rel="stylesheet" href="stylesheet/reset.css" type="text/css" media="screen">
		<link rel="stylesheet" href="stylesheet/style.css" type="text/css" media="screen">
		<link rel="stylesheet" href="stylesheet/layout.css" type="text/css" media="screen">    


  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>		

<body>
	
	<div id="container" style="background-color:#FFFFFF;">
			    <div class="subhead">
						HIMS NEPAL                         


<button type="button" class="btn btn-default btn-sm" style="background-color:#CCCCFF;">
          <span class=""></span>   <i class="icon-home icon-large" style="font-size:16px; margin-left:100px; background-color:#669999;"></i><a href="index.php" a style="color: #999; font-size:16px; text-decoration:none; font-style:normal; margin-right:0px; text-transform:capitalize;"> Home </a>

    
        </button>
    

			<button type="button" class="btn btn-default btn-sm" style="background-color:#CCCCFF;">
            <i style="font-size:16px; margin-left:100px;">
          <span class="glyphicon glyphicon-picture"></span>  <a href="hims_galleries.php" style="color: #999; font-size:16px; text-decoration:none; font-style:normal; margin-right:0px; text-transform:capitalize;"> gallery</a>
    
        </button>
    

			<button type="button" class="btn btn-default btn-sm" style="background-color:#CCCCFF;">
          <span class="#"></span>  <a href="#" style="color: #FF0000; font-size:16px; text-decoration:none; font-style:normal; margin-right:0px; text-transform:capitalize;"> DONATE</a>
    
        </button>
    
                        
					</div>
   
			<div class="nav" style="margin-right:5px; margin-left:-5px;">
				<ul class="menu1">
                
                
                
                
                
                <?php include("header.php"); ?>
                
					
				
                
                
                	
              
                </ul>
			</div>
            
            
		<div id="content">
				
		<!--diapo-->
		<br>
		<div class="alert alert-success" style="margin-right:5px;">
			<strong>WELCOME</strong> to  HIMS-NEPAL.
				<div class="pull-right">
								<i class="icon-calendar icon-large"></i>
								<?php
								$Today = date('y:m:d');
								$new = date('l, F d, Y', strtotime($Today));
								echo $new;
								?>
                                
                              
				</div>
			</div>
			
            <div class="rightcont">    <br>
			<div>
			<?php include('slider.php');?>
			</div>
        
        
        <br>
					<div class="searchform1">
				
				
					<h1 style="color:#006666;">Organization's Profile</h1>	
                    
	            
								
                        <p style="text-align:justify;">HIMS Nepal is a community based organization of beneficiaries established in 2005 from community initiative for over development of locals. The organization is established from community people hence it has always emphasizes on inclusion of diverse people. Most of the staff of the organization is from ethnic background along with representative from Dalit and Women. Staffs are recruited through fair and transparent organization procedure; priority is given local people, women and people from marginalized community.  As most of staffs and volunteers are from same community hence we had very good understanding of community dimensions. Staffs are responsible for carrying out organizational work along with assess the needs of community people. They also develop helping relationship with beneficiaries. It is very challenging for new organization to carryout programs in these communities as it is difficult to develop professional relationship. In contrast HIMS is established organization with most of its board and General assembly members from same communities.  
                        </p>
 
								
	<div style=" margin-left:5px; margin-top:20px;">
<?php include('hims.php');?>
</div>
			<div style="background-color:#006666">
			<?php// include('thumbnail.php'); ?>
				</div>

	            
                <div style=" margin-left:5px; margin-top:175px;">
            <?php include('himsQlinks.php');?>
            </div>

						</div>
    
    </div><!--end of searchform1-->


	<?php// include ('home_stat.php')?>      
   
   
   				<?php include ('sidebar.php');?>
	
    
    			<br>
			
				
				
	
			
		
		<!--</div>
			
</div>			
		</div><!-- end content --->
        -->

        </div>
 <?php include('himspage.php');?>
    
<div>
<footer style=" background-color: #003333; color:#FFFFFF; font-size:9px;">
<center>Copyright &copy; himsnepal.org.np | All Rights Reserved 2016 | Powered by : Magar Indra Bahadur</center>
</footer>		
</div>
    <!--</div>-- end container --->
</body>
</div>
</html>