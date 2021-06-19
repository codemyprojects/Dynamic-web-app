<!DOTYPE html>
<html lang="en">
<head>
<?php include('head2.php'); ?>
<?php $get_id = $_GET['id']; ?>
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
					<li><a href="research.php"><i class="icon-book icon-2x"></i> News Contents</a>                                     </li>
					<li><a href="author.php"><i class="icon-group icon-2x"></i> Photo Gallery</a>                                    </li>
								<!--		<li><a href="archive.php"><i class="icon-list-alt icon-2x"></i> Archive</a>                                    </li>-->
					<li class="active"><a href="announcement.php"><i class="icon-bullhorn icon-2x"></i> Announcements</a>                                    </li>
					<li><a href="admin.php"><i class="icon-user icon-2x"></i> Admin</a>                                    </li>
					<li></li>					<br><br><br><br><br><br><br><br><br><br>		
					
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

    <li> <a href="author.php"><i class="icon icon-arrow-left"></i> List of Picture Galleries </a></li>
    <li class="disabled"><a href="#"><i class="icon-edit icon-large"></i> Edit Picture</a></li>
  </ul>
</div>


	<div class="form_center">
		<?php
					$query=mysql_query("select * from author where author_id = '$get_id'")or die(mysql_error());
					$row=mysql_fetch_array($query);
					$a_id = $row['author_id'];
					?>
			<form method="POST" action="edit_save_author.php" enctype="multipart/form-data">

	     	  <div class="control-group">
         <label class="control-label" for="input01">Image:</label>
         <div class="controls">
             <input type="file" name="image" value="<?php echo $row['image'];?>" class="font" required> 
         </div>
     </div>
   <div class="control-group">
    <label class="control-label" for="inputEmail">About the Picture:</label><br><br>
    <div class="controls">
		<textarea name="about" id="ckeditor_full">
		<?php echo $row['about_author'];?>				
		</textarea>
    </div>
  </div>
   <button name="add_author" type="submit" class="btn-large btn-success"><i class="icon-save icon-large"></i> Save</button>
    <button type="reset" class="btn"><i class="icon-remove icon-large"></i> Reset</button>
			</form>
		</div>
	
			
		</div>	


	  </div>

	
	</div><!--centerpage -->
</div>
</div>

</body>
<?php include('scripts.php');?>

</html>