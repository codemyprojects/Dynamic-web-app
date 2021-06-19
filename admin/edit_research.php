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

    <li> <a href="research.php"><i class="icon icon-arrow-left"></i> List of News </a></li>
    <li class="disabled"><a href="#"><i class="icon-plus-sign icon-large"></i> Edit News</a></li>
  </ul>
</div>

<div class="above_table">
	<div class="form_center">
			<?php
					$query=mysql_query("select * from research where research_id = '$get_id'")or die(mysql_error());
					$row=mysql_fetch_array($query);
					$id = $row['research_id'];
					?>
		
		
			<form method="POST" action="save_editresearch.php">
			 <div class="control-group">
    <label class="control-label" for="inputEmail">News Title:</label>
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<textarea name="research_title" style="width:400px;" value="<?php echo $row['research_title'];?>" required><?php echo $row['research_title'];?></textarea>
  </div>
		  <div class="control-group">
         <label class="control-label" for="input01">Choose Category:</label>
         <div class="controls">
            <select name="category" style="padding:3px;">
				<option value="<?php echo $row['category'];?>"> <?php echo $row['category'];?></option>
				<option value="News">News</option>
				<option value="Programme">Programme</option>
			</select>
         </div>
		</div> 
		<div class="control-group">
         <label class="control-label" for="input01">Document:</label>
         <div class="controls">
             <input type="file" name="document" class="font"> 
         </div>
		</div>
   <div class="control-group">
    <label class="control-label" for="inputEmail">Location:</label>
    <div class="controls">
      <input type="text" id="inputEmail" name="location" value="<?php echo $row['location']; ?>" placeholder="Location" required>
    </div>
  </div>
  
   <div class="control-group">
    <label class="control-label" for="inputEmail">Copyright year:</label>
    <div class="controls">
      <input type="text" id="inputEmail" name="copyright_year" value="<?php echo $row['copyright_year']; ?>" placeholder="Copyright Year">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Status</label>
    <div class="controls">
&nbsp;<select name="status" style="padding:3px;" style="width:250px;" required>
			<option><?php echo $row['status']; ?></option>
			<option value="New">New</option>
			<option value="Old">Old</option>
			<option value="Lost">Lost</option>
			<option value="Damage">Damage</option>
			<option value="Subject for Replacement">Subject for Replacement</option>
		</select>

    </div>
  </div>

   <div class="control-group">
    <label class="control-label" for="inputEmail">News Summary:</label><br><br>
    <div class="controls">
		<textarea name="summary" value="<?php echo $row['research_summary']; ?>" id="ckeditor_full">
			<?php echo $row['research_summary']; ?>			
		</textarea>
    </div>
  </div>
   <button name="add_research" type="submit" class="btn-large btn-success"><i class="icon-save icon-large"></i> Save</button>
    <button type="reset" class="btn"><i class="icon-remove icon-large"></i> Reset</button>
			</form>
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