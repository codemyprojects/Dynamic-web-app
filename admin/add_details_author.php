<!DOTYPE html>
<html lang="en">
<head>
<?php include('head2.php'); ?>
		<script src="wysiwig/jquery-1.9.1.min.js"></script>

</head>
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
					<li>
					<div class="hero-unit-clock">
				
					<form name="clock">
					<font color="white">Time is: <br></font>&nbsp;<input style="width:130px;" type="text" class="trans" name="face" disabled>
					</form>
					</div>
					</li>
				
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
  <?php 
  	
			$count_query = mysql_query("SELECT * FROM research") or die (mysql_error());
			$count = mysql_num_rows($count_query);
			
  ?>
    <li class="disabled"><a href="#">List of Pictures (<?php echo $count?>)</a></li>
    <li><a href="add_research.php"><i class="icon-plus-sign icon-large"></i> Add News</a></li>
  </ul>
</div>

<a href="author.php">
<div class="leftfloatnavbutton">
<i class="icon-hand-left icon-large"></i>&nbsp;Back
</div></a>
		
		
		
		

<div class="rightfloatnavbutton">
	
			<i class="icon-user icon-large"></i> Add Author Details
	 
</div>
<br><br><br>
<div class="above_table">
	
			
		<?php
			$id = $_GET['id'];
			$query=mysql_query("SELECT * FROM author where author_id = '$id'") or die (mysql_error());
			while ($ar_row=mysql_fetch_array($query)){
			$ar_id=$ar_row['author_id'];
			?>
					
				<center><img class="img-rounded"  style=" height:40px;" src="<?php echo $ar_row['image'];?>" width="55">
				<?php echo $ar_row['firstname'];?>
				<?php echo $ar_row['lastname'];?>		
				<?php echo $ar_row['middlename'];?>	</center>
	<?php } ?>
		
</div>

	<div class="form_center">
		
			<form method="POST" action="save_details.php" enctype="multipart/form-data">
		<input type="text" name="author_id" value="<?php echo $ar_row['author_id'];?>"><br />

			 <div class="control-group">
    <label class="control-label" for="inputEmail">News Title:</label>
    <div class="controls">
			<select style="width:350px; height:50px;" name="research">
		<?php $a_query = mysql_query("SELECT * FROM research") or die (mysql_error());
			while ($a_row = mysql_fetch_array($a_query)){
		?>
			<option value="<?php echo $a_row['research_id'];?>"><?php echo $a_row['research_title'];?></option>
			<?php }?>
			</select>
    </div>
  </div>

   <button name="add_details" type="submit" class="btn-large btn-success"><i class="icon-save icon-large"></i> Save</button>
    <button type="reset" class="btn"><i class="icon-remove icon-large"></i> Reset</button>
			</form>
					
		</div>
	
			
		</div>	
			
			

	
	</div><!--centerpage -->


</body>

				
<?php include('scripts.php');?>
</html>