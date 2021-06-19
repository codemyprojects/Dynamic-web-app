	<div id="edit_admin<?php echo $u_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
	<h3 id="myModalLabel"><i class="icon-user icon-large"></i> Edit Admin</h3>
    </div>
    <div class="modal-body">
                  <form class="form-horizontal" method="POST">
    <div class="control-group">
    <label class="control-label" for="inputEmail">Username:</label>
    <div class="controls">
    <input name="id" value="<?php echo $row['user_id']?>" type="hidden" id="inputEmail" placeholder="ID">
    <input name="un" value="<?php echo $row['username']; ?>" type="text" id="inputEmail" placeholder="UserName">
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="inputPassword">Password:</label>
    <div class="controls">
    <input name="pw" value="<?php echo $row['password']; ?>" type="text" id="inputPassword" placeholder="Password">
    </div>
    </div>
	<div class="control-group">
    <label class="control-label" for="inputPassword">Full Name:</label>
    <div class="controls">
    <input name="fname" value="<?php echo $row['fullname']; ?>" type="text" id="inputPassword" placeholder="Password">
	
    </div>
    </div>
    </div>

	 <div class="modal-footer">
	 
	<button name="edit" type="submit" class="btn btn-warning"><i class="icon-save icon-large"></i>&nbsp;Save</button>
	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Cancel</button>
			<?php
	if (isset($_POST['edit'])){
	$id = $_POST['id'];
	$un = $_POST['un'];
	$pw = $_POST['pw'];
	$name = $_POST['fname'];
	
	mysql_query("update user set username = '$un' , password = '$pw', fullname='$name' where user_id = '$id' ")or die(mysql_error());
	header('location:admin.php');
	?>
	
	<?php

	
	}
	?>
    </div>
  
    </form>	
	
	
</div>

</div>