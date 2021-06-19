<?php

require_once("dbconnect.php");
$pid = $_GET['pid'];


$sql = "select * from menu_pages where pid='$pid'";

$resppage = executequery($sql);
$datappage = mysql_fetch_assoc($resppage);
?>


<!DOTYPE html>
<html lang="en">
<head>
<?php include('head2.php'); ?>
<script type="text/javascript">
function chk(lnk) {
	//alert(lnk);
	if(confirm("are you sure you want to delete?")) {
		window.location = lnk;
	}
	
}

function chek(lnk) {
	//alert(lnk);
	if(confirm("are you sure you want to edit?")) {
		window.location = lnk;
	}
	
}


</script>
<script type="text/javascript">

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
					<li><a href="research.php"><i class="icon-book icon-2x"></i> News Contents</a>                                     </li>
					<li><a href="author.php"><i class="icon-group icon-2x"></i> Photo Gallery</a>  
                    <li><a href="hims_managegallery.php"><i class="icon-group icon-2x"></i>Gallery</a>  
                                                      </li>
								<!--		<li><a href="archive.php"><i class="icon-list-alt icon-2x"></i> Archive</a>                                    </li>-->

					<li class="active"><a href="announcement.php"><i class="icon-bullhorn icon-2x"></i> Announcements</a>                                    </li>
					 <li><a href="hims_manageinquiry.php"><i class="icon-group icon-2x"></i> </a>                                    </li>	
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
    <li><a href="add_author.php"><i class="icon-plus-sign icon-large"></i> Add Photo</a></li>
  </ul>
</div>

<div class="wrapper">
	<div class="sidebar">
	<?php include("sidebar.php");?>
	</div>
	<div class="content">
	<form name="frmpage" method="post" enctype="multipart/form-data" action="updatepage.php">
    <input type="hidden" name="pid" value="<?php echo $pid;?>"/>
		<h2>Edit Page</h2>
		<table>
			<tr>
				<td>Select Parent</td>
				<td>
				<select name="ppid">
				<option value="0">select</option>
				<?php
				$sql = "select * from menu_pages where ppid=0";
				$res = executequery($sql);
				while($datapage = mysql_fetch_assoc($res)) { 
				?>
				<option value="<?php echo $datapage['pid']; //echo die();?>" 
				<?php if($datappage['ppid']==$datapage['pid']) {
				echo "selected=selected"; }?>><?php echo $datapage['pagetitle'];?></option>
				<?php } ?>
				</select>
				
				</td>
			</tr>
			<tr>
				<td>Page Title</td>
				<td><input name="ptitle" type="text" value="<?php echo $datappage['pagetitle'];?>" /></td>
			</tr>
			<tr>
				<td>Page Desc</td>
				<td>
				<?php
				//echo die();
				include("fckeditor/fckeditor.php");
				
				$objfckeditor = new FCKeditor("pdesc");
				$objfckeditor->BasePath = "fckeditor/";
				$objfckeditor->Width=900;
				$objfckeditor->Height=500;
				$objfckeditor->Value=$datappage['pagedesc'];
				$objfckeditor->Create();
				?>
				</td>
			</tr>
			<tr>
				<td>Image</td>
				<td>
				<?php
				if(!empty($datappage['image'])) {
				?>
				<img src="../pageimages/<?php echo $datappage['image'];?>" width="100" height="75" />
				<a href="deleteimage.php?pid=<?php echo $pid;?>,&page=page">delete image</a>
				<?php }else { ?>
				<input type="file" name="pict" />
				<?php } ?>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="update page" /></td>
			</tr>
		</table>
	</form>
	</div>
	<div class="clear"></div>
</div></div>

	
	</div><!--centerpage -->
</div>
</div>

</body>

</html>