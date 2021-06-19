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

</head>		

<body>
	
	<div id="container">
			    <div class="subhead">
						HIMS NEPAL                         


<button type="button" class="btn btn-default btn-sm">
          <span class=""></span>   <i class="icon-home icon-large" style="font-size:16px; margin-left:20px;"></i><a href="index.php" a style="color: #999; font-size:16px; text-decoration:none; font-style:normal; margin-right:0px; text-transform:capitalize;"> Home </a>

    
        </button>
    

			<button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-picture"></span>  <a href="hims_galleries.php" style="color: #999; font-size:16px; text-decoration:none; font-style:normal; margin-right:0px; text-transform:capitalize;"> gallery</a>
    
        </button>
    
    
                        
					</div>


			<div class="nav">
				<ul class="menu1">
                
                
                
                
                
                <?php include("header.php"); ?>
                
					
				
                
                
                	
              
                </ul>
			</div>
            
            
            
            
            
            

        
		<div id="content">
				
		<!--diapo-->
		<br>
		<div class="alert alert-success">
			<strong>WELCOME</strong> to Online Public Access site for HIMS-NEPAL.
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
		
                        <?php 
					$pid = $_GET['pid'];
					if($pid==1) header('location:index.php');
                    $datappage = getPageContentById($pid);
				    echo "<h3>".$datappage['pagetitle']."</h3>" 
					?>
                    <?php if($pid!=51){?>
                    <div class="p1">
							
							<div class="clear"></div>
						</div>
						<P align="justify"><font color="#000000">
                        <?php echo $datappage['pagedesc']; ?>
                        
                    <?php }else if($pid==51){?>
						<table align="center" width="670px" cellpadding="5px" style="text-align:left;border-color:#090;">
                        <tr style="background-color:#9F0;"><th>&nbsp;Name</th><th>Post</th><th>Qualification</th><th>Contact</th><th>Email</th></tr>
                           
                        <?php if($pid==51){
						$sql="SELECT * FROM tbl_teaminfo";	
						$res=mysql_query($sql);	
						while($data=mysql_fetch_assoc($res))	
						 {?>
						
                        	 <tr style="background:#993; color:#FFF;"><td>&nbsp;<?php echo $data['StaffName']; ?></td><td><?php echo $data['StaffPost']; ?></td><td><?php echo $data['StaffQualification'] ?></td><td><?php echo $data['StaffContact']; ?></td><td><?php echo $data['StaffEmail'];?></td></tr>
                        
						<?php }}?>
                        </table>
                        <?php }else if($pid==39){?>
                        <p>Contact Number</p>
                        <?php }?>
		
								
				</div><!--end of searchform1-->
				
				
		</div>
    \

	<?php// include ('home_stat.php')?>      
   
   
   
				<?php include ('sidebar.php');?>
				<br>
			
				
	
			
		
		
			
			
		</div><!-- end content --->
<footer>
<center>Copyright &copy; himsnepal.org.np | All Rights Reserved 2016 | Powered by : Indra Ale</center>
</footer>		
	</div><!-- end container --->

</body>

</html>