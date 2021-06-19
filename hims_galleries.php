<?php
include("admin/dbconnect.php");
include("pagefunction.php");
$pid = $_GET['pid'];
$gid = $_GET['gid'];
$datappage = getPageContentById($pid);

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include ('head.php'); ?>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<title>HIMS NEPAL</title>
	<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/slideshow.js"></script>
	<script type="text/javascript" src="js/cufon-yui.js"></script>
	<script type="text/javascript" src="js/Arial.font.js"></script>
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4,h5,#menu,#copy,.blog-date');
	</script>
	<script type="text/javascript" src="js/fancyzoom.min.js"></script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('div.photo a').fancyZoom({directory: 'images/zoom', scaleImg: true, closeOnClick: true});
		});
	</script>
	<link rel="stylesheet" href="css/main.css" type="text/css" />
        <script type="text/javascript" src="highslide/highslide-full.js"></script>
    <link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
    
    <!--
	2) Optionally override the settings defined at the top
	of the highslide.js file. The parameter hs.graphicsDir is important!
-->

<script type="text/javascript">
	hs.graphicsDir = 'highslide/graphics/';
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.outlineType = 'rounded-white';
	hs.fadeInOut = true;
	hs.dimmingOpacity = 0.75;

	// define the restraining box
	hs.useBox = true;
	hs.width = 640;
	hs.height = 480;

	// Add the controlbar
	hs.addSlideshow({
		//slideshowGroup: 'group1',
		interval: 5000,
		repeat: false,
		useControls: true,
		fixedControls: 'fit',
		overlayOptions: {
			opacity: 1,
			position: 'bottom center',
			hideOnMouseOut: true
		}
	});
</script>



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
             &nbsp &nbsp &nbsp &nbsp <a href="hims_galleries.php" a style="color: #FFFF00; size:30px; text-decoration:none; font-size:20px;">  View Galleries </a> 
			</div>
            
            
            <h2>Product Items</h2>
</div>
                <!--
	3) Put the thumbnails inside a div for styling
-->

<div class="highslide-gallery">
<!--
	4) This is how you mark up the thumbnail image with an anchor tag around it.
	The anchor's href attribute defines the URL of the full-size image.
-->
  
                 <?php 
											$sql="select * from ols_gallery";
											$resulgallery=mysql_query($sql);
											while($data=mysql_fetch_assoc($resulgallery))
											
											{ ?>
                                           
								
                                
                                <a href="gallery/<?php echo $data['imgname'];?>" class="highslide" onclick="return hs.expand(this)">
                                 <img src="gallery/<?php echo $data['imgname']; ?>" alt="Hime-Nepal" width=150px height=150px
		title="Click to enlarge" />
                                
								
                                
                                	
									
							
                              <?php } ?>
                
                	
	

		 
		         
	</div>
    </div>
    </div>		
				<!-- /blog post -->
				
			
			
	
			<!-- /main -->    
            
   
    
			
		<!-- footer -->
	    </div>	
        <footer>
<center>Copyright &copy; himsnepal.org.np | All Rights Reserved 2016 | Powered by : Indra Ale</center>
</footer>		

	</div>
</body>
</html>