<?php

require_once("dbconnect.php");
$gid = $_GET['gid'];
$sql="select * from ols_gallery where gid='$gid'";
$datagal=executequery($sql);
$datagallery=mysql_fetch_assoc($datagal);
?>





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
                    <li><a href="research.php"><i class="icon-book icon-2x"></i> News Contents</a>     </li>
					<li><a href="author.php"><i class="icon-group icon-2x"></i> Photo Gallery</a>     </li>
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
	<div class="pagination " style="margin-top:1px;">
  <ul>

    <li> <a href="research.php"><i class="icon icon-arrow-left"></i> List of News and Programs </a></li>
    <li class="disabled"><a href="#"><i class="icon-plus-sign icon-large"></i> Add News/Program</a></li>
  </ul>
</div>
    
    
	<div class="content">
     <form name="frmpage" method="post" action="updategallery.php" enctype="multipart/form-data">
     <input type="hidden" name="gid" value="<?php echo $datagallery['gid'];?>"/>
    	<h2>Edit Gallery</h2>
		<table>
			<tr>
				<td>Image</td>
                
				<td>
                <?php if(!empty($datagallery['imgname'])){?>
                <img src="../gallery/<?php echo $datagallery['imgname'];?>"  height="200" width="300"/>
                <a href="deleteimage.php?gid=<?php echo $gid;?>,&page=gallery">delete image</a>
                <?php }else{?>
                <input type="file" name="pict"/>
                <?php  }?>
                
                </td>
			</tr>
			
			<tr>
				<td>Caption</td>
				<td><input type="text" name="caption" value="<?php echo $datagallery['caption']; ?>"/></td>
			</tr>
			<tr>
				<td>Location</td>
				<td>
             
                <select name="location">
                <option value="select">Select</option>
                <option value="h" <?php if($datagallery['location']=='h'){	echo "selected=selected";} ?> >Home</option>
                <option value="p" <?php if($datagallery['location']=='p'){	echo "selected=selected";}?>>Portfolio</option>
                </select>
     
                </td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="update gallery" /></td>
			</tr>
		</table>
	</form>

	</div>
	<div class="clear"></div>
</div>

</div>	
		</div>	


	  </div>

	
	</div><!--centerpage -->
</div>
</div>

</body>
<?php include('scripts.php');?>

</html>