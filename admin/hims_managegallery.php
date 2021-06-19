<?php

require_once("dbconnect.php");
$sql="select * from ols_gallery";
$res=executequery($sql);
?>

<!DOTYPE html>
<html lang="en">
<head>
<?php include('head2.php'); ?>

<script type="text/javascript">
function chk(lnk) {
	//alert(lnk);
	if(confirm("are you sure you want to delete")) {
		window.location = lnk;
	}
}
</script>

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
                    <li><a href="research.php"><i class="icon-book icon-2x"></i> News Contents</a>    </li>
					<li><a href="profile.php"><i class="icon-group icon-2x"></i> Staff Profile</a> </li>
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
	
	<div class="pagination " style="margin-top:-1px;">
  <ul>
  <?php 
  	
			$count_query = mysql_query("SELECT * FROM author") or die (mysql_error());
			$count = mysql_num_rows($count_query);
			
  ?>
    <li class="disabled"><a href="#"><i class="icon-list icon-large"></i> List of Pictures Galleries (<?php echo $count?>)</a></li>
    <li><a href="hims_addgalleryimage.php"><i class="icon-plus-sign icon-large"></i> Add Photo</a></li>
  </ul>
</div>

<div class="above_table">
<br><br>
<div class="demo_jui1">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
  <thead>
    <tr>
     <th>Firstname</th>
	 <th>Middlename</th>
	 <th>Lastname</th>
	 <th>Photo</th>
	 <th>View</th>
	 <th width="100">Action</th>
    </tr>
	
  </thead>
  <tbody>
   <div class="wrapper">
	<div class="sidebar">
	<?php include("sidebar.php");?>
	</div>
	<div class="content">
   	<!--<p><a href="hims_addgalleryimage.php">Add New Image</a></p> -->
	<table width="100%">
		<tr>
			<th>Image</th>
			<th>Location</th>
			<th>Status</th>
			<th>Edit</th>
            <th>Delete</th>
		</tr>
	<?php
	$totrec = mysql_num_rows($res);
	$pagesize = 100;
	$totpages = ceil($totrec/$pagesize);//ceil function takes the upper value e.g 5/2=2.5~3
	//echo $totpages;
	//die();
	if(!isset($_GET['resultpage'])) {
									$offset = 0;
	}else 
	{
		$offset = $pagesize * $_GET['resultpage']-$pagesize;
		//echo $offset;
		//die();
	}
	$sqlnew = $sql." limit ".$offset.",".$pagesize;
	//print_r($sqlnew);
	//die();
	$resgal = mysql_query($sqlnew);
		while($datagal = mysql_fetch_assoc($resgal)) {$gid=$datagal['gid']; ?>
		<tr>
			<td>
			<?php 
			if(!empty($datagal['imgname'])) {
			?>
			<img src="../gallery/<?php echo $datagal['imgname'];?>" width="100" height="75" /><br />
			<?php echo $datagal['caption'];?>
			<?php } else {
				echo "no image found";
			}
			?></td>
			<td><?php 
			if($datagal['location']=='h') 
			{echo "home";
			}
			 else 
			 {
				 echo "portfolio";
			 }?>
            </td>
			<td>
			<?php $status =  $datagal['status'];
			if($status==1) {
			?>
			<a href="updatestatus.php?gid=<?php echo $datagal['gid'];?>&status=0,&page=gallery">Active</a>
			<?php
			}//end of if
			else {
			?>
			<a href="updatestatus.php?gid=<?php echo $datagal['gid'];?>&status=1,&page=gallery">InActive</a>
            <?php
			}
			?>
            
            </td>
			<td><a href="editgallery.php?gid=<?php echo $gid;?>">Edit</a></td>
			
            <td><a href="javascript:void(0)" onClick="chk('deletegallery.php?gid=<?php echo $gid;?>')">Delete</a></td>
		</tr>
<?php } ?>
	</table>
      <?php $page=$_GET['resultpage'];$page=$page-1;?>
      <?php if($page>=1){?>
		<a href="hims_managegallery.php?resultpage=<?php echo $page;//for previous page?>">Previous</a>
        <?php }?>
    <?php if(isset($_GET['resultpage'])){for($i=1;$i<=$totpages;$i++){?>
	<span <?php if($_GET['resultpage'] == $i){?> style="font-weight:bold;font-size:14px" <?php }?>>
		<a href="hims_managegallery.php?resultpage=<?php echo $i;?>"><?php echo $i;?></a>
    </span>
<?php }}else{ for($i=1;$i<=$totpages;$i++){?>

		<a href="managegallery.php?resultpage=<?php echo $i;?>">
			<?php 
				if($i=='1')
				{
					echo '<span style="font-weight:bold;font-size:14px">'.$i.'</span>';
				}
				else
					echo $i;
			
			?>
        </a>
<?php }}?>
  <?php $page=$_GET['resultpage'];
  if($page<$totpages){$page=$page+1;
  if(($page=='1')) $page='2';
  ?>
		<a href="hims_managegallery.php?resultpage=<?php echo $page;?>">Next</a>
        <?php }//for next page?>
	</div>
	<div class="clear"></div>
</div>



	  </div>

	
	</div><!--centerpage -->
</div>
</div>

</body>

</html>